<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'day_worked',
        'financial_records',
        'delivery',
        'fees_sum'
    ];


    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}