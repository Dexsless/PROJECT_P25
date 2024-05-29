<?php

use App\Http\Controllers\KomentarController;
use App\Models\Berita;
use App\Models\komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $berita = Berita::all();
    return view('welcome', compact('berita'));
});
Route::get('/tampilan', function () {
    $berita = Berita::all();
    return view('tampilan', compact('berita'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('penulis', App\Http\Controllers\PenulisController::class)->middleware('auth');
Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');
Route::resource('berita', App\Http\Controllers\BeritaController::class)->middleware('auth');
