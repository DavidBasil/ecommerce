@extends('layouts.app')

@section('content')

<div class="container mt-4">
  <h4 class="text-center mb-4">Your Order</h4>

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
            <img src="{{ asset($product->model->image) }}" alt="" class="w-25">
            <span class="ml-4 border-left">{{ $product->name }}</span>
          </td>
          <td>${{ $product->price }}</td>
          <td>{{ $product->qty }}</td>
          <td>${{ $product->total }}</td>
        </tr> 
      @endforeach
    </tbody>
  </table>
  <hr>

  <div class="row">
    <div class="col-md-6">
      <h5>Total quantity: <span class="badge badge-primary badge-pill float-right mr-5">{{ Cart::content()->count() }}</span></h5>
      <h4 class="mt-2">Grand total: <span class="text-primary float-right mr-5"><u>${{ Cart::total() }}</u></span></h4>
    </div>
    <div class="col-md-6">
      <a href="{{ route('cart.checkout') }}" class="btn btn-block btn-primary">Pay Now</a>
    </div>
  </div>
</div>

@endsection
