<?php

namespace App\Classes\Admin;

use App\Enumerators\Admin\RolesEnumerator;
use App\Models\AdminSettings;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserClass
{
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(190),
            'father_name' => $data['father_name'] ?? null,
            'phone' => $data['phone'] ?? null,

        ]);
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }

    public function setAdminSettings(User $user, string $key, string $value)
    {
        try {
            $adminSettings = AdminSettings::where('key', $key)->firstOrFail();
            $user->adminSettings()->updateExistingPivot($adminSettings->id, [
                'value' => $value
            ]);
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . '::' . __LINE__ . '::' . $exception->getMessage());
        }
    }

    public function syncRoles(User $user, array $roles)
    {
        $rootKey = array_search(RolesEnumerator::ROLE_SUPER_ADMINISTRATOR, $roles);
        if ($rootKey !== false && $roles[$rootKey] == RolesEnumerator::ROLE_SUPER_ADMINISTRATOR) {
            unset($roles[$rootKey]);
        }
        if (count($roles)) {
            $user->syncRoles($roles);
        } else {
            $user->syncRoles([]);
        }
    }

    public function syncPermissions(User $user, array $permissions)
    {
        if (count($permissions)) {
            $user->syncPermissions($permissions);
        } else {
            $user->syncPermissions([]);
        }
    }

    public function delete($user)
    {
        $user->delete();
    }
}
