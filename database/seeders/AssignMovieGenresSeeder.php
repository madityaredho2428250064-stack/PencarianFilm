<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class AssignMovieGenresSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping judul film => array nama genre.
        // Satu film bisa punya lebih dari 1 genre (many-to-many).
        $map = [
            'Avatar' => ['Sci-Fi', 'Action'],
            'The Avengers' => ['Action', 'Sci-Fi'],
            'The Dark Knight' => ['Action', 'Thriller'],
            'Black Panther' => ['Action', 'Sci-Fi'],
            'Iron Man' => ['Action', 'Sci-Fi'],
            'Thor: Ragnarok' => ['Action', 'Comedy', 'Sci-Fi'],
            'Captain America: Civil War' => ['Action', 'Thriller'],
            'Guardians of the Galaxy' => ['Action', 'Comedy', 'Sci-Fi'],
            'The Matrix' => ['Sci-Fi', 'Action'],
            'Oppenheimer' => ['Drama', 'Thriller'],
            'Ant-Man' => ['Action', 'Comedy', 'Sci-Fi'],
            'The Shawshank Redemption' => ['Drama'],
            'Goodfellas' => ['Drama', 'Thriller'],
            'The Silence of the Lambs' => ['Thriller', 'Drama'],
            'It' => ['Horror'],
            'A Quiet Place' => ['Horror', 'Thriller'],
            'Hereditary' => ['Horror'],
            'La La Land' => ['Romance', 'Drama'],
            'The Notebook' => ['Romance', 'Drama'],
            'Pride and Prejudice' => ['Romance', 'Drama'],
            'Toy Story' => ['Animation', 'Comedy'],
            'Finding Nemo' => ['Animation', 'Comedy'],
            'Coco' => ['Animation', 'Drama'],
            'Spirited Away' => ['Animation', 'Drama'],
            'The Grand Budapest Hotel' => ['Comedy', 'Drama'],
            'Superbad' => ['Comedy'],
            'The Hangover' => ['Comedy'],
            'Gone Girl' => ['Thriller', 'Drama'],
            'Memento' => ['Thriller', 'Drama'],
            'No Country for Old Men' => ['Thriller', 'Drama'],
            '1917' => ['Drama', 'Thriller'],
            'Whiplash' => ['Drama'],
            'Soul' => ['Animation', 'Drama'],
            'Avengers: Infinity War' => ['Action', 'Sci-Fi'],
            'Interstellar' => ['Sci-Fi', 'Drama'],
            'Inception' => ['Sci-Fi', 'Thriller'],
            'Parasite' => ['Thriller', 'Drama'],
            'Spider-Man: No Way Home' => ['Action', 'Sci-Fi'],
            'The Lion King' => ['Animation', 'Drama'],
            'Joker' => ['Drama', 'Thriller'],
            'Get Out' => ['Horror', 'Thriller'],
            'Titanic' => ['Romance', 'Drama'],
            'The Conjuring' => ['Horror'],
            'Forrest Gump' => ['Drama', 'Romance'],
            'Schindlers List' => ['Drama'],
            "Schindler's List" => ['Drama'],
            'Pulp Fiction' => ['Thriller', 'Drama'],
            'Fight Club' => ['Drama', 'Thriller'],
        ];

        $genreCache = Genre::pluck('id', 'name'); // ['Action' => 1, 'Comedy' => 2, ...]
        $notFoundGenres = [];
        $notFoundMovies = [];
        $updated = 0;

        foreach ($map as $title => $genreNames) {
            // get() bukan first(): kalau ada judul duplikat di database, semua entrinya ikut di-update
            $movies = Movie::where('title', $title)->get();

            if ($movies->isEmpty()) {
                $notFoundMovies[] = $title;
                continue;
            }

            $genreIds = [];
            foreach ($genreNames as $genreName) {
                if (isset($genreCache[$genreName])) {
                    $genreIds[] = $genreCache[$genreName];
                } else {
                    $notFoundGenres[] = $genreName;
                }
            }

            if (!empty($genreIds)) {
                foreach ($movies as $movie) {
                    // sync() menghapus relasi lama film ini lalu pasang yang baru (aman dijalankan ulang)
                    $movie->genres()->sync($genreIds);
                    $updated++;
                }
            }
        }

        echo "Berhasil update genre untuk {$updated} film.\n";

        if (!empty($notFoundMovies)) {
            echo "Judul film tidak ditemukan di database:\n";
            foreach (array_unique($notFoundMovies) as $t) {
                echo "  - {$t}\n";
            }
        }

        if (!empty($notFoundGenres)) {
            echo "Nama genre tidak ditemukan di tabel genres (cek penulisannya):\n";
            foreach (array_unique($notFoundGenres) as $g) {
                echo "  - {$g}\n";
            }
        }

        // Tampilkan film yang masih belum punya genre sama sekali
        $stillEmpty = Movie::doesntHave('genres')->pluck('title');
        if ($stillEmpty->isNotEmpty()) {
            echo "\nFilm yang masih TANPA genre sama sekali:\n";
            foreach ($stillEmpty as $t) {
                echo "  - {$t}\n";
            }
        }
    }
}
