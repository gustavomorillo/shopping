<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'date','name', 'lastname', 'address','city','state', 'phone', 'status','del_date','price'
    ];
}
