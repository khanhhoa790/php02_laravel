<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'document_type',
        'document_id',
        'name',
        'email',
        'phone',
        'last_purchase',
        'total_purchases',
        'total_paid',
        'balance',
    ];
}
