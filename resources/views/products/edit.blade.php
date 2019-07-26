@extends('layouts.app')

@section('content')

<div class="container">
  
  <h5 class="mb-3 text-center">Edit a product</h5>

  <div class="row">
    <div class="col-md-6 offset-md-3">
  <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- name -->
    <div class="form-group">
      @error('name')
      <p class='text-danger'>{{ $message }}</p>
      @enderror
      <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Name">
    </div>  
    <!-- price -->
    <div class="form-group">
      @error('price')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input type="number" name="price" class="form-control" value="{{ $product->price }}" placeholder="Price">
    </div>
    <!-- descripts -->
    @error('description')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <textarea name="description" rows="5" cols="40" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
    <!-- image -->
    @error('image')
    <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
    <div class="input-group mt-2">
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input">
        <label class="custom-file-label">Image</label>
      </div>
    </div>
    <hr>
    <!-- submit -->
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Edit</button>
    </div>
  </form>

    </div>
  </div>

</div>

@endsection
