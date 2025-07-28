<?php

use App\Http\Controllers\BerandaController; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/regulasi', function () {
    return view('regulasi');
});

Route::get('/admin', [BlogController::class, 'index']);


// Pastikan file resources/views/add.blade.php ada
Route::get('/add', [BlogController::class, 'create']);

// Route untuk otentikasi manual
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('admin.index');
    Route::get('/add', [BlogController::class, 'create'])->name('admin.add');
    Route::post('/store', [BlogController::class, 'store'])->name('admin.store');

    // ROUTE BARU UNTUK EDIT, UPDATE, DAN HAPUS
    Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('admin.edit');
    Route::put('/{blog}', [BlogController::class, 'update'])->name('admin.update');
    Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('admin.destroy');
});

