<?php

namespace App\Enums;

enum TableStatus: string {

    case Pending = 'pending';
    case Aviable = 'aviable';
    case Unaviable = 'unaviable';

}
