<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($product_id)
    {
        $user = Auth::user();

        $cart = Cart::firstOrCreate([
            'user_id' => $user->id
        ]);

        $item = $cart->items()
            ->where('product_id', $product_id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product_id,
                'quantity' => 1
            ]);
        }

        return back();
    }

    public function index()
    {
        $cart = Cart::with('items.product')
            ->firstOrCreate([
                'user_id' => Auth::id()
            ]);

        return view('cart.index', compact('cart'));
    }

    public function increase($product_id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $item = $cart->items()
            ->where('product_id', $product_id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        }

        return redirect()->route('cart.index');
    }

    public function decrease($product_id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $item = $cart->items()
            ->where('product_id', $product_id)
            ->first();

        if ($item) {
            if ($item->quantity > 1) {
                $item->decrement('quantity');
            } else {
                $item->delete();
            }
        }

        return redirect()->route('cart.index');
    }

    public function delete($product_id)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $cart->items()
            ->where('product_id', $product_id)
            ->delete();

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = Cart::with('items.product')
            ->firstOrCreate([
                'user_id' => Auth::id()
            ]);

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        return view('cart.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $cart = Cart::with('items.product')
            ->firstOrCreate([
                'user_id' => Auth::id()
            ]);

        // Make sure cart is not empty
        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        // Calculate total
        $total = 0;

        foreach ($cart->items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        // Create Order
        $order = \App\Models\Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
            'shipping_address' => $request->address,
            'phone' => $request->phone,
        ]);

        // Create Order Items
        foreach ($cart->items as $item) {

            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Empty the cart after creating the order
        $cart->items()->delete();

        return redirect()->route('orders.index')
            ->with('Success', 'Order placed successfully!');
    }
}
