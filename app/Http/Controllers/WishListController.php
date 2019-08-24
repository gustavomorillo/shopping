<?php

namespace App\Http\Controllers;
use Session;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cart::instance('wishlist');

        // Get the content of the 'wishlist' cart
        $cartItemsw = Cart::content();

        Cart::instance('default');
        $cartItems = Cart::content();

        return view('wishlist', compact('cartItemsw', 'cartItems'));
    }



    public function getAll(Request $request)
    {
        // subtotal item, subtotal of all and total amount of shopping cart
        // is returned to footer.blade.php in ajax where is displayed in shopping-cart.blade.php 
        Cart::instance('wishlist');
        $qty = $request->newqty;
        $rowId = $request->rowId;
        Cart::update($rowId, $qty);

        $cartItems = Cart::content();
        $total = Cart::total(0,',','.');

        $oneItem= Cart::get($rowId);
        $subtotalOneItem = $oneItem->subtotal(0,',','.');
        $subtotal = Cart::subtotal(0,',','.');

        $updateData = [$subtotalOneItem, $subtotal , $total];




        return response()->json($updateData);
        
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validatedData = $request->validate([
            'size' => 'required',
            'color' => 'required' 
        ]);

        $product = $request->all();

        $newPrice1 = str_replace(".", "", $product['price']);
        $newPrice1 = str_replace("Bs", "", $newPrice1);
        $price = intval($newPrice1);



        Cart::instance('wishlist')->add($id, $product['name'], $product['qty'], $price, $product['weight'],['size'=>$product['size'], 'color' => $product['color'], 'image'=>$product['image']])->associate('App\Product');;
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
        Cart::instance('wishlist');
        $rowId = $request->rowId;
        Cart::remove($rowId);
    }

    
    //Move wishlist items to default shopping cart list
    public function wishTodefault()
    {
        Cart::instance('wishlist');

        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            $id = $cartItem->id;
            $name = $cartItem->name;
            $qty = $cartItem->qty;
            $price = $cartItem->price;
            $weight = $cartItem->weight;
            $size = $cartItem->options->size;
            $color = $cartItem->options->color;
            $image = $cartItem->options->image;

            Cart::instance('default')->add($id, $name, $qty, $price, $weight,['size'=>$size, 'color' => $color, 'image'=>$image])->associate('App\Product');

            Cart::instance('wishlist')->destroy();

            return redirect()->back();
            
        }
    }
}
