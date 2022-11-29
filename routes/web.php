<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [UserController::class, 'tampil']);
Route::resource('rekomendasi', UserController::class);

Route::middleware(['auth', 'editor'])->group(function () {
    Route::resource('admin/artikel', ArtikelController::class);
    Route::resource('admin/kategori', KategoriController::class);
    Route::resource('admin/barang', BarangController::class);
    Route::get('deletebarang/{id}', [BarangController::class, 'destroy'])->name('deletebarang');
    Route::get('deletekategori/{id}', [KategoriController::class, 'destroy'])->name('deletekategori');
    Route::get('deleteartikel/{id}', [ArtikelController::class, 'destroy'])->name('deleteartikel');
});

Route::middleware(['auth', 'editor'])->group(function () {
    Route::resource('admin/user', RoleController::class);
    Route::get('deleteuser/{id}', [RoleController::class, 'destroy'])->name('deleteuser');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
