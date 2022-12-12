<?php

namespace App\Http\Controllers\Web;


use App\Classes\Admin\PageEnumerator;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\WebMetaTrait;

class MainController extends Controller
{
    use WebMetaTrait;

    public function index()
    {
        $page = Page::where('slug', PageEnumerator::MAINPAGE_SLUG)->withTranslations([app()->getLocale()])->first();
        $pageTranslate = $page->translations->first();
        $data = [
            'page' => $pageTranslate,
            'meta' => $this->getMeta(
                $pageTranslate->title,
                $pageTranslate->meta?->getDescription,
                $pageTranslate->meta?->getKeywords,
                $pageTranslate->meta?->getRobots
            )
        ];
        $pageTranslate->setPlaceholder(
            'header_placeholder',
            view('layouts/web/partials.nav')
        );
        $pageTranslate->setPlaceholder(
            'testimonials_placeholder',
            view('web/pages/includes.testimonials')
        );

        return view('web.pages.show', $data);
    }
}
