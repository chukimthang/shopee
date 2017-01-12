<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\User;
use App\Category;
use App\Product;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable ['name', 'address', 'status', 'category_id', 'user_id'];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
