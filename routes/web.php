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
Route::get('products/{id}', 'ProductsController@show')->name('getOneProduct');


Route::resource('/cart', 'CartController');
Route::get('cart/get/all', 'CartController@getAll')->name('getDataToAjax');

Route::resource('/wishlist', 'WishListController');
Route::get('wishlist/get/all', 'WishListController@getAll')->name('getDataToAjax');

Route::get('wishTodefault', 'WishListController@wishTodefault')->name('wishTodefault');


// Route::get('admin/products', 'Admin\AdminProductsController@index')->name('adminDisplayProducts');
// Route::get('admin/{id}/adminproduct', 'Admin\AdminProductsController@edit')->name('editProduct');

Route::resource('/admin', 'Admin\AdminProductsController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
