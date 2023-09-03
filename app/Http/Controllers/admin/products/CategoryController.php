<?php

namespace App\Http\Controllers\admin\products;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()     {
        $categories=category::all();
        return view('admin.products.categories')
        ->with("categories",$categories)
        ;
        
    }

    public function update(Request $request)  {
        $request->validate([
            "name"=>"required",
        ]);

        $category=category::find($request->id);

        if($request->has('image')){
            File::delete( "$category->image");
            $extension=$request->image->extension();
            $name=time().".$extension";
            $request->image->move(public_path("images/"),$name);
            $category->update([
                "image"=>"images/$name",
            ]);
        }
        $category->update([
            "name"=>$request->name,            
        ]);
        session()->flash("success","Updated Successfully");
        return back();
    }
    public function show($id)     {
        $category=category::find($id);
        return view('admin.products.edit_category')
        ->with("category",$category)
        ;
        
    }
    public function create()     {
        return view('admin.products.create_category');
        
    }
    public function destroy(Request $request)     {
        category::destroy($request->id);
        $products=Products::where("category_id",$request->id)->get();
        foreach($products as $product)
            Products::destroy($product->id);
        session()->flash("success","Category deleted Successfully");
        return back();        
    }
    public function store(Request $request)     {
        $request->validate([
            "name"=>"required",
            "image"=>"required",
        ]);
        $extension=$request->image->extension();
        $name=time().".$extension";
        $request->image->move(public_path("images/"),$name);

        category::create([
            "name"=>$request->name,
            "image"=>"images/$name",
        ]);
        session()->flash("success","Category Added Successfully");
        return back();
        
    }
}
