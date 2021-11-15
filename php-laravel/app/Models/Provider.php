<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'paymentinfo',
        'email',
        'phone',
    ];

    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'provider_id', 'id');
    }
}
