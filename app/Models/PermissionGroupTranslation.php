<?php

namespace App\Models;

use App\Traits\TranslationTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionGroupTranslation extends Model
{
    use HasFactory, TranslationTable;

    public $relatedTranslationsClass = PermissionGroup::class;
    protected $fillable = ['language_slug', 'title', 'permission_group_id'];
}
