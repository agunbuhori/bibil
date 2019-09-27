-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2019 at 04:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_rizqoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawabans`
--

CREATE TABLE `jawabans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ujian_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `remedial` tinyint(1) NOT NULL DEFAULT 0,
  `judul_ujian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_soal` int(11) NOT NULL DEFAULT 0,
  `soal_ganda_benar` int(11) NOT NULL DEFAULT 0,
  `soal_essay_benar` int(11) NOT NULL DEFAULT 0,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mengerjakan',
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_details`
--

CREATE TABLE `jawaban_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `jawaban_id` int(10) UNSIGNED NOT NULL,
  `soal_id` int(10) UNSIGNED DEFAULT NULL,
  `jenis_soal` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ragu` tinyint(1) NOT NULL DEFAULT 0,
  `jawaban_ganda` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban_essay` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban_essay_benar` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama_jurusan`, `singkatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer dan Jaringan', 'TKJ', 'Jurusan yang mempelajari tentang jaringan komputer', NULL, NULL),
(2, 'Rekayasa Perangkat Lunak', 'RPL', 'Jurusan yang mempelajari tentang perangkat lunak komputer', NULL, NULL),
(3, 'Akuntansi', 'AK', 'Jurusan yang mempelajari tentang keuangan perusahaan', NULL, NULL),
(4, 'Teknik Listrik', 'TL', 'Jurusan yang mempelajari tentang kelistrikan', NULL, NULL),
(5, 'sdsd', 'fsf', 'dfd', '2019-08-09 08:08:31', '2019-08-09 08:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `jenjang` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `jurusan_id`, `jenjang`, `nama_kelas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'X', 'X TKJ 1', 'Kelas Unggulan', NULL, NULL),
(2, 1, 'X', 'X TKJ 2', 'Kelas Biasa', NULL, NULL),
(3, 1, 'XI', 'XI TKJ 1', 'Kelas Unggulan', NULL, NULL),
(4, 1, 'XI', 'XI TKJ 2', 'Kelas Biasa', NULL, NULL),
(5, 1, 'XII', 'XII TKJ 1', 'Kelas Unggulan', NULL, NULL),
(6, 1, 'XII', 'XII TKJ 2', 'Kelas Biasa', NULL, NULL),
(7, 2, 'X', 'X RPL 1', 'Kelas Unggulan', NULL, NULL),
(8, 2, 'X', 'X RPL 2', 'Kelas Biasa', NULL, NULL),
(9, 2, 'XI', 'XI RPL 1', 'Kelas Unggulan', NULL, NULL),
(10, 2, 'XI', 'XI RPL 2', 'Kelas Biasa', NULL, NULL),
(11, 2, 'XII', 'XII RPL 1', 'Kelas Unggulan', NULL, NULL),
(12, 2, 'XII', 'XII RPL 2', 'Kelas Biasa', NULL, NULL),
(13, 3, 'X', 'X AK 1', 'Kelas Unggulan', NULL, NULL),
(14, 3, 'X', 'X AK 2', 'Kelas Biasa', NULL, NULL),
(15, 3, 'XI', 'XI AK 1', 'Kelas Unggulan', NULL, NULL),
(16, 3, 'XI', 'XI AK 2', 'Kelas Biasa', NULL, NULL),
(17, 3, 'XII', 'XII AK 1', 'Kelas Unggulan', NULL, NULL),
(18, 3, 'XII', 'XII AK 2', 'Kelas Biasa', NULL, NULL),
(19, 4, 'X', 'X TL 1', 'Kelas Unggulan', NULL, NULL),
(20, 4, 'X', 'X TL 2', 'Kelas Biasa', NULL, NULL),
(21, 4, 'XI', 'XI TL 1', 'Kelas Unggulan', NULL, NULL),
(22, 4, 'XI', 'XI TL 2', 'Kelas Biasa', NULL, NULL),
(23, 4, 'XII', 'XII TL 1', 'Kelas Unggulan', NULL, NULL),
(24, 4, 'XII', 'XII TL 2', 'Kelas Biasa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kisi_kisis`
--

CREATE TABLE `kisi_kisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `ujian_id` int(10) UNSIGNED DEFAULT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `jenjang` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `jurusan_id`, `jenjang`, `nama_mapel`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'X', 'Bahasa Indonesia', 'bahasa indonesia kelas X', NULL, NULL),
(2, 1, 'XI', 'Bahasa Indonesia', 'bahasa indonesia kelas XI', NULL, NULL),
(3, 1, 'XII', 'Bahasa Indonesia', 'bahasa indonesia kelas XII', NULL, NULL),
(4, 1, 'X', 'Matematika', 'Matematika kelas X', NULL, NULL),
(5, 1, 'XI', 'Matematika', 'Matematika kelas XI', NULL, NULL),
(6, 1, 'XII', 'Matematika', 'Matematika kelas XII', NULL, NULL),
(7, 1, 'X', 'Bahasa Inggris', 'Bahasa Inggris kelas X', NULL, NULL),
(8, 1, 'XI', 'Bahasa Inggris', 'Bahasa Inggris kelas XI', NULL, NULL),
(9, 1, 'XII', 'Bahasa Inggris', 'Bahasa Inggris kelas XII', NULL, NULL),
(10, 1, 'X', 'Kompetensi Keahlian (TKJ)', 'Kompetensi Keahlian (TKJ) kelas X', NULL, NULL),
(11, 1, 'XI', 'Kompetensi Keahlian (TKJ)', 'Kompetensi Keahlian (TKJ) kelas XI', NULL, NULL),
(12, 1, 'XII', 'Kompetensi Keahlian (TKJ)', 'Kompetensi Keahlian (TKJ) kelas XII', NULL, NULL),
(13, 2, 'X', 'Bahasa Indonesia', 'bahasa indonesia kelas X', NULL, NULL),
(14, 2, 'XI', 'Bahasa Indonesia', 'bahasa indonesia kelas XI', NULL, NULL),
(15, 2, 'XII', 'Bahasa Indonesia', 'bahasa indonesia kelas XII', NULL, NULL),
(16, 2, 'X', 'Matematika', 'Matematika kelas X', NULL, NULL),
(17, 2, 'XI', 'Matematika', 'Matematika kelas XI', NULL, NULL),
(18, 2, 'XII', 'Matematika', 'Matematika kelas XII', NULL, NULL),
(19, 2, 'X', 'Bahasa Inggris', 'Bahasa Inggris kelas X', NULL, NULL),
(20, 2, 'XI', 'Bahasa Inggris', 'Bahasa Inggris kelas XI', NULL, NULL),
(21, 2, 'XII', 'Bahasa Inggris', 'Bahasa Inggris kelas XII', NULL, NULL),
(22, 2, 'X', 'Kompetensi Keahlian (RPL)', 'Kompetensi Keahlian (RPL) kelas X', NULL, NULL),
(23, 2, 'XI', 'Kompetensi Keahlian (RPL)', 'Kompetensi Keahlian (RPL) kelas XI', NULL, NULL),
(24, 2, 'XII', 'Kompetensi Keahlian (RPL)', 'Kompetensi Keahlian (RPL) kelas XII', NULL, NULL),
(25, 3, 'X', 'Bahasa Indonesia', 'bahasa indonesia kelas X', NULL, NULL),
(26, 3, 'XI', 'Bahasa Indonesia', 'bahasa indonesia kelas XI', NULL, NULL),
(27, 3, 'XII', 'Bahasa Indonesia', 'bahasa indonesia kelas XII', NULL, NULL),
(28, 3, 'X', 'Matematika', 'Matematika kelas X', NULL, NULL),
(29, 3, 'XI', 'Matematika', 'Matematika kelas XI', NULL, NULL),
(30, 3, 'XII', 'Matematika', 'Matematika kelas XII', NULL, NULL),
(31, 3, 'X', 'Bahasa Inggris', 'Bahasa Inggris kelas X', NULL, NULL),
(32, 3, 'XI', 'Bahasa Inggris', 'Bahasa Inggris kelas XI', NULL, NULL),
(33, 3, 'XII', 'Bahasa Inggris', 'Bahasa Inggris kelas XII', NULL, NULL),
(34, 3, 'X', 'Kompetensi Keahlian (AK)', 'Kompetensi Keahlian (AK) kelas X', NULL, NULL),
(35, 3, 'XI', 'Kompetensi Keahlian (AK)', 'Kompetensi Keahlian (AK) kelas XI', NULL, NULL),
(36, 3, 'XII', 'Kompetensi Keahlian (AK)', 'Kompetensi Keahlian (AK) kelas XII', NULL, NULL),
(37, 4, 'X', 'Bahasa Indonesia', 'bahasa indonesia kelas X', NULL, NULL),
(38, 4, 'XI', 'Bahasa Indonesia', 'bahasa indonesia kelas XI', NULL, NULL),
(39, 4, 'XII', 'Bahasa Indonesia', 'bahasa indonesia kelas XII', NULL, NULL),
(40, 4, 'X', 'Matematika', 'Matematika kelas X', NULL, NULL),
(41, 4, 'XI', 'Matematika', 'Matematika kelas XI', NULL, NULL),
(42, 4, 'XII', 'Matematika', 'Matematika kelas XII', NULL, NULL),
(43, 4, 'X', 'Bahasa Inggris', 'Bahasa Inggris kelas X', NULL, NULL),
(44, 4, 'XI', 'Bahasa Inggris', 'Bahasa Inggris kelas XI', NULL, NULL),
(45, 4, 'XII', 'Bahasa Inggris', 'Bahasa Inggris kelas XII', NULL, NULL),
(46, 4, 'X', 'Kompetensi Keahlian (TL)', 'Kompetensi Keahlian (TL) kelas X', NULL, NULL),
(47, 4, 'XI', 'Kompetensi Keahlian (TL)', 'Kompetensi Keahlian (TL) kelas XI', NULL, NULL),
(48, 4, 'XII', 'Kompetensi Keahlian (TL)', 'Kompetensi Keahlian (TL) kelas XII', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `routes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `params` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icons` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `childs` tinyint(1) NOT NULL DEFAULT 0,
  `nourut` tinyint(4) NOT NULL DEFAULT 0,
  `roles` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `routes`, `params`, `name`, `icons`, `parent`, `childs`, `nourut`, `roles`, `created_at`, `updated_at`) VALUES
(1000, 'dashboard', NULL, 'Dashboard', 'fa fa-dashboard', NULL, 0, 0, 'admin', NULL, NULL),
(1001, NULL, NULL, 'Data Users', 'fa fa-cubes', NULL, 1, 0, 'admin', NULL, NULL),
(1002, 'guru.index', NULL, 'Guru', 'fa fa-circle-o', 1001, 0, 0, 'admin', NULL, NULL),
(1003, 'siswa.index', NULL, 'Siswa', 'fa fa-circle-o', 1001, 0, 0, 'admin', NULL, NULL),
(1004, NULL, NULL, 'Orang Tua', 'fa fa-circle-o', 1001, 0, 0, 'admin', NULL, NULL),
(1005, 'jurusan.index', NULL, 'Jurusan', 'fa fa-graduation-cap', NULL, 0, 0, 'admin', NULL, NULL),
(1006, 'kelas.index', NULL, 'Kelas', 'fa fa-home', NULL, 0, 0, 'admin', NULL, NULL),
(1007, 'mapel.index', NULL, 'Mata Pelajaran', 'fa fa-book', NULL, 0, 0, 'admin', NULL, NULL),
(1008, 'ujian.index', NULL, 'Ujian', 'fa fa-files-o', NULL, 0, 0, 'admin', NULL, NULL),
(1009, 'kisi.index', NULL, 'Kisi - Kisi', 'fa fa-file-text', NULL, 0, 0, 'admin', NULL, NULL),
(2000, 'dashboard', NULL, 'Dashboard', 'fa fa-dashboard', NULL, 0, 0, 'guru', NULL, NULL),
(2001, 'mapel.index', NULL, 'Mapel', 'fa fa-book', NULL, 0, 0, 'guru', NULL, NULL),
(2002, 'ujian.index', NULL, 'Ujian', 'fa fa-files-o', NULL, 0, 0, 'guru', NULL, NULL),
(2003, 'kisi.index', NULL, 'Kisi - Kisi', 'fa fa-file-text', NULL, 0, 0, 'guru', NULL, NULL),
(2004, 'koreksi.index', NULL, 'Koreksi Ujian', 'fa fa-edit', NULL, 0, 0, 'guru', NULL, NULL),
(2005, 'nilai.guru', NULL, 'Nilai Siswa', 'fa fa-file-text-o', NULL, 0, 0, 'guru', NULL, NULL),
(3000, NULL, NULL, 'Dashboard', 'fa fa-dashboard', NULL, 0, 0, 'ortu', NULL, NULL),
(3001, NULL, NULL, 'Materi Pelajaran', 'fa fa-book', NULL, 0, 0, 'ortu', NULL, NULL),
(3002, NULL, NULL, 'Jadwal Ujian', 'fa fa-calendar', NULL, 0, 0, 'ortu', NULL, NULL),
(3003, NULL, NULL, 'Hasil Ujian', 'fa fa-files-o', NULL, 0, 0, 'ortu', NULL, NULL),
(4000, 'dashboard', NULL, 'Dashboard', 'fa fa-dashboard', NULL, 0, 0, 'siswa', NULL, NULL),
(4001, 'mapel', NULL, 'Mata Pelajaran', 'fa fa-book', NULL, 0, 0, 'siswa', NULL, NULL),
(4002, 'ujian.online', NULL, 'Ujian', 'fa fa-tv', NULL, 0, 0, 'siswa', NULL, NULL),
(4003, 'jadwal', NULL, 'Jadwal Ujian', 'fa fa-calendar', NULL, 0, 0, 'siswa', NULL, NULL),
(4004, 'nilai.siswa', NULL, 'Hasil Ujian', 'fa fa-files-o', NULL, 0, 0, 'siswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_07_081140_create_menus_table', 1),
(4, '2019_01_07_120811_create_jurusans_table', 1),
(5, '2019_01_07_120812_create_kelas_table', 1),
(6, '2019_01_07_120813_create_mapels_table', 1),
(7, '2019_01_07_120814_create_user_siswas_table', 1),
(8, '2019_01_07_120815_create_user_gurus_table', 1),
(9, '2019_01_07_120816_create_user_admins_table', 1),
(10, '2019_01_07_120817_create_user_ortus_table', 1),
(11, '2019_01_07_184053_create_ujians_table', 1),
(12, '2019_01_07_184054_create_soals_table', 1),
(13, '2019_01_07_185314_create_jawabans_table', 1),
(14, '2019_01_07_185918_create_jawaban_details_table', 1),
(15, '2019_01_30_022359_create_procedure_count_soal', 1),
(16, '2019_01_30_034859_create_kisi_kisis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` int(10) UNSIGNED NOT NULL,
  `ujian_id` int(10) UNSIGNED NOT NULL,
  `jenis_soal` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kunci` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ujians`
--

CREATE TABLE `ujians` (
  `id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `remedial` tinyint(1) NOT NULL DEFAULT 0,
  `judul_ujian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_soal` int(11) NOT NULL DEFAULT 0,
  `soal_ganda` int(11) NOT NULL DEFAULT 0,
  `soal_essay` int(11) NOT NULL DEFAULT 0,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `waktu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `role` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `picture`, `role`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Ibnu Surkati (Admin)', 'G1aVFZ4EIb@gmail.com', 'admin', '$2y$10$cVco71.cO2I/6UxOCpto6.HlCga4hUB3LcvEXWuXLZgV4.gCiE0C2', 'default.png', 'admin', 'xZaeBOfkGoxrGSvLlspdHdNKCKGoUxvxdgextMQwr9p0GlTdPY6QuwUy7qvc', '2019-05-31 21:16:46', NULL, NULL),
(6, 'agun buhoris', 'agun@buhori.com', 'agunbuhori', '$2y$10$HgsObFrxaIt5QkOLhnPCGO3q3ggX2z/8bJHaYh4qBLbyfGEeNqM7O', 'default.png', 'siswa', NULL, NULL, '2019-09-27 09:36:07', '2019-09-27 13:53:52'),
(7, 'bibil', 'admin@buhoris.com', 'bibil', '$2y$10$jIUpNPu/aqdxiYu2zTT4vO23A18fNsYQu5dSTHReMupaSAoyWxm56', 'default.png', 'siswa', NULL, NULL, '2019-09-27 09:36:36', '2019-09-27 09:36:36'),
(8, 'sumarno', 'sumarno@gmail.com', 'sumarno', '$2y$10$y0WXvG7ZCCV3Igtp8nI5Oe4o4AV287ztjKPpG1ggrGpl4N9d.5wli', 'default.png', 'guru', NULL, NULL, '2019-09-27 13:54:25', '2019-09-27 13:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_admins`
--

CREATE TABLE `user_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_admins`
--

INSERT INTO `user_admins` (`id`, `user_id`, `nama`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ibnu Surkati (Admin)', 'L', 'Jln. Lingkar Pasar Seblat Desa Tanjung Raya Kec. Sukau Kab. Lampung Barat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_gurus`
--

CREATE TABLE `user_gurus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mapel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_gurus`
--

INSERT INTO `user_gurus` (`id`, `user_id`, `mapel`, `nama`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 8, '[\"2\"]', 'sumarno', 'L', 'cikande', '2019-09-27 13:54:25', '2019-09-27 13:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_ortus`
--

CREATE TABLE `user_ortus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_siswas`
--

CREATE TABLE `user_siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_siswas`
--

INSERT INTO `user_siswas` (`id`, `user_id`, `jurusan_id`, `kelas_id`, `nama`, `nis`, `nisn`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, 'agun buhoris', '828282', '828822', 'L', 'gorontalo', '2019-09-27 09:36:07', '2019-09-27 13:53:52'),
(2, 7, 1, 1, 'bibil', '2424', '2222', 'P', 'gorontalo', '2019-09-27 09:36:36', '2019-09-27 09:36:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawabans_ujian_id_foreign` (`ujian_id`),
  ADD KEY `jawabans_user_id_foreign` (`user_id`);

--
-- Indexes for table `jawaban_details`
--
ALTER TABLE `jawaban_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_details_jawaban_id_foreign` (`jawaban_id`),
  ADD KEY `jawaban_details_soal_id_foreign` (`soal_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `kisi_kisis`
--
ALTER TABLE `kisi_kisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kisi_kisis_ujian_id_foreign` (`ujian_id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soals_ujian_id_foreign` (`ujian_id`);

--
-- Indexes for table `ujians`
--
ALTER TABLE `ujians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujians_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `ujians_kelas_id_foreign` (`kelas_id`),
  ADD KEY `ujians_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_admins`
--
ALTER TABLE `user_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_gurus`
--
ALTER TABLE `user_gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_gurus_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_ortus`
--
ALTER TABLE `user_ortus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ortus_user_id_foreign` (`user_id`),
  ADD KEY `user_ortus_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `user_siswas`
--
ALTER TABLE `user_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_siswas_user_id_foreign` (`user_id`),
  ADD KEY `user_siswas_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `user_siswas_kelas_id_foreign` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_details`
--
ALTER TABLE `jawaban_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kisi_kisis`
--
ALTER TABLE `kisi_kisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4005;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujians`
--
ALTER TABLE `ujians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_admins`
--
ALTER TABLE `user_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_gurus`
--
ALTER TABLE `user_gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_ortus`
--
ALTER TABLE `user_ortus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_siswas`
--
ALTER TABLE `user_siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD CONSTRAINT `jawabans_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `jawabans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jawaban_details`
--
ALTER TABLE `jawaban_details`
  ADD CONSTRAINT `jawaban_details_jawaban_id_foreign` FOREIGN KEY (`jawaban_id`) REFERENCES `jawabans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_details_soal_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `soals` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kisi_kisis`
--
ALTER TABLE `kisi_kisis`
  ADD CONSTRAINT `kisi_kisis_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soals`
--
ALTER TABLE `soals`
  ADD CONSTRAINT `soals_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujians` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ujians`
--
ALTER TABLE `ujians`
  ADD CONSTRAINT `ujians_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ujians_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ujians_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_admins`
--
ALTER TABLE `user_admins`
  ADD CONSTRAINT `user_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_gurus`
--
ALTER TABLE `user_gurus`
  ADD CONSTRAINT `user_gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_ortus`
--
ALTER TABLE `user_ortus`
  ADD CONSTRAINT `user_ortus_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `user_siswas` (`id`),
  ADD CONSTRAINT `user_ortus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_siswas`
--
ALTER TABLE `user_siswas`
  ADD CONSTRAINT `user_siswas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`),
  ADD CONSTRAINT `user_siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `user_siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
