<?php

namespace App;

enum CountryCode: string
{
    case BEL = '+375';
    case RUS = '+7';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
