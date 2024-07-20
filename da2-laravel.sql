-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2024 at 04:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da2-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun', 'categories/kcBTVbI7MWaYaq5UDjepxmq7cV5tB9d7xttGmh3E.webp', 1, '2024-07-19 23:30:22', '2024-07-20 00:15:25'),
(2, 'Áo sơ mi', 'categories/rNj1VeEKaFDjUbbXcDmv8acLCMgQnT3krw0R3yaH.webp', 1, '2024-07-19 23:30:22', '2024-07-20 00:15:52'),
(3, 'Quần jeans', 'categories/bM5XoTFljjXoawUghloWyeJHe8jItPaZyP9qQkqf.webp', 1, '2024-07-19 23:30:22', '2024-07-20 00:16:08'),
(4, 'Váy đầm', 'categories/BOO1gGieThPkpN7zuFmks20Ytfj73CCqpAC03sCv.webp', 1, '2024-07-19 23:30:22', '2024-07-20 00:16:24'),
(5, 'Áo khoác', 'categories/vaabWg2vGTfQe1XZzqMVRr9AeQkM2JncOxLElYEn.webp', 1, '2024-07-19 23:30:22', '2024-07-20 00:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2024_07_18_113210_create_categories_table', 1),
(30, '2024_07_18_113234_create_products_table', 1),
(31, '2024_07_20_152604_create_orders_table', 2),
(32, '2024_07_20_152618_create_order_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `total`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Fashion A', 'hoanganhgialai859@gmail.com', 'Tòa nhà FPT Polytechnic - P. Trịnh Văn Bô - Xuân Phương - Nam Từ Liêm', 915668.00, 0, '2024-07-20 09:48:42', '2024-07-20 09:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `product_price`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 3, 'ĐẦM CỔ K', 733864.00, 8, '2024-07-20 09:48:42', '2024-07-20 09:48:42'),
(7, 3, 'Áo Phao Nam Siêu Nhẹ', 81944.00, 1, '2024-07-20 09:48:42', '2024-07-20 09:48:42'),
(8, 3, 'QUẦN JEANS BEIGE', 99860.00, 1, '2024-07-20 09:48:42', '2024-07-20 09:48:42');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `price_sale` double(8,2) DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `price_sale`, `size`, `color`, `category_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Áo Phao Nam Siêu Nhẹ', 'products/ZPopxVnWi2fAlwx9nGYALPJgggpVqolf0TGFd5yn.webp', 'Áo phao chần bông dáng suông. Cổ mũ, dài tay. Có 2 túi khóa kéo phía trước. Cài bằng dây khóa kéo cùng màu phía trước. Vải chần bông cách đều.\r\nBên trong nhồi bông dày dặn với phom dáng chuẩn cùng đường may tỉ mỉ. Tính năng giữ nhiệt, chống nước, độ bền cao.', 103981.00, 81944.00, 'M', 'Gray', 5, 1, '2024-07-19 23:30:33', '2024-07-20 00:22:32'),
(2, 'QUẦN JEANS BEIGE', 'products/zudzqx1aVdDN9dkfoq66jdFgtgWEDOu2XAGXiitQ.webp', 'Quần jeans nữ là một item cơ bản, dễ dàng kết hợp với nhiều kiểu áo và phụ kiện khác nhau. Sự thoải mái cùng tính thời trang, quần thích hợp cho nhiều dịp khác nhau từ đi làm đến dạo phố hay các sự kiện casual.', 111172.00, 99860.00, 'M', 'White', 3, 1, '2024-07-19 23:30:33', '2024-07-20 00:53:01'),
(3, 'ĐẦM LỤA CỔ V', 'products/sMTYklvCjFcaKarxSMeomzFAOAQdy1rSBPkuQmkD.webp', 'Thiết kế đầm mang đến sự thanh lịch và quý phái trong tủ đồ quý cô hiện đại. Đầm được làm từ chất liệu lụa cao cấp, với bề mặt mềm mại cùng độ bóng nhẹ, thể hiện vẻ đẹp sang trọng.', 116610.00, 87389.00, 'M', 'Silver', 4, 1, '2024-07-19 23:30:33', '2024-07-20 00:44:46'),
(4, 'ÁO KHOÁC NAM', 'products/X6fmCh1QmxXN9OGeyp76nAkCuipsKk70eM2jZ3r2.webp', 'Áo khoác nam là một loại trang phục phổ biến trong tủ quần áo của phái mạnh. Nó không chỉ giúp giữ ấm cơ thể trong những ngày lạnh mà còn là một phần quan trọng để tạo nên phong cách thời trang nam tính và lịch lãm.', 102812.00, 78936.00, 'XL', 'yellow', 5, 1, '2024-07-19 23:30:33', '2024-07-20 00:30:09'),
(5, 'ÁO PHAO NAM NHẸ', 'products/2bpwyL1NoMiEhXS1KOCiORL6bZe0B8tFJPihtp3u.webp', 'Áo phao chần bông dáng suông. Cổ mũ, dài tay. Có 2 túi khóa kéo phía trước. Cài bằng dây khóa kéo cùng màu phía trước. Vải chần bông cách đều.\r\nBên trong nhồi bông dày dặn với phom dáng chuẩn cùng đường may tỉ mỉ. Tính năng giữ nhiệt, chống nước, độ bền cao.', 106742.00, 91605.00, 'L', 'Blue', 5, 1, '2024-07-19 23:30:33', '2024-07-20 01:02:57'),
(6, 'QUẦN JEANS TÚI', 'products/YMSrRqySxXA3N06m8Jsl1JipLXqcpp2CGwTJR4eI.webp', 'Hách dáng cùng mẫu quần jeans ống suông mới nhất. Nàng dễ dàng mix với nhiều kiểu áo khác nhau để thể hiện vẻ đẹp tự tin, cá tính của mình.', 128412.00, 76304.00, 'L', 'Blue', 3, 1, '2024-07-19 23:30:33', '2024-07-20 00:54:10'),
(7, 'SƠ MI LỤA TRẮNG HOA', 'products/UxPeEHw5lMRi2fPSRXJcigCOUOgYOX5pxddlGj3j.webp', 'Mẫu áo sơ mi mang vẻ đẹp tinh tế, nữ tính nhờ sự kết hợp giữa chất liệu lụa mềm mại bên cạnh họa tiết hoa in bắt mắt. \r\nÁo cổ đức, tay dài, đính khuy kim loại thời thượng. Thân trước áo dệt họa tiết hoa màu hồng nhẹ nhàng, giúp áo thêm phần nổi bật.', 113025.00, 76190.00, 'S', 'White', 2, 1, '2024-07-19 23:30:33', '2024-07-20 01:02:36'),
(8, 'QUẦN JEANS ỐNG', 'products/PRxJeiUtwkzRodkQ5I0yJxm5n09kNCY3swolNGLq.webp', 'Quần jeans ống ứng, tôn dáng, che khuyết điểm tốt và mang đến sự thoải mái khi mặc. \r\n Item dễ phối hợp với nhiều loại áo, từ áo thun đơn giản cho đến áo sơ mi.', 124052.00, 84684.00, 'M', 'Blue', 3, 1, '2024-07-19 23:30:33', '2024-07-20 00:55:35'),
(9, 'ĐẦM CỔ K', 'products/lrD4FPh8uEIZGX6AtkNvDxgfy8qYxSK7EVazo0Kf.webp', 'Thiết kế đầm kiểu mang vẻ đẹp thời thượng, sang trọng và tinh tế. Đầm thích hợp để diện đến nơi công sở, gặp mặt bạn bè hay đi tiệc.', 110640.00, 91733.00, 'M', 'Black', 4, 1, '2024-07-19 23:30:33', '2024-07-20 00:47:40'),
(10, 'QUẦN JEANS ỐNG', 'products/cMO9irKM5vC63njw1ooBTUDSMAyJkXZeSLr8wgM3.webp', 'Thiết kế quần jeans ống loe mang lại cảm giác retro và thời trang, thích hợp cho những người yêu thích phong cách vintage hoặc muốn thể hiện phong cách cá nhân nổi bật của mình.', 105767.00, 96155.00, 'L', 'Blue', 3, 1, '2024-07-19 23:30:33', '2024-07-20 00:56:38'),
(11, 'QUẦN JEANS SUÔNG', 'products/m7WoRyEFGUYKErxawqmnPDY49w0FLeHHerBx1rJ2.webp', 'Hách dáng cùng mẫu quần jeans ống suông mới nhất. Nàng dễ dàng mix với nhiều kiểu áo khác nhau để thể hiện vẻ đẹp tự tin, cá tính của mình.', 108939.00, 98858.00, 'XL', 'Blue', 3, 1, '2024-07-19 23:30:33', '2024-07-20 00:58:16'),
(12, 'ÁO THUN REGULAR', 'products/TjD1BCdJ7aKZpKXcLhQWpHKuET3Mq8qIMls1iOSJ.webp', 'Nếu như Cotton là ông vua chất liệu cho mùa hè với tính ưu việt về mức độ thoáng mát, thấm hút mồ hôi thì META ICE COTTON lại là phiên bản nâng cấp với nhiều tính năng vượt trội hơn thế nữa.', 128544.00, 91243.00, 'M', 'Blue', 1, 1, '2024-07-19 23:30:33', '2024-07-20 00:45:04'),
(13, 'ĐẦM THUN TRÁI TIM', 'products/9jv4dnsDEjGMTGXETdpqf6bOQKyzI3hcrHViA2Rc.webp', 'Đầm thun nữ với thiết kế đơn giản mang lại sự thoải mái cho người mặc. Đầm dáng suông phù hợp cho nhiều dáng vóc khác nhau.', 109989.00, 92470.00, 'S', 'Black', 4, 1, '2024-07-19 23:30:33', '2024-07-20 00:48:41'),
(14, 'QUẦN TÂY', 'products/wUaR5CC0UDWp2m2N2eCHdaFEXo8dqmWuAjzptM49.webp', 'Quần dài dáng regular. Độ dài qua mắt cá chân. Đai quần có khuy cài và đỉa. Khóa dạng kéo.\r\nChất liệu vải khaki dày dặn,đứng phom, màu sắc trẻ trung cá tính phù hợp.', 102784.00, 83583.00, 'M', 'Red', 3, 1, '2024-07-19 23:30:33', '2024-07-20 00:59:32'),
(15, 'QUẦN TÂY DÁNG', 'products/C7ni9ps4s4seYVNpo2cxXVzKbBNTt5MhvAxARiY6.webp', '- Quần dài dáng sim fit, đai quần có đỉa.\r\n- Có 2 túi chéo. 2 túi sau may viền có khuy cài.', 122432.00, 95764.00, 'S', 'Black', 3, 1, '2024-07-19 23:30:33', '2024-07-20 01:00:47'),
(16, 'ĐẦM LỤA CỔ V', 'products/4IyEv1jNnZ495gPq4hzKR9MGDIF9DWf6WF00UOIt.webp', 'Thiết kế đầm mang đến sự thanh lịch và quý phái trong tủ đồ quý cô hiện đại. Đầm được làm từ chất liệu lụa cao cấp, với bề mặt mềm mại cùng độ bóng nhẹ, thể hiện vẻ đẹp sang trọng.', 109976.00, 93798.00, 'XL', 'Purple', 4, 1, '2024-07-19 23:30:33', '2024-07-20 00:46:26'),
(17, 'ĐẦM ÔM TAY KIỂU', 'products/iq7mub3W7J9JXYnZrNFLDGsi6IAY1kpMbKL3Rlsn.webp', 'Thiết kế đầm ôm tạo nên vẻ ngoài quyến rũ và ấn tượng cho nàng. Đầm cổ tròn, độ dài ngang gối, nổi bật, tôn lên đường nét cơ thể. \r\nĐầm tạo điểm nhấn qua phần tay lửng, có xếp ly bom điệu đà.', 125019.00, 96258.00, 'L', 'Orange', 4, 1, '2024-07-19 23:30:33', '2024-07-20 00:50:13'),
(18, 'ĐẦM LỤA LY NHÚN', 'products/ODRuVmlQvwdzBM0op7TN7LabLw85Dt1lW6sUbG8B.webp', 'Thiết kế phóng khoáng nhưng vẫn đủ sự tinh tế, đầm lụa ly nhún phù hợp để nàng diện đến bất cứ đâu, từ đi chơi, đi gặp mặt bạn bè hay đến nơi công sở. Đầm sở hữu bộ màu TRENDY cho mùa Thu - Đông.', 121393.00, 81166.00, 'L', 'Gray', 4, 1, '2024-07-19 23:30:33', '2024-07-20 00:51:20'),
(19, 'ÁO VEST NAM', 'products/6OQl0dbpkjPhCu88cc1eEpoJOSMJrLuWW8DYH5gA.webp', 'Áo vest cổ hai ve khoét chữ V. Tay dài có 4 khuy. Có 1 túi trước ngực, 2 vuông có nắp 2 bên, có 3 túi lót bên trong. Có 2 khuy cài mặt trước. Xẻ tà 2 bên phía sau.\r\nĐể tạo nên những bộ suit đẳng cấp, các nhà thiết kế tài ba của IVY Men tỉ mỉ trong từng đường chỉ, phom dáng cứng cáp từ cầu vai, vạt áo cho đến chiều dài chuẩn của ống tay đều được IVY Men chú trọng.', 120273.00, 89495.00, 'XL', 'Black', 5, 1, '2024-07-19 23:30:33', '2024-07-20 00:36:57'),
(20, 'ÁO SƠ MI TENCEL', 'products/yRGrrVoHjEfot3SARSenUm2ak4ZUVaQLaKfaoM69.webp', 'Thiết kế sơ mi thanh lịch, tinh tế cho nàng công sở đón hè đang về. Áo cổ tròn, dáng suông phù hợp mọi vóc dáng mà còn dễ dàng che đi khuyết điểm. \r\nTay áo lỡ, tạo độ bồng nhẹ, nữ tính. Thân trước đính thêm các chi tiết hoa nổi, dễ dàng thu hút mọi ánh nhìn. Gợi ý nàng mix áo cùng quần hay chân váy để có set đồ hoàn chỉnh.', 121059.00, 83614.00, 'L', 'Gray', 2, 1, '2024-07-19 23:30:33', '2024-07-20 00:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
