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

    <main class="py-16 sm:py-24 bg-white">
    <section id="keputusan-paruman" class="py-16 sm:py-24 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-start relative">

            {{-- Kolom Kiri: Judul & Divider --}}
            <div class="md:w-1/4 text-center md:text-left mb-10 md:mb-0">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 font-serif leading-snug">Keputusan<br>Paruman</h2>
                <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="mt-2 h-5 mx-auto md:ml-0">
            </div>

            {{-- Garis Vertikal --}}
            <div class="relative mx-6 hidden md:block">
                <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="Garis Vertikal" class="h-full w-px object-contain">
            </div>

            {{-- Kolom Konten Kanan: Scrollable Grid 3 Item --}}
            <div class="md:w-3/4 w-full">
                <div class="overflow-x-auto">
                    <div class="flex gap-6 w-max" style="min-width: 768px">
                        @forelse($regulasis as $regulasi)
                        <a href="{{ route('regulasi.show', $regulasi->id) }}" class="w-[300px] flex-shrink-0 group bg-white rounded-lg shadow-lg hover:shadow-2xl overflow-hidden transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex flex-col h-full">
                                <div class="flex-shrink-0">
                                    <img class="h-44 w-full object-cover" 
                                         src="{{ $regulasi->thumbnail ? asset('storage/' . $regulasi->thumbnail) : 'https://placehold.co/600x400/e2e8f0/4a5568?text=Regulasi' }}" 
                                         alt="{{ $regulasi->judul }}">
                                </div>
                                <div class="flex-1 p-4 flex flex-col justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500 mb-1">{{ \Carbon\Carbon::parse($regulasi->tanggal)->format('d F Y') }}</p>
                                        <h3 class="text-lg font-semibold text-gray-900 font-serif group-hover:text-indigo-600 transition-colors duration-300">
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
                        <div class="text-center py-16 w-full bg-white rounded-lg shadow-md">
                            <p class="text-xl text-gray-600">Belum ada regulasi untuk ditampilkan.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                {{-- Paginasi --}}
                <div class="mt-12">
                    {{ $regulasis->links() }}
                </div>
            </div>

        </div>
    </div>
</section>


        <section class="bg-white py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        {{-- Garis Tengah (alur.png) --}}
        <img src="{{ asset('gambar/regulasi/alur.png') }}" alt="Garis Alur" class="absolute left-1/2 transform -translate-x-1/2 h-full z-0">

        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-10 text-gray-800 text-center">

            {{-- Kolom Kiri --}}
            <div class="space-y-16">
                <div class="mt-0">
                    <h3 class="font-semibold text-lg">Undang-Undang Nomor 15 Tahun 2023</h3>
                </div>
                <div>
                    <h3 class="font-semibold text-lg">Peraturan Gubernur Bali Nomor 34 Tahun 2019</h3>
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div class="space-y-16">
                <div class="mt-0">
                    <h3 class="font-medium text-lg">UUD 1945 Pasal 18B Ayat (2)</h3>
                </div>
                <div>
                    <h3 class="font-medium text-lg">Peraturan Daerah Provinsi Bali Nomor 4 Tahun 2019</h3>
                </div>
                <div>
                    <h3 class="font-medium text-lg">Keputusan Pesamuan Agung / Paruman</h3>
                </div>
            </div>
        </div>

        {{-- Divider dan Judul --}}
        <div class="mt-16 text-center">
            <h2 class="text-xl font-bold">Dasar Pembentukan<br>Majelis Desa Adat</h2>
            <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="mx-auto mb-0">
        </div>

    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-start relative">

        {{-- Kolom Kiri: Isi Paragraf --}}
        <div class="md:w-2/3 pr-4">
            <p class="text-gray-800 text-justify mb-6">
                Hukum Adat di Bali bersumber dari nilai-nilai tradisi, adat istiadat, dan kearifan lokal yang telah dijalankan turun-temurun oleh masyarakat adat Bali. Dalam konteks Desa Adat, hukum adat berlaku secara mandiri dan mengikat krama desa (warga adat).
            </p>
            <p class="text-gray-800 mb-2">Ciri-ciri hukum adat Bali:</p>
            <ul class="list-disc list-inside text-gray-800 space-y-1 pl-4">
                <li>Bersifat tidak tertulis, namun hidup dalam praktik keseharian masyarakat.</li>
                <li>Diatur dan ditegakkan oleh Desa Adat melalui Perarem, Awig-Awig, dan Kerta Desa.</li>
                <li>Bisa menyentuh aspek sanksi sosial, spiritual, hingga denda material.</li>
            </ul>
        </div>

        {{-- Garis Vertikal --}}
        <div class="relative mx-6 my-8 hidden md:block">
            <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="Garis Vertikal" class="h-full w-px object-contain">
        </div>

        {{-- Kolom Kanan: Judul --}}
        <div class="md:w-1/3 text-center md:text-left mt-8 md:mt-0">
            <h2 class="text-xl font-bold">Hukum Adat</h2>
            <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="mx-auto mt-2">
        </div>
        
    </div>
</section>
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-start relative">

        {{-- Kolom Kiri: Judul Vertikal --}}
        <div class="md:w-1/3 text-center md:text-left">
            <h2 class="text-xl font-semibold">Peraturan Daerah<br>Provinsi Bali</h2>
            <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="mx-auto mt-2 md:ml-0">
        </div>

        {{-- Garis Vertikal --}}
        <div class="relative mx-6 my-8 hidden md:block">
            <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="Garis Vertikal" class="h-full w-px object-contain">
        </div>

        {{-- Kolom Kanan: Isi Pokok Perda --}}
        <div class="md:w-2/3">
            <p class="text-lg font-medium text-gray-800 mb-2">Perda Provinsi Bali Nomor 4 Tahun 2019 tentang Desa Adat di Bali</p>
            <p class="text-base font-semibold text-gray-700 mb-4">Isi pokok Peraturan Daerah</p>

            <div class="space-y-3">
                @foreach([
                    'Pengakuan dan perlindungan atas keberadaan Desa Adat.',
                    'Penjelasan struktur Desa Adat mengenai Bendesa Adat, Prajuru, Krama, dan Banjar Adat.',
                    'Kewenangan Desa Adat, termasuk bidang hukum adat, spiritual, budaya, lingkungan, dan ekonomi.',
                    'Pembentukan dan peran Majelis Desa Adat Provinsi/Kabupaten/Kota/Kecamatan.',
                    'Mekanisme pembentukan Awig-Awig dan Pararem.',
                    'Pengelolaan harta kekayaan dan dana desa adat.'
                ] as $item)
                    <div class="bg-yellow-200 rounded-full px-4 py-3 shadow-sm text-sm text-gray-900 font-medium">
                        {{ $item }}
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

    </main>

    {{-- FOOTER LENGKAP --}}
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
