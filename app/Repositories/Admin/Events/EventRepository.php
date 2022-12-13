<?php

namespace App\Repositories\Admin\Events;

use App\Models\Event;
use App\Models\EventTranslation;
use App\Services\LanguageService;
use App\Services\SortingService;
use App\Services\TableService;
use App\Services\Utils;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class EventRepository
{
    public function getDataTable(Request $request): array
    {
        $tableService = new TableService();
        $models = Event::withTranslations([app()->getLocale()]);
        $modelsCount = $models->count();
        $models = $models->oldest('sort')->offset($request->get('start'))->limit($request->get('length'))->get();
        $data = [];
        foreach ($models as $model) {
            $dataArray = [
                $model->sort,
                $model->id,
                $tableService->sorting(),
                $model->translations->first()->title,
            ];
            $buttons = [
                [
                    'title' => __('admin.system.edit'),
                    'href' => route('admin.events.edit', ['event' => $model]),
                ],
                [
                    'title' => __('admin.system.delete'),
                    'attributes' => [
                        'data-model' => $model->id,
                    ],
                    'class' => 'delete',
                ]
            ];

            $dataArray[] = $tableService->getButtons($buttons);
            $data[] = $dataArray;
        }
        return [
            'data' => $data,
            'recordsTotal' => $modelsCount,
            'recordsFiltered' => $modelsCount,
        ];
    }

    public function sorting(Request $request)
    {
        (new SortingService())->sort($request->get('ids'), $request->get('ranges'), Event::class);
    }

    public function delete(Event $event)
    {
        $event->delete();
    }

    public function store(array $data): Event
    {
        $event = Event::create([
            'slug' => Utils::createUnigueSlug((new Event()), $data['title_' . LanguageService::LANGUAGE_EN])
        ]);
        foreach (LanguageService::LANGUAGES as $language) {
            $this->updateOrCreateTranslates($event->id, $data, $language);
        }

        if ($data['image']) {
            $this->saveImage($event, $data['image']);
        }
        return $event;
    }

    public function update(array $data, Event $event)
    {
        $event->slug = Utils::createUnigueSlug($event, $data['title_' . LanguageService::LANGUAGE_EN]);
        $event->save();
        $this->updateOrCreateTranslates($event->id, $data);
        if ($data['image']) {
            $this->saveImage($event, $data['image']);
        }
    }

    public function updateOrCreateTranslates(int $eventId, array $data)
    {
        foreach (LanguageService::LANGUAGES as $language) {
            $translation = EventTranslation::updateOrCreate([
                'language_slug' => $language,
                'event_id' => $eventId
            ], [
                'title' => $data['title_' . $language],
                'description' => $data['description_' . $language],
                'short_description' => $data['short_description_' . $language],
            ]);

            $this->storeMeta($translation, $data, $language);
        }
    }

    private function storeMeta(EventTranslation $eventTranslation, array $data, string $language)
    {
        $eventTranslation->metaDescription = $data['meta_description_' . $language];
        $eventTranslation->metaKeywords = $data['meta_keywords_' . $language];
        $eventTranslation->metaRobots = $data['meta_robots_' . $language];
        $eventTranslation->updateOrCreateMeta();
    }

    private function saveImage(Event $event, UploadedFile $uploadedFile)
    {
        $alt = [];

        foreach ($event->translations as $translation) {
            $alt[$translation->language_slug] = $translation->title;
        }

        $event->saveFile($uploadedFile, $event->filePath(), true, 'image', false, [], $alt);
    }
}