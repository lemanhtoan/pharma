-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 23, 2017 lúc 09:13 PM
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
-- Cấu trúc bảng cho bảng `config_discount`
--

CREATE TABLE `config_discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` decimal(20,2) NOT NULL,
  `to` decimal(20,2) NOT NULL,
  `value` decimal(20,0) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config_discount`
--

INSERT INTO `config_discount` (`id`, `created_at`, `updated_at`, `level`, `name`, `from`, `to`, `value`, `type`) VALUES
(1, '2017-08-16 21:58:47', '2017-08-23 13:46:56', 1, 'Mức 1', '2000000.00', '4000000.00', '5', 'Phần trăm'),
(2, '2017-08-16 22:00:36', '2017-08-23 13:46:52', 2, 'Mức 2', '4000000.00', '6000000.00', '6', 'Phần trăm'),
(3, '2017-08-16 22:02:33', '2017-08-23 13:44:25', 3, 'Mức 3', '6000000.00', '8000000.00', '300000', 'Cố định'),
(4, '2017-08-16 22:03:04', '2017-08-23 13:45:05', 4, 'Mức 4', '8000000.00', '10000000.00', '400000', 'Cố định');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `config_discount`
--
ALTER TABLE `config_discount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `config_discount`
--
ALTER TABLE `config_discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
