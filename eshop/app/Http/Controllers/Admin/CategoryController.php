<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
        return view('admin.category.index', compact('category'));
    }


    function addCategory(){
        return view('admin.category.add');
    }

    function insertData(Request $request){

       $category = new Category();
       if($request->hasFile('image'))
       {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('assets/uploads/category/', $filename);
        $category->image = $filename;
       }

       $category->name=$request->input('name');
       $category->slug=$request->input('slug');
       $category->description=$request->input('des');
       $category->status=$request->input('status') == TRUE ? '1':'0';
       $category->popular=$request->input('popular') == TRUE ? '1':'0';
       $category->meta_title=$request->input('metatitle');
       $category->meta_descrip=$request->input('metadesc');
       $category->meta_keywords=$request->input('metakey');
       $category->save();
       return redirect('/dashboard')->with('status', "Category Created Successfully");
    }

    public function editCategory($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function updateCategory(Request $request, $id){

        $category=Category::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;

        }

        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('des');
        $category->status=$request->input('status') == TRUE ? '1':'0';
        $category->popular=$request->input('popular') == TRUE ? '1':'0';
        $category->meta_title=$request->input('metatitle');
        $category->meta_descrip=$request->input('metadesc');
        $category->meta_keywords=$request->input('metakey');
        $category->update();
       return redirect('/dashboard')->with('status', "Category Updated successfully");
    }

    public function destroy($id){
        $category=Category::find($id);
        if($category->image)
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status', "Category Deleted successfully");
    }
}