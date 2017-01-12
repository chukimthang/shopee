<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\User;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = ['shop_id', 'user_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
