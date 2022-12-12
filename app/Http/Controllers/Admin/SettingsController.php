<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    public function setMode(Request $request, SettingsService $settingsService)
    {
        $settingsService->setMode($request->get('mode'));
    }
}
