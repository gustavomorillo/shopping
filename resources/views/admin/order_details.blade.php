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
      <th scope="col">id</th>
      <th scope="col">#order</th>
      <th scope="col">Item Name</th>
      <th scope="col">Color</th>
      <th scope="col">Size</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders_details as $order_detail)
    <tr>
    <th scope="row">{{$order_detail->id}}</th>
      <td>{{$order_detail->order_id}}</td>
      <td>{{$order_detail->item_name}}</td>
      <td>{{$order_detail->color}}</td>
      <td>{{$order_detail->size}}</td>
      <td>{{$order_detail->qty}}</td>
      <td>{{$order_detail->price}}</td>

      <td><a href=""><button class="btn btn-primary">Details</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>

    </main>
  </div>
</div>



@endsection