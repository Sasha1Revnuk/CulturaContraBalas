<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory, HasTranslations;
    public $relatedTranslationsClass = StoryTranslation::class;
    protected $fillable = ['sort'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->sort = $model->max('sort') + 1;
        });
    }
}
