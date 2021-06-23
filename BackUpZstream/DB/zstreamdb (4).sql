-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 10:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zstreamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED DEFAULT NULL,
  `channel_id` int(50) DEFAULT NULL,
  `is_sample` tinyint(1) NOT NULL DEFAULT 0,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_to` int(10) UNSIGNED DEFAULT NULL,
  `shipping_zone_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_rate_id` int(10) UNSIGNED DEFAULT NULL,
  `packaging_id` int(10) UNSIGNED DEFAULT NULL,
  `item_count` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total` decimal(20,6) DEFAULT NULL,
  `discount` decimal(20,6) DEFAULT NULL,
  `shipping` decimal(20,6) DEFAULT NULL,
  `packaging` decimal(20,6) DEFAULT NULL,
  `handling` decimal(20,6) DEFAULT NULL,
  `taxes` decimal(20,6) DEFAULT NULL,
  `grand_total` decimal(20,6) DEFAULT NULL,
  `taxrate` decimal(20,6) DEFAULT NULL,
  `shipping_weight` decimal(20,2) DEFAULT NULL,
  `billing_address` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_address` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 1,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `message_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `item_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(20,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_sub_group_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `featured` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_sub_group_id`, `name`, `slug`, `description`, `active`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kurtas', '-kurtas', NULL, 1, NULL, NULL, '2020-08-31 13:42:52', '2021-02-25 07:41:14'),
(2, 1, 'Kurti', '-kurti', NULL, 1, NULL, NULL, '2020-09-01 04:42:06', '2021-02-25 07:41:38'),
(3, 1, 'Palazzo', '-palazzo', NULL, 1, NULL, NULL, '2020-09-01 04:42:36', '2021-02-25 07:43:18'),
(4, 1, 'Legging', 'legging', NULL, 1, NULL, NULL, '2020-09-01 04:43:03', '2021-02-25 07:42:05'),
(5, 3, 'Dress', '-dress', NULL, 1, NULL, NULL, '2020-09-01 04:43:37', '2021-02-25 06:17:44'),
(6, 3, 'T-Shirts', 'tshirts', NULL, 1, NULL, NULL, '2020-09-01 04:44:03', '2021-02-25 06:35:48'),
(7, 3, 'JEAN', '-jean', NULL, 1, NULL, NULL, '2020-09-01 04:44:23', '2021-02-25 06:22:10'),
(8, 3, 'Girl Sweaters', 'girl-sweaters', NULL, 1, NULL, '2021-02-25 06:33:54', '2020-09-01 04:55:53', '2021-02-25 06:33:54'),
(9, 4, 'Boxer', 'boxer', NULL, 1, NULL, NULL, '2020-09-01 05:22:52', '2021-02-25 05:39:24'),
(10, 4, 'Jeans', 'jeans', NULL, 1, NULL, NULL, '2020-09-01 05:23:27', '2021-02-25 04:36:59'),
(11, 4, 'Shirt', '-shirt', NULL, 1, NULL, NULL, '2020-09-01 05:25:01', '2021-02-25 06:13:44'),
(12, 4, 'T-Shirt', '-tshirt', NULL, 1, NULL, NULL, '2020-09-01 05:25:24', '2021-02-25 06:15:48'),
(13, 2, 'Jens', 'jens', NULL, 1, NULL, NULL, '2020-09-01 05:25:51', '2021-02-25 06:57:36'),
(14, 2, 'Casual Shirt', '-casual-shirt', NULL, 1, NULL, NULL, '2020-09-01 05:26:21', '2021-02-25 06:52:59'),
(15, 2, 'Formal Shirt', '-formal-shirt', NULL, 1, NULL, NULL, '2020-09-01 05:26:43', '2021-02-25 06:55:48'),
(16, 2, 'Blazer', '-blazer', NULL, 1, NULL, NULL, '2020-09-01 05:27:20', '2021-02-25 06:41:42'),
(17, 1, 'Dhotis', 'dhotis', NULL, 1, NULL, NULL, '2020-09-05 04:26:35', '2021-02-25 07:31:28'),
(18, 1, 'Tunics', '-tunics', NULL, 1, NULL, NULL, '2020-09-08 09:05:08', '2021-02-25 09:35:45'),
(19, 1, 'Dresses', '-dresses', NULL, 1, NULL, NULL, '2020-09-08 09:14:10', '2021-02-25 07:34:00'),
(20, 1, 'Patiala', '-patiala', NULL, 1, NULL, NULL, '2020-09-08 09:18:22', '2021-02-25 07:43:48'),
(21, 1, 'Women Tops', 'women-tops', NULL, 1, NULL, '2021-02-24 12:57:21', '2020-09-08 09:25:46', '2021-02-24 12:57:21'),
(22, 1, 'Trouser', '-trouser', NULL, 1, NULL, NULL, '2020-09-08 09:27:37', '2021-02-25 09:35:24'),
(23, 1, 'Ethnic Set', '-ethnic-set', NULL, 1, NULL, NULL, '2020-09-08 13:13:25', '2021-02-25 07:36:06'),
(24, 1, 'Salwar Kurta', 'salwar-kurta', NULL, 1, NULL, NULL, '2020-09-11 05:23:49', '2020-09-11 05:23:49'),
(25, 5, 'Mask Respirator', 'mask-respirator', NULL, 1, NULL, NULL, '2020-09-11 05:54:14', '2020-09-11 05:57:56'),
(26, 4, 'Sweatshirts', 'sweatshirts', NULL, 1, NULL, NULL, '2021-02-24 06:30:22', '2021-02-25 06:15:29'),
(27, 4, 'SHORTS', '-shorts', '<p><br></p>', 1, NULL, NULL, '2021-02-24 06:46:38', '2021-02-25 06:13:16'),
(28, 4, 'Clothing Set', 'clothing-set', NULL, 1, NULL, NULL, '2021-02-24 06:52:14', '2021-02-25 06:11:31'),
(29, 4, 'Kurta Sets', '-kurta-sets', NULL, 1, NULL, NULL, '2021-02-24 06:56:10', '2021-02-25 06:12:57'),
(30, 4, 'Track Pant', '-track-pant', NULL, 1, NULL, NULL, '2021-02-24 07:15:32', '2021-02-25 06:16:05'),
(31, 4, 'JACKET', '-jacket', NULL, 1, NULL, NULL, '2021-02-24 07:18:00', '2021-02-25 06:12:37'),
(32, 4, 'Sweaters', 'sweaters', NULL, 1, NULL, NULL, '2021-02-24 07:21:29', '2021-02-25 09:40:49'),
(33, 4, 'INNERWEAR', '-innerwear', NULL, 1, NULL, NULL, '2021-02-24 07:27:35', '2021-02-25 06:11:49'),
(34, 4, 'Sleepwear', 'sleepwear', NULL, 1, NULL, NULL, '2021-02-24 07:29:34', '2021-02-25 09:37:50'),
(35, 3, 'TOPS', '-tops', NULL, 1, NULL, NULL, '2021-02-24 07:38:04', '2021-02-25 06:39:53'),
(36, 3, 'CLOTHING SETS', 'clothing-sets', NULL, 1, NULL, NULL, '2021-02-24 07:56:57', '2021-02-25 06:17:20'),
(37, 3, 'ETHNICWEAR', '-ethnicwear', NULL, 1, NULL, NULL, '2021-02-24 08:01:59', '2021-02-25 06:19:22'),
(38, 3, 'Dungarees', 'dungarees', NULL, 1, NULL, NULL, '2021-02-24 08:08:01', '2021-02-25 06:18:23'),
(39, 3, 'Jumpsuit', '-jumpsuit', NULL, 1, NULL, NULL, '2021-02-24 08:11:08', '2021-02-25 06:23:25'),
(40, 3, 'Short', '-short', NULL, 1, NULL, NULL, '2021-02-24 08:14:24', '2021-02-25 06:25:13'),
(41, 3, 'Tights', '-tights', NULL, 1, NULL, NULL, '2021-02-24 08:21:33', '2021-02-25 06:36:12'),
(42, 3, 'Skirt', '-skirt', NULL, 1, NULL, NULL, '2021-02-24 08:27:21', '2021-02-25 06:25:50'),
(43, 3, 'Leggings', 'leggings', NULL, 1, NULL, NULL, '2021-02-24 08:30:54', '2021-02-25 06:24:18'),
(44, 3, 'Trousers', 'trousers', NULL, 1, NULL, NULL, '2021-02-24 08:43:35', '2021-02-25 06:40:13'),
(45, 3, 'Capris', 'capris', NULL, 1, NULL, NULL, '2021-02-24 09:58:34', '2021-02-25 06:16:31'),
(46, 3, 'Sweatshirt', 'sweatshirt', NULL, 1, NULL, NULL, '2021-02-24 10:01:51', '2021-02-25 06:34:18'),
(47, 3, 'Sweater', 'sweater', NULL, 1, NULL, NULL, '2021-02-24 10:28:33', '2021-02-25 06:31:50'),
(48, 3, 'Jackets', 'jackets', NULL, 1, NULL, NULL, '2021-02-24 10:30:57', '2021-02-25 06:21:37'),
(49, 3, 'INNERWER', '-innerwer', NULL, 1, NULL, NULL, '2021-02-24 10:33:03', '2021-02-25 06:20:12'),
(50, 3, 'Sleepwer', 'sleepwer', NULL, 1, NULL, NULL, '2021-02-24 10:34:37', '2021-02-25 06:26:23'),
(51, 2, 'TShirt', 'tshirt', NULL, 1, NULL, NULL, '2021-02-24 10:47:41', '2021-02-25 08:08:52'),
(52, 2, 'Swetshirt', 'swetshirt', NULL, 1, NULL, NULL, '2021-02-24 10:52:03', '2021-02-25 07:14:22'),
(53, 2, 'Sweatrs', 'sweatrs', NULL, 1, NULL, NULL, '2021-02-24 11:04:56', '2021-02-25 07:12:12'),
(54, 2, 'Jaket', 'jaket', NULL, 1, NULL, NULL, '2021-02-24 11:07:37', '2021-02-25 06:56:51'),
(55, 2, 'Suits', 'suits', NULL, 1, NULL, NULL, '2021-02-24 11:16:33', '2021-02-25 07:11:28'),
(56, 2, 'Rain Jackets', '-rain-jackets', NULL, 1, NULL, NULL, '2021-02-24 11:18:42', '2021-02-25 07:08:32'),
(57, 2, 'Casual Trouser', '-casual-trouser', NULL, 1, NULL, NULL, '2021-02-24 11:21:57', '2021-02-25 06:54:56'),
(58, 2, 'Formal Trouser', '-formal-trouser', NULL, 1, NULL, NULL, '2021-02-24 11:26:15', '2021-02-25 06:56:05'),
(59, 2, 'Shortss', 'shortss', NULL, 1, NULL, NULL, '2021-02-24 11:28:47', '2021-02-25 07:10:56'),
(60, 2, 'Track Pantt', 'track-pantt', NULL, 1, NULL, NULL, '2021-02-24 11:33:00', '2021-02-25 07:21:47'),
(61, 2, 'Joggers', '-joggers', NULL, 1, NULL, NULL, '2021-02-24 11:37:20', '2021-02-25 06:58:01'),
(62, 2, 'Kurta Set', '-kurta-set', NULL, 1, NULL, NULL, '2021-02-24 11:41:56', '2021-02-25 07:07:17'),
(63, 2, 'Kurta', 'kurta', NULL, 1, NULL, NULL, '2021-02-24 11:46:06', '2021-02-25 07:01:33'),
(64, 2, 'Sherwani', 'sherwani', NULL, 1, NULL, NULL, '2021-02-24 11:50:09', '2021-02-25 07:08:56'),
(65, 2, 'Dhoti', '-dhoti', NULL, 1, NULL, NULL, '2021-02-24 11:52:41', '2021-02-25 06:55:27'),
(66, 2, 'Nehru Jacket', '-nehru-jacket', NULL, 1, NULL, NULL, '2021-02-24 11:57:18', '2021-02-25 07:07:54'),
(67, 2, 'Brief', '-brief', NULL, 1, NULL, NULL, '2021-02-24 12:02:03', '2021-02-25 06:42:25'),
(68, 2, 'Boxers', '-boxers', NULL, 1, NULL, NULL, '2021-02-24 12:11:32', '2021-02-25 06:40:51'),
(69, 2, 'Night Suit', '-night-suit', NULL, 1, NULL, NULL, '2021-02-24 12:18:03', '2021-02-25 07:08:16'),
(70, 2, 'Thermal Sets', '-thermal-sets', NULL, 1, NULL, NULL, '2021-02-24 12:20:09', '2021-02-25 07:18:30'),
(71, 1, 'Dress Material', '-dress-material', NULL, 1, NULL, NULL, '2021-02-24 12:31:33', '2021-02-25 07:32:03'),
(72, 1, 'Lehenga Choli', '-lehenga-choli', NULL, 1, NULL, NULL, '2021-02-24 12:35:53', '2021-02-25 07:42:39'),
(73, 1, 'Dupatta', '-dupatta', NULL, 1, NULL, NULL, '2021-02-24 12:40:37', '2021-02-25 07:34:33'),
(74, 1, 'Shawl', '-shawl', NULL, 1, NULL, NULL, '2021-02-24 12:42:28', '2021-02-25 07:45:10'),
(75, 1, 'Sarees', 'sarees', NULL, 1, NULL, NULL, '2021-02-24 12:44:38', '2021-02-25 07:44:40'),
(76, 1, 'Jumpsuits', '-jumpsuits', NULL, 1, NULL, NULL, '2021-02-24 12:46:32', '2021-02-25 07:40:38'),
(77, 1, 'Topss', '-topss', NULL, 1, NULL, NULL, '2021-02-24 12:51:53', '2021-02-25 09:34:07'),
(78, 1, 'Jeann', '-jeann', NULL, 1, NULL, NULL, '2021-02-24 12:56:04', '2021-02-25 07:40:02'),
(79, 1, 'Capri', '-capri', NULL, 1, NULL, NULL, '2021-02-24 13:00:15', '2021-02-25 07:29:24'),
(80, 1, 'Skirts', '-skirts', NULL, 1, NULL, NULL, '2021-02-24 13:03:47', '2021-02-25 07:47:07'),
(81, 1, 'Shorrts', '-shorrts', NULL, 1, NULL, NULL, '2021-02-24 13:07:26', '2021-02-25 07:46:08'),
(82, 1, 'Shrugs', 'shrugs', NULL, 1, NULL, NULL, '2021-02-24 13:10:11', '2021-02-25 07:46:39'),
(83, 1, 'Sweaterr', '-sweaterr', NULL, 1, NULL, NULL, '2021-02-24 13:11:49', '2021-02-25 09:30:20'),
(84, 1, 'Sweatshrt', '-sweatshrt', NULL, 1, NULL, NULL, '2021-02-24 13:14:47', '2021-02-25 09:31:03'),
(85, 1, 'Jackett', 'jackett', NULL, 1, NULL, NULL, '2021-02-25 05:10:59', '2021-02-25 07:37:39'),
(86, 1, 'Coat', '-coat', NULL, 1, NULL, NULL, '2021-02-25 05:20:35', '2021-02-25 07:30:20'),
(87, 1, 'Blazzer', 'blazzer', NULL, 1, NULL, NULL, '2021-02-25 05:22:47', '2021-02-25 07:24:51'),
(88, 1, 'Waistcoat', 'waistcoat', NULL, 1, NULL, NULL, '2021-02-25 05:25:26', '2021-02-25 09:42:01'),
(89, 1, 'Bra', '-bra', NULL, 1, NULL, NULL, '2021-02-25 05:28:36', '2021-02-25 07:27:50'),
(90, 1, 'Briefs', 'briefs', NULL, 1, NULL, NULL, '2021-02-25 05:30:11', '2021-02-25 07:28:28'),
(91, 1, 'Corset', '-corset', NULL, 1, NULL, NULL, '2021-02-25 05:34:22', '2021-02-25 07:30:44'),
(92, 1, 'Sleepwearr', 'sleepwearr', NULL, 1, NULL, NULL, '2021-02-25 05:37:18', '2021-02-25 07:47:40'),
(93, 1, 'Swimwear', '-swimwear', NULL, 1, NULL, NULL, '2021-02-25 05:42:01', '2021-02-25 05:42:01'),
(94, 1, 'Camisoles', '-camisoles', NULL, 1, NULL, NULL, '2021-02-25 05:45:06', '2021-02-25 05:45:06'),
(95, 1, 'Thermal Set', '-thermal-set', NULL, 1, NULL, NULL, '2021-02-25 05:51:03', '2021-02-25 05:51:03'),
(96, 1, 'Ethnicwer', 'ethnicwer', NULL, 1, NULL, NULL, '2021-02-25 06:08:11', '2021-02-25 06:19:06'),
(97, 55, 'Anklets', 'anklets', NULL, 1, NULL, NULL, '2021-02-27 05:18:48', '2021-02-27 05:18:48'),
(98, 55, 'Armlets', 'armlets', NULL, 1, NULL, NULL, '2021-02-27 05:23:59', '2021-02-27 05:23:59'),
(99, 55, 'Bangles', 'bangles', NULL, 1, NULL, NULL, '2021-02-27 05:28:12', '2021-02-27 05:28:12'),
(100, 55, 'Bracelets', 'bracelets', NULL, 1, NULL, NULL, '2021-02-27 05:31:36', '2021-02-27 05:31:36'),
(101, 55, 'Bridal Sets', 'bridal-sets', NULL, 1, NULL, NULL, '2021-02-27 05:37:06', '2021-02-27 05:37:06'),
(102, 55, 'Broches', 'broches', NULL, 1, NULL, NULL, '2021-02-27 05:46:24', '2021-02-27 05:46:24'),
(103, 55, 'Brooch', 'brooch', NULL, 1, NULL, NULL, '2021-02-27 05:48:42', '2021-02-27 05:48:42'),
(104, 55, 'Earrings', 'earrings', NULL, 1, NULL, NULL, '2021-02-27 05:52:51', '2021-02-27 05:52:51'),
(105, 55, 'Finger Ring', 'finger-ring', NULL, 1, NULL, NULL, '2021-02-27 08:07:00', '2021-02-27 08:07:00'),
(106, 55, 'Finger Rings', 'finger-rings', NULL, 1, NULL, NULL, '2021-02-27 08:10:50', '2021-02-27 08:10:50'),
(107, 55, 'Mangalsutra', 'mangalsutra', NULL, 1, NULL, NULL, '2021-02-27 08:13:38', '2021-02-27 08:13:38'),
(108, 55, 'Necklace Sets', 'necklace-sets', NULL, 1, NULL, NULL, '2021-02-27 08:16:20', '2021-02-27 08:16:20'),
(109, 55, 'Necklaces', 'necklaces', NULL, 1, NULL, NULL, '2021-02-27 08:19:19', '2021-02-27 08:19:19'),
(110, 55, 'Nose Ring', 'nose-ring', NULL, 1, NULL, NULL, '2021-02-27 08:20:39', '2021-02-27 08:20:39'),
(111, 55, 'Pendent Sets', 'pendent-sets', NULL, 1, NULL, NULL, '2021-02-27 08:22:38', '2021-02-27 08:22:38'),
(112, 55, 'Toe Rings', 'toe-rings', NULL, 1, NULL, NULL, '2021-02-27 08:25:14', '2021-02-27 08:25:14'),
(113, 78, 'Agarbatti Holders', 'agarbatti-holders', NULL, 1, NULL, NULL, '2021-03-02 05:41:09', '2021-03-02 05:41:09'),
(114, 78, 'Decor and Pooja Idols', 'decor-and-pooja-idols', NULL, 1, NULL, NULL, '2021-03-02 05:45:01', '2021-03-02 05:45:01'),
(115, 78, 'Dhoop Dani', 'dhoop-dani', NULL, 1, NULL, NULL, '2021-03-02 05:49:48', '2021-03-02 05:49:48'),
(116, 78, 'Diyas', 'diyas', NULL, 1, NULL, NULL, '2021-03-02 05:52:17', '2021-03-02 05:52:17'),
(117, 78, 'Lota Kalash', 'lota-kalash', NULL, 1, NULL, NULL, '2021-03-02 05:55:02', '2021-03-02 05:55:02'),
(118, 78, 'Panch Patra', 'panch-patra', NULL, 1, NULL, NULL, '2021-03-02 05:58:12', '2021-03-02 05:58:12'),
(119, 78, 'Pooja Bells', 'pooja-bells', NULL, 1, NULL, NULL, '2021-03-02 06:02:15', '2021-03-02 06:02:15'),
(120, 78, 'Pooja Plates', 'pooja-plates', NULL, 1, NULL, NULL, '2021-03-02 06:16:21', '2021-03-02 06:16:21'),
(121, 59, 'Air Conditioners', 'air-conditioners', NULL, 1, NULL, NULL, '2021-03-02 06:23:37', '2021-03-02 06:23:37'),
(122, 58, 'Air Coolers', 'air-coolers', NULL, 1, NULL, NULL, '2021-03-02 06:25:56', '2021-03-02 06:25:56'),
(123, 60, 'Chimneys', 'chimneys', NULL, 1, NULL, NULL, '2021-03-02 06:27:30', '2021-03-02 06:27:30'),
(124, 60, 'Coffee Makers', 'coffee-makers', NULL, 1, NULL, NULL, '2021-03-02 06:29:12', '2021-03-02 06:29:12'),
(125, 60, 'Dishwashers', 'dishwashers', NULL, 1, NULL, NULL, '2021-03-02 06:31:24', '2021-03-02 06:31:24'),
(126, 60, 'Electric Cookers', 'electric-cookers', NULL, 1, NULL, NULL, '2021-03-02 06:32:27', '2021-03-02 06:32:27'),
(127, 60, 'Electric Kettle', 'electric-kettle', NULL, 1, NULL, NULL, '2021-03-02 06:34:19', '2021-03-02 06:34:19'),
(128, 58, 'Fans', 'fans', NULL, 1, NULL, NULL, '2021-03-02 06:37:56', '2021-03-02 06:37:56'),
(129, 60, 'Food Processors', 'food-processors', NULL, 1, NULL, NULL, '2021-03-02 06:44:44', '2021-03-02 06:44:44'),
(130, 58, 'Geysers', 'geysers', NULL, 1, NULL, NULL, '2021-03-02 06:48:27', '2021-03-02 06:48:27'),
(131, 58, 'Hair Dryers', 'hair-dryers', NULL, 1, NULL, NULL, '2021-03-02 07:05:25', '2021-03-02 07:05:25'),
(132, 58, 'Hair Straighteners', 'hair-straighteners', NULL, 1, NULL, NULL, '2021-03-02 07:06:58', '2021-03-02 07:06:58'),
(133, 60, 'Hand Blenders', 'hand-blenders', NULL, 1, NULL, NULL, '2021-03-02 07:21:56', '2021-03-02 07:21:56'),
(134, 58, 'Immersion Rods', 'immersion-rods', NULL, 1, NULL, NULL, '2021-03-02 07:24:55', '2021-03-02 07:24:55'),
(135, 60, 'Induction Cooktops', 'induction-cooktops', NULL, 1, NULL, NULL, '2021-03-02 07:26:33', '2021-03-02 07:26:33'),
(136, 58, 'Inverters', 'inverters', NULL, 1, NULL, NULL, '2021-03-02 07:29:50', '2021-03-02 07:29:50'),
(137, 58, 'Irons', 'irons', NULL, 1, NULL, NULL, '2021-03-02 07:32:03', '2021-03-02 07:32:03'),
(138, 60, 'Juicer/Mixer/Grinder', 'juicermixergrinder', NULL, 1, NULL, NULL, '2021-03-02 07:35:54', '2021-03-02 07:35:54'),
(139, 58, 'LED Bulbs', 'led-bulbs', NULL, 1, NULL, NULL, '2021-03-02 07:39:00', '2021-03-02 07:39:00'),
(140, 58, 'LED Lanterns', 'led-lanterns', NULL, 1, NULL, NULL, '2021-03-02 07:43:15', '2021-03-02 07:43:15'),
(141, 58, 'Led Panel Lights', 'led-panel-lights', NULL, 1, NULL, NULL, '2021-03-02 07:48:45', '2021-03-02 07:48:45'),
(142, 58, 'LED Strings', 'led-strings', NULL, 1, NULL, NULL, '2021-03-02 07:49:39', '2021-03-02 07:49:39'),
(143, 60, 'Microwave Ovens', 'microwave-ovens', NULL, 1, NULL, NULL, '2021-03-02 08:01:47', '2021-03-02 08:01:47'),
(144, 60, 'Oven Toaster Grills', 'oven-toaster-grills', NULL, 1, NULL, NULL, '2021-03-02 08:10:32', '2021-03-02 08:10:32'),
(145, 60, 'Pop Up Toasters', 'pop-up-toasters', NULL, 1, NULL, NULL, '2021-03-02 08:12:58', '2021-03-02 08:12:58'),
(146, 59, 'Refrigerators', 'refrigerators', NULL, 1, NULL, NULL, '2021-03-02 09:26:41', '2021-03-02 09:26:41'),
(147, 58, 'Room Heaters', 'room-heaters', NULL, 1, NULL, NULL, '2021-03-02 09:29:36', '2021-03-02 09:29:36'),
(148, 60, 'Sandwich Makers', 'sandwich-makers', NULL, 1, NULL, NULL, '2021-03-02 09:37:29', '2021-03-02 09:37:29'),
(149, 58, 'Sewing Machines', 'sewing-machines', NULL, 1, NULL, NULL, '2021-03-02 09:40:26', '2021-03-02 09:40:26'),
(150, 59, 'TV', 'tv', NULL, 1, NULL, NULL, '2021-03-02 09:42:36', '2021-03-02 09:42:36'),
(151, 58, 'Vacuum Cleaners', 'vacuum-cleaners', NULL, 1, NULL, NULL, '2021-03-02 09:46:17', '2021-03-02 09:46:17'),
(152, 58, 'Voltage Stabilizers', 'voltage-stabilizers', NULL, 1, NULL, NULL, '2021-03-02 09:59:54', '2021-03-02 09:59:54'),
(153, 59, 'Washing Machine', 'washing-machine', NULL, 1, NULL, NULL, '2021-03-02 10:07:17', '2021-03-02 10:07:17'),
(154, 58, 'Water Geysers', 'water-geysers', NULL, 1, NULL, NULL, '2021-03-02 10:10:36', '2021-03-02 10:10:36'),
(155, 58, 'Water Purifiers', 'water-purifiers', NULL, 1, NULL, NULL, '2021-03-02 10:13:35', '2021-03-02 10:13:35'),
(156, 60, 'Wet Grinders', 'wet-grinders', NULL, 1, NULL, NULL, '2021-03-02 10:15:34', '2021-03-02 10:15:34'),
(157, 79, 'Baby Bath Tubs', 'baby-bath-tubs', NULL, 1, NULL, NULL, '2021-03-02 10:47:44', '2021-03-02 10:47:44'),
(158, 79, 'Baby Bibs', 'baby-bibs', NULL, 1, NULL, NULL, '2021-03-02 10:55:56', '2021-03-02 10:55:56'),
(159, 79, 'Baby Bottle Cleaning Brushes', 'baby-bottle-cleaning-brushes', NULL, 1, NULL, NULL, '2021-03-02 10:57:59', '2021-03-02 10:57:59'),
(160, 79, 'Baby Bottle Cover', 'baby-bottle-cover', NULL, 1, NULL, NULL, '2021-03-02 10:59:37', '2021-03-02 10:59:37'),
(161, 79, 'Baby Bottle Nipples', 'baby-bottle-nipples', NULL, 1, NULL, NULL, '2021-03-02 11:28:02', '2021-03-02 11:28:02'),
(162, 79, 'Baby Bouncers and Rockers', 'baby-bouncers-and-rockers', NULL, 1, NULL, NULL, '2021-03-02 11:29:23', '2021-03-02 11:29:23'),
(163, 79, 'Baby Car Seats', 'baby-car-seats', NULL, 1, NULL, NULL, '2021-03-02 11:33:41', '2021-03-02 11:33:41'),
(164, 79, 'Baby Carriers', 'baby-carriers', NULL, 1, NULL, NULL, '2021-03-02 11:35:38', '2021-03-02 11:35:38'),
(165, 79, 'Baby Cots', 'baby-cots', NULL, 1, NULL, NULL, '2021-03-02 11:39:07', '2021-03-02 11:39:07'),
(166, 79, 'Baby Cradles', 'baby-cradles', NULL, 1, NULL, NULL, '2021-03-02 11:41:25', '2021-03-02 11:41:25'),
(167, 79, 'Baby Cradle', 'baby-cradle', NULL, 1, NULL, '2021-03-02 12:30:53', '2021-03-02 11:42:03', '2021-03-02 12:30:53'),
(168, 79, 'Baby Feeding Bottle', 'baby-feeding-bottle', NULL, 1, NULL, NULL, '2021-03-02 11:48:28', '2021-03-02 11:48:28'),
(169, 79, 'Baby Potty Seats', 'baby-potty-seats', NULL, 1, NULL, NULL, '2021-03-02 11:52:25', '2021-03-02 11:52:25'),
(170, 79, 'Baby Rattles', 'baby-rattles', NULL, 1, NULL, NULL, '2021-03-02 12:04:11', '2021-03-02 12:04:11'),
(171, 79, 'Baby Rattle', 'baby-rattle', NULL, 1, NULL, '2021-03-02 12:30:14', '2021-03-02 12:04:57', '2021-03-02 12:30:14'),
(172, 79, 'Baby Shower Caps', 'baby-shower-caps', NULL, 1, NULL, NULL, '2021-03-02 12:06:15', '2021-03-02 12:06:15'),
(173, 79, 'Baby Sipper Cups', 'baby-sipper-cups', NULL, 1, NULL, NULL, '2021-03-02 12:08:00', '2021-03-02 12:08:00'),
(174, 79, 'Baby Walkers', 'baby-walkers', NULL, 1, NULL, NULL, '2021-03-02 12:10:29', '2021-03-02 12:10:29'),
(175, 79, 'Baby Wipes', 'baby-wipes', NULL, 1, NULL, NULL, '2021-03-02 12:15:41', '2021-03-02 12:15:41'),
(176, 79, 'Diaper Bags', 'diaper-bags', NULL, 1, NULL, NULL, '2021-03-02 12:17:12', '2021-03-02 12:17:12'),
(177, 79, 'Diapers', 'diapers', NULL, 1, NULL, NULL, '2021-03-02 12:21:35', '2021-03-02 12:21:35'),
(178, 79, 'Mosquito Net', 'mosquito-net', NULL, 1, NULL, NULL, '2021-03-02 12:23:32', '2021-03-02 12:23:32'),
(179, 79, 'Stroller & Prams', 'stroller-prams', NULL, 1, NULL, NULL, '2021-03-02 12:27:46', '2021-03-02 12:27:46'),
(180, 79, 'Teethers and Soothers', 'teethers-and-soothers', NULL, 1, NULL, NULL, '2021-03-02 12:29:36', '2021-03-02 12:29:36'),
(181, 83, 'Badminton Grips', 'badminton-grips', NULL, 1, NULL, NULL, '2021-03-02 12:44:38', '2021-03-02 12:44:38'),
(182, 83, 'Badminton Nets', 'badminton-nets', NULL, 1, NULL, NULL, '2021-03-02 13:04:03', '2021-03-02 13:04:03'),
(183, 83, 'Badminton Racket', 'badminton-racket', NULL, 1, NULL, NULL, '2021-03-03 09:36:08', '2021-03-03 09:36:08'),
(184, 83, 'Badminton Shuttlecocks', 'badminton-shuttlecocks', NULL, 1, NULL, NULL, '2021-03-03 09:40:11', '2021-03-03 09:40:11'),
(185, 83, 'Basket Balls', 'basket-balls', NULL, 1, NULL, NULL, '2021-03-03 09:43:12', '2021-03-03 09:43:12'),
(186, 83, 'Basketball Accessories', 'basketball-accessories', NULL, 1, NULL, NULL, '2021-03-03 09:49:00', '2021-03-03 09:49:00'),
(187, 83, 'Carrom Board', 'carrom-board', NULL, 1, NULL, NULL, '2021-03-03 09:56:36', '2021-03-03 09:56:36'),
(188, 83, 'Carrom Coins', 'carrom-coins', NULL, 1, NULL, NULL, '2021-03-03 09:59:15', '2021-03-03 09:59:15'),
(189, 83, 'Cricket Accessories', 'cricket-accessories', NULL, 1, NULL, NULL, '2021-03-03 10:01:09', '2021-03-03 10:01:09'),
(190, 83, 'Cricket Balls', 'cricket-balls', NULL, 1, NULL, NULL, '2021-03-03 10:04:30', '2021-03-03 10:04:30'),
(191, 83, 'Cricket Bats', 'cricket-bats', NULL, 1, NULL, NULL, '2021-03-03 10:07:40', '2021-03-03 10:07:40'),
(192, 83, 'Cricket Glove', 'cricket-glove', NULL, 1, NULL, NULL, '2021-03-03 10:09:48', '2021-03-03 10:09:48'),
(193, 83, 'Cricket Guards', 'cricket-guards', NULL, 1, NULL, NULL, '2021-03-03 10:11:55', '2021-03-03 10:11:55'),
(194, 83, 'Cricket Helmets', 'cricket-helmets', NULL, 1, NULL, NULL, '2021-03-03 10:14:02', '2021-03-03 10:14:02'),
(195, 83, 'Cricket Kit Bags', 'cricket-kit-bags', NULL, 1, NULL, NULL, '2021-03-03 10:15:41', '2021-03-03 10:15:41'),
(196, 83, 'Cricket Kits', 'cricket-kits', NULL, 1, NULL, NULL, '2021-03-03 10:18:54', '2021-03-03 10:18:54'),
(197, 83, 'Cricket Pads', 'cricket-pads', NULL, 1, NULL, NULL, '2021-03-03 10:23:11', '2021-03-03 10:23:11'),
(198, 83, 'Cricket Wickets', 'cricket-wickets', NULL, 1, NULL, NULL, '2021-03-03 10:27:42', '2021-03-03 10:27:42'),
(199, 83, 'Football', 'football', NULL, 1, NULL, NULL, '2021-03-03 10:40:15', '2021-03-03 10:40:15'),
(200, 83, 'Football Bags', 'football-bags', NULL, 1, NULL, NULL, '2021-03-03 10:47:33', '2021-03-03 10:47:33'),
(201, 83, 'Football Guards', 'football-guards', NULL, 1, NULL, NULL, '2021-03-03 11:02:57', '2021-03-03 11:02:57'),
(202, 83, 'Football Nets', 'football-nets', NULL, 1, NULL, NULL, '2021-03-03 11:17:26', '2021-03-03 11:17:26'),
(203, 83, 'Goalkeeper Gloves', 'goalkeeper-gloves', NULL, 1, NULL, NULL, '2021-03-03 12:14:28', '2021-03-03 12:14:28'),
(204, 83, 'Hockey Balls', 'hockey-balls', NULL, 1, NULL, NULL, '2021-03-03 12:17:16', '2021-03-03 12:17:16'),
(205, 83, 'Hockey Gloves', 'hockey-gloves', NULL, 1, NULL, NULL, '2021-03-03 12:19:37', '2021-03-03 12:19:37'),
(206, 83, 'Hockey Guards', 'hockey-guards', NULL, 1, NULL, NULL, '2021-03-03 12:20:48', '2021-03-03 12:20:48'),
(207, 83, 'Hockey Kit Bags', 'hockey-kit-bags', NULL, 1, NULL, NULL, '2021-03-03 12:25:16', '2021-03-03 12:25:16'),
(208, 83, 'Hockey Sticks', 'hockey-sticks', NULL, 1, NULL, NULL, '2021-03-03 12:31:36', '2021-03-03 12:31:36'),
(209, 83, 'Outdoor Toys', 'outdoor-toys', NULL, 1, NULL, NULL, '2021-03-03 12:36:52', '2021-03-03 12:36:52'),
(210, 83, 'Skateboards', 'skateboards', NULL, 1, NULL, NULL, '2021-03-03 12:39:17', '2021-03-03 12:39:17'),
(211, 83, 'Skates', 'skates', NULL, 1, NULL, NULL, '2021-03-03 12:41:12', '2021-03-03 12:41:12'),
(212, 83, 'Skating Guards', 'skating-guards', NULL, 1, NULL, NULL, '2021-03-03 12:45:42', '2021-03-03 12:45:42'),
(213, 83, 'Skating Kits', 'skating-kits', NULL, 1, NULL, NULL, '2021-03-03 12:58:12', '2021-03-03 12:58:12'),
(214, 83, 'Sports Shoes', 'sports-shoes', NULL, 1, NULL, NULL, '2021-03-03 12:59:29', '2021-03-03 12:59:29'),
(215, 83, 'Table Tennis Balls', 'table-tennis-balls', NULL, 1, NULL, NULL, '2021-03-03 13:00:50', '2021-03-03 13:00:50'),
(216, 83, 'Table Tennis Bat Covers & Bag', 'table-tennis-bat-covers-bag', NULL, 1, NULL, NULL, '2021-03-03 13:02:04', '2021-03-03 13:02:04'),
(217, 83, 'Table Tennis Nets', 'table-tennis-nets', NULL, 1, NULL, NULL, '2021-03-03 13:03:57', '2021-03-03 13:03:57'),
(218, 83, 'Table Tennis Racket', 'table-tennis-racket', NULL, 1, NULL, NULL, '2021-03-03 13:04:56', '2021-03-03 13:04:56'),
(219, 83, 'Table Tennis Sets', 'table-tennis-sets', NULL, 1, NULL, NULL, '2021-03-03 13:06:49', '2021-03-03 13:06:49'),
(220, 83, 'Volley Ball Nets', 'volley-ball-nets', NULL, 1, NULL, NULL, '2021-03-03 13:14:41', '2021-03-03 13:14:41'),
(221, 83, 'Volley Balls', 'volley-balls', NULL, 1, NULL, NULL, '2021-03-03 13:16:48', '2021-03-03 13:16:48'),
(222, 83, 'WaterGun / Pichkaari', 'watergun-pichkaari', NULL, 1, NULL, NULL, '2021-03-03 13:18:17', '2021-03-03 13:18:17'),
(223, 74, 'Baskets', 'baskets', NULL, 1, NULL, NULL, '2021-03-05 06:10:24', '2021-03-05 06:10:24'),
(224, 74, 'Casserole and Sets', 'casserole-and-sets', NULL, 1, NULL, NULL, '2021-03-05 06:19:22', '2021-03-05 06:19:22'),
(225, 74, 'Chambu Lota', 'chambu-lota', NULL, 1, NULL, NULL, '2021-03-05 06:22:08', '2021-03-05 06:22:08'),
(226, 74, 'Milk can (Barni)', 'milk-can-barni', NULL, 1, NULL, NULL, '2021-03-05 06:26:10', '2021-03-05 06:26:10'),
(227, 74, 'Rack And Holders', 'rack-and-holders', NULL, 1, NULL, NULL, '2021-03-05 06:32:42', '2021-03-05 06:32:42'),
(228, 74, 'Sprout Makers', 'sprout-makers', NULL, 1, NULL, NULL, '2021-03-05 06:40:33', '2021-03-05 06:40:33'),
(229, 74, 'Thermos and Flasks', 'thermos-and-flasks', NULL, 1, NULL, NULL, '2021-03-05 06:41:55', '2021-03-05 06:41:55'),
(230, 68, 'Adhesive Tapes', 'adhesive-tapes', NULL, 1, NULL, NULL, '2021-03-05 06:45:41', '2021-03-05 06:45:41'),
(231, 68, 'Glue and Glue stick', 'glue-and-glue-stick', NULL, 1, NULL, NULL, '2021-03-05 06:47:29', '2021-03-05 06:47:29'),
(232, 68, 'Tape Dispensers', 'tape-dispensers', NULL, 1, NULL, NULL, '2021-03-05 06:49:48', '2021-03-05 06:49:48'),
(233, 43, 'Bed Covers', 'bed-covers', NULL, 1, NULL, NULL, '2021-03-05 06:56:35', '2021-03-05 06:56:35'),
(234, 43, 'Bedding Sets', 'bedding-sets', NULL, 1, NULL, NULL, '2021-03-05 06:59:05', '2021-03-05 06:59:05'),
(235, 43, 'Bedsheets', 'bedsheets', NULL, 1, NULL, NULL, '2021-03-05 07:00:31', '2021-03-05 07:00:31'),
(236, 43, 'Blankets Quilts and Dohars', 'blankets-quilts-and-dohars', NULL, 1, NULL, NULL, '2021-03-05 07:03:17', '2021-03-05 07:03:17'),
(237, 43, 'Cushion', 'cushion', NULL, 1, NULL, NULL, '2021-03-05 07:06:19', '2021-03-05 07:06:19'),
(238, 43, 'Cushion Covers', 'cushion-covers', NULL, 1, NULL, NULL, '2021-03-05 07:09:37', '2021-03-05 07:09:37'),
(239, 43, 'Mattress Protector', 'mattress-protector', NULL, 1, NULL, NULL, '2021-03-05 07:13:09', '2021-03-05 07:13:09'),
(240, 43, 'Pillow Cover', 'pillow-cover', NULL, 1, NULL, NULL, '2021-03-05 07:18:09', '2021-03-05 07:18:09'),
(241, 43, 'Pillows', 'pillows', NULL, 1, NULL, NULL, '2021-03-05 07:20:08', '2021-03-05 07:20:08'),
(242, 86, 'Alcohol-Based Sanitizer', 'alcoholbased-sanitizer', NULL, 1, NULL, NULL, '2021-03-05 07:28:33', '2021-03-05 07:28:33'),
(243, 86, 'Non-Alcohol Sanitizer', 'nonalcohol-sanitizer', NULL, 1, NULL, NULL, '2021-03-05 07:30:29', '2021-03-05 07:30:29'),
(244, 63, 'Blackboard - White Board', 'blackboard-white-board', NULL, 1, NULL, NULL, '2021-03-05 07:39:51', '2021-03-05 07:39:51'),
(245, 63, 'Board Dusters', 'board-dusters', NULL, 1, NULL, NULL, '2021-03-05 07:42:29', '2021-03-05 07:42:29'),
(246, 63, 'Box Cutter', 'box-cutter', NULL, 1, NULL, NULL, '2021-03-05 07:44:19', '2021-03-05 07:44:19'),
(247, 63, 'Chalks', 'chalks', NULL, 1, NULL, NULL, '2021-03-05 07:45:53', '2021-03-05 07:45:53'),
(248, 63, 'Charts and Posters', 'charts-and-posters', NULL, 1, NULL, NULL, '2021-03-05 07:47:58', '2021-03-05 07:47:58'),
(249, 63, 'Clip - Exam Boards', 'clip-exam-boards', NULL, 1, NULL, NULL, '2021-03-05 07:48:59', '2021-03-05 07:48:59'),
(250, 63, 'Eraser and Sharpener', 'eraser-and-sharpener', NULL, 1, NULL, NULL, '2021-03-05 07:51:47', '2021-03-05 07:51:47'),
(251, 63, 'Globe', 'globe', NULL, 1, NULL, NULL, '2021-03-05 07:52:31', '2021-03-05 07:52:31'),
(252, 63, 'Lunch Boxes', 'lunch-boxes', NULL, 1, NULL, NULL, '2021-03-05 07:55:20', '2021-03-05 07:55:20'),
(253, 63, 'Magnifying Glass', 'magnifying-glass', NULL, 1, NULL, NULL, '2021-03-05 07:57:30', '2021-03-05 07:57:30'),
(254, 63, 'Notebook and Register', 'notebook-and-register', NULL, 1, NULL, NULL, '2021-03-05 08:03:03', '2021-03-05 08:03:03'),
(255, 63, 'Notepad and Memo pads', 'notepad-and-memo-pads', NULL, 1, NULL, NULL, '2021-03-05 08:04:49', '2021-03-05 08:04:49'),
(256, 63, 'Ruler Scale', 'ruler-scale', NULL, 1, NULL, NULL, '2021-03-05 08:06:45', '2021-03-05 08:06:45'),
(257, 63, 'Study Tables', 'study-tables', NULL, 1, NULL, NULL, '2021-03-05 08:09:09', '2021-03-05 08:09:09'),
(258, 63, 'Water Bottles', 'water-bottles', NULL, 1, NULL, NULL, '2021-03-05 08:10:30', '2021-03-05 08:10:30'),
(259, 57, 'Belts', 'belts', NULL, 1, NULL, NULL, '2021-03-05 09:26:55', '2021-03-05 09:26:55'),
(260, 62, 'Binoculars & Optics', 'binoculars-optics', NULL, 1, NULL, NULL, '2021-03-05 09:30:35', '2021-03-05 09:30:35'),
(261, 57, 'Bracelet', 'bracelet', NULL, 1, NULL, NULL, '2021-03-05 09:35:17', '2021-03-05 09:35:17'),
(262, 62, 'Camera Bags', 'camera-bags', NULL, 1, NULL, NULL, '2021-03-05 09:41:28', '2021-03-05 09:41:28'),
(263, 62, 'Camera Batteries Charger', 'camera-batteries-charger', NULL, 1, NULL, NULL, '2021-03-05 09:43:52', '2021-03-05 09:43:52'),
(264, 62, 'Camera Battery', 'camera-battery', NULL, 1, NULL, NULL, '2021-03-05 10:00:51', '2021-03-05 10:00:51'),
(265, 62, 'Camera Filters', 'camera-filters', NULL, 1, NULL, NULL, '2021-03-05 10:20:51', '2021-03-05 10:20:51'),
(266, 62, 'Camera Flash\'s', 'camera-flashs', NULL, 1, NULL, NULL, '2021-03-05 10:22:30', '2021-03-05 10:22:30'),
(267, 62, 'Camera Lenses', 'camera-lenses', NULL, 1, NULL, NULL, '2021-03-05 10:26:25', '2021-03-05 10:26:25'),
(268, 62, 'Camera Stand / Tripods', 'camera-stand-tripods', NULL, 1, NULL, NULL, '2021-03-05 10:28:03', '2021-03-05 10:28:03'),
(269, 62, 'camera straps', 'camera-straps', NULL, 1, NULL, NULL, '2021-03-05 10:29:26', '2021-03-05 10:29:26'),
(270, 57, 'Caps', 'caps', NULL, 1, NULL, NULL, '2021-03-05 11:06:24', '2021-03-05 11:06:24'),
(271, 51, 'Combo Motherboards', 'combo-motherboards', NULL, 1, NULL, NULL, '2021-03-05 11:08:05', '2021-03-05 11:08:05'),
(272, 51, 'Computer Cables', 'computer-cables', NULL, 1, NULL, NULL, '2021-03-05 11:08:58', '2021-03-05 11:08:58'),
(273, 51, 'computer sound cards', 'computer-sound-cards', NULL, 1, NULL, NULL, '2021-03-05 11:11:07', '2021-03-05 11:11:07'),
(274, 51, 'CPU', 'cpu', NULL, 1, NULL, NULL, '2021-03-05 11:12:47', '2021-03-05 11:12:47'),
(275, 80, 'Cycle Accessories', 'cycle-accessories', NULL, 1, NULL, NULL, '2021-03-05 11:15:27', '2021-03-05 11:15:27'),
(276, 51, 'External Hard Disks', 'external-hard-disks', NULL, 1, NULL, NULL, '2021-03-05 11:16:59', '2021-03-05 11:16:59'),
(277, 51, 'Graphic Cards', 'graphic-cards', NULL, 1, NULL, NULL, '2021-03-05 11:22:02', '2021-03-05 11:22:02'),
(278, 56, 'Hair Band and Tie', 'hair-band-and-tie', NULL, 1, NULL, NULL, '2021-03-05 11:26:07', '2021-03-05 11:26:07'),
(279, 56, 'Hair Clip and Pin', 'hair-clip-and-pin', NULL, 1, NULL, NULL, '2021-03-05 11:27:44', '2021-03-05 11:27:44'),
(280, 56, 'Hair Extension', 'hair-extension', NULL, 1, NULL, NULL, '2021-03-05 11:30:21', '2021-03-05 11:30:21'),
(281, 56, 'Hair Jewellery', 'hair-jewellery', NULL, 1, NULL, NULL, '2021-03-05 11:32:11', '2021-03-05 11:32:11'),
(282, 42, 'Headphones & Headsets', 'headphones-headsets', NULL, 1, NULL, NULL, '2021-03-05 11:34:50', '2021-03-05 11:34:50'),
(283, 51, 'Internal Hard Drive', 'internal-hard-drive', NULL, 1, NULL, NULL, '2021-03-05 11:36:15', '2021-03-05 11:36:15'),
(284, 51, 'keyboard', 'keyboard', NULL, 1, NULL, NULL, '2021-03-05 11:37:22', '2021-03-05 11:37:22'),
(285, 52, 'Laptop bags', 'laptop-bags', NULL, 1, NULL, NULL, '2021-03-05 11:39:51', '2021-03-05 11:39:51'),
(286, 52, 'laptop power Bank', 'laptop-power-bank', NULL, 1, NULL, NULL, '2021-03-05 11:41:49', '2021-03-05 11:41:49'),
(287, 52, 'Laptop Skins & Decals', 'laptop-skins-decals', NULL, 1, NULL, NULL, '2021-03-05 11:48:20', '2021-03-05 11:48:20'),
(288, 62, 'Lens Cleaners', 'lens-cleaners', NULL, 1, NULL, NULL, '2021-03-05 11:52:29', '2021-03-05 11:52:29'),
(289, 42, 'Memory Card', 'memory-card', NULL, 1, NULL, NULL, '2021-03-06 05:30:03', '2021-03-06 05:30:03'),
(290, 51, 'Memory Cards', 'memory-cards', NULL, 1, NULL, NULL, '2021-03-06 05:35:12', '2021-03-06 05:35:12'),
(291, 42, 'Mobile Cables', 'mobile-cables', NULL, 1, NULL, NULL, '2021-03-06 05:37:12', '2021-03-06 05:37:12'),
(292, 42, 'Mobile Cases & Covers', 'mobile-cases-covers', NULL, 1, NULL, NULL, '2021-03-06 05:39:21', '2021-03-06 05:39:21'),
(293, 42, 'Mobile Chargers', 'mobile-chargers', NULL, 1, NULL, NULL, '2021-03-06 05:43:12', '2021-03-06 05:43:12'),
(294, 42, 'Mobile Holders', 'mobile-holders', NULL, 1, NULL, NULL, '2021-03-06 05:48:13', '2021-03-06 05:48:13'),
(295, 51, 'Motherboards', 'motherboards', NULL, 1, NULL, NULL, '2021-03-06 05:49:51', '2021-03-06 05:49:51'),
(296, 51, 'Mouse', 'mouse', NULL, 1, NULL, NULL, '2021-03-06 05:51:57', '2021-03-06 05:51:57'),
(297, 51, 'Pen Drives', 'pen-drives', NULL, 1, NULL, NULL, '2021-03-06 06:01:17', '2021-03-06 06:01:17'),
(298, 42, 'Power Banks', 'power-banks', NULL, 1, NULL, NULL, '2021-03-06 06:02:26', '2021-03-06 06:02:26'),
(299, 51, 'Power Supply Units', 'power-supply-units', NULL, 1, NULL, NULL, '2021-03-06 06:03:31', '2021-03-06 06:03:31'),
(300, 51, 'Printer', 'printer', NULL, 1, NULL, NULL, '2021-03-06 06:06:59', '2021-03-06 06:06:59'),
(301, 51, 'Processors', 'processors', NULL, 1, NULL, NULL, '2021-03-06 06:08:16', '2021-03-06 06:08:16'),
(302, 51, 'Projectors', 'projectors', NULL, 1, NULL, NULL, '2021-03-06 06:11:20', '2021-03-06 06:11:20'),
(303, 51, 'RAMs', 'rams', NULL, 1, NULL, NULL, '2021-03-06 06:13:59', '2021-03-06 06:13:59'),
(304, 51, 'security software', 'security-software', NULL, 1, NULL, NULL, '2021-03-06 06:17:05', '2021-03-06 06:17:05'),
(305, 42, 'Selfie Sticks', 'selfie-sticks', NULL, 1, NULL, NULL, '2021-03-06 06:18:33', '2021-03-06 06:18:33'),
(306, 51, 'Speakers', 'speakers', NULL, 1, NULL, NULL, '2021-03-06 06:20:33', '2021-03-06 06:20:33'),
(307, 57, 'Sunglasses', 'sunglasses', NULL, 1, NULL, NULL, '2021-03-06 06:23:33', '2021-03-06 06:23:33'),
(308, 57, 'Wallet', 'wallet', NULL, 1, NULL, NULL, '2021-03-06 06:24:18', '2021-03-06 06:24:18'),
(309, 57, 'Watches', 'watches', NULL, 1, NULL, NULL, '2021-03-06 06:25:11', '2021-03-06 06:25:11'),
(310, 51, 'webcam', 'webcam', NULL, 1, NULL, NULL, '2021-03-06 06:25:56', '2021-03-06 06:25:56'),
(311, 29, 'Blended Masalas', 'blended-masalas', NULL, 1, NULL, NULL, '2021-03-06 06:35:49', '2021-03-06 06:35:49'),
(312, 29, 'Cooking Paste & Others', 'cooking-paste-others', NULL, 1, NULL, NULL, '2021-03-06 06:38:49', '2021-03-06 06:38:49'),
(313, 29, 'Herbs & Seasonings', 'herbs-seasonings', NULL, 1, NULL, NULL, '2021-03-06 06:45:45', '2021-03-06 06:45:45'),
(314, 29, 'Powdered Spices', 'powdered-spices', NULL, 1, NULL, NULL, '2021-03-06 06:47:12', '2021-03-06 06:47:12'),
(315, 29, 'Whole Spices', 'whole-spices', NULL, 1, NULL, NULL, '2021-03-06 06:48:14', '2021-03-06 06:48:14'),
(316, 73, 'Bowls', 'bowls', NULL, 1, NULL, NULL, '2021-03-06 06:57:42', '2021-03-06 06:57:42'),
(317, 73, 'Cups Mugs and Saucers', 'cups-mugs-and-saucers', NULL, 1, NULL, NULL, '2021-03-06 07:00:26', '2021-03-06 07:00:26'),
(318, 73, 'Dinner Sets', 'dinner-sets', NULL, 1, NULL, NULL, '2021-03-06 07:05:08', '2021-03-06 07:05:08'),
(319, 73, 'Glass', 'glass', NULL, 1, NULL, NULL, '2021-03-06 07:08:46', '2021-03-06 07:08:46'),
(320, 73, 'Jars and Containers', 'jars-and-containers', NULL, 1, NULL, NULL, '2021-03-06 07:11:52', '2021-03-06 07:11:52'),
(321, 73, 'Jug and Pitchers', 'jug-and-pitchers', NULL, 1, NULL, NULL, '2021-03-06 07:17:23', '2021-03-06 07:17:23'),
(322, 73, 'Kadhai and Handi', 'kadhai-and-handi', NULL, 1, NULL, NULL, '2021-03-06 07:19:29', '2021-03-06 07:19:29'),
(323, 73, 'Plates / Khumcha', 'plates-khumcha', NULL, 1, NULL, NULL, '2021-03-06 07:22:03', '2021-03-06 07:22:03'),
(324, 73, 'Sauce Pan and Pots', 'sauce-pan-and-pots', NULL, 1, NULL, NULL, '2021-03-06 07:28:52', '2021-03-06 07:28:52'),
(325, 73, 'Spoon / Forks & Holder', 'spoon-forks-holder', NULL, 1, NULL, NULL, '2021-03-06 07:30:30', '2021-03-06 07:30:30'),
(326, 64, 'Board Pins', 'board-pins', NULL, 1, NULL, NULL, '2021-03-06 07:41:10', '2021-03-06 07:41:10'),
(327, 64, 'Book Ends', 'book-ends', NULL, 1, NULL, NULL, '2021-03-06 07:46:24', '2021-03-06 07:46:24'),
(328, 64, 'Book Reading Stand', 'book-reading-stand', NULL, 1, NULL, NULL, '2021-03-06 07:55:49', '2021-03-06 07:55:49'),
(329, 64, 'Calculators', 'calculators', NULL, 1, NULL, NULL, '2021-03-06 07:57:46', '2021-03-06 07:57:46'),
(330, 64, 'Card Holders', 'card-holders', NULL, 1, NULL, NULL, '2021-03-06 07:59:43', '2021-03-06 07:59:43'),
(331, 64, 'Clocks', 'clocks', NULL, 1, NULL, NULL, '2021-03-06 08:08:24', '2021-03-06 08:08:24'),
(332, 64, 'Diaries', 'diaries', NULL, 1, NULL, NULL, '2021-03-08 05:07:40', '2021-03-08 05:07:40'),
(333, 64, 'Envelopes', 'envelopes', NULL, 1, NULL, NULL, '2021-03-08 05:08:35', '2021-03-08 05:08:35'),
(334, 64, 'File and Folders', 'file-and-folders', NULL, 1, NULL, NULL, '2021-03-08 05:16:33', '2021-03-08 05:16:33'),
(335, 64, 'File Racks & Trays', 'file-racks-trays', NULL, 1, NULL, NULL, '2021-03-08 05:19:21', '2021-03-08 05:19:21'),
(336, 64, 'Highlighter and Marker', 'highlighter-and-marker', NULL, 1, NULL, NULL, '2021-03-08 06:46:27', '2021-03-08 06:46:27'),
(337, 64, 'Paper Clips', 'paper-clips', NULL, 1, NULL, NULL, '2021-03-08 06:51:59', '2021-03-08 06:51:59'),
(338, 64, 'Paper Weight', 'paper-weight', NULL, 1, NULL, NULL, '2021-03-08 06:54:34', '2021-03-08 06:54:34'),
(339, 64, 'Punching Machine', 'punching-machine', NULL, 1, NULL, NULL, '2021-03-08 06:55:28', '2021-03-08 06:55:28'),
(340, 64, 'Racks and Storage Boxes', 'racks-and-storage-boxes', NULL, 1, NULL, NULL, '2021-03-08 06:58:45', '2021-03-08 06:58:45'),
(341, 64, 'Rubber Bands', 'rubber-bands', NULL, 1, NULL, NULL, '2021-03-08 07:01:23', '2021-03-08 07:01:23'),
(342, 64, 'Stamp Pads', 'stamp-pads', NULL, 1, NULL, NULL, '2021-03-08 07:04:58', '2021-03-08 07:04:58'),
(343, 64, 'Stamps', 'stamps', NULL, 1, NULL, NULL, '2021-03-08 07:11:33', '2021-03-08 07:11:33'),
(344, 64, 'Stapler and Staple Remover', 'stapler-and-staple-remover', NULL, 1, NULL, NULL, '2021-03-08 07:14:07', '2021-03-08 07:14:07'),
(345, 64, 'Stapler Pins', 'stapler-pins', NULL, 1, NULL, NULL, '2021-03-08 07:15:14', '2021-03-08 07:15:14'),
(346, 64, 'Tagging Gun', 'tagging-gun', NULL, 1, NULL, NULL, '2021-03-08 07:18:04', '2021-03-08 07:18:04'),
(347, 75, 'Bottle Openers', 'bottle-openers', NULL, 1, NULL, NULL, '2021-03-08 07:26:44', '2021-03-08 07:26:44'),
(348, 75, 'Chakla and Belan', 'chakla-and-belan', NULL, 1, NULL, NULL, '2021-03-08 07:28:09', '2021-03-08 07:28:09'),
(349, 75, 'Chopper\'s and Peelers', 'choppers-and-peelers', NULL, 1, NULL, NULL, '2021-03-08 08:11:29', '2021-03-08 08:11:29'),
(350, 75, 'Chopping Boards', 'chopping-boards', NULL, 1, NULL, NULL, '2021-03-08 08:12:32', '2021-03-08 08:12:32'),
(351, 75, 'Churners (Mathni)', 'churners-mathni', NULL, 1, NULL, NULL, '2021-03-08 08:14:48', '2021-03-08 08:14:48'),
(352, 75, 'Dough Makers', 'dough-makers', NULL, 1, NULL, NULL, '2021-03-08 08:20:54', '2021-03-08 08:20:54'),
(353, 75, 'Gas Lighters', 'gas-lighters', NULL, 1, NULL, NULL, '2021-03-08 08:22:43', '2021-03-08 08:22:43'),
(354, 75, 'Gas Trolleys', 'gas-trolleys', NULL, 1, NULL, NULL, '2021-03-08 08:24:08', '2021-03-08 08:24:08'),
(355, 75, 'Graters and Slicers', 'graters-and-slicers', NULL, 1, NULL, NULL, '2021-03-08 08:26:37', '2021-03-08 08:26:37'),
(356, 75, 'Hand Juicers', 'hand-juicers', NULL, 1, NULL, NULL, '2021-03-08 08:28:13', '2021-03-08 08:28:13'),
(357, 75, 'Ice Crushers', 'ice-crushers', NULL, 1, NULL, NULL, '2021-03-08 09:36:21', '2021-03-08 09:36:21'),
(358, 75, 'Idly Makers', 'idly-makers', NULL, 1, NULL, NULL, '2021-03-08 09:40:37', '2021-03-08 09:40:37'),
(359, 75, 'Khal Battas', 'khal-battas', NULL, 1, NULL, NULL, '2021-03-08 09:45:08', '2021-03-08 09:45:08'),
(360, 75, 'Kitchen Knives', 'kitchen-knives', NULL, 1, NULL, NULL, '2021-03-08 09:48:25', '2021-03-08 09:48:25'),
(361, 75, 'LPG Gas Pipes', 'lpg-gas-pipes', NULL, 1, NULL, NULL, '2021-03-08 09:49:33', '2021-03-08 09:49:33'),
(362, 75, 'Masher and Tenderizers', 'masher-and-tenderizers', NULL, 1, NULL, NULL, '2021-03-08 09:52:41', '2021-03-08 09:52:41'),
(363, 75, 'Measuring Tools', 'measuring-tools', NULL, 1, NULL, NULL, '2021-03-08 09:54:34', '2021-03-08 09:54:34'),
(364, 75, 'Moulds and Scoops', 'moulds-and-scoops', NULL, 1, NULL, NULL, '2021-03-08 09:58:58', '2021-03-08 09:58:58'),
(365, 75, 'Pizza Cutters', 'pizza-cutters', NULL, 1, NULL, NULL, '2021-03-08 10:02:31', '2021-03-08 10:02:31'),
(366, 75, 'Snacks Makers', 'snacks-makers', NULL, 1, NULL, NULL, '2021-03-08 10:06:26', '2021-03-08 10:06:26'),
(367, 75, 'Strainers - Channi', 'strainers-channi', NULL, 1, NULL, NULL, '2021-03-08 10:08:44', '2021-03-08 10:08:44'),
(368, 75, 'Wada Makers', 'wada-makers', NULL, 1, NULL, NULL, '2021-03-08 10:12:19', '2021-03-08 10:12:19'),
(369, 8, 'Boys Booties', 'boys-booties', NULL, 1, NULL, NULL, '2021-03-08 10:20:15', '2021-03-08 10:20:15'),
(370, 8, 'Boys Casual Shoes', 'boys-casual-shoes', NULL, 1, NULL, NULL, '2021-03-08 10:28:17', '2021-03-08 10:28:17'),
(371, 8, 'Boys Ethnic Shoes', 'boys-ethnic-shoes', NULL, 1, NULL, NULL, '2021-03-08 10:29:58', '2021-03-08 10:29:58'),
(372, 8, 'Boys Flats', 'boys-flats', NULL, 1, NULL, NULL, '2021-03-08 10:34:54', '2021-03-08 10:34:54'),
(373, 8, 'Boys Flip Flops', 'boys-flip-flops', NULL, 1, NULL, '2021-03-08 10:46:05', '2021-03-08 10:43:03', '2021-03-08 10:46:05'),
(374, 8, 'Boys Sandals', 'boys-sandals', NULL, 1, NULL, NULL, '2021-03-08 10:49:13', '2021-03-08 10:49:13'),
(375, 8, 'Boys School Shoes', 'boys-school-shoes', NULL, 1, NULL, NULL, '2021-03-08 10:52:55', '2021-03-08 10:52:55'),
(376, 8, 'Boys Sports Shoes', 'boys-sports-shoes', NULL, 1, NULL, NULL, '2021-03-08 10:54:01', '2021-03-08 10:54:01'),
(377, 34, 'Coffee', 'coffee', NULL, 1, NULL, NULL, '2021-03-09 05:51:18', '2021-03-09 05:51:18'),
(378, 34, 'Cold Drinks', 'cold-drinks', NULL, 1, NULL, NULL, '2021-03-09 05:53:14', '2021-03-09 05:53:14'),
(379, 34, 'Energy - Health Drinks', 'energy-health-drinks', NULL, 1, NULL, NULL, '2021-03-09 05:57:25', '2021-03-09 05:57:25'),
(380, 34, 'Juices', 'juices', NULL, 1, NULL, NULL, '2021-03-09 05:59:24', '2021-03-09 05:59:24'),
(381, 34, 'Milk Powder', 'milk-powder', NULL, 1, NULL, NULL, '2021-03-09 06:23:39', '2021-03-09 06:23:39'),
(382, 34, 'Milk Shakes', 'milk-shakes', NULL, 1, NULL, NULL, '2021-03-09 06:44:00', '2021-03-09 06:44:00'),
(383, 34, 'Packaged Water', 'packaged-water', NULL, 1, NULL, NULL, '2021-03-09 06:47:09', '2021-03-09 06:47:09'),
(384, 71, 'Bath Mugs', 'bath-mugs', NULL, 1, NULL, NULL, '2021-03-09 07:03:13', '2021-03-09 07:03:13'),
(385, 71, 'Broom and Brushes', 'broom-and-brushes', NULL, 1, NULL, NULL, '2021-03-09 07:06:44', '2021-03-09 07:06:44'),
(386, 71, 'Bucket', 'bucket', NULL, 1, NULL, NULL, '2021-03-09 07:08:13', '2021-03-09 07:08:13'),
(387, 71, 'Cleaning Pad and Scrubbers', 'cleaning-pad-and-scrubbers', NULL, 1, NULL, NULL, '2021-03-09 07:11:43', '2021-03-09 07:11:43'),
(388, 71, 'Dust Pan', 'dust-pan', NULL, 1, NULL, NULL, '2021-03-09 07:12:59', '2021-03-09 07:12:59'),
(389, 71, 'Dustbins', 'dustbins', NULL, 1, NULL, NULL, '2021-03-09 07:15:05', '2021-03-09 07:15:05'),
(390, 71, 'Garbage Bags', 'garbage-bags', NULL, 1, NULL, NULL, '2021-03-09 07:16:09', '2021-03-09 07:16:09'),
(391, 71, 'MOP & Refills', 'mop-refills', NULL, 1, NULL, NULL, '2021-03-09 07:17:21', '2021-03-09 07:17:21'),
(392, 71, 'Soap Cases', 'soap-cases', NULL, 1, NULL, NULL, '2021-03-09 07:20:36', '2021-03-09 07:20:36'),
(393, 71, 'Spray Bottle', 'spray-bottle', NULL, 1, NULL, NULL, '2021-03-09 07:21:49', '2021-03-09 07:21:49'),
(394, 71, 'Stool', 'stool', NULL, 1, NULL, NULL, '2021-03-09 07:24:34', '2021-03-09 07:24:34'),
(395, 71, 'Tongs', 'tongs', NULL, 1, NULL, NULL, '2021-03-09 07:28:41', '2021-03-09 07:28:41'),
(396, 71, 'Toothbrush Holders & Dispensers', 'toothbrush-holders-dispensers', NULL, 1, NULL, NULL, '2021-03-09 07:30:58', '2021-03-09 07:30:58'),
(397, 71, 'Tounge Cleaner', 'tounge-cleaner', NULL, 1, NULL, NULL, '2021-03-09 07:33:05', '2021-03-09 07:33:05'),
(398, 71, 'Towel / Gamcha', 'towel-gamcha', NULL, 1, NULL, NULL, '2021-03-09 07:34:51', '2021-03-09 07:34:51'),
(399, 81, 'Art and Craft Toys', 'art-and-craft-toys', NULL, 1, NULL, NULL, '2021-03-09 07:41:14', '2021-03-09 07:41:14'),
(400, 81, 'Educational and Learning Toys', 'educational-and-learning-toys', NULL, 1, NULL, NULL, '2021-03-09 07:48:31', '2021-03-09 07:48:31'),
(401, 81, 'Musical Instruments and Toys', 'musical-instruments-and-toys', NULL, 1, NULL, NULL, '2021-03-09 07:51:40', '2021-03-09 07:51:40'),
(402, 66, 'Geometry Pouches', 'geometry-pouches', NULL, 1, NULL, NULL, '2021-03-09 07:58:16', '2021-03-09 07:58:16'),
(403, 66, 'Inks', 'inks', NULL, 1, NULL, NULL, '2021-03-09 08:02:37', '2021-03-09 08:02:37'),
(404, 66, 'Pencil', 'pencil', NULL, 1, NULL, NULL, '2021-03-09 08:04:17', '2021-03-09 08:04:17'),
(405, 66, 'Pencil Lead', 'pencil-lead', NULL, 1, NULL, NULL, '2021-03-09 08:05:49', '2021-03-09 08:05:49'),
(406, 66, 'Pens', 'pens', NULL, 1, NULL, NULL, '2021-03-09 08:07:38', '2021-03-09 08:07:38'),
(407, 65, 'Canvas Board', 'canvas-board', NULL, 1, NULL, NULL, '2021-03-09 08:13:54', '2021-03-09 08:13:54'),
(408, 65, 'Color Paints', 'color-paints', NULL, 1, NULL, NULL, '2021-03-10 08:02:42', '2021-03-10 08:02:42'),
(409, 65, 'Colors & Crayons', 'colors-crayons', NULL, 1, NULL, NULL, '2021-03-10 08:08:16', '2021-03-10 08:08:16'),
(410, 65, 'Craft Works', 'craft-works', NULL, 1, NULL, NULL, '2021-03-10 08:16:25', '2021-03-10 08:16:25'),
(411, 65, 'Easel', 'easel', NULL, 1, NULL, NULL, '2021-03-10 08:17:40', '2021-03-10 08:17:40'),
(412, 65, 'Paint Brushes', 'paint-brushes', NULL, 1, NULL, NULL, '2021-03-10 08:19:37', '2021-03-10 08:19:37'),
(413, 65, 'Scissor', 'scissor', NULL, 1, NULL, NULL, '2021-03-10 08:21:53', '2021-03-10 08:21:53'),
(414, 65, 'Spray Paint', 'spray-paint', NULL, 1, NULL, NULL, '2021-03-10 08:25:58', '2021-03-10 08:25:58'),
(415, 65, 'Stencils', 'stencils', NULL, 1, NULL, NULL, '2021-03-10 08:27:48', '2021-03-10 08:27:48'),
(416, 65, 'Stickers', 'stickers', NULL, 1, NULL, NULL, '2021-03-10 08:29:16', '2021-03-10 08:29:16'),
(417, 65, 'Wrapping Paper', 'wrapping-paper', NULL, 1, NULL, NULL, '2021-03-10 08:31:17', '2021-03-10 08:31:17'),
(418, 70, 'Flower Vase', 'flower-vase', NULL, 1, NULL, NULL, '2021-03-10 09:18:55', '2021-03-10 09:18:55'),
(419, 70, 'Greeting Cards', 'greeting-cards', NULL, 1, NULL, NULL, '2021-03-10 09:22:10', '2021-03-10 09:22:10'),
(420, 70, 'Key Chain', 'key-chain', NULL, 1, NULL, NULL, '2021-03-10 09:28:37', '2021-03-10 09:28:37'),
(421, 70, 'Paintings', 'paintings', NULL, 1, NULL, NULL, '2021-03-10 09:31:09', '2021-03-10 09:31:09'),
(422, 70, 'Photo Frames', 'photo-frames', NULL, 1, NULL, NULL, '2021-03-10 09:35:13', '2021-03-10 09:35:13'),
(423, 27, 'Flours', 'flours', NULL, 1, NULL, NULL, '2021-03-10 09:38:53', '2021-03-10 09:38:53'),
(424, 27, 'Pulses', 'pulses', NULL, 1, NULL, NULL, '2021-03-10 09:42:53', '2021-03-10 09:42:53'),
(425, 27, 'Sooji', 'sooji', NULL, 1, NULL, NULL, '2021-03-10 09:45:56', '2021-03-10 09:45:56'),
(426, 27, 'Whole Grains & Millets', 'whole-grains-millets', NULL, 1, NULL, NULL, '2021-03-10 09:53:10', '2021-03-10 09:53:10'),
(427, 19, 'Filament', 'filament', NULL, 1, NULL, NULL, '2021-03-10 10:06:19', '2021-03-10 10:06:19'),
(428, 19, 'Open Ended', 'open-ended', NULL, 1, NULL, NULL, '2021-03-10 10:13:30', '2021-03-10 10:13:30'),
(429, 19, 'Ring Spun', 'ring-spun', NULL, 1, NULL, NULL, '2021-03-10 10:15:20', '2021-03-10 10:15:20'),
(430, 19, 'Vortex', 'vortex', NULL, 1, NULL, NULL, '2021-03-10 10:16:52', '2021-03-10 10:16:52'),
(431, 21, 'Denim Fabric', 'denim-fabric', NULL, 1, NULL, NULL, '2021-03-10 10:18:21', '2021-03-10 10:18:21'),
(432, 21, 'Ethnic Wear & Kurti Fabrics', 'ethnic-wear-kurti-fabrics', NULL, 1, NULL, NULL, '2021-03-10 10:25:56', '2021-03-10 10:25:56'),
(433, 21, 'Hosiery Fabrics', 'hosiery-fabrics', NULL, 1, NULL, NULL, '2021-03-10 10:31:06', '2021-03-10 10:31:06'),
(434, 21, 'Shirting Fabrics', 'shirting-fabrics', NULL, 1, NULL, NULL, '2021-03-10 10:33:34', '2021-03-10 10:33:34'),
(435, 21, 'Trouser Fabric', 'trouser-fabric', NULL, 1, NULL, NULL, '2021-03-10 10:43:34', '2021-03-10 10:43:34'),
(436, 21, 'Uniform Fabrics', 'uniform-fabrics', NULL, 1, NULL, NULL, '2021-03-10 10:45:03', '2021-03-10 10:45:03'),
(437, 53, 'Bag Backpack', 'bag-backpack', NULL, 1, NULL, NULL, '2021-03-10 11:16:12', '2021-03-10 11:16:12'),
(438, 53, 'Clutches', 'clutches', NULL, 1, NULL, NULL, '2021-03-10 11:23:11', '2021-03-10 11:23:11'),
(439, 53, 'Duffle Bags', 'duffle-bags', NULL, 1, NULL, NULL, '2021-03-10 11:25:25', '2021-03-10 11:25:25'),
(440, 53, 'Gym Bags', 'gym-bags', NULL, 1, NULL, NULL, '2021-03-10 11:27:07', '2021-03-10 11:27:07'),
(441, 53, 'Hand Bags', 'hand-bags', NULL, 1, NULL, NULL, '2021-03-10 11:28:22', '2021-03-10 11:28:22'),
(442, 53, 'Lunch Bags', 'lunch-bags', NULL, 1, NULL, NULL, '2021-03-10 11:30:41', '2021-03-10 11:30:41'),
(443, 53, 'Messenger Bags', 'messenger-bags', NULL, 1, NULL, NULL, '2021-03-10 11:32:06', '2021-03-10 11:32:06'),
(444, 53, 'Pouches and Potlis', 'pouches-and-potlis', NULL, 1, NULL, NULL, '2021-03-10 11:34:16', '2021-03-10 11:34:16'),
(445, 53, 'Satchels', 'satchels', NULL, 1, NULL, NULL, '2021-03-10 11:35:47', '2021-03-10 11:35:47'),
(446, 53, 'School Bags', 'school-bags', NULL, 1, NULL, NULL, '2021-03-10 11:39:02', '2021-03-10 11:39:02'),
(447, 53, 'Shopping Bags', 'shopping-bags', NULL, 1, NULL, NULL, '2021-03-10 11:40:27', '2021-03-10 11:40:27'),
(448, 53, 'Sling Bags', 'sling-bags', NULL, 1, NULL, NULL, '2021-03-10 11:53:58', '2021-03-10 11:53:58'),
(449, 53, 'Toiletry Kit Bags', 'toiletry-kit-bags', NULL, 1, NULL, NULL, '2021-03-10 11:56:20', '2021-03-10 11:56:20'),
(450, 35, 'Mandakki / Puffed Rice', 'mandakki-puffed-rice', NULL, 1, NULL, NULL, '2021-03-10 12:04:07', '2021-03-10 12:04:07'),
(451, 35, 'Poha / Avalakki', 'poha-avalakki', NULL, 1, NULL, NULL, '2021-03-10 12:06:30', '2021-03-10 12:06:30'),
(452, 35, 'Rice', 'rice', NULL, 1, NULL, NULL, '2021-03-10 12:08:27', '2021-03-10 12:08:27'),
(453, 35, 'Sabudana - Sago', 'sabudana-sago', NULL, 1, NULL, NULL, '2021-03-10 12:14:44', '2021-03-10 12:14:44'),
(454, 82, 'Bikes toys', 'bikes-toys', NULL, 1, NULL, NULL, '2021-03-10 12:23:49', '2021-03-10 12:23:49'),
(455, 82, 'Cars Toys', 'cars-toys', NULL, 1, NULL, NULL, '2021-03-10 12:26:22', '2021-03-10 12:26:22'),
(456, 82, 'Remote Control Toys', 'remote-control-toys', NULL, 1, NULL, NULL, '2021-03-10 12:28:32', '2021-03-10 12:28:32'),
(457, 82, 'Train toys', 'train-toys', NULL, 1, NULL, NULL, '2021-03-10 12:32:50', '2021-03-10 12:32:50'),
(458, 46, 'Diwan Sets', 'diwan-sets', NULL, 1, NULL, NULL, '2021-03-10 12:35:26', '2021-03-10 12:35:26'),
(459, 46, 'Sofa Covers', 'sofa-covers', NULL, 1, NULL, NULL, '2021-03-10 12:40:54', '2021-03-10 12:40:54'),
(460, 28, 'Jaggery', 'jaggery', NULL, 1, NULL, NULL, '2021-03-10 12:45:11', '2021-03-10 12:45:11'),
(461, 28, 'Salt', 'salt', NULL, 1, NULL, NULL, '2021-03-10 12:46:42', '2021-03-10 12:46:42');
INSERT INTO `categories` (`id`, `category_sub_group_id`, `name`, `slug`, `description`, `active`, `featured`, `deleted_at`, `created_at`, `updated_at`) VALUES
(462, 28, 'Sugar', 'sugar', NULL, 1, NULL, NULL, '2021-03-10 12:48:08', '2021-03-10 12:48:08'),
(463, 26, 'Badam', 'badam', NULL, 1, NULL, NULL, '2021-03-10 12:51:54', '2021-03-10 12:51:54'),
(464, 26, 'Cashews', 'cashews', NULL, 1, NULL, NULL, '2021-03-10 12:53:07', '2021-03-10 12:53:07'),
(465, 26, 'Copra', 'copra', NULL, 1, NULL, NULL, '2021-03-10 12:54:06', '2021-03-10 12:54:06'),
(466, 26, 'Dry Dates', 'dry-dates', NULL, 1, NULL, NULL, '2021-03-10 12:55:26', '2021-03-10 12:55:26'),
(467, 26, 'Dry Grapes', 'dry-grapes', NULL, 1, NULL, NULL, '2021-03-10 12:56:34', '2021-03-10 12:56:34'),
(468, 58, 'Iron Box', 'iron-box', NULL, 1, NULL, NULL, '2021-04-19 10:54:51', '2021-04-19 10:54:51'),
(469, 61, 'Camera', 'camera', NULL, 1, NULL, NULL, '2021-04-20 04:50:46', '2021-04-20 04:50:46'),
(470, 49, 'Laptop', 'laptop', NULL, 1, NULL, NULL, '2021-04-20 05:22:59', '2021-04-20 05:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `channel_name`, `channel_url`, `channel_logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ZShop', 'https://zshop.co.in/', 'https://zshop.co.in/landing/logo.png', 'false', NULL, '2021-06-16 11:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `channel_synced`
--

CREATE TABLE `channel_synced` (
  `id` int(11) NOT NULL,
  `channel_id` int(7) DEFAULT NULL,
  `user_id` int(7) DEFAULT NULL,
  `channel_connection_id` varchar(100) DEFAULT NULL,
  `channel_auth_code` varchar(100) DEFAULT NULL,
  `synced` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `channel_synced`
--

INSERT INTO `channel_synced` (`id`, `channel_id`, `user_id`, `channel_connection_id`, `channel_auth_code`, `synced`, `created_at`, `updated_at`) VALUES
(6, 1, 2, 'hello', 'test', 1, '2021-06-17 09:28:08', '2021-06-21 05:30:38'),
(7, 1, 3, 'hello', 'test', 1, '2021-06-23 06:26:02', '2021-06-23 06:26:02'),
(8, 2, 3, 'hello', 'test', 1, '2021-06-23 06:26:49', '2021-06-23 06:26:49'),
(9, 3, 3, 'hello', 'test', 1, '2021-06-23 06:30:23', '2021-06-23 06:30:23'),
(10, 4, 3, 'hello', 'test', 1, '2021-06-23 06:31:52', '2021-06-23 06:31:52'),
(11, 5, 3, 'hello', 'test', 1, '2021-06-23 06:44:48', '2021-06-23 06:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `webinar_id` int(50) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `connection_request`
--

CREATE TABLE `connection_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `connection_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connection_request`
--

INSERT INTO `connection_request` (`id`, `user_id`, `connection_id`, `auth_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'aeHLOOfNkbwMucOaorYwXJPnefNcbd', NULL, NULL, NULL),
(2, 0, 'HdXG6IMllHBNI4YSiHpzo3UGmzaqur', '', NULL, NULL),
(3, 0, 'LcIZi67H2tLxCz2o0imC6Ob75K1ReR', NULL, NULL, NULL),
(4, 0, 'aYxDfO2tud9GJNexIMKKdbVDdXAwwI', NULL, NULL, NULL),
(5, 0, 'DAERylqyDVoNHNB4wT3JwThLJPK4CT', NULL, NULL, NULL),
(6, 0, 'QoQONhYRIKg2beZNVSLHdwoBo7nmEq', NULL, NULL, NULL),
(7, 0, 'hHAMdel12AvJOBFpsP4WP5NvBo1SXW', '', NULL, NULL),
(8, 2, 'S5U1wmVWVeX8syOjtOmdSFMLP0nWEx', 'k2vCMu6mOxbnlKfq6Swz', NULL, NULL),
(9, 0, 'w9NKRjbWRHMfj9V6P9ZuTL1MQUhDEU', NULL, NULL, NULL),
(10, 0, 'QDE97Qbr3GXLhYWPi2qGVpX2As0h5D', NULL, NULL, NULL),
(11, 0, '68j3d64vRy95JZ3PBAFXsLImRAprz8', NULL, NULL, NULL),
(12, 3, 'DoaTtpd0D7Y8XT6xgqDmsFFH2iFooF', 'TYqWhNAb9LEhDVepmho4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `image`, `referral_code`, `auth_code`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Mayank', 'mayank@pacdevelopers.com', '7355955531', NULL, NULL, '', '', NULL, NULL),
(2, 'Rajni', 'rajni15@gmaio.com', '7860603024', NULL, NULL, 'k2vCMu6mOxbnlKfq6Swz', NULL, NULL, NULL),
(3, 'test', 'test@gmail.com', '7485515', NULL, NULL, 'TYqWhNAb9LEhDVepmho4', NULL, NULL, NULL);

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT 0,
  `featured` tinyint(1) DEFAULT NULL,
  `imageable_id` int(10) UNSIGNED NOT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bannerpath` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `name`, `extension`, `size`, `order`, `featured`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`, `bannerpath`) VALUES
(1, 'images/ywbgliDrcVVVnHfi5vF9mEeiEvanHfp5NWdleJNP.jpeg', 'unnamed.jpg', 'jpg', '73280', 0, 0, 1, 'App\\CategoryGroup', '2020-08-31 13:41:04', '2020-08-31 13:41:04', NULL),
(2, 'images/VAhUfOKmtdgQ7MTBaGXydQVbVJ2pD1yjlqbCl4oe.jpeg', 'swati_july2412.jpg', 'jpg', '202388', 0, 1, 1, 'App\\Category', '2020-08-31 13:42:52', '2020-08-31 13:42:52', NULL),
(4, 'images/prKIIMzWT9zUvsNobySEZ1bo250yuktPacAIkv5h.jpeg', 'swati_july2412.jpg', 'jpg', '202388', 0, NULL, 1, 'App\\Inventory', '2020-08-31 14:24:22', '2020-08-31 14:24:22', NULL),
(5, 'images/bdYRRy1wTyu07EzlwdhU46Nq2QTr9zn6KgTzHvNq.jpeg', 'Kurti.jpg', 'jpg', '43198', 0, 1, 2, 'App\\Category', '2020-09-01 04:42:06', '2020-09-01 04:42:06', NULL),
(6, 'images/YlznmrLc4M3saOWwsjqRQOEks8JgLq3YLRwumhps.jpeg', 'palazzo.jpeg', 'jpeg', '4002', 0, 1, 3, 'App\\Category', '2020-09-01 04:42:36', '2020-09-01 04:42:36', NULL),
(7, 'images/qFl4FgH7D70VTa1zF30pFnCeitWQZAWWSwJE0o3b.jpeg', 'leggings.jpeg', 'jpeg', '4837', 0, 1, 4, 'App\\Category', '2020-09-01 04:43:03', '2020-09-01 04:43:03', NULL),
(8, 'images/23YKkiYOSSdbdmvkMAKT1WIwGcJ5GinaPtJ785Pc.jpeg', 'Girls Dress.jpg', 'jpg', '142693', 0, 1, 5, 'App\\Category', '2020-09-01 04:43:37', '2020-09-01 04:43:37', NULL),
(9, 'images/FJ5gi98EoKyn3S6izWY7sXt73WBXo4kmaKhUi6eK.jpeg', 'Girls T shirt.jpeg', 'jpeg', '5427', 0, 1, 6, 'App\\Category', '2020-09-01 04:44:03', '2020-09-01 04:44:03', NULL),
(10, 'images/thNaprao6zUcaJoqlhlYZPajpNPJLZtVdw9kyNCJ.jpeg', 'Girls jens.jpg', 'jpg', '36101', 0, 1, 7, 'App\\Category', '2020-09-01 04:44:23', '2020-09-01 04:44:23', NULL),
(11, 'images/pOLR4zsmqG0ghLILUsljkt2lVrtzefnB0JGOnvon.jpeg', 'Girl Sweater.jpeg', 'jpeg', '6942', 0, 1, 8, 'App\\Category', '2020-09-01 04:55:53', '2020-09-01 04:55:53', NULL),
(12, 'images/J7w3vUjqGZuo53I7xfV8I2yXZ22dD0gIwJ01WiZb.jpeg', 'Boys Boxer.jpg', 'jpg', '238500', 0, 1, 9, 'App\\Category', '2020-09-01 05:22:52', '2020-09-01 05:22:52', NULL),
(13, 'images/xt67p29XJGHJnA104dTMYSsbNQ4LtApAoEKKrvc6.jpeg', 'Boys Jens.jpg', 'jpg', '39252', 0, 1, 10, 'App\\Category', '2020-09-01 05:23:27', '2020-09-01 05:23:27', NULL),
(14, 'images/i41afz41hgsmYc9TEUZruLXE9iDoEldQr6AfoMlW.jpeg', 'Boys shirt.jpg', 'jpg', '100049', 0, 1, 11, 'App\\Category', '2020-09-01 05:25:01', '2020-09-01 05:25:01', NULL),
(15, 'images/DdAAYwLCaP98dsg7l7SQYwpgLU9QjGtY8v5Zg4sl.jpeg', 'Boys T shirt.jpeg', 'jpeg', '4356', 0, 1, 12, 'App\\Category', '2020-09-01 05:25:24', '2020-09-01 05:25:24', NULL),
(16, 'images/yU4UVUrJolPr8jb0uOqciqbeIYmZuyBt2SfaWA06.jpeg', 'Men Jens.jpg', 'jpg', '26819', 0, 1, 13, 'App\\Category', '2020-09-01 05:25:51', '2020-09-01 05:25:51', NULL),
(17, 'images/8ooZrYOE1bXysPnWJoyaAoK5neKf9KdJszx7UrUk.jpeg', 'Men Casual Shirt.jpg', 'jpg', '34249', 0, 1, 14, 'App\\Category', '2020-09-01 05:26:21', '2020-09-01 05:26:21', NULL),
(18, 'images/p6MHS5v8CKauHTR81AINW6AwhxAAVWZAMxDZJnEz.jpeg', 'Men Formal shirt.jpg', 'jpg', '34232', 0, 1, 15, 'App\\Category', '2020-09-01 05:26:43', '2020-09-01 05:26:43', NULL),
(19, 'images/51xQ0E10oojtCDnysycgUz91W90q9XYoLGoy8HAI.jpeg', 'Men Blazer.jpg', 'jpg', '67788', 0, 1, 16, 'App\\Category', '2020-09-01 05:27:20', '2020-09-01 05:27:20', NULL),
(26, 'images/XLu9lrjv63CY9TIdfUKDqtQvPmA8HQbswkUmxXD0.jpeg', 'http://simpel.in/images/5c8f4b61c518a.jpeg', 'jpeg', '1880', 0, 1, 2414, 'App\\Product', '2020-09-03 12:50:11', '2020-09-03 12:50:11', NULL),
(27, 'images/4R9NMQRv73pT9GL9xuYl9hZT73SiwOH3E7we8VXc.jpeg', 'http://simpel.in/images/5c8f4b61c518a.jpeg', 'jpeg', '1880', 0, 0, 2414, 'App\\Product', '2020-09-03 12:50:11', '2020-09-03 12:50:11', NULL),
(29, 'images/z0xyJ9x0x5XP2EyJgAQVdUOLuexttvIHzsWXxETk.jpeg', 'http://simpel.in/images/5c8f4b61c518a.jpeg', 'jpeg', '1880', 0, 0, 3, 'App\\Inventory', '2020-09-03 13:08:37', '2020-09-03 13:08:37', NULL),
(30, 'images/bMzQ3ByrHOIvtzk1YJBMxsRhCVWaUfE8ONGXC7Bd.jpeg', 'http://simpel.in/images/5c8f4b61c518a.jpeg', 'jpeg', '1880', 0, 0, 3, 'App\\Inventory', '2020-09-03 13:08:37', '2020-09-03 13:08:37', NULL),
(32, 'images/2uucXHqdGbz0AeO83C84mvu6b1NmKO4wtWqPpCvQ.jpeg', 'http://simpel.in/images/5c8f4b61c518a.jpeg', 'jpeg', '1880', 0, 0, 4, 'App\\Inventory', '2020-09-04 06:46:22', '2020-09-04 06:46:22', NULL),
(33, 'images/W4gwIy2CBxO9nPyPWGXnOUy52T1xJ1qucyWjjgNu.jpeg', 'http://simpel.in/images/5c8f4b61c518a.jpeg', 'jpeg', '1880', 0, 0, 4, 'App\\Inventory', '2020-09-04 06:46:22', '2020-09-04 06:46:22', NULL),
(34, 'images/SFXVRaoj9sYvnAHrs4kVQYtvCKlpVrIsyzZJeYEp.jpeg', 'Women doti.jpg', 'jpg', '551482', 0, 1, 17, 'App\\Category', '2020-09-05 04:26:35', '2020-09-05 04:26:35', NULL),
(35, 'images/RK1cYrWM6XigRSakOft2kp4ipRNFSjHk0PuO0nPP.jpeg', 'Raaz-1998-P.GRE.jpg', 'jpg', '226423', 0, NULL, 14, 'App\\Inventory', '2020-09-08 05:39:43', '2020-09-08 05:39:43', NULL),
(36, 'images/fa6h5iiVfafT0EI0IEpHUN0oisEn8yz4dDUuAezZ.jpeg', 'Women Tunic.jpg', 'jpg', '36459', 0, 1, 18, 'App\\Category', '2020-09-08 09:05:08', '2020-09-08 09:05:08', NULL),
(37, 'images/ZJcPwmOKSJyZXtzUmKCJ9MCh7Mca2BzBsoxFnMor.jpeg', 'Dress.jpeg', 'jpeg', '36967', 0, 1, 19, 'App\\Category', '2020-09-08 09:14:10', '2020-09-08 09:14:10', NULL),
(38, 'images/bs2eDGIVyVVHuW2c3zaZ2iYV9yb51gqdDHx7ltZ1.jpeg', 'patiala.jpg', 'jpg', '46844', 0, 1, 20, 'App\\Category', '2020-09-08 09:18:22', '2020-09-08 09:18:22', NULL),
(39, 'images/rwHO1jRSjEKjOAZxv69yWc9tftrGoV5BU8UKZRXc.jpeg', 'women Top.jpg', 'jpg', '75719', 0, 1, 21, 'App\\Category', '2020-09-08 09:25:46', '2020-09-08 09:25:46', NULL),
(40, 'images/b4f3wndiKQBSDDkKr236PO5qdVxSmfzlRTpCiQVq.jpeg', 'Women trouser.jpg', 'jpg', '98728', 0, 1, 22, 'App\\Category', '2020-09-08 09:27:37', '2020-09-08 09:27:37', NULL),
(41, 'images/OkJvrAaZ4vTvV3brU4fJWcdwWMPvE567zLQZSdII.jpeg', 'Women Ethnic Set.jpeg', 'jpeg', '5416', 0, 1, 23, 'App\\Category', '2020-09-08 13:13:25', '2020-09-08 13:13:25', NULL),
(42, 'images/RN4B92sUqg6PX2G4fOJ2XoZys28H653GSz7bhffj.jpeg', 'Ridhi Set-1902-B (1).jpg', 'jpg', '515621', 0, 1, 24, 'App\\Category', '2020-09-11 05:23:49', '2020-09-11 05:23:49', NULL),
(43, 'images/vMKy3Bhw9HBtWPrApzSdOdmAjJfBn1pJcIzanMoF.jpeg', 'Hygiene Essentials.jpg', 'jpg', '53651', 0, 0, 2, 'App\\CategoryGroup', '2020-09-11 05:52:13', '2020-09-11 05:52:13', NULL),
(44, 'images/QanjoCgNKVDdhng8OFLq9fqG2Nv2ItpudZLycfPM.jpeg', 'Fabric Mask.jpg', 'jpg', '129633', 0, 1, 25, 'App\\Category', '2020-09-11 05:54:14', '2020-09-11 05:54:14', NULL),
(45, 'images/XcZldtGRJTuOR30gHpLJbiuLVucSwGHJexpP60mI.jpeg', 'download.jpeg', 'jpeg', '6643', 0, 0, 1, 'App\\PriceList', '2020-09-28 14:45:18', '2020-09-28 14:45:18', NULL),
(46, 'images/XuG3rtl3Nk9lyZWrYrWhPoOIyd74PQNY2TP7ZtOr.jpeg', 'download.jpeg', 'jpeg', '6643', 0, 0, 2, 'App\\PriceList', '2020-10-01 11:38:50', '2020-10-01 11:38:50', NULL),
(47, 'images/cA1HQBeHYGWLyaIxDv0asr8IBgI0mG0NxN1Fs5Z9.jpeg', 'download.jpeg', 'jpeg', '6643', 0, 0, 3, 'App\\PriceList', '2020-10-01 11:50:19', '2020-10-01 11:50:19', NULL),
(48, 'images/0KCZrisPZJYG0An8N4Tw7z8QOYrLRJUZjDrR7Q1P.jpeg', 'https://www.gannett-cdn.com/-mm-/3d4163da6f9c8d4024b714192bad2e4731f11d07/c=41-0-481-331/local/-/media/2018/05/07/MIGroup/BattleCreek/636613035474588578-642567592-1-.jpg?width=534&height=401&fit=crop', 'jpeg', '22919', 0, 1, 2409, 'App\\Product', '2021-01-29 07:08:53', '2021-01-29 07:08:53', NULL),
(49, 'images/zG7MOICiClFhTY41rVA4dvDHPSOxt5vn7CWdjU7k.jpeg', 'https://www.gannett-cdn.com/-mm-/3d4163da6f9c8d4024b714192bad2e4731f11d07/c=41-0-481-331/local/-/media/2018/05/07/MIGroup/BattleCreek/636613035474588578-642567592-1-.jpg?width=534&height=401&fit=crop', 'jpeg', '22919', 0, 1, 2410, 'App\\Product', '2021-01-29 07:09:50', '2021-01-29 07:09:50', NULL),
(54, 'images/1620971745.jpeg', 'download (1).jpeg', 'jpeg', '14022', 0, 0, 2, 'App\\Shop', '2021-02-04 11:40:18', '2021-05-14 05:59:31', 'images/1620971971.jpeg'),
(62, 'images/RbF187eeNHLfGsXZBDpriNfpFswKAhGBmhamakl2.png', 'slider_banner_03.png', 'png', '1672771', 0, 1, 3, 'App\\Slider', '2021-02-10 09:36:05', '2021-02-10 09:36:05', NULL),
(66, 'images/rPSssTYYpCZ8cHK1D9wXPXQvn5KY3wrpxoy0hcdH.png', 'z commerce_icon.png', 'png', '15491', 0, 0, 3, 'App\\Shop', '2021-02-12 06:10:54', '2021-02-12 06:10:54', NULL),
(69, 'images/fOuwfTg7N4GtZoIsXwnKBQn9KLOK3sIEF7TGhB3J.jpeg', 'OIP (3).jpg', 'jpg', '39007', 0, 1, 8, 'App\\Page', '2021-02-12 10:25:21', '2021-02-12 10:25:21', NULL),
(71, 'images/Z1SRvtlTlf6pXDpS9gAYxHnqQ6iDYTuvGlofPnrO.png', 'alena__black.png', 'png', '30942', 0, 1, 4341, 'App\\Product', '2021-02-15 07:06:17', '2021-02-15 07:06:17', NULL),
(72, 'images/o93faHOYUKkbSZ3aL3AUFHMQHrbzIGg6kOT8vJAY.png', 'alena__black.png', 'png', '30942', 0, NULL, 4341, 'App\\Product', '2021-02-15 07:06:18', '2021-02-15 07:06:18', NULL),
(73, 'images/xyzSfiG9bRmfIPVHsKRSZDh4npkHzp2rVpSj4z5L.png', 'alena__black.png', 'png', '30942', 0, NULL, 18442, 'App\\Inventory', '2021-02-15 07:07:55', '2021-02-15 07:07:55', NULL),
(74, 'images/A0ntMoJi7zjoberKtu3qOFRj7OEb6awuFZmr7NGd.png', 'alena__black.png', 'png', '30942', 0, NULL, 19734, 'App\\Inventory', '2021-02-15 10:16:26', '2021-02-15 10:16:26', NULL),
(75, 'images/1zA7OULD68S9vQGaSd79jibOy6t3454fjr3sxsQH.jpeg', 'ashu-infra-creation-pvt-ltd-fort-mumbai-painting-contractors-49nuib3whn.jpg', 'jpg', '16826', 0, NULL, 19734, 'App\\Inventory', '2021-02-15 10:17:31', '2021-02-15 10:17:31', NULL),
(76, 'images/eksQ51j0Dc3whe0F5oyqlg49eET1DpX3SvJ2YjnK.jpeg', 'bottle candle.jpg', 'jpg', '136306', 1, NULL, 19734, 'App\\Inventory', '2021-02-15 10:17:31', '2021-02-15 10:17:31', NULL),
(77, 'images/oVf6AhCLebI0OfetGEcdxWCxzZx5ddxcJpYtFSOa.jpeg', '101590862774.jpg', 'jpg', '362387', 0, 1, 4553, 'App\\Product', '2021-02-18 06:27:18', '2021-02-18 06:27:18', NULL),
(85, 'images/BkhRhcNaR1tkysCw7o5MtUUT2RZQmhlVQLLQfLsv.png', 'logo.png', 'png', '369849', 0, 0, 25, 'App\\Shop', '2021-02-22 08:25:02', '2021-02-22 08:25:02', NULL),
(86, 'images/DevkFbgb8fL7nV98ESrBWIbXG58GJ3IzcvlcAbCW.png', 'r4YcXmVcKhygBuveQTLMCyZbDNHqb8EGzsfpbkZC.png', 'png', '232260', 0, 1, 25, 'App\\Shop', '2021-02-22 08:25:02', '2021-02-22 08:25:02', NULL),
(87, 'images/k0KCb8VWWs83vdu1hCl7ZJGJxnA0N0k7q7eb0EDB.jpeg', 'images.jpeg', 'jpeg', '8672', 0, 1, 4554, 'App\\Product', '2021-02-23 11:21:56', '2021-02-23 11:21:56', NULL),
(88, 'images/phKPIOiu6aOIqGAvN3SiG37By3AcaFGZkVnR32HA.jpeg', 'download.jpeg', 'jpeg', '12664', 0, 1, 4574, 'App\\Product', '2021-02-23 13:07:01', '2021-02-23 13:07:01', NULL),
(89, 'images/wP76nJM7JDMO8tR3JMsUCymbBsygmiXHREiFDMSO.jpeg', 'download.jpeg', 'jpeg', '12664', 0, 1, 4579, 'App\\Product', '2021-02-23 13:26:25', '2021-02-23 13:26:25', NULL),
(90, 'images/dZ98wOAjZiyWCNzWabI9tWutArd94wlnZgPB6Bdd.jpeg', 'download.jpeg', 'jpeg', '12664', 0, NULL, 19775, 'App\\Inventory', '2021-02-24 05:35:23', '2021-02-24 05:35:23', NULL),
(91, 'images/7y4IfzJzAUk1iV1znUWhBQPtsio1faY4NDFBuVNN.jpeg', 'Boys Sweatshirts.jpg', 'jpg', '7299', 0, 1, 26, 'App\\Category', '2021-02-24 06:30:22', '2021-02-24 06:30:22', NULL),
(92, 'images/SsV4IxINF6pIKPKNLrIng2YU4rwQutvhcdKdZQQh.jpeg', 'BOYS SHORTS.jpg', 'jpg', '20824', 0, 1, 27, 'App\\Category', '2021-02-24 06:46:38', '2021-02-24 06:46:38', NULL),
(93, 'images/xSBjq53lBVwlRs1A873oPJzW8gfjBJBHpauiVmUc.jpeg', 'Clothing Set.jpg', 'jpg', '8784', 0, 1, 28, 'App\\Category', '2021-02-24 06:52:14', '2021-02-24 06:52:14', NULL),
(94, 'images/eW96RSO7X7B6zi2lAZlfQySQWLnEpqFnDZzCjLOO.jpeg', 'Kurta Sets.jpg', 'jpg', '9441', 0, 1, 29, 'App\\Category', '2021-02-24 06:56:10', '2021-02-24 06:56:10', NULL),
(95, 'images/UmsRZW3pY7bjS2y9AzF9p5isX6dvtUZCSnLpnSOO.jpeg', 'Track Pants.jpg', 'jpg', '36101', 0, 1, 30, 'App\\Category', '2021-02-24 07:15:32', '2021-02-24 07:15:32', NULL),
(96, 'images/IISTg9TFgFSUN79A6ABesWq97uQPt6WylfuaRfo0.jpeg', 'Jackets.jpg', 'jpg', '180306', 0, 1, 31, 'App\\Category', '2021-02-24 07:18:00', '2021-02-24 07:18:00', NULL),
(97, 'images/iymeDpDU0DT2OG2OGDajH8grhuT2aqMj76pjl2DI.jpeg', 'SWEATERS.jpg', 'jpg', '6572', 0, 1, 32, 'App\\Category', '2021-02-24 07:21:29', '2021-02-24 07:21:29', NULL),
(98, 'images/34cMb8MV5TCmDDvi1DWM5hoIH5hipDHKym0wMXNq.jpeg', 'INNERWEAR.jpg', 'jpg', '132815', 0, 1, 33, 'App\\Category', '2021-02-24 07:27:35', '2021-02-24 07:27:35', NULL),
(99, 'images/40hxuZpb9KOLi2zBgmBIu03Lqxj5DatyRYnxUHO4.jpeg', 'BOYS SLEEPWEAR.jpg', 'jpg', '30958', 0, 1, 34, 'App\\Category', '2021-02-24 07:29:34', '2021-02-24 07:29:34', NULL),
(100, 'images/jZ4USFFL5enG05DeJxe7H1OTCEUyxcevkqdLZLFC.jpeg', 'Girl Tops.jpg', 'jpg', '46027', 0, 1, 35, 'App\\Category', '2021-02-24 07:38:04', '2021-02-24 07:38:04', NULL),
(101, 'images/IxYMLtwd81wBOgbHlexEkPygPS4853l6DfhdTU6J.jpeg', 'GIRLS CLOTHING SETS.jpg', 'jpg', '11223', 0, 1, 36, 'App\\Category', '2021-02-24 07:56:57', '2021-02-24 07:56:57', NULL),
(102, 'images/HyYS2LqHQLThoi2K3nPyBOLmt18udiiN7OiMlPxg.jpeg', 'Girl ETHNICWEAR.jpg', 'jpg', '27698', 0, 1, 37, 'App\\Category', '2021-02-24 08:01:59', '2021-02-24 08:01:59', NULL),
(103, 'images/lqHLoMtfOH50KNbCVaLUVwBBa54fqjvaxNQ7fh1d.jpeg', 'Dungarees.jpg', 'jpg', '15963', 0, 1, 38, 'App\\Category', '2021-02-24 08:08:01', '2021-02-24 08:08:01', NULL),
(104, 'images/IdlXFpgJBvAhUgDKiWnAssvZbxfmKtMEDzwbIIHf.jpeg', 'Jumpsuit.jpg', 'jpg', '19373', 0, 1, 39, 'App\\Category', '2021-02-24 08:11:08', '2021-02-24 08:11:08', NULL),
(105, 'images/iYBmjpUe3VHQ7WVenNYQmSVnHzmKieX1K52t6W0C.jpeg', 'Girl Shorts.jpg', 'jpg', '42368', 0, 1, 40, 'App\\Category', '2021-02-24 08:14:24', '2021-02-24 08:14:24', NULL),
(106, 'images/KRSry1eeR6inBOlUwV7XN8vVliSFjAyqSMykNehY.jpeg', 'Girl Tights.jpg', 'jpg', '5916', 0, 1, 41, 'App\\Category', '2021-02-24 08:21:33', '2021-02-24 08:21:33', NULL),
(107, 'images/N0LpxoCJevnYt9VYmAER4esP3o44f0XCtyLUw8G2.jpeg', 'Skirts.jpg', 'jpg', '41329', 0, 1, 42, 'App\\Category', '2021-02-24 08:27:21', '2021-02-24 08:27:21', NULL),
(108, 'images/1ZtpyohE5BmQr1Nl2CjcPo159KJDtykAe0SprzbZ.jpeg', 'Girl Leggings.jpg', 'jpg', '52977', 0, 1, 43, 'App\\Category', '2021-02-24 08:30:54', '2021-02-24 08:30:54', NULL),
(109, 'images/gLQKKj04uBJ4ILmajwibfzlnTuSz8TgkgBjpVfjU.jpeg', 'Trousers.jpg', 'jpg', '23053', 0, 1, 44, 'App\\Category', '2021-02-24 08:43:35', '2021-02-24 08:43:35', NULL),
(110, 'images/aWsb59PACeGowTYPbEdp5yRobHlVrX6OdoxeHmxl.jpeg', 'Girl Capris.jpg', 'jpg', '36635', 0, 1, 45, 'App\\Category', '2021-02-24 09:58:34', '2021-02-24 09:58:34', NULL),
(111, 'images/1vq9g8gJDqxXgUxIGNvHni8VTj2uzrmZLLkexCFL.jpeg', 'Girls Sweatshirts.jpg', 'jpg', '162105', 0, 1, 46, 'App\\Category', '2021-02-24 10:01:51', '2021-02-24 10:01:51', NULL),
(112, 'images/RL6ZY8KPT7UEqAvx4cT8pYfaJ2nF3Tbjj9QdHAzG.jpeg', 'Girl sweater.jpg', 'jpg', '160846', 0, 1, 47, 'App\\Category', '2021-02-24 10:28:33', '2021-02-24 10:28:33', NULL),
(113, 'images/kZ2TmldXEIaKUoBmhA3z1Oaub9ii2v9gmIkMNPlS.png', 'Girl Jacket.png', 'png', '265511', 0, 1, 48, 'App\\Category', '2021-02-24 10:30:57', '2021-02-24 10:30:57', NULL),
(114, 'images/ROkQhKS4DfG4D850QmcKRgUYHv7BXeM2k1C3q9JC.jpeg', 'Girls Innerwear.jpg', 'jpg', '37542', 0, 1, 49, 'App\\Category', '2021-02-24 10:33:03', '2021-02-24 10:33:03', NULL),
(115, 'images/XdFLClUl0ZlE9iuXzbZRuy2BlLKHeSH6JtzM7vF0.jpeg', 'Girls Sleepwear.jpg', 'jpg', '7209', 0, 1, 50, 'App\\Category', '2021-02-24 10:34:37', '2021-02-24 10:34:37', NULL),
(116, 'images/aJXVsEhpoxemNNJEIwrP0kLBEzfJkLTBeeBj3cph.jpeg', 'Mens T-Shirts.jpg', 'jpg', '98717', 0, 1, 51, 'App\\Category', '2021-02-24 10:47:41', '2021-02-24 10:47:41', NULL),
(117, 'images/3rWNO4uGpACf3ZCTFtxmWf00E51V8Hxoc6zJxa22.jpeg', 'Mens Sweatshirt.jpg', 'jpg', '5504', 0, 1, 52, 'App\\Category', '2021-02-24 10:52:03', '2021-02-24 10:52:03', NULL),
(118, 'images/DtzjC6hp3dx2SZ2ZZGs2yLicyjaRhLKKVez3B80w.jpeg', 'Men Sweater.jpg', 'jpg', '96585', 0, 1, 53, 'App\\Category', '2021-02-24 11:04:56', '2021-02-24 11:04:56', NULL),
(119, 'images/P5JP0FvLs7IJDZwfwuJcSHxxHgspgNwk2tQmJVou.jpeg', 'Men Jacket.jpg', 'jpg', '8163', 0, 1, 54, 'App\\Category', '2021-02-24 11:07:37', '2021-02-24 11:07:37', NULL),
(120, 'images/kvNnriobA7Letd7JsV2jzU6Me6xKUFVdQazADFkM.jpeg', 'Men SUITS.jpg', 'jpg', '18198', 0, 1, 55, 'App\\Category', '2021-02-24 11:16:33', '2021-02-24 11:16:33', NULL),
(121, 'images/tu3YNvEya7r2heP2pwDqL1tPtMvazWbCPKlSsAWb.jpeg', 'Men RainJackets.jpg', 'jpg', '21291', 0, 1, 56, 'App\\Category', '2021-02-24 11:18:42', '2021-02-24 11:18:42', NULL),
(122, 'images/75SoH9MQ1buMFmYO82LLM42BZ14czK3RJYH48Gh9.jpeg', 'Men Casual Trouser.jpg', 'jpg', '36780', 0, 1, 57, 'App\\Category', '2021-02-24 11:21:57', '2021-02-24 11:21:57', NULL),
(123, 'images/jtQMQfOAl0vNOYwz0BX1HLcp7JZjcSLj8v2vCIRo.jpeg', 'Men formal Trouser.jpg', 'jpg', '59068', 0, 1, 58, 'App\\Category', '2021-02-24 11:26:15', '2021-02-24 11:26:15', NULL),
(124, 'images/DhGYkr0Srxrpo5VFy05O2ROZhoozmJ90NFtToAp3.jpeg', 'Men Shorts.jpg', 'jpg', '219955', 0, 1, 59, 'App\\Category', '2021-02-24 11:28:47', '2021-02-24 11:28:47', NULL),
(125, 'images/TlsMViygBKmHCEBsSQzVeJWuTbP2Ga7BX7RpJrt4.jpeg', 'Men Track Pants.jpg', 'jpg', '15773', 0, 1, 60, 'App\\Category', '2021-02-24 11:33:00', '2021-02-24 11:33:00', NULL),
(126, 'images/U6dvb6m2w4LDZjoE9esU1NMGVQiOFGIuowowgT8E.jpeg', 'Men Joggers.jpg', 'jpg', '15720', 0, 1, 61, 'App\\Category', '2021-02-24 11:37:20', '2021-02-24 11:37:20', NULL),
(127, 'images/rxGpRdWuBLfdgkjHDHcSTanOLEZ9p3AU1pkpLEJO.jpeg', 'Men Kurta Sets.jpg', 'jpg', '66135', 0, 1, 62, 'App\\Category', '2021-02-24 11:41:56', '2021-02-24 11:41:56', NULL),
(128, 'images/bIqnLZa995c15rUldPIAw76ir7QaO0nqFPZNC5qo.jpeg', 'Men Kurta.jpeg', 'jpeg', '7557', 0, 1, 63, 'App\\Category', '2021-02-24 11:46:06', '2021-02-24 11:46:06', NULL),
(129, 'images/myuYv3LTAfrDRcktwbwxHz4ziiw0bOEW60wJvaxu.jpeg', 'Men Sherwani.jpg', 'jpg', '217216', 0, 1, 64, 'App\\Category', '2021-02-24 11:50:09', '2021-02-24 11:50:09', NULL),
(130, 'images/3ZyMqp5Aa4pjf75D0OrjgigeO3En3PUzyf6VIBNu.jpeg', 'Men Dhoti.jpeg', 'jpeg', '10217', 0, 1, 65, 'App\\Category', '2021-02-24 11:52:41', '2021-02-24 11:52:41', NULL),
(131, 'images/jbnQwg9OGEONArdq1kBhE1oZBIKTstsXE49EGxTB.jpeg', 'Men Nehru Jacket.jpg', 'jpg', '59099', 0, 1, 66, 'App\\Category', '2021-02-24 11:57:18', '2021-02-24 11:57:18', NULL),
(132, 'images/jkbugTiarytRVEDsx7KoNAoR4yAOELbgW85wpSPs.jpeg', 'Men Briefs.jpeg', 'jpeg', '48043', 0, 1, 67, 'App\\Category', '2021-02-24 12:02:03', '2021-02-24 12:02:03', NULL),
(133, 'images/MdITAhA00MLKiiRRt3aXFK8LbZMtcuVcfJZRQR9V.jpeg', 'Men Boxer.jpg', 'jpg', '10850', 0, 1, 68, 'App\\Category', '2021-02-24 12:11:32', '2021-02-24 12:11:32', NULL),
(134, 'images/iQ3pmutpAsv6vPnylqvDqHxcbtjmVqKxcghzxNEh.jpeg', 'MEN Night suits.jpg', 'jpg', '16970', 0, 1, 69, 'App\\Category', '2021-02-24 12:18:03', '2021-02-24 12:18:03', NULL),
(135, 'images/PUHzEytVUpPZD8ZPMeVYoY6SSJ65xUtFs4O1ZfNd.jpeg', 'Men Thermal Set.jpg', 'jpg', '11422', 0, 1, 70, 'App\\Category', '2021-02-24 12:20:09', '2021-02-24 12:20:09', NULL),
(136, 'images/VDGsgVmYKqq14Vj9Uy85fcM9HxDpGKt9q5ccPxti.jpeg', 'Women Dress Material.jpeg', 'jpeg', '139062', 0, 1, 71, 'App\\Category', '2021-02-24 12:31:33', '2021-02-24 12:31:33', NULL),
(137, 'images/fMs9z3ReMPue9iyW63aZb3JyOqUqQTgrY5Ec3u4l.webp', '2ac3672a-d16d-4aec-b853-30a3f50708021526387316249-Jaipur-Kurti-Women-Turquoise-Blue--Green-Printed-Straight-Kurta-5621526387316032-1.webp', 'webp', '266658', 0, 0, 33, 'App\\Shop', '2021-02-24 12:35:15', '2021-02-24 12:35:15', NULL),
(138, 'images/SFe5TebgcS4i4NZtz763ogO7AdFD6XZNVeGzDzDO.webp', '2e6e2e66-7a92-43d6-85c7-a91351020b9a1575540765499-AHIKA-Women-Maroon--Beige-Printed-Straight-Kurta-48115755407-1.webp', 'webp', '231766', 0, 1, 33, 'App\\Shop', '2021-02-24 12:35:15', '2021-02-24 12:35:15', NULL),
(139, 'images/WTthnEQkfAxDVkFKG1ssGMwcDg8i2HAcPKsX2Vsk.jpeg', 'Women Lehenga Choli.jpg', 'jpg', '188669', 0, 1, 72, 'App\\Category', '2021-02-24 12:35:53', '2021-02-24 12:35:53', NULL),
(140, 'images/lg8NWUAITb8bB3QZTH6NFt6HiCiyMtSLyY4Rbpri.jpeg', 'Women Dupatta.jpg', 'jpg', '20077', 0, 1, 73, 'App\\Category', '2021-02-24 12:40:37', '2021-02-24 12:40:37', NULL),
(141, 'images/utmT1QpAAdZLR2dv2b91IyE1iBCfzzirGQfnDev4.png', 'Women Shawl.png', 'png', '460609', 0, 1, 74, 'App\\Category', '2021-02-24 12:42:28', '2021-02-24 12:42:28', NULL),
(142, 'images/kUM1i8akJZe72fvfm9dKAMBIDO6HS1HxemhB20l5.jpeg', 'Women Sarees.jpg', 'jpg', '41076', 0, 1, 75, 'App\\Category', '2021-02-24 12:44:38', '2021-02-24 12:44:38', NULL),
(143, 'images/u7YJFGgPSbz49wYrKE7fQunbk3VReiTKPDUC0fXR.jpeg', 'Women Jumpsuits.jpg', 'jpg', '105338', 0, 1, 76, 'App\\Category', '2021-02-24 12:46:32', '2021-02-24 12:46:32', NULL),
(144, 'images/wf7YvyE3on6VOwVYpuSJ7lOtz75UnZ5VqWReCWNA.jpeg', 'WomenTops.jpg', 'jpg', '144347', 0, 1, 77, 'App\\Category', '2021-02-24 12:51:53', '2021-02-24 12:51:53', NULL),
(145, 'images/KZKI9Am4tp6Jl9LaS9XTPCkEssk2uWP6CWDPQ4u8.jpeg', 'Women Jeans.jpg', 'jpg', '115743', 0, 1, 78, 'App\\Category', '2021-02-24 12:56:04', '2021-02-24 12:56:04', NULL),
(146, 'images/Km3jDUQwGs2NZFiQNrFmW3vNK2JpAtzh5Ojj0BBh.jpeg', 'Women Capris.jpg', 'jpg', '19395', 0, 1, 79, 'App\\Category', '2021-02-24 13:00:15', '2021-02-24 13:00:15', NULL),
(147, 'images/ufvmqPdfLu2vlVM5FdkzDHlQSM6NNcx4vPXyIevR.jpeg', 'Women Skirts.jpg', 'jpg', '18058', 0, 1, 80, 'App\\Category', '2021-02-24 13:03:47', '2021-02-24 13:03:47', NULL),
(148, 'images/otbEmDTK86iDDkSzor1iL2y2KjgwOEBlqREBL2GH.jpeg', 'Women Shorts.jpg', 'jpg', '18989', 0, 1, 81, 'App\\Category', '2021-02-24 13:07:27', '2021-02-24 13:07:27', NULL),
(149, 'images/igCuTcqPrDHQQDYgXE7I6WdYQTWLuXqvRJMM3j89.jpeg', 'Women Shrugs.jpg', 'jpg', '17464', 0, 1, 82, 'App\\Category', '2021-02-24 13:10:11', '2021-02-24 13:10:11', NULL),
(150, 'images/Ipf3LGuKm2TvbzKBGT1L4mWl3wjMbNzQcXlcj1aM.png', 'Screenshot 2020-08-31 at 12.39.32 PM.png', 'png', '195214', 0, 0, 37, 'App\\Shop', '2021-02-24 13:10:52', '2021-02-24 13:10:52', NULL),
(151, 'images/9MYK9jhXg7hoI5nRVa22VgQnB6FIajDEySWNVj70.png', 'Screenshot 2020-11-02 at 10.34.59 PM.png', 'png', '565199', 0, 1, 37, 'App\\Shop', '2021-02-24 13:10:52', '2021-02-24 13:10:52', NULL),
(152, 'images/Ckdsg7gU632Jmzqr4JzWaZNcigyAu6YEZNeljIYj.jpeg', 'Women sweater.jpg', 'jpg', '28941', 0, 1, 83, 'App\\Category', '2021-02-24 13:11:49', '2021-02-24 13:11:49', NULL),
(153, 'images/OaUvFPRem5wjBSYgmz00tugQjqCgi9OLFAwOxD1M.jpeg', 'Women sweatshirt.jpg', 'jpg', '20617', 0, 1, 84, 'App\\Category', '2021-02-24 13:14:47', '2021-02-24 13:14:47', NULL),
(154, 'images/Q71V46tRPHrAwx917b1BNH6rzNudnwwqmpo2sCMt.png', 'icon.png', 'png', '160369', 0, 0, 38, 'App\\Shop', '2021-02-24 13:51:09', '2021-02-24 13:51:09', NULL),
(155, 'images/Wd2xgmirtAvhb7p7N7PnDff5SdAue7ldpFB1VPhw.jpeg', '1582873884_1_ZECL-7019OFF-WHITE-Jazzy_Off-White_Art_Silk_Lehenga_Choli-PEACHMODE_ (1).jpg', 'jpg', '4205', 0, 1, 38, 'App\\Shop', '2021-02-24 13:51:09', '2021-02-24 13:51:09', NULL),
(156, 'images/QcMz8DHdLqVZBAHQlnq7AEPHtaYkBTczVwcacWgY.jpeg', 'Women Jackets.jpg', 'jpg', '342553', 0, 1, 85, 'App\\Category', '2021-02-25 05:10:59', '2021-02-25 05:10:59', NULL),
(157, 'images/VnWPMsRzUfaNcpvJgVUSNVExUqbbkK1AdalGNkLA.jpeg', 'Women Coat.jpg', 'jpg', '37067', 0, 1, 86, 'App\\Category', '2021-02-25 05:20:35', '2021-02-25 05:20:35', NULL),
(158, 'images/ij1N0hqAUsFtfZkQdrKTSwRNw18XR7sklLaFqyUC.jpeg', 'Women Blazer.jpg', 'jpg', '57316', 0, 1, 87, 'App\\Category', '2021-02-25 05:22:47', '2021-02-25 05:22:47', NULL),
(159, 'images/S4LfwL1ZoIxNndUS6yHmpZ7KOfuImbTwe4EZxbRu.jpeg', 'Women Waistcoat.jpg', 'jpg', '16049', 0, 1, 88, 'App\\Category', '2021-02-25 05:25:26', '2021-02-25 05:25:26', NULL),
(160, 'images/5WiOYGIY2Z45QdG46yXvpoWRNccYGeIsZkPlHXIV.jpeg', 'Women Bra.jpg', 'jpg', '13395', 0, 1, 89, 'App\\Category', '2021-02-25 05:28:36', '2021-02-25 05:28:36', NULL),
(161, 'images/GAakFSdVlkO0Me9aUTuGQ106jQ9gV9BLMeLcw1Xs.jpeg', 'Women Brief.jpeg', 'jpeg', '21066', 0, 1, 90, 'App\\Category', '2021-02-25 05:30:11', '2021-02-25 05:30:11', NULL),
(162, 'images/b57Hu37KRdq2Cp4s2XMQe7pcAa9Ng6vdzU82mRWN.jpeg', 'Women Corset.jpg', 'jpg', '51701', 0, 1, 91, 'App\\Category', '2021-02-25 05:34:22', '2021-02-25 05:34:22', NULL),
(163, 'images/k6oyyBGWK3pYSBHRiI7e7OYWdSUx55WvEpDI7oPE.jpeg', 'Women Sleepwear.jpg', 'jpg', '67265', 0, 1, 92, 'App\\Category', '2021-02-25 05:37:18', '2021-02-25 05:37:18', NULL),
(164, 'images/AfnuHWDLKlPj83JmmFHhX9w77iV4U50rDXiqdQ42.jpeg', 'Women Swimwear.jpg', 'jpg', '26012', 0, 1, 93, 'App\\Category', '2021-02-25 05:42:01', '2021-02-25 05:42:01', NULL),
(165, 'images/M7MTApnxFjhXcxUFG1DoGgiokp6k98pFdekjRu4n.jpeg', 'Women Camisoles.jpg', 'jpg', '76996', 0, 1, 94, 'App\\Category', '2021-02-25 05:45:06', '2021-02-25 05:45:06', NULL),
(166, 'images/70v0cFUlLRFeopNOvFYOMm0chDMrR3kE1v9VXkAY.jpeg', 'Women Thermal Set.jpg', 'jpg', '49630', 0, 1, 95, 'App\\Category', '2021-02-25 05:51:03', '2021-02-25 05:51:03', NULL),
(167, 'images/OOJlONrprMnyBNTArTwGhidg7rGCLE21Q2ihhEBz.jpeg', 'Women Ethnicwear.jpg', 'jpg', '12300', 0, 1, 96, 'App\\Category', '2021-02-25 06:08:11', '2021-02-25 06:08:11', NULL),
(169, 'images/1614240548.jpeg', NULL, NULL, '0', 0, 0, 4607, 'App\\Product', '2021-02-25 08:10:00', '2021-02-25 08:10:00', NULL),
(170, 'images/1614240581.jpeg', NULL, NULL, '0', 0, 0, 4607, 'App\\Product', '2021-02-25 08:10:00', '2021-02-25 08:10:00', NULL),
(171, 'images/1614240548.jpeg', '1614240548.jpeg', '.jpeg', '0', 0, 1, 4608, 'App\\Product', '2021-02-25 08:16:12', '2021-02-25 08:16:12', NULL),
(172, 'images/1614240581.jpeg', '1614240581.jpeg', '.jpeg', '0', 0, 0, 4608, 'App\\Product', '2021-02-25 08:16:12', '2021-02-25 08:16:12', NULL),
(173, 'images/xTxrPnj0R7Nu7wDwyYV0oFCvbLLQCDrVd1CbaGYG.jpeg', 'Fabric.jpg', 'jpg', '40354', 0, 0, 3, 'App\\CategoryGroup', '2021-02-25 10:42:17', '2021-02-25 10:42:17', NULL),
(174, 'images/7FCe07hdPmiEH3I0Ymn1Uk6beZKN8PWjmOOXfh1D.jpeg', 'Fibre.jpg', 'jpg', '77920', 0, 0, 4, 'App\\CategoryGroup', '2021-02-25 10:48:54', '2021-02-25 10:48:54', NULL),
(175, 'images/ZsYRt1LoA9JSXJKiep8cRe7pN4daKvlbApvLq9if.jpeg', 'yarn.jpg', 'jpg', '112421', 0, 0, 5, 'App\\CategoryGroup', '2021-02-25 10:58:35', '2021-02-25 10:58:35', NULL),
(176, 'images/aeQgGwz6od0DXJBQAIGHi6TUesHLO0JzoIwgmWLI.jpeg', 'Home Furnishing.jpg', 'jpg', '28534', 0, 0, 6, 'App\\CategoryGroup', '2021-02-25 11:02:02', '2021-02-25 11:02:02', NULL),
(177, 'images/cscMHraFhE5O6UI20PD9hEoyOGi00NaIIVMu6J3W.jpeg', 'Mobile & Mobile Accessories.jpg', 'jpg', '134079', 0, 0, 7, 'App\\CategoryGroup', '2021-02-25 11:08:31', '2021-02-25 11:08:31', NULL),
(178, 'images/iibAxCsyBfL8csDQwBDN7N49i35wbiijXi3eQIr0.png', 'Laptop & Computer.png', 'png', '203299', 0, 0, 8, 'App\\CategoryGroup', '2021-02-25 11:37:15', '2021-02-25 11:37:15', NULL),
(179, 'images/SetMhHJDjk3UL8hGQBFis8yIyHbjMXhyIMao50ko.jpeg', 'Fashion Accessories.jpg', 'jpg', '237499', 0, 0, 9, 'App\\CategoryGroup', '2021-02-25 11:45:15', '2021-02-25 11:45:15', NULL),
(180, 'images/7azKK2YdgzYVbg4SEz4g1Qc9cEnSD1KutI1XJbjY.jpeg', 'Home and Kitchen.jpg', 'jpg', '152722', 0, 0, 10, 'App\\CategoryGroup', '2021-02-25 12:36:24', '2021-02-25 12:36:24', NULL),
(181, 'images/YbaZlNYhNoxpaX1GHgFHbbezL8ychQZl5gOSShjM.jpeg', 'Electronics.jpg', 'jpg', '35485', 0, 0, 11, 'App\\CategoryGroup', '2021-02-25 12:40:54', '2021-02-25 12:40:54', NULL),
(182, 'images/0p6rCJ1CnTmH7VYDqo7HccgWRz6Mf1CwO1Akl9XB.png', 'r4YcXmVcKhygBuveQTLMCyZbDNHqb8EGzsfpbkZC.png', 'png', '232260', 0, NULL, 19789, 'App\\Inventory', '2021-02-25 12:46:41', '2021-02-25 12:46:41', NULL),
(183, 'images/lNYgcgWU03q0l4FNP6v6WJwf8vsBbDp9ZARWt9ig.jpeg', 'Vegetables.jpg', 'jpg', '705443', 0, 0, 12, 'App\\CategoryGroup', '2021-02-25 12:47:44', '2021-02-25 12:47:44', NULL),
(184, 'images/FIsl3gyXjmLRQf27E6Y1UfFgNpkySppHDCDM7Qgb.jpeg', 'Fruits.jpg', 'jpg', '185016', 0, 0, 13, 'App\\CategoryGroup', '2021-02-25 12:51:22', '2021-02-25 12:51:22', NULL),
(185, 'images/qTarJNOwxY0lYK82CWQLFFQwM2FeNi9Bc58Vcoin.jpeg', 'Food and FMCG.jpg', 'jpg', '22444', 0, 0, 14, 'App\\CategoryGroup', '2021-02-25 12:56:31', '2021-02-25 12:56:31', NULL),
(186, 'images/OBRM0JNGdEy51CwuP33fj28JNiQiLeeWlGWra4C6.jpeg', 'Footwear.jpg', 'jpg', '11322', 0, 0, 15, 'App\\CategoryGroup', '2021-02-25 12:59:32', '2021-02-25 12:59:32', NULL),
(187, 'images/2WA4bISBvVQJBWj5r0eFOH7UukeFWkKAft3VBXMp.jpeg', 'Stationery.jpg', 'jpg', '131526', 0, 0, 16, 'App\\CategoryGroup', '2021-02-25 13:02:26', '2021-02-25 13:02:26', NULL),
(188, 'images/61PHvpnniVRqvarjmAPtRcpt6tEuf9WVGY6Zmoow.jpeg', 'Toys & Baby Care.jpg', 'jpg', '42998', 0, 0, 17, 'App\\CategoryGroup', '2021-02-25 13:05:06', '2021-02-25 13:05:06', NULL),
(189, 'images/zpdnENDO6fFcFXPviM475w66rN7IuiVId5XJ6trI.jpeg', 'Disposables.jpeg', 'jpeg', '23638', 0, 0, 18, 'App\\CategoryGroup', '2021-02-25 13:12:24', '2021-02-25 13:12:24', NULL),
(190, 'images/Bskj1vgZ4QW9kc4F380Qiarf0b02vGFjnhaxnDfS.jpeg', 'Anklets.jpg', 'jpg', '96113', 0, 1, 97, 'App\\Category', '2021-02-27 05:18:48', '2021-02-27 05:18:48', NULL),
(191, 'images/lbTtvodw0CkPwWNs62torT9w17Xz0XdnnbNx4SC5.jpeg', 'Armlets.jpg', 'jpg', '19610', 0, 1, 98, 'App\\Category', '2021-02-27 05:23:59', '2021-02-27 05:23:59', NULL),
(192, 'images/EX1dMP7GCj3DSGeFJAdvXZzZYrL8rmjdTPRTzzPu.jpeg', 'Bangles.jpg', 'jpg', '52811', 0, 1, 99, 'App\\Category', '2021-02-27 05:28:12', '2021-02-27 05:28:12', NULL),
(193, 'images/BhuAne2KKDprOL97aDl6hbamNl9ZWSYCcS2bdE3r.jpeg', 'Bracelets.jpg', 'jpg', '249044', 0, 1, 100, 'App\\Category', '2021-02-27 05:31:36', '2021-02-27 05:31:36', NULL),
(194, 'images/GP3t5NYc3a1B0Kwxid3HPV2XDPhQK46tOYQmnyeq.jpeg', 'Bridal Sets.jpg', 'jpg', '84323', 0, 1, 101, 'App\\Category', '2021-02-27 05:37:06', '2021-02-27 05:37:06', NULL),
(195, 'images/6nlQ71GUqg1l6gs3o8aCVeK3HRkPC4byZftKho7d.jpeg', 'Broches.jpg', 'jpg', '15168', 0, 1, 102, 'App\\Category', '2021-02-27 05:46:24', '2021-02-27 05:46:24', NULL),
(196, 'images/hCsJsDOUodeSvfrvUufYHBip8Opu2JRprXeyAzWq.jpeg', 'Brooch.jpg', 'jpg', '47433', 0, 1, 103, 'App\\Category', '2021-02-27 05:48:42', '2021-02-27 05:48:42', NULL),
(197, 'images/pYI0zojDuV7mLtmAQIB3iqpf6vH1iW9l1ISBgzPa.jpeg', 'Earrings.jpg', 'jpg', '23489', 0, 1, 104, 'App\\Category', '2021-02-27 05:52:51', '2021-02-27 05:52:51', NULL),
(198, 'images/Nve2ZFj2xzRknQq2boeT5xG4qIkxm44X45NforYH.jpeg', 'Finger Ring.jpg', 'jpg', '87321', 0, 1, 105, 'App\\Category', '2021-02-27 08:07:00', '2021-02-27 08:07:00', NULL),
(199, 'images/i8hnjNRLldsD9ycy40JR5yKq2u6YEoP7ga9tGC92.jpeg', 'Finger Rings.jpg', 'jpg', '85319', 0, 1, 106, 'App\\Category', '2021-02-27 08:10:50', '2021-02-27 08:10:50', NULL),
(200, 'images/HEbcIXQRGj5Jp3jns5twZHKLdy91DRQtzPLHDf7Q.jpeg', 'Mangalsutra.jpeg', 'jpeg', '53276', 0, 1, 107, 'App\\Category', '2021-02-27 08:13:38', '2021-02-27 08:13:38', NULL),
(201, 'images/GU0pamPEapiosdBDqK6wqPyEJK33g47nGwrBLDIi.jpeg', 'Necklace Sets.jpg', 'jpg', '290784', 0, 1, 108, 'App\\Category', '2021-02-27 08:16:20', '2021-02-27 08:16:20', NULL),
(202, 'images/aRtrA5YvR98lgPv15qR12SZqpKsgtWWfurj0SILC.jpeg', 'Necklaces.jpg', 'jpg', '29838', 0, 1, 109, 'App\\Category', '2021-02-27 08:19:19', '2021-02-27 08:19:19', NULL),
(203, 'images/XqplWyLpDqxT5Fp8UKzkbjCRmVVpjHszXiQyV5LI.jpeg', 'Nose Ring.jpg', 'jpg', '53343', 0, 1, 110, 'App\\Category', '2021-02-27 08:20:39', '2021-02-27 08:20:39', NULL),
(204, 'images/rzRirXJ8vpiYYpoS1xVSNRY3yd6dUL4gR5MEkwWh.jpeg', 'Pendent Sets.jpg', 'jpg', '87989', 0, 1, 111, 'App\\Category', '2021-02-27 08:22:38', '2021-02-27 08:22:38', NULL),
(205, 'images/asiDargzUxceZrk1KlTMnrMQOVHQxX1bPbjNtCDl.jpeg', 'Toe Rings.jpg', 'jpg', '64430', 0, 1, 112, 'App\\Category', '2021-02-27 08:25:14', '2021-02-27 08:25:14', NULL),
(206, 'images/qa1ZwvRj5PjvhO96bCLwETkZyQD8sZg9okfIMfqj.jpeg', 'Agarbatti Holders.jpg', 'jpg', '94191', 0, 1, 113, 'App\\Category', '2021-03-02 05:41:09', '2021-03-02 05:41:09', NULL),
(207, 'images/1614663686.jpeg', '1614663686.jpeg', '.jpeg', '0', 0, 1, 19800, 'App\\Inventory', '2021-03-02 05:44:58', '2021-03-02 05:44:58', NULL),
(209, 'images/gHThvXWXzGddtzD68XQM0SRUEoPbJ81ROWrStXl2.jpeg', 'Decor and Pooja Idols.jpg', 'jpg', '253669', 0, 1, 114, 'App\\Category', '2021-03-02 05:45:01', '2021-03-02 05:45:01', NULL),
(210, 'images/HXRTj1YamRMIGwrySeoqcG1alK5BrJvBPAdZx3e4.jpeg', 'Dhoop Dani.jpg', 'jpg', '29053', 0, 1, 115, 'App\\Category', '2021-03-02 05:49:48', '2021-03-02 05:49:48', NULL),
(211, 'images/MiGEiUWdBlkVM5Zfza25P8HoiOskuObWyiKMhscb.jpeg', 'Diyas.jpg', 'jpg', '11583', 0, 1, 116, 'App\\Category', '2021-03-02 05:52:17', '2021-03-02 05:52:17', NULL),
(212, 'images/qwLi4XNpfBJsp6kOaiAJ8rHMpck99qWIrApILhX9.jpeg', 'Lota Kalash.jpg', 'jpg', '29848', 0, 1, 117, 'App\\Category', '2021-03-02 05:55:02', '2021-03-02 05:55:02', NULL),
(213, 'images/LPCjan2ERNKJmfa7owIL0GDqXcNajWrnI7ORiYTn.jpeg', 'Panch Patra.jpg', 'jpg', '312092', 0, 1, 118, 'App\\Category', '2021-03-02 05:58:12', '2021-03-02 05:58:12', NULL),
(214, 'images/9wJbyhExOzvTnmoTn24VILFarmA7WmZOMHa8lvZu.jpeg', 'Pooja Bells.jpg', 'jpg', '55359', 0, 1, 119, 'App\\Category', '2021-03-02 06:02:15', '2021-03-02 06:02:15', NULL),
(215, 'images/uP8WNwT3WcCjakTGQroM2XVZIajba7itcZPQUNNq.png', 'ecommerce-training-introduction.png', 'png', '136691', 0, 0, 2, 'App\\Blog', '2021-03-02 06:04:20', '2021-03-02 06:04:20', NULL),
(216, 'images/UFUThr93OJo2aNnYpLyPCFd4pvalZR8u1EHa5zDO.png', 'find-the-perfect-product.jpg', 'jpg', '469523', 0, 0, 1, 'App\\Blog', '2021-03-02 06:06:12', '2021-03-02 06:06:12', NULL),
(217, 'images/AaW3NyIYueQUUcV2x7bHKHixC9NUZnjWbFAcXTkP.png', 'why-do-customers-buy-online.png', 'png', '428902', 0, 0, 3, 'App\\Blog', '2021-03-02 06:07:17', '2021-03-02 06:07:17', NULL),
(218, 'images/WoOXVN7XScAJ6RnUe73LhwSqas5mnz6gzvT1ZLJE.jpeg', 'Pooja Plates.jpg', 'jpg', '150758', 0, 1, 120, 'App\\Category', '2021-03-02 06:16:21', '2021-03-02 06:16:21', NULL),
(219, 'images/vdyBzGa0bQCoQr1M8iCYIfl4UmojROi4tdFqDyC9.jpeg', 'Air Conditioners.jpg', 'jpg', '78739', 0, 1, 121, 'App\\Category', '2021-03-02 06:23:37', '2021-03-02 06:23:37', NULL),
(220, 'images/cqsiAZIvjEpeF0Sxv8O6FjnuxKGqkvWfLL1iQUHD.jpeg', 'Air Coolers.jpg', 'jpg', '46423', 0, 1, 122, 'App\\Category', '2021-03-02 06:25:56', '2021-03-02 06:25:56', NULL),
(221, 'images/uO60XdvwDRlHLFqxmtECoGsrGIytMt8XNvBnQ2s8.jpeg', 'Chimneys.jpg', 'jpg', '5258', 0, 1, 123, 'App\\Category', '2021-03-02 06:27:30', '2021-03-02 06:27:30', NULL),
(222, 'images/FRxfpdlrOFGgNl9U0M4fGlT57YpcwIvb8mjVoWXG.jpeg', 'Coffee Makers.jpeg', 'jpeg', '57972', 0, 1, 124, 'App\\Category', '2021-03-02 06:29:12', '2021-03-02 06:29:12', NULL),
(223, 'images/7dKoW0rhefbe8bDvFmT3ZlBfhv7QvTNWoFJAK9Jm.png', 'Dishwashers.png', 'png', '140844', 0, 1, 125, 'App\\Category', '2021-03-02 06:31:24', '2021-03-02 06:31:24', NULL),
(224, 'images/SdVR6OTcpzUUZOA8XZPMs1KEU4rt9TKU7dIH18W6.jpeg', 'Electric Cookers.jpg', 'jpg', '58336', 0, 1, 126, 'App\\Category', '2021-03-02 06:32:27', '2021-03-02 06:32:27', NULL),
(225, 'images/nzIH1TOCDIjtRXnyCAnuL9SCkuVgqM7L3MqTbzIy.jpeg', 'Electric Kettle.jpeg', 'jpeg', '9312', 0, 1, 127, 'App\\Category', '2021-03-02 06:34:19', '2021-03-02 06:34:19', NULL),
(226, 'images/UCUnJ4HJahfzfLsgcSlsDDYpdJw22nCkkjRZKnPi.jpeg', 'Fans.jpg', 'jpg', '13431', 0, 1, 128, 'App\\Category', '2021-03-02 06:37:56', '2021-03-02 06:37:56', NULL),
(227, 'images/WTmBIjZ9uVfz74N83sM1lQk6cYQyrshD7BsPRV47.jpeg', 'Food Processors.jpg', 'jpg', '22395', 0, 1, 129, 'App\\Category', '2021-03-02 06:44:44', '2021-03-02 06:44:44', NULL),
(228, 'images/vY7DKomnfeSXCRCDGoLJptwM152rTmyhf7b3THiq.jpeg', 'Geysers.jpg', 'jpg', '41280', 0, 1, 130, 'App\\Category', '2021-03-02 06:48:27', '2021-03-02 06:48:27', NULL),
(229, 'images/q95dqaoRrt5wokCxvHni8aGzHBI17SILAy97zs2X.jpeg', 'Hair Dryers.jpg', 'jpg', '7189', 0, 1, 131, 'App\\Category', '2021-03-02 07:05:25', '2021-03-02 07:05:25', NULL),
(230, 'images/CeYrDeIDFucS66vSTaNvwkozCcGleU9YlO5ZUQ9e.jpeg', 'Hair Straighteners.jpg', 'jpg', '49702', 0, 1, 132, 'App\\Category', '2021-03-02 07:06:58', '2021-03-02 07:06:58', NULL),
(231, 'images/Gj1zbftG7wnzSOxlthJAoZCyG6FZ4mjscfqSsiAB.jpeg', 'Hand Blenders.jpeg', 'jpeg', '25425', 0, 1, 133, 'App\\Category', '2021-03-02 07:21:56', '2021-03-02 07:21:56', NULL),
(232, 'images/NtnITHAPFfaasjKfQyvTICItio37axhK0fynv3fO.jpeg', 'Immersion Rods.jpg', 'jpg', '32616', 0, 1, 134, 'App\\Category', '2021-03-02 07:24:55', '2021-03-02 07:24:55', NULL),
(233, 'images/fjU868reMnPbaZFBobgNttGOaMNFTjOcljcYaT0f.jpeg', 'Induction Cooktops.jpg', 'jpg', '115166', 0, 1, 135, 'App\\Category', '2021-03-02 07:26:33', '2021-03-02 07:26:33', NULL),
(234, 'images/ASA9YoXBAuKKNykRyeQJjytToDlnggJi8C5CFXrx.jpeg', 'Inverters.jpg', 'jpg', '4699', 0, 1, 136, 'App\\Category', '2021-03-02 07:29:50', '2021-03-02 07:29:50', NULL),
(235, 'images/IDPiiBKbVH5njFtV7ndBv23VN88ITc2i0wohsBJK.jpeg', 'Irons.jpg', 'jpg', '500244', 0, 1, 137, 'App\\Category', '2021-03-02 07:32:03', '2021-03-02 07:32:03', NULL),
(236, 'images/c2C0KuNyFXsHDTxSgW3y067gOaB9jCBPRBd8tl6n.jpeg', 'JuicerMixer.jpg', 'jpg', '10507', 0, 1, 138, 'App\\Category', '2021-03-02 07:35:54', '2021-03-02 07:35:54', NULL),
(237, 'images/mbJvi6rCxfaLWXV8bvuJiygdyb2UjLbQJMCwjUNc.jpeg', 'LED Bulbs.jpg', 'jpg', '12614', 0, 1, 139, 'App\\Category', '2021-03-02 07:39:01', '2021-03-02 07:39:01', NULL),
(238, 'images/85H5qyW4mJoe6sd0f0EQjc4wevSz3dmO0rrrUgCw.jpeg', 'LED Lanterns.jpg', 'jpg', '77267', 0, 1, 140, 'App\\Category', '2021-03-02 07:43:15', '2021-03-02 07:43:15', NULL),
(239, 'images/v45Ab4436SPLu4MNtyGtXog9Com8vXVgMrbhqw3o.jpeg', 'Led Panel Lights.jpg', 'jpg', '3568', 0, 1, 141, 'App\\Category', '2021-03-02 07:48:45', '2021-03-02 07:48:45', NULL),
(240, 'images/S5nvQUY1AxqtKaXmCAKmuieHnXoHtxhHDvRuJqfW.jpeg', 'LED Strings.jpg', 'jpg', '9312', 0, 1, 142, 'App\\Category', '2021-03-02 07:49:39', '2021-03-02 07:49:39', NULL),
(241, 'images/6Uf44TQzxzh32nxlicvqCGQDA4TzYuD01UImNV5q.jpeg', 'Microwave Ovens.jpg', 'jpg', '19640', 0, 1, 143, 'App\\Category', '2021-03-02 08:01:47', '2021-03-02 08:01:47', NULL),
(242, 'images/jimYqlpW1hocV5fqacembK3DQLbGrRivioa7vLYs.jpeg', 'Oven Toaster Grills.jpg', 'jpg', '37026', 0, 1, 144, 'App\\Category', '2021-03-02 08:10:32', '2021-03-02 08:10:32', NULL),
(243, 'images/cqV35j2n6Rum5BQmn42MsnGHXJDtYGj6RIMsn6Dg.jpeg', 'Pop Up Toasters.jpg', 'jpg', '8093', 0, 1, 145, 'App\\Category', '2021-03-02 08:12:58', '2021-03-02 08:12:58', NULL),
(244, 'images/DjGc3f3453nRZaheaFsmXLHJSbLThgQSr205SKiA.jpeg', 'Refrigerators.jpg', 'jpg', '14802', 0, 1, 146, 'App\\Category', '2021-03-02 09:26:41', '2021-03-02 09:26:41', NULL),
(245, 'images/rtykOGDvOiNKHagHh5OwjEcrPjUi0Ws3zUIPMas1.jpeg', 'Room Heaters.jpeg', 'jpeg', '27003', 0, 1, 147, 'App\\Category', '2021-03-02 09:29:36', '2021-03-02 09:29:36', NULL),
(246, 'images/vwliLGVyevbPr0MTy2smjKLThZ8eTitlPHvXLuTK.jpeg', 'Sandwich Makers.jpg', 'jpg', '33290', 0, 1, 148, 'App\\Category', '2021-03-02 09:37:29', '2021-03-02 09:37:29', NULL),
(247, 'images/FFCPOexT94fSqXtDybht32KSvKRadOKUjwDKtHIR.png', 'Sewing Machines.png', 'png', '39904', 0, 1, 149, 'App\\Category', '2021-03-02 09:40:26', '2021-03-02 09:40:26', NULL),
(248, 'images/EMmsp01cYxKwPT7INjGQ8zMFP1dnGAZmdsiO22i3.jpeg', 'TV.jpeg', 'jpeg', '285972', 0, 1, 150, 'App\\Category', '2021-03-02 09:42:36', '2021-03-02 09:42:36', NULL),
(249, 'images/LCN3S00uG2m3K0bNBUYGPDeZZaranOOzyBtky1fU.jpeg', 'Vacuum Cleaners.jpg', 'jpg', '53541', 0, 1, 151, 'App\\Category', '2021-03-02 09:46:17', '2021-03-02 09:46:17', NULL),
(250, 'images/e2QCYUEP8j7gO7w4jH9BmDcGlWCJYfRBSmK51tYv.jpeg', 'Voltage Stabilizers.jpg', 'jpg', '65479', 0, 1, 152, 'App\\Category', '2021-03-02 09:59:54', '2021-03-02 09:59:54', NULL),
(251, 'images/kDpmHSoFNwSjYDxDbxILrg6xkhT30ZwPbHswQCzM.jpeg', 'Washing Machine.jpg', 'jpg', '89234', 0, 1, 153, 'App\\Category', '2021-03-02 10:07:17', '2021-03-02 10:07:17', NULL),
(252, 'images/Zh7cctJ6RgEkquZajlPTtVxjHx6rKNlNR2I6azMv.jpeg', 'Water Geysers.jpg', 'jpg', '9285', 0, 1, 154, 'App\\Category', '2021-03-02 10:10:36', '2021-03-02 10:10:36', NULL),
(253, 'images/A7ZiCcyynsyFo8RdofkiHZaJuEQ7pmvDc8LJiFne.jpeg', 'Water Purifiers.jpg', 'jpg', '398782', 0, 1, 155, 'App\\Category', '2021-03-02 10:13:35', '2021-03-02 10:13:35', NULL),
(254, 'images/6Esoj8pmCDxxrTLhoTQfv7OzkEx2zk3obAOX1LZd.jpeg', 'Wet Grinders.jpg', 'jpg', '16546', 0, 1, 156, 'App\\Category', '2021-03-02 10:15:34', '2021-03-02 10:15:34', NULL),
(255, 'images/kma7SPh5mcpBXYyMR7I5s4xhsRi1FNWC2WpOXjya.jpeg', 'Baby Bath Tubs.jpg', 'jpg', '53167', 0, 1, 157, 'App\\Category', '2021-03-02 10:47:44', '2021-03-02 10:47:44', NULL),
(256, 'images/wHtI2ajYE3ZS7akPKQelDfXMgYw8fyRplR9Cj1vV.jpeg', 'Baby Bibs.jpg', 'jpg', '31860', 0, 1, 158, 'App\\Category', '2021-03-02 10:55:56', '2021-03-02 10:55:56', NULL),
(257, 'images/GK9PIVV1DKvxowx777UO0QDCqo5t8HceDRm0UYWG.jpeg', 'Baby Bottle Cleaning Brushes.jpeg', 'jpeg', '16926', 0, 1, 159, 'App\\Category', '2021-03-02 10:57:59', '2021-03-02 10:57:59', NULL),
(258, 'images/XVMnYaeuY9dfLSRYV3plrTt32E4mRqqRktt7lqYI.jpeg', 'Baby Bottle Cover.jpg', 'jpg', '14017', 0, 1, 160, 'App\\Category', '2021-03-02 10:59:37', '2021-03-02 10:59:37', NULL),
(259, 'images/upwzWadfJJBmawozU9frU8lFFPMEekfBaJn15xMU.jpeg', 'Baby Bottle Nipples.jpg', 'jpg', '9026', 0, 1, 161, 'App\\Category', '2021-03-02 11:28:02', '2021-03-02 11:28:02', NULL),
(260, 'images/LzCQsv56GuOGq4l20xpPc7CAd8imWx4caMQJqnSt.jpeg', 'Baby Bouncers and Rockers.jpg', 'jpg', '166375', 0, 1, 162, 'App\\Category', '2021-03-02 11:29:23', '2021-03-02 11:29:23', NULL),
(261, 'images/ng1uQyv2fjO0jknsC3REHtNDq2I5WDzE0EAZ0zr7.png', 'Baby Car Seats.png', 'png', '114350', 0, 1, 163, 'App\\Category', '2021-03-02 11:33:41', '2021-03-02 11:33:41', NULL),
(262, 'images/8GRk35IlCsN9BtAcDZ0GGc1TctgW9U1wK0j5oUe3.jpeg', 'Baby Carriers.jpg', 'jpg', '27254', 0, 1, 164, 'App\\Category', '2021-03-02 11:35:38', '2021-03-02 11:35:38', NULL),
(263, 'images/adSuRUU0X2C3NrBhVMHTfXRjc8usLXaWTrnk6E60.jpeg', 'Baby Cots.jpg', 'jpg', '392725', 0, 1, 165, 'App\\Category', '2021-03-02 11:39:07', '2021-03-02 11:39:07', NULL),
(264, 'images/byxiX3LaxTS7HQDDyn1JHpEHzZWE9Ptxrjv3yyqR.png', 'Baby Cradles.png', 'png', '270915', 0, 1, 166, 'App\\Category', '2021-03-02 11:41:25', '2021-03-02 11:41:25', NULL),
(265, 'images/sy626VDGSMTYGY8FiPAaaNQnbaKZl3KggFsMLytF.png', 'Baby Cradles.png', 'png', '270915', 0, 1, 167, 'App\\Category', '2021-03-02 11:42:03', '2021-03-02 11:42:03', NULL),
(266, 'images/V74MYAUHfZUgyDaaIIgqNKg32hlgNyRplv2NBfqm.jpeg', 'Baby Feeding Bottle.jpg', 'jpg', '11634', 0, 1, 168, 'App\\Category', '2021-03-02 11:48:28', '2021-03-02 11:48:28', NULL),
(267, 'images/zb2nBrMfCUefd0rAujIKTRFp4A0nhuMDjZUN23lz.jpeg', 'Baby Potty Seats.jpg', 'jpg', '12502', 0, 1, 169, 'App\\Category', '2021-03-02 11:52:25', '2021-03-02 11:52:25', NULL),
(268, 'images/1614686040.jpeg', '1614686040.jpeg', '.jpeg', '0', 0, 1, 4618, 'App\\Product', '2021-03-02 11:54:00', '2021-03-02 11:54:00', NULL),
(269, 'images/fsUmemGAR1Ajdn3L4JSJ2oueMHQy7SNnUvcnQb8q.jpeg', 'Baby Rattles.jpg', 'jpg', '31788', 0, 1, 170, 'App\\Category', '2021-03-02 12:04:11', '2021-03-02 12:04:11', NULL),
(270, 'images/FFeKlCJiO0QHlHvb2bwHVNhPIrzwUc21f8bOqdkZ.jpeg', 'Baby Rattles.jpg', 'jpg', '31788', 0, 1, 171, 'App\\Category', '2021-03-02 12:04:57', '2021-03-02 12:04:57', NULL),
(271, 'images/quQ4UWT40BOvn85rGBNrknWaqFctvjPWXN3opFgS.jpeg', 'Baby Shower Caps.jpg', 'jpg', '113633', 0, 1, 172, 'App\\Category', '2021-03-02 12:06:15', '2021-03-02 12:06:15', NULL),
(272, 'images/9gh8BhoSUL2RF59Lr4hlPxHTHVNjXkvHD3gctXts.jpeg', 'Baby Sipper Cups.jpg', 'jpg', '8319', 0, 1, 173, 'App\\Category', '2021-03-02 12:08:00', '2021-03-02 12:08:00', NULL),
(273, 'images/bW5eNRfzVrUjAPzeGBb4FLAdJvQEUPgmXB2i8pMW.jpeg', 'Baby Walkers.jpg', 'jpg', '21326', 0, 1, 174, 'App\\Category', '2021-03-02 12:10:29', '2021-03-02 12:10:29', NULL),
(274, 'images/5Xl4mXGaP2Q0LQvMiSf862RrlQuazdkITVQWV37D.jpeg', 'Baby Wipes.jpg', 'jpg', '64585', 0, 1, 175, 'App\\Category', '2021-03-02 12:15:41', '2021-03-02 12:15:41', NULL),
(275, 'images/tdIzFO62o0WMug2Pt8KNwozBygWcnL70rUwFHiRI.jpeg', 'Diaper Bags.jpg', 'jpg', '45566', 0, 1, 176, 'App\\Category', '2021-03-02 12:17:12', '2021-03-02 12:17:12', NULL),
(276, 'images/LhJoxOGG95iq5Ps0ypvEC90mcYI6Ro3MOPPl4Tl2.jpeg', 'Diapers.jpg', 'jpg', '17292', 0, 1, 177, 'App\\Category', '2021-03-02 12:21:35', '2021-03-02 12:21:35', NULL),
(277, 'images/30qDOx1DKhqdTb9nrq1rbaAgCvKvq8gZ6vx7STkh.jpeg', 'Mosquito Net.jpg', 'jpg', '24215', 0, 1, 178, 'App\\Category', '2021-03-02 12:23:32', '2021-03-02 12:23:32', NULL),
(278, 'images/tEi2jZoNgHgdi4iFzRI5X7Pjqh8iLSGvFDugVfeI.png', 'Stroller & Prams.png', 'png', '87738', 0, 1, 179, 'App\\Category', '2021-03-02 12:27:46', '2021-03-02 12:27:46', NULL),
(279, 'images/hlGZmTyhWzZ2NH4SfaN6OEP2JG7shOqDPijy1jvb.jpeg', 'Teethers and Soothers.jpg', 'jpg', '5948', 0, 1, 180, 'App\\Category', '2021-03-02 12:29:36', '2021-03-02 12:29:36', NULL),
(280, 'images/k4AQgcGJt3WR3s9mNQtABTZtN2a4fmIXNy1Crg4x.jpeg', 'Badminton Grips.jpg', 'jpg', '5924', 0, 1, 181, 'App\\Category', '2021-03-02 12:44:38', '2021-03-02 12:44:38', NULL),
(281, 'images/1614689206.jpeg', '1614689206.jpeg', '.jpeg', '0', 0, 1, 4620, 'App\\Product', '2021-03-02 12:46:46', '2021-03-02 12:46:46', NULL),
(282, 'images/1614689206.jpeg', '1614689206.jpeg', '.jpeg', '0', 0, 0, 4620, 'App\\Product', '2021-03-02 12:46:46', '2021-03-02 12:46:46', NULL),
(283, 'images/4qWp5zJ4dezg3hfAz7LubotB2zyK95DS6IzsJc2U.png', 'Badminton Nets.png', 'png', '113999', 0, 1, 182, 'App\\Category', '2021-03-02 13:04:03', '2021-03-02 13:04:03', NULL),
(284, 'images/py9B88dsEXxzDKb4xb51dBUfWVhgtSAnWXJU0V9z.jpeg', 'Badminton Racket.jpg', 'jpg', '46571', 0, 1, 183, 'App\\Category', '2021-03-03 09:36:08', '2021-03-03 09:36:08', NULL),
(285, 'images/LcvUQanTG71t76n2H5u7lZq6HUEYOLfwXyU6ycou.jpeg', 'Badminton Shuttlecocks.jpg', 'jpg', '24004', 0, 1, 184, 'App\\Category', '2021-03-03 09:40:11', '2021-03-03 09:40:11', NULL),
(287, 'images/stMPvXc7tGaPkE5pSod4HHtoEaMYQHnLLaXkeh5T.jpeg', 'Basketball.jpg', 'jpg', '34456', 0, 1, 185, 'App\\Category', '2021-03-03 09:46:14', '2021-03-03 09:46:14', NULL),
(288, 'images/wRMyRgNPauSKqDDrYDyHBfq89kUelo367nxDHBi5.jpeg', 'Basketball Accessories.jpg', 'jpg', '45440', 0, 1, 186, 'App\\Category', '2021-03-03 09:49:00', '2021-03-03 09:49:00', NULL),
(289, 'images/gsY4ApHLMm4g63vN6WDNP9FCQiB2yxWPNI2jj1YM.jpeg', 'Carrom Board.jpg', 'jpg', '18994', 0, 1, 187, 'App\\Category', '2021-03-03 09:56:36', '2021-03-03 09:56:36', NULL),
(290, 'images/nrvTo9inrB7vFzRdQ0aIpbuANU4FEXvXGVPVHmTM.jpeg', 'Carrom Coins.jpg', 'jpg', '12478', 0, 1, 188, 'App\\Category', '2021-03-03 09:59:15', '2021-03-03 09:59:15', NULL),
(291, 'images/OgqvKZaCVXZs3Tk5JhM8MqhNXSwB0Tu0uFzmgr1S.jpeg', 'Cricket Accessories.jpg', 'jpg', '35970', 0, 1, 189, 'App\\Category', '2021-03-03 10:01:09', '2021-03-03 10:01:09', NULL),
(294, 'images/uWPDqEWATEtioXf12uMDmT8BJhzwmqqA41dwwJPC.png', 'Cricket Balls.png', 'png', '269858', 0, 1, 190, 'App\\Category', '2021-03-03 10:04:30', '2021-03-03 10:04:30', NULL),
(295, 'images/t0722dcRqgdlMcDMoM9ZUFh72ml5BMWp3lA4E8KA.jpeg', 'Cricket Bats.jpg', 'jpg', '10271', 0, 1, 191, 'App\\Category', '2021-03-03 10:07:40', '2021-03-03 10:07:40', NULL),
(296, 'images/6xJJNXuVIl0hVCNnDYBa1n2ywgjUD4ap5M9iQsDj.jpeg', 'Cricket Glove.jpg', 'jpg', '136020', 0, 1, 192, 'App\\Category', '2021-03-03 10:09:48', '2021-03-03 10:09:48', NULL),
(297, 'images/7QE50jEWntPHn0WJ59219grR6HzkKFXjTrcv4vHC.jpeg', 'Cricket Guards.jpg', 'jpg', '28044', 0, 1, 193, 'App\\Category', '2021-03-03 10:11:55', '2021-03-03 10:11:55', NULL),
(298, 'images/JohqNbxrgOVdxuCEbJhkpDdBiaKkRGTBA8pjTxqj.jpeg', 'Cricket Helmets.jpg', 'jpg', '147103', 0, 1, 194, 'App\\Category', '2021-03-03 10:14:02', '2021-03-03 10:14:02', NULL),
(299, 'images/1LQ7wvsXaIBLAIruiKjFQPsPEI6A4mHDyAMmMQ2q.jpeg', 'Cricket Kit Bags.jpg', 'jpg', '40260', 0, 1, 195, 'App\\Category', '2021-03-03 10:15:41', '2021-03-03 10:15:41', NULL),
(300, 'images/XdkGTRyg7mX3SrfSRlFQaPXoH5JQNjAS7CUaYGsa.jpeg', 'Cricket Kits.jpg', 'jpg', '186353', 0, 1, 196, 'App\\Category', '2021-03-03 10:18:54', '2021-03-03 10:18:54', NULL),
(301, 'images/u5z3BGcgoaOZO5WY0mqYkK3OcpM7yL7o9Ne81w4t.jpeg', 'Cricket Pads.jpg', 'jpg', '5953', 0, 1, 197, 'App\\Category', '2021-03-03 10:23:11', '2021-03-03 10:23:11', NULL),
(302, 'images/gCStxo7Jd1t7AjWDNUNgGc3B4KogQ4lvHhSgU8eN.jpeg', 'Cricket Wickets.jpg', 'jpg', '4254', 0, 1, 198, 'App\\Category', '2021-03-03 10:27:42', '2021-03-03 10:27:42', NULL),
(303, 'images/TNbDi7nT7vdvAeobfed7N3jpCxaG6aVejx55oEWG.jpeg', 'Football.jpg', 'jpg', '77856', 0, 1, 199, 'App\\Category', '2021-03-03 10:40:15', '2021-03-03 10:40:15', NULL),
(304, 'images/GpAWX6nFFZpR7an3XpdB19po4TLy4RCWc307iXpr.jpeg', 'Football Bags.jpg', 'jpg', '34656', 0, 1, 200, 'App\\Category', '2021-03-03 10:47:33', '2021-03-03 10:47:33', NULL),
(305, 'images/E7GxTjLLVSiIBqfldNcKpMebkuzwQFNBGmI22l4f.jpeg', 'Football Guards.jpg', 'jpg', '127101', 0, 1, 201, 'App\\Category', '2021-03-03 11:02:57', '2021-03-03 11:02:57', NULL),
(306, 'images/UwtkuhAG47yfgOqDR0DYLAdiL9A4H76sUPUVAxFA.jpeg', 'Football Nets.jpg', 'jpg', '33600', 0, 1, 202, 'App\\Category', '2021-03-03 11:17:26', '2021-03-03 11:17:26', NULL),
(307, 'images/XSbfeNkIZ0DqNG0X34R3Q2B5IXNNJfzFahZPXLIT.jpeg', 'Goalkeeper Gloves.jpg', 'jpg', '9938', 0, 1, 203, 'App\\Category', '2021-03-03 12:14:28', '2021-03-03 12:14:28', NULL),
(308, 'images/VmwBWh7R1ryDlU096YFDsIR9c7GYZ6bod5Wk68nT.jpeg', 'Hockey Balls.jpg', 'jpg', '3370', 0, 1, 204, 'App\\Category', '2021-03-03 12:17:16', '2021-03-03 12:17:16', NULL),
(309, 'images/ASjjC35eeznzkMsVAcuVMvpd6e2pV3BzDiFv81sN.jpeg', 'Hockey Gloves.jpg', 'jpg', '124688', 0, 1, 205, 'App\\Category', '2021-03-03 12:19:37', '2021-03-03 12:19:37', NULL),
(310, 'images/7pCucBMZHZILjUcZgIK5eJNC265GHeKlJeRhOPMI.jpeg', 'Hockey Guards.jpg', 'jpg', '8586', 0, 1, 206, 'App\\Category', '2021-03-03 12:20:48', '2021-03-03 12:20:48', NULL),
(311, 'images/vKF9wtbpgP4EuNEScgo6SH8ryochHpWFwtRygk5Y.jpeg', 'Hockey Kit Bags.jpg', 'jpg', '5238', 0, 1, 207, 'App\\Category', '2021-03-03 12:25:16', '2021-03-03 12:25:16', NULL),
(312, 'images/lGW2MBt39p5dgwTNGyTzZYN8CliCN9YFcxtGdHEI.jpeg', 'Hockey Sticks.jpg', 'jpg', '11095', 0, 1, 208, 'App\\Category', '2021-03-03 12:31:36', '2021-03-03 12:31:36', NULL),
(313, 'images/Jua2nwiWCaT1o1LAboFvaJXLoZ3X7pSa0s4rDG9w.jpeg', 'Outdoor Toys.jpg', 'jpg', '60176', 0, 1, 209, 'App\\Category', '2021-03-03 12:36:52', '2021-03-03 12:36:52', NULL),
(314, 'images/whzn1GK2LWgWIg7di9zVnbkAY3KaT6X2d8gJOLZF.jpeg', 'Skateboards.jpeg', 'jpeg', '16436', 0, 1, 210, 'App\\Category', '2021-03-03 12:39:17', '2021-03-03 12:39:17', NULL),
(315, 'images/WbV5OtknqYY1tZiyQumxCLNOb0ge5cpmhJ12nwZR.jpeg', 'Skates.jpg', 'jpg', '149187', 0, 1, 211, 'App\\Category', '2021-03-03 12:41:12', '2021-03-03 12:41:12', NULL);
INSERT INTO `images` (`id`, `path`, `name`, `extension`, `size`, `order`, `featured`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`, `bannerpath`) VALUES
(316, 'images/7vCGMDzet5YMuI6FQ0O1Ln7BtTiQYc33elQH9HjM.jpeg', 'Skating Guards.jpeg', 'jpeg', '33678', 0, 1, 212, 'App\\Category', '2021-03-03 12:45:42', '2021-03-03 12:45:42', NULL),
(317, 'images/PZXO4KIdr2Y4G7Fj0sd2vZW4NTtDrvgdTxfksQWI.jpeg', 'Skating Kits.jpeg', 'jpeg', '38204', 0, 1, 213, 'App\\Category', '2021-03-03 12:58:12', '2021-03-03 12:58:12', NULL),
(318, 'images/mXhpTtDzRs0TI4WKaQIsdFUG9iRMNQ071hcZjBs2.jpeg', 'Sports Shoes.jpg', 'jpg', '160398', 0, 1, 214, 'App\\Category', '2021-03-03 12:59:29', '2021-03-03 12:59:29', NULL),
(319, 'images/9QeclcSLr1Lt0efOrwxhZIv0OeIxyhNZaYl5KpsQ.jpeg', 'Table Tennis Balls.jpg', 'jpg', '14376', 0, 1, 215, 'App\\Category', '2021-03-03 13:00:50', '2021-03-03 13:00:50', NULL),
(320, 'images/ZTdZPCWnyhKTJDUiGK4WsBcYH04Em7zOBvHUXrIQ.jpeg', 'Table Tennis Bat Covers & Bag.jpg', 'jpg', '73645', 0, 1, 216, 'App\\Category', '2021-03-03 13:02:04', '2021-03-03 13:02:04', NULL),
(321, 'images/ERuv4iPMgsc0Hixn8KrlCoEF9ATBWskMXteYJ2QV.jpeg', 'Table Tennis Nets.jpg', 'jpg', '11745', 0, 1, 217, 'App\\Category', '2021-03-03 13:03:57', '2021-03-03 13:03:57', NULL),
(322, 'images/JG5z2zXWoJMXwn9pgbY8bM9Ud0dOvhW4zvaNZdTh.jpeg', 'Table Tennis Racket.jpg', 'jpg', '20606', 0, 1, 218, 'App\\Category', '2021-03-03 13:04:56', '2021-03-03 13:04:56', NULL),
(323, 'images/VM73togxpIJTD1FelnmhuBWv1QeOpCeBoiJnGknX.jpeg', 'Table Tennis Sets.jpg', 'jpg', '25891', 0, 1, 219, 'App\\Category', '2021-03-03 13:06:49', '2021-03-03 13:06:49', NULL),
(324, 'images/Fu7oonrDjTPJoejI44HfwcAbLikIqGzdnCs0xDum.jpeg', 'Volley Ball Nets.jpg', 'jpg', '421884', 0, 1, 220, 'App\\Category', '2021-03-03 13:14:41', '2021-03-03 13:14:41', NULL),
(325, 'images/DKUK3qVvw02DV7VbmOQzZ1ve2Qd2jWsvVIAhCrgW.png', 'Volley Balls.png', 'png', '198280', 0, 1, 221, 'App\\Category', '2021-03-03 13:16:48', '2021-03-03 13:16:48', NULL),
(326, 'images/USWxtqIrfBWe7fzVAfMhNrUlSUaABoJBEBtYHTSP.jpeg', 'WaterGun.jpg', 'jpg', '10473', 0, 1, 222, 'App\\Category', '2021-03-03 13:18:17', '2021-03-03 13:18:17', NULL),
(327, 'images/1614778167.jpeg', '1614778167.jpeg', '.jpeg', '0', 0, 1, 4622, 'App\\Product', '2021-03-03 13:29:27', '2021-03-03 13:29:27', NULL),
(328, 'images/1614778324.jpeg', '1614778324.jpeg', '.jpeg', '0', 0, 1, 19801, 'App\\Inventory', '2021-03-03 13:33:21', '2021-03-03 13:33:21', NULL),
(329, 'images/1614779711.jpeg', '1614779711.jpeg', '.jpeg', '0', 0, 1, 4621, 'App\\Product', '2021-03-03 13:55:11', '2021-03-03 13:55:11', NULL),
(330, 'images/x1lrVqKC02oPfedLcTy8aHCrknzlzORKTAZ4xC2E.jpeg', 'fafa9b8bee5831de13710a7cecccd69a.jpg', 'jpg', '81750', 0, 0, 47, 'App\\Shop', '2021-03-04 05:08:54', '2021-03-04 05:08:54', NULL),
(331, 'images/4wZj81iUpxcUITj2iXkDkF7QgbI4g7T2F8c6CL1m.jpeg', 'a62c38e836a7d5b78fa92f89e41bc2ba.jpg', 'jpg', '164646', 0, 1, 47, 'App\\Shop', '2021-03-04 05:08:54', '2021-03-04 05:08:54', NULL),
(332, 'images/1614840255.jpeg', '1614840255.jpeg', '.jpeg', '0', 0, 1, 4619, 'App\\Product', '2021-03-04 06:44:15', '2021-03-04 06:44:15', NULL),
(333, 'images/1614840309.jpeg', '1614840309.jpeg', '.jpeg', '0', 0, 1, 4617, 'App\\Product', '2021-03-04 06:45:09', '2021-03-04 06:45:09', NULL),
(335, 'images/1614866373.jpeg', '1614866373.jpeg', '.jpeg', '0', 0, 1, 19806, 'App\\Inventory', '2021-03-04 13:59:33', '2021-03-04 13:59:33', NULL),
(336, 'images/AviB3VZ4YwemFgH2WsLLlkrO7m8iB8xw4iZ1B8GB.png', '50x50_px_zcommerce_logo.png', 'png', '4959', 0, 0, 35, 'App\\Shop', '2021-03-04 14:09:38', '2021-03-04 14:09:38', NULL),
(337, 'images/PYCTZpc7tyzXXRTBxHePMFHgtW7YpudLm67VBluW.png', '1440x303_bottoM_Banner.png', 'png', '44218', 0, 1, 35, 'App\\Shop', '2021-03-04 14:09:38', '2021-03-04 14:09:38', NULL),
(338, 'no image available', 'no image available', '.jpeg', '0', 0, 1, 19804, 'App\\Inventory', '2021-03-04 18:11:08', '2021-03-04 18:11:08', NULL),
(339, 'no image available', 'no image available', '.jpeg', '0', 0, 0, 19804, 'App\\Inventory', '2021-03-04 18:11:08', '2021-03-04 18:11:08', NULL),
(340, 'no image available', 'no image available', '.jpeg', '0', 0, 1, 19804, 'App\\Inventory', '2021-03-04 18:13:31', '2021-03-04 18:13:31', NULL),
(341, 'no image available', 'no image available', '.jpeg', '0', 0, 0, 19804, 'App\\Inventory', '2021-03-04 18:13:31', '2021-03-04 18:13:31', NULL),
(342, 'no image available', 'no image available', '.jpeg', '0', 0, 0, 19804, 'App\\Inventory', '2021-03-04 18:13:31', '2021-03-04 18:13:31', NULL),
(343, 'no image available', 'no image available', '.jpeg', '0', 0, 1, 19805, 'App\\Inventory', '2021-03-04 18:15:27', '2021-03-04 18:15:27', NULL),
(344, 'no image available', 'no image available', '.jpeg', '0', 0, 0, 19805, 'App\\Inventory', '2021-03-04 18:15:27', '2021-03-04 18:15:27', NULL),
(345, 'images/1614884097.jpeg', '1614884097.jpeg', '.jpeg', '0', 0, 1, 4623, 'App\\Product', '2021-03-04 18:54:58', '2021-03-04 18:54:58', NULL),
(346, 'images/1614884098.jpeg', '1614884098.jpeg', '.jpeg', '0', 0, 0, 4623, 'App\\Product', '2021-03-04 18:54:58', '2021-03-04 18:54:58', NULL),
(347, 'images/1614922499.jpeg', '1614922499.jpeg', '.jpeg', '0', 0, 1, 4624, 'App\\Product', '2021-03-05 05:35:00', '2021-03-05 05:35:00', NULL),
(348, 'images/1614922499.jpeg', '1614922499.jpeg', '.jpeg', '0', 0, 0, 4624, 'App\\Product', '2021-03-05 05:35:00', '2021-03-05 05:35:00', NULL),
(349, 'images/1614922499.jpeg', '1614922499.jpeg', '.jpeg', '0', 0, 1, 4624, 'App\\Product', '2021-03-05 05:36:49', '2021-03-05 05:36:49', NULL),
(350, 'images/ubJjwB8ripVJb3iljT5cpycOxw5L3bjOI0Eys78J.jpeg', 'Baskets.jpg', 'jpg', '309568', 0, 1, 223, 'App\\Category', '2021-03-05 06:10:24', '2021-03-05 06:10:24', NULL),
(351, 'images/olBrwZsJgeImHdwwrJSHFfNvE57hJGRIzYAppl03.jpeg', 'Casserole and Sets.jpg', 'jpg', '77129', 0, 1, 224, 'App\\Category', '2021-03-05 06:19:22', '2021-03-05 06:19:22', NULL),
(352, 'images/bYXtS5B33wOWDNGmyn6WybtfRuTAKDBLZbytpspc.jpeg', 'Chambu Lota.jpg', 'jpg', '10672', 0, 1, 225, 'App\\Category', '2021-03-05 06:22:08', '2021-03-05 06:22:08', NULL),
(353, 'images/hS1fDSQ3fjuEZDPRY4LpYPBG1wRye9yFUBhe5hR4.jpeg', 'Milk can (Barni).jpg', 'jpg', '155138', 0, 1, 226, 'App\\Category', '2021-03-05 06:26:10', '2021-03-05 06:26:10', NULL),
(354, 'images/doXXp1Q2orBEckdVahMOLYvZommwIGGqaTusqHaX.jpeg', 'Rack And Holders.jpg', 'jpg', '35762', 0, 1, 227, 'App\\Category', '2021-03-05 06:32:42', '2021-03-05 06:32:42', NULL),
(355, 'images/PXaRs6lELe8NaCYek07Dzfu5bTVhCdOaYHIQT47j.jpeg', 'Sprout Makers.jpg', 'jpg', '20403', 0, 1, 228, 'App\\Category', '2021-03-05 06:40:33', '2021-03-05 06:40:33', NULL),
(356, 'images/7wAxqFtzhwTHwxeEp08RaCA4GQs3LIjLIktcRKve.jpeg', 'Thermos and Flasks.jpg', 'jpg', '21045', 0, 1, 229, 'App\\Category', '2021-03-05 06:41:55', '2021-03-05 06:41:55', NULL),
(357, 'images/u9ptlIcC3DHklWs3lLgi2PkevgMN5m5wvTKbB8j5.png', 'Adhesive Tapes.png', 'png', '129895', 0, 1, 230, 'App\\Category', '2021-03-05 06:45:41', '2021-03-05 06:45:41', NULL),
(358, 'images/gG0Lx6nnbU99HTmkmTRLKCPPa70YEhC2OQLeR9Xb.jpeg', 'Glue and Glue stick.jpg', 'jpg', '16094', 0, 1, 231, 'App\\Category', '2021-03-05 06:47:29', '2021-03-05 06:47:29', NULL),
(359, 'images/ixrPamUeiFOcl1LxlvTeAAfXcqwvYMdfDYvHBtEs.jpeg', 'Tape Dispensers.jpg', 'jpg', '8746', 0, 1, 232, 'App\\Category', '2021-03-05 06:49:48', '2021-03-05 06:49:48', NULL),
(360, 'images/G4ZrdiD46sguiQPCRHRZ1Jr98ZKPJO5Gy2j6Jf7x.jpeg', 'Bed Covers.jpeg', 'jpeg', '29428', 0, 1, 233, 'App\\Category', '2021-03-05 06:56:35', '2021-03-05 06:56:35', NULL),
(361, 'images/XYxHb0e6Dk8eyz5hgJofseOeJBvNa0ovd07Q6iNc.jpeg', 'Bedding Sets.jpg', 'jpg', '30329', 0, 1, 234, 'App\\Category', '2021-03-05 06:59:05', '2021-03-05 06:59:05', NULL),
(362, 'images/1leml1I8SChGGjMWpXVmk112cDvTeuAo0G8Tr3HF.jpeg', 'Bedsheets.jpg', 'jpg', '318175', 0, 1, 235, 'App\\Category', '2021-03-05 07:00:31', '2021-03-05 07:00:31', NULL),
(363, 'images/cqOxzAiAPURnsTq80KPAdIC1Tin4ji781orMZ7FO.jpeg', 'Blankets Quilts and Dohars.jpg', 'jpg', '19224', 0, 1, 236, 'App\\Category', '2021-03-05 07:03:17', '2021-03-05 07:03:17', NULL),
(364, 'images/6EOT7lLDWr1sICcrllr1yq8oJkofXLob9267R63D.jpeg', 'Cushion.jpg', 'jpg', '66717', 0, 1, 237, 'App\\Category', '2021-03-05 07:06:19', '2021-03-05 07:06:19', NULL),
(365, 'images/P16wKcxaHX5Xcu3rbdl17Ta7mBPPEUMR3hyNez1t.jpeg', 'Cushion Covers.jpg', 'jpg', '43554', 0, 1, 238, 'App\\Category', '2021-03-05 07:09:37', '2021-03-05 07:09:37', NULL),
(366, 'images/2SinarVKnnzN5RfufOuUdVsNhCE4i5y6lFvLusUS.jpeg', 'Mattress Protector.jpg', 'jpg', '4958', 0, 1, 239, 'App\\Category', '2021-03-05 07:13:09', '2021-03-05 07:13:09', NULL),
(367, 'images/fDQr1URuszXjn4wOsEkgEbPCKggbcVP43bSdRNtj.jpeg', 'Pillow Cover.jpg', 'jpg', '35059', 0, 1, 240, 'App\\Category', '2021-03-05 07:18:09', '2021-03-05 07:18:09', NULL),
(368, 'images/hnDqg5Mv2KcTfexg0MasU6VnZSNh6wuqH5sVNX9j.png', 'Pillows.png', 'png', '433147', 0, 1, 241, 'App\\Category', '2021-03-05 07:20:08', '2021-03-05 07:20:08', NULL),
(369, 'images/wmFcIqx597K2XRCPJBYyNEMYNHWEwEscv9QkAmRI.jpeg', 'Alcohol-Based Sanitizer.jpeg', 'jpeg', '44272', 0, 1, 242, 'App\\Category', '2021-03-05 07:28:33', '2021-03-05 07:28:33', NULL),
(370, 'images/stB9NsEg7SZIqmmq7IMR8dNh88gpU2Wcs3nnbhp5.jpeg', 'Non-Alcohol Sanitizer.jpg', 'jpg', '28709', 0, 1, 243, 'App\\Category', '2021-03-05 07:30:29', '2021-03-05 07:30:29', NULL),
(371, 'images/RBfXD2xnntbBDhfrzwmHGvCwSiOfWv0dzkutprTl.jpeg', 'Blackboard - White Board.jpg', 'jpg', '44699', 0, 1, 244, 'App\\Category', '2021-03-05 07:39:51', '2021-03-05 07:39:51', NULL),
(372, 'images/6jeOHd1OMdCBbPKfThRA4dhlniuhl7JqdLuZVDss.jpeg', 'Board Dusters.jpg', 'jpg', '1910', 0, 1, 245, 'App\\Category', '2021-03-05 07:42:29', '2021-03-05 07:42:29', NULL),
(373, 'images/cHzSSlUK1cxE1ddP5jzh8jJFkcvnw9w6UcDrgwqr.jpeg', 'Box Cutter.jpeg', 'jpeg', '12111', 0, 1, 246, 'App\\Category', '2021-03-05 07:44:19', '2021-03-05 07:44:19', NULL),
(374, 'images/hM6CkcRxH0i5kUkdesWadXBkFu1EPFBmqvR840HQ.jpeg', 'Chalks.jpg', 'jpg', '5818', 0, 1, 247, 'App\\Category', '2021-03-05 07:45:53', '2021-03-05 07:45:53', NULL),
(375, 'images/kLWiyUc1EEerhH0cMaTygymHSomPxPWLrIR9XVmY.jpeg', 'Charts and Posters.jpg', 'jpg', '50776', 0, 1, 248, 'App\\Category', '2021-03-05 07:47:58', '2021-03-05 07:47:58', NULL),
(376, 'images/lxa5o16p9MItk1sj1Eq4McI8XxUZ7OZqbb6SapU3.jpeg', 'Clip - Exam Boards.jpg', 'jpg', '22955', 0, 1, 249, 'App\\Category', '2021-03-05 07:48:59', '2021-03-05 07:48:59', NULL),
(377, 'images/xiZFPDzamdwAZVZwbcE7CVHbrAbQ3bykpFTtfnsy.jpeg', 'Eraser and Sharpener.jpg', 'jpg', '53915', 0, 1, 250, 'App\\Category', '2021-03-05 07:51:47', '2021-03-05 07:51:47', NULL),
(378, 'images/3JNAprUoTefUIzsSKfOv9V2gELCHcUwofp4Jfhwe.jpeg', 'Globe.jpg', 'jpg', '46138', 0, 1, 251, 'App\\Category', '2021-03-05 07:52:31', '2021-03-05 07:52:31', NULL),
(379, 'images/2vLE9Q4a2QvxWfQZah13KiHzOavhZqtpUuXxfkkj.jpeg', 'Lunch Boxes.jpg', 'jpg', '24754', 0, 1, 252, 'App\\Category', '2021-03-05 07:55:20', '2021-03-05 07:55:20', NULL),
(380, 'images/yqAvJ65iVJviT41ltr9xJiHl5mR6uci9Oac9prry.jpeg', 'Magnifying Glass.jpg', 'jpg', '8069', 0, 1, 253, 'App\\Category', '2021-03-05 07:57:30', '2021-03-05 07:57:30', NULL),
(381, 'images/I5kQDDas1WNh6E4DU1MeQCvQSABiqskVEKHBhl4P.jpeg', 'Notebook and Register.jpg', 'jpg', '63654', 0, 1, 254, 'App\\Category', '2021-03-05 08:03:03', '2021-03-05 08:03:03', NULL),
(382, 'images/LQLLlqshxRTkMj4BQC2sLSoZkoKYlayLqLuStIBp.png', 'Notepad and Memo pads.png', 'png', '23013', 0, 1, 255, 'App\\Category', '2021-03-05 08:04:49', '2021-03-05 08:04:49', NULL),
(383, 'images/JtTZRiqBTIB6n7IjJBlVqvo7oXxWPGKypFLKc6AG.png', '50x50_px_zcommerce_logo.png', 'png', '4959', 0, 0, 48, 'App\\Shop', '2021-03-05 08:05:21', '2021-03-05 08:05:21', NULL),
(384, 'images/GydLpN7RbSXgs3IBsMuVnCNuU0uk9ZBtFHOUcC2u.png', '50x50_px_zcommerce_logo.png', 'png', '4959', 0, 1, 48, 'App\\Shop', '2021-03-05 08:05:21', '2021-03-05 08:05:21', NULL),
(385, 'images/Zx3xUC7z7iFqd8D2tx0KalTqt5sE4f2G7bNKc0Kl.jpeg', 'Ruler Scale.jpg', 'jpg', '19882', 0, 1, 256, 'App\\Category', '2021-03-05 08:06:45', '2021-03-05 08:06:45', NULL),
(386, 'images/Qukc3D4TkWFYaCB5Sp02W2wzJSuBl0oUuNMhzwQ3.jpeg', 'Study Tables.jpg', 'jpg', '30012', 0, 1, 257, 'App\\Category', '2021-03-05 08:09:09', '2021-03-05 08:09:09', NULL),
(387, 'images/7YAzIzSmHcopVN5nJA6s4Llxa8a89PX01h6C1WMy.png', 'Water Bottles.png', 'png', '51478', 0, 1, 258, 'App\\Category', '2021-03-05 08:10:30', '2021-03-05 08:10:30', NULL),
(388, 'images/xlDNnK31q92oipN3rDnouam6XrhmmIgPWh9eVd1g.jpeg', 'Belts.jpg', 'jpg', '276198', 0, 1, 259, 'App\\Category', '2021-03-05 09:26:55', '2021-03-05 09:26:55', NULL),
(389, 'images/Emo6DLUglmoqr33KveYEK67bwvfM1KjYNkQieBlD.jpeg', 'Binoculars & Optics.jpg', 'jpg', '8999', 0, 1, 260, 'App\\Category', '2021-03-05 09:30:35', '2021-03-05 09:30:35', NULL),
(390, 'images/3cEKhJZxpyiG830XVpGtsvvWvXMcg8A6l3z3SvI0.png', 'Bracelet.png', 'png', '286595', 0, 1, 261, 'App\\Category', '2021-03-05 09:35:17', '2021-03-05 09:35:17', NULL),
(391, 'images/QpSfcOpmZKOTcuS57EdAXSTDyrGXToQLi2T1rJTQ.jpeg', 'Camera Bags.jpg', 'jpg', '266467', 0, 1, 262, 'App\\Category', '2021-03-05 09:41:28', '2021-03-05 09:41:28', NULL),
(392, 'images/9iqCWRhKQCcrCVVqO7rdOGNhRbdT4vl5xT55PgHD.jpeg', 'Camera Batteries Charger.jpg', 'jpg', '12737', 0, 1, 263, 'App\\Category', '2021-03-05 09:43:52', '2021-03-05 09:43:52', NULL),
(393, 'images/zNGrN8nkv6Ih5WrDkjUPOBB5CXkBzGz6yQH3bkEb.jpeg', 'Camera Battery.jpeg', 'jpeg', '11952', 0, 1, 264, 'App\\Category', '2021-03-05 10:00:51', '2021-03-05 10:00:51', NULL),
(394, 'images/4Aqmkby1Txxz1uAFz0YH1RZ96NEDpNVXqQ75inCe.jpeg', 'Camera Filters.jpg', 'jpg', '63387', 0, 1, 265, 'App\\Category', '2021-03-05 10:20:51', '2021-03-05 10:20:51', NULL),
(395, 'images/MrjuHVumP0zpZuYj7PFXL2ZvgJLd3q2o9RpZVQw8.jpeg', 'Camera Flash\'s.jpg', 'jpg', '33410', 0, 1, 266, 'App\\Category', '2021-03-05 10:22:30', '2021-03-05 10:22:30', NULL),
(396, 'images/7T5fgEzUqxjWdaSn8R0PgCqNp612H0tBERioylCg.jpeg', 'Camera Lenses.jpg', 'jpg', '9746', 0, 1, 267, 'App\\Category', '2021-03-05 10:26:25', '2021-03-05 10:26:25', NULL),
(397, 'images/3ghCDXBRAvjD6kvoaqnkKaqDud9xKqxppNxqwqhe.jpeg', 'Camera Stand.jpg', 'jpg', '7386', 0, 1, 268, 'App\\Category', '2021-03-05 10:28:03', '2021-03-05 10:28:03', NULL),
(398, 'images/LMXZjBioVmZv0yIHtp1awyhBjgscPHhE0pjXDTEG.jpeg', 'camera straps.jpg', 'jpg', '13838', 0, 1, 269, 'App\\Category', '2021-03-05 10:29:26', '2021-03-05 10:29:26', NULL),
(399, 'images/MmHJeXVWZkI7am3sSB0gyGSD2MrJt5K6ViyU2qdc.jpeg', 'Caps.jpg', 'jpg', '34887', 0, 1, 270, 'App\\Category', '2021-03-05 11:06:24', '2021-03-05 11:06:24', NULL),
(400, 'images/1fPq2UDQLrllREbKthX2d95ZpmEoRiRsPlcYLkN0.jpeg', 'Combo Motherboards.jpg', 'jpg', '62081', 0, 1, 271, 'App\\Category', '2021-03-05 11:08:05', '2021-03-05 11:08:05', NULL),
(401, 'images/l5TxLbtGrr9Qw9z4npA2BCOmE20RWXm44d1ICjtS.jpeg', 'Computer Cables.jpg', 'jpg', '24538', 0, 1, 272, 'App\\Category', '2021-03-05 11:08:58', '2021-03-05 11:08:58', NULL),
(402, 'images/vUQxeK4xoditK923LrfDgGL54t9nbrmMFxAOtr4Q.png', 'computer sound cards.png', 'png', '39021', 0, 1, 273, 'App\\Category', '2021-03-05 11:11:07', '2021-03-05 11:11:07', NULL),
(403, 'images/6OYXMT4YCgn9Hu4tiv6MsCX1D6xZxi5hzq2aeezp.jpeg', 'CPU.jpg', 'jpg', '56875', 0, 1, 274, 'App\\Category', '2021-03-05 11:12:47', '2021-03-05 11:12:47', NULL),
(404, 'images/Y6K2OwsV6yriybpbrb4AiGS1jkujujcagr0MQ0a0.jpeg', 'Cycle Accessories.jpg', 'jpg', '130950', 0, 1, 275, 'App\\Category', '2021-03-05 11:15:27', '2021-03-05 11:15:27', NULL),
(405, 'images/lr1bXGIMxD60LhC0PArxnvB4o52cTshJaLefOi4U.jpeg', 'External Hard Disks.jpg', 'jpg', '41082', 0, 1, 276, 'App\\Category', '2021-03-05 11:16:59', '2021-03-05 11:16:59', NULL),
(406, 'images/cQirnhMkYFKqD0vgaQjZufPeKBVDZBKFQ3LKglPa.jpeg', 'Graphic Cards.jpg', 'jpg', '16312', 0, 1, 277, 'App\\Category', '2021-03-05 11:22:02', '2021-03-05 11:22:02', NULL),
(407, 'images/7MONuubNzDdQZ2w6EUC651nJX120yAVTZVff03pk.jpeg', 'Hair Band and Tie.jpg', 'jpg', '109135', 0, 1, 278, 'App\\Category', '2021-03-05 11:26:07', '2021-03-05 11:26:07', NULL),
(408, 'images/JPfCFpRn4MITocxBatFtUpJbqAZgkIS0rCLLg7tO.jpeg', 'Hair Clip and Pin.jpg', 'jpg', '30467', 0, 1, 279, 'App\\Category', '2021-03-05 11:27:44', '2021-03-05 11:27:44', NULL),
(409, 'images/qUpZKxZX4PNoVBpTSWI3Nfc2jGDtTJu9JAF8ap4R.jpeg', 'Hair Extension.jpg', 'jpg', '36566', 0, 1, 280, 'App\\Category', '2021-03-05 11:30:21', '2021-03-05 11:30:21', NULL),
(410, 'images/PcO7KvVS39hEes44qp0vM4UnfzVDGQNL8WrTDbX6.jpeg', 'Hair Jewellery.jpg', 'jpg', '98265', 0, 1, 281, 'App\\Category', '2021-03-05 11:32:11', '2021-03-05 11:32:11', NULL),
(411, 'images/6fz9CsQ6CGUjjWQscqkUDSnPVaCC9gAirZF0pSr5.jpeg', 'Headphones & Headsets.jpg', 'jpg', '36446', 0, 1, 282, 'App\\Category', '2021-03-05 11:34:50', '2021-03-05 11:34:50', NULL),
(412, 'images/fE6z7Xqsqo3UazvT8cJXQ8tkFClZNg4HRnR8udDU.jpeg', 'Internal Hard Drive.jpg', 'jpg', '7332', 0, 1, 283, 'App\\Category', '2021-03-05 11:36:15', '2021-03-05 11:36:15', NULL),
(413, 'images/ztpQb1kJBsqwedgYbuf9JuhitAYfJmogZuC1JkJY.jpeg', 'keyboard.jpg', 'jpg', '92137', 0, 1, 284, 'App\\Category', '2021-03-05 11:37:22', '2021-03-05 11:37:22', NULL),
(414, 'images/V9D3ukkYUPm8KFILlB9VG4osKcpdQKJe2VunQTAk.jpeg', 'Laptop bags.jpg', 'jpg', '5349', 0, 1, 285, 'App\\Category', '2021-03-05 11:39:51', '2021-03-05 11:39:51', NULL),
(415, 'images/cW8tPG9KD7Z24y3jQin8XhqTv0qbp2CmwLIjpfKJ.jpeg', 'laptop power Bank.jpg', 'jpg', '54387', 0, 1, 286, 'App\\Category', '2021-03-05 11:41:49', '2021-03-05 11:41:49', NULL),
(416, 'images/MjK0BBcrH6gzFYPdr35fWpiSqxNwGvdQ4bLkT87n.jpeg', 'Laptop Skins & Decals.jpg', 'jpg', '96835', 0, 1, 287, 'App\\Category', '2021-03-05 11:48:20', '2021-03-05 11:48:20', NULL),
(417, 'images/7woihDd8FIMo4MdF8iUTsHmAasUweoTp3YQTWG85.jpeg', 'Lens Cleaners.jpeg', 'jpeg', '36848', 0, 1, 288, 'App\\Category', '2021-03-05 11:52:29', '2021-03-05 11:52:29', NULL),
(418, 'images/1614946525.jpeg', '1614946525.jpeg', '.jpeg', '0', 0, 1, 4625, 'App\\Product', '2021-03-05 12:15:25', '2021-03-05 12:15:25', NULL),
(419, 'images/1614947143.jpeg', '1614947143.jpeg', '.jpeg', '0', 0, 1, 4626, 'App\\Product', '2021-03-05 12:25:43', '2021-03-05 12:25:43', NULL),
(420, 'images/1614950892.jpeg', '1614950892.jpeg', '.jpeg', '0', 0, 1, 4627, 'App\\Product', '2021-03-05 13:28:12', '2021-03-05 13:28:12', NULL),
(421, 'images/9ftVjQpGn7dluqoWnyNpllE3qoVLHNpFi0CKN8XV.jpeg', '07.php7', 'php7', '2384', 0, 0, 50, 'App\\Shop', '2021-03-05 20:15:20', '2021-03-05 20:15:20', NULL),
(422, 'images/vhyeRUYa6Iw6ponSrfCaXdo0Qiibnc9kUWsSqEFa.jpeg', '07.php7', 'php7', '2384', 0, 1, 50, 'App\\Shop', '2021-03-05 20:15:20', '2021-03-05 20:15:20', NULL),
(423, 'images/kGqevLK2cFGlFNO6quCaubNXz9jPcaZYMu1gyw2v.jpeg', '07.php56', 'php56', '2384', 0, 0, 66, 'App\\User', '2021-03-05 20:16:52', '2021-03-05 20:16:52', NULL),
(424, 'images/Pam4FS9xCFr30XJXUxwkQ0Rwi102nuTEIXPvso8E.png', 'Memory Card.png', 'png', '210031', 0, 1, 289, 'App\\Category', '2021-03-06 05:30:03', '2021-03-06 05:30:03', NULL),
(425, 'images/iHA69sj8wuGFf1ApeLxlto0hDdJXrZBih6uYJDJJ.jpeg', 'Memory Cards.jpg', 'jpg', '30320', 0, 1, 290, 'App\\Category', '2021-03-06 05:35:12', '2021-03-06 05:35:12', NULL),
(426, 'images/xdHu6CG0lJX4BOnHRSaOmB8OwS6k7kjS4pewFXe4.jpeg', 'Mobile Cables.jpg', 'jpg', '10948', 0, 1, 291, 'App\\Category', '2021-03-06 05:37:12', '2021-03-06 05:37:12', NULL),
(427, 'images/rPHK5Nf2hziwVUuNMAKxPxSzDspBS3r8xLfa1mDx.jpeg', 'Mobile Cases & Covers.jpg', 'jpg', '108946', 0, 1, 292, 'App\\Category', '2021-03-06 05:39:21', '2021-03-06 05:39:21', NULL),
(428, 'images/8Z1fkwUa1Iyb56L8liWGYygJGTbUGKOtOIiL9zVf.jpeg', 'Mobile Chargers.jpeg', 'jpeg', '17678', 0, 1, 293, 'App\\Category', '2021-03-06 05:43:12', '2021-03-06 05:43:12', NULL),
(429, 'images/E7AIvdhW6zSrhjECNKPNujby3W15iFpNx81pr5gK.jpeg', 'Mobile Holders.jpg', 'jpg', '17071', 0, 1, 294, 'App\\Category', '2021-03-06 05:48:13', '2021-03-06 05:48:13', NULL),
(430, 'images/dVkWWiSXvlbhFfBjPru41CoWIFKozhfntjMsAwx5.jpeg', 'Motherboards.jpg', 'jpg', '25686', 0, 1, 295, 'App\\Category', '2021-03-06 05:49:51', '2021-03-06 05:49:51', NULL),
(431, 'images/ClP5QAaBtp1QNx5mA2anjPDVJ7kwptDDLxTUdVoY.jpeg', 'Mouse.jpg', 'jpg', '55418', 0, 1, 296, 'App\\Category', '2021-03-06 05:51:57', '2021-03-06 05:51:57', NULL),
(432, 'images/qTcZb924uAJhg9QYl4EqlSpPSmYixQIURNZqzG0R.jpeg', 'Pen Drives.jpg', 'jpg', '19880', 0, 1, 297, 'App\\Category', '2021-03-06 06:01:17', '2021-03-06 06:01:17', NULL),
(433, 'images/FODk75wpw7QLaxxYj771GcLdB2jVAkDIuEDeLKv3.png', 'Power Banks.png', 'png', '303089', 0, 1, 298, 'App\\Category', '2021-03-06 06:02:26', '2021-03-06 06:02:26', NULL),
(434, 'images/B74eSuvNkssdlnxLfQ6YHpddqGAnHSEc9itoCMy2.png', 'Power Supply Units.png', 'png', '855874', 0, 1, 299, 'App\\Category', '2021-03-06 06:03:31', '2021-03-06 06:03:31', NULL),
(435, 'images/SC13o8xexJ1aqpNVzg4bmwN8F5sijfOgoGCnBMhh.jpeg', 'Printer.jpg', 'jpg', '93379', 0, 1, 300, 'App\\Category', '2021-03-06 06:06:59', '2021-03-06 06:06:59', NULL),
(436, 'images/jKtf66tpdCDxlFMGKQXJDagFkH058hkAMudkZ31x.jpeg', 'Processors.jpg', 'jpg', '14286', 0, 1, 301, 'App\\Category', '2021-03-06 06:08:16', '2021-03-06 06:08:16', NULL),
(437, 'images/EQyEQRCnn8IhVOeyq7vc27ujN00r9gjDxoOaA4PH.jpeg', 'Projectors.jpg', 'jpg', '26049', 0, 1, 302, 'App\\Category', '2021-03-06 06:11:20', '2021-03-06 06:11:20', NULL),
(438, 'images/NHQifjYPVN6i0zPVZBGj8cnOuYMWjAwFUccUh3De.jpeg', 'RAMs.jpg', 'jpg', '252476', 0, 1, 303, 'App\\Category', '2021-03-06 06:13:59', '2021-03-06 06:13:59', NULL),
(439, 'images/Z1bWwIu9eYEaZGeAH0WsuTE9dq8mvXB16hAviXdh.jpeg', 'security software.jpg', 'jpg', '10692', 0, 1, 304, 'App\\Category', '2021-03-06 06:17:05', '2021-03-06 06:17:05', NULL),
(440, 'images/BJLo3vzQvf2a1BIkiC8Bu931bsGWQleTEwkl4SVu.jpeg', 'Selfie Sticks.jpg', 'jpg', '282146', 0, 1, 305, 'App\\Category', '2021-03-06 06:18:33', '2021-03-06 06:18:33', NULL),
(441, 'images/pU2HQ0czhQjGeX7NwcgSXbGCOKuQnrNPFmBrdZpd.jpeg', 'Speakers.jpg', 'jpg', '19016', 0, 1, 306, 'App\\Category', '2021-03-06 06:20:33', '2021-03-06 06:20:33', NULL),
(442, 'images/hGk5fN4JZj4AvRrktra7fVmclx1lD09o1E6vHh2S.jpeg', 'Sunglasses.jpg', 'jpg', '112967', 0, 1, 307, 'App\\Category', '2021-03-06 06:23:33', '2021-03-06 06:23:33', NULL),
(443, 'images/MHlLB4LgL44sTTt8beCELmksfJEjI1iI6L5yhmFP.jpeg', 'Wallet.jpg', 'jpg', '25790', 0, 1, 308, 'App\\Category', '2021-03-06 06:24:18', '2021-03-06 06:24:18', NULL),
(444, 'images/ORrbSoLVA9GPtLA8o3inyC3qJpKhgQVDMEfD3sYH.jpeg', 'Watches.jpg', 'jpg', '218565', 0, 1, 309, 'App\\Category', '2021-03-06 06:25:11', '2021-03-06 06:25:11', NULL),
(445, 'images/Uwfdd0x2J4oMAeUMsZcN9Y2GByStEa7alvHiwFXy.jpeg', 'webcam.jpg', 'jpg', '89347', 0, 1, 310, 'App\\Category', '2021-03-06 06:25:56', '2021-03-06 06:25:56', NULL),
(446, 'images/F83ACmNIS6qGnDh64gd0vHCBJVFfIEKFJY20dtwq.jpeg', 'Blended Masalas.jpg', 'jpg', '88006', 0, 1, 311, 'App\\Category', '2021-03-06 06:35:49', '2021-03-06 06:35:49', NULL),
(447, 'images/f5eg2OzvXh0jhO2douafNcMyAnBd0N6KyFs6RxD1.jpeg', 'Cooking Paste & Others.jpg', 'jpg', '58068', 0, 1, 312, 'App\\Category', '2021-03-06 06:38:49', '2021-03-06 06:38:49', NULL),
(448, 'images/LHPaSFPSOiy58KCqYjxTjNfjMdhf4aQ933FIrstq.jpeg', 'Herbs & Seasonings.jpg', 'jpg', '619710', 0, 1, 313, 'App\\Category', '2021-03-06 06:45:45', '2021-03-06 06:45:45', NULL),
(449, 'images/5zxQpuDOh3w8Xfr53wMeupfhbaFe1AeU8uYJm2zV.jpeg', 'Powdered Spices.jpg', 'jpg', '69371', 0, 1, 314, 'App\\Category', '2021-03-06 06:47:12', '2021-03-06 06:47:12', NULL),
(450, 'images/ISJlDpU1JdGCe8rcSZBPK7OaQHYonOtbaVA9ztBF.jpeg', 'Whole Spices.jpg', 'jpg', '48069', 0, 1, 315, 'App\\Category', '2021-03-06 06:48:14', '2021-03-06 06:48:14', NULL),
(451, 'images/Jb8ko3nf0E3WUAnUHd7VA7r7DUm1CFAOn7L5fBGE.jpeg', 'Bowls.jpg', 'jpg', '219522', 0, 1, 316, 'App\\Category', '2021-03-06 06:57:42', '2021-03-06 06:57:42', NULL),
(452, 'images/xvo5ilR1TbN5CbN2CaiBkzK3ns3rGa90qjRFzEuF.jpeg', 'Cups Mugs and Saucers.jpg', 'jpg', '107749', 0, 1, 317, 'App\\Category', '2021-03-06 07:00:26', '2021-03-06 07:00:26', NULL),
(453, 'images/aXpP5eVKDFQbdqopcxRPMhQl4Gv5XnR81c71lBEA.jpeg', 'Dinner Sets.jpg', 'jpg', '37279', 0, 1, 318, 'App\\Category', '2021-03-06 07:05:08', '2021-03-06 07:05:08', NULL),
(454, 'images/HfGbpLBrojF0twFahUqbyYoxgC46r7r8cTdvJy76.jpeg', 'Glass.jpg', 'jpg', '5092', 0, 1, 319, 'App\\Category', '2021-03-06 07:08:46', '2021-03-06 07:08:46', NULL),
(455, 'images/2qSLPSF20dFUeB5oJ67xXL5Grx5g5Pc34SkVD3Mp.jpeg', 'Jars and Containers.jpg', 'jpg', '58572', 0, 1, 320, 'App\\Category', '2021-03-06 07:11:52', '2021-03-06 07:11:52', NULL),
(456, 'images/Mpvy3nemlXrZvOs7D742a5I9qnvRuQsAbKayRGGP.jpeg', 'Jug and Pitchers.jpg', 'jpg', '18258', 0, 1, 321, 'App\\Category', '2021-03-06 07:17:23', '2021-03-06 07:17:23', NULL),
(457, 'images/daazyJ56UAqhOX3SIE2pIUSk1LkuHuVUoffxax8n.jpeg', 'Kadhai and Handi.jpg', 'jpg', '14992', 0, 1, 322, 'App\\Category', '2021-03-06 07:19:29', '2021-03-06 07:19:29', NULL),
(458, 'images/afbS5gea9JXMsnIixt8kAtYdQJJoBN4yLGbcFztz.jpeg', 'Plates.jpg', 'jpg', '60068', 0, 1, 323, 'App\\Category', '2021-03-06 07:22:03', '2021-03-06 07:22:03', NULL),
(459, 'images/fd2k96lybFZ3uepZq5YDhf910Fw6FxtYxZNqdPXM.png', 'Sauce Pan and Pots.png', 'png', '252026', 0, 1, 324, 'App\\Category', '2021-03-06 07:28:52', '2021-03-06 07:28:52', NULL),
(460, 'images/Z2UlgTjo93Wf1NCMX43JERTQN00nzI3KodZGAZMI.jpeg', 'Spoon.jpg', 'jpg', '22183', 0, 1, 325, 'App\\Category', '2021-03-06 07:30:30', '2021-03-06 07:30:30', NULL),
(461, 'images/NKf2Jjl66sAxZN92ysEEJNsBYalYUn62GRO16WeO.jpeg', 'Board Pins.jpg', 'jpg', '27097', 0, 1, 326, 'App\\Category', '2021-03-06 07:41:10', '2021-03-06 07:41:10', NULL),
(462, 'images/1615016602.jpeg', '1615016602.jpeg', '.jpeg', '0', 0, 1, 4628, 'App\\Product', '2021-03-06 07:43:23', '2021-03-06 07:43:23', NULL),
(463, 'images/1615016603.jpeg', '1615016603.jpeg', '.jpeg', '0', 0, 0, 4628, 'App\\Product', '2021-03-06 07:43:23', '2021-03-06 07:43:23', NULL),
(464, 'images/zk6nmDZbTQ36bO2Z7Ax01fWh8R5lWYzSOvFzr4Z4.jpeg', 'Book Ends.jpg', 'jpg', '28130', 0, 1, 327, 'App\\Category', '2021-03-06 07:46:24', '2021-03-06 07:46:24', NULL),
(465, 'images/ywpoC25ZSDfkad0XlV9PmXIKEJEDTmndv7LeHD6u.jpeg', 'Book Reading Stand.jpg', 'jpg', '13660', 0, 1, 328, 'App\\Category', '2021-03-06 07:55:49', '2021-03-06 07:55:49', NULL),
(466, 'images/zXPIL868HQDmwrrVXvulacoKTKcDyqW0u3pq8uoF.jpeg', 'Calculators.jpg', 'jpg', '70122', 0, 1, 329, 'App\\Category', '2021-03-06 07:57:46', '2021-03-06 07:57:46', NULL),
(467, 'images/IUkyfT9mZFOvYoF5qAFpfhbkgbny9mqXhaHjtkw0.jpeg', 'Card Holders.jpg', 'jpg', '123093', 0, 1, 330, 'App\\Category', '2021-03-06 07:59:43', '2021-03-06 07:59:43', NULL),
(468, 'images/1615017881.jpeg', '1615017881.jpeg', '.jpeg', '0', 0, 1, 4629, 'App\\Product', '2021-03-06 08:04:42', '2021-03-06 08:04:42', NULL),
(469, 'images/1615017996.jpeg', '1615017996.jpeg', '.jpeg', '0', 0, 1, 19807, 'App\\Inventory', '2021-03-06 08:06:38', '2021-03-06 08:06:38', NULL),
(470, 'images/1615017998.jpeg', '1615017998.jpeg', '.jpeg', '0', 0, 0, 19807, 'App\\Inventory', '2021-03-06 08:06:38', '2021-03-06 08:06:38', NULL),
(471, 'images/mcsL1LyERqY0ucrEgJe7LbjFiU9iV7YEpSn1sC7x.jpeg', 'Clocks.jpg', 'jpg', '123007', 0, 1, 331, 'App\\Category', '2021-03-06 08:08:24', '2021-03-06 08:08:24', NULL),
(472, 'images/OhaAkMwnfc943LRxppP5n29I7zyxedmdKTnYBSK7.jpeg', 'sitting-mother-panda-with-baby-panda-in-hand-250x250.jpg', 'jpg', '8869', 0, 1, 54, 'App\\Shop', '2021-03-08 05:00:10', '2021-03-08 05:00:10', NULL),
(473, 'images/Fx0zmbpe6fNP0Tclt1ZD7t3XbSWaw0rnXvmIglY2.jpeg', 'Diaries.jpg', 'jpg', '43868', 0, 1, 332, 'App\\Category', '2021-03-08 05:07:40', '2021-03-08 05:07:40', NULL),
(474, 'images/H4sBVXQvIkSjdZkCwSKsB48exy7qlTTtg1I4xrdr.png', '55543_10222348_1880379_1f367e57_thumbnail.png', 'png', '20968', 0, 0, 54, 'App\\Shop', '2021-03-08 05:08:01', '2021-03-08 05:08:01', NULL),
(475, 'images/rXVLJckf0ulAHAA5wQcStLmQN77judfkK3nYDVQB.png', 'Envelopes.png', 'png', '30006', 0, 1, 333, 'App\\Category', '2021-03-08 05:08:35', '2021-03-08 05:08:35', NULL),
(476, 'images/fj9J3dyzW2dBZU8lEFMA6IE4JuZxBlpjhqOaMJty.jpeg', 'File and Folders.jpg', 'jpg', '6969', 0, 1, 334, 'App\\Category', '2021-03-08 05:16:33', '2021-03-08 05:16:33', NULL),
(477, 'images/nbBAR9mz7fBwoRfMeLMzyUTfJA4KlhxBFXnINI5K.jpeg', 'File Racks & Trays.jpg', 'jpg', '11673', 0, 1, 335, 'App\\Category', '2021-03-08 05:19:21', '2021-03-08 05:19:21', NULL),
(478, 'images/jgZGt5aAgiICOIIGgS0eZYp4SCW2vJEp77YOT18D.jpeg', 'Highlighter and MarkerL.jpg', 'jpg', '113990', 0, 1, 336, 'App\\Category', '2021-03-08 06:46:27', '2021-03-08 06:46:27', NULL),
(479, 'images/A54RCtg5j1Nzq2chB7KnWQOvsNFjYqmjvaHVS9aU.jpeg', 'Paper Clips.jpg', 'jpg', '19353', 0, 1, 337, 'App\\Category', '2021-03-08 06:51:59', '2021-03-08 06:51:59', NULL),
(480, 'images/QVItYF7MTKV455AiJWO7SkDFu4WLIypud3hVBcjP.jpeg', 'Paper Weight.jpg', 'jpg', '994864', 0, 1, 338, 'App\\Category', '2021-03-08 06:54:34', '2021-03-08 06:54:34', NULL),
(481, 'images/kj3zNMOxgMAo5FUxNhe4zSTLeESnusxNzkacHLOS.jpeg', 'Punching Machine.jpg', 'jpg', '20817', 0, 1, 339, 'App\\Category', '2021-03-08 06:55:28', '2021-03-08 06:55:28', NULL),
(482, 'images/nNgafr9Q8i75hlknVG3owtzfI2f1qAZrmPAouS9A.jpeg', 'Racks and Storage Boxes.jpg', 'jpg', '241783', 0, 1, 340, 'App\\Category', '2021-03-08 06:58:45', '2021-03-08 06:58:45', NULL),
(483, 'images/doFO2ONJlkkyTTN3t9m73izleXuZdu537ZzJsVG0.jpeg', 'Rubber Bands.jpg', 'jpg', '51289', 0, 1, 341, 'App\\Category', '2021-03-08 07:01:23', '2021-03-08 07:01:23', NULL),
(484, 'images/OZLzeqCNfiO36jRJBNqSDzCplCFevcYsRE2Fhy00.jpeg', 'Stamp Pads.jpg', 'jpg', '71424', 0, 1, 342, 'App\\Category', '2021-03-08 07:04:58', '2021-03-08 07:04:58', NULL),
(485, 'images/ymE60XMFKqTyoQP8b0PsQCBpm0D9aVWGdtECa3n2.png', 'Stamps.png', 'png', '112195', 0, 1, 343, 'App\\Category', '2021-03-08 07:11:33', '2021-03-08 07:11:33', NULL),
(486, 'images/tFaynneBZPauGrqvI9nnR3MuYSvjaLs885ilIXLR.jpeg', 'Stapler and Staple Remover.jpg', 'jpg', '92640', 0, 1, 344, 'App\\Category', '2021-03-08 07:14:07', '2021-03-08 07:14:07', NULL),
(487, 'images/k6NuVcpRQa0ikGrtGU5c4cAvBlbfaTcn6fWA1iZa.jpeg', 'Stapler Pins.jpg', 'jpg', '16958', 0, 1, 345, 'App\\Category', '2021-03-08 07:15:14', '2021-03-08 07:15:14', NULL),
(488, 'images/JAZyYqvCL7uT0zoUj1X6WjX1M7M6DP8aUpS8Ww5Y.png', 'Tagging Gun.jpg', 'jpg', '583524', 0, 1, 346, 'App\\Category', '2021-03-08 07:18:04', '2021-03-08 07:18:04', NULL),
(489, 'images/AtMp0juYcA55mlD4KbaSvdsNdSI7odom9x0GU6w8.jpeg', 'Bottle Openers.jpg', 'jpg', '78563', 0, 1, 347, 'App\\Category', '2021-03-08 07:26:44', '2021-03-08 07:26:44', NULL),
(490, 'images/HodwokuZf7Gh56yJP4I3P1S8IUJYFuqBdkKpEcWe.jpeg', 'Chakla and Belan.jpg', 'jpg', '45202', 0, 1, 348, 'App\\Category', '2021-03-08 07:28:09', '2021-03-08 07:28:09', NULL),
(491, 'images/kFVAwsgp7MPFLYIRDwGZ4mgTOqEykBpbg6oEZlR4.jpeg', 'Chopper\'s and Peelers.jpg', 'jpg', '76169', 0, 1, 349, 'App\\Category', '2021-03-08 08:11:29', '2021-03-08 08:11:29', NULL),
(492, 'images/sGlA2fnRXSNpdAiysier2tk226QDkBxXW6MZzOV0.jpeg', 'Chopping Boards.jpg', 'jpg', '113684', 0, 1, 350, 'App\\Category', '2021-03-08 08:12:32', '2021-03-08 08:12:32', NULL),
(493, 'images/rSyPOc7fwOoDC3v6cju0o20Yjske5DXHITMJZweB.jpeg', 'Churners (Mathni).jpg', 'jpg', '15121', 0, 1, 351, 'App\\Category', '2021-03-08 08:14:48', '2021-03-08 08:14:48', NULL),
(494, 'images/ibWywWIzph10MI5YrOCX2meu3yXQCxCZQbrSfxy7.jpeg', 'Dough Makers.jpg', 'jpg', '16896', 0, 1, 352, 'App\\Category', '2021-03-08 08:20:54', '2021-03-08 08:20:54', NULL),
(495, 'images/ErrR1MwaF59OECQefek3DrEC3Mj1f88N78112JQT.jpeg', 'Gas Lighters.jpg', 'jpg', '4101', 0, 1, 353, 'App\\Category', '2021-03-08 08:22:43', '2021-03-08 08:22:43', NULL),
(496, 'images/1wg8r62zwUZWtUWj0sjJcI1OKe9He6TTwjQS0EyV.jpeg', 'Gas Trolleys.jpg', 'jpg', '69137', 0, 1, 354, 'App\\Category', '2021-03-08 08:24:08', '2021-03-08 08:24:08', NULL),
(497, 'images/oeHiGggvpjnvaLGDGdXudpKNdvbw6zEUoAZzUPKf.jpeg', 'Graters and Slicers.jpg', 'jpg', '130035', 0, 1, 355, 'App\\Category', '2021-03-08 08:26:37', '2021-03-08 08:26:37', NULL),
(498, 'images/OWKWcXnP6wqmSyCeuEUP1F0W4Z7WkceGpqrPcaP9.jpeg', 'Hand Juicers.jpg', 'jpg', '21881', 0, 1, 356, 'App\\Category', '2021-03-08 08:28:13', '2021-03-08 08:28:13', NULL),
(499, 'images/EqBzkLtFphvW0lSGKzp3yNRGJ7wUTHRbVfiUFKQB.png', 'Ice Crushers.png', 'png', '118797', 0, 1, 357, 'App\\Category', '2021-03-08 09:36:21', '2021-03-08 09:36:21', NULL),
(500, 'images/kyuGEIBgdCeAbhqLwSROUXV3L5QKg3qu0NaSFWl2.jpeg', 'Idly Makers.jpg', 'jpg', '37240', 0, 1, 358, 'App\\Category', '2021-03-08 09:40:37', '2021-03-08 09:40:37', NULL),
(501, 'images/u7jTjKUvPQYbyBZstIBqReKhoo9SYqqtuxEvfoHL.jpeg', 'Khal Battas.jpg', 'jpg', '14155', 0, 1, 359, 'App\\Category', '2021-03-08 09:45:08', '2021-03-08 09:45:08', NULL),
(502, 'images/4D49fR4DusXnwG2UHbKniZZpMOZ8ked58SxUu2pw.jpeg', 'Kitchen Knives.jpg', 'jpg', '4436', 0, 1, 360, 'App\\Category', '2021-03-08 09:48:25', '2021-03-08 09:48:25', NULL),
(503, 'images/nVYe8nVKY4dgoPRfC8XhD6It6issWPfdIo5B3FkQ.png', 'LPG Gas Pipes.png', 'png', '30348', 0, 1, 361, 'App\\Category', '2021-03-08 09:49:33', '2021-03-08 09:49:33', NULL),
(504, 'images/vhUKQIGvZYzMD3XoBrXiiMIkVNW2wgmbuz3J2Nsz.jpeg', 'Masher and Tenderizers.jpg', 'jpg', '53135', 0, 1, 362, 'App\\Category', '2021-03-08 09:52:41', '2021-03-08 09:52:41', NULL),
(505, 'images/ahcJGNV9ae6wwCWc7vyCq9PA2FPCAMApOjV1A2zW.jpeg', 'Measuring Tools.jpg', 'jpg', '38584', 0, 1, 363, 'App\\Category', '2021-03-08 09:54:34', '2021-03-08 09:54:34', NULL),
(506, 'images/OhQ9xQw2MuNCPzSywOjUhUFbwB5lTgsiHXFxDbpH.jpeg', 'Moulds and Scoops.jpg', 'jpg', '83702', 0, 1, 364, 'App\\Category', '2021-03-08 09:58:58', '2021-03-08 09:58:58', NULL),
(507, 'images/fySI6lGFbub1946FHTL02GiDaLAB7v4Khc8vt1br.jpeg', 'Pizza Cutters.jpg', 'jpg', '91072', 0, 1, 365, 'App\\Category', '2021-03-08 10:02:31', '2021-03-08 10:02:31', NULL),
(508, 'images/3Jc0Fw5Pz5oMLpYcc4d4uyb56ZiMU7puapVpyqIM.jpeg', 'Snacks Makers.jpg', 'jpg', '11939', 0, 1, 366, 'App\\Category', '2021-03-08 10:06:26', '2021-03-08 10:06:26', NULL),
(509, 'images/06tktM4hUxPrZt5naiQ8bJsuB0dXocUfXPJCQsoQ.jpeg', 'Strainers - Channi.jpeg', 'jpeg', '9077', 0, 1, 367, 'App\\Category', '2021-03-08 10:08:44', '2021-03-08 10:08:44', NULL),
(510, 'images/Gh4BXKHPCRsVFpcOXjLtw26njAbt2phy0RjSZ3gN.jpeg', 'Wada Makers.jpg', 'jpg', '6946', 0, 1, 368, 'App\\Category', '2021-03-08 10:12:19', '2021-03-08 10:12:19', NULL),
(511, 'images/2WajQ8cZOOckQVBZDk5fJSt8ezzEIagWvLMcUROb.jpeg', 'Boys Booties.jpg', 'jpg', '46887', 0, 1, 369, 'App\\Category', '2021-03-08 10:20:15', '2021-03-08 10:20:15', NULL),
(512, 'images/Fo9Py13Wv6QfzZg9ppzeOJzP2tChJUUobMGYKRQD.jpeg', 'Boys Casual Shoes.jpg', 'jpg', '103079', 0, 1, 370, 'App\\Category', '2021-03-08 10:28:17', '2021-03-08 10:28:17', NULL),
(513, 'images/dHFWsT7w8q7neN6V15fEbPwJopd1yoK0qQEcyfYV.jpeg', 'Boys Ethnic Shoes.jpg', 'jpg', '16600', 0, 1, 371, 'App\\Category', '2021-03-08 10:29:58', '2021-03-08 10:29:58', NULL),
(514, 'images/mfrjq05xB8HMlzY4c197arPcvPph3qkw3Odxjn74.jpeg', 'Boys Flats.jpg', 'jpg', '10010', 0, 1, 372, 'App\\Category', '2021-03-08 10:34:54', '2021-03-08 10:34:54', NULL),
(516, 'images/ewaNgNoRxVRFRSc8xHalolhxz8op20FlVaRby5q0.jpeg', 'Boy Flip Flops.jpg', 'jpg', '12223', 0, 1, 373, 'App\\Category', '2021-03-08 10:45:35', '2021-03-08 10:45:35', NULL),
(517, 'images/yLlaiWwIYhVGZqqA2kUIFEWy3zXHejpiE6gxLiT0.jpeg', 'Boy Sandals.jpg', 'jpg', '12223', 0, 1, 374, 'App\\Category', '2021-03-08 10:49:13', '2021-03-08 10:49:13', NULL),
(518, 'images/1fCFf70PJHB9whDv3g5BFDeiLmbHGlYkfx5xfJnm.jpeg', 'Boys School Shoes.jpg', 'jpg', '18893', 0, 1, 375, 'App\\Category', '2021-03-08 10:52:55', '2021-03-08 10:52:55', NULL),
(519, 'images/cSkKcYZ1HoHGHLTOrIlcsxRxBya6wcDlIbsw2KdQ.jpeg', 'Boys Sports Shoes.jpg', 'jpg', '132947', 0, 1, 376, 'App\\Category', '2021-03-08 10:54:01', '2021-03-08 10:54:01', NULL),
(520, 'images/rMDKwSflKZM7fnaJzIJz8TWsFQnHROWei3QBvzSc.jpeg', 'Coffee.jpg', 'jpg', '262697', 0, 1, 377, 'App\\Category', '2021-03-09 05:51:18', '2021-03-09 05:51:18', NULL),
(521, 'images/kwVjlkdrdTyoqSGud4BF7c0N5Z92znQx2ZVtDJgn.jpeg', 'Cold Drinks.jpeg', 'jpeg', '26980', 0, 1, 378, 'App\\Category', '2021-03-09 05:53:14', '2021-03-09 05:53:14', NULL),
(522, 'images/LH9EVi7V8OtUC07o7TEE4lMAWRaCi1QksD4dzPHi.jpeg', 'Energy - Health Drinks.jpg', 'jpg', '525718', 0, 1, 379, 'App\\Category', '2021-03-09 05:57:25', '2021-03-09 05:57:25', NULL),
(523, 'images/LHzDk5fixznTKKvbmNr1gxHqpJyAO1nwItD34NoH.jpeg', 'Juices.jpg', 'jpg', '159300', 0, 1, 380, 'App\\Category', '2021-03-09 05:59:24', '2021-03-09 05:59:24', NULL),
(524, 'images/H3qP9Kc8VeqiKm8q4AV3Tnuv577XaCnAJkLPc7vm.jpeg', 'Milk Powder.jpg', 'jpg', '14748', 0, 1, 381, 'App\\Category', '2021-03-09 06:23:39', '2021-03-09 06:23:39', NULL),
(525, 'images/hslXU40lhFn8D5zXSuXAEFBFmkaliC4WhKivBSnM.jpeg', 'Milk Shakes.jpg', 'jpg', '30063', 0, 1, 382, 'App\\Category', '2021-03-09 06:44:00', '2021-03-09 06:44:00', NULL),
(526, 'images/ioBX7hhbkCspYYuZZaNfAazwiB4IIhH1LwDWtq72.jpeg', 'Packaged Water.jpg', 'jpg', '36156', 0, 1, 383, 'App\\Category', '2021-03-09 06:47:09', '2021-03-09 06:47:09', NULL),
(527, 'images/HZQ4Yh2XsButri87PY6YxNHXWupPbHSt0T6i2x2o.jpeg', 'Bath Mugs.jpg', 'jpg', '17593', 0, 1, 384, 'App\\Category', '2021-03-09 07:03:13', '2021-03-09 07:03:13', NULL),
(528, 'images/YiGJTcdUZWDoNRDkaGrbMgdcBfnGSgbIEMsAnhCi.jpeg', 'Broom and Brushes.jpg', 'jpg', '22629', 0, 1, 385, 'App\\Category', '2021-03-09 07:06:44', '2021-03-09 07:06:44', NULL),
(529, 'images/vzTAZdh7Pjmyr8ID2c0i2Nw2Tw0EQqLSbmi1nkI5.jpeg', 'Bucket.jpg', 'jpg', '31757', 0, 1, 386, 'App\\Category', '2021-03-09 07:08:13', '2021-03-09 07:08:13', NULL),
(530, 'images/1615273788.jpeg', '1615273788.jpeg', '.jpeg', '0', 0, 1, 4630, 'App\\Product', '2021-03-09 07:09:48', '2021-03-09 07:09:48', NULL),
(531, 'images/1615273788.jpeg', '1615273788.jpeg', '.jpeg', '0', 0, 1, 4630, 'App\\Product', '2021-03-09 07:11:19', '2021-03-09 07:11:19', NULL),
(532, 'images/1Nb6f4872BDwMVpfIlJStF5XyO0BsfaEY6U5vugb.jpeg', 'Cleaning Pad and Scrubbers.jpg', 'jpg', '252817', 0, 1, 387, 'App\\Category', '2021-03-09 07:11:43', '2021-03-09 07:11:43', NULL),
(533, 'images/AJqYGDZ6O9aRKzqwOxh9lwpjdLugaztDgQfFv4Sk.jpeg', 'Dust Pan.jpeg', 'jpeg', '12179', 0, 1, 388, 'App\\Category', '2021-03-09 07:12:59', '2021-03-09 07:12:59', NULL),
(534, 'images/YXrPQj3kJwpGQhc2hWrDkxJ5eIzFCMQLA82UXntX.jpeg', 'Dustbins.jpeg', 'jpeg', '39946', 0, 1, 389, 'App\\Category', '2021-03-09 07:15:05', '2021-03-09 07:15:05', NULL),
(535, 'images/6pBxqC6wMv3MTtM1Y1L9jcp49lKGrIC48QJEYChv.jpeg', 'Garbage Bags.jpg', 'jpg', '73400', 0, 1, 390, 'App\\Category', '2021-03-09 07:16:09', '2021-03-09 07:16:09', NULL),
(536, 'images/YNvmAktc82hpsU5rDqntrQpKj9E7iY7rFvX4iqLq.jpeg', 'MOP & Refills.jpeg', 'jpeg', '13641', 0, 1, 391, 'App\\Category', '2021-03-09 07:17:21', '2021-03-09 07:17:21', NULL),
(537, 'images/1615274322.jpeg', '1615274322.jpeg', '.jpeg', '0', 0, 1, 4631, 'App\\Product', '2021-03-09 07:18:42', '2021-03-09 07:18:42', NULL),
(538, 'images/DT156ZLyD4N3aaHreDeqpBozTvFME4CJgj9vYqcT.jpeg', 'Soap Cases.jpeg', 'jpeg', '6520', 0, 1, 392, 'App\\Category', '2021-03-09 07:20:36', '2021-03-09 07:20:36', NULL),
(539, 'images/kvPHSCe71ujNZaQjPa52rU37JoNBo5lI2MkGiQ2q.jpeg', 'Spray Bottle.jpg', 'jpg', '63556', 0, 1, 393, 'App\\Category', '2021-03-09 07:21:49', '2021-03-09 07:21:49', NULL),
(540, 'images/FodAWVjUVDGduC7BYC8Xz21Pubh3gljFD7i18a1q.jpeg', 'Stool.jpg', 'jpg', '8658', 0, 1, 394, 'App\\Category', '2021-03-09 07:24:34', '2021-03-09 07:24:34', NULL),
(541, 'images/YEsPH5CLGea9011oBv8jjXcjKP8DdE1FQqo2kBDm.jpeg', 'Tongs.jpg', 'jpg', '47231', 0, 1, 395, 'App\\Category', '2021-03-09 07:28:41', '2021-03-09 07:28:41', NULL),
(542, 'images/xidQpqQQdLQjqvCmLbZQoh3o87sW20XhV6SvSJcx.jpeg', 'Toothbrush Holders & Dispensers.jpg', 'jpg', '19924', 0, 1, 396, 'App\\Category', '2021-03-09 07:30:58', '2021-03-09 07:30:58', NULL),
(543, 'images/Bj74mazSOLf3s2FtimO1Xt3nRHQXE7p7v2DtSKih.jpeg', 'Tounge Cleaner.jpg', 'jpg', '11913', 0, 1, 397, 'App\\Category', '2021-03-09 07:33:05', '2021-03-09 07:33:05', NULL),
(544, 'images/Goi1vdtUqiPnYkcw3AIEyTrkEy2vLpdU3X6qE3vP.jpeg', 'Towel.jpg', 'jpg', '181187', 0, 1, 398, 'App\\Category', '2021-03-09 07:34:51', '2021-03-09 07:34:51', NULL),
(545, 'images/oyxBRfFcqzIUOYIw67aXDJkNugShskTABh6DT5ZE.jpeg', 'Art and Craft Toys.jpg', 'jpg', '42638', 0, 1, 399, 'App\\Category', '2021-03-09 07:41:14', '2021-03-09 07:41:14', NULL),
(546, 'images/O3u0OJU9RgGdcuuj3FlH9e3cH6IOv148YIybh1hr.jpeg', 'Educational and Learning Toys.jpg', 'jpg', '13784', 0, 1, 400, 'App\\Category', '2021-03-09 07:48:31', '2021-03-09 07:48:31', NULL),
(547, 'images/0IrOpOTkoZExXCiM3ijept9FMIoUcd3JdrpMxtUj.jpeg', 'Musical Instruments and Toys.jpg', 'jpg', '40270', 0, 1, 401, 'App\\Category', '2021-03-09 07:51:40', '2021-03-09 07:51:40', NULL),
(548, 'images/XH2pHpAhOi3BFByUIRITeYn3FFAtkb4fWRBQz3lX.jpeg', 'Geometry Pouches.jpg', 'jpg', '5168', 0, 1, 402, 'App\\Category', '2021-03-09 07:58:16', '2021-03-09 07:58:16', NULL),
(549, 'images/J9izcacL9TuuueahPEYMjymYgSvrGe6iizUSasVS.jpeg', 'Inks.jpg', 'jpg', '287581', 0, 1, 403, 'App\\Category', '2021-03-09 08:02:37', '2021-03-09 08:02:37', NULL),
(550, 'images/KyGJsc7z3TW0JEdYhtwiV6s7yM0P1vfs4lilmUqd.jpeg', 'Pencil.jpg', 'jpg', '42626', 0, 1, 404, 'App\\Category', '2021-03-09 08:04:17', '2021-03-09 08:04:17', NULL),
(551, 'images/jwxAbMLuG3a9Bg1zK1mdMG2m4TC08nojv6p6NhxK.jpeg', 'Pencil Lead.jpg', 'jpg', '55637', 0, 1, 405, 'App\\Category', '2021-03-09 08:05:49', '2021-03-09 08:05:49', NULL),
(552, 'images/DNePD6nAreTr1tfZmoYUit7EnZ5EzZ2V9FxKx6Cs.jpeg', 'Pens.jpg', 'jpg', '28699', 0, 1, 406, 'App\\Category', '2021-03-09 08:07:39', '2021-03-09 08:07:39', NULL),
(553, 'images/ZGSEiRIjf1XLp3jhRTBgWi0bTsT01WE7isQAfD7s.jpeg', 'Canvas Board.jpg', 'jpg', '10944', 0, 1, 407, 'App\\Category', '2021-03-09 08:13:54', '2021-03-09 08:13:54', NULL),
(554, 'images/mRZoHuIJPMYxheOrxyHkdZdvYCpe8cM6vE3KXvps.jpeg', 'Color Paints.jpg', 'jpg', '140226', 0, 1, 408, 'App\\Category', '2021-03-10 08:02:42', '2021-03-10 08:02:42', NULL),
(555, 'images/7hTD6B4HC42iYJ3P2M0M2PjWzlL9HUwcmJ0M0J2X.jpeg', 'Colors & Crayons.jpg', 'jpg', '118120', 0, 1, 409, 'App\\Category', '2021-03-10 08:08:16', '2021-03-10 08:08:16', NULL),
(556, 'images/PuiJZKfjE2JlBly14I7PYbo2Nkb17DlpIiK4sN9j.jpeg', 'Craft Works.jpg', 'jpg', '6037', 0, 1, 410, 'App\\Category', '2021-03-10 08:16:25', '2021-03-10 08:16:25', NULL),
(557, 'images/NzJPOLC4McA39miFYHmkIewkRtX3Ox0GvVJSwciM.jpeg', 'Easel.jpeg', 'jpeg', '25098', 0, 1, 411, 'App\\Category', '2021-03-10 08:17:40', '2021-03-10 08:17:40', NULL),
(558, 'images/kJ0Q8aOOWGSCNmWazpCW41QhxjM9ovfCAGlBbJYj.jpeg', 'Paint Brushes.jpg', 'jpg', '67388', 0, 1, 412, 'App\\Category', '2021-03-10 08:19:37', '2021-03-10 08:19:37', NULL),
(559, 'images/fDsLCIXwNouxIlh1hir4Dzq6DASqBVRdHAR2Cs1e.jpeg', 'Scissor.jpg', 'jpg', '28491', 0, 1, 413, 'App\\Category', '2021-03-10 08:21:53', '2021-03-10 08:21:53', NULL),
(560, 'images/B3LOOG0cWpYUVJJfSOsRX3QUxIt5udXItkBunYwm.jpeg', 'Spray Paint.jpg', 'jpg', '67886', 0, 1, 414, 'App\\Category', '2021-03-10 08:25:58', '2021-03-10 08:25:58', NULL),
(561, 'images/vcDDehERES3YaQRIT58ZxPOqnTaPgdim8fWXyfDO.jpeg', 'Stencils.jpg', 'jpg', '328603', 0, 1, 415, 'App\\Category', '2021-03-10 08:27:48', '2021-03-10 08:27:48', NULL),
(562, 'images/kppf6w3YnhV8UPCzD66cboWMzOewmnRiSpDD0HGS.jpeg', 'Stickers.jpg', 'jpg', '28594', 0, 1, 416, 'App\\Category', '2021-03-10 08:29:16', '2021-03-10 08:29:16', NULL),
(563, 'images/6LQ9Ul2gFWcNNbT4jJbon0oC73a2fcPuPflGJds4.jpeg', 'Wrapping Paper.jpg', 'jpg', '115045', 0, 1, 417, 'App\\Category', '2021-03-10 08:31:17', '2021-03-10 08:31:17', NULL),
(564, 'images/1620971745.jpeg', 'png-transparent-alena-foods-inc-artisanal-food-dessert-meat-alfredo-linguini.png', 'png', '22346', 0, 0, 2, 'App\\Shop', '2021-03-10 08:31:42', '2021-05-14 05:59:31', 'images/1620971971.jpeg'),
(565, 'images/2SFkMJS0OoibzwsZDbpzBdsO2kQQHPGYFjwIG2ek.jpeg', 'Flower Vase.jpg', 'jpg', '930833', 0, 1, 418, 'App\\Category', '2021-03-10 09:18:55', '2021-03-10 09:18:55', NULL),
(566, 'images/vajP9lC0HuSx9vXhgT9CoSMYY6c7MveWCuJwBkn9.png', 'Greeting Cards.png', 'png', '421272', 0, 1, 419, 'App\\Category', '2021-03-10 09:22:10', '2021-03-10 09:22:10', NULL),
(567, 'images/IemdTUiLszUw78krjxSYgobH9wLAz4k8gcACRxco.jpeg', 'Key Chain.jpg', 'jpg', '15903', 0, 1, 420, 'App\\Category', '2021-03-10 09:28:37', '2021-03-10 09:28:37', NULL),
(568, 'images/WHf7tMfx47rGBIVKedSvp66qA4SwQQSS9w07iP0K.jpeg', 'Paintings.jpg', 'jpg', '68083', 0, 1, 421, 'App\\Category', '2021-03-10 09:31:09', '2021-03-10 09:31:09', NULL),
(569, 'images/jOdSNOz0zaeYYdxHpu4vxV6y00fYAdy6sILAV1dm.jpeg', 'Photo Frames.jpg', 'jpg', '1282106', 0, 1, 422, 'App\\Category', '2021-03-10 09:35:13', '2021-03-10 09:35:13', NULL),
(570, 'images/JxOfiu1JJZU2wKebNEG1lFxyvpxpH2BQsRS9CfEM.jpeg', 'Flours.jpg', 'jpg', '14003', 0, 1, 423, 'App\\Category', '2021-03-10 09:38:53', '2021-03-10 09:38:53', NULL),
(571, 'images/b4XzlcI2xyA5wBDTd9JRBnX6IjmUUJdqe4ASu9Ma.jpeg', 'Pulses.jpg', 'jpg', '141578', 0, 1, 424, 'App\\Category', '2021-03-10 09:42:53', '2021-03-10 09:42:53', NULL),
(572, 'images/GoCQ4UHlvmN9ULqRQy6vigLqzcXvMS45yDm6unAz.jpeg', 'Sooji.jpg', 'jpg', '12308', 0, 1, 425, 'App\\Category', '2021-03-10 09:45:56', '2021-03-10 09:45:56', NULL),
(573, 'images/L4YCG4hr8TyPZmOtEXoltfWLh5EppGzSIyg43xSC.jpeg', 'Whole Grains & Millets.jpg', 'jpg', '100929', 0, 1, 426, 'App\\Category', '2021-03-10 09:53:10', '2021-03-10 09:53:10', NULL),
(574, 'images/AYDxif5m2cHTbGxgCpeETcndFN39Ub2Xawzcs3dR.jpeg', 'Filament.jpg', 'jpg', '38176', 0, 1, 427, 'App\\Category', '2021-03-10 10:06:19', '2021-03-10 10:06:19', NULL),
(575, 'images/mcdbguPDFvS98tPYRIZIN8HGBYvH0xHWoXewpHBi.jpeg', 'Open Ended.jpeg', 'jpeg', '15371', 0, 1, 428, 'App\\Category', '2021-03-10 10:13:30', '2021-03-10 10:13:30', NULL),
(576, 'images/y3NFbJzo1459Gxz5gjNUeVdopNinNDATosXzysv7.jpeg', 'Ring Spun.jpg', 'jpg', '9568', 0, 1, 429, 'App\\Category', '2021-03-10 10:15:20', '2021-03-10 10:15:20', NULL),
(577, 'images/9JDf9b4tMIIezEgBidpF6OtCi7Q1MetSU5cXTJPo.jpeg', 'Vortex.jpg', 'jpg', '18147', 0, 1, 430, 'App\\Category', '2021-03-10 10:16:52', '2021-03-10 10:16:52', NULL),
(578, 'images/PAGLZSPtmT95UD3ZkCMSfMVuaDJXPk7lOvdsQ0W4.jpeg', 'Denim Fabric.jpg', 'jpg', '13410', 0, 1, 431, 'App\\Category', '2021-03-10 10:18:21', '2021-03-10 10:18:21', NULL),
(579, 'images/ADaOliHPZWvpAVleu0lon7M5j7x9gwLR596Of9lf.jpeg', 'Ethnic Wear & Kurti Fabrics.jpg', 'jpg', '18682', 0, 1, 432, 'App\\Category', '2021-03-10 10:25:56', '2021-03-10 10:25:56', NULL),
(580, 'images/F8qdAV4tYtWCLxHeQls6jSF4eoh0ytEwNRLi1mvT.jpeg', 'Hosiery Fabrics.jpeg', 'jpeg', '15566', 0, 1, 433, 'App\\Category', '2021-03-10 10:31:06', '2021-03-10 10:31:06', NULL),
(581, 'images/VsiyfcU3IJHnhkQXFEXuSdvhL6IGSH29FgswXWPY.jpeg', 'Shirting Fabrics.jpg', 'jpg', '94264', 0, 1, 434, 'App\\Category', '2021-03-10 10:33:34', '2021-03-10 10:33:34', NULL),
(582, 'images/WcxjBiliCcx4qn1waoHT6ve2grDcgCanqJujFzkH.jpeg', 'Trouser Fabric.jpg', 'jpg', '6815', 0, 1, 435, 'App\\Category', '2021-03-10 10:43:34', '2021-03-10 10:43:34', NULL),
(583, 'images/6z8N8KsMei8xGpPdufTakDbRTqluPgxjFeEgmNlS.jpeg', 'Uniform Fabrics.jpg', 'jpg', '50988', 0, 1, 436, 'App\\Category', '2021-03-10 10:45:03', '2021-03-10 10:45:03', NULL),
(584, 'images/sGcL1IWzUo1u5B73WrruFI0F15DZz1mEKcUzdlpQ.jpeg', 'Bag Backpack.jpg', 'jpg', '14290', 0, 1, 437, 'App\\Category', '2021-03-10 11:16:12', '2021-03-10 11:16:12', NULL),
(585, 'images/download.jpeg', 'download.jpeg', '.jpeg', '0', 0, 1, 4637, 'App\\Product', '2021-03-10 11:18:01', '2021-03-10 11:18:01', NULL),
(586, 'images/down.jpeg', 'down.jpeg', '.jpeg', '0', 0, 1, 4638, 'App\\Product', '2021-03-10 11:19:37', '2021-03-10 11:19:37', NULL),
(587, 'images/kOX5KOPWfHdy1KOWPFVlbZFs8w6oDCbfub0GBE6t.jpeg', 'Clutches.jpg', 'jpg', '53493', 0, 1, 438, 'App\\Category', '2021-03-10 11:23:11', '2021-03-10 11:23:11', NULL),
(588, 'images/KM093MbkZOPU1MYhexjc7adACoOeS0ZWsVN0f5cD.jpeg', 'Duffle Bags.jpg', 'jpg', '231271', 0, 1, 439, 'App\\Category', '2021-03-10 11:25:25', '2021-03-10 11:25:25', NULL),
(589, 'images/dAEPGMe6jwjR30Giqg7TmbndDOytEyQ2wriob06J.jpeg', 'Gym Bags.jpg', 'jpg', '160954', 0, 1, 440, 'App\\Category', '2021-03-10 11:27:07', '2021-03-10 11:27:07', NULL),
(590, 'images/R1ddJexY9HlywrqtInBpG0XZeRPc1EpqKV5h9Za2.jpeg', 'Hand Bags.jpg', 'jpg', '246120', 0, 1, 441, 'App\\Category', '2021-03-10 11:28:22', '2021-03-10 11:28:22', NULL),
(591, 'images/M7vWCNwpRDF4EaFTwrsP6oC7lsmkL4Ulul5IMWRR.jpeg', 'Lunch Bags.jpg', 'jpg', '15603', 0, 1, 442, 'App\\Category', '2021-03-10 11:30:41', '2021-03-10 11:30:41', NULL),
(592, 'images/b7vUybmgNMn9Q9fOdTSoWtLyyq3VUTxlsVdj8VJF.jpeg', 'Messenger Bags.jpg', 'jpg', '316221', 0, 1, 443, 'App\\Category', '2021-03-10 11:32:06', '2021-03-10 11:32:06', NULL),
(593, 'images/gZku1BMWR0LQyLnZznOchjpxflSz341sJGQMyMhM.jpeg', 'Pouches and Potlis.jpg', 'jpg', '165962', 0, 1, 444, 'App\\Category', '2021-03-10 11:34:16', '2021-03-10 11:34:16', NULL),
(594, 'images/demo.png', 'demo.png', '.jpeg', '0', 0, 1, 4639, 'App\\Product', '2021-03-10 11:35:21', '2021-03-10 11:35:21', NULL),
(595, 'images/SKzR5E7CdfMkvfcNyh5Mhpzn83h9khjrfQRsOLYm.jpeg', 'Satchels.jpg', 'jpg', '3558', 0, 1, 445, 'App\\Category', '2021-03-10 11:35:47', '2021-03-10 11:35:47', NULL),
(596, 'images/sgQlmTINSby9VPlRXjjrbIl4ZSg5YNgfyF8lG2cU.jpeg', 'School Bags.jpeg', 'jpeg', '19772', 0, 1, 446, 'App\\Category', '2021-03-10 11:39:02', '2021-03-10 11:39:02', NULL),
(597, 'images/mlKwLg5GDCkOdnIxmWdVitPnNmcebCTFiRAG0B9D.jpeg', 'Shopping Bags.jpg', 'jpg', '67418', 0, 1, 447, 'App\\Category', '2021-03-10 11:40:27', '2021-03-10 11:40:27', NULL),
(598, 'images/demo.png', 'demo.png', '.jpeg', '0', 0, 1, 4640, 'App\\Product', '2021-03-10 11:43:04', '2021-03-10 11:43:04', NULL),
(599, 'image.png', 'image.png', '.jpeg', '0', 0, 1, 4649, 'App\\Product', '2021-03-10 11:52:08', '2021-03-10 11:52:08', NULL),
(600, 'image2.png', 'image2.png', '.jpeg', '0', 0, 0, 4649, 'App\\Product', '2021-03-10 11:52:08', '2021-03-10 11:52:08', NULL),
(601, 'images/ZzBhmlsuJqQBr9WejzP6ieOeIedxuGlabYOGRQdA.jpeg', 'Sling Bags.jpeg', 'jpeg', '22105', 0, 1, 448, 'App\\Category', '2021-03-10 11:53:58', '2021-03-10 11:53:58', NULL),
(602, 'asdf.png', 'asdf.png', '.jpeg', '0', 0, 1, 4650, 'App\\Product', '2021-03-10 11:55:19', '2021-03-10 11:55:19', NULL),
(603, 'asdf.png', 'asdf.png', '.jpeg', '0', 0, 1, 4651, 'App\\Product', '2021-03-10 11:55:50', '2021-03-10 11:55:50', NULL);
INSERT INTO `images` (`id`, `path`, `name`, `extension`, `size`, `order`, `featured`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`, `bannerpath`) VALUES
(604, 'images/PPAayTXIVoNdwc2s7xQ9Lv2KBElODGaQvNxfeHvK.jpeg', 'Toiletry Kit Bags.jpg', 'jpg', '43798', 0, 1, 449, 'App\\Category', '2021-03-10 11:56:20', '2021-03-10 11:56:20', NULL),
(605, 'asdf.png', 'asdf.png', '.jpeg', '0', 0, 1, 4652, 'App\\Product', '2021-03-10 12:00:00', '2021-03-10 12:00:00', NULL),
(606, 'Asdf.png', 'Asdf.png', '.jpeg', '0', 0, 1, 4653, 'App\\Product', '2021-03-10 12:02:19', '2021-03-10 12:02:19', NULL),
(607, 'Asdf.png', 'Asdf.png', '.jpeg', '0', 0, 1, 4654, 'App\\Product', '2021-03-10 12:03:48', '2021-03-10 12:03:48', NULL),
(608, 'images/pzktETirCSzel5nMpsysPuEgi61M4OplMyM9eS8s.jpeg', 'Mandakki.jpg', 'jpg', '12357', 0, 1, 450, 'App\\Category', '2021-03-10 12:04:07', '2021-03-10 12:04:07', NULL),
(609, 'images/OhfChN5nLUfY3RyfDsIRHgqpbfm76LCg15to106Y.jpeg', 'Poha.jpg', 'jpg', '18540', 0, 1, 451, 'App\\Category', '2021-03-10 12:06:30', '2021-03-10 12:06:30', NULL),
(610, 'images/lYTghje15siPnrBrmpqvmmc59ppgrzEU2agVatqO.jpeg', 'Rice.jpg', 'jpg', '229469', 0, 1, 452, 'App\\Category', '2021-03-10 12:08:27', '2021-03-10 12:08:27', NULL),
(611, 'lkj.png', 'lkj.png', '.jpeg', '0', 0, 1, 4655, 'App\\Product', '2021-03-10 12:09:27', '2021-03-10 12:09:27', NULL),
(612, 'asdf.png', 'asdf.png', '.jpeg', '0', 0, 1, 4656, 'App\\Product', '2021-03-10 12:10:09', '2021-03-10 12:10:09', NULL),
(613, 'adsf.png', 'adsf.png', '.jpeg', '0', 0, 1, 4657, 'App\\Product', '2021-03-10 12:11:23', '2021-03-10 12:11:23', NULL),
(614, 'adsf.png', 'adsf.png', '.jpeg', '0', 0, 1, 4658, 'App\\Product', '2021-03-10 12:12:07', '2021-03-10 12:12:07', NULL),
(615, 'images/m4KjpQHCSMnGO73Yu3VzFn2uM9mT2Gz6A8csqLvu.jpeg', 'Sabudana - Sago.jpg', 'jpg', '82185', 0, 1, 453, 'App\\Category', '2021-03-10 12:14:44', '2021-03-10 12:14:44', NULL),
(616, 'adsf.png', 'adsf.png', '.jpeg', '0', 0, 1, 4659, 'App\\Product', '2021-03-10 12:17:23', '2021-03-10 12:17:23', NULL),
(617, 'adsf.png', 'adsf.png', '.jpeg', '0', 0, 1, 4660, 'App\\Product', '2021-03-10 12:18:48', '2021-03-10 12:18:48', NULL),
(618, 'adsf.png', 'adsf.png', '.jpeg', '0', 0, 1, 19809, 'App\\Inventory', '2021-03-10 12:18:48', '2021-03-10 12:18:48', NULL),
(619, 'images/bBDroLdMmNpqWqUXzdNVGh9DWKee4oWmX4t8Ord3.jpeg', 'Bikes toys.jpg', 'jpg', '22838', 0, 1, 454, 'App\\Category', '2021-03-10 12:23:49', '2021-03-10 12:23:49', NULL),
(620, 'images/uwEdT0FPRLhaIvN1Uk0CwSY7durMDwZ1HsNWMCTD.jpeg', 'Cars Toys.jpg', 'jpg', '70863', 0, 1, 455, 'App\\Category', '2021-03-10 12:26:22', '2021-03-10 12:26:22', NULL),
(621, 'images/yJSkpJ0dQcpjjrT1F3kiBtBNFb0T4nBhnZM4zMWz.jpeg', 'Remote Control Toys.jpeg', 'jpeg', '21988', 0, 1, 456, 'App\\Category', '2021-03-10 12:28:32', '2021-03-10 12:28:32', NULL),
(622, 'images/1EWYI4YJZUGVkyGxTOnZMzeWUmiD7IRJ9bSVUIfz.jpeg', 'Train toys.jpg', 'jpg', '31356', 0, 1, 457, 'App\\Category', '2021-03-10 12:32:50', '2021-03-10 12:32:50', NULL),
(623, 'images/OQIHvzq6KQ5CcL1tyV6ccs55RjJDc7IxrLHFROko.jpeg', 'Diwan Sets.jpg', 'jpg', '51687', 0, 1, 458, 'App\\Category', '2021-03-10 12:35:26', '2021-03-10 12:35:26', NULL),
(624, 'images/5cBIj80aJkOYVbfMMhaEveeXjCBvi9WdBtARTnNn.jpeg', 'Sofa Covers.jpg', 'jpg', '214926', 0, 1, 459, 'App\\Category', '2021-03-10 12:40:54', '2021-03-10 12:40:54', NULL),
(625, 'images/1VmvIV4BQgyZdYbWNBqup4ozY7IxZCsTR73tPwLL.jpeg', 'Jaggery.jpg', 'jpg', '69143', 0, 1, 460, 'App\\Category', '2021-03-10 12:45:11', '2021-03-10 12:45:11', NULL),
(626, 'images/XGrwarfw9ydakeTEVQqOPDxatE6hP18A1nEZGc3F.jpeg', 'Salt.jpg', 'jpg', '117780', 0, 1, 461, 'App\\Category', '2021-03-10 12:46:42', '2021-03-10 12:46:42', NULL),
(627, 'images/QRDRRXT2WAFWquP0XkiDzJxNufT03RIDVdcBXekB.png', 'Sugar.png', 'png', '234341', 0, 1, 462, 'App\\Category', '2021-03-10 12:48:08', '2021-03-10 12:48:08', NULL),
(628, 'images/CHiyUh51E9SmoUOAAaE0oY68bC3tqJQr5dEMDU1r.jpeg', 'Badam.jpg', 'jpg', '28671', 0, 1, 463, 'App\\Category', '2021-03-10 12:51:54', '2021-03-10 12:51:54', NULL),
(629, 'images/tUG32O8Oed8SrNHBU7fJ6YD1XU6Ro4LRhcrmzybt.jpeg', 'Cashews.jpg', 'jpg', '83944', 0, 1, 464, 'App\\Category', '2021-03-10 12:53:07', '2021-03-10 12:53:07', NULL),
(630, 'images/eYGK57lhx0c8PoRhIAa3oYOwDOG7D1a3DMotqfbk.jpeg', 'Copra.jpg', 'jpg', '84173', 0, 1, 465, 'App\\Category', '2021-03-10 12:54:06', '2021-03-10 12:54:06', NULL),
(631, 'images/fKgvsILOvYzBshbtBAtQTvWkf1jQ4eRoa7ivZS58.jpeg', 'Dry Dates.jpg', 'jpg', '199257', 0, 1, 466, 'App\\Category', '2021-03-10 12:55:26', '2021-03-10 12:55:26', NULL),
(632, 'images/4R4YCiagy0FRiYRit0pjJXdLw0qmsfzCkYSWQi1e.jpeg', 'Dry Grapes.jpg', 'jpg', '70919', 0, 1, 467, 'App\\Category', '2021-03-10 12:56:34', '2021-03-10 12:56:34', NULL),
(633, 'images/1615441639.jpeg', '1615441639.jpeg', '.jpeg', '0', 0, 1, 4661, 'App\\Product', '2021-03-11 05:47:20', '2021-03-11 05:47:20', NULL),
(634, 'images/1615441639.jpeg', '1615441639.jpeg', '.jpeg', '0', 0, 1, 19810, 'App\\Inventory', '2021-03-11 05:47:20', '2021-03-11 05:47:20', NULL),
(635, 'test.png', 'test.png', '.jpeg', '0', 0, 1, 4662, 'App\\Product', '2021-03-11 05:49:21', '2021-03-11 05:49:21', NULL),
(636, 'test.png', 'test.png', '.jpeg', '0', 0, 1, 19811, 'App\\Inventory', '2021-03-11 05:49:21', '2021-03-11 05:49:21', NULL),
(637, 'images/1615471476.jpeg', '1615471476.jpeg', '.jpeg', '0', 0, 1, 4663, 'App\\Product', '2021-03-11 14:04:36', '2021-03-11 14:04:36', NULL),
(638, 'images/1615471476.jpeg', '1615471476.jpeg', '.jpeg', '0', 0, 1, 19812, 'App\\Inventory', '2021-03-11 14:04:36', '2021-03-11 14:04:36', NULL),
(639, 'image.png', 'image.png', '.jpeg', '0', 0, 1, 4664, 'App\\Product', '2021-03-12 12:19:37', '2021-03-12 12:19:37', NULL),
(640, 'image2.png', 'image2.png', '.jpeg', '0', 0, 0, 4664, 'App\\Product', '2021-03-12 12:19:37', '2021-03-12 12:19:37', NULL),
(641, 'image.png', 'image.png', '.jpeg', '0', 0, 1, 19813, 'App\\Inventory', '2021-03-12 12:19:37', '2021-03-12 12:19:37', NULL),
(642, 'image2.png', 'image2.png', '.jpeg', '0', 0, 0, 19813, 'App\\Inventory', '2021-03-12 12:19:37', '2021-03-12 12:19:37', NULL),
(643, 'images/1615862635.jpeg', '1615862635.jpeg', '.jpeg', '0', 0, 1, 4664, 'App\\Product', '2021-03-16 02:43:56', '2021-03-16 02:43:56', NULL),
(644, 'test.png', 'test.png', '.jpeg', '0', 0, 1, 4662, 'App\\Product', '2021-03-16 02:45:22', '2021-03-16 02:45:22', NULL),
(645, 'images/1615862722.jpeg', '1615862722.jpeg', '.jpeg', '0', 0, 0, 4662, 'App\\Product', '2021-03-16 02:45:22', '2021-03-16 02:45:22', NULL),
(646, 'images/gxZAkQ5uWbW9Xek5Fncme4TYbf9U5PsUKdoFgclj.jpeg', 'tradition-wear-banner.jpeg', 'jpeg', '75728', 0, 1, 1, 'App\\Banner', '2021-03-18 05:17:58', '2021-03-18 05:17:58', NULL),
(647, 'images/Hulgo5vgoco1eUFozZRT7MOLUpvi2TZvZtLzL2Ht.jpeg', 'tradition-wear-banner.jpeg', 'jpeg', '75728', 0, 0, 1, 'App\\Banner', '2021-03-18 05:17:58', '2021-03-18 05:17:58', NULL),
(648, 'images/wl7o2AeEerfU7H9udMT5wHgETT7nMTBu1c6cOGyz.jpeg', 'AGI-AA4055V-main-2019-1000px.jpeg', 'jpeg', '70982', 0, 1, 2, 'App\\Banner', '2021-03-18 06:06:52', '2021-03-18 06:06:52', NULL),
(649, 'images/ZCh0YJLPgbczE74gktNnvCKmS24nXxpNYsrUpeUL.jpeg', 'AGI-AA4055V-main-2019-1000px.jpeg', 'jpeg', '70982', 0, 0, 2, 'App\\Banner', '2021-03-18 06:06:52', '2021-03-18 06:06:52', NULL),
(650, 'images/1616135305.jpeg', '1616135305.jpeg', '.jpeg', '0', 0, 1, 4674, 'App\\Product', '2021-03-19 06:28:25', '2021-03-19 06:28:25', NULL),
(651, 'images/1616135305.jpeg', '1616135305.jpeg', '.jpeg', '0', 0, 0, 4674, 'App\\Product', '2021-03-19 06:28:25', '2021-03-19 06:28:25', NULL),
(652, 'images/1616135305.jpeg', '1616135305.jpeg', '.jpeg', '0', 0, 1, 19829, 'App\\Inventory', '2021-03-19 06:28:25', '2021-03-19 06:28:25', NULL),
(653, 'images/1616135305.jpeg', '1616135305.jpeg', '.jpeg', '0', 0, 0, 19829, 'App\\Inventory', '2021-03-19 06:28:25', '2021-03-19 06:28:25', NULL),
(654, 'images/1616147923.jpeg', '1616147923.jpeg', '.jpeg', '0', 0, 1, 19832, 'App\\Inventory', '2021-03-19 09:58:43', '2021-03-19 09:58:43', NULL),
(655, 'images/1616150443.jpeg', '1616150443.jpeg', '.jpeg', '0', 0, 1, 4676, 'App\\Product', '2021-03-19 10:40:44', '2021-03-19 10:40:44', NULL),
(656, 'images/1616150443.jpeg', '1616150443.jpeg', '.jpeg', '0', 0, 1, 19833, 'App\\Inventory', '2021-03-19 10:40:44', '2021-03-19 10:40:44', NULL),
(657, 'images/1616153329.jpeg', '1616153329.jpeg', '.jpeg', '0', 0, 1, 19834, 'App\\Inventory', '2021-03-19 11:28:49', '2021-03-19 11:28:49', NULL),
(658, 'images/1616156524.jpeg', '1616156524.jpeg', '.jpeg', '0', 0, 1, 4677, 'App\\Product', '2021-03-19 12:22:04', '2021-03-19 12:22:04', NULL),
(659, 'images/1616156524.jpeg', '1616156524.jpeg', '.jpeg', '0', 0, 1, 19835, 'App\\Inventory', '2021-03-19 12:22:04', '2021-03-19 12:22:04', NULL),
(660, 'images/1616158982.jpeg', '1616158982.jpeg', '.jpeg', '0', 0, 1, 4678, 'App\\Product', '2021-03-19 13:03:03', '2021-03-19 13:03:03', NULL),
(661, 'images/1616158982.jpeg', '1616158982.jpeg', '.jpeg', '0', 0, 1, 19836, 'App\\Inventory', '2021-03-19 13:03:03', '2021-03-19 13:03:03', NULL),
(662, 'images/1616159577.jpeg', '1616159577.jpeg', '.jpeg', '0', 0, 1, 4679, 'App\\Product', '2021-03-19 13:12:57', '2021-03-19 13:12:57', NULL),
(663, 'images/1616159577.jpeg', '1616159577.jpeg', '.jpeg', '0', 0, 1, 19837, 'App\\Inventory', '2021-03-19 13:12:57', '2021-03-19 13:12:57', NULL),
(664, 'images/1616161784.jpeg', '1616161784.jpeg', '.jpeg', '0', 0, 1, 4680, 'App\\Product', '2021-03-19 13:49:44', '2021-03-19 13:49:44', NULL),
(665, 'images/1616161784.jpeg', '1616161784.jpeg', '.jpeg', '0', 0, 1, 19838, 'App\\Inventory', '2021-03-19 13:49:44', '2021-03-19 13:49:44', NULL),
(666, 'images/1616161968.jpeg', '1616161968.jpeg', '.jpeg', '0', 0, 1, 19839, 'App\\Inventory', '2021-03-19 13:52:49', '2021-03-19 13:52:49', NULL),
(667, 'images/1616159577.jpeg', '1616159577.jpeg', '.jpeg', '0', 0, 1, 4679, 'App\\Product', '2021-03-19 13:53:40', '2021-03-19 13:53:40', NULL),
(668, 'images/1616162147.jpeg', '1616162147.jpeg', '.jpeg', '0', 0, 1, 4681, 'App\\Product', '2021-03-19 13:55:48', '2021-03-19 13:55:48', NULL),
(669, 'images/1616303817.jpeg', '1616303817.jpeg', '.jpeg', '0', 0, 1, 4682, 'App\\Product', '2021-03-21 05:16:57', '2021-03-21 05:16:57', NULL),
(670, 'images/1616303817.jpeg', '1616303817.jpeg', '.jpeg', '0', 0, 1, 19842, 'App\\Inventory', '2021-03-21 05:16:57', '2021-03-21 05:16:57', NULL),
(671, 'images/1616304131.jpeg', '1616304131.jpeg', '.jpeg', '0', 0, 1, 19843, 'App\\Inventory', '2021-03-21 05:22:11', '2021-03-21 05:22:11', NULL),
(672, 'images/1616335174.jpeg', '1616335174.jpeg', '.jpeg', '0', 0, 1, 4683, 'App\\Product', '2021-03-21 14:00:16', '2021-03-21 14:00:16', NULL),
(673, 'images/1616335192.jpeg', '1616335192.jpeg', '.jpeg', '0', 0, 0, 4683, 'App\\Product', '2021-03-21 14:00:16', '2021-03-21 14:00:16', NULL),
(674, 'images/1616335203.jpeg', '1616335203.jpeg', '.jpeg', '0', 0, 0, 4683, 'App\\Product', '2021-03-21 14:00:16', '2021-03-21 14:00:16', NULL),
(675, 'images/1616335174.jpeg', '1616335174.jpeg', '.jpeg', '0', 0, 1, 19844, 'App\\Inventory', '2021-03-21 14:00:16', '2021-03-21 14:00:16', NULL),
(676, 'images/1616335192.jpeg', '1616335192.jpeg', '.jpeg', '0', 0, 0, 19844, 'App\\Inventory', '2021-03-21 14:00:16', '2021-03-21 14:00:16', NULL),
(677, 'images/1616335203.jpeg', '1616335203.jpeg', '.jpeg', '0', 0, 0, 19844, 'App\\Inventory', '2021-03-21 14:00:16', '2021-03-21 14:00:16', NULL),
(678, 'images/1616335509.jpeg', '1616335509.jpeg', '.jpeg', '0', 0, 1, 4684, 'App\\Product', '2021-03-21 14:05:09', '2021-03-21 14:05:09', NULL),
(679, 'images/1616335509.jpeg', '1616335509.jpeg', '.jpeg', '0', 0, 1, 19845, 'App\\Inventory', '2021-03-21 14:05:09', '2021-03-21 14:05:09', NULL),
(680, 'images/1616406478.jpeg', '1616406478.jpeg', '.jpeg', '0', 0, 1, 4685, 'App\\Product', '2021-03-22 09:47:58', '2021-03-22 09:47:58', NULL),
(681, 'images/1616406478.jpeg', '1616406478.jpeg', '.jpeg', '0', 0, 1, 19846, 'App\\Inventory', '2021-03-22 09:47:58', '2021-03-22 09:47:58', NULL),
(682, 'images/1616416568.jpeg', '1616416568.jpeg', '.jpeg', '0', 0, 1, 4686, 'App\\Product', '2021-03-22 12:36:08', '2021-03-22 12:36:08', NULL),
(683, 'images/1616416568.jpeg', '1616416568.jpeg', '.jpeg', '0', 0, 1, 19847, 'App\\Inventory', '2021-03-22 12:36:08', '2021-03-22 12:36:08', NULL),
(684, 'images/1616417585.jpeg', '1616417585.jpeg', '.jpeg', '0', 0, 1, 4687, 'App\\Product', '2021-03-22 12:53:06', '2021-03-22 12:53:06', NULL),
(685, 'images/1616417585.jpeg', '1616417585.jpeg', '.jpeg', '0', 0, 1, 19848, 'App\\Inventory', '2021-03-22 12:53:06', '2021-03-22 12:53:06', NULL),
(686, 'images/1616491747.jpeg', '1616491747.jpeg', '.jpeg', '0', 0, 1, 4688, 'App\\Product', '2021-03-23 09:29:07', '2021-03-23 09:29:07', NULL),
(687, 'images/1616491747.jpeg', '1616491747.jpeg', '.jpeg', '0', 0, 1, 19849, 'App\\Inventory', '2021-03-23 09:29:07', '2021-03-23 09:29:07', NULL),
(688, 'images/1616492347.jpeg', '1616492347.jpeg', '.jpeg', '0', 0, 1, 4689, 'App\\Product', '2021-03-23 09:39:07', '2021-03-23 09:39:07', NULL),
(689, 'images/1616492347.jpeg', '1616492347.jpeg', '.jpeg', '0', 0, 1, 19850, 'App\\Inventory', '2021-03-23 09:39:07', '2021-03-23 09:39:07', NULL),
(690, 'images/1616493154.jpeg', '1616493154.jpeg', '.jpeg', '0', 0, 1, 4690, 'App\\Product', '2021-03-23 09:52:35', '2021-03-23 09:52:35', NULL),
(691, 'images/1616493154.jpeg', '1616493154.jpeg', '.jpeg', '0', 0, 1, 19851, 'App\\Inventory', '2021-03-23 09:52:35', '2021-03-23 09:52:35', NULL),
(692, 'images/1616495289.jpeg', '1616495289.jpeg', '.jpeg', '0', 0, 1, 4691, 'App\\Product', '2021-03-23 10:28:10', '2021-03-23 10:28:10', NULL),
(693, 'images/1616495289.jpeg', '1616495289.jpeg', '.jpeg', '0', 0, 1, 19852, 'App\\Inventory', '2021-03-23 10:28:10', '2021-03-23 10:28:10', NULL),
(694, 'images/1616495289.jpeg', '1616495289.jpeg', '.jpeg', '0', 0, 1, 19853, 'App\\Inventory', '2021-03-23 10:35:33', '2021-03-23 10:35:33', NULL),
(695, 'images/1616493154.jpeg', '1616493154.jpeg', '.jpeg', '0', 0, 1, 19854, 'App\\Inventory', '2021-03-23 10:38:28', '2021-03-23 10:38:28', NULL),
(696, 'images/1616493154.jpeg', '1616493154.jpeg', '.jpeg', '0', 0, 1, 19855, 'App\\Inventory', '2021-03-23 14:51:26', '2021-03-23 14:51:26', NULL),
(697, 'images/1616493154.jpeg', '1616493154.jpeg', '.jpeg', '0', 0, 0, 19855, 'App\\Inventory', '2021-03-23 14:51:26', '2021-03-23 14:51:26', NULL),
(698, 'images/1616493154.jpeg', '1616493154.jpeg', '.jpeg', '0', 0, 1, 19856, 'App\\Inventory', '2021-03-23 15:25:26', '2021-03-23 15:25:26', NULL),
(699, 'images/1616513666.jpeg', '1616513666.jpeg', '.jpeg', '0', 0, 1, 4693, 'App\\Product', '2021-03-23 15:34:26', '2021-03-23 15:34:26', NULL),
(700, 'images/1616513666.jpeg', '1616513666.jpeg', '.jpeg', '0', 0, 1, 19857, 'App\\Inventory', '2021-03-23 15:34:26', '2021-03-23 15:34:26', NULL),
(701, 'images/1616561415.jpeg', '1616561415.jpeg', '.jpeg', '0', 0, 1, 4695, 'App\\Product', '2021-03-24 04:50:15', '2021-03-24 04:50:15', NULL),
(702, 'images/1616561415.jpeg', '1616561415.jpeg', '.jpeg', '0', 0, 1, 19858, 'App\\Inventory', '2021-03-24 04:50:15', '2021-03-24 04:50:15', NULL),
(703, 'images/1616562103.jpeg', '1616562103.jpeg', '.jpeg', '0', 0, 1, 4699, 'App\\Product', '2021-03-24 05:01:43', '2021-03-24 05:01:43', NULL),
(704, 'images/1616562103.jpeg', '1616562103.jpeg', '.jpeg', '0', 0, 1, 19861, 'App\\Inventory', '2021-03-24 05:01:43', '2021-03-24 05:01:43', NULL),
(705, 'images/1616561415.jpeg', '1616561415.jpeg', '.jpeg', '0', 0, 1, 19858, 'App\\Inventory', '2021-03-24 05:08:41', '2021-03-24 05:08:41', NULL),
(706, 'images/1616561415.jpeg', '1616561415.jpeg', '.jpeg', '0', 0, 0, 19858, 'App\\Inventory', '2021-03-24 05:08:41', '2021-03-24 05:08:41', NULL),
(707, 'images/1616563843.jpeg', '1616563843.jpeg', '.jpeg', '0', 0, 1, 4700, 'App\\Product', '2021-03-24 05:30:44', '2021-03-24 05:30:44', NULL),
(708, 'images/1616563843.jpeg', '1616563843.jpeg', '.jpeg', '0', 0, 1, 19862, 'App\\Inventory', '2021-03-24 05:30:44', '2021-03-24 05:30:44', NULL),
(709, 'images/1616564894.jpeg', '1616564894.jpeg', '.jpeg', '0', 0, 1, 4701, 'App\\Product', '2021-03-24 05:48:15', '2021-03-24 05:48:15', NULL),
(710, 'images/1616564894.jpeg', '1616564894.jpeg', '.jpeg', '0', 0, 1, 19863, 'App\\Inventory', '2021-03-24 05:48:15', '2021-03-24 05:48:15', NULL),
(711, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 1, 4702, 'App\\Product', '2021-03-24 08:08:28', '2021-03-24 08:08:28', NULL),
(712, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 1, 19864, 'App\\Inventory', '2021-03-24 08:08:28', '2021-03-24 08:08:28', NULL),
(713, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 1, 4702, 'App\\Product', '2021-03-24 08:38:50', '2021-03-24 08:38:50', NULL),
(714, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 1, 19864, 'App\\Inventory', '2021-03-24 10:45:04', '2021-03-24 10:45:04', NULL),
(715, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 0, 19864, 'App\\Inventory', '2021-03-24 10:45:04', '2021-03-24 10:45:04', NULL),
(716, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 1, 4702, 'App\\Product', '2021-03-24 11:18:52', '2021-03-24 11:18:52', NULL),
(717, 'images/1616573308.jpeg', '1616573308.jpeg', '.jpeg', '0', 0, 1, 19864, 'App\\Inventory', '2021-03-24 11:19:20', '2021-03-24 11:19:20', NULL),
(718, 'images/1616586283.jpeg', '1616586283.jpeg', '.jpeg', '0', 0, 1, 4703, 'App\\Product', '2021-03-24 11:44:43', '2021-03-24 11:44:43', NULL),
(719, 'images/1616586283.jpeg', '1616586283.jpeg', '.jpeg', '0', 0, 1, 19865, 'App\\Inventory', '2021-03-24 11:44:43', '2021-03-24 11:44:43', NULL),
(720, 'images/1616587058.jpeg', '1616587058.jpeg', '.jpeg', '0', 0, 1, 4704, 'App\\Product', '2021-03-24 11:57:39', '2021-03-24 11:57:39', NULL),
(721, 'images/1616587058.jpeg', '1616587058.jpeg', '.jpeg', '0', 0, 1, 19866, 'App\\Inventory', '2021-03-24 11:57:39', '2021-03-24 11:57:39', NULL),
(722, 'images/1616586283.jpeg', '1616586283.jpeg', '.jpeg', '0', 0, 1, 4703, 'App\\Product', '2021-03-24 11:58:27', '2021-03-24 11:58:27', NULL),
(723, 'images/1616586283.jpeg', '1616586283.jpeg', '.jpeg', '0', 0, 1, 19867, 'App\\Inventory', '2021-03-24 11:59:25', '2021-03-24 11:59:25', NULL),
(724, 'images/1616586283.jpeg', '1616586283.jpeg', '.jpeg', '0', 0, 1, 19865, 'App\\Inventory', '2021-03-24 12:01:31', '2021-03-24 12:01:31', NULL),
(725, 'images/1616649007.jpeg', '1616649007.jpeg', '.jpeg', '0', 0, 1, 4708, 'App\\Product', '2021-03-25 05:10:08', '2021-03-25 05:10:08', NULL),
(726, 'images/1616649007.jpeg', '1616649007.jpeg', '.jpeg', '0', 0, 1, 19868, 'App\\Inventory', '2021-03-25 05:10:08', '2021-03-25 05:10:08', NULL),
(727, 'images/1616650354.jpeg', '1616650354.jpeg', '.jpeg', '0', 0, 1, 4709, 'App\\Product', '2021-03-25 05:32:35', '2021-03-25 05:32:35', NULL),
(728, 'images/1616650354.jpeg', '1616650354.jpeg', '.jpeg', '0', 0, 1, 19869, 'App\\Inventory', '2021-03-25 05:32:35', '2021-03-25 05:32:35', NULL),
(729, 'images/1616663566.jpeg', '1616663566.jpeg', '.jpeg', '0', 0, 1, 4710, 'App\\Product', '2021-03-25 09:12:46', '2021-03-25 09:12:46', NULL),
(730, 'images/1616663566.jpeg', '1616663566.jpeg', '.jpeg', '0', 0, 1, 19870, 'App\\Inventory', '2021-03-25 09:12:46', '2021-03-25 09:12:46', NULL),
(731, 'images/1616670433.jpeg', '1616670433.jpeg', '.jpeg', '0', 0, 1, 4711, 'App\\Product', '2021-03-25 11:07:13', '2021-03-25 11:07:13', NULL),
(732, 'images/1616670433.jpeg', '1616670433.jpeg', '.jpeg', '0', 0, 1, 19871, 'App\\Inventory', '2021-03-25 11:07:13', '2021-03-25 11:07:13', NULL),
(733, 'images/1616742060.jpeg', NULL, NULL, '0', 0, 0, 91, 'App\\Shop', '2021-03-25 13:02:43', '2021-03-26 07:01:00', NULL),
(734, 'images/1616735464.jpeg', '1616735464.jpeg', '.jpeg', '0', 0, 1, 4712, 'App\\Product', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(735, 'images/1616735472.jpeg', '1616735472.jpeg', '.jpeg', '0', 0, 0, 4712, 'App\\Product', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(736, 'images/1616735475.jpeg', '1616735475.jpeg', '.jpeg', '0', 0, 0, 4712, 'App\\Product', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(737, 'images/1616735479.jpeg', '1616735479.jpeg', '.jpeg', '0', 0, 0, 4712, 'App\\Product', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(738, 'images/1616735464.jpeg', '1616735464.jpeg', '.jpeg', '0', 0, 1, 19872, 'App\\Inventory', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(739, 'images/1616735472.jpeg', '1616735472.jpeg', '.jpeg', '0', 0, 0, 19872, 'App\\Inventory', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(740, 'images/1616735475.jpeg', '1616735475.jpeg', '.jpeg', '0', 0, 0, 19872, 'App\\Inventory', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(741, 'images/1616735479.jpeg', '1616735479.jpeg', '.jpeg', '0', 0, 0, 19872, 'App\\Inventory', '2021-03-26 05:11:20', '2021-03-26 05:11:20', NULL),
(742, 'images/1616742978.jpeg', NULL, NULL, '0', 0, 0, 93, 'App\\Shop', '2021-03-26 07:11:44', '2021-03-26 07:16:18', NULL),
(743, 'images/1616735464.jpeg', '1616735464.jpeg', '.jpeg', '0', 0, 1, 4712, 'App\\Product', '2021-03-26 07:20:46', '2021-03-26 07:20:46', NULL),
(744, 'images/1616743956.jpeg', '1616743956.jpeg', '.jpeg', '0', 0, 1, 4713, 'App\\Product', '2021-03-26 07:32:36', '2021-03-26 07:32:36', NULL),
(745, 'images/1616743956.jpeg', '1616743956.jpeg', '.jpeg', '0', 0, 1, 19873, 'App\\Inventory', '2021-03-26 07:32:36', '2021-03-26 07:32:36', NULL),
(746, 'images/1616744133.jpeg', '1616744133.jpeg', '.jpeg', '0', 0, 1, 4714, 'App\\Product', '2021-03-26 07:35:33', '2021-03-26 07:35:33', NULL),
(747, 'images/1616744133.jpeg', '1616744133.jpeg', '.jpeg', '0', 0, 1, 19874, 'App\\Inventory', '2021-03-26 07:35:33', '2021-03-26 07:35:33', NULL),
(748, 'images/1616744133.jpeg', '1616744133.jpeg', '.jpeg', '0', 0, 1, 19875, 'App\\Inventory', '2021-03-26 07:36:32', '2021-03-26 07:36:32', NULL),
(749, 'images/1616743956.jpeg', '1616743956.jpeg', '.jpeg', '0', 0, 1, 19876, 'App\\Inventory', '2021-03-26 07:55:22', '2021-03-26 07:55:22', NULL),
(750, 'images/1616745580.jpeg', NULL, NULL, '0', 0, 0, 94, 'App\\Shop', '2021-03-26 07:59:40', '2021-03-26 07:59:40', NULL),
(751, 'images/1616748412.jpeg', '1616748412.jpeg', '.jpeg', '0', 0, 1, 4715, 'App\\Product', '2021-03-26 08:46:53', '2021-03-26 08:46:53', NULL),
(752, 'images/1616748412.jpeg', '1616748412.jpeg', '.jpeg', '0', 0, 1, 19877, 'App\\Inventory', '2021-03-26 08:46:53', '2021-03-26 08:46:53', NULL),
(753, 'images/1616748412.jpeg', '1616748412.jpeg', '.jpeg', '0', 0, 1, 4716, 'App\\Product', '2021-03-26 08:46:53', '2021-03-26 08:46:53', NULL),
(754, 'images/1616748413.jpeg', '1616748413.jpeg', '.jpeg', '0', 0, 0, 4716, 'App\\Product', '2021-03-26 08:46:53', '2021-03-26 08:46:53', NULL),
(755, 'images/1616748412.jpeg', '1616748412.jpeg', '.jpeg', '0', 0, 1, 19878, 'App\\Inventory', '2021-03-26 08:46:53', '2021-03-26 08:46:53', NULL),
(756, 'images/1616748413.jpeg', '1616748413.jpeg', '.jpeg', '0', 0, 0, 19878, 'App\\Inventory', '2021-03-26 08:46:53', '2021-03-26 08:46:53', NULL),
(757, 'images/1616744133.jpeg', '1616744133.jpeg', '.jpeg', '0', 0, 1, 19874, 'App\\Inventory', '2021-03-26 09:46:20', '2021-03-26 09:46:20', NULL),
(758, 'images/1616744133.jpeg', '1616744133.jpeg', '.jpeg', '0', 0, 1, 19874, 'App\\Inventory', '2021-03-26 09:49:08', '2021-03-26 09:49:08', NULL),
(759, 'images/1616752614.jpeg', '1616752614.jpeg', '.jpeg', '0', 0, 1, 4717, 'App\\Product', '2021-03-26 09:56:54', '2021-03-26 09:56:54', NULL),
(760, 'images/1616752614.jpeg', '1616752614.jpeg', '.jpeg', '0', 0, 1, 19879, 'App\\Inventory', '2021-03-26 09:56:54', '2021-03-26 09:56:54', NULL),
(761, 'images/1616753012.jpeg', '1616753012.jpeg', '.jpeg', '0', 0, 1, 4718, 'App\\Product', '2021-03-26 10:03:32', '2021-03-26 10:03:32', NULL),
(762, 'images/1616753012.jpeg', '1616753012.jpeg', '.jpeg', '0', 0, 1, 19880, 'App\\Inventory', '2021-03-26 10:03:32', '2021-03-26 10:03:32', NULL),
(763, 'images/1616760226.jpeg', '1616760226.jpeg', '.jpeg', '0', 0, 1, 4719, 'App\\Product', '2021-03-26 12:03:46', '2021-03-26 12:03:46', NULL),
(764, 'images/1616760226.jpeg', '1616760226.jpeg', '.jpeg', '0', 0, 1, 19881, 'App\\Inventory', '2021-03-26 12:03:46', '2021-03-26 12:03:46', NULL),
(765, 'images/1616762554.jpeg', NULL, NULL, '0', 0, 0, 98, 'App\\Shop', '2021-03-26 12:12:37', '2021-03-26 12:42:34', NULL),
(766, 'images/1616761240.jpeg', '1616761240.jpeg', '.jpeg', '0', 0, 1, 4720, 'App\\Product', '2021-03-26 12:20:40', '2021-03-26 12:20:40', NULL),
(767, 'images/1616761240.jpeg', '1616761240.jpeg', '.jpeg', '0', 0, 1, 19882, 'App\\Inventory', '2021-03-26 12:20:40', '2021-03-26 12:20:40', NULL),
(768, 'images/1616761240.jpeg', '1616761240.jpeg', '.jpeg', '0', 0, 1, 19883, 'App\\Inventory', '2021-03-26 12:22:09', '2021-03-26 12:22:09', NULL),
(769, 'images/1616760226.jpeg', '1616760226.jpeg', '.jpeg', '0', 0, 1, 4719, 'App\\Product', '2021-03-26 12:23:47', '2021-03-26 12:23:47', NULL),
(770, 'images/1616764691.jpeg', '1616764691.jpeg', '.jpeg', '0', 0, 1, 4721, 'App\\Product', '2021-03-26 13:18:12', '2021-03-26 13:18:12', NULL),
(771, 'images/1616764691.jpeg', '1616764691.jpeg', '.jpeg', '0', 0, 1, 19884, 'App\\Inventory', '2021-03-26 13:18:12', '2021-03-26 13:18:12', NULL),
(772, 'images/1617260001.jpeg', '1617260001.jpeg', '.jpeg', '0', 0, 1, 4722, 'App\\Product', '2021-04-01 06:53:22', '2021-04-01 06:53:22', NULL),
(773, 'images/1617260001.jpeg', '1617260001.jpeg', '.jpeg', '0', 0, 1, 19885, 'App\\Inventory', '2021-04-01 06:53:22', '2021-04-01 06:53:22', NULL),
(774, 'images/1617276913.jpeg', '1617276913.jpeg', '.jpeg', '0', 0, 1, 4723, 'App\\Product', '2021-04-01 11:35:14', '2021-04-01 11:35:14', NULL),
(775, 'images/1617276913.jpeg', '1617276913.jpeg', '.jpeg', '0', 0, 1, 19886, 'App\\Inventory', '2021-04-01 11:35:14', '2021-04-01 11:35:14', NULL),
(776, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 4724, 'App\\Product', '2021-04-01 11:40:56', '2021-04-01 11:40:56', NULL),
(777, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 0, 4724, 'App\\Product', '2021-04-01 11:40:56', '2021-04-01 11:40:56', NULL),
(778, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 19887, 'App\\Inventory', '2021-04-01 11:40:56', '2021-04-01 11:40:56', NULL),
(779, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 0, 19887, 'App\\Inventory', '2021-04-01 11:40:56', '2021-04-01 11:40:56', NULL),
(780, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 4725, 'App\\Product', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(781, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 0, 4725, 'App\\Product', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(782, 'images/1617277257.jpeg', '1617277257.jpeg', '.jpeg', '0', 0, 0, 4725, 'App\\Product', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(783, 'images/1617277257.jpeg', '1617277257.jpeg', '.jpeg', '0', 0, 0, 4725, 'App\\Product', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(784, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 19888, 'App\\Inventory', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(785, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 0, 19888, 'App\\Inventory', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(786, 'images/1617277257.jpeg', '1617277257.jpeg', '.jpeg', '0', 0, 0, 19888, 'App\\Inventory', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(787, 'images/1617277257.jpeg', '1617277257.jpeg', '.jpeg', '0', 0, 0, 19888, 'App\\Inventory', '2021-04-01 11:40:57', '2021-04-01 11:40:57', NULL),
(788, 'images/1617278178.jpeg', NULL, NULL, '0', 0, 0, 103, 'App\\Shop', '2021-04-01 11:56:18', '2021-04-01 11:56:18', NULL),
(789, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 4724, 'App\\Product', '2021-04-01 11:59:26', '2021-04-01 11:59:26', NULL),
(790, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 4724, 'App\\Product', '2021-04-01 12:00:58', '2021-04-01 12:00:58', NULL),
(791, 'images/1617277256.jpeg', '1617277256.jpeg', '.jpeg', '0', 0, 1, 19887, 'App\\Inventory', '2021-04-01 12:02:34', '2021-04-01 12:02:34', NULL),
(792, 'images/1617791381.jpeg', '1617791381.jpeg', '.jpeg', '0', 0, 1, 4726, 'App\\Product', '2021-04-07 10:29:42', '2021-04-07 10:29:42', NULL),
(793, 'images/1617791382.jpeg', '1617791382.jpeg', '.jpeg', '0', 0, 0, 4726, 'App\\Product', '2021-04-07 10:29:42', '2021-04-07 10:29:42', NULL),
(794, 'images/1617791381.jpeg', '1617791381.jpeg', '.jpeg', '0', 0, 1, 19889, 'App\\Inventory', '2021-04-07 10:29:42', '2021-04-07 10:29:42', NULL),
(795, 'images/1617791382.jpeg', '1617791382.jpeg', '.jpeg', '0', 0, 0, 19889, 'App\\Inventory', '2021-04-07 10:29:42', '2021-04-07 10:29:42', NULL),
(796, 'images/1617856092.jpeg', '1617856092.jpeg', '.jpeg', '0', 0, 1, 4727, 'App\\Product', '2021-04-08 04:28:12', '2021-04-08 04:28:12', NULL),
(797, 'images/1617856092.jpeg', '1617856092.jpeg', '.jpeg', '0', 0, 0, 4727, 'App\\Product', '2021-04-08 04:28:12', '2021-04-08 04:28:12', NULL),
(798, 'images/1617856092.jpeg', '1617856092.jpeg', '.jpeg', '0', 0, 1, 19890, 'App\\Inventory', '2021-04-08 04:28:12', '2021-04-08 04:28:12', NULL),
(799, 'images/1617856092.jpeg', '1617856092.jpeg', '.jpeg', '0', 0, 0, 19890, 'App\\Inventory', '2021-04-08 04:28:12', '2021-04-08 04:28:12', NULL),
(800, 'images/1617856184.jpeg', '1617856184.jpeg', '.jpeg', '0', 0, 1, 4728, 'App\\Product', '2021-04-08 04:29:45', '2021-04-08 04:29:45', NULL),
(801, 'images/1617856184.jpeg', '1617856184.jpeg', '.jpeg', '0', 0, 1, 19891, 'App\\Inventory', '2021-04-08 04:29:45', '2021-04-08 04:29:45', NULL),
(802, 'images/1617864522.jpeg', '1617864522.jpeg', '.jpeg', '0', 0, 1, 4729, 'App\\Product', '2021-04-08 06:48:43', '2021-04-08 06:48:43', NULL),
(803, 'images/1617864522.jpeg', '1617864522.jpeg', '.jpeg', '0', 0, 1, 19892, 'App\\Inventory', '2021-04-08 06:48:43', '2021-04-08 06:48:43', NULL),
(804, 'images/1617967112.jpeg', '1617967112.jpeg', '.jpeg', '0', 0, 1, 4730, 'App\\Product', '2021-04-09 11:18:32', '2021-04-09 11:18:32', NULL),
(805, 'images/1617967112.jpeg', '1617967112.jpeg', '.jpeg', '0', 0, 1, 19893, 'App\\Inventory', '2021-04-09 11:18:32', '2021-04-09 11:18:32', NULL),
(806, 'images/1618227538.jpeg', '1618227538.jpeg', '.jpeg', '0', 0, 1, 4731, 'App\\Product', '2021-04-12 11:38:58', '2021-04-12 11:38:58', NULL),
(807, 'images/1618227538.jpeg', '1618227538.jpeg', '.jpeg', '0', 0, 0, 4731, 'App\\Product', '2021-04-12 11:38:58', '2021-04-12 11:38:58', NULL),
(808, 'images/1618227538.jpeg', '1618227538.jpeg', '.jpeg', '0', 0, 1, 19894, 'App\\Inventory', '2021-04-12 11:38:58', '2021-04-12 11:38:58', NULL),
(809, 'images/1618227538.jpeg', '1618227538.jpeg', '.jpeg', '0', 0, 0, 19894, 'App\\Inventory', '2021-04-12 11:38:58', '2021-04-12 11:38:58', NULL),
(810, 'images/1618228359.jpeg', '1618228359.jpeg', '.jpeg', '0', 0, 1, 4732, 'App\\Product', '2021-04-12 11:52:40', '2021-04-12 11:52:40', NULL),
(811, 'images/1618228359.jpeg', '1618228359.jpeg', '.jpeg', '0', 0, 1, 19895, 'App\\Inventory', '2021-04-12 11:52:40', '2021-04-12 11:52:40', NULL),
(812, 'images/1618293691.jpeg', '1618293691.jpeg', '.jpeg', '0', 0, 1, 4733, 'App\\Product', '2021-04-13 06:01:31', '2021-04-13 06:01:31', NULL),
(813, 'images/1618293691.jpeg', '1618293691.jpeg', '.jpeg', '0', 0, 0, 4733, 'App\\Product', '2021-04-13 06:01:31', '2021-04-13 06:01:31', NULL),
(814, 'images/1618293691.jpeg', '1618293691.jpeg', '.jpeg', '0', 0, 1, 19896, 'App\\Inventory', '2021-04-13 06:01:31', '2021-04-13 06:01:31', NULL),
(815, 'images/1618293691.jpeg', '1618293691.jpeg', '.jpeg', '0', 0, 0, 19896, 'App\\Inventory', '2021-04-13 06:01:31', '2021-04-13 06:01:31', NULL),
(816, 'images/1618293859.jpeg', '1618293859.jpeg', '.jpeg', '0', 0, 1, 4734, 'App\\Product', '2021-04-13 06:04:19', '2021-04-13 06:04:19', NULL),
(817, 'images/1618293859.jpeg', '1618293859.jpeg', '.jpeg', '0', 0, 1, 19897, 'App\\Inventory', '2021-04-13 06:04:19', '2021-04-13 06:04:19', NULL),
(818, '', '', '.jpeg', '0', 0, 1, 19898, 'App\\Inventory', '2021-04-13 06:21:16', '2021-04-13 06:21:16', NULL),
(819, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 1, 4735, 'App\\Product', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(820, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 0, 4735, 'App\\Product', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(821, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 0, 4735, 'App\\Product', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(822, 'images/1618296904.jpeg', '1618296904.jpeg', '.jpeg', '0', 0, 0, 4735, 'App\\Product', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(823, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 1, 19899, 'App\\Inventory', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(824, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 0, 19899, 'App\\Inventory', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(825, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 0, 19899, 'App\\Inventory', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(826, 'images/1618296904.jpeg', '1618296904.jpeg', '.jpeg', '0', 0, 0, 19899, 'App\\Inventory', '2021-04-13 06:55:04', '2021-04-13 06:55:04', NULL),
(827, 'images/1618296903.jpeg', '1618296903.jpeg', '.jpeg', '0', 0, 1, 4735, 'App\\Product', '2021-04-13 13:02:43', '2021-04-13 13:02:43', NULL),
(828, 'images/1618814047.jpeg', '1618814047.jpeg', '.jpeg', '0', 0, 1, 4736, 'App\\Product', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(829, 'images/1618814057.jpeg', '1618814057.jpeg', '.jpeg', '0', 0, 0, 4736, 'App\\Product', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(830, 'images/1618814062.jpeg', '1618814062.jpeg', '.jpeg', '0', 0, 0, 4736, 'App\\Product', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(831, 'images/1618814065.jpeg', '1618814065.jpeg', '.jpeg', '0', 0, 0, 4736, 'App\\Product', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(832, 'images/1618814047.jpeg', '1618814047.jpeg', '.jpeg', '0', 0, 1, 19900, 'App\\Inventory', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(833, 'images/1618814057.jpeg', '1618814057.jpeg', '.jpeg', '0', 0, 0, 19900, 'App\\Inventory', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(834, 'images/1618814062.jpeg', '1618814062.jpeg', '.jpeg', '0', 0, 0, 19900, 'App\\Inventory', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(835, 'images/1618814065.jpeg', '1618814065.jpeg', '.jpeg', '0', 0, 0, 19900, 'App\\Inventory', '2021-04-19 06:34:25', '2021-04-19 06:34:25', NULL),
(836, 'images/1618822909.jpeg', '1618822909.jpeg', '.jpeg', '0', 0, 1, 4737, 'App\\Product', '2021-04-19 09:01:50', '2021-04-19 09:01:50', NULL),
(837, 'images/1618822909.jpeg', '1618822909.jpeg', '.jpeg', '0', 0, 1, 19901, 'App\\Inventory', '2021-04-19 09:01:50', '2021-04-19 09:01:50', NULL),
(838, 'images/1618822909.jpeg', '1618822909.jpeg', '.jpeg', '0', 0, 1, 4737, 'App\\Product', '2021-04-19 09:37:30', '2021-04-19 09:37:30', NULL),
(839, 'images/RDTukdNV36nuRWtseVuN8K0mZpVzbDFg6KQdZXVd.png', 'Screenshot 2021-04-19 at 12.42.52 PM.png', 'png', '321429', 0, 1, 4738, 'App\\Product', '2021-04-19 10:33:15', '2021-04-19 10:33:15', NULL),
(840, 'images/TihvYyvc5lNTBMpNRYV8EWBbCwEOLkrQFqMRzR8n.jpeg', '812GuSONwVL._SL1500_.jpg', 'jpg', '277492', 0, NULL, 4739, 'App\\Product', '2021-04-19 10:34:42', '2021-04-19 10:34:42', NULL),
(841, 'images/sTZKZoPJWbum1hibBWg62eCQ3Eor7kz6aGJ9mQI7.jpeg', 'lg-55un7190pta-139683-large-1.jpg', 'jpg', '17255', 0, NULL, 4740, 'App\\Product', '2021-04-19 10:36:05', '2021-04-19 10:36:05', NULL),
(842, 'images/si97AqJ5b7kHtFN7GpsVeDCQKHjGiPQci5RkRaPE.jpeg', 'PHILIPS 108 cm _43 inch_ Full HD LED Smart.jpg', 'jpg', '11395', 0, NULL, 4741, 'App\\Product', '2021-04-19 10:39:11', '2021-04-19 10:39:11', NULL),
(843, 'images/U2aeTK7pMpgyuW4ce8nwfTJl8l2a7n3v8fSHsMnh.jpeg', 'LG 6.5 kg 5 Star.jpg', 'jpg', '3974', 0, NULL, 4742, 'App\\Product', '2021-04-19 10:42:28', '2021-04-19 10:42:28', NULL),
(844, 'images/Yc8g17sEfg4hJasfZkhPPCdawRRknTW4cXzDL0u9.jpeg', '41I1TVFOknL.jpg', 'jpg', '16481', 0, NULL, 4743, 'App\\Product', '2021-04-19 10:44:27', '2021-04-19 10:44:27', NULL),
(845, 'images/1tehIm57lAKZ29Upp2LkLXi2VsMqqo1vij6Ghe0R.jpeg', 'pc12db-1-portable-fixed-speed-blue-star-original-imafzcwhep8jenxu-500x500.jpeg', 'jpeg', '11961', 0, NULL, 4744, 'App\\Product', '2021-04-19 10:46:56', '2021-04-19 10:46:56', NULL),
(846, 'images/b9WUtMp2YALoFmpNhWVrbpyWDiXcR0ZmMiz0Liw4.jpeg', 'samsung-air-conditioner-500x500.jpg', 'jpg', '34382', 0, NULL, 4745, 'App\\Product', '2021-04-19 10:49:44', '2021-04-19 10:49:44', NULL),
(847, 'images/1e2NoNPCedYUVyH4bNqFNoaQCtNto4T7hDI1r7kY.jpeg', 'panasonic-1-5ton-5star-window-ac-250x250.jpeg', 'jpeg', '9989', 0, NULL, 4746, 'App\\Product', '2021-04-19 10:51:07', '2021-04-19 10:51:07', NULL),
(848, 'images/r0VFSurtN9FQonBiccAr6fNpSbVU0UvZwIHA5vNO.jpeg', 'USHA-DRY-IRON-EI-1602-SDL733192841-1-b0f66.jpg', 'jpg', '47897', 0, 1, 468, 'App\\Category', '2021-04-19 10:54:51', '2021-04-19 10:54:51', NULL),
(849, 'images/JQBCh7yNtiL7nnEceaFmNjScpzy4hJcm9jj7mM3F.jpeg', 'USHA-DRY-IRON-EI-1602-SDL733192841-1-b0f66.jpg', 'jpg', '47897', 0, NULL, 4747, 'App\\Product', '2021-04-19 10:56:59', '2021-04-19 10:56:59', NULL),
(850, 'images/SAhWJmdNubonJUMO5ha2ylH54SAaJjzmhzNfuRn5.jpeg', '612qedY5YbL._SL1500_.jpg', 'jpg', '52731', 0, NULL, 4748, 'App\\Product', '2021-04-19 10:58:45', '2021-04-19 10:58:45', NULL),
(851, 'images/oe82ODBVHoSLx0NVXO2Ts8trrJQumBtD0DmpXSJT.jpeg', 'kzp_133.jpg', 'jpg', '11304', 0, NULL, 4749, 'App\\Product', '2021-04-19 11:01:28', '2021-04-19 11:01:28', NULL),
(852, 'images/cnEJ9ShBtz3mYcId6xXCl7Zb0NqzlpM3AO8Rlitk.jpeg', '41DcL5_8wjL._SL1000_.jpg', 'jpg', '29348', 0, NULL, 4750, 'App\\Product', '2021-04-19 11:03:37', '2021-04-19 11:03:37', NULL),
(853, 'images/ShBPqM18lXLTpz6I97ysbw2ktE1VnQEmtWlhPWnp.jpeg', 'archan-73-ceiling-fan-1200-bajaj-original-imafrvpgrrjzg72a.jpeg', 'jpeg', '8070', 0, NULL, 4751, 'App\\Product', '2021-04-19 11:06:08', '2021-04-19 11:06:08', NULL),
(854, 'images/W6Pb0F26xJUawXUp5ygHfU2vW6bSpM2qeX2Cx9rV.jpeg', 'SAMSUNG 192 L Direct Cool Single Door 2 Star Refrigerator  _Gray Silver_.jpg', 'jpg', '114465', 0, NULL, 4752, 'App\\Product', '2021-04-19 11:08:40', '2021-04-19 11:08:40', NULL),
(855, 'images/2GwEISzGeUeI8bV9Z6Gfh0BVU7j5pl6maYlatZm6.jpeg', 'LG-190-Ltr-4-Star-SDL223669066-3-4bc73.jpeg', 'jpeg', '52993', 0, NULL, 4753, 'App\\Product', '2021-04-19 11:10:13', '2021-04-19 11:10:13', NULL),
(856, 'images/zUWgIwHVA1X9IapSeI1dfFrT9GWu1yYWe7m9Ys0J.jpeg', '61tH1osluML._SL1200_.jpg', 'jpg', '97274', 0, NULL, 4754, 'App\\Product', '2021-04-19 11:12:56', '2021-04-19 11:12:56', NULL),
(857, 'images/noICtcdPStbI9uEQcU07YbXmFoFuOFfcxzIATE2N.jpeg', 'philips-powerpro-compact-fc9352-01-bagless-original-imaf5xqwak9evffz.jpeg', 'jpeg', '14371', 0, NULL, 4755, 'App\\Product', '2021-04-19 11:14:55', '2021-04-19 11:14:55', NULL),
(858, 'images/GuR9P5ff4mV517CZ02NxgvNB5CG33uIKiPyEiCWc.jpeg', 'Breeze-1.jpg', 'jpg', '35907', 0, NULL, 4756, 'App\\Product', '2021-04-19 11:17:27', '2021-04-19 11:17:27', NULL),
(859, 'images/q0hmgikNGgfROFEoHbTb6M70Sd8rUEH6jiiyKQC3.jpeg', 'maharaja-whiteline-rambo-ac-303-desert-air-coolerwhite-grey-65-litres-e1526363878105.jpeg', 'jpeg', '42744', 0, NULL, 4757, 'App\\Product', '2021-04-19 11:19:19', '2021-04-19 11:19:19', NULL),
(860, 'images/1618838670.jpeg', '1618838670.jpeg', '.jpeg', '0', 0, 1, 4758, 'App\\Product', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(861, 'images/1618838670.jpeg', '1618838670.jpeg', '.jpeg', '0', 0, 0, 4758, 'App\\Product', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(862, 'images/1618838671.jpeg', '1618838671.jpeg', '.jpeg', '0', 0, 0, 4758, 'App\\Product', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(863, 'images/1618838672.jpeg', '1618838672.jpeg', '.jpeg', '0', 0, 0, 4758, 'App\\Product', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(864, 'images/1618838670.jpeg', '1618838670.jpeg', '.jpeg', '0', 0, 1, 19902, 'App\\Inventory', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(865, 'images/1618838670.jpeg', '1618838670.jpeg', '.jpeg', '0', 0, 0, 19902, 'App\\Inventory', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(866, 'images/1618838671.jpeg', '1618838671.jpeg', '.jpeg', '0', 0, 0, 19902, 'App\\Inventory', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(867, 'images/1618838672.jpeg', '1618838672.jpeg', '.jpeg', '0', 0, 0, 19902, 'App\\Inventory', '2021-04-19 13:24:32', '2021-04-19 13:24:32', NULL),
(868, 'images/1618890437.jpeg', NULL, NULL, '0', 0, 0, 30, 'App\\Shop', '2021-04-20 03:47:17', '2021-04-20 03:47:17', NULL),
(869, 'images/FWz5nnzLo8d6ueNYFTKrbgQao6Vrihw1NupFr8vN.jpeg', 'images.jpg', 'jpg', '5847', 0, NULL, 4759, 'App\\Product', '2021-04-20 04:27:05', '2021-04-20 04:27:05', NULL),
(870, 'images/MxqQb7yBpyUtpPNBR8Oe17ZEVgiaBvjQ5mX9H9OI.jpeg', '24-mm-1-inch-transparent-tape-self-adhesive-crystal-original-imafyyz9cfdtetp9.jpeg', 'jpeg', '11376', 0, NULL, 4760, 'App\\Product', '2021-04-20 04:29:30', '2021-04-20 04:29:30', NULL),
(871, 'images/T1yghrhVA1HcYL4Kt9gWp3yNc3I6UhKtL1PKQq0U.jpeg', '61N5tfqZNIL._SL1200_.jpg', 'jpg', '69759', 0, NULL, 4761, 'App\\Product', '2021-04-20 04:38:12', '2021-04-20 04:38:12', NULL),
(872, 'images/eF6mXcdcBxIsEeZiKtQapcPlAy2rXaVbyaDDJyuz.jpeg', 'incense-stick-holden-with-ash-plate-divine-mart-original-imafyhc3jydh5bfp.jpeg', 'jpeg', '46016', 0, NULL, 4762, 'App\\Product', '2021-04-20 04:40:01', '2021-04-20 04:40:01', NULL),
(873, 'images/nF31xZ7P1X74nbh958XvumymFd3cKDWlcZQmEyN9.jpeg', '730-mossco-original-imaffr296re4q8yc.jpeg', 'jpeg', '37056', 0, NULL, 4763, 'App\\Product', '2021-04-20 04:44:59', '2021-04-20 04:44:59', NULL),
(874, 'images/5ymKanHfJaNxnpsiTxmFxKTVfHKpmHajn34Gttnh.jpeg', '025-ds-enterprises-original-imafgjw5wtgsxfsd.jpeg', 'jpeg', '34325', 0, NULL, 4764, 'App\\Product', '2021-04-20 04:46:17', '2021-04-20 04:46:17', NULL),
(875, 'images/34jr1deDq83GEwbIlFuO1JjS0TiRtRC2bqIFOA26.jpeg', 'casacon01-cac0001-flat-casa-confort-original-imafy49kmkyetyhz.jpeg', 'jpeg', '36067', 0, NULL, 4765, 'App\\Product', '2021-04-20 04:48:12', '2021-04-20 04:48:12', NULL),
(876, 'images/2Q2EHQ0RgpNGlxDRhwDgMCgTXMmlGuE1iF5wSBs0.jpeg', 'Mirrorless camera 2018 (m).jpg', 'jpg', '54225', 0, 1, 469, 'App\\Category', '2021-04-20 04:50:46', '2021-04-20 04:50:46', NULL),
(877, 'images/jqBIY1xBZ2vbGTgRtGNR96RfLjnpLZaB5jBgCg13.jpeg', 'Mirrorless camera 2018 _m_.jpg', 'jpg', '54225', 0, NULL, 4766, 'App\\Product', '2021-04-20 05:18:03', '2021-04-20 05:18:03', NULL),
(878, 'images/UjKJ6auPWNrbS1Nmp65io1TBzd7zbj1dFUo5Jurs.jpeg', 'canon-eos-r-in-24-105usm-250x250.jpg', 'jpg', '13541', 0, NULL, 4767, 'App\\Product', '2021-04-20 05:19:31', '2021-04-20 05:19:31', NULL),
(879, 'images/M9wSCOWZs65iTxnui4Rjcj02ct7cuLod3cjCPtDh.jpeg', 'download.jpg', 'jpg', '8798', 0, 1, 470, 'App\\Category', '2021-04-20 05:22:59', '2021-04-20 05:22:59', NULL),
(880, 'images/Ywtp1rf2bxL2Wi4IJf9L32Yp8kGDiINq2YdDVMzG.jpeg', 'mac-air-apple-laptop-500x500.jpg', 'jpg', '26481', 0, NULL, 4768, 'App\\Product', '2021-04-20 05:24:59', '2021-04-20 05:24:59', NULL),
(881, 'images/1618896794.jpeg', '1618896794.jpeg', '.jpeg', '0', 0, 1, 4769, 'App\\Product', '2021-04-20 05:34:02', '2021-04-20 05:34:02', NULL),
(882, 'images/1618896823.jpeg', '1618896823.jpeg', '.jpeg', '0', 0, 0, 4769, 'App\\Product', '2021-04-20 05:34:02', '2021-04-20 05:34:02', NULL),
(883, 'images/1618896841.jpeg', '1618896841.jpeg', '.jpeg', '0', 0, 0, 4769, 'App\\Product', '2021-04-20 05:34:02', '2021-04-20 05:34:02', NULL),
(884, 'images/1618896794.jpeg', '1618896794.jpeg', '.jpeg', '0', 0, 1, 19903, 'App\\Inventory', '2021-04-20 05:34:02', '2021-04-20 05:34:02', NULL),
(885, 'images/1618896823.jpeg', '1618896823.jpeg', '.jpeg', '0', 0, 0, 19903, 'App\\Inventory', '2021-04-20 05:34:02', '2021-04-20 05:34:02', NULL),
(886, 'images/1618896841.jpeg', '1618896841.jpeg', '.jpeg', '0', 0, 0, 19903, 'App\\Inventory', '2021-04-20 05:34:02', '2021-04-20 05:34:02', NULL),
(887, 'images/3COvEoUeMLJ0eHEB49a2wzHvtZ30UQBqURN9F8nM.jpeg', 'promo.jpeg', 'jpeg', '105762', 0, 1, 3, 'App\\Banner', '2021-04-20 06:07:52', '2021-04-20 06:07:52', NULL),
(888, 'images/vb1KU349D5Wu7uP79YBEc34l00kdUU3A5iiDB2QP.jpeg', 'whatsap-story.jpeg', 'jpeg', '54055', 0, 1, 4, 'App\\Banner', '2021-04-20 06:08:49', '2021-04-20 06:08:49', NULL),
(889, 'images/1618901395.jpeg', '1618901395.jpeg', '.jpeg', '0', 0, 1, 4770, 'App\\Product', '2021-04-20 06:49:55', '2021-04-20 06:49:55', NULL),
(890, 'images/1618901395.jpeg', '1618901395.jpeg', '.jpeg', '0', 0, 1, 19904, 'App\\Inventory', '2021-04-20 06:49:55', '2021-04-20 06:49:55', NULL),
(891, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 1, 4771, 'App\\Product', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(892, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 0, 4771, 'App\\Product', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(893, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 0, 4771, 'App\\Product', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(894, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 0, 4771, 'App\\Product', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(895, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 1, 19905, 'App\\Inventory', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(896, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 0, 19905, 'App\\Inventory', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(897, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 0, 19905, 'App\\Inventory', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(898, 'images/1618902853.jpeg', '1618902853.jpeg', '.jpeg', '0', 0, 0, 19905, 'App\\Inventory', '2021-04-20 07:14:14', '2021-04-20 07:14:14', NULL),
(900, 'images/1618905579.jpeg', '1618905579.jpeg', '.jpeg', '0', 0, 1, 4772, 'App\\Product', '2021-04-20 07:59:39', '2021-04-20 07:59:39', NULL),
(901, 'images/1618905579.jpeg', '1618905579.jpeg', '.jpeg', '0', 0, 1, 19906, 'App\\Inventory', '2021-04-20 07:59:39', '2021-04-20 07:59:39', NULL),
(902, 'images/1618913316.jpeg', NULL, NULL, '0', 0, 0, 126, 'App\\Shop', '2021-04-20 10:07:40', '2021-04-20 10:08:36', NULL),
(903, 'images/1618920776.jpeg', '1618920776.jpeg', '.jpeg', '0', 0, 1, 4773, 'App\\Product', '2021-04-20 12:13:04', '2021-04-20 12:13:04', NULL),
(904, 'images/1618920782.jpeg', '1618920782.jpeg', '.jpeg', '0', 0, 0, 4773, 'App\\Product', '2021-04-20 12:13:04', '2021-04-20 12:13:04', NULL),
(905, 'images/1618920784.jpeg', '1618920784.jpeg', '.jpeg', '0', 0, 0, 4773, 'App\\Product', '2021-04-20 12:13:04', '2021-04-20 12:13:04', NULL),
(906, 'images/1618920776.jpeg', '1618920776.jpeg', '.jpeg', '0', 0, 1, 19907, 'App\\Inventory', '2021-04-20 12:13:04', '2021-04-20 12:13:04', NULL),
(907, 'images/1618920782.jpeg', '1618920782.jpeg', '.jpeg', '0', 0, 0, 19907, 'App\\Inventory', '2021-04-20 12:13:04', '2021-04-20 12:13:04', NULL),
(908, 'images/1618920784.jpeg', '1618920784.jpeg', '.jpeg', '0', 0, 0, 19907, 'App\\Inventory', '2021-04-20 12:13:04', '2021-04-20 12:13:04', NULL),
(909, 'images/1618978374.jpeg', '1618978374.jpeg', '.jpeg', '0', 0, 1, 4774, 'App\\Product', '2021-04-21 04:12:54', '2021-04-21 04:12:54', NULL),
(910, 'images/1618978374.jpeg', '1618978374.jpeg', '.jpeg', '0', 0, 1, 19908, 'App\\Inventory', '2021-04-21 04:12:54', '2021-04-21 04:12:54', NULL),
(911, 'images/1618979079.jpeg', '1618979079.jpeg', '.jpeg', '0', 0, 1, 4775, 'App\\Product', '2021-04-21 04:24:39', '2021-04-21 04:24:39', NULL),
(912, 'images/1618979079.jpeg', '1618979079.jpeg', '.jpeg', '0', 0, 1, 19909, 'App\\Inventory', '2021-04-21 04:24:39', '2021-04-21 04:24:39', NULL),
(913, 'images/1618988580.jpeg', '1618988580.jpeg', '.jpeg', '0', 0, 1, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(914, 'images/1618988583.jpeg', '1618988583.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(915, 'images/1618988586.jpeg', '1618988586.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(916, 'images/1618988592.jpeg', '1618988592.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(917, 'images/1618988596.jpeg', '1618988596.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(918, 'images/1618988615.jpeg', '1618988615.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(919, 'images/1618988616.jpeg', '1618988616.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(920, 'images/1618988618.jpeg', '1618988618.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(921, 'images/1618988619.jpeg', '1618988619.jpeg', '.jpeg', '0', 0, 0, 4776, 'App\\Product', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(922, 'images/1618988580.jpeg', '1618988580.jpeg', '.jpeg', '0', 0, 1, 19910, 'App\\Inventory', '2021-04-21 07:03:39', '2021-04-21 07:03:39', NULL),
(923, 'images/1618988583.jpeg', '1618988583.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(924, 'images/1618988586.jpeg', '1618988586.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(925, 'images/1618988592.jpeg', '1618988592.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(926, 'images/1618988596.jpeg', '1618988596.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(927, 'images/1618988615.jpeg', '1618988615.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(928, 'images/1618988616.jpeg', '1618988616.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(929, 'images/1618988618.jpeg', '1618988618.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(930, 'images/1618988619.jpeg', '1618988619.jpeg', '.jpeg', '0', 0, 0, 19910, 'App\\Inventory', '2021-04-21 07:03:40', '2021-04-21 07:03:40', NULL),
(931, 'images/1618992652.jpeg', '1618992652.jpeg', '.jpeg', '0', 0, 1, 4778, 'App\\Product', '2021-04-21 08:10:52', '2021-04-21 08:10:52', NULL);
INSERT INTO `images` (`id`, `path`, `name`, `extension`, `size`, `order`, `featured`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`, `bannerpath`) VALUES
(932, 'images/1618992652.jpeg', '1618992652.jpeg', '.jpeg', '0', 0, 1, 19913, 'App\\Inventory', '2021-04-21 08:10:52', '2021-04-21 08:10:52', NULL),
(933, 'images/JD1Lt25gNjDkb3AOJOc0LiJ3xH1GBCeGPMifhxVk.png', 'Screenshot 2021-04-19 at 12.42.52 PM.png', 'png', '321429', 0, 1, 3188, 'App\\Product', '2021-04-21 09:04:55', '2021-04-21 09:04:55', NULL),
(934, 'images/ksbR3s9MZ1pYHKj91WOFDkH23nf7s9Gq77vig8Cq.png', '11111.png', 'png', '53968', 0, 1, 130, 'App\\Shop', '2021-04-22 03:03:56', '2021-04-22 03:03:56', NULL),
(935, 'images/1619063636.jpeg', '1619063636.jpeg', '.jpeg', '0', 0, 1, 4779, 'App\\Product', '2021-04-22 03:53:58', '2021-04-22 03:53:58', NULL),
(936, 'images/1619063637.jpeg', '1619063637.jpeg', '.jpeg', '0', 0, 0, 4779, 'App\\Product', '2021-04-22 03:53:58', '2021-04-22 03:53:58', NULL),
(937, 'images/1619063637.jpeg', '1619063637.jpeg', '.jpeg', '0', 0, 0, 4779, 'App\\Product', '2021-04-22 03:53:58', '2021-04-22 03:53:58', NULL),
(938, 'images/1619063636.jpeg', '1619063636.jpeg', '.jpeg', '0', 0, 1, 19914, 'App\\Inventory', '2021-04-22 03:53:58', '2021-04-22 03:53:58', NULL),
(939, 'images/1619063637.jpeg', '1619063637.jpeg', '.jpeg', '0', 0, 0, 19914, 'App\\Inventory', '2021-04-22 03:53:58', '2021-04-22 03:53:58', NULL),
(940, 'images/1619063637.jpeg', '1619063637.jpeg', '.jpeg', '0', 0, 0, 19914, 'App\\Inventory', '2021-04-22 03:53:58', '2021-04-22 03:53:58', NULL),
(941, 'images/1619064566.jpeg', '1619064566.jpeg', '.jpeg', '0', 0, 1, 4781, 'App\\Product', '2021-04-22 04:09:27', '2021-04-22 04:09:27', NULL),
(942, 'images/1619064566.jpeg', '1619064566.jpeg', '.jpeg', '0', 0, 1, 19917, 'App\\Inventory', '2021-04-22 04:09:27', '2021-04-22 04:09:27', NULL),
(943, 'images/1619063636.jpeg', '1619063636.jpeg', '.jpeg', '0', 0, 1, 4779, 'App\\Product', '2021-04-22 04:11:07', '2021-04-22 04:11:07', NULL),
(944, 'images/1619064881.jpeg', NULL, NULL, '0', 0, 0, 131, 'App\\Shop', '2021-04-22 04:14:41', '2021-04-22 04:14:41', NULL),
(948, 'images/1619097117.jpeg', '1619097117.jpeg', '.jpeg', '0', 0, 1, 4782, 'App\\Product', '2021-04-22 13:11:58', '2021-04-22 13:11:58', NULL),
(949, 'images/1619097117.jpeg', '1619097117.jpeg', '.jpeg', '0', 0, 1, 19918, 'App\\Inventory', '2021-04-22 13:11:58', '2021-04-22 13:11:58', NULL),
(950, 'images/1619097542.jpeg', '1619097542.jpeg', '.jpeg', '0', 0, 1, 4783, 'App\\Product', '2021-04-22 13:19:02', '2021-04-22 13:19:02', NULL),
(951, 'images/1619097542.jpeg', '1619097542.jpeg', '.jpeg', '0', 0, 1, 19919, 'App\\Inventory', '2021-04-22 13:19:02', '2021-04-22 13:19:02', NULL),
(952, 'images/1619097733.jpeg', '1619097733.jpeg', '.jpeg', '0', 0, 1, 4784, 'App\\Product', '2021-04-22 13:22:14', '2021-04-22 13:22:14', NULL),
(953, 'images/1619097733.jpeg', '1619097733.jpeg', '.jpeg', '0', 0, 1, 19920, 'App\\Inventory', '2021-04-22 13:22:14', '2021-04-22 13:22:14', NULL),
(955, 'images/1619098006.jpeg', '1619098006.jpeg', '.jpeg', '0', 0, 1, 4785, 'App\\Product', '2021-04-22 13:26:46', '2021-04-22 13:26:46', NULL),
(956, 'images/1619098006.jpeg', '1619098006.jpeg', '.jpeg', '0', 0, 1, 19921, 'App\\Inventory', '2021-04-22 13:26:46', '2021-04-22 13:26:46', NULL),
(957, 'images/1619098270.jpeg', '1619098270.jpeg', '.jpeg', '0', 0, 1, 4786, 'App\\Product', '2021-04-22 13:31:10', '2021-04-22 13:31:10', NULL),
(958, 'images/1619098270.jpeg', '1619098270.jpeg', '.jpeg', '0', 0, 1, 19922, 'App\\Inventory', '2021-04-22 13:31:10', '2021-04-22 13:31:10', NULL),
(961, 'images/s5Vz0RY1n31PKupFDxhwgAmnHbBpTipXglaeIDvW.jpeg', 'cHNbg6Npwk.jpeg', 'jpeg', '36571', 0, 1, 9, 'App\\Banner', '2021-04-22 13:46:41', '2021-04-22 13:46:41', NULL),
(962, 'images/xlVM3gouqBGf70JtxrbYdSVUY1JpA49AXqFgjBgl.jpeg', 'xE5duxqIp1.jpeg', 'jpeg', '31038', 0, 1, 10, 'App\\Banner', '2021-04-22 13:59:01', '2021-04-22 13:59:01', NULL),
(963, 'images/1619158078.jpeg', '1619158078.jpeg', '.jpeg', '0', 0, 1, 4787, 'App\\Product', '2021-04-23 06:08:06', '2021-04-23 06:08:06', NULL),
(964, 'images/1619158086.jpeg', '1619158086.jpeg', '.jpeg', '0', 0, 0, 4787, 'App\\Product', '2021-04-23 06:08:06', '2021-04-23 06:08:06', NULL),
(965, 'images/1619158078.jpeg', '1619158078.jpeg', '.jpeg', '0', 0, 1, 19923, 'App\\Inventory', '2021-04-23 06:08:06', '2021-04-23 06:08:06', NULL),
(966, 'images/1619158086.jpeg', '1619158086.jpeg', '.jpeg', '0', 0, 0, 19923, 'App\\Inventory', '2021-04-23 06:08:06', '2021-04-23 06:08:06', NULL),
(967, 'images/1619158078.jpeg', '1619158078.jpeg', '.jpeg', '0', 0, 1, 4787, 'App\\Product', '2021-04-23 06:11:34', '2021-04-23 06:11:34', NULL),
(968, 'images/1619158935.jpeg', '1619158935.jpeg', '.jpeg', '0', 0, 1, 4788, 'App\\Product', '2021-04-23 06:22:16', '2021-04-23 06:22:16', NULL),
(969, 'images/1619158935.jpeg', '1619158935.jpeg', '.jpeg', '0', 0, 1, 19924, 'App\\Inventory', '2021-04-23 06:22:16', '2021-04-23 06:22:16', NULL),
(970, 'images/1619253167.jpeg', '1619253167.jpeg', '.jpeg', '0', 0, 1, 4790, 'App\\Product', '2021-04-24 08:32:47', '2021-04-24 08:32:47', NULL),
(971, 'images/1619253167.jpeg', '1619253167.jpeg', '.jpeg', '0', 0, 1, 19927, 'App\\Inventory', '2021-04-24 08:32:47', '2021-04-24 08:32:47', NULL),
(972, 'images/1619254238.jpeg', NULL, NULL, '0', 0, 0, 133, 'App\\Shop', '2021-04-24 08:50:38', '2021-04-24 08:50:38', NULL),
(973, 'images/1619255727.jpeg', '1619255727.jpeg', '.jpeg', '0', 0, 1, 4791, 'App\\Product', '2021-04-24 09:15:30', '2021-04-24 09:15:30', NULL),
(974, 'images/1619255729.jpeg', '1619255729.jpeg', '.jpeg', '0', 0, 0, 4791, 'App\\Product', '2021-04-24 09:15:30', '2021-04-24 09:15:30', NULL),
(975, 'images/1619255727.jpeg', '1619255727.jpeg', '.jpeg', '0', 0, 1, 19928, 'App\\Inventory', '2021-04-24 09:15:31', '2021-04-24 09:15:31', NULL),
(976, 'images/1619255729.jpeg', '1619255729.jpeg', '.jpeg', '0', 0, 0, 19928, 'App\\Inventory', '2021-04-24 09:15:31', '2021-04-24 09:15:31', NULL),
(977, 'images/1619256157.jpeg', NULL, NULL, '0', 0, 0, 136, 'App\\Shop', '2021-04-24 09:22:37', '2021-04-24 09:22:37', NULL),
(978, 'images/1619261271.jpeg', '1619261271.jpeg', '.jpeg', '0', 0, 1, 4792, 'App\\Product', '2021-04-24 10:47:52', '2021-04-24 10:47:52', NULL),
(979, 'images/1619261271.jpeg', '1619261271.jpeg', '.jpeg', '0', 0, 1, 19929, 'App\\Inventory', '2021-04-24 10:47:52', '2021-04-24 10:47:52', NULL),
(980, 'images/1619261784.jpeg', '1619261784.jpeg', '.jpeg', '0', 0, 1, 4793, 'App\\Product', '2021-04-24 10:56:25', '2021-04-24 10:56:25', NULL),
(981, 'images/1619261784.jpeg', '1619261784.jpeg', '.jpeg', '0', 0, 1, 19930, 'App\\Inventory', '2021-04-24 10:56:25', '2021-04-24 10:56:25', NULL),
(982, 'images/1619261784.jpeg', '1619261784.jpeg', '.jpeg', '0', 0, 1, 19930, 'App\\Inventory', '2021-04-24 12:05:34', '2021-04-24 12:05:34', NULL),
(983, 'images/1619524598.jpeg', '1619524598.jpeg', '.jpeg', '0', 0, 1, 4794, 'App\\Product', '2021-04-27 11:56:39', '2021-04-27 11:56:39', NULL),
(984, 'images/1619524598.jpeg', '1619524598.jpeg', '.jpeg', '0', 0, 1, 19931, 'App\\Inventory', '2021-04-27 11:56:39', '2021-04-27 11:56:39', NULL),
(985, 'images/1619527612.jpeg', '1619527612.jpeg', '.jpeg', '0', 0, 1, 4795, 'App\\Product', '2021-04-27 12:46:53', '2021-04-27 12:46:53', NULL),
(986, 'images/1619527612.jpeg', '1619527612.jpeg', '.jpeg', '0', 0, 1, 19932, 'App\\Inventory', '2021-04-27 12:46:53', '2021-04-27 12:46:53', NULL),
(987, 'images/1619529905.jpeg', '1619529905.jpeg', '.jpeg', '0', 0, 1, 4796, 'App\\Product', '2021-04-27 13:25:05', '2021-04-27 13:25:05', NULL),
(988, 'images/1619529905.jpeg', '1619529905.jpeg', '.jpeg', '0', 0, 1, 19933, 'App\\Inventory', '2021-04-27 13:25:05', '2021-04-27 13:25:05', NULL),
(989, 'images/1619675401.jpeg', '1619675401.jpeg', '.jpeg', '0', 0, 1, 4797, 'App\\Product', '2021-04-29 05:50:02', '2021-04-29 05:50:02', NULL),
(990, 'images/1619675401.jpeg', '1619675401.jpeg', '.jpeg', '0', 0, 0, 4797, 'App\\Product', '2021-04-29 05:50:02', '2021-04-29 05:50:02', NULL),
(991, 'images/1619675402.jpeg', '1619675402.jpeg', '.jpeg', '0', 0, 0, 4797, 'App\\Product', '2021-04-29 05:50:02', '2021-04-29 05:50:02', NULL),
(992, 'images/1619675401.jpeg', '1619675401.jpeg', '.jpeg', '0', 0, 1, 19934, 'App\\Inventory', '2021-04-29 05:50:02', '2021-04-29 05:50:02', NULL),
(993, 'images/1619675401.jpeg', '1619675401.jpeg', '.jpeg', '0', 0, 0, 19934, 'App\\Inventory', '2021-04-29 05:50:02', '2021-04-29 05:50:02', NULL),
(994, 'images/1619675402.jpeg', '1619675402.jpeg', '.jpeg', '0', 0, 0, 19934, 'App\\Inventory', '2021-04-29 05:50:02', '2021-04-29 05:50:02', NULL),
(995, 'images/1619675588.jpeg', '1619675588.jpeg', '.jpeg', '0', 0, 1, 4799, 'App\\Product', '2021-04-29 05:53:09', '2021-04-29 05:53:09', NULL),
(996, 'images/1619675588.jpeg', '1619675588.jpeg', '.jpeg', '0', 0, 1, 19937, 'App\\Inventory', '2021-04-29 05:53:09', '2021-04-29 05:53:09', NULL),
(997, 'images/1619675855.jpeg', NULL, NULL, '0', 0, 0, 142, 'App\\Shop', '2021-04-29 05:57:35', '2021-04-29 05:57:35', NULL),
(998, 'images/1619676402.jpeg', '1619676402.jpeg', '.jpeg', '0', 0, 1, 4800, 'App\\Product', '2021-04-29 06:06:42', '2021-04-29 06:06:42', NULL),
(999, 'images/1619676402.jpeg', '1619676402.jpeg', '.jpeg', '0', 0, 1, 19938, 'App\\Inventory', '2021-04-29 06:06:42', '2021-04-29 06:06:42', NULL),
(1000, 'images/1619676402.jpeg', '1619676402.jpeg', '.jpeg', '0', 0, 1, 19939, 'App\\Inventory', '2021-04-29 07:00:19', '2021-04-29 07:00:19', NULL),
(1001, 'images/1619676402.jpeg', '1619676402.jpeg', '.jpeg', '0', 0, 1, 19938, 'App\\Inventory', '2021-04-29 11:00:12', '2021-04-29 11:00:12', NULL),
(1002, 'images/1619676402.jpeg', '1619676402.jpeg', '.jpeg', '0', 0, 1, 19938, 'App\\Inventory', '2021-04-29 11:07:58', '2021-04-29 11:07:58', NULL),
(1003, 'images/1620015355.jpeg', '1620015355.jpeg', '.jpeg', '0', 0, 1, 4801, 'App\\Product', '2021-05-03 04:15:55', '2021-05-03 04:15:55', NULL),
(1004, 'images/1620015355.jpeg', '1620015355.jpeg', '.jpeg', '0', 0, 1, 19940, 'App\\Inventory', '2021-05-03 04:15:56', '2021-05-03 04:15:56', NULL),
(1005, 'images/1620025702.jpeg', '1620025702.jpeg', '.jpeg', '0', 0, 1, 4802, 'App\\Product', '2021-05-03 07:08:25', '2021-05-03 07:08:25', NULL),
(1006, 'images/1620025702.jpeg', '1620025702.jpeg', '.jpeg', '0', 0, 1, 19941, 'App\\Inventory', '2021-05-03 07:08:25', '2021-05-03 07:08:25', NULL),
(1007, 'images/1620043775.jpeg', '1620043775.jpeg', '.jpeg', '0', 0, 1, 4803, 'App\\Product', '2021-05-03 12:09:37', '2021-05-03 12:09:37', NULL),
(1008, 'images/1620043775.jpeg', '1620043775.jpeg', '.jpeg', '0', 0, 1, 19942, 'App\\Inventory', '2021-05-03 12:09:37', '2021-05-03 12:09:37', NULL),
(1009, 'images/1620187830.jpeg', NULL, NULL, '0', 0, 0, 156, 'App\\Shop', '2021-05-05 04:10:30', '2021-05-05 04:10:30', NULL),
(1010, 'images/1620189457.jpeg', '1620189457.jpeg', '.jpeg', '0', 0, 1, 4804, 'App\\Product', '2021-05-05 04:37:38', '2021-05-05 04:37:38', NULL),
(1011, 'images/1620189457.jpeg', '1620189457.jpeg', '.jpeg', '0', 0, 1, 19943, 'App\\Inventory', '2021-05-05 04:37:38', '2021-05-05 04:37:38', NULL),
(1012, 'images/banner/1620199584.jpeg', NULL, NULL, '0', 0, NULL, 15, 'App\\Banner', '2021-05-05 07:26:24', '2021-05-05 07:26:24', NULL),
(1013, 'images/banner/1620199871.jpeg', NULL, NULL, '0', 0, NULL, 16, 'App\\Banner', '2021-05-05 07:31:11', '2021-05-05 07:31:11', NULL),
(1014, 'images/banner/1620200089.jpeg', NULL, NULL, '0', 0, NULL, 17, 'App\\Banner', '2021-05-05 07:34:49', '2021-05-05 07:34:49', NULL),
(1015, 'images/banner/1620200296.jpeg', NULL, NULL, '0', 0, NULL, 18, 'App\\Banner', '2021-05-05 07:38:16', '2021-05-05 07:38:16', NULL),
(1016, 'images/banner/1620201604.jpeg', NULL, NULL, '0', 0, NULL, 19, 'App\\Banner', '2021-05-05 08:00:04', '2021-05-05 08:00:04', NULL),
(1017, 'images/banner/1620202265.jpeg', NULL, NULL, '0', 0, NULL, 20, 'App\\Banner', '2021-05-05 08:11:05', '2021-05-05 08:11:05', NULL),
(1018, 'images/banner/1620202462.jpeg', NULL, NULL, '0', 0, NULL, 21, 'App\\Banner', '2021-05-05 08:14:22', '2021-05-05 08:14:22', NULL),
(1019, 'images/banner/1620204100.jpeg', NULL, NULL, '0', 0, NULL, 22, 'App\\Banner', '2021-05-05 08:36:53', '2021-05-05 08:41:40', NULL),
(1020, 'images/banner/1620203883.jpeg', NULL, NULL, '0', 0, NULL, 23, 'App\\Banner', '2021-05-05 08:38:03', '2021-05-05 08:38:03', NULL),
(1021, 'images/banner/1620203929.jpeg', NULL, NULL, '0', 0, NULL, 24, 'App\\Banner', '2021-05-05 08:38:49', '2021-05-05 08:38:49', NULL),
(1022, 'images/1620221185.jpeg', '1620221185.jpeg', '.jpeg', '0', 0, 1, 4805, 'App\\Product', '2021-05-05 13:26:26', '2021-05-05 13:26:26', NULL),
(1023, 'images/1620221185.jpeg', '1620221185.jpeg', '.jpeg', '0', 0, 1, 19944, 'App\\Inventory', '2021-05-05 13:26:26', '2021-05-05 13:26:26', NULL),
(1024, 'images/1620634807.jpeg', NULL, NULL, '0', 0, 0, 162, 'App\\Shop', '2021-05-10 08:20:07', '2021-05-10 13:52:50', 'images/1620654770.jpeg'),
(1025, 'images/1620659294.jpeg', '1620659294.jpeg', '.jpeg', '0', 0, 1, 4806, 'App\\Product', '2021-05-10 15:08:14', '2021-05-10 15:08:14', NULL),
(1026, 'images/1620659294.jpeg', '1620659294.jpeg', '.jpeg', '0', 0, 1, 19945, 'App\\Inventory', '2021-05-10 15:08:14', '2021-05-10 15:08:14', NULL),
(1027, 'images/1620723683.jpeg', NULL, NULL, '0', 0, 0, 163, 'App\\Shop', '2021-05-11 09:01:23', '2021-05-11 13:21:22', 'images/1620739282.jpeg'),
(1028, 'images/1620724980.jpeg', '1620724980.jpeg', '.jpeg', '0', 0, 1, 4807, 'App\\Product', '2021-05-11 09:23:01', '2021-05-11 09:23:01', NULL),
(1029, 'images/1620724981.jpeg', '1620724981.jpeg', '.jpeg', '0', 0, 0, 4807, 'App\\Product', '2021-05-11 09:23:01', '2021-05-11 09:23:01', NULL),
(1030, 'images/1620724980.jpeg', '1620724980.jpeg', '.jpeg', '0', 0, 1, 19946, 'App\\Inventory', '2021-05-11 09:23:01', '2021-05-11 09:23:01', NULL),
(1031, 'images/1620724981.jpeg', '1620724981.jpeg', '.jpeg', '0', 0, 0, 19946, 'App\\Inventory', '2021-05-11 09:23:01', '2021-05-11 09:23:01', NULL),
(1032, 'images/1620725670.jpeg', '1620725670.jpeg', '.jpeg', '0', 0, 1, 4809, 'App\\Product', '2021-05-11 09:34:30', '2021-05-11 09:34:30', NULL),
(1033, 'images/1620725670.jpeg', '1620725670.jpeg', '.jpeg', '0', 0, 1, 19949, 'App\\Inventory', '2021-05-11 09:34:30', '2021-05-11 09:34:30', NULL),
(1034, 'images/1620725670.jpeg', '1620725670.jpeg', '.jpeg', '0', 0, 1, 4809, 'App\\Product', '2021-05-11 09:40:28', '2021-05-11 09:40:28', NULL),
(1035, 'images/1620737026.jpeg', '1620737026.jpeg', '.jpeg', '0', 0, 1, 4810, 'App\\Product', '2021-05-11 12:43:46', '2021-05-11 12:43:46', NULL),
(1036, 'images/1620737026.jpeg', '1620737026.jpeg', '.jpeg', '0', 0, 1, 19950, 'App\\Inventory', '2021-05-11 12:43:46', '2021-05-11 12:43:46', NULL),
(1037, 'images/1620738659.jpeg', NULL, NULL, '0', 0, 0, 27, 'App\\Shop', '2021-05-11 13:10:59', '2021-05-11 13:12:00', 'images/1620738720.jpeg'),
(1047, 'images/Tembk6oVx3PbBUMfttZvMjPP1FbEzOdq7CgXtakL.png', 'OMNI_Conversational.png', 'png', '110535', 0, 1, 24, 'App\\Banner', '2021-05-14 06:27:28', '2021-05-14 06:27:28', NULL),
(1048, 'images/N98X1Eobkc6ELeyv5v5xChTZHf91fTngQwyMx7B1.jpeg', 'Google-Assistant-AI1.jpg', 'jpg', '38586', 0, 1, 44, 'App\\Banner', '2021-05-14 06:29:03', '2021-05-14 06:29:03', NULL),
(1049, 'images/C1epXD1a3yttdbTeBMZVglByvzQ3uOQI6FP3Rs9J.jpeg', 'Google-Assistant-AI1.jpg', 'jpg', '38586', 0, 1, 45, 'App\\Banner', '2021-05-14 07:08:34', '2021-05-14 07:08:34', NULL),
(1061, 'images/1621229565.jpeg', NULL, NULL, '0', 0, 0, 166, 'App\\Shop', '2021-05-17 05:32:45', '2021-05-17 05:44:10', 'images/1621230250.jpeg'),
(1062, 'images/1621230558.jpeg', '1621230558.jpeg', '.jpeg', '0', 0, 1, 4811, 'App\\Product', '2021-05-17 05:49:19', '2021-05-17 05:49:19', NULL),
(1063, 'images/1621230559.jpeg', '1621230559.jpeg', '.jpeg', '0', 0, 0, 4811, 'App\\Product', '2021-05-17 05:49:19', '2021-05-17 05:49:19', NULL),
(1064, 'images/1621230558.jpeg', '1621230558.jpeg', '.jpeg', '0', 0, 1, 19951, 'App\\Inventory', '2021-05-17 05:49:19', '2021-05-17 05:49:19', NULL),
(1065, 'images/1621230559.jpeg', '1621230559.jpeg', '.jpeg', '0', 0, 0, 19951, 'App\\Inventory', '2021-05-17 05:49:19', '2021-05-17 05:49:19', NULL),
(1066, 'images/1621230558.jpeg', '1621230558.jpeg', '.jpeg', '0', 0, 1, 4811, 'App\\Product', '2021-05-17 06:34:49', '2021-05-17 06:34:49', NULL),
(1111, 'images/RVIeQzFO7LrVgUB8gpc5ZWRK7weDjSrQcr2aYoo5.jpeg', '7.jpg', 'jpg', '3944448', 0, 1, 76, 'App\\Slider', '2021-05-18 06:26:53', '2021-05-18 06:26:53', NULL),
(1112, 'images/Zsu7cap9fDPK3kNbd4ePuXfUTj5sWCoYyzUqL3hv.jpeg', 'IMG_1815.jpg', 'jpg', '4548011', 0, 1, 77, 'App\\Slider', '2021-05-18 06:30:19', '2021-05-18 06:30:19', NULL),
(1115, 'images/alMV7ChtQQsSiak2Yiy0gECjjqaH3u0ohoedjngW.jpeg', 'IMG_1372.jpg', 'jpg', '3143898', 0, 0, 127, 'App\\Shop', '2021-05-18 10:52:32', '2021-05-18 10:52:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike`
--

CREATE TABLE `like_dislike` (
  `id` int(11) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `webinar_id` int(50) DEFAULT NULL,
  `inventory_id` int(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_dislike`
--

INSERT INTO `like_dislike` (`id`, `user_id`, `webinar_id`, `inventory_id`, `type`, `created_at`, `updated_at`) VALUES
(5, 2, 6, 1, 'dislike', '2021-06-21 04:55:51', '2021-06-21 11:04:48'),
(6, 1, 6, 1, 'like', '2021-06-02 10:26:45', '2021-06-21 10:49:18'),
(7, 1, 1, 2, 'like', NULL, NULL);

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
(4, '2021_06_13_183626_create_customers_table', 1),
(5, '2021_06_14_145234_create_connection_request_table', 2),
(6, '2021_06_15_065333_create_otps_table', 3),
(7, '2021_06_15_121516_create_channels_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` int(50) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketplace_id` int(11) DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ship_to` int(10) UNSIGNED DEFAULT NULL,
  `shipping_zone_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_rate_id` int(10) UNSIGNED DEFAULT NULL,
  `packaging_id` int(10) UNSIGNED DEFAULT NULL,
  `item_count` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `taxrate` decimal(20,6) DEFAULT NULL,
  `shipping_weight` decimal(20,6) DEFAULT NULL,
  `total` decimal(20,6) DEFAULT NULL,
  `discount` decimal(20,6) DEFAULT NULL,
  `shipping` decimal(20,6) DEFAULT NULL,
  `packaging` decimal(20,6) DEFAULT NULL,
  `handling` decimal(20,6) DEFAULT NULL,
  `taxes` decimal(20,6) DEFAULT NULL,
  `grand_total` decimal(20,6) DEFAULT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `carrier_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 1,
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `order_status_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `message_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_invoice_to_customer` tinyint(1) DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goods_received` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `invoice_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disputed` tinyint(1) DEFAULT NULL,
  `feedback_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `item_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(20,6) NOT NULL,
  `paid_amount` decimal(20,6) DEFAULT NULL,
  `feedback_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fulfilled` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otp` bigint(20) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `otp`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 1800, '7355955531', 1, NULL, NULL),
(2, 6219, '7355955531', 1, NULL, NULL),
(3, 7613, '7355955531', 1, NULL, NULL),
(4, 7736, '7860603024', 1, NULL, NULL),
(5, 3666, '7860603024', 1, NULL, NULL),
(6, 2356, '7860603024', 1, NULL, NULL),
(7, 3349, '7860603024', 1, NULL, NULL),
(8, 9918, '7860603024', 1, NULL, NULL),
(9, 3981, '7860603024', 1, NULL, NULL),
(10, 4293, '7860603024', 1, NULL, NULL),
(11, 2944, '7485515', 1, NULL, NULL);

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
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_id` int(11) DEFAULT NULL,
  `current_billing_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `store_visit_count` int(11) NOT NULL DEFAULT 0,
  `shop_qr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `owner_id`, `name`, `legal_name`, `slug`, `lat`, `lng`, `email`, `description`, `external_url`, `timezone_id`, `current_billing_plan`, `stripe_id`, `card_holder_name`, `card_brand`, `card_last_four`, `trial_ends_at`, `store_visit_count`, `shop_qr`, `gstin`, `pan`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 3, 'test', NULL, 'test', '26.8448572', '80.9744585', 'test@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `master_category_id` text DEFAULT NULL,
  `category_group_id` text DEFAULT NULL,
  `category_sub_group_id` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `shop_id`, `master_category_id`, `category_group_id`, `category_sub_group_id`, `created_at`, `updated_at`) VALUES
(1, 0, '1', '[\"1\"]', '[\"1\",\"2\"]', '2021-02-16 07:19:59', '2021-02-16 07:19:59'),
(2, 2, '[1]', '[1]', '[1, 2, 3, 4]', '2021-02-16 07:57:12', '2021-02-16 07:57:12'),
(3, 15, '[\"1\"]', '[\"1\"]', '[\"1\"]', '2021-02-16 08:27:27', '2021-02-16 08:27:27'),
(4, 16, '[1]', '[1, 2]', '[1, 2, 3]', '2021-02-17 12:59:12', '2021-02-17 12:59:12'),
(5, 8, '[\"1\"]', '[\"1\"]', '[\"2\",\"3\"]', '2021-02-19 16:01:19', '2021-02-19 16:01:19'),
(18, 26, '[\"1\"]', '[\"1\"]', '[\"1\",\"2\"]', '2021-02-22 08:25:02', '2021-02-22 08:25:02'),
(19, 27, '[2]', '[12]', '[23]', '2021-02-22 09:54:13', '2021-02-22 09:54:13'),
(22, 25, '[\"1\"]', '[\"1\"]', '[\"1\",\"2\",\"3\"]', '2021-02-22 09:58:57', '2021-02-22 10:10:40'),
(26, 30, '[4]', '[8, 10, 11]', '[50, 49, 51, 52, 71, 72]', '2021-02-23 13:11:59', '2021-02-23 13:11:59'),
(27, 32, '[1]', '[1]', '[1, 2, 3, 4]', '2021-02-24 05:16:54', '2021-02-24 05:16:54'),
(28, 33, '[\"1\"]', '[\"1\"]', '[\"1\",\"2\"]', '2021-02-24 12:35:15', '2021-02-24 12:35:15'),
(29, 36, '[\"1\"]', '[\"1\"]', '[\"1\",\"4\"]', '2021-02-24 13:05:20', '2021-02-24 13:05:20'),
(30, 37, '[\"1\"]', '[\"1\"]', '[\"1\",\"2\"]', '2021-02-24 13:10:52', '2021-02-24 13:10:52'),
(31, 38, '[\"1\"]', '[\"1\"]', '[\"1\",\"2\",\"3\",\"4\"]', '2021-02-24 13:51:09', '2021-02-24 13:51:09'),
(32, 3, '[\"1\"]', '[\"1\",\"3\"]', '[\"1\",\"2\"]', '2021-02-25 12:37:24', '2021-02-25 12:37:24'),
(33, 41, '[1]', '[1, 2]', '[1, 2]', '2021-03-01 17:02:03', '2021-03-01 17:02:03'),
(34, 39, '[2]', '[12, 13]', '[22, 23, 24]', '2021-03-02 05:27:55', '2021-03-02 05:27:55'),
(35, 45, '[6]', '[7]', '[41, 42]', '2021-03-02 10:33:42', '2021-03-02 10:33:42'),
(36, 46, '[\"1\"]', '[\"3\",\"15\"]', '[\"37\",\"39\"]', '2021-03-03 12:07:59', '2021-03-03 12:07:59'),
(37, 47, '[\"4\"]', '[\"8\"]', '[\"49\"]', '2021-03-04 05:08:54', '2021-03-04 05:08:54'),
(40, 35, '[\"1\"]', '[\"1\"]', '[\"1\",\"2\"]', '2021-03-04 14:09:38', '2021-03-04 14:09:38'),
(41, 29, '[4]', '[8, 10]', '[49, 50, 51]', '2021-03-05 05:33:35', '2021-03-05 05:33:35'),
(42, 48, '[\"1\"]', '[\"1\"]', '[\"1\"]', '2021-03-05 08:05:21', '2021-03-05 08:05:21'),
(43, 50, '[\"4\"]', '[\"8\"]', '[\"50\"]', '2021-03-05 20:15:20', '2021-03-05 20:15:20'),
(44, 51, '[1]', '[1, 2]', '[1, 2, 3]', '2021-03-06 07:39:09', '2021-03-06 07:39:09'),
(45, 54, '[\"7\"]', '[\"17\"]', '[\"84\"]', '2021-03-08 05:00:09', '2021-03-08 05:00:09'),
(46, 55, '[1]', '[1, 3, 9]', '[1, 2, 3, 4, 36, 37]', '2021-03-09 07:03:37', '2021-03-09 07:03:37'),
(47, 61, '[1]', '[2, 1, 3]', '[1, 2, 3]', '2021-03-19 06:21:00', '2021-03-19 06:21:00'),
(48, 62, '[3]', '[14]', '[27, 28, 29, 30, 31]', '2021-03-19 12:21:07', '2021-03-19 12:21:07'),
(49, 64, '[1]', '[1, 3, 4, 2]', '[1, 2, 3, 4]', '2021-03-19 12:55:17', '2021-03-19 12:55:17'),
(50, 65, '[1]', '[2, 4]', '[5, 87]', '2021-03-19 13:12:23', '2021-03-19 13:12:23'),
(51, 66, '[2]', '[12, 13]', '[22, 24]', '2021-03-21 05:10:23', '2021-03-21 05:10:23'),
(52, 67, '[7]', '[17]', '[79, 80, 81, 82]', '2021-03-22 08:23:31', '2021-03-22 08:23:31'),
(53, 68, '[6]', '[7]', '[41, 42]', '2021-03-23 09:23:30', '2021-03-23 09:23:30'),
(54, 69, '[7]', '[17]', '[79]', '2021-03-23 09:27:55', '2021-03-23 09:27:55'),
(55, 70, '[7]', '[17]', '[79, 80, 81]', '2021-03-23 09:50:33', '2021-03-23 09:50:33'),
(56, 71, '[2]', '[12, 13]', '[22, 26]', '2021-03-24 04:40:14', '2021-03-24 04:40:14'),
(57, 72, '[7]', '[17]', '[79]', '2021-03-24 04:42:45', '2021-03-24 04:42:45'),
(58, 73, '[7]', '[17]', '[79]', '2021-03-24 05:30:20', '2021-03-24 05:30:20'),
(59, 74, '[7]', '[17]', '[79]', '2021-03-24 05:33:12', '2021-03-24 05:33:12'),
(60, 75, '[7]', '[17]', '[79, 80]', '2021-03-24 05:46:40', '2021-03-24 05:46:40'),
(61, 76, '[7]', '[17]', '[79, 80]', '2021-03-24 07:57:52', '2021-03-24 07:57:52'),
(62, 77, '[7]', '[17]', '[79, 80]', '2021-03-24 11:30:54', '2021-03-24 11:30:54'),
(63, 78, '[7]', '[17]', '[79, 80]', '2021-03-24 11:40:29', '2021-03-24 11:40:29'),
(64, 79, '[7]', '[17]', '[81, 79, 80]', '2021-03-24 11:43:55', '2021-03-24 11:43:55'),
(65, 80, '[1]', '[1]', '[1]', '2021-03-24 13:26:22', '2021-03-24 13:26:22'),
(66, 81, '[1]', '[1]', '[1]', '2021-03-24 13:29:01', '2021-03-24 13:29:01'),
(67, 82, '[1]', '[1]', '[1]', '2021-03-24 13:32:15', '2021-03-24 13:32:15'),
(68, 83, '[1]', '[1]', '[1]', '2021-03-24 13:33:25', '2021-03-24 13:33:25'),
(69, 85, '[1]', '[1]', '[1]', '2021-03-25 07:58:02', '2021-03-25 07:58:02'),
(70, 86, '[1]', '[1]', '[1]', '2021-03-25 07:59:07', '2021-03-25 07:59:07'),
(71, 87, '[1]', '[1]', '[1]', '2021-03-25 07:59:46', '2021-03-25 07:59:46'),
(72, 89, '[1]', '[1]', '[1]', '2021-03-25 08:34:38', '2021-03-25 08:34:38'),
(73, 90, '[1]', '[1]', '[1]', '2021-03-25 08:48:39', '2021-03-25 08:48:39'),
(74, 91, '[1]', '[1]', '[1]', '2021-03-25 08:52:35', '2021-03-25 08:52:35'),
(75, 93, '[7]', '[17]', '[80, 79]', '2021-03-26 04:46:30', '2021-03-26 04:46:30'),
(76, 94, '[6]', '[7]', '[41, 42]', '2021-03-26 07:31:41', '2021-03-26 07:31:41'),
(77, 95, '[1]', '[1, 3]', '[1, 3, 2]', '2021-03-26 08:43:45', '2021-03-26 08:43:45'),
(78, 96, '[2]', '[12]', '[22, 23]', '2021-03-26 09:55:40', '2021-03-26 09:55:40'),
(79, 97, '[6]', '[7]', '[41, 42]', '2021-03-26 10:02:59', '2021-03-26 10:02:59'),
(80, 98, '[6]', '[7]', '[41, 42]', '2021-03-26 12:02:31', '2021-03-26 12:02:31'),
(81, 100, '[6]', '[7]', '[42]', '2021-03-26 13:17:43', '2021-03-26 13:17:43'),
(82, 99, '[1]', '[1]', '[1]', '2021-04-01 06:52:33', '2021-04-01 06:52:33'),
(83, 102, '[4]', '[8, 10, 11]', '[49, 50, 51]', '2021-04-01 10:00:16', '2021-04-01 10:00:16'),
(84, 103, '[7]', '[17]', '[79, 84, 81]', '2021-04-01 11:39:42', '2021-04-01 11:39:42'),
(85, 105, '[2]', '[12, 13]', '[22, 23, 25, 24]', '2021-04-02 13:52:19', '2021-04-02 13:52:19'),
(86, 109, '[1]', '[6, 5]', '[44, 43]', '2021-04-05 12:14:24', '2021-04-05 12:14:24'),
(87, 110, '[6]', '[7]', '[41]', '2021-04-06 05:11:00', '2021-04-06 05:11:00'),
(88, 111, '[5]', '[16]', '[63]', '2021-04-06 05:58:40', '2021-04-06 05:58:40'),
(89, 112, '[4]', '[10]', '[74, 71, 72, 73, 76, 75]', '2021-04-06 10:47:15', '2021-04-06 10:47:15'),
(90, 113, '[6]', '[7]', '[42]', '2021-04-06 17:34:31', '2021-04-06 17:34:31'),
(91, 114, '[6]', '[7]', '[42, 41]', '2021-04-07 04:59:50', '2021-04-07 04:59:50'),
(92, 116, '[2]', '[12, 13]', '[22, 23, 24, 25]', '2021-04-07 05:38:18', '2021-04-07 05:38:18'),
(93, 117, '[6]', '[7]', '[42, 41]', '2021-04-07 09:43:37', '2021-04-07 09:43:37'),
(94, 118, '[6]', '[7]', '[42, 41]', '2021-04-08 04:27:24', '2021-04-08 04:27:24'),
(95, 119, '[2]', '[13]', '[25, 24, 26]', '2021-04-09 11:17:26', '2021-04-09 11:17:26'),
(96, 121, '[2]', '[13, 12]', '[23, 22, 25, 24, 26]', '2021-04-12 10:20:35', '2021-04-12 10:20:35'),
(97, 122, '[6]', '[7]', '[41, 42]', '2021-04-13 05:58:36', '2021-04-13 05:58:36'),
(98, 123, '[6]', '[7]', '[41, 42]', '2021-04-13 06:27:23', '2021-04-13 06:27:23'),
(99, 125, '[2]', '[12, 13]', '[22, 23, 24, 25, 26]', '2021-04-19 06:33:01', '2021-04-19 06:33:01'),
(100, 126, '[6]', '[7]', '[41, 42]', '2021-04-20 05:20:54', '2021-04-20 05:20:54'),
(101, 127, '[6]', '[7]', '[42]', '2021-04-20 06:47:45', '2021-04-20 06:47:45'),
(102, 128, '[1]', '[1]', '[1, 2, 3, 4]', '2021-04-20 12:12:04', '2021-04-20 12:12:04'),
(103, 129, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4]', '2021-04-21 07:01:49', '2021-04-21 07:01:49'),
(104, 130, '[\"1\"]', '[\"1\",\"2\"]', '[\"1\",\"2\"]', '2021-04-22 03:03:56', '2021-04-22 03:03:56'),
(105, 131, '[2]', '[12, 13]', '[22, 23, 24, 25, 26]', '2021-04-22 03:53:00', '2021-04-22 03:53:00'),
(106, 133, '[1]', '[1, 2, 5, 6]', '[1, 2, 3, 4, 5, 86]', '2021-04-23 06:07:11', '2021-04-23 06:07:11'),
(107, 136, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4]', '2021-04-24 09:14:41', '2021-04-24 09:14:41'),
(108, 139, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4]', '2021-04-27 11:56:03', '2021-04-27 11:56:03'),
(109, 140, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4, 5, 86]', '2021-04-27 13:24:35', '2021-04-27 13:24:35'),
(110, 141, '[2]', '[12, 13]', '[22, 23, 24, 25]', '2021-04-29 05:48:44', '2021-04-29 05:48:44'),
(111, 144, '[1]', '[1]', '[1]', '2021-05-03 04:13:06', '2021-05-03 04:13:06'),
(112, 147, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 5, 86, 4]', '2021-05-03 07:07:38', '2021-05-03 07:07:38'),
(113, 153, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4]', '2021-05-03 12:08:44', '2021-05-03 12:08:44'),
(114, 156, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4]', '2021-05-05 04:12:28', '2021-05-05 04:12:28'),
(115, 157, '[2]', '[12, 13]', '[22, 23, 24, 25]', '2021-05-05 13:04:18', '2021-05-05 13:04:18'),
(116, 162, '[1]', '[1, 2, 3, 4, 5, 6]', '[1, 2, 3, 4]', '2021-05-10 08:11:36', '2021-05-10 08:11:36'),
(117, 163, '[1]', '[1, 2, 3, 4]', '[1, 2, 3, 4, 5]', '2021-05-11 09:00:41', '2021-05-11 09:00:41'),
(118, 164, '[6]', '[7]', '[42]', '2021-05-14 09:32:34', '2021-05-14 09:32:34'),
(119, 166, '[1]', '[2, 1, 3, 4]', '[1, 2, 3, 4, 40, 86, 5]', '2021-05-17 05:42:27', '2021-05-17 05:42:27'),
(120, 167, '[\"4\"]', '[\"8\"]', '[\"49\"]', '2021-05-18 10:37:17', '2021-05-18 10:37:17'),
(121, 168, '[\"4\"]', '[\"8\"]', '[\"49\"]', '2021-05-18 10:42:24', '2021-05-18 10:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#333333',
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#b5b5b5',
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `title_color`, `sub_title`, `sub_title_color`, `link`, `store_type`, `order`, `created_at`, `updated_at`) VALUES
(3, 'Are you planning to start your business?  You are on the right platform!', '#ffffff', 'By clicking submit button you can start your own business', '#ffffff', NULL, '', 100, '2021-02-10 09:36:04', '2021-02-22 10:29:54'),
(76, 'Jeans', '#333333', NULL, '#b5b5b5', NULL, 'Sports', 100, '2021-05-18 06:26:53', '2021-05-18 06:26:53'),
(77, 'kurta', '#333333', NULL, '#b5b5b5', NULL, 'Fashion', 100, '2021-05-18 06:30:19', '2021-05-18 06:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `phone`, `image`, `referral_code`, `auth_code`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Mayank', 'mayank@pacdevelopers.com', '7355955531', NULL, NULL, '', '', NULL, NULL),
(2, 'Rajni', 'rajni15@gmaio.com', '7860603024', NULL, NULL, 'k2vCMu6mOxbnlKfq6Swz', NULL, NULL, NULL),
(3, 'test', 'test@gmail.com', '7485515', NULL, NULL, 'zOiKmbSiz6YuaJT7IpJv', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `channel_id` int(50) NOT NULL,
  `inventories_id` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `room_id` text DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `webinar_date` date NOT NULL,
  `webinar_from` time DEFAULT NULL,
  `webinar_to` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`id`, `user_id`, `channel_id`, `inventories_id`, `status`, `room_id`, `topic`, `description`, `webinar_date`, `webinar_from`, `webinar_to`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '213', 12, '123', '213', '132e', '0000-00-00', NULL, NULL, '2021-06-18 08:50:12', '2021-06-21 04:58:58'),
(3, 2, 1, '[1,2,3,4]', 1, '1624019816', 'hello', 'sa12', '2021-06-18', '10:24:00', '16:20:00', '2021-06-18 07:06:56', '2021-06-21 04:59:01'),
(4, 2, 1, '[1,2,3,4]', 1, '1624020758', 'hello world', 'sa12', '2021-06-18', '10:24:00', '16:20:00', '2021-06-18 07:22:38', '2021-06-21 04:59:04'),
(6, 2, 1, '[1,2,3,4]', 1, '1624021361', 'hello', 'sa12', '2021-06-18', '10:24:00', '16:20:00', '2021-06-18 07:32:41', '2021-06-21 04:59:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD KEY `cart_items_cart_id_index` (`cart_id`),
  ADD KEY `cart_items_inventory_id_index` (`inventory_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_category_sub_group_id_foreign` (`category_sub_group_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_synced`
--
ALTER TABLE `channel_synced`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connection_request`
--
ALTER TABLE `connection_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_items_order_id_index` (`order_id`),
  ADD KEY `order_items_inventory_id_index` (`inventory_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shops_slug_unique` (`slug`),
  ADD UNIQUE KEY `shops_email_unique` (`email`),
  ADD KEY `shops_owner_id_foreign` (`owner_id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_id` (`shop_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `channel_synced`
--
ALTER TABLE `channel_synced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `connection_request`
--
ALTER TABLE `connection_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1116;

--
-- AUTO_INCREMENT for table `like_dislike`
--
ALTER TABLE `like_dislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
