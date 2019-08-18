@extends('layouts.indexadmin')

@section('center')

<div class="container-fluid">
  <div class="row">
    
    @include('layouts.adminleftbar')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
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
      
      

      <h2>Products</h2>
      @if(Session::has('product_updated'))
      <div class="alert alert-success">
          {{session('product_updated')}}
      </div>
      @endif

      @if(Session::has('product_deleted'))
      <div class="alert alert-danger">
          {{session('product_deleted')}}
      </div>
      @endif

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th>price</th>
              <th>talla S</th>
              <th>talla M</th>
              <th>talla L</th>
              <th>color</th>
              <th>Modal name</th>
              <th>Modal </th>
              <th>Modal second_name</th>
              <th>image1</th>
              <th>image2</th>
              <th>image3</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>
                
                  <a href="{{ route('admin.edit', ['id' => $product->id]) }}"><img src="{{asset('/images/' .$product->image)}}" style="width: 100px"alt=""></a>
              
              </td>
              <td >{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->s}}</td>
              <td>{{$product->m}}</td>
              <td>{{$product->l}}</td>
              <td>{{$product->color}}</td>
              <td>{{$product->modal_name}}</td>
              <td>{{$product->modal->name}}</td>
              <td>{{$product->modal->second_name}}</td>
              <td>{{$product->modal->image1}}</td>
              <td>{{$product->modal->image2}}</td>
              <td>{{$product->modal->image3}}</td>
            <td><a href="{{ route('admin.edit', ['id' => $product->id]) }}"><button class="btn btn-info">Edit</button></a></td>
            <td>

            <form action="/admin/{{$product->id}}" method="POST">
              @csrf
              @method('delete')

              <button class="btn btn-danger" onclick="return confirm('¿ Estas seguro ?')">Delete</button>

            </form>
              
              
             
              
             
              
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>

        {{$products->links()}}


      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    </main>
  </div>
</div>
@endsection

