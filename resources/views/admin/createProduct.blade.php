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
</div>
</div>

</div>


@endsection