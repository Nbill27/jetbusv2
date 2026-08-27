-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Agu 2026 pada 08.36
-- Versi server: 8.4.3
-- Versi PHP: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `jetbus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangku`
--

CREATE TABLE `bangku` (
  `id_bangku` bigint UNSIGNED NOT NULL,
  `id_bus` bigint UNSIGNED NOT NULL,
  `no_bangku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('tersedia','dipesan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bangku`
--

INSERT INTO `bangku` (`id_bangku`, `id_bus`, `no_bangku`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '01', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(2, 1, '02', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(3, 1, '03', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(4, 1, '04', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(5, 1, '05', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(6, 1, '06', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(7, 1, '07', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(8, 1, '08', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(9, 1, '09', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(10, 1, '10', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(11, 1, '11', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(12, 1, '12', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(13, 1, '13', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(14, 1, '14', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(15, 1, '15', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(16, 1, '16', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(17, 1, '17', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(18, 1, '18', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(19, 1, '19', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(20, 1, '20', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(21, 2, '01', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(22, 2, '02', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(23, 2, '03', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(24, 2, '04', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(25, 2, '05', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(26, 2, '06', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(27, 2, '07', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(28, 2, '08', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(29, 2, '09', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(30, 2, '10', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(31, 2, '11', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(32, 2, '12', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(33, 2, '13', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(34, 2, '14', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(35, 2, '15', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(36, 2, '16', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(37, 2, '17', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(38, 2, '18', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(39, 2, '19', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(40, 2, '20', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(41, 3, '01', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(42, 3, '02', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(43, 3, '03', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(44, 3, '04', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(45, 3, '05', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(46, 3, '06', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(47, 3, '07', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(48, 3, '08', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(49, 3, '09', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(50, 3, '10', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(51, 3, '11', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(52, 3, '12', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(53, 3, '13', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(54, 3, '14', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(55, 3, '15', 'tersedia', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(56, 3, '16', 'tersedia', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(57, 3, '17', 'tersedia', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(58, 3, '18', 'tersedia', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(59, 3, '19', 'tersedia', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(60, 3, '20', 'tersedia', '2026-08-26 05:30:01', '2026-08-26 05:30:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` bigint UNSIGNED NOT NULL,
  `id_tipe` bigint UNSIGNED NOT NULL,
  `no_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `id_tipe`, `no_plat`, `created_at`, `updated_at`) VALUES
(1, 1, 'B 1234 JB', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(2, 2, 'B 5678 JB', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(3, 3, 'D 9012 JB', '2026-08-26 05:30:00', '2026-08-26 05:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_transaksi` bigint UNSIGNED NOT NULL,
  `id_bangku` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` bigint UNSIGNED NOT NULL,
  `id_bus` bigint UNSIGNED NOT NULL,
  `id_rute` bigint UNSIGNED NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_bus`, `id_rute`, `tanggal_berangkat`, `waktu_berangkat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-08-27', '08:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(2, 2, 2, '2026-08-27', '10:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(3, 3, 5, '2026-08-27', '14:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(4, 1, 1, '2026-08-28', '08:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(5, 2, 2, '2026-08-28', '10:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(6, 3, 5, '2026-08-28', '14:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(7, 1, 1, '2026-08-29', '08:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(8, 2, 2, '2026-08-29', '10:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(9, 3, 5, '2026-08-29', '14:00:00', '2026-08-26 05:30:01', '2026-08-26 05:30:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_create_tipe_bus_table', 1),
(5, '2024_01_01_000002_create_rute_table', 1),
(6, '2024_01_01_000003_create_bus_table', 1),
(7, '2024_01_01_000004_create_jadwal_table', 1),
(8, '2024_01_01_000005_create_tiket_table', 1),
(9, '2024_01_01_000006_create_bangku_table', 1),
(10, '2024_01_01_000007_create_transaksi_table', 1),
(11, '2024_01_01_000008_create_detail_transaksi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` bigint UNSIGNED NOT NULL,
  `lokasi_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `lokasi_asal`, `lokasi_tujuan`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', 'Bandung', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(2, 'Jakarta', 'Semarang', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(3, 'Bandung', 'Surabaya', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(4, 'Semarang', 'Surabaya', '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(5, 'Jakarta', 'Surabaya', '2026-08-26 05:30:00', '2026-08-26 05:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0e9C9ybbPO5jhKx20vXEqrm99oDtnU5FjFEnjPZB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0', 'eyJfdG9rZW4iOiJHQWowOTJuOE9aMnV1NHVwQlRuOFNSTWl3aTdkbXhmRzlvUldpM0tGIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787804226),
('4dxl4AWGdAROb3zvYoNNOz7AoCIdtWs0xhtG0tGY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJwOVlPQ1ZsZFdZMk1jQlJLVmYzYkdEQ1hXeXE0WklyQmU5TUo0c0lMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hcm1hZGEiLCJyb3V0ZSI6ImFybWFkYSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1787804456),
('bUgaiAaERpcKzuce9AsMYbl0K4awuTRXnZpa2NgS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJneVBOZ1VKcXJWOHd2clRkcW9JWW5GQWV6dWx1M1lzNEQwOW1WQmZ0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787817836),
('U3jF4kSMX9yL1v56Nlt2N2eQ8H28cPQBXz0c5cw9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0', 'eyJfdG9rZW4iOiJTdzVGZGJscnZuY3BFQlZaa0EwNnNKWVk1U2RHbFc2UlBEaWVMSFJIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787817936),
('Vy8jkqW61KdaxDyfjCobCNuSrxyqHvI9s3JWwuFv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.133.0 Chrome/148.0.7778.280 Electron/42.8.0 Safari/537.36', 'eyJfdG9rZW4iOiJ2Wjl5WTJHZkhjZDZmYWtrTGdHZlBKcGlGa3lldzk4b2RUaU9TaDlHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1787818490),
('XDohN23oKuAEUszptgWjSU1CKajvXqtfWbLgYvuI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0', 'eyJfdG9rZW4iOiJtZU5HcjhKbzBGd3E2bnVCNHR6MWhwV0lHdGU0NzN5N0k2Z1BndnBuIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImhvbWUifX0=', 1787818705);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` bigint UNSIGNED NOT NULL,
  `id_rute` bigint UNSIGNED NOT NULL,
  `id_tipe` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_rute`, `id_tipe`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 350000, '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(2, 2, 2, 250000, '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(3, 3, 3, 150000, '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(4, 4, 2, 200000, '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(5, 5, 3, 300000, '2026-08-26 05:30:01', '2026-08-26 05:30:01'),
(6, 5, 1, 500000, '2026-08-26 05:30:01', '2026-08-26 05:30:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_bus`
--

CREATE TABLE `tipe_bus` (
  `id_tipe` bigint UNSIGNED NOT NULL,
  `nama_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tipe_bus`
--

INSERT INTO `tipe_bus` (`id_tipe`, `nama_tipe`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Eksekutif', 'Bus mewah dengan kursi rebahan, AC, TV, dan snack gratis.', NULL, '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(2, 'Bisnis', 'Bus nyaman dengan AC dan kursi empuk.', NULL, '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(3, 'Ekonomi', 'Bus standar dengan harga terjangkau.', NULL, '2026-08-26 05:30:00', '2026-08-26 05:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint UNSIGNED NOT NULL,
  `id_pengguna` bigint UNSIGNED NOT NULL,
  `id_jadwal` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `status` enum('tertunda','dibayar','gagal','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tertunda',
  `tanggal_transaksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peran` enum('admin','pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pelanggan',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_hp`, `peran`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin JetBus', 'admin@jetbus.com', '081234567890', 'admin', NULL, '$2y$12$sBXcZnierJjcaCk59Wfnu.CNCiia1A2MqcpCUDSJ1nPfiAJV73r7y', NULL, '2026-08-26 05:30:00', '2026-08-26 05:30:00'),
(2, 'Nabil', 'nabil@gmail.com', '089876543210', 'pelanggan', NULL, '$2y$12$nil3Xzeoy3dltarRHkzM.u/FkPrxYNFOrIbWbFEGlKyh4p2oNJ6LW', NULL, '2026-08-26 05:30:00', '2026-08-26 05:30:00');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `bangku`
--
ALTER TABLE `bangku`
  ADD PRIMARY KEY (`id_bangku`),
  ADD KEY `bangku_id_bus_foreign` (`id_bus`);

--
-- Indeks untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD UNIQUE KEY `bus_no_plat_unique` (`no_plat`),
  ADD KEY `bus_id_tipe_foreign` (`id_tipe`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `detail_transaksi_id_bangku_foreign` (`id_bangku`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_id_bus_foreign` (`id_bus`),
  ADD KEY `jadwal_id_rute_foreign` (`id_rute`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `tiket_id_rute_foreign` (`id_rute`),
  ADD KEY `tiket_id_tipe_foreign` (`id_tipe`);

--
-- Indeks untuk tabel `tipe_bus`
--
ALTER TABLE `tipe_bus`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `transaksi_id_jadwal_foreign` (`id_jadwal`);

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
-- AUTO_INCREMENT untuk tabel `bangku`
--
ALTER TABLE `bangku`
  MODIFY `id_bangku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tipe_bus`
--
ALTER TABLE `tipe_bus`
  MODIFY `id_tipe` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bangku`
--
ALTER TABLE `bangku`
  ADD CONSTRAINT `bangku_id_bus_foreign` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_id_tipe_foreign` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_bus` (`id_tipe`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_id_bangku_foreign` FOREIGN KEY (`id_bangku`) REFERENCES `bangku` (`id_bangku`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_bus_foreign` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_id_rute_foreign` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_id_rute_foreign` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE,
  ADD CONSTRAINT `tiket_id_tipe_foreign` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_bus` (`id_tipe`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
