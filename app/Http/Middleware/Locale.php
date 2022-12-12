<?php

namespace App\Http\Middleware;

use App\Services\LanguageService;
use Closure;
use Illuminate\Support\Facades\App;

class Locale
{
    public static $mainLanguage = LanguageService::LANGUAGE_ES;
    public static $languages = LanguageService::LANGUAGES;

    public static function getLocale()
    {
        $uri = request()->path();
        $segmentsURI = explode('/', $uri);

        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], self::$languages)) {
            if ($segmentsURI[0] != self::$mainLanguage) {
                return $segmentsURI[0];
            }
        }
        return null;
    }

    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
        if ($locale) {
            App::setLocale($locale);
        } else {
            App::setLocale(self::$mainLanguage);
        }
        return $next($request);
    }
}
