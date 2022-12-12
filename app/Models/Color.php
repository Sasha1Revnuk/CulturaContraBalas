<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Color extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * @return MorphTo
     */
    public function mediaAble() : MorphTo
    {
        return $this->morphTo();
    }

}
