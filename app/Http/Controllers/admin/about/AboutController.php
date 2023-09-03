<?php

namespace App\Http\Controllers\admin\about;

use App\Models\about;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{

    public function index1()
    {
        $about=about::all();
        return view('admin.about.section1')
        ->with('about',$about)
        ;
    }
    public function index2()
    {
        $about=about::all();
        return view('admin.about.section2')
        ->with('about',$about)
        ;
    }


    public function update2(Request $request){
        $request->validate([
            "title1"=>'required',
            "text1"=>'required',
            "title2"=>'required',
            "text2"=>'required',
        ]);

        if($request->has("image1")){
            $about=about::find(3);

            File::delete($about->image);
            $extension =$request->image1->extension();
            $name=time().".$extension";
            $request->image1->move(public_path('images/'),$name);
            about::find(3)->update([
                "image"=>"images/$name",
            ]);
        }   
        if($request->has("image2")){
            $about=about::find(4);

            File::delete($about->image);
            $extension =$request->image2->extension();
            $name=time().".$extension";
            $request->image2->move(public_path('images/'),$name);

            about::find(4)->update([
                "image"=>"images/$name",
            ]);
        }   
        about::find(3)->update([
            "title"=>$request->title1,
            "text"=>$request->text1,
        ]);
        about::find(4)->update([
            "title"=>$request->title2,
            "text"=>$request->text2,
        ]);
        session()->flash("success","updated Successfully");
        return back();

    }
    public function update1(Request $request)
    {
        $request->validate([
            "title1"=>"required",
            "text1"=>"required",
            "title2"=>"required",
            "text2"=>"required",
        ]);
        about::find(1)->update([
            "title"=>$request->title1,
            "text"=>$request->text1,
        ]);
        about::find(2)->update([
            "title"=>$request->title2,
            "text"=>$request->text2,
        ]);
        session()->flash("success","Updated Successfully");
        return back();

    }



}
