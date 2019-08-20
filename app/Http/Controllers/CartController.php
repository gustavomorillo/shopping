<?php

namespace App\Http\Controllers;
use Auth;

use Session;
use App\Dolar;
use App\Product;
use App\ShippingMethod;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // set tax to value of 0

        Cart::setGlobalTax(0);
        //Store products in database base in user id
        $cartItems = Cart::content();

        $mrwPrice = ShippingMethod::where('name', 'MRW')->first();

        $mrwPrice = $mrwPrice->price;

        $dollarPrice = Dolar::where('name', 'dollarBuy')->first();
        $dollarPrice = $dollarPrice->price;

        
        
        return view('shopping-cart', compact('cartItems', 'mrwPrice','dollarPrice'));
    }


    public function getAll(Request $request)
    {
        // subtotal item, subtotal of all and total amount of shopping cart
        // is returned to footer.blade.php in ajax where is displayed in shopping-cart.blade.php 

        $qty = $request->newqty;
        $rowId = $request->rowId;
        Cart::update($rowId, $qty);

        $mrwPriceBs = ShippingMethod::where('name', 'MRW')->first();
        $mrwPriceBs = $mrwPriceBs->price;
        $cartItems = Cart::content();
        $total = Cart::total(0,',','');
        $total = $total + $mrwPriceBs;
         
        $total = number_format($total, 0, ',', '.');



        $dollarPrice = Dolar::find(1);
        $dollarPrice = $dollarPrice->price;
        $totalDollar = Cart::total(0);
        $mrwPrice = ShippingMethod::where('name', 'MRW')->first();
        $mrwPrice = $mrwPrice->price;
        $mrwPrice = $mrwPrice/$dollarPrice;


        $totalDollar = str_replace(",", "", $totalDollar);
        $totalDollar = ($totalDollar/$dollarPrice)+$mrwPrice;
        $totalDollar = number_format($totalDollar, 2, '.', ',');



        $oneItem= Cart::get($rowId);
        $subtotalOneItem = $oneItem->subtotal(0,',','.');
        $subtotal = Cart::subtotal(0,',','.');

        $updateData = [$subtotalOneItem, $subtotal , $total, $totalDollar];




        return response()->json($updateData);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // Add item to the cart
        // Validate that size and color is required and add the item to the cart
        

        $messages = [
            'size.required' => 'Debes seleccionar una talla por favor',     
            'color.required' => 'Debes seleccionar un color por favor'
          ];


        $validatedData = $request->validate([
            'size' => 'required',
            'color' => 'required'
            
        ], $messages);
        
        $product = $request->all();



        $newPrice1 = str_replace(".", "", $product['price']);
        $newPrice1 = str_replace("Bs", "", $newPrice1);
        $price = intval($newPrice1);

       
        


        Cart::add($id, $product['name'], $product['qty'], $price, 
        $product['weight'],['size'=>$product['size'], 'color' => $product['color'], 
        'image'=>$product['image']]);


        //return response()->json($product['name']);
        // $product = Product::find($id);
    
        // $price = (int) str_replace(" Bs","",$product->price);

        

        // return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            
      
            // this function is for update a specific item in shopping cart ,
            // this function is called in footer.blade.php and executed in shopping-cart.blade.php

            $qty = $request->newqty;
            $proId = $request->proId;
            $rowId = $request->rowId;
            return response()->json($rowId);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $rowId = $request->rowId;
        Cart::remove($rowId);
    }
}
