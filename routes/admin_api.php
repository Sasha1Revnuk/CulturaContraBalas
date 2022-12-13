<?php

use Illuminate\Support\Facades\Route;

Route::middleware(
    ['auth:api', 'locale', 'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_LOGIN_TO_ADMIN]
)->group(function () {
    require base_path('routes/system/admin/admin_panel_api.php');
    Route::prefix('stories')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\StoryController::class, 'getDataTable']);
        Route::delete('/delete/{story}', [\App\Http\Controllers\Admin\StoryController::class, 'delete']);
        Route::post('/sorting', [\App\Http\Controllers\Admin\StoryController::class, 'sorting']);
    });

    Route::prefix('events')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\EventController::class, 'getDataTable']);
        Route::delete('/delete/{event}', [\App\Http\Controllers\Admin\EventController::class, 'delete']);
        Route::post('/sorting', [\App\Http\Controllers\Admin\EventController::class, 'sorting']);
    });
});
