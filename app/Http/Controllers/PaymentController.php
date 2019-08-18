<?php

namespace App\Http\Controllers;

use App\ShippingMethod;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function index(){

        $cartItems = Cart::content();

        $mrwPrice = ShippingMethod::where('name', 'MRW')->first();
        $mrwPrice = $mrwPrice->price;

        $dollarPrice = ShippingMethod::where('name', 'MRW')->first();
        $dollarPrice = $dollarPrice->dollarPrice;


        return view('payment', compact('cartItems', 'mrwPrice', 'dollarPrice'));
    }
}
