@extends('layouts.index')

@section('center')
@include('layouts.cart')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mtext-109 cl2 p-b-30 py-2">{{ __('Historial de Pagos') }}</div>
                @if(Session::has('success'))
                  <div class="alert alert-success">
                      <h3 class="text-center">{{Session::get('success')}}</h3>
                  </div>
                @endif
                
                        <div class="col-md-10">    

                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Número</th>
                                    <th scope="col">Banco</th>
                                    <th scope="col">Número</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Comentarios</th>
                                    <th scope="col">status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                  <tr>
                                    <th scope="row">{{$payment->paymentType}}</th>
                                    <td>{{$payment->bank}}</td>
                                    <td>{{$payment->paymentNumber}}</td>
                                    <td>{{$payment->paymentDate}}</td>
                                    <td>{{$payment->paymentMount}}</td>
                                    <td>{{$payment->comments}}</td>
                                    <td>@if($payment->status == "")En Proceso @endif
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>


                         
                             
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
