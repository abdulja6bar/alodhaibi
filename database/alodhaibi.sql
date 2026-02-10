-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4000
-- Generation Time: 10 فبراير 2026 الساعة 12:19
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alodhaibi`
--

-- --------------------------------------------------------

--
-- بنية الجدول `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','in_progress','resolved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `admin_reply` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `complaints`
--

INSERT INTO `complaints` (`id`, `user_name`, `user_email`, `description`, `status`, `created_at`, `updated_at`, `phone`, `admin_reply`) VALUES
(1, 'عبدد الجبارفؤاد', 'abdulja6bar@gmail.com', 'NOTE', 'pending', '2026-02-09 14:46:49', '2026-02-09 14:46:49', '0509190348', 'test'),
(2, 'Abduljabbar Amer', 'abduljab6ar@gmail.com', 'last test', 'resolved', '2026-02-09 16:57:36', '2026-02-10 07:19:44', '0509190348', 't'),
(3, 'عبدد الجبار', 'abdulja6bar@gmail.com', 'تجريب ارسال المرفقات', 'resolved', '2026-02-10 03:14:13', '2026-02-10 07:12:27', '0509190348', 'test test'),
(4, 'عبدد الجبار', 'abdulja6bar@gmail.com', 'تجريب ارسال المرفقات', 'resolved', '2026-02-10 03:14:50', '2026-02-10 07:19:06', '0509190348', 'test test'),
(5, 'عبدد الجبار', 'abdulja6bar@gmail.com', 'تجريب المرفقات', 'pending', '2026-02-10 03:19:40', '2026-02-10 03:19:40', '0509190348', NULL),
(6, 'Abduljabbar Amer', 'amro00743@gmail.com', 'تجريبي', 'pending', '2026-02-10 04:04:30', '2026-02-10 04:04:30', '05091903', NULL),
(7, 'test', 'abdulja6bar@gmail.com', 'test', 'pending', '2026-02-10 04:45:21', '2026-02-10 04:45:21', '0509190348', NULL),
(8, 'تجريبي', 'abdulja6bar@gmail.com', 'تجريبي', 'pending', '2026-02-10 05:33:12', '2026-02-10 05:33:12', '0509190348', NULL),
(9, 'Abduljabbar Amer', 'abdulja6bar@gmail.com', 'test', 'pending', '2026-02-10 06:02:29', '2026-02-10 06:02:29', '0509190348', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `complaint_files`
--

CREATE TABLE `complaint_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `complaint_files`
--

INSERT INTO `complaint_files` (`id`, `complaint_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gemini_Generated_Image_q2sricq2sricq2sr-removebg-preview.png', 'complaint_files/698a1d893458e_Gemini_Generated_Image_q2sricq2sricq2sr-removebg-preview.png', '2026-02-09 14:46:49', '2026-02-09 14:46:49'),
(2, 2, 'Gemini_Generated_Image_q2sricq2sricq2sr-removebg-preview.png', 'complaint_files/698a3c3046aa6_Gemini_Generated_Image_q2sricq2sricq2sr-removebg-preview.png', '2026-02-09 16:57:36', '2026-02-09 16:57:36'),
(3, 3, 'Gemini_Generated_Image_ml9yuuml9yuuml9y-removebg-preview.png', 'complaint_files/698accb5bb237_Gemini_Generated_Image_ml9yuuml9yuuml9y-removebg-preview.png', '2026-02-10 03:14:13', '2026-02-10 03:14:13'),
(4, 3, 'unnamed.png', 'complaint_files/698accb5f3af6_unnamed.png', '2026-02-10 03:14:14', '2026-02-10 03:14:14'),
(5, 4, 'Gemini_Generated_Image_ml9yuuml9yuuml9y-removebg-preview.png', 'complaint_files/698accdad9f94_Gemini_Generated_Image_ml9yuuml9yuuml9y-removebg-preview.png', '2026-02-10 03:14:50', '2026-02-10 03:14:50'),
(6, 5, 'Gemini_Generated_Image_n0fxb3n0fxb3n0fx-removebg-preview.png', 'complaint_files/698acdfc13d4d_Gemini_Generated_Image_n0fxb3n0fxb3n0fx-removebg-preview.png', '2026-02-10 03:19:40', '2026-02-10 03:19:40'),
(7, 5, 'favicon (2).png', 'complaint_files/698acdfc3a12a_favicon__2_.png', '2026-02-10 03:19:40', '2026-02-10 03:19:40'),
(8, 5, '_⁨شعار منصور العضيبيf1⁩.pdf', 'complaint_files/698acdfe50db3_______________________________________f1___.pdf', '2026-02-10 03:19:42', '2026-02-10 03:19:42'),
(9, 6, 'Kingdom.Of.The.Dinosaurs.2022.1080p.WEB.AKWAM.mp4_snapshot_00.01.13.785.jpg', 'complaint_files/698ad87e9bfb7_Kingdom.Of.The.Dinosaurs.2022.1080p.WEB.AKWAM.mp4_snapshot_00.01.13.785.jpg', '2026-02-10 04:04:30', '2026-02-10 04:04:30'),
(10, 6, 'Screenshot (4).gif', 'complaint_files/698ad87ea5e0f_Screenshot__4_.gif', '2026-02-10 04:04:30', '2026-02-10 04:04:30'),
(11, 6, 'Screenshot (20).png', 'complaint_files/698ad87eabda7_Screenshot__20_.png', '2026-02-10 04:04:30', '2026-02-10 04:04:30'),
(12, 7, 'Screenshot (20).png', 'complaint_files/698ae211df5c2_Screenshot__20_.png', '2026-02-10 04:45:22', '2026-02-10 04:45:22'),
(13, 8, 'Screenshot (20).png', 'complaint_files/698aed48b5ff2_Screenshot__20_.png', '2026-02-10 05:33:17', '2026-02-10 05:33:17'),
(14, 9, 'Screenshot (20).png', 'complaint_files/698af42595869_Screenshot__20_.png', '2026-02-10 06:02:29', '2026-02-10 06:02:29');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_02_02_080618_create_myuseres_taple', 1),
(6, '2026_02_02_083152_add_age_to_myuseres_taple', 2),
(7, '2026_02_02_083927_drop_age_form_myuseres_taple', 3),
(8, '2026_02_05_120019_create_numbesrofuser_table', 4),
(9, '2026_02_05_123040_create_numbersuser_table', 5),
(10, '2026_02_07_174546_create_ratings_table', 6),
(11, '2026_02_07_175125_create_complaints_table', 6),
(12, '2026_02_09_063920_create_submissions_table', 6),
(13, '2026_02_09_103819_create_complaint_files_table', 6);

-- --------------------------------------------------------

--
-- بنية الجدول `myuseres_taple`
--

CREATE TABLE `myuseres_taple` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(225) NOT NULL,
  `nots` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'هل المستخدم مفعل ام معطل',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `myuseres_taple`
--

INSERT INTO `myuseres_taple` (`id`, `name`, `email`, `phone`, `address`, `nots`, `active`, `created_at`, `updated_at`) VALUES
(55, 'عبدالجبار عامر', 'abdulja6bar@gmail.com', '0509190348', 'اليمن', 'a', 1, '2026-02-03 09:07:27', '2026-02-03 09:07:27'),
(56, 'Abduljabbar Amer', 'abduljab6ar@gmail.com', '778407344', 'اليمن', 'a', 1, '2026-02-03 09:07:38', '2026-02-03 09:07:38'),
(57, 'عبدالجبار فؤاد عامر', 'abdulja6bar2@gmail.com', '0509190348', 'اليمن', 'a', 1, '2026-02-04 03:25:35', '2026-02-04 03:25:35');

-- --------------------------------------------------------

--
-- بنية الجدول `numbersuser`
--

CREATE TABLE `numbersuser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `numbersuser`
--

INSERT INTO `numbersuser` (`id`, `key`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2621504030', 56, '2026-02-17 12:31:18', '2026-02-14 12:31:18');

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
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

-- --------------------------------------------------------

--
-- بنية الجدول `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL,
  `comment` text NOT NULL,
  `service_type` enum('sales','support','delivery','quality') NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `device_token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'عبدالجبار فؤاد', 'abduljab6ar@gmail.com', NULL, 'abduljabbar', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_files`
--
ALTER TABLE `complaint_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_files_complaint_id_foreign` (`complaint_id`);

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
-- Indexes for table `myuseres_taple`
--
ALTER TABLE `myuseres_taple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbersuser`
--
ALTER TABLE `numbersuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numbersuser_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `submissions_ip_address_device_id_unique` (`ip_address`,`device_id`);

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
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaint_files`
--
ALTER TABLE `complaint_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `myuseres_taple`
--
ALTER TABLE `myuseres_taple`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `numbersuser`
--
ALTER TABLE `numbersuser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `complaint_files`
--
ALTER TABLE `complaint_files`
  ADD CONSTRAINT `complaint_files_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `numbersuser`
--
ALTER TABLE `numbersuser`
  ADD CONSTRAINT `numbersuser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `myuseres_taple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
