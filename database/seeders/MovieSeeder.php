<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'overview' => 'Setelah kejadian dahsyat Infinity War, para Avengers yang tersisa dan sekutu mereka berkumpul sekali lagi untuk membalikkan aksi Thanos dan memulihkan keseimbangan alam semesta.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
                'release_date' => '2019-04-26',
                'rating_avg' => 8.4,
                'genres' => ['Action', 'Adventure', 'Sci-Fi'],
            ],
            [
                'title' => 'The Dark Knight',
                'overview' => 'Batman menghadapi ancaman terbesar dari penjahat paling kacau yang pernah ada di Gotham City — The Joker.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
                'release_date' => '2008-07-18',
                'rating_avg' => 9.0,
                'genres' => ['Action', 'Crime', 'Drama'],
            ],
            [
                'title' => 'Inception',
                'overview' => 'Seorang pencuri yang mencuri rahasia dari dalam pikiran orang lain saat mereka bermimpi, mendapatkan tawaran untuk melakukan hal yang mustahil — menanamkan ide.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg',
                'release_date' => '2010-07-16',
                'rating_avg' => 8.8,
                'genres' => ['Action', 'Sci-Fi', 'Thriller'],
            ],
            [
                'title' => 'Interstellar',
                'overview' => 'Sekelompok penjelajah memanfaatkan lubang cacing yang baru ditemukan untuk melampaui batas perjalanan antarmanusia dan berkelana ke seluruh galaksi.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
                'release_date' => '2014-11-07',
                'rating_avg' => 8.6,
                'genres' => ['Adventure', 'Drama', 'Sci-Fi'],
            ],
            [
                'title' => 'The Shawshank Redemption',
                'overview' => 'Seorang bankir dihukum penjara seumur hidup karena membunuh istrinya, padahal ia tidak bersalah. Di penjara ia menemukan harapan lewat persahabatan yang tak terduga.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
                'release_date' => '1994-09-23',
                'rating_avg' => 9.3,
                'genres' => ['Drama'],
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'overview' => 'Dengan identitas Spider-Man terungkap, Peter Parker meminta bantuan Doctor Strange, membuka pintu ke multiverse dan mendatangkan musuh-musuh dari dunia lain.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg',
                'release_date' => '2021-12-17',
                'rating_avg' => 8.3,
                'genres' => ['Action', 'Adventure', 'Sci-Fi'],
            ],
            [
                'title' => 'Parasite',
                'overview' => 'Keluarga miskin yang licik menginfiltrasi rumah tangga keluarga kaya, memicu serangkaian peristiwa yang menegangkan dan tak terduga.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg',
                'release_date' => '2019-11-08',
                'rating_avg' => 8.5,
                'genres' => ['Drama', 'Thriller', 'Comedy'],
            ],
            [
                'title' => 'Joker',
                'overview' => 'Seorang komedian gagal di Gotham City perlahan berubah menjadi penjahat ikonik yang kita kenal sebagai Joker.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg',
                'release_date' => '2019-10-04',
                'rating_avg' => 8.4,
                'genres' => ['Crime', 'Drama', 'Thriller'],
            ],
            [
                'title' => 'Dune',
                'overview' => 'Paul Atreides, seorang pemuda berbakat dari keluarga bangsawan, pergi ke planet paling berbahaya di alam semesta untuk memastikan masa depan keluarganya.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/d5NXSklpcvwN3Y1fjZfNNfzrDkQ.jpg',
                'release_date' => '2021-10-22',
                'rating_avg' => 8.0,
                'genres' => ['Adventure', 'Drama', 'Sci-Fi'],
            ],
            [
                'title' => 'The Lion King',
                'overview' => 'Simba, singa muda, harus berjuang kembali mengambil takhta ayahnya setelah paman jahatnya merebut kekuasaan.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg',
                'release_date' => '1994-06-24',
                'rating_avg' => 8.5,
                'genres' => ['Animation', 'Adventure', 'Drama'],
            ],
            [
                'title' => 'Get Out',
                'overview' => 'Seorang pria kulit hitam mengunjungi keluarga kekasihnya yang kulit putih dan menemukan rahasia gelap yang tersembunyi di balik keramahan mereka.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/tFXcEccSQMf3lfhfXKSU9iRBpa3.jpg',
                'release_date' => '2017-02-24',
                'rating_avg' => 7.7,
                'genres' => ['Horror', 'Mystery', 'Thriller'],
            ],
            [
                'title' => 'Titanic',
                'overview' => 'Kisah cinta antara Jack dan Rose yang terjadi di atas kapal mewah Titanic, yang ditakdirkan tenggelam setelah menabrak gunung es.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg',
                'release_date' => '1997-12-19',
                'rating_avg' => 7.9,
                'genres' => ['Drama', 'Romance'],
            ],
            [
                'title' => 'Oppenheimer',
                'overview' => 'Kisah kehidupan J. Robert Oppenheimer, fisikawan yang memimpin Proyek Manhattan untuk mengembangkan bom atom pertama di dunia.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg',
                'release_date' => '2023-07-21',
                'rating_avg' => 8.3,
                'genres' => ['Drama', 'Thriller', 'Mystery'],
            ],
            [
                'title' => 'Guardians of the Galaxy',
                'overview' => 'Sekelompok penjahat galaksi yang tidak terduga harus bersatu untuk melindungi artefak kuno dari musuh yang mengancam kehancuran alam semesta.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/r7vmZjiyZw9rpJMQJdXpjgiCOk9.jpg',
                'release_date' => '2014-08-01',
                'rating_avg' => 8.0,
                'genres' => ['Action', 'Adventure', 'Comedy', 'Sci-Fi'],
            ],
            [
                'title' => 'Spirited Away',
                'overview' => 'Seorang gadis kecil bernama Chihiro tersesat di dunia roh dan harus bekerja keras untuk menyelamatkan orang tuanya yang berubah menjadi babi.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/39wmItIWsg5sZMyRUHLkWBcuVCM.jpg',
                'release_date' => '2001-07-20',
                'rating_avg' => 9.1,
                'genres' => ['Animation', 'Adventure', 'Fantasy'],
            ],
            [
                'title' => 'The Conjuring',
                'overview' => 'Berdasarkan kisah nyata, dua paranormal investigator membantu sebuah keluarga yang dihantui kekuatan jahat di rumah mereka.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/wVYREutTvI2tmxr6ujrHT704wGF.jpg',
                'release_date' => '2013-07-19',
                'rating_avg' => 7.5,
                'genres' => ['Horror', 'Mystery', 'Thriller'],
            ],
            [
                'title' => 'KKN di Desa Penari',
                'overview' => 'Enam mahasiswa melaksanakan KKN di sebuah desa terpencil dan menghadapi kejadian-kejadian mistis yang mengancam keselamatan mereka.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/5S3BXi6lV5B5W2MflGORiE8RmMl.jpg',
                'release_date' => '2022-05-05',
                'rating_avg' => 7.2,
                'genres' => ['Horror', 'Mystery'],
            ],
            [
                'title' => 'Pengabdi Setan 2: Communion',
                'overview' => 'Keluarga Rini pindah ke rumah susun setelah tragedi menimpa mereka. Namun teror iblis belum berakhir, kini menyebar ke seluruh penghuni gedung.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/7KNAOStbxlONsimriE7blIqSEsB.jpg',
                'release_date' => '2022-08-04',
                'rating_avg' => 7.8,
                'genres' => ['Horror', 'Thriller'],
            ],
            [
                'title' => 'Laskar Pelangi',
                'overview' => 'Kisah sepuluh anak Belitung yang berjuang untuk bersekolah di sekolah kampung yang hampir roboh, namun penuh dengan semangat dan mimpi.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/iy5gYKGrkc4KNMBS18nYrRdT1Jv.jpg',
                'release_date' => '2008-09-25',
                'rating_avg' => 8.1,
                'genres' => ['Drama', 'Adventure'],
            ],
            [
                'title' => 'Deadpool & Wolverine',
                'overview' => 'Deadpool bergabung dengan MCU dan membawa Wolverine bersamanya dalam petualangan penuh aksi dan humor yang mengubah sejarah Marvel.',
                'poster_path' => 'https://image.tmdb.org/t/p/w500/8cdWjvZQUExUUTzyp4t6EDMubfO.jpg',
                'release_date' => '2024-07-26',
                'rating_avg' => 7.9,
                'genres' => ['Action', 'Comedy', 'Sci-Fi'],
            ],
        ];

        foreach ($movies as $data) {
            $genreNames = $data['genres'];
            unset($data['genres']);

            $movie = Movie::create($data);

            $genreIds = Genre::whereIn('name', $genreNames)->pluck('id');
            $movie->genres()->sync($genreIds);
        }
    }
}
