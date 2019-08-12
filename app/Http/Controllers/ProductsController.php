<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::paginate(10);
        return view('allproducts', compact('products'));

    }

    public function show($id){
        
        $product = Product::find($id);
        
        return view('product', compact('product'));
    }  

   
    public function menProducts() {

        $products = Product::where('category', 'men')->paginate(15);
        return view('menProducts', compact('products'));
    
    }
    
      public function womenProducts() {
    
        $products = Product::where('category', 'women')->paginate(15);
        return view('womenProducts', compact('products'));
    }
        public function search(Request $request) {
        $search = $request->get('search-product');
        $products = Product::where('name', 'Like', '%' . $search . '%')->paginate(15);  
        return view('allproducts', compact('products'));
        
    }

    public function checkoutProducts() {
        return view('checkout');
        
    }



        public function createOrder(Request $request) {

            $messages = [
                'name.required' => 'Debes introducir tu nombre por favor',     
                'lastname.required' => 'Debes introducir tus apellidos por favor',
                'address.required' => 'Debes introducir tu dirección exacta por favor', 
                'address.min'  => 'Debes introducir una dirección valida, la que introdujo es muy corta',    
                'city.required' => 'Debes introducir tu ciudad por favor',
                'state.required' => 'Debes introducir estado por favor',
                'phone.required' => 'Debes introducir teléfono por favor',
                'email.required' => 'Debes introducir email por favor',
              ];
    
    
            $validatedData = $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'address' => 'required|min:10',
                'city' => 'required',
                'state' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                
            ], $messages);


        $name = $request->name;
        $lastname = $request->lastname;
        $address = $request->address;
        $city = $request->city;
        $state = $request->state;
        $phone = $request->phone;
        $email = $request->email;
                  
        $total = Cart::total();

     
        $total = str_replace(",","", $total);



        if($total) {
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("status"=>"on_hold", "date"=>$date, 
            "del_date"=>$date, "price"=>$total,"name"=>$total,"price"=>$total,
            "name"=>$name,"lastname"=>$lastname,"address"=>$address,
            "city"=>$city,"state"=>$state,"phone"=>$phone);
            // $created_order = DB::table('orders')->insert($newOrderArray);

            $order = new Order;
            $order->create($newOrderArray);

            $order_id = DB::getPdo()->lastInsertId();

            $cartItems = Cart::content();

        foreach($cartItems as $cartItem) {

            $item_id = $cartItem->id;
            $item_name = $cartItem->name;
            $item_price = $cartItem->subtotal;
            $item_size = $cartItem->options->size;
            $item_color = $cartItem->options->color;
            $item_qty = $cartItem->qty;

            $newItemsInCurrentOrder = array("item_id"=>$item_id, "order_id"=>$order_id, 
            "item_name"=>$item_name, "price"=>$item_price, "size" => $item_size, "qty"=>$item_qty, "color" => $item_color);

            $created_order_items = DB::table('order_items')->insert($newItemsInCurrentOrder);
        }

        Cart::destroy();
        //Session::flush();

        //Session::flash('order_success', 'Su orden esta casi completa, sólo falta el método de pago');

        return redirect('/product/payment')->with('success', 'Su orden esta casi completa, sólo falta el método de pago');


        } else {

        return redirect('/');

        }


    }

}
