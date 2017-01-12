<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['target_id', 'action', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
