<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Controllers\Controller;

use App\Category;
use Lang;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(config('myconfig.paginate'));
        
        return view('admin.category.index', compact('categories'));
    }

    public function postAddAjax(CategoryAddRequest $request)
    {
        $data = $request->only('name');
        Category::create($data);
        
        return response()->json(['sms' => Lang::get('admin.message.add_success')]);
    }

    public function postUpdateAjax(CategoryUpdateRequest $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['sms' => Lang::get('admin.message.not_found')]);
        }
        $data = $request->only('name');
        $category = Category::find($id);
        $category->update($data);

        return response()->json(['sms' => Lang::get('admin.message.update_success')]);
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['sms' => Lang::get('admin.message.not_found')]);
        }
        $category = Category::find($id);
        $category->delete();

        return response()->json(['sms' => Lang::get('admin.message.delete_success')]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $categories = Category::searchByName($search)->paginate(config('myconfig.paginate'));

        return view('admin.category.index', compact('categories'));
    }
}
