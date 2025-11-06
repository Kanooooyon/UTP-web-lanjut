<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use Illuminate\Support\Facades\Auth;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::where('user_id', Auth::id())->get();

        return view('makanan.list_makanan', compact('makanans'));
    }

    public function create()
    {
        return view('makanan.create_makanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'kalori' => 'required|integer',
            'waktu_makan' => 'required',
            'tanggal' => 'required|date',
        ]);

        Makanan::create([
            'user_id' => Auth::id(),
            'nama_makanan' => $request->nama_makanan,
            'kalori' => $request->kalori,
            'waktu_makan' => $request->waktu_makan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil ditambahkan!');
    }
}
