<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::paginate(config('myconfig.paginate_product'));

        return view('shop.index', compact('shops'));
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        if (!$shop) {
            return redirect()->route('shop.index');
        }
        
        return view('shop.show', compact('shop'));
    }
}
