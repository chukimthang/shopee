<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Receiver;
use App\Payment;
use App\OrderDetail;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['total_discount', 'total_price', 'status', 'user_id', 'receiver_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
