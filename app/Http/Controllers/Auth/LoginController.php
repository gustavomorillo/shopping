<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated()
    {
        $user_id = Auth::user()->id;
        Cart::restore($user_id);
        $wish_userid = $user_id + 1000000;
        Cart::instance('wishlist')->restore($wish_userid);
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        if ($service == 'google') {
            $userSocial = Socialite::driver($service)->stateless()->user();
        } else {
            $userSocial = Socialite::driver($service)->user();
        }
        

        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            $user_id = Auth::user()->id;
            Cart::restore($user_id);
            $wish_userid = $user_id + 1000000;
            Cart::instance('wishlist')->restore($wish_userid);
            return redirect('/');
        } else {

            $user = new User;
            $user->lastname = $userSocial->name;
            $user->phone = $userSocial->name;
            $user->gender = $userSocial->name;
            $user->birthdate = '27/01/1986';
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();

            Auth::login($user);
            return redirect('/');
        }


        
    }

   
    


}
