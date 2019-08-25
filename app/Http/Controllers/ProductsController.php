<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Dolar;
use App\Order;
use App\Address;
use App\Product;
use App\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsController extends Controller
{
    public function index()
    {
        Cart::setGlobalTax(0);
        $products = Product::paginate(10);
        
        $cartItems = Cart::content();

        return view('allproducts', compact('products', 'cartItems'));

    }

    public function show($id){
        
        $product = Product::find($id);
        $cartItems = Cart::content();
        return view('product', compact('product', 'cartItems'));
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

    public function shippingProducts() {


        $user_id = Auth::user()->id;
    
        $cartItems = Cart::content();

        $mrwPrice = ShippingMethod::where('name', 'MRW')->first();
        $mrwPrice = $mrwPrice->price;

        $dollarPrice = Dolar::where('name', 'dollarBuy')->first();
        $dollarPrice = $dollarPrice->price;

        $addresses = Address::where('user_id', $user_id)->get();


        return view('shipping', compact('cartItems', 'addresses','mrwPrice','dollarPrice'));
        
    }

    public function discount(Request $request) {

    

        $couponCode = $request->coupon;


        if($couponCode == 'gusclick50'){

        Cart::setGlobalDiscount(50);

        $user_id = Auth::user()->id;
    
        $cartItems = Cart::content();

        $mrwPrice = ShippingMethod::where('name', 'MRW')->first();
        $mrwPrice = $mrwPrice->price;

        $dollarPrice = Dolar::where('name', 'dollarBuy')->first();
        $dollarPrice = $dollarPrice->price;

        $addresses = Address::where('user_id', $user_id)->get();
        
        Session::flash('coupon', 'Cupón del 50% aplicado correctamente');

        return view('shipping', compact('cartItems', 'addresses','mrwPrice','dollarPrice'));

        } else {

            return redirect('/cart');
        }

        

        
        
    }



    public function createOrder(Request $request) {
        


            $messages = [
                'name.required' => 'Debes introducir tu nombre por favor',     
                'lastname.required' => 'Debes introducir tus apellidos por favor',
                'address2.required' => 'Debes introducir tu dirección exacta por favor',  
                'city.required' => 'Debes introducir tu ciudad por favor',
                'state.required' => 'Debes introducir estado por favor',
                'phone.required' => 'Debes introducir teléfono por favor',
                
              ];
    
    
            $validatedData = $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'address2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'phone' => 'required',
                
                
            ], $messages);

        
        $name = $request->name;
        $lastname = $request->lastname;
        $address2 = $request->address2;
        $city = $request->city;
        $state = $request->state;
        $phone = $request->phone;
        $email = $request->email;
        $saveAddressbook = $request->saveAddressbook;
        $shipping = $request->shipping;
                  
        $total = Cart::total();

     
        $total = str_replace(",","", $total);

        
        $user_id = Auth::id();

        if($total) {
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("user_id"=>$user_id,"status"=>"on_hold", "date"=>$date, 
            "del_date"=>$date, "price"=>$total,

            "name"=>$name,"lastname"=>$lastname,"address"=>$address2,
            "city"=>$city,"state"=>$state,"phone"=>$phone, "shipping"=>$shipping);

            // $created_order = DB::table('orders')->insert($newOrderArray);

            if(!empty($saveAddressbook)){
                $address = new Address;
                $addressArray = array("user_id"=>$user_id,"name"=>$name, "lastname"=>$lastname, 
                "address"=>$address2, "city"=>$city, "state"=>$state, "phone"=>$phone);
                $address->create($addressArray);
            }

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

        // Cart::destroy();
        //Session::flush();

        //Session::flash('order_success', 'Su orden esta casi completa, sólo falta el método de pago');

        return redirect('/product/payment')->with('success', 'Su orden esta casi completa, sólo falta el método de pago');


        } else {

        return redirect('/');

        }


        }

        

        

}
