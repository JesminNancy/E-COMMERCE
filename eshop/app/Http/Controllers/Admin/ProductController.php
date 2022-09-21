<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view ('admin.product.index', compact('product'));
    }

    public function addProduct()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }
    public function insertProduct(Request $request){
        $product = new Product();
        if($request->hasFile('image'))
       {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('assets/uploads/product/', $filename);
        $product->image = $filename;
       }
       $product->cate_id=$request->input('cate_id');
       $product->name=$request->input('name');
       $product->slug=$request->input('slug');
       $product->small_description=$request->input('small_description');
       $product->description=$request->input('description');
       $product->original_price=$request->input('original_price');
       $product->selling_price=$request->input('selling_price');
       $product->qty=$request->input('qty');
       $product->tax=$request->input('tax');
       $product->trending=$request->input('trending') == TRUE ? '1':'0';
       $product->meta_title=$request->input('meta_title');
       $product->meta_description=$request->input('meta_description');
       $product->meta_keywords=$request->input('meta_keywords');
       $product->save();
       return redirect('/dashboard')->with('status', "Product Created Successfully");
    }
}