-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 05:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dookan`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\":\"ألعاب طرية\",\"en\":\"Soft Toys\"}', '{\"ar\":\"مرحبًا بك في متجر الألعاب الناعمة، حيث ستجد أسعارًا رائعة على مجموعة واسعة من الألعاب الناعمة المختلفة للأطفال من جميع الأعمار.\",\"en\":\"Welcome to the Soft Toys Shop, where you\'ll find great prices on a wide range of different soft toys for kids of all ages.\"}', 'fa-solid fa-baby', NULL, '2024-09-25 19:07:12', '2024-09-25 19:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_id` varchar(255) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `name`, `created_at`, `updated_at`) VALUES
(7, '10', 'App\\Models\\User', 'users/17271718907660759023260_image.jpg', '2024-09-24 06:58:10', '2024-09-24 06:58:10'),
(8, '1', 'App\\Models\\Products', 'products/17272725441322023580871_image.jpg', '2024-09-25 10:55:44', '2024-09-25 10:55:44'),
(9, '1', 'App\\Models\\Products', 'products/1727272544666335893131_image.jpg', '2024-09-25 10:55:44', '2024-09-25 10:55:44'),
(10, '1', 'App\\Models\\Products', 'products/17272725447299474531725_image.jpg', '2024-09-25 10:55:44', '2024-09-25 10:55:44'),
(12, '2', 'App\\Models\\Products', 'products/17273020707731636577927_image.jpg', '2024-09-25 19:07:50', '2024-09-25 19:07:50'),
(13, '2', 'App\\Models\\Products', 'products/17273020709794252344426_image.jpg', '2024-09-25 19:07:50', '2024-09-25 19:07:50'),
(14, '2', 'App\\Models\\Products', 'products/17273020876290735728421_image.jpg', '2024-09-25 19:08:07', '2024-09-25 19:08:07'),
(15, '3', 'App\\Models\\Products', 'products/17273600874323025255859_image.jpg', '2024-09-26 11:14:47', '2024-09-26 11:14:47'),
(16, '3', 'App\\Models\\Products', 'products/17273600878844722087049_image.jpg', '2024-09-26 11:14:47', '2024-09-26 11:14:47'),
(17, '3', 'App\\Models\\Products', 'products/17273600874648342009586_image.jpg', '2024-09-26 11:14:47', '2024-09-26 11:14:47'),
(18, '3', 'App\\Models\\User', 'users/1727383107595193056048_image.jpeg', '2024-09-26 17:38:27', '2024-09-26 17:38:27'),
(19, '4', 'App\\Models\\Products', 'products/17275166515095888028497_image.jpg', '2024-09-28 06:44:11', '2024-09-28 06:44:11'),
(20, '4', 'App\\Models\\Products', 'products/17275166526976956611130_image.jpg', '2024-09-28 06:44:12', '2024-09-28 06:44:12'),
(21, '4', 'App\\Models\\Products', 'products/17275166528508973704836_image.jpg', '2024-09-28 06:44:12', '2024-09-28 06:44:12'),
(22, '8', 'App\\Models\\Products', 'products/17275370269740496606871_image.jpg', '2024-09-28 12:23:46', '2024-09-28 12:23:46'),
(23, '8', 'App\\Models\\Products', 'products/17275370261596596983183_image.jpg', '2024-09-28 12:23:47', '2024-09-28 12:23:47'),
(24, '8', 'App\\Models\\Products', 'products/17275370275235622459090_image.jpg', '2024-09-28 12:23:47', '2024-09-28 12:23:47'),
(25, '9', 'App\\Models\\Products', 'products/17275371591088548655653_image.jpg', '2024-09-28 12:25:59', '2024-09-28 12:25:59'),
(26, '9', 'App\\Models\\Products', 'products/1727537159573341607310_image.jpg', '2024-09-28 12:25:59', '2024-09-28 12:25:59'),
(27, '9', 'App\\Models\\Products', 'products/17275371599426063176982_image.jpg', '2024-09-28 12:25:59', '2024-09-28 12:25:59'),
(28, '10', 'App\\Models\\Products', 'products/17275373166545039349138_image.jpg', '2024-09-28 12:28:36', '2024-09-28 12:28:36'),
(29, '10', 'App\\Models\\Products', 'products/17275373169759926834253_image.jpg', '2024-09-28 12:28:37', '2024-09-28 12:28:37'),
(30, '10', 'App\\Models\\Products', 'products/1727537317829468360359_image.jpg', '2024-09-28 12:28:37', '2024-09-28 12:28:37'),
(31, '10', 'App\\Models\\Products', 'products/17275373173668033747420_image.jpg', '2024-09-28 12:28:37', '2024-09-28 12:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `prefix`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'Arabic', NULL, NULL),
(2, 'en', 'English', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_01_171112_create_images_table', 1),
(6, '2024_09_15_103542_create_categories_table', 1),
(7, '2024_09_15_103612_create_products_table', 1),
(9, '2024_09_17_093916_create_languages_table', 1),
(10, '2024_09_25_173610_create_wishlists_table', 2),
(11, '2024_09_25_173631_create_carts_table', 2),
(12, '2024_09_26_205051_create_user_addresses_table', 3),
(13, '2024_09_26_213533_add_default_address_id_to_users_table', 4),
(18, '2024_09_27_210439_create_orders_table', 5),
(19, '2024_09_27_210515_create_order_items_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `total_price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `status`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 3, 6, 'Pending', 253.00, NULL, '2024-09-27 19:14:59', '2024-09-27 19:14:59'),
(6, 3, 6, 'Pending', 893.00, NULL, '2024-09-27 19:21:07', '2024-09-27 19:21:07'),
(7, 3, 6, 'Pending', 116.00, NULL, '2024-09-27 19:21:42', '2024-09-27 19:21:42'),
(8, 3, 6, 'Pending', 104.00, NULL, '2024-09-28 06:50:36', '2024-09-28 06:50:36'),
(9, 3, 6, 'Pending', 71.00, NULL, '2024-09-28 09:27:29', '2024-09-28 09:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 5, 3, 2, 13.00, NULL, '2024-09-27 19:14:59', '2024-09-27 19:14:59'),
(7, 5, 2, 2, 111.00, NULL, '2024-09-27 19:14:59', '2024-09-27 19:14:59'),
(8, 6, 2, 8, 111.00, NULL, '2024-09-27 19:21:07', '2024-09-27 19:21:07'),
(9, 7, 2, 1, 111.00, NULL, '2024-09-27 19:21:42', '2024-09-27 19:21:42'),
(10, 8, 4, 3, 33.00, NULL, '2024-09-28 06:50:36', '2024-09-28 06:50:36'),
(11, 9, 4, 2, 33.00, NULL, '2024-09-28 09:27:29', '2024-09-28 09:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 10, '01033333333', '4011d1ad0caaf5191fa16b41817b9cb79fcf4116be669c95c190674f6feb2725', '[\"*\"]', NULL, NULL, '2024-09-24 07:24:53', '2024-09-24 07:24:53'),
(2, 'App\\Models\\User', 10, '01033333333', '531bff02d97351443e28d6f4c7c074777fddbeae7036dbaba700d756719411c3', '[\"*\"]', NULL, NULL, '2024-09-24 07:25:12', '2024-09-24 07:25:12'),
(3, 'App\\Models\\User', 10, '01033333333', 'b0d338dd0be1828d608a9b2c1a42341c8a90a25c65289031cd7fad3d57e903c5', '[\"*\"]', NULL, NULL, '2024-09-24 07:26:11', '2024-09-24 07:26:11'),
(4, 'App\\Models\\User', 10, '01033333333', '5ba30e8e0cd27fd47cbdd8afe98d5aca30e46bb9019604d9433b8527f3ed9403', '[\"*\"]', NULL, NULL, '2024-09-24 07:35:13', '2024-09-24 07:35:13'),
(5, 'App\\Models\\User', 10, '01033333333', '30ac0a45b30ae713bb6fa70b7c49d8e67437263176ca5bcd375bb2771a3ec725', '[\"*\"]', NULL, NULL, '2024-09-24 07:35:24', '2024-09-24 07:35:24'),
(6, 'App\\Models\\User', 10, '01033333333', 'bf19699cf75caa4636fb6ab1f9fb6d7aeb7293e7072af1d66cf386c0d53dbc05', '[\"*\"]', NULL, NULL, '2024-09-24 07:40:28', '2024-09-24 07:40:28'),
(7, 'App\\Models\\User', 10, '01033333333', '5429becab8db0b71c8196473c4920eae318870436308f569f6d95de716cf0ec5', '[\"*\"]', NULL, NULL, '2024-09-24 07:41:40', '2024-09-24 07:41:40'),
(8, 'App\\Models\\User', 1, '01013152884', '80b74ed7cf9cc0b72d9c92c43768d385119c548b4c51f55e66f1ed2365b68dff', '[\"*\"]', NULL, NULL, '2024-09-28 10:50:19', '2024-09-28 10:50:19'),
(9, 'App\\Models\\User', 1, '01013152884', '4a916c846957cea36861c5930ef0ca0e40ff34cd3229e0230dfffd45f85a7901', '[\"*\"]', '2024-09-28 12:47:54', NULL, '2024-09-28 10:50:56', '2024-09-28 12:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `description`, `price`, `quantity`, `status`, `category_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '111', '{\"ar\":\"فيشر برايس\",\"en\":\"Fisher-Price\"}', '{\"ar\":\"سوث آند سناجل أوتر | ألعاب الأطفال حديثي الولادة وهدايا الأطفال حديثي الولادة | ألعاب طرية من القطيفة للأطفال مزودة بجهاز الضوء والصوت | هدايا طفلة وطفل رضيع | أساسيات حديثي الولادة، FXC66\",\"en\":\"Soothe \'N Snuggle Otter | Newborn Baby Toys & New Baby Gifts | Plush Soft Toys for Babies with Light and Sound Machine | Baby Girl and Baby Boy Gifts | Newborn Essentials, FXC66\"}', 111, 0, 0, 2, 1, NULL, '2024-09-25 19:07:49', '2024-09-27 19:21:07'),
(3, '12', '{\"ar\":\"البطريق القطيفة\",\"en\":\"Plush penguin\"}', '{\"ar\":\"لعبة فيشر برايس الفاخرة للأطفال، بطريق قلاب ومتذبذب مع الموسيقى والحركة لوقت الاستلقاء على البطن والجلوس أثناء اللعب الحسي، HNC10\",\"en\":\"Fisher-Price Plush Baby Toy Flap & Wobble Penguin with Music and Motion for Tummy Time to Sit-At Sensory Play, HNC10\"}', 50, 21, 1, 2, 1, NULL, '2024-09-26 11:14:46', '2024-09-28 12:45:38'),
(4, '33', '{\"ar\":\"احتضان سحابة المهديء\",\"en\":\"Cuddle Cloud Soother\"}', '{\"ar\":\"لهاية الأطفال من فيشر برايس، توينكل آند كادل كلاود، من القطيفة مع أضواء للرضع والأطفال الصغار، GJD44\",\"en\":\"Fisher-Price Baby Sound Machine Twinkle & Cuddle Cloud Soother Crib-Attach Plush with Lights for Infant to Toddler, GJD44\"}', 33, 28, 1, 2, 2, NULL, '2024-09-28 06:44:11', '2024-09-28 09:27:29'),
(9, '11', '{\"ar\":\"يون ناسي دمية دب عملاقة\",\"en\":\"YunNasi Giant Teddy Bear\"}', '{\"ar\":\"دمية دب عملاقة من YunNasi، لعبة محشوة كبيرة على شكل حيوان، لعبة ناعمة ومحبوبة، دمية تيدي من القطيفة مع شريط، هدية رائعة لعيد الميلاد وعيد الميلاد وعيد الحب (31.5 بوصة\\/80 سم، بني)\",\"en\":\"YunNasi Giant Teddy Bear Large Stuffed Toy Animal Soft Toy Cuddly Toy Plush Teddy Doll With Ribbon Great Gift for Birthday Christmas Valentine (31.5 Inches\\/80cm, Brown)\"}', 222, 22, 1, 2, 1, NULL, '2024-09-28 12:25:59', '2024-09-28 12:25:59'),
(10, '21', '{\"ar\":\"متجر ديزني الرسمي\",\"en\":\"Disney Store Official\"}', '{\"ar\":\"لعبة ديزني ستيتش الرسمية متوسطة الحجم ناعمة للأطفال، 38 سم\\/15 بوصة، شخصية محبوبة بملمس غامض وتفاصيل مطرزة، آذان مرنة مرنة - مناسبة للأعمار من 0 سنوات فما فوق\",\"en\":\"Disney Store Official Stitch Medium Soft Toy for Kids, 38cm\\/15”, Cuddly Character with Fuzzy Texture and Embroidered Details, Flexible Floppy Ears - Suitable for Ages 0+\"}', 24, 30, 1, 2, 2, NULL, '2024-09-28 12:28:36', '2024-09-28 12:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','seller','customer') NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `default_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `role`, `status`, `default_address_id`, `deleted_at`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin user', 'adminuser', 'admin@gmail.com', '01013152884', '$2y$10$xpe8jMePuOyPfF9JnsN15ePrYM3a/yEAmHoYcU6eQmhChnUNl.8Vy', 'admin', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Seller user', 'selleruser', 'seller@gmail.com', '0123152885', '$2y$10$jiHxiSjjLraL7PGAH41uU.kPqSRRUHEfi8VZQz.JyzGhQqeHbUnee', 'seller', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'customer', 'customer', 'customer@gmail.com', '01013332888', '$2y$10$XZ60jPIVqFbxkMzY.i59LuPVuJPt4/5ZM7DdCWGxRwBKL2k8InHSW', 'customer', 'active', NULL, NULL, NULL, NULL, NULL, '2024-09-26 19:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(6, 3, '{\"en\":\"Giza, Egypt\",\"ar\":\"الجيزة ، مصر\"}', '2024-09-27 16:42:11', '2024-09-27 16:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(19, 3, 3, '2024-09-28 09:30:31', '2024-09-28 09:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`) USING HASH;

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_default_address_id_foreign` (`default_address_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `user_addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_default_address_id_foreign` FOREIGN KEY (`default_address_id`) REFERENCES `user_addresses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
