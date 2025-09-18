<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Hidroganik Alfa</title>
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
      max-width: 1200px;
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
    /* Better text scaling */
    .responsive-text-xs { font-size: clamp(0.7rem, 2vw, 0.875rem); }
    .responsive-text-sm { font-size: clamp(0.8rem, 2.5vw, 1rem); }
    .responsive-text-base { font-size: clamp(0.9rem, 3vw, 1.125rem); }
    .responsive-text-lg { font-size: clamp(1rem, 3.5vw, 1.25rem); }
    .responsive-text-xl { font-size: clamp(1.1rem, 4vw, 1.5rem); }
    .responsive-text-2xl { font-size: clamp(1.3rem, 5vw, 2rem); }
    .responsive-text-3xl { font-size: clamp(1.5rem, 6vw, 2.5rem); }
    .responsive-text-4xl { font-size: clamp(1.8rem, 7vw, 3rem); }
    .responsive-text-5xl { font-size: clamp(2rem, 8vw, 3.5rem); }
  </style>
</head>
<body class="bg-white text-gray-900">
  <!-- Navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container-responsive">
      <div class="flex justify-between items-center py-3 min-h-[60px]">
        <div class="flex items-center space-x-2 flex-shrink-0">
          <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-700 rounded-full flex items-center justify-center">
            <i class="fas fa-leaf text-white text-sm sm:text-base"></i>
          </div>
          <span class="font-bold responsive-text-sm sm:responsive-text-lg text-green-900 whitespace-nowrap">
            HIDROGANIK ALFA
          </span>
        </div>
        
        <!-- Desktop Menu -->
        <ul class="hidden lg:flex space-x-4 xl:space-x-8 responsive-text-sm font-semibold text-gray-700">
          <li><a class="hover:text-green-700 transition-colors" href="#">Home</a></li>
          <li><a class="hover:text-green-700 transition-colors" href="#">About</a></li>
          <li><a class="hover:text-green-700 transition-colors" href="#">Services</a></li>
          <li><a class="hover:text-green-700 transition-colors" href="#">Pages</a></li>
          <li><a class="hover:text-green-700 transition-colors" href="#">Blog</a></li>
        </ul>
        
        <div class="flex items-center space-x-2">
          <a class="hidden sm:inline-block bg-green-700 hover:bg-green-800 text-white responsive-text-xs font-semibold px-3 sm:px-4 py-2 rounded transition-colors" href="/login">
            Login
          </a>
          <button aria-label="Toggle menu" class="lg:hidden text-green-900 focus:outline-none p-2" id="mobile-menu-button">
            <i class="fas fa-bars responsive-text-lg"></i>
          </button>
        </div>
      </div>
      
      <!-- Mobile menu -->
      <div class="mobile-menu-transition lg:hidden bg-white border-t border-gray-200" id="mobile-menu">
        <ul class="flex flex-col space-y-3 px-4 py-4 text-gray-700 font-semibold responsive-text-sm">
          <li><a class="block hover:text-green-700 py-1" href="#">Home</a></li>
          <li><a class="block hover:text-green-700 py-1" href="#">About</a></li>
          <li><a class="block hover:text-green-700 py-1" href="#">Services</a></li>
          <li><a class="block hover:text-green-700 py-1" href="#">Pages</a></li>
          <li><a class="block hover:text-green-700 py-1" href="#">Blog</a></li>
          <li class="sm:hidden"><a class="block bg-green-700 text-white text-center py-2 rounded hover:bg-green-800" href="/login">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative overflow-hidden">
    <div class="relative h-64 sm:h-80 md:h-96 lg:h-[28rem]">
      <img alt="Team photo" class="w-full h-full object-cover" src="/build/assets/images/Gambar_Bersama.jpg"/>
      <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    </div>
    <div class="absolute inset-0 flex items-center">
      <div class="container-responsive">
        <div class="max-w-xl text-white">
          <div class="flex items-center space-x-2 responsive-text-xs sm:responsive-text-sm font-semibold text-green-300 mb-2 sm:mb-4">
            <i class="fas fa-seedling"></i>
            <span>Pelatihan & Edukasi</span>
          </div>
          <h1 class="responsive-text-2xl sm:responsive-text-3xl md:responsive-text-4xl lg:responsive-text-5xl font-extrabold leading-tight mb-3 sm:mb-4 md:mb-6">
            Hidroponik Organik<br class="hidden sm:block"/>
            untuk masa depan sehat
          </h1>
          <p class="responsive-text-xs sm:responsive-text-sm max-w-lg mb-4 sm:mb-6 leading-relaxed">
            Hidroganik Alfa adalah usaha pertanian modern yang fokus pada pengembangan sistem hidroponik organik untuk masyarakat urban yang berdiri sejak tahun 2019.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Summary -->
  <section class="bg-green-700 text-green-100">
    <div class="container-responsive py-8 sm:py-12">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
        <div class="text-center space-y-3 sm:space-y-4">
          <i class="fas fa-seedling responsive-text-2xl sm:responsive-text-3xl"></i>
          <h3 class="font-semibold responsive-text-sm sm:responsive-text-base">Pelatihan & Edukasi</h3>
          <ul class="responsive-text-xs space-y-1 sm:space-y-2 text-left sm:text-center">
            <li>• Pelatihan hidroponik organik (pemula – lanjutan)</li>
            <li>• Pelatihan pembuatan pupuk organik cair (POC)</li>
            <li>• Pelatihan pembuatan pestisida alami</li>
            <li>• Workshop urban farming untuk sekolah, instansi pemerintah, komunitas dan masyarakat umum</li>
          </ul>
        </div>
        
        <div class="text-center space-y-3 sm:space-y-4">
          <i class="fas fa-tree responsive-text-2xl sm:responsive-text-3xl"></i>
          <h3 class="font-semibold responsive-text-sm sm:responsive-text-base">Pendampingan & Konsultasi</h3>
          <p class="responsive-text-xs">
            Mendampingi mitra atau peserta pelatihan hingga berhasil mengelola kebun hidroponik secara mandiri.
          </p>
        </div>
        
        <div class="text-center space-y-3 sm:space-y-4">
          <i class="fas fa-tools responsive-text-2xl sm:responsive-text-3xl"></i>
          <h3 class="font-semibold responsive-text-sm sm:responsive-text-base">Pembuatan Instalasi Hidroponik</h3>
          <p class="responsive-text-xs">
            Menyediakan jasa pembuatan instalasi hidroponik sesuai kebutuhan rumah tangga, sekolah, instansi pemerintah, komunitas, hingga bisnis komersial.
          </p>
        </div>
        
        <div class="text-center space-y-3 sm:space-y-4">
          <i class="fas fa-shopping-cart responsive-text-2xl sm:responsive-text-3xl"></i>
          <h3 class="font-semibold responsive-text-sm sm:responsive-text-base">Produk & Sarana Produksi</h3>
          <p class="responsive-text-xs">
            Menyediakan produk sayur sehat, pupuk organik, pestisida alami, benih, bibit, dan sarana produksi hidroponik lainnya.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-center">
        <div class="order-2 lg:order-1">
          <img alt="Garden aerial view" class="w-full rounded-lg shadow-lg aspect-video object-cover" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"/>
        </div>
        <div class="order-1 lg:order-2 space-y-4 sm:space-y-6">
          <p class="text-green-700 font-semibold responsive-text-xs uppercase tracking-wider">About Us</p>
          <h2 class="responsive-text-xl sm:responsive-text-2xl font-bold leading-tight">
            We have expertise in all facets of hydroponic maintenance.
          </h2>
          <p class="text-gray-600 responsive-text-xs sm:responsive-text-sm leading-relaxed">
            Dengan pengalaman lebih dari 5 tahun, kami telah membantu ribuan masyarakat untuk memulai bercocok tanam hidroponik organik yang sehat dan berkelanjutan.
          </p>
          <div class="pt-2">
            <img alt="Team working" class="rounded-lg shadow-md w-full max-w-xs aspect-video object-cover" src="https://images.unsplash.com/photo-1592150621744-aca64f48394a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What We Offer -->
  <section class="bg-green-700 text-green-100 py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <div class="space-y-6 sm:space-y-8">
          <div>
            <p class="text-green-300 font-semibold responsive-text-xs uppercase tracking-wider mb-2">What We Offer</p>
            <h2 class="responsive-text-xl sm:responsive-text-2xl lg:responsive-text-3xl font-bold leading-tight max-w-md">
              Let your home have a breath of fresh air.
            </h2>
          </div>
          
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div class="bg-green-600 p-4 sm:p-6 rounded-lg shadow-md">
              <div class="flex items-center space-x-3 mb-3">
                <i class="fas fa-seedling responsive-text-lg"></i>
                <h3 class="font-semibold responsive-text-sm">Perawatan Kebun</h3>
              </div>
              <p class="responsive-text-xs mb-3 leading-relaxed">
                Layanan perawatan kebun hidroponik profesional untuk hasil optimal.
              </p>
              <a class="text-green-300 responsive-text-xs font-semibold hover:underline" href="#">
                Read More &gt;
              </a>
            </div>
            
            <div class="bg-green-600 p-4 sm:p-6 rounded-lg shadow-md">
              <div class="flex items-center space-x-3 mb-3">
                <i class="fas fa-tint responsive-text-lg"></i>
                <h3 class="font-semibold responsive-text-sm">Sistem Irigasi</h3>
              </div>
              <p class="responsive-text-xs mb-3 leading-relaxed">
                Instalasi dan maintenance sistem irigasi hidroponik modern.
              </p>
              <a class="text-green-300 responsive-text-xs font-semibold hover:underline" href="#">
                Read More &gt;
              </a>
            </div>
            
            <div class="bg-green-600 p-4 sm:p-6 rounded-lg shadow-md">
              <div class="flex items-center space-x-3 mb-3">
                <i class="fas fa-tools responsive-text-lg"></i>
                <h3 class="font-semibold responsive-text-sm">Maintenance</h3>
              </div>
              <p class="responsive-text-xs mb-3 leading-relaxed">
                Perawatan berkala untuk menjaga performa sistem hidroponik.
              </p>
              <a class="text-green-300 responsive-text-xs font-semibold hover:underline" href="#">
                Read More &gt;
              </a>
            </div>
            
            <div class="bg-green-600 p-4 sm:p-6 rounded-lg shadow-md">
              <div class="flex items-center space-x-3 mb-3">
                <i class="fas fa-chart-line responsive-text-lg"></i>
                <h3 class="font-semibold responsive-text-sm">Optimasi Hasil</h3>
              </div>
              <p class="responsive-text-xs mb-3 leading-relaxed">
                Konsultasi untuk meningkatkan produktivitas kebun hidroponik.
              </p>
              <a class="text-green-300 responsive-text-xs font-semibold hover:underline" href="#">
                Read More &gt;
              </a>
            </div>
          </div>
        </div>
        
        <div>
          <img alt="Farmer with vegetables" class="rounded-lg shadow-lg w-full aspect-square sm:aspect-video lg:aspect-square object-cover" src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"/>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
        <div>
          <img alt="Beautiful hydroponic garden" class="rounded-lg shadow-lg w-full aspect-video object-cover" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"/>
        </div>
        
        <div class="space-y-6 sm:space-y-8">
          <div>
            <p class="text-green-700 font-semibold responsive-text-xs uppercase tracking-wider mb-2">Why Choose Us</p>
            <h2 class="responsive-text-xl sm:responsive-text-2xl font-bold leading-tight mb-4">
              Both the heart and the garden may bloom with beauty.
            </h2>
            <p class="text-gray-600 responsive-text-xs sm:responsive-text-sm mb-6 leading-relaxed">
              Kami berkomitmen untuk memberikan yang terbaik dalam setiap layanan yang kami berikan dengan pendekatan yang personal dan profesional.
            </p>
            <a class="inline-block bg-green-700 hover:bg-green-800 text-white responsive-text-xs font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded transition-colors" href="#">
              Lihat Paket Kami
            </a>
          </div>
          
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
              <i class="fas fa-leaf text-green-700 responsive-text-2xl mb-3"></i>
              <h3 class="font-semibold responsive-text-xs sm:responsive-text-sm mb-2">Layanan Berkualitas</h3>
              <p class="responsive-text-xs text-gray-600 leading-relaxed">
                Standar tinggi dalam setiap layanan yang kami berikan.
              </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
              <i class="fas fa-dollar-sign text-green-700 responsive-text-2xl mb-3"></i>
              <h3 class="font-semibold responsive-text-xs sm:responsive-text-sm mb-2">Harga Terjangkau</h3>
              <p class="responsive-text-xs text-gray-600 leading-relaxed">
                Investasi yang sepadan dengan hasil yang didapatkan.
              </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
              <i class="fas fa-users text-green-700 responsive-text-2xl mb-3"></i>
              <h3 class="font-semibold responsive-text-xs sm:responsive-text-sm mb-2">Tim Profesional</h3>
              <p class="responsive-text-xs text-gray-600 leading-relaxed">
                Berpengalaman dan bersertifikat di bidangnya.
              </p>
            </div>
          </div>
          
          <div class="bg-green-700 text-green-100 rounded-lg p-4 sm:p-6 max-w-sm">
            <h3 class="font-semibold responsive-text-sm sm:responsive-text-lg leading-tight mb-2">
              Best Hydroponic Services In Town
            </h3>
            <p class="responsive-text-xs leading-relaxed">
              Bergabunglah dengan ribuan keluarga yang telah merasakan manfaat hidroponik organik.
            </p>
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
          <h2 class="font-bold responsive-text-lg sm:responsive-text-xl leading-tight">
            Professional, On time, Every time!
          </h2>
          <p class="text-gray-600 responsive-text-xs sm:responsive-text-sm leading-relaxed">
            Komitmen kami adalah memberikan layanan terbaik dengan ketepatan waktu dan hasil yang memuaskan.
          </p>
          <a class="inline-block bg-green-700 hover:bg-green-800 text-white responsive-text-xs font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded transition-colors" href="#">
            Hubungi Kami
          </a>
        </div>
        
        <div class="flex justify-center">
          <img alt="Happy customer with vegetables" class="rounded-lg shadow-lg w-full max-w-xs aspect-square object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
        </div>
        
        <div class="text-center">
          <div class="space-y-2 mb-4">
            <p class="text-green-700 font-bold responsive-text-2xl sm:responsive-text-3xl">5+</p>
            <p class="font-semibold text-green-700 responsive-text-sm">Tahun Pengalaman</p>
          </div>
          <div class="flex justify-center space-x-1 text-green-700 text-sm sm:text-base mb-3">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text-gray-600 responsive-text-xs max-w-xs mx-auto leading-relaxed">
            Ribuan pelanggan puas dengan layanan dan produk berkualitas kami.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Partners Section -->
  <section class="bg-green-700 text-green-100 py-6 sm:py-8">
    <div class="container-responsive">
      <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 sm:gap-6 items-center">
        <div class="bg-white rounded-lg p-2 sm:p-3">
          <div class="w-16 h-8 sm:w-20 sm:h-10 bg-gray-200 rounded mx-auto flex items-center justify-center">
            <span class="text-gray-500 responsive-text-xs">Partner 1</span>
          </div>
        </div>
        <div class="bg-white rounded-lg p-2 sm:p-3">
          <div class="w-16 h-8 sm:w-20 sm:h-10 bg-gray-200 rounded mx-auto flex items-center justify-center">
            <span class="text-gray-500 responsive-text-xs">Partner 2</span>
          </div>
        </div>
        <div class="bg-white rounded-lg p-2 sm:p-3">
          <div class="w-16 h-8 sm:w-20 sm:h-10 bg-gray-200 rounded mx-auto flex items-center justify-center">
            <span class="text-gray-500 responsive-text-xs">Partner 3</span>
          </div>
        </div>
        <div class="bg-white rounded-lg p-2 sm:p-3">
          <div class="w-16 h-8 sm:w-20 sm:h-10 bg-gray-200 rounded mx-auto flex items-center justify-center">
            <span class="text-gray-500 responsive-text-xs">Partner 4</span>
          </div>
        </div>
        <div class="bg-white rounded-lg p-2 sm:p-3">
          <div class="w-16 h-8 sm:w-20 sm:h-10 bg-gray-200 rounded mx-auto flex items-center justify-center">
            <span class="text-gray-500 responsive-text-xs">Partner 5</span>
          </div>
        </div>
        <div class="bg-white rounded-lg p-2 sm:p-3">
          <div class="w-16 h-8 sm:w-20 sm:h-10 bg-gray-200 rounded mx-auto flex items-center justify-center">
            <span class="text-gray-500 responsive-text-xs">Partner 6</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Project -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="text-center mb-8 sm:mb-12">
        <p class="text-green-700 font-semibold responsive-text-xs uppercase tracking-wider mb-2">Our Project</p>
        <h2 class="font-bold responsive-text-xl sm:responsive-text-2xl mb-4">Come home to paradise.</h2>
        <p class="text-gray-600 responsive-text-xs sm:responsive-text-sm max-w-2xl mx-auto leading-relaxed">
          Lihat berbagai proyek hidroponik yang telah kami kerjakan untuk berbagai klien dari rumah tangga hingga komersial.
        </p>
      </div>
      
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
        <img alt="Hydroponic project 1" class="rounded-lg shadow-lg w-full aspect-square object-cover hover:scale-105 transition-transform" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
        <img alt="Hydroponic project 2" class="rounded-lg shadow-lg w-full aspect-square object-cover hover:scale-105 transition-transform" src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
        <img alt="Hydroponic project 3" class="rounded-lg shadow-lg w-full aspect-square object-cover hover:scale-105 transition-transform" src="https://images.unsplash.com/photo-1592150621744-aca64f48394a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
        <img alt="Hydroponic project 4" class="rounded-lg shadow-lg w-full aspect-square object-cover hover:scale-105 transition-transform" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"/>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="bg-green-700 text-green-100 rounded-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 items-center">
          <div class="col-span-2 p-6 sm:p-8 lg:p-12">
            <h3 class="font-semibold responsive-text-lg sm:responsive-text-xl mb-4">
              Kepuasan Anda adalah prioritas utama kami.
            </h3>
            <p class="responsive-text-xs sm:responsive-text-sm max-w-lg leading-relaxed mb-6">
              Bergabunglah dengan ribuan keluarga yang telah merasakan manfaat hidroponik organik untuk kehidupan yang lebih sehat dan berkelanjutan.
            </p>
            <a class="inline-block bg-green-900 hover:bg-green-800 text-white responsive-text-xs font-semibold px-4 sm:px-6 py-2 sm:py-3 rounded transition-colors" href="#">
              Hubungi Kami
            </a>
          </div>
          <div class="h-48 md:h-64 lg:h-full">
            <img alt="Professional farmer" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"/>
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
        <p class="responsive-text-sm sm:responsive-text-base italic mb-6 sm:mb-8 leading-relaxed">
          "Sejak mengikuti pelatihan di Hidroganik Alfa, keluarga kami bisa menikmati sayuran segar setiap hari dari kebun hidroponik sendiri. Tim mereka sangat profesional dan sabar dalam memberikan panduan. Hasilnya melebihi ekspektasi kami!"
        </p>
        <div class="flex flex-col items-center space-y-3 sm:space-y-4">
          <img alt="Customer testimonial" class="rounded-full border-4 border-green-400 w-16 h-16 sm:w-20 sm:h-20 object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"/>
          <div>
            <p class="font-semibold text-green-300 responsive-text-sm sm:responsive-text-base">Ibu Sari Indrawati</p>
            <p class="text-green-300 responsive-text-xs uppercase tracking-widest">Peserta Pelatihan</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Section -->
  <section class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive">
      <div class="text-center mb-8 sm:mb-12">
        <p class="text-green-700 font-semibold responsive-text-xs uppercase tracking-wider mb-2">Our Blog</p>
        <h2 class="font-bold responsive-text-xl sm:responsive-text-2xl">Berita & Blog Terbaru Kami</h2>
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
          <img alt="Blog post 1" class="w-full h-48 sm:h-56 object-cover" src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"/>
          <div class="p-4 sm:p-6">
            <h3 class="font-semibold responsive-text-sm sm:responsive-text-base mb-3 leading-tight">
              Tips Memulai Hidroponik di Rumah untuk Pemula
            </h3>
            <p class="responsive-text-xs text-gray-600 mb-4 leading-relaxed">
              Panduan lengkap untuk memulai bercocok tanam hidroponik di rumah dengan modal minimal dan hasil maksimal.
            </p>
            <a class="text-green-700 responsive-text-xs font-semibold hover:underline" href="#">
              Baca Selengkapnya
            </a>
          </div>
        </article>
        
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
          <img alt="Blog post 2" class="w-full h-48 sm:h-56 object-cover" src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"/>
          <div class="p-4 sm:p-6">
            <h3 class="font-semibold responsive-text-sm sm:responsive-text-base mb-3 leading-tight">
              Manfaat Pupuk Organik Cair untuk Tanaman Hidroponik
            </h3>
            <p class="responsive-text-xs text-gray-600 mb-4 leading-relaxed">
              Mengapa pupuk organik cair menjadi pilihan terbaik untuk sistem hidroponik yang sehat dan berkelanjutan.
            </p>
            <a class="text-green-700 responsive-text-xs font-semibold hover:underline" href="#">
              Baca Selengkapnya
            </a>
          </div>
        </article>
        
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow sm:col-span-2 lg:col-span-1">
          <img alt="Blog post 3" class="w-full h-48 sm:h-56 object-cover" src="https://images.unsplash.com/photo-1592150621744-aca64f48394a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"/>
          <div class="p-4 sm:p-6">
            <h3 class="font-semibold responsive-text-sm sm:responsive-text-base mb-3 leading-tight">
              Sukses Berbisnis Sayuran Hidroponik di Era Digital
            </h3>
            <p class="responsive-text-xs text-gray-600 mb-4 leading-relaxed">
              Strategi membangun bisnis sayuran hidroponik yang menguntungkan dengan memanfaatkan teknologi digital.
            </p>
            <a class="text-green-700 responsive-text-xs font-semibold hover:underline" href="#">
              Baca Selengkapnya
            </a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-700 text-green-100 pt-8 sm:pt-12 pb-6">
    <div class="container-responsive">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-8">
        <div class="sm:col-span-2 lg:col-span-1">
          <div class="flex items-center space-x-2 mb-4">
            <div class="w-10 h-10 bg-green-900 rounded-full flex items-center justify-center">
              <i class="fas fa-leaf text-white"></i>
            </div>
            <span class="font-bold responsive-text-lg">HIDROGANIK ALFA</span>
          </div>
          <p class="responsive-text-xs max-w-xs mb-4 leading-relaxed">
            Pionir hidroponik organik Indonesia yang berkomitmen untuk menciptakan masa depan pertanian yang sehat dan berkelanjutan.
          </p>
          <div class="flex space-x-4 text-green-300">
            <a aria-label="Facebook" class="hover:text-green-100 transition-colors responsive-text-lg" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a aria-label="Instagram" class="hover:text-green-100 transition-colors responsive-text-lg" href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a aria-label="YouTube" class="hover:text-green-100 transition-colors responsive-text-lg" href="#">
              <i class="fab fa-youtube"></i>
            </a>
            <a aria-label="WhatsApp" class="hover:text-green-100 transition-colors responsive-text-lg" href="#">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
        
        <div>
          <h4 class="font-semibold responsive-text-sm mb-4">Halaman</h4>
          <ul class="responsive-text-xs space-y-2">
            <li><a class="hover:underline transition-colors" href="#">Beranda</a></li>
            <li><a class="hover:underline transition-colors" href="#">Tentang Kami</a></li>
            <li><a class="hover:underline transition-colors" href="#">Layanan</a></li>
            <li><a class="hover:underline transition-colors" href="#">Pelatihan</a></li>
            <li><a class="hover:underline transition-colors" href="#">Blog</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-semibold responsive-text-sm mb-4">Layanan</h4>
          <ul class="responsive-text-xs space-y-2">
            <li><a class="hover:underline transition-colors" href="#">Pelatihan Hidroponik</a></li>
            <li><a class="hover:underline transition-colors" href="#">Konsultasi</a></li>
            <li><a class="hover:underline transition-colors" href="#">Instalasi</a></li>
            <li><a class="hover:underline transition-colors" href="#">Maintenance</a></li>
            <li><a class="hover:underline transition-colors" href="#">Produk</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-semibold responsive-text-sm mb-4">Kontak</h4>
          <ul class="responsive-text-xs space-y-2">
            <li class="flex items-start space-x-2">
              <i class="fas fa-map-marker-alt text-green-300 mt-1 flex-shrink-0"></i>
              <span>Jl. Hidroponik No. 123, Banjarmasin, Kalimantan Selatan</span>
            </li>
            <li class="flex items-center space-x-2">
              <i class="fas fa-phone text-green-300 flex-shrink-0"></i>
              <span>+62 812-3456-7890</span>
            </li>
            <li class="flex items-center space-x-2">
              <i class="fas fa-envelope text-green-300 flex-shrink-0"></i>
              <span>info@hidroganikalfa.com</span>
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
          <p class="responsive-text-xs text-green-200 text-center sm:text-left">
            Copyright 2024 © Hidroganik Alfa. All Rights Reserved
          </p>
          <div class="flex space-x-4 responsive-text-xs text-green-200">
            <a class="hover:underline" href="#">Syarat & Ketentuan</a>
            <a class="hover:underline" href="#">Kebijakan Privasi</a>
          </div>
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
  </script>
</body>
</html>