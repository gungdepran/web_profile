<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tambah Regulasi</title>
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
    <a href="{{ route('admin.regulasi.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
</div>

{{-- Konten Utama --}}
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">Tambah Regulasi Baru</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.regulasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Regulasi</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="isi_keputusan" class="form-label">Isi Keputusan</label>
                        <textarea class="form-control @error('isi_keputusan') is-invalid @enderror" id="isi_keputusan" name="isi_keputusan" rows="5" required>{{ old('isi_keputusan') }}</textarea>
                        @error('isi_keputusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail (Opsional)</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                        @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="file_path" class="form-label">File Dokumen (PDF/Word, Opsional)</label>
                        <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" accept=".pdf,.doc,.docx">
                        @error('file_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Simpan</button>
                    <a href="{{ route('admin.regulasi.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle-fill"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
