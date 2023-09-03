<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Notifications;

use App\Models\Specializations;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()  {
        $users=User::all();


        return view('admin.users.index')
        ->with("users",$users)
        ;
    }
    public function create()  {
        $users=User::all();

        return view('admin.users.create');
    }
    public function Register(Request $request)  {


        $request->validate([
            "name"=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "password"=>'required',
            "password_confirmation"=>'required',
        ]);

        if($request->password_confirmation != $request->password){
            session()->flash("error","The password does not match");
            return back();
        }

        session()->flash("success","     User created successfully");

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);




        return back();

 
    }   
    public function Login(Request $request)  {
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return view('admin.index');
        }
        session()->flash("error","The email or password is incorrect");
        return back();
    }
}
