<?php

namespace App\Http\Controllers;
use Auth;
use App\Address;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = Auth::id();

        $addresses = Address::all()->where('user_id', $user_id);

        $cartItems = Cart::content();
        

        return view('auth.address', compact('addresses', 'cartItems'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartItems = Cart::content();
        return view('auth.createAddress', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Debes introducir tu nombre por favor',     
            'lastname.required' => 'Debes introducir tus apellidos por favor',
            'address.required' => 'Debes introducir tu dirección exacta por favor',  
            'city.required' => 'Debes introducir tu ciudad por favor',
            'state.required' => 'Debes introducir estado por favor',
            'phone.required' => 'Debes introducir teléfono por favor',
            
          ];
        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
        ], $messages);

        $input = $request->all();
        $address = new Address;
        $address->create($input);

        return redirect('addresses')->with('success', 'Nueva dirección creada satisfactoriamente');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      


        $address = Address::find($id);

        $cartItems = Cart::content();

        return view('auth.editAddress', compact('address', 'cartItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Debes introducir tu nombre por favor',     
            'lastname.required' => 'Debes introducir tus apellidos por favor',
            'address.required' => 'Debes introducir tu dirección exacta por favor',  
            'city.required' => 'Debes introducir tu ciudad por favor',
            'state.required' => 'Debes introducir estado por favor',
            'phone.required' => 'Debes introducir teléfono por favor',
            
          ];
        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
        ], $messages);

        $input = $request->all();

        $address = Address::find($id);

        $address->update($input);

        return redirect('addresses')->with('success3', 'Dirección actualizada satisfactoriamente');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()->with('success2', 'Dirección eliminada satisfactoriamente');
    }
}
