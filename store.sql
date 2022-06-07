-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2022 at 08:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` char(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Noran', 'noranmostafa843@gmail.com', NULL, '$2y$10$/9p6zM3DNnm50is5t3m3Ku4Y4W0ghR8KSfRiXP5EmQvUOTLnKEW0K', NULL, 1, NULL, '2022-04-20 19:26:15', '2022-04-20 19:26:15'),
(2, 'mahmoud', 'mahmoud@gmail.com', NULL, '$2y$10$pNDDMtsPk9FkUl5LAGv78OMxVhGcPxDkkmAlUyRTODrrJFznNtEJe', NULL, 2, NULL, '2022-06-05 22:17:48', '2022-06-05 22:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-05-25 17:41:16', '2022-05-25 17:41:16'),
(2, '2022-05-25 22:25:47', '2022-05-25 22:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'اللون', '2022-05-25 17:41:16', '2022-05-25 17:41:16'),
(2, 2, 'ar', 'الحجم', '2022-05-25 22:25:47', '2022-05-25 22:25:47'),
(3, 3, 'ar', 'انترية', '2022-05-25 22:32:15', '2022-05-25 22:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `photo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'aQGGwc0lNX2KQTiDRhdCHUjonzWtIcaJS92RrV13.jpg', 1, '2022-05-16 19:41:02', '2022-05-16 19:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'دمياط', '2022-05-16 19:41:02', '2022-05-16 19:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(10, NULL, 'قسم-اثاث-منزلى', 1, '2022-05-12 17:07:01', '2022-05-13 17:19:41'),
(16, NULL, 'voluptates-ipsum-vero-quo-enim-fugit', 1, '2022-05-12 17:07:03', '2022-05-12 17:07:03'),
(33, 16, 'tenetur-et-ut-voluptas', 1, '2022-05-14 11:26:16', '2022-05-14 11:26:16'),
(36, 16, 'molestiae-aut-ratione-et-corrupti-ab-non-et', 0, '2022-05-14 11:26:16', '2022-05-14 11:26:16'),
(42, 10, 'قسم - فرعى - السفرة', 1, '2022-05-14 15:20:08', '2022-05-14 16:08:33'),
(43, NULL, 'شنط - سفر', 1, '2022-05-19 20:08:58', '2022-05-19 20:08:58'),
(44, NULL, 'قسم - الالكترونيات - و - الاجهزة - الحديثة', 1, '2022-06-02 03:09:33', '2022-06-02 03:09:33'),
(45, 44, 'قسم - فرعى - لابتوب', 1, '2022-06-02 03:10:07', '2022-06-02 03:10:07'),
(46, 44, 'قسم - فرعى - تليفزيون', 1, '2022-06-02 03:10:28', '2022-06-02 03:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(10, 10, 'ar', 'قسم اثاث منزلى', '2022-05-12 17:07:01', '2022-05-13 17:19:41'),
(16, 16, 'ar', 'Lia Gibson', '2022-05-12 17:07:03', '2022-05-12 17:07:03'),
(33, 33, 'ar', 'Prof. Avery Koepp DVM', '2022-05-14 11:26:16', '2022-05-14 11:26:16'),
(36, 36, 'ar', 'Flo Schultz PhD', '2022-05-14 11:26:16', '2022-05-14 11:26:16'),
(42, 42, 'ar', 'قسم السفرة', '2022-05-14 15:20:08', '2022-05-14 16:08:34'),
(43, 43, 'ar', 'شنط سفر', '2022-05-19 20:08:58', '2022-05-19 20:08:58'),
(44, 44, 'ar', 'قسم الالكترونيات و الاجهزة الحديثة', '2022-06-02 03:09:33', '2022-06-02 03:09:33'),
(45, 45, 'ar', 'لابتوب', '2022-06-02 03:10:07', '2022-06-02 03:10:07'),
(46, 46, 'ar', 'تليفزيون', '2022-06-02 03:10:28', '2022-06-02 03:10:28');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 21, 'WUopUO5BTERcw4k8XfnDo58kG8Es8hQ0trxb5jo4.jpg', '2022-05-25 16:11:23', '2022-05-25 16:11:23'),
(3, 22, 'rF30TvAtVivUNTQ9deQGW7gb7y7BtUETYL6H3BNA.jpg', '2022-06-02 19:17:45', '2022-06-02 19:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `abbr` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` enum('rtl','ltr') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rtl',
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `abbr`, `locale`, `name`, `direction`, `active`, `created_at`, `updated_at`) VALUES
(1, 'ar', NULL, 'اللغة العربية', 'rtl', 1, '2022-04-22 21:38:05', '2022-04-22 21:38:05'),
(2, 'en', NULL, 'English', 'ltr', 1, '2022-04-22 21:39:03', '2022-04-22 21:39:03'),
(3, 'fr', NULL, 'French', 'ltr', 1, '2022-04-24 20:11:50', '2022-04-28 21:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `translation_lang` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation_of` int(10) UNSIGNED NOT NULL,
  `name` char(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `translation_lang`, `translation_of`, `name`, `slug`, `photo`, `active`, `created_at`, `updated_at`) VALUES
(7, 'ar', 0, 'ملابس', 'ملابس', 'images/mainCategories/Zbi0IVfKdXeslkBysSRJusdqPjorhaAceuAxIk0Z.jpg', 1, NULL, '2022-05-05 17:52:22'),
(8, 'en', 7, 'clothes', 'clothes', 'images/mainCategories/NcZsyr2ErZuOzhcg6BRitxoC5SBTQIFO3ji5TZaD.jpg', 1, NULL, '2022-04-28 21:26:30'),
(9, 'ar', 0, 'طعام', 'طعام', 'images/mainCategories/sHYU6m6mJOeahHTjEDf6hQ30i9v1yfZVRC0kaNN6.jpg', 1, NULL, '2022-05-05 17:26:33'),
(10, 'en', 9, 'food', 'food', 'images/mainCategories/ZuV3WlS7RVmK9WGnlgHcRiRBgKDZKGn1JjVC3jyN.jpg', 1, NULL, NULL),
(11, 'fr', 9, 'aliments', 'aliments', 'images/mainCategories/ZuV3WlS7RVmK9WGnlgHcRiRBgKDZKGn1JjVC3jyN.jpg', 1, NULL, '2022-04-28 21:35:08');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_20_124910_create_admins_table', 1),
(6, '2022_04_22_001206_create_languages_table', 2),
(7, '2022_04_22_002832_create_main_categories_table', 2),
(9, '2022_04_29_004107_create_vendors_table', 3),
(11, '2022_05_07_144454_create_sub_categories_table', 4),
(16, '2022_05_07_214731_create_settings_table', 5),
(17, '2022_05_07_221728_create_setting_translations_table', 5),
(18, '2022_05_12_173830_create_categories_table', 6),
(19, '2022_05_12_173931_create_category_translations_table', 6),
(21, '2022_05_16_191512_create_brand_translations_table', 7),
(22, '2022_05_16_191334_create_brands_table', 8),
(23, '2022_05_19_174613_create_tags_table', 9),
(24, '2022_05_19_174633_create_tag_translations_table', 9),
(25, '2022_05_22_164549_create_products_table', 10),
(26, '2022_05_22_164656_create_product_translations_table', 10),
(27, '2022_05_22_173049_create_product_tags_table', 11),
(28, '2022_05_22_173103_create_product_categories_table', 11),
(30, '2022_05_22_222555_create_product_images_table', 12),
(31, '2022_05_25_182506_create_attributes_table', 13),
(32, '2022_05_25_182523_create_attribute_translations_table', 13),
(36, '2022_05_26_185922_create_options_table', 14),
(38, '2014_10_12_000000_create_users_table', 15),
(39, '2022_05_30_171325_create_user_verification_codes_table', 16),
(40, '2022_06_01_132128_create_sliders_table', 17),
(41, '2022_06_03_144626_create_wishlists_table', 18),
(42, '2022_05_26_185939_create_option_translations_table', 19),
(44, '2022_06_05_024502_create_orders_table', 20),
(45, '2022_06_05_024041_create_transactions_table', 21),
(46, '2022_06_05_214422_create_roles_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `attribute_id`, `product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '300', '2022-05-27 14:05:50', '2022-05-27 14:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `option_translations`
--

CREATE TABLE `option_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(18,4) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,4) UNSIGNED NOT NULL DEFAULT 0.0000,
  `special_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `special_price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manage_stock` tinyint(1) NOT NULL DEFAULT 0,
  `qty` int(11) DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `viewed` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `price`, `special_price`, `special_price_type`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `in_stock`, `viewed`, `is_active`, `brand_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'nihil-qui-mollitia-illo-molestiae-veritatis-quia', '7885.0000', NULL, NULL, NULL, NULL, NULL, 'nisi', 0, NULL, 0, 0, 1, NULL, NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(2, 'ipsam-soluta-quis-enim-reiciendis', '8698.0000', NULL, NULL, NULL, NULL, NULL, 'aut', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(3, 'dolores-et-doloribus-ab-cupiditate-eum-nobis-veritatis-natus', '8009.0000', NULL, NULL, NULL, NULL, NULL, 'eos', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(4, 'rerum-nobis-quam-ullam-fuga-officia-aliquid', '5070.0000', NULL, NULL, NULL, NULL, NULL, 'nisi', 0, NULL, 0, 0, 0, NULL, NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(5, 'in-est-quis-sit-aliquam', '2034.0000', NULL, NULL, NULL, NULL, NULL, 'numquam', 0, NULL, 0, 0, 0, NULL, NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(6, 'eum-quisquam-ad-repellat-minima-sed-ut-doloribus', '5041.0000', NULL, NULL, NULL, NULL, NULL, 'odit', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(7, 'qui-possimus-quae-nihil-aut-qui', '1156.0000', NULL, NULL, NULL, NULL, NULL, 'qui', 0, NULL, 0, 0, 1, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(8, 'aut-qui-repudiandae-et-incidunt-incidunt', '8821.0000', NULL, NULL, NULL, NULL, NULL, 'doloribus', 0, NULL, 1, 0, 1, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(9, 'officia-qui-quae-beatae-molestias', '2502.0000', NULL, NULL, NULL, NULL, NULL, 'maiores', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(10, 'veritatis-magni-voluptatem-laborum-eos-assumenda-praesentium-qui', '272.0000', NULL, NULL, NULL, NULL, NULL, 'aut', 0, NULL, 1, 0, 1, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(11, 'incidunt-dicta-assumenda-beatae-sunt', '2107.0000', NULL, NULL, NULL, NULL, NULL, 'ut', 0, NULL, 0, 0, 1, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(12, 'odio-velit-sapiente-laudantium-quia-repellat-fugiat-provident', '895.0000', NULL, NULL, NULL, NULL, NULL, 'occaecati', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(13, 'doloremque-possimus-consequatur-dolores-at-et-dicta', '4588.0000', NULL, NULL, NULL, NULL, NULL, 'possimus', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(14, 'quo-aut-impedit-dicta-voluptas-animi-similique', '394.0000', NULL, NULL, NULL, NULL, NULL, 'qui', 0, NULL, 1, 0, 1, NULL, NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(15, 'ad-non-deserunt-reprehenderit-eos-eos', '1102.0000', NULL, NULL, NULL, NULL, NULL, 'odit', 0, NULL, 0, 0, 0, NULL, NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(16, 'deserunt-et-vero-repudiandae-assumenda', '1650.0000', NULL, NULL, NULL, NULL, NULL, 'odio', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(17, 'nobis-quibusdam-voluptas-perspiciatis-vitae-officia', '900.0000', NULL, NULL, NULL, NULL, NULL, 'sit', 0, NULL, 1, 0, 1, NULL, NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(18, 'ut-vitae-quia-tempore-at-voluptatum-fuga-qui', '4737.0000', NULL, NULL, NULL, NULL, NULL, 'quas', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(19, 'itaque-veritatis-earum-molestias-occaecati-illo-cupiditate', '4862.0000', NULL, NULL, NULL, NULL, NULL, 'enim', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(20, 'iusto-et-perspiciatis-et-odio-facere-consequatur-consequatur', '6114.0000', NULL, NULL, NULL, NULL, NULL, 'aut', 0, NULL, 1, 0, 0, NULL, NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(21, 'منتج - انترية', '500.0000', '300.0000', 'fixed', '2022-05-24', '2022-05-31', NULL, 'Antre', 1, 700, 1, 0, 1, 1, NULL, '2022-05-23 17:47:21', '2022-05-24 15:15:02'),
(22, 'منتج - كراسى', '300.0000', '250.0000', 'fixed', '2022-06-01', '2022-06-10', NULL, NULL, 0, NULL, 1, 0, 1, 1, NULL, '2022-06-02 18:14:48', '2022-06-02 19:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(21, 10),
(22, 42);

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `name`, `description`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'Itaque voluptatibus inventore earum quia quae.', 'Sit maxime eveniet ipsam aut. Vero reiciendis est iusto aspernatur voluptas consequatur. Exercitationem tempore consequuntur ab sunt occaecati odio.', NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(2, 2, 'ar', 'Quo fuga ipsa laboriosam ullam id vitae.', 'Et natus aut quia iste officiis iusto magnam. Adipisci illo doloremque sint nulla quos. Sed accusamus velit minus. Reprehenderit reprehenderit assumenda corrupti est non dolore.', NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(3, 3, 'ar', 'Eligendi culpa velit qui reprehenderit.', 'Numquam sit dignissimos aut nam aut. Maxime sit veniam qui praesentium aspernatur ipsum. Et eos blanditiis nostrum reiciendis ipsum consequatur. Qui ut consequatur praesentium ut ea iure commodi.', NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(4, 4, 'ar', 'Et labore quia et accusantium molestiae.', 'Aut laudantium cum repellat quidem. Sit deserunt alias iste corrupti. Et eius eveniet accusamus alias ratione. Quaerat est suscipit accusamus nobis maiores.', NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(5, 5, 'ar', 'Magnam voluptas illo neque sint ut veritatis perferendis.', 'Tempora voluptas saepe eaque et aut aut. Quidem enim tempore voluptatem. Officia delectus perferendis dignissimos. Sit explicabo expedita fugit at.', NULL, '2022-05-22 16:30:47', '2022-05-22 16:30:47'),
(6, 6, 'ar', 'Molestiae ullam autem dolor fugiat.', 'Explicabo minus est cupiditate quia molestiae eum ut. Magnam corporis a maiores quos odio deserunt corporis culpa. Asperiores sapiente aperiam eaque. Illo a nesciunt sed voluptas dolores.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(7, 7, 'ar', 'Est dicta dignissimos omnis. Magni unde quasi libero et.', 'At illum voluptate quisquam est in. Vel non suscipit voluptatem voluptas modi velit. Aut deleniti beatae ut voluptas.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(8, 8, 'ar', 'Unde voluptatum at dolor nihil.', 'Voluptatem fugiat vero aliquid voluptatum. Deleniti placeat necessitatibus optio aut corporis quis architecto.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(9, 9, 'ar', 'Sit aspernatur qui rem aliquid id eius ipsum.', 'Doloremque sed animi perferendis ab aliquid voluptatem. Tenetur sit inventore ipsa tempore. Nam fugit animi deleniti dolores.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(10, 10, 'ar', 'Eos similique consequatur quaerat id qui odio.', 'Vero omnis vel cum qui eos est laudantium sit. Nihil qui laudantium quae illo at illo ut. Accusantium aliquam molestiae omnis voluptate nihil est.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(11, 11, 'ar', 'Fugiat rerum ut ipsum excepturi ut.', 'Eaque velit recusandae dolores. Et laudantium ut qui deserunt molestias dolorum asperiores.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(12, 12, 'ar', 'Odio quia velit voluptas id.', 'Nam quia reprehenderit nisi ut sit qui. Dolorem illum animi non et ab ut exercitationem. Ratione aut deserunt excepturi rerum ut non qui. Dolor minima sequi quae omnis debitis quia.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(13, 13, 'ar', 'Quia iste odit ipsum. Architecto quae molestiae nobis eum.', 'Nesciunt ea in vel quibusdam. Et qui dicta quae sequi sed beatae vel. Cumque mollitia autem deserunt magni asperiores deserunt. Cum nihil praesentium repudiandae.', NULL, '2022-05-22 16:30:48', '2022-05-22 16:30:48'),
(14, 14, 'ar', 'Commodi voluptates ut qui optio numquam animi.', 'At maiores et quo sint ut est expedita. Id eum sunt ut voluptatem laboriosam aperiam consequatur. Reprehenderit optio cumque corporis consectetur vel sit dolore. Eveniet ut quia tenetur eum labore tenetur ab.', NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(15, 15, 'ar', 'Dolorum sint ut eligendi eum rerum optio perferendis.', 'Voluptatem omnis suscipit ut qui ullam porro. Illum ducimus incidunt ratione quisquam. Repellendus sit exercitationem quia nostrum veritatis non suscipit reiciendis. Tempore expedita quam quo voluptatibus odit et nemo.', NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(16, 16, 'ar', 'Ipsum tempora aut voluptatem suscipit enim.', 'Ut odio laborum repellat officia dolores est at illo. Dolores ut qui et adipisci ut reiciendis odio. Iure nisi eligendi ducimus rerum adipisci et. Rem est nobis exercitationem praesentium quo temporibus aut eveniet.', NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(17, 17, 'ar', 'Temporibus inventore ut soluta placeat ipsa pariatur quia.', 'Perspiciatis voluptates amet distinctio mollitia nulla et. Fugiat voluptatibus nisi ut in recusandae et reiciendis.', NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(18, 18, 'ar', 'Quibusdam placeat libero dolores non vel enim.', 'Laboriosam debitis nihil quidem ea. Cum quae ex sunt distinctio officia. Qui quas sequi dolor a ipsam.', NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(19, 19, 'ar', 'Ea est nemo maxime et. Nostrum a non dolorem.', 'Incidunt rem earum iste assumenda. Eius et sint officia ut. Provident ad vel pariatur soluta aut. Sunt explicabo qui consectetur voluptatem suscipit est. Harum autem aspernatur eum facere.', NULL, '2022-05-22 16:30:49', '2022-05-22 16:30:49'),
(20, 20, 'ar', 'Ea laudantium et rerum. Unde occaecati et voluptate.', 'Aspernatur corporis culpa aut exercitationem iusto et esse temporibus. Et omnis exercitationem ad odit assumenda in id. Cum consequatur quia porro perferendis.', NULL, '2022-05-22 16:30:50', '2022-05-22 16:30:50'),
(21, 21, 'ar', 'انترية', 'انترية', 'انترية', '2022-05-23 17:47:21', '2022-05-23 17:47:21'),
(22, 22, 'ar', 'كراسى', 'كراسى شفرة', 'كراسى سفرة', '2022-06-02 18:14:48', '2022-06-02 18:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Supervisor', '[\"products\",\"tags\",\"categories\",\"brands\",\"options\",\"users\"]', NULL, NULL),
(2, 'admin', '[\"products\",\"tags\",\"categories\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_translatable` tinyint(1) NOT NULL DEFAULT 0,
  `plain_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'default_locale', 0, 'ar', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(2, 'default_timezone', 0, 'Africa/Cairo', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(3, 'reviews_enabled', 0, '1', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(4, 'auto_approve_reviews', 0, '1', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(5, 'supported_currencies', 0, '[\"USD\",\"LE\",\"SAR\"]', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(6, 'default_currency', 0, 'USD', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(7, 'store_email', 0, 'admin@ecommerce.test', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(8, 'search_engine', 0, 'mysql', '2022-05-08 10:25:57', '2022-05-08 10:25:57'),
(9, 'local_shipping_cost', 0, '0', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(10, 'outer_shipping_cost', 0, '0', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(11, 'free_shipping_cost', 0, '0', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(12, 'store_name', 1, NULL, '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(13, 'free_shipping_label', 1, '0', '2022-05-08 10:25:58', '2022-05-10 19:52:02'),
(14, 'local_label', 1, NULL, '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(15, 'outer_label', 1, NULL, '2022-05-08 10:25:58', '2022-05-08 10:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 12, 'ar', 'متجر امامى', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(2, 13, 'ar', 'توصيل مجانى', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(3, 14, 'ar', 'توصيل داخلى', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(4, 15, 'ar', 'توصيل خارجى', '2022-05-08 10:25:58', '2022-05-08 10:25:58'),
(5, 13, 'en', 'free shipping', '2022-05-11 15:35:22', '2022-05-11 15:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(3, '5VVSrKxcO8BBB3UZc7IIBvrIMO3zA0suCxhUlIdL.jpg', '2022-06-01 21:46:55', '2022-06-01 21:46:55'),
(4, 'R9IeMLE3orCzVX6wpmm8sjQN3hdSSRPzfJp1bSBA.jpg', '2022-06-01 21:46:56', '2022-06-01 21:46:56'),
(5, '9v42D9ca6tERXBCWC8zjH1UKgVcJmUbQiVAFxrkK.jpg', '2022-06-01 21:46:56', '2022-06-01 21:46:56'),
(6, '1SYPGmpaRbU1U7Vq2k4bUyk8gLhZnHNcT6tKiIxZ.jpg', '2022-06-01 21:46:56', '2022-06-01 21:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL,
  `translation_lang` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation_of` int(10) UNSIGNED NOT NULL,
  `name` char(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'علامه-اثاث-منزلى', '2022-05-19 17:00:47', '2022-05-19 17:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'علامة اثاث منزلى', '2022-05-19 17:00:47', '2022-05-19 17:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `mobile_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Noran', '01287313236', '2022-05-31 00:33:34', '$2y$10$ocB/cTeWBxobWpvQ4btFjewM393fkXj2kR5hxfE4xueYvKo2l6rMu', NULL, '2022-05-30 22:16:36', '2022-05-31 00:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification_codes`
--

CREATE TABLE `user_verification_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `mobile`, `email`, `password`, `address`, `logo`, `category_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'توته', '022392323', 'tota@gmail.com', '', 'المعرض', 'images/vendors/Ac2DFs5f1MIu3tsBHY8rXctMCRycSC2Y61F0UwKS.jpg', 7, 1, '2022-05-01 13:36:43', '2022-05-05 19:55:48'),
(2, 'nor', '3348421', 'noranmostafa843@gmail.com', 'wazyfahelm2016linked', 'الاستاد', 'images/vendors/cD2hnwu000XkGcQPPJJivzD5sZB8AKC2dI2PMt3I.jpg', 9, 1, '2022-05-01 21:03:47', '2022-05-04 17:56:17'),
(3, 'ourFood', '02334557798', 'food@gmail.com', '$2y$10$amxFrLepojPlBpJDjLJ2J.uinWB6QShgCA.ljYTRAljFsMGJ6SZZy', 'المعادى', 'images/vendors/4e1lcRNsTIKYrYHa6Reba2cHruggNJPcMDtgcNM7.jpg', 9, 1, '2022-05-01 21:51:03', '2022-05-01 21:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 21, '2022-06-04 14:20:52', '2022-06-04 14:20:52'),
(5, 22, '2022-06-04 14:22:19', '2022-06-04 14:22:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_translations_brand_id_locale_unique` (`brand_id`,`locale`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_attribute_id_foreign` (`attribute_id`),
  ADD KEY `options_product_id_foreign` (`product_id`);

--
-- Indexes for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_translations_option_id_locale_unique` (`option_id`,`locale`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_index` (`customer_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`);
ALTER TABLE `product_translations` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_translations_tag_id_locale_unique` (`tag_id`,`locale`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_order_id_unique` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_mobile_index` (`mobile`);

--
-- Indexes for table `user_verification_codes`
--
ALTER TABLE `user_verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `option_translations`
--
ALTER TABLE `option_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_verification_codes`
--
ALTER TABLE `user_verification_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `option_translations`
--
ALTER TABLE `option_translations`
  ADD CONSTRAINT `option_translations_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
