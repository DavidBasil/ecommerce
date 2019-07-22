<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class ShopController extends Controller
{

    public function add_to_cart()
    {
        $product = Product::findOrFail(request()->product_id);

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => request()->quantity,
            'price' => $product->price,
            'weight' => 0,
            'tax' => 0
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }

}
