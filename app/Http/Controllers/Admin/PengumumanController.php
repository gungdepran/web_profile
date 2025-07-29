<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::latest()->paginate(10);
        return view('admin.pengumumans.index', compact('pengumumans'));
    }

    public function create()
    {
        return view('admin.pengumumans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_kegiatan' => 'nullable|date',
            'sumber' => 'nullable|string|max:255',
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('admin.pengumumans.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumumans.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal_kegiatan' => 'nullable|date',
            'sumber' => 'nullable|string|max:255',
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('admin.pengumumans.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('admin.pengumumans.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}