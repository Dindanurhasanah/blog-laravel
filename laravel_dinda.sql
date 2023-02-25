-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 02.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_dinda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `priority` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Hardware', 'hardware', 1, 1, '2022-11-23 23:24:44', '2022-11-28 19:49:51'),
(2, 'Software', 'software', 1, 1, '2022-11-25 00:14:34', '2022-11-29 01:14:17'),
(3, 'Internet', 'internet', 1, 1, '2022-11-25 00:15:35', '2022-11-25 00:15:35'),
(5, 'Musik', 'musik', 1, 1, '2022-11-28 18:53:54', '2022-11-29 01:14:10'),
(6, 'Teknologi', 'teknologi', 1, 1, '2022-11-28 19:50:25', '2022-11-29 01:14:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_17_041827_create_categories_table', 1),
(6, '2022_11_23_084918_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `view_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `published_at`, `category_id`, `user_id`, `view_count`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Windows 11', 'First Post short description', 'Windows 11 adalah pengalaman Windows baru, mendekatkan Anda dengan apa yang Anda sukai. Dengan navigasi yang intuitif dan organisasi yang mudah, Windows 11 memiliki tampilan yang benar-benar baru, lebih banyak aplikasi, dan cara yang efisien untuk menjadi kreatif dan produktif.', '1669601972.jpg', NULL, 2, 1, 1, 'windows-11', '2022-11-27 19:19:32', '2022-11-29 23:22:05'),
(5, 'Lirik Lagu Walk You Home dari NCT Dream', 'Walk You Home adalah sebuah lagu yang memiliki lirik yang sangat mendalam dan romantis.', '<p><span id=\"line_1\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">jeongryujangeseo jomman deo meoreodo joeul tende</span><span id=\"line_2\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Senangnya jika stasiun sedikit lebih jauh</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_3\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">bopogi gwaenhi jagajigon hae</span><span id=\"line_4\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Agar ada alasan terus berjalan bersamamu</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_5\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">maeum gataseon boineun benchimada jamshi</span><span id=\"line_6\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Saat kulihat bangku, aku merasa ingin rehat sejenak</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_7\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">anjattaga gago shipeunde</span><span id=\"line_8\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku ingin duduk sebelum pergi</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_9\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">manyang shini na utgo tteodeuneun neoreul bomyeo geotneun gil</span><span id=\"line_10\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Berjalan sembari melihatmu yang tengah bicara dan tersenyum</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_11\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">da watta annyeong jal deureoga oh yeah yeah</span><span id=\"line_12\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Sudah sampai, selamat tinggal, dan masuklah</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_13\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">neomajeo bogo gal tenikka eoseo deureoga</span><span id=\"line_14\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku akan pergi setelah melihatmu masuk ke rumah</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_15\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">yeppeun dwitmoseubi sarajigo naseo</span><span id=\"line_16\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Setelah bahu cantikmu itu menghilang</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_17\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">doraseoneun geu sungan beolsseo nega geuriwo</span><span id=\"line_18\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku akan pulang dan merindukanmu lagi</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_19\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">yunanhi heeojineun ge shireun eoneu jeonyeok</span><span id=\"line_20\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Saat malam satu-satunya hal yang paling ku benci</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_21\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">ildan neol bulleoseo seun chae</span><span id=\"line_22\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Adalah saat telponku untukmu terputus</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_23\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Yeah deoneun hal mari eopjiman geuraedo wait</span><span id=\"line_24\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Ya, tak ada yang bisa ku katakan, tapi aku masih menanti</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_25\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">naeil dashi uri mannal ttaekkaji</span><span id=\"line_26\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Hingga esok kita bertemu lagi</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_27\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">neol ttatteuthage haejul hug majeo hallae babe</span><span id=\"line_28\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku kan berikan pelukan terhangatku untukmu sayang</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_29\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">haneulgeorideon (haneulgeorideon)</span><span id=\"line_30\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Di bawah langit (di bawah langit)</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_31\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">du gaeye geurimja (neoye geurimja)</span><span id=\"line_32\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Dua bayang, bayanganku (dan bayanganmu)</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_33\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">eosaekhaejin bunwigi (hold up hold up come on)</span><span id=\"line_34\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Dalam suasana canggung (tunggu sebentar, ayo)</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_35\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">da watta annyeong jal deureoga oh yeah yeah</span><span id=\"line_36\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Sudah sampai, selamat tinggal, dan masuklah</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_37\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">neomajeo bogo gal tenikka eoseo deureoga</span><span id=\"line_38\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku akan pergi setelah melihatmu masuk ke rumah</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_39\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">yeppeun dwitmoseubi sarajigo naseo</span><span id=\"line_40\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Setelah bahu cantikmu itu menghilang</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_41\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">doraseoneun geu sungan beolsseo nega geuriwo</span><span id=\"line_42\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku akan pulang dan merindukanmu lagi</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_43\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">han baljaguk walk you home (Steppin\' close to you)</span><span id=\"line_44\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Satu langkah, mengantarmu pulang</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_45\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">geu georeumeun mugeowo</span><span id=\"line_46\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Meskipun itu berat</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_47\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">du baljaguk walk you home geu georeumeun akkawo</span><span id=\"line_48\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Dua langkah, aku tuntunkau pulang, meskipun menyedihkan</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_49\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">(It\'s all you baby)</span><span id=\"line_50\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">(Itu semua untukmu sayang)</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_51\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">se baljaguk walk you home</span><span id=\"line_52\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Tiga langkah, mengantarmu pulang</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_53\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">(neowa gachi)</span><span id=\"line_54\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">(Bersamamu)</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_55\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">geu georeumeun himgyeowo</span><span id=\"line_56\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Meski sulit untukku</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_57\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">(Come on come on)</span><span id=\"line_58\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">(Ayo, ayo)</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_59\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">ne baljaguk walk you home geu georeumeun ashwiwo</span><span id=\"line_60\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Empat langkah, aku mengantarmu pulang, meskipun aku menyesal</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_61\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">da watta annyeong jal deureoga oh yeah yeah</span><span id=\"line_62\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Sudah sampai, selamat tinggal, dan masuklah</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_63\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">neomajeo bogo gal tenikka eoseo deureoga</span><span id=\"line_64\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku akan pergi setelah melihatmu masuk ke rumah</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_65\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">yeppeun dwitmoseubi sarajigo naseo</span><span id=\"line_66\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Setelah bahu cantikmu itu menghilang</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_67\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">doraseoneun geu sungan beolsseo nega geuriwo</span><span id=\"line_68\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Aku akan pulang dan merindukanmu lagi</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_69\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">jal jago annyeong naeil manna oh yeah yeah</span><span id=\"line_70\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Selamat malam, selamat tinggal, sampai berjumpa besok</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_71\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">myeot shigan dwimyeon gidaryeotteon jumarinikka</span><span id=\"line_72\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Karena esok adalah akhir pekan yang kunantikan dari sekian banyaknya waktu</span><br style=\"color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\"><span id=\"line_73\" class=\"lirik_line\" style=\"display: block; padding: 0px 5px; color: rgb(0, 0, 0); font-family: helvetica, arial, sans-serif; font-size: 14px;\">derireo ol teni neujjam jago naseo itta dushi geogiseo uri dashi mannaja</span><span id=\"line_74\" class=\"lirik_line hover\" style=\"display: block; padding: 0px 5px; background: none 0px 0px repeat scroll rgb(230, 239, 248); color: rgb(58, 89, 143); font-family: helvetica, arial, sans-serif; font-size: 14px;\">Tidurlah, kita bertemu lagi besok di tempat biasa, akan aku jemput jam 2 siang</span></p>', '1669689569.jpg', NULL, 5, 1, 0, 'lirik-lagu-walk-you-home-dari-nct-dream', '2022-11-28 18:52:55', '2022-11-28 19:41:19'),
(6, 'Tes Judul', 'Tes Deskripsi', 'Tes konten', '1669694568.jpg', NULL, 6, 1, 1, 'tes-judul', '2022-11-28 21:02:48', '2022-11-29 23:22:13'),
(8, 'Internet', 'asdfghjkl', 'jaringannnnnnnnnnnnnnnnnnnnnnnnnnn', '1669709703.jpg', NULL, 3, 1, 1, 'internet', '2022-11-29 01:15:03', '2022-11-29 23:42:48'),
(9, 'DF Arduino', 'DF Arduino adalah', 'asdfghjkl', '1669709776.jpg', NULL, 1, 1, 3, 'df-arduino', '2022-11-29 01:16:16', '2023-01-09 23:38:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.jpg',
  `gender` tinyint(1) DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `slug`, `avatar`, `gender`, `nickname`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dinda Nur Hasanah', 'dindanur063@gmail.com', NULL, '$2y$10$MKdO72qBEDCCUPuMbFwiMOQIvHsiQtGusP1QZHi8g3TQiJ5IRzBhm', 1, 'dinda', '15.jpg', 1, 'Dinda', NULL, '2022-11-23 21:20:51', '2022-11-23 21:20:51'),
(2, 'Trisa Divia Rahmadianti', 'trisa@gmail.com', NULL, '$2y$10$L8bvu3iiIomQOwX0VSG97O8pDSkLMYsOiC5kNJ6s3XU8yHEtzGAWi', NULL, 'ica', 'trisa.jpg', 1, 'Ica', NULL, '2022-11-23 21:21:22', '2022-11-23 21:21:22'),
(3, 'Rahma Maulidina', 'rahma@gmail.com', NULL, '$2y$10$A.xDRkrh4Q3T.v4D4yFUgesVXn89lcFZP0UUHWy.UNPKnD7Ef6.Xe', NULL, 'rahma', 'rahma.jpg', 1, 'Rahma', NULL, '2022-11-30 01:23:03', '2022-11-30 01:23:03'),
(4, 'Risma Wati', 'risma@gmail.com', NULL, '$2y$10$O7WdYbe0Iw58ESWBZmxUgOGiIKcSNB8gF4aNkVXadIsBrUa73z03y', NULL, 'risma', 'risma.jpg', 1, 'Risma', NULL, '2022-11-30 01:23:34', '2022-11-30 01:23:34'),
(7, 'Nova Santoso', 'nova@gmail.com', NULL, '$2y$10$y8tA0ELoOmjxY8Hpj6bDiugnelHd1gdJE.4x9/pHNRmRFDhFD.vle', NULL, 'nova', '0.jpg', 0, 'Nova', NULL, '2023-01-09 23:46:33', '2023-01-09 23:46:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_view_count_index` (`view_count`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
