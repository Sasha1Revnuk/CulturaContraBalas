<?php

use Illuminate\Support\Facades\Route;

Route::prefix('roles')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'getDataTable'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_SHOW_ROLES_LIST
    );
    Route::delete('/delete/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'delete'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_DELETE_ROLE
    );
});

Route::prefix('users')->middleware('protect_user')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'getDataTable'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_SHOW_USER_LIST
    );
    Route::delete('/delete/{user}', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->middleware(
        'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_DELETE_USER
    );
});

Route::prefix('program-photos')->group(function () {
    Route::get('/index', [\App\Http\Controllers\Admin\ProgramPhotoController::class, 'index']);
    Route::delete('/delete/{programPhoto}', [\App\Http\Controllers\Admin\ProgramPhotoController::class, 'delete']);
});
