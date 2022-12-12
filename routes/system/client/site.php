<?php

use Illuminate\Support\Facades\Route;

Route::post('/upload-images', [\App\Http\Controllers\Admin\ImageController::class, 'upload']);
