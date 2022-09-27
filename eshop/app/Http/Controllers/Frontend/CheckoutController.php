<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $old_cartItems=Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as  $items)
        {
            if(!Product::where('id', $items->product_id)->where('qty', '>=',$items->product_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $items->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems=Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }
}