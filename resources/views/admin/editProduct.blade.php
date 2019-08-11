@extends('layouts.indexadmin')

@section('center')



<div class="container">

<div class="row">

  <div class="col-md-12">

<br><br><br><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="/admin/{{$product->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$product->name}}" />
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="" value="{{$product->description}}" />
      </div>

      <div class="form-group">
          <label for="price">Price</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="" value="{{$product->price}}" />
      </div>


      <p>Tallas</p>


      @if($product->s == 1)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="s" value="1" name="s" checked>
        <label class="form-check-label" for="s">Talla S</label>
      </div>
      @else 
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="s" value="1" name="s">
        <label class="form-check-label" for="s">Talla S</label>
      </div>
      @endif

      @if($product->m == 1)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="m" value="1" name="m" checked>
        <label class="form-check-label" for="m">Talla M</label>
      </div>
      @else 
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="m" value="1" name="m">
        <label class="form-check-label" for="m">Talla M</label>
      </div>
      @endif

      @if($product->l == 1)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="l" value="1" name="l" checked>
        <label class="form-check-label" for="l">Talla L</label>
      </div>
      @else 
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="l" value="1" name="l">
        <label class="form-check-label" for="l">Talla L</label>
      </div>
      @endif

      <div class="form-group">
        <label for="price">Color</label>
        <input type="text" class="form-control" id="color" name="color" placeholder="Color" value="{{$product->color}}" />
    </div>





      <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" id="category" name="category">
            <option value="{{$product->category}}">{{$product->category}}</option>
            <option value="women">women</option>
            <option value="men">men</option>
          </select>
        </div>

        <div class="form-group">
          <label for="subCategory">subCategory</label>
          <select class="form-control" id="subCategory" name="subcategory">
            <option value="{{$product->subcategory}}">{{$product->subcategory}}</option>
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

      <div class="form-group">
          <label for="modal_name">modal_name</label>
          <input type="text" class="form-control" id="modal_name" name="modal_name" placeholder="" value="{{$product->modal_name}}" />
      </div>

      <div class="form-group">
          <label for="modal_name2">modal name2</label>
          <input type="text" class="form-control" id="modal_name2" name="modal_name2" placeholder="" value="{{$product->modal->name}}" />
      </div>

      <div class="form-group">
          <label for="second_name">Modal second_name</label>
          <input type="text" class="form-control" id="second_name" name="second_name" placeholder="" value="{{$product->modal->second_name}}" />
      </div>

      <div class="form-group">
            <label for="image">Image1</label>
            <input type="file" class="form-control-file" id="image1" name="image1"   />
        </div>

        <div class="form-group">
                <label for="image">Image2</label>
                <input type="file" class="form-control-file" id="image2" name="image2"   />
        </div>

        <div class="form-group">
                <label for="image">Image3</label>
                <input type="file" class="form-control-file" id="image3" name="image3"   />
        </div>

      <input type="submit" value="Send" class="btn btn-primary">
  </form>
</div>
</div>

</div>


@endsection