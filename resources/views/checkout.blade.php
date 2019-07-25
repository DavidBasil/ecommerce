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
      <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal">Pay Now</button>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Payment</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('cart.checkout') }}" method="post">
          @csrf
          <input type="email" name="email" class="form-control mb-2" placeholder="Email">
          <input type="text" name="card" class="form-control mb-2" placeholder="Card number">
          <div class="form-row">
            <div class="col">
              <input type="text" name="card_expiry" class="form-control" placeholder="MM / YY">
            </div>
            <div class="col">
              <input type="text" name="cvc" class="form-control" placeholder="cvc">
            </div>
          </div>
              <button type="submit" class="btn btn-primary btn-block mt-4">Pay ${{ Cart::total() }}</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
