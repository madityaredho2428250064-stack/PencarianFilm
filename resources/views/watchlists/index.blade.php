@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">🎬 Watchlist Saya</h1>

    @if($watchlists->isEmpty())
        <div class="text-center py-16">
            <p class="text-gray-400 text-lg">Belum ada film di watchlist kamu.</p>
            <a href="{{ route('movies.index') }}" class="mt-4 inline-block bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                Jelajahi Film
            </a>
        </div>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($watchlists as $item)
            <div class="bg-gray-800 rounded-lg overflow-hidden shadow">
                @if($item->movie->poster_path)
    <img src="{{ $item->movie->poster_path }}" alt="{{ $item->movie->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="text-white font-semibold">{{ $item->movie->title }}</h3>
                    <p class="text-gray-400 text-sm">{{ $item->movie->genre->name ?? '-' }}</p>
                    <form action="{{ route('watchlists.destroy', $item->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 text-sm hover:text-red-300">Hapus dari Watchlist</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection