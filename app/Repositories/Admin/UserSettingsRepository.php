<?php

namespace App\Repositories\Admin;

use App\Classes\Admin\UserClass;
use App\Enumerators\Admin\AdminSettingsEnumerator;
use Illuminate\Support\Facades\Hash;

class UserSettingsRepository
{
    private $userClass;

    public function __construct(UserClass $userClass)
    {
        $this->userClass = $userClass;
    }

    public function updateInfo(array $data)
    {
        $currentUser = auth()->user();
        $this->userClass->setAdminSettings($currentUser, AdminSettingsEnumerator::KEY_THEME, $data['mode']);
        $this->userClass->update($currentUser, $data);
    }

    public function updatePassword(array $data)
    {
        $currentUser = auth()->user();
        $this->userClass->update($currentUser, ['password' => Hash::make($data['password'])]);
    }
}