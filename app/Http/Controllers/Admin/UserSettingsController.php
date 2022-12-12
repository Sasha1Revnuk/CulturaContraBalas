<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserInfoRequest;
use App\Repositories\Admin\UserSettingsRepository;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    private $userSettingsRepository;

    public function __construct(UserSettingsRepository $userSettingsRepository)
    {
        $this->userSettingsRepository = $userSettingsRepository;
    }

    public function index(Request $request)
    {
        $data = [
            'meta' => [
                'pageTitle' => __('admin.user_settings.pageTitle'),
            ],
            'breadcrumbs' => [
                __('admin.user_settings.pageTitle') => '',
            ],
        ];
        return view('admin.user_settings.form', $data);
    }

    public function storeInfo(UserInfoRequest $request)
    {
        $this->userSettingsRepository->updateInfo($request->validated());
        return redirect()->back();
    }

    public function storePassword(UserAuthRequest $request)
    {
        $this->userSettingsRepository->updatePassword($request->validated());
        return redirect()->back();
    }

}
