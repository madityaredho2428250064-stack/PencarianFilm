@extends('layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            🎬 CineVerse - Daftar Film
        </h2>
    </x-slot>

    <div class="py-8" style="background: linear-gradient(135deg, #0f0f1a 0%, #1a1130 100%); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-600/20 border border-green-500 text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header & Action -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
                        Jelajahi Film
                    </h1>
                    <p class="text-gray-400 mt-1">Temukan film favoritmu di CineVerse</p>
                </div>

                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ route('movies.create') }}"
                           class="inline-flex items-center px-5 py-2.5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold shadow-lg hover:shadow-purple-500/50 transition-all hover:scale-105">
                            + Tambah Film
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Filter & Search -->
            <form method="GET" action="{{ route('movies.index') }}"
                  class="flex flex-col md:flex-row gap-3 mb-8 bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari judul film..."
                       class="flex-1 rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">

                <select name="genre"
                        class="rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 outline-none transition">
                    <option value="">Semua Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(request('genre') == $genre->id)>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-semibold hover:shadow-lg hover:shadow-cyan-500/50 transition-all">
                    Cari
                </button>

                @if (request('search') || request('genre'))
                    <a href="{{ route('movies.index') }}"
                       class="px-6 py-2 rounded-lg bg-gray-700 text-gray-200 font-semibold hover:bg-gray-600 transition-all text-center">
                        Reset
                    </a>
                @endif
            </form>

            <!-- Movie Grid -->
            @if ($movies->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach ($movies as $movie)
                        <a href="{{ route('movies.show', $movie) }}" class="group relative rounded-xl overflow-hidden bg-gray-800/50 border border-white/5 hover:border-purple-400/50 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/30">
                            <div class="aspect-[2/3] bg-gradient-to-br from-purple-900 via-gray-900 to-cyan-900 flex items-center justify-center overflow-hidden">
                                @if ($movie->poster_path)
                                    <img src="{{ $movie->poster_path }}" alt="{{ $movie->title }}"
                                         class="w-full h-full object-cover group-hover:opacity-80 transition">
                                @else
                                    <span class="text-5xl">🎞️</span>
                                @endif
                            </div>

                            <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-sm rounded-full px-2 py-1 text-xs font-bold text-yellow-400 flex items-center gap-1">
                                ⭐ {{ number_format($movie->rating_avg, 1) }}
                            </div>

                            <div class="p-3">
                                <h3 class="font-semibold text-gray-100 text-sm truncate group-hover:text-purple-300 transition">
                                    {{ $movie->title }}
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('Y') : '-' }}
                                </p>

                                @if ($movie->genres->count() > 0)
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @foreach ($movie->genres->take(2) as $genre)
                                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-gradient-to-r from-pink-500/30 to-purple-500/30 text-pink-200 border border-pink-400/20">
                                                {{ $genre->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $movies->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-6xl mb-4">🍿</p>
                    <p class="text-gray-400 text-lg">Belum ada film yang ditemukan.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
