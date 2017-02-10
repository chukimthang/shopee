<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Lang;

class UserController extends Controller
{
    public function index()
    {
        $users = User::listUser()->paginate(config('myconfig.paginate'));;

        return view('admin.user.index', compact('users'));
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['sms' => Lang::get('admin.message.not_found')]);
        }
        $user = User::find($id);
        $user->delete();

        return response()->json(['sms' => Lang::get('admin.message.delete_success')]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::searchByName($search)->paginate(config('myconfig.paginate'));

        return view('admin.user.index', compact('users'));
    }
}
