<?php

use Illuminate\Support\Facades\Route;

Route::post('/upload-images', [\App\Http\Controllers\Admin\ImageController::class, 'upload']);

Route::prefix('users-settings')->name('userSettings.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\UserSettingsController::class, 'index'])->name('index');
    Route::post('/store-info', [\App\Http\Controllers\Admin\UserSettingsController::class, 'storeInfo'])->name(
        'storeInfo'
    );
    Route::post('/store-password', [\App\Http\Controllers\Admin\UserSettingsController::class, 'storePassword'])->name(
        'storePassword'
    );
});

Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_SHOW_ROLES_LIST
    )->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\RoleController::class, 'create'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_CREATE_ROLE
    )->name('create');
    Route::get('/edit/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_ROLE
    )->name('edit');
    Route::post('/store', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_CREATE_ROLE
    )->name('store');
    Route::post('/update/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_ROLE
    )->name('update');
});

Route::prefix('users')->name('users.')->middleware('protect_user')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index')->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_SHOW_USER_LIST
    );
    Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('create')->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_CREATE_USER
    );
    Route::post('/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('store')->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_CREATE_USER
    );
    Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit')->middleware(
        'protect_admin',
        'direct_permission:' . implode(
            ',',
            [
                \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_INFO_USER,
                \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_PASSWORD_USER,
                \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER
            ]
        )
    );
    Route::post('/update/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name(
        'update'
    )->middleware(
        'protect_admin',
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_INFO_USER
    );

    Route::post('/change-password/{user}', [\App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name(
        'changePassword'
    )->middleware(
        'protect_admin',
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_PASSWORD_USER
    );

    Route::post('/change-roles/{user}', [\App\Http\Controllers\Admin\UserController::class, 'changeRoles'])->name(
        'changeRoles'
    )->middleware(
        'protect_admin',
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER
    );
});

Route::prefix('program-photos')->group(function () {
    Route::get('/download/{programPhoto}', [\App\Http\Controllers\Admin\ProgramPhotoController::class, 'download']);
});

