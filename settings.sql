-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 23, 2017 lúc 09:14 PM
-- Phiên bản máy phục vụ: 5.7.19-0ubuntu0.16.04.1
-- Phiên bản PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pharma`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'dataLogo', '1503127551_logo.png', '2017-06-06 03:11:33', '2017-08-19 07:25:51'),
(3, 'dataQD', '<p>noi dung trang quy dinh</p>\r\n', '2017-06-06 07:35:56', '2017-08-19 07:21:15'),
(4, 'dataHT', '<p>Noi dung trang ho tro</p>\r\n', '2017-06-06 07:56:01', '2017-08-19 07:21:38'),
(5, 'dataKM', '20000', '2017-06-06 08:00:56', '2017-08-19 07:33:27'),
(6, 'dataVC', '40000', '2017-06-06 08:10:57', '2017-08-19 07:20:22'),
(10, 'dataHotline', '0914.390.567', '2017-06-09 02:42:11', '2017-08-19 07:20:07'),
(11, 'dataKMVC', '20000', '2017-06-09 02:42:11', '2017-06-09 02:42:11'),
(12, 'dataDiscount', '55000', '2017-06-09 02:42:11', '2017-08-23 13:31:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
