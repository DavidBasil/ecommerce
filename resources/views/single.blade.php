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
    </div>


  </div>
</div>

@endsection
