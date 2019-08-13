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

Route::get('/', ['uses'=>'ProductsController@index', "as" => "allProducts"]);


Route::get('products', ['uses'=>'ProductsController@index', "as" => "allProducts"]);
Route::get('products/{id}', 'ProductsController@show')->name('getOneProduct');
Route::get('/women', 'ProductsController@womenProducts')->name('womenProducts');
Route::get('/men', 'ProductsController@menProducts')->name('menProducts');
Route::get('product/createorder', 'ProductsController@createOrder')->name('createOrder');
Route::get('product/checkoutProducts/', 'ProductsController@checkoutProducts')->name('checkoutProducts');
Route::get('product/payment', 'PaymentController@index')->name('payment');
// Route::get('createAccount', )

Route::resource('/cart', 'CartController');
Route::get('cart/get/all', 'CartController@getAll')->name('getDataToAjax');


Route::resource('/wishlist', 'WishListController');
Route::get('wishlist/get/all', 'WishListController@getAll')->name('getDataToAjax');
//Wishlist products to defaultShopping Cart
Route::get('wishTodefault', 'WishListController@wishTodefault')->name('wishTodefault');


Route::resource('/admin', 'Admin\AdminProductsController')->middleware('restrictToAdmin');


Route::get('search', 'ProductsController@search')->name('search-product');



Route::get('editAccount', 'AccountController@index')->name("editAccount")->middleware('auth');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


