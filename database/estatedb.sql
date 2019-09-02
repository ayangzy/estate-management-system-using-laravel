-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 08:29 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estatedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `body` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `estate_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'this is my first comment', '2019-08-24 20:49:52', '2019-08-24 20:49:52'),
(4, 3, 3, 'this apartment is affordable', '2019-08-30 05:08:15', '2019-08-30 05:14:28'),
(5, 3, 2, 'this apartment is cool', '2019-08-30 05:08:47', '2019-08-30 05:03:47'),
(8, 4, 3, 'this is affordable', '2019-08-30 05:41:21', '2019-08-30 05:41:21'),
(9, 3, 3, 'wow love this bro', '2019-08-30 04:51:13', '2019-08-30 04:51:13'),
(10, 3, 3, 'testing comments', '2019-08-30 05:20:52', '2019-08-30 05:20:52'),
(11, 3, 2, 'cheap and affordable', '2019-08-30 05:29:42', '2019-08-30 05:29:42'),
(12, 3, 2, 'cheap and affordable', '2019-08-30 05:30:17', '2019-08-30 05:30:17'),
(13, 3, 2, 'cheap and affordable', '2019-08-30 05:33:32', '2019-08-30 05:33:32'),
(14, 5, 2, 'Nice apartment', '2019-08-30 05:20:30', '2019-08-30 05:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartmentname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `user_id`, `apartmentname`, `price`, `location`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(1, '1', 'Shama apartment', 80000, 'Welfare Quarters makurdi', 'Good toilet facilities, single room self con, stable electricity, constant water supply', 'uploads/images/1567145605house12.jpg', '2019-08-24 20:33:20', '2019-08-30 05:13:25'),
(3, '1', 'Dooter apartment', 55000, 'located at pilla village UAM gate', 'Single room', 'uploads/images/1567144684house1.jpg', '2019-08-24 20:39:54', '2019-08-30 04:58:04'),
(4, '1', 'Eze Apartment', 90000, 'Federal Housing lowcost Estate NorthBank', 'Single Room self contain, constant water supply, stable electricity, showers in bath room, kitchen cabinate, tiles', 'uploads/images/1567144654house3.jpg', '2019-08-30 04:57:34', '2019-08-30 04:57:34'),
(5, '1', 'shima apartment', 12000, 'north bank', 'dublex', 'uploads/images/1567145537house11.jpg', '2019-08-30 05:12:17', '2019-08-30 05:12:17');

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
(4, '2019_08_22_142029_create_companies_table', 1),
(5, '2019_08_24_213644_create_markers_table', 2),
(6, '2019_08_24_214318_create_houses_table', 3),
(10, '2014_10_12_000000_create_users_table', 4),
(11, '2014_10_12_100000_create_password_resets_table', 4),
(12, '2019_08_07_140927_create_estates_table', 4),
(13, '2019_08_24_213902_create_comments_table', 5);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ayange Felix', 'ayangefelix8@gmail.com', 'admin', NULL, '$2y$10$0/g4yJw69OrbT7sqwyaQ7uBfNeN/EV1RkdAB10LmKO1q3xiQXsnKO', NULL, '2019-08-24 20:32:46', '2019-08-24 20:32:46'),
(2, 'Atekombo Fater', 'logicfatee360@gmail.com', 'admin', NULL, '$2y$10$lxd4V0LY3sENGdTJrst53.Jxp7FucnxJ7nDinF7QVX/o.wtGHXL/S', NULL, '2019-08-24 20:32:46', '2019-08-24 20:32:46'),
(3, 'Ikyulen Samuel', 'ikyulensamuel@gmail.com', 'user', NULL, '$2y$10$PfAUiMN5Q6Jb4rZVGgUWA.krw7xsaSzrdcilhdSjqJ2rYZiPjhmVS', NULL, '2019-08-24 20:32:47', '2019-08-24 20:32:47'),
(4, 'Itodo Peter', 'peter33@gmail.com', 'user', NULL, '$2y$10$kTai43C8wIe/HumddO8wS.uHOY9XtN9Erw5.5nQaQJBqkoaK4emaO', NULL, '2019-08-30 05:10:18', '2019-08-30 05:10:18'),
(5, 'Shiwua isreal', 'isrealshiwua@gmail.com', 'user', NULL, '$2y$10$Do5QtQLT9Go9/0jUTSURb.g/3cU0szevk4W4Z9CGh8APf7MbfnBBa', NULL, '2019-08-30 05:20:06', '2019-08-30 05:20:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
