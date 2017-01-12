<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = ['number', 'content', 'user_id', 'product_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
