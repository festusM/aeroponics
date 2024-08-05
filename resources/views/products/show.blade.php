<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content') 
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Category: {{ $product->category->name }}</p>
    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form> 
</div>
@endsection


