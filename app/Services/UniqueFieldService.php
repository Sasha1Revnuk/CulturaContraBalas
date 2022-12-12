<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class UniqueFieldService
{
    /**
     * TODO: замінити на нормальний метод при потребі
     * Все тестове і індивідуальне рішення для генерації унікального поля. На практиці не тестувалось)
     * @param Model $model - модель з якою працюємо
     * @param string $fieldFromGenerateNewUrl - Поле в моделі з якого буде генеруватись унікальне поле (title, sub_title etc). Якщо поле в перекладах - перепишіть під себе
     * @param string $generatedFieldName - Назва поля, яке буде згенероване (slug, url etc)
     * @param string|null $value - Значення з request
     * @return string
     */
    public static function generateUniqueUrl(Model $model, string $fieldFromGenerateNewUrl = 'title', string $generatedFieldName = 'url', string $value = null) : string
    {
        $value = str_replace( '/', '-', $value );
        $value = preg_replace( '/\s+/', '', $value );

        if ( !$value ) {

            $slug = Utils::createUnigueSlug( $model, $fieldFromGenerateNewUrl, $generatedFieldName );
            if ( $model->id ) {
                if ( $model->getOriginal($fieldFromGenerateNewUrl ) != $model->$fieldFromGenerateNewUrl ) {
                    $model::where( $generatedFieldName, $slug )->where( 'id', '<>', $model->id )->first() ? $model->$generatedFieldName = $slug . '_' . rand( 100, 999 ) : $model->$generatedFieldName = $slug;
                }

                $model::where( $generatedFieldName, $slug )->where( 'id', '<>', $model->id )->first() ? $model->$generatedFieldName = $slug . '_' . rand( 100, 999 ) : $model->$generatedFieldName = $slug;
            } else {
                $model::where( $generatedFieldName, $slug )->first() ? $model->$generatedFieldName = $slug . '_' . rand( 100, 999 ) : $model->$generatedFieldName = $slug;

            }
        }
        return $value;
    }
}