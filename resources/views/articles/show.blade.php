<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>{{ $article->title }} - Hidroganik Alfa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .container-responsive {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding-left: 1rem;
      padding-right: 1rem;
    }
  </style>
</head>
<body class="bg-white text-gray-900">

  <!-- Navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container-responsive">
      <div class="flex justify-between items-center py-3 min-h-[60px]">
        <div class="flex items-center space-x-2 flex-shrink-0">
          <a href="{{ route('welcome') }}">
            <img alt="Team photo" class="h-10 w-auto" src="{{ asset('images/Logo_HA.png') }}"/>
          </a>
          <span class="font-bold responsive-text-sm sm:responsive-text-lg text-green-900 whitespace-nowrap">
            <a href="{{ route('welcome') }}">HIDROGANIK ALFA</a>
          </span>
        </div>
        <ul class="hidden lg:flex space-x-4 xl:space-x-8 responsive-text-sm font-semibold text-gray-700">
          <li><a class="hover:text-green-700 transition-colors" href="{{ route('welcome') }}">Home</a></li>
          @auth
            <li><a class="hover:text-green-700 transition-colors" href="{{ url('/dashboard') }}">Dashboard</a></li>
          @endauth
        </ul>
        <div class="flex items-center space-x-2">
        @guest
          <a class="hidden sm:inline-block bg-green-700 hover:bg-green-800 text-white responsive-text-xs font-semibold px-3 sm:px-4 py-2 rounded transition-colors" href="{{ route('login') }}">
            Login
          </a>
        @endguest
        </div>
      </div>
    </div>
  </nav>

  <!-- Article Content Section -->
  <main class="py-8 sm:py-12 lg:py-16">
    <div class="container-responsive max-w-4xl mx-auto px-4">
        <div class="prose lg:prose-xl max-w-full">
            <h1>{{ $article->title }}</h1>

            <div class="flex flex-col md:flex-row md:space-x-8">
                @if($article->image)
                    <div class="md:w-1/2">
                        <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full rounded-lg shadow-lg mb-4 md:mb-0">
                    </div>
                @endif

                <div class="md:w-1/2">
                    <div class="text-gray-700 text-base leading-relaxed">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t pt-6">
                <a href="{{ route('welcome') }}#blog-section" class="text-green-700 hover:text-green-900 font-semibold">&larr; Kembali ke Blog</a>
            </div>
        </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-green-700 text-green-100 pt-8 sm:pt-12 pb-6">
    <div class="container-responsive">
      <div class="border-t border-green-600 pt-6">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
          <p class="responsive-text-xs text-green-200 text-center sm:text-left">
            Copyright 2024 © Hidroganik Alfa. All Rights Reserved
          </p>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
