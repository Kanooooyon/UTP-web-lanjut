<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Makanan; 
use App\Models\BeratBadan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $makanan = Makanan::where('user_id', $user->id)
                    ->orderBy('tanggal', 'desc')
                    ->get();

        $beratBadan = BeratBadan::where('user_id', $user->id)
                        ->orderBy('tanggal')
                        ->get();

        return view('dashboard', compact('user', 'makanan', 'beratBadan'));
    }
}
