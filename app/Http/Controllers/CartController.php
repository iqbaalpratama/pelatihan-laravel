<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Services\CartService;
use Exception;

class CartController extends Controller
{
    protected $cartService;

    public function  __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function getCart(){
        try{
            $data = $this->cartService->getCart();
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($data);
    }

    public function addToCart(Request $request){
        $data= $request->only(['_id']);
        try {
            $product = $this->cartService->addCart($data);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($product);
    }

    public function deleteCart($id){
        try {
            $cart = $this->cartService->deleteCart($id);
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        if($cart){
            return response()->json(['success' => 'Berhasil menghapus produk dalam cart'], 200);
        }
        return response()->json(['error' => 'Gagal menghapus produk dalam cart'], 500);

    }

    public function checkout(){
        try{
            $data = $this->cartService->checkout();
        }
        catch(Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
        return response()->json($data);
    }

}
