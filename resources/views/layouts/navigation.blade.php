<nav x-data="{ open: false }" style="background: rgba(15,15,26,0.95); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.08); position: relative; z-index: 100; isolation: isolate;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
 
            <!-- Logo + Nav Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('movies.index') }}" class="flex items-center gap-2 shrink-0 me-8">
                    <span class="text-2xl">🎬</span>
                    <span class="font-bold text-lg bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 bg-clip-text text-transparent tracking-wide">
                        CineVerse
                    </span>
                </a>
 
                <!-- Desktop Nav Links -->
                <div class="hidden sm:flex sm:items-center sm:gap-1">
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('dashboard')
                                 ? 'bg-purple-500/20 text-purple-300 border border-purple-500/30'
                                 : 'text-gray-400 hover:text-gray-100 hover:bg-white/5' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('movies.index') }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('movies.*')
                                 ? 'bg-purple-500/20 text-purple-300 border border-purple-500/30'
                                 : 'text-gray-400 hover:text-gray-100 hover:bg-white/5' }}">
                        🎬 Film
                    </a>
                    <a href="{{ route('watchlists.index') }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all
                              {{ request()->routeIs('watchlists.*')
                                 ? 'bg-purple-500/20 text-purple-300 border border-purple-500/30'
                                 : 'text-gray-400 hover:text-gray-100 hover:bg-white/5' }}">
                        📋 Watchlist
                    </a>
                </div>
            </div>
 
            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-all border border-transparent hover:border-white/10">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()?->name ?? 'G', 0, 1)) }}
                        </div>
                        <span>{{ Auth::user()?->name ?? 'Guest' }}</span>
                        <svg class="w-4 h-4 text-gray-500 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
 
                    <!-- Dropdown Menu -->
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         @click.outside="open = false"
                         class="absolute right-0 mt-2 w-48 rounded-xl shadow-xl"
                         style="background: rgba(20,15,35,0.98); border: 1px solid rgba(255,255,255,0.1); z-index: 9999; position: absolute;">
                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center gap-2 px-4 py-3 text-sm text-gray-300 hover:text-white hover:bg-white/5 rounded-t-xl transition">
                            <span>👤</span> Profil
                        </a>
                        <div style="border-top: 1px solid rgba(255,255,255,0.08);"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full flex items-center gap-2 px-4 py-3 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-b-xl transition">
                                <span>🚪</span> Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
 
            <!-- Mobile Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-lg text-gray-400 hover:text-gray-100 hover:bg-white/5 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
 
    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden"
         style="border-top: 1px solid rgba(255,255,255,0.08);">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('dashboard') ? 'bg-purple-500/20 text-purple-300' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                Dashboard
            </a>
            <a href="{{ route('movies.index') }}"
               class="block px-4 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('movies.*') ? 'bg-purple-500/20 text-purple-300' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                🎬 Film
            </a>
            <a href="{{ route('watchlists.index') }}"
               class="block px-4 py-2.5 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('watchlists.*') ? 'bg-purple-500/20 text-purple-300' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
                📋 Watchlist
            </a>
        </div>
        <div class="px-4 py-3" style="border-top: 1px solid rgba(255,255,255,0.08);">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white text-sm font-bold">
                    {{ strtoupper(substr(Auth::user()?->name ?? 'G', 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-white">{{ Auth::user()?->name }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()?->email }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-2.5 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-white/5 transition">
                👤 Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-2.5 rounded-lg text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 transition">
                    🚪 Keluar
                </button>
            </form>
        </div>
    </div>
</nav>
 