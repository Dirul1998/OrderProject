<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'outlet_id' => 'required|integer|exists:outlets,id',
            'menu_id' => 'required|integer|exists:menus,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        $order = new Order();
        $order->outlet_id = $request->outlet_id;
        $order->menu_id = $request->menu_id;
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;
        $order->save();

        return redirect('/')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // public function edit($id)
    // {
    //     $order = Order::findOrFail($id);
    //     return view('orders.edit', compact('order'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'outlet_id' => 'required|integer|exists:outlets,id',
    //         'menu_id' => 'required|integer|exists:menus,id',
    //         'customer_name' => 'required|string|max:255',
    //         'customer_phone' => 'required|string|max:255',
    //         'quantity' => 'required|integer',
    //         'total_price' => 'required|numeric',
    //     ]);

    //     $order = Order::findOrFail($id);
    //     $order->outlet_id = $request->outlet_id;
    //     $order->menu_id = $request->menu_id;
    //     $order->customer_name = $request->customer_name;
    //     $order->customer_phone = $request->customer_phone;
    //     $order->quantity = $request->quantity;
    //     $order->total_price = $request->total_price;
    //     $order->save();

    //     return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    // }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
