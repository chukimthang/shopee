<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
use Auth;
use Lang;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::instance(Auth::user()->id)->content();

        return view('user.cart.index', compact('carts'));
    }

    public function postAddItem(Request $request)
    {
        $id = $request->id;
        $number = $request->number;

        if (!isset(Auth::user()->id)) {
            return response()->json(['status' => 401]);
        }

        if ($id) {
            $product = Product::find($id);
            Cart::instance(Auth::user()->id)->add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $number,
                'price' => $product->price,
                'options' => [
                    'image' => $product->images[0]->url
                ]
            ]);

           return response()->json(['status' => 404]);
        }

        return response()->json(['status' => 404]);
    }

    public function postDeleteItem(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Cart::instance(Auth::user()->id)->remove($id);
        }
        $carts = Cart::instance(Auth::user()->id)->content();

        return view('user.cart.cart', compact('carts'));
    }

    public function postUpQuantity(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $item = Cart::instance(Auth::user()->id)->get($id);
            Cart::instance(Auth::user()->id)->update($id, $item->qty + 1);
        }
        $carts = Cart::instance(Auth::user()->id)->content();

        return view('user.cart.cart', compact('carts'));
    }

    public function postDownQuantity(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $item = Cart::instance(Auth::user()->id)->get($id);
            if ($item->qty > 1) {
                Cart::instance(Auth::user()->id)->update($id, $item->qty - 1);
            }
        }
        $carts = Cart::instance(Auth::user()->id)->content();

        return view('user.cart.cart', compact('carts'));
    }
}
