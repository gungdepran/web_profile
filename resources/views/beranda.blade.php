<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majelis Desa Adat Bali</title>
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
        /* Styling untuk membuat iframe video responsif */
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* Aspect Ratio 16:9 */
            height: 0;
            overflow: hidden;
            width: 100%;
            background-color: #000;
            border-radius: 0.5rem; /* Sudut membulat */
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- NAVIGASI --}}
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
                    <a href="#berita" class="text-gray-600 hover:text-indigo-600 font-medium">Berita</a>
                    <a href="#video-pengumuman" class="text-gray-600 hover:text-indigo-600 font-medium">Video</a>
                    <a href="#lokasi" class="text-gray-600 hover:text-indigo-600 font-medium">Lokasi</a>
                    <a href="{{ route('regulasi.list') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Regulasi</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- HEADER --}}
    <header class="relative">
        <div class="absolute inset-0">
            <img src="{{ asset('gambar/background.png') }}" class="w-full h-[650px] object-cover" alt="Latar Belakang Pura">
            <div class="absolute inset-0 bg-black opacity-50 w-full h-[650px]"></div>
        </div>
      <div class="relative h-[650px] flex items-center justify-center text-center text-white">
          <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-7xl font-bold tracking-tight font-serif">Majelis Desa Adat</h1>
            <h1 class="text-4xl md:text-7xl font-bold tracking-tight font-serif">Provinsi Bali</h1>
            <p class="mt-8 max-w-3xl mx-auto text-xl md:text-2xl text-gray-200">"Nangun Sat Kerthi Loka Bali Melalui Pola Pembangunan Semesta Berencana Menuju Bali Era Baru"</p>
          </div>
        </div>
    </header>

    {{-- KONTEN UTAMA --}}
    <main class="py-16 sm:py-24 space-y-20">
        
        {{-- BAGIAN BERITA TERBARU --}}
        <section id="berita" class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl font-serif">Berita Terbaru</h2>
                <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mx-auto mt-4 h-8">
            </div>

            @if(isset($blogs) && $blogs->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="flex-shrink-0">
                            <img class="h-56 w-full object-cover" 
                                 src="{{ $blog->gambar ? asset('storage/' . $blog->gambar) : 'https://placehold.co/600x400/e2e8f0/4a5568?text=Berita' }}" 
                                 alt="{{ $blog->judul }}">
                        </div>
                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 font-serif">
                                    <a href="{{ route('berita.show', $blog->id) }}" class="hover:text-indigo-600">{{ $blog->judul }}</a>
                                </h3>
                                <p class="text-gray-600 text-base mb-4">
                                   {{ Str::limit($blog->deskripsi, 120) }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-500">
                                    Dipublikasikan pada {{ $blog->created_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-16">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="text-center py-16 bg-white rounded-lg shadow-md">
                    <p class="text-xl text-gray-600">Belum ada berita untuk ditampilkan.</p>
                </div>
            @endif
        </section>

        {{-- BAGIAN VIDEO & PENGUMUMAN --}}
        <section id="video-pengumuman" class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                
                {{-- KOLOM KIRI: VIDEO TERBARU --}}
                <div class="lg:col-span-2">
                    <div class="text-left mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl font-serif">Video Terbaru</h2>
                        <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mt-2 h-6">
                    </div>

                    @if(isset($videos) && $videos->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach($videos as $video)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                                <div class="p-5">
                                    <div class="video-container mb-4">
                                        {!! $video->kode_embed !!}
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800 font-serif">
                                        {{ $video->judul }}
                                    </h3>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium mt-2 inline-block">Tonton Video &rarr;</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16 bg-white rounded-lg shadow-md">
                            <p class="text-xl text-gray-600">Belum ada video untuk ditampilkan.</p>
                        </div>
                    @endif
                </div>

                {{-- KOLOM KANAN: PENGUMUMAN --}}
                <div>
                    <div class="text-left mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl font-serif">Pengumuman</h2>
                        <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mt-2 h-6">
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-6">
                        @if(isset($pengumumans) && $pengumumans->count())
                            <ul class="space-y-5">
                                @foreach($pengumumans as $pengumuman)
                                <li class="flex items-start pb-5 border-b border-gray-200 last:border-b-0">
                                    <div class="flex-shrink-0 mr-4 pt-1">
                                        <svg class="w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 100 15h8.25a1.5 1.5 0 001.5-1.5v-12a1.5 1.5 0 00-1.5-1.5H10.5zM9 9h.008v.008H9V9zm.75 3.75h.008v.008H9.75v-.008zm1.5 0h.008v.008h-.008v-.008zm1.5 0h.008v.008h-.008v-.008z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">
                                            {{ $pengumuman->created_at->format('d F Y') }}
                                        </p>
                                        <h4 class="font-semibold text-gray-800 leading-tight font-serif">
                                            <a href="#" class="hover:text-indigo-600">{{ $pengumuman->judul }}</a>
                                        </h4>
                                        @if($pengumuman->sumber)
                                        <p class="text-sm text-gray-600 mt-1">
                                            {{ $pengumuman->sumber }}
                                        </p>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="text-center py-8">
                                <p class="text-gray-600">Belum ada pengumuman.</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </section>

    </main>

    {{-- FOOTER --}}
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
                        <li><a href="#berita" class="hover:text-indigo-400">Berita</a></li>
                        <li><a href="#video-pengumuman" class="hover:text-indigo-400">Video</a></li>
                        <li><a href="#" class="hover:text-indigo-400">Regulasi</a></li>
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
                <p class="text-sm">&copy; 2025 Majelis Desa Adat Provinsi Bali. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
