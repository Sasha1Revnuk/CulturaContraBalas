<?php

namespace App\Enumerators\Admin;


use App\Models\Invoice;

class LogEnumerator
{
    public const ACTION_TYPE_CREATE = 'Create';
    public const ACTION_TYPE_UPDATE = 'Update';
    public const ACTION_TYPE_DELETE = 'Delete';
    public const ACTION_TYPE_RESTORE = 'Restore';
    public const ACTION_TYPE_UPDATE_FILE = 'Update File';
    public const ACTION_TYPE_DELETE_FILE = 'Delete File';
    public const ACTION_TYPE_RELATIONS_SYNC = 'Sync relations';
    public const ACTION_TYPE_CHANGE_SECRET = 'Change secret';

    public const FIELD_TYPE_DEFAULT = 'Default';
    public const FIELD_TYPE_TEXT = 'Text';
    public const FIELD_TYPE_FILE = 'File';
    public const FIELD_TYPE_PRICE = 'Price';
    public const FIELD_TYPE_RELATION = 'Relation';
    public const FIELD_TYPE_SECRET = 'Secret';


    public function actionColor(): array
    {
        return [
            self::ACTION_TYPE_CREATE => '#08b619',
            self::ACTION_TYPE_UPDATE => '#e4ac3b',
            self::ACTION_TYPE_DELETE => '#d40808',
            self::ACTION_TYPE_RESTORE => '#08d4a9',
            self::ACTION_TYPE_UPDATE_FILE => '#d4c808',
            self::ACTION_TYPE_DELETE_FILE => '#d408a4',
            self::ACTION_TYPE_RELATIONS_SYNC => '#e4a425',
            self::ACTION_TYPE_CHANGE_SECRET => '#d47538',
        ];
    }
}
