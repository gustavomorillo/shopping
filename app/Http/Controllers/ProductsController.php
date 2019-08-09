<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('allproducts', compact('products'));

    }

    public function show($id){
        
        $product = Product::find($id);
        
        return view('product', compact('product'));
    }  


}
