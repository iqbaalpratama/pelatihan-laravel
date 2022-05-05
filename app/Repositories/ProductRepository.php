<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        $product = $this->product->all();
        return $product;
    }

    public function store($data): Product
    {
        $newProduct = new $this->product();
        $newProduct->name = $data['name'];
        $newProduct->stock = $data['stock'];
        $newProduct->price = $data['price'];
        $newProduct->description = $data['description'];
        $newProduct->sold = 0;
        $newProduct->save();
        return $newProduct->fresh();
    }

    public function delete($id)
    {
        $product = $this->product->where('_id', $id)->delete();
        return $product;
    }
}
