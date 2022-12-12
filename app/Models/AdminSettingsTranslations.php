<?php

namespace App\Models;

use App\Traits\TranslationTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSettingsTranslations extends Model
{
    use HasFactory, TranslationTable;

    protected $fillable = [
        'language_slug',
        'title',
        'admin_settings_id'
    ];

    public $relatedTranslationsClass = AdminSettings::class;
}
