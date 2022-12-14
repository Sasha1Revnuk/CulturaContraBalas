<?php

namespace Database\Seeders;

use App\Classes\Admin\PageEnumerator;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Services\LanguageService;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMainPage();
        $this->createAboutPage();
        $this->createDonatePage();
    }

    private function createMainPage()
    {
        $page = Page::updateOrCreate([
            'slug' => PageEnumerator::MAINPAGE_SLUG,
        ], []);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_ES,
        ], [
            'title' => 'Principal',
        ]);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_EN,
        ], [
            'title' => 'Main',
        ]);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_UA,
        ], [
            'title' => 'Головна',
        ]);
    }

    private function createAboutPage()
    {
        $page = Page::updateOrCreate([
            'slug' => PageEnumerator::ABOUTPAGE_SLUG,
        ], []);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_ES,
        ], [
            'title' => 'Sobre nosotras',
        ]);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_EN,
        ], [
            'title' => 'About us',
        ]);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_UA,
        ], [
            'title' => 'Про нас',
        ]);
    }

    private function createDonatePage()
    {
        $page = Page::updateOrCreate([
            'slug' => PageEnumerator::DONATEPAGE_SLUG,
        ], []);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_ES,
        ], [
            'title' => 'Donate',
        ]);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_EN,
        ], [
            'title' => 'Donate',
        ]);

        PageTranslation::updateOrCreate([
            'page_id' => $page->id,
            'language_slug' => LanguageService::LANGUAGE_UA,
        ], [
            'title' => 'Donate',
        ]);
    }
}
