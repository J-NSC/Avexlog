<?php

namespace App\Models;

use App\Models\Advance\AdvanceRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TermService extends Model
{
    use HasFactory;

    protected $fillable = [
      'agreed'
    ];

    public function AdvanceRequest():HasOne{
        return $this->hasOne(AdvanceRequest::class);
    }
}
