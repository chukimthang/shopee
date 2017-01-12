<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\Product;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
