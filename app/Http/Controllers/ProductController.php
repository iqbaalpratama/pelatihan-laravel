<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{
    protected $productService;

    public function  __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function getAllProduct(){
        try{
            $data = $this->productService->getProducts();
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($data);
    }

    public function addProduct(Request $request){
        $data= $request->only(['name','price','stock', 'description']);
        try {
            $product = $this->productService->addProduct($data);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($product);
    }

    public function deleteProduct($id){
        try {
            $product = $this->productService->deleteProduct($id);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        if($product){
            return response()->json(['success' => 'Berhasil menghapus produk'], 200);
        }
        return response()->json(['error' => 'Gagal menghapus produk'], 500);

    }

    public function checkout(Request $request){
        $cart = $request->post();
        $path = base_path()."/Mocking/product.json";
        $product = json_decode(file_get_contents($path), true);
        $message = new stdClass();
        $message->msg = "kosong";
        foreach($product as $p){
            foreach($cart as $c){
                if($c['product_id'] === $p['id']){
                    $p['stock'] -= $c['quantity'];
                    break;
                }
            }
        }
        return response()->json($product);
    }
}
