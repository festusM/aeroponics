<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info">View</a>
                        <!-- Add other actions if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
