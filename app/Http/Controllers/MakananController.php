<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakananController extends Controller
{
    public function index()
    {
        $makanan = Makanan::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();
        return view('makanan.list_makanan', compact('makanan'));
    }

    public function create()
    {
        return view('makanan.create_makanan');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_makanan' => 'required|string|max:255',
                'kalori' => 'required|integer',
                'waktu_makan' => 'required|string',
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
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $makanan = Makanan::where('user_id', Auth::id())->findOrFail($id);
        return view('makanan.edit_makanan', compact('makanan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $makanan = Makanan::where('user_id', Auth::id())->findOrFail($id);

            $request->validate([
                'nama_makanan' => 'required|string|max:255',
                'kalori' => 'required|integer',
                'waktu_makan' => 'required|string',
                'tanggal' => 'required|date',
            ]);

            $makanan->update([
                'nama_makanan' => $request->nama_makanan,
                'kalori' => $request->kalori,
                'waktu_makan' => $request->waktu_makan,
                'tanggal' => $request->tanggal,
            ]);

            return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $makanan = Makanan::where('user_id', Auth::id())->findOrFail($id);
            $makanan->delete();

            return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
