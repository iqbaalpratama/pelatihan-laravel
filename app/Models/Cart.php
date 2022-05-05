<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Cart extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cart';

    protected $fillable = ['product_id', 'quantity', 'is_checkout'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', '_id');
    }
}