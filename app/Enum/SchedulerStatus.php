<?php

namespace App\Enum;

enum SchedulerStatus: string
{
    CASE ACCEPTED = 'accepted';
    case ASSESSMENT = 'assessment';
    CASE REJECTED = 'rejected';
    CASE CANCELLED = 'cancelled';

    public function display():string
    {
        return match($this){
            self::ACCEPTED => __('Accepted'),
            self::ASSESSMENT => __('Assessment'),
            self::REJECTED => __('Rejected'),
            self::CANCELLED => __('Cancelled'),
        };
    }


    public function color()
    {
        return match($this){
            self::ACCEPTED => 'green',
            self::ASSESSMENT => 'blue',
            self::REJECTED => 'red',
            self::CANCELLED => 'amber',
        };
    }
}
