<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Shop;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = ['user_id', 'shop_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
