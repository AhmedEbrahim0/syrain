<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function SendMessage(Request $request)
    {
 
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "message"=>"required",

        ]);
        Contact::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "message"=>$request->message,
        ]);
        session()->flash('success', ' message sent Successfully  '); 
        return back();
    }
}
