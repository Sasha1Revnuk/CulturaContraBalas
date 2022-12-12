<?php

namespace App\Classes\Admin;

use Spatie\Permission\Models\Role;

class RoleClass
{
    public function create(string $name): Role
    {
        return Role::create([
            'name' => $name
        ]);
    }

    public function update(Role $role, string $name): Role
    {
        $role->update([
            'name' => $name
        ]);

        return $role;
    }

    public function delete(Role $role)
    {
        $role->delete();
    }
}
