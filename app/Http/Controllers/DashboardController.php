<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\Genre;
use App\Models\Watchlist;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMovies = Movie::count();
        $totalReviews = Review::count();
        $totalGenres = Genre::count();
        $totalWatchlists = Watchlist::count();

        // Data grafik: film per genre
        $genreData = Genre::withCount('movies')->get();

        // Data grafik: review per bulan (6 bulan terakhir)
        $reviewsPerMonth = Review::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Data grafik: distribusi rating
        $ratingData = Review::select('rating', DB::raw('COUNT(*) as total'))
            ->groupBy('rating')
            ->orderBy('rating')
            ->get();

        return view('dashboard', compact(
            'totalMovies', 'totalReviews', 'totalGenres', 'totalWatchlists',
            'genreData', 'reviewsPerMonth', 'ratingData'
        ));
    }
}