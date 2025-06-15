<?php

namespace App;

enum MaritalStatus: string
{
    case SINGLE = 'single';
    case MARRIED = 'married';
    case DIVORCED = 'divorced';
    case WIDOWED = 'widowed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
