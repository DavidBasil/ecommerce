<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndController extends Controller
{

    public function index()
    {
        return view('index', ['products' => Product::paginate(4)]);
    }

    public function single($id)
    {
        $product = Product::findOrFail($id);

        return view('single', ['product' => $product]);
    }

}
