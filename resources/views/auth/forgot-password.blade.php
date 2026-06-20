<x-guest-layout>
    <h2 class="text-xl font-bold text-white mb-2 text-center">Lupa Password?</h2>
    <p class="text-sm text-gray-400 text-center mb-6">
        Masukkan email kamu dan kami akan kirimkan link reset password.
    </p>

    @if (session('status'))
        <div class="mb-4 p-3 rounded-lg bg-green-600/20 border border-green-500 text-green-300 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full rounded-lg bg-gray-900/50 border border-gray-700 text-gray-100 px-4 py-2.5 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
            @error('email')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="w-full py-2.5 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold shadow-lg hover:shadow-purple-500/50 hover:scale-[1.02] transition-all">
            Kirim Link Reset
        </button>

        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-purple-400 transition">
                ← Kembali ke Login
            </a>
        </div>
    </form>
</x-guest-layout>
