<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\Product;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'like', '%'. $name. '%');
    }

    public function scopeProductInCategory($query, $take = 1)
    {
        return Category::with('products')->get()->map(function($category) use ($take) {
            $category->products = $category->products->take($take);
            return $category;
        });
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
