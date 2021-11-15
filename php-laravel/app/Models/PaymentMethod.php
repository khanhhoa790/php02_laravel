<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
    ];

    public function senderTranfers()
    {
        return $this->hasMany(Transfer::class, 'sender_method_id', 'id');
    }

    public function receiverTranfers()
    {
        return $this->hasMany(Transfer::class, 'receiver_method_id', 'id');
    }
}
