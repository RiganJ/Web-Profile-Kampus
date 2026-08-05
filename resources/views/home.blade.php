
@extends('layouts.main')

@section('title', 'Universitas Fort De Kock')

@section('content')

{{-- ================= HERO BANNER ================= --}}
@php
    $heroDimension = $slides->first()->banner_dimension ?? 'compact';
@endphp

<section class="hero-slider hero-slider--{{ $heroDimension }}">

@foreach($slides->take(4) as $slide)
<div class="hero-section hero-slide">

    @php
        $mediaFit = $slide->media_fit ?? 'cover';
        $mediaPosition = $slide->media_position ?? 'center center';
        $mediaBackgroundSize = $mediaFit == 'fill' ? 'cover' : $mediaFit;
        $mediaObjectFit = $mediaFit == 'fill' ? 'cover' : $mediaFit;
        $mediaUrl = $slide->media_url;
    @endphp

    {{-- MEDIA --}}
    @if($slide->media_type == 'image')
        <div class="hero-media"
             style="background-image:url('{{ $mediaUrl }}'); background-position:{{ $mediaPosition }}; background-size:{{ $mediaBackgroundSize }}; background-repeat:no-repeat;">
        </div>
    @else
        @php
            $videoMime = str_ends_with(strtolower($slide->media_path), '.webm') ? 'video/webm' : 'video/mp4';
        @endphp
        <video class="hero-media-video"
               style="object-fit:{{ $mediaObjectFit }}; object-position:{{ $mediaPosition }};"
               autoplay muted loop playsinline>
            <source src="{{ $mediaUrl }}" type="{{ $videoMime }}">
        </video>
    @endif

    <div class="hero-layer {{ $mediaFit == 'contain' ? 'hero-layer--soft' : '' }}"></div>

<div class="hero-inner container">

    {{-- BREADCRUMB --}}
    @if($loop->first)
        <div class="hero-breadcrumb hero-pop">
            <a href="/" class="breadcrumb-link">
                <span class="breadcrumb-slash">//</span> Beranda
            </a>
        </div>
    @endif


    {{-- TITLE --}}
    @if($slide->title)
<h1 class="hero-title hero-pop">
    {{ $slide->title }}
</h1>    @endif


    {{-- DESCRIPTION --}}
    @if($slide->description)
        <p class="hero-desc hero-pop">{{ $slide->description }}</p>
    @endif


    {{-- ACTION BUTTON --}}
    @if($loop->iteration <= 3)
    <div class="hero-action hero-pop flex flex-col gap-6">

        <div class="flex flex-wrap gap-4">

            {{-- BUTTON PRODI --}}
            <a href="/prodi"
            class="group relative w-52 h-12 bg-white/20 backdrop-blur-md rounded-full overflow-hidden
            flex items-center justify-between px-6 text-slate-800">

                <span class="absolute inset-0 bg-[#f47511]
                scale-x-0 origin-left
                transition-transform duration-500 ease-out
                group-hover:scale-x-100"></span>

                <span class="relative z-10 text-sm font-medium group-hover:text-white">
                    Lihat Program Studi
                </span>

                <i data-lucide="arrow-up-right"
                class="relative z-10 w-5 h-5 transition-all duration-300 
                group-hover:rotate-45 group-hover:translate-x-1 
                group-hover:text-white"></i>

            </a>


            {{-- BUTTON PROFIL --}}
<a href="/sejarah"
class="group relative w-52 h-12 border border-white/40 rounded-full overflow-hidden
flex items-center justify-between px-6 text-white backdrop-blur-md">

    <!-- Background Hover Layer -->
    <span class="absolute inset-0 bg-[#0F172A]
                 scale-x-0 origin-left
                 transition-transform duration-500 ease-out
                 group-hover:scale-x-100">
    </span>

    <!-- Text -->
    <span class="relative z-10 text-sm font-medium transition-colors duration-300">
        Lihat Profil Kampus
    </span>

    <!-- Icon -->
    <i class="fa-solid fa-building-columns relative z-10"></i>

</a>
</div>


        {{-- SOCIAL MEDIA --}}
        <div class="flex items-center gap-6 text-white text-lg ml-6">

            <a href="https://www.tiktok.com/@ufdkofficial" class="hover:text-[#FF7F11] transition">
                <i class="fa-brands fa-tiktok"></i>
            </a>

            <a href="https://www.instagram.com/ufdkofficial/" class="hover:text-[#FF7F11] transition">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="https://www.youtube.com/results?search_query=UFDK" class="hover:text-[#FF7F11] transition">
                <i class="fa-brands fa-youtube"></i>
            </a>

        </div>

    </div>
    @endif

</div>
</div>
@endforeach

<div class="hero-dots"></div>

</section>
<section class="py-20 bg-gray-50 relative overflow-hidden">

  <!-- BACKGROUND PATTERN -->
  <div class="absolute inset-0 bg-[url('/images/pattern2.jpg')] bg-repeat bg-[size:300px] opacity-10"></div>

  <div class="container mx-auto px-6 relative z-10">

    <!-- INFORMASI + FOTO -->
    <div class="grid md:grid-cols-2 gap-14 items-center mb-20">

      <div class="relative group overflow-hidden rounded-2xl shadow-xl reveal-left">
        <img src="/images/fdk.jpeg"
             class="w-full h-full object-cover">

    <div class="shine-effect"></div>
</div>

      <!-- INFORMASI LEBIH MENARIK -->
      <div class="reveal-right">
<h2 class="text-3xl md:text-4xl font-bold mb-6 leading-snug">
  <span class="text-[#FF7F11]">Transformasi</span> Pendidikan untuk Masa Depan Gemilang
</h2>

        <p class="text-gray-600 leading-relaxed mb-6">
          Dengan kurikulum berbasis industri dan dukungan dosen profesional,
          kami menghadirkan sistem pendidikan modern yang berorientasi pada
          praktik dan pengembangan karakter mahasiswa.
        </p>

               </div>
      </div>

    </div>
<!-- STATISTIK STRIP PREMIUM -->
<section class="mt-16">
  <div class="grid md:grid-cols-4 gap-4 justify-items-center">

    <!-- ITEM 1 -->
    <div class="bg-[#FF7F11] rounded-full px-4 py-5 
                inline-flex items-center gap-6 text-white 
                min-w-[300px]">

      <!-- ICON BULAT -->
      <div class="w-16 h-16 bg-white rounded-full 
                  flex items-center justify-center shrink-0">
        <i class="fa-solid fa-medal text-[#FF7F11] text-3xl"></i>
      </div>

      <!-- TEXT -->
      <div>
        <h3 class="text-3xl font-semibold leading-tight">
          Baik Sekali
        </h3>
        <p class="text-base opacity-90">
          Akreditasi Institusi
        </p>
      </div>
    </div>

    <!-- ITEM 2 -->
    <div class="bg-[#FF7F11] rounded-full px-4 py-5 
                inline-flex items-center gap-6 text-white 
                min-w-[300px]">

      <div class="w-16 h-16 bg-white rounded-full 
                  flex items-center justify-center shrink-0">
        <i class="fa-solid fa-handshake text-[#FF7F11] text-3xl"></i>
      </div>

      <!-- TEXT -->
      <div>
        <h3 class="text-3xl font-semibold leading-tight">
          {{ $statistics['mitra_kerjasama'] }}
        </h3>
        <p class="text-base opacity-90">
          Mitra Kerjasama
        </p>
      </div>
    </div>

    <!-- ITEM 3 -->
    <div class="bg-[#FF7F11] rounded-full px-4 py-5 
                inline-flex items-center gap-6 text-white 
                min-w-[300px]">

      <div class="w-16 h-16 bg-white rounded-full 
                  flex items-center justify-center shrink-0">
        <i class="fa-solid fa-earth-americas text-[#FF7F11] text-3xl"></i>
      </div>

      <!-- TEXT -->
      <div>
           <h3 class="text-3xl font-semibold leading-tight">
        92%
    </h3>
    <p class="text-base opacity-90">
        Alumni Berkarier
    </p>
      </div>
    </div>

    <!-- ITEM 4 -->
    <div class="bg-[#FF7F11] rounded-full px-4 py-5 
                inline-flex items-center gap-6 text-white 
                min-w-[300px]">

      <div class="w-16 h-16 bg-white rounded-full 
                  flex items-center justify-center shrink-0">
        <i class="fa-solid fa-graduation-cap text-[#FF7F11] text-3xl"></i>
      </div>

      <!-- TEXT -->
      <div>
        <h3 class="text-3xl font-semibold leading-tight">
          100%
        </h3>
        <p class="text-base opacity-90">
          Lulusan Bersertifikasi
        </p>
      </div>
    </div>

  </div>
<div class="statistics-section py-5">
    <div class="container">
        <div class="row g-4">

            <!-- 1 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="fact-statistics-item">
                    <div class="fact-statistics-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <div class="fact-statistics-content">
                        <h2><span class="counter">{{ $statistics['prodi'] }}</span></h2>
                        <p>Program Studi</p>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="fact-statistics-item">
                    <div class="fact-statistics-icon">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <div class="fact-statistics-content">
                        <h2><span class="counter">{{ $statistics['dosen'] }}</span></h2>
                        <p>Dosen</p>
                    </div>
                </div>
            </div>



            <!-- 4 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="fact-statistics-item">
                    <div class="fact-statistics-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div class="fact-statistics-content">
                        <h2><span class="counter">400</span>+</h2>
                        <p>Penerima Beasiswa</p>
                    </div>
                </div>
            </div>

            <!-- 5 -->
          <div class="col-lg-4 col-md-6 col-12">
    <div class="fact-statistics-item">
        <div class="fact-statistics-icon">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="fact-statistics-content">
            <h2><span class="counter">3500</span>+</h2>
            <p>Mahasiswa Aktif</p>
        </div>
    </div>
</div>

            <!-- 6 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="fact-statistics-item">
                    <div class="fact-statistics-icon">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <div class="fact-statistics-content">
                        <h2><span class="counter">{{ $statistics['guru_besar'] }}</span></h2>
                        <p>Guru Besar</p>
                    </div>
                </div>
            </div>


            <!-- 10 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="fact-statistics-item">
                    <div class="fact-statistics-icon">
                        <i class="fa-solid fa-file-shield"></i>
                    </div>
                    <div class="fact-statistics-content">
                        <h2><span class="counter">100</span>%</h2>
                        <p>Mahasiswa Diasuransikan</p>
                    </div>
                </div>
            </div>

            <!-- 11 -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="fact-statistics-item">
                    <div class="fact-statistics-icon">
                        <i class="fa-solid fa-users-line"></i>
                    </div>
                    <div class="fact-statistics-content">
                        <h2><span class="counter">5000</span>+</h2>
                        <p>Alumni</p>
                    </div>
                </div>
            </div>

            <!-- 12 -->
           <div class="col-lg-4 col-md-6 col-12">
    <div class="fact-statistics-item">
        <div class="fact-statistics-icon">
            <i class="fa-solid fa-flask-vial"></i>
        </div>
        <div class="fact-statistics-content">
            <h2><span class="counter">8</span>+</h2>
            <p>Laboratorium</p>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
</section>
</section>
<section class="faculty-section">
    <div class="container">

        <!-- FAKULTAS KESEHATAN -->
<!-- FAKULTAS KESEHATAN -->
<div class="faculty-item reveal-left">            
           <div class="faculty-text">

<span class="faculty-label">Fakultas</span>
    <h2 class="faculty-heading">
       Ilmu Kesehatan
        <span class="faculty-abbr">(FIK)</span>
    </h2>

<div class="faculty-divider"></div>

<p>
Fakultas Ilmu Kesehatan berkomitmen mencetak tenaga profesional 
di bidang kesehatan yang kompeten, berintegritas, dan siap 
bersaing di tingkat nasional maupun internasional.
</p>
                <!-- BUTTON MODEL HERO -->
                <div class="hero-action">
                     <a href="prodi-kesehatan.html"
   class="group relative w-52 h-12 bg-white/20 backdrop-blur-md rounded-full  overflow-hidden
          flex items-center justify-between px-6 text-slate-800">

    <!-- Background Hover Layer -->
    <span class="absolute inset-0 bg-[#0F172A] 
                 scale-x-0 origin-left
                 transition-transform duration-500 ease-out
                 group-hover:scale-x-100">
    </span>

    <!-- Text -->
    <span class="relative z-10 text-sm font-medium transition-colors duration-300 group-hover:text-white">
        Lihat Program Studi
    </span>

    <!-- Icon -->
    <i data-lucide="arrow-up-right"
       class="relative z-10 w-5 h-5 transition-all duration-300 
              group-hover:rotate-45 group-hover:translate-x-1 
              group-hover:text-white">
    </i>

</a>
                </div>
            </div>

            <div class="faculty-image">
                <img src="images/fik.png" alt="Fakultas Kesehatan">
            </div>

        </div>


        <!-- FAKULTAS HUMANIORA -->
<!-- FAKULTAS HUMANIORA -->
<div class="faculty-item reverse reveal-right">            
          <div class="faculty-text">

<span class="faculty-label">Fakultas</span>


<div class="faculty-title flex items-start gap-3">

    <i class="fa-solid fa-book-open text-2xl flex-shrink-0 mt-1"></i>
    

    <h2 class="faculty-heading">
        Sosial Ekonomi dan Humaniora
        <span class="faculty-abbr">(FSEH)</span>
    </h2>

</div>


<p>
Fakultas Humaniora menghadirkan pendidikan berbasis 
nilai kemanusiaan, budaya, dan komunikasi untuk 
menghasilkan lulusan yang adaptif dan inovatif.
</p>
                <!-- BUTTON MODEL HERO -->
                <div class="hero-action">
                    <a href="prodi-kesehatan.html"
   class="group relative w-52 h-12 bg-white/20 backdrop-blur-md rounded-full overflow-hidden
          flex items-center justify-between px-6 text-slate-800">

    <!-- Background Hover Layer -->
    <span class="absolute inset-0 bg-[#0F172A] 
                 scale-x-0 origin-left
                 transition-transform duration-500 ease-out
                 group-hover:scale-x-100">
    </span>

    <!-- Text -->
    <span class="relative z-10 text-sm font-medium transition-colors duration-300 group-hover:text-white">
        Lihat Program Studi
    </span>

    <!-- Icon -->
    <i data-lucide="arrow-up-right"
       class="relative z-10 w-5 h-5 transition-all duration-300 
              group-hover:rotate-45 group-hover:translate-x-1 
              group-hover:text-white">
    </i>

</a>
                </div>
            </div>

            <div class="faculty-image">
                <img src="images/fseh2.jpg" alt="Fakultas Humaniora">
            </div>

        </div>

    </div>
</section>
<section class="relative py-24 bg-white overflow-hidden">

<!-- Background Pattern -->
<div class="absolute inset-0 bg-[url('/images/pattern.png')] bg-repeat opacity-30"></div>

<div class="container mx-auto px-6 relative z-10">

<div class="grid md:grid-cols-2 items-center gap-14">

<!-- TEXT -->
<div class="reveal-up">
<h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight">
Mulai Perjalanan <span class="text-[#FF7F11]">Pendidikanmu</span> Bersama Kami
</h2>

<p class="text-gray-600 max-w-xl mb-10 text-lg">
Bergabunglah dengan ribuan mahasiswa yang telah mempercayakan
masa depan pendidikan mereka bersama kampus kami.
Raih pengalaman belajar terbaik dan siapkan dirimu
untuk dunia profesional.
</p>

<!-- Buttons -->
<div class="flex flex-col sm:flex-row gap-6">

<!-- Button Daftar -->
           <a href="https://pmb.ufdk.ac.id/"
   class="group relative w-50 h-14 bg-white/20 border border-slate-300 backdrop-blur-md rounded-full overflow-hidden
          flex items-center justify-between px-6 text-slate-800 gap-3">

    <!-- Background Hover Layer -->
    <span class="absolute inset-0 bg-[#f47511] 
                 scale-x-0 origin-left
                 transition-transform duration-500 ease-out
                 group-hover:scale-x-100">
    </span>

    <!-- Text -->
    <span class="relative z-10 text-sm font-medium transition-colors duration-300 group-hover:text-white">
        Daftar Sekarang
    </span>

    <!-- Icon -->
    <i data-lucide="arrow-up-right"
       class="relative z-10 w-5 h-5 transition-all duration-300 
              group-hover:rotate-45 group-hover:translate-x-1 
              group-hover:text-white">
    </i>

</a>

<!-- Button Info -->
<a href="#"
class="group relative w-50 h-14 border border-slate-300 rounded-full overflow-hidden
flex items-center justify-between px-6 text-slate-800 gap-4">

    <!-- Background Hover -->
    <span class="absolute inset-0 bg-slate-900
                 scale-x-0 origin-left
                 transition-transform duration-500 ease-out
                 group-hover:scale-x-100">
    </span>

    <!-- Text -->
    <span class="relative z-10 text-sm font-medium transition-colors duration-300 group-hover:text-white">
        Lihat Informasi
    </span>

    <!-- Icon -->
    <i class="fa-solid fa-circle-info relative z-10 transition-colors duration-300 group-hover:text-white"></i>

</a>

</div>

</div>


<!-- FOTO MODEL -->
<!-- FOTO MODEL -->
<div class="relative flex justify-center reveal-up">
<img src="/images/pmb.png"
class="relative z-4 w-[260px] md:w-[420px] object-contain">

<!-- Glow Shape -->
<div class="absolute -bottom-10 -right-10 w-90 h-90 bg-[#FF7F11]/10 rounded-full blur-3xl"></div>

</div>


</div>

</div>

</section>
</section>

<section class="relative py-16 bg-[#e96f0c] overflow-hidden">

<div class="container mx-auto px-6">

<!-- TOP AREA -->
<div class="grid md:grid-cols-2 gap-16 items-start mb-16">

<!-- LEFT : HEADER -->
<div class="max-w-xl text-white reveal-up">
<span class="uppercase tracking-[3px] text-xs font-semibold text-white/70">
 Informasi Terbaru Kampus
</span>

<h2 class="text-4xl md:text-5xl font-bold mt-4 mb-5 leading-tight">
Update <span class="text-[#0F172A]">Kampus</span>
</h2>

<div class="w-20 h-[3px] bg-white/60 mb-6 rounded"></div>

<p class="text-white/90 text-lg leading-relaxed">
Dapatkan berbagai informasi terbaru seputar kegiatan kampus,
prestasi mahasiswa, serta perkembangan penelitian dari civitas
akademika yang terus berkontribusi bagi masyarakat dan dunia pendidikan.
</p>

</div>


<!-- RIGHT : FEATURED NEWS -->
<div class="bg-white rounded-2xl overflow-hidden shadow-lg reveal-up">
<div class="relative overflow-hidden">

@php
    $featuredNewsImage = $featuredNews?->thumbnail
        ? $featuredNews->thumbnail_url
        : asset('images/news1.jpg');
    $beritaItem = $latestBerita;
    $beritaImage = $beritaItem?->thumbnail
        ? $beritaItem->thumbnail_url
        : asset('images/news1.jpg');
    $prestasiItem = $latestPrestasi;
    $prestasiImage = $prestasiItem?->thumbnail
        ? $prestasiItem->thumbnail_url
        : asset('images/news2.jpg');
    $risetItem = $latestRiset;
    $risetImage = $risetItem?->thumbnail
        ? $risetItem->thumbnail_url
        : asset('images/news3.jpg');
@endphp
<img src="{{ $featuredNewsImage }}"
alt="{{ $featuredNews?->judul ?? 'Berita unggulan' }}"
class="w-full h-64 object-cover">

<div class="shine"></div>

</div>

<div class="p-6">

<span class="text-xs font-semibold text-[#e96f0c] uppercase">
{{ $featuredNews ? ucfirst($featuredNews->kategori) . ' Unggulan' : 'Berita Unggulan' }}
</span>

<h3 class="text-xl font-bold text-slate-900 mt-2 mb-3">
{{ $featuredNews?->judul ?? 'Berita unggulan akan tampil di sini.' }}
</h3>

<p class="text-gray-600 text-sm mb-4">
{{ $featuredNews?->konten ? \Illuminate\Support\Str::limit(strip_tags($featuredNews->konten), 120) : 'Konten berita terbaru akan otomatis tampil setelah data berita tersedia di database.' }}
</p>

<a href="{{ $featuredNews ? route('artikel.show', $featuredNews->slug) : route('berita.index') }}" class="text-[#e96f0c] font-semibold text-sm">
Baca Selengkapnya →
</a>

</div>

</div>

</div>



<!-- NEWS GRID -->
<div class="grid md:grid-cols-3 gap-14 items-start">

<!-- BERITA -->
<div class="space-y-6 reveal-left">

<div class="flex items-center gap-3 text-white">
<div class="w-10 h-[2px] bg-white"></div>
<span class="uppercase text-sm tracking-widest">Berita Terbaru</span>
</div>

<div class="news-card">

<div class="news-image">
<img src="{{ $beritaImage }}" alt="{{ $beritaItem?->judul ?? 'Berita terbaru' }}">
<div class="shine"></div>
</div>

<div class="news-body">

<p class="news-date">{{ $beritaItem?->tanggal ? \Carbon\Carbon::parse($beritaItem->tanggal)->translatedFormat('d F Y') : '-' }}</p>

<h3 class="news-title">
{{ $beritaItem?->judul ?? 'Belum ada berita terbaru' }}
</h3>

<p class="news-desc">
{{ $beritaItem?->konten ? \Illuminate\Support\Str::limit(strip_tags($beritaItem->konten), 95) : 'Data berita kategori berita akan tampil otomatis di bagian ini.' }}
</p>

<a href="{{ $beritaItem ? route('artikel.show', $beritaItem->slug) : route('berita.terbaru') }}" class="news-link">
Baca Selengkapnya →
</a>

</div>

</div>

</div>



<!-- PRESTASI -->
<div class="space-y-6 md:mt-16 reveal-up">

<div class="flex items-center gap-3 text-white">
<div class="w-10 h-[2px] bg-white"></div>
<span class="uppercase text-sm tracking-widest">Prestasi Terbaru</span>
</div>

<div class="news-card">

<div class="news-image">
<img src="{{ $prestasiImage }}" alt="{{ $prestasiItem?->judul ?? 'Prestasi terbaru' }}">
<div class="shine"></div>
</div>

<div class="news-body">

<p class="news-date">{{ $prestasiItem?->tanggal ? \Carbon\Carbon::parse($prestasiItem->tanggal)->translatedFormat('d F Y') : '-' }}</p>

<h3 class="news-title">
{{ $prestasiItem?->judul ?? 'Belum ada prestasi terbaru' }}
</h3>

<p class="news-desc">
{{ $prestasiItem?->konten ? \Illuminate\Support\Str::limit(strip_tags($prestasiItem->konten), 95) : 'Data berita kategori prestasi akan tampil otomatis di bagian ini.' }}
</p>

<a href="{{ $prestasiItem ? route('artikel.show', $prestasiItem->slug) : route('berita.prestasi') }}" class="news-link">
Baca Selengkapnya →
</a>

</div>

</div>

</div>



<!-- PENELITIAN -->
<div class="space-y-6 md:mt-32 reveal-right">

<div class="flex items-center gap-3 text-white">
<div class="w-10 h-[2px] bg-white"></div>
<span class="uppercase text-sm tracking-widest">Penelitian Terbaru</span>
</div>

<div class="news-card">

<div class="news-image">
<img src="{{ $risetImage }}" alt="{{ $risetItem?->judul ?? 'Penelitian terbaru' }}">
<div class="shine"></div>
</div>

<div class="news-body">

<p class="news-date">{{ $risetItem?->tanggal ? \Carbon\Carbon::parse($risetItem->tanggal)->translatedFormat('d F Y') : '-' }}</p>

<h3 class="news-title">
{{ $risetItem?->judul ?? 'Belum ada penelitian terbaru' }}
</h3>

<p class="news-desc">
{{ $risetItem?->konten ? \Illuminate\Support\Str::limit(strip_tags($risetItem->konten), 95) : 'Data berita kategori riset akan tampil otomatis di bagian ini.' }}
</p>

<a href="{{ $risetItem ? route('artikel.show', $risetItem->slug) : route('berita.riset') }}" class="news-link">
Baca Selengkapnya →
</a>

</div>

</div>

</div>

</div>

</div>

</section>
<section class="pt-8 pb-16 bg-white overflow-hidden">
        <div class="container mx-auto px-6">

<div class="grid md:grid-cols-2 gap-16 items-center mb-20">

<!-- LEFT TEXT -->
<div class="reveal-left">

<span class="uppercase tracking-[4px] text-xs text-slate-500 font-semibold">
Mitra Kerja Sama
</span>

<h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-3">
Institusi & <span class="text-[#e96f0c]">Partner</span>
</h2>

<p class="text-gray-600 mt-5 max-w-xl leading-relaxed">
Universitas Fort De Kock menjalin kemitraan strategis dengan berbagai
institusi untuk memperluas akses pendidikan, memperkuat kolaborasi riset,
serta meningkatkan kualitas lulusan yang siap berkontribusi bagi masyarakat.
</p>

<div class="mt-8 border-l-4 border-[#e96f0c] pl-5 max-w-xl">
<p class="text-slate-800 font-medium">
“Kolaborasi yang kuat menjadi fondasi pendidikan yang inovatif
dan berkelanjutan.”
</p>
</div>
</div>

<!-- RIGHT CHART -->
<div id="chartdiv"></div>

</div>

</div>


<!-- PARTNER MOTION RAIL -->
<div class="partner-motion relative mt-8">
<div class="partner-ambient partner-ambient-1"></div>
<div class="partner-ambient partner-ambient-2"></div>

<div class="max-w-[1800px] mx-auto px-2 md:px-4 xl:px-10 relative z-10">
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-7">
<div>
<p class="uppercase tracking-[3px] text-xs font-semibold text-[#e96f0c]">Partner Motion Network</p>
<h3 class="text-2xl md:text-3xl font-bold text-slate-900 mt-2">Kolaborasi Strategis untuk Inovasi</h3>
</div>
<div class="flex flex-wrap gap-2 text-xs font-semibold text-slate-600">
<span class="px-4 py-2 rounded-full bg-white/80 backdrop-blur border border-white shadow-sm">Aktif Kolaborasi</span>
<span class="px-4 py-2 rounded-full bg-white/80 backdrop-blur border border-white shadow-sm">Skala Nasional</span>
<span class="px-4 py-2 rounded-full bg-white/80 backdrop-blur border border-white shadow-sm">Mutu Tinggi</span>
</div>
</div>

<div class="partner-rails">
@php
    $railClasses = ['speed-1', 'speed-2 reverse', 'speed-3', 'speed-4 reverse'];
@endphp
@foreach ($partnerRailGroups as $index => $partners)
<div class="partner-rail-mask">
<div class="partner-rail-track {{ $railClasses[$index] }}">
@if (! empty($partners))
@for ($copy = 0; $copy < 2; $copy++)
<div class="partner-rail-set" @if($copy === 1) aria-hidden="true" @endif>
@foreach ($partners as $partner)
<div class="partner-pill">
    @if(!empty($partner['logo']))
        <img src="{{ $partner['logo'] }}" alt="{{ $partner['name'] }}" style="max-height:40px; max-width:60px; object-fit:contain; flex-shrink:0">
    @else
        <div class="partner-pill-mark">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($partner['name'], 0, 1)) }}</div>
    @endif
    <span style="flex-grow:1; white-space:nowrap; overflow:hidden; text-overflow:ellipsis">{{ $partner['name'] }}</span>
</div>
@endforeach
</div>
@endfor
@else
<div class="partner-rail-set">
<div class="partner-pill">
<div class="partner-pill-mark">?</div>
<span>Data mitra kerja sama belum tersedia</span>
</div>
</div>
@endif
</div>
</div>
@endforeach
</div>
</div>

<style>
.partner-motion{
padding: 22px 0 12px;
}
.partner-ambient{
position:absolute;
border-radius:9999px;
filter:blur(40px);
pointer-events:none;
opacity:.65;
}
.partner-ambient-1{
width:360px;
height:360px;
left:4%;
top:20px;
background:radial-gradient(circle,#ffb67a 0%,#ffedd5 60%,transparent 100%);
}
.partner-ambient-2{
width:420px;
height:420px;
right:2%;
bottom:0;
background:radial-gradient(circle,#93c5fd 0%,#dbeafe 60%,transparent 100%);
}
.partner-rails{
display:flex;
flex-direction:column;
gap:18px;
}
.partner-rail-mask{
position:relative;
overflow:hidden;
border-radius:9999px;
background:linear-gradient(90deg,rgba(255,255,255,.95),rgba(255,255,255,.75));
border:1px solid rgba(226,232,240,.9);
box-shadow:0 10px 24px rgba(15,23,42,.07);
padding:14px 0;
width:calc(100% + 48px);
margin-left:-24px;
}
.partner-rail-mask::before,
.partner-rail-mask::after{
content:"";
position:absolute;
top:0;
width:120px;
height:100%;
z-index:2;
pointer-events:none;
}
.partner-rail-mask::before{
left:0;
background:linear-gradient(to right,#fff 35%,transparent);
}
.partner-rail-mask::after{
right:0;
background:linear-gradient(to left,#fff 35%,transparent);
}
.partner-rail-track{
display:flex;
align-items:center;
width:max-content;
gap:16px;
animation:partnerMarquee var(--partner-marquee-duration, 60s) linear infinite;
will-change:transform;
}
.partner-rail-set{
display:flex;
align-items:center;
gap:16px;
flex:none;
}
.partner-rail-track.reverse{
animation-direction:reverse;
}
.partner-pill{
display:flex;
align-items:center;
gap:12px;
min-width:max-content;
max-width:280px;
padding:10px 18px 10px 10px;
border-radius:9999px;
background:rgba(255,255,255,.9);
border:1px solid rgba(226,232,240,.95);
box-shadow:0 8px 18px rgba(15,23,42,.08);
transition:transform .25s ease, box-shadow .25s ease;
}
.partner-pill:hover{
transform:translateY(-1px) scale(1.02);
box-shadow:0 10px 22px rgba(15,23,42,.12);
}
.partner-pill-mark{
width:52px;
height:52px;
display:flex;
align-items:center;
justify-content:center;
border-radius:9999px;
background:#fff7ed;
color:#ea580c;
font-weight:700;
font-size:18px;
border:1px solid rgba(226,232,240,.9);
flex-shrink:0;
}
.partner-pill span{
font-size:15px;
font-weight:700;
color:#0f172a;
white-space:nowrap;
overflow:hidden;
text-overflow:ellipsis;
flex-grow:1;
}
.partner-pill img{
flex-shrink:0;
}
.partner-rail-mask:hover .partner-rail-track{
animation-play-state:paused;
}
@keyframes partnerMarquee{
from{
transform:translateX(0);
}
to{
transform:translateX(calc(-50% - 8px));
}
}
@media (max-width:768px){
.partner-rail-mask{
width:calc(100% + 20px);
margin-left:-10px;
padding:11px 0;
}
.partner-pill{
padding:8px 14px 8px 8px;
}
.partner-pill-mark{
width:44px;
height:44px;
}
.partner-pill span{
font-size:13px;
}
}
</style>
</div>

</section>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const partnerSpeed = 32;
    const tracks = document.querySelectorAll(".partner-rail-track");

    function syncPartnerMarqueeSpeed() {
        tracks.forEach(function (track) {
            const set = track.querySelector(".partner-rail-set");

            if (!set || track.children.length < 2) {
                track.style.animation = "none";
                return;
            }

            const loopDistance = set.getBoundingClientRect().width + 16;
            track.style.setProperty("--partner-marquee-duration", Math.max(loopDistance / partnerSpeed, 28) + "s");
        });
    }

    syncPartnerMarqueeSpeed();
    window.addEventListener("load", syncPartnerMarqueeSpeed, { once: true });

    let partnerResizeTimer;
    window.addEventListener("resize", function () {
        clearTimeout(partnerResizeTimer);
        partnerResizeTimer = setTimeout(syncPartnerMarqueeSpeed, 150);
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function(){

let slides = document.querySelectorAll(".hero-slide");
let dotsContainer = document.querySelector(".hero-dots");
let current = 0;
let interval = 7000;
let sliderInterval;

function createDots(){
    slides.forEach((_,i)=>{
        let dot = document.createElement("span");
        dot.addEventListener("click",()=>{
            showSlide(i);
            resetSlider();
        });
        dotsContainer.appendChild(dot);
    });
}

function updateDots(){
    let dots = document.querySelectorAll(".hero-dots span");
    dots.forEach(dot=>dot.classList.remove("active"));
    dots[current].classList.add("active");
}

function showSlide(index){
    slides[current].classList.remove("active");
    current = index;
    slides[current].classList.add("active");
    updateDots();
}

function nextSlide(){
    let next = (current + 1) % slides.length;
    showSlide(next);
}

function startSlider(){
    sliderInterval = setInterval(nextSlide, interval);
}

function resetSlider(){
    clearInterval(sliderInterval);
    startSlider();
}

createDots();
slides[0].classList.add("active");
updateDots();
startSlider();

});
</script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>

am5.ready(function () {

var root = am5.Root.new("chartdiv");

root.setThemes([
am5themes_Animated.new(root)
]);

// =======================
// DATA MITRA
// =======================

var data = @json($partnerChartData);

// =======================
// WARNA OTOMATIS
// =======================

var palette = [
am5.color(0xe96f0c),
am5.color(0x2563eb),
am5.color(0x0f766e),
am5.color(0x7c3aed),
am5.color(0x047857),
am5.color(0xb45309)
];

data.forEach(function(d, index){

var color = palette[index % palette.length];

d.columnSettings = {
fill: color,
stroke: am5.color(0xffffff),
strokeWidth: 1.5,
fillOpacity: 0.95
};

d.labelSettings = {
fill: am5.color(0x0f172a)
};

});

// =======================
// CHART
// =======================

var chart = root.container.children.push(
am5radar.RadarChart.new(root,{
panX:false,
panY:false,
wheelX:"none",
wheelY:"none",
innerRadius:am5.percent(20),
startAngle:-90,
endAngle:180
})
);

// =======================
// CURSOR POINTER (EFEK SPEEDOMETER)
// =======================

var cursor = chart.set("cursor",
am5radar.RadarCursor.new(root,{
behavior:"none"
})
);

cursor.lineY.set("visible",false);


// =======================
// AXIS
// =======================

var xRenderer = am5radar.AxisRendererCircular.new(root,{});

xRenderer.labels.template.setAll({
radius:10,
fill:am5.color(0x475569),
fontSize:12
});

xRenderer.grid.template.setAll({
forceHidden:true
});

// compute max full value from data so axis scales dynamically
var maxFull = 1;
if (Array.isArray(data) && data.length) {
maxFull = Math.max.apply(null, data.map(function(d){ return d.full || 0; }));
if (!maxFull || maxFull < 1) maxFull = 1;
}

var xAxis = chart.xAxes.push(
am5xy.ValueAxis.new(root,{
renderer:xRenderer,
min:0,
max:maxFull,
strictMinMax:true,
numberFormat:"#",
tooltip:am5.Tooltip.new(root,{})
})
);



var yRenderer = am5radar.AxisRendererRadial.new(root,{
minGridDistance:20
});

yRenderer.labels.template.setAll({
centerX:am5.p100,
fontWeight:"500",
fontSize:16,
templateField:"labelSettings"
});

yRenderer.grid.template.setAll({
forceHidden:true
});

var yAxis = chart.yAxes.push(
am5xy.CategoryAxis.new(root,{
categoryField:"category",
renderer:yRenderer
})
);

yAxis.data.setAll(data);


// =======================
// BACKGROUND SERIES
// =======================

var series1 = chart.series.push(
am5radar.RadarColumnSeries.new(root,{
xAxis:xAxis,
yAxis:yAxis,
clustered:false,
valueXField:"full",
categoryYField:"category",
fill:root.interfaceColors.get("alternativeBackground")
})
);

series1.columns.template.setAll({
width:am5.p100,
fillOpacity:0.12,
fill:am5.color(0x94a3b8),
strokeOpacity:0,
cornerRadius:22
});

series1.data.setAll(data);


// =======================
// FOREGROUND SERIES
// =======================

var series2 = chart.series.push(
am5radar.RadarColumnSeries.new(root,{
xAxis:xAxis,
yAxis:yAxis,
clustered:false,
valueXField:"value",
categoryYField:"category"
})
);

series2.columns.template.setAll({
width:am5.p100,
strokeOpacity:1,
tooltipText:"{category}: {valueX} Mitra",
cornerRadius:22,
templateField:"columnSettings"
});

series2.data.setAll(data);


// =======================
// SCROLL TRIGGER ANIMATION
// =======================

let chartStarted = false;

function startChart(){

if(chartStarted) return;

chartStarted = true;

series1.appear(1200);
series2.appear(1200);
chart.appear(1200,100);

}

window.addEventListener("scroll",function(){

var chartDiv = document.getElementById("chartdiv");

var position = chartDiv.getBoundingClientRect().top;
var screenPosition = window.innerHeight;

if(position < screenPosition - 120){

startChart();

}

});

});

</script>
<script>

window.addEventListener("load",function(){

document.querySelectorAll('.reveal-left, .reveal-right')
.forEach(el=>{
setTimeout(()=>{
el.classList.add("reveal-show")
},200);
});

});

</script>
<script>

function animateCounter(){

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {

let target = +counter.innerText;
let count = 0;
let speed = target / 80;

function update(){

count += speed;

if(count < target){
counter.innerText = Math.floor(count);
requestAnimationFrame(update);
}else{
counter.innerText = target;
}

}

update();

});

}

window.addEventListener("load",animateCounter);

</script>
<script>

document.addEventListener("DOMContentLoaded",function(){

const revealElements = document.querySelectorAll(".reveal-left, .reveal-right");
const counters = document.querySelectorAll(".counter");

let counterStarted = false;

function revealOnScroll(){

    const windowHeight = window.innerHeight;

    revealElements.forEach(el=>{
        const elementTop = el.getBoundingClientRect().top;

        if(elementTop < windowHeight - 100){
            el.classList.add("reveal-active");
        }
    });

    /* COUNTER START */
    if(!counterStarted){

        const counterSection = document.querySelector(".statistics-section");

        if(counterSection){
            const sectionTop = counterSection.getBoundingClientRect().top;

            if(sectionTop < windowHeight - 100){

                counters.forEach(counter=>{

                    const target = +counter.innerText;
                    let count = 0;
                    const speed = target / 100;

                    const updateCounter = ()=>{

                        count += speed;

                        if(count < target){
                            counter.innerText = Math.floor(count);
                            requestAnimationFrame(updateCounter);
                        }else{
                            counter.innerText = target;
                        }

                    };

                    updateCounter();

                });

                counterStarted = true;

            }
        }

    }

}

window.addEventListener("scroll",revealOnScroll);

});
</script>
<script>

document.addEventListener("DOMContentLoaded",function(){

const reveals = document.querySelectorAll(".reveal-up");

function revealOnScroll(){

    const windowHeight = window.innerHeight;

    reveals.forEach(el=>{

        const elementTop = el.getBoundingClientRect().top;

        if(elementTop < windowHeight - 120){
            el.classList.add("active");
        }

    });

}

window.addEventListener("scroll", revealOnScroll);

});

</script>
@endsection
