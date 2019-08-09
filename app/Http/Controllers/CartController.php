<?php

namespace App\Http\Controllers;
use Session;
use App\Product;
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
        
        // Session::flush();

        // set tax to value of 0
        Cart::setGlobalTax(0);
        $cartItems = Cart::content();
        
        return view('shopping-cart', compact('cartItems'));
    }


    public function getAll(Request $request)
    {
        // subtotal item, subtotal of all and total amount of shopping cart
        // is returned to footer.blade.php in ajax where is displayed in shopping-cart.blade.php 

        $qty = $request->newqty;
        $rowId = $request->rowId;
        Cart::update($rowId, $qty);

        $cartItems = Cart::content();
        $total = Cart::total();

        $oneItem= Cart::get($rowId);
        $subtotalOneItem = $oneItem->subtotal;
        $subtotal = Cart::subtotal();

        $updateData = [$subtotalOneItem, $subtotal , $total];




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

        // Validate that size and color is required and add the item to the cart

        $validatedData = $request->validate([
            'size' => 'required',
            'color' => 'required'
            
        ]);

        
        $product = $request->all();


        Cart::add($id, $product['name'], $product['qty'], $product['price'], $product['weight'],['size'=>$product['size'], 'color' => $product['color'], 'image'=>$product['image']]);



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
