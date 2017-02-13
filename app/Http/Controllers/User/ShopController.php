<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopAddRequest;

use App\Shop;
use App\Category;
use Auth;
use Lang;

class ShopController extends Controller
{
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('user.shop.create', compact('categories'));
    }

    public function store(ShopAddRequest $request)
    {
        $data = $request->only('name', 'address', 'category_id', 'description');
        if (Auth::user()->shop->id) {
            return redirect()->to('/');
        }
        $data['status'] = 0;
        $data['user_id'] = Auth::user()->id;
        Shop::create($data);

        return redirect()->back()->with([
            'flash_level' => Lang::get('text.success'),
            'flash_message' => Lang::get('user.message.create_shop_success')
        ]);
    }
}
