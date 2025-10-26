<?php

namespace App\Enums;

enum TicketUserType : string 
{
    case CUSTOMER = "customer";
    case ADMIN = "admin";
    case UNKNOWN = "unknown";
    public static function options() {
        return array_map(fn($case) => $case->value , self::cases());
    }
}
