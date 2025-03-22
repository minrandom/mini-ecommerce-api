<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
        ->where('user_id', auth()->id())
        ->where('status', 'in_cart')
        ->get();

        return response()->json($cartItems);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
    
        var_dump(auth()->id());

        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }
    
        return response()->json(['message' => 'Cart updated successfully!'], 200);
    }

    public function remove($id)
    {
        CartItem::destroy($id);
        return response()->json(null, 204);
    }

    public function checkout()
    {
        $cartItems = CartItem::where('user_id', auth()->id())
            ->where('status', 'in_cart')
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Your cart is empty'], 400);
        }

        foreach ($cartItems as $item) {
            $item->status = 'checked_out';
            $item->checkout_date = now();
            $item->save();
        }

        return response()->json(['message' => 'Checkout successful!']);
    }

    public function history()
    {
        $history = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->where('status', 'checked_out')
            ->orderBy('checkout_date', 'desc')
            ->get();

        return response()->json($history);
    }



}
