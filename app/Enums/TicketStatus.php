<?php

namespace App\Enums;

enum TicketStatus:string
{
    case NEW = "new";  
    case CLOSE = "close";
    case PENDING = "pending";
    public static function options() {
        return array_map(fn($case) => $case->value , Self::cases());
    }
}
