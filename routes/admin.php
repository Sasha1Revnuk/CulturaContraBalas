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
    });
