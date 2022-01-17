-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 06:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scissors_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `text_1`, `text_2`, `text_3`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider.jpg', '2022-01-14 02:46:25', '2022-01-14 02:46:25'),
(3, 'Banner 1', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider.jpg', '2022-01-14 02:56:34', '2022-01-14 02:56:34'),
(4, 'Banner 1', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider.jpg', '2022-01-14 02:57:29', '2022-01-14 02:57:29'),
(5, 'Banner 1', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider.jpg', '2022-01-14 02:57:47', '2022-01-14 02:57:47'),
(6, 'Banner 1', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider.jpg', '2022-01-14 02:58:42', '2022-01-14 02:58:42'),
(7, 'Banner 2', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider2.jpg', '2022-01-14 03:00:26', '2022-01-14 03:00:26'),
(8, 'Banner 2', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider2.jpg', '2022-01-14 03:01:12', '2022-01-14 03:01:12'),
(9, 'Banner 2', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider2.jpg', '2022-01-14 03:01:55', '2022-01-14 03:01:55'),
(10, 'Banner 2', 'Welcome to', 'Beauty Salon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor et blanditiis possimus voluptatibus quibusdam. Mollitia, animi quidem nemo eaque nulla maiores harum at qui eligendi, soluta dolorum, vitae magnam placeat.', 'active', 'slider2.jpg', '2022-01-14 03:10:33', '2022-01-14 03:10:33');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_12_120522_create_settings_table', 2),
(6, '2022_01_13_093525_create_banners_table', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'salon_logo.png', 'info@example.com', '770-123-4567', '123 Lorem Ipsum, 32 sit Atlanta', '2022-01-13 05:22:17', '2022-01-13 02:24:09');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@test.com', NULL, '$2y$10$n3bvLLL3nvP/YIKOpKVeb.nnO2JzHL0EnrCuZmoY1dbd/BcSQwjuS', NULL, '2022-01-12 05:24:29', '2022-01-12 05:24:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
