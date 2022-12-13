<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Traits\WebMetaTrait;

class EventController extends Controller
{
    use WebMetaTrait;

    public function index()
    {
        $data = [
            'events' => Event::withTranslations([app()->getLocale()])->oldest('sort')->paginate(4),
            'meta' => $this->getMeta(
                __('site.events'),
                __('site.events'),
                __('site.events'),
                __('site.events'),
            )
        ];

        return view('web.events.show', $data);
    }

    public function single(Event $event)
    {
        $translate = $event->translations()->where('language_slug', app()->getLocale())->first();
        $data = [
            'event' => $event,
            'eventTranslation' => $translate,
            'meta' => $this->getMeta(
                $translate->title,
                $translate->metaDescription,
                $translate->metaKeywords,
                $translate->metaRobots,
            )
        ];

        return view('web.events.single', $data);
    }
}
