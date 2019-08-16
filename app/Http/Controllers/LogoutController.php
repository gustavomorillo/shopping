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
        Session::flush();
        Auth::logout();
        return Redirect('/');

    }
}
