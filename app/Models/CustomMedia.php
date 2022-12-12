<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomMedia extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'alt' => 'object',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating( function ( $model ) {
            $model->range = $model->max( 'range' ) + 1;
        } );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function mediaAble()
    {
        return $this->morphTo();
    }
}
