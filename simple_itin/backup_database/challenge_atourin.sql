-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2019 at 01:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge_atourin`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penginapans`
--

CREATE TABLE `jenis_penginapans` (
  `jenis_penginapan_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_penginapan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_penginapans`
--

INSERT INTO `jenis_penginapans` (`jenis_penginapan_id`, `nama_jenis_penginapan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('176271a0-e13b-11e9-a306-43f55bb25979', 'Motel', '2019-09-27 15:25:52', '2019-09-27 15:25:52', NULL),
('8946ee70-df71-11e9-985a-511574e38245', 'Cottage / Bungallow', '2019-09-25 08:50:33', '2019-09-25 08:50:33', NULL),
('920a4ba0-df71-11e9-8810-1332c8914031', 'Hotel', '2019-09-25 08:50:48', '2019-09-25 08:50:48', NULL),
('9a721b20-df71-11e9-9f2d-4b5e72d0c754', 'Hostel', '2019-09-25 08:51:02', '2019-09-25 08:51:02', NULL),
('a05e72e0-df71-11e9-95f5-4d27c9830752', 'Kontrakan', '2019-09-25 08:51:12', '2019-09-25 08:51:12', NULL),
('af6f8b70-df71-11e9-84a3-bd8f6b05e0d4', 'GuestHouse', '2019-09-25 08:51:37', '2019-09-25 08:51:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kotas`
--

CREATE TABLE `kotas` (
  `kota_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kota` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `kode_kota` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kotas`
--

INSERT INTO `kotas` (`kota_id`, `nama_kota`, `slug`, `kode_kota`, `created_at`, `updated_at`, `deleted_at`) VALUES
('535fc2c0-df71-11e9-bab1-570b941cd3d4', 'Bandung', NULL, NULL, '2019-09-25 08:49:03', '2019-09-27 15:03:23', NULL),
('58936140-df71-11e9-b82f-d18f97996fa0', 'Jakarta', NULL, NULL, '2019-09-25 08:49:12', '2019-09-25 08:49:12', NULL),
('5d733300-df71-11e9-a8f4-8f73b44014fb', 'Bogor', NULL, NULL, '2019-09-25 08:49:20', '2019-09-25 08:49:20', NULL),
('63abe750-df71-11e9-bc46-1fcc7fb14ad8', 'Palembang', NULL, NULL, '2019-09-25 08:49:30', '2019-09-27 14:54:41', NULL),
('6e9cc340-df71-11e9-a358-93201cd7c548', 'Tangerang', NULL, NULL, '2019-09-25 08:49:49', '2019-09-25 08:49:49', NULL),
('773ddae0-df71-11e9-9be5-6d54e2a3f7de', 'Depok', NULL, NULL, '2019-09-25 08:50:03', '2019-09-25 08:50:03', NULL),
('7b38a210-df71-11e9-8f6a-87f59d440993', 'Bekasi', NULL, NULL, '2019-09-25 08:50:10', '2019-09-25 08:50:10', NULL),
('f981c0a0-e13a-11e9-9f0e-3dbb3de35105', 'Surabaya', NULL, NULL, '2019-09-27 15:25:02', '2019-09-27 15:25:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kuliners`
--

CREATE TABLE `kuliners` (
  `kuliner_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kuliner` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `kota_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_operasional` time DEFAULT NULL,
  `waktu_bagian` enum('WIB','WIT','WITA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WIB',
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` enum('Publish','Reject','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuliners`
--

INSERT INTO `kuliners` (`kuliner_id`, `nama_kuliner`, `slug`, `kota_id`, `waktu_operasional`, `waktu_bagian`, `deskripsi`, `alamat`, `image`, `alt`, `is_approved`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
('8a4cffd0-e128-11e9-9ed4-95a01e3c18a4', 'Soto Mie Bogor', 'soto-mie-bogor', '5d733300-df71-11e9-a8f4-8f73b44014fb', NULL, 'WIB', '-', '-', 'Thumb-1569591378.jpeg', NULL, 'Pending', NULL, '2019-09-27 13:13:04', '2019-09-27 13:36:18', NULL);

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
(3, '2019_09_23_073031_create_kotas_table', 1),
(4, '2019_09_23_091953_create_tags_table', 1),
(5, '2019_09_23_092911_create_wisatas_table', 1),
(6, '2019_09_23_092936_create_detail_tags_table', 1),
(7, '2019_09_23_100243_create_kuliners_table', 1),
(8, '2019_09_23_101737_create_penginapans_table', 1),
(9, '2019_09_23_102833_create_jenis_penginapans_table', 1),
(10, '2019_09_23_103244_create_detail_penginapans_table', 1);

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
-- Table structure for table `penginapans`
--

CREATE TABLE `penginapans` (
  `penginapan_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penginapan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `kota_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_operasional` time DEFAULT NULL,
  `waktu_bagian` enum('WIB','WIT','WITA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WIB',
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` enum('Publish','Reject','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penginapans`
--

INSERT INTO `penginapans` (`penginapan_id`, `nama_penginapan`, `slug`, `kota_id`, `waktu_operasional`, `waktu_bagian`, `deskripsi`, `alamat`, `image`, `alt`, `is_approved`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1ebc84a0-e10d-11e9-b2b7-45b16d43156e', 'Hotel Aryaduta', 'hotel-aryaduta', '535fc2c0-df71-11e9-bab1-570b941cd3d4', NULL, 'WIB', '-', '-', 'Thumb-Penginapan1569578207.jpg', '-', 'Pending', NULL, '2019-09-27 09:56:47', '2019-09-27 10:04:35', '2019-09-27 10:04:35'),
('71de00a0-e111-11e9-a42f-992b8e2ff96c', 'Hotel Aryaduta', 'hotel-aryaduta', '535fc2c0-df71-11e9-bab1-570b941cd3d4', NULL, 'WIB', '-', '-', 'Thumb-1569581408.jpg', NULL, 'Pending', NULL, '2019-09-27 10:27:45', '2019-09-27 10:50:08', NULL),
('90b72eb0-e10d-11e9-96c0-39c1ad86fdf4', 'Hotel Sisingamaharaja', 'hotel-sisingamaharaja', '5d733300-df71-11e9-a8f4-8f73b44014fb', NULL, 'WIB', '-', '-', 'Thumb-Penginapan1569578399.jpg', '-', 'Pending', NULL, '2019-09-27 09:59:59', '2019-09-27 09:59:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_jenispenginapans`
--

CREATE TABLE `penginapan_jenispenginapans` (
  `penginapan_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_penginapan_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penginapan_jenispenginapans`
--

INSERT INTO `penginapan_jenispenginapans` (`penginapan_id`, `jenis_penginapan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('90b72eb0-e10d-11e9-96c0-39c1ad86fdf4', '9a721b20-df71-11e9-9f2d-4b5e72d0c754', '2019-09-27 09:59:59', '2019-09-27 09:59:59', NULL),
('90b72eb0-e10d-11e9-96c0-39c1ad86fdf4', '920a4ba0-df71-11e9-8810-1332c8914031', '2019-09-27 09:59:59', '2019-09-27 09:59:59', NULL),
('71de00a0-e111-11e9-a42f-992b8e2ff96c', '8946ee70-df71-11e9-985a-511574e38245', '2019-09-27 10:50:08', '2019-09-27 10:50:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `nama_tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
('59f92a00-e112-11e9-a100-fd9339d18893', 'TagBaru', '2019-09-27 10:34:14', '2019-09-27 10:34:14', NULL),
('59f9e5c0-e112-11e9-b53c-0f3e4e24f055', 'TesLagi', '2019-09-27 10:34:14', '2019-09-27 10:34:14', NULL),
('b1981ca0-e05b-11e9-b498-b3d164d3bcd0', 'Alam', '2019-09-26 12:46:43', '2019-09-26 12:46:43', NULL),
('b198bfc0-e05b-11e9-9337-7711eddc70bd', 'Olahraga', '2019-09-26 12:46:43', '2019-09-26 12:46:43', NULL),
('b5dbc5d0-e05a-11e9-bc4d-cf520b2660fb', 'Keluarga', '2019-09-26 12:39:41', '2019-09-26 12:39:41', NULL),
('b5dc8910-e05a-11e9-aed7-4b0b5dd3c4b6', 'Liburan', '2019-09-26 12:39:41', '2019-09-26 12:39:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('3cf8e810-df71-11e9-851d-4fbfb259af57', 'Administrator', 'admin@gmail.com', NULL, '$2y$10$4UlQPlCbYwaU88mHdu26HeSSmfYQv43vvTlY/PNzMuCBtD0TmitmS', 'UeJP2nnrKh8f4NLYI3GMfLRI0MkRp1t5G4RIypVW8j1NAXyKLZkdm5ko1mQk', '2019-09-25 08:48:25', '2019-09-25 08:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `wisatas`
--

CREATE TABLE `wisatas` (
  `wisata_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wisata` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci,
  `kota_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kontak` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_operasional` time DEFAULT NULL,
  `waktu_bagian` enum('WIB','WIT','WITA') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WIB',
  `website` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` enum('Publish','Reject','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisatas`
--

INSERT INTO `wisatas` (`wisata_id`, `nama_wisata`, `slug`, `kota_id`, `alamat`, `kontak`, `waktu_operasional`, `waktu_bagian`, `website`, `deskripsi`, `image`, `alt`, `is_approved`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
('59f88810-e112-11e9-a266-716ec9249a9d', 'Woro Woro', 'woro-woro', '63abe750-df71-11e9-bc46-1fcc7fb14ad8', '---', '---', '13:00:00', 'WIB', '---', '---', 'Thumb-1569580575.jpg', '---', 'Pending', NULL, '2019-09-27 10:34:14', '2019-09-27 10:36:16', NULL),
('b196b890-e05b-11e9-bb3b-ddb4c2a4d60b', 'Curug Cibaliung', 'curug-cibaliung', '5d733300-df71-11e9-a8f4-8f73b44014fb', 'Desa karang tengah ,Kecamatan Babakan Madang, sentul kabupaten Bogor', '-', '09:00:00', 'WIB', '-', '-', 'Thumb-1569512575.jpg', '-', 'Pending', NULL, '2019-09-26 12:46:43', '2019-09-26 15:42:55', NULL),
('b5daf070-e05a-11e9-8a00-d9879187fe03', 'Kampung Gajah', 'kampung-gajah', '535fc2c0-df71-11e9-bab1-570b941cd3d4', 'Jl. Sersan Bajuri KM. 3,8, Cihideung, Parongpong, Cihideung, Bandung Barat, Kabupaten Bandung Barat, Jawa Barat', '(022) 88884012', '09:00:00', 'WIB', 'http://www.kampunggajah.com/', 'Kampung Gajah Waterboom atau tepatnya Wonderland, sekilas kalau kita bayangkan dari namanya pasti gambaran yang pertama kali muncul di pikiran kita adalah sebuah tempat yang berisi banyak gajah. Tetapi kamu salah kalo berpikiran seperti itu, kenyataannya di kampung gajah ini sama sekali tidak ada gajah. Satupun tidak ada, hanya ada banyak patung gajah dilokasi wisata ini. kampung gajah ini merupakan taman bermain sekaligus didalamnya terdapat waterboom yang sangat cocok untuk rekreasi keluarga.\r\n\r\nBanyak hal yang dapat dilakukan di kampung gajah ini, mulai dari berenang, bermain air, mencoba berbagai macam wahana permainan, berwisata kuliner dan lain lain. Letak kampung gajah ini tidak jauh dari pusat kota bandung, menjadikannya sebagai salah satu tujuan favorit untuk berekreasi. Suasananya yang sejuk dan pemandangan alam yang indah menambah istimewa kampung gajah ini.', 'Thumb-1569501581.jpg', 'Kampung Gajah', 'Pending', NULL, '2019-09-26 12:39:41', '2019-09-26 13:00:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisata_tags`
--

CREATE TABLE `wisata_tags` (
  `tag_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wisata_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisata_tags`
--

INSERT INTO `wisata_tags` (`tag_id`, `wisata_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('b5dbc5d0-e05a-11e9-bc4d-cf520b2660fb', 'b5daf070-e05a-11e9-8a00-d9879187fe03', '2019-09-26 12:39:41', '2019-09-26 13:00:18', NULL),
('b5dc8910-e05a-11e9-aed7-4b0b5dd3c4b6', 'b5daf070-e05a-11e9-8a00-d9879187fe03', '2019-09-26 12:39:41', '2019-09-26 13:00:21', NULL),
('b5dbc5d0-e05a-11e9-bc4d-cf520b2660fb', 'b196b890-e05b-11e9-bb3b-ddb4c2a4d60b', '2019-09-26 15:42:55', '2019-09-26 15:42:55', NULL),
('b5dc8910-e05a-11e9-aed7-4b0b5dd3c4b6', 'b196b890-e05b-11e9-bb3b-ddb4c2a4d60b', '2019-09-26 15:42:55', '2019-09-26 15:42:55', NULL),
('59f92a00-e112-11e9-a100-fd9339d18893', '59f88810-e112-11e9-a266-716ec9249a9d', '2019-09-27 10:36:16', '2019-09-27 10:36:16', NULL),
('59f9e5c0-e112-11e9-b53c-0f3e4e24f055', '59f88810-e112-11e9-a266-716ec9249a9d', '2019-09-27 10:36:16', '2019-09-27 10:36:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_penginapans`
--
ALTER TABLE `jenis_penginapans`
  ADD PRIMARY KEY (`jenis_penginapan_id`);

--
-- Indexes for table `kotas`
--
ALTER TABLE `kotas`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `kuliners`
--
ALTER TABLE `kuliners`
  ADD PRIMARY KEY (`kuliner_id`),
  ADD KEY `kuliners_kota_id_foreign` (`kota_id`);

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
-- Indexes for table `penginapans`
--
ALTER TABLE `penginapans`
  ADD PRIMARY KEY (`penginapan_id`),
  ADD KEY `penginapans_kota_id_foreign` (`kota_id`);

--
-- Indexes for table `penginapan_jenispenginapans`
--
ALTER TABLE `penginapan_jenispenginapans`
  ADD KEY `detail_penginapans_penginapan_id_foreign` (`penginapan_id`),
  ADD KEY `detail_penginapans_jenis_penginapan_id_foreign` (`jenis_penginapan_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`wisata_id`),
  ADD KEY `wisatas_kota_id_foreign` (`kota_id`);

--
-- Indexes for table `wisata_tags`
--
ALTER TABLE `wisata_tags`
  ADD KEY `detail_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `detail_tags_wisata_id_foreign` (`wisata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuliners`
--
ALTER TABLE `kuliners`
  ADD CONSTRAINT `kuliners_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`kota_id`) ON DELETE CASCADE;

--
-- Constraints for table `penginapans`
--
ALTER TABLE `penginapans`
  ADD CONSTRAINT `penginapans_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`kota_id`) ON DELETE CASCADE;

--
-- Constraints for table `penginapan_jenispenginapans`
--
ALTER TABLE `penginapan_jenispenginapans`
  ADD CONSTRAINT `detail_penginapans_jenis_penginapan_id_foreign` FOREIGN KEY (`jenis_penginapan_id`) REFERENCES `jenis_penginapans` (`jenis_penginapan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_penginapans_penginapan_id_foreign` FOREIGN KEY (`penginapan_id`) REFERENCES `penginapans` (`penginapan_id`) ON DELETE CASCADE;

--
-- Constraints for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD CONSTRAINT `wisatas_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`kota_id`) ON DELETE CASCADE;

--
-- Constraints for table `wisata_tags`
--
ALTER TABLE `wisata_tags`
  ADD CONSTRAINT `detail_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_tags_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`wisata_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
