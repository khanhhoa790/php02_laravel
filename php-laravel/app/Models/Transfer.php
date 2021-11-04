<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sender_method_id',
        'receiver_method_id',
        'sended_amount',
        'received_amount',
        'reference',
    ];
}
