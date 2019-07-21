@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    @foreach ($products as $product)
    <div class="col-md-4 col-lg-3">
      <div class="card">
        <div class="card-header">
          {{ $product->name }}
        </div>
        <div class="card-body">
          <img src="{{ asset($product->image) }}" alt="" class="img-responsive w-100">
        </div>
        <div class="card-footer">
         ${{ $product->price }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {{ $products->links() }}
</div>
@endsection
