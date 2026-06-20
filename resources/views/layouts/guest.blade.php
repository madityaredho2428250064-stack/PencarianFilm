<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
             style="background: linear-gradient(135deg, #0f0f1a 0%, #1a1130 100%);">

            <!-- Logo / Brand -->
            <div class="mb-6 text-center">
                <a href="/" class="inline-block">
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-5xl">🎬</span>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent tracking-wide">
                            CineVerse
                        </h1>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="w-full sm:max-w-md px-8 py-8 bg-white/5 backdrop-blur-sm border border-white/10 sm:rounded-2xl shadow-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
