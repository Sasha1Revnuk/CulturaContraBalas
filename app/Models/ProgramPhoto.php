<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'image', 'thumbnail'];


    public function ifUsed(): bool
    {
//        $result = (bool)Search::add(Post::class, 'text')
//            ->add(Articles::class, 'text')
//            ->beginWithWildcard()
//            ->endWithWildcard()
//            ->count($this->image);
//        return $result;
        return false;
    }

}
