<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\StoryTranslation;
use App\Services\LanguageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstStory = Story::create([]);
        $secondStory = Story::create([]);
        $thirdStory = Story::create([]);

        foreach (LanguageService::LANGUAGES as $language) {
            foreach ([$firstStory->id, $secondStory->id, $thirdStory->id] as $id) {
                StoryTranslation::create([
                    'language_slug' => $language,
                    'story_id' => $id,
                    'name' => '- jhone N. smith ( CEO - Charity Mission )',
                    'text' => 'Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus
                    sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus.'
                ]);
            }
        }

    }
}
