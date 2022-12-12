<?php

namespace App\Enumerators\Admin;

use App\Services\LanguageService;

class AdminSettingsEnumerator
{
    public const KEY_THEME = 'theme';

    public const TYPE_STRING = 'string';

    public const LIGHT_THEME = 'light';
    public const DARK_THEME = 'dark';

    public function getAll(string $language = LanguageService::LANGUAGE_UA): array
    {
        $translates = [
            LanguageService::LANGUAGE_UA => 'Стрічка',
            LanguageService::LANGUAGE_EN => 'String',
        ];
        return [self::TYPE_STRING => $translates[$language]];
    }

    public function getValues(): array
    {
        return [
            [
                'key' => self::KEY_THEME,
                'type' => self::TYPE_STRING,
                'default_value' => self::LIGHT_THEME,
                'translations' => [
                    LanguageService::LANGUAGE_UA => 'Тема',
                    LanguageService::LANGUAGE_EN => 'Theme',
                ]
            ]

        ];
    }
}
