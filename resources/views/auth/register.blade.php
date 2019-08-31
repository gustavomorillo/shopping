@extends('layouts.index')

@section('center')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mtext-109 cl2 p-b-30 py-2">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row py-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row py-2">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="phone" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="stext-111 cl6 p-t-2">Ejemplo: 0412-1234567</p>
                            </div>
                        </div>

                        
                            <div class="form-group row py-2">
                              <label class="col-md-4 col-form-label text-md-right stext-110 cl2" for="inlineFormCustomSelect">Género</label>
                              <div class="col-md-6">
                              <select class="form-control @error('gender') is-invalid @enderror"  id="gender" name="gender" >
                                <option selected value="">Seleccione</option>
                                <option value="female">Femenino</option>
                                <option value="male">Masculino</option>
                              </select>
                              
                              </div>
                            </div>


                            
                        <div class="form-group row py-2">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="text" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="stext-111 cl6 p-t-2">Ejemplo: 17/02/1986</p>
                            </div>
                        </div>
                        

                        <div class="form-group row py-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Confirme Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            
                                <div class="col-md-6 offset-md-4">
    
                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITE_KEY')}}"></div>
                                    @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>



                        
                        <div class="form-group row py-2 ">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right stext-110 cl2"></label>

                            <div class="col-md-6">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:200px">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>

{{-- 

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:300px">
							Continuar
						</button> --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
