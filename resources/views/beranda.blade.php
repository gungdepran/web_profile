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
        html { scroll-behavior: smooth; }
        body { 
            font-family: 'Playfair Display'; 
        }
        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display';
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

    <!-- navbar -->
    <nav class="bg-white bg-opacity-80 shadow-sm sticky top-0 z-50 backdrop-blur">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('gambar/logo.png') }}" alt="Logo Majelis Desa Adat" class="w-21 h-20 mr-3">
                    <div class="flex flex-col">
                        <a href="{{ route('beranda') }}" class="text-xl font-bold text-black font-serif">Majelis Desa Adat</a>
                        <a href="{{ route('beranda') }}" class="text-xl font-bold text-black font-serif">Provinsi Bali</a>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-8 items-center">
                    <a href="#berita" class="text-gray-600 hover:text-indigo-600 font-medium">Berita</a>
                    <img src="{{ asset('gambar/stright-line.svg') }}" alt="vdivider" class="w-4 h-7">
                    <a href="#video-pengumuman" class="text-gray-600 hover:text-indigo-600 font-medium">Video</a>
                    <img src="{{ asset('gambar/stright-line.svg') }}" alt="vdivider" class="w-4 h-7">
                    <a href="#lokasi" class="text-gray-600 hover:text-indigo-600 font-medium">Lokasi</a>
                    <img src="{{ asset('gambar/stright-line.svg') }}" alt="vdivider" class="w-4 h-7">
                    <a href="{{ route('regulasi.list') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Regulasi</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative">
        <div class="absolute inset-0">
            <img src="{{ asset('gambar/background.png') }}" class="w-full h-[714px] object-cover" alt="Latar Belakang Pura">
            <div class="absolute inset-0 bg-black opacity-50 w-full h-[714px]"></div>
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
        <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mx-auto mt-1 h-8">
    </div>

    @if(isset($blogs) && $blogs->count())
        <div class="overflow-x-auto">
            <div class="flex gap-6 pb-4 scroll-smooth snap-x snap-mandatory">
                @foreach($blogs as $blog)
                <div class="w-[410px] h-[405px] flex-shrink-0 rounded-[25px] border border-black/50 bg-white shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 snap-start">
                    <div class="h-1/2 overflow-hidden">
                        <img class="w-full h-full object-cover rounded-t-[25px]"
                             src="{{ $blog->gambar ? asset('storage/' . $blog->gambar) : 'https://placehold.co/600x400/e2e8f0/4a5568?text=Berita' }}"
                             alt="{{ $blog->judul }}">
                    </div>
                    <div class="p-6 flex flex-col h-1/2">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 font-serif">
                                <a href="{{ route('berita.show', $blog->id) }}" class="hover:text-indigo-600">{{ $blog->judul }}</a>
                            </h3>
                            <p class="text-gray-600 text-base mb-4 min-h-[72px]">
                                {{ Str::limit($blog->deskripsi, 120) }}
                            </p>
                        </div>
                        <div class="mt-auto">
                            <p class="text-sm text-gray-500">
                                Dipublikasikan pada {{ $blog->created_at->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
                        <div class="mb-8 flex flex-col items-center text-center">
                            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl font-serif">Video Terbaru</h2>
                            <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mt-2 h-6 mx-auto">
                        </div>

                        @if(isset($videos) && $videos->count())
                            <div class="overflow-x-auto">
                                <div class="grid grid-rows-2 auto-cols-max grid-flow-col gap-6 pb-4 scroll-smooth snap-x snap-mandatory min-w-max">
                                    @foreach($videos as $video)
                                    <div class="w-[320px] h-[220px] bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 snap-start">
                                        <div class="p-4">
                                            <div class="video-container mb-2">
                                                {!! $video->kode_embed !!}
                                            </div>
                                            <h3 class="text-md font-semibold text-gray-800 font-serif">
                                                {{ $video->judul }}
                                            </h3>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="text-center py-16 bg-white rounded-lg shadow-md">
                                <p class="text-xl text-gray-600">Belum ada video untuk ditampilkan.</p>
                            </div>
                        @endif
                    </div>

                    {{-- KOLOM KANAN: PENGUMUMAN --}}
                    <div>
                        <div class="mb-8 flex flex-col items-center text-center">
                            <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl font-serif">Pengumuman</h2>
                            <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mt-2 h-6">
                        </div>

                        <div class="bg-white rounded-lg shadow-lg p-6 max-h-[495px] overflow-y-auto">
                            @if(isset($pengumumans) && $pengumumans->count())
                                <ul class="space-y-5">
                                    @foreach($pengumumans as $pengumuman)
                                    <li class="flex items-start pb-5 border-b border-gray-200 last:border-b-0">
                                        <div class="flex-shrink-0 mr-4 pt-1">
                                            <img src="{{ asset('gambar/pengumuman.png') }}" alt="icon pengumuman" class="w-11 h-10 mt-2">
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



        <section id="lokasi" class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 overflow-x-hidden">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl font-serif">Lokasi Majelis Desa Adat</h2>
                <img src="{{ asset('gambar/divider.png') }}" alt="Pemisah Hiasan" class="mx-auto mt-1 h-8">
            </div>

            <div class="flex flex-col lg:flex-row items-start gap-10 lg:h-[550px]">
                {{-- Kolom 1: Gambar --}}
                <div class="flex-shrink-0 w-full lg:w-auto">
                    <img src="{{ asset('gambar/lokasi.png') }}" 
                        alt="Peta Lokasi MDA"
                        class="w-full lg:w-[679px] h-[300px] lg:h-full object-cover rounded-[30px] lg:rounded-[51px] border-[4px] lg:border-[6px] border-zinc-600" />
                </div>
                <div class="hidden lg:block w-[4px] h-[465px] bg-gray-300 rounded-full"></div>
                <div class="flex-1 pr-1 lg:pr-4 overflow-y-auto lg:max-h-[465px] scrollbar-none">
                    @php
                        $lokasiList = [ 
                            ["nama" => "Majelis Desa Adat Provinsi Bali", "link" => "https://maps.app.goo.gl/8qg1Liar2Ky3iUtH6"],
                            ["nama" => "Majelis Desa Adat Kabupaten Badung", "link" => "https://maps.app.goo.gl/GWgTjDYKsBvWwGHz7"],
                            ["nama" => "Majelis Desa Adat Kabupaten Bangli", "link" => "https://maps.app.goo.gl/ieGp5ZhtbV9aQYss7"],
                            ["nama" => "Majelis Desa Adat Kabupaten Buleleng", "link" => "https://maps.app.goo.gl/YwD1nCWA72UuvPhQA"],
                            ["nama" => "Majelis Desa Adat Kabupaten Gianyar", "link" => "https://maps.app.goo.gl/iWFAPxgQjztNQ1hN9"],
                            ["nama" => "Majelis Desa Adat Kabupaten Jembrana", "link" => "https://maps.app.goo.gl/JdLDozxPwpaLdSnx8"],
                            ["nama" => "Majelis Desa Adat Kabupaten Karangasem", "link" => "https://maps.app.goo.gl/SqLa2KBaHcfPuw2H8"],
                            ["nama" => "Majelis Desa Adat Kabupaten Klungkung", "link" => "https://maps.app.goo.gl/9CbVxNKdyvcp8WYR9"],
                            ["nama" => "Majelis Desa Adat Kabupaten Tabanan", "link" => "https://maps.app.goo.gl/wBYAQabyp4kiBoed9"],
                            ["nama" => "Majelis Desa Adat Kota Denpasar", "link" => "https://maps.app.goo.gl/95WE2NwVgN62jDHq9
                            "],
                        ];
                    @endphp

                    <ul class="space-y-6">
                        @foreach($lokasiList as $lokasi)
                            <li class="flex items-start gap-4 border-b border-gray-300 pb-4">
                                <img src="{{ asset('gambar/lokasi-icon.svg') }}" alt="lokasi icon" class="w-6 h-6 mt-1">
                                <a href="{{ $lokasi['link'] }}" target="_blank" rel="noopener noreferrer"
                                class="text-base sm:text-lg font-semibold font-playfair leading-snug text-gray-900 hover:text-indigo-600 transition">
                                    {{ $lokasi['nama'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </main>

<footer class="bg-[#9C5A00] text-gray-100">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
      <div>
        <h3 class="text-xl font-bold font-serif mb-4">Tentang</h3>
        <p class="text-sm leading-relaxed">
          Ini merupakan website resmi Majelis Desa Adat Provinsi Bali
        </p>
        <p class="text-sm mt-4 font-bold">Alamat</p>
        <p class="text-sm leading-relaxed">
          Jl. Cok Agung Tresna No.67, Sumerta Kelod,<br>
          Kec. Denpasar Tim., Kota Denpasar, Bali 80234
        </p>
      </div>

      <div>
        <h3 class="text-xl font-bold font-serif mb-4">Informasi</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">Berita</a></li>
          <li><a href="#" class="hover:text-white">Video</a></li>
          <li><a href="#" class="hover:text-white">Lokasi</a></li>
          <li><a href="#" class="hover:text-white">Kontak</a></li>
        </ul>
      </div>

      <div>
        <h3 class="text-xl font-bold font-serif mb-4">Kontak Kami</h3>
        <ul class="space-y-3 text-sm">
          <li class="flex items-start">
            <img src="{{ asset('gambar/pin.png') }}" alt="Alamat" class="w-6 h-6 mr-2 mt-1">
            <span>Jl. Cok Agung Tresna No.67, Sumerta Kelod, Kec. Denpasar Tim., Kota Denpasar, Bali</span>
          </li>
          <li class="flex items-center">
            <img src="{{ asset('gambar/phone.png') }}" alt="Telepon" class="w-7 h-7 mr-2">
            <span>0813-3871-9803</span>
          </li>
          <li class="flex items-center">
            <img src="{{ asset('gambar/email.png') }}" alt="Email" class="w-6 h-5 mr-2">
            <span>mdabaliofficial@gmail.com</span>
          </li>
        </ul>
      </div>

      <div>
        <h3 class="text-xl font-bold font-serif mb-4">Media Sosial</h3>
        <ul class="space-y-3 text-sm">
          <li class="flex items-center">
            <img src="{{ asset('gambar/Facebook.png') }}" alt="Facebook" class="w-6 h-6 mr-2">
            <span>Mda Provinsi Bali</span>
          </li>
          <li class="flex items-center">
            <img src="{{ asset('gambar/instagram.png') }}" alt="Instagram" class="w-6 h-6 mr-2">
            <span>@mdabali_official</span>
          </li>
          <li class="flex items-center">
            <img src="{{ asset('gambar/tiktok.png') }}" alt="TikTok" class="w-6 h-6 mr-2">
            <span>mdaprovbali_official</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="bg-[#3F3659] py-4">
    <p class="text-center text-sm text-white">
      Majelis Desa Adat Provinsi Bali
    </p>
  </div>
</footer>
</body>
</html>
        