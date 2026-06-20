<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 p-3 rounded-lg bg-green-600/20 border border-green-500 text-green-300 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <h2 class="text-xl font-bold text-white mb-6 text-center">Masuk ke Akun</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition placeholder-gray-500">
            @error('email')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
            @error('password')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                   class="rounded border-gray-600 bg-gray-900/50 text-purple-600 focus:ring-purple-500">
            <label for="remember_me" class="ms-2 text-sm text-gray-400">Ingat saya</label>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full py-2.5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold shadow-lg hover:shadow-purple-500/50 hover:scale-[1.02] transition-all">
            Masuk
        </button>

        <!-- Links -->
        <div class="flex flex-col items-center gap-2 pt-1">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-gray-400 hover:text-purple-400 transition">
                    Lupa password?
                </a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="text-sm text-purple-400 hover:text-pink-400 font-medium transition">
                    Belum punya akun? <span class="underline">Daftar di sini</span>
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
