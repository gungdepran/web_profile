<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulasi - Majelis Desa Adat Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    {{-- Menggunakan Bootstrap Icons untuk ikon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .hero-bg {  
            background-image: url("{{ asset('gambar/background.png') }}"); 
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- NAVIGASI LENGKAP --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('gambar/logo.png') }}" alt="Logo Majelis Desa Adat" class="w-16 h-16 mr-3">
                    <div class="flex flex-col">
                        <a href="{{ route('beranda') }}" class="text-xl font-bold text-black font-serif">Majelis Desa Adat</a>
                        <a href="{{ route('beranda') }}" class="text-xl font-bold text-black font-serif">Provinsi Bali</a>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-8 items-center">
                    <a href="{{ route('beranda') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Beranda</a>
            
                    <a href="{{ route('regulasi.list') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Regulasi</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- HEADER SESUAI REFERENSI GAMBAR --}}
    <header class="hero-bg relative">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold font-serif">Regulasi</h1>
            <h2 class="text-4xl md:text-6xl font-bold font-serif">Majelis Desa Adat</h2>
            <p class="mt-4 text-lg md:text-xl text-gray-200">Nangun Sat Kerthi Loka Bali Melalui Pembangunan Semesta Menuju Bali Era Baru</p>
        </div>
    </header>

    {{-- MENU IKON REGULASI --}}
    <section class="py-12 bg-transparent shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            
            {{-- Keputusan Paruman --}}
            <a href="{{ route('regulasi.list') }}" class="group">
                <div class="w-24 h-24 mx-auto bg-indigo-600 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                    <img src="{{ asset('gambar/regulasi/pengumuman.svg') }}" alt="Keputusan Paruman" class="w-12 h-12">
                </div>
                <h3 class="mt-4 text-lg font-semibold text-gray-800 font-serif">Keputusan Paruman</h3>
            </a>

            {{-- Undang-Undang --}}
            <a href="#" class="group">
                <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                    <img src="{{ asset('gambar/regulasi/palu.svg') }}" alt="Undang-Undang" class="w-12 h-12">
                </div>
                <h3 class="mt-4 text-lg font-semibold text-gray-500 font-serif">Undang-Undang</h3>
            </a>

            {{-- Hukum Adat --}}
            <a href="#" class="group">
                <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                    <img src="{{ asset('gambar/regulasi/hukum.svg') }}" alt="Hukum Adat" class="w-12 h-12">
                </div>
                <h3 class="mt-4 text-lg font-semibold text-gray-500 font-serif">Hukum Adat</h3>
            </a>

            {{-- Peraturan Daerah --}}
            <a href="#" class="group">
                <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                    <img src="{{ asset('gambar/regulasi/bukupalu.svg') }}" alt="Peraturan Daerah" class="w-16 h-16 ml-2">
                </div>
                <h3 class="mt-4 text-lg font-semibold text-gray-500 font-serif">Peraturan Daerah</h3>
            </a>
        </div>
    </div>
</section>

    <main class="py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-left mb-12">
                <h2 class="text-3xl font-bold text-gray-900 font-serif">Keputusan Paruman</h2>
                <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mt-2 h-6">
            </div>

            {{-- LAYOUT BARU: GRID KARTU REGULASI --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($regulasis as $regulasi)
                <a href="{{ route('regulasi.show', $regulasi->id) }}" class="group block bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="flex flex-col h-full">
                        <div class="flex-shrink-0">
                            <img class="h-56 w-full object-cover" 
                                 src="{{ $regulasi->thumbnail ? asset('storage/' . $regulasi->thumbnail) : 'https://placehold.co/600x400/e2e8f0/4a5568?text=Regulasi' }}" 
                                 alt="{{ $regulasi->judul }}">
                        </div>
                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">{{ \Carbon\Carbon::parse($regulasi->tanggal)->format('d F Y') }}</p>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 font-serif group-hover:text-indigo-600 transition-colors duration-300">
                                    {{ $regulasi->judul }}
                                </h3>
                            </div>
                            <div class="mt-4">
                                <span class="inline-flex items-center text-indigo-600 font-semibold">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right-short ml-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-lg shadow-md">
                    <p class="text-xl text-gray-600">Belum ada regulasi untuk ditampilkan.</p>
                </div>
                @endforelse
            </div>

            {{-- Tautan Paginasi --}}
            <div class="mt-16">
                {{ $regulasis->links() }}
            </div>
        </div>
    </main>

    {{-- FOOTER LENGKAP --}}
    <footer class="bg-gray-800 text-gray-300 mt-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4 font-serif">Majelis Desa Adat</h3>
                    <p class="text-sm">Ngardi Jagat Kerthi, Krama Bali Manggala.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4 font-serif">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('beranda') }}#berita" class="hover:text-indigo-400">Berita</a></li>
                        <li><a href="{{ route('beranda') }}#video-pengumuman" class="hover:text-indigo-400">Video</a></li>
                        <li><a href="{{ route('regulasi.list') }}" class="hover:text-indigo-400">Regulasi</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4 font-serif">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Facebook</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Instagram</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.08 2.465c.636-.247 1.363-.416 2.427.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 8a3 3 0 110-6 3 3 0 010 6zm5.857-8.397a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z" clip-rule="evenodd" /></svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                <p class="text-sm">&copy; {{ date('Y') }} Majelis Desa Adat Provinsi Bali. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
