<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = ['code', 'order_id'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
