<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil profil user yang sedang login
        $profile = Auth::user()->profile;
        return view('profile.index', compact('profile'));
    }

    public function edit()
    {
        // Ambil profil user yang sedang login
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'umur' => 'required|integer',
            'bio' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Ambil profil user yang sedang login
        $profile = Auth::user()->profile;

        // Update data
        $profile->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}

