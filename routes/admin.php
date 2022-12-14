<?php

use Illuminate\Support\Facades\Route;

Route::middleware(
    [
        'auth',
        'locale',
        'admin_share_data',
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_LOGIN_TO_ADMIN
    ]
)->name('admin.')
    ->group(function () {
        require base_path('routes/system/admin/admin_panel.php');
        Route::name('main.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('index');
            Route::get(
                '/main-page-edit/{pageTranslation}',
                [\App\Http\Controllers\Admin\MainController::class, 'editor']
            )->name('editor');

            Route::post(
                '/main-page-seo/store',
                [\App\Http\Controllers\Admin\MainController::class, 'storeSeo']
            )->name('storeSeo');
        });

        Route::name('about.')->group(function () {
            Route::get('/about-page', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('index');
            Route::get(
                '/about-page-edit/{pageTranslation}',
                [\App\Http\Controllers\Admin\AboutController::class, 'editor']
            )->name('editor');

            Route::post(
                '/about-page-seo/store',
                [\App\Http\Controllers\Admin\AboutController::class, 'storeSeo']
            )->name('storeSeo');
        });

        Route::name('donate.')->group(function () {
            Route::get('/donate-page', [\App\Http\Controllers\Admin\DonateController::class, 'index'])->name('index');
            Route::get(
                '/donate-page-edit/{pageTranslation}',
                [\App\Http\Controllers\Admin\DonateController::class, 'editor']
            )->name('editor');

            Route::post(
                '/donate-page-seo/store',
                [\App\Http\Controllers\Admin\DonateController::class, 'storeSeo']
            )->name('storeSeo');
        });

        Route::prefix('stories')->name('stories.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\StoryController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\StoryController::class, 'create'])->name('create');
            Route::get('/edit/{story}', [\App\Http\Controllers\Admin\StoryController::class, 'edit'])->name('edit');
            Route::post('/store', [\App\Http\Controllers\Admin\StoryController::class, 'store'])->name('store');
            Route::post('/update/{story}', [\App\Http\Controllers\Admin\StoryController::class, 'update'])->name(
                'update'
            );
        });

        Route::prefix('events')->name('events.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('create');
            Route::get('/edit/{event}', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('edit');
            Route::post('/store', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('store');
            Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name(
                'update'
            );
        });
    });
