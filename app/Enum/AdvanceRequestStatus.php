<?php

namespace App\Enum;

enum AdvanceRequestStatus: string
{
    case REQUESTED = 'requested';
    case PAID = 'paid';

    public function display(): string
    {
        return match($this) {
            self::REQUESTED => __('Requested'),
            self::PAID => __('Paid'),
        };
    }

    public function color(){
        return match($this) {
            self::REQUESTED => 'blue',
            self::PAID => 'green',
        };
    }
}
