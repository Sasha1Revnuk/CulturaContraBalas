<?php
/**
 * Created by PhpStorm.
 * User: Isit 5
 * Date: 02.12.2020
 * Time: 10:47
 */

namespace App\Services;


class LanguageService
{
    public function getRequestArray( $request, $field )
    {
        return [
            'es' => $request->get( $field . '_es' ) ?? '',
            'ua' => $request->get( $field . '_ua' ) ?? '',
            'en' => $request->get( $field . '_en' ) ?? '',
        ];
    }

    public const  LANGUAGES = [ 'es', 'ua', 'en'];
    public const  LANGUAGE_ES = 'es';
    public const  LANGUAGE_UA = 'ua';
    public const  LANGUAGE_EN = 'en';


    public static function getLangualgeForClient()
    {
        return [
            self::LANGUAGE_UA => 'УКР',
            self::LANGUAGE_EN => 'ENG',
            self::LANGUAGE_ES => 'ES',
        ];
    }

    public static function getLangualgeTitle()
    {
        return [
            self::LANGUAGE_UA => 'Українська',
            self::LANGUAGE_EN => 'English',
            self::LANGUAGE_ES => 'Española',
        ];
    }

    public static function getLanguagePhoto()
    {
        return [
            self::LANGUAGE_UA => 'ukraine.jpg',
            self::LANGUAGE_EN => 'us.jpg',
            self::LANGUAGE_ES => 'spain.jpg',
        ];
    }

    public static function getForRequest( $fieldsWithParams )
    {
        $rules = [];

        foreach ( $fieldsWithParams as $field => $params ) {
            foreach ( self::LANGUAGES as $language ) {
                if ( isset( $params[$language] ) ) {
                    $rules[$field . '_' . $language] = $params[$language];
                } else {
                    $rules[$field . '_' . $language] = $params;

                }
            }
        }

        return $rules;
    }
}
