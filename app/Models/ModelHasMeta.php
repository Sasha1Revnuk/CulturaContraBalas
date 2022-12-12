<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasMeta extends Model
{
    use HasFactory;
    protected $fillable = ['model_type', 'model_id', 'meta_title', 'meta_description', 'meta_robots', 'meta_key_words'];
}