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
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart')->with('success', 'Product added to cart');
    }

    public function cart()
    {
        /* Cart::destroy(); */
        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function incr($id, $qty)
    {
        Cart::update($id, $qty + 1);
        return redirect()->back();
    }

    public function decr($id, $qty)
    {
        Cart::update($id, $qty - 1);
        return redirect()->back();
    }

}
