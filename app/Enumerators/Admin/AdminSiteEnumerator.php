<?php

namespace App\Enumerators\Admin;


class AdminSiteEnumerator
{
    public const ACTIVE = 1;
    public const DISABLED = 0;

    public static function getExample()
    {
        return [
            self::ACTIVE => 'Активно',
            self::DISABLED => 'Не активно',
        ];
    }

}
