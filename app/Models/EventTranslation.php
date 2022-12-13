<?php

namespace App\Models;

use App\Traits\ModelMeta;
use App\Traits\TranslationTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    use HasFactory, TranslationTable, ModelMeta;

    public $relatedTranslationsClass = Event::class;
    protected $fillable = ['language_slug', 'title', 'short_description', 'description', 'event_id'];
}
