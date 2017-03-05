<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopAddRequest;
use RemoteImageUploader\Factory;

use App\Shop;
use App\Category;
use Auth;
use Lang;
use Validator;

class ShopController extends Controller
{
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('user.shop.create', compact('categories'));
    }

    public function postUploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required',
        ]);
        if ($validator->fails()) {
            $message = implode(' ', $validator->errors()->all());

            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail!' . $message,
            ];
        }
        try {
            $result = Factory::create(config('uploadphoto.host'), 
                config('uploadphoto.auth'))
                ->upload($request->upload->path());

            return [
                'status' => true,
                'url' => $result,
                'message' => 'Upload successfull!',
            ];
        } catch (\Exception $ex) {
            return [
                'status' => false,
                'url' => '',
                'message' => 'Upload fail! ' . $ex->getMessage(),
            ];
        }
    }

    public function postAddAjax(ShopAddRequest $request)
    {
        $data = $request->only('name', 'address', 'image', 
            'category_id', 'description');
        $data['status'] = 0;
        $data['user_id'] = Auth::user()->id;
        Shop::create($data);

        return response()->json(['sms' => 'Add success']);
    }
}
