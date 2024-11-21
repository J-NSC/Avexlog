<?php

namespace App\Models\Advance;

use App\Models\Drivers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdvanceRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'drive_id',
        'request_date',
        'reference_date',
        'rate',
        'advance_amount',
    ];

    public function drive(): HasMany{
        return $this->hasMany(Drivers::class);
    }
}
