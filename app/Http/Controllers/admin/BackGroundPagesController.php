<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\BackGroundPages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BackGroundPagesController extends Controller
{
    public function HomePage()  {
        $background=BackGroundPages::find(1);
        return view('admin.home.background')
        ->with("background",$background)
        ;
    }
    public function map()  {
        $background=BackGroundPages::find(9);
        return view('admin.home.map')
        ->with("background",$background)
        ;
    }
    public function UpdateMap(Request $request)  {

        $background=BackGroundPages::find(9);
        File::delete( "$background->image");

        $extension=$request->image->extension();
        $name=time().".$extension";
        $request->image->move(public_path("images/"),$name);
        $path="images/$name";
        $background->update([
            "image"=>$path,
        ]);

        return view('admin.home.map')
        ->with("background",$background)
        ;
    }
    public function products()  {
        $products=BackGroundPages::where("id",2)->orWhere("id",3)
        ->orWhere("id",4)
        ->orWhere("id",5)
        ->get()
        ;

        return view('admin.home.products')
        ->with("products",$products)
        ;
    }
    public function showProduct($id)  {
        $product=BackGroundPages::find($id)
        ;

    
        return view('admin.home.show')
        ->with("product",$product)
        ;
    }
    public function recipes()  {
        $recipes=BackGroundPages::where("id",6)->orWhere("id",7)
        ->orWhere("id",8)
        ->get()
        ;

        return view('admin.home.recipes')
        ->with("products",$recipes)
        ;
    }
    public function UpdateHomePage(Request $request)  {
        $request->validate([
            "title"=>"required",
            "text"=>"required",
            "image"=>"required",
        ]);
        $background=BackGroundPages::find(1);

        if($request->has("image")){
            File::delete( "$background->image");

            $extension=$request->image->extension();
            $name=time().".$extension";
            $request->image->move(public_path("images/"),$name);
            $path="images/$name";
            $background->update([
                "image"=>$path,
            ]);

        }
        $background->update([
            "title"=>$request->title,
            "text"=>$request->text,
        ]);
        session()->flash("success","Updated Successfully ! ");
        return back();
    }
    public function updateProduct(Request $request)  {
        $request->validate([
            "title"=>"required",
        ]);
        $background=BackGroundPages::find($request->id);

        if($request->has("image")){
            File::delete( "$background->image");

            $extension=$request->image->extension();
            $name=time().".$extension";
            $request->image->move(public_path("images/"),$name);
            $path="images/$name";
            $background->update([
                "image"=>$path,
            ]);

        }
        $background->update([
            "title"=>$request->title,
        ]);
        session()->flash("success","Updated Successfully ! ");
        return back();
    }

}
