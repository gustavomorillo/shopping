<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

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

        $products = Product::where('category', 'men')->get();
        return view('menProducts', compact('products'));
    
    }
    
    public function womenProducts() {
    
        $products = Product::where('category', 'women')->get();
        return view('womenProducts', compact('products'));
    }


}
