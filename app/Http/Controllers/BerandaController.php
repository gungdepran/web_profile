<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Mengambil semua data blog, diurutkan dari yang terbaru, dengan pagination
        $blogs = Blog::latest()->paginate(6); // Menampilkan 6 artikel per halaman

        return view('beranda', compact('blogs'));
    }
}