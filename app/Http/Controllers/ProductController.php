<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ProductController extends Controller
{
    public function getAllProduct(){
        $path = base_path()."/Mocking/product.json";
        $product = json_decode(file_get_contents($path), true);
        return response()->json($product);
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
