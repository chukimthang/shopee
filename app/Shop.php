<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\User;
use App\Category;
use App\Product;
use App\Collection;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = ['name', 'address', 'status', 'description',
        'category_id', 'user_id'];

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

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
