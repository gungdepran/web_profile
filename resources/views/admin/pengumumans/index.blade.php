<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manajemen Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { display: flex; min-height: 100vh; flex-direction: row; background-color: #f8f9fa; }
        .sidebar { width: 280px; min-height: 100vh; background-color: #343a40; padding-top: 20px; }
        .sidebar .nav-link { color: #c2c7d0; font-size: 1.1rem; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #fff; background-color: #495057; }
        .sidebar .nav-link .bi { margin-right: 10px; }
        .content { flex-grow: 1; padding: 30px; }
    </style>
</head>
<body>

{{-- Bagian Sidebar (Navigasi) --}}
<div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
    <a href="/admin/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="bi bi-shield-lock-fill me-2" style="font-size: 2rem;"></i>
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.blogs.index') }}" class="nav-link text-white"><i class="bi bi-newspaper"></i> Manajemen Berita</a></li>
        <li><a href="{{ route('admin.videos.index') }}" class="nav-link text-white"><i class="bi bi-camera-video-fill"></i> Manajemen Video</a></li>
        <li><a href="{{ route('admin.pengumumans.index') }}" class="nav-link active" aria-current="page"><i class="bi bi-megaphone-fill"></i> Manajemen Pengumuman</a></li>
        <li><a href="{{ route('admin.regulasi.index') }}" class="nav-link text-white"><i class="bi bi-exclamation-triangle-fill"></i> Manajemen Regulasi</a></li>
    </ul>
    <hr>
    <div>
         <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-white">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
    </div>
</div>

{{-- Bagian Konten Utama --}}
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0" style="font-size: 1.5rem;">Manajemen Pengumuman</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.pengumumans.create') }}" class="btn btn-success mb-3">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Pengumuman Baru
                </a>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Sumber</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengumumans as $key => $pengumuman)
                                <tr>
                                    <td>{{ $pengumumans->firstItem() + $key }}</td>
                                    <td>{{ $pengumuman->judul }}</td>
                                    <td>{{ Str::limit($pengumuman->isi, 100) }}</td>
                                    <td>{{ $pengumuman->tanggal_kegiatan ? \Carbon\Carbon::parse($pengumuman->tanggal_kegiatan)->format('d M Y') : '-' }}</td>
                                    <td>{{ $pengumuman->sumber ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.pengumumans.edit', $pengumuman->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.pengumumans.destroy', $pengumuman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pengumuman ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3-fill"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data pengumuman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $pengumumans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
