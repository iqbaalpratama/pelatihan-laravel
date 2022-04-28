<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'product';

    protected $fillable = ['name', 'stock', 'price', 'description' ];

    public function carts()
    {
        return $this->embedsMany(Cart::class, 'product_id');
    }

}
