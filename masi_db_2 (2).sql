-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.51 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for masi_db
DROP DATABASE IF EXISTS `masi_db`;
CREATE DATABASE IF NOT EXISTS `masi_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `masi_db`;

-- Dumping structure for table masi_db.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.admins: ~0 rows (approximately)
REPLACE INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'Quản trị viên', 'admin@gmail.com', '$2y$12$MMy8C2eKs4gtIB7ZHIDF9OviJ1RVJHqlnFDTFWjeb3RdQSO40lsQ2', NULL, '', '2024-09-17 13:58:30', '2024-09-17 13:58:30');

-- Dumping structure for table masi_db.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.categories: ~10 rows (approximately)
REPLACE INTO `categories` (`id`, `parent_id`, `name`, `slug`, `icon`, `description`, `created_at`, `updated_at`, `type`) VALUES
	(2, NULL, 'Laptops', 'laptops', 'icon-laptops', 'All kinds of laptops', NULL, '2024-10-11 13:24:58', 'product-cate'),
	(3, NULL, 'Smartphones', 'smartphones', 'icon-smartphones', 'All kinds of smartphones', NULL, '2024-10-11 13:24:58', 'product-cate'),
	(4, 2, 'Gaming Laptops', 'gaming-laptops', 'icon-gaming-laptops', 'Laptops for gaming', NULL, NULL, 'product-cate'),
	(5, 2, 'Ultrabooks', 'ultrabooks', 'icon-ultrabooks', 'Lightweight laptops', NULL, NULL, 'product-cate'),
	(6, 3, 'Android Phones', 'android-phones', 'icon-android-phones', 'Smartphones with Android OS', NULL, NULL, 'product-cate'),
	(7, 3, 'iPhones', 'iphones', 'icon-iphones', 'Apple iPhones', NULL, NULL, 'product-cate'),
	(12, NULL, 'test', 'test2', 'http://masiweb.th/storage/photos/UET-logo-txt.png', 'test', '2024-10-03 14:52:13', '2024-10-11 13:27:34', 'product-cate'),
	(13, NULL, 'Danh mục 1', 'danh-muc-1', 'http://masiweb.th/storage/photos/UET-logo-txt.png', 'ko có j cả', '2024-10-10 02:55:41', '2024-10-10 02:55:41', 'post-cate'),
	(14, 13, 'Danh mục 2', 'danh-muc-2', 'http://masiweb.th/storage/photos/UET-logo-txt.png', 'ko có j cả', '2024-10-10 02:56:10', '2024-10-10 02:56:10', 'post-cate');

-- Dumping structure for table masi_db.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table masi_db.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.migrations: ~12 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2024_09_17_161043_create_sessions_table', 1),
	(7, '2024_09_17_163916_create_admins_table', 2),
	(8, '2024_09_20_043144_create_sizes_table', 3),
	(9, '2024_10_01_144530_create_categories_table', 4),
	(22, '2024_10_09_141226_create_seos_table', 5),
	(23, '2024_10_09_141227_create_posts_table', 5),
	(24, '2024_10_09_142153_create_news_table', 6);

-- Dumping structure for table masi_db.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_category_id_foreign` (`category_id`),
  KEY `news_post_id_foreign` (`post_id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `news_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.news: ~2 rows (approximately)
REPLACE INTO `news` (`id`, `title`, `category_id`, `post_id`, `slug`, `images`, `created_at`, `updated_at`) VALUES
	(4, 'Tổng hợp bài kiểm tra chương 5 kiến trúc máy tính', 13, 11, 'test', 'http://masiweb.th/storage/photos/background.jpg', '2024-10-11 13:17:11', '2024-10-11 13:17:11');

-- Dumping structure for table masi_db.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table masi_db.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table masi_db.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_seo_id_foreign` (`seo_id`),
  CONSTRAINT `posts_seo_id_foreign` FOREIGN KEY (`seo_id`) REFERENCES `seos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.posts: ~2 rows (approximately)
REPLACE INTO `posts` (`id`, `description`, `content`, `seo_id`, `created_at`, `updated_at`) VALUES
	(11, '<p>test</p>', '<p>test</p>', 23, '2024-10-11 13:17:11', '2024-10-11 13:17:11');

-- Dumping structure for table masi_db.seos
DROP TABLE IF EXISTS `seos`;
CREATE TABLE IF NOT EXISTS `seos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.seos: ~2 rows (approximately)
REPLACE INTO `seos` (`id`, `keyword`, `description`, `title`, `json`, `created_at`, `updated_at`) VALUES
	(5, 'test', '<p>test</p>', 'test', NULL, '2024-10-10 12:32:32', '2024-10-10 12:32:32'),
	(23, 'test', '<p>test</p>', 'test', NULL, '2024-10-11 13:17:11', '2024-10-11 13:17:11');

-- Dumping structure for table masi_db.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.sessions: ~2 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('U7GxixatZQDYrftvwkcBmrcqhsCxaAIa8v9ZplQ0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTjVFOFZpeUdlU0NuRnNaSGJYMDJQU0FkT080ZEJTT3hKVW5qRGlHaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMzoiaHR0cDovL21hc2l3ZWIudGgvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cDovL21hc2l3ZWIudGgvYWRtaW4vcG9zdF9tYW5hZ2VtZW50L2FjdGlvbi9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1728665034);

-- Dumping structure for table masi_db.sizes
DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.sizes: ~14 rows (approximately)
REPLACE INTO `sizes` (`id`, `name`, `weight`, `height`, `chest`, `description`, `created_at`, `updated_at`) VALUES
	(2, 'Medium', '1550kg', '1m50-1m60', '130cm', 'lorem lorem lorem', '2024-09-20 02:12:43', '2024-10-11 13:33:38'),
	(3, 'Large', '50kg', '1m60-1m70', '140cm', 'lorem lorem lorem', '2024-09-20 02:12:43', '2024-09-23 13:37:44'),
	(4, 'X-Large', '70kg', '1m70-1m80', '150cm', 'lorem lorem lorem', '2024-09-20 02:12:43', '2024-09-23 13:38:32'),
	(5, 'XX-Large', '80kg', '1m80-1m90', '160cm', 'lorem lorem lorem', '2024-09-20 02:12:43', '2024-09-20 02:12:43'),
	(6, 'Small', '40kg', '1m40-1m50', '120cm', 'lorem lorem lorem', '2024-09-21 12:27:11', '2024-09-21 12:27:11'),
	(7, 'Medium', '50kg', '1m50-1m60', '130cm', 'lorem lorem lorem', '2024-09-21 12:27:11', '2024-09-21 12:27:11'),
	(8, 'Large', '60kg', '1m60-1m70', '140cm', 'lorem lorem lorem', '2024-09-21 12:27:11', '2024-09-21 12:27:11'),
	(9, 'X-Large', '70kg', '1m70-1m80', '150cm', 'lorem lorem lorem', '2024-09-21 12:27:11', '2024-09-21 12:27:11'),
	(11, 'Small', '40kg', '1m40-1m50', '120cm', 'lorem lorem lorem', '2024-09-21 12:27:14', '2024-09-21 12:27:14'),
	(12, 'Medium', '50kg', '1m50-1m60', '130cm', 'lorem lorem lorem', '2024-09-21 12:27:14', '2024-09-21 12:27:14'),
	(13, 'Large', '60kg', '1m60-1m70', '140cm', 'lorem lorem lorem', '2024-09-21 12:27:14', '2024-09-21 12:27:14'),
	(14, 'X-Large', '70kg', '1m70-1m80', '150cm', 'lorem lorem lorem', '2024-09-21 12:27:14', '2024-09-21 12:27:14');

-- Dumping structure for table masi_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masi_db.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
