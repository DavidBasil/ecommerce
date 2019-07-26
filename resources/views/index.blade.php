@extends('layouts.app')

@section('content')

<div class="container">
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{ session('success') }}
    </div> 
  @endif
  <div class="row">
    @foreach ($products as $product)
      <div class="col-md-4 col-lg-3">
        <div class="card">
          <div class="card-header bg-primary text-white">
            {{ $product->name }}
          </div>
          <div class="card-body">
            <img src="{{ asset($product->image) }}" alt="" class="img-responsive w-100">
          </div>
          <div class="card-footer">
            ${{ $product->price }}
            <a href="{{ route('product.single', ['id' => $product->id]) }}" class="stretched-link"></a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex mt-5">
    <div class="mx-auto">
      {{ $products->links() }}
    </div>
  </div>
</div>

@endsection
