<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait TranslationTable
{
    public function translatedModel():BelongsTo
    {
        return $this->belongsTo($this->relatedTranslationsClass);
    }
}