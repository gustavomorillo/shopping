<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Modal;
use App\Dolar;
use App\Order;
use App\Product;
use App\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class AdminProductsController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
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
        
        return view('admin.editProduct', compact('product'));
    }
    public function create()
    {
        return view('admin.createProduct');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'color' => 'required|string',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'image' => 'required|file',
            'image1' => 'required|file',
            'image2' => 'required|file',
            'image3' => 'required|file',
            
        ]);

        
        //get the last ID of products table for modal name field
        
        $lastProduct = DB::table('products')
                ->orderBy('id', 'desc')
                ->first();


            if($lastProduct == null) {
                $lastId = 1;
            } else {
                $lastId = $lastProduct->id + 1;
            }
        
                


        //Save image in public folder
         if($file = $request->file('image')){
            $name_image = time() . $file->getClientOriginalName();
            $file->move('images', $name_image);
        }

         $input = [];
         $input_modal = [];

         //request all fields of createProduct.blade.php 

         $input['name']  = $request->name;
         $input['description'] = $request->description;
         $input['price'] = $request->price;
         $input['color'] = $request->color;
         $input['image'] = $name_image;
         $input['modal_name'] = 'js-show-modal'. $lastId;
         $input['category'] = $request->category;
         $input['subcategory'] = $request->subcategory;
         $input['sqty'] = $request->sqty;
         $input['mqty'] = $request->mqty;
         $input['lqty'] = $request->lqty;
         

        if($request->s){
            $input['s'] = $request->s;
        }
        if($request->m){
            $input['m'] = $request->m;
        }
        if($request->l){
            $input['l'] = $request->l;
        }

         $product = new Product();

         //take ID from the product created to use when creating Modal
         $id = $product->create($input)->id;

         if($file1 = $request->file('image1')){
            $image1 = time() . $file1->getClientOriginalName();
            $file1->move('images', $image1);
        }
        if($file2 = $request->file('image2')){
            $image2 = time() . $file2->getClientOriginalName();
            $file2->move('images', $image2);
        }
        if($file3 = $request->file('image3')){
            $image3 = time() . $file3->getClientOriginalName();
            $file3->move('images', $image3);
        }

        

         $input_modal['name']  = 'js-modal' . $id;
         $input_modal['second_name'] = 'js-hide-modal' . $id;
         $input_modal['image1'] = $image1;
         $input_modal['image2'] = $image2;
         $input_modal['image3'] = $image3;
         $input_modal['product_id'] = $id;

         $modal = new Modal();

         $modal->create($input_modal);
        
         
         return redirect('/admin');




       



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

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'color' => 'required|string',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'modal_name' => 'required|string',
            'modal_name2' => 'required|string',
            'second_name' => 'required|string',
            
            
        ]);

        $input = [];
        $input_modal = [];

            if($file = $request->file('image')){
                $name_image = time() . $file->getClientOriginalName();
                $file->move('images', $name_image);
                $input['image'] = $name_image;
            }

            if($file = $request->file('image1')){
                $name_image1 = time() . $file->getClientOriginalName();
                $file->move('images', $name_image1);
                $input_modal['image1'] = $name_image1;
            }

            if($file = $request->file('image2')){
                $name_image2 = time() . $file->getClientOriginalName();
                $file->move('images', $name_image2);
                $input_modal['image2'] = $name_image2;
            }

            if($file = $request->file('image3')){
                $name_image3 = time() . $file->getClientOriginalName();
                $file->move('images', $name_image3);
                $input_modal['image3'] = $name_image3;
            }

            $input['name']  = $request->name;
            $input['description'] = $request->description;
            $input['price'] = $request->price;
            $input['color'] = $request->color;
            $input['modal_name'] = $request->modal_name;
            $input['category'] = $request->category;
            $input['subcategory'] = $request->subcategory;
            $input['sqty'] = $request->sqty;
            $input['mqty'] = $request->mqty;
            $input['lqty'] = $request->lqty;

            if($request->s == null) {
                $input['s'] = 0;
            } else {
                $input['s'] = 1;
            }
            if($request->m == null) {
                $input['m'] = 0;
            } else {
                $input['m'] = 1;
            }
            if($request->l == null) {
                $input['l'] = 0;
            } else {
                $input['l'] = 1;
            }

            $product = Product::findOrFail($id);
            $product->update($input);

            $input_modal['name']  = $request->modal_name2;
            $input_modal['second_name'] = $request->second_name;

            DB::table('modals')
                    ->where('product_id', $id)
                    ->update($input_modal);
            
            Session::flash('product_updated', 'The product has been updated');
            return redirect('/admin');



         
         

     }
 
     /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
     public function destroy($id)
     {
        $product = Product::find($id);

        if(file_exists(public_path() . '/images/' . $product->image)){
            unlink(public_path() . '/images/' . $product->image);
        }   

        $modal = Modal::where('product_id', $id);
        if(file_exists(public_path() . '/images/' . $product->modal->image1)){
            unlink(public_path() . '/images/' . $product->modal->image1);
        } 
        if(file_exists(public_path() . '/images/' . $product->modal->image2)){
            unlink(public_path() . '/images/' . $product->modal->image2);
        } 
        if(file_exists(public_path() . '/images/' . $product->modal->image3)){
            unlink(public_path() . '/images/' . $product->modal->image3);
        } 

        $modal->delete();
        $product->delete();


        Session::flash('product_deleted', 'The product has been deleted');

        return redirect()->back();


     }

     public function orders(){

        $orders = Order::orderBy('order_id', 'desc')->get();

        return view('admin.orders', compact('orders'));

    }
    
    public function order_detail($id){

        $orders_details = DB::table('order_items')->where('order_id', $id)->get();

        return view('admin.order_details', compact('orders_details'));

    }

    public function shipping(){

        $shipping = ShippingMethod::all();

        $dollarPrice = Dolar::where('name','dollarBuy')->first();
        $dollarBuy = $dollarPrice->price;

        $dollarSell = Dolar::where('name','dollarSell')->first();
        $dollarSell= $dollarSell->price;

        return view('admin.shipping', compact('shipping', 'dollarBuy', 'dollarSell'));

    }
    public function dollarEdit(){

        $dollarBuy = Dolar::where('name','dollarBuy')->first();
        $dollarBuy = $dollarBuy->price;

        $dollarSell = Dolar::where('name','dollarSell')->first();
        $dollarSell= $dollarSell->price;

        return view('admin.dollarEdit', compact('dollarBuy','dollarSell'));
    }

    public function dollarUpdate(Request $request){

        

        $dollarBuy = Dolar::find(1);
        $dollarBuy->price = $request->dollarBuy;
        
        $dollarBuy->update();

        $dollarSell = Dolar::find(2);
        $dollarSell->price = $request->dollarSell;
        
        $dollarSell->update();

        return redirect('/admin/shipping');        
    }

    public function shippingEdit($id){

        $shipping = ShippingMethod::find($id);

        return view('admin.shippingEdit', compact('shipping'));
    }

    public function shippingStore($id){

        $shipping = ShippingMethod::find($id);

        return view('admin.shippingEdit', compact('shipping'));
    }

    public function shippingUpdate(Request $request, $id){

        $shipping = ShippingMethod::find($id);
        $shipping->price = $request->shippingPrice;
        
        $shipping->update();


        return redirect('/admin/shipping');        
    }
    
    
 
 
}

