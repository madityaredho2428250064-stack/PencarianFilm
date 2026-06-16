
@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        📊 Dashboard Admin
    </h2>
@endsection

@section('content')

    <div class="py-8" style="background: linear-gradient(135deg, #0f0f1a 0%, #1a1130 100%); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Stat Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-gradient-to-br from-purple-600/30 to-purple-900/30 border border-purple-500/30 rounded-2xl p-5 backdrop-blur-sm">
                    <p class="text-purple-300 text-sm font-medium">Total Film</p>
                    <p class="text-4xl font-bold text-white mt-1">{{ $totalMovies }}</p>
                    <p class="text-purple-400 text-xs mt-2">🎬 Film terdaftar</p>
                </div>
                <div class="bg-gradient-to-br from-pink-600/30 to-pink-900/30 border border-pink-500/30 rounded-2xl p-5 backdrop-blur-sm">
                    <p class="text-pink-300 text-sm font-medium">Total Ulasan</p>
                    <p class="text-4xl font-bold text-white mt-1">{{ $totalReviews }}</p>
                    <p class="text-pink-400 text-xs mt-2">💬 Ulasan masuk</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-600/30 to-cyan-900/30 border border-cyan-500/30 rounded-2xl p-5 backdrop-blur-sm">
                    <p class="text-cyan-300 text-sm font-medium">Total Genre</p>
                    <p class="text-4xl font-bold text-white mt-1">{{ $totalGenres }}</p>
                    <p class="text-cyan-400 text-xs mt-2">🏷️ Kategori film</p>
                </div>
                <div class="bg-gradient-to-br from-orange-600/30 to-orange-900/30 border border-orange-500/30 rounded-2xl p-5 backdrop-blur-sm">
                    <p class="text-orange-300 text-sm font-medium">Total Watchlist</p>
                    <p class="text-4xl font-bold text-white mt-1">{{ $totalWatchlists }}</p>
                    <p class="text-orange-400 text-xs mt-2">📋 Item watchlist</p>
                </div>
            </div>

            <!-- Charts Row 1 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                <!-- Bar Chart: Film per Genre -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">🎭 Film per Genre</h3>
                    <canvas id="genreChart" height="200"></canvas>
                </div>

                <!-- Line Chart: Review per Bulan -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">📈 Ulasan per Bulan</h3>
                    <canvas id="reviewChart" height="200"></canvas>
                </div>

            </div>

            <!-- Chart Row 2 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Pie Chart: Distribusi Rating -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">⭐ Distribusi Rating</h3>
                    <canvas id="ratingChart" height="200"></canvas>
                </div>

                <!-- Quick Links -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">⚡ Aksi Cepat</h3>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('movies.index') }}"
   class="flex items-center gap-3 p-3 rounded-xl bg-purple-600/20 border border-purple-500/30 hover:bg-purple-600/40 transition text-purple-200">
    🎬 <span>Lihat Semua Film</span>
</a>
@role('admin')
<a href="{{ route('movies.create') }}"
   class="flex items-center gap-3 p-3 rounded-xl bg-pink-600/20 border border-pink-500/30 hover:bg-pink-600/40 transition text-pink-200">
    ➕ <span>Tambah Film Baru</span>
</a>
@endrole
<a href="{{ route('watchlists.index') }}"
   class="flex items-center gap-3 p-3 rounded-xl bg-cyan-600/20 border border-cyan-500/30 hover:bg-cyan-600/40 transition text-cyan-200">
    📋 <span>Lihat Watchlist</span>
</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data dari Laravel
        const genreLabels = @json($genreData->pluck('name'));
        const genreCounts = @json($genreData->pluck('movies_count'));

        const monthNames = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        const reviewMonths = @json($reviewsPerMonth->pluck('month'));
        const reviewCounts = @json($reviewsPerMonth->pluck('total'));

        const ratingLabels = @json($ratingData->pluck('rating'));
        const ratingCounts = @json($ratingData->pluck('total'));

        // Bar Chart - Genre
        new Chart(document.getElementById('genreChart'), {
            type: 'bar',
            data: {
                labels: genreLabels,
                datasets: [{
                    label: 'Jumlah Film',
                    data: genreCounts,
                    backgroundColor: [
                        'rgba(168,85,247,0.7)', 'rgba(236,72,153,0.7)',
                        'rgba(6,182,212,0.7)', 'rgba(251,146,60,0.7)',
                        'rgba(34,197,94,0.7)', 'rgba(239,68,68,0.7)',
                        'rgba(59,130,246,0.7)', 'rgba(234,179,8,0.7)',
                    ],
                    borderColor: 'rgba(255,255,255,0.2)',
                    borderWidth: 1,
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { labels: { color: '#d1d5db' } } },
                scales: {
                    x: { ticks: { color: '#9ca3af' }, grid: { color: 'rgba(255,255,255,0.05)' } },
                    y: { ticks: { color: '#9ca3af' }, grid: { color: 'rgba(255,255,255,0.05)' }, beginAtZero: true }
                }
            }
        });

        // Line Chart - Review per Bulan
        new Chart(document.getElementById('reviewChart'), {
            type: 'line',
            data: {
                labels: reviewMonths.map(m => monthNames[m - 1]),
                datasets: [{
                    label: 'Jumlah Ulasan',
                    data: reviewCounts,
                    borderColor: 'rgba(236,72,153,1)',
                    backgroundColor: 'rgba(236,72,153,0.2)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(236,72,153,1)',
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { labels: { color: '#d1d5db' } } },
                scales: {
                    x: { ticks: { color: '#9ca3af' }, grid: { color: 'rgba(255,255,255,0.05)' } },
                    y: { ticks: { color: '#9ca3af' }, grid: { color: 'rgba(255,255,255,0.05)' }, beginAtZero: true }
                }
            }
        });

        // Pie Chart - Rating
        new Chart(document.getElementById('ratingChart'), {
            type: 'doughnut',
            data: {
                labels: ratingLabels.map(r => 'Rating ' + r),
                datasets: [{
                    data: ratingCounts,
                    backgroundColor: [
                        'rgba(239,68,68,0.8)', 'rgba(251,146,60,0.8)',
                        'rgba(234,179,8,0.8)', 'rgba(34,197,94,0.8)',
                        'rgba(6,182,212,0.8)', 'rgba(59,130,246,0.8)',
                        'rgba(168,85,247,0.8)', 'rgba(236,72,153,0.8)',
                        'rgba(255,255,255,0.8)', 'rgba(167,243,208,0.8)',
                    ],
                    borderColor: 'rgba(255,255,255,0.1)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { labels: { color: '#d1d5db' }, position: 'right' }
                }
            }
        });
    </script>
@endsection
