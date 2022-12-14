<?php

namespace App\Http\Controllers\Web;


use App\Classes\Admin\PageEnumerator;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\WebMetaTrait;

class AboutController extends Controller
{
    use WebMetaTrait;

    public function index()
    {
        $page = Page::where('slug', PageEnumerator::ABOUTPAGE_SLUG)->withTranslations([app()->getLocale()])->first();
        $pageTranslate = $page->translations->first();
        $data = [
            'page' => $pageTranslate,
            'meta' => $this->getMeta(
                $pageTranslate->title,
                $pageTranslate->metaDescription,
                $pageTranslate->metaKeywords,
                $pageTranslate->metaRobots
            )
        ];
        $pageTranslate->setPlaceholder(
            'header_placeholder',
            view('layouts/web/partials.nav')
        );
        $pageTranslate->setPlaceholder(
            'footer_placeholder',
            view('layouts/web/partials.footer')
        );
        return view('web.pages.show', $data);
    }
}
