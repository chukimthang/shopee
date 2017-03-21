<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        if (!$id) {
            return redirect()->route('home');
        }
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }
}
