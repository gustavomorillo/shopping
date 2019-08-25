@extends('layouts.index')

@section('center')

@include('layouts.cart')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mtext-109 cl2 p-b-30 py-2">{{ __('Reportar Pago') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('processPayment') }}" id="payment">
                        @csrf
                    <input type="hidden" value="{{Auth::id()}}" name="user_id">


                        <div class="form-group row py-2">
                            <label for="paymentType" class="col-md-4 col-form-label text-md-right stext-110 cl2"></label>

                            <div class="col-md-6">
                                

                                <select class="custom-select col-md-6 col-form-label text-md-right stext-110 cl2 @error('paymentType') is-invalid @enderror" id="paymentType" name="paymentType" form="payment" >
                                    <option selected value="">Tipo de pago</option>
                                    <option value="transferencia">Transferencia</option>
                                    <option value="deposito">Depósito</option>
                                    <option value="pagomovil">Pago Móvil</option>
                                    <option value="payoneer">Payoneer</option>
                                    <option value="paypal">Paypal</option>
                                  </select>
                                  @error('paymentType')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror


                            </div>
                        </div>
                        <div class="form-group row py-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right stext-110 cl2"></label>

                            <div class="col-md-6">
                                

                                <select class="custom-select col-md-6 col-form-label text-md-right stext-110 cl2 @error('bank') is-invalid @enderror" id="bank" name="bank" form="payment" >
                                  

                                    <option selected value="">Banco</option>
                                    <option value="banesco">Banesco</option>
                                    <option value="mercantil">Mercantil</option>
                                    <option value="provincial">Provincial</option>
                                    <option value="na">No Aplica</option>
                                   
                                  </select>
                                  @error('bank')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror


                            </div>
                        </div>
                        
                        <div class="form-group row py-2">
                            <label for="paymentNumber" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Número de pago') }}</label>

                            <div class="col-md-4">
                                <input id="paymentNumber" type="text" class="form-control @error('paymentNumber') is-invalid @enderror" name="paymentNumber"   autocomplete="paymentNumber" autofocus value="{{ old('paymentNumber') }}">

                                @error('paymentNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>



                        <div class="form-group row py-2">
                            <label for="pagonumber" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Fecha de pago') }}</label>

                            <div class="col-md-6">
                                <input id="datepicker" width="276" name="paymentDate" value="{{ old('paymentDate') }}"required/>

                            </div>

                            
                        </div>

                        <div class="form-group row py-2">
                            <label for="paymentMount" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Monto exacto') }}</label>

                            <div class="col-md-4">
                                <input id="" type="text" class="form-control @error('paymentMount') is-invalid @enderror" name="paymentMount"  required autocomplete="phone" autofocus value="{{ old('paymentMount') }}">

                                @error('paymentMount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="stext-111 cl6 p-t-2"></p>
                            </div>
                        </div>

                       

                        <div class="form-group row py-2">
                            <label for="paymentMount" class="col-md-4 col-form-label text-md-right stext-110 cl2">{{ __('Comentarios') }}</label>

                            <div class="col-md-4">

                              <textarea name="comments" id="comments" cols="30" rows="5" class="form-control @error('comments') is-invalid @enderror" name="comments"  required autocomplete="comments" autofocus >{{ old('comments') }}</textarea>
                                

                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="stext-111 cl6 p-t-2"></p>
                            </div>
                        </div>



                        
                        <div class="form-group row py-2 ">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right stext-110 cl2"></label>

                            <div class="col-md-6">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" style="width:200px">
                                    {{ __('Procesar') }}
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
