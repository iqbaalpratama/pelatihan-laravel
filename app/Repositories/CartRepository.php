<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;

class CartRepository{
    protected $cart;
    protected $product;
    public function __construct(Cart $cart, Product $product)
    {
        $this->cart = $cart;
        $this->product = $product;
    }

    public function get()
    {
        $cart = $this->cart->where('is_checkout', false)->get();
        foreach($cart as $c){
            $c->product;
        }
        return $cart;
    }

    public function store($data): Cart
    {
        $cart = $this->cart->where('is_checkout', false)->where('product_id', $data['_id'])->first();
        if($cart){
            $cart->quantity += 1;
            $cart->save();
            return $cart->fresh();
        }
        $newCart = new $this->cart();
        $newCart->product_id = $data['_id'];
        $newCart->quantity = 1;
        $newCart->is_checkout = false;
        $newCart->save();
        return $newCart->fresh();
    }

    public function delete($id)
    {
        $cart = $this->cart->where('_id', $id)->delete();
        return $cart;
    }
    public function checkout()
    {
        $cart = $this->cart->where('is_checkout', false)->get();
        foreach($cart as $c){
            $c->is_checkout = true;
            $c->save();
            $product = $this->product->where('_id', $c->product_id)->first();
            $product->stock -= $c->quantity;
            $product->sold += $c->quantity;
            $product->save();
        }
        return $cart;
    }
}
