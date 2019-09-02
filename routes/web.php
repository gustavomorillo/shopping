<?php
use App\Modal;
use App\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
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

Route::get('product/payment', 'PaymentController@index')->name('payment');
// Route::get('createAccount', )

Route::resource('/cart', 'CartController');
Route::get('cart/get/all', 'CartController@getAll')->name('getDataToAjax');


Route::resource('/wishlist', 'WishListController');
Route::get('wishlist/get/all', 'WishListController@getAll')->name('getDataToAjax');
//Wishlist products to defaultShopping Cart
Route::get('wishTodefault', 'WishListController@wishTodefault')->name('wishTodefault');


Route::post('/admin/shipping/{id}', 'Admin\AdminProductsController@shippingUpdate')->middleware('restrictToAdmin');
Route::get('/admin/shippingEdit/{id}', 'Admin\AdminProductsController@shippingEdit')->middleware('restrictToAdmin');
Route::post('/admin/dollar', 'Admin\AdminProductsController@dollarUpdate')->middleware('restrictToAdmin');
Route::get('/admin/dollar', 'Admin\AdminProductsController@dollarEdit')->middleware('restrictToAdmin');
Route::get('/admin/shipping', 'Admin\AdminProductsController@shipping')->middleware('restrictToAdmin');
Route::get('/admin/order_detail/{id}', 'Admin\AdminProductsController@order_detail')->middleware('restrictToAdmin');
Route::get('/admin/orders', 'Admin\AdminProductsController@orders')->middleware('restrictToAdmin');
Route::resource('/admin', 'Admin\AdminProductsController')->middleware('restrictToAdmin');


Route::get('search', 'ProductsController@search')->name('search-product');

//
Route::post('address', 'AccountController@address')->middleware('auth');//retrieve address for address book shipping page
Route::get('editAccount', 'AccountController@index')->name("editAccount")->middleware('auth');
Route::post('editAccount', 'AccountController@update')->name("updateAccount")->middleware('auth');


Route::get('reportPayment', 'PaymentController@reportPayment')->name("reportPayment")->middleware('auth');
Route::post('processPayment', 'PaymentController@processPayment')->name("processPayment")->middleware('auth');
Route::get('paymentHistory', 'PaymentController@paymentHistory')->name("paymentHistory")->middleware('auth');
Route::get('orderHistory', 'PaymentController@orderHistory')->name("orderHistory")->middleware('auth');


Route::resource('/addresses', 'AddressController')->middleware('auth');


Route::get('product/shippingProducts/', 'ProductsController@shippingProducts')->name('shippingProducts')->middleware('auth');
Route::post('discount/', 'ProductsController@discount')->name('discount')->middleware('auth');


Route::post('/newlogout','LogoutController@newLogout')->name('newLogout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//facebook or google socialite
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');




  
  