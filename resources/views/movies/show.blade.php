<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            🎬 Detail Film
        </h2>
    </x-slot>

    <div class="py-8" style="background: linear-gradient(135deg, #0f0f1a 0%, #1a1130 100%); min-height: 100vh;">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-600/20 border border-green-500 text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Movie Detail Card -->
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl overflow-hidden shadow-2xl mb-8">
                <div class="flex flex-col md:flex-row gap-0">

                    <!-- Poster -->
                    <div class="md:w-72 flex-shrink-0 bg-gradient-to-br from-purple-900 via-gray-900 to-cyan-900 flex items-center justify-center min-h-64">
                        @if ($movie->poster_path)
                            <img src="{{ $movie->poster_path }}" alt="{{ $movie->title }}"
                                 class="w-full h-full object-cover max-h-96 md:max-h-full">
                        @else
                            <span class="text-8xl">🎞️</span>
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="flex-1 p-8">
                        <div class="flex items-start justify-between gap-4 flex-wrap">
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">{{ $movie->title }}</h1>
                                <p class="text-gray-400 text-sm mb-3">
                                    {{ $movie->release_date ? \Carbon\Carbon::parse($movie->release_date)->format('d M Y') : 'Tanggal tidak tersedia' }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2 bg-yellow-400/20 border border-yellow-400/30 rounded-xl px-4 py-2">
                                <span class="text-2xl">⭐</span>
                                <span class="text-2xl font-bold text-yellow-400">{{ number_format($movie->rating_avg, 1) }}</span>
                            </div>
                        </div>

                        <!-- Genre badges -->
                        @if ($movie->genres->count() > 0)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach ($movie->genres as $genre)
                                    <span class="px-3 py-1 rounded-full text-sm bg-gradient-to-r from-pink-500/30 to-purple-500/30 text-pink-200 border border-pink-400/20">
                                        {{ $genre->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <p class="text-gray-300 leading-relaxed mb-6">
                            {{ $movie->overview ?? 'Sinopsis tidak tersedia.' }}
                        </p>

                        <!-- Action buttons -->
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('movies.index') }}"
                               class="px-4 py-2 rounded-lg bg-gray-700 text-gray-200 text-sm font-semibold hover:bg-gray-600 transition">
                                ← Kembali
                            </a>

                            @auth
                                @if (auth()->user()->hasRole('admin'))
                                    <a href="{{ route('movies.edit', $movie) }}"
                                       class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-sm font-semibold hover:shadow-lg transition">
                                        ✏️ Edit
                                    </a>
                                    <form method="POST" action="{{ route('movies.destroy', $movie) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-pink-600 text-white text-sm font-semibold hover:shadow-lg transition">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                @endif

                                <!-- Add to Watchlist -->
                                <form method="POST" action="{{ route('watchlists.store') }}">
                                    @csrf
                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                    <input type="hidden" name="status" value="plan">
                                    <button type="submit"
                                            class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white text-sm font-semibold hover:shadow-lg transition">
                                        + Watchlist
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 shadow-xl">
                <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    💬 Ulasan <span class="text-gray-400 font-normal text-base">({{ $movie->reviews->count() }})</span>
                </h2>

                @auth
                    <!-- Form Review -->
                    <form method="POST" action="{{ route('reviews.store', $movie) }}" class="mb-8 bg-white/5 rounded-xl p-5 border border-white/10">
                        @csrf
                        <h3 class="font-semibold text-gray-200 mb-3">Tulis Ulasan</h3>
                        <div class="flex gap-3 mb-3">
                            <div class="flex-1">
                                <label class="block text-sm text-gray-400 mb-1">Rating (1-10)</label>
                                <input type="number" name="rating" min="1" max="10" required
                                       class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-3 py-2 focus:ring-2 focus:ring-purple-500 outline-none">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm text-gray-400 mb-1">Komentar</label>
                            <textarea name="comment" rows="3" placeholder="Tulis ulasanmu..."
                                      class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-3 py-2 focus:ring-2 focus:ring-purple-500 outline-none"></textarea>
                        </div>
                        <button type="submit"
                                class="px-5 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white text-sm font-semibold hover:shadow-lg transition">
                            Kirim Ulasan
                        </button>
                    </form>
                @else
                    <p class="text-gray-400 mb-6"><a href="{{ route('login') }}" class="text-purple-400 underline">Login</a> untuk menulis ulasan.</p>
                @endauth

                <!-- List Reviews -->
                @forelse ($movie->reviews as $review)
                    <div class="border-b border-white/10 pb-5 mb-5 last:border-0 last:mb-0">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="font-semibold text-gray-200">{{ $review->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex items-center gap-1 bg-yellow-400/20 rounded-lg px-3 py-1">
                                <span class="text-yellow-400">⭐</span>
                                <span class="font-bold text-yellow-400">{{ $review->rating }}</span>
                            </div>
                        </div>
                        @if ($review->comment)
                            <p class="text-gray-300 mt-2 text-sm leading-relaxed">{{ $review->comment }}</p>
                        @endif

                        @auth
                            @if (auth()->user()->id === $review->user_id || auth()->user()->hasRole('admin'))
                                <form method="POST" action="{{ route('reviews.destroy', $review) }}" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus ulasan ini?')"
                                            class="text-xs text-red-400 hover:text-red-300 transition">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Belum ada ulasan. Jadilah yang pertama!</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
