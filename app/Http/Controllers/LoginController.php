<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function postlogin (Request $request) {
        User::create([
            'level' => $request->email,
            'name' => $request->email,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            dd(Auth::user());
        }
    }
}
