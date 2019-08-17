<?php

namespace App\Http\Controllers;
use Auth;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class AccountController extends Controller
{
    public function index() {
        return view('auth.editAccount');
    }

    public function update(request $request){

        $user = Auth::user();

        $messages = [
            'name.required'=> 'El nombre es requerido',
            'lastname.required'=> 'El apellido es requerido',
            'phone.required'=> 'El teléfono es requerido',
            'gender.required'=> 'El genéro es requerido',
            'birthdate.required'=> 'La fecha de nacimiento es requerida',
            'birthdate.date_format' => 'El formato ingresado no es correcto',
            'email.unique' => 'El correo ya se encuentra registrado',     
            'email.required' => 'El correo es requerido',
            'email.email' => 'Formato de correo invalido',
            'password.confirmed' => 'Las contraseñas no coinciden'
          ];


          $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date_format:d/m/Y', 'max:255'],
            'email' => [
                'email','max:255','string','email','required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => ['string', 'min:8', 'confirmed','sometimes','nullable'],
        ], $messages)->validate();


        if(!$request->password == null){
            $data = $request->all();
            $data['password'] = bcrypt($request->get('password'));
        } else {
            $data = $request->except(['password','password_confirmation']);
        }

        $user->update($data);

        return redirect('/home');

    }

    public function address(Request $request){

        
        $id = $request->id;

        $address = Address::find($id);

        return response()->json($address);
    }


}
