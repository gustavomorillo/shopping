<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'price','type',
    ];


    // public function getPriceAttribute($value){

    //     $newForm = $value." Bs";
    //     return $newForm;    
    // }
    
    public function modal() {
        return $this->hasOne('App\Modal');
    }

}
