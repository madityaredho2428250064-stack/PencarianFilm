-- =====================================================
-- DATA DUMMY ULASAN - PencarianFilm
-- Import file ini ke phpMyAdmin di database: database-film
-- =====================================================

INSERT INTO `reviews` (`user_id`, `movie_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES

-- Januari 2026 (3 ulasan)
(1, 1, 8, 'Film yang sangat epik dan menguras emosi!', '2026-01-05 10:00:00', '2026-01-05 10:00:00'),
(1, 2, 9, 'The Dark Knight adalah mahakarya sinema modern.', '2026-01-12 14:30:00', '2026-01-12 14:30:00'),
(1, 3, 9, 'Inception benar-benar membuatku berpikir keras.', '2026-01-20 09:00:00', '2026-01-20 09:00:00'),

-- Februari 2026 (4 ulasan)
(1, 4, 9, 'Interstellar membuat saya kagum dengan alam semesta.', '2026-02-03 11:00:00', '2026-02-03 11:00:00'),
(1, 5, 10, 'Shawshank Redemption adalah film terbaik sepanjang masa.', '2026-02-10 15:00:00', '2026-02-10 15:00:00'),
(1, 6, 8, 'No Way Home sangat memuaskan bagi fans Spider-Man!', '2026-02-18 20:00:00', '2026-02-18 20:00:00'),
(1, 7, 9, 'Parasite luar biasa, twist-nya tidak terduga.', '2026-02-25 13:00:00', '2026-02-25 13:00:00'),

-- Maret 2026 (3 ulasan)
(1, 8, 8, 'Joker memberikan perspektif baru tentang kejahatan.', '2026-03-07 16:00:00', '2026-03-07 16:00:00'),
(1, 9, 8, 'Dune visualnya sangat memukau!', '2026-03-15 10:30:00', '2026-03-15 10:30:00'),
(1, 10, 9, 'The Lion King klasik yang tidak lekang oleh waktu.', '2026-03-22 19:00:00', '2026-03-22 19:00:00'),

-- April 2026 (5 ulasan)
(1, 11, 8, 'Get Out adalah film horor yang sangat cerdas.', '2026-04-02 12:00:00', '2026-04-02 12:00:00'),
(1, 12, 7, 'Film yang cukup menghibur untuk ditonton santai.', '2026-04-08 14:00:00', '2026-04-08 14:00:00'),
(1, 13, 9, 'Ceritanya sangat menarik dan penuh kejutan.', '2026-04-14 17:00:00', '2026-04-14 17:00:00'),
(1, 14, 8, 'Akting para pemainnya sangat memukau.', '2026-04-20 11:00:00', '2026-04-20 11:00:00'),
(1, 15, 7, 'Film yang solid dengan plot yang baik.', '2026-04-27 20:00:00', '2026-04-27 20:00:00'),

-- Mei 2026 (4 ulasan)
(1, 16, 9, 'Salah satu film terbaik yang pernah saya tonton.', '2026-05-05 09:00:00', '2026-05-05 09:00:00'),
(1, 17, 8, 'Visual effects yang sangat mengesankan.', '2026-05-11 13:00:00', '2026-05-11 13:00:00'),
(1, 18, 7, 'Cerita yang menarik meski agak lambat di awal.', '2026-05-19 18:00:00', '2026-05-19 18:00:00'),
(1, 19, 9, 'Ending yang sangat memuaskan!', '2026-05-28 21:00:00', '2026-05-28 21:00:00'),

-- Juni 2026 (3 ulasan tambahan)
(1, 20, 8, 'Film yang sangat recommended untuk ditonton.', '2026-06-03 10:00:00', '2026-06-03 10:00:00'),
(1, 1, 9, 'Nonton ulang dan tetap seru!', '2026-06-10 15:00:00', '2026-06-10 15:00:00'),
(1, 2, 10, 'Makin suka setelah nonton kedua kalinya.', '2026-06-15 20:00:00', '2026-06-15 20:00:00');
