<?php

namespace App\Http\Controllers\admin\recipes;

use App\Models\Recipes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class RecipesController extends Controller
{

    
    public function index()  {
        $recipes=Recipes::all();
        return view('admin.recipes.index')
        ->with("recipes",$recipes)
        ;
    }
    public function create()  {
        
        return view('admin.recipes.create');
    }
    public function edit($id)  {
        $recipes=Recipes::find($id);
        return view('admin.recipes.edit')
        ->with("recipes",$recipes)
        ;
    }
    public function destroy(Request $request)  {
        $recipes=Recipes::find($request->id);
        File::delete( "$recipes->image");

        Recipes::destroy($request->id);
        session()->flash("success","recipes Deleted ");
        return back();
    }
    public function update(Request $request)  {
        $request->validate([
            "name"=>"required",
            "text"=>"required",
            "detials"=>"required",
        ]);

        $recipes=Recipes::find($request->id);

        if($request->has('image')){
            File::delete( "$recipes->image");
            $extension=$request->image->extension();
            $name=time().".$extension";
            $request->image->move(public_path("images/"),$name);
            $recipes->update([
                "image"=>"images/$name",
            ]);
        }
        $recipes->update([
            "name"=>$request->name,
            "text"=>$request->text,
            "detials"=>$request->detials,
            
        ]);
        session()->flash("success","Updated Successfully");
        return back();
    }
    public function store(Request $request){
        $request->validate([
            "name"=>"required",
            "detials"=>"required",
            "text"=>"required",
            "image"=>"required",
        ]);
        $extension=$request->image->extension();
        $name=time().".$extension";
        $request->image->move(public_path("images/"),$name);

        Recipes::create([
            "name"=>$request->name,
            "text"=>$request->text,
            "detials"=>$request->detials,
            "image"=>"images/$name",
        ]);
        session()->flash("success","recipes Added Successfully");
        return back();
    }   
}
