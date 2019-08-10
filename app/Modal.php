<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $fillable = [
        'name', 'second_name','image1', 'image2', 'image3','product_id'
    ];

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
