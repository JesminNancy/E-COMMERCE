<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function addProduct(Request $request){
            $product_id = $request->input('product_id');
            $product_qty = $request->input('product_qty');


             if(Auth::check()){
                $checkproduct = Product::where('id', $product_id)->first();
                if($checkproduct){
                    if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
                    {
                        return response()->json(['status' => $checkproduct->name." Already Add to cart"]);
                    }
                    else
                    {
                        $cartItem = new Cart();
                        $cartItem->product_id=$product_id;
                        $cartItem->user_id=Auth::id();
                        $cartItem->product_qty=$product_qty;
                        $cartItem->save();
                        return response()->json(['status' => $checkproduct->name." Added to cart"]);
                    }

                }else
                {
                     return response()->json(['status' => 'Login to be contiune']);
                }
            }
    }
}