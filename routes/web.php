<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\KolamController;

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


// Route::get('/master', function () {
//     return view('layout.master');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/forminput', [PagesController::class, 'FormInput']);
Route::post('/welcome', [PagesController::class, 'Welcome']);

Route::get('/datatable', function () {
    return view('datatable.index');
});

// CRUD FILM
Route::get('/film', [FilmController::class, 'index']);
Route::get('/film/create', [FilmController::class, 'create']);
Route::post('/film', [FilmController::class, 'store']);
Route::get('/film/{film_id}/edit', [FilmController::class, 'edit']);
Route::put('/film/{film_id}', [FilmController::class, 'update']);
Route::delete('/film/{film_id}', [FilmController::class, 'destroy']);

// CRUD PERAN
Route::get('/peran', [PeranController::class, 'index']);
Route::get('/peran/create', [PeranController::class, 'create']);
Route::post('/peran', [PeranController::class, 'store']);
Route::get('/peran/{peran_id}/edit', [PeranController::class, 'edit']);
Route::put('/peran/{peran_id}', [PeranController::class, 'update']);
Route::delete('/peran/{peran_id}', [PeranController::class, 'destroy']);

// BERANDA
Route::get('/', function () {
    return view('beranda');
});

// OWNER
Route::get('/owner', function () {
    return view('owner');
}); // ->middleware('auth')

// CRUD Kolam
Route::get('/kolam', [KolamController::class, 'index']);
Route::get('/kolam/create', [KolamController::class, 'create']);
Route::post('/kolam', [KolamController::class, 'store']);
Route::get('/kolam/{kolam_id}/edit', [KolamController::class, 'edit']);
Route::put('/kolam/{kolam_id}', [KolamController::class, 'update']);
Route::delete('/kolam/{kolam_id}', [KolamController::class, 'destroy']);


