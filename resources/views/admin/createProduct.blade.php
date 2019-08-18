@extends('layouts.indexadmin')

@section('center')

<div class="container-fluid">
    <div class="row">
      
      @include('layouts.adminleftbar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Product</h1>
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
          




@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="/admin" method="post" enctype="multipart/form-data">
    @csrf
 

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name"  />
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Description"  />
      </div>

      <div class="form-group">
          <label for="price">Price</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="" />
      </div>

      <p>Tallas</p>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="s" value="1" name="s">
        <label class="form-check-label" for="s">Talla S</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="m" value="1" name="m">
        <label class="form-check-label" for="m">Talla M</label>
      </div>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="l" value="1" name="l">
        <label class="form-check-label" for="l">Talla L</label>
      </div>

      <div class="form-group">
        <label for="price">Color</label>
        <input type="text" class="form-control" id="color" name="color" placeholder="Color" value="" />
    </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
              <option value="">Selecciona una Opción</option>
              <option value="women">women</option>
              <option value="men">men</option>
            </select>
          </div>

          <div class="form-group">
            <label for="subcategory">Subcategory</label>
            <select class="form-control" id="subcategory" name="subcategory">
              <option value="">Selecciona una Opción</option>
              <option value="chemise">Chemise</option>
              <option value="blusa">Blusa</option>
              <option value="franela">Franela</option>
              <option value="sweater">Sweater</option>
              <option value="zapatos">Zapatos</option>
              <option value="gorra">Gorra</option>
              <option value="accesorios">Accesorios</option>
            </select>
          </div>


      <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control-file" id="image" name="image"   />
      </div>

{{-- 
      <div class="form-group">
          <label for="modal_name">modal_name</label>
          <input type="text" class="form-control" id="modal_name" name="modal_name" placeholder="" value="js-show-modalXX" />
      </div> --}}

      

      {{-- <div class="form-group">
          <label for="modal_name2">modal name2</label>
          <input type="text" class="form-control" id="modal_name2" name="modal_name2" placeholder="" value="js-modalXX" />
      </div>

      <div class="form-group">
          <label for="second_name">Modal second_name</label>
          <input type="text" class="form-control" id="second_name" name="second_name" placeholder="" value="js-hide-modalXX" />
      </div> --}}

      <div class="form-group">
          <label for="image1">Image1</label>
          <input type="file" class="form-control-file" id="image1" name="image1"   />
      </div>

      <div class="form-group">
          <label for="image2">Image2</label>
          <input type="file" class="form-control-file" id="image2" name="image2"   />
      </div>

      <div class="form-group">
          <label for="image3">Image3</label>
          <input type="file" class="form-control-file" id="image3" name="image3"   />
      </div>
      <input id="type" name="type" type="hidden" value="default">
      <input type="submit" value="Send" class="btn btn-primary">
  </form>
      </main>
</div>
</div>


   


@endsection