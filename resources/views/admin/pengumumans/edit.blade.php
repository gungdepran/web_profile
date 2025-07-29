<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Edit Pengumuman</title>
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
        <li><a href="{{ url('/admin/blogs') }}" class="nav-link text-white"><i class="bi bi-newspaper"></i> Manajemen Berita</a></li>
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
                <h1 class="card-title mb-0" style="font-size: 1.5rem;">Edit Pengumuman</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pengumumans.update', $pengumuman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="5" required>{{ old('isi', $pengumuman->isi) }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan (Opsional)</label>
                        <input type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" id="tanggal_kegiatan" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan', $pengumuman->tanggal_kegiatan) }}">
                        @error('tanggal_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sumber" class="form-label">Sumber (Opsional)</label>
                        <input type="text" class="form-control @error('sumber') is-invalid @enderror" id="sumber" name="sumber" value="{{ old('sumber', $pengumuman->sumber) }}" placeholder="Contoh: Majelis Desa Adat Gianyar">
                        @error('sumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save-fill"></i> Update
                    </button>
                    <a href="{{ route('admin.pengumumans.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle-fill"></i> Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
