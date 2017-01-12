<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Receiver extends Model
{
    protected $table = 'receivers';

    protected $fillable ['fullname', 'phone', 'address'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
