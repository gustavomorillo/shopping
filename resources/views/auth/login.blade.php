@extends('layouts.index')

@section('center')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header mtext-109 cl2 p-b-30 py-2">{{ __('Entrar a mi Cuenta') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-6 offset-md-4">

                                <div class="g-recaptcha"   data-sitekey="{{env('CAPTCHA_SITE_KEY')}}"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:200px">
                                            Entrar
                                        </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link stext-111 cl6 p-t-2" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="card">
                    <div class="card-header mtext-109 cl2 p-b-30 py-2">{{ __('Nuevos Clientes') }}</div>
    
                   
    
                            <div class="form-group row ">
                                    <p class="stext-111 cl6 p-t-2 px-5 py-3">Crear una cuenta es muy sencillo. Solo llena el formulario y disfruta de los beneficios de ser un cliente registrado.</p>
                                <div class="col-md-6 offset-md-3">

                                        
                                    <a href="/register">
                                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer btn-lg" >
                                                Crear Cuenta
                                            </button></a>
                                </div>
                                
                            </div>
                        
                    </div>
                </div>
        

    </div>
</div>
@endsection
