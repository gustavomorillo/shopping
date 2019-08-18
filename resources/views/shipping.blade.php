@extends('layouts.index')

@section('center')



	<!-- Cart -->
@include('layouts.cart')


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Inicio
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Envío
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85" >
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-7 m-lr-auto m-b-50">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        

					<h4 class="mtext-109 cl2 p-b-30">Dirección de Envío </h4><p class="text-right" style="color:red">*requerido</p>
					
						<div>
							@if(count($addresses) > 0)

							<form id="addressesForm" method="post">

								@csrf
								<label class="stext-110 cl2" >Selecciona una dirección</label>
								
									<select name="selectAddress" id="selectAddress" form="addressesForm" class="form-control">
											@foreach($addresses as $address)
									<option value="{{$address->address}}" data-id="{{$address->id}}">{{$address->address}}</option>
											@endforeach
									</select>
								</form>
							
							@endif
							
						</div>
						<form class="" action="{{route('createOrder')}}">
							@csrf
            <div class="form-group">
                <label for="name" class="stext-110 cl2">Nombre* </label>
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{ old('name') }}">
              </div>

            <div class="form-group">
              <label for="lastname" class="stext-110 cl2">Apellidos* </label>
              <input type="text" class="form-control" id="lastname" placeholder="" name="lastname" value="{{ old('lastname') }}">
            </div>

            <div class="form-group">
              <label for="address2" class="stext-110 cl2">Dirección Exacta(Municipio, Parroquia, etc..)* </label>
              <input type="text" class="form-control" id="address2" placeholder="" name="address2" value="{{ old('address') }}">
            </div>

            <div class="form-group">
                <label for="city" class="stext-110 cl2">Ciudad* </label>
                <input type="text" class="form-control" id="city" placeholder="" name="city" value="{{ old('city') }}">
              </div>

              <div class="form-group" >
                  <label for="state" class="stext-110 cl2">Estado* </label>
                  <input type="text" class="form-control" id="state" placeholder="" name="state" value="{{ old('state') }}">
                </div>
      
                <div class="form-group" >
                    <label for="phone" class="stext-110 cl2">Teléfono* </label>
                    <input type="text" class="form-control" id="phone" placeholder="" name="phone" value="{{ old('phone') }}">
									</div>
									
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="saveAddressbook" name="saveAddressbook">
										<label class="form-check-label" for="saveAddressbook">Añadir a mi libreta de direcciones</label>
									</div>
                  

                <hr>


                <h4 class="mtext-109 cl2 p-b-30">Método de Envío</h4>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="shipping" value="mrw" checked >
                    <label class="form-check-label stext-110 cl2" for="shipping">
                      MRW
                    </label>
                  </div>

                  <p class="stext-111 cl6 p-t-2">
                     Tiempo de entrega 48 horas
                    </p>

                    <br>
                    <hr>

                    <a href="">
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:300px">
							Continuar
						</button>
					</a>	
                  
					
				</div>

					@include('layouts.shippingMethods')


			</div>
		</div>
	</form>
		
	@endsection
