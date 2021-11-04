<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'provider_id',
        'user_id',
        'finalized_at',
        'phone',
    ];
}
