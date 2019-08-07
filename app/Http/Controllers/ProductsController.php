<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('allproducts', compact('products'));

    }

    public function show($id){


        

    }


  
}
