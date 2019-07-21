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
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
          <a href="{{ route('products.edit', ['id' => $product->id]) }}" 
            class="btn btn-primary btn-sm">EDIT
          </a>
        </td>
        <td>
          <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection
