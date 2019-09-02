<?php

namespace App\Http\Controllers;

use Auth;
use App\Dolar;
use App\Order;
use App\Payment;
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

    public function reportPayment(){

        $cartItems = Cart::content();

        return view('auth.reportPayment', compact('cartItems'));
       

    }

    public function processPayment(Request $request){

        $messages = [
            'paymentType.required' => 'Debes introducir el tipo de pago por favor',     
            'paymentMount.required' => 'Debes introducir el monto exacto por favor',  
            'bank.required' => 'Debes seleccionar un valor', 
            'paymentMount.max' => 'Limite de caracteres excedido',
            'comments.max' => 'Limite de caracteres excedido',
            'paymentNumber.max' => 'Limite de caracteres excedido',
            'paymentDate.max' => 'Limite de caracteres excedido'
          ];


        $validatedData = $request->validate([
            'paymentType' => 'required',
            'paymentMount' => 'required|max:50',
            'comments' => 'max:300',
            'paymentNumber'=>'max:50',
            'paymentDate'=>'max:20',
            'bank'=>'required|max:20'
            
            
            
        ], $messages);

        $input = $request->all();

        $payment = new Payment;

        $payment->create($input);

        Cart::destroy();

        return redirect('/home')->with('success2','Su pago ha sido registrado satisfactoriamente');



    }
    public function paymentHistory(){

        $user_id = Auth::id();

        $cartItems = Cart::content();

        $payments = Payment::all()->where('user_id',$user_id);

        return view('auth.paymentHistory', compact('payments', 'cartItems'));

    }
    public function orderHistory(){

        $user_id = Auth::id();

        $cartItems = Cart::content();

        $orders = Order::all()->where('user_id',$user_id);

        return view('auth.orderHistory', compact('orders', 'cartItems'));

    }


}
