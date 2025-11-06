<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeratBadan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BeratBadanController extends Controller
{
    public function index()
    {
        $berats = BeratBadan::where('user_id', Auth::id())->get();

        foreach ($berats as $b) {
            try {
                if ($b->catatan) {
                    $b->catatan = Crypt::decryptString($b->catatan);
                }
            } catch (\Exception $e) {
                $b->catatan = '[Catatan terenkripsi]';
            }
        }

        return view('beratbadan.list_berat', compact('berats'));
    }

    public function create()
    {
        return view('beratbadan.create_berat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'berat_badan' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        BeratBadan::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'berat_badan' => $request->berat_badan,
            'catatan' => $request->catatan ? Crypt::encryptString($request->catatan) : null,
        ]);

        return redirect()->route('beratbadan.index')->with('success', 'Catatan berat badan berhasil disimpan!');
    }
}
