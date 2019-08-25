<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::content()->count() == 0){
            return redirect()->back()->with('info', 'Your cart is empty!');
        }
        return view('checkout');
    }

    public function pay(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'card' => 'required|numeric',
            'card_expiry' => 'required',
            'cvc' => 'required|numeric'
        ]);

        Cart::destroy();

        /* Mail::to(request()->email)->send(new \App\Mail\PurchaseSuccessful); */

        return redirect('/')->with('success', 'Thank you for your order. You will receive email with confirmation');

    }
}
