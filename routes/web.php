<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Auth\LoginController;

// Admin Controllers (Disesuaikan dengan alias untuk kejelasan)
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\RegulasiController as AdminRegulasiController;
use App\Http\Controllers\RegulasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute-rute ini dapat diakses oleh semua pengunjung website (Front-End).
| Tidak memerlukan login.
|
*/

// Rute untuk halaman utama (beranda)
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Rute untuk menampilkan detail satu berita
Route::get('/berita/{blog}', [BerandaController::class, 'showBerita'])->name('berita.show');

// Rute untuk halaman daftar dan detail regulasi (Ditangani oleh RegulasiController)
Route::get('/regulasi', [RegulasiController::class, 'index'])->name('regulasi.list');
Route::get('/regulasi/{regulasi}', [RegulasiController::class, 'show'])->name('regulasi.show');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Rute-rute ini menangani proses login dan logout untuk admin.
|
*/

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Rute-rute ini adalah untuk panel admin.
| - Prefix 'admin': Semua URL akan diawali dengan /admin (contoh: /admin/blogs).
| - Middleware 'auth': Semua rute ini hanya bisa diakses setelah login.
| - Name 'admin.': Semua nama rute akan diawali dengan 'admin.' (contoh: admin.blogs.index).
|
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute untuk dashboard admin, mengarah ke daftar berita
    Route::get('/', [BlogController::class, 'index']);

    // Route::resource secara otomatis membuat rute untuk CRUD (index, create, store, show, edit, update, destroy)
    
    // Rute untuk manajemen Berita (Menggunakan BlogController dari root namespace)
    Route::resource('blogs', BlogController::class);
    
    // Rute untuk manajemen Video (Menggunakan alias AdminVideoController)
    Route::resource('videos', AdminVideoController::class);
    
    // Rute untuk manajemen Pengumuman (Menggunakan alias AdminPengumumanController)
    Route::resource('pengumumans', AdminPengumumanController::class);
    
    // Rute untuk manajemen Regulasi (Menggunakan alias AdminRegulasiController)
    Route::resource('regulasi', AdminRegulasiController::class);

});
