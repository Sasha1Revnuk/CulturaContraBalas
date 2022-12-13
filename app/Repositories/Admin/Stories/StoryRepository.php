<?php

namespace App\Repositories\Admin\Stories;

use App\Models\Story;
use App\Models\StoryTranslation;
use App\Services\LanguageService;
use App\Services\SortingService;
use App\Services\TableService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoryRepository
{
    public function getDataTable(Request $request): array
    {
        $tableService = new TableService();
        $models = Story::withTranslations([app()->getLocale()]);
        $modelsCount = $models->count();
        $models = $models->oldest('sort')->offset($request->get('start'))->limit($request->get('length'))->get();
        $data = [];
        foreach ($models as $model) {
            $dataArray = [
                $model->sort,
                $model->id,
                $tableService->sorting(),
                $model->translations->first()->name,
                Str::limit($model->translations->first()->text, 50, '...'),

            ];
            $buttons= [
                [
                    'title' => __('admin.system.edit'),
                    'href' => route('admin.stories.edit', ['story' => $model]),
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
        (new SortingService())->sort($request->get('ids'), $request->get('ranges'), Story::class);
    }

    public function delete(Story $story)
    {
        $story->delete();
    }

    public function store(array $data): Story
    {
        $story = Story::create([

        ]);
        $this->updateOrCreateTranslates($story->id, $data);
        return $story;
    }

    public function update(array $data, Story $story)
    {
        $this->updateOrCreateTranslates($story->id, $data);
    }

    public function updateOrCreateTranslates(int $storyId, array $data)
    {
        foreach (LanguageService::LANGUAGES as $language) {
            StoryTranslation::updateOrCreate([
                'language_slug' => $language,
                'story_id' => $storyId
            ], [
                'name' => $data['name_' . $language],
                'text' => $data['text_' . $language],
            ]);

        }
    }
}