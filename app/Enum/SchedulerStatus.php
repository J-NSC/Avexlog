<?php

namespace App\Enum;

enum SchedulerStatus: string
{
    CASE ACCEPTED = 'accepted';
    CASE SENDED = 'sended';
    CASE REJECTED = 'rejected';
    CASE CANCELLED = 'cancelled';

    public function display():string
    {
        return match($this){
            self::ACCEPTED => __('Accepted'),
            self::SENDED => __('Sended'),
            self::REJECTED => __('Rejected'),
            self::CANCELLED => __('Cancelled'),
        };
    }


    public function color()
    {
        return match($this){
            self::ACCEPTED => 'green',
            self::SENDED => 'blue',
            self::REJECTED => 'red',
            self::CANCELLED => 'amber',
        };
    }
}
