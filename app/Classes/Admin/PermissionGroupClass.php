<?php

namespace App\Classes\Admin;

use App\Models\PermissionGroup;
use App\Models\PermissionGroupTranslation;

class PermissionGroupClass
{
    /**
     * @param string $key
     * @param array $titles ['en' => '', 'ua' => '']
     * @return mixed
     */
    public function create(string $key, array $titles): PermissionGroup
    {
        $group = PermissionGroup::create([
            'key' => $key
        ]);
        foreach ($titles as $lang => $title) {
            PermissionGroupTranslation::create([
                'language_slug' => $lang,
                'title' => $title,
                'permission_group_id' => $group->id
            ]);
        }

        return $group;
    }
}
