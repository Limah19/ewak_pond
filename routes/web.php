<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\PemasukannController;
use App\Http\Controllers\PengeluaranController;
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
Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');


// LOGIN2
Route::post('/postlogin', [LoginController::Class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::Class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Route group untuk level owner
    Route::middleware(['ceklevel:admin'])->group(function () {
        Route::get('/owner', function () {
            return view('owner.blade'); // Ganti dengan view atau logika Anda
        })->name('owner');

        // Route::get('/owner', function () {
        //     return view('owner.keuangan'); // Ganti dengan view atau logika Anda
        // })->name('owner.keuangan');
    });

     // Route group untuk level keuangan
    Route::middleware(['ceklevel:user'])->group(function () {
        Route::get('/keuangan', function () {
            return view('keuangan.blade'); // Ganti dengan view atau logika Anda
        })->name('keuangan');

        Route::get('/beranda', function () {
            return view('beranda.blade'); // Ganti dengan view atau logika Anda
        })->name('beranda');
    });
});

// BERANDA
Route::get('/beranda', function () {
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

// CRUD Pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create']);
Route::post('/pengeluaran', [PengeluaranController::class, 'store']);
Route::get('/pengeluaran/{pengeluaran_id}/edit', [PengeluaranController::class, 'edit']);
Route::put('/pengeluaran/{pengeluaran_id}', [PengeluaranController::class, 'update']);
Route::delete('/pengeluaran/{pengeluaran_id}', [PengeluaranController::class, 'destroy']);

// CRUD Pengeluarann
Route::get('/pengeluarann', [PengeluarannController::class, 'index']);
Route::get('/pengeluarann/create', [PengeluarannController::class, 'create']);
Route::post('/pengeluarann', [PengeluarannController::class, 'store']);
Route::get('/pengeluarann/{pengeluarann_id}/edit', [PengeluarannController::class, 'edit']);
Route::put('/pengeluarann/{pengeluarann_id}', [PengeluarannController::class, 'update']);
Route::delete('/pengeluarann/{pengeluarann_id}', [PengeluarannController::class, 'destroy']);
