<!-- resources/views/orders/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Order #{{ $order->id }}</h1>
    <p>User: {{ $order->user->name }}</p>
    <p>Total: ${{ $order->total }}</p>
    <p>Status: {{ $order->status }}</p>
    
    <h3>Order Items</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
