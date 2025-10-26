<?php

namespace App\Enums;

enum PaymentStatus:string
{
    case PAID ="paid";
    case UPPAID = "unpaid";
    case PENDING = "pending";

    public static function options() {
        return array_map(fn($case)=>$case->value , Self::cases());
    }
}
