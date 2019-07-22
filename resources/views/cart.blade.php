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
            <img src="{{ asset($product->model->image) }}" alt="" class="w-25">
            <span class="ml-4 border-left">{{ $product->name }}</span>
          </td>
          <td>${{ $product->price }}</td>
          <td>{{ $product->qty }}</td>
          <td>{{ $product->subtotal }}</td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
