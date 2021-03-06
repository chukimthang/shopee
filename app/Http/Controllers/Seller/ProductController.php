<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RemoteImageUploader\Factory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductAddRequest;

use App\Product;
use App\Image;
use App\Collection;
use App\ProductCollection;
use Validator;
use Auth;
use Lang;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::listProduct(Auth::user()->shop->id)
            ->paginate(config('myconfig.paginate_product'));
        $collections = Collection::listCollection(Auth::user()->shop->id)
            ->get();
        $selectCollection = Collection::listCollection(Auth::user()->shop->id)
            ->pluck('name', 'id');

        return view('seller.product.index', compact(
            'products', 
            'collections', 
            'selectCollection'
        ));
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

    public function postAddAjax(ProductAddRequest $request)
    {
        $data = $request->only('name', 'code', 'price', 'quantity', 'discount',
            'description', 'status', 'image', 'collection_id');
        try {
            DB::beginTransaction();
            $data['shop_id'] =  Auth::user()->shop->id;
            $data['category_id'] = Auth::user()->shop->category_id;
            $product = Product::create($data);
            if (empty($data['image'])) {
                DB::rollback();

                return response()->json(['sms' => 'Image null']);
            }
            foreach ($data['image'] as $key => $value) {
                $image = ['url' => $value, 'product_id' => $product->id];
                Image::create($image);
            }
            if ($data['collection_id']) {
                foreach ($data['collection_id'] as $key => $value) {
                    $productCollection = [
                        'product_id' => $product->id,
                        'collection_id' => $value
                    ];
                    ProductCollection::create($productCollection);
                }
            }
            DB::commit();

            return response()->json(['sms' => 'Add Success']);
        } catch (ValidatorException $e) {
            DB::rollback();
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['sms' => Lang::get('seller.message.not_found')]);
        }
        $product = Product::find($id);
        $product->delete();

        return response()->json(['sms' => Lang::get('seller.message.delete_success')]);
    }

    public function show($id)
    {
        if (!$id) {
            return redirect()->route('seller.product.index')->with([
                'flash_level' => 'danger',
                'flash_message' => Lang::get('seller.message.not_found')
            ]);
        }
        $product = Product::find($id);

        return view('seller.product.show', compact('product'));
    }

    public function getSearch(Request $request)
    {
        $search = $request->search;
        $products = Product::searchByName($search, Auth::user()->shop->id)
            ->paginate(config('myconfig.paginate_product'));
        $selectCollection = Collection::listCollection(Auth::user()->shop->id)
            ->pluck('name', 'id');
        $collections = Collection::listCollection(Auth::user()->shop->id)
            ->get();

        return view('seller.product.index', compact(
            'products', 
            'collections', 
            'selectCollection',
            'search'
        ));
    }
}
