<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PermissionGroup extends Model
{
    use HasFactory, HasRoles, HasTranslations;

    public $relatedTranslationsClass = PermissionGroupTranslation::class;
    protected $guarded = [];
    protected $guard_name = 'web';

}
