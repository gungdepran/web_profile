<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;

/**
 * Controller ini menangani semua logika untuk menampilkan
 * halaman regulasi di sisi pengunjung (front-end).
 */
class RegulasiController extends Controller
{
    /**
     * Menampilkan halaman daftar semua regulasi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $regulasis = Regulasi::latest()->paginate(10);
        return view('regulasi.regulasi-list', compact('regulasis'));
    }

    /**
     * Menampilkan halaman detail untuk satu regulasi.
     *
     * @param  \App\Models\Regulasi  $regulasi
     * @return \Illuminate\View\View
     */
    public function show(Regulasi $regulasi)
    {
        // Mengambil 4 regulasi terbaru lainnya untuk ditampilkan sebagai "Regulasi Lainnya"
        $regulasiLainnya = Regulasi::where('id', '!=', $regulasi->id)
                                    ->latest()
                                    ->take(4)
                                    ->get();

        return view('regulasi.regulasi-single', compact('regulasi', 'regulasiLainnya'));
    }
}
 