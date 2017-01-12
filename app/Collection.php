<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\Product;

class Collection extends Model
{
    protected $table = 'collections';

    protected $fillable = ['name', 'shop_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_collections');
    }
}
