<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $article->title }}</title>
        <link rel="icon" href="{{ asset('images/Logo_HA.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
                        <div class="absolute top-4 left-4 z-10">
                            <a href="{{ route('welcome') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Kembali ke Home
                            </a>
                        </div>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-16">
                            <div class="p-6 bg-white border-b border-gray-200">
                                @if ($article->image)
                                    <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-1/2 h-auto mx-auto">
                                @endif
                                <h1 class="text-2xl font-bold my-4">{{ $article->title }}</h1>
                                <div class="prose max-w-none">
                                    {!! $article->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>