<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;


class LogoutController extends Controller
{
    public function newLogout()
    {

        $user_id = Auth::user()->id;
        Cart::store($user_id);
        $wish_userid = $user_id + 1000000;
        Cart::instance('wishlist')->store($wish_userid);
        Session::flush();
        Auth::logout();
        return Redirect('/');

    }
}
