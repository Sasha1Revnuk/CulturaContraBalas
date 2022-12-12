<?php

use Illuminate\Support\Facades\Route;

Route::middleware(
    ['auth:api', 'locale', 'direct_permission:' . \App\Enumerators\Admin\RolesEnumerator::PERMISSION_LOGIN_TO_ADMIN]
)->group(function () {
    require base_path('routes/system/admin/admin_panel_api.php');
});
