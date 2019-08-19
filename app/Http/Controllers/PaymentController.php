<?php

namespace App\Http\Controllers;

use App\Dolar;
use App\Order;
use App\ShippingMethod;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function index(){

        $cartItems = Cart::content();

        $mrwPrice = ShippingMethod::where('name', 'MRW')->first();
        $mrwPrice = $mrwPrice->price;

        $dollarPrice = Dolar::where('name', 'dollarBuy')->first();
        $dollarPrice = $dollarPrice->price;

        $order = Order::all()->sortByDesc("order_id")->first();

        $shipping = $order->shipping;




        return view('payment', compact('cartItems', 'mrwPrice', 'dollarPrice','shipping'));
    }
}
