<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ImportShoppingCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $user = $event->user;

        $user_id = $user->id;
        Cart::restore($user_id);
        $wish_userid = $user_id + 1000000;
        Cart::instance('wishlist')->restore($wish_userid);


    }
}
