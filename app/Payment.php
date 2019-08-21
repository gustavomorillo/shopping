<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'paymentType','bank', 'paymentNumber', 'paymentDate','paymentMount','comments', 'status'
    ];
}
