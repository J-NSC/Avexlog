<?php

namespace App\Models\Advance;

use App\Enum\SchedulerRoster;
use App\Models\Driver;
use App\Models\TermService;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AdvanceRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'term_service_id',
        'request_date',
        'reference_date',
        'rate',
        'advance_amount',

    ];

    protected $casts = [

        'request_date' => 'datetime',
        'reference_date' => 'datetime',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function TermService(): HasOne
    {
        return $this->hasOne(TermService::class);
    }
}
