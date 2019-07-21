@extends('layouts.app')

@section('content')
<div class="container">
  
  <h5 class="mb-3">Add a product</h5>

  <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- name -->
    <div class="form-group">
      @error('name')
      <p class='text-danger'>{{ $message }}</p>
      @enderror
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
    </div>  
    <!-- price -->
    <div class="form-group">
      @error('price')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="Price">
    </div>
    <!-- descripts -->
    @error('description')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <textarea name="description" rows="5" cols="40" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
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
      <button type="submit" class="btn btn-success btn-block">Create</button>
    </div>
  </form>

</div>

@endsection
