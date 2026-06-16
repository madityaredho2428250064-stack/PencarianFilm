<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            🎬 Watchlist Saya
        </h2>
    </x-slot>

    <div class="py-8" style="background: linear-gradient(135deg, #0f0f1a 0%, #1a1130 100%); min-height: 100vh;">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-600/20 border border-green-500 text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent">
                    Watchlist Saya
                </h1>
                <p class="text-gray-400 mt-1">Daftar film yang ingin kamu tonton</p>
            </div>

            @if ($watchlists->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($watchlists as $watchlist)
                        <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl overflow-hidden hover:border-purple-400/50 transition-all">
                            <div class="flex gap-4 p-4">
                                <!-- Poster kecil -->
                                <div class="w-16 h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gradient-to-br from-purple-900 to-cyan-900 flex items-center justify-center">
                                    @if ($watchlist->movie->poster_path)
                                        <img src="{{ $watchlist->movie->poster_path }}" alt="{{ $watchlist->movie->title }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-2xl">🎞️</span>
                                    @endif
                                </div>

                                <div class="flex-1 min-w-0">
                                    <a href="{{ route('movies.show', $watchlist->movie) }}"
                                       class="font-semibold text-gray-100 hover:text-purple-300 transition truncate block">
                                        {{ $watchlist->movie->title }}
                                    </a>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $watchlist->movie->release_date ? \Carbon\Carbon::parse($watchlist->movie->release_date)->format('Y') : '-' }}
                                    </p>

                                    <!-- Status badge -->
                                    <span class="inline-block mt-2 px-2 py-0.5 rounded-full text-xs font-semibold
                                        @if($watchlist->status === 'completed') bg-green-500/30 text-green-300 border border-green-400/30
                                        @elseif($watchlist->status === 'watching') bg-blue-500/30 text-blue-300 border border-blue-400/30
                                        @else bg-gray-500/30 text-gray-300 border border-gray-400/30 @endif">
                                        @if($watchlist->status === 'completed') ✅ Selesai
                                        @elseif($watchlist->status === 'watching') 👁️ Sedang Ditonton
                                        @else 📋 Rencana @endif
                                    </span>

                                    <!-- Update status -->
                                    <form method="POST" action="{{ route('watchlists.update', $watchlist) }}" class="mt-2 flex gap-2 items-center">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="text-xs rounded-lg bg-gray-900/50 border border-gray-700 text-gray-300 px-2 py-1 focus:ring-1 focus:ring-purple-500 outline-none">
                                            <option value="plan" @selected($watchlist->status === 'plan')>Rencana</option>
                                            <option value="watching" @selected($watchlist->status === 'watching')>Menonton</option>
                                            <option value="completed" @selected($watchlist->status === 'completed')>Selesai</option>
                                        </select>
                                        <button type="submit" class="text-xs px-2 py-1 rounded bg-purple-600 text-white hover:bg-purple-500 transition">
                                            Update
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Hapus -->
                            <div class="px-4 pb-4">
                                <form method="POST" action="{{ route('watchlists.destroy', $watchlist) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus dari watchlist?')"
                                            class="text-xs text-red-400 hover:text-red-300 transition">
                                        🗑️ Hapus dari Watchlist
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white/5 rounded-2xl border border-white/10">
                    <p class="text-6xl mb-4">🍿</p>
                    <p class="text-gray-400 text-lg">Watchlist kamu masih kosong.</p>
                    <a href="{{ route('movies.index') }}" class="mt-4 inline-block px-6 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold hover:shadow-lg transition">
                        Jelajahi Film
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
