<?php

namespace App\Models\Advance;

use App\Models\Drivers;
use App\Models\TermService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AdvanceRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'drive_id',
        'term_service_id',
        'request_date',
        'reference_date',
        'rate',
        'advance_amount',

    ];

    public function drive(): HasMany{
        return $this->hasMany(Drivers::class);
    }

    public function TermService(): HasOne
    {
        return $this->hasOne(TermService::class);
    }
}
