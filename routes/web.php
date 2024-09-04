<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\PemasukannController;
use App\Http\Controllers\PengeluaranPakanController;
use App\Http\Controllers\PengeluarannController;
use App\Http\Controllers\LoginController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

// LOGIN
Route::get('login/', function () {
    return view('Pengguna.login');
});

// LOGIN2
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

// //LOGIN
// Route::get('/', [LoginController::Class, 'login']);
// Route::post('/login', [LoginController::Class, 'postlogin']);

// BERANDA
Route::get('/', function () {
    return view('beranda');
});

// OWNER
Route::get('/owner', function () {
    return view('owner');
}); // ->middleware('auth')

// KEUANGAN
Route::get('/keuangan', function () {
    return view('keuangan');
}); 

// CRUD Kolam
Route::get('/kolam', [KolamController::class, 'index']);
Route::get('/kolam/create', [KolamController::class, 'create']);
Route::post('/kolam', [KolamController::class, 'store']);
Route::get('/kolam/{kolam_id}/edit', [KolamController::class, 'edit']);
Route::put('/kolam/{kolam_id}', [KolamController::class, 'update']);
Route::delete('/kolam/{kolam_id}', [KolamController::class, 'destroy']);

// CRUD Ikan
Route::get('/ikan', [IkanController::class, 'index']);
Route::get('/ikan/create', [IkanController::class, 'create']);
Route::post('/ikan', [IkanController::class, 'store']);
Route::get('/ikan/{ikan_id}/edit', [IkanController::class, 'edit']);
Route::put('/ikan/{ikan_id}', [IkanController::class, 'update']);
Route::delete('/ikan/{ikan_id}', [IkanController::class, 'destroy']);

// CRUD Pakan
Route::get('/pakan', [PakanController::class, 'index']);
Route::get('/pakan/create', [PakanController::class, 'create']);
Route::post('/pakan', [PakanController::class, 'store']);
Route::get('/pakan/{pakan_id}/edit', [PakanController::class, 'edit']);
Route::put('/pakan/{pakan_id}', [PakanController::class, 'update']);
Route::delete('/pakan/{pakan_id}', [PakanController::class, 'destroy']);

// CRUD Panen
Route::get('/panen', [PanenController::class, 'index']);
Route::get('/panen/create', [PanenController::class, 'create']);
Route::post('/panen', [PanenController::class, 'store']);
Route::get('/panen/{panen_id}/edit', [PanenController::class, 'edit']);
Route::put('/panen/{panen_id}', [PanenController::class, 'update']);
Route::delete('/panen/{panen_id}', [PanenController::class, 'destroy']);

// CRUD Pemasukan
Route::get('/pemasukann', [PemasukannController::class, 'index']);
Route::get('/pemasukann/create', [PemasukannController::class, 'create']);
Route::post('/pemasukann', [PemasukannController::class, 'store']);
Route::get('/pemasukann/{pemasukann_id}/edit', [PemasukannController::class, 'edit']);
Route::put('/pemasukann/{pemasukann_id}', [PemasukannController::class, 'update']);
Route::delete('/pemasukann/{pemasukann_id}', [PemasukannController::class, 'destroy']);

// CRUD Pengeluaran Pakan
Route::get('/pengeluaran-pakan', [PengeluaranPakanController::class, 'index'])->name('pengeluaran_pakan.index');
Route::post('/pengeluaran-pakan', [PengeluaranPakanController::class, 'store'])->name('pengeluaran_pakan.store');
Route::get('/pengeluaran-pakan/{id}/edit', [PengeluaranPakanController::class, 'edit'])->name('pengeluaran_pakan.edit');
Route::put('/pengeluaran-pakan/{id}', [PengeluaranPakanController::class, 'update'])->name('pengeluaran_pakan.update');
Route::delete('/pengeluaran-pakan/{id}', [PengeluaranPakanController::class, 'destroy'])->name('pengeluaran_pakan.destroy');

// CRUD Pengeluarann
Route::get('/pengeluarann', [PengeluarannController::class, 'index']);
Route::get('/pengeluarann/create', [PengeluarannController::class, 'create']);
Route::post('/pengeluarann', [PengeluarannController::class, 'store']);
Route::get('/pengeluarann/{pengeluarann_id}/edit', [PengeluarannController::class, 'edit']);
Route::put('/pengeluarann/{pengeluarann_id}', [PengeluarannController::class, 'update']);
Route::delete('/pengeluarann/{pengeluarann_id}', [PengeluarannController::class, 'destroy']);
