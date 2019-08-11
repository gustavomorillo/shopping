<?php

namespace App\Http\Controllers;

use Session;
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

        public function createOrder(Request $request) {
                  
        $total = Cart::total();

     
        $total = str_replace(",","", $total);



        if($total) {
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("status"=>"on_hold", "date"=>$date, "del_date"=>$date, "price"=>$total);
            $created_order = DB::table('orders')->insert($newOrderArray);
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
        Session::flush();

        Session::flash('order_success', 'Muchas gracias por tu compra !!');

        return redirect('/');

        // CREAR SESSION desuscefully created

        } else {

        return redirect('/');

        }


    }

}
