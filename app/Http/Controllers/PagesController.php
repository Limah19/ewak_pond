<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function FormInput(){
        return view('pages.forminput');
    }

    public function Welcome(Request $request){
        
        $firstName = $request['first_name'];
        $lastName = $request['last_name'];

        return view('pages.welcome', compact('firstName', 'lastName'));
    }
}
