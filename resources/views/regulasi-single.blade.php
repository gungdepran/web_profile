<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $regulasi->judul }} - Regulasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            font-size: 1.125rem;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- NAVIGASI LENGKAP --}}
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
                    <a href="{{ route('regulasi.list') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Regulasi</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- KONTEN UTAMA --}}
    <main class="py-12 sm:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">

                {{-- KOLOM KIRI: ISI REGULASI --}}
                <div class="lg:col-span-2 bg-white p-6 sm:p-8 rounded-lg shadow-lg">
                    <article>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2 font-serif leading-tight">{{ $regulasi->judul }}</h1>
                        <p class="text-gray-500 mb-6">
                            Dipublikasikan pada {{ \Carbon\Carbon::parse($regulasi->tanggal)->format('d F Y') }}
                        </p>
                        
                        <img class="w-full h-auto max-h-[500px] object-cover rounded-lg mb-8 shadow-md" 
                             src="{{ $regulasi->thumbnail ? asset('storage/' . $regulasi->thumbnail) : 'https://placehold.co/1200x600/e2e8f0/4a5568?text=Regulasi' }}" 
                             alt="{{ $regulasi->judul }}">
                        
                        <div class="prose max-w-none text-gray-800 article-content">
                            <p>{!! nl2br(e($regulasi->isi_keputusan)) !!}</p>
                        </div>

                        @if($regulasi->file_path)
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <h3 class="text-xl font-bold font-serif mb-4">Dokumen Terlampir</h3>
                            <a href="{{ asset('storage/' . $regulasi->file_path) }}" target="_blank" class="inline-flex items-center bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-indigo-700 transition-colors duration-300">
                                <i class="bi bi-download mr-2"></i>
                                Unduh Dokumen
                            </a>
                        </div>
                        @endif
                    </article>
                </div>

                {{-- KOLOM KANAN: REGULASI LAINNYA --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 font-serif">Regulasi Lainnya</h3>
                        <div class="space-y-6">
                            @forelse($regulasiLainnya as $item)
                            <a href="{{ route('regulasi.show', $item->id) }}" class="group block bg-white p-3 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                <div class="flex items-center">
                                    <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://placehold.co/100x100/e2e8f0/4a5568?text=...' }}" alt="{{ $item->judul }}" class="w-20 h-20 object-cover rounded-md mr-4 flex-shrink-0">
                                    <div>
                                        <h4 class="font-semibold text-gray-800 leading-tight group-hover:text-indigo-600 transition-colors">
                                            {{ Str::limit($item->judul, 50) }}
                                        </h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </a>
                            @empty
                                <p class="text-gray-600">Tidak ada regulasi lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

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
