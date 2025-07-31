<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        margin-left: 360px;
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

<div class="container mt-5">
    <h2>Daftar Blog</h2>
    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Tambah Blog</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->judul }}</td>
                    <td>{{ $blog->deskripsi }}</td>
                    <td>
                        @if($blog->gambar)
                            <img src="{{ asset('storage/' . $blog->gambar) }}" width="100" alt="Gambar Blog">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data belum ada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
</body>
</html>
