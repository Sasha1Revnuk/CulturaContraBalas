<?php

namespace App\Observers;

use App\Enumerators\Admin\RolesEnumerator;
use App\Models\AdminSettings;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        foreach (AdminSettings::all() as $adminSetting) {
            $adminSetting->users()->attach($user->id, ['value' => $adminSetting->default_value]);
        }

        $userRole = \Spatie\Permission\Models\Role::where('name', RolesEnumerator::ROLE_USER)->first();
        if ($userRole) {
            $user->assignRole($userRole->name);
            foreach ($userRole->permissions()->get() as $permission) {
                $user->givePermissionTo($permission->name);
            }
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
