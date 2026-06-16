<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'movie_id' => $movie->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('movies.show', $movie)->with('success', 'Ulasan berhasil ditambahkan!');
    }

    public function destroy(Review $review)
    {
        if (auth()->id() !== $review->user_id && !auth()->user()->hasRole('admin')) {
            abort(403);
        }

        $movie = $review->movie;
        $review->delete();

        return redirect()->route('movies.show', $movie)->with('success', 'Ulasan berhasil dihapus!');
    }
}