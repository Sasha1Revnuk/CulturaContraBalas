<?php


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('setlocale/{lang}', function ($lang) {
    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);
    if (in_array($segments[1], App\Http\Middleware\Locale::$languages)) {
        unset($segments[1]);
    }

    if ($lang != App\Http\Middleware\Locale::$mainLanguage) {
        array_splice($segments, 1, 0, $lang);
    }

    $url = request()->root() . implode("/", $segments);

    if (parse_url($referer, PHP_URL_QUERY)) {
        $url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
    }

    app()->setlocale($lang);
//    dd($url);
//    Session()->put('locale', $lang);
    return redirect(rtrim($url, '/'));
})->name('setlocale');

Route::group(["middleware" => ['locale']], function () {
    require __DIR__ . '/auth.php';
    require base_path('routes/system/client/site.php');

    Route::get('/', [\App\Http\Controllers\Web\MainController::class, 'index'])->name('main.index');
    Route::get('/about', [\App\Http\Controllers\Web\AboutController::class, 'index'])->name('about.index');
    Route::get('/donate', [\App\Http\Controllers\Web\DonateController::class, 'index'])->name('donate.index');
    Route::get('/events', [\App\Http\Controllers\Web\EventController::class, 'index'])->name('events.index');
    Route::get('/event/{event:slug}', [\App\Http\Controllers\Web\EventController::class, 'single'])->name(
        'events.single'
    );

    Route::middleware(['auth'])->name('cabinet.')->prefix('cabinet')->group(function () {
        Route::get('/', 'MainController@index')->name('main');
    });
});
