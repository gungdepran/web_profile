<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegulasiController extends Controller
{
    public function index()
    {
        $regulasis = Regulasi::latest()->paginate(10);
        return view('admin.regulasi.index', compact('regulasis'));
    }

    public function create()
    {
        return view('admin.regulasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi_keputusan' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Maks 10MB
        ]);

        $data = $request->only(['judul', 'tanggal', 'isi_keputusan']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('regulasi/thumbnails', 'public');
        }

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('regulasi/files', 'public');
        }

        Regulasi::create($data);

        return redirect()->route('admin.regulasi.index')->with('success', 'Regulasi berhasil ditambahkan.');
    }

    public function edit(Regulasi $regulasi)
    {
        return view('admin.regulasi.edit', compact('regulasi'));
    }

    public function update(Request $request, Regulasi $regulasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi_keputusan' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $data = $request->only(['judul', 'tanggal', 'isi_keputusan']);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($regulasi->thumbnail) {
                Storage::disk('public')->delete($regulasi->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('regulasi/thumbnails', 'public');
        }

        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($regulasi->file_path) {
                Storage::disk('public')->delete($regulasi->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('regulasi/files', 'public');
        }

        $regulasi->update($data);

        return redirect()->route('admin.regulasi.index')->with('success', 'Regulasi berhasil diperbarui.');
    }

    public function destroy(Regulasi $regulasi)
    {
        if ($regulasi->thumbnail) {
            Storage::disk('public')->delete($regulasi->thumbnail);
        }
        if ($regulasi->file_path) {
            Storage::disk('public')->delete($regulasi->file_path);
        }
        
        $regulasi->delete();

        return redirect()->route('admin.regulasi.index')->with('success', 'Regulasi berhasil dihapus.');
    }
}
