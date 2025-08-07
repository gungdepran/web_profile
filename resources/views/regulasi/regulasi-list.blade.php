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
            background-image: linear-gradient(
                rgba(var(--hero-darken, 30, 30, 30), var(--hero-opacity, 0.45)), 
                rgba(var(--hero-darken, 30, 30, 30), var(--hero-opacity, 0.45))
            ), url("{{ asset('gambar/regulasi/background.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 85vh;
            --hero-darken: 30, 30, 30;
            --hero-opacity: 0.45;
        }
    
        .icon-section {
            background: transparent !important;
            margin-top: -20px;
        }

        .scrollbar-dots::-webkit-scrollbar {
            height: 8px;
        }
        .scrollbar-dots::-webkit-scrollbar-track {
           background: transparent;
        }
        .scrollbar-dots::-webkit-scrollbar-thumb {
            background-image: radial-gradient(circle, #999 1px, transparent 1px);
            background-size: 6px 6px;
            background-repeat: repeat-x;
            border-radius: 9999px;
        }
        .scrollbar-dots {
            scrollbar-color: #999 transparent;
            scrollbar-width: thin;
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
                <div class="hidden md:flex flex-col items-center justify-center">
                    <a href="{{ route('beranda') }}">
                        <img src="{{ asset('gambar/regulasi/home.svg') }}" alt="home" class="w-10 h-9 transition-transform duration-200 hover:scale-110 hover:opacity-80">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <header class="hero-bg relative">
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold font-serif">Regulasi</h1>
            <h2 class="text-4xl md:text-6xl font-bold font-serif">Majelis Desa Adat</h2>
            <p class="mt-4 text-lg md:text-xl text-gray-200">Nangun Sat Kerthi Loka Bali Melalui Pembangunan Semesta Menuju Bali Era Baru</p>
        </div>
        <section class="py-12 icon-section">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                
                {{-- icon Keputusan Paruman --}}
                <a href="#keputusanParuman" class="group">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                        <img src="{{ asset('gambar/regulasi/pengumuman.svg') }}" alt="Keputusan Paruman" class="w-12 h-12">
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-white font-serif">Keputusan<br/>Paruman</h3>
                </a>

                {{-- icon Undang-Undang --}}
                <a href="#dasarPembentukan" class="group">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                        <img src="{{ asset('gambar/regulasi/palu.svg') }}" alt="Undang-Undang" class="w-12 h-12">
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-white font-serif">Dasar<br/>Pembentukan</h3>
                </a>

                {{-- icon Hukum Adat --}}
                <a href="#hukumAdat" class="group">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                        <img src="{{ asset('gambar/regulasi/hukum.svg') }}" alt="Hukum Adat" class="w-12 h-12">
                    </div>
                    <h2 class="mt-4 text-lg font-semibold text-white font-serif">Hukum<br/>Adat</h2>
                </a>

                {{-- icon Peraturan Daerah --}}
                <a href="#perda" class="group">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                        <img src="{{ asset('gambar/regulasi/bukupalu.svg') }}" alt="Peraturan Daerah" class="w-16 h-16 ml-2">
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-white font-serif">Peraturan<br/>Daerah</h3>
                </a>
            </div>
        </div>
    </section>
    </header>

    <main class="py-16 sm:py-24 bg-white">
    <section id="keputusanParuman" class="py-16 sm:py-24 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-start relative">

            {{-- Kolom Kiri: Judul & Divider --}}
            <div class="md:w-1/4 text-center md:text-left mb-0 md:mb-0 mt-[70px]">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 font-serif leading-snug text-center mr-4">Keputusan<br>Paruman</h2>
                <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="mt-2 w-[292px] mx-auto md:ml-0">
            </div>

            {{-- Garis Vertikal --}}
            <div class="relative mx-6 hidden md:block">
                <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="Garis Vertikal" class="h-full w-[4px] object-contain">
            </div>


            {{-- Kolom Konten Kanan: Scrollable Grid 3 Item --}}
            <div class="md:w-3/4 w-full">
                <div class="overflow-x-auto scrollbar-dots">
                  <div class="flex flex-wrap content-start gap-6 w-max h-[300px]">
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


    <section class="bg-white py-20" id="dasarPembentukan">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative mt-2">
            {{-- Bagian yang bisa diubah untuk mengatur tinggi alur --}}
            <img src="{{ asset('gambar/regulasi/alur.png') }}" 
             alt="Garis Alur" 
             class="absolute left-1/2 transform -translate-x-1/2 h-[400px] z-0 mt-3">
            {{-- Ubah nilai h-[400px] di atas untuk mengatur tinggi gambar alur --}}

            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-10 text-gray-800">

            {{-- Kolom Kiri --}}
            <div class="space-y-16 mt-24 text-right mr-16">
                {{-- Ubah nilai mt-24 di atas untuk mengatur jarak turun kolom kiri --}}
                <div>
                <h3 class="font-semibold text-lg">Undang-Undang Nomor 15 Tahun 2023</h3>
                </div>
                <div>
                <h3 class="font-semibold text-lg mt-[172px]">Peraturan Gubernur Bali Nomor 34 Tahun 2019</h3>
                </div>
            </div>
            {{-- Ubah nilai space-y-16 di atas untuk mengatur jarak antar item di kolom kiri --}}
            
            <div class="space-y-16 text-left ml-16">
                <div class="mt-0">
                    <h3 class="font-medium text-lg">UUD 1945 Pasal 18B Ayat (2)</h3>
                </div>
                <div>
                    <h3 class="font-medium text-lg mt-[171px]">Peraturan Daerah Provinsi Bali Nomor 4 Tahun 2019</h3>
                </div>
                <div>
                    <h3 class="font-medium text-lg mt-[171px]">Keputusan Pesamuan Agung / Paruman</h3>
                </div>
            </div>
            {{-- Kolom Kanan --}}
        </div>

        {{-- Divider dan Judul --}}
        <div class="mt-[29px] text-center">
            <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="garis" class="mx-auto h-1 w-[400px]">
            <h2 class="mt-4 text-2xl font-semibold text-black font-serif">Dasar Pembentukan<br>Majelis Desa Adat</h2>
            <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="w-[200px] mx-auto mt-2">
        </div>
    </div>
</section>

<section class="py-28 bg-white" id="hukumAdat">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 flex flex-col md:flex-row items-start relative">

        {{-- Kolom Kiri: Isi Paragraf --}}
        <div class="md:w-2/3 pr-8">
            <p class="text-gray-800 text-justify mb-8 text-xl leading-relaxed">
                Hukum Adat di Bali bersumber dari nilai-nilai tradisi, adat istiadat, dan kearifan lokal yang telah dijalankan turun-temurun oleh masyarakat adat Bali. Dalam konteks Desa Adat, hukum adat berlaku secara mandiri dan mengikat krama desa (warga adat).
            </p>
            <p class="text-gray-800 mb-4 text-xl font-semibold">Ciri-ciri hukum adat Bali:</p>
            <ul class="list-disc list-inside text-gray-800 text-xl space-y-3 pl-6">
                <li>Bersifat tidak tertulis, namun hidup dalam praktik keseharian masyarakat.</li>
                <li>Diatur dan ditegakkan oleh Desa Adat melalui Perarem, Awig-Awig, dan Kerta Desa.</li>
                <li>Bisa menyentuh aspek sanksi sosial, spiritual, hingga denda material.</li>
            </ul>
        </div>

        {{-- Garis Vertikal --}}
        <div class="relative mx-10 hidden md:block">
            <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="Garis Vertikal" class="h-[400px] w-[14px] object-contain">
        </div>

        {{-- Kolom Kanan: Judul --}}
        <div class="flex flex-col items-center mt-32">
            <h2 class="text-2xl font-bold text-center font-serif">Hukum Adat</h2>
            <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="w-[300px] mt-1">
        </div>

    </div>
</section>


<section class="py-12 bg-white" id="perda">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-start relative">

        {{-- Kolom Kiri: Judul Vertikal --}}
        <div class="md:w-1/3 mt-40 text-center font-serif">
            <h2 class="text-2xl font-semibold">Peraturan Daerah<br>Provinsi Bali</h2>
            <img src="{{ asset('gambar/regulasi/divider.png') }}" alt="Divider" class="mx-auto mt-2 md:ml-0">
        </div>

        {{-- Garis Vertikal --}}
        <div class="relative mx-6 hidden md:block">
            <img src="{{ asset('gambar/regulasi/garis.png') }}" alt="Garis Vertikal" class="h-[455px] w-[11px] object-contain">
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
                    <div class="bg-yellow-200 rounded-full px-4 py-3 shadow-sm text-sm text-gray-900 font-medium" style="border: 3px solid #eab308;">
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
