-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 27, 2024 at 10:37 AM
-- Server version: 5.7.44
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'BMW', '2024-12-27 02:26:39', '2024-12-27 02:27:01'),
(6, 'HONDA', '2024-12-27 02:29:16', '2024-12-27 02:29:16'),
(7, 'TOYOTA', '2024-12-27 02:29:22', '2024-12-27 02:29:22'),
(8, 'MITSUBISHI', '2024-12-27 02:29:29', '2024-12-27 02:29:29'),
(9, 'KAWASAKI', '2024-12-27 02:37:53', '2024-12-27 02:37:53'),
(10, 'HONDA', '2024-12-27 02:43:22', '2024-12-27 02:43:22'),
(11, 'YAMAHA', '2024-12-27 02:49:10', '2024-12-27 02:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transmission` enum('manual','automatic') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` date NOT NULL,
  `year` year(4) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometers` int(11) NOT NULL,
  `registration_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc_engine` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sold` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `model_id`, `name`, `plate_number`, `transmission`, `tax`, `exp_date`, `year`, `color`, `kilometers`, `registration_area`, `cc_engine`, `image`, `price`, `is_sold`, `description`, `created_at`, `updated_at`) VALUES
(22, 2, 'BMW F30 320i 2016', 'B 1572 DEA', 'automatic', '10000000', '2025-02-18', '2016', 'Hitam', 35000, 'Bandung', 20000, 'cars/jQJhHL6bC192eYoSGkOLS9DtfUwBiIBWqyYqi4MY.jpg', '300000000', 0, 'Bmw F30 320i 2016\r\nWarna hitam \r\nKm 35rb\r\nPlat D Bandung\r\nPajak On\r\nMulus luar dalam', '2024-12-27 02:28:46', '2024-12-27 02:28:46'),
(24, 5, 'Toyota Fortuner 2020', 'B 1572 DEA', 'automatic', '10000000', '2024-12-23', '2020', 'Silver', 50000, 'Bandung', 2400, 'cars/sJ2nguJOiZvuqUonKsr4C41qwm5YwweXu0gygnJA.jpg', '300000000', 0, 'Toyota Fortuner 2020\r\nWarna Silver\r\nKm 50rb\r\nPlat D Kota Bandung\r\nPajak Off\r\nMulus luar dalam', '2024-12-27 02:35:05', '2024-12-27 02:35:05'),
(25, 6, 'Honda Civic 2024', 'D 2000 AFF', 'automatic', '15000000', '2025-06-24', '2024', 'Putih', 20000, 'Bandung', 2000, 'cars/ykxq4gFGgQ3EsCpP8ld0ksQJK8WA7vOygGMXBUZn.jpg', '350000000', 0, 'Honda Civic 2024\r\nWarna Putih\r\nKm 20rb\r\nPlat D Bandung\r\nPajak On\r\nMulus luar dalam', '2024-12-27 02:37:19', '2024-12-27 02:37:19'),
(26, 7, 'Kawasaki ZX25R 2023', 'D 2525 DES', 'manual', '1000000', '2024-12-17', '2023', 'Hijau', 5000, 'Bandung', 250, 'cars/g2nJGYzOB02UDEZMgJFAAfWpysc7IgaPSBQ3LIhQ.jpg', '110000000', 0, 'Kawasaki ZX25R ABS 2023\r\nWarna hijau\r\nKm 5rb\r\nPlat D Bandung\r\nPajak Off\r\nMulus luar dalam', '2024-12-27 02:40:00', '2024-12-27 02:40:00'),
(27, 8, 'HONDA PCX 2021', 'A 5 BBB', 'automatic', '900000', '2025-06-17', '2021', 'ABU', 15000, 'Banten', 150, 'cars/xlg0W0JxCksg4uUwh0onTVEFuOMOLLODw3DOUQ7i.webp', '21000000', 0, 'Honda Pcx 2021\r\nWarna Abu\r\nKm 15k \r\nPlat A Banten\r\nPajak On\r\nMulus luar dalam', '2024-12-27 02:46:51', '2024-12-27 02:46:51'),
(28, 10, 'Yamaha Xmax', 'D 2000 AFF', 'automatic', '900000', '2025-06-09', '2018', 'Hitam', 8000, 'Bandung', 250, 'cars/ArNSw6F11tHdNYEX3YhQsxTZfzGj499t6I8mNp6V.jpg', '42000000', 0, 'Yamaha Xmax 2018\r\nWarna hitam \r\nKm 8rb\r\nPlat D Bandung\r\nPajak On\r\nMulus luar dalam', '2024-12-27 02:48:48', '2024-12-27 02:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_28_064534_create_brands_table', 1),
(5, '2024_11_28_064540_create_models_table', 1),
(6, '2024_11_28_074409_create_cars_table', 1),
(7, '2024_11_28_084818_create_sale_histories_table', 1),
(8, '2024_11_29_155814_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(2, 5, '01', 'SEDAN', '2024-12-27 02:27:15', '2024-12-27 02:27:15'),
(5, 7, '04', 'SUV', '2024-12-27 02:33:00', '2024-12-27 02:33:00'),
(6, 6, '03', 'SEDAN', '2024-12-27 02:35:43', '2024-12-27 02:35:43'),
(7, 9, '001', 'SPORTBIKE', '2024-12-27 02:38:11', '2024-12-27 02:38:11'),
(8, 6, '002', 'MATIC BIKE', '2024-12-27 02:43:47', '2024-12-27 02:43:47'),
(10, 11, '003', 'MATIC BIKE', '2024-12-27 02:49:22', '2024-12-27 02:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_histories`
--

CREATE TABLE `sale_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','success','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_histories`
--

INSERT INTO `sale_histories` (`id`, `car_id`, `user_id`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(10, 22, 1, '087722669921', 'success', '2024-12-27 02:52:58', '2024-12-27 02:53:19'),
(11, 22, 4, '087722669921', 'success', '2024-12-27 02:54:23', '2024-12-27 02:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ognPxaRDzFkZc4sf9Txq8CLXnY8PQnhdIkNWKHYZ', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFdwaHVDMVdpWVdDWGZWU2NmR0tRMVF3MUZ1OTVTWmRyc2ZZZzZraCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zYWxlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1735293389),
('xRbiyX0HQTbVBWe5we8uRV2e4KgG9D1k30r4uJ5k', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaXRCOXhhRlh5eGdVZGhadWhsSnZwaUYxa3p5dmFjYmV0NUVReExLSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jYXJzLzUvZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1735285508),
('ZbGcnet3zoYMNO4QjuO95dmHPO5UZjPdNskxNSJL', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidXRRSkEwblU0WEdXeHN3WE5iemJhNFBMRVJUSXdPTmR1VmI5aXQzMyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ291dCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDEvYWRtaW4vdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1735293293);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sale_history_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `sale_history_id`, `order_id`, `payment_type`, `gross_amount`, `payment_status`, `transaction_id`, `status_code`, `status_message`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '676e78faa7f61', 'payment-gateway', 300000000, 'settlement', NULL, '200', NULL, '2024-12-27 02:52:58', '2024-12-27 02:53:19'),
(2, 4, 11, '676e794f70a8b', 'payment-gateway', 300000000, 'settlement', NULL, '200', NULL, '2024-12-27 02:54:23', '2024-12-27 02:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '2024-12-19 00:05:15', '$2y$12$v.MDvGjnZXFUitY3EUaBiuE2nC7edq9ZD9liwsnb1txMwbMo4rwHu', 'admin', 'IiDA5ao3rdweXeqJiK9mvNivGQBywf13PAro6Xeg0X0HWIlx0Lmz12ME29PG', '2024-12-19 00:05:15', '2024-12-19 00:05:15'),
(2, 'Agus', 'agus@gmail.com', '2024-12-19 00:05:16', '$2y$12$Ecx3qDEIODCYak3dXDJ2VOyHoKGoT2lcqq5bUO1ccCDkCRTdsOwtG', 'user', '78uXln9h7q', '2024-12-19 00:05:16', '2024-12-19 00:05:16'),
(3, 'adit', 'adit@gmail.com', NULL, '$2y$12$CNr9.OOxywZrhJ.its3OI.MtlQWQYCZT7rTyXHLFsxRhPSGwkdile', 'user', NULL, '2024-12-19 00:10:50', '2024-12-19 00:10:50'),
(4, 'bintang', 'bintangbintal@gmail.com', NULL, '$2y$12$HqE5xam2mWSMJLkUbYbc9.l67pZBEWuC9jsd.NgHOfXxYvsp1m5Nq', 'user', NULL, '2024-12-23 03:12:49', '2024-12-23 03:12:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_model_id_foreign` (`model_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `models_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sale_histories`
--
ALTER TABLE `sale_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_histories_car_id_foreign` (`car_id`),
  ADD KEY `sale_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_sale_history_id_foreign` (`sale_history_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sale_histories`
--
ALTER TABLE `sale_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_histories`
--
ALTER TABLE `sale_histories`
  ADD CONSTRAINT `sale_histories_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_sale_history_id_foreign` FOREIGN KEY (`sale_history_id`) REFERENCES `sale_histories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
