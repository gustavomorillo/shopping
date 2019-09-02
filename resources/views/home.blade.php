@extends('layouts.index')

@section('center')

@include('layouts.cart')
{{-- 

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a> --}}

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        hola
    </form>
{{-- </div> --}}


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mtext-109 cl2 p-b-30 py-2">Mi Cuenta</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success2'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success2') }}
                        </div>
                    @endif
                    
                    <h4 class="mtext-109 cl2 p-b-30 font35"> MI CUENTA <span class="stext-110 cl2 font30" >| BIENVENIDO, {{Auth::user()->name}}</span></h4>
                    <hr>

                    <a href="/editAccount"><div class="py-3">
                    <h4 class="mtext-109 cl2 p-b-17 "><i class="far fa-user font35"></i>&nbsp;&nbsp;&nbsp; Información Personal </h4><span class="stext-110 cl2 " > Muestra o actualiza tu información personal</span><br>
                    </div></a>
                    <hr>


                    <a href="{{route('wishlist.index')}}">
                    <div class="py-3">
                    <h4 class="mtext-109 cl2 p-b-17 "><i class="far fa-heart font35"></i>&nbsp;&nbsp;&nbsp;Lista de deseos </h4>
                    <span class="stext-110 cl2 " > Visualiza y modifica productos de tu lista de deseos</span><br>
                    </div>
                    </a>
                    <hr>
                    

                    <a href="{{route('addresses.index')}}">
                    <div class="py-3">
                    <h4 class="mtext-109 cl2 p-b-17 "><i class="far fa-address-book font35"></i>&nbsp;&nbsp;&nbsp;Direcciones </h4>
                    <span class="stext-110 cl2 " >Administra tus direcciones de envío</span><br>
                    </div>
                    </a>
                     
                    <hr>
                    
                    
                    <a href="{{route('orderHistory')}}">
                    <div class="py-3">
                    <h4 class="mtext-109 cl2 p-b-17 "><i class="far fa-calendar-check font35"></i>&nbsp;&nbsp;&nbsp;Historial de órdenes </h4>
                    <span class="stext-110 cl2 " >Revisa el estatus de tus órdenes ó visualiza tus ordenes pasadas</span><br>
                    </div>
                    </a>
                    <hr>
                   

                    <a href="{{route('reportPayment')}}">
                    <div class="py-3">
                    <h4 class="mtext-109 cl2 p-b-17 "><i class="far fa-money-bill-alt font35"></i>&nbsp;&nbsp;&nbsp;Reportar Pago </h4>
                    <span class="stext-110 cl2 " >Reporta el pago de tu orden</span><br>
                    </div>
                    </a>
                    <hr>

                    <a href="{{route('paymentHistory')}}">
                    <div class="py-3">
                    <h4 class="mtext-109 cl2 p-b-17 "><i class="fas fa-file-invoice-dollar font35"></i>&nbsp;&nbsp;&nbsp;Historial de Pagos </h4>
                    <span class="stext-110 cl2 " >Revisa el historial y el status de tus pagos</span><br>
                    </div>
                    </a>
                    <hr>
                    
                
                    



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
