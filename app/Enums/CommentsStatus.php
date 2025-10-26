<?php

namespace App\Enums;

enum CommentsStatus:string
{
    case PUBLISH = "publish";
    case HIDE = "hide";
    case NOTCHECKED = "notchecked";
    public static function options() {
        return array_map(fn($case)=>$case->value , Self::cases());
    }
}
