<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Order;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['quantity', 'product_id', 'order_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
