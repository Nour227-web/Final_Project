<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function cancel(Order $order)
    {
        $order->update([
            'status' => 'cancelled'
        ]);

        return redirect(route('orders.index'));
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('orders.history', compact('orders'));
    }
}