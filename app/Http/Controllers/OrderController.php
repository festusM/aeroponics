<?php


namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show a list of orders
    public function index()
    {
        $orders = Order::with('items')->get(); // Load orders with items
        return view('orders.index', compact('orders')); // Pass orders to the view
    }

    // Show a single order
    public function show(Order $order)
    {
        $order->load('items.product'); // Load order items and associated products
        return view('orders.show', compact('order')); // Pass order to the view
    }

    // Store a newly created order in storage
    public function store(Request $request)
    {
        // Validate request (assume you have validation logic)
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Create the order
        $order = Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Update the specified order in storage
    public function update(Request $request, Order $order)
    {
        // Validate request (assume you have validation logic)
        $request->validate([
            'total' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Remove the specified order from storage
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
