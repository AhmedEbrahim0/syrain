<?php

namespace App\Http\Controllers\admin\products;

use App\Models\category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    
    public function index(Request $request)  {
        if($request->category_id >0){
            $products=Products::where("category_id",$request->category_id)->get();
            $category_id=$request->category_id;

        }else{
            $products=Products::all();
            $category_id=0;
        }
        
        $categories=category::all();
        return view('admin.products.index')
        ->with("products",$products)
        ->with("categories",$categories)
        ->with("category_id",$category_id)
        
        ;
    }
    public function create()  {
        $categories=category::all();
        return view('admin.products.create')
        ->with("categories",$categories)
        ;

    }
    public function edit($id)  {
        $product=Products::find($id);
        $categories=category::all();
        return view('admin.products.edit')
        ->with("categories",$categories)
        ->with("product",$product)
        ;
    }
    public function destroy(Request $request)  {
        $product=Products::find($request->id);
        File::delete( "$product->image");

        Products::destroy($request->id);
        session()->flash("success","Product Deleted ");
        return back();
    }
    public function update(Request $request)  {
        $request->validate([
            "name"=>"required",
            "category_id"=>"required",
            "text"=>"required",
        ]);
        

        $product=Products::find($request->id);

        if($request->has('image')){
            File::delete( "$product->image");
            $extension=$request->image->extension();
            $name=time().".$extension";
            $request->image->move(public_path("images/"),$name);
            $product->update([
                "image"=>"images/$name",
            ]);
        }
        $product->update([
            "name"=>$request->name,
            "text"=>$request->text,
            "category_id"=>$request->category_id,
            
        ]);
        session()->flash("success","Updated Successfully");
        return back();
    }
    public function AddProduct(Request $request){
        $request->validate([
            "name"=>"required",
            "text"=>"required",
            "category_id"=>"required",
            "image"=>"required",
        ]);
        $extension=$request->image->extension();
        $name=time().".$extension";
        $request->image->move(public_path("images/"),$name);

        Products::create([
            "name"=>$request->name,
            "text"=>$request->text,
            "category_id"=>$request->category_id,
            "image"=>"images/$name",
        ]);
        session()->flash("success","Product Added Successfully");
        return back();
    }   
}
