<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
    'title', 'overview', 'poster_path', 'release_date', 'rating_avg', 'tmdb_id'
];

public function genres()
{
    return $this->belongsToMany(Genre::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}

public function watchlists()
{
    return $this->hasMany(Watchlist::class);
}
}
