<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollectionAddRequest;
use App\Http\Requests\CollectionUpdateRequest;

use App\Collection;
use Auth;
use Lang;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::listCollection(Auth::user()->shop->id)
            ->paginate(config('myconfig.paginate'));
            
        return view('seller.collection.index', compact('collections'));
    }

    public function store(CollectionAddRequest $request)
    {
        $data = $request->only('name');
        $data['shop_id'] = Auth::user()->shop->id;
        Collection::create($data);

        return redirect()->route('seller.collection.index')->with([
            'flash_level' => 'success',
            'flash_message' => Lang::get('seller.message.add_success')
        ]);
    }

    public function postUpdateAjax(CollectionUpdateRequest $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['sms' => Lang::get('seller.message.not_found')]);
        }
        $data = $request->only('name');
        $collection = Collection::find($id);
        $collection->update();

        return response()->json(['sms' => Lang::get('seller.message.update_success')]);
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['sms' => Lang::get('seller.message.not_found')]);
        }
        $collection = Collection::find($id);
        $collection->delete();

        return response()->json(['sms' => Lang::get('seller.message.delete_success')]);
    }
}
