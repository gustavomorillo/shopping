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
            Dollar TODAY
          </button>
        </div>
      </div>

     


      <div class="col-md-3">
      <form action="/admin/dollar" method="post">
      @csrf
      <div class="form-group">
      <label for="" >Dollar Buy</label>
      <input type="text" name="dollarBuy" value="{{$dollarBuy}}" class="form-control">
      </div>

      <div class="form-group">
      <label for="" >Dollar Sell</label>
      <input type="text" name="dollarSell" value="{{$dollarSell}}" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>



      </form>

    </div>



    </main>
  </div>
</div>
@endsection