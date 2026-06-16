<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('genres.id', $request->genre);
            });
        }

        $movies = $query->latest()->paginate(12);
        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'poster_path' => 'nullable|string',
            'release_date' => 'nullable|date',
            'rating_avg' => 'nullable|numeric|min:0|max:10',
            'genres' => 'nullable|array',
        ]);

        $movie = Movie::create($validated);

        if ($request->has('genres')) {
            $movie->genres()->sync($request->genres);
        }

        return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function show(Movie $movie)
    {
        $movie->load('genres', 'reviews.user');
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $movie->load('genres');
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'poster_path' => 'nullable|string',
            'release_date' => 'nullable|date',
            'rating_avg' => 'nullable|numeric|min:0|max:10',
            'genres' => 'nullable|array',
        ]);

        $movie->update($validated);
        $movie->genres()->sync($request->genres ?? []);

        return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus.');
    }
}