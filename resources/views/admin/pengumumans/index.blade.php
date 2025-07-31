<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manajemen Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
<button class="sidebar-toggler d-md-none" onclick="document.querySelector('.sidebar').classList.toggle('open')">
    <i class="bi bi-list"></i>
</button>
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

{{-- Bagian Konten Utama --}}
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" style="background-color: #2a5298; color: #fff;">
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
