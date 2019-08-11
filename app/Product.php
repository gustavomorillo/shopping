<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'price','type', 
        'modal_name', 'subcategory','category','s','m','l','color'
    ];


    // public function getPriceAttribute($value){

    //     $newForm = $value." Bs";
    //     return $newForm;    
    // }
    
    public function modal() {
        return $this->hasOne('App\Modal');
    }

}
