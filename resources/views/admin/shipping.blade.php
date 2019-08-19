@extends('layouts.indexadmin')

@section('center')

<div class="container-fluid">
  <div class="row">
    
    @include('layouts.adminleftbar')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Shipping & Dolar</h1>
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

      <div class="row">
      <div class="col-md-6">


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($shipping as $ship)
    <tr>
    <th scope="row">{{$ship->id}}</th>
      <td>{{$ship->name}}</td>
      <td>{{$ship->price}}</td>
    <td><a href="/admin/shippingEdit/{{$ship->id}}"><button class="btn btn-primary">Edit</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="col-md-6">
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Type</th>
      <th scope="col">Dollar Price</th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
    
    <th scope="row">Buy</th>
    <td>{{$dollarBuy}}</td>
    
    </tr>
    <tr>
      <th scope="row">Sell</th>
      <td>{{$dollarSell}}</td>
      
      </tr>
   
  </tbody>
</table>


</div>
      </div>





      
      


      
    </main>
  </div>
</div>
@endsection