-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 15, 2024 lúc 01:34 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_lab6`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(255) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`MaDM`, `TenDM`, `NgayTao`, `MoTa`) VALUES
(1, 'Thể thao', '2024-08-04 21:23:00', 'hi'),
(7, 'Thời sự', '2024-07-31 00:24:00', 'zxzxasdds'),
(10, 'Xã hội', '2024-08-06 15:02:00', 'xã hội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `id_news`, `id_user`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'adsds', '2024-08-14 02:48:20', '2024-08-14 02:48:20'),
(2, 3, 5, 'hàng đẹp', '2024-08-14 02:49:54', '2024-08-14 02:49:54'),
(3, 6, 4, 'hghg', '2024-08-14 02:50:31', '2024-08-14 02:50:31'),
(4, 3, 13, 'demo', '2024-08-14 03:02:13', '2024-08-14 03:02:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `MaTT` int(11) NOT NULL,
  `TenTT` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `MaDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`MaTT`, `TenTT`, `HinhAnh`, `NgayTao`, `MoTa`, `MaDM`) VALUES
(3, 'Thời sự chiến tranh giữa nga và ukraine', '1722978655_new1', '2024-08-07 03:59:44', 'xdfdffffffffffffffffffffffffffffff', 7),
(4, 'Tin xã hội tác hại của sử dụng bia khi lái xe', '1723546964_Nong-Do-Con.jpg', '2024-08-07 03:59:44', 'ffffffgffffffffffffffffffhhh', 10),
(5, 'Bóng đá nữ việt nam', '1723545910_newbd', '2024-08-05 04:05:17', 'êrể', 1),
(6, 'Tin xã hội hôm nay', '1722978707_new4', '2024-08-04 04:05:17', 'xzxzxzxzxzxzx', 10),
(7, 'Thời sự hôm nay bangladesh', '1722978724_new6', '2024-08-04 04:08:15', 'hhghgh', 7),
(8, 'Bóng đá nhận được huy chương', '1722978742_new8', '2024-08-13 04:08:15', 'ghhghhg', 1),
(9, 'Tin xã hội về nội chiến myanmar', '1722978777_new5', '2024-08-11 04:08:53', 'fgfg', 10),
(10, 'Bóng đá nam đội tuyển quốc gia việt nam', '1722978788_new7', '2024-08-19 04:08:53', 'dffgfdgfgfgfhghghghghghgh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dangndpd09151@fpt.edu.vn', '$2y$10$8PiQ0Ebggf.xnEaEsjG5beJBo2DjfbfInAw1XECFvt0iawbxmcMx.', '2024-08-06 20:55:53'),
('nguyenduydang034@gmail.com', '$2y$10$9I/YgrCiKuE/b5FH1iyk6.BEleNMinEIk99BK3.eNaHzQn4CQmPYC', '2024-08-13 13:26:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'nguyenduydang034@gmail.com', NULL, '$2y$10$SDeu7RhDkLf.qwys4wsw9eegTD5dx/dOT1dtuF4yonkWVrsU2gM16', 'avatars/jg7abwHeqfdj2aHoQQfJQdfjybvb42jydaoWIhed.png', '1', 'DdNAG5QCSzS4Bs9O4EL9a5RAzP0Q32IBLteFJLzdYsCQgS0XuZvfAcnyppYq', '2024-08-03 03:39:02', '2024-08-03 03:39:02'),
(4, 'hihi', 'tranvany@gmail.com', NULL, '$2y$10$y7e1Wk63RZgiXuEvqoLr3OdiwWIrXDeOZgx1j/XlL98cj46ud9nqe', 'avatars/OTgA4OtFvQrjefo4MzrlUQKJVSHJD9f325ItaLMq.jpg', '0', NULL, '2024-08-03 04:14:30', '2024-08-03 04:14:30'),
(5, 'nem', 'dangndpd09151@fpt.edu.vn', NULL, '$2y$10$WvhJ8qKzTI5.o0y3pgorgufExdJi//Nk7WRht0Z62d6f40sAlFPf2', 'avatars/tzet4ZfQKiCUvOXxeLH79Yog63EBpeXwiNCW8eAR.jpg', '0', '9L7I1jtgjKuVu2sZFrJs9vg0qbJcMy8d2T4BvjIjbfhNIRf4zyFWXbGWh5Z2', '2024-08-03 04:28:44', '2024-08-03 04:28:44'),
(6, 'Duy Dang Nguyen', 'nem@gmail.com', NULL, '$2y$10$YfU2XMtbm2raLGO6ty1ApOSRpBg9Q0mC5h7BkDRGx/c9I0rvtfEEW', 'avatars/jg7abwHeqfdj2aHoQQfJQdfjybvb42jydaoWIhed.png', '0', '33u2vFD61E1g769Rii1i6NJab5HjkzbXhE8mxDgTCGuIlNFpISCnTTgOJfVi', '2024-08-04 19:43:29', '2024-08-04 19:43:29'),
(9, 'Duy Dang Nguyen', 'nemndpd09151@fpt.edu.vn', NULL, '$2y$10$ayjLvhnQIH6k0f8EPnzV8e0SFu/URZNz6MdNCroLfqasV1EubRSXS', 'avatars/pJMAvLoNY1Y36WzZc2uxvBqZNXXJFqehF0J2Mb8F.jpg', '0', NULL, NULL, NULL),
(11, 'demo', 'hihihi@gmail.com', NULL, '$2y$10$Ae7yGCcMflyt1oPwzkLfAecBpIAiE9tz.ha4W9U508ZOt/b8cT6ZG', 'avatars/u0aIFWQN2m7fqo7XpmJcw2zNJ7uD5mC8Y8W9DGrt.png', '0', NULL, NULL, NULL),
(13, 'demo', 'nemmm@gmail.com', NULL, '$2y$10$W2Ku.6QkgOBtjRTKRBkABOtIWB7tVRFymYRLsNrksJSYd0Ikmdfw2', 'avatars/h4cNHmAsLqeQvZOgAtmuzwjU5nK4gMKheC6guSMd.jpg', '0', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`id_news`),
  ADD KEY `user_id` (`id_user`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`MaTT`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `MaTT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`MaTT`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `categorys` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
