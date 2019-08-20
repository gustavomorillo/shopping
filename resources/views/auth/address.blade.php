@extends('layouts.index')

@section('center')
@include('layouts.cart')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mtext-109 cl2 p-b-30 py-2">{{ __('Direcciones') }}</div>
                        <div class="gus1">
                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Crear nueva Dirección
                            </button>
                        </div>
                        <div class="col-sm-10 col-lg-8 col-xl-8 m-lr-auto m-b-50">    
                              @foreach($addresses as $address)
                                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                                  <h4 class="mtext-109 cl2 p-b-30">
                                        {{$address->city}}
                                  </h4>
                              
                                  <div class="flex-w flex-t  p-b-13">
                                    <div class="size-007">
                                      <span class="stext-110 cl2">
                                       {{$address->name}} {{$address->lastname}} <br>
                                       {{$address->address}}<br>
                                       {{$address->city}}, {{$address->state}} <br>
                                       {{$address->phone}} 
                                      </span>
                                      <br>
                                      <a href="addresses/{{$address->id}}/edit"><span class="mtext-109 cl2 p-b-30" style="text-decoration:underline">Editar</span></a>
                                      <a href=""><span class="mtext-109 cl2 p-b-30" style="text-decoration:underline">| Eliminar</span></a>
                                      </h4>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
