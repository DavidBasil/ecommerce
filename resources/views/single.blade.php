@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <div class="row">

    <div class="col-md-5">
      <div class="shadow p-3 text-center">
        <img src="{{ asset($product->image) }}" alt="" class="w-75">
      </div>
    </div>

    <div class="col-md-7 pl-4">
      <p class="h5 mb-3">${{ $product->price }}</p>
      <h4 class="my-4">{{ $product->name }}</h4>
      <p>{{ $product->description }}</p>
      <hr>
      <form action="{{ route('cart.add') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-6">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Quantity</span>
              </div>
            <input type="number" name="quantity" class="form-control" value="1">
            </div>

          </div>
          <div class="col-md-6">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-primary">Add to Cart</button>
          </div>
        </div>
      </form>

    </div>



  </div>
</div>

@endsection
