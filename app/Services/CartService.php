<?php

namespace App\Services;

use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Validator;

class CartService{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getCart(){
        $data = $this->cartRepository->get();
        return $data;
    }

    public function addCart($data){
        $validator = Validator::make($data, [
            '_id' => 'required'
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $cart = $this->cartRepository->store($data);
        return $cart;
    }

    public function deleteCart($id){
        $cart = $this->cartRepository->delete($id);
        return $cart;
    }
    public function checkout(){
        $cart = $this->cartRepository->checkout();
        return $cart;
    }
}