<?php

namespace App\Http\Controllers\admin\contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()  {
        $contacts=Contact::orderBy("id","DESC")->get();
        return view('admin.contact.index')
        ->with("contacts",$contacts)
        ;
    }
    public function show($id)  {
        $contact=Contact::find($id);
        $contact->update([
            "read"=>1,
        ]);
        return view('admin.contact.show')
        ->with("contact",$contact)
        ;
    }
}
