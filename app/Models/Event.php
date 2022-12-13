<?php

namespace App\Models;

use App\Traits\HasTranslations;
use App\Traits\Mediaable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasTranslations, Mediaable;

    public $relatedTranslationsClass = EventTranslation::class;
    protected $fillable = ['sort', 'slug'];
    protected $appends = [
        'image_url',
        'image',
    ];

    protected $with = [
        'medias',
    ];

    public function filePath()
    {
        return 'public/events/' . $this->id;
    }

    public function getImageAttribute()
    {
        return $this->loadGetFirst('image');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getUrl($this->image);
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->sort = $model->max('sort') + 1;
        });
    }
}
