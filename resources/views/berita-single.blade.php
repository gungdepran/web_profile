<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->judul }} - Majelis Desa Adat Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
        }
        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display', serif;
        }
        /* Styling untuk konten artikel */
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            font-size: 1.125rem; /* Ukuran font lebih nyaman dibaca */
        }
        .article-content h2, .article-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- NAVIGASI --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('beranda') }}">
                        <img src="{{ asset('gambar/logo.png') }}" alt="Logo Majelis Desa Adat" class="w-16 h-16 mr-3">
                    </a>
                    <div class="flex flex-col">
                        <a href="{{ route('beranda') }}" class="text-xl font-bold text-black font-serif">Majelis Desa Adat</a>
                        <a href="{{ route('beranda') }}" class="text-xl font-bold text-black font-serif">Provinsi Bali</a>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-8 items-center">
                    <a href="{{ route('beranda') }}#berita" class="text-gray-600 hover:text-indigo-600 font-medium">Berita</a>
                    <a href="{{ route('beranda') }}#video-pengumuman" class="text-gray-600 hover:text-indigo-600 font-medium">Video</a>
                    <a href="{{ route('beranda') }}#lokasi" class="text-gray-600 hover:text-indigo-600 font-medium">Lokasi</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium">Regulasi</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- KONTEN UTAMA --}}
    <main class="py-12 sm:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">

                {{-- KOLOM KIRI: ISI BERITA --}}
                <div class="lg:col-span-2 bg-white p-6 sm:p-8 rounded-lg shadow-lg">
                    <article>
                        {{-- Judul Berita --}}
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 font-serif leading-tight">{{ $blog->judul }}</h1>
                        
                        {{-- Meta Info: Tanggal --}}
                        <p class="text-gray-500 mb-6">
                            Dipublikasikan pada {{ $blog->created_at->format('d F Y, H:i') }} WITA
                        </p>
                        
                        {{-- Gambar Utama Berita --}}
                        <img class="w-full h-auto max-h-[500px] object-cover rounded-lg mb-8 shadow-md" 
                             src="{{ $blog->gambar ? asset('storage/' . $blog->gambar) : 'https://placehold.co/1200x600/e2e8f0/4a5568?text=Berita' }}" 
                             alt="{{ $blog->judul }}">
                        
                        {{-- Konten Deskripsi Berita --}}
                        <div class="prose max-w-none text-gray-800 article-content">
                            {{-- Menggunakan nl2br untuk menghormati baris baru dan e() untuk keamanan --}}
                            <p>{!! nl2br(e($blog->deskripsi)) !!}</p>
                        </div>
                    </article>
                </div>

                {{-- KOLOM KANAN: BERITA TERKAIT --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 font-serif">Berita Terkait</h3>
                        <div class="space-y-6">
                            @if(isset($beritaTerkait) && $beritaTerkait->count())
                                @foreach($beritaTerkait as $item)
                                <a href="{{ route('berita.show', $item->id) }}" class="flex items-center group bg-white p-3 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <img class="w-24 h-24 object-cover rounded-lg mr-4 flex-shrink-0" 
                                         src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://placehold.co/100x100/e2e8f0/4a5568?text=...' }}" 
                                         alt="{{ $item->judul }}">
                                    <div>
                                        <h4 class="font-semibold text-gray-800 leading-tight group-hover:text-indigo-600 transition-colors">
                                            {{ Str::limit($item->judul, 55) }}
                                        </h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ $item->created_at->format('d M Y') }}</p>
                                    </div>
                                </a>
                                @endforeach
                            @else
                                <p class="text-gray-600">Tidak ada berita terkait.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-gray-300 mt-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p class="text-sm">&copy; {{ date('Y') }} Majelis Desa Adat Provinsi Bali. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
