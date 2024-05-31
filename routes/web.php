<?php

use App\Http\Controllers\WelcomeController;
use App\Models\Berita;
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

Route::get('/', function() {
    $berita = Berita::all();
    return view('welcome', compact('berita'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::resource('penulis', App\Http\Controllers\PenulisController::class);
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
    Route::resource('berita', App\Http\Controllers\BeritaController::class);
});
