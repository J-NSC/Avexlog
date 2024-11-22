<?php

namespace App\Models\Advance;

use App\Models\Driver;
use App\Models\TermService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AdvanceRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'driver_id',
        'term_service_id',
        'request_date',
        'reference_date',
        'rate',
        'advance_amount',

    ];

    public function driver():BelongsTo{
        return $this->belongsTo(Driver::class);
    }

    public function TermService(): HasOne
    {
        return $this->hasOne(TermService::class);
    }
}
