<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, HasTranslations;
    public $relatedTranslationsClass = PageTranslation::class;
    protected $guarded = ['slug'];
}
