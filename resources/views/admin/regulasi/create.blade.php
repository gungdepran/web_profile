<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tambah Regulasi</title>
    <title>Admin Panel - Tambah Regulasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- Memuat ikon Bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    body {
        display: flex;
        min-height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
        height: 100vh;
        background: linear-gradient(180deg, #1e3c72, #2a5298);
        color: #ffffff;
        display: flex;
        flex-direction: column;
        padding: 1.5rem 1rem;
        overflow-y: auto;
        z-index: 999;
    }

    .sidebar .brand {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
    }

    .sidebar .brand i {
        font-size: 2rem;
        margin-right: 10px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        color: #dcdcdc;
        border-radius: 8px;
        transition: background 0.2s, color 0.2s;
        font-size: 1rem;
    }

    .nav-link i {
        margin-right: 12px;
        font-size: 1.2rem;
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .logout {
        margin-top: auto;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 1rem;
    }

    .content {
        flex-grow: 1;
        padding: 2rem;
        background-color: #ffffff;
        margin-left: 260px; /* offset sesuai lebar sidebar */
        overflow-y: auto;
    }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            z-index: 1000;
            height: 100vh;
            transform: translateX(-100%);
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-toggler {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            background: #2a5298;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            border: none;
        }
    }
</style>

{{-- Tombol sidebar untuk mobile --}}
<button class="sidebar-toggler d-md-none" onclick="document.querySelector('.sidebar').classList.toggle('open')">
    <i class="bi bi-list"></i>
</button>

{{-- Sidebar --}}
<div class="sidebar">
    <div class="brand">
        <i class="bi bi-shield-lock-fill"></i>
        <span>Admin Panel</span>
    </div>
    <a href="/admin" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="{{ url('/admin/blogs') }}" class="nav-link {{ Request::is('admin/blogs*') ? 'active' : '' }}">
        <i class="bi bi-newspaper"></i> Manajemen Berita
    </a>
    <a href="{{ route('admin.videos.index') }}" class="nav-link {{ Request::is('admin/videos*') ? 'active' : '' }}">
        <i class="bi bi-camera-video-fill"></i> Manajemen Video
    </a>
    <a href="{{ route('admin.pengumumans.index') }}" class="nav-link {{ Request::is('admin/pengumumans*') ? 'active' : '' }}">
        <i class="bi bi-megaphone-fill"></i> Manajemen Pengumuman
    </a>
    <a href="{{ route('admin.regulasi.index') }}" class="nav-link {{ Request::is('admin/regulasi*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text-fill"></i> Manajemen Regulasi
    </a>
    <div class="logout">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
    </div>
</div>
{{-- Konten Utama --}}
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title mb-0">Tambah Regulasi Baru</h1>
                <h1 class="card-title mb-0">Tambah Regulasi Baru</h1>
            </div>
            <div class="card-body">
               <form action="{{ route('admin.regulasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Regulasi</label>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Sukses!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonColor: '#4f46e5',
        confirmButtonText: 'Mantap!'
    });
</script>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.form-delete');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

</body>
</html>
