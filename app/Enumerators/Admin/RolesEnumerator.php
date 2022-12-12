<?php

namespace App\Enumerators\Admin;

class RolesEnumerator
{
    public const ROLE_SUPER_ADMINISTRATOR = 'Super Admin';
    public const ROLE_USER = 'User';

    public const PERMISSION_LOGIN_TO_ADMIN = 'Login to admin panel';
    public const PERMISSION_CREATE_ROLE = 'Create role';
    public const PERMISSION_UPDATE_ROLE = 'Update role';
    public const PERMISSION_DELETE_ROLE = 'Delete role';
    public const PERMISSION_SHOW_ROLES_LIST = 'Show roles list';
    public const PERMISSION_SHOW_USER_LIST = 'Show user list';
    public const PERMISSION_CREATE_USER = 'Create user';
    public const PERMISSION_UPDATE_INFO_USER = 'Update user info';
    public const PERMISSION_UPDATE_PASSWORD_USER = 'Update user password';
    public const PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER = 'Update user roles and permissions';
    public const PERMISSION_DELETE_USER = 'Delete user';

    /**
     * Використовується при ініті для створення всіх дозволів
     * @return string[]
     */
    public static function getPermissionList(): array
    {
        return [
            self::PERMISSION_LOGIN_TO_ADMIN,
            self::PERMISSION_CREATE_ROLE,
            self::PERMISSION_UPDATE_ROLE,
            self::PERMISSION_DELETE_ROLE,
            self::PERMISSION_SHOW_ROLES_LIST,
            self::PERMISSION_SHOW_USER_LIST,
            self::PERMISSION_CREATE_USER,
            self::PERMISSION_UPDATE_INFO_USER,
            self::PERMISSION_UPDATE_PASSWORD_USER,
            self::PERMISSION_UPDATE_ROLES_AND_PERMISSIONS_USER,
            self::PERMISSION_DELETE_USER,
        ];
    }

    /**
     * Використовується в меню для визначення чи показувати рут меню чи ні
     * @return array
     */
    public static function getPermissionForRootAdmin(): array
    {
        return [
            self::PERMISSION_SHOW_ROLES_LIST,
            self::PERMISSION_SHOW_USER_LIST,
        ];
    }

    public static function getUndeletedRoles(): array
    {
        return [
            self::ROLE_SUPER_ADMINISTRATOR,
            self::ROLE_USER
        ];
    }

    public static function getUnvisibledRoles(): array
    {
        return [
            self::ROLE_SUPER_ADMINISTRATOR,
        ];
    }

    public static function getUneditedRoles(): array
    {
        return [
            self::ROLE_SUPER_ADMINISTRATOR,
        ];
    }

    public static function getUngivebleRoles(): array
    {
        return [
            self::ROLE_SUPER_ADMINISTRATOR,
        ];
    }


}
