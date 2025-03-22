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
        $cart = CartItem::with('product')->get();
        return response()->json($cart);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
    
        $cartItem = CartItem::where('product_id', $request->product_id)->first();
    
        if ($cartItem) {
            // Update quantity instead of creating new
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Create new cart item
            CartItem::create($request->all());
        }
    
        return response()->json(['message' => 'Cart updated successfully!'], 200);
    }

    public function remove($id)
    {
        CartItem::destroy($id);
        return response()->json(null, 204);
    }
}
