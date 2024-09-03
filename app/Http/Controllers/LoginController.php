<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Auth;
// use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function postlogin (Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/beranda');
        }
        return redirect ('login');
      }
      public function logout (Request $request){
        Auth::logout();
        return redirect('/login');
      }
    }
   
    
        
    

