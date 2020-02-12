-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 10:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

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
  `remedial` tinyint(1) NOT NULL DEFAULT '0',
  `judul_ujian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `jmlh_soal` int(11) NOT NULL DEFAULT '0',
  `soal_ganda_benar` int(11) NOT NULL DEFAULT '0',
  `soal_essay_benar` int(11) NOT NULL DEFAULT '0',
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
  `ragu` tinyint(1) NOT NULL DEFAULT '0',
  `jawaban_ganda` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban_essay` longtext COLLATE utf8mb4_unicode_ci,
  `jawaban_essay_benar` tinyint(1) NOT NULL DEFAULT '0',
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
(1, 'Desain Permodelan dan Informasi Bangunan', 'DPIB', NULL, '2019-10-02 02:50:50', '2019-10-02 02:50:50'),
(2, 'Teknik Kendaraan Ringan', 'TKR', NULL, '2019-10-02 02:51:28', '2019-10-02 02:51:28'),
(3, 'Teknik Sepeda Motor', 'TSP', NULL, '2019-10-02 02:54:11', '2019-10-02 02:54:11'),
(4, 'Teknik Komputer Jaringan', 'TKJ', NULL, '2019-10-02 02:54:41', '2019-10-02 02:54:41'),
(5, 'Tata Busana', 'T.Busana', NULL, '2019-10-02 02:57:27', '2019-10-02 02:57:27'),
(6, 'Otomatisasi dan Tata Kelola Perkantoran', 'OTKP', NULL, '2019-10-02 02:57:50', '2019-10-02 02:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `jenjang` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `jurusan_id`, `jenjang`, `nama_kelas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 4, 'XI', 'A', NULL, '2019-10-02 03:09:31', '2019-10-02 03:09:31'),
(3, 1, 'X', 'DPIB A', NULL, '2019-11-12 05:49:38', '2019-11-12 05:49:38'),
(4, 1, 'X', 'DPIB B', NULL, '2019-11-12 05:50:29', '2019-11-12 05:50:29'),
(5, 2, 'X', 'TKR A', NULL, '2019-11-12 05:51:01', '2019-11-12 05:51:01'),
(6, 2, 'X', 'TKR B', NULL, '2019-11-12 05:51:22', '2019-11-12 05:51:22'),
(7, 3, 'X', 'TSM A', NULL, '2019-11-12 05:54:18', '2019-11-12 05:54:18');

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

--
-- Dumping data for table `kisi_kisis`
--

INSERT INTO `kisi_kisis` (`id`, `ujian_id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(1, NULL, 'laporan', '05037df4669627f9b8bdd5dbca939b86.xlsx', '2019-11-11 10:35:55', '2019-11-11 10:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` int(10) UNSIGNED NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `jenjang` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
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
  `childs` tinyint(1) NOT NULL DEFAULT '0',
  `nourut` tinyint(4) NOT NULL DEFAULT '0',
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
(1004, 'ortu.index', NULL, 'Orang Tua', 'fa fa-circle-o', 1001, 0, 0, 'admin', NULL, NULL),
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
  `a` text COLLATE utf8mb4_unicode_ci,
  `b` text COLLATE utf8mb4_unicode_ci,
  `c` text COLLATE utf8mb4_unicode_ci,
  `d` text COLLATE utf8mb4_unicode_ci,
  `e` text COLLATE utf8mb4_unicode_ci,
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
  `remedial` tinyint(1) NOT NULL DEFAULT '0',
  `judul_ujian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `jmlh_soal` int(11) NOT NULL DEFAULT '0',
  `soal_ganda` int(11) NOT NULL DEFAULT '0',
  `soal_essay` int(11) NOT NULL DEFAULT '0',
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `waktu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ujians`
--

INSERT INTO `ujians` (`id`, `jurusan_id`, `kelas_id`, `mapel_id`, `remedial`, `judul_ujian`, `keterangan`, `jmlh_soal`, `soal_ganda`, `soal_essay`, `date_start`, `date_end`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 0, 'asd', 'keterangan', 0, 0, 0, '2000-01-01 00:00:00', '2000-01-05 00:00:00', 11, '2020-01-30 06:08:03', '2020-01-30 06:08:03'),
(3, 4, 1, 44, 1, 'harian', NULL, 0, 0, 0, '2020-01-30 00:00:00', '2020-01-31 00:00:00', 30, '2020-01-30 06:10:09', '2020-01-30 06:10:09'),
(4, 1, 3, 4, 1, 'harian', NULL, 0, 0, 0, '2000-01-01 00:00:00', '2020-01-31 00:00:00', 28, '2020-01-30 08:50:46', '2020-01-30 08:50:46'),
(5, 2, 5, 19, 1, 'harian', NULL, 0, 0, 0, '2000-01-01 00:00:00', '2020-01-31 00:00:00', 26, '2020-01-30 08:51:40', '2020-01-30 08:51:40'),
(6, 2, 5, 13, 0, 'Ulangan Harian', NULL, 0, 0, 0, '2000-01-01 00:00:00', '2020-01-31 00:00:00', 28, '2020-01-30 08:54:38', '2020-01-30 08:54:38'),
(7, 2, 5, 13, 0, 'diisi cahyadi', 'diisi cahyadi', 0, 0, 0, '2000-01-01 00:00:00', '2000-01-05 00:00:00', 22, '2020-01-30 09:00:23', '2020-01-30 09:00:23'),
(8, 2, 5, 13, 0, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 0, 0, 0, '2000-01-01 00:00:00', '2000-01-05 00:00:00', 22, '2020-01-30 09:02:01', '2020-01-30 09:02:01'),
(9, 2, 5, 13, 0, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 0, 0, 0, '2000-01-01 00:00:00', '2000-01-05 00:00:00', 22, '2020-01-30 09:02:30', '2020-01-30 09:02:30');

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
(1, 'Ibnu Surkati (Admin)', 'G1aVFZ4EIb@gmail.com', 'admin', '$2y$10$dhGIIWWYaXaooxHzMPm7b.uXyV67A/BSMltKsr.hyej.PqtCAuTMO', 'default.png', 'admin', 'NKlY1M4YXghWLul835qRT48ojrrwiDEobmO3iZeuDoehPOqRhXOGe6eMU3I7', '2019-05-31 21:16:46', NULL, '2019-09-30 08:11:29'),
(2, 'Abd. Khalil Gibran Kaharu', 'Abdkhalilgibrankaharu@gmail.com', 'khalil', '$2y$10$dhGIIWWYaXaooxHzMPm7b.uXyV67A/BSMltKsr.hyej.PqtCAuTMO', 'default.png', 'siswa', '9f0hsgTtWqjhENdbxHXocqH2TBtbxQEjVqMqIShyh9nDRpnt9t8drF8ZFuC0', '2019-05-31 21:16:46', '2019-10-02 03:13:06', '2019-10-02 03:13:06'),
(3, 'Acsel Budiyawan Usman', 'Acselbudiyawanusman@gmail.com', 'acsel', '$2y$10$mDfaSv15MHgyJi2qhMWekeY.Ow8XCa1D1xB5t.zZev/EEYy9ubdyW', 'default.png', 'siswa', 'BZeB4ZtjjHSawfoN98SY3UJlt9PWsrBamC1dtcRD3lKV37c3ujW4OqH3cEg3', '2019-05-31 21:16:46', '2019-10-02 03:22:45', '2019-10-02 03:22:45'),
(4, 'Aditya Cahya Ramadhan Halalutu', 'adityacahyaramadhanhalalutu@gmail.com', 'aditya', '$2y$10$pbGGopT.eJj/j24kVasxUO7xkcQljJDMYVauYS5RarD9yXwUVKAGG', 'default.png', 'siswa', 'lnINxG9sVK1wlvGMPpLGXn7iR64wi4JyhlBv8rL6OF92VnvPQxUz9jatiYwe', '2019-05-31 21:16:46', '2019-10-02 04:51:58', '2019-10-02 04:51:58'),
(6, 'Ardika Gilang Rohani', 'ardikarilangrohani@gmail.com', 'ardika', '$2y$10$OBnCzQR5E4WX20DoSGhyE.kRqHNw71A4MHFycovL90tTWwN.NQ6sC', 'default.png', 'siswa', 'TEddVxBJWXLwY6VaMC6BLrjXOqXwZqve146SivyXk6nF5Ab56kvlJG8EEZ5j', '2019-05-31 21:16:46', '2019-10-03 03:15:29', '2019-10-03 03:15:29'),
(7, 'Arifin Kiayi', 'Arifinkiayi@gmail.com', 'arifin', '$2y$10$f.iLBG1QOx9uBXEIrDwLNuUlC50gaMEZzYo/43aZjipwlaB5vHbCK', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 03:16:49', '2019-10-03 03:16:49'),
(8, 'Belatrawati Usuli', 'Belatrawatiusuli@gmail.com', 'bela', '$2y$10$qcbqztATf/iEBpCiZ/Ph2ObXsEXiw2MSPt0Z2p14aeeklVOEECSpK', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 03:18:19', '2019-10-03 03:18:19'),
(9, 'Cindi Pricilia Thaib', 'Cindipriciliathaib@gmail.com', 'Cindi', '$2y$10$xpl1AV9r3gwXsjwr3goiNu7aXMtKeZ8.VN66.OnrqIsF9baIMbkHy', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 03:41:27', '2019-10-03 03:41:27'),
(10, 'Desriani Hantuma', 'Desrianihantuma@gmail.com', 'desi', '$2y$10$QWD5Nc29vB2685GggyBqSOToRdvYSUj9vCBqTrs62zG/urTqJ54iq', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 03:44:41', '2019-10-03 03:44:41'),
(11, 'Farhan Yasin', 'Farhanyasin@gmail.com', 'farhan', '$2y$10$2ZoFh0WpQKdX/rp95aEj..oJi3Qr/8KtbEoAoyCsoE0iXwdRCErn6', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 03:57:19', '2019-10-03 03:57:19'),
(12, 'Firmansyah Putra Pakaya', 'Firmansyahputrapakaya@gmail.com', 'firmansyah', '$2y$10$x8tH9u7GGiqOWgQpfETo6ek7/VbgDlopdQKgsp0GpBl.rdUsdSVXe', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 03:59:49', '2019-10-03 03:59:49'),
(13, 'Isto Prasetyo Hasan', 'Istoprasetyohasan@gmail.com', 'isto', '$2y$10$ROWixyzQ/gDloJ.lON6xuuHUcJyYdkk5ijn7HSAJSopkjqVDlPb/i', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:02:27', '2019-10-03 04:02:27'),
(14, 'Moh. Rizki Kasim', 'Mohrizkikasim@gmail.com', 'rizki', '$2y$10$fy9QdmGiaksjJ.kMN7C7iO8ubsioK3dfjvPxj8g74zaQzabLl5aTG', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:05:12', '2019-10-03 04:05:12'),
(15, 'Nirmala Lihawa', 'Nirmalalihawa@gmail.com', 'nirmala', '$2y$10$Z/IYOqrz6MJjJw7XtduAnekLmf8gF.LHChFYmSgnHM1rSBM.bVyJe', 'default.png', 'siswa', 'GPp6F1LsE9X5scN2m5K2YS4gHC1VMC9s0QpH07ysg7Td2Ga9ZjAT0jsEa87n', '2019-05-31 21:16:46', '2019-10-03 04:08:12', '2019-10-03 04:08:12'),
(16, 'Nurhayati Bakuaya', 'Nurhayatibakuaya@gmail.com', 'nurhayati', '$2y$10$SvEwcAd1qhJsPhYwpSHw7.m4qw4LrFVx7dBLvZ7YfB.RNTxUhhKCu', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:11:04', '2019-10-03 04:11:04'),
(17, 'Patra Aripin', 'Patraaripin@gmail.com', 'patra', '$2y$10$PJmsrzxNHPanKy0ojzBuv.mTxBSf9QkKLcl7aCiSJWVdF0GT7TYpW', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:12:59', '2019-10-03 04:12:59'),
(18, 'Rizki Ismail', 'Rizkiismail@gmail.com', 'rizki_i', '$2y$10$8iJl7BLt1hoaiXYfmaRpq.99wodxNxckVDyJ1BB1GnAgqF0PKyQLm', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:19:13', '2019-10-03 04:19:13'),
(19, 'Ronal Ahmad', 'Ronalahmad@gmail.com', 'ronal', '$2y$10$Tn4l2S.AYUOD.T5qZMb5IOu1C6JlabzLiDG96RuSN1wtPQxHQ5dyi', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:22:16', '2019-10-03 04:22:16'),
(20, 'Rukia Mahmud', 'Rukiamahmud@gmail.com', 'rukia', '$2y$10$xyaO3rD6QjCzUJ8dXO9whOEqpugyKAs5c7L3jhKc4TFlADvjwwPZK', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-03 04:24:26', '2019-10-03 04:24:26'),
(21, 'Safrudin Nupu', 'Safrudinnupu@gmail.com', 'safrudin', '$2y$10$DZ9dZ86XIxDQ.BRxsFQ08OLPg.I62Ysr1w0cAG70zB09qMBecIcPm', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:09:53', '2019-10-04 06:09:53'),
(22, 'Salmiati Nur\'ain Alagolo', 'Salmiatinur\'ainalagolo@gmail.com', 'salmiati', '$2y$10$79TB1.4je.sc6kw7H/FsJOhCf0SKpUbhdUSZHK/UCqRNjjplhOTN.', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:11:32', '2019-10-04 06:11:32'),
(23, 'Saniya Rifqa Hadju', 'Saniyarifqahadju@gmail.com', 'saniya', '$2y$10$LYYom1lyDQ49ngV2IcGiKers.7kXQX72O9l2N/.Wuj6q.P540QWuq', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:14:28', '2019-10-04 06:14:28'),
(24, 'Santo Demolawa', 'Santodemolawa@gmail.com', 'santo', '$2y$10$LTeElHiww2Mc0rvtVrqi1u9HeRvHXAc3EhBSeMU.WvgzFlgUi7DTK', 'default.png', 'siswa', 'GVtUZBgzRRDWnYhCEUJXL4gL2X8csAABDCtO9sjZokNHm7Cc47UbmGCa1sNC', '2019-05-31 21:16:46', '2019-10-04 06:17:05', '2019-10-04 06:17:05'),
(25, 'Sintia Mohamad', 'Sintiamohamad@gmail.com', 'sintia', '$2y$10$hB7r4rp3S4G9d.F6Z8Osm.kumV9sCOXxNidN7hu669141aIDwN5wS', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:19:03', '2019-10-04 06:19:03'),
(27, 'Siti Natania Rahma Wartabone', 'Sitinataniarahmawartabone@gmail.com', 'siti', '$2y$10$ibKvyURBV/I3.OkFg8bq7utOYuvPLehd8zZq95YldREuHzRTs/SMK', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:27:44', '2019-10-04 06:27:44'),
(28, 'Umayiro Rirahayu Hadju', 'Umayirorirahayuhadju@gmail.com', 'umayiro', '$2y$10$y1hNVdcsl8irP8AjTtG9j.u71b0xdukYmLe.or2GJ1CDVsaBOs9S.', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:31:00', '2019-10-04 06:31:00'),
(29, 'Zulia Panigoro', 'Zuliapanigoro@gmail.com', 'zulia', '$2y$10$N0yc.a1di/fzOSCZimsN8uo94Yd9/pn81KxlKGurW9T9TXTkdCyKm', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:32:45', '2019-10-04 06:32:45'),
(30, 'Zulwanda Beleneti', 'Zulwandabeleneti@gmail.com', 'zulwanda', '$2y$10$DzSyY/dfqWAdt46nmgnLK.Pac2O01CgHjh1YJn3sjdlWAKZ2Z7gkO', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-10-04 06:34:29', '2019-10-04 06:34:29'),
(31, 'agun b', 'agunb@gmail.com', 'agun', '$2y$10$l6qNIylb2kE076r1X0vXP.fWRAxsJIPF9XtSPG7c7HHTeXdp4bk/.', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-06 07:15:21', '2019-10-06 07:15:21'),
(32, 'bibil p', 'bibilp@gmail.com', 'bibil', '$2y$10$gfFogEv1YZnNqDBokLhhq.WgqCOXgNgiMFPG7SF1UkwilAsQU5kOa', 'default.png', 'guru', 'eGgvJMq1vg892uoQXpTjb3K56z3Icb4cEYtzatXNQyaGR9fvXY1YhBEvfqkK', '2019-05-31 21:16:46', '2019-10-06 07:17:17', '2019-10-06 07:17:17'),
(33, 'Sudin Kaharu', 'sudin.kaharu@gmail.com', 'sudinsedunia', '$2y$10$ng0.y5qftimT1LU6NLpcxO/oGwzv/0gMUjUrG1dVFyQ33uq9bvhWm', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-09 07:57:30', '2019-10-09 07:57:30'),
(34, 'Rahmat Usman', 'rahmanusman@gmail.com', 'rahman', '$2y$10$f/DtuFYsFdNNNzF/2aY5dOjzHaUKkqakVAtKQhBaKhGeu9fwtg5Oa', 'default.png', 'ortu', 'BzIUDF44Vb49qRWIt2kbDy4WcJD3oPDwRmhipHzwjsEut2L7KI3JUtS4ZKhJ', '2019-05-31 21:16:46', '2019-10-10 05:03:04', '2019-10-10 05:03:04'),
(35, 'Ismail Halalutu', 'Ismailhalalutu@gmial.com', 'ismail', '$2y$10$xhPIH4adDJA2Bfkh0LisDO/Ah2s4JXTf6vEsmaDXlQqSHoRzAWbMS', 'default.png', 'ortu', 'EwW1gD56gIu2mBvuPlRvFWdwd476dJIIL4HV4dBUVIuF3F8VwncH5rofNDaH', '2019-05-31 21:16:46', '2019-10-12 07:15:58', '2019-10-12 07:15:58'),
(36, 'Aripin Rohani', 'Aripinrohani@gmail.com', 'aripin', '$2y$10$ER69A7fO1ua2ASjkygFJt.w65wX5sSC8NvV2xo4/P8Suytkn6i3q6', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-12 07:20:39', '2019-10-12 07:20:39'),
(37, 'Ali N. Kiayi', 'Alinkiayi@mail.com', 'ali', '$2y$10$OrfGr7f6Ls8bDy2CQLB1gubzCksSMHFJB5NcR03ipiInVP3jelY6u', 'default.png', 'ortu', 'ziF1rg8KCqGlYfPAyVSRxVXeZoYeuOtSB3dZ4lYs1YxaCUvltglKgSrudPDH', '2019-05-31 21:16:46', '2019-10-12 07:33:49', '2019-10-12 07:33:49'),
(38, 'Gafar Usuli', 'Gafarusuli@gmail.com', 'gafar', '$2y$10$oMccGa7wMS8nmiYBEeGuX.tR3haosB1aVrn0fcz6q9dR.oOxCAXxq', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-17 09:45:49', '2019-10-17 09:45:49'),
(39, 'Ibrahim Thaib', 'Ibrahimthaib@gmail.com', 'ibrahim', '$2y$10$UTnvEBZlKRCapM4LvMyN0Oua2kYjLsP0rQUhIgXe2APgF/E022j3W', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-17 20:33:23', '2019-10-17 20:33:23'),
(40, 'Melki Hantuma', 'Melkihantuma@gmail.com', 'melki', '$2y$10$tlhMgzrdiBneELzOEYLare4MCmi8GV35scJC/LjZ0aV5mBJb2dSnO', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-17 20:38:41', '2019-10-17 20:38:41'),
(41, 'Agus Yasin', 'Agusyasin@gmail.com', 'agus', '$2y$10$1.1zAlYg7mQ52cgfoc0GNemh06f3kDrabCBHJ8dgrVU40XC/IdsIi', 'default.png', 'ortu', 'gyKYX7bmd1W8Q1T1mQ9RoFXS7yuQkZTVB6Y6gzx07kOj45RVrC0BVgS4DCOf', '2019-05-31 21:16:46', '2019-10-21 01:17:44', '2019-10-21 01:17:44'),
(42, 'Irfan Pakaya', 'Irfanpakaya@gmail.com', 'irfan', '$2y$10$VKIae/9Ysx3SgzOFOtTMWeTjEnohH4.PtLWpFbQSOyy6nh6urPytS', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-21 01:23:01', '2019-10-21 01:23:01'),
(44, 'Ismail M. Hasan', 'IsmailmHasan@gmail.com', 'Ismailm', '$2y$10$BrLwcO6slccR9rjw7emY7e/1NthJmXqJ46bHvPK9LdAhchc5tyvdy', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-21 01:34:55', '2019-10-21 01:34:55'),
(45, 'Usman Kasim', 'Usmankasim@gmail.com', 'usman', '$2y$10$wGjbrbYm0qnXP0./nEPDl.jCw6g7kNjbmdURHSOHmr4XnqMmN9QCS', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-21 01:37:20', '2019-10-21 01:37:20'),
(46, 'Sukardi Lihawa', 'SukardiLihawa@gmail.com', 'sukardi', '$2y$10$09U8WbpawpiyG6pq3fPTf.z2v09sS/k.d8nesAs9u1n6YOn/rHqQW', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-21 02:04:28', '2019-10-21 02:04:28'),
(47, 'Risal Bakuaya', 'Risalbakuaya@gmail.com', 'risal', '$2y$10$9dJIm7W10EPctR0CAeT7dejacsQHvOpPlc4rYUauXLtDRVAFIWsmq', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-23 23:47:06', '2019-10-23 23:47:06'),
(48, 'Aripin Hau', 'Aripinhau@gmail.com', 'aripinh', '$2y$10$L8ZDu8rQWn9XYHvOUmDMl.jsPoXpEmWPGS6aSGLpFwrJ23e.EOgIa', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-23 23:55:08', '2019-10-23 23:55:08'),
(49, 'Zufri Ismail', 'Zufriismail@gmail.com', 'Zufri', '$2y$10$qtlEK1NnQajrQ2NROZGC0eOnbKsXwf7ZkA9jfmkJhz3kaxLGDRo.G', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 00:04:40', '2019-10-24 00:04:40'),
(50, 'Kadir Ahmad', 'Kadirahmad@gmail.com', 'kadir', '$2y$10$NnkRaYm/YpU0fX65dfV94uZABt1UOPfQO4dN.XOWkg8kyBV3/lRB6', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 02:03:08', '2019-10-24 02:03:08'),
(51, 'Agus Mahmud', 'Agusmahmud@gmail.com', 'agusm', '$2y$10$nFKWyIgZIHWyaEav0J37NeHw7/QIBsKINsMiCqlQP5V8ywX/YN2fW', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 02:04:57', '2019-10-24 02:04:57'),
(52, 'Zainudin Nupu', 'Zainudinnupu@gmail.com', 'zainudin', '$2y$10$cxzrTPdc3zbOxOgIJIm0Z.Pgfdb45Q0IopZFwE5bBxnzNU4rradJW', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 00:38:22', '2019-10-24 00:38:22'),
(53, 'Yusdin Alagolo', 'Yusdinalagolo@gmail.com', 'yusdin', '$2y$10$rjZTEiyt4Ti8Lcatr1kO9OX0gzBkUbDZc4IaMNRr0FidHV9VolDNC', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 00:40:53', '2019-10-24 00:40:53'),
(54, 'Yohan Hadju', 'Yohanhadju@gmial.com', 'yohan', '$2y$10$xK5z4gRMPwCaw6NYUra3EuSDVNIVtCr7YFOAR2VKYpeQD9j14lK42', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 00:46:46', '2019-10-24 00:46:46'),
(55, 'Tahir Demolawa', 'Tahirdemolawa@gmail.com', 'tahir', '$2y$10$2mMr5.j4fToXwSW1X418rOrJRz4AIoSH4wgl7StewiDQGm2Nymrdy', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 07:42:48', '2019-10-24 07:42:48'),
(56, 'Simon Mohamad', 'Simonmohamad@gamil.com', 'simon', '$2y$10$nmfOCqe4JCDacQm74SJOUenIpw8fxUbtlk31lTD0w2JXnX5efEDr6', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 07:44:20', '2019-10-24 07:44:20'),
(57, 'Yonas Wartabone', 'Yonaswartabone@gmail.com', 'yonas', '$2y$10$7IcB9ohOrrX/9Pzgdssr4ORDX3G1dvyjuRyCPnxyDDIkbvoFA2.Li', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-24 07:46:22', '2019-10-24 07:46:22'),
(58, 'Djarwan Hadju', 'Djarwanhadju@gmail.com', 'Djarwan', '$2y$10$CtkVsJvvJqZjlU.vX9agnO7x4RIDE8r8DWQ6XdTXFuTJQ0S2Skl0.', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-30 00:47:33', '2019-10-30 00:47:33'),
(59, 'Husain D. Panigoro', 'Husaind.panigoro@gmail.com', 'husain', '$2y$10$VAFQjPamIqMfCOR1QHY0NOCb8QVH20koW9uw8n6FKSXvz5sVRqHh2', 'default.png', 'ortu', NULL, '2019-05-31 21:16:46', '2019-10-30 00:49:51', '2019-10-30 00:49:51'),
(60, 'Amin Beleneti', 'Aminbeleneti@gmail.com', 'amin', '$2y$10$9BMNqjpDlT9tWQFRgLtQXu0Fgqq5QocDj5SSc4XCnjEuJeqtK8fEO', 'default.png', 'ortu', 'sE43qubHfY6AToIxo3p6mqlEyu26r1aYuWamvmoVDwq6FQLI0is3B1UjLJYR', '2019-05-31 21:16:46', '2019-10-30 00:52:30', '2019-10-30 00:52:30'),
(61, 'Helmy Budianto Miolo,S.St', 'Helmybudiantomiolo@gmail.com', 'helmy', '$2y$10$XR917tSyOKmheSdGOiOdZ.jGsP1nQKXfY5lUDuxCalLYUGD.bvcCe', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-30 02:02:50', '2019-10-30 02:02:50'),
(62, 'Agus Kasim S,Arc', 'Aguskasim@gmail.com', 'agusk', '$2y$10$Sr6c4UP7je5wyx1HpsdSb.jFJnmXLacL8iEVmWcjtf.K9zXJbb0o.', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:21:18', '2019-10-31 04:21:18'),
(63, 'Rahma Abas, S.Pd', 'Rahmaabas@gmail.com', 'rahma', '$2y$10$3oOIDvIOlvb0Pl9D06lMUeqcGktCGl8UeKXXP.m.Gs13VCjf/oD3m', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:22:50', '2019-10-31 04:22:50'),
(64, 'Andy Heruddin AR,S.T', 'Andyheruddin@gmail.com', 'andy', '$2y$10$ih1V3JtyTT1i/W7iAAdtDuXZkTgrgoKkIjaw93ujhEAqjkUyK5YB2', 'default.png', 'guru', '7WzdVfCE5nlHFZU2foYv1AJVGqEaSMqFBMdqcaDZrOQQcJluJ3eAisXZVoI0', '2019-05-31 21:16:46', '2019-10-31 04:25:18', '2019-10-31 04:25:18'),
(65, 'Nurlaila Suleman, S.Pd M.Pd', 'Nurlailasuleman@gmail.com', 'nurlaila', '$2y$10$rxuE4yz.EkdgHjsQqQMoouCCXiJzfR7LbFvmdYdPIAZCD8ySNv37C', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:26:33', '2019-10-31 04:26:33'),
(66, 'Merni Hadjarati, S.Pd', 'Mernihadjarati@gmail.com', 'merni', '$2y$10$yPe2bI.J/0TtYs2qUCziBu5eU1G2Ul7aIh0VdrUHeHUgo1MwNKDHG', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:33:23', '2019-10-31 04:33:23'),
(67, 'Fitriyanti Yusuf, S.Kom', 'Fitriyantiyusuf@gmail.com', 'Fitriyanti', '$2y$10$xpH/2LQdaIvF63DKlxvG7eO/9G1OtD7PPbf3OD4Ue1IGmjYPCxovS', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:37:10', '2019-10-31 04:37:10'),
(68, 'Islawaty, S.T', 'Islawaty@gmail.com', 'Islawaty', '$2y$10$kXdXORMs/WeWb1LMu5MH2eVrbxZKyxQcXHqJXdeJg7ItH5JbBQNLu', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:38:34', '2019-10-31 04:38:34'),
(69, 'Erna Panigoro,S.Pd M.Si', 'Ernapanigoro@gmail.com', 'erna', '$2y$10$nGx1q8BwZWe4JTBFseMDhePD.8G9yGGxdzJTx3IQIniIka57QcQfi', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:40:57', '2019-10-31 04:40:57'),
(70, 'Mukmin Idrus, S.Pd', 'MukminIdrus@gmail.com', 'mukmin', '$2y$10$cPDx7/Wzjnv4T/Pn0xYqbOkswooUxrmZrhFNkq844Fhop/y3tzwXu', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:50:33', '2019-10-31 04:50:33'),
(71, 'Sherly Kotae, S.pd', 'Sherlykotae@gmail.com', 'sherly', '$2y$10$m6IpQ8rOSVYbNFtVlqj/V.R/hYnM49TK69vupfV0xuK4aRUAIvw6C', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:55:52', '2019-10-31 04:55:52'),
(72, 'Asda W Tuna, S.pd', 'AsdaWTuna@gmail.com', 'asda', '$2y$10$292mMh.6/7bc1cAKCrdkZus3Gc5/T8NkTOjIR4rIHKjKwYNyqmQC.', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:57:21', '2019-10-31 04:57:21'),
(73, 'Santy Dae, S.Pd', 'SantyDae@gmail.com', 'santy', '$2y$10$1LWbLScT9RZ1W2pGjjqkEuR/Zueq4ng8V.jvh03ZQIxuBwrNcpUwW', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 04:59:13', '2019-10-31 04:59:13'),
(74, 'Widyastuty Gintulangi, S.Pd M.Pd', 'Widyastutygintulangi@gmail.com', 'widya', '$2y$10$.XHpww3cM0QXP7RbMCmdVe65X.Jexdc7yFLEfoT.TN6h.3uX5ZtM6', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 05:00:36', '2019-10-31 05:00:36'),
(75, 'Sri Delsi Kobisi, S.Pd', 'Sridelsikobisi@gmail.com', 'sri', '$2y$10$yTeROI6aHo1WG0z6aSTaT.1o1z10HbqenpEcIAoYPZ0MgRI1fI1xy', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 08:49:41', '2019-10-31 08:49:41'),
(76, 'Cahyadi K.Hasan, S.T', 'CahyadiK.Hasan@gmail.com', 'cahyadi', '$2y$10$rKSmoXug2KwtksYkazge4OsXebp/GWBAETeccc09sfbYaLupc2eZ6', 'default.png', 'guru', 'FTMsx0vVYTvBK4zJW01jhD0zsGxEytWQufsz2lG1FKeQmq1MO01APGqBrS9a', '2019-05-31 21:16:46', '2019-10-31 08:53:56', '2019-10-31 08:53:56'),
(77, 'Nurdiana S. Talani,S.Pd', 'NurdianaS.Talani@gmail.com', 'nurdiana', '$2y$10$TOAtSR8E6q5KVrSr/CzapuLIMwDCTZU0VoTQ6KLLsUYwf3wZac9i2', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 08:55:52', '2019-10-31 08:55:52'),
(78, 'Uwtiwaty, S.Pd', 'Uwtiwaty@gmail.com', 'uwtiwaty', '$2y$10$AhA7B6yk5GroIysfIeArmO3xMeJCA0xR9f1GxqfVKQW7af3Fx0cMW', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 08:57:58', '2019-10-31 08:57:58'),
(79, 'Ismi Didipu, S.Pd', 'Ismididipu@gmail.com', 'ismi', '$2y$10$YoUfnkLkOx2gYUHUgcdyg.GxhjdKbx.oL5TQuURYMk/nSeCJeelgm', 'default.png', 'guru', 'JQkjaBkrnyYWWVBjcGMyZcSrnocjyZaaRA51rxAjaVqbcV1LwUdLgTxuacTh', '2019-05-31 21:16:46', '2019-10-31 14:19:36', '2019-10-31 14:19:36'),
(80, 'Ratna Remi Liputo, S.Pd', 'Ratnaremiliputo@gmail.com', 'ratna', '$2y$10$Y0ZCmot2Nx8ikt5tHuVtlOniCsWF9ihh4tgky.RRStaSTSeI2uDDK', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 14:56:56', '2019-10-31 14:56:56'),
(81, 'Dahniar Ishak Saud, S.Pd', 'DahniarIshakSaud@gmail.com', 'dahniar', '$2y$10$iEzFVPD7wycu1G5a7ofGfOe4fLRtR8yczH1WOPq6WSDm1dwXk7.MO', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 15:00:30', '2019-10-31 15:00:30'),
(82, 'Retni Latif, S.Pd', 'Retnilatif@gmail.com', 'retni', '$2y$10$7HqKGR0PjOAid2FAJmZoXusRmJ0BFyiOiGHz3u23MXNEDvkCEGipO', 'default.png', 'guru', 'oR179TyH0ntBJUkbfoh0GMOZ8i5mkkJzZz38qA488yKmVscighj5LTZBeJvd', '2019-05-31 21:16:46', '2019-10-31 20:12:08', '2019-10-31 20:12:08'),
(83, 'Nancy Siska Pesik, S.Pd', 'Nancysiskapesik@gmail.com', 'nancy', '$2y$10$RXRc53loPVDAdgbMS4bdWue837ZderETNJNOzJu55YMjn6e.qxX0m', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 20:13:23', '2019-10-31 20:13:23'),
(84, 'Yuliawaty, S.Pd', 'Yuliawaty@gmail.com', 'yuliawaty', '$2y$10$EcMUUGkSCLJHKwXCCMPay.pJt/JSSVXiRDbz6evrggBlAcZRH0siy', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 20:14:42', '2019-10-31 20:14:42'),
(85, 'Rusna Hikaya, S.Pd', 'RusnaHikaya@gmail.com', 'rusna', '$2y$10$UMOK5C3fKTh0qcX9wcF2BuZWuNsxin4XZZSlf1u0fNc5bVY27/z6.', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 20:17:36', '2019-10-31 20:17:36'),
(86, 'Rosmin Potale, S.Pd', 'RosminPotale@gmail.com', 'rosmin', '$2y$10$zkV/KnbPsDRfdkwaDHdVcOZPjZ1nsruqNGRfXjzLgZDpgAUskQJSW', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-10-31 20:19:02', '2019-10-31 20:19:02'),
(87, 'Alma Yasin, S.Pd', 'AlmaYasin@gmail.com', 'alma', '$2y$10$/0ZIYf62kT/NX.6RDm.in.An5puLK3usHPIrkIoX4UiS3mA4CYCgS', 'default.png', 'guru', 'btPQhC0DszdFw4NcDLYixGesC0WrRINmLq8mxpH7DkwV9aQ1zPZgdemZL4qT', '2019-05-31 21:16:46', '2019-10-31 20:22:27', '2019-10-31 20:22:27'),
(88, 'ibu guru contoh', 'ibugurucontoh@gmail.com', 'ibu', '$2y$10$/J53RRALfDB4GUl/gxSRbucjTO/Zf9mLVoRuwc1mWcT./ilftK1v2', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-11-12 20:08:59', '2019-11-12 20:08:59'),
(89, 'ayu', 'ayu@gmail.com', 'ayu', '$2y$10$4WZSPM4D5pScMTGfUa54Uuh6kySNFzfvS3zVEEfTDhzj32PI.2nEm', 'default.png', 'guru', NULL, '2019-05-31 21:16:46', '2019-11-12 22:57:06', '2019-11-12 22:58:56'),
(90, 'siswa', 'siswa@gmail.com', 'siswa', '$2y$10$Nw6pm3DoinDkixRAVzjG2OqC5CkJxIgNGvL9ybw4s5VgdG.gGM6E2', 'default.png', 'siswa', NULL, '2019-05-31 21:16:46', '2019-11-12 23:01:12', '2019-11-12 23:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_admins`
--

CREATE TABLE `user_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `alamat` text COLLATE utf8mb4_unicode_ci,
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
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_gurus`
--

INSERT INTO `user_gurus` (`id`, `user_id`, `mapel`, `nama`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 31, '[\"11\"]', 'agun b', 'P', 'bandung', '2019-10-06 07:15:22', '2019-10-06 07:15:22'),
(2, 32, '[\"9\",\"11\"]', 'bibil p', 'P', 'jogja', '2019-10-06 07:17:17', '2019-10-06 07:17:17'),
(3, 61, '[\"26\"]', 'Helmy Budianto Miolo,S.St', 'L', NULL, '2019-10-30 02:02:50', '2019-10-30 02:02:50'),
(4, 62, '[\"9\"]', 'Agus Kasim S,Arc', 'L', NULL, '2019-10-31 04:21:19', '2019-10-31 04:21:19'),
(5, 63, '[\"12\",\"14\"]', 'Rahma Abas, S.Pd', 'L', NULL, '2019-10-31 04:22:50', '2019-10-31 04:22:50'),
(6, 64, '[\"5\"]', 'Andy Heruddin AR,S.T', 'L', NULL, '2019-10-31 04:25:18', '2019-10-31 04:25:18'),
(7, 65, '[\"4\"]', 'Nurlaila Suleman, S.Pd M.Pd', 'P', NULL, '2019-10-31 04:26:33', '2019-10-31 04:26:33'),
(8, 66, '[\"6\"]', 'Merni Hadjarati, S.Pd', 'P', NULL, '2019-10-31 04:33:23', '2019-10-31 04:33:23'),
(9, 67, '[\"3\"]', 'Fitriyanti Yusuf, S.Kom', 'P', NULL, '2019-10-31 04:37:10', '2019-10-31 04:37:10'),
(10, 68, '[\"19\"]', 'Islawaty, S.T', 'P', NULL, '2019-10-31 04:38:34', '2019-10-31 04:38:34'),
(11, 69, '[\"3\"]', 'Erna Panigoro,S.Pd M.Si', 'P', NULL, '2019-10-31 04:40:57', '2019-10-31 04:40:57'),
(12, 70, '[\"16\"]', 'Mukmin Idrus, S.Pd', 'L', NULL, '2019-10-31 04:50:33', '2019-10-31 04:50:33'),
(13, 71, '[\"16\"]', 'Sherly Kotae, S.pd', 'L', NULL, '2019-10-31 04:55:52', '2019-10-31 04:55:52'),
(14, 72, '[\"33\"]', 'Asda W Tuna, S.pd', 'L', NULL, '2019-10-31 04:57:21', '2019-10-31 04:57:21'),
(15, 73, '[\"33\"]', 'Santy Dae, S.Pd', 'L', NULL, '2019-10-31 04:59:13', '2019-10-31 04:59:13'),
(16, 74, '[\"34\"]', 'Widyastuty Gintulangi, S.Pd M.Pd', 'P', NULL, '2019-10-31 05:00:36', '2019-10-31 05:00:36'),
(17, 75, '[\"30\"]', 'Sri Delsi Kobisi, S.Pd', 'P', NULL, '2019-10-31 08:49:41', '2019-10-31 08:49:41'),
(18, 76, '[\"46\"]', 'Cahyadi K.Hasan, S.T', 'L', NULL, '2019-10-31 08:53:56', '2019-10-31 08:53:56'),
(19, 77, '[\"4\"]', 'Nurdiana S. Talani,S.Pd', 'P', NULL, '2019-10-31 08:55:52', '2019-10-31 08:55:52'),
(20, 78, '[\"4\"]', 'Uwtiwaty, S.Pd', 'P', NULL, '2019-10-31 08:57:58', '2019-10-31 08:57:58'),
(21, 79, '[\"18\"]', 'Ismi Didipu, S.Pd', 'P', NULL, '2019-10-31 14:19:36', '2019-10-31 14:19:36'),
(22, 80, '[\"6\"]', 'Ratna Remi Liputo, S.Pd', 'P', NULL, '2019-10-31 14:56:56', '2019-10-31 14:56:56'),
(23, 81, '[\"36\"]', 'Dahniar Ishak Saud, S.Pd', 'L', NULL, '2019-10-31 15:00:30', '2019-10-31 15:00:30'),
(24, 82, '[\"40\"]', 'Retni Latif, S.Pd', 'P', NULL, '2019-10-31 20:12:08', '2019-10-31 20:12:08'),
(25, 83, '[\"47\"]', 'Nancy Siska Pesik, S.Pd', 'L', NULL, '2019-10-31 20:13:23', '2019-10-31 20:13:23'),
(26, 84, '[\"47\"]', 'Yuliawaty, S.Pd', 'L', NULL, '2019-10-31 20:14:42', '2019-10-31 20:14:42'),
(27, 85, '[\"46\"]', 'Rusna Hikaya, S.Pd', 'L', NULL, '2019-10-31 20:17:36', '2019-10-31 20:17:36'),
(28, 86, '[\"38\"]', 'Rosmin Potale, S.Pd', 'P', NULL, '2019-10-31 20:19:02', '2019-10-31 20:19:02'),
(29, 87, '[\"45\"]', 'Alma Yasin, S.Pd', 'P', NULL, '2019-10-31 20:22:28', '2019-10-31 20:22:28'),
(30, 88, '[\"46\"]', 'ibu guru contoh', 'P', 'Ada deh', '2019-11-12 20:09:00', '2019-11-12 20:09:00'),
(31, 89, '[\"24\"]', 'ayu', 'P', 'test', '2019-11-12 22:57:06', '2019-11-12 22:58:56');

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
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ortus`
--

INSERT INTO `user_ortus` (`id`, `user_id`, `siswa_id`, `nama`, `nis`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 33, 1, 'Sudin Kaharu', '7503030904690001', 'L', NULL, '2019-10-09 07:57:30', '2019-10-09 07:57:30'),
(2, 34, 2, 'Rahmat Usman', '3561', 'L', 'Kel. Lombongo, Kec. Suwawa Tengah, Kode pos 96184', '2019-10-10 05:03:05', '2019-10-10 05:03:05'),
(3, 35, 3, 'Ismail Halalutu', '3562', 'L', 'Kel. Alele, Kec. Suwawa Tengah, Kode pos 96184', '2019-10-12 07:15:59', '2019-10-12 07:15:59'),
(4, 36, 5, 'Aripin Rohani', '3567', 'L', 'Jl. Perintis, Kel. Helumo, Kec. Suwawa, Kode pos 96184', '2019-10-12 07:20:39', '2019-10-12 07:20:39'),
(5, 37, 6, 'Ali N. Kiayi', '3569', 'L', 'Jl. Poboide, Kel. Boludawa, Kec. Suwawa, Kode pos 96184', '2019-10-12 07:33:49', '2019-10-12 07:33:49'),
(6, 38, 7, 'Gafar Usuli', '3571', 'L', 'Desa Ulanta', '2019-10-17 09:45:50', '2019-10-17 09:45:50'),
(7, 39, 8, 'Ibrahim Thaib', '3572', 'P', 'JL Aroman Warta Bone. Kel. Boludawa, Kec. Suwawa, Kode pos 96183', '2019-10-17 20:33:24', '2019-10-17 20:33:24'),
(8, 40, 9, 'Melki Hantuma', '3573', 'L', 'Kel. Lombongo, Kec. Suwawa Tengah, Kode pos 96184', '2019-10-17 20:38:41', '2019-10-17 20:38:41'),
(9, 41, 10, 'Agus Yasin', '3578', 'L', 'JL Makam Nani Wartabone, Kel. Moutong, Kec. Tilongkabila, Kode pos 96183', '2019-10-21 01:17:45', '2019-10-21 01:17:45'),
(10, 42, 11, 'Irfan Pakaya', '3580', 'L', 'Desa Ulanta,  Kec. Suwawa, Kode pos 96184', '2019-10-21 01:23:01', '2019-10-21 01:39:55'),
(11, 44, 12, 'Ismail M. Hasan', '3578', 'L', 'JL Makam Nani Wartabone, Kel. Moutong, Kec. Tilongkabila, Kode pos 96183', '2019-10-21 01:34:55', '2019-10-21 01:34:55'),
(12, 45, 13, 'Usman Kasim', '3586', 'L', 'JL. Pasar Bersemi, Kel. Pangi, Kec. Kec. Suwawa Timur, Kode pos 96184', '2019-10-21 01:37:20', '2019-10-21 01:38:36'),
(13, 46, 14, 'Sukardi Lihawa', '3591', 'L', 'Jl. Wisata Buaya, Kel. Desa Lonuo, Kec. Tilongkabila, Kode pos 96183', '2019-10-21 02:04:28', '2019-10-21 02:04:28'),
(14, 47, 15, 'Risal Bakuaya', '3594', 'L', 'Jl. Muchlis Rahim,  Kel. Molintogupo, Kec. Suwawa Selatan, Kode pos 96184', '2019-10-23 23:47:06', '2019-10-23 23:47:06'),
(15, 48, 16, 'Aripin Hau', '3595', 'P', 'Jl. Wisata Buaya, Kel. Desa Lonuo, Kec. Tilongkabila, Kode pos 96184', '2019-10-23 23:55:08', '2019-10-24 00:09:29'),
(16, 49, 17, 'Zufri Ismail', '3603', 'L', 'Jl. Lorong Astra, Kel. Bubeya, Kec. Suwawa, Kode pos 96184', '2019-10-24 00:04:40', '2019-10-24 00:10:14'),
(17, 50, 18, 'Kadir Ahmad', '3604', 'L', 'JL Makam Nani Wartabone, Kel. Helumo, Kec. Suwawa, Kode pos 96184', '2019-10-24 02:03:08', '2019-10-24 00:10:44'),
(18, 51, 19, 'Agus Mahmud', '3605', 'L', 'Dusun Morpoga, Kel. Saripi, Kec. Paguyaman, Kode pos 96361', '2019-10-24 02:04:57', '2019-10-24 00:11:21'),
(19, 52, 20, 'Zainudin Nupu', '3606', 'L', 'Jl. Makam Nani Wartabone, Kel. Tinelo, Kec. Suwawa, Kode pos 96184', '2019-10-24 00:38:22', '2019-10-24 00:38:22'),
(20, 53, 21, 'Yusdin Alagolo', '3606', 'L', 'Jl. Makam Nani Wartabone, Kel. Tinelo, Kec. Suwawa, Kode pos 96184', '2019-10-24 00:40:53', '2019-10-24 00:40:53'),
(21, 54, 22, 'Yohan Hadju', '3609', 'L', 'Kel. Duano	Kec. Suwawa Tengah, Kode Pos 96184', '2019-10-24 00:46:46', '2019-10-24 00:46:46'),
(22, 55, 23, 'Tahir Demolawa', '3610', 'L', 'Desa Ulanta,  Kec. Suwawa, Kode pos 96184', '2019-10-24 07:42:49', '2019-10-24 07:42:49'),
(23, 56, 24, 'Simon Mohamad', '3611', 'L', 'Kel. Iloheluma	Kec. Tilongkabila, Kode Pos 96183', '2019-10-24 07:44:20', '2019-10-24 07:44:20'),
(24, 57, 26, 'Yonas Wartabone', '3612', 'L', 'Kel. Bubeya, Kec. Suwawa, Kode pos 96184', '2019-10-24 07:46:22', '2019-10-24 07:46:22'),
(25, 58, 27, 'Djarwan Hadju', '3612', 'L', 'Kel. Bubeya, Kec. Suwawa, Kode pos 96184', '2019-10-30 00:47:34', '2019-10-30 00:47:34'),
(26, 59, 28, 'Husain D. Panigoro', '3621', 'L', 'Kel. Huluduotamo, Kec. Tilongkabila, Kode pos 96183', '2019-10-30 00:49:52', '2019-10-30 00:49:52'),
(27, 60, 29, 'Amin Beleneti', '3623', 'L', 'Desa Boludawa, Kec. Suwawa, Kode pos 96184', '2019-10-30 00:52:30', '2019-10-30 00:52:30');

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
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_siswas`
--

INSERT INTO `user_siswas` (`id`, `user_id`, `jurusan_id`, `kelas_id`, `nama`, `nis`, `nisn`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 'Abd. Khalil Gibran Kaharu', '3559', '3559', 'L', 'Jl. Makam Nani Wartabone, Kel. Tinelo, Kec. Suwawa, Kode pos 96184', '2019-10-02 03:13:06', '2019-10-03 03:19:22'),
(2, 3, 4, 1, 'Acsel Budiyawan Usman', '3561', '0027499906', 'L', 'Kel. Lombongo, Kec. Suwawa Tengah, Kode pos 96184', '2019-10-02 03:22:46', '2019-10-03 03:20:36'),
(3, 4, 4, 1, 'Aditya Cahya Ramadhan Halalutu', '3562', '0027399180', 'L', 'Kel. Alele, Kec. Suwawa Tengah, Kode pos 96184', '2019-10-02 04:51:58', '2019-10-03 03:23:29'),
(5, 6, 4, 1, 'Ardika Gilang Rohani', '3567', '0037049271', 'L', 'Jl. Perintis, Kel. Helumo, Kec. Suwawa, Kode pos 96184', '2019-10-03 03:15:29', '2019-10-03 03:25:09'),
(6, 7, 4, 1, 'Arifin Kiayi', '3569', '0029597547', 'L', 'Jl. Poboide, Kel. Boludawa, Kec. Suwawa, Kode pos 96184', '2019-10-03 03:16:49', '2019-10-03 03:26:12'),
(7, 8, 4, 1, 'Belatrawati Usuli', '3571', '0028700477', 'L', 'Desa Ulanta', '2019-10-03 03:18:20', '2019-10-03 03:18:20'),
(8, 9, 4, 1, 'Cindi Pricilia Thaib', '3572', '0037186586', 'P', 'JL Aroman Warta Bone. Kel. Boludawa, Kec. Suwawa, Kode pos 96183', '2019-10-03 03:41:28', '2019-10-03 03:41:28'),
(9, 10, 4, 1, 'Desriani Hantuma', '3573', '0025914299', 'P', 'Kel. Lombongo, Kec. Suwawa Tengah, Kode pos 96184', '2019-10-03 03:44:41', '2019-10-03 03:44:41'),
(10, 11, 4, 1, 'Farhan Yasin', '3578', '0017469133', 'L', 'JL Makam Nani Wartabone, Kel. Moutong, Kec. Tilongkabila, Kode pos 96183', '2019-10-03 03:57:19', '2019-10-03 03:57:19'),
(11, 12, 4, 1, 'Firmansyah Putra Pakaya', '3580', '0032586577', 'L', 'Desa Ulanta,  Kec. Suwawa, Kode pos 96184', '2019-10-03 03:59:49', '2019-10-03 03:59:49'),
(12, 13, 4, 1, 'Isto Prasetyo Hasan', '3583', '0024766091', 'L', 'Desa Boludawa, Kec. Suwawa, Kode pos 96184', '2019-10-03 04:02:27', '2019-10-03 04:02:27'),
(13, 14, 4, 1, 'Moh. Rizki Kasim', '3586', '0019498901', 'L', 'JL. Pasar Bersemi, Kel. Pangi, Kec. Kec. Suwawa Timur, Kode pos 96184', '2019-10-03 04:05:12', '2019-10-03 04:05:12'),
(14, 15, 4, 1, 'Nirmala Lihawa', '3591', '0035425968', 'P', 'Jl. Wisata Buaya, Kel. Desa Lonuo, Kec. Tilongkabila, Kode pos 96183', '2019-10-03 04:08:12', '2019-10-03 04:08:12'),
(15, 16, 4, 1, 'Nurhayati Bakuaya', '3594', '0036826404', 'P', 'Jl. Muchlis Rahim,  Kel. Molintogupo, Kec. Suwawa Selatan, Kode pos 96184', '2019-10-03 04:11:04', '2019-10-03 04:11:04'),
(16, 17, 4, 1, 'Patra Aripin', '3595', '0013046329', 'P', 'Jl. Wisata Buaya, Kel. Desa Lonuo, Kec. Tilongkabila, Kode pos 96184', '2019-10-03 04:13:00', '2019-10-03 04:13:00'),
(17, 18, 4, 1, 'Rizki Ismail', '3603', '0018048820', 'L', 'Jl. Lorong Astra, Kel. Bubeya, Kec. Suwawa, Kode pos 96184', '2019-10-03 04:19:13', '2019-10-03 04:19:13'),
(18, 19, 4, 1, 'Ronal Ahmad', '3604', '0029662929', 'L', 'JL Makam Nani Wartabone, Kel. Helumo, Kec. Suwawa, Kode pos 96184', '2019-10-03 04:22:16', '2019-10-03 04:22:16'),
(19, 20, 4, 1, 'Rukia Mahmud', '3605', '0049348557', 'P', 'Dusun Morpoga, Kel. Saripi, Kec. Paguyaman, Kode pos 96361', '2019-10-03 04:24:26', '2019-10-03 04:24:26'),
(20, 21, 4, 1, 'Safrudin Nupu', '3606', '0049244848', 'L', 'Jl. Makam Nani Wartabone, Kel. Tinelo, Kec. Suwawa, Kode pos 96184', '2019-10-04 06:09:54', '2019-10-04 06:09:54'),
(21, 22, 4, 1, 'Salmiati Nur\'ain Alagolo', '3608', '0038374649', 'P', 'Desa Boludawa, Kec. Suwawa, Kode pos 96184', '2019-10-04 06:11:32', '2019-10-04 06:11:32'),
(22, 23, 4, 1, 'Saniya Rifqa Hadju', '3609', '0025649261', 'P', 'Kel. Duano	Kec. Suwawa Tengah, Kode Pos 96184', '2019-10-04 06:14:28', '2019-10-04 06:14:28'),
(23, 24, 4, 1, 'Santo Demolawa', '3610', '0036804172', 'L', 'Desa Ulanta,  Kec. Suwawa, Kode pos 96184', '2019-10-04 06:17:05', '2019-10-04 06:17:05'),
(24, 25, 4, 1, 'Sintia Mohamad', '3611', '0026019338', 'P', 'Kel. Iloheluma	Kec. Tilongkabila, Kode Pos 96183', '2019-10-04 06:19:03', '2019-10-04 06:19:03'),
(26, 27, 4, 1, 'Siti Natania Rahma Wartabone', '3612', '0037838405', 'P', 'Kel. Bubeya, Kec. Suwawa, Kode pos 96184', '2019-10-04 06:27:44', '2019-10-04 06:27:44'),
(27, 28, 4, 1, 'Umayiro Rirahayu Hadju', '3615', '0026031039', 'P', 'Kel. Dutohe, Kec. Kabila, Kode pos 96183', '2019-10-04 06:31:00', '2019-10-04 06:31:00'),
(28, 29, 4, 1, 'Zulia Panigoro', '3621', '0029382575', 'P', 'Kel. Huluduotamo, Kec. Tilongkabila, Kode pos 96183', '2019-10-04 06:32:45', '2019-10-04 06:32:45'),
(29, 30, 4, 1, 'Zulwanda Beleneti', '3623', '0011905730', 'P', 'Desa Boludawa, Kec. Suwawa, Kode pos 96184', '2019-10-04 06:34:30', '2019-10-04 06:34:30'),
(30, 90, 4, 5, 'siswa', '1212', '12121212', 'L', 'Jl. Perintis', '2019-11-12 23:01:12', '2019-11-12 23:01:12');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kisi_kisis`
--
ALTER TABLE `kisi_kisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_admins`
--
ALTER TABLE `user_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_gurus`
--
ALTER TABLE `user_gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_ortus`
--
ALTER TABLE `user_ortus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_siswas`
--
ALTER TABLE `user_siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
