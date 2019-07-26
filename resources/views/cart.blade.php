@extends('layouts.app')

@section('content')

<div class="container mt-4">
  <h4 class="text-center mb-4">In Your Shopping Cart: <span class="text-primary">{{ Cart::count() }} items</span></h4>

  <table class="table table-bordered">
    <thead class="thead-dark text-center">
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead> 
    <tbody>
      @foreach (Cart::content() as $product)
        <tr>
          <td class="w-50">
            <a href="{{ route('cart.delete', ['id' => $product->rowId]) }}" class="text-danger h3 mr-4">X</a>
            <img src="{{ asset($product->model->image) }}" alt="" class="w-25">
            <span class="ml-4 border-left">{{ $product->name }}</span>
          </td>
          <td>${{ $product->price }}</td>
          <td>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text bg-danger">
                  <a href="{{ route('cart.decr', ['id' => $product->rowId, 'qty' => $product->qty]) }}" class="text-white text-decoration-none"><span class="h5">-</span></a>
                </span>
              </div>
              <input type="number" name="quantity" value="{{ $product->qty }}" class="form-control">
              <div class="input-group-prepend">
                <span class="input-group-text bg-success">
                  <a href="{{ route('cart.incr', ['id' => $product->rowId, 'qty' => $product->qty]) }}" class="text-white text-decoration-none"><span class="h5">+</span></a>
                </span>
              </div>
            </div>
          </td>
          <td>${{ $product->total }}</td>
        </tr> 
      @endforeach
    </tbody>
  </table>
  <hr>

  <div class="row">
    <div class="col-md-6">
      <h4 class="mt-2">Grand total: <u>${{ Cart::total() }}</u></h4>
    </div>
    <div class="col-md-6">
      @if (Cart::content()->count() >0)
      <a href="{{ route('cart.checkout') }}" class="btn btn-block btn-success">Checkout</a>
      @endif
    </div>
  </div>
</div>

@endsection
