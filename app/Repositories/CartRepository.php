<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository{
    protected $cart;
    public function __construct(Product $cart)
    {
        $this->cart = $cart;
    }

    public function get()
    {
        $cart = $this->cart->where('is_checkout', false)->get();
        return $cart;
    }

    public function store($data): Cart
    {
        $newCart = new $this->cart();
        $newCart->product_id = $data['product_id'];
        $newCart->quantity = $data['quantity'];
        $newCart->is_checkout = false;
        $newCart->save();
        return $newCart->fresh();
    }

    public function delete($id)
    {
        $cart = $this->cart->where('_id', $id)->delete();
        return $cart;
    }
}
