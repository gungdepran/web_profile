<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majelis Desa Adat Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('gambar/logo.png') }}" alt="Logo Majelis Desa Adat" class="w-20 h-20 rounded-[92px] shadow-[0px_0px_24px_0px_rgba(0,0,0,0.25)] border border-black mr-3">
                    <div class="flex flex-col">
                        <a href="{{ route('beranda') }}" class="text-2xl font-bold text-black">Majelis Desa Adat</a>
                        <a href="{{ route('beranda') }}" class="text-2xl font-bold text-black">Provinsi Bali</a>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-12">
                    <a href="#" class="text-gray-500 hover:text-indigo-600 font-medium text-lg">Berita</a>
                     <img src="{{ asset('gambar/stright-line.svg') }}" alt="Divider" class="mx-2 h-7">
                    <a href="#artikel" class="text-gray-500 hover:text-indigo-600 font-medium text-lg">Video</a>
                     <img src="{{ asset('gambar/stright-line.svg') }}" alt="Divider" class="mx-2 h-7">
                    <a href="#lokasi" class="text-gray-500 hover:text-indigo-600 font-medium text-lg">Lokasi</a>
                     <img src="{{ asset('gambar/stright-line.svg') }}" alt="Divider" class="mx-2 h-7">
                    <a href="regulasi.blade.php" class="text-gray-500 hover:text-indigo-600 font-medium text-lg">Regulasi</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative">
        <div class="absolute inset-0">
            <img src="{{ asset('gambar/background.png') }}" class="w-full h-[714.91px] object-cover" alt="Hero Background">
            <div class="absolute inset-0 bg-black opacity-50 w-full h-[714.91px]"></div>
        </div>
      <div class="relative h-[714.91px] flex items-center justify-center text-center text-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl md:text-7xl font-extrabold tracking-tight">Majelis Desa Adat</h1>
    <h1 class="text-4xl md:text-7xl font-extrabold tracking-tight">Provinsi Bali</h1>
    <p class="mt-12 max-w-3xl mx-auto text-xl md:text-2xl text-gray-200 tracking-wider">Nangun Sat Kerti Loka Bali</p>
    <p class="mt-6 max-w-3xl mx-auto text-xl md:text-2xl text-gray-200 tracking-wider">Melalui Pembangunan Semesta Menuju Bali Era Baru</p>
  </div>
</div>
    </header>
    <main id="artikel" class="py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">Berita Terbaru</h2>
                <img src="{{ asset('gambar/divider.png') }}" alt="Divider" class="mx-auto mt-4 h-8">
            </div>

            @if($blogs->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover" 
                                 src="{{ $blog->gambar ? asset('storage/' . $blog->gambar) : 'https://placehold.co/600x400/e2e8f0/4a5568?text=Artikel' }}" 
                                 alt="{{ $blog->judul }}">
                        </div>
                        
                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                    <a href="#" class="hover:text-indigo-600">{{ $blog->judul }}</a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-4">
                                   {{ Str::limit($blog->deskripsi, 120) }}
                                </p>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-500">
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
                <div class="text-center py-16">
                    <p class="text-xl text-gray-600">Belum ada artikel untuk ditampilkan.</p>
                </div>
            @endif
        </div>
    </main>
<!-- footer -->
    <footer class="bg-gray-800 text-gray-300">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">WebsiteKu</h3>
                    <p class="text-sm">Menyajikan informasi dan wawasan berkualitas untuk mencerahkan hari Anda. Terus belajar dan berkembang bersama kami.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Tautan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-indigo-400">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-indigo-400">Kontak</a></li>
                        <li><a href="#" class="hover:text-indigo-400">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Facebook</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Instagram</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.08 2.465c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0 8a3 3 0 110-6 3 3 0 010 6zm5.857-8.397a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z" clip-rule="evenodd" /></svg></a>
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Twitter</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                <p class="text-sm">&copy; 2025 WebsiteKu. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>