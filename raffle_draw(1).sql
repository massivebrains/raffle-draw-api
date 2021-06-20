-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2021 at 04:37 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raffle_draw`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `longcode` varchar(20) DEFAULT NULL,
  `gateway` varchar(60) DEFAULT NULL,
  `pay_with_bank` varchar(20) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `is_deleted` timestamp NULL DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `slug`, `code`, `longcode`, `gateway`, `pay_with_bank`, `active`, `is_deleted`, `country`, `logo`, `currency`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Access Bank', 'access-bank', '044', '044150149', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(2, 'Citibank Nigeria', 'citibank-nigeria', '023', '023150005', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(3, 'Diamond Bank', 'diamond-bank', '063', '063150162', 'emandate', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2018-12-14 07:54:19', NULL),
(4, 'Ecobank Nigeria', 'ecobank-nigeria', '050', '050150010', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(5, 'Enterprise Bank', 'enterprise-bank', '084', '084150015', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(6, 'Fidelity Bank', 'fidelity-bank', '070', '070150003', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(7, 'First Bank of Nigeria', 'first-bank-of-nigeria', '011', '011151003', 'emandate-disabled', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(8, 'First City Monument Bank', 'first-city-monument-bank', '214', '214150018', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(9, 'Guaranty Trust Bank', 'guaranty-trust-bank', '058', '058152036', 'ibank', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2018-12-18 05:55:45', NULL),
(10, 'Heritage Bank', 'heritage-bank', '030', '030159992', 'etz', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(11, 'Keystone Bank', 'keystone-bank', '082', '082150017', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(12, 'MainStreet Bank', 'mainstreet-bank', '014', '014150331', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(13, 'Polaris Bank', 'polaris-bank', '076', '076151006', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(14, 'Stanbic IBTC Bank', 'stanbic-ibtc-bank', '221', '221159522', 'etz', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(15, 'Standard Chartered Bank', 'standard-chartered-bank', '068', '068150015', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(16, 'Sterling Bank', 'sterling-bank', '232', '232150016', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2018-12-19 19:35:11', NULL),
(17, 'Union Bank of Nigeria', 'union-bank-of-nigeria', '032', '032080474', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2018-12-07 13:39:41', NULL),
(18, 'United Bank For Africa', 'united-bank-for-africa', '033', '033153513', 'emandate', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2018-12-03 10:35:01', NULL),
(19, 'Unity Bank', 'unity-bank', '215', '215154097', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(20, 'Wema Bank', 'wema-bank', '035', '035150103', '', '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(21, 'Zenith Bank', 'zenith-bank', '057', '057150013', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-07-14 07:04:29', '2016-07-14 07:04:29', NULL),
(22, 'Jaiz Bank', 'jaiz-bank', '301', '301080020', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-10-10 14:26:29', '2016-10-10 14:26:29', NULL),
(23, 'Suntrust Bank', 'suntrust-bank', '100', '', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2016-10-10 14:26:29', '2016-10-10 14:26:29', NULL),
(25, 'Providus Bank', 'providus-bank', '101', '', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2017-03-27 13:09:29', '2017-03-27 13:09:29', NULL),
(26, 'Parallex Bank', 'parallex-bank', '526', '', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2017-03-31 10:54:29', '2017-03-31 10:54:29', NULL),
(27, 'ALAT by WEMA', 'alat-by-wema', '035A', '035150103', 'emandate', '1', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2017-11-15 09:21:31', '2017-11-15 09:21:31', NULL),
(63, 'ASO Savings and Loans', 'aso-savings-and-loans', '401', '', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2018-09-23 02:52:38', '2018-09-23 02:52:38', NULL),
(64, 'Ekondo Microfinance Bank', 'ekondo-microfinance-bank', '562', '', NULL, '0', '1', NULL, 'Nigeria', NULL, 'NGN', 'nuban', '2018-09-23 02:55:06', '2018-09-23 02:55:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cron`
--

CREATE TABLE `cron` (
  `id` int NOT NULL,
  `val` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cron`
--

INSERT INTO `cron` (`id`, `val`, `created_at`, `updated_at`) VALUES
(1, 'aaa', '2021-06-17 06:53:10', NULL),
(2, 'aaa', '2021-06-17 06:53:38', NULL),
(3, 'aaa', '2021-06-17 06:53:40', NULL),
(4, 'aaa', '2021-06-17 06:53:42', NULL),
(5, 'aaa', '2021-06-17 06:55:05', NULL),
(6, 'aaa', '2021-06-17 06:55:13', NULL),
(7, 'aaa', '2021-06-17 06:55:16', NULL),
(8, 'aaa', '2021-06-17 06:55:44', NULL),
(9, 'this cron ran', '2021-06-17 07:59:46', '2021-06-17 07:59:46'),
(10, NULL, '2021-06-17 08:00:34', '2021-06-17 08:00:34'),
(11, NULL, '2021-06-17 08:20:17', '2021-06-17 08:20:17'),
(12, NULL, '2021-06-17 08:21:44', '2021-06-17 08:21:44'),
(13, NULL, '2021-06-17 09:12:52', '2021-06-17 09:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `draw_winners`
--

CREATE TABLE `draw_winners` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `ticket_id` int NOT NULL,
  `draw_index` int NOT NULL,
  `session_id` int NOT NULL,
  `package_id` int NOT NULL,
  `owner_id` int NOT NULL COMMENT 'ticket owner id',
  `drawn_by` int DEFAULT NULL COMMENT 'the admin / agent that performed this draw i.e that rolled the dice (assuming the drawn is system based and not manual)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `draw_winners`
--

INSERT INTO `draw_winners` (`id`, `uuid`, `ticket_id`, `draw_index`, `session_id`, `package_id`, `owner_id`, `drawn_by`, `created_at`, `updated_at`, `deleted_at`, `visibility`) VALUES
(1, '', 51, 1, 12, 1, 29, 29, '2021-06-13 04:37:31', '2021-06-16 04:38:21', NULL, '1'),
(2, '', 43, 1, 8, 1, 29, 29, '2021-06-13 08:39:34', NULL, NULL, '1'),
(3, '', 39, 1, 8, 1, 29, 29, '2021-06-13 08:44:09', NULL, NULL, '1'),
(4, '', 93, 1, 19, 1, 36, 36, '2021-06-14 15:47:18', NULL, NULL, '1'),
(5, '', 50, 1, 11, 1, 29, 36, '2021-06-14 15:48:08', NULL, NULL, '1'),
(6, '', 85, 1, 19, 1, 29, 36, '2021-06-14 20:51:15', NULL, NULL, '1'),
(7, '', 19, 1, 1, 1, 29, 36, '2021-06-14 20:53:16', NULL, NULL, '1'),
(8, '', 37, 1, 7, 1, 29, 36, '2021-06-14 20:55:24', NULL, NULL, '1'),
(9, '', 88, 1, 19, 1, 29, 36, '2021-06-14 20:57:28', NULL, NULL, '1'),
(10, '', 81, 1, 18, 1, 29, 36, '2021-06-15 08:00:22', NULL, NULL, '1'),
(11, 'ecbb5a228a734d21b40b7ac7787f8243', 78, 1, 17, 1, 29, 36, '2021-06-15 17:58:42', NULL, NULL, '1'),
(13, '21c8090e4d5943cf96368eae1e0e236b', 47, 1, 10, 1, 29, 36, '2021-06-19 13:43:25', NULL, NULL, '1'),
(15, 'b7adf2b88db446f38baf15be196339a4', 42, 1, 8, 1, 29, 36, '2021-06-19 13:54:29', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `game_session`
--

CREATE TABLE `game_session` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `package_id` int NOT NULL,
  `selected_winners` int NOT NULL DEFAULT '0' COMMENT 'current no of winning tickets selected/chosen in this session',
  `expected_winners` int NOT NULL,
  `package_sell_count` int DEFAULT '1' COMMENT 'a single ticket/package option purchase (wether bulk or not depending on package) is a game play',
  `last_sell_at` timestamp NULL DEFAULT NULL,
  `shuffle_count` int NOT NULL DEFAULT '0' COMMENT 'no of times admin performed a shuffle',
  `last_shuffled_at` timestamp NULL DEFAULT NULL,
  `last_drawn_at` timestamp NULL DEFAULT NULL COMMENT 'the last selection/pick/drawn/chose from the ticket pool',
  `is_currently_shuffled` enum('1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'if NULL, then the ticket pool must be shuffled before the next pick/ select is allowed',
  `expires_at` timestamp NULL DEFAULT NULL,
  `initiated_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `game_session`
--

INSERT INTO `game_session` (`id`, `uuid`, `package_id`, `selected_winners`, `expected_winners`, `package_sell_count`, `last_sell_at`, `shuffle_count`, `last_shuffled_at`, `last_drawn_at`, `is_currently_shuffled`, `expires_at`, `initiated_by`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'a62eff76d0eb498fbe703684fd0b9366', 1, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-11 00:00:00', 29, '2021-06-10 22:28:55', NULL, '2021-06-10 22:28:55'),
(2, '663d179ba0444172b5280a309b27b5f2', 13, 2, 0, 1, NULL, 10, '2021-06-12 21:15:04', '2021-06-13 04:37:31', '1', '2021-06-12 00:00:00', 29, '2021-06-11 09:02:28', NULL, '2021-06-13 04:37:31'),
(3, '03a3c76367c54f2daa8e0d917f9e91db', 13, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 00:00:00', 29, '2021-06-11 09:04:38', NULL, '2021-06-11 09:04:38'),
(4, 'f07300b9ce9242098132bde9fbc56741', 14, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 00:00:00', 29, '2021-06-11 09:06:31', NULL, '2021-06-11 09:06:31'),
(5, 'ebcee6528dc94c70993df4a554bb2254', 3, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 00:00:00', 29, '2021-06-11 09:09:25', NULL, '2021-06-11 09:09:25'),
(6, '988fe5df9c644bea84293cce25134dc5', 4, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 00:00:00', 29, '2021-06-11 09:14:53', NULL, '2021-06-11 09:14:53'),
(7, '03cd5e0248f941eabde9404607bf04e5', 6, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 00:00:00', 29, '2021-06-11 09:15:52', NULL, '2021-06-11 09:15:52'),
(8, '72b1585114e74943af304bebcd90a88c', 4, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 09:40:15', NULL, '2021-06-11 09:40:15'),
(9, 'e3be9f03b114437494c096dc4f3c103b', 7, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 09:42:22', NULL, '2021-06-11 09:42:22'),
(10, '2b2e48d5d8754bcb98e74f89c71eeee5', 3, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 09:48:51', NULL, '2021-06-11 09:48:51'),
(11, '0e0084f1fea841b98b9e9a1dbbc3ebe7', 7, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 10:49:01', NULL, '2021-06-11 10:49:01'),
(12, 'b73aa1de0d0a45b6b5571171b76289c1', 6, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 10:59:41', NULL, '2021-06-11 10:59:41'),
(13, '154a21f840e8423e8e70e6842db7622a', 6, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 10:00:44', NULL, '2021-06-11 10:00:44'),
(14, 'f456051e1b934f97858fc530b74fac56', 6, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 10:12:38', NULL, '2021-06-11 10:12:38'),
(15, '75bc5e02cfcb454290811ec6bf72da72', 4, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 11:13:23', NULL, '2021-06-11 11:13:23'),
(16, '49edce35f93d4d13972201230bc8cabb', 4, 0, 0, 1, NULL, 0, NULL, NULL, NULL, '2021-06-12 17:00:00', 29, '2021-06-11 10:33:33', NULL, '2021-06-11 10:33:33'),
(17, '8bdf2cba0edb4110b432da5809f0ce18', 3, 0, 0, 6, '2021-06-12 14:59:34', 0, NULL, NULL, NULL, '2021-06-12 16:00:00', 29, '2021-06-11 10:34:41', NULL, '2021-06-12 14:59:34'),
(18, '93f01b0abd7047cb9ab66f99d3a4979b', 1, 2, 2, 2, '2021-06-13 07:56:16', 15, '2021-06-13 08:44:04', '2021-06-13 08:44:09', NULL, '2021-06-13 16:00:00', 29, '2021-06-12 15:24:20', NULL, '2021-06-13 08:44:09'),
(19, 'a3f87ee2ba994e30ab6540927dc0fa58', 1, 2, 2, 7, '2021-06-15 07:55:37', 18, '2021-06-15 17:58:37', '2021-06-15 17:58:42', NULL, '2021-06-15 16:00:00', 29, '2021-06-14 03:10:17', NULL, '2021-06-15 17:58:42'),
(20, '9634b14ce37a462193063e93e46babf6', 1, 2, 2, 7, '2021-06-17 11:51:11', 2, '2021-06-19 13:53:42', '2021-06-19 13:54:29', NULL, '2021-06-18 16:00:00', 36, '2021-06-17 09:10:19', NULL, '2021-06-19 13:54:29'),
(21, '846640c79d9d432b852b66e415e34182', 1, 0, 2, 8, '2021-06-19 12:14:23', 0, NULL, NULL, NULL, '2021-06-20 16:00:00', 36, '2021-06-19 11:16:16', NULL, '2021-06-19 12:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('044d94511682d6d48000e763ee5e03a79103fc964713cabbaa466d55f87ac5c2394ed30189cecdc0', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:21:22', '2021-06-06 10:21:22', '2022-06-06 10:21:22'),
('1e94cfd33092c4db55d44817cdbd10be61cbb47ade682305d90fe34afb40d4c7236df44fda195289', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:17:29', '2021-06-06 10:17:29', '2022-06-06 10:17:29'),
('2020304fe71f4114bfaeb95de9065858c7067b2a9ced33755fc25ece827ab42f65fbe65bcb765469', 35, 35, NULL, '[\"user\"]', 0, '2021-06-09 09:46:42', '2021-06-09 09:46:42', '2022-06-09 09:46:42'),
('218de9fcc84c811c04a7edac0f658ee9a0bfc3227a12a2b12b5287cac65d1de1a2a428d21f6319c8', 14, 14, NULL, '[\"user\"]', 0, '2021-06-07 07:47:09', '2021-06-07 07:47:09', '2022-06-07 07:47:09'),
('2c613d92c7464eb85aa3ca9f3b3b5c14952c1c26f379385402dca5c1418ed2e849214e82de57ba72', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:06:24', '2021-06-06 10:06:24', '2022-06-06 10:06:24'),
('2d8da8d4a88b4e4567166b6c83e6138f2823de301121183a790f7443d75f8198debc37175009e5f9', 14, 14, NULL, '[\"user\"]', 1, '2021-06-07 07:46:58', '2021-06-07 07:46:58', '2022-06-07 07:46:58'),
('2d9b29ceb643d5e8fa45ac3bdd5dcd3e2ca7921428d3ea2894084aa6079ee3c44461b0a1e45f43a9', 13, 13, NULL, '[\"user\"]', 0, '2021-06-07 06:59:14', '2021-06-07 06:59:14', '2022-06-07 06:59:14'),
('2e9446c632b28b8ef6cceb818fce76299479914348498c15e9c1345da55d88989b9df3cffea631dd', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:16:46', '2021-06-06 10:16:46', '2022-06-06 10:16:46'),
('34120549e7a1c3ddf134676b04695089d93c147e6d1fdd7fd3644a64f5eb6e904497881b4c14e456', 34, 34, NULL, '[\"user\"]', 1, '2021-06-09 09:46:14', '2021-06-09 09:46:14', '2022-06-09 09:46:14'),
('40914a16ef029c072cda29bc71f5585efd4ec0aef6cda4f704637659fc6db49b74de1b723d0a1687', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 20:55:08', '2021-06-06 20:55:08', '2022-06-06 20:55:08'),
('41c0f50aee4e7fb5a88c38aa2ca6cf2628c0611008634085511656de3dd7ca5ea8bf5ad266dab4ff', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:20:14', '2021-06-06 10:20:14', '2022-06-06 10:20:14'),
('454bbd136a3090907eaf61eeb82262cee979b489d22d259d628e8acfcc4a8eb79a0ad420dcdc2e09', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 09:49:31', '2021-06-06 09:49:31', '2022-06-06 09:49:31'),
('464bdf45f9ef6162dd9b0911d00dad8df90dcc240aa55f97f95f3a4074f7dd8cd20fbd5ff9be5441', 36, 36, NULL, '[\"user\"]', 1, '2021-06-14 15:33:07', '2021-06-14 15:33:07', '2022-06-14 15:33:07'),
('48c38bb190ccf5e7d13b38e00e686417a6ad87b41a895b12e5d90da6b692dea2a56c61915c401a74', 19, 19, NULL, '[\"user\"]', 0, '2021-06-07 22:20:53', '2021-06-07 22:20:53', '2022-06-07 22:20:53'),
('49d8337191a9bfbde7058f35c1105e8199ccaab15dcb35c4ee9680d30a99f8a9255ea8afd4dfa8db', 29, 29, NULL, '[\"user\"]', 1, '2021-06-08 15:33:26', '2021-06-08 15:33:26', '2022-06-08 15:33:26'),
('500a03d37ff7ef72bb3ce8fa9c456e94c1a3b31bdb739c45f9d4488f24b679f58029bceb2d9616be', 29, 29, NULL, '[\"user\"]', 0, '2021-06-08 18:30:28', '2021-06-08 18:30:28', '2022-06-08 18:30:28'),
('5792623978b128bbdb40edeedaec8f7823cdf8860d7f4568441f41dfc94db5d5e121c939e5925421', 36, 36, NULL, '[\"user\"]', 0, '2021-06-19 11:15:53', '2021-06-19 11:15:53', '2022-06-19 11:15:53'),
('5ddd411a112929209e2d67074f91041e4b5873ad0a1ad22e9b1337d2456215bde47329b950fed568', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:05:31', '2021-06-06 10:05:31', '2022-06-06 10:05:31'),
('5f47a07639962e358404ce5877baf674a6e78524b7808a458bfc6dddbb1fcdc29924777c11b48555', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:21:04', '2021-06-06 10:21:04', '2022-06-06 10:21:04'),
('78fe42fb9c12eabc19d9d0ce23726a952185f00aea6127c9e846658e97b4b19b39aca33798498ff7', 34, 34, NULL, '[\"user\"]', 0, '2021-06-18 14:19:19', '2021-06-18 14:19:19', '2022-06-18 14:19:19'),
('7f4fdb7c3e79780b2f880a601dfa8941f2b673512c1dfcfd58c9f0987306bc905dfd4f63723f2a79', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 09:50:44', '2021-06-06 09:50:44', '2022-06-06 09:50:44'),
('9dbe5f09cf3296bb3f71d4a24077b4e8e69b526647bda1bb1d16863b3ba0c19ef9552c9f37f9826d', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:06:07', '2021-06-06 10:06:07', '2022-06-06 10:06:07'),
('a680f28d63b101c3b91bbb10725c18d6d4030cd6acce3f4b4ce79261c71878b0cb335f8f4faa8caa', 34, 34, NULL, '[\"user\"]', 1, '2021-06-09 14:28:57', '2021-06-09 14:28:57', '2022-06-09 14:28:57'),
('a698082da6b6384009046661c9b96420badb43f6cbc7094fbc25a4181470aefcb7024f5e6451f89e', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 20:39:48', '2021-06-06 20:39:48', '2022-06-06 20:39:48'),
('aa3229a3e3511adb8825396958b926eacb03361142ca39d728b36541353b27086b51930a6a1137d4', 36, 36, NULL, '[\"user\"]', 1, '2021-06-18 21:20:27', '2021-06-18 21:20:27', '2022-06-18 21:20:27'),
('ab4d4999267518f6b95c54b09051d213c4cd8b5c319f3121f0573289c0ec4373f7f0e4d3f00c72ca', 34, 34, NULL, '[\"user\"]', 1, '2021-06-09 14:26:04', '2021-06-09 14:26:04', '2022-06-09 14:26:04'),
('aefc75a0e73b1be2500f6e6576e2a9f4eb91719dd4977d6839b068c099a63e3608d63bb88a8f6792', 13, 13, NULL, '[\"user\"]', 1, '2021-06-05 23:25:39', '2021-06-05 23:25:39', '2022-06-05 23:25:39'),
('c56d048abb77111a276b809dfc511edc3cecb7e22b56699112d95c3e472df4be6eb800d70ffa334c', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 20:42:14', '2021-06-06 20:42:14', '2022-06-06 20:42:14'),
('ed7dddb189812dcd3ab2864ce9d3f9e496595c9e490c27d269d3b770da68e86491a2f059f126bd68', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:04:25', '2021-06-06 10:04:25', '2022-06-06 10:04:25'),
('f24ef3de2d6c31ab8ffa5b09132d3f90365e808f3d019ebb5e77128d9f256ee21b5fae7e5e4c596c', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:04:58', '2021-06-06 10:04:58', '2022-06-06 10:04:58'),
('f32c5e1b19781546e6e6f0ca96994546920abce8b76fa68b1a352bc6d31f99cad2737b8f8d715c03', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:10:41', '2021-06-06 10:10:41', '2022-06-06 10:10:41'),
('fac87e73d1ad07b8686c395b24d88367825ade2981ff294f2e68cc4981b71627fac2afd88dfc0fef', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:16:35', '2021-06-06 10:16:35', '2022-06-06 10:16:35'),
('fc2197fa9e08c9835957433f0d304c28d12c50962e9364aa91f3708b954e6ecc82fc00b59b282b6a', 13, 13, NULL, '[\"user\"]', 1, '2021-06-06 10:19:50', '2021-06-06 10:19:50', '2022-06-06 10:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 13, 'udorrr', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-05 23:25:24', '2021-06-05 23:25:24', NULL),
(14, 14, 'udorrrd', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-07 07:46:38', '2021-06-07 07:46:38', NULL),
(18, 18, 'udorrrdds', '3td3DMvhMpO6ffwJ8blq/9pDf6w5XrFYbfHkZAzKF5U=', NULL, '', 0, 1, 0, '2021-06-07 22:04:35', '2021-06-07 22:04:35', NULL),
(19, 19, 'udorrrddsf', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-07 22:20:39', '2021-06-07 22:20:39', NULL),
(20, 20, 'udorrrddsfs', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 09:21:28', '2021-06-08 09:21:28', NULL),
(22, 22, 'udorrrddsfss', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 09:52:13', '2021-06-08 09:52:13', NULL),
(24, 24, 'udorrrddsfsss', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 10:31:41', '2021-06-08 10:31:41', NULL),
(25, 25, 'udorrrddsfssse', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 14:19:52', '2021-06-08 14:19:52', NULL),
(26, 26, 'udorrrddsfssses', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 15:02:29', '2021-06-08 15:02:29', NULL),
(27, 27, 'udo', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 15:04:08', '2021-06-08 15:04:08', NULL),
(28, 28, 'udof', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-08 15:23:36', '2021-06-08 15:23:36', NULL),
(29, 29, 'udofa', '+eZuF5tnR65UEI+C+K3os8Jddv0wr95sOVgixTAZYWk=', NULL, '', 0, 1, 0, '2021-06-08 15:33:14', '2021-06-09 14:00:00', NULL),
(34, 34, 'udofaa', 'V8ccRcYjAdSXlQGrPsf5roWuteTPBCgm8wBgL9Ky6BU=', NULL, '', 0, 1, 0, '2021-06-09 09:39:41', '2021-06-09 14:28:38', NULL),
(35, 35, 'udofaat', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-09 09:46:31', '2021-06-09 09:46:31', NULL),
(36, 36, 'nwamuo', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-14 15:32:16', '2021-06-14 15:32:16', NULL),
(37, 39, 'udofaataaa', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-18 12:56:42', '2021-06-18 12:56:42', NULL),
(39, 41, 'Osuofia', 'ee6OuwROMfXslehyAtHGHK0UcDhHpe2v6C82AYdg+RU=', NULL, '', 0, 1, 0, '2021-06-19 10:20:25', '2021-06-19 10:20:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('18d73058b714a7808778213b115722e42be4d927770c77a0e50a661a51c07487981f9abcff053a50', '9dbe5f09cf3296bb3f71d4a24077b4e8e69b526647bda1bb1d16863b3ba0c19ef9552c9f37f9826d', 0, '2022-06-06 10:06:07'),
('22c2502081da462d61f21e0c9d790ffbee82c1c77ac3694c2cbc02d83e0057ef450deefdaa64bd44', '5f47a07639962e358404ce5877baf674a6e78524b7808a458bfc6dddbb1fcdc29924777c11b48555', 0, '2022-06-06 10:21:04'),
('371b02eb674b4067a2206fe3c04edc382e108ea565a4345acb66a7b3fd6f248482741e8eb3e6f135', '5792623978b128bbdb40edeedaec8f7823cdf8860d7f4568441f41dfc94db5d5e121c939e5925421', 0, '2022-06-19 11:15:53'),
('3a531e0aa77963b7e838133e570fd66a4620c2128dc4283f065f1960091e63e2a2f3fbd5acc536a3', '2d8da8d4a88b4e4567166b6c83e6138f2823de301121183a790f7443d75f8198debc37175009e5f9', 0, '2022-06-07 07:46:58'),
('426439ef7d0fd1a8f3432f54c01e1c94b2b4d8d667ae1f20d43f53ca88c38ce45ce8eeb67aec66be', '78fe42fb9c12eabc19d9d0ce23726a952185f00aea6127c9e846658e97b4b19b39aca33798498ff7', 0, '2022-06-18 14:19:19'),
('4436d3749880ca3f0aaa229c9ff7edc569e708ce065ec5c7bae2030c08973d27e12d8343a6860ec6', 'f32c5e1b19781546e6e6f0ca96994546920abce8b76fa68b1a352bc6d31f99cad2737b8f8d715c03', 0, '2022-06-06 10:10:41'),
('47638244d7f14c8ec59657abeb877f0d16271f3bbdc9690f739baab217a0a965f3f7aaf5bfd3b168', '218de9fcc84c811c04a7edac0f658ee9a0bfc3227a12a2b12b5287cac65d1de1a2a428d21f6319c8', 0, '2022-06-07 07:47:09'),
('4efdba53efa27ea4542ec64c59f58199fc11cb8fe82527b34b5cc4874763aff72aba97c4d560d03b', '49d8337191a9bfbde7058f35c1105e8199ccaab15dcb35c4ee9680d30a99f8a9255ea8afd4dfa8db', 0, '2022-06-08 15:33:26'),
('518da1ca945faeb9a909eacf9dc684e42bdf25fefc737fb82a9d315e3e21cf441ec1c1275cadd4a0', 'ed7dddb189812dcd3ab2864ce9d3f9e496595c9e490c27d269d3b770da68e86491a2f059f126bd68', 0, '2022-06-06 10:04:25'),
('5d425e6dac7d95d3cc0be60731d9a84526a6a50c4e3cb7dac369bbba2df2c60effad28e644944654', '2d9b29ceb643d5e8fa45ac3bdd5dcd3e2ca7921428d3ea2894084aa6079ee3c44461b0a1e45f43a9', 0, '2022-06-07 06:59:14'),
('60d75f7abbcc5f2cbd9d22e6e29cb3a46ebe56b6b2798e53efbf9d282237efdff064d1b94eaa72f1', '40914a16ef029c072cda29bc71f5585efd4ec0aef6cda4f704637659fc6db49b74de1b723d0a1687', 0, '2022-06-06 20:55:08'),
('67ff964a32c0d3e4192297d23b8f43f902fce37380f11a7b624855abc62e4ab5c81df21cf1bff442', 'a680f28d63b101c3b91bbb10725c18d6d4030cd6acce3f4b4ce79261c71878b0cb335f8f4faa8caa', 0, '2022-06-09 14:28:57'),
('6b7b0f502526c53862434e76dca83daa75324a7e5a7693f2f20a00803fbf87cd8ade6f8daea46256', '7f4fdb7c3e79780b2f880a601dfa8941f2b673512c1dfcfd58c9f0987306bc905dfd4f63723f2a79', 0, '2022-06-06 09:50:44'),
('756a2deefde9f7c7b11c95384155817099e6650e0c05463e58de14cf8c7bb1368c2d5f4b7ce51277', '044d94511682d6d48000e763ee5e03a79103fc964713cabbaa466d55f87ac5c2394ed30189cecdc0', 0, '2022-06-06 10:21:22'),
('75f61273803bba2e2e7a2791647bd431746a8fc0e53b3b302f946269e986df53e9613e927a20decb', 'fac87e73d1ad07b8686c395b24d88367825ade2981ff294f2e68cc4981b71627fac2afd88dfc0fef', 0, '2022-06-06 10:16:35'),
('7cba785504fefc6f3c1d00b81ee54a4c927b3327d2da31bbf999776d0f419a382a9ada621faae3db', '48c38bb190ccf5e7d13b38e00e686417a6ad87b41a895b12e5d90da6b692dea2a56c61915c401a74', 0, '2022-06-07 22:20:53'),
('800f93e3d67301cf90e6c2de45941bfa3aa50aa2bd173e762205718386dae956026a4e3294202cf9', '2e9446c632b28b8ef6cceb818fce76299479914348498c15e9c1345da55d88989b9df3cffea631dd', 0, '2022-06-06 10:16:46'),
('85ebad92d704039d4d5c511f553cc5ddd1ab5362c010efafeff7f5dbcef39e0d77fa96b7f42087a3', 'aefc75a0e73b1be2500f6e6576e2a9f4eb91719dd4977d6839b068c099a63e3608d63bb88a8f6792', 0, '2022-06-05 23:25:39'),
('90b571e247ae58e53486c826a95a031e0e7a1e44bc1a322e5fe23499f1776a8dc9f150bbca0b42a5', '2c613d92c7464eb85aa3ca9f3b3b5c14952c1c26f379385402dca5c1418ed2e849214e82de57ba72', 0, '2022-06-06 10:06:24'),
('9157ee9ba7b6c18b8f27bd47b1255461fb4597682a62af61d09112f2ce511aaa3e29bf75d58a4028', 'ab4d4999267518f6b95c54b09051d213c4cd8b5c319f3121f0573289c0ec4373f7f0e4d3f00c72ca', 0, '2022-06-09 14:26:04'),
('a28bd39438ea79b888cce9f788d249e2b290849cdf7a9c9c3a1a7303eee275a49df5e50777b4e3d7', '41c0f50aee4e7fb5a88c38aa2ca6cf2628c0611008634085511656de3dd7ca5ea8bf5ad266dab4ff', 0, '2022-06-06 10:20:14'),
('a6dc0b791034415fd4d9a07ab388c3631b49d3d782712ad0a722a5761ab6c31674161e9f84bba459', 'c56d048abb77111a276b809dfc511edc3cecb7e22b56699112d95c3e472df4be6eb800d70ffa334c', 0, '2022-06-06 20:42:14'),
('ad04569aa0720b1a3c11c40766af857a1e924f9ac2aa840efde046defee743b023de8f7b54051946', '1e94cfd33092c4db55d44817cdbd10be61cbb47ade682305d90fe34afb40d4c7236df44fda195289', 0, '2022-06-06 10:17:29'),
('bd944b90ce7aa6da2af2ab8c524291c98742cab95efcf3d125d614be98a818a0ddaf38aaf0887f91', 'a698082da6b6384009046661c9b96420badb43f6cbc7094fbc25a4181470aefcb7024f5e6451f89e', 0, '2022-06-06 20:39:48'),
('ccf1165f27c0c5a7448dcb245db488ca89298e9a02403381866ee4c924e09f0b28103632a5fdb4b4', '464bdf45f9ef6162dd9b0911d00dad8df90dcc240aa55f97f95f3a4074f7dd8cd20fbd5ff9be5441', 0, '2022-06-14 15:33:07'),
('cf6f563d197585a81efc5529fbdef0363ead87e95ca2e9b7511c41e22cca0791c409882a121a1be5', '34120549e7a1c3ddf134676b04695089d93c147e6d1fdd7fd3644a64f5eb6e904497881b4c14e456', 0, '2022-06-09 09:46:14'),
('e56e89f580681ba0aff456017cacbb154b7efa16bdfe9b7c45b6e40ceaaf7c33dabd5e808f9a2824', '5ddd411a112929209e2d67074f91041e4b5873ad0a1ad22e9b1337d2456215bde47329b950fed568', 0, '2022-06-06 10:05:31'),
('e753f9e61e2d5eb2030a530d8430db8f2ee573487a7b4be0d6b1e29d1d9cf6a6d8e8e8c476051178', '454bbd136a3090907eaf61eeb82262cee979b489d22d259d628e8acfcc4a8eb79a0ad420dcdc2e09', 0, '2022-06-06 09:49:31'),
('eb1e25c76e73bdbc3d01805ab374c878b07fc25ae9da5e77e7e0ec3d723bef1b93a592f4e8b0eab9', 'f24ef3de2d6c31ab8ffa5b09132d3f90365e808f3d019ebb5e77128d9f256ee21b5fae7e5e4c596c', 0, '2022-06-06 10:04:58'),
('ee251704dc0f65a7fdb075535c122d12418de958319539022cc5ae5815b7814e982c23c12aa8565c', 'aa3229a3e3511adb8825396958b926eacb03361142ca39d728b36541353b27086b51930a6a1137d4', 0, '2022-06-18 21:20:27'),
('f39792c3be2b38b75f968ac1bdbfd586295b8c85217ee5cb31fbffcccd65f6fa04204af7155c6807', 'fc2197fa9e08c9835957433f0d304c28d12c50962e9364aa91f3708b954e6ecc82fc00b59b282b6a', 0, '2022-06-06 10:19:50'),
('f7810acc2722c2666dc21e08ef94c13aaf040a693b3af28c75d2337b634a034dc8b6d0775f7bac0f', '2020304fe71f4114bfaeb95de9065858c7067b2a9ced33755fc25ece827ab42f65fbe65bcb765469', 0, '2022-06-09 09:46:42'),
('f8133f9b6fb94f12c797423f566444f2c5dd7b85613ecc99ea6bc796f94bedf47d826b7d1e1a0e70', '500a03d37ff7ef72bb3ce8fa9c456e94c1a3b31bdb739c45f9d4488f24b679f58029bceb2d9616be', 0, '2022-06-08 18:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `name` varchar(20) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `period` int NOT NULL DEFAULT '7' COMMENT '(IN DAYS) the period this game runs before draw(on the last day). e.g weekly = 7, monthly = 30, daily=1,etc',
  `descr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prize_id` int NOT NULL COMMENT 'references the id in the "prize" table',
  `expected_winners` int NOT NULL COMMENT 'the max no of winners for this package. Once exceeded , no further game play/ placement.',
  `opens_at` time DEFAULT '08:00:00' COMMENT 'daily opening time.',
  `closes_at` time DEFAULT '20:00:00' COMMENT 'daily closing time',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('1') DEFAULT '1' COMMENT 'should this be visible to users. Not applicable to admins.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `uuid`, `name`, `slug`, `period`, `descr`, `prize_id`, `expected_winners`, `opens_at`, `closes_at`, `created_at`, `deleted_at`, `updated_at`, `visibility`) VALUES
(1, 'dfsdf', 'Daily', 'daily', 1, NULL, 1, 2, '04:59:02', NULL, '2021-06-03 16:22:13', NULL, NULL, '1'),
(3, 'dfsdf2', 'Weekly', 'weekly', 7, NULL, 2, 1, NULL, NULL, '2021-06-03 16:22:13', NULL, NULL, '1'),
(4, 'dfsdf22', 'Monthly', 'monthly', 30, NULL, 3, 1, NULL, NULL, '2021-06-03 16:22:13', NULL, NULL, '1'),
(6, 'dfsdf22ids', 'Bi Monthly', 'bi_monthly', 60, NULL, 4, 1, NULL, NULL, '2021-06-03 16:22:13', NULL, NULL, '1'),
(7, 'dfsdf22ik', 'Quarterly', 'quaterly', 120, NULL, 5, 1, NULL, NULL, '2021-06-03 16:22:13', NULL, NULL, '1'),
(10, 'ddfafb9704b149a7861394a682965b93', '300k', '', 7, 'this is a descr', 3, 2, NULL, NULL, '2021-06-09 18:29:14', NULL, '2021-06-09 18:29:14', '1'),
(11, 'b007139f25a745b081f637a50020511f', '300k', '', 7, 'this is a descr', 3, 2, NULL, NULL, '2021-06-09 18:37:25', NULL, '2021-06-09 18:37:25', '1'),
(12, '0864f51ecfaf400ea41141fada846e1b', '300k', '', 7, 'this is a descr', 3, 2, NULL, NULL, '2021-06-09 18:38:48', NULL, '2021-06-09 18:38:48', '1'),
(13, '23de9df2de404abc86804b6e11f79f6c', '300k pack', '300k_pack', 7, 'this is a descr', 3, 2, NULL, NULL, '2021-06-09 18:42:40', NULL, '2021-06-09 18:42:40', '1'),
(14, '7ec744146bbb4412ad82a9c71395f475', '300k pack', '300k_pack', 7, NULL, 3, 2, NULL, NULL, '2021-06-09 18:43:05', NULL, '2021-06-09 18:43:05', '1'),
(15, '64421a07d06a49ea949bab1f9c353e0e', 'jaggggaahakata', '300k_pack', 7, '080334434343', 2, 4, NULL, NULL, '2021-06-09 18:44:48', NULL, '2021-06-10 09:38:02', '1'),
(16, '6fd9954607064e45b4422f8dd8583f8c', '300k pack', '300k_pack', 7, 'this is a descr', 3, 2, '08:00:00', '20:00:00', '2021-06-10 06:59:39', NULL, '2021-06-10 06:59:39', '1'),
(17, 'c8484d0a510940258953e53f13baabb2', '300k pack', '300k_pack', 7, 'this is a descr', 3, 2, '08:00:00', '20:00:00', '2021-06-16 06:02:08', NULL, '2021-06-16 06:02:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `package_options`
--

CREATE TABLE `package_options` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `package_id` int NOT NULL,
  `price` int NOT NULL COMMENT 'ticket cost price',
  `ticket_qty` int NOT NULL COMMENT 'the no of tickets that comes with this package. i.e the no of tickets that will be generate for this customer on purchase.',
  `discount` int DEFAULT NULL,
  `purchase_count` int NOT NULL DEFAULT '0',
  `last_purchased_at` timestamp NULL DEFAULT NULL,
  `total_purchase_limit` int DEFAULT NULL,
  `user_purchase_limit` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='aka package_pricing. This table holds the pricing package ';

--
-- Dumping data for table `package_options`
--

INSERT INTO `package_options` (`id`, `uuid`, `package_id`, `price`, `ticket_qty`, `discount`, `purchase_count`, `last_purchased_at`, `total_purchase_limit`, `user_purchase_limit`, `created_at`, `updated_at`, `deleted_at`, `visibility`) VALUES
(1, '4fff4896f0a74b7b9c7285c53d993931', 1, 200002, 40, NULL, 0, NULL, NULL, NULL, '2021-06-10 09:24:02', '2021-06-10 09:42:47', '2021-06-10 09:42:47', NULL),
(2, '803bbf5f79c5451abd94766b836b783b', 1, 3, 1, NULL, 0, NULL, NULL, NULL, '2021-06-10 09:24:11', '2021-06-10 09:24:11', NULL, NULL),
(4, '3b319664cf784102a96249cf1fc55892', 1, 3, 1, NULL, 25, '2021-06-19 12:14:23', NULL, NULL, '2021-06-10 09:32:45', '2021-06-19 12:14:23', NULL, NULL),
(5, '5a49dfea0c0746e1854a066c084ab932', 10, 3000, 2, NULL, 0, NULL, NULL, NULL, '2021-06-10 09:34:24', '2021-06-10 09:34:24', NULL, NULL),
(6, 'a905f5c4477b4d18bb132ee66c751492', 10, 2000, 2, NULL, 0, NULL, NULL, NULL, '2021-06-16 06:08:23', '2021-06-16 06:08:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `package_option_id` int NOT NULL,
  `routine_id` int DEFAULT NULL,
  `session_id` int NOT NULL,
  `amount` int NOT NULL,
  `user_id` int NOT NULL,
  `ticket_qty` int NOT NULL,
  `is_auto_gen` enum('1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `uuid`, `package_option_id`, `routine_id`, `session_id`, `amount`, `user_id`, `ticket_qty`, `is_auto_gen`, `created_at`, `deleted_at`, `updated_at`) VALUES
(10, '81349a0ab8074118b291be2481bcf26e', 2, NULL, 1, 3, 29, 2, NULL, '2021-06-10 22:40:32', NULL, '2021-06-10 22:40:32'),
(11, 'cc7971cd7d6f4dbfac739fb891064fe1', 2, NULL, 1, 3, 29, 2, NULL, '2021-06-10 22:45:13', NULL, '2021-06-10 22:45:13'),
(13, '904d3ed20bde41a69cfa8cb609e403ef', 2, NULL, 1, 3, 29, 2, NULL, '2021-06-10 22:47:36', NULL, '2021-06-10 22:47:36'),
(14, '42454e1c8efb4f0db06c6e0a7e654b6a', 2, NULL, 1, 3, 29, 2, NULL, '2021-06-10 22:48:19', NULL, '2021-06-10 22:48:19'),
(15, 'bc8f7a4fc9a246daa8f161fb13864dc7', 2, NULL, 1, 3, 29, 2, NULL, '2021-06-10 22:49:03', NULL, '2021-06-10 22:49:03'),
(16, '236e8a3ba17147119f8f4c2d06c07a99', 2, NULL, 1, 3, 29, 1, NULL, '2021-06-10 22:53:05', NULL, '2021-06-10 22:53:05'),
(18, 'bc51a96e881b44fa9c8b1c1db8b1e88e', 2, NULL, 1, 3, 29, 1, NULL, '2021-06-10 22:54:29', NULL, '2021-06-10 22:54:29'),
(19, '868dd027da874ac4b1664342c2d73d27', 2, NULL, 1, 3, 29, 1, NULL, '2021-06-10 22:59:39', NULL, '2021-06-10 22:59:39'),
(20, '17b01ffb9b2346aead7253890d9f9b4b', 4, NULL, 1, 3, 29, 2, NULL, '2021-06-10 23:01:32', NULL, '2021-06-10 23:01:32'),
(21, 'b6e1fcc29bd44fddbdfda665504a3a0f', 4, NULL, 1, 3, 29, 2, NULL, '2021-06-10 23:04:12', NULL, '2021-06-10 23:04:12'),
(22, 'e98ea68323174b1aa8831bbd5c293e0e', 4, NULL, 2, 3, 29, 2, NULL, '2021-06-11 09:03:17', NULL, '2021-06-11 09:03:17'),
(23, 'd4c54e89b7d84066b6a13f7dd2078789', 4, NULL, 3, 3, 29, 2, NULL, '2021-06-11 09:04:41', NULL, '2021-06-11 09:04:41'),
(24, '1e225fed822149a39d328ed1f33cb1e5', 4, NULL, 4, 3, 29, 2, NULL, '2021-06-11 09:06:54', NULL, '2021-06-11 09:06:54'),
(25, 'd5ea16b0e92a4cfba93027e4beffa50b', 4, NULL, 4, 3, 29, 2, NULL, '2021-06-11 09:07:53', NULL, '2021-06-11 09:07:53'),
(26, '2108c051fce441e38c56c2337314d8c8', 4, NULL, 6, 3, 29, 2, NULL, '2021-06-11 09:14:53', NULL, '2021-06-11 09:14:53'),
(27, 'bcb593c5eb5f470cac913fc8e792fb56', 4, NULL, 7, 3, 29, 2, NULL, '2021-06-11 09:15:52', NULL, '2021-06-11 09:15:52'),
(28, 'db9a12ca77284eb48af790161d90d38b', 4, NULL, 7, 3, 29, 2, NULL, '2021-06-11 09:17:58', NULL, '2021-06-11 09:17:58'),
(29, '77e6f1af1a4b4db790f5e6254571bc36', 4, NULL, 8, 3, 29, 2, NULL, '2021-06-11 09:40:15', NULL, '2021-06-11 09:40:15'),
(30, 'a5bbb3e129d44198941b0cff2996898f', 4, NULL, 8, 3, 29, 2, NULL, '2021-06-11 09:40:58', NULL, '2021-06-11 09:40:58'),
(31, '25cc8866073e458ca9b447dbce11fd61', 4, NULL, 8, 3, 29, 2, NULL, '2021-06-11 09:42:08', NULL, '2021-06-11 09:42:08'),
(32, '4ec67a7d0d014e88ae6ab9e38ecd6888', 4, NULL, 9, 3, 29, 2, NULL, '2021-06-11 09:42:22', NULL, '2021-06-11 09:42:22'),
(33, '0000ab3a6a884ce99752c0e60a6da169', 4, NULL, 10, 3, 29, 2, NULL, '2021-06-11 09:48:51', NULL, '2021-06-11 09:48:51'),
(34, '12751a57162141a1b28df11fad13b827', 4, NULL, 11, 3, 29, 2, NULL, '2021-06-11 10:49:01', NULL, '2021-06-11 10:49:01'),
(35, '358a9ec7144d499ab16751a5cd50dabc', 4, NULL, 12, 3, 29, 2, NULL, '2021-06-11 10:59:41', NULL, '2021-06-11 10:59:41'),
(36, 'bc7f5e6ed169407ea35538c359348d76', 4, NULL, 13, 3, 29, 2, NULL, '2021-06-11 10:00:44', NULL, '2021-06-11 10:00:44'),
(37, 'b7c07575af764fd1bc2a107ca7312620', 4, NULL, 14, 3, 29, 2, NULL, '2021-06-11 10:12:38', NULL, '2021-06-11 10:12:38'),
(38, '3e46268cc41545f2937a1d452d3acbc6', 4, NULL, 15, 3, 29, 2, NULL, '2021-06-11 11:13:23', NULL, '2021-06-11 11:13:23'),
(39, 'ded5554a7c8c4ed585be2c29b0892dbc', 4, NULL, 15, 3, 29, 2, NULL, '2021-06-11 10:33:14', NULL, '2021-06-11 10:33:14'),
(40, '883a3cfaf73f4d23acfda9bb3ccd1a51', 4, NULL, 16, 3, 29, 2, NULL, '2021-06-11 10:33:33', NULL, '2021-06-11 10:33:33'),
(41, '3d616b483c644b289337283b5807f974', 4, NULL, 16, 3, 29, 2, NULL, '2021-06-11 10:34:29', NULL, '2021-06-11 10:34:29'),
(42, 'b45e0d3f64b048d497174658a45666bd', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-11 10:34:41', NULL, '2021-06-11 10:34:41'),
(43, '0b415ab441374e82ab197df01f56a95a', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-11 16:56:14', NULL, '2021-06-11 16:56:14'),
(44, '3807fad50ccb441db40f9a6ab74f6401', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-12 14:39:56', NULL, '2021-06-12 14:39:56'),
(45, 'b3e662a06e584ce6a1c6f66b51e231bc', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-12 14:40:34', NULL, '2021-06-12 14:40:34'),
(47, '790f3888b0b04c84ac5053a5d6e0fc17', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-12 14:58:23', NULL, '2021-06-12 14:58:23'),
(48, 'eef9583cbc7e4e5d81323e34e59cc77a', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-12 14:59:32', NULL, '2021-06-12 14:59:32'),
(49, '7e7ce82424034fbda9453bce267d4b98', 4, NULL, 17, 3, 29, 2, NULL, '2021-06-12 14:59:34', NULL, '2021-06-12 14:59:34'),
(50, '7b0e8721fa8c45e59edd2cc16249bd97', 4, NULL, 18, 3, 29, 2, NULL, '2021-06-12 15:24:20', NULL, '2021-06-12 15:24:20'),
(51, '1080030b4ed24ed39dd181e11ff9248d', 4, NULL, 18, 3, 29, 2, NULL, '2021-06-13 07:56:16', NULL, '2021-06-13 07:56:16'),
(52, '692f0643cb544fa8aa91bc20d2d483a1', 4, NULL, 19, 3, 29, 2, NULL, '2021-06-14 03:10:17', NULL, '2021-06-14 03:10:17'),
(53, '7473a9e6cfee4a2d85494149ac129455', 4, NULL, 19, 3, 29, 2, NULL, '2021-06-14 03:10:58', NULL, '2021-06-14 03:10:58'),
(54, '381193b360794402bed56f81bcc1ce0f', 4, NULL, 19, 3, 29, 2, NULL, '2021-06-14 03:11:06', NULL, '2021-06-14 03:11:06'),
(55, '071cdbe95aa644e0b418de733b821dfb', 4, NULL, 19, 3, 29, 2, NULL, '2021-06-14 03:13:14', NULL, '2021-06-14 03:13:14'),
(56, '3efd6b18db4f49beb89f828cbd722991', 4, NULL, 19, 3, 36, 2, NULL, '2021-06-14 15:41:09', NULL, '2021-06-14 15:41:09'),
(57, '11337053599e43b2a9c22be823d67ead', 4, NULL, 19, 3, 36, 1, NULL, '2021-06-14 15:44:01', NULL, '2021-06-14 15:44:01'),
(58, '2d3902be68f44cd69c83c373e9d9a8c7', 4, NULL, 19, 3, 36, 1, NULL, '2021-06-15 07:55:37', NULL, '2021-06-15 07:55:37'),
(59, '9335472fb695439faebb552866b2dd34', 4, NULL, 20, 3, 36, 1, NULL, '2021-06-17 09:10:19', NULL, '2021-06-17 09:10:19'),
(60, 'd2e0ced444b147988b45eea4469336e2', 4, NULL, 20, 3, 36, 1, NULL, '2021-06-17 11:23:04', NULL, '2021-06-17 11:23:04'),
(61, '12accfddf3c34ed48d0103d8feacce41', 4, NULL, 20, 3, 29, 1, NULL, '2021-06-17 11:23:40', NULL, '2021-06-17 11:23:40'),
(62, 'd854716274bb4d1eb74d9c0eab4edb99', 4, NULL, 20, 3, 29, 1, NULL, '2021-06-17 11:24:22', NULL, '2021-06-17 11:24:22'),
(63, 'fdacbaa231f149b3acb858f3b241b28e', 4, NULL, 20, 3, 29, 1, NULL, '2021-06-17 11:25:15', NULL, '2021-06-17 11:25:15'),
(64, '14ea61d613d845afa6569ca95111bbb8', 4, NULL, 20, 3, 36, 1, NULL, '2021-06-17 11:48:52', NULL, '2021-06-17 11:48:52'),
(65, 'e402c64cdec144cd92bc59162ec3fcca', 4, 1, 20, 3, 29, 1, '1', '2021-06-17 11:51:11', NULL, '2021-06-17 11:51:11'),
(70, '84a26442a858493391a288b5d3288cd5', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 11:35:55', NULL, '2021-06-19 11:35:55'),
(71, '41cd92e6b04e42b6bd8eea218e0f7b48', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 11:40:12', NULL, '2021-06-19 11:40:12'),
(72, 'aab0cb3f6f9e42eab6e10344f049189d', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 12:03:58', NULL, '2021-06-19 12:03:58'),
(73, 'ee6d3359a8fe43adbdc3a691fe06e23f', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 12:06:12', NULL, '2021-06-19 12:06:12'),
(74, '1c4097c2a4f14be0800d708fd3ed03d1', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 12:09:18', NULL, '2021-06-19 12:09:18'),
(75, '8a86613431c4499fa106e1fc7a9c2101', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 12:12:28', NULL, '2021-06-19 12:12:28'),
(76, 'ce3308f32b3641f8ae2a50d662dc4ab7', 4, NULL, 21, 3, 36, 1, NULL, '2021-06-19 12:14:23', NULL, '2021-06-19 12:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `payment_providers`
--

CREATE TABLE `payment_providers` (
  `id` int NOT NULL,
  `uuid` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_providers`
--

INSERT INTO `payment_providers` (`id`, `uuid`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4395341239', 'Paystack Card Transaction', NULL, '2019-05-08 23:16:34', NULL, NULL),
(2, '3243590834', 'Paystack Mcash (GTBank *737#) ', NULL, '2019-05-08 23:17:09', NULL, NULL),
(3, '0918242345', 'Zenith Bank Mcash', NULL, '2019-05-08 23:17:27', NULL, NULL),
(4, '1029343452', 'Zenith Bank Fund Transfer', NULL, '2019-05-08 23:17:42', NULL, NULL),
(5, '1022129325', 'Polaris Mcash ', NULL, '2019-05-08 23:24:39', NULL, NULL),
(6, '7812098420', 'Prewin Promo Credit', NULL, '2020-01-16 10:54:53', NULL, NULL),
(7, '1092124471', 'Bank Transfer', 'manually Pay to the bank', '2020-04-10 21:17:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `package_option_id` int NOT NULL,
  `frequency_id` int NOT NULL COMMENT 'in days. The gap between time new game/tickets are generated for this user',
  `user_id` int NOT NULL,
  `successful_routine_count` int NOT NULL DEFAULT '0' COMMENT 'the no of successful routine game placement. Should be successful if user has enough funds in wallet and not restricted by admin',
  `is_active` enum('1') DEFAULT '1' COMMENT 'user can disable and enable this routine anytime using this ',
  `last_activated` timestamp NULL DEFAULT NULL,
  `last_deactivated` timestamp NULL DEFAULT NULL,
  `disabled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='aka subscription table';

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `uuid`, `package_option_id`, `frequency_id`, `user_id`, `successful_routine_count`, `is_active`, `last_activated`, `last_deactivated`, `disabled_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'xaa', 1, 1, 36, 0, '1', NULL, NULL, '2021-06-17 23:48:58', '2021-06-17 11:50:07', '2021-06-17 23:48:58', NULL),
(2, '20272f2ae98846ff8bcc6b00833eb07d', 5, 1, 36, 0, '1', NULL, NULL, NULL, '2021-06-17 23:36:38', '2021-06-17 23:40:56', '2021-06-17 23:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `routine_frequency`
--

CREATE TABLE `routine_frequency` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `routine_frequency`
--

INSERT INTO `routine_frequency` (`id`, `uuid`, `name`, `slug`, `descr`, `created_at`, `updated_at`, `deleted_at`, `visibility`) VALUES
(1, '343j42343434324bjwffsd', 'restart', 'restart', 'on game restart', '2021-06-17 12:40:44', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sys_activity_types`
--

CREATE TABLE `sys_activity_types` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_activity_types`
--

INSERT INTO `sys_activity_types` (`id`, `name`, `slug`) VALUES
(1, 'New Registration', 'new_registration'),
(2, 'game_play', 'game_play'),
(3, 'change of pasword', 'change_password'),
(4, 'change of phone', 'change_phone'),
(5, 'change of email', 'change_email'),
(7, 'new account', 'new_account'),
(8, 'edit account', 'edit_account'),
(9, 'delete account', 'delete_account'),
(10, 'make default', 'default'),
(11, 'withdrawal', 'withdrawal'),
(12, 'Deposit (Fund Wallet)', 'deposit');

-- --------------------------------------------------------

--
-- Table structure for table `sys_communication_channels`
--

CREATE TABLE `sys_communication_channels` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sys_communication_channels`
--

INSERT INTO `sys_communication_channels` (`id`, `name`, `slug`, `descr`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Email Communication', 'email', 'communicate via email', '2021-06-04 03:22:13', NULL, NULL),
(2, 'Phone Communication', 'phone', 'communicate via phone', '2021-06-04 03:22:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_prize`
--

CREATE TABLE `sys_prize` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `name` varchar(20) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `value` int DEFAULT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sys_prize`
--

INSERT INTO `sys_prize` (`id`, `uuid`, `name`, `slug`, `value`, `descr`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sdad', '10k', '10k', 10000, NULL, '2021-06-03 16:14:39', NULL, NULL),
(2, 'sdadf', '50k', '50k', 50000, NULL, '2021-06-03 16:14:39', NULL, NULL),
(3, 'sdadffefr', '500k', '500k', 500000, NULL, '2021-06-03 16:14:39', NULL, NULL),
(4, 'sdadff', 'Land', 'land', NULL, 'winner becomes land owner', '2021-06-03 16:14:39', NULL, NULL),
(5, 'sdadffi3', 'Apartment', 'apartment', NULL, 'winner owns the apartment', '2021-06-03 16:14:39', NULL, NULL),
(9, '75ed82bcd1a44cc99c712ac89e94e387', '300k', '', 300000, 'this is a descr', '2021-06-08 18:39:30', '2021-06-08 18:39:30', NULL),
(10, '0a062461723b4961bcf9556159faeff8', '300k', '', 300000, NULL, '2021-06-08 18:45:42', '2021-06-08 18:45:42', NULL),
(11, 'd4dfc4fe05d046c5a1542c773ba94282', '300k', '', 300000, 'this is a descr', '2021-06-08 18:45:50', '2021-06-08 18:45:50', NULL),
(12, '56789268ddc44833abdbb29ae689796e', '300k', '', 300000, NULL, '2021-06-08 18:52:25', '2021-06-08 18:52:25', NULL),
(13, '85f630dcba9143b298bc03454b8dbaee', '300k', '', 300000, NULL, '2021-06-08 18:52:31', '2021-06-08 18:52:31', NULL),
(14, '8f85c963e36c4dc4ab73f64879774948', '300k', '', 300000, NULL, '2021-06-08 18:52:47', '2021-06-08 18:52:47', NULL),
(15, '6993e061870e4e73ae3f62db475da324', '300k', '', 300000, NULL, '2021-06-08 18:52:55', '2021-06-08 18:52:55', NULL),
(16, 'e4b2ab592159432f852e226a5c7b27fc', '300k', '', 300000, 'this is a descr', '2021-06-08 19:01:37', '2021-06-08 19:01:37', NULL),
(17, '1419861b3b0e46388dc38c8bddf9a617', '300k', '', 300000, NULL, '2021-06-08 19:01:52', '2021-06-08 19:01:52', NULL),
(18, '7c2966151b9349fc97145ba39ffdbd0f', '300k', '', 300000, 'this is a descr', '2021-06-08 19:02:02', '2021-06-08 19:02:02', NULL),
(19, '1b5b98d76d9d4d24a3a4a227293bcd64', '300k', '', 300000, NULL, '2021-06-08 19:06:46', '2021-06-08 19:06:46', NULL),
(21, '3e6a1a320bdf4d61ae2a60d32f7f5350', '300k', '', 300000, 'this is a descr', '2021-06-08 20:22:30', '2021-06-08 20:22:30', NULL),
(22, '011b88324da3435fb722a806dd863ff2', '300k', '', 300000, 'this is a descr', '2021-06-09 09:30:35', '2021-06-09 09:30:35', NULL),
(23, '8158896c9370495881b5cacdf35ceac3', '300k', '', 300000, 'this is a descr', '2021-06-09 10:04:00', '2021-06-09 10:04:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_settings`
--

CREATE TABLE `sys_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `business_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_select_per_draw` int NOT NULL DEFAULT '1' COMMENT 'the number of tickets to select/pick from the ticket pool/box per draw/selection',
  `min_balance` int DEFAULT NULL COMMENT 'the least NON-WITHDRAWABLE/NON-REFUNDABLE amount a customer can have in account.',
  `min_withdraw` int DEFAULT NULL COMMENT 'the minimum withdraw ',
  `max_withdraw` int DEFAULT NULL,
  `min_deposit` int DEFAULT NULL,
  `max_deposit` int DEFAULT NULL,
  `session_expires` int DEFAULT NULL COMMENT 'time to terminate sessions works with LAST_LOGIN in seconds ',
  `contact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_other_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_settings`
--

INSERT INTO `sys_settings` (`id`, `business_name`, `ticket_select_per_draw`, `min_balance`, `min_withdraw`, `max_withdraw`, `min_deposit`, `max_deposit`, `session_expires`, `contact`, `site_other_name`, `about`, `terms`, `created_at`, `updated_at`) VALUES
(1, 'Raffle Draw', 1, 1000, 5000, 10000, 3000, 19000, 3600, NULL, NULL, NULL, NULL, '2020-01-17 11:51:14', '2020-01-17 11:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ticket_short_code` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `session_id` int NOT NULL,
  `draw_index` int DEFAULT NULL,
  `drawn_at` timestamp NULL DEFAULT NULL COMMENT 'A WINNER TICKET. If it has value, then this ticket was selected as a winner.',
  `drawn_by` int DEFAULT NULL COMMENT 'the perform(admin) that rolled the dice i.e that performed the shuffling and picking up this ticket',
  `package_option_id` int NOT NULL,
  `package_id` int NOT NULL,
  `user_id` int NOT NULL,
  `is_bulk` enum('1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'is this generated the same time in bulk with some other tickets? any "package_option" with "qty" greater than 1 , should set this value to true(1)',
  `payment_id` int NOT NULL,
  `is_auto_gen` enum('1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'was this generated by a routine cron job/bot',
  `routine_id` int DEFAULT NULL COMMENT 'id of the routine',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `uuid`, `ticket_short_code`, `session_id`, `draw_index`, `drawn_at`, `drawn_by`, `package_option_id`, `package_id`, `user_id`, `is_bulk`, `payment_id`, `is_auto_gen`, `routine_id`, `created_at`, `updated_at`, `deleted_at`, `visibility`) VALUES
(10, 'ce20af2400aa4a519c3742bee94716d6', 'LeArz0GV6T&WmF6ZQ9pS', 1, 20, NULL, NULL, 2, 1, 29, '1', 11, NULL, NULL, '2021-06-10 22:45:13', '2021-06-10 22:45:13', NULL, '1'),
(11, 'c6f9007c8d6c4696a9f71d361ea856bf', 'MLRef7XoQPcCgL8Q@qFd', 1, 62, NULL, NULL, 2, 1, 29, '1', 11, NULL, NULL, '2021-06-10 22:45:13', '2021-06-10 22:45:13', NULL, '1'),
(12, 'd712c09ce0ea4e268560ab8479c67e9a', 'VGQ5OQFBkJLLqH4qPJl2', 1, 9, NULL, NULL, 2, 1, 29, '1', 13, NULL, NULL, '2021-06-10 22:47:36', '2021-06-10 22:47:36', NULL, '1'),
(13, '3ce6bac33b7c49cdb27c3e3ddcd37d01', 'bxkN4NrVQF5uoksuQWwW', 1, 29, NULL, NULL, 2, 1, 29, '1', 13, NULL, NULL, '2021-06-10 22:47:36', '2021-06-10 22:47:36', NULL, '1'),
(14, 'b7b12fc249e54d6ea6b7c30862304c23', 'thtccQOivO', 1, 15, NULL, NULL, 2, 1, 29, '1', 14, NULL, NULL, '2021-06-10 22:48:19', '2021-06-10 22:48:19', NULL, '1'),
(15, '2236ce291ff54d3ba366a9225ea76e95', 'Rqkopeu5MU', 1, 81, NULL, NULL, 2, 1, 29, '1', 14, NULL, NULL, '2021-06-10 22:48:19', '2021-06-10 22:48:19', NULL, '1'),
(16, '379d44cca6cd40e399e20dd584fe1faf', 'crMfqRmWdQ', 1, 34, NULL, NULL, 2, 1, 29, '1', 15, NULL, NULL, '2021-06-10 22:49:03', '2021-06-10 22:49:03', NULL, '1'),
(17, 'f5f8f6c1172e4d7895e29ee98a9cdf63', 'auTNoh6kAI', 1, 77, NULL, NULL, 2, 1, 29, '1', 15, NULL, NULL, '2021-06-10 22:49:03', '2021-06-10 22:49:03', NULL, '1'),
(18, '7ee2a658acd84725889bb9a7f11b9f40', 'asPPqOk4SC', 1, 1, '2021-06-12 17:48:51', 29, 2, 1, 29, '', 16, NULL, NULL, '2021-06-10 22:53:05', '2021-06-12 17:48:51', NULL, '1'),
(19, 'ef7084511bcb43efbc42777fe83c8557', 'dgegSl22yZ', 1, 1, '2021-06-14 20:53:16', 36, 2, 1, 29, NULL, 18, NULL, NULL, '2021-06-10 22:54:29', '2021-06-14 20:53:16', NULL, '1'),
(20, '38290b484c3a4bb2b30b4edcd75c3d1a', 'AhV88KQ6OU', 1, 42, NULL, NULL, 2, 1, 29, NULL, 19, NULL, NULL, '2021-06-10 22:59:39', '2021-06-10 22:59:39', NULL, '1'),
(21, 'a00fa0df39274f2788be75637de8808b', 'SJdhkcm59t', 1, 50, NULL, NULL, 4, 1, 29, '1', 20, NULL, NULL, '2021-06-10 23:01:32', '2021-06-10 23:01:32', NULL, '1'),
(22, '9c1f0a74e81c40e18d4a418840130625', 'nVgayVDEyu', 1, 47, NULL, NULL, 4, 1, 29, '1', 20, NULL, NULL, '2021-06-10 23:01:32', '2021-06-10 23:01:32', NULL, '1'),
(23, '2ba19659926c4d7483fd027f2425903f', 'cA8lJT3BhQ', 1, 3, NULL, NULL, 4, 1, 29, '1', 21, NULL, NULL, '2021-06-10 23:04:12', '2021-06-10 23:04:12', NULL, '1'),
(24, '4db731562aba42b191ec231b7d8b69c3', 'eNw8F9Qv2y', 1, 39, NULL, NULL, 4, 1, 29, '1', 21, NULL, NULL, '2021-06-10 23:04:12', '2021-06-10 23:04:12', NULL, '1'),
(25, 'b11bcd0f841a4054b06824c560299157', 'HBrIMYKSAY', 2, 8, NULL, NULL, 4, 1, 29, '1', 22, NULL, NULL, '2021-06-11 09:03:17', '2021-06-11 09:03:17', NULL, '1'),
(26, '88bc3ac9410d45238b81cb8ead97624a', 'JNsDincQV5', 2, 22, NULL, NULL, 4, 1, 29, '1', 22, NULL, NULL, '2021-06-11 09:03:17', '2021-06-11 09:03:17', NULL, '1'),
(27, 'e43bc35fff8c496f9bdb93dcf921c1a4', 'UAEpPN8aiW', 3, 67, NULL, NULL, 4, 1, 29, '1', 23, NULL, NULL, '2021-06-11 09:04:41', '2021-06-11 09:04:41', NULL, '1'),
(28, 'eecee57097194b689d241305aa648918', 'w320FNHtP8', 3, 31, NULL, NULL, 4, 1, 29, '1', 23, NULL, NULL, '2021-06-11 09:04:41', '2021-06-11 09:04:41', NULL, '1'),
(29, 'e1feae0e043547f49c48bebb8a284d2d', 'inXQHeqVZU', 4, 26, NULL, NULL, 4, 1, 29, '1', 24, NULL, NULL, '2021-06-11 09:06:54', '2021-06-11 09:06:54', NULL, '1'),
(30, 'df728b9c78674cefad8eaaed78a6f010', 'B6t8TYITY1', 4, 37, NULL, NULL, 4, 1, 29, '1', 24, NULL, NULL, '2021-06-11 09:06:54', '2021-06-11 09:06:54', NULL, '1'),
(31, 'e068f6a646574595b912c880124fca14', 'lywOQQkP5D', 4, 21, NULL, NULL, 4, 1, 29, '1', 25, NULL, NULL, '2021-06-11 09:07:53', '2021-06-11 09:07:53', NULL, '1'),
(32, '22acc7ec3a5848a2992a584386bde7d1', 'O2vkh2fe8Q', 4, 68, NULL, NULL, 4, 1, 29, '1', 25, NULL, NULL, '2021-06-11 09:07:53', '2021-06-11 09:07:53', NULL, '1'),
(33, 'ce1772d8d0a34a4f96fffb1a1f7442cd', '8CHF7b3dWE', 6, 43, NULL, NULL, 4, 1, 29, '1', 26, NULL, NULL, '2021-06-11 09:14:53', '2021-06-11 09:14:53', NULL, '1'),
(34, '4db80867ed754da3a41f00cdb773421a', 'iA3nyqggrb', 6, 6, NULL, NULL, 4, 1, 29, '1', 26, NULL, NULL, '2021-06-11 09:14:53', '2021-06-11 09:14:53', NULL, '1'),
(35, '825d326aed6d4da898f3ec5d0b6bee20', 'bYSNn3yN18', 7, 65, NULL, NULL, 4, 1, 29, '1', 27, NULL, NULL, '2021-06-11 09:15:52', '2021-06-11 09:15:52', NULL, '1'),
(36, 'cc9d772d69504646a482b96d782b3d21', 'TVOPMpzkff', 7, 56, NULL, NULL, 4, 1, 29, '1', 27, NULL, NULL, '2021-06-11 09:15:52', '2021-06-11 09:15:52', NULL, '1'),
(37, '66ff9cad40d749b397a47613eb92abf0', 'Ny5eR2dJZR', 7, 1, '2021-06-14 20:55:24', 36, 4, 1, 29, '1', 28, NULL, NULL, '2021-06-11 09:17:58', '2021-06-14 20:55:24', NULL, '1'),
(38, 'ad69f4cb0f984f0a9746dc4a1b2dbed2', 'AYtNrE84Tc', 7, 79, NULL, NULL, 4, 1, 29, '1', 28, NULL, NULL, '2021-06-11 09:17:58', '2021-06-11 09:17:58', NULL, '1'),
(39, 'ebef6cdd6e6641d9836a32e5c3be889e', 'X2NmFdB7oD', 8, 1, '2021-06-13 08:44:09', 29, 4, 1, 29, '1', 29, NULL, NULL, '2021-06-11 09:40:15', '2021-06-13 08:44:09', NULL, '1'),
(40, '5aef64735a4c4b398463235d3c02c13f', 'v61KWK98T5', 8, 64, NULL, NULL, 4, 1, 29, '1', 29, NULL, NULL, '2021-06-11 09:40:15', '2021-06-11 09:40:15', NULL, '1'),
(41, 'cfc7ff7a50a04d10a81ec53b12f8706e', 'LX2vvDPDHt', 8, 1, '2021-06-12 17:42:59', 29, 4, 1, 29, '1', 30, NULL, NULL, '2021-06-11 09:40:58', '2021-06-12 17:42:59', NULL, '1'),
(42, '15e53e6c26754059be84e152e34926b2', '1GmgrkCctz', 8, 1, '2021-06-19 13:54:29', 36, 4, 1, 29, '1', 30, NULL, NULL, '2021-06-11 09:40:58', '2021-06-19 13:54:29', NULL, '1'),
(43, '73e3b324939b431594f0b0c9cb6ccbe0', 'mb6eYAfSeN', 8, 1, '2021-06-13 08:39:34', 29, 4, 1, 29, '1', 31, NULL, NULL, '2021-06-11 09:42:08', '2021-06-13 08:39:34', NULL, '1'),
(44, '2f0987c980144bbc983923a60a6d52e2', '7U7VuoSOqH', 8, 59, NULL, NULL, 4, 1, 29, '1', 31, NULL, NULL, '2021-06-11 09:42:08', '2021-06-11 09:42:08', NULL, '1'),
(45, '83cd254d5d7e492089d9748e8f63cd98', 'MZXnQoyc3a', 9, 45, NULL, NULL, 4, 1, 29, '1', 32, NULL, NULL, '2021-06-11 09:42:22', '2021-06-11 09:42:22', NULL, '1'),
(46, 'c2f0df2ca9884421a8e8a67245a33912', 'FWUhDE4fAU', 9, 51, NULL, NULL, 4, 1, 29, '1', 32, NULL, NULL, '2021-06-11 09:42:22', '2021-06-11 09:42:22', NULL, '1'),
(47, 'f91f0e610a8b40a3aa932e27e2044df1', 'rU3GC3DFpn', 10, 1, '2021-06-19 13:43:25', 36, 4, 1, 29, '1', 33, NULL, NULL, '2021-06-11 09:48:51', '2021-06-19 13:43:25', NULL, '1'),
(48, '9c515650ba83499d867e233d683010e3', 'BiGPPccEAx', 10, 33, NULL, NULL, 4, 1, 29, '1', 33, NULL, NULL, '2021-06-11 09:48:51', '2021-06-11 09:48:51', NULL, '1'),
(49, '315a0ce1e4c442b994b448c8e834c7b2', 'fZhobxOrBh', 11, 82, NULL, NULL, 4, 1, 29, '1', 34, NULL, NULL, '2021-06-11 10:49:01', '2021-06-11 10:49:01', NULL, '1'),
(50, '8336e4cfc37d42f597fd37cb64edd1cb', 'AVDNDA4bFI', 11, 1, '2021-06-14 15:48:08', 36, 4, 1, 29, '1', 34, NULL, NULL, '2021-06-11 10:49:01', '2021-06-14 15:48:08', NULL, '1'),
(51, '129bf7b47e77477ba13cbfdfd1aa973c', 'z8jPfiYgYl', 12, 1, '2021-06-13 04:37:31', 29, 4, 1, 29, '1', 35, NULL, NULL, '2021-06-11 10:59:41', '2021-06-13 04:37:31', NULL, '1'),
(52, '1e1639f512ac49ba946382aedfdd0f9c', '1tbewRQDSO', 12, 71, NULL, NULL, 4, 1, 29, '1', 35, NULL, NULL, '2021-06-11 10:59:41', '2021-06-11 10:59:41', NULL, '1'),
(53, '1ee9874d9dde4a7bb2fd49cd613706e8', 'oH5baQMSGO', 13, 27, NULL, NULL, 4, 1, 29, '1', 36, NULL, NULL, '2021-06-11 10:00:44', '2021-06-11 10:00:44', NULL, '1'),
(54, 'd6ba51576621468382eec1889aeece98', 'Vi9zbQQUFN', 13, 1, '2021-06-12 20:25:19', 29, 4, 1, 29, '1', 36, NULL, NULL, '2021-06-11 10:00:44', '2021-06-12 20:25:19', NULL, '1'),
(55, '9292227bee2449d3ac3e71269a341f5f', 'P5W2vTNPiy', 14, 78, NULL, NULL, 4, 1, 29, '1', 37, NULL, NULL, '2021-06-11 10:12:38', '2021-06-11 10:12:38', NULL, '1'),
(56, '9ac509c7c8f246098010ae76a0323432', '97JKxts3S1', 14, 60, NULL, NULL, 4, 1, 29, '1', 37, NULL, NULL, '2021-06-11 10:12:38', '2021-06-11 10:12:38', NULL, '1'),
(57, 'f6cb6b599bb14544930003e9cfac7b23', 'owyjeTvpjK', 15, 73, NULL, NULL, 4, 1, 29, '1', 38, NULL, NULL, '2021-06-11 11:13:23', '2021-06-11 11:13:23', NULL, '1'),
(58, '8f47c4f51e0e4d61afd6ef755e9a50c2', 'IxHptitAn8', 15, 14, NULL, NULL, 4, 1, 29, '1', 38, NULL, NULL, '2021-06-11 11:13:23', '2021-06-11 11:13:23', NULL, '1'),
(59, '447aa368950a472cb9578c67592095d9', 'snT5DIsHLt', 15, 23, NULL, NULL, 4, 1, 29, '1', 39, NULL, NULL, '2021-06-11 10:33:14', '2021-06-11 10:33:14', NULL, '1'),
(60, 'a249b346031a4bf2af1f18a2536b0cc2', '5Lp9NlAQAz', 15, 58, NULL, NULL, 4, 1, 29, '1', 39, NULL, NULL, '2021-06-11 10:33:14', '2021-06-11 10:33:14', NULL, '1'),
(61, '11668f4e43614c77b8766dcaebf94bb8', 'mPMkAEW49U', 16, 66, NULL, NULL, 4, 1, 29, '1', 40, NULL, NULL, '2021-06-11 10:33:33', '2021-06-11 10:33:33', NULL, '1'),
(62, 'ec510592968446ca8c655e4ed9de12e8', 'PoPP4oD8B3', 16, 74, NULL, NULL, 4, 1, 29, '1', 40, NULL, NULL, '2021-06-11 10:33:33', '2021-06-11 10:33:33', NULL, '1'),
(63, '5e86f4ed8e6546fb8a9ccfc8fc912ad9', 'ARiYlpPh9N', 16, 83, NULL, NULL, 4, 1, 29, '1', 41, NULL, NULL, '2021-06-11 10:34:29', '2021-06-11 10:34:29', NULL, '1'),
(64, '6653b00c839e4b69bffc1a59f23950bb', 'glclJqpFEV', 16, 28, NULL, NULL, 4, 1, 29, '1', 41, NULL, NULL, '2021-06-11 10:34:29', '2021-06-11 10:34:29', NULL, '1'),
(65, 'ecfbdaf11021441d84f7df9668b9211d', 'HbXEBhuJKV', 17, 44, NULL, NULL, 4, 1, 29, '1', 42, NULL, NULL, '2021-06-11 10:34:41', '2021-06-11 10:34:41', NULL, '1'),
(66, 'a06286a978c7491aa0ea5b972def8ec1', 'SAN1M0EVOz', 17, 63, NULL, NULL, 4, 1, 29, '1', 42, NULL, NULL, '2021-06-11 10:34:41', '2021-06-11 10:34:41', NULL, '1'),
(67, '4692843535bc47c7979d935b4fafad86', 'LYZkJwjFHB', 17, 13, NULL, NULL, 4, 1, 29, '1', 43, NULL, NULL, '2021-06-11 16:56:14', '2021-06-11 16:56:14', NULL, '1'),
(68, '193c4cd4a5c144c68706d84fe9008cfc', 'TAI9BFVh41', 17, 49, NULL, NULL, 4, 1, 29, '1', 43, NULL, NULL, '2021-06-11 16:56:14', '2021-06-11 16:56:14', NULL, '1'),
(69, 'cf39524e43854523a853555b3ab840cd', '4fNGIsMYwz', 17, 38, NULL, NULL, 4, 1, 29, '1', 44, NULL, NULL, '2021-06-12 14:39:56', '2021-06-12 14:39:56', NULL, '1'),
(70, '1874bc1dbc2a4fb59c1797408d094aca', 'QtdaWNPo3r', 17, 32, NULL, NULL, 4, 1, 29, '1', 44, NULL, NULL, '2021-06-12 14:39:56', '2021-06-12 14:39:56', NULL, '1'),
(71, '5c4b833e272c40f9ac5fe380b3e68708', 'vDE0ALdvzq', 17, 24, '2021-06-12 17:35:02', 29, 4, 1, 29, '1', 45, NULL, NULL, '2021-06-12 14:40:34', '2021-06-12 17:35:02', NULL, '1'),
(72, '4b3565a79bcf49afb9220e978595a98f', '8c8jsRuM2B', 17, 41, NULL, NULL, 4, 1, 29, '1', 45, NULL, NULL, '2021-06-12 14:40:34', '2021-06-12 14:40:34', NULL, '1'),
(75, '743beaad9a93446abe8eb79ab2859f5f', 'wkEblj8Fyl', 17, 24, NULL, NULL, 4, 1, 29, '1', 47, NULL, NULL, '2021-06-12 14:58:23', '2021-06-12 14:58:23', NULL, '1'),
(76, '976abf2823564d49bac216e6a0969d3e', 'U1wQ34vg8p', 17, 76, NULL, NULL, 4, 1, 29, '1', 47, NULL, NULL, '2021-06-12 14:58:23', '2021-06-12 14:58:23', NULL, '1'),
(77, 'c51ad36cae00469aac8bad0cea1ccc02', 'JCO6QicsMv', 17, 57, NULL, NULL, 4, 1, 29, '1', 48, NULL, NULL, '2021-06-12 14:59:32', '2021-06-12 14:59:32', NULL, '1'),
(78, '699c7a1a02664e4abdcf94aea7bee0e4', 'X0Q3bkzwPb', 17, 1, '2021-06-15 17:58:42', 36, 4, 1, 29, '1', 48, NULL, NULL, '2021-06-12 14:59:32', '2021-06-15 17:58:42', NULL, '1'),
(79, '2b7419d0873248dc90cbebc5fdbe142e', 'gzjqD9tU54', 17, 61, NULL, NULL, 4, 1, 29, '1', 49, NULL, NULL, '2021-06-12 14:59:34', '2021-06-12 14:59:34', NULL, '1'),
(80, '51c3fb0bdb394b318d05a8ddd3b05aa6', 'cdwUatzRvG', 17, 52, NULL, NULL, 4, 1, 29, '1', 49, NULL, NULL, '2021-06-12 14:59:34', '2021-06-12 14:59:34', NULL, '1'),
(81, 'e59bee5559a44c73bd6c068ac47bb89a', 'YVmZoqww8z', 18, 1, '2021-06-15 08:00:22', 36, 4, 1, 29, '1', 50, NULL, NULL, '2021-06-12 15:24:20', '2021-06-15 08:00:22', NULL, '1'),
(82, 'be25104af4434ba9875ab0a7ed4f3fba', 'R9XGtj56Ro', 18, 70, NULL, NULL, 4, 1, 29, '1', 50, NULL, NULL, '2021-06-12 15:24:20', '2021-06-12 15:24:20', NULL, '1'),
(83, '48a26ff6d4a44c52a952d34583b9c31c', 'bxhxMRq82J', 18, 36, NULL, NULL, 4, 1, 29, '1', 51, NULL, NULL, '2021-06-13 07:56:16', '2021-06-13 07:56:16', NULL, '1'),
(84, '4e026a1b27544ff982da31062c5d83c4', 'Yy2txtkdGi', 18, 40, NULL, NULL, 4, 1, 29, '1', 51, NULL, NULL, '2021-06-13 07:56:16', '2021-06-13 07:56:16', NULL, '1'),
(85, '73acd5d7d69c46fc8ddbf49bcf2a4433', 'qlKS2K3mdh', 19, 1, '2021-06-14 20:51:15', 36, 4, 1, 29, '1', 52, NULL, NULL, '2021-06-14 03:10:17', '2021-06-14 20:51:15', NULL, '1'),
(86, '2b76050b8c6944469501d5c730a9e0df', 'UmonCn2HeD', 19, 7, NULL, NULL, 4, 1, 29, '1', 52, NULL, NULL, '2021-06-14 03:10:17', '2021-06-14 03:10:17', NULL, '1'),
(87, 'ce8dbbde80fc4f74b5164bbf2015664c', '6Fju5YnwFY', 19, 80, NULL, NULL, 4, 1, 29, '1', 53, NULL, NULL, '2021-06-14 03:10:58', '2021-06-14 03:10:58', NULL, '1'),
(88, '9a6ff156550b4a7ebd5bdf8a597c80ff', 'mnjxlB8U8S', 19, 1, '2021-06-14 20:57:28', 36, 4, 1, 29, '1', 53, NULL, NULL, '2021-06-14 03:10:58', '2021-06-14 20:57:28', NULL, '1'),
(89, '3c7d5c341d534151ba75e884a6a65d1a', 'R8aa1Qt9IQ', 19, 54, NULL, NULL, 4, 1, 29, '1', 54, NULL, NULL, '2021-06-14 03:11:06', '2021-06-14 03:11:06', NULL, '1'),
(90, '2b610c3ff56247a1bab8788eb02e5875', 'vqb2vmFc56', 19, 19, NULL, NULL, 4, 1, 29, '1', 54, NULL, NULL, '2021-06-14 03:11:06', '2021-06-14 03:11:06', NULL, '1'),
(91, '81af3823be454e628e3d7b31680b59f2', 'drIQFvd2Ox', 19, 11, NULL, NULL, 4, 1, 29, '1', 55, NULL, NULL, '2021-06-14 03:13:14', '2021-06-14 03:13:14', NULL, '1'),
(92, '8b6dad687aa74d47a5a233e47f74a1af', 'y3OycQaoCU', 19, 5, NULL, NULL, 4, 1, 29, '1', 55, NULL, NULL, '2021-06-14 03:13:14', '2021-06-14 03:13:14', NULL, '1'),
(93, 'fdecae0ea6174abe974c71995b99203a', 'uniX8QULQK', 19, 1, '2021-06-14 15:47:18', 36, 4, 1, 36, '1', 56, NULL, NULL, '2021-06-14 15:41:09', '2021-06-14 15:47:18', NULL, '1'),
(94, '7993c1b1208549aca68915ded8562e4d', 'IQ9hPsY1Wr', 19, 72, NULL, NULL, 4, 1, 36, '1', 56, NULL, NULL, '2021-06-14 15:41:09', '2021-06-14 15:41:09', NULL, '1'),
(95, '90011293520049a0ac7a8737b6761ec1', '4XXjmF1kU7', 19, 12, NULL, NULL, 4, 1, 36, NULL, 57, NULL, NULL, '2021-06-14 15:44:01', '2021-06-14 15:44:01', NULL, '1'),
(96, 'd2497fbac6b647ac97647f3c18020173', '1HqYTSvVJq', 19, 10, NULL, NULL, 4, 1, 36, NULL, 58, NULL, NULL, '2021-06-15 07:55:37', '2021-06-15 07:55:37', NULL, '1'),
(97, '8ca26915d6c5425e847bb11c7056bb76', '9eE0A2T5cz', 20, 16, NULL, NULL, 4, 1, 36, NULL, 59, NULL, NULL, '2021-06-17 09:10:19', '2021-06-17 09:10:19', NULL, '1'),
(98, '0e62b69fd91f454fbea5d81eb9a1c606', 'mIGCeofGHu', 20, 46, NULL, NULL, 4, 1, 36, NULL, 60, NULL, NULL, '2021-06-17 11:23:04', '2021-06-17 11:23:04', NULL, '1'),
(99, '77f801fc596c49e0b42a4d415c1462ba', 'RMVKILkrVC', 20, 18, NULL, NULL, 4, 1, 29, NULL, 61, NULL, NULL, '2021-06-17 11:23:40', '2021-06-17 11:23:40', NULL, '1'),
(100, 'bb7d5d14d26d4cd49a9e9b7310952a19', 'RyslCE9Qzx', 20, 30, NULL, NULL, 4, 1, 29, NULL, 62, NULL, NULL, '2021-06-17 11:24:22', '2021-06-17 11:24:22', NULL, '1'),
(101, '53c2469bbabb42e3a24523913c0a0f88', 'BWlbj7p0Vc', 20, 4, NULL, NULL, 4, 1, 29, NULL, 63, NULL, NULL, '2021-06-17 11:25:15', '2021-06-17 11:25:15', NULL, '1'),
(102, '88fb32227d9645c68ae9fd0c303f0357', '45AF7KTJXW', 20, 17, NULL, NULL, 4, 1, 36, NULL, 64, NULL, NULL, '2021-06-17 11:48:52', '2021-06-17 11:48:52', NULL, '1'),
(103, 'cd0281367d7f44e998ad2322b41deecf', 'CdE7HZTkhj', 20, 69, NULL, NULL, 4, 1, 29, NULL, 65, '1', 1, '2021-06-17 11:51:11', '2021-06-17 11:51:11', NULL, '1'),
(108, '259fcb5d92614db7be4d1ce81cc77519', 'pXKJz5jSb5', 21, 55, NULL, NULL, 4, 1, 36, NULL, 70, NULL, NULL, '2021-06-19 11:35:55', '2021-06-19 11:35:55', NULL, '1'),
(109, '1ff87920d9e24ba68a9ff7c8bd88c79f', 'wXJX8z5YYq', 21, 48, NULL, NULL, 4, 1, 36, NULL, 71, NULL, NULL, '2021-06-19 11:40:12', '2021-06-19 11:40:12', NULL, '1'),
(110, 'd4b4f220e5404a61aefee2846c41656d', 'qC6SlFWzt8', 21, 2, NULL, NULL, 4, 1, 36, NULL, 72, NULL, NULL, '2021-06-19 12:03:58', '2021-06-19 12:03:58', NULL, '1'),
(111, '3e524f27f2f641a48a79ae7213ec5eda', 'yQ40F5maQM', 21, 35, NULL, NULL, 4, 1, 36, NULL, 73, NULL, NULL, '2021-06-19 12:06:12', '2021-06-19 12:06:12', NULL, '1'),
(112, '8dcd1ab324f84851a71c91c2d3977e98', 'gE9baT31sf', 21, 75, NULL, NULL, 4, 1, 36, NULL, 74, NULL, NULL, '2021-06-19 12:09:18', '2021-06-19 12:09:18', NULL, '1'),
(113, '5c555d32e4314caba202f8c36e935a5f', 'uUo0ZcpoLH', 21, 25, NULL, NULL, 4, 1, 36, NULL, 75, NULL, NULL, '2021-06-19 12:12:28', '2021-06-19 12:12:28', NULL, '1'),
(114, '68fbc5d746bd4149ac5b137383d027b7', 'Qv3oGuJzLi', 21, 53, NULL, NULL, 4, 1, 36, NULL, 76, NULL, NULL, '2021-06-19 12:14:23', '2021-06-19 12:14:23', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `uuid` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL COMMENT 'The role of this admin user. Referencing the role table.',
  `surname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othername` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_email_at` timestamp NULL DEFAULT NULL,
  `verified_email_expire_at` timestamp NULL DEFAULT NULL,
  `verified_phone_at` timestamp NULL DEFAULT NULL,
  `verified_phone_expire_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_action` timestamp NULL DEFAULT NULL,
  `disabled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uuid`, `username`, `password`, `role`, `surname`, `firstname`, `othername`, `phone`, `email`, `verified_email_at`, `verified_email_expire_at`, `verified_phone_at`, `verified_phone_expire_at`, `avatar`, `last_login`, `last_action`, `disabled_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'be71e6db4af011eb81e1024237d544ad', 'udorr', '$2y$10$b7HY2wXxaLbEzwM2RJRVYeqem53PsA2jrLb6O5pW5OK2oi.qiEBpS', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-30 23:45:41', '2020-12-30 23:45:41', NULL),
(4, 'ead44228645d11eb95d00242a4f066ad', 'udorrfefe', '$2y$10$BYhKERY2EnocjdsPlwbx0O1iU3f58/4JvfH03GIgF1whpvPQ/nLhq', 1, 'Okparaefe', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-01 08:20:09', '2021-02-01 08:20:09', NULL),
(12, '75f78cedaeed11ebaeeb0242ea80c1b2', 'user2', '$2y$10$S0EUe/mwh4JwGhbaBUEmJu7EJxHZiPCt/XCBF6by4E2mnP1Cam1Xu', 1, 'Okparaefe', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdfe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 05:34:07', '2021-05-07 05:34:07', NULL),
(13, NULL, 'udorrr', '$2y$10$ooHdgeJwcDWp4zqGSUpEgeH7jGHlNZW3E9ANfToCXkXGcD0Frbmje', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-05 23:25:24', '2021-06-05 23:25:24', NULL),
(14, NULL, 'udorrrd', '$2y$10$3wutyTKyxB1S1lIf7OGOhuBNVISGEhjM/n7TJe3c1EmOSytxFJ336', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdfdd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-07 07:46:38', '2021-06-07 07:46:38', NULL),
(18, NULL, 'udorrrdds', '$2y$10$ebJygzi154NLG06HRZ1GPOfB2gg37K7A6EUPbf/0C3EW3EoGBKR0i', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdfdds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-07 22:04:35', '2021-06-07 22:04:35', NULL),
(19, NULL, 'udorrrddsf', '$2y$10$1X9JIVS1cvcP5oX.CC5JuO7lWQYHbBbYLRHyuyjso2Donxm2VWjX2', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comulfdfddsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-07 22:20:39', '2021-06-07 22:20:39', NULL),
(20, NULL, 'udorrrddsfs', '$2y$10$zB1d5u5APPCewRK/lkNmreCHkUP2q1z08QAmmosUIIYqg826ttBkC', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comsulfdfddsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 09:21:28', '2021-06-08 09:21:28', NULL),
(22, '8a429d9c705d41e690bb9bcc85f77409', 'udorrrddsfss', '$2y$10$61TvzgTLHvPWW0Gkta9I5u.7jhKf4hhcrIFGQczNdDPl30kEj5Cby', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comssulfdfddsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 09:52:13', '2021-06-08 09:52:13', NULL),
(24, '927d55a9a4e647bc8697764878d6d8d2', 'udorrrddsfsss', '$2y$10$GzU5UZJWg4BLaPtaCsH13.T8x/Nr6Ve6ewYPabVvsxqxDuTJaWepy', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comssulfdfddsfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 10:31:41', '2021-06-08 10:31:41', NULL),
(25, '56e7d91d7cae40b1ae7caa61895c13d9', 'udorrrddsfssse', '$2y$10$bHfhZ8ZcVoJAQXYc/kkN2uY5IOY6WWTNA8LlU3CgdsgAwzq5vigfy', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comssulfdfddsfse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 14:19:52', '2021-06-08 14:19:52', NULL),
(26, 'a4f4db4fac4c4a54a5681657addf825c', 'udorrrddsfssses', '$2y$10$tYOh.YECqyU5sRGXjxBZc.4d357JF9ynR0sXzbkwtQ7yjhB27rsc2', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gmail.comssulfdfddsfsew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 15:02:29', '2021-06-08 15:02:29', NULL),
(27, 'b3ea8d3f736541e5aa6e70d79f7771ca', 'udo', '$2y$10$XNxnmG1OKul9qWbFHB7Vd.7eOwfaihNhH8nWaj7490/ULp8ZtmVCa', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gma.f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 15:04:08', '2021-06-08 15:04:08', NULL),
(28, '139b96b6b7294640950cae6e8c4bdcfb', 'udof', '$2y$10$yBnrUO/AkvDCL9aEGZ8R.uknFJgJE8.IRcHYOxLzq5F5HeNCSjlhK', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gma.ff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 15:23:36', '2021-06-08 15:23:36', NULL),
(29, '5cd5e4ae8388457cb1eb78acc433da04', 'udofa', '$2y$10$6Jwa57NdqGsCSdhJUIPgWeCnwzHrO2ThFUqzEq1DQzoNT.yWSOFTe', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gma.ffa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-08 15:33:14', '2021-06-08 15:33:14', NULL),
(34, '17a39b58d6bf4b2686cb7203dda4e596', 'udofaa', '$2y$10$CQYDQqQToKKJpqL9ag4X8O09epy.ltishfj4MahE4cPcfaPwB31Se', 1, 'faoopp', 'jakata', NULL, '080334434343', 'nelsoooo@fdf.com', '2021-06-16 16:40:32', '2021-06-16 16:40:44', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-09 09:39:41', '2021-06-09 14:28:38', NULL),
(35, 'ab13ced671664630851fe19e01e7c1ee', 'udofaat', '$2y$10$CGcx0PoiKRGnSEOMiuEMHOWDkDImkaTEePHNC0Tn58.AUwTM6QvyS', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gma.ffaat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-09 09:46:31', '2021-06-09 09:46:31', NULL),
(36, 'e0e53c0a4a0943e39adc2a3ee9fd913d', 'nwamuo', '$2y$10$xHSzkMWTvmOKbT34w.zTp.xpzeBWIz1wVlaHP3bW4vXQu3eyyB/Dq', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gma.ffaatd', '2021-06-18 23:30:46', '2022-06-18 23:30:46', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-14 15:32:16', '2021-06-18 23:30:46', NULL),
(39, '7e91c267cbce48b684da8b0492295ae0', 'udofaataaa', '$2y$10$QzFMzhsM5/TFrLLkh4Tauu7PTjBFXuxEAQRaAgNn6SjVejNVdMdqi', 1, 'Okpara', 'Ezugom', NULL, '08030659872', 'nelsonsmrt@gma.ffaatds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-18 12:56:42', '2021-06-18 12:56:42', NULL),
(41, '81090a69c3a64ad88b96ed32dc2f35e2', 'Osuofia', '$2y$10$gtj/M8sx6k47G0C2Ybe/9eE1cJm8Opw5ZJo.vWaV8v0d.fF/.oR3S', 1, 'Mpa king', 'Ndu', NULL, '08030659872', 'conja@gma.ffaatds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-19 10:20:25', '2021-06-19 10:20:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_account_detail`
--

CREATE TABLE `user_account_detail` (
  `id` int NOT NULL,
  `uuid` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `bank_code` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_default` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT 'admin use this to deactive this account'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_account_detail`
--

INSERT INTO `user_account_detail` (`id`, `uuid`, `user_id`, `acc_name`, `acc_no`, `bank_code`, `is_default`, `created_at`, `updated_at`, `deleted_at`, `is_active`) VALUES
(1, '13rerqerwef', 12, 'OKPARA CHUKWUEZUGO NELSON', '0053006315', '058', '1', '2020-07-03 06:49:31', '2020-07-04 16:39:57', NULL, '1'),
(20, '59bfcf3d56a245528cd11409327b7b3b', 1, 'Chukwuezugo Okpara', '2938849399', '058', NULL, '2021-06-12 06:54:46', '2021-06-12 06:56:50', '2021-06-12 06:56:50', '1'),
(21, '9d567a9d3529480aa9532a36fcfc085a', 1, 'Chukwuezugo Okpara', '2938849399', '058', NULL, '2021-06-14 20:33:29', '2021-06-14 20:33:29', NULL, '1'),
(22, '9d7e83d5250543958d0696c7ba8ed219', 1, 'Chukwuezugo Okpara', '2938849399', '058', NULL, '2021-06-15 03:02:35', '2021-06-15 03:02:35', NULL, '1'),
(23, '8140b9abcf3848c589da63531bb6ec91', 36, 'Obinna Nwamuo', '0242373314', '058', NULL, '2021-06-15 03:04:38', '2021-06-15 03:04:38', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE `user_activity_log` (
  `id` int NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `activity_type_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `affected_user_id` int DEFAULT NULL,
  `old_value` varchar(100) DEFAULT NULL,
  `new_value` varchar(100) DEFAULT NULL,
  `visibility` enum('1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stub` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_desc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `stub`, `role_desc`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user', 'players', NULL, NULL),
(2, 'admin', 'admin', 'the manager, has lesser privilege', '2020-01-17 11:51:12', '2020-01-17 11:51:12'),
(3, 'super admin', 'super_admin', 'Has all privilages', '2020-01-17 11:51:12', '2020-01-17 11:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `comm_channel_id` int NOT NULL COMMENT 'verification medium e.g email,phone,etc  ',
  `user_activity_type` int NOT NULL COMMENT 'user activity to be verified e.g registration, withdrawal, transfer,etc',
  `code` varchar(36) NOT NULL COMMENT 'verification code sent to user',
  `expires_at` timestamp NULL DEFAULT NULL,
  `attempted_at` timestamp NULL DEFAULT NULL COMMENT 'incase this verification fails i.e either the code was incorrect or whatever, this field tells when the user made the verification attempt.',
  `is_verified` enum('1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `visibility` enum('1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `comm_channel_id`, `user_activity_type`, `code`, `expires_at`, `attempted_at`, `is_verified`, `created_at`, `updated_at`, `deleted_at`, `visibility`) VALUES
(3, 39, 1, 1, 'bcCNCJMAo4A7YAordE3UUd6oa9RANG', '2021-06-19 12:56:42', NULL, NULL, '2021-06-18 12:56:42', '2021-06-18 12:56:42', NULL, NULL),
(4, 36, 1, 1, 'SntiztNQRy2HW9IZLRWhRQD9YQYzH1', '2021-06-19 19:35:07', NULL, NULL, '2021-06-18 19:35:07', '2021-06-18 19:52:49', '2021-06-18 19:52:49', NULL),
(5, 36, 1, 1, 'GHP6hAHMY8wd5S6M7MkZZsa2jg4Aiz', '2021-06-19 19:35:29', NULL, NULL, '2021-06-18 19:35:29', '2021-06-18 19:52:49', '2021-06-18 19:52:49', NULL),
(6, 36, 1, 1, '7cSWUFqAIspsnZJfDqEEbFQPoLCxaQ', '2021-06-19 19:52:49', NULL, NULL, '2021-06-18 19:52:49', '2021-06-18 19:53:11', '2021-06-18 19:53:11', NULL),
(7, 36, 1, 1, 'A8SxFswECqA8UXEk4rSzEhLXScOcNe', '2021-06-19 19:53:11', NULL, '1', '2021-06-18 19:53:11', '2021-06-18 21:17:39', NULL, NULL),
(8, 36, 1, 1, 'dty9ANmiCRaK17euGXqyGs1LNNwCD9', '2021-06-19 23:29:56', NULL, '1', '2021-06-18 23:29:56', '2021-06-18 23:30:46', NULL, NULL),
(9, 36, 1, 1, 'ks1bmBN4VmF1rIyh7k455ZTEnGqNSe', '2021-06-20 08:05:52', NULL, NULL, '2021-06-19 08:05:52', '2021-06-19 08:12:15', '2021-06-19 08:12:15', NULL),
(10, 36, 1, 1, 'fscsFemN3Bq69CvVPj7kzCCW9zhH1A', '2021-06-20 08:12:15', NULL, NULL, '2021-06-19 08:12:15', '2021-06-19 09:34:21', '2021-06-19 09:34:21', NULL),
(11, 36, 1, 1, 'hwp9GGAgrw2r89Z9pAUH5csO4D9sHh', '2021-06-20 09:34:21', NULL, NULL, '2021-06-19 09:34:21', '2021-06-19 09:37:16', '2021-06-19 09:37:16', NULL),
(12, 36, 1, 1, '4G7g6XFaiU6ktktmLkV8pxGiQIlbIp', '2021-06-20 09:37:16', NULL, NULL, '2021-06-19 09:37:16', '2021-06-19 09:46:01', '2021-06-19 09:46:01', NULL),
(13, 36, 1, 1, '1JoWRXbttgXHvk6RPt1XZUC2KZjC2L', '2021-06-20 09:46:01', NULL, NULL, '2021-06-19 09:46:01', '2021-06-19 09:46:57', '2021-06-19 09:46:57', NULL),
(14, 36, 1, 1, 'maUgPyNPQzrXlvM4RzvSG1FyrEkFAY', '2021-06-20 09:46:57', NULL, NULL, '2021-06-19 09:46:58', '2021-06-19 09:48:36', '2021-06-19 09:48:36', NULL),
(15, 36, 1, 1, '00rU7zvWuOPEZkisAtAYnQrkxteorG', '2021-06-20 09:48:36', NULL, NULL, '2021-06-19 09:48:36', '2021-06-19 09:51:41', '2021-06-19 09:51:41', NULL),
(16, 36, 1, 1, 'KUVqdYaPZRtjCJvMO2aV2dIHFAcrpX', '2021-06-20 09:51:41', NULL, NULL, '2021-06-19 09:51:41', '2021-06-19 09:54:38', '2021-06-19 09:54:38', NULL),
(17, 36, 1, 1, 'tXcBQcfZzb35NetwM3jjmIFlgZUAKy', '2021-06-20 09:54:38', NULL, NULL, '2021-06-19 09:54:38', '2021-06-19 09:55:40', '2021-06-19 09:55:40', NULL),
(18, 36, 1, 1, 'y8lC5NEbVpk4i6n9chi9ZrGgOATD4e', '2021-06-20 09:55:40', NULL, NULL, '2021-06-19 09:55:40', '2021-06-19 09:59:43', '2021-06-19 09:59:43', NULL),
(19, 36, 1, 1, 'ScpLBe0UQaQNvmeEbu2pgu2Ag7ZI7s', '2021-06-20 09:59:43', NULL, NULL, '2021-06-19 09:59:43', '2021-06-19 10:01:52', '2021-06-19 10:01:52', NULL),
(20, 36, 1, 1, 'symKwQ8EpHKvS9poOSsJPeQj5sTnIw', '2021-06-20 10:01:52', NULL, NULL, '2021-06-19 10:01:52', '2021-06-19 10:02:41', '2021-06-19 10:02:41', NULL),
(21, 36, 1, 1, 'fjmTct8AgtBzFBeX1OFSJzkckIFa0k', '2021-06-20 10:02:41', NULL, NULL, '2021-06-19 10:02:41', '2021-06-19 10:09:33', '2021-06-19 10:09:33', NULL),
(22, 36, 1, 1, 'hZvu1Cf8ADevW1Q6ILHD9Bk3KfSBh8', '2021-06-20 10:09:33', NULL, NULL, '2021-06-19 10:09:33', '2021-06-19 10:09:33', NULL, NULL),
(24, 41, 1, 1, 'UDJ7uBJB7S3OFXMAjlSKS05VkRsU3T', '2021-06-20 10:20:25', NULL, NULL, '2021-06-19 10:20:25', '2021-06-19 10:20:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int NOT NULL,
  `uuid` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` int NOT NULL COMMENT 'this is the user that has this currency wallet',
  `amount` int NOT NULL DEFAULT '0',
  `last_amount_credited` int NOT NULL DEFAULT '0',
  `last_amount_debited` int NOT NULL DEFAULT '0',
  `is_withdrawable` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '1' COMMENT 'can user withraw from this currency wallet',
  `is_tradable` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT 'can user trade with this value in this wallet?',
  `is_transferable` enum('1') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `disabled_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This wallet holds each users p2p assets values' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `uuid`, `user_id`, `amount`, `last_amount_credited`, `last_amount_debited`, `is_withdrawable`, `is_tradable`, `is_transferable`, `created_at`, `updated_at`, `deleted_at`, `disabled_at`) VALUES
(140, 'fsdfasfrerwe', 1, 1700, 0, 300, '1', '1', '1', '2021-04-27 13:11:33', '2021-04-27 16:04:17', NULL, '2021-04-27 13:11:33'),
(141, 'fsdfasfrerwescsc', 1, 610, 201, 201, '1', '1', '1', '2021-04-27 13:11:33', '2021-05-14 07:13:35', NULL, '2021-04-27 13:11:33'),
(148, '01163c04642d4768a58a366a4017266b', 1, 300, 21, 0, '1', '1', '1', '2021-05-07 06:20:09', '2021-05-07 06:28:35', NULL, '2021-05-07 05:20:09'),
(149, 'c8254173c5ff406fba43d0ef24598f85', 27, 1000, 0, 0, '1', '1', '1', '2021-06-08 15:04:08', '2021-06-08 15:04:08', NULL, NULL),
(150, 'f650748b50b44059b05afb05ee400c0d', 28, 10000, 0, 0, '1', '1', '1', '2021-06-08 15:23:36', '2021-06-08 15:23:36', NULL, NULL),
(151, 'bd3c6d29e36f41f1baca2ddec12db606', 29, 42050, 20000, 3, '1', '1', '1', '2021-06-08 15:33:14', '2021-06-17 11:51:11', NULL, NULL),
(154, 'f9bad279e296446289e526510196e264', 34, 10000, 0, 0, '1', '1', '1', '2021-06-09 09:39:41', '2021-06-09 09:39:41', NULL, NULL),
(155, '6232b14fdd5d4345bede296ef5d83786', 35, 100000, 0, 0, '1', '1', '1', '2021-06-09 09:46:31', '2021-06-09 09:46:31', NULL, NULL),
(156, '5cdf4bc2f5db4d2097389e5e2a197b09', 36, 1961, 2000, 3, '1', '1', '1', '2021-06-14 15:32:16', '2021-06-19 12:14:23', NULL, NULL),
(157, '0121db38754b4d6bafb64b80e3ebb957', 39, 0, 0, 0, '1', '1', '1', '2021-06-18 12:56:42', '2021-06-18 12:56:42', NULL, NULL),
(159, '21a26cd13c534beda19a3b637e36cdef', 41, 0, 0, 0, '1', '1', '1', '2021-06-19 10:20:25', '2021-06-19 10:20:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_credit_log`
--

CREATE TABLE `wallet_credit_log` (
  `id` int NOT NULL,
  `uuid` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'transaction unique id',
  `wallet_id` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` int NOT NULL,
  `activity_type_id` int NOT NULL,
  `payment_provider_id` int NOT NULL COMMENT 'references payment channel table',
  `payment_reference` varchar(100) DEFAULT NULL COMMENT 'BANK',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` enum('1','0') NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL,
  `reference` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This wallet holds p2p deposit details' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wallet_credit_log`
--

INSERT INTO `wallet_credit_log` (`id`, `uuid`, `wallet_id`, `user_id`, `amount`, `activity_type_id`, `payment_provider_id`, `payment_reference`, `created_at`, `visibility`, `updated_at`, `deleted_at`, `status`, `reference`) VALUES
(27, 'ed744e4659f44a2b84cd0e513a34afc2', 148, 1, 21, 1, 1, NULL, '2021-05-07 06:20:09', '1', '2021-05-07 06:20:09', NULL, NULL, NULL),
(28, '8f3d105753114e9e944304f6d29fdd42', 148, 1, 21, 1, 1, NULL, '2021-05-07 06:28:35', '1', '2021-05-07 06:28:35', NULL, NULL, NULL),
(37, '8d908e3bf3624835a7ef13bbb784baaa', 151, 29, 20000, 1, 2, NULL, '2021-06-11 16:51:58', '1', '2021-06-11 16:51:58', NULL, NULL, NULL),
(38, '7dc3479ec5f6462da8885808f9283ab8', 151, 29, 20000, 1, 2, 'nrefejfef', '2021-06-11 16:53:32', '1', '2021-06-11 16:53:32', NULL, NULL, NULL),
(39, '4c07eaf064ec472a85ce13b46b382bee', 151, 29, 20000, 1, 2, 'nrefejfef', '2021-06-11 16:54:26', '1', '2021-06-11 16:54:26', NULL, NULL, NULL),
(40, '8ff51c6d694244a2b4b97f089b5e16d5', 151, 29, 20000, 1, 2, '55230494', '2021-06-11 23:06:33', '1', '2021-06-11 23:06:33', NULL, NULL, NULL),
(41, '527479c17a4443b2bcf9a8c2254e5a6e', 151, 29, 20000, 12, 2, '55230494', '2021-06-14 10:58:21', '1', '2021-06-14 10:58:21', NULL, NULL, NULL),
(42, '8828d08e49f14801afdfb95792045adc', 151, 29, 20000, 12, 2, '55230494', '2021-06-14 11:03:35', '1', '2021-06-14 11:03:35', NULL, NULL, NULL),
(43, 'bf79ce16a7bc4c48b06462af4523eec6', 156, 36, 2000, 12, 2, '55230494', '2021-06-14 15:40:46', '1', '2021-06-14 15:40:46', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_debit_log`
--

CREATE TABLE `wallet_debit_log` (
  `id` int NOT NULL,
  `uuid` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'transaction unique id',
  `wallet_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `payment_reference` varchar(100) DEFAULT NULL COMMENT 'BANK',
  `activity_type_id` int NOT NULL,
  `payment_id` int DEFAULT NULL,
  `withdrawal_id` int DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `package_option_id` int DEFAULT NULL,
  `bank_acc_id` int DEFAULT NULL COMMENT 'BANK',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` enum('1','0') NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL,
  `reference` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This wallet holds p2p deposit details' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wallet_debit_log`
--

INSERT INTO `wallet_debit_log` (`id`, `uuid`, `wallet_id`, `user_id`, `amount`, `payment_reference`, `activity_type_id`, `payment_id`, `withdrawal_id`, `session_id`, `package_option_id`, `bank_acc_id`, `created_at`, `visibility`, `updated_at`, `deleted_at`, `status`, `reference`) VALUES
(1, '6a9fa415a5e04f4a8660b43a0fcf7e39', 141, 1, 21, NULL, 2, 10, 1, NULL, NULL, NULL, '2021-04-28 05:56:39', '1', '2021-04-28 05:56:39', NULL, NULL, NULL),
(2, 'a34c9d54b2a541ef8b1cb0f94550b870', 141, 1, 21, NULL, 11, 10, 1, NULL, NULL, 1, '2021-04-28 06:34:05', '1', '2021-04-28 06:34:05', NULL, NULL, NULL),
(24, '26acbe4af49246e69333e9e5ff538cdd', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:40:32', '1', '2021-06-10 22:40:32', NULL, NULL, NULL),
(25, '51afcda979264de7a0b8a7d2c7f147c0', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:45:13', '1', '2021-06-10 22:45:13', NULL, NULL, NULL),
(27, '8b2ce24092464583b127f6e4f7bba79d', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:47:36', '1', '2021-06-10 22:47:36', NULL, NULL, NULL),
(28, '91b649f965454f4b8627bdeabc5682ba', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:48:19', '1', '2021-06-10 22:48:19', NULL, NULL, NULL),
(29, 'a904147998a4498ab9dcc834db2bcdaf', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:49:03', '1', '2021-06-10 22:49:03', NULL, NULL, NULL),
(30, 'a41e5a1f2fe743e392f480ea833958c0', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:53:05', '1', '2021-06-10 22:53:05', NULL, NULL, NULL),
(32, 'c93b7edfcec9465492afccfb40b729fc', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:54:29', '1', '2021-06-10 22:54:29', NULL, NULL, NULL),
(33, '45a767eaa33f4b50b15b429488b0aa5c', 151, 29, 3, NULL, 2, 10, 1, 1, 2, NULL, '2021-06-10 22:59:39', '1', '2021-06-10 22:59:39', NULL, NULL, NULL),
(34, 'b3ba1a83a59f4b2e96cb9badc530e728', 151, 29, 3, NULL, 2, 10, 1, 1, 4, NULL, '2021-06-10 23:01:32', '1', '2021-06-10 23:01:32', NULL, NULL, NULL),
(35, '35abb14f91c448faacf14613fc4c42f9', 151, 29, 3, NULL, 2, 10, 1, 1, 4, NULL, '2021-06-10 23:04:12', '1', '2021-06-10 23:04:12', NULL, NULL, NULL),
(37, 'daa2abfec03c45f0a72452b3745295a9', 151, 29, 3, NULL, 2, 10, 1, 2, 4, NULL, '2021-06-11 09:03:17', '1', '2021-06-11 09:03:17', NULL, NULL, NULL),
(39, '9ab130a15ba743268f5a95433d48d292', 151, 29, 3, NULL, 2, 10, 1, 3, 4, NULL, '2021-06-11 09:04:41', '1', '2021-06-11 09:04:41', NULL, NULL, NULL),
(41, '115199b7410e402c82242b704dbb3a27', 151, 29, 3, NULL, 2, 10, 1, 4, 4, NULL, '2021-06-11 09:06:54', '1', '2021-06-11 09:06:54', NULL, NULL, NULL),
(42, '4a7acc7aa67d439b8e3e5f9e32454a4a', 151, 29, 3, NULL, 2, 10, 1, 4, 4, NULL, '2021-06-11 09:07:53', '1', '2021-06-11 09:07:53', NULL, NULL, NULL),
(44, '736bc7406f5043588c6ee9d271ee11b4', 151, 29, 3, NULL, 2, 10, 1, 6, 4, NULL, '2021-06-11 09:14:53', '1', '2021-06-11 09:14:53', NULL, NULL, NULL),
(45, 'b758e7562431418cab88c76b4b0aeee9', 151, 29, 3, NULL, 2, 10, 1, 7, 4, NULL, '2021-06-11 09:15:52', '1', '2021-06-11 09:15:52', NULL, NULL, NULL),
(46, '49fd7849db8d4becbb8ad25244cb78b4', 151, 29, 3, NULL, 2, 10, 1, 7, 4, NULL, '2021-06-11 09:17:58', '1', '2021-06-11 09:17:58', NULL, NULL, NULL),
(47, '28b4c0509245482a9af3f9d521d456b4', 151, 29, 3, NULL, 2, 10, 1, 8, 4, NULL, '2021-06-11 09:40:15', '1', '2021-06-11 09:40:15', NULL, NULL, NULL),
(48, 'a2bb40da268242c6b825ba2ddb5ff2ee', 151, 29, 3, NULL, 2, 10, 1, 8, 4, NULL, '2021-06-11 09:40:58', '1', '2021-06-11 09:40:58', NULL, NULL, NULL),
(49, '65cb797ed65d40dfbdb1ab9f62a93cbe', 151, 29, 3, NULL, 2, 10, 1, 8, 4, NULL, '2021-06-11 09:42:08', '1', '2021-06-11 09:42:08', NULL, NULL, NULL),
(50, '748e33daed1e4cbbbb9c177a53598550', 151, 29, 3, NULL, 2, 10, 1, 9, 4, NULL, '2021-06-11 09:42:22', '1', '2021-06-11 09:42:22', NULL, NULL, NULL),
(51, '72633bd56afd4a20b3b6ffa6204caade', 151, 29, 3, NULL, 2, 10, 1, 10, 4, NULL, '2021-06-11 09:48:51', '1', '2021-06-11 09:48:51', NULL, NULL, NULL),
(52, '6db323bc6a4f46f4b1798de8d6e48903', 151, 29, 3, NULL, 2, 10, 1, 11, 4, NULL, '2021-06-11 10:49:01', '1', '2021-06-11 10:49:01', NULL, NULL, NULL),
(53, '4f1efa320aea425c981d3d9a5471c4b7', 151, 29, 3, NULL, 2, 10, 1, 12, 4, NULL, '2021-06-11 10:59:41', '1', '2021-06-11 10:59:41', NULL, NULL, NULL),
(54, '75e95f5526a64100bf43bce3ca7240a1', 151, 29, 3, NULL, 2, 10, 1, 13, 4, NULL, '2021-06-11 10:00:44', '1', '2021-06-11 10:00:44', NULL, NULL, NULL),
(55, '2b995dc1cf534879bc65b69076e6ece5', 151, 29, 3, NULL, 2, 10, 1, 14, 4, NULL, '2021-06-11 10:12:38', '1', '2021-06-11 10:12:38', NULL, NULL, NULL),
(56, 'a5cb9248d72f459c8055b3b9d70153e1', 151, 29, 3, NULL, 2, 10, 1, 15, 4, NULL, '2021-06-11 11:13:23', '1', '2021-06-11 11:13:23', NULL, NULL, NULL),
(57, '51272f0cdfd140c28989e7b58fd85f9a', 151, 29, 3, NULL, 2, 10, 1, 15, 4, NULL, '2021-06-11 10:33:14', '1', '2021-06-11 10:33:14', NULL, NULL, NULL),
(58, '9106d856bb9f4c86878556903e695b9b', 151, 29, 3, NULL, 2, 10, 1, 16, 4, NULL, '2021-06-11 10:33:33', '1', '2021-06-11 10:33:33', NULL, NULL, NULL),
(59, '012690ed192a484683e47df4e2aa8351', 151, 29, 3, NULL, 2, 10, 1, 16, 4, NULL, '2021-06-11 10:34:29', '1', '2021-06-11 10:34:29', NULL, NULL, NULL),
(60, 'c8f5e93c9b3a49f08a0cd78779eed519', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-11 10:34:41', '1', '2021-06-11 10:34:41', NULL, NULL, NULL),
(61, 'acb0a867bf764c15afc4ad020bccab9b', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-11 16:56:14', '1', '2021-06-11 16:56:14', NULL, NULL, NULL),
(62, 'fb50d21ea3c945b4bab3fbb9ee5ee7f5', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-12 14:39:56', '1', '2021-06-12 14:39:56', NULL, NULL, NULL),
(63, '0747d756e308468792f2b8364436c546', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-12 14:40:34', '1', '2021-06-12 14:40:34', NULL, NULL, NULL),
(65, '45434d0b36e04be68726e84ae68ff919', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-12 14:58:23', '1', '2021-06-12 14:58:23', NULL, NULL, NULL),
(66, '7f2ffe450e8d49f7b929b887c4791962', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-12 14:59:32', '1', '2021-06-12 14:59:32', NULL, NULL, NULL),
(67, '1283ab8cd51d4df6a2720aefe3f29bf5', 151, 29, 3, NULL, 2, 10, 1, 17, 4, NULL, '2021-06-12 14:59:34', '1', '2021-06-12 14:59:34', NULL, NULL, NULL),
(68, '66b89bb0323d42bfb863714a97866f71', 151, 29, 3, NULL, 2, 10, 1, 18, 4, NULL, '2021-06-12 15:24:20', '1', '2021-06-12 15:24:20', NULL, NULL, NULL),
(69, 'f611613e67de421daff69a3a95fe1567', 151, 29, 3, NULL, 2, 10, 1, 18, 4, NULL, '2021-06-13 07:56:16', '1', '2021-06-13 07:56:16', NULL, NULL, NULL),
(70, 'c101d3689ec3417a8d35828a7011ce18', 151, 29, 3, NULL, 2, NULL, NULL, 19, 4, NULL, '2021-06-14 03:10:17', '1', '2021-06-14 03:10:17', NULL, NULL, NULL),
(71, 'ed39fab6a9784dcda913c0177d850b71', 151, 29, 3, NULL, 2, NULL, NULL, 19, 4, NULL, '2021-06-14 03:10:58', '1', '2021-06-14 03:10:58', NULL, NULL, NULL),
(72, '0e04d21715e7475d9cb3569ab06aa143', 151, 29, 3, NULL, 2, NULL, NULL, 19, 4, NULL, '2021-06-14 03:11:06', '1', '2021-06-14 03:11:06', NULL, NULL, NULL),
(73, '2cb5632901de4d798334b5348c822d88', 151, 29, 3, NULL, 2, 55, NULL, 19, 4, NULL, '2021-06-14 03:13:14', '1', '2021-06-14 03:13:14', NULL, NULL, NULL),
(74, '18ed958aff1e4fcfb094f988df5f48c8', 151, 29, 20, NULL, 11, NULL, 2, NULL, NULL, 1, '2021-06-14 05:05:12', '1', '2021-06-14 05:05:12', NULL, NULL, NULL),
(75, '791fba87f7d940a5b606baf4c4ee5805', 151, 29, 200, NULL, 11, NULL, 3, NULL, NULL, 1, '2021-06-14 05:07:15', '1', '2021-06-14 05:07:15', NULL, NULL, NULL),
(76, '99ee1a81acfc45889817341eb28ed108', 151, 29, 200, NULL, 11, NULL, 4, NULL, NULL, 1, '2021-06-14 05:20:53', '1', '2021-06-14 05:20:53', NULL, NULL, NULL),
(77, 'b7091403cfad437895dd69a0b6e274ee', 151, 29, 2000, NULL, 11, NULL, 5, NULL, NULL, 1, '2021-06-14 05:21:55', '1', '2021-06-14 05:21:55', NULL, NULL, NULL),
(78, 'de4a2be65f9c49f3b5c6caf92a42892a', 151, 29, 2000, NULL, 11, NULL, 6, NULL, NULL, 1, '2021-06-14 07:30:21', '1', '2021-06-14 07:30:21', NULL, NULL, NULL),
(79, '386fcfc3b9c0442d8ecd3853e02d18a3', 151, 29, 3500, NULL, 11, NULL, 7, NULL, NULL, 1, '2021-06-14 08:07:30', '1', '2021-06-14 08:07:30', NULL, NULL, NULL),
(80, '6472e969e69a4be3bb0243d498843b74', 151, 29, 10000, NULL, 11, NULL, 8, NULL, NULL, 1, '2021-06-14 10:52:14', '1', '2021-06-14 10:52:14', NULL, NULL, NULL),
(81, 'ce280a17408546a69f7d8fa08079a8e4', 151, 29, 10002, NULL, 11, NULL, 9, NULL, NULL, 1, '2021-06-14 10:52:24', '1', '2021-06-14 10:52:24', NULL, NULL, NULL),
(82, '3dc18e141ab84006a895808aae88eacf', 151, 29, 10000, NULL, 11, NULL, 10, NULL, NULL, 1, '2021-06-14 10:53:34', '1', '2021-06-14 10:53:34', NULL, NULL, NULL),
(83, '4c4d193973d043669e72ec9ac85b92da', 156, 36, 3, NULL, 2, 56, NULL, 19, 4, NULL, '2021-06-14 15:41:09', '1', '2021-06-14 15:41:09', NULL, NULL, NULL),
(84, '85155e5a75a54237b7ca269c353171ae', 156, 36, 3, NULL, 2, 57, NULL, 19, 4, NULL, '2021-06-14 15:44:01', '1', '2021-06-14 15:44:01', NULL, NULL, NULL),
(85, 'cb17fd36bdee4008807722cdc174213a', 156, 36, 3, NULL, 2, 58, NULL, 19, 4, NULL, '2021-06-15 07:55:37', '1', '2021-06-15 07:55:37', NULL, NULL, NULL),
(86, 'ae2bccc69b2b47bd966c5f8c53248cdb', 156, 36, 3, NULL, 2, 59, NULL, 20, 4, NULL, '2021-06-17 09:10:19', '1', '2021-06-17 09:10:19', NULL, NULL, NULL),
(87, 'bf92a080a1af4abfb000ef280e368c80', 156, 36, 3, NULL, 2, 60, NULL, 20, 4, NULL, '2021-06-17 11:23:04', '1', '2021-06-17 11:23:04', NULL, NULL, NULL),
(88, 'c6a61b71a74549b6bd53500f0d6b84c4', 151, 29, 3, NULL, 2, 61, NULL, 20, 4, NULL, '2021-06-17 11:23:40', '1', '2021-06-17 11:23:40', NULL, NULL, NULL),
(89, 'cdb6a3be60a5402faf6f4365a30f262c', 151, 29, 3, NULL, 2, 62, NULL, 20, 4, NULL, '2021-06-17 11:24:22', '1', '2021-06-17 11:24:22', NULL, NULL, NULL),
(90, '5bede06986e14bcc84d41ff27797d670', 151, 29, 3, NULL, 2, 63, NULL, 20, 4, NULL, '2021-06-17 11:25:15', '1', '2021-06-17 11:25:15', NULL, NULL, NULL),
(91, '006931d0e4d04003905ee900c3ea3d40', 156, 36, 3, NULL, 2, 64, NULL, 20, 4, NULL, '2021-06-17 11:48:52', '1', '2021-06-17 11:48:52', NULL, NULL, NULL),
(92, 'ddca216858674b039eff54660ac7abc5', 151, 29, 3, NULL, 2, 65, NULL, 20, 4, NULL, '2021-06-17 11:51:11', '1', '2021-06-17 11:51:11', NULL, NULL, NULL),
(97, '4c4f2858d8f9416784606c4bfd65ba7b', 156, 36, 3, NULL, 2, 70, NULL, 21, 4, NULL, '2021-06-19 11:35:55', '1', '2021-06-19 11:35:55', NULL, NULL, NULL),
(98, '61b5ed38c36b4082ab09ffc231e69a7f', 156, 36, 3, NULL, 2, 71, NULL, 21, 4, NULL, '2021-06-19 11:40:12', '1', '2021-06-19 11:40:12', NULL, NULL, NULL),
(99, 'd36afe1e08024c02b2cd697f24edf619', 156, 36, 3, NULL, 2, 72, NULL, 21, 4, NULL, '2021-06-19 12:03:58', '1', '2021-06-19 12:03:58', NULL, NULL, NULL),
(100, '9127a14215164a1f80a7e96a190680ec', 156, 36, 3, NULL, 2, 73, NULL, 21, 4, NULL, '2021-06-19 12:06:12', '1', '2021-06-19 12:06:12', NULL, NULL, NULL),
(101, '6c6560816d9e417bb3bad2cf8c6659be', 156, 36, 3, NULL, 2, 74, NULL, 21, 4, NULL, '2021-06-19 12:09:18', '1', '2021-06-19 12:09:18', NULL, NULL, NULL),
(102, '6e869ceebb4d4823a883a2da0b77365c', 156, 36, 3, NULL, 2, 75, NULL, 21, 4, NULL, '2021-06-19 12:12:28', '1', '2021-06-19 12:12:28', NULL, NULL, NULL),
(103, '308facd76eb34db99866ca2c0524b10d', 156, 36, 3, NULL, 2, 76, NULL, 21, 4, NULL, '2021-06-19 12:14:23', '1', '2021-06-19 12:14:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int NOT NULL,
  `uuid` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reference_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` int NOT NULL,
  `user_id` int NOT NULL,
  `bank_acc_id` int NOT NULL COMMENT 'the bank account details this withrawal request will be sent to',
  `wallet_id` int NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL COMMENT 'if the cash was sent to the user successfully',
  `disabled_at` timestamp NULL DEFAULT NULL COMMENT 'if cron can process payment of this request',
  `withdrawal_provider_id` int DEFAULT NULL COMMENT 'these are 3rd-party payment processors like paystack,mcash,etc used to process this trans',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'the date cron marked this transaction as COMPLETED',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `uuid`, `reference_code`, `amount`, `user_id`, `bank_acc_id`, `wallet_id`, `completed_at`, `disabled_at`, `withdrawal_provider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jjjj', NULL, 55000, 28, 1, 155, NULL, NULL, NULL, '2021-06-14 03:01:33', NULL, NULL),
(2, '18ed958aff1e4fcfb094f988df5f48c8', NULL, 20, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 05:05:12', '2021-06-14 05:05:12', NULL),
(3, '791fba87f7d940a5b606baf4c4ee5805', NULL, 200, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 05:07:15', '2021-06-14 05:07:15', NULL),
(4, '99ee1a81acfc45889817341eb28ed108', NULL, 200, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 05:20:53', '2021-06-14 05:20:53', NULL),
(5, 'b7091403cfad437895dd69a0b6e274ee', NULL, 2000, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 05:21:55', '2021-06-14 05:21:55', NULL),
(6, 'de4a2be65f9c49f3b5c6caf92a42892a', NULL, 2000, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 07:30:21', '2021-06-14 07:30:21', NULL),
(7, '386fcfc3b9c0442d8ecd3853e02d18a3', NULL, 3500, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 08:07:30', '2021-06-14 08:07:30', NULL),
(8, '6472e969e69a4be3bb0243d498843b74', NULL, 10000, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 10:52:14', '2021-06-14 10:52:14', NULL),
(9, 'ce280a17408546a69f7d8fa08079a8e4', NULL, 10002, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 10:52:24', '2021-06-14 10:52:24', NULL),
(10, '3dc18e141ab84006a895808aae88eacf', NULL, 10000, 29, 1, 151, NULL, NULL, NULL, '2021-06-14 10:53:34', '2021-06-14 10:53:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `cron`
--
ALTER TABLE `cron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draw_winners`
--
ALTER TABLE `draw_winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `user_id` (`owner_id`),
  ADD KEY `drawn_by` (`drawn_by`);

--
-- Indexes for table `game_session`
--
ALTER TABLE `game_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `initiated_by` (`initiated_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `prize` (`prize_id`);

--
-- Indexes for table `package_options`
--
ALTER TABLE `package_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_option_id` (`package_option_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `routine_id` (`routine_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `payment_providers`
--
ALTER TABLE `payment_providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_option_id` (`package_option_id`),
  ADD KEY `frequency_id` (`frequency_id`);

--
-- Indexes for table `routine_frequency`
--
ALTER TABLE `routine_frequency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `sys_activity_types`
--
ALTER TABLE `sys_activity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_communication_channels`
--
ALTER TABLE `sys_communication_channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_prize`
--
ALTER TABLE `sys_prize`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `sys_settings`
--
ALTER TABLE `sys_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `ticket_short_code` (`ticket_short_code`),
  ADD KEY `package_option_id` (`package_option_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `routine_id` (`routine_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `drawn_by` (`drawn_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_auth_username_unique` (`username`),
  ADD KEY `admin_auth_role_index` (`role`),
  ADD KEY `uuid` (`uuid`);

--
-- Indexes for table `user_account_detail`
--
ALTER TABLE `user_account_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bank_code` (`bank_code`);

--
-- Indexes for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `activity_id` (`activity_type_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `affected_user` (`affected_user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `verification_type_id` (`comm_channel_id`),
  ADD KEY `user_activity_id` (`user_activity_type`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `wallet_user_id` (`user_id`);

--
-- Indexes for table `wallet_credit_log`
--
ALTER TABLE `wallet_credit_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`uuid`),
  ADD KEY `beneficiary` (`user_id`),
  ADD KEY `wallet_id` (`wallet_id`),
  ADD KEY `payment_channel_id` (`payment_provider_id`),
  ADD KEY `activity_type_id` (`activity_type_id`);

--
-- Indexes for table `wallet_debit_log`
--
ALTER TABLE `wallet_debit_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`uuid`),
  ADD KEY `beneficiary` (`user_id`),
  ADD KEY `wallet_id` (`wallet_id`),
  ADD KEY `bank_account_id` (`bank_acc_id`),
  ADD KEY `activity_type_id` (`activity_type_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `package_option_id` (`package_option_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `withdrawal_id` (`withdrawal_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `withdrawal_channel` (`withdrawal_provider_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `bank_acc_id` (`bank_acc_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `cron`
--
ALTER TABLE `cron`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `draw_winners`
--
ALTER TABLE `draw_winners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `game_session`
--
ALTER TABLE `game_session`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `package_options`
--
ALTER TABLE `package_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `payment_providers`
--
ALTER TABLE `payment_providers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routine_frequency`
--
ALTER TABLE `routine_frequency`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_activity_types`
--
ALTER TABLE `sys_activity_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sys_communication_channels`
--
ALTER TABLE `sys_communication_channels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_prize`
--
ALTER TABLE `sys_prize`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sys_settings`
--
ALTER TABLE `sys_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_account_detail`
--
ALTER TABLE `user_account_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `wallet_credit_log`
--
ALTER TABLE `wallet_credit_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wallet_debit_log`
--
ALTER TABLE `wallet_debit_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `draw_winners`
--
ALTER TABLE `draw_winners`
  ADD CONSTRAINT `winner_admin_id` FOREIGN KEY (`drawn_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_pck_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_session_id` FOREIGN KEY (`session_id`) REFERENCES `game_session` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_user_id` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `game_session`
--
ALTER TABLE `game_session`
  ADD CONSTRAINT `game_session_ibfk_1` FOREIGN KEY (`initiated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `game_session_package_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `package_prize_id` FOREIGN KEY (`prize_id`) REFERENCES `sys_prize` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `package_options`
--
ALTER TABLE `package_options`
  ADD CONSTRAINT `package_option_package_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_pkg_option_id` FOREIGN KEY (`package_option_id`) REFERENCES `package_options` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_routine_id` FOREIGN KEY (`routine_id`) REFERENCES `routine` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_session_id` FOREIGN KEY (`session_id`) REFERENCES `game_session` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `routine`
--
ALTER TABLE `routine`
  ADD CONSTRAINT `route_option_id` FOREIGN KEY (`package_option_id`) REFERENCES `package_options` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `routine_freq` FOREIGN KEY (`frequency_id`) REFERENCES `routine_frequency` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `routine_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_option_id` FOREIGN KEY (`package_option_id`) REFERENCES `package_options` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_package_id` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_routine_id` FOREIGN KEY (`routine_id`) REFERENCES `routine` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_session_id` FOREIGN KEY (`session_id`) REFERENCES `game_session` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_user_drawn_by` FOREIGN KEY (`drawn_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_account_detail`
--
ALTER TABLE `user_account_detail`
  ADD CONSTRAINT `acc_details_bank_code` FOREIGN KEY (`bank_code`) REFERENCES `banks` (`code`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `acc_details_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD CONSTRAINT `activity_log_act_id` FOREIGN KEY (`activity_type_id`) REFERENCES `sys_activity_types` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_aff_user_id` FOREIGN KEY (`affected_user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_author` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD CONSTRAINT `user_veri_act_id` FOREIGN KEY (`user_activity_type`) REFERENCES `sys_activity_types` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `user_veri_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `user_veri_veri_id` FOREIGN KEY (`comm_channel_id`) REFERENCES `sys_communication_channels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `wallet_credit_log`
--
ALTER TABLE `wallet_credit_log`
  ADD CONSTRAINT `wallet_cred_act_type_id` FOREIGN KEY (`activity_type_id`) REFERENCES `sys_activity_types` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_cred_channel_id` FOREIGN KEY (`payment_provider_id`) REFERENCES `payment_providers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_cred_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `wallet_cred_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `wallet_debit_log`
--
ALTER TABLE `wallet_debit_log`
  ADD CONSTRAINT `wallet_debit_acc_id` FOREIGN KEY (`bank_acc_id`) REFERENCES `user_account_detail` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_activity_type` FOREIGN KEY (`activity_type_id`) REFERENCES `sys_activity_types` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_pck_option_id` FOREIGN KEY (`package_option_id`) REFERENCES `package_options` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_session_id` FOREIGN KEY (`session_id`) REFERENCES `game_session` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_debit_withdraw_id` FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawals` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_acc_id` FOREIGN KEY (`bank_acc_id`) REFERENCES `user_account_detail` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `withdrawals_provider_id` FOREIGN KEY (`withdrawal_provider_id`) REFERENCES `payment_providers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `withdrawals_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `withdrawals_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
