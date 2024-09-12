<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactControleur extends Controller
{
    public function contact(Request $request){
        return view("contact", []);
    }

    public function sendMail(Request $request){
        Contact::create($request->all());
        return redirect("/contact");
    }
}
