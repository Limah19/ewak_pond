<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\PengeluaranPakanController;
use App\Http\Controllers\PengeluaranBibitController;
use App\Http\Controllers\PemasukanPanenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Models\PengeluaranBibit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// BERANDA
Route::get('/beranda', function () {
    return view('beranda');
});

// Administrasi
Route::get('/administrasi', function () {
    return view('administrasi');
}); // ->middleware('auth')

// KEUANGAN
Route::get('/keuangan', function () {
    return view('keuangan');
}); 

// LOGIN
Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

// LOGIN2
Route::post('/postlogin', [LoginController::Class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::Class, 'logout'])->name('logout');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

// CRUD Kolam
Route::get('/kolam', [KolamController::class, 'index']);
Route::get('/kolam/create', [KolamController::class, 'create']);
Route::post('/kolam', [KolamController::class, 'store']);
Route::get('/kolam/{kolam_id}/edit', [KolamController::class, 'edit']);
Route::put('/kolam/{kolam_id}', [KolamController::class, 'update']);
Route::delete('/kolam/{kolam_id}', [KolamController::class, 'destroy']);
Route::get('/kolam/cetak', [KolamController::class, 'cetak'])->name('kolam.cetak');

// CRUD Ikan
Route::get('/ikan', [IkanController::class, 'index']);
Route::get('/ikan/create', [IkanController::class, 'create']);
Route::post('/ikan', [IkanController::class, 'store']);
Route::get('/ikan/{ikan_id}/edit', [IkanController::class, 'edit']);
Route::put('/ikan/{ikan_id}', [IkanController::class, 'update']);
Route::delete('/ikan/{ikan_id}', [IkanController::class, 'destroy']);
Route::get('/ikan/cetak', [IkanController::class, 'cetak'])->name('ikan.cetak');

// CRUD Pakan
Route::get('/pakan', [PakanController::class, 'index']);
Route::get('/pakan/create', [PakanController::class, 'create']);
Route::post('/pakan', [PakanController::class, 'store']);
Route::get('/pakan/{pakan_id}/edit', [PakanController::class, 'edit']);
Route::put('/pakan/{pakan_id}', [PakanController::class, 'update']);
Route::delete('/pakan/{pakan_id}', [PakanController::class, 'destroy']);
Route::get('/pakan/cetak', [PakanController::class, 'cetak'])->name('pakan.cetak');

// CRUD Panen
Route::get('/panen', [PanenController::class, 'index']);
Route::get('/panen/create', [PanenController::class, 'create']);
Route::post('/panen', [PanenController::class, 'store']);
Route::get('/panen/{panen_id}/edit', [PanenController::class, 'edit']);
Route::put('/panen/{panen_id}', [PanenController::class, 'update']);
Route::delete('/panen/{panen_id}', [PanenController::class, 'destroy']);
Route::get('/panen/cetak', [PanenController::class, 'cetak'])->name('panen.cetak');

// CRUD Pengeluaran Pakan
Route::get('/pengeluaranpakan', [PengeluaranPakanController::class, 'index'])->name('pengeluaranpakan.index');
Route::get('/pengeluaranpakan/create', [PengeluaranPakanController::class, 'create'])->name('pengeluaranpakan.create');
Route::post('/pengeluaranpakan', [PengeluaranPakanController::class, 'store'])->name('pengeluaranpakan.store');
Route::get('/pengeluaranpakan/{id}/edit', [PengeluaranPakanController::class, 'edit'])->name('pengeluaranpakan.edit');
Route::put('/pengeluaranpakan/{id}', [PengeluaranPakanController::class, 'update'])->name('pengeluaranpakan.update');
Route::delete('/pengeluaranpakan/{id}', [PengeluaranPakanController::class, 'destroy']);
Route::get('/pengeluaranpakan/cetak', [PengeluaranPakanController::class, 'cetak'])->name('pengeluaranpakan.cetak');

// CRUD Pengeluaran Bibit
Route::get('/pengeluaranbibit', [PengeluaranBibitController::class, 'index'])->name('pengeluaranbibit.index');
Route::get('/pengeluaranbibit/create', [PengeluaranBibitController::class, 'create']);
Route::post('/pengeluaranbibit', [PengeluaranBibitController::class, 'store'])->name('pengeluaranbibit.store');
Route::get('/pengeluaranbibit/{id}/edit', [PengeluaranBibitController::class, 'edit'])->name('pengeluaranbibit.edit');
Route::put('/pengeluaranbibit/{id}', [PengeluaranBibitController::class, 'update'])->name('pengeluaranbibit.update');
Route::delete('/pengeluaranbibit/{id}', [PengeluaranBibitController::class, 'destroy']);
Route::get('/pengeluaranbibit/cetak', [PengeluaranBibitController::class, 'cetak'])->name('pengeluaranbibit.cetak');

// CRUD Pemasukan Panen
Route::get('/pemasukanpanen', [PemasukanPanenController::class, 'index'])->name('pemasukanpanen.index');
Route::get('/pemasukanpanen/create', [PemasukanPanenController::class, 'create'])->name('pemasukanpanen.create');
Route::post('/pemasukanpanen', [PemasukanPanenController::class, 'store'])->name('pemasukanpanen.store');
Route::get('/pemasukanpanen/{id}/edit', [PemasukanPanenController::class, 'edit'])->name('pemasukanpanen.edit');
Route::put('/pemasukanpanen/{id}', [PemasukanPanenController::class, 'update'])->name('pemasukanpanen.update');
Route::delete('/pemasukanpanen/{id}', [PemasukanPanenController::class, 'destroy'])->name('pemasukanpanen.destroy');
Route::get('/pemasukanpanen/cetak', [PemasukanPanenController::class, 'cetak'])->name('pemasukanpanen.cetak');