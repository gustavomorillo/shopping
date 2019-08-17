<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function index(){
        $cartItems = Cart::content();
        return view('payment', compact('cartItems'));
    }
}
