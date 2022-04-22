<?php

namespace Yaromir\ShopPackage\Http\Controllers;

use Yaromir\ShopPackage\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();

        return view('shoppackage::orders.index', compact('orders'));
    }

    public function create()
    {
        return view('shoppackage::orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paid_at' => 'required|date',
            'paid_amount' => 'required|numeric',
            'client_id' => 'required|integer',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('shoppackage::orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('shoppackage::orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'paid_at' => 'required|date',
            'paid_amount' => 'required|numeric',
            'client_id' => 'required|integer',
        ]);
        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
