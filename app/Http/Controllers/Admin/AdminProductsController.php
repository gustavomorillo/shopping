<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class AdminProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.displayProducts', compact('products'));
    }

     /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

    public function edit($id){

        $product = Product::find($id);
        
        return view('admin.adminProduct', compact('product'));
    }
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
 
     /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
     public function update(Request $request, $id)
     {
         
         $input = [];
         $input_modal = [];

         $input['name']  = $request->name;
         $input['description'] = $request->description;
         $input['price'] = $request->price;
         $input['image'] = $request->image;
         $input['modal_name'] = $request->modal_name;

         $product = Product::findOrFail($id);
         $product->update($input);
         
         $input_modal['name']  = $request->modal_name2;
         $input_modal['second_name'] = $request->second_name;
         $input_modal['image1'] = $request->image1;
         $input_modal['image2'] = $request->image2;
         $input_modal['image3'] = $request->image3;



         

         DB::table('modals')
                ->where('product_id', $id)
                ->update($input_modal);

         return redirect()->back();
         

     }
 
     /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
     public function destroy($id)
     {
         //
     }
 
 
}

