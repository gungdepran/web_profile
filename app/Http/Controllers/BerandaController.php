<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Video;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Mengambil 6 berita terbaru dengan pagination
        $blogs = Blog::latest()->paginate(6); 

        // Mengambil 6 video terbaru
        $videos = Video::latest()->take(6)->get(); 
        
        // Mengambil 5 pengumuman terbaru
        $pengumumans = Pengumuman::latest()->take(5)->get();

        // Mengirim semua data ke view 'beranda'
        return view('beranda', compact('blogs', 'videos', 'pengumumans'));
    }

    public function showBerita(Blog $blog)
    {
        // Mengambil 4 berita terbaru lainnya untuk ditampilkan sebagai "Berita Terkait"
        $beritaTerkait = Blog::where('id', '!=', $blog->id)
                                ->latest()
                                ->take(4)
                                ->get();

        return view('berita-single', compact('blog', 'beritaTerkait'));
    }
}
