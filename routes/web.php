<?php
use App\Modal;
use App\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', ['uses'=>'ProductsController@index', "as" => "allProducts"]);

Route::get('product/addtocart/{id}', ['uses'=>'ProductsController@addProductToCart','as'=>'AddToCartProduct']);

Route::resource('/cart', 'CartController');

Route::get('cart/get/all', 'CartController@getAll')->name('getDataToAjax');

Route::get('products/{id}', 'ProductsController@show')->name('getOneProduct');

Route::get('wishlist', 'CartController@wishlist')->name('wishlist');