<?php

namespace App\Models;

use App\Traits\ModelMeta;
use App\Traits\TranslationTable;
use Dotlogics\Grapesjs\App\Contracts\Editable;
use Dotlogics\Grapesjs\App\Traits\EditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model implements Editable
{
    use HasFactory, TranslationTable, EditableTrait, ModelMeta;

    public $relatedTranslationsClass = Page::class;
    protected $guarded = ['translation_id', 'title', 'gjs_data'];
}
