<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'reference',
        'client_id',
        'provider_id',
        'transfer_id',
        'payment_method_id',
        'user_id',
        'sale_id',
        'amount',
    ];
}
