@extends('layouts.master')

@section('content')
    <h1>Regulasi</h1>
    <p>Ini adalah halaman regulasi dari aplikasi web kami.</p>
@endsection<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulasi - Majelis Desa Adat Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .hero-bg {
            background-image: url("{{ asset('gambar/background.png') }}"); /* Ganti dengan path gambar latar Anda */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- Asumsi Anda memiliki file navigasi terpisah --}}
    @include('layouts.navigation') 

    {{-- HEADER BARU SESUAI REFERENSI --}}
    <header class="hero-bg relative">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold font-serif">Regulasi</h1>
            <h2 class="text-4xl md:text-6xl font-bold font-serif">Majelis Desa Adat</h2>
            <p class="mt-4 text-lg md:text-xl text-gray-200">Nangun Sat Kerthi Loka Bali Melalui Pembangunan Semesta Menuju Bali Era Baru</p>
        </div>
    </header>

    {{-- MENU IKON REGULASI --}}
    <section class="py-12 bg-white shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                
                {{-- Keputusan Paruman (Aktif) --}}
                <a href="{{ route('regulasi.list') }}" class="group">
                    <div class="w-24 h-24 mx-auto bg-indigo-600 rounded-full flex items-center justify-center text-white shadow-lg transform group-hover:scale-110 transition-transform">
                        <i class="bi bi-person-check-fill text-4xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-800 font-serif">Keputusan Paruman</h3>
                </a>

                {{-- Undang-Undang (Placeholder) --}}
                <a href="#" class="group">
                    <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center text-gray-600 shadow-lg transform group-hover:scale-110 transition-transform">
                        <i class="bi bi-journal-bookmark-fill text-4xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-500 font-serif">Undang-Undang</h3>
                </a>

                {{-- Hukum Adat (Placeholder) --}}
                <a href="#" class="group">
                    <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center text-gray-600 shadow-lg transform group-hover:scale-110 transition-transform">
                         <i class="bi bi-bank2 text-4xl"></i>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-500 font-serif">Hukum Adat</h3>
                </a>

                {{-- Peraturan Daerah (Placeholder) --}}
                <a href="#" class="group">
                    <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center text-gray-600 shadow-lg transform group-hover:scale-110 transition-transform">
                        <i class="bi bi-building-fill-check text-4xl"></i>
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

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="space-y-6">
                    @forelse($regulasis as $regulasi)
                    <a href="{{ route('regulasi.show', $regulasi->id) }}" class="group block border-b border-gray-200 pb-6 last:border-b-0">
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <div class="flex-grow">
                                <p class="text-sm text-gray-500 mb-1">{{ \Carbon\Carbon::parse($regulasi->tanggal)->format('d F Y') }}</p>
                                <h3 class="text-xl font-semibold font-serif text-gray-800 group-hover:text-indigo-600">{{ $regulasi->judul }}</h3>
                            </div>
                            <div class="flex-shrink-0 mt-4 sm:mt-0 sm:ml-6">
                                <span class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 group-hover:bg-indigo-200">
                                    Lihat Detail
                                    <i class="bi bi-arrow-right-short ml-2 text-lg"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="text-center py-10">
                        <p class="text-xl text-gray-600">Belum ada regulasi untuk ditampilkan.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Tautan Paginasi --}}
            <div class="mt-16">
                {{ $regulasis->links() }}
            </div>
        </div>
    </main>

    {{-- Asumsi Anda memiliki file footer terpisah --}}
    @include('layouts.footer') 

</body>
</html>
