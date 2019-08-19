<?php

namespace App;
use App\Dolar;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'price','type', 
        'modal_name', 'subcategory','category','s','m','l','color'
    ];


    public function getPriceAttribute($value){

        $dollarPrice = Dolar::find(2);
        $dollar = $dollarPrice->price;

        $newForm = $value * $dollar;
        $newForm = number_format($newForm, 0, ',', '.');
        $newForm = 'Bs. ' . $newForm;
        return $newForm;
    }
    
    public function modal() {
        return $this->hasOne('App\Modal');
    }

}
