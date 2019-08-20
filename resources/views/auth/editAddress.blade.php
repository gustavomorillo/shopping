
@extends('layouts.index')

@section('center')
@include('layouts.cart')
<div class="container">
    <div class="row justify-content-center">


<div class="col-lg-6 col-xl-7 m-lr-auto m-b-50">



  <h4 class="mtext-109 cl2 p-b-30">Editar Dirección </h4><p class="text-right" style="color:red">*requerido</p>
  
   
<form action="/addresses/{{$address->id}}" method="post">
      @csrf
      {{method_field('PATCH')}}
  <input type="hidden" name="user_id" value="{{$address->user_id}}">
    <div class="form-group">
        <label for="name" class="stext-110 cl2">Nombre* </label>
    <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$address->name}}">
      </div>

    <div class="form-group">
      <label for="lastname" class="stext-110 cl2">Apellidos* </label>
      <input type="text" class="form-control" id="lastname" placeholder="" name="lastname" value="{{$address->lastname}}">
    </div>

    <div class="form-group">
      <label for="address2" class="stext-110 cl2">Dirección Exacta(Municipio, Parroquia, etc..)* </label>
      <input type="text" class="form-control" id="address2" placeholder="" name="address" value="{{$address->address}}">
    </div>

    <div class="form-group">
        <label for="city" class="stext-110 cl2">Ciudad* </label>
        <input type="text" class="form-control" id="city" placeholder="" name="city" value="{{$address->city}}">
      </div>

      <div class="form-group" >
          <label for="state" class="stext-110 cl2">Estado* </label>
          <input type="text" class="form-control" id="state" placeholder="" name="state" value="{{$address->state}}">
        </div>

        <div class="form-group" >
            <label for="phone" class="stext-110 cl2">Teléfono* </label>
            <input type="text" class="form-control" id="phone" placeholder="" name="phone" value="{{$address->phone}}">
          </div>
        <br>
        <hr>

            <a href="">
    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:300px">
      Actualizar
    </button>
  </a>	
</form>
          
  

        </div>

     
    </div>
</div>
@endsection