<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class CartController extends Controller
{
    //add resources to the cart
    public function add(Request $request, $productId)
    {
        $product = Products::where('Product_Id', '=', $productId)->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->Name,
                'price' => $product->Price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('Success', 'Product added to cart successfully!');
    }

//show resources in cart
    public function show()
    {
        $cart = session()->get('cart', []);

        return view('frontend.cart', compact('cart'));
    }

//count resources in cart
    public function cartCount()
    {
        if (auth()->check()) {
            $user = auth()->user();

            $cartItems = CartItem::where('user_id', $user->id)->get();
            $cartCount = $cartItems->sum('quantity');
        } else {
            $cart = session()->get('cart', []);
            $cartCount = count($cart);
        }

        return $cartCount;
    }
}

