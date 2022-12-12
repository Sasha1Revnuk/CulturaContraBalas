<?php

namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class Utils
{

    public static function transliterate($string)
    {
        $trans = [
            'ый' => 'iy',
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'yo',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'i',
            'й' => 'y',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ъ' => '',
            'ы' => 'y',
            'ь' => '',
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            ' ' => '-',
            'і' => 'i',
            'ї' => 'ji',
            'є' => 'je'
        ];

        $string = strtr(trim(mb_strtolower($string)), $trans);
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);

        $string = strtr($string, ['---' => '-', '--' => '-']);
        $string = strtr($string, ['---' => '-', '--' => '-']);
        if (substr($string, -1, 1) === '-') {
            $string = substr($string, 0, strlen($string) - 1);
        }

        return trim($string, '-');
    }

    public static function createUnigueSlug(Model $model, $title, $field = 'slug')
    {
        $slug = str_replace('/', '-', self::transliterate($title));
        $block = get_class($model)::where($field, $slug)->first();
        if ($block) {
            if ($model->id) {
                if ($model->id != $block->id) {
                    return $slug . '_' . (get_class($model)::max('id') + 1);
                }
            } else {
                return $slug . '_' . (get_class($model)::max('id') + 1);
            }
        }

        return $slug;
    }

}
