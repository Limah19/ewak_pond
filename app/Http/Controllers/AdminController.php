<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
  {
    return view('beranda');
  }

  function admin()
  {
    return view('beranda');
  }

  function pengguna()
  {
    return view('beranda');
  }
}
