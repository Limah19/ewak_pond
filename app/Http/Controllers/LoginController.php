<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Auth;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  function index()
  {
    return view('login');
  }
  function login(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required'
    ], [
      'email.required' => 'Email wajib diisi',
      'password.required' => 'Password wajib diisi',
    ]);

    $infologin = [
      'email' => $request->email,
      'password' => $request->password,
    ];

    if (Auth::attempt($infologin)) {
      if (Auth::user()->role == 'admin') {
        return redirect('beranda/admin');
      } elseif (Auth::user()->role == 'pengguna') {
        return redirect('beranda/pengguna');
      }
    } else {
      return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
    }
  }

  // public function postlogin(Request $request)
  // {

  //   // dd($request->all());
  //   if (Auth::attempt($request->only('email', 'password'))) {
  //     return redirect('/beranda');
  //   }
  //   return redirect('login');
  // }
  public function logout(Request $request)
  {
    Auth::logout();
    return redirect('/');
  }
}
