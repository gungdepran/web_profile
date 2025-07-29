<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manajemen Video</title>
    {{-- Memuat Bootstrap CSS dari CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Memuat ikon Bootstrap dari CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: row;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
            font-size: 1.1rem;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }
        .sidebar .nav-link .bi {
            margin-right: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
        /* Style untuk membuat video embed responsif */
        .video-preview iframe {
            width: 220px; /* Lebar yang lebih besar untuk preview */
            height: 124px;
            border-radius: 8px;
        }
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
        <li class="nav-item">
            {{-- Ganti URL sesuai dengan rute dashboard Anda --}}
            <a href="#" class="nav-link text-white">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>
        <li>
            {{-- Tautan untuk Blog/Berita (dari database Anda) --}}
            <a href="{{ url('/admin/blogs') }}" class="nav-link text-white">
                 <i class="bi bi-newspaper"></i>
                Manajemen Berita
            </a>
        </li>
        <li>
            {{-- Tautan aktif untuk video --}}
            <a href="{{ route('admin.videos.index') }}" class="nav-link active" aria-current="page">
                <i class="bi bi-camera-video-fill"></i>
                Manajemen Video
            </a>
        </li>
        <li>
            {{-- Tautan untuk pengumuman --}}
            <a href="{{ route('admin.pengumumans.index') }}" class="nav-link text-white">
                <i class="bi bi-megaphone-fill"></i>
                Manajemen Pengumuman
            </a>
        </li>
        <li><a href="{{ route('admin.regulasi.index') }}" class="nav-link active" aria-current="page"><i class="bi bi-file-earmark-text-fill"></i> Manajemen Regulasi</a></li>
    </ul>
    <hr>
    {{-- Tambahkan bagian logout jika ada --}}
    <div>
         <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="nav-link text-white">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

{{-- Bagian Konten Utama --}}
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0" style="font-size: 1.5rem;">Manajemen Video</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.videos.create') }}" class="btn btn-success mb-3">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Video Baru
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
                                <th scope="col">Preview Video</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $key => $video)
                                <tr>
                                    {{-- Menggunakan pagination-aware index --}}
                                    <td>{{ $videos->firstItem() + $key }}</td>
                                    <td>{{ $video->judul }}</td>
                                    <td class="video-preview">
                                        {{-- Penting: Gunakan {!! !!} untuk render HTML dari kode embed --}}
                                        {!! $video->kode_embed !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus video ini?');">
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
                                    <td colspan="4" class="text-center">Belum ada data video.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Link Paginasi --}}
                <div class="d-flex justify-content-center">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Memuat Bootstrap JS dari CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
