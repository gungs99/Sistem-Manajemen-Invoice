-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almajara_smi_nospk`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
('a094def4-d587-489e-be7a-990b8e5a9179', 'agungarya@gmail.com', 'zaky mukarim', '123', 'asfaa', '2020-03-21 12:58:58', '2020-03-23 03:04:38'),
('c0e533b6-e1b1-464f-882b-af4174e1b062', 'agungaryaadinugraha@gmail.com', 'Agung Arya', '0885299888888', 'Jakarta', '2020-03-20 06:59:36', '2020-03-20 06:59:36'),
('db061d30-11ff-48ca-8274-53c28145cdae', 'lintasrata@litasarta.co.id', 'PT Aplikanusa Lintasarta', '0401', 'Menara Thamrin, Lt. 12 MH. Thamrin Blok 3\r\nKampung Bali, Tanah Abang, Jakarta Pusat 10250', '2020-03-28 04:05:21', '2020-03-29 03:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
('46fdb363-6d80-42f6-a72b-4e03f660b48a', 'Fiber Optic', 2000, '2020-03-23 10:17:41', '2020-03-30 10:29:14'),
('875ea979-8229-4cfb-b9c0-eb2e9ae72ac1', 'Maintenance', 1000000, '2020-04-11 07:39:19', '2020-04-11 07:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `no_id`, `email`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
('cbc93ca7-fd75-4a06-8919-fb256f392fd5', '123123', 'abdul@almajara.co.id', 'abdul latif', '085299812345', 'Bandung', '2020-04-19 05:24:46', '2020-04-19 05:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
('7a7d2a0c-0289-4142-8229-6445bf3cadd1', 'Router', 1000000, '2020-04-11 02:08:26', '2020-04-11 02:08:26'),
('f8821fc7-1ce9-4cf7-9a11-ec0e30c3def8', 'Anthena Cisco', 5000000, '2020-03-30 10:30:58', '2020-03-30 10:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_16_143831_create_table_jasa_', 2),
(5, '2020_03_20_121631_table_customer', 3),
(6, '2020_03_20_161230_status_pengerjaan', 4),
(7, '2020_03_20_175240_alter_status', 5),
(8, '2020_03_21_063735_table_status_pembayaran', 6),
(9, '2020_03_21_083016_create_table_transaksi', 7),
(10, '2020_03_28_160314_created_nama_usaha', 8),
(11, '2020_03_28_173402_alter_nama_perusahaan', 9),
(12, '2020_03_28_183229_alter_nama_perusahaan_i_i', 10),
(13, '2020_03_28_184454_alter_nama_perusahaan_i_i_i', 11),
(14, '2020_03_28_190404_alter_nama_perusahaan_i_v', 12),
(15, '2020_03_28_191647_alter_nama_perusahaan_v', 13),
(16, '2020_03_29_101737_alter_status_pembayaran', 14),
(17, '2020_03_29_132816_alter_table_users', 15),
(18, '2020_03_30_153140_alter_nama_perusahaan_vi', 16),
(19, '2020_03_30_154719_alter_table_transaksi', 17),
(20, '2020_03_30_164703_create__table__material', 18),
(21, '2020_03_30_173922_alter_table_transaksi_i_i', 19),
(23, '2020_03_30_190523_alter_table_transaksi_i_i_i', 20),
(24, '2020_03_31_141156_ater_table_transaksi_i_v', 21),
(25, '2020_04_01_184644_a_lter_table_user', 21),
(26, '2020_04_07_130631_transaksi_line', 21),
(27, '2020_04_07_131348_alter_transaksi_line', 21),
(28, '2020_04_10_124935_alter_transaksi_line2', 21),
(29, '2020_04_19_115035_create_table_karyawan', 22),
(30, '2020_04_20_085807_alter__table__transaksi__add__nospk', 23);

-- --------------------------------------------------------

--
-- Table structure for table `nama_perusahaan`
--

CREATE TABLE `nama_perusahaan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_direktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_npwp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_cabang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_rek` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nama_perusahaan`
--

INSERT INTO `nama_perusahaan` (`id`, `nama`, `alamat`, `no_invoice`, `nama_web`, `nama_direktur`, `no_npwp`, `kontak`, `email_pembayaran`, `nama_cabang`, `nama_rek`, `No_rek`, `created_at`, `updated_at`) VALUES
('64a45245-9649-4687-9a7e-fdb2ee6b4ce1', 'PT Almajara Indo Tama', 'Kawasan komersial Cilandak Gudang NO.410 Jln.Raya Cilndak KKO Cilandak Timur Jakarta Selatan 12560,Indonesia', 'INV/123/AL/2020', 'Website : PT Almajara Indotama', 'MUSTADI', 'Npwp : 85.250.981.9-017.000', 'Telepon : 082112088706', 'mustadi@almajara.co.id', 'KCP Jakarta Ragunan', 'PT ALMAJARA INDO TAMA', '127-00-0988745-4', '2020-03-30 08:36:54', '2020-03-30 08:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
('6d4b97b3-3795-4681-b8be-8f29e8826d43', 'Belum Bayar', 1, '2020-03-29 03:33:47', '2020-03-29 03:33:47'),
('bc77223a-1c73-4462-b7f5-cbb87e527929', 'Kredit', 2, '2020-03-29 03:34:02', '2020-03-29 03:34:02'),
('c3706f2d-aff3-4303-8eb8-fd666845306a', 'Selesai', 4, '2020-03-21 12:44:00', '2020-04-13 21:22:31'),
('c4ac5dc2-cd78-4655-aac5-25725d8e4b3d', 'Hampir Lunas', 3, '2020-03-29 03:34:16', '2020-03-29 03:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengerjaan`
--

CREATE TABLE `status_pengerjaan` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_pengerjaan`
--

INSERT INTO `status_pengerjaan` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
('5498b4fa-70a6-4da7-a6ee-1bd90a1153e0', 'Belum Selesai', 1, '2020-03-28 06:25:47', '2020-03-28 06:25:47'),
('7dbefcac-f172-474b-95ba-08203a2d1058', 'Hampir Selesai', 3, '2020-03-28 06:26:17', '2020-03-28 06:26:17'),
('bc6ae38c-f6b8-4498-9b5e-17ea78393acd', 'Dikerjakan', 2, '2020-03-28 06:26:02', '2020-03-28 06:26:02'),
('e37beb8f-6472-4022-a5d8-e9ccd725a328', 'Selesai', 4, '2020-03-21 12:43:41', '2020-03-23 04:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `table_transaksi`
--

CREATE TABLE `table_transaksi` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_spk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `status_pengerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_transaksi`
--

INSERT INTO `table_transaksi` (`id`, `no_spk`, `no_invoice`, `customer`, `grand_total`, `ppn`, `status_pengerjaan`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
('06d5f0ff-17a7-4b30-a15c-5ced4c885ce0', '19036/05/AIT/INV/2019', '19036/05/AIT/INV/2020', 'db061d30-11ff-48ca-8274-53c28145cdae', 5502200, 500200, 'bc6ae38c-f6b8-4498-9b5e-17ea78393acd', 'c4ac5dc2-cd78-4655-aac5-25725d8e4b3d', '2020-04-20 02:09:45', '2020-04-20 02:09:45'),
('1ecb51e2-2c16-4b39-83c7-ad1dcafba0e0', '19036/05/AIT/INV/2019', '19036/05/AIT/INV/2017', 'c0e533b6-e1b1-464f-882b-af4174e1b062', 6600000, 600000, 'e37beb8f-6472-4022-a5d8-e9ccd725a328', 'c3706f2d-aff3-4303-8eb8-fd666845306a', '2020-04-20 02:11:38', '2020-04-20 02:11:38'),
('23fcff8d-07af-49e9-805c-4a8b368b1ec6', '19036/05/AIT/INV/2019', 'INV/123/AL/2020', 'a094def4-d587-489e-be7a-990b8e5a9179', 1102200, 100200, 'e37beb8f-6472-4022-a5d8-e9ccd725a328', 'c3706f2d-aff3-4303-8eb8-fd666845306a', '2020-04-20 02:12:12', '2020-04-20 02:12:12'),
('ee017bb6-4a11-4d77-b728-8e30ac3c0b8d', '19036/05/AIT/INV/2019', '19036/05/AIT/INV/2017', 'db061d30-11ff-48ca-8274-53c28145cdae', 7702200, 700200, 'e37beb8f-6472-4022-a5d8-e9ccd725a328', 'c4ac5dc2-cd78-4655-aac5-25725d8e4b3d', '2020-04-20 02:11:24', '2020-04-20 02:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `table_transaksi_line`
--

CREATE TABLE `table_transaksi_line` (
  `id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jasa` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_harga` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_transaksi_line`
--

INSERT INTO `table_transaksi_line` (`id`, `header`, `jasa`, `created_at`, `updated_at`, `jumlah`, `harga`, `satuan`, `grand_total`, `deskripsi`, `material`, `material_harga`, `ppn`) VALUES
('09e0eab8-8cd7-4fb8-93b9-c09a2ebb095c', '06d5f0ff-17a7-4b30-a15c-5ced4c885ce0', '46fdb363-6d80-42f6-a72b-4e03f660b48a', '2020-04-20 02:09:45', '2020-04-20 02:09:45', 1, 2000, 'Paket', 5002000, 'aada', 'f8821fc7-1ce9-4cf7-9a11-ec0e30c3def8', 5000000, NULL),
('0bcaffbc-619b-41f1-a432-61adc2e725e7', '23fcff8d-07af-49e9-805c-4a8b368b1ec6', '46fdb363-6d80-42f6-a72b-4e03f660b48a', '2020-04-20 02:12:12', '2020-04-20 02:12:12', 1, 2000, 'Paket', 1002000, 'desc123', '7a7d2a0c-0289-4142-8229-6445bf3cadd1', 1000000, NULL),
('441b3d3a-783d-4f4e-97cc-9bbaa412c4ec', '1ecb51e2-2c16-4b39-83c7-ad1dcafba0e0', '875ea979-8229-4cfb-b9c0-eb2e9ae72ac1', '2020-04-20 02:11:38', '2020-04-20 02:11:38', 1, 1000000, 'Paket', 6000000, 'tresxcfd', 'f8821fc7-1ce9-4cf7-9a11-ec0e30c3def8', 5000000, NULL),
('5672d6af-0e39-4c8e-abd6-ab06b2dcba99', 'ee017bb6-4a11-4d77-b728-8e30ac3c0b8d', '875ea979-8229-4cfb-b9c0-eb2e9ae72ac1', '2020-04-20 02:11:24', '2020-04-20 02:11:24', 1, 1000000, 'Paket', 2000000, 'desc2', '7a7d2a0c-0289-4142-8229-6445bf3cadd1', 1000000, NULL),
('fec1c300-abfa-47ce-9aeb-21243edbd183', 'ee017bb6-4a11-4d77-b728-8e30ac3c0b8d', '46fdb363-6d80-42f6-a72b-4e03f660b48a', '2020-04-20 02:11:24', '2020-04-20 02:11:24', 1, 2000, 'Paket', 5002000, 'desc1', 'f8821fc7-1ce9-4cf7-9a11-ec0e30c3def8', 5000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(11, 1, 'Mustadi', 'mustadi@almajara.co.id', NULL, '$2y$10$qNfsn.37lH987waZicgcLOuKl1n47uTy3yNdcREOWm0EySEV.LRnG', NULL, '2020-04-11 03:44:46', '2020-04-13 19:56:04', 'avatars/indoTama.png'),
(12, 2, 'Admin', 'admin@almajara.co.id', NULL, '$2y$10$nElnV4Si8ITTSmXKJBqSpOJ0WyTazwjKyehq5ddi4ICiJ97aHHdbK', NULL, '2020-04-11 03:46:54', '2020-04-13 19:58:40', 'avatars/alma1_burned.png'),
(19, 1, 'Agung Arya', 'agungaryaadinugraha@gmail.com', NULL, '$2y$10$o3s9WHx9ZQQ0JS4eVTsBfOdmlBjqEVP5rjcoADTH5/M65lXPZBg0a', NULL, '2020-04-18 07:31:39', '2020-04-18 07:33:38', 'avatars/4517210050_AGUNGARYA.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_perusahaan`
--
ALTER TABLE `nama_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pengerjaan`
--
ALTER TABLE `status_pengerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_transaksi_customer_foreign` (`customer`),
  ADD KEY `table_transaksi_status_pengerjaan_foreign` (`status_pengerjaan`),
  ADD KEY `table_transaksi_status_pembayaran_foreign` (`status_pembayaran`);

--
-- Indexes for table `table_transaksi_line`
--
ALTER TABLE `table_transaksi_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_transaksi_line_header_foreign` (`header`),
  ADD KEY `table_transaksi_line_jasa_foreign` (`jasa`),
  ADD KEY `table_transaksi_line_material_foreign` (`material`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_transaksi`
--
ALTER TABLE `table_transaksi`
  ADD CONSTRAINT `table_transaksi_customer_foreign` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `table_transaksi_status_pembayaran_foreign` FOREIGN KEY (`status_pembayaran`) REFERENCES `status_pembayaran` (`id`),
  ADD CONSTRAINT `table_transaksi_status_pengerjaan_foreign` FOREIGN KEY (`status_pengerjaan`) REFERENCES `status_pengerjaan` (`id`);

--
-- Constraints for table `table_transaksi_line`
--
ALTER TABLE `table_transaksi_line`
  ADD CONSTRAINT `table_transaksi_line_header_foreign` FOREIGN KEY (`header`) REFERENCES `table_transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_transaksi_line_jasa_foreign` FOREIGN KEY (`jasa`) REFERENCES `jasa` (`id`),
  ADD CONSTRAINT `table_transaksi_line_material_foreign` FOREIGN KEY (`material`) REFERENCES `material` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
