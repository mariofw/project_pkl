<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Hidroganik Alfa</title>
  <link rel="icon" href="{{ asset('images/Logo_HA.png') }}" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }


    /* Custom responsive utilities */
    .container-responsive {
      width: 100%;
      /* max-width: 1200px; */
      margin: 0 auto;
      padding-left: 1rem;
      padding-right: 1rem;
    }
    @media (min-width: 640px) {
      .container-responsive {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
      }
    }
    @media (min-width: 768px) {
      .container-responsive {
        padding-left: 2rem;
        padding-right: 2rem;
      }
    }
    @media (min-width: 1024px) {
      .container-responsive {
        padding-left: 2.5rem;
        padding-right: 2.5rem;
      }
    }
    /* Enhanced mobile menu animation */
    .mobile-menu-transition {
      transition: all 0.3s ease-in-out;
      max-height: 0;
      overflow: hidden;
    }
    .mobile-menu-transition.active {
      max-height: 300px;
    }
    /* Smooth zoom handling */
    img {
      max-width: 100%;
      height: auto;
    }

    #partners-container::-webkit-scrollbar {
        height: 8px;
    }

    #partners-container::-webkit-scrollbar-thumb {
        background-color: #4a5568;
        border-radius: 4px;
    }

    #partners-container::-webkit-scrollbar-track {
        background-color: #2d3748;
    }

    #services-container::-webkit-scrollbar {
        height: 8px;
    }

    #services-container::-webkit-scrollbar-thumb {
        background-color: #a0aec0;
        border-radius: 4px;
    }

    #services-container::-webkit-scrollbar-track {
        background-color: #edf2f7;
    }
  </style>
</head>
<body class="bg-white text-gray-900">
  <!-- Navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50" style="border-bottom: 2px solid green;">
    <div class="container-responsive">
      <div class="flex justify-between items-center py-3 min-h-[60px]">
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2 flex-shrink-0">
              <img alt="Team photo" class="h-10 w-auto" src="{{ asset('images/Logo_HA.png') }}"/>
              <span class="font-bold text-sm sm:text-lg text-green-900 whitespace-nowrap">
                HIDROGANIK ALFA
              </span>
            </div>
            <!-- Desktop Menu -->
            <ul class="hidden lg:flex space-x-4 xl:space-x-8 text-sm font-semibold text-gray-700">
              <li><a class="hover:text-green-700 transition-colors" href="/">Home</a></li>
              @auth
                <li><a class="hover:text-green-700 transition-colors" href="{{ url('/dashboard') }}">Dashboard</a></li>
              @endauth
            </ul>
        </div>
        
        <div class="flex items-center space-x-2">
        @guest
          <a class="hidden sm:inline-block bg-green-700 hover:bg-green-800 text-white text-xs font-semibold px-3 sm:px-4 py-2 rounded transition-colors" href="{{ route('login') }}">
            Login
          </a>
        @endguest
          <button aria-label="Toggle menu" class="lg:hidden text-green-900 focus:outline-none p-2" id="mobile-menu-button">
            <i class="fas fa-bars text-lg"></i>
          </button>
        </div>
      </div>
      
      <!-- Mobile menu -->
      <div class="mobile-menu-transition lg:hidden bg-white border-t border-gray-200" id="mobile-menu">
        <ul class="flex flex-col space-y-3 px-4 py-4 text-gray-700 font-semibold text-sm">
          <li><a class="block hover:text-green-700 py-1" href="/">Home</a></li>
          @auth
            <li><a class="block hover:text-green-700 py-1" href="{{ url('/dashboard') }}">Dashboard</a></li>
          @endauth
          @guest
          <li class="sm:hidden"><a class="block bg-green-700 text-white text-center py-2 rounded hover:bg-green-800" href="{{ route('login') }}">Login</a></li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative overflow-hidden">
    <div class="relative h-64 sm:h-80 md:h-96 lg:h-[28rem]" id="hero-carousel">
        <div class="overflow-hidden w-full h-full">
                            <div class="flex transition-transform duration-1000 ease-in-out h-full" id="hero-carousel-slides">
                                @if($heroImages->count() > 0)
                                    @foreach($heroImages as $image)
                                        <div class="flex-shrink-0 w-full h-full">
                                            <img alt="Background Image" class="w-full h-full object-cover" src="{{ asset('storage/' . $image->image_path) }}"/>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex-shrink-0 w-full h-full">
                                        <img alt="Background Image" class="w-full h-full object-cover" src="{{ asset('images/Gambar_Bersama.jpg') }}"/>
                                    </div>
                                @endif
                            </div>        </div>
      <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    </div>
    <div class="absolute inset-0 flex items-center">  
      <div class="container-responsive">
        <div class="max-w-xl text-white">
          <div class="flex items-center space-x-2 text-xs sm:text-sm font-semibold text-green-300 mb-2 sm:mb-4">
            <i class="fas fa-seedling"></i>
            <span>HIDROGRANIK ALFA</span>
          </div>
          <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold leading-tight mb-3 sm:mb-4 md:mb-6">
            {!! nl2br(e($hero->title)) !!}
          </h1>
          <p class="text-xs sm:text-sm max-w-lg mb-4 sm:mb-6 leading-relaxed">
            {{ $hero->subtitle }}
          </p>
          @if($hero->button_text && $hero->button_link)
            <a class="inline-block bg-green-700 hover:bg-green-800 text-white text-xs font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded transition-colors" href="{{ $hero->button_link }}">
              {{ $hero->button_text }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </section>

  <!-- Services Summary -->
<section class="py-8 sm:py-12 lg:py-16 bg-green-50">
    <div class="container-responsive">
        <div class="text-center mb-8 sm:mb-12">
            <p class="text-green-700 font-semibold text-xs uppercase tracking-wider mb-2">Layanan Kami</p>
            <h2 class="font-bold text-xl sm:text-2xl">Solusi Pertanian Modern</h2>
        </div>
        <div class="flex justify-start sm:justify-center gap-4 sm:gap-6 overflow-x-auto pb-4" id="services-container">
            @foreach ($services as $service)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full w-56 sm:w-64 flex-shrink-0">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="font-bold text-lg mb-2 text-gray-800 text-center">{{ $service->title }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed flex-grow text-justify">{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

 

  <!-- About Section -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
        @if ($about)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-center">
            <div class="rounded-lg shadow-xl overflow-hidden">
                <img alt="Garden aerial view" class="w-full aspect-video object-cover" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"/>
            </div>
            <div class="space-y-4 sm:space-y-6">
                <div>
                    <p class="text-green-700 font-semibold text-xs uppercase tracking-wider">TENTANG KAMI</p>
                    <h2 class="text-xl sm:text-2xl font-bold leading-tight">
                        Hidroponik Organik Untuk Masa Depan Sehat
                    </h2>
                    <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">
                        {{ $about->tentang_kami }}
                    </p>
                </div>
                <div class="pt-4 grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-green-800">VISI</h3>
                        <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">{{ $about->visi }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-green-800">MISI</h3>
                        <ul class="list-disc list-inside text-gray-600 text-xs sm:text-sm leading-relaxed space-y-1">
                            @foreach (explode('\n', $about->misi) as $misi_item)
                                <li>{{ $misi_item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
  </section>

  <!-- Services Summary -->
<section class="py-8 sm:py-12 lg:py-16 bg-green-50">
    <div class="container-responsive">
        <div class="text-center mb-8 sm:mb-12">
            <p class="text-green-700 font-semibold text-xs uppercase tracking-wider mb-2">{{ $whatWeOfferSection->title }}</p>
            <h2 class="font-bold text-xl sm:text-2xl">{{ $whatWeOfferSection->subtitle }}</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
            <!-- Item 1: Perawatan Kebun -->
            <div class="relative group rounded-lg overflow-hidden shadow-lg">
                <img alt="Perawatan Kebun" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1492496913980-501348b61469?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Perawatan Kebun</h3>
                        <p class="text-sm">Layanan perawatan kebun hidroponik profesional untuk hasil optimal.</p>
                    </div>
                </div>
            </div>
            <!-- Item 2: Sistem Irigasi -->
            <div class="relative group rounded-lg overflow-hidden shadow-lg">
                <img alt="Sistem Irigasi" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Sistem Irigasi</h3>
                        <p class="text-sm">Instalasi dan maintenance sistem irigasi hidroponik modern.</p>
                    </div>
                </div>
            </div>
            <!-- Item 3: Maintenance -->
            <div class="relative group rounded-lg overflow-hidden shadow-lg">
                <img alt="Maintenance" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1542928658-22251e20ac66?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Maintenance</h3>
                        <p class="text-sm">Perawatan berkala untuk menjaga performa sistem hidroponik.</p>
                    </div>
                </div>
            </div>
            <!-- Item 4: Optimasi Hasil -->
            <div class="relative group rounded-lg overflow-hidden shadow-lg">
                <img alt="Optimasi Hasil" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Optimasi Hasil</h3>
                        <p class="text-sm">Konsultasi untuk meningkatkan produktivitas kebun hidroponik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
        <div class="flex flex-col gap-8 lg:gap-12">


            <!-- Text Content -->
            <div class="space-y-6 sm:space-y-8">
                <div>
                    <p class="text-green-700 font-semibold text-xs uppercase tracking-wider mb-2">Why Choose Us</p>
                    <h2 class="text-xl sm:text-2xl font-bold leading-tight mb-4">
                        Kami berkomitmen untuk memberikan yang terbaik dalam setiap layanan yang kami berikan dengan pendekatan yang personal dan profesional.
                    </h2>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                    <!-- Item 1: Berpengalaman -->
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <img alt="Berpengalaman" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1515150144380-bca9f1650ed9?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-lg mb-2">Berpengalaman</h3>
                                <p class="text-sm">Lahir dari pengalaman langsung bertani di rumah hingga berkembang menjadi usaha profesional.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 2: Ahli Instalasi -->
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <img alt="Ahli Instalasi" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-lg mb-2">Ahli Instalasi</h3>
                                <p class="text-sm">Berpengalaman membuat instalasi untuk rumah tangga, sekolah, instansi, komunitas hingga bisnis.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 3: Instruktur Bersertifikasi -->
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <img alt="Instruktur Bersertifikasi" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-lg mb-2">Instruktur Bersertifikasi</h3>
                                <p class="text-sm">Dipandu oleh owner yang sudah bersertifikasi BNSP, menjamin mutu materi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 4: Materi Aplikatif -->
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <img alt="Materi Aplikatif" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-lg mb-2">Materi Aplikatif</h3>
                                <p class="text-sm">Peserta tidak hanya belajar teori tetapi juga langsung praktik yang mudah dipahami.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 5: Pendampingan Berkelanjutan -->
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <img alt="Pendampingan Berkelanjutan" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-lg mb-2">Pendampingan Berkelanjutan</h3>
                                <p class="text-sm">Memberikan support setelah pelatihan agar peserta berhasil.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 6: Komunitas Pembelajar -->
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <img alt="Komunitas Pembelajar" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-lg mb-2">Komunitas Pembelajar</h3>
                                <p class="text-sm">Bergabung dengan komunitas untuk berbagi pengalaman dan pengetahuan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <!-- Professional Section -->
  <section class="bg-gray-50 py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 items-center">
        <div class="space-y-4 sm:space-y-6 text-center md:text-left">
          <h2 class="font-bold text-lg sm:text-xl leading-tight">
            Akhmad Fujiyanto, S.Kom.
          </h2>
          <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">
            Komitmen kami adalah memberikan layanan terbaik dengan ketepatan waktu dan hasil yang memuaskan.
          </p>
          <a class="inline-block bg-green-700 hover:bg-green-800 text-white text-xs font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded transition-colors" href="https://wa.me/6282250098693">
            Hubungi Kami
          </a>
        </div>
        
        <div class="flex justify-center">
          <img alt="Happy customer with vegetables" class="rounded-lg shadow-lg w-full max-w-xs aspect-square object-cover" src="{{ asset('images/OmBoy.jpg') }}"/>
        </div>
        
        <div class="text-center">
          <div class="space-y-2 mb-4">
            <p class="text-green-700 font-bold text-2xl sm:text-3xl">5+</p>
            <p class="font-semibold text-green-700 text-sm">Tahun Pengalaman</p>
          </div>
          <div class="flex justify-center space-x-1 text-green-700 text-sm sm:text-base mb-3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text-gray-600 text-xs max-w-xs mx-auto leading-relaxed">
            Ribuan pelanggan puas dengan layanan dan produk berkualitas kami.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Partners Section -->
  <section class="bg-green-700 text-green-100 py-6 sm:py-8">
    <div class="container-responsive">
      <div class="text-center mb-8">
        <h2 class="font-bold text-xl sm:text-2xl">Our Partners</h2>
        <p class="text-sm text-green-200">Kami Bekerja Sama dengan Mitra Terpercaya</p>
      </div>
      <div class="relative">
        <div class="flex justify-center overflow-x-auto space-x-6 pb-4" id="partners-container">
          @foreach ($partnerships as $partnership)
          <div class="relative group w-32 h-32 bg-white rounded-lg p-3 flex items-center justify-center">
              <img src="{{ asset('storage/' . $partnership->image_path) }}" alt="{{ $partnership->name }}" class="max-w-full max-h-full object-contain">
              <div class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                  <p class="text-white text-center font-semibold">{{ $partnership->name }}</p>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- Our Project -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="text-center mb-8 sm:mb-12">
        <p class="text-green-700 font-semibold text-xs uppercase tracking-wider mb-2">Our Project</p>
        <h2 class="font-bold text-xl sm:text-2xl mb-4">Come home to paradise.</h2>
        <p class="text-gray-600 text-xs sm:text-sm max-w-2xl mx-auto leading-relaxed">
          Lihat berbagai proyek hidroponik yang telah kami kerjakan untuk berbagai klien dari rumah tangga hingga komersial.
        </p>
      </div>
      
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
        <div class="relative group rounded-lg overflow-hidden shadow-lg">
          <img alt="Hydroponic project 1" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
          <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
            <div class="text-center text-white p-4">
              <h3 class="font-bold text-lg">Instalasi Hidroponik</h3>
              <p class="text-sm">Proyek instalasi hidroponik untuk skala rumah tangga.</p>
            </div>
          </div>
        </div>
        <div class="relative group rounded-lg overflow-hidden shadow-lg">
          <img alt="Hydroponic project 2" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
          <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
            <div class="text-center text-white p-4">
              <h3 class="font-bold text-lg">Kebun Komunitas</h3>
              <p class="text-sm">Pengembangan kebun hidroponik untuk komunitas urban.</p>
            </div>
          </div>
        </div>
        <div class="relative group rounded-lg overflow-hidden shadow-lg">
          <img alt="Hydroponic project 3" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1592150621744-aca64f48394a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
          <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
            <div class="text-center text-white p-4">
              <h3 class="font-bold text-lg">Greenhouse Komersial</h3>
              <p class="text-sm">Proyek skala besar untuk produksi sayuran organik.</p>
            </div>
          </div>
        </div>
        <div class="relative group rounded-lg overflow-hidden shadow-lg">
          <img alt="Hydroponic project 4" class="w-full aspect-square object-cover transition-transform transform group-hover:scale-110" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
          <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
            <div class="text-center text-white p-4">
              <h3 class="font-bold text-lg">Edukasi Sekolah</h3>
              <p class="text-sm">Program edukasi hidroponik untuk siswa sekolah.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- SDG Points Section -->
<section class="py-8 sm:py-12 lg:py-16 bg-green-700 text-green-100">
    <div class="container-responsive">
        <div class="text-center mb-8 sm:mb-12">
            <p class="text-green-200 font-semibold text-xs uppercase tracking-wider mb-2">Poin-Poin SDGs</p>
            <h2 class="font-bold text-xl sm:text-2xl text-white">Kontribusi Kami Terhadap SDGs</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="SDG Point 2" class="w-full object-cover aspect-square" src="{{ asset('images/poin2sdg.gif') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">SDG 2 – Zero Hunger (Tanpa Kelaparan)</h3>
                        <p class="text-sm">Menghasilkan sayuran segar, sehat, dan bergizi melalui sistem hidroponik organik, sehingga meningkatkan ketahanan pangan di perkotaan.</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="SDG Point 3" class="w-full object-cover aspect-square" src="{{ asset('images/poin3sdg.gif') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">SDG 3 – Good Health and Well-being (Kehidupan Sehat & Sejahtera)</h3>
                        <p class="text-sm">Produk bebas pestisida kimia berbahaya, menjaga kesehatan konsumen dan lingkungan</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="SDG Point 6" class="w-full object-cover aspect-square" src="{{ asset('images/poin6sdg.gif') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">SDG 6 – Clean Water and Sanitation (Air Bersih & Sanitasi Layak)</h3>
                        <p class="text-sm">Sistem hidroponik menghemat hingga 90% penggunaan air dibanding pertanian konvensional.</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="SDG Point 11" class="w-full object-cover aspect-square" src="{{ asset('images/poin11sdg.gif') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">SDG 11 – Sustainable Cities and Communities (Kota & Permukiman Berkelanjutan)</h3>
                        <p class="text-sm">Memanfaatkan lahan sempit di perkotaan menjadi area produktif dan hijau, serta mendorong terbentuknya komunitas pertanian modern.</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="SDG Point 12" class="w-full object-cover aspect-square" src="{{ asset('images/poin12sdg.gif') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">SDG 12 – Responsible Consumption and Production (Konsumsi & Produksi Berkelanjutan)</h3>
                        <p class="text-sm">Potponik mendorong masyarakat untuk mengurangi limbah rumah tangga dengan memanfaatkannya sebagai media tanam, sehingga menciptakan pola konsumsi dan produksi yang lebih bertanggung jawab</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="SDG Point 13" class="w-full object-cover aspect-square" src="{{ asset('images/poin13sdg.gif') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">SDG 13 – Climate Action (Penanganan Perubahan Iklim)</h3>
                        <p class="text-sm">Mengurangi jejak karbon melalui pertanian lokal dan distribusi yang lebih singkat. Dengan memanfaatkan limbah rumah tangga serta mengurangi ketergantungan pada media tanam konvensional, sistem potponik turut menekan emisi dan memperluas praktik pertanian berkelanjutan di perkotaan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-8 sm:py-12 lg:py-16 bg-white text-gray-900">
    <div class="container-responsive">
        <div class="text-center mb-8 sm:mb-12">
            <p class="text-gray-500 font-semibold text-xs uppercase tracking-wider mb-2">Green Economy</p>
            <h2 class="font-bold text-xl sm:text-2xl text-gray-900">Kontribusi Kami Terhadap Green Economy</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="PRODUK BERKELANJUTAN" class="w-full object-cover aspect-square" src="{{ asset('images/1. PRODUK BERKELANJUTAN.png') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Produksi berkelanjutan</h3>
                        <p class="text-sm">Menggunakan air dan nutrisi secara efisien.</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="PRODUK RAMAH LINGKUNGAN" class="w-full object-cover aspect-square" src="{{ asset('images/2. PRODUK RAMAH LINGKUNGAN.png') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Produk ramah lingkungan</h3>
                        <p class="text-sm">Sayuran bebas pestisida kimia dan menggunakan pupuk organik cair (POC)</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="Pemberdayaan Masyarakat" class="w-full object-cover aspect-square" src="{{ asset('images/3. Pemberdayaan Masyarakat.png') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Pemberdayaan masyarakat</h3>
                        <p class="text-sm">Memberikan pelatihan dan membuka peluang usaha di bidang hidroponik organik</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="Penghijauaan Kota" class="w-full object-cover aspect-square" src="{{ asset('images/4. Penghijauaan Kota.png') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Penghijauan kota</h3>
                        <p class="text-sm">Menciptakan ruang hijau produktif di wilayah perkotaan</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="Efiensi Energi" class="w-full object-cover aspect-square" src="{{ asset('images/5. Efiensi Energi.png') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Efisiensi energi</h3>
                        <p class="text-sm">Menggunakan pompa hemat listrik dan desain instalasi yang optimal</p>
                    </div>
                </div>
            </div>
            <div class="relative group rounded-lg overflow-hidden shadow-lg p-8">
                <img alt="inovasi berbasis limba" class="w-full object-cover aspect-square" src="{{ asset('images/6. inovasi berbasis limba.png') }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <div class="text-center text-white p-4">
                        <h3 class="font-bold text-lg mb-2">Inovasi berbasis limbah</h3>
                        <p class="text-sm">Potponik memanfaatkan bahan limbah rumah tangga, mendukung prinsip ekonomi sirkular</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <!-- Testimonial -->
  <section class="relative py-12 sm:py-16 lg:py-20 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
    <img alt="Hands with plant" class="absolute inset-0 w-full h-full object-cover z-0" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"/>
    
    <div class="relative z-20 container-responsive text-center">
      <div class="max-w-4xl mx-auto">
        <p class="text-sm sm:text-base italic mb-6 sm:mb-8 leading-relaxed">
          "Sejak mengikuti pelatihan di Hidroganik Alfa, keluarga kami bisa menikmati sayuran segar setiap hari dari kebun hidroponik sendiri. Tim mereka sangat profesional dan sabar dalam memberikan panduan. Hasilnya melebihi ekspektasi kami!"
        </p>
        <div class="flex flex-col items-center space-y-3 sm:space-y-4">
          <img alt="Customer testimonial" class="rounded-full border-4 border-green-400 w-16 h-16 sm:w-20 sm:h-20 object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"/>
          <div>
            <p class="font-semibold text-green-300 text-sm sm:text-base">Ibu Sari Indrawati</p>
            <p class="text-green-300 text-xs uppercase tracking-widest">Peserta Pelatihan</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Section -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="text-center mb-8 sm:mb-12">
        <p class="text-green-700 font-semibold text-xs uppercase tracking-wider mb-2">Our Blog</p>
        <h2 class="font-bold text-xl sm:text-2xl">Berita & Blog Terbaru Kami</h2>
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @forelse ($articles as $article)
            <div class="relative group rounded-lg overflow-hidden shadow-lg">
                <img alt="{{ $article->title }}" class="w-full h-64 object-cover transition-transform transform group-hover:scale-110" src="{{ $article->image ? asset('images/' . $article->image) : 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80' }}"/>
                <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <a href="{{ $article->link ? $article->link : route('articles.show', $article) }}" class="w-full h-full" @if($article->link) target="_blank" @endif>
                        <div class="text-center text-white p-4 flex flex-col justify-center items-center h-full">
                            <h3 class="font-bold text-lg mb-2">{{ $article->title }}</h3>
                            <p class="text-sm mb-4">{{ Str::limit($article->content, 100) }}</p>
                            <p class="text-green-300 text-sm font-semibold">Baca Selengkapnya</p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No articles found.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-700 text-green-100 pt-8 sm:pt-12 pb-6">
    <div class="container-responsive">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-8">
        <div class="sm:col-span-2 lg:col-span-1">
          <div class="flex items-center space-x-2 mb-4">
            <img alt="Team photo" class="h-10 w-auto bg-white rounded-full p-1" src="{{ asset('images/Logo_HA.png') }}"/>
            <span class="font-bold text-lg">HIDROGANIK ALFA</span>
          </div>
          <p class="text-xs max-w-xs mb-4 leading-relaxed">
            Pionir hidroponik organik Indonesia yang berkomitmen untuk menciptakan masa depan pertanian yang sehat dan berkelanjutan.
          </p>
          <div class="flex space-x-4 text-green-300">
            <a aria-label="Facebook" class="hover:text-green-100 transition-colors text-lg" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a aria-label="Instagram" class="hover:text-green-100 transition-colors text-lg" href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a aria-label="YouTube" class="hover:text-green-100 transition-colors text-lg" href="#">
              <i class="fab fa-youtube"></i>
            </a>
            <a aria-label="WhatsApp" class="hover:text-green-100 transition-colors text-lg" href="#">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
        
        <div>
          <h4 class="font-semibold text-sm mb-4">Halaman</h4>
          <ul class="text-xs space-y-2">
            <li><a class="hover:underline transition-colors" href="#">Beranda</a></li>
            <li><a class="hover:underline transition-colors" href="#">Tentang Kami</a></li>
            <li><a class="hover:underline transition-colors" href="#">Layanan</a></li>
            <li><a class="hover:underline transition-colors" href="#">Pelatihan</a></li>
            <li><a class="hover:underline transition-colors" href="#">Blog</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-semibold text-sm mb-4">Layanan</h4>
          <ul class="text-xs space-y-2">
            <li><a class="hover:underline transition-colors" href="#">Pelatihan Hidroponik</a></li>
            <li><a class="hover:underline transition-colors" href="#">Konsultasi</a></li>
            <li><a class="hover:underline transition-colors" href="#">Instalasi</a></li>
            <li><a class="hover:underline transition-colors" href="#">Maintenance</a></li>
            <li><a class="hover:underline transition-colors" href="#">Produk</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-semibold text-sm mb-4">Kontak</h4>
          <ul class="text-xs space-y-2">
            <li class="flex items-start space-x-2">
              <i class="fas fa-map-marker-alt text-green-300 mt-1 flex-shrink-0"></i>
              <a href="#" target="_blank" class="hover:underline">JL. Pekapuran Raya Komplek Yatera Gg. Bambu Indah, Kota Banjarmasin</a>
            </li>
            <li class="flex items-center space-x-2">
              <i class="fab fa-whatsapp text-green-300 flex-shrink-0"></i>
              <a href="https://wa.me/6282250098693" target="_blank" class="hover:underline">0822 5009 8693</a>
            </li>
            <li class="flex items-center space-x-2">
              <i class="fas fa-envelope text-green-300 flex-shrink-0"></i>
              <a href="mailto:eboytony@gmail.com" class="hover:underline">eboytony@gmail.com</a>
            </li>
            <li class="flex items-center space-x-2">
              <i class="fab fa-instagram text-green-300 flex-shrink-0"></i>
              <a href="https://instagram.com/hidroganikalfa.official" target="_blank" class="hover:underline">@hidroganikalfa.official</a>
            </li>
             <li class="flex items-center space-x-2">
              <i class="fas fa-clock text-green-300 flex-shrink-0"></i>
              <span>Senin - Sabtu: 08:00 - 17:00</span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-green-600 pt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
          <p class="text-xs text-green-200 text-center sm:text-left">
            Copyright 2024 © Hidroganik Alfa. All Rights Reserved
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script>
    // Mobile menu toggle
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    menuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
      if (!menuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
        mobileMenu.classList.remove('active');
      }
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
    
    // Add scroll effect to navbar
    window.addEventListener('scroll', () => {
      const navbar = document.querySelector('nav');
      if (window.scrollY > 100) {
        navbar.classList.add('shadow-lg');
      } else {
        navbar.classList.remove('shadow-lg');
      }
    });
    
    // Intersection Observer for fade-in animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, observerOptions);
    
    // Apply animation to sections
    document.querySelectorAll('section').forEach(section => {
      section.style.opacity = '0';
      section.style.transform = 'translateY(20px)';
      section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(section);
    });
    
    // Lazy loading for images
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
          }
          imageObserver.unobserve(img);
        }
      });
    });
    
    document.querySelectorAll('img[data-src]').forEach(img => {
      imageObserver.observe(img);
    });

    // Hero Carousel
    const heroCarousel = document.getElementById('hero-carousel');
    if (heroCarousel) {
      const slidesContainer = document.getElementById('hero-carousel-slides');
      if (slidesContainer) {
        const slides = slidesContainer.children;
        const slideCount = slides.length;
        let currentIndex = 0;

        const goToSlide = (index) => {
          if (index < 0) {
            index = slideCount - 1;
          } else if (index >= slideCount) {
            index = 0;
          }
          slidesContainer.style.transform = `translateX(-${index * 100}%)`;
          currentIndex = index;
        };

        setInterval(() => {
          goToSlide(currentIndex + 1);
        }, 3000); // Change slide every 3 seconds
      }
    }

    // Documentation Carousel
    const carousel = document.getElementById('documentation-carousel');
    if (carousel) {
      const slidesContainer = document.getElementById('carousel-slides');
      const slides = slidesContainer.children;
      const nextButton = document.getElementById('next-slide');
      const prevButton = document.getElementById('prev-slide');
      const slideCount = slides.length;
      let currentIndex = 0;
      let autoPlayInterval;

      const goToSlide = (index) => {
        if (index < 0) {
          index = slideCount - 1;
        } else if (index >= slideCount) {
          index = 0;
        }
        slidesContainer.style.transform = `translateX(-${index * 100}%)`;
        currentIndex = index;
      };

      const startAutoPlay = () => {
        autoPlayInterval = setInterval(() => {
          goToSlide(currentIndex + 1);
        }, 3000); // Change slide every 3 seconds
      };

      const stopAutoPlay = () => {
        clearInterval(autoPlayInterval);
      };

      nextButton.addEventListener('click', () => {
        goToSlide(currentIndex + 1);
        stopAutoPlay();
        startAutoPlay();
      });

      prevButton.addEventListener('click', () => {
        goToSlide(currentIndex - 1);
        stopAutoPlay();
        startAutoPlay();
      });

      carousel.addEventListener('mouseenter', stopAutoPlay);
      carousel.addEventListener('mouseleave', startAutoPlay);

      startAutoPlay();
    }



    // Partners Section Auto-Scroll
    const partnersScroller = document.getElementById('partners-container');
    if (partnersScroller) {
      let scrollAmount = 0;
      const scrollStep = 1;
      const scrollDelay = 30; // ms
      let scrollInterval;

      function startScrolling() {
        scrollInterval = setInterval(() => {
          if (partnersScroller.scrollWidth > partnersScroller.clientWidth) {
            partnersScroller.scrollLeft += scrollStep;
            if (partnersScroller.scrollLeft >= partnersScroller.scrollWidth - partnersScroller.clientWidth) {
              setTimeout(() => {
                partnersScroller.scrollTo({ left: 0, behavior: 'smooth' });
              }, 2000); // Pause at the end
            }
          }
        }, scrollDelay);
      }

      function stopScrolling() {
        clearInterval(scrollInterval);
      }

      partnersScroller.addEventListener('mouseenter', stopScrolling);
      partnersScroller.addEventListener('mouseleave', startScrolling);

      startScrolling();
    }

  </script>
</body>
</html>
