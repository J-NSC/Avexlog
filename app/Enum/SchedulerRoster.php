<?php

namespace App\Enum;

enum SchedulerRoster: string
{
    case BREAKFAST = 'breakfast';
    case LUNCH = 'lunch';
    case DINNER = 'dinner';

    public function display(): string
    {
        return match($this) {
            self::BREAKFAST => __('Breakfast'),
            self::LUNCH => __('Lunch'),
            self::DINNER => __('Dinner'),
        };
    }

    public function timeRange(): string
    {
        return match($this) {
            self::BREAKFAST => '06:00 - 09:00',
            self::LUNCH => '12:00 - 15:00',
            self::DINNER => '18:00 - 21:00',
        };
    }
}
