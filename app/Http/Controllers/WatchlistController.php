<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function index()
    {
        $watchlists = auth()->user()->watchlists()->with('movie.genres')->latest()->get();
        return view('watchlists.index', compact('watchlists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'status' => 'required|in:plan,watching,completed',
        ]);

        Watchlist::updateOrCreate(
            ['user_id' => auth()->id(), 'movie_id' => $request->movie_id],
            ['status' => $request->status]
        );

        return back()->with('success', 'Film ditambahkan ke watchlist!');
    }

    public function update(Request $request, Watchlist $watchlist)
    {
        if ($watchlist->user_id !== auth()->id()) abort(403);

        $request->validate(['status' => 'required|in:plan,watching,completed']);
        $watchlist->update(['status' => $request->status]);

        return back()->with('success', 'Status watchlist diperbarui!');
    }

    public function destroy(Watchlist $watchlist)
    {
        if ($watchlist->user_id !== auth()->id()) abort(403);
        $watchlist->delete();
        return back()->with('success', 'Film dihapus dari watchlist!');
    }

}