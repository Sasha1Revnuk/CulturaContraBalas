<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasTranslations
{
    public function translations(): HasMany
    {
        return $this->hasMany($this->relatedTranslationsClass);
    }

    /**
     * @param Builder $builder
     * @param array $langs
     * @return Builder
     */
    public function scopeWithTranslations(Builder $builder, array $langs = []): Builder
    {
        if (count($langs)) {
            return $builder->with([
                'translations' => function ($q) use ($langs) {
                    $q->whereIn('language_slug', $langs);
                }
            ]);
        }
        return $builder->with('translations');
    }

}
