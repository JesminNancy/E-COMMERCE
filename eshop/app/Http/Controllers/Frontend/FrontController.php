<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        $featured_product=Product::where('trending', '1')->take(15)->get();
        $trending_category=Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_product','trending_category'));
    }

    public function category(){
        $category=Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
    }
}