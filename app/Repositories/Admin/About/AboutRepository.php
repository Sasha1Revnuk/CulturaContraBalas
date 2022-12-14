<?php

namespace App\Repositories\Admin\About;

use App\Classes\Admin\PageEnumerator;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Services\LanguageService;

class AboutRepository
{
    public function store(array $data)
    {
        $mainPage = Page::where('slug', PageEnumerator::ABOUTPAGE_SLUG)->first();
        foreach (LanguageService::LANGUAGES as $language) {
            $translation = PageTranslation::updateOrCreate([
                'page_id' => $mainPage->id,
                'language_slug' => $language
            ], [
                'title' => $data['title_' . $language]
            ]);

            $translation->metaDescription = $data['meta_description_' . $language];
            $translation->metaKeywords = $data['meta_keywords_' . $language];
            $translation->metaRobots = $data['meta_robots_' . $language];
            $translation->updateOrCreateMeta();
        }
    }
}