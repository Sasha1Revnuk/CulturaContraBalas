<?php

namespace App\Models;

use App\Traits\TranslationTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryTranslation extends Model
{
    use HasFactory, TranslationTable;
    public $relatedTranslationsClass = Story::class;
    protected $fillable = ['language_slug', 'name', 'text', 'story_id'];

}
