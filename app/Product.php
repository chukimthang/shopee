<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\Category;
use App\Image;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'code', 'price', 'quantity', 'discount', 
        'point_rate', 'description', 'status', 'category_id', 'shop_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
