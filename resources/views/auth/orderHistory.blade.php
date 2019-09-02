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
                                    <th scope="col">order id</th>
                                    <th scope="col">price</th>
                                    <th scope="col">shipping</th>
                                    <th scope="col">status</th>
                                    <th scope="col">date</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                  <tr>
                                    <th scope="row">{{$order->order_id}}</th>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->shipping}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->date}}</td>
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
