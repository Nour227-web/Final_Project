<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function add($product_id)
{
    $user = Auth::user();

     
    $cart = Cart::firstOrCreate([
        'user_id' => $user->id
    ]);

    //     
    $item = $cart->items()->where('product_id', $product_id)->first();

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
        return view('cart.index');
    }
}
    

