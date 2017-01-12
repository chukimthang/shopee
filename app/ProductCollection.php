<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    protected $table = 'product_collections';
    
    protected $fillable = ['product_id', 'collection_id'];
}
