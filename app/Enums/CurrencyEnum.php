<?php

namespace App\Enums;

enum CurrencyEnum: string
{
    case USD = 'USD'; // US Dollar
    case EUR = 'EUR'; // Euro (French Currency)
    case GBP = 'GBP'; // British Pound
    case JPY = 'JPY'; // Japanese Yen
    case AUD = 'AUD'; // Australian Dollar
    case CAD = 'CAD'; // Canadian Dollar
    case CHF = 'CHF'; // Swiss Franc
    case CNY = 'CNY'; // Chinese Yuan
    case HKD = 'HKD'; // Hong Kong Dollar
    case INR = 'INR'; // Indian Rupee

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
