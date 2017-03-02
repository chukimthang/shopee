<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::getProductByCategory();
        dd($list);
    }
}
