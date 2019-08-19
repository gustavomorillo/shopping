@extends('layouts.indexadmin')

@section('center')

<div class="container-fluid">
  <div class="row">
    
    @include('layouts.adminleftbar')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Orders</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      
 

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#order</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Address</th>
      <th scope="col">city</th>
      <th scope="col">state</th>
      <th scope="col">price</th>
      <th scope="col">shipping</th>
      <th scope="col">date</th>
      <th scope="col">status</th>
      <th scope="col">details</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
    <th scope="row">{{$order->order_id}}</th>
      <td>{{$order->name}}</td>
      <td>{{$order->lastname}}</td>
      <td>{{$order->address}}</td>
      <td>{{$order->city}}</td>
      <td>{{$order->state}}</td>
      <td>{{$order->price}}</td>
      <td>{{$order->shipping}}</td>
      <td>{{$order->date}}</td>
      <td>{{$order->status}}</td>
      <td>
        
        
      <form action="/admin/order_detail/{{$order->order_id}}">
        @csrf
        <button class="btn btn-primary" input="submit">Details</button>

      </form>
      
      
      
      
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

    </main>
  </div>
</div>



@endsection