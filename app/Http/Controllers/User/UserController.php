<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RemoteImageUploader\Factory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Validator;
use Lang;

class UserController extends Controller
{
    public function show($id)
    {
        if($id) {
            $user = User::find($id);

            return view('user.user.show', compact('user'));
        }
        
        return redirect()->route('home');
    }

    public function edit($id)
    {
        if($id) {
            $user = User::find($id);

            return view('user.user.edit', compact('user'));
        }
        
        return redirect()->route('home');
    }

    public function update(UserUpdateRequest $request)
    {
        $id = $request->id;
        if($id) {
            $user = User::find($id);
            $data = $request->only('name', 'phone', 'avatar');
            if ($data['avatar'] == null) {
                $data['avatar'] = $user['avatar'];
            }
            $user->update($data);
            
            return response()->json(
                ['sms' => Lang::get('admin.message.update_success')
            ]);
        }
    }

    public function postUpdateAvatar(Request $request)
    {
        try {
            $result = Factory::create(config('uploadphoto.host'), config('uploadphoto.auth'))
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
}
