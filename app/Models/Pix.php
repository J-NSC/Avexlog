<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pix extends Model
{
    use HasFactory;


    protected $fillable = [
      'pix_key',
      'user_id',
    ];


    public function user():belongsTo{
        return $this->belongsTo(User::class);
    }
}
