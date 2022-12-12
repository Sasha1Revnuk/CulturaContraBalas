<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AdminSettings extends Model
{
    use HasFactory, HasTranslations;

    public $relatedTranslationsClass = AdminSettingsTranslations::class;
    protected $fillable = [
        'key',
        'type',
        'default_value',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
