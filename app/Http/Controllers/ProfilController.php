<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'umur' => 'nullable|integer',
            'tinggi_badan' => 'nullable|numeric',
            'jenis_kelamin' => 'nullable|string',
        ]);

        $user->update($request->all());

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
