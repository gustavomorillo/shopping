
@extends('layouts.index')

@section('center')
@include('layouts.cart')
<div class="container">
    <div class="row justify-content-center">


<div class="col-lg-6 col-xl-7 m-lr-auto m-b-50">



  <h4 class="mtext-109 cl2 p-b-30">Crear Dirección </h4><p class="text-right" style="color:red">*requerido</p>
  
   
<form action="/addresses" method="post">
      @csrf
<input type="hidden" value="{{Auth::id()}}" name="user_id">

    <div class="form-group">
        <label for="name" class="stext-110 cl2">Nombre* </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
    @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

    <div class="form-group">
      <label for="lastname" class="stext-110 cl2">Apellidos* </label>
      <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" placeholder="" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>
      @error('lastname')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="address" class="stext-110 cl2">Dirección Exacta(Municipio, Parroquia, etc..)* </label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
      @error('address')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="form-group">
        <label for="city" class="stext-110 cl2">Ciudad* </label>
        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="" name="city" value="{{ old('city') }}" autocomplete="city" autofocus>
        @error('city')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>

      <div class="form-group" >
          <label for="state" class="stext-110 cl2">Estado* </label>
          <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="" name="state" value="{{ old('state') }}" autocomplete="state" autofocus>
          @error('state')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
        </div>

        <div class="form-group" >
            <label for="phone" class="stext-110 cl2">Teléfono* </label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
            @error('phone')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
          </div>
        <br>
        <hr>

            <a href="">
    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:300px">
      Crear Dirección
    </button>
  </a>	
</form>
          
  

        </div>

     
    </div>
</div>
@endsection