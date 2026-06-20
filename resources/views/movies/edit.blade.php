<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            🎬 Edit Film
        </h2>
    </x-slot>

    <div class="py-8" style="background: linear-gradient(135deg, #0f0f1a 0%, #1a1130 100%); min-height: 100vh;">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 shadow-xl">

                <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent mb-6">
                    Edit Film: {{ $movie->title }}
                </h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 rounded-lg bg-red-600/20 border border-red-500 text-red-300">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('movies.update', $movie) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Judul Film</label>
                        <input type="text" name="title" value="{{ old('title', $movie->title) }}" required
                               class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Sinopsis</label>
                        <textarea name="overview" rows="4"
                                  class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">{{ old('overview', $movie->overview) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">URL Poster</label>
                        <input type="text" name="poster_path" value="{{ old('poster_path', $movie->poster_path) }}"
                               placeholder="https://..."
                               class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Tanggal Rilis</label>
                            <input type="date" name="release_date" value="{{ old('release_date', $movie->release_date) }}"
                                   class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Rating (0-10)</label>
                            <input type="number" step="0.1" min="0" max="10" name="rating_avg" value="{{ old('rating_avg', $movie->rating_avg) }}"
                                   class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Genre</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($genres as $genre)
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                           class="hidden peer"
                                           @checked($movie->genres->contains($genre->id))>
                                    <span class="px-3 py-1.5 rounded-full text-sm border border-gray-600 text-gray-300 peer-checked:bg-gradient-to-r peer-checked:from-purple-500 peer-checked:to-pink-500 peer-checked:text-white peer-checked:border-transparent transition-all">
                                        {{ $genre->name }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="submit"
                                class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold shadow-lg hover:shadow-purple-500/50 transition-all hover:scale-105">
                            Update Film
                        </button>
                        <a href="{{ route('movies.show', $movie) }}"
                           class="px-6 py-2.5 rounded-lg bg-gray-700 text-gray-200 font-semibold hover:bg-gray-600 transition-all">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
