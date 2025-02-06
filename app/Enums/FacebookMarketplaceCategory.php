<?php

namespace App\Enums;

enum FacebookMarketplaceCategory: string
{
    case VEHICLES = 'vehicles';
    case PROPERTY_RENTALS = 'property_rentals';
    case APPAREL = 'apparel';
    case ELECTRONICS = 'electronics';
    case HOME_GOODS = 'home_goods';
    case PET_SUPPLIES = 'pet_supplies';
    case SPORTING_GOODS = 'sporting_goods';
    case TOYS_AND_GAMES = 'toys_and_games';
    case MUSICAL_INSTRUMENTS = 'musical_instruments';
    case BUSINESS_EQUIPMENT = 'business_equipment';
    case TICKETS = 'tickets';
    case OTHER = 'other';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
