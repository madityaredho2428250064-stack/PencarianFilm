-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: database-film
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genres_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Action','2026-06-17 05:14:30','2026-06-17 05:14:30'),(2,'Adventure','2026-06-17 05:14:30','2026-06-17 05:14:30'),(3,'Animation','2026-06-17 05:14:30','2026-06-17 05:14:30'),(4,'Comedy','2026-06-17 05:14:30','2026-06-17 05:14:30'),(5,'Crime','2026-06-17 05:14:30','2026-06-17 05:14:30'),(6,'Documentary','2026-06-17 05:14:30','2026-06-17 05:14:30'),(7,'Drama','2026-06-17 05:14:30','2026-06-17 05:14:30'),(8,'Fantasy','2026-06-17 05:14:30','2026-06-17 05:14:30'),(9,'Horror','2026-06-17 05:14:30','2026-06-17 05:14:30'),(10,'Mystery','2026-06-17 05:14:30','2026-06-17 05:14:30'),(11,'Romance','2026-06-17 05:14:30','2026-06-17 05:14:30'),(12,'Sci-Fi','2026-06-17 05:14:30','2026-06-17 05:14:30'),(13,'Thriller','2026-06-17 05:14:30','2026-06-17 05:14:30'),(14,'Western','2026-06-17 05:14:30','2026-06-17 05:14:30');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_06_13_063315_create_movies_table',1),(5,'2026_06_13_063331_create_watchlists_table',1),(6,'2026_06_13_063340_create_reviews_table',1),(7,'2026_06_13_063521_create_genres_table',1),(8,'2026_06_13_065022_create_movie_genre_table',1),(9,'2026_06_13_065438_create_permission_tables',1),(10,'2026_06_16_191631_drop_movie_genre_table',1),(11,'2026_06_17_121531_recreate_movie_genre_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_genre`
--

DROP TABLE IF EXISTS `movie_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_genre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` bigint(20) unsigned NOT NULL,
  `genre_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_genre_movie_id_foreign` (`movie_id`),
  KEY `movie_genre_genre_id_foreign` (`genre_id`),
  CONSTRAINT `movie_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `movie_genre_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_genre`
--

LOCK TABLES `movie_genre` WRITE;
/*!40000 ALTER TABLE `movie_genre` DISABLE KEYS */;
INSERT INTO `movie_genre` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,12,NULL,NULL),(4,2,1,NULL,NULL),(5,2,5,NULL,NULL),(6,2,7,NULL,NULL),(7,3,1,NULL,NULL),(8,3,12,NULL,NULL),(9,3,13,NULL,NULL),(10,4,2,NULL,NULL),(11,4,7,NULL,NULL),(12,4,12,NULL,NULL),(13,5,7,NULL,NULL),(14,6,1,NULL,NULL),(15,6,2,NULL,NULL),(16,6,12,NULL,NULL),(17,7,4,NULL,NULL),(18,7,7,NULL,NULL),(19,7,13,NULL,NULL),(20,8,5,NULL,NULL),(21,8,7,NULL,NULL),(22,8,13,NULL,NULL),(23,9,2,NULL,NULL),(24,9,7,NULL,NULL),(25,9,12,NULL,NULL),(26,10,2,NULL,NULL),(27,10,3,NULL,NULL),(28,10,7,NULL,NULL),(29,11,9,NULL,NULL),(30,11,10,NULL,NULL),(31,11,13,NULL,NULL),(32,12,7,NULL,NULL),(33,12,11,NULL,NULL),(34,13,7,NULL,NULL),(35,13,10,NULL,NULL),(36,13,13,NULL,NULL),(37,14,1,NULL,NULL),(38,14,2,NULL,NULL),(39,14,4,NULL,NULL),(40,14,12,NULL,NULL),(41,15,2,NULL,NULL),(42,15,3,NULL,NULL),(43,15,8,NULL,NULL),(44,16,9,NULL,NULL),(45,16,10,NULL,NULL),(46,16,13,NULL,NULL),(47,17,9,NULL,NULL),(48,17,10,NULL,NULL),(49,18,9,NULL,NULL),(50,18,13,NULL,NULL),(51,19,2,NULL,NULL),(52,19,7,NULL,NULL),(53,20,1,NULL,NULL),(54,20,4,NULL,NULL),(55,20,12,NULL,NULL);
/*!40000 ALTER TABLE `movie_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `overview` text DEFAULT NULL,
  `poster_path` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `rating_avg` decimal(3,1) NOT NULL DEFAULT 0.0,
  `tmdb_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Avengers: Endgame','Setelah kejadian dahsyat Infinity War, para Avengers yang tersisa dan sekutu mereka berkumpul sekali lagi untuk membalikkan aksi Thanos dan memulihkan keseimbangan alam semesta.','https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg','2019-04-26',8.4,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(2,'The Dark Knight','Batman menghadapi ancaman terbesar dari penjahat paling kacau yang pernah ada di Gotham City — The Joker.','https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg','2008-07-18',9.0,NULL,'2026-06-17 05:26:54','2026-06-19 01:19:27'),(3,'Inception','Seorang pencuri yang mencuri rahasia dari dalam pikiran orang lain saat mereka bermimpi, mendapatkan tawaran untuk melakukan hal yang mustahil — menanamkan ide.','https://image.tmdb.org/t/p/w500/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg','2010-07-16',8.7,NULL,'2026-06-17 05:26:54','2026-06-17 23:37:14'),(4,'Interstellar','Sekelompok penjelajah memanfaatkan lubang cacing yang baru ditemukan untuk melampaui batas perjalanan antarmanusia dan berkelana ke seluruh galaksi.','https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg','2014-11-07',8.6,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(5,'The Shawshank Redemption','Seorang bankir dihukum penjara seumur hidup karena membunuh istrinya, padahal ia tidak bersalah. Di penjara ia menemukan harapan lewat persahabatan yang tak terduga.','https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg','1994-09-23',9.3,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(6,'Spider-Man: No Way Home','Dengan identitas Spider-Man terungkap, Peter Parker meminta bantuan Doctor Strange, membuka pintu ke multiverse dan mendatangkan musuh-musuh dari dunia lain.','https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg','2021-12-17',8.3,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(7,'Parasite','Keluarga miskin yang licik menginfiltrasi rumah tangga keluarga kaya, memicu serangkaian peristiwa yang menegangkan dan tak terduga.','https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg','2019-11-08',8.5,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(8,'Joker','Seorang komedian gagal di Gotham City perlahan berubah menjadi penjahat ikonik yang kita kenal sebagai Joker.','https://image.tmdb.org/t/p/w500/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg','2019-10-04',8.4,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(9,'Dune','Paul Atreides, seorang pemuda berbakat dari keluarga bangsawan, pergi ke planet paling berbahaya di alam semesta untuk memastikan masa depan keluarganya.','https://image.tmdb.org/t/p/w500/d5NXSklpcvwN3Y1fjZfNNfzrDkQ.jpg','2021-10-22',8.0,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(10,'The Lion King','Simba, singa muda, harus berjuang kembali mengambil takhta ayahnya setelah paman jahatnya merebut kekuasaan.','https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg','1994-06-24',8.5,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(11,'Get Out','Seorang pria kulit hitam mengunjungi keluarga kekasihnya yang kulit putih dan menemukan rahasia gelap yang tersembunyi di balik keramahan mereka.','https://image.tmdb.org/t/p/w500/tFXcEccSQMf3lfhfXKSU9iRBpa3.jpg','2017-02-24',7.7,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(12,'Titanic','Kisah cinta antara Jack dan Rose yang terjadi di atas kapal mewah Titanic, yang ditakdirkan tenggelam setelah menabrak gunung es.','https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg','1997-12-19',7.9,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(13,'Oppenheimer','Kisah kehidupan J. Robert Oppenheimer, fisikawan yang memimpin Proyek Manhattan untuk mengembangkan bom atom pertama di dunia.','https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg','2023-07-21',8.3,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(14,'Guardians of the Galaxy','Sekelompok penjahat galaksi yang tidak terduga harus bersatu untuk melindungi artefak kuno dari musuh yang mengancam kehancuran alam semesta.','https://image.tmdb.org/t/p/w500/r7vmZjiyZw9rpJMQJdXpjgiCOk9.jpg','2014-08-01',8.0,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(15,'Spirited Away','Seorang gadis kecil bernama Chihiro tersesat di dunia roh dan harus bekerja keras untuk menyelamatkan orang tuanya yang berubah menjadi babi.','https://image.tmdb.org/t/p/w500/39wmItIWsg5sZMyRUHLkWBcuVCM.jpg','2001-07-20',9.1,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(16,'The Conjuring','Berdasarkan kisah nyata, dua paranormal investigator membantu sebuah keluarga yang dihantui kekuatan jahat di rumah mereka.','https://image.tmdb.org/t/p/w500/wVYREutTvI2tmxr6ujrHT704wGF.jpg','2013-07-19',7.5,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(17,'KKN di Desa Penari','Enam mahasiswa melaksanakan KKN di sebuah desa terpencil dan menghadapi kejadian-kejadian mistis yang mengancam keselamatan mereka.','https://image.tmdb.org/t/p/w500/5S3BXi6lV5B5W2MflGORiE8RmMl.jpg','2022-05-05',7.2,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(18,'Pengabdi Setan 2: Communion','Keluarga Rini pindah ke rumah susun setelah tragedi menimpa mereka. Namun teror iblis belum berakhir, kini menyebar ke seluruh penghuni gedung.','https://image.tmdb.org/t/p/w500/7KNAOStbxlONsimriE7blIqSEsB.jpg','2022-08-04',7.8,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(19,'Laskar Pelangi','Kisah sepuluh anak Belitung yang berjuang untuk bersekolah di sekolah kampung yang hampir roboh, namun penuh dengan semangat dan mimpi.','https://image.tmdb.org/t/p/w500/iy5gYKGrkc4KNMBS18nYrRdT1Jv.jpg','2008-09-25',8.1,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54'),(20,'Deadpool & Wolverine','Deadpool bergabung dengan MCU dan membawa Wolverine bersamanya dalam petualangan penuh aksi dan humor yang mengubah sejarah Marvel.','https://image.tmdb.org/t/p/w500/8cdWjvZQUExUUTzyp4t6EDMubfO.jpg','2024-07-26',7.9,NULL,'2026-06-17 05:26:54','2026-06-17 05:26:54');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `movie_id` bigint(20) unsigned NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_movie_id_foreign` (`movie_id`),
  CONSTRAINT `reviews_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,3,9,'mantap','2026-06-17 06:34:45','2026-06-17 06:34:45'),(2,1,1,8,'Film yang sangat epik dan menguras emosi!','2026-01-05 03:00:00','2026-01-05 03:00:00'),(3,1,2,9,'The Dark Knight adalah mahakarya sinema modern.','2026-01-12 07:30:00','2026-01-12 07:30:00'),(4,1,3,9,'Inception benar-benar membuatku berpikir keras.','2026-01-20 02:00:00','2026-01-20 02:00:00'),(5,1,4,9,'Interstellar membuat saya kagum dengan alam semesta.','2026-02-03 04:00:00','2026-02-03 04:00:00'),(6,1,5,10,'Shawshank Redemption adalah film terbaik sepanjang masa.','2026-02-10 08:00:00','2026-02-10 08:00:00'),(7,1,6,8,'No Way Home sangat memuaskan bagi fans Spider-Man!','2026-02-18 13:00:00','2026-02-18 13:00:00'),(8,1,7,9,'Parasite luar biasa, twist-nya tidak terduga.','2026-02-25 06:00:00','2026-02-25 06:00:00'),(9,1,8,8,'Joker memberikan perspektif baru tentang kejahatan.','2026-03-07 09:00:00','2026-03-07 09:00:00'),(10,1,9,8,'Dune visualnya sangat memukau!','2026-03-15 03:30:00','2026-03-15 03:30:00'),(11,1,10,9,'The Lion King klasik yang tidak lekang oleh waktu.','2026-03-22 12:00:00','2026-03-22 12:00:00'),(12,1,11,8,'Get Out adalah film horor yang sangat cerdas.','2026-04-02 05:00:00','2026-04-02 05:00:00'),(13,1,12,7,'Film yang cukup menghibur untuk ditonton santai.','2026-04-08 07:00:00','2026-04-08 07:00:00'),(14,1,13,9,'Ceritanya sangat menarik dan penuh kejutan.','2026-04-14 10:00:00','2026-04-14 10:00:00'),(15,1,14,8,'Akting para pemainnya sangat memukau.','2026-04-20 04:00:00','2026-04-20 04:00:00'),(16,1,15,7,'Film yang solid dengan plot yang baik.','2026-04-27 13:00:00','2026-04-27 13:00:00'),(17,1,16,9,'Salah satu film terbaik yang pernah saya tonton.','2026-05-05 02:00:00','2026-05-05 02:00:00'),(18,1,17,8,'Visual effects yang sangat mengesankan.','2026-05-11 06:00:00','2026-05-11 06:00:00'),(19,1,18,7,'Cerita yang menarik meski agak lambat di awal.','2026-05-19 11:00:00','2026-05-19 11:00:00'),(20,1,19,9,'Ending yang sangat memuaskan!','2026-05-28 14:00:00','2026-05-28 14:00:00'),(21,1,20,8,'Film yang sangat recommended untuk ditonton.','2026-06-03 03:00:00','2026-06-03 03:00:00'),(22,1,1,9,'Nonton ulang dan tetap seru!','2026-06-10 08:00:00','2026-06-10 08:00:00'),(23,1,2,10,'Makin suka setelah nonton kedua kalinya.','2026-06-15 13:00:00','2026-06-15 13:00:00'),(24,4,3,8,'plot nya bikin mikir tapi boring','2026-06-17 23:37:14','2026-06-17 23:37:14'),(25,4,2,10,'filmnya gila bikin mikir keras','2026-06-17 23:39:36','2026-06-17 23:39:36'),(26,3,2,7,'h','2026-06-19 01:19:27','2026-06-19 01:19:27');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2026-06-17 05:14:30','2026-06-17 05:14:30'),(2,'user','web','2026-06-17 05:14:30','2026-06-17 05:14:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('73zrNqLs0XK9xsTKS5zHX3UStUXSsGH6yVQ4kB4G',3,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZnpmWGJtWnBReUtoYmR3TVZlQXFhZGpqeWlQbEpiYlZ0NmlMYkx4QiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9',1782058991),('ILqDy6AqNVI1w6vpB4UYVL9V0N9csGBchBmQpXwn',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.121.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXVEVE1UZDZ3d01Cc1U5NlFnSE9udjYydEI0ejRBckMxcTFoVHBwSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1782043015),('N9FCsumvtmJUYpqaPvmoNlqiL1CmNnAOTmExfLHC',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDlVbzM1b0xoMTBpSk00Y1ZYaHlsRjZrM1hoeUFENUJLSTlLNFRYeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9mb3Jnb3QtcGFzc3dvcmQiO3M6NToicm91dGUiO3M6MTY6InBhc3N3b3JkLnJlcXVlc3QiO319',1782043514),('P7LaARcPmzNQ9MZpVPvXTLtpwmBa0Xsw1gbncLvt',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN3N4RzRBMTI2Z0FJMkNlZTF1M2VRSlNudmR4QTdlVTIyZXh4VTdneCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9tb3ZpZXMvMiI7czo1OiJyb3V0ZSI7czoxMToibW92aWVzLnNob3ciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1781951345),('qUSURYMmARd3SenmwHLiNU7dvp5FopcTOtGHpGYd',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWp2cm5seWk5ekI4SmhHcGNKUjRCMjc1RnZaSUhjSEt3RWVFOUNSSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1781958829),('YEZkWexPzsUO95YTDme44HiAEngunQRRVXuWWpCG',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.121.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVY4MkpYV3d0QTlRdVJsODJZRGNma05tdXo4Z3JVQVhNNjE3dnA4SCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1781950016);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test User','test@example.com','2026-06-17 05:14:30','$2y$12$Ycn3XBFaDQ0xzhqP2bw4kec.2uBqzDfsUi7EUka1YmgM8R79O0wzq','hdrTb8grxcYFXfptfqaodkfgQvRm0n12T0coQilkxNH8R5nNaI1HvGkDSCCt','2026-06-17 05:14:30','2026-06-20 01:29:00'),(2,'Kiki','kiki@gmail.com',NULL,'$2y$12$xUICz3n8j7uf31jzKbiK.Oln5lALUP.CQtTZMCWsApIErpmm9U.lm',NULL,'2026-06-17 05:15:11','2026-06-17 05:15:11'),(3,'AdityaRedho','adityaredho15@gmail.com',NULL,'$2y$12$T4TktFTTRVFjRVRWvaDHcOq/GGFSdc6zNTlSogAbc57Gfl3PStfxq',NULL,'2026-06-17 22:58:32','2026-06-17 22:58:32'),(4,'Farhan Ganteng','farhanfaril33@gmail.com',NULL,'$2y$12$.iR.HHd2EofRPoHtte/q9ebJ38Wileu37cNqqX1OfvwvAdNB1PhCC',NULL,'2026-06-17 23:36:21','2026-06-17 23:36:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watchlists`
--

DROP TABLE IF EXISTS `watchlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `watchlists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `movie_id` bigint(20) unsigned NOT NULL,
  `status` enum('plan','watching','completed') NOT NULL DEFAULT 'plan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `watchlists_user_id_foreign` (`user_id`),
  KEY `watchlists_movie_id_foreign` (`movie_id`),
  CONSTRAINT `watchlists_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `watchlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watchlists`
--

LOCK TABLES `watchlists` WRITE;
/*!40000 ALTER TABLE `watchlists` DISABLE KEYS */;
INSERT INTO `watchlists` VALUES (1,2,4,'plan','2026-06-17 06:18:35','2026-06-17 06:18:35'),(2,2,1,'plan','2026-06-17 06:25:45','2026-06-17 06:25:45'),(3,3,1,'plan','2026-06-17 23:03:17','2026-06-17 23:03:17'),(5,3,2,'plan','2026-06-17 23:17:34','2026-06-17 23:17:34'),(6,3,3,'plan','2026-06-17 23:17:39','2026-06-17 23:17:39'),(7,3,4,'plan','2026-06-17 23:17:45','2026-06-17 23:17:45'),(8,3,6,'plan','2026-06-17 23:17:50','2026-06-17 23:17:50'),(9,3,10,'plan','2026-06-17 23:18:11','2026-06-17 23:18:11'),(10,3,12,'plan','2026-06-17 23:18:26','2026-06-17 23:18:26'),(11,3,13,'plan','2026-06-17 23:18:41','2026-06-17 23:18:41'),(12,3,8,'plan','2026-06-17 23:18:48','2026-06-17 23:18:48'),(13,3,16,'plan','2026-06-17 23:19:17','2026-06-17 23:19:17'),(15,3,11,'plan','2026-06-17 23:19:52','2026-06-17 23:19:52'),(17,1,2,'plan','2026-06-21 04:57:33','2026-06-21 04:57:33');
/*!40000 ALTER TABLE `watchlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-22  1:46:46
