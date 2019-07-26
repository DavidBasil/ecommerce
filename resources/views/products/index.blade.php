@extends('layouts.app')

@section('content')

<div class="container">

  @if (session('success'))
   <div class="alert alert-success alert-dismissible fade show">
     {{ session('success') }}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div> 
  @endif

  <table class="table table-striped table-bordered">
    <tbody>
    @foreach ($products as $product)
      <tr>
        <td><i class="fa fa-book"></i> {{ $product->name }}</td>
        <td class="text-center">${{ $product->price }}</td>
        <td class="text-center">
          <a href="{{ route('products.edit', ['id' => $product->id]) }}" 
            class="btn btn-primary btn-sm">EDIT
          </a>
        </td>
        <td class="text-center">
          <a href="#collapse{{ $product->id }}" class="btn btn-danger btn-sm" data-toggle="collapse">Delete</a>
          <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
            @csrf
            @method('delete')
            <div class="collapse" id="collapse{{ $product->id }}">
              <hr>
              <button type="submit" class="btn btn-warning">Sure?</button>
            </div>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  
  <div class="btn-group btn-group-lg">
    <a href="{{ route('products.create') }}" class="text-decoration-none btn btn-secondary"><i class="fa fa-plus"></i> Add a new product</a>
    <a href="{{ route('index') }}" class="text-deocation-none btn btn-secondary"><i class="fa fa-shopping-bag"></i> View Store</a>
  </div>

</div>

@endsection
