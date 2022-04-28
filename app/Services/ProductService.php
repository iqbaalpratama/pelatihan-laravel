<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;

class ProductService{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts(){
        $data = $this->productRepository->getAll();
        return $data;
    }

    public function addProduct($data){
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|max:255'
        ]);
        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $product = $this->productRepository->store($data);
        return $product;
    }

    public function deleteProduct($id){
        $product = $this->productRepository->delete($id);
        return $product;
    }
}