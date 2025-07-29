<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manajemen Regulasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { display: flex; min-height: 100vh; flex-direction: row; background-color: #f8f9fa; }
        .sidebar { width: 280px; min-height: 100vh; background-color: #343a40; }
        .sidebar .nav-link { color: #c2c7d0; font-size: 1.1rem; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #fff; background-color: #495057; }
        .sidebar .nav-link .bi { margin-right: 10px; }
        .content { flex-grow: 1; padding: 30px; }
    </style>
</head>
<body>

{{-- Sidebar Navigasi --}}
<div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
    <a href="{{ route('admin.blogs.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="bi bi-shield-lock-fill me-2" style="font-size: 2rem;"></i>
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li><a href="{{ route('admin.blogs.index') }}" class="nav-link text-white"><i class="bi bi-newspaper"></i> Manajemen Berita</a></li>
        <li><a href="{{ route('admin.videos.index') }}" class="nav-link text-white"><i class="bi bi-camera-video-fill"></i> Manajemen Video</a></li>
        <li><a href="{{ route('admin.pengumumans.index') }}" class="nav-link text-white"><i class="bi bi-megaphone-fill"></i> Manajemen Pengumuman</a></li>
        <li><a href="{{ route('admin.regulasi.index') }}" class="nav-link active" aria-current="page"><i class="bi bi-file-earmark-text-fill"></i> Manajemen Regulasi</a></li>
    </ul>
    <hr>
    {{-- Logout Form --}}
</div>

{{-- Konten Utama --}}
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">Manajemen Regulasi</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.regulasi.create') }}" class="btn btn-success mb-3">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Regulasi Baru
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
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($regulasis as $key => $regulasi)
                                <tr>
                                    <td>{{ $regulasis->firstItem() + $key }}</td>
                                    <td>
                                        <img src="{{ $regulasi->thumbnail ? asset('storage/' . $regulasi->thumbnail) : 'https://placehold.co/100x100' }}" alt="Thumbnail" width="100">
                                    </td>
                                    <td>{{ $regulasi->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($regulasi->tanggal)->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.regulasi.edit', $regulasi->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.regulasi.destroy', $regulasi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus regulasi ini?');">
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
                                    <td colspan="5" class="text-center">Belum ada data regulasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $regulasis->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
