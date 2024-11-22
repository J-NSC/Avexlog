<?php

namespace App\Models;

use App\Enum\SchedulerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Scheduler extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status',
        'justification',
    ];

    protected $casts = [
        'date' => 'datetime',
        'status' => SchedulerStatus::class

    ];


    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class , 'user_schedulers', 'scheduler_id', 'user_id');
    }
}
