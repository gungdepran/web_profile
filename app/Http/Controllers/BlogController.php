<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    /**
     * Menampilkan semua data blog.
     */
    public function index()
    {
        // Mengambil semua data dari model Blog
        $blogs = Blog::paginate(10); 

        // Mengirim data ke view 'admin'
        return view('admin.blog.admin', ['blogs' => $blogs]);
    }

    // Menampilkan form input
    public function create()
    {
        // Ubah 'blog.create' menjadi 'add'
        return view('admin.blog.add'); 
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        Blog::create($data);

        // Arahkan ke halaman /admin setelah berhasil
        return redirect()->route('admin.blogs.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update data di database.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($blog->gambar) {
                Storage::disk('public')->delete($blog->gambar);
            }
            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Hapus data dari database.
     */
    public function destroy(Blog $blog)
    {
        // Hapus gambar dari storage
        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }

        // Hapus data dari database
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Postingan berhasil dihapus!');
    }
}