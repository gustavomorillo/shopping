<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Modal;
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
         $input['image'] = $name_image;
         $input['modal_name'] = 'js-show-modal'. $lastId;
         $input['type'] = $request->type;


         
        

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
            $input['modal_name'] = $request->modal_name;
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
        unlink(public_path() . '/images/' . $product->image);

        $modal = Modal::where('product_id', $id);
        unlink(public_path() . '/images/' . $product->modal->image1);
        unlink(public_path() . '/images/' . $product->modal->image2);
        unlink(public_path() . '/images/' . $product->modal->image3);
        $modal->delete();
        $product->delete();


        Session::flash('product_deleted', 'The product has been deleted');

        return redirect()->back();


     }
 
 
}

