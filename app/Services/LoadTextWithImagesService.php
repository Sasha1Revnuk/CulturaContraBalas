<?php
namespace App\Services;


use DOMDocument;
use Illuminate\Support\Facades\Storage;

class LoadTextWithImagesService
{
    public function get($text)
    {
        $text = str_replace('../../..', env('APP_URL'), $text);
        $text = str_replace('../..', env('APP_URL'), $text);
        $text = str_replace('../', env('APP_URL'), $text);
        $text = str_replace('///', '/', $text);

        return $text;
    }
}
