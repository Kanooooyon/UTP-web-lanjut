<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\BeratBadanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan route untuk aplikasi web kamu.
| Semua route ini akan dimuat oleh RouteServiceProvider dan
| dikelompokkan dalam middleware "web".
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Makanan
    Route::get('/makanan', [MakananController::class, 'index'])->name('makanan.index');
    Route::get('/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
    Route::post('/makanan/store', [MakananController::class, 'store'])->name('makanan.store');

    // Berat Badan
    Route::get('/beratbadan', [BeratBadanController::class, 'index'])->name('beratbadan.index');
    Route::get('/beratbadan/create', [BeratBadanController::class, 'create'])->name('beratbadan.create');
    Route::post('/beratbadan/store', [BeratBadanController::class, 'store'])->name('beratbadan.store');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});
