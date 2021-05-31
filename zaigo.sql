-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2021 at 04:22 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zaigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` smallint(5) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `image`, `address`, `zip_code`, `mobile`, `date`, `time`, `active_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@test.com', '$2y$10$hTlen7thnyzNhcDTTqiJ4upehto/Bi8kzBbnZA7DvTraxzAnMncIK', 'U', '1620965438.png', 'Test', '600001', '1234567890', '2021-05-14', '04:10:38', 1, NULL, '2021-05-12 18:30:00', '2021-05-13 22:44:43'),
(2, 'Admin', 'admin@test.com', '$2y$10$hTlen7thnyzNhcDTTqiJ4upehto/Bi8kzBbnZA7DvTraxzAnMncIK', 'A', '1620965412.png', 'Test', '600001', '1234567890', '2021-05-14', '04:10:12', 1, NULL, '2021-05-12 18:30:00', '2021-05-13 22:40:12'),
(3, 'vengat', 'vengat0691@gmail.com', '$2y$10$hTlen7thnyzNhcDTTqiJ4upehto/Bi8kzBbnZA7DvTraxzAnMncIK', 'U', '1620965458.png', '317/314', '603304', '9655757641', '2021-05-14', '04:10:58', 1, NULL, '2021-05-13 04:56:29', '2021-05-13 22:40:58'),
(4, 'test1', 'admin1@test.com', '$2y$10$hTlen7thnyzNhcDTTqiJ4upehto/Bi8kzBbnZA7DvTraxzAnMncIK', 'U', '1620965599.png', '317/314', '603304', '7397609437', '2021-05-14', '04:13:19', 0, NULL, '2021-05-13 22:43:19', '2021-05-13 22:44:52'),
(5, 'fego user6', 'vengat0691.91@gmail.com', '$2y$10$hTlen7thnyzNhcDTTqiJ4upehto/Bi8kzBbnZA7DvTraxzAnMncIK', 'U', NULL, '317/314', '603304', '9655757641', '2021-05-14', '04:14:37', 0, NULL, '2021-05-13 22:44:37', '2021-05-13 22:44:57'),
(6, 'vengat', 'vengat@gmail.com', '$2y$10$C9761TnHVB8iBEgOkuqEKOPR8uDDP0HykyrhavrxJEqeq6O0CjP/u', 'U', NULL, '317/314', '603304', '7397609437', '2021-05-14', '04:20:05', 1, NULL, '2021-05-13 22:50:05', '2021-05-13 22:50:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
