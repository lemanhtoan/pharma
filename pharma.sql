-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 12:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `config_discount`
--

CREATE TABLE `config_discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` decimal(8,2) NOT NULL,
  `to` decimal(8,2) NOT NULL,
  `percent` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config_discount`
--

INSERT INTO `config_discount` (`id`, `created_at`, `updated_at`, `level`, `name`, `from`, `to`, `percent`) VALUES
(1, '2017-08-16 21:58:47', '2017-08-16 21:58:47', 1, 'Mức 1', '2.00', '4.00', '3.00'),
(2, '2017-08-16 22:00:36', '2017-08-16 22:00:36', 2, 'Mức 2', '4.00', '6.00', '3.50'),
(3, '2017-08-16 22:02:33', '2017-08-16 22:02:33', 3, 'Mức 3', '6.00', '8.00', '4.00'),
(4, '2017-08-16 22:03:04', '2017-08-16 22:03:04', 4, 'Mức 4', '8.00', '10.00', '4.50'),
(5, '2017-08-16 22:03:30', '2017-08-16 22:03:30', 5, 'Mức 5', '10.00', '100.00', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `text`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'Dupont', 'dupont@la.fr', 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.', 0, '2017-07-27 21:46:27', '2017-07-27 21:46:27'),
(2, 'Durand', 'durand@la.fr', ' Lorem ipsum erat non elit ultrices placerat, netus metus feugiat non conubia fusce porttitor, sociosqu diam commodo metus in. Himenaeos vitae aptent consequat luctus purus eleifend enim, sollicitudin eleifend porta malesuada ac class conubia, condimentum mauris facilisis conubia quis scelerisque. Lacinia tempus nullam felis fusce ac potenti netus ornare semper molestie, iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet euismod.', 0, '2017-07-27 21:46:27', '2017-07-27 21:46:27'),
(3, 'Martin', 'martin@la.fr', 'Lorem ipsum tempor netus aenean ligula habitant vehicula tempor ultrices, placerat sociosqu ultrices consectetur ullamcorper tincidunt quisque tellus, ante nostra euismod nec suspendisse sem curabitur elit. Malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui. Lectus curabitur euismod ad, erat.', 1, '2017-07-27 21:46:27', '2017-07-27 21:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `uid` varchar(20) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `inviteCode` varchar(20) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `orderCount` int(11) NOT NULL DEFAULT '0',
  `orderSuccess` int(11) NOT NULL DEFAULT '0',
  `totalPoint` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `latestOrderTime` datetime DEFAULT NULL,
  `facebookId` varchar(100) DEFAULT NULL,
  `googleId` varchar(100) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `pushNotify` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `province` varchar(200) DEFAULT NULL,
  `lat` varchar(20) DEFAULT '0',
  `lng` varchar(20) DEFAULT '0',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `deletedAt` datetime DEFAULT NULL,
  `pharmacieId` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(110) DEFAULT NULL,
  `isRole` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `uid`, `code`, `inviteCode`, `name`, `address`, `phone`, `password`, `email`, `orderCount`, `orderSuccess`, `totalPoint`, `status`, `latestOrderTime`, `facebookId`, `googleId`, `avatar`, `verified`, `pushNotify`, `province`, `lat`, `lng`, `updated`, `created`, `deleted`, `deletedAt`, `pharmacieId`, `created_at`, `updated_at`, `remember_token`, `isRole`) VALUES
(1, 'ORyrZFFgQbjOjHG', 'KH00001', '9813096929', 'Quản trị', 'Toà nhà VTC, 23 Lạc Trung, Vĩnh Tuy, Hai Bà Trưng, Hà Nội, Vietnam', '841235841993', '$2y$10$bzffypDnx0UTNIRNzE8WTuEwnxhrWVMiSNJ/vLwznn3KPEXA0/t7m', 'admin@email.com', 11, 1, 0, 1, NULL, '1348313485253921', NULL, 'http://graph.facebook.com/1348313485253921/picture?type=square', 0, 1, 'Hà Nội', '20.976411', '105.785588', '2017-07-11 12:20:53', '2017-07-05 12:15:00', 0, NULL, NULL, NULL, '2017-08-12 20:35:31', 'WMzZorWNG1V6rKzGwEr5ioLtT3NJ64vjLMLjLwt9N3YuaddqjMt47KHCJ6sR', 'administrator'),
(2, '39749uZTYX8iNPS', 'KH00002', '4682299361', 'do duong', '165 Thái Hà, Hanoi', '84966545017', '$2y$10$bzffypDnx0UTNIRNzE8WTuEwnxhrWVMiSNJ/vLwznn3KPEXA0/t7m', 'user@gmail.com', 39, 8, 0, 0, NULL, NULL, '111152556609702095375', NULL, 0, 1, 'Hà Nội', '21.007327', '105.781571', '2017-07-11 11:51:56', '2017-07-05 13:48:58', 0, NULL, NULL, NULL, '2017-08-06 19:30:17', 'RukXJsB3vW3ax8Ovdv2n74zqL2xRl6Q6LjBZKUQ7reBxmUDvnM5WfUQV0jr8', NULL),
(3, '6ihKK761hObKpWv', 'KH00003', '3873456070', 'Hồng Hoa', '4 Liễu Giai, Hanoi', '84915669610', 'bcrypt:$2y$10$tPjcKHmg0D.uvOui0Eq2UuRiuJ6ENyKunCXNOGZDRF4nMc854XUwG', NULL, 7, 0, 0, 1, NULL, NULL, NULL, NULL, 0, 1, 'Hà Nội', '21.034541865095754', '105.8140766993165', '2017-07-08 13:49:55', '2017-07-05 13:57:35', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'aTs6iGWJZ9OMDx8', 'KH00004', '4830883104', 'Mary Jane Asia', NULL, '841697449611', NULL, NULL, 2, 0, 0, 1, NULL, '1891556997749553', NULL, 'http://graph.facebook.com/1891556997749553/picture?type=square', 0, 1, 'Hà Nội', '21.031074', '105.785142', '2017-07-10 13:31:11', '2017-07-05 14:40:31', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'MEtsPzrJb0aUihk', 'KH00005', '4538486541', 'Đình Khánh Phùng', 'Ngõ 36 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', '841697449688', NULL, 'phungdinhkhanh@gmail.com', 1, 0, 0, 1, NULL, NULL, '100475992865974618420', NULL, 0, 1, 'Hà Nội', '21.0308269', '105.7850604', '2017-07-07 14:42:15', '2017-07-05 16:11:18', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Yr3UgqrMVeGMHgB', 'KH00006', '8911122336', 'Độ Dương', '30 Đỗ Đức Dục, Mễ Trì, Từ Liêm, Hà Nội', '84966545019', NULL, NULL, 12, 0, 0, 1, NULL, '1425510644185197', NULL, 'http://graph.facebook.com/1425510644185197/picture?type=square', 0, 1, 'Hà Nội', '21.0084227', '105.7821477', '2017-07-07 09:36:21', '2017-07-05 16:32:56', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'pWdO4rySq39p7oq', 'KH00007', '4378846109', 'Đặng Xuân Mạnh', 'J thế thôi chứ không thể', '84978604566', NULL, NULL, 7, 1, 0, 0, NULL, '1418670781546735', NULL, 'http://graph.facebook.com/1418670781546735/picture?type=square', 0, 1, 'Hà Nội', '21.024539509365436', '105.81471506506205', '2017-07-10 11:46:36', '2017-07-05 18:49:05', 0, NULL, NULL, NULL, '2017-08-04 01:38:34', NULL, NULL),
(8, 'pWdO4rySq36p7oq', 'KH00008', '1', 'Quan Tran', NULL, '841667208673', 'raw:quantm', NULL, 7, 0, 0, 1, NULL, NULL, NULL, NULL, 0, 1, 'Hà Nội', '21.002489', '105.863947', '2017-07-09 20:18:36', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '4taWuoWJSxOQCdu', 'KH00009', '8917606832', 'steven wozinak2', '28 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', '84123456701', NULL, 'stevenwozniak22016@gmail.com', 0, 0, 0, 1, NULL, NULL, '114458559066951536723', NULL, 0, 1, NULL, '0', '0', '2017-07-07 14:51:26', '2017-07-06 11:11:11', 1, '2017-07-07 14:51:26', NULL, NULL, NULL, NULL, NULL),
(10, 'iGw5WGJDhwwiIHF', 'KH00010', '9117282072', 'Vũ Quang Sao', 'Ngõ số 2, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', '841656121038', NULL, NULL, 0, 0, 0, 1, NULL, '976848635784089', NULL, 'http://graph.facebook.com/976848635784089/picture?type=square', 0, 1, NULL, '0', '0', '2017-07-08 17:07:28', '2017-07-06 19:22:56', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '6azungabojJf4KO', 'KH00011', '3071543606', 'Độ Dương', 'Số 10 ĐCT08, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', '84966545016', 'bcrypt:$2y$10$oHoKBTyzHOr.z42XAdupvuy5FZriwu1Bek/iGX1CJEy1eqcqiThnm', NULL, 7, 1, 0, 1, NULL, NULL, NULL, NULL, 0, 1, 'Hà Nội', '21.007869', '105.781725', '2017-07-07 15:39:38', '2017-07-06 21:05:03', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'fcw2sxvYsKVZnjj', 'KH00012', '2460817190', 'Micle Tran', '30 Đỗ Đức Dục, Mễ Trì, Từ Liêm, Hà Nội', '841662029818', NULL, 'trantran@gmail.com', 0, 0, 0, 1, NULL, '1172367332909555', NULL, 'http://graph.facebook.com/1172367332909555/picture?type=square', 0, 1, NULL, '21.0084205', '105.7821706', '2017-07-07 08:53:11', '2017-07-07 08:49:15', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'ZUbraDHOs8we47I', 'KH00013', '9210682099', 'Phùng Đình Khánh', '68B Kẻ Vẽ, Đông Ngạc, Từ Liêm, Hà Nội', '841697449680', NULL, NULL, 2, 0, 0, 1, NULL, '1485799851482128', NULL, 'http://graph.facebook.com/1485799851482128/picture?type=square', 0, 1, 'Hà Nội', '21.087859', '105.783364', '2017-07-09 15:37:02', '2017-07-09 15:11:14', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Tt1jnxOTdIs5vat', 'KH00014', '305188223', 'Phạm aaaaaaTùng', 'Yên Lộ, Dương Nội, Hà Đông, Hà Nội', '84123456789', NULL, NULL, 1, 0, 0, 1, NULL, '1373458ddd576107866', NULL, 'http://graph.facebook.com/1373458576107866/picture?type=square', 0, 1, 'Hà Nội', '20.9613209', '105.7452604', '2017-07-20 01:00:25', '2017-07-17 16:29:05', 1, '2017-07-20 01:00:25', NULL, NULL, NULL, NULL, NULL),
(15, 'apm0ii3HI3sj1S9', 'KH00015', '4882353068', 'Dương Nguyễn', NULL, '84989819327', NULL, NULL, 0, 0, 0, 1, NULL, '1890568564501359', NULL, 'http://graph.facebook.com/1890568564501359/picture?type=square', 0, 1, NULL, '0', '0', '2017-07-19 23:53:49', '2017-07-19 23:53:49', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'hXkhXajpECb6Pw1', 'KH00016', '4406436059', 'Manh Tung Pham', NULL, '84969545168', NULL, NULL, 1, 0, 0, 1, NULL, NULL, '114667617673906861686', NULL, 0, 1, 'Hà Nội', '20.961398', '105.743309', '2017-07-24 21:08:44', '2017-07-20 00:21:33', 1, '2017-07-24 21:08:44', NULL, NULL, NULL, NULL, NULL),
(17, 'r115mdSr2U0WIlR', 'KH00017', '309969206', 'Phạm Mạnh Tùng', 'Yên Lộ, Dương Nội, Hà Đông, Hà Nội', '841635672888', NULL, NULL, 0, 0, 0, 1, NULL, '1373458576107866', NULL, 'http://graph.facebook.com/1373458576107866/picture?type=square', 0, 1, NULL, '20.9613209', '105.7452604', '2017-07-24 21:11:13', '2017-07-20 01:02:06', 1, '2017-07-24 21:11:13', NULL, NULL, NULL, NULL, NULL),
(18, 'LYnxHCJ2avssFKf', 'KH00018', '9222374474', 'Tùng Phạm Mạnh', NULL, '841635678888', NULL, NULL, 0, 0, 0, 1, NULL, NULL, '104439021160393320862', NULL, 0, 1, NULL, '0', '0', '2017-07-20 01:57:29', '2017-07-20 01:57:29', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Dw5NFYU0c2qS74e', 'KH00019', '2579750926', 'gandalf', 'Yên Lộ, Dương Nội, Hà Đông, Hà Nội', '84914776153', 'bcrypt:$2y$10$SC8IHwOJxnlRvpI2UgYAXueITQm.yMbJ8LmMsovQ4EnU3/BYY1qha', NULL, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, 1, NULL, '20.9613209', '105.7452604', '2017-07-24 21:24:25', '2017-07-20 02:57:55', 1, '2017-07-24 21:24:25', NULL, NULL, NULL, NULL, NULL),
(20, 'LmHtwpxQNOjGu2R', 'KH00020', '9990948231', 'Phu Kha', '28 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', '841697449699', NULL, NULL, 0, 0, 0, 1, NULL, '1699921403648035', NULL, 'http://graph.facebook.com/1699921403648035/picture?type=square', 0, 1, NULL, '21.0307022', '105.7846583', '2017-07-20 10:49:14', '2017-07-20 10:49:08', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'BvFZ72xriibwxKx', 'KH00021', '8162800045', 'Phạm Mạnh Tùng', 'triều khúc, thanh xuân', '841635678889', NULL, NULL, 11, 0, 0, 1, NULL, '1368757686577955', NULL, 'http://graph.facebook.com/1368757686577955/picture?type=square', 0, 1, 'Hà Nội', '20.960186', '105.742720', '2017-07-24 20:37:30', '2017-07-20 13:02:05', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '598fc8de2d0fe', 'KH022', NULL, 'letoan', 'ha tinh', '09143905678', '$2y$10$m5XeLDCo2zp.aPZU8H5d0e/Sw0ViBnTbQqG1NGysG825in.wHe7Tq', 'toan@gmail.com', 0, 0, 0, 1, NULL, NULL, NULL, NULL, 0, 1, NULL, '0', '0', NULL, '2017-08-13 03:34:54', 0, NULL, 2, '2017-08-12 20:34:54', '2017-08-16 20:17:41', 'LUWIXC0HANbggeK3s2QKCVabt6Bjdk7iGzFU5QUhrPuaHIy1jpl6aaRse5E0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `provinceId` int(5) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `type`, `location`, `provinceId`, `status`) VALUES
(1, 'Ba Đình', 'Quận', '21 02 08N, 105 49 38E', 1, 1),
(2, 'Hoàn Kiếm', 'Quận', '21 01 53N, 105 51 09E', 1, 1),
(3, 'Tây Hồ', 'Quận', '21 04 10N, 105 49 07E', 1, 1),
(4, 'Long Biên', 'Quận', '21 02 21N, 105 53 07E', 1, 1),
(5, 'Cầu Giấy', 'Quận', '21 01 52N, 105 47 20E', 1, 1),
(6, 'Đống Đa', 'Quận', '21 00 56N, 105 49 06E', 1, 1),
(7, 'Hai Bà Trưng', 'Quận', '21 00 27N, 105 51 35E', 1, 1),
(8, 'Hoàng Mai', 'Quận', '20 58 33N, 105 51 22E', 1, 1),
(9, 'Thanh Xuân', 'Quận', '20 59 44N, 105 48 56E', 1, 1),
(16, 'Sóc Sơn', 'Huyện', '21 16 55N, 105 49 46E', 1, 1),
(17, 'Đông Anh', 'Huyện', '21 08 16N, 105 49 38E', 1, 1),
(18, 'Gia Lâm', 'Huyện', '21 01 28N, 105 56 54E', 1, 1),
(19, 'Từ Liêm', 'Huyện', '21 02 39N, 105 45 32E', 1, 1),
(20, 'Thanh Trì', 'Huyện', '20 56 32N, 105 50 55E', 1, 1),
(24, 'Hà Giang', 'Thị Xã', '22 46 23N, 105 02 39E', 2, 0),
(26, 'Đồng Văn', 'Huyện', '23 14 34N, 105 15 48E', 2, 0),
(27, 'Mèo Vạc', 'Huyện', '23 09 10N, 105 26 38E', 2, 0),
(28, 'Yên Minh', 'Huyện', '23 04 20N, 105 10 13E', 2, 0),
(29, 'Quản Bạ', 'Huyện', '23 04 03N, 104 58 05E', 2, 0),
(30, 'Vị Xuyên', 'Huyện', '22 45 50N, 104 56 26E', 2, 0),
(31, 'Bắc Mê', 'Huyện', '22 45 48N, 105 16 26E', 2, 0),
(32, 'Hoàng Su Phì', 'Huyện', '22 41 37N, 104 40 06E', 2, 0),
(33, 'Xín Mần', 'Huyện', '22 38 05N, 104 28 35E', 2, 0),
(34, 'Bắc Quang', 'Huyện', '22 23 42N, 104 55 06E', 2, 0),
(35, 'Quang Bình', 'Huyện', '22 23 07N, 104 37 11E', 2, 0),
(40, 'Cao Bằng', 'Thị Xã', '22 39 20N, 106 15 20E', 4, 0),
(42, 'Bảo Lâm', 'Huyện', '22 52 37N, 105 27 28E', 4, 0),
(43, 'Bảo Lạc', 'Huyện', '22 52 31N, 105 42 41E', 4, 0),
(44, 'Thông Nông', 'Huyện', '22 49 09N, 105 57 05E', 4, 0),
(45, 'Hà Quảng', 'Huyện', '22 53 42N, 106 06 32E', 4, 0),
(46, 'Trà Lĩnh', 'Huyện', '22 48 14N, 106 19 47E', 4, 0),
(47, 'Trùng Khánh', 'Huyện', '22 49 31N, 106 33 58E', 4, 0),
(48, 'Hạ Lang', 'Huyện', '22 42 37N, 106 41 42E', 4, 0),
(49, 'Quảng Uyên', 'Huyện', '22 40 15N, 106 27 42E', 4, 0),
(50, 'Phục Hoà', 'Huyện', '22 33 52N, 106 30 02E', 4, 0),
(51, 'Hoà An', 'Huyện', '22 41 20N, 106 02 05E', 4, 0),
(52, 'Nguyên Bình', 'Huyện', '22 38 52N, 105 57 02E', 4, 0),
(53, 'Thạch An', 'Huyện', '22 28 51N, 106 19 51E', 4, 0),
(58, 'Bắc Kạn', 'Thị Xã', '22 08 00N, 105 51 10E', 6, 0),
(60, 'Pác Nặm', 'Huyện', '22 35 46N, 105 40 25E', 6, 0),
(61, 'Ba Bể', 'Huyện', '22 23 54N, 105 43 30E', 6, 0),
(62, 'Ngân Sơn', 'Huyện', '22 25 50N, 106 01 00E', 6, 0),
(63, 'Bạch Thông', 'Huyện', '22 12 04N, 105 51 01E', 6, 0),
(64, 'Chợ Đồn', 'Huyện', '22 11 18N, 105 34 43E', 6, 0),
(65, 'Chợ Mới', 'Huyện', '21 57 56N, 105 51 29E', 6, 0),
(66, 'Na Rì', 'Huyện', '22 09 48N, 106 05 09E', 6, 0),
(70, 'Tuyên Quang', 'Thị Xã', '21 49 40N, 105 13 12E', 8, 0),
(72, 'Nà Hang', 'Huyện', '22 28 34N, 105 21 03E', 8, 0),
(73, 'Chiêm Hóa', 'Huyện', '22 12 49N, 105 14 32E', 8, 0),
(74, 'Hàm Yên', 'Huyện', '22 05 46N, 105 00 13E', 8, 0),
(75, 'Yên Sơn', 'Huyện', '21 51 53N, 105 18 14E', 8, 0),
(76, 'Sơn Dương', 'Huyện', '21 40 22N, 105 22 57E', 8, 0),
(80, 'Lào Cai', 'Thành Phố', '22 25 07N, 103 58 43E', 10, 0),
(82, 'Bát Xát', 'Huyện', '22 35 50N, 103 44 49E', 10, 0),
(83, 'Mường Khương', 'Huyện', '22 41 05N, 104 08 26E', 10, 0),
(84, 'Si Ma Cai', 'Huyện', '22 39 46N, 104 16 05E', 10, 0),
(85, 'Bắc Hà', 'Huyện', '22 30 08N, 104 18 54E', 10, 0),
(86, 'Bảo Thắng', 'Huyện', '22 22 47N, 104 10 00E', 10, 0),
(87, 'Bảo Yên', 'Huyện', '22 17 38N, 104 25 02E', 10, 0),
(88, 'Sa Pa', 'Huyện', '22 18 54N, 103 54 18E', 10, 0),
(89, 'Văn Bàn', 'Huyện', '22 03 48N, 104 10 59E', 10, 0),
(94, 'Điện Biên Phủ', 'Thành Phố', '21 24 52N, 103 02 31E', 11, 0),
(95, 'Mường Lay', 'Thị Xã', '22 01 47N, 103 07 10E', 11, 0),
(96, 'Mường Nhé', 'Huyện', '22 06 11N, 102 30 54E', 11, 0),
(97, 'Mường Chà', 'Huyện', '21 50 31N, 103 03 15E', 11, 0),
(98, 'Tủa Chùa', 'Huyện', '21 58 19N, 103 23 01E', 11, 0),
(99, 'Tuần Giáo', 'Huyện', '21 38 03N, 103 21 06E', 11, 0),
(100, 'Điện Biên', 'Huyện', '21 15 19N, 103 03 19E', 11, 0),
(101, 'Điện Biên Đông', 'Huyện', '21 14 07N, 103 15 19E', 11, 0),
(102, 'Mường Ảng', 'Huyện', '', 11, 0),
(104, 'Lai Châu', 'Thị Xã', '22 23 15N, 103 24 22E', 12, 0),
(106, 'Tam Đường', 'Huyện', '22 20 16N, 103 32 53E', 12, 0),
(107, 'Mường Tè', 'Huyện', '22 24 16N, 102 43 11E', 12, 0),
(108, 'Sìn Hồ', 'Huyện', '22 17 21N, 103 18 12E', 12, 0),
(109, 'Phong Thổ', 'Huyện', '22 38 24N, 103 22 38E', 12, 0),
(110, 'Than Uyên', 'Huyện', '21 59 35N, 103 45 30E', 12, 0),
(111, 'Tân Uyên', 'Huyện', '', 12, 0),
(116, 'Sơn La', 'Thành Phố', '21 20 39N, 103 54 52E', 14, 0),
(118, 'Quỳnh Nhai', 'Huyện', '21 46 34N, 103 39 02E', 14, 0),
(119, 'Thuận Châu', 'Huyện', '21 24 54N, 103 39 46E', 14, 0),
(120, 'Mường La', 'Huyện', '21 31 38N, 104 02 48E', 14, 0),
(121, 'Bắc Yên', 'Huyện', '21 13 23N, 104 22 09E', 14, 0),
(122, 'Phù Yên', 'Huyện', '21 13 33N, 104 41 51E', 14, 0),
(123, 'Mộc Châu', 'Huyện', '20 49 21N, 104 43 10E', 14, 0),
(124, 'Yên Châu', 'Huyện', '20 59 33N, 104 19 51E', 14, 0),
(125, 'Mai Sơn', 'Huyện', '21 10 08N, 103 59 36E', 14, 0),
(126, 'Sông Mã', 'Huyện', '21 06 04N, 103 43 56E', 14, 0),
(127, 'Sốp Cộp', 'Huyện', '20 52 46N, 103 30 38E', 14, 0),
(132, 'Yên Bái', 'Thành Phố', '21 44 28N, 104 53 42E', 15, 0),
(133, 'Nghĩa Lộ', 'Thị Xã', '21 35 58N, 104 29 22E', 15, 0),
(135, 'Lục Yên', 'Huyện', '22 06 44N, 104 43 12E', 15, 0),
(136, 'Văn Yên', 'Huyện', '21 55 55N, 104 33 51E', 15, 0),
(137, 'Mù Cang Chải', 'Huyện', '21 48 22N, 104 09 01E', 15, 0),
(138, 'Trấn Yên', 'Huyện', '21 42 20N, 104 48 56E', 15, 0),
(139, 'Trạm Tấu', 'Huyện', '21 30 40N, 104 28 03E', 15, 0),
(140, 'Văn Chấn', 'Huyện', '21 34 15N, 104 35 19E', 15, 0),
(141, 'Yên Bình', 'Huyện', '21 52 24N, 104 55 16E', 15, 0),
(148, 'Hòa Bình', 'Thành Phố', '20 50 36N, 105 19 20E', 17, 0),
(150, 'Đà Bắc', 'Huyện', '20 55 58N, 105 04 52E', 17, 0),
(151, 'Kỳ Sơn', 'Huyện', '20 54 06N, 105 23 18E', 17, 0),
(152, 'Lương Sơn', 'Huyện', '20 53 16N, 105 30 55E', 17, 0),
(153, 'Kim Bôi', 'Huyện', '20 40 34N, 105 32 15E', 17, 0),
(154, 'Cao Phong', 'Huyện', '20 41 23N, 105 17 48E', 17, 0),
(155, 'Tân Lạc', 'Huyện', '20 36 44N, 105 15 03E', 17, 0),
(156, 'Mai Châu', 'Huyện', '20 40 56N, 104 59 46E', 17, 0),
(157, 'Lạc Sơn', 'Huyện', '20 29 59N, 105 24 57E', 17, 0),
(158, 'Yên Thủy', 'Huyện', '20 25 42N, 105 37 59E', 17, 0),
(159, 'Lạc Thủy', 'Huyện', '20 29 12N, 105 44 06E', 17, 0),
(164, 'Thái Nguyên', 'Thành Phố', '21 33 20N, 105 48 26E', 19, 0),
(165, 'Sông Công', 'Thị Xã', '21 29 14N, 105 48 47E', 19, 0),
(167, 'Định Hóa', 'Huyện', '21 53 50N, 105 38 01E', 19, 0),
(168, 'Phú Lương', 'Huyện', '21 45 57N, 105 43 22E', 19, 0),
(169, 'Đồng Hỷ', 'Huyện', '21 41 10N, 105 55 43E', 19, 0),
(170, 'Võ Nhai', 'Huyện', '21 47 14N, 106 02 29E', 19, 0),
(171, 'Đại Từ', 'Huyện', '21 36 17N, 105 37 28E', 19, 0),
(172, 'Phổ Yên', 'Huyện', '21 27 08N, 105 45 19E', 19, 0),
(173, 'Phú Bình', 'Huyện', '21 29 36N, 105 57 42E', 19, 0),
(178, 'Lạng Sơn', 'Thành Phố', '21 51 19N, 106 44 50E', 20, 0),
(180, 'Tràng Định', 'Huyện', '22 18 09N, 106 26 32E', 20, 0),
(181, 'Bình Gia', 'Huyện', '22 03 56N, 106 19 01E', 20, 0),
(182, 'Văn Lãng', 'Huyện', '22 01 59N, 106 34 17E', 20, 0),
(183, 'Cao Lộc', 'Huyện', '21 53 05N, 106 50 34E', 20, 0),
(184, 'Văn Quan', 'Huyện', '21 51 04N, 106 33 04E', 20, 0),
(185, 'Bắc Sơn', 'Huyện', '21 48 57N, 106 15 28E', 20, 0),
(186, 'Hữu Lũng', 'Huyện', '21 34 33N, 106 20 33E', 20, 0),
(187, 'Chi Lăng', 'Huyện', '21 40 05N, 106 37 24E', 20, 0),
(188, 'Lộc Bình', 'Huyện', '21 40 41N, 106 58 12E', 20, 0),
(189, 'Đình Lập', 'Huyện', '21 32 07N, 107 07 25E', 20, 0),
(193, 'Hạ Long', 'Thành Phố', '20 52 24N, 107 05 23E', 22, 0),
(194, 'Móng Cái', 'Thành Phố', '21 26 31N, 107 55 09E', 22, 0),
(195, 'Cẩm Phả', 'Thị Xã', '21 03 42N, 107 17 22E', 22, 0),
(196, 'Uông Bí', 'Thị Xã', '21 04 33N, 106 45 07E', 22, 0),
(198, 'Bình Liêu', 'Huyện', '21 33 07N, 107 26 24E', 22, 0),
(199, 'Tiên Yên', 'Huyện', '21 22 24N, 107 22 50E', 22, 0),
(200, 'Đầm Hà', 'Huyện', '21 21 23N, 107 34 32E', 22, 0),
(201, 'Hải Hà', 'Huyện', '21 25 50N, 107 41 26E', 22, 0),
(202, 'Ba Chẽ', 'Huyện', '21 15 40N, 107 09 52E', 22, 0),
(203, 'Vân Đồn', 'Huyện', '20 56 17N, 107 28 02E', 22, 0),
(204, 'Hoành Bồ', 'Huyện', '21 06 30N, 107 02 43E', 22, 0),
(205, 'Đông Triều', 'Huyện', '21 07 10N, 106 34 36E', 22, 0),
(206, 'Yên Hưng', 'Huyện', '20 55 40N, 106 51 05E', 22, 0),
(207, 'Cô Tô', 'Huyện', '21 05 01N, 107 49 10E', 22, 0),
(213, 'Bắc Giang', 'Thành Phố', '21 17 36N, 106 11 18E', 24, 0),
(215, 'Yên Thế', 'Huyện', '21 31 29N, 106 09 27E', 24, 0),
(216, 'Tân Yên', 'Huyện', '21 23 23N, 106 05 55E', 24, 0),
(217, 'Lạng Giang', 'Huyện', '21 21 58N, 106 15 21E', 24, 0),
(218, 'Lục Nam', 'Huyện', '21 18 16N, 106 29 24E', 24, 0),
(219, 'Lục Ngạn', 'Huyện', '21 26 15N, 106 39 09E', 24, 0),
(220, 'Sơn Động', 'Huyện', '21 19 42N, 106 51 09E', 24, 0),
(221, 'Yên Dũng', 'Huyện', '21 12 22N, 106 14 12E', 24, 0),
(222, 'Việt Yên', 'Huyện', '21 16 16N, 106 04 59E', 24, 0),
(223, 'Hiệp Hòa', 'Huyện', '21 15 51N, 105 57 30E', 24, 0),
(227, 'Việt Trì', 'Thành Phố', '21 19 01N, 105 23 35E', 25, 0),
(228, 'Phú Thọ', 'Thị Xã', '21 24 54N, 105 13 46E', 25, 0),
(230, 'Đoan Hùng', 'Huyện', '21 36 56N, 105 08 42E', 25, 0),
(231, 'Hạ Hoà', 'Huyện', '21 35 13N, 105 00 22E', 25, 0),
(232, 'Thanh Ba', 'Huyện', '21 27 04N, 105 09 10E', 25, 0),
(233, 'Phù Ninh', 'Huyện', '21 26 59N, 105 18 13E', 25, 0),
(234, 'Yên Lập', 'Huyện', '21 22 21N, 105 01 25E', 25, 0),
(235, 'Cẩm Khê', 'Huyện', '21 23 04N, 105 05 25E', 25, 0),
(236, 'Tam Nông', 'Huyện', '21 18 24N, 105 14 59E', 25, 0),
(237, 'Lâm Thao', 'Huyện', '21 19 37N, 105 18 09E', 25, 0),
(238, 'Thanh Sơn', 'Huyện', '21 08 32N, 105 04 40E', 25, 0),
(239, 'Thanh Thuỷ', 'Huyện', '21 07 26N, 105 17 18E', 25, 0),
(240, 'Tân Sơn', 'Huyện', '', 25, 0),
(243, 'Vĩnh Yên', 'Thành Phố', '21 18 26N, 105 35 33E', 26, 0),
(244, 'Phúc Yên', 'Thị Xã', '21 18 55N, 105 43 54E', 26, 0),
(246, 'Lập Thạch', 'Huyện', '21 24 45N, 105 25 39E', 26, 0),
(247, 'Tam Dương', 'Huyện', '21 21 40N, 105 33 36E', 26, 0),
(248, 'Tam Đảo', 'Huyện', '21 27 34N, 105 35 09E', 26, 0),
(249, 'Bình Xuyên', 'Huyện', '21 19 48N, 105 39 43E', 26, 0),
(250, 'Mê Linh', 'Huyện', '21 10 53N, 105 42 05E', 1, 1),
(251, 'Yên Lạc', 'Huyện', '21 13 17N, 105 34 44E', 26, 0),
(252, 'Vĩnh Tường', 'Huyện', '21 14 58N, 105 29 37E', 26, 0),
(253, 'Sông Lô', 'Huyện', '', 26, 0),
(256, 'Bắc Ninh', 'Thành Phố', '21 10 48N, 106 03 58E', 27, 0),
(258, 'Yên Phong', 'Huyện', '21 12 40N, 105 59 36E', 27, 0),
(259, 'Quế Võ', 'Huyện', '21 08 44N, 106 11 06E', 27, 0),
(260, 'Tiên Du', 'Huyện', '21 07 37N, 106 02 19E', 27, 0),
(261, 'Từ Sơn', 'Thị Xã', '21 07 12N, 105 57 26E', 27, 0),
(262, 'Thuận Thành', 'Huyện', '21 02 24N, 106 04 10E', 27, 0),
(263, 'Gia Bình', 'Huyện', '21 03 55N, 106 12 53E', 27, 0),
(264, 'Lương Tài', 'Huyện', '21 01 33N, 106 13 28E', 27, 0),
(268, 'Hà Đông', 'Quận', '20 57 25N, 105 45 21E', 1, 1),
(269, 'Sơn Tây', 'Thị Xã', '21 05 51N, 105 28 27E', 1, 1),
(271, 'Ba Vì', 'Huyện', '21 09 40N, 105 22 43E', 1, 1),
(272, 'Phúc Thọ', 'Huyện', '21 06 32N, 105 34 52E', 1, 1),
(273, 'Đan Phượng', 'Huyện', '21 07 13N, 105 40 49E', 1, 1),
(274, 'Hoài Đức', 'Huyện', '21 01 25N, 105 42 03E', 1, 1),
(275, 'Quốc Oai', 'Huyện', '20 58 45N, 105 36 43E', 1, 1),
(276, 'Thạch Thất', 'Huyện', '21 02 17N, 105 33 05E', 1, 1),
(277, 'Chương Mỹ', 'Huyện', '20 52 46N, 105 39 01E', 1, 1),
(278, 'Thanh Oai', 'Huyện', '20 51 44N, 105 46 18E', 1, 1),
(279, 'Thường Tín', 'Huyện', '20 49 59N, 105 22 19E', 1, 1),
(280, 'Phú Xuyên', 'Huyện', '20 43 37N, 105 53 43E', 1, 1),
(281, 'Ứng Hòa', 'Huyện', '20 42 41N, 105 47 58E', 1, 1),
(282, 'Mỹ Đức', 'Huyện', '20 41 53N, 105 43 31E', 1, 1),
(288, 'Hải Dương', 'Thành Phố', '20 56 14N, 106 18 21E', 30, 0),
(290, 'Chí Linh', 'Huyện', '21 07 47N, 106 23 46E', 30, 0),
(291, 'Nam Sách', 'Huyện', '21 00 15N, 106 20 26E', 30, 0),
(292, 'Kinh Môn', 'Huyện', '21 00 04N, 106 30 23E', 30, 0),
(293, 'Kim Thành', 'Huyện', '20 55 40N, 106 30 33E', 30, 0),
(294, 'Thanh Hà', 'Huyện', '20 53 19N, 106 25 43E', 30, 0),
(295, 'Cẩm Giàng', 'Huyện', '20 57 05N, 106 12 29E', 30, 0),
(296, 'Bình Giang', 'Huyện', '20 52 36N, 106 11 24E', 30, 0),
(297, 'Gia Lộc', 'Huyện', '20 51 01N, 106 17 34E', 30, 0),
(298, 'Tứ Kỳ', 'Huyện', '20 49 05N, 106 24 05E', 30, 0),
(299, 'Ninh Giang', 'Huyện', '20 45 13N, 106 20 09E', 30, 0),
(300, 'Thanh Miện', 'Huyện', '20 46 02N, 106 12 26E', 30, 0),
(303, 'Hồng Bàng', 'Quận', '20 52 37N, 106 38 32E', 31, 0),
(304, 'Ngô Quyền', 'Quận', '20 51 13N, 106 41 57E', 31, 0),
(305, 'Lê Chân', 'Quận', '20 50 12N, 106 40 30E', 31, 0),
(306, 'Hải An', 'Quận', '20 49 38N, 106 45 57E', 31, 0),
(307, 'Kiến An', 'Quận', '20 48 26N, 106 38 03E', 31, 0),
(308, 'Đồ Sơn', 'Quận', '20 42 41N, 106 44 54E', 31, 0),
(309, 'Kinh Dương', 'Quận', '', 31, 0),
(311, 'Thuỷ Nguyên', 'Huyện', '20 56 36N, 106 39 38E', 31, 0),
(312, 'An Dương', 'Huyện', '20 53 06N, 106 35 36E', 31, 0),
(313, 'An Lão', 'Huyện', '20 47 54N, 106 33 19E', 31, 0),
(314, 'Kiến Thụy', 'Huyện', '20 45 13N, 106 41 47E', 31, 0),
(315, 'Tiên Lãng', 'Huyện', '20 42 23N, 106 36 03E', 31, 0),
(316, 'Vĩnh Bảo', 'Huyện', '20 40 56N, 106 29 57E', 31, 0),
(317, 'Cát Hải', 'Huyện', '20 47 09N, 106 58 07E', 31, 0),
(318, 'Bạch Long Vĩ', 'Huyện', '20 08 41N, 107 42 51E', 31, 0),
(323, 'Hưng Yên', 'Thành Phố', '20 39 38N, 106 03 08E', 33, 0),
(325, 'Văn Lâm', 'Huyện', '20 58 31N, 106 02 51E', 33, 0),
(326, 'Văn Giang', 'Huyện', '20 55 51N, 105 57 14E', 33, 0),
(327, 'Yên Mỹ', 'Huyện', '20 53 45N, 106 01 21E', 33, 0),
(328, 'Mỹ Hào', 'Huyện', '20 55 35N, 106 05 34E', 33, 0),
(329, 'Ân Thi', 'Huyện', '20 48 49N, 106 05 30E', 33, 0),
(330, 'Khoái Châu', 'Huyện', '20 49 53N, 105 58 28E', 33, 0),
(331, 'Kim Động', 'Huyện', '20 44 47N, 106 01 47E', 33, 0),
(332, 'Tiên Lữ', 'Huyện', '20 40 05N, 106 07 59E', 33, 0),
(333, 'Phù Cừ', 'Huyện', '20 42 51N, 106 11 30E', 33, 0),
(336, 'Thái Bình', 'Thành Phố', '20 26 45N, 106 19 56E', 34, 0),
(338, 'Quỳnh Phụ', 'Huyện', '20 38 57N, 106 21 16E', 34, 0),
(339, 'Hưng Hà', 'Huyện', '20 35 38N, 106 12 42E', 34, 0),
(340, 'Đông Hưng', 'Huyện', '20 32 50N, 106 20 15E', 34, 0),
(341, 'Thái Thụy', 'Huyện', '20 32 33N, 106 32 32E', 34, 0),
(342, 'Tiền Hải', 'Huyện', '20 21 05N, 106 32 45E', 34, 0),
(343, 'Kiến Xương', 'Huyện', '20 23 52N, 106 25 22E', 34, 0),
(344, 'Vũ Thư', 'Huyện', '20 25 29N, 106 16 43E', 34, 0),
(347, 'Phủ Lý', 'Thành Phố', '20 32 19N, 105 54 55E', 35, 0),
(349, 'Duy Tiên', 'Huyện', '20 37 33N, 105 58 01E', 35, 0),
(350, 'Kim Bảng', 'Huyện', '20 34 19N, 105 50 41E', 35, 0),
(351, 'Thanh Liêm', 'Huyện', '20 27 31N, 105 55 09E', 35, 0),
(352, 'Bình Lục', 'Huyện', '20 29 23N, 106 02 52E', 35, 0),
(353, 'Lý Nhân', 'Huyện', '20 32 55N, 106 04 48E', 35, 0),
(356, 'Nam Định', 'Thành Phố', '20 25 07N, 106 09 54E', 36, 0),
(358, 'Mỹ Lộc', 'Huyện', '20 27 21N, 106 07 56E', 36, 0),
(359, 'Vụ Bản', 'Huyện', '20 22 57N, 106 05 35E', 36, 0),
(360, 'Ý Yên', 'Huyện', '20 19 48N, 106 01 55E', 36, 0),
(361, 'Nghĩa Hưng', 'Huyện', '20 05 37N, 106 08 59E', 36, 0),
(362, 'Nam Trực', 'Huyện', '20 20 08N, 106 12 54E', 36, 0),
(363, 'Trực Ninh', 'Huyện', '20 14 42N, 106 12 45E', 36, 0),
(364, 'Xuân Trường', 'Huyện', '20 17 53N, 106 21 43E', 36, 0),
(365, 'Giao Thủy', 'Huyện', '20 14 45N, 106 28 39E', 36, 0),
(366, 'Hải Hậu', 'Huyện', '20 06 26N, 106 16 29E', 36, 0),
(369, 'Ninh Bình', 'Thành Phố', '20 14 45N, 105 58 24E', 37, 0),
(370, 'Tam Điệp', 'Thị Xã', '20 09 42N, 103 52 43E', 37, 0),
(372, 'Nho Quan', 'Huyện', '20 18 46N, 105 42 48E', 37, 0),
(373, 'Gia Viễn', 'Huyện', '20 19 50N, 105 52 20E', 37, 0),
(374, 'Hoa Lư', 'Huyện', '20 15 04N, 105 55 52E', 37, 0),
(375, 'Yên Khánh', 'Huyện', '20 11 26N, 106 04 33E', 37, 0),
(376, 'Kim Sơn', 'Huyện', '20 02 07N, 106 05 27E', 37, 0),
(377, 'Yên Mô', 'Huyện', '20 07 45N, 105 59 45E', 37, 0),
(380, 'Thanh Hóa', 'Thành Phố', '19 48 26N, 105 47 37E', 38, 0),
(381, 'Bỉm Sơn', 'Thị Xã', '20 05 21N, 105 51 48E', 38, 0),
(382, 'Sầm Sơn', 'Thị Xã', '19 45 11N, 105 54 03E', 38, 0),
(384, 'Mường Lát', 'Huyện', '20 30 42N, 104 37 27E', 38, 0),
(385, 'Quan Hóa', 'Huyện', '20 29 15N, 104 56 35E', 38, 0),
(386, 'Bá Thước', 'Huyện', '20 22 48N, 105 14 50E', 38, 0),
(387, 'Quan Sơn', 'Huyện', '20 15 17N, 104 51 58E', 38, 0),
(388, 'Lang Chánh', 'Huyện', '20 08 58N, 105 07 40E', 38, 0),
(389, 'Ngọc Lặc', 'Huyện', '20 04 08N, 105 22 39E', 38, 0),
(390, 'Cẩm Thủy', 'Huyện', '20 12 20N, 105 27 22E', 38, 0),
(391, 'Thạch Thành', 'Huyện', '21 12 41N, 105 36 38E', 38, 0),
(392, 'Hà Trung', 'Huyện', '20 03 20N, 105 51 20E', 38, 0),
(393, 'Vĩnh Lộc', 'Huyện', '20 02 29N, 105 39 28E', 38, 0),
(394, 'Yên Định', 'Huyện', '20 00 31N, 105 37 44E', 38, 0),
(395, 'Thọ Xuân', 'Huyện', '19 55 39N, 105 29 14E', 38, 0),
(396, 'Thường Xuân', 'Huyện', '19 54 55N, 105 10 46E', 38, 0),
(397, 'Triệu Sơn', 'Huyện', '19 48 11N, 105 34 03E', 38, 0),
(398, 'Thiệu Hoá', 'Huyện', '19 53 56N, 105 40 57E', 38, 0),
(399, 'Hoằng Hóa', 'Huyện', '19 51 59N, 105 51 34E', 38, 0),
(400, 'Hậu Lộc', 'Huyện', '19 56 02N, 105 53 19E', 38, 0),
(401, 'Nga Sơn', 'Huyện', '20 00 16N, 105 59 26E', 38, 0),
(402, 'Như Xuân', 'Huyện', '19 5 55N, 105 20 22E', 38, 0),
(403, 'Như Thanh', 'Huyện', '19 35 19N, 105 33 09E', 38, 0),
(404, 'Nông Cống', 'Huyện', '19 36 58N, 105 40 54E', 38, 0),
(405, 'Đông Sơn', 'Huyện', '19 47 44N, 105 42 19E', 38, 0),
(406, 'Quảng Xương', 'Huyện', '19 40 53N, 105 48 01E', 38, 0),
(407, 'Tĩnh Gia', 'Huyện', '19 27 13N, 105 43 38E', 38, 0),
(412, 'Vinh', 'Thành Phố', '18 41 06N, 105 42 05E', 40, 0),
(413, 'Cửa Lò', 'Thị Xã', '18 47 26N, 105 43 31E', 40, 0),
(414, 'Thái Hoà', 'Thị Xã', '', 40, 0),
(415, 'Quế Phong', 'Huyện', '19 42 25N, 104 54 21E', 40, 0),
(416, 'Quỳ Châu', 'Huyện', '19 32 16N, 105 03 18E', 40, 0),
(417, 'Kỳ Sơn', 'Huyện', '19 24 36N, 104 09 45E', 40, 0),
(418, 'Tương Dương', 'Huyện', '19 19 15N, 104 35 41E', 40, 0),
(419, 'Nghĩa Đàn', 'Huyện', '19 21 19N, 105 26 33E', 40, 0),
(420, 'Quỳ Hợp', 'Huyện', '19 19 24N, 105 09 12E', 40, 0),
(421, 'Quỳnh Lưu', 'Huyện', '19 14 01N, 105 37 00E', 40, 0),
(422, 'Con Cuông', 'Huyện', '19 03 50N, 107 47 15E', 40, 0),
(423, 'Tân Kỳ', 'Huyện', '19 06 11N, 105 14 14E', 40, 0),
(424, 'Anh Sơn', 'Huyện', '18 58 04N, 105 04 30E', 40, 0),
(425, 'Diễn Châu', 'Huyện', '19 01 20N, 105 34 13E', 40, 0),
(426, 'Yên Thành', 'Huyện', '19 01 25N, 105 26 17E', 40, 0),
(427, 'Đô Lương', 'Huyện', '18 55 00N, 105 21 03E', 40, 0),
(428, 'Thanh Chương', 'Huyện', '18 44 11N, 105 12 59E', 40, 0),
(429, 'Nghi Lộc', 'Huyện', '18 47 41N, 105 31 30E', 40, 0),
(430, 'Nam Đàn', 'Huyện', '18 40 28N, 105 30 32E', 40, 0),
(431, 'Hưng Nguyên', 'Huyện', '18 41 13N, 105 37 41E', 40, 0),
(436, 'Hà Tĩnh', 'Thành Phố', '18 21 20N, 105 54 00E', 42, 0),
(437, 'Hồng Lĩnh', 'Thị Xã', '18 32 05N, 105 42 40E', 42, 0),
(439, 'Hương Sơn', 'Huyện', '18 26 47N, 105 19 36E', 42, 0),
(440, 'Đức Thọ', 'Huyện', '18 29 23N, 105 36 39E', 42, 0),
(441, 'Vũ Quang', 'Huyện', '18 19 30N, 105 26 38E', 42, 0),
(442, 'Nghi Xuân', 'Huyện', '18 38 46N, 105 46 17E', 42, 0),
(443, 'Can Lộc', 'Huyện', '18 26 39N, 105 46 13E', 42, 0),
(444, 'Hương Khê', 'Huyện', '18 11 36N, 105 41 24E', 42, 0),
(445, 'Thạch Hà', 'Huyện', '18 19 29N, 105 52 43E', 42, 0),
(446, 'Cẩm Xuyên', 'Huyện', '18 11 32N, 106 00 04E', 42, 0),
(447, 'Kỳ Anh', 'Huyện', '18 05 15N, 106 15 49E', 42, 0),
(448, 'Lộc Hà', 'Huyện', '', 42, 0),
(450, 'Đồng Hới', 'Thành Phố', '17 26 53N, 106 35 15E', 44, 0),
(452, 'Minh Hóa', 'Huyện', '17 44 03N, 105 51 45E', 44, 0),
(453, 'Tuyên Hóa', 'Huyện', '17 54 04N, 105 58 17E', 44, 0),
(454, 'Quảng Trạch', 'Huyện', '17 50 04N, 106 22 24E', 44, 0),
(455, 'Bố Trạch', 'Huyện', '17 29 13N, 106 06 54E', 44, 0),
(456, 'Quảng Ninh', 'Huyện', '17 15 15N, 106 32 31E', 44, 0),
(457, 'Lệ Thủy', 'Huyện', '17 07 35N, 106 41 47E', 44, 0),
(461, 'Đông Hà', 'Thành Phố', '16 48 12N, 107 05 12E', 45, 0),
(462, 'Quảng Trị', 'Thị Xã', '16 44 37N, 107 11 20E', 45, 0),
(464, 'Vĩnh Linh', 'Huyện', '17 01 35N, 106 53 49E', 45, 0),
(465, 'Hướng Hóa', 'Huyện', '16 42 19N, 106 40 14E', 45, 0),
(466, 'Gio Linh', 'Huyện', '16 54 49N, 106 56 16E', 45, 0),
(467, 'Đa Krông', 'Huyện', '16 33 58N, 106 55 49E', 45, 0),
(468, 'Cam Lộ', 'Huyện', '16 47 09N, 106 57 52E', 45, 0),
(469, 'Triệu Phong', 'Huyện', '16 46 32N, 107 09 12E', 45, 0),
(470, 'Hải Lăng', 'Huyện', '16 41 07N, 107 13 34E', 45, 0),
(471, 'Cồn Cỏ', 'Huyện', '19 09 39N, 107 19 58E', 45, 0),
(474, 'Huế', 'Thành Phố', '16 27 16N, 107 34 29E', 46, 0),
(476, 'Phong Điền', 'Huyện', '16 32 42N, 106 16 37E', 46, 0),
(477, 'Quảng Điền', 'Huyện', '16 35 21N, 107 29 31E', 46, 0),
(478, 'Phú Vang', 'Huyện', '16 27 20N, 107 42 28E', 46, 0),
(479, 'Hương Thủy', 'Huyện', '16 19 27N, 107 37 26E', 46, 0),
(480, 'Hương Trà', 'Huyện', '16 25 49N, 107 28 37E', 46, 0),
(481, 'A Lưới', 'Huyện', '16 13 59N, 107 16 12E', 46, 0),
(482, 'Phú Lộc', 'Huyện', '16 17 16N, 107 55 25E', 46, 0),
(483, 'Nam Đông', 'Huyện', '16 07 11N, 107 41 25E', 46, 0),
(490, 'Liên Chiểu', 'Quận', '16 07 26N, 108 07 04E', 48, 0),
(491, 'Thanh Khê', 'Quận', '16 03 28N, 108 11 00E', 48, 0),
(492, 'Hải Châu', 'Quận', '16 03 38N, 108 11 46E', 48, 0),
(493, 'Sơn Trà', 'Quận', '16 06 13N, 108 16 26E', 48, 0),
(494, 'Ngũ Hành Sơn', 'Quận', '16 00 30N, 108 15 09E', 48, 0),
(495, 'Cẩm Lệ', 'Quận', '', 48, 0),
(497, 'Hoà Vang', 'Huyện', '16 03 59N, 108 01 57E', 48, 0),
(498, 'Hoàng Sa', 'Huyện', '16 21 36N, 111 57 01E', 48, 0),
(502, 'Tam Kỳ', 'Thành Phố', '15 34 37N, 108 29 52E', 49, 0),
(503, 'Hội An', 'Thành Phố', '15 53 20N, 108 20 42E', 49, 0),
(504, 'Tây Giang', 'Huyện', '15 53 46N, 107 25 52E', 49, 0),
(505, 'Đông Giang', 'Huyện', '15 54 44N, 107 47 06E', 49, 0),
(506, 'Đại Lộc', 'Huyện', '15 50 10N, 107 58 27E', 49, 0),
(507, 'Điện Bàn', 'Huyện', '15 54 15N, 108 13 38E', 49, 0),
(508, 'Duy Xuyên', 'Huyện', '15 47 58N, 108 13 27E', 49, 0),
(509, 'Quế Sơn', 'Huyện', '15 41 03N, 108 05 34E', 49, 0),
(510, 'Nam Giang', 'Huyện', '15 36 37N, 107 33 52E', 49, 0),
(511, 'Phước Sơn', 'Huyện', '15 23 17N, 107 50 22E', 49, 0),
(512, 'Hiệp Đức', 'Huyện', '15 31 09N, 108 05 56E', 49, 0),
(513, 'Thăng Bình', 'Huyện', '15 42 29N, 108 22 04E', 49, 0),
(514, 'Tiên Phước', 'Huyện', '15 29 30N, 108 15 28E', 49, 0),
(515, 'Bắc Trà My', 'Huyện', '15 08 00N, 108 05 32E', 49, 0),
(516, 'Nam Trà My', 'Huyện', '15 16 40N, 108 12 15E', 49, 0),
(517, 'Núi Thành', 'Huyện', '15 26 53N, 108 34 49E', 49, 0),
(518, 'Phú Ninh', 'Huyện', '15 30 43N, 108 24 43E', 49, 0),
(519, 'Nông Sơn', 'Huyện', '', 49, 0),
(522, 'Quảng Ngãi', 'Thành Phố', '15 07 17N, 108 48 24E', 51, 0),
(524, 'Bình Sơn', 'Huyện', '15 18 45N, 108 45 35E', 51, 0),
(525, 'Trà Bồng', 'Huyện', '15 13 30N, 108 29 57E', 51, 0),
(526, 'Tây Trà', 'Huyện', '15 11 13N, 108 22 23E', 51, 0),
(527, 'Sơn Tịnh', 'Huyện', '15 11 49N, 108 45 03E', 51, 0),
(528, 'Tư Nghĩa', 'Huyện', '15 05 25N, 108 45 23E', 51, 0),
(529, 'Sơn Hà', 'Huyện', '14 58 35N, 108 29 09E', 51, 0),
(530, 'Sơn Tây', 'Huyện', '14 58 11N, 108 21 22E', 51, 0),
(531, 'Minh Long', 'Huyện', '14 56 49N, 108 40 19E', 51, 0),
(532, 'Nghĩa Hành', 'Huyện', '14 58 06N, 108 46 05E', 51, 0),
(533, 'Mộ Đức', 'Huyện', '11 59 13N, 108 52 21E', 51, 0),
(534, 'Đức Phổ', 'Huyện', '14 44 59N, 108 56 58E', 51, 0),
(535, 'Ba Tơ', 'Huyện', '14 42 52N, 108 43 44E', 51, 0),
(536, 'Lý Sơn', 'Huyện', '15 22 50N, 109 06 56E', 51, 0),
(540, 'Qui Nhơn', 'Thành Phố', '13 47 15N, 109 12 48E', 52, 0),
(542, 'An Lão', 'Huyện', '14 32 10N, 108 47 52E', 52, 0),
(543, 'Hoài Nhơn', 'Huyện', '14 30 56N, 109 01 56E', 52, 0),
(544, 'Hoài Ân', 'Huyện', '14 20 51N, 108 54 04E', 52, 0),
(545, 'Phù Mỹ', 'Huyện', '14 14 41N, 109 05 43E', 52, 0),
(546, 'Vĩnh Thạnh', 'Huyện', '14 14 26N, 108 44 08E', 52, 0),
(547, 'Tây Sơn', 'Huyện', '13 56 47N, 108 53 06E', 52, 0),
(548, 'Phù Cát', 'Huyện', '14 03 48N, 109 03 57E', 52, 0),
(549, 'An Nhơn', 'Huyện', '13 51 28N, 109 04 02E', 52, 0),
(550, 'Tuy Phước', 'Huyện', '13 46 30N, 109 05 38E', 52, 0),
(551, 'Vân Canh', 'Huyện', '13 40 35N, 108 57 52E', 52, 0),
(555, 'Tuy Hòa', 'Thành Phố', '13 05 42N, 109 15 50E', 54, 0),
(557, 'Sông Cầu', 'Thị Xã', '13 31 40N, 109 12 39E', 54, 0),
(558, 'Đồng Xuân', 'Huyện', '13 24 59N, 108 56 46E', 54, 0),
(559, 'Tuy An', 'Huyện', '13 15 19N, 109 12 21E', 54, 0),
(560, 'Sơn Hòa', 'Huyện', '13 12 16N, 108 57 17E', 54, 0),
(561, 'Sông Hinh', 'Huyện', '12 54 19N, 108 53 38E', 54, 0),
(562, 'Tây Hoà', 'Huyện', '', 54, 0),
(563, 'Phú Hoà', 'Huyện', '13 04 07N, 109 11 24E', 54, 0),
(564, 'Đông Hoà', 'Huyện', '', 54, 0),
(568, 'Nha Trang', 'Thành Phố', '12 15 40N, 109 10 40E', 56, 0),
(569, 'Cam Ranh', 'Thị Xã', '11 59 05N, 108 08 17E', 56, 0),
(570, 'Cam Lâm', 'Huyện', '', 56, 0),
(571, 'Vạn Ninh', 'Huyện', '12 43 10N, 109 11 18E', 56, 0),
(572, 'Ninh Hòa', 'Huyện', '12 32 54N, 109 06 11E', 56, 0),
(573, 'Khánh Vĩnh', 'Huyện', '12 17 50N, 108 51 56E', 56, 0),
(574, 'Diên Khánh', 'Huyện', '12 13 19N, 109 02 16E', 56, 0),
(575, 'Khánh Sơn', 'Huyện', '12 02 17N, 108 53 47E', 56, 0),
(576, 'Trường Sa', 'Huyện', '9 07 27N, 114 15 00E', 56, 0),
(582, 'Phan Rang-Tháp Chàm', 'Thành Phố', '11 36 11N, 108 58 34E', 58, 0),
(584, 'Bác Ái', 'Huyện', '11 54 45N, 108 51 29E', 58, 0),
(585, 'Ninh Sơn', 'Huyện', '11 42 36N, 108 44 55E', 58, 0),
(586, 'Ninh Hải', 'Huyện', '11 42 46N, 109 05 41E', 58, 0),
(587, 'Ninh Phước', 'Huyện', '11 28 56N, 108 50 34E', 58, 0),
(588, 'Thuận Bắc', 'Huyện', '', 58, 0),
(589, 'Thuận Nam', 'Huyện', '', 58, 0),
(593, 'Phan Thiết', 'Thành Phố', '10 54 16N, 108 03 44E', 60, 0),
(594, 'La Gi', 'Thị Xã', '', 60, 0),
(595, 'Tuy Phong', 'Huyện', '11 20 26N, 108 41 15E', 60, 0),
(596, 'Bắc Bình', 'Huyện', '11 15 52N, 108 21 33E', 60, 0),
(597, 'Hàm Thuận Bắc', 'Huyện', '11 09 18N, 108 03 07E', 60, 0),
(598, 'Hàm Thuận Nam', 'Huyện', '10 56 20N, 107 54 38E', 60, 0),
(599, 'Tánh Linh', 'Huyện', '11 08 26N, 107 41 22E', 60, 0),
(600, 'Đức Linh', 'Huyện', '11 11 43N, 107 31 34E', 60, 0),
(601, 'Hàm Tân', 'Huyện', '10 44 41N, 107 41 33E', 60, 0),
(602, 'Phú Quí', 'Huyện', '10 33 13N, 108 57 46E', 60, 0),
(608, 'Kon Tum', 'Thành Phố', '14 20 32N, 107 58 04E', 62, 0),
(610, 'Đắk Glei', 'Huyện', '15 08 13N, 107 44 03E', 62, 0),
(611, 'Ngọc Hồi', 'Huyện', '14 44 23N, 107 38 49E', 62, 0),
(612, 'Đắk Tô', 'Huyện', '14 46 49N, 107 55 36E', 62, 0),
(613, 'Kon Plông', 'Huyện', '14 48 13N, 108 20 05E', 62, 0),
(614, 'Kon Rẫy', 'Huyện', '14 32 56N, 108 13 09E', 62, 0),
(615, 'Đắk Hà', 'Huyện', '14 36 50N, 107 59 55E', 62, 0),
(616, 'Sa Thầy', 'Huyện', '14 16 02N, 107 36 30E', 62, 0),
(617, 'Tu Mơ Rông', 'Huyện', '', 62, 0),
(622, 'Pleiku', 'Thành Phố', '13 57 42N, 107 58 03E', 64, 0),
(623, 'An Khê', 'Thị Xã', '14 01 24N, 108 41 29E', 64, 0),
(624, 'Ayun Pa', 'Thị Xã', '', 64, 0),
(625, 'Kbang', 'Huyện', '14 18 08N, 108 29 17E', 64, 0),
(626, 'Đăk Đoa', 'Huyện', '14 07 02N, 108 09 36E', 64, 0),
(627, 'Chư Păh', 'Huyện', '14 13 30N, 107 56 33E', 64, 0),
(628, 'Ia Grai', 'Huyện', '13 59 25N, 107 43 16E', 64, 0),
(629, 'Mang Yang', 'Huyện', '13 57 26N, 108 18 37E', 64, 0),
(630, 'Kông Chro', 'Huyện', '13 45 47N, 108 36 04E', 64, 0),
(631, 'Đức Cơ', 'Huyện', '13 46 16N, 107 38 26E', 64, 0),
(632, 'Chư Prông', 'Huyện', '13 35 39N, 107 47 36E', 64, 0),
(633, 'Chư Sê', 'Huyện', '13 37 04N, 108 06 56E', 64, 0),
(634, 'Đăk Pơ', 'Huyện', '13 55 47N, 108 36 16E', 64, 0),
(635, 'Ia Pa', 'Huyện', '13 31 37N, 108 30 34E', 64, 0),
(637, 'Krông Pa', 'Huyện', '13 14 13N, 108 39 12E', 64, 0),
(638, 'Phú Thiện', 'Huyện', '', 64, 0),
(639, 'Chư Pưh', 'Huyện', '', 64, 0),
(643, 'Buôn Ma Thuột', 'Thành Phố', '12 39 43N, 108 10 40E', 66, 0),
(644, 'Buôn Hồ', 'Thị Xã', '', 66, 0),
(645, 'Ea H\'leo', 'Huyện', '13 13 52N, 108 12 30E', 66, 0),
(646, 'Ea Súp', 'Huyện', '13 10 59N, 107 46 49E', 66, 0),
(647, 'Buôn Đôn', 'Huyện', '12 52 45N, 107 45 20E', 66, 0),
(648, 'Cư M\'gar', 'Huyện', '12 53 47N, 108 04 16E', 66, 0),
(649, 'Krông Búk', 'Huyện', '12 56 27N, 108 13 54E', 66, 0),
(650, 'Krông Năng', 'Huyện', '12 59 41N, 108 23 42E', 66, 0),
(651, 'Ea Kar', 'Huyện', '12 48 17N, 108 32 42E', 66, 0),
(652, 'M\'đrắk', 'Huyện', '12 42 14N, 108 47 09E', 66, 0),
(653, 'Krông Bông', 'Huyện', '12 27 08N, 108 27 01E', 66, 0),
(654, 'Krông Pắc', 'Huyện', '12 41 20N, 108 18 42E', 66, 0),
(655, 'Krông A Na', 'Huyện', '12 31 51N, 108 05 03E', 66, 0),
(656, 'Lắk', 'Huyện', '12 19 20N, 108 12 17E', 66, 0),
(657, 'Cư Kuin', 'Huyện', '', 66, 0),
(660, 'Gia Nghĩa', 'Thị Xã', '', 67, 0),
(661, 'Đắk Glong', 'Huyện', '12 01 53N, 107 50 37E', 67, 0),
(662, 'Cư Jút', 'Huyện', '12 40 56N, 107 44 44E', 67, 0),
(663, 'Đắk Mil', 'Huyện', '12 31 08N, 107 42 24E', 67, 0),
(664, 'Krông Nô', 'Huyện', '12 22 16N, 107 53 49E', 67, 0),
(665, 'Đắk Song', 'Huyện', '12 14 04N, 107 36 30E', 67, 0),
(666, 'Đắk R\'lấp', 'Huyện', '12 02 30N, 107 25 59E', 67, 0),
(667, 'Tuy Đức', 'Huyện', '', 67, 0),
(672, 'Đà Lạt', 'Thành Phố', '11 54 33N, 108 27 08E', 68, 0),
(673, 'Bảo Lộc', 'Thị Xã', '11 32 48N, 107 47 37E', 68, 0),
(674, 'Đam Rông', 'Huyện', '12 02 35N, 108 10 26E', 68, 0),
(675, 'Lạc Dương', 'Huyện', '12 08 30N, 108 27 48E', 68, 0),
(676, 'Lâm Hà', 'Huyện', '11 55 26N, 108 11 31E', 68, 0),
(677, 'Đơn Dương', 'Huyện', '11 48 26N, 108 32 48E', 68, 0),
(678, 'Đức Trọng', 'Huyện', '11 41 50N, 108 18 58E', 68, 0),
(679, 'Di Linh', 'Huyện', '11 31 10N, 108 05 23E', 68, 0),
(680, 'Bảo Lâm', 'Huyện', '11 38 31N, 107 43 25E', 68, 0),
(681, 'Đạ Huoai', 'Huyện', '11 27 11N, 107 38 08E', 68, 0),
(682, 'Đạ Tẻh', 'Huyện', '11 33 46N, 107 32 00E', 68, 0),
(683, 'Cát Tiên', 'Huyện', '11 39 38N, 107 23 27E', 68, 0),
(688, 'Phước Long', 'Thị Xã', '', 70, 0),
(689, 'Đồng Xoài', 'Thị Xã', '11 31 01N, 106 50 21E', 70, 0),
(690, 'Bình Long', 'Thị Xã', '', 70, 0),
(691, 'Bù Gia Mập', 'Huyện', '11 56 57N, 106 59 21E', 70, 0),
(692, 'Lộc Ninh', 'Huyện', '11 49 28N, 106 35 11E', 70, 0),
(693, 'Bù Đốp', 'Huyện', '11 59 08N, 106 49 54E', 70, 0),
(694, 'Hớn Quản', 'Huyện', '11 37 37N, 106 36 02E', 70, 0),
(695, 'Đồng Phù', 'Huyện', '11 28 45N, 106 57 07E', 70, 0),
(696, 'Bù Đăng', 'Huyện', '11 46 09N, 107 14 14E', 70, 0),
(697, 'Chơn Thành', 'Huyện', '11 28 45N, 106 39 26E', 70, 0),
(703, 'Tây Ninh', 'Thị Xã', '11 21 59N, 106 07 47E', 72, 0),
(705, 'Tân Biên', 'Huyện', '11 35 14N, 105 57 53E', 72, 0),
(706, 'Tân Châu', 'Huyện', '11 34 49N, 106 17 48E', 72, 0),
(707, 'Dương Minh Châu', 'Huyện', '11 22 04N, 106 16 58E', 72, 0),
(708, 'Châu Thành', 'Huyện', '11 19 02N, 106 00 15E', 72, 0),
(709, 'Hòa Thành', 'Huyện', '11 15 31N, 106 08 44E', 72, 0),
(710, 'Gò Dầu', 'Huyện', '11 09 39N, 106 14 42E', 72, 0),
(711, 'Bến Cầu', 'Huyện', '11 07 50N, 106 08 25E', 72, 0),
(712, 'Trảng Bàng', 'Huyện', '11 06 18N, 106 23 12E', 72, 0),
(718, 'Thủ Dầu Một', 'Thị Xã', '11 00 01N, 106 38 56E', 74, 0),
(720, 'Dầu Tiếng', 'Huyện', '11 19 07N, 106 26 59E', 74, 0),
(721, 'Bến Cát', 'Huyện', '11 12 42N, 106 36 28E', 74, 0),
(722, 'Phú Giáo', 'Huyện', '11 20 21N, 106 47 48E', 74, 0),
(723, 'Tân Uyên', 'Huyện', '11 06 31N, 106 49 02E', 74, 0),
(724, 'Dĩ An', 'Huyện', '10 55 03N, 106 47 09E', 74, 0),
(725, 'Thuận An', 'Huyện', '10 55 58N, 106 41 59E', 74, 0),
(731, 'Biên Hòa', 'Thành Phố', '10 56 31N, 106 50 50E', 75, 0),
(732, 'Long Khánh', 'Thị Xã', '10 56 24N, 107 14 29E', 75, 0),
(734, 'Tân Phú', 'Huyện', '11 22 51N, 107 21 35E', 75, 0),
(735, 'Vĩnh Cửu', 'Huyện', '11 14 31N, 107 00 06E', 75, 0),
(736, 'Định Quán', 'Huyện', '11 12 41N, 107 17 03E', 75, 0),
(737, 'Trảng Bom', 'Huyện', '10 58 39N, 107 00 52E', 75, 0),
(738, 'Thống Nhất', 'Huyện', '10 58 29N, 107 09 26E', 75, 0),
(739, 'Cẩm Mỹ', 'Huyện', '10 47 05N, 107 14 36E', 75, 0),
(740, 'Long Thành', 'Huyện', '10 47 38N, 106 59 42E', 75, 0),
(741, 'Xuân Lộc', 'Huyện', '10 55 39N, 107 24 21E', 75, 0),
(742, 'Nhơn Trạch', 'Huyện', '10 39 18N, 106 53 18E', 75, 0),
(747, 'Vũng Tầu', 'Thành Phố', '10 24 08N, 107 07 05E', 77, 0),
(748, 'Bà Rịa', 'Thị Xã', '10 30 33N, 107 10 47E', 77, 0),
(750, 'Châu Đức', 'Huyện', '10 39 23N, 107 15 08E', 77, 0),
(751, 'Xuyên Mộc', 'Huyện', '10 37 46N, 107 29 39E', 77, 0),
(752, 'Long Điền', 'Huyện', '10 26 47N, 107 12 53E', 77, 0),
(753, 'Đất Đỏ', 'Huyện', '10 28 40N, 107 18 27E', 77, 0),
(754, 'Tân Thành', 'Huyện', '10 34 50N, 107 05 06E', 77, 0),
(755, 'Côn Đảo', 'Huyện', '8 42 25N, 106 36 05E', 77, 0),
(760, 'Quận 1', 'Quận', '10 46 34N, 106 41 45E', 79, 0),
(761, 'Quận 12', 'Quận', '10 51 43N, 106 39 32E', 79, 0),
(762, 'Thủ Đức', 'Quận', '10 51 20N, 106 45 05E', 79, 0),
(763, 'Quận 9', 'Quận', '10 49 49N, 106 49 03E', 79, 0),
(764, 'Gò Vấp', 'Quận', '10 50 12N, 106 39 52E', 79, 0),
(765, 'Bình Thạnh', 'Quận', '10 48 46N, 106 42 57E', 79, 0),
(766, 'Tân Bình', 'Quận', '10 48 13N, 106 39 03E', 79, 0),
(767, 'Tân Phú', 'Quận', '10 47 32N, 106 37 31E', 79, 0),
(768, 'Phú Nhuận', 'Quận', '10 48 06N, 106 40 39E', 79, 0),
(769, 'Quận 2', 'Quận', '10 46 51N, 106 45 25E', 79, 0),
(770, 'Quận 3', 'Quận', '10 46 48N, 106 40 46E', 79, 0),
(771, 'Quận 10', 'Quận', '10 46 25N, 106 40 02E', 79, 0),
(772, 'Quận 11', 'Quận', '10 46 01N, 106 38 44E', 79, 0),
(773, 'Quận 4', 'Quận', '10 45 42N, 106 42 09E', 79, 0),
(774, 'Quận 5', 'Quận', '10 45 24N, 106 40 00E', 79, 0),
(775, 'Quận 6', 'Quận', '10 44 46N, 106 38 10E', 79, 0),
(776, 'Quận 8', 'Quận', '10 43 24N, 106 37 40E', 79, 0),
(777, 'Bình Tân', 'Quận', '10 46 16N, 106 35 26E', 79, 0),
(778, 'Quận 7', 'Quận', '10 44 19N, 106 43 35E', 79, 0),
(783, 'Củ Chi', 'Huyện', '11 02 17N, 106 30 20E', 79, 0),
(784, 'Hóc Môn', 'Huyện', '10 52 42N, 106 35 33E', 79, 0),
(785, 'Bình Chánh', 'Huyện', '10 45 01N, 106 30 45E', 79, 0),
(786, 'Nhà Bè', 'Huyện', '10 39 06N, 106 43 35E', 79, 0),
(787, 'Cần Giờ', 'Huyện', '10 30 43N, 106 52 50E', 79, 0),
(794, 'Tân An', 'Thành Phố', '10 31 36N, 106 24 06E', 80, 0),
(796, 'Tân Hưng', 'Huyện', '10 49 05N, 105 39 26E', 80, 0),
(797, 'Vĩnh Hưng', 'Huyện', '10 52 54N, 105 45 58E', 80, 0),
(798, 'Mộc Hóa', 'Huyện', '10 47 09N, 105 57 56E', 80, 0),
(799, 'Tân Thạnh', 'Huyện', '10 37 44N, 105 57 07E', 80, 0),
(800, 'Thạnh Hóa', 'Huyện', '10 41 37N, 106 11 08E', 80, 0),
(801, 'Đức Huệ', 'Huyện', '10 51 57N, 106 15 48E', 80, 0),
(802, 'Đức Hòa', 'Huyện', '10 53 04N, 106 23 58E', 80, 0),
(803, 'Bến Lức', 'Huyện', '10 41 40N, 106 26 28E', 80, 0),
(804, 'Thủ Thừa', 'Huyện', '10 39 41N, 106 20 12E', 80, 0),
(805, 'Tân Trụ', 'Huyện', '10 31 47N, 106 30 06E', 80, 0),
(806, 'Cần Đước', 'Huyện', '10 32 21N, 106 36 33E', 80, 0),
(807, 'Cần Giuộc', 'Huyện', '10 34 43N, 106 38 35E', 80, 0),
(808, 'Châu Thành', 'Huyện', '10 27 52N, 106 30 00E', 80, 0),
(815, 'Mỹ Tho', 'Thành Phố', '10 22 14N, 106 21 52E', 82, 0),
(816, 'Gò Công', 'Thị Xã', '10 21 55N, 106 40 24E', 82, 0),
(818, 'Tân Phước', 'Huyện', '10 30 36N, 106 13 02E', 82, 0),
(819, 'Cái Bè', 'Huyện', '10 24 21N, 105 56 01E', 82, 0),
(820, 'Cai Lậy', 'Huyện', '10 24 20N, 106 06 05E', 82, 0),
(821, 'Châu Thành', 'Huyện', '20 25 21N, 106 16 57E', 82, 0),
(822, 'Chợ Gạo', 'Huyện', '10 23 45N, 106 26 53E', 82, 0),
(823, 'Gò Công Tây', 'Huyện', '10 19 55N, 106 35 02E', 82, 0),
(824, 'Gò Công Đông', 'Huyện', '10 20 42N, 106 42 54E', 82, 0),
(825, 'Tân Phú Đông', 'Huyện', '', 82, 0),
(829, 'Bến Tre', 'Thành Phố', '10 14 17N, 106 22 26E', 83, 0),
(831, 'Châu Thành', 'Huyện', '10 17 24N, 106 17 45E', 83, 0),
(832, 'Chợ Lách', 'Huyện', '10 13 26N, 106 09 08E', 83, 0),
(833, 'Mỏ Cày Nam', 'Huyện', '10 06 56N, 106 19 40E', 83, 0),
(834, 'Giồng Trôm', 'Huyện', '10 08 46N, 106 28 12E', 83, 0),
(835, 'Bình Đại', 'Huyện', '10 09 56N, 106 37 46E', 83, 0),
(836, 'Ba Tri', 'Huyện', '10 04 08N, 106 35 10E', 83, 0),
(837, 'Thạnh Phú', 'Huyện', '9 55 53N, 106 32 45E', 83, 0),
(838, 'Mỏ Cày Bắc', 'Huyện', '', 83, 0),
(842, 'Trà Vinh', 'Thị Xã', '9 57 09N, 106 20 39E', 84, 0),
(844, 'Càng Long', 'Huyện', '9 58 18N, 106 12 52E', 84, 0),
(845, 'Cầu Kè', 'Huyện', '9 51 23N, 106 03 33E', 84, 0),
(846, 'Tiểu Cần', 'Huyện', '9 48 37N, 106 12 06E', 84, 0),
(847, 'Châu Thành', 'Huyện', '9 52 57N, 106 24 12E', 84, 0),
(848, 'Cầu Ngang', 'Huyện', '9 47 14N, 106 29 19E', 84, 0),
(849, 'Trà Cú', 'Huyện', '9 42 06N, 106 16 24E', 84, 0),
(850, 'Duyên Hải', 'Huyện', '9 39 58N, 106 26 23E', 84, 0),
(855, 'Vĩnh Long', 'Thành Phố', '10 15 09N, 105 56 08E', 86, 0),
(857, 'Long Hồ', 'Huyện', '10 13 58N, 105 55 47E', 86, 0),
(858, 'Mang Thít', 'Huyện', '10 10 58N, 106 05 13E', 86, 0),
(859, 'Vũng Liêm', 'Huyện', '10 03 32N, 106 10 35E', 86, 0),
(860, 'Tam Bình', 'Huyện', '10 03 58N, 105 58 03E', 86, 0),
(861, 'Bình Minh', 'Huyện', '10 05 45N, 105 47 21E', 86, 0),
(862, 'Trà Ôn', 'Huyện', '9 59 20N, 105 57 56E', 86, 0),
(863, 'Bình Tân', 'Huyện', '', 86, 0),
(866, 'Cao Lãnh', 'Thành Phố', '10 27 38N, 105 37 21E', 87, 0),
(867, 'Sa Đéc', 'Thị Xã', '10 19 22N, 105 44 31E', 87, 0),
(868, 'Hồng Ngự', 'Thị Xã', '', 87, 0),
(869, 'Tân Hồng', 'Huyện', '10 52 48N, 105 29 21E', 87, 0),
(870, 'Hồng Ngự', 'Huyện', '10 48 13N, 105 19 00E', 87, 0),
(871, 'Tam Nông', 'Huyện', '10 44 06N, 105 30 58E', 87, 0),
(872, 'Tháp Mười', 'Huyện', '10 33 36N, 105 47 13E', 87, 0),
(873, 'Cao Lãnh', 'Huyện', '10 29 03N, 105 41 40E', 87, 0),
(874, 'Thanh Bình', 'Huyện', '10 36 38N, 105 28 51E', 87, 0),
(875, 'Lấp Vò', 'Huyện', '10 21 27N, 105 36 06E', 87, 0),
(876, 'Lai Vung', 'Huyện', '10 14 43N, 105 38 40E', 87, 0),
(877, 'Châu Thành', 'Huyện', '10 13 27N, 105 48 38E', 87, 0),
(883, 'Long Xuyên', 'Thành Phố', '10 22 22N, 105 25 33E', 89, 0),
(884, 'Châu Đốc', 'Thị Xã', '10 41 20N, 105 05 15E', 89, 0),
(886, 'An Phú', 'Huyện', '10 50 12N, 105 05 33E', 89, 0),
(887, 'Tân Châu', 'Thị Xã', '10 49 11N, 105 11 18E', 89, 0),
(888, 'Phú Tân', 'Huyện', '10 40 26N, 105 14 40E', 89, 0),
(889, 'Châu Phú', 'Huyện', '10 34 12N, 105 12 13E', 89, 0),
(890, 'Tịnh Biên', 'Huyện', '10 33 30N, 105 00 17E', 89, 0),
(891, 'Tri Tôn', 'Huyện', '10 24 41N, 104 56 58E', 89, 0),
(892, 'Châu Thành', 'Huyện', '10 25 39N, 105 15 31E', 89, 0),
(893, 'Chợ Mới', 'Huyện', '10 27 23N, 105 26 57E', 89, 0),
(894, 'Thoại Sơn', 'Huyện', '10 16 45N, 105 15 59E', 89, 0),
(899, 'Rạch Giá', 'Thành Phố', '10 01 35N, 105 06 20E', 91, 0),
(900, 'Hà Tiên', 'Thị Xã', '10 22 54N, 104 30 10E', 91, 0),
(902, 'Kiên Lương', 'Huyện', '10 20 21N, 104 39 46E', 91, 0),
(903, 'Hòn Đất', 'Huyện', '10 14 20N, 104 55 57E', 91, 0),
(904, 'Tân Hiệp', 'Huyện', '10 05 18N, 105 14 04E', 91, 0),
(905, 'Châu Thành', 'Huyện', '9 57 37N, 105 10 16E', 91, 0),
(906, 'Giồng Giềng', 'Huyện', '9 56 05N, 105 22 06E', 91, 0),
(907, 'Gò Quao', 'Huyện', '9 43 17N, 105 17 06E', 91, 0),
(908, 'An Biên', 'Huyện', '9 48 37N, 105 03 18E', 91, 0),
(909, 'An Minh', 'Huyện', '9 40 24N, 104 59 05E', 91, 0),
(910, 'Vĩnh Thuận', 'Huyện', '9 33 25N, 105 11 30E', 91, 0),
(911, 'Phú Quốc', 'Huyện', '10 13 44N, 103 57 25E', 91, 0),
(912, 'Kiên Hải', 'Huyện', '9 48 31N, 104 37 48E', 91, 0),
(913, 'U Minh Thượng', 'Huyện', '', 91, 0),
(914, 'Giang Thành', 'Huyện', '', 91, 0),
(916, 'Ninh Kiều', 'Quận', '10 01 58N, 105 45 34E', 92, 0),
(917, 'Ô Môn', 'Quận', '10 07 28N, 105 37 51E', 92, 0),
(918, 'Bình Thuỷ', 'Quận', '10 03 42N, 105 43 17E', 92, 0),
(919, 'Cái Răng', 'Quận', '9 59 57N, 105 46 56E', 92, 0),
(923, 'Thốt Nốt', 'Quận', '10 14 23N, 105 32 02E', 92, 0),
(924, 'Vĩnh Thạnh', 'Huyện', '10 11 35N, 105 22 45E', 92, 0),
(925, 'Cờ Đỏ', 'Huyện', '10 02 48N, 105 29 46E', 92, 0),
(926, 'Phong Điền', 'Huyện', '9 59 57N, 105 39 35E', 92, 0),
(927, 'Thới Lai', 'Huyện', '', 92, 0),
(930, 'Vị Thanh', 'Thị Xã', '9 45 15N, 105 24 50E', 93, 0),
(931, 'Ngã Bảy', 'Thị Xã', '', 93, 0),
(932, 'Châu Thành A', 'Huyện', '9 55 50N, 105 38 31E', 93, 0),
(933, 'Châu Thành', 'Huyện', '9 55 22N, 105 48 37E', 93, 0),
(934, 'Phụng Hiệp', 'Huyện', '9 47 20N, 105 43 29E', 93, 0),
(935, 'Vị Thuỷ', 'Huyện', '9 48 05N, 105 32 13E', 93, 0),
(936, 'Long Mỹ', 'Huyện', '9 40 47N, 105 30 53E', 93, 0),
(941, 'Sóc Trăng', 'Thành Phố', '9 36 39N, 105 59 00E', 94, 0),
(942, 'Châu Thành', 'Huyện', '', 94, 0),
(943, 'Kế Sách', 'Huyện', '9 49 30N, 105 57 25E', 94, 0),
(944, 'Mỹ Tú', 'Huyện', '9 38 21N, 105 49 52E', 94, 0),
(945, 'Cù Lao Dung', 'Huyện', '9 37 36N, 106 12 13E', 94, 0),
(946, 'Long Phú', 'Huyện', '9 34 38N, 106 06 07E', 94, 0),
(947, 'Mỹ Xuyên', 'Huyện', '9 28 16N, 105 55 51E', 94, 0),
(948, 'Ngã Năm', 'Huyện', '9 31 38N, 105 37 22E', 94, 0),
(949, 'Thạnh Trị', 'Huyện', '9 28 05N, 105 43 02E', 94, 0),
(950, 'Vĩnh Châu', 'Huyện', '9 20 50N, 105 59 58E', 94, 0),
(951, 'Trần Đề', 'Huyện', '', 94, 0),
(954, 'Bạc Liêu', 'Thị Xã', '9 16 05N, 105 45 08E', 95, 0),
(956, 'Hồng Dân', 'Huyện', '9 30 37N, 105 24 25E', 95, 0),
(957, 'Phước Long', 'Huyện', '9 23 13N, 105 24 41E', 95, 0),
(958, 'Vĩnh Lợi', 'Huyện', '9 16 51N, 105 40 54E', 95, 0),
(959, 'Giá Rai', 'Huyện', '9 15 51N, 105 23 18E', 95, 0),
(960, 'Đông Hải', 'Huyện', '9 08 11N, 105 24 42E', 95, 0),
(961, 'Hoà Bình', 'Huyện', '', 95, 0),
(964, 'Cà Mau', 'Thành Phố', '9 10 33N, 105 11 11E', 96, 0),
(966, 'U Minh', 'Huyện', '9 22 30N, 104 57 00E', 96, 0),
(967, 'Thới Bình', 'Huyện', '9 22 50N, 105 07 35E', 96, 0),
(968, 'Trần Văn Thời', 'Huyện', '9 07 36N, 104 57 27E', 96, 0),
(969, 'Cái Nước', 'Huyện', '9 00 31N, 105 03 23E', 96, 0),
(970, 'Đầm Dơi', 'Huyện', '8 57 48N, 105 13 56E', 96, 0),
(971, 'Năm Căn', 'Huyện', '8 46 59N, 104 58 20E', 96, 0),
(972, 'Phú Tân', 'Huyện', '8 52 47N, 104 53 35E', 96, 0),
(973, 'Ngọc Hiển', 'Huyện', '8 40 47N, 104 57 58E', 96, 0);

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) UNSIGNED NOT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `nameClean` varchar(100) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL COMMENT 'hàm lượng',
  `activeIngredient` varchar(200) DEFAULT NULL COMMENT 'hoạt chất',
  `design` varchar(200) DEFAULT NULL COMMENT 'bào chế',
  `package` varchar(200) DEFAULT NULL COMMENT 'đóng gói',
  `standard` varchar(200) DEFAULT NULL COMMENT 'tiêu chuẩn',
  `expire` varchar(200) DEFAULT NULL COMMENT 'tuổi thọ',
  `registerNumber` varchar(100) DEFAULT NULL,
  `produceCompany` varchar(200) DEFAULT NULL COMMENT 'công ty sản xuất',
  `produceCountry` varchar(200) DEFAULT NULL,
  `produceAddress` varchar(200) DEFAULT NULL,
  `registerCompany` varchar(200) DEFAULT NULL,
  `registerCountry` varchar(200) DEFAULT NULL,
  `registerAddress` varchar(200) DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `group_drug_id` int(11) DEFAULT NULL,
  `donvibuon` varchar(255) NOT NULL,
  `donvile` varchar(255) NOT NULL,
  `hesoquydoi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `uid`, `code`, `name`, `nameClean`, `content`, `activeIngredient`, `design`, `package`, `standard`, `expire`, `registerNumber`, `produceCompany`, `produceCountry`, `produceAddress`, `registerCompany`, `registerCountry`, `registerAddress`, `note`, `created`, `updated`, `status`, `group_drug_id`, `donvibuon`, `donvile`, `hesoquydoi`, `created_at`, `updated_at`) VALUES
(3, 'jBIz8kCklqvnfpp', 'Thiên việt hương (Gia hạn lần 1)_NC48-H12-15', 'Thiên việt hương (Gia hạn lần 1)', 'thien viet huong (gia han lan 1)', 'Ace 500mg', 'Menthol, Thymol, Camphor, tinh dầu quế, tinh dầu bạc hà, tinh dầu long não, Methyl salicylat', 'Cao dán', 'hộp 5 gói x 4 lá (6cm x 8 cm)', 'TCCS', '24 tháng', 'NC48-H12-15', 'Bệnh viện y học cổ truyền Trung ương', 'Việt Nam', '29 Nguyễn Bỉnh Khiêm, Hà Nội', 'Bệnh viện y học cổ truyền Trung ương', 'Việt Nam', '29 Nguyễn Bỉnh Khiêm, Hà Nội', 'eee', NULL, '2017-06-08 10:46:09', 1, 3, 'Hộp', '10', '10', NULL, '2017-08-06 19:06:45'),
(4, 'Hxc3YChikxcFH11', 'Dolodon_VD-17326-12', 'Dolodon', 'dolodon', '500 mg', 'Paracetamol (cốm paracetamol 90%)', 'viên nén', 'Hộp 2 vỉ, 12 vỉ x 8 viên. Chai 100 viên, 500 viên nén', 'TCCS', '36 tháng', 'VD-17326-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, '2017-07-30 00:40:53'),
(5, 'erh64jt7HZalUWW', 'Lamivudin 100 ICA_VD-17327-12', 'Lamivudin 100 ICA', 'lamivudin 100 ica', '100 mg', 'Lamivudin', 'Viên nén bao phim', 'Hộp 1 chai x 28 viên', 'TCCS', '36 tháng', 'VD-17327-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', NULL, NULL, '2017-06-08 10:46:09', 0, NULL, '', '', '', NULL, '2017-07-30 00:39:33'),
(6, 'rPeKhu0p46qlPMM', 'Neumomicid_VD-17328-12', 'Neumomicid', 'neumomicid', '3,0 MIU', 'Spiramycin', 'viên nén dài bao phim', 'Hộp 2 vỉ x 5 viên', 'TCCS', '36 tháng', 'VD-17328-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(7, 'qYcTnVzFiO3Hagg', 'Victron_VD-17329-12', 'Victron', 'victron', '100 mg', 'Lamivudin', 'Viên nén bao phim', 'Hộp 2 vỉ x 14 viên', 'TCCS', '36 tháng', 'VD-17329-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(8, 'YCRbDDeOXywgmrr', 'Citicolin_VD-17330-12', 'Citicolin', 'citicolin', 'Citicolin 500 mg/2 ml', 'Citicolin Natri', 'Dung dịch tiêm', 'Hộp 10 ống x 2 ml', 'TCCS', '24 tháng', 'VD-17330-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(9, 'Qzep2Yy4ruhHSss', 'Danatobra_VD-17331-12', 'Danatobra', 'danatobra', 'Tobramycin 0,3%', 'Tobramycin sulfat', 'Thuốc nhỏ mắt', 'Hộp 1 lọ 5 ml', 'TCCS', '24 tháng', 'VD-17331-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(10, 'fjEO4Hr7lGuHrii', 'Etocox 200_VD-17332-12', 'Etocox 200', 'etocox 200', '200mg', 'Etodolac', 'Viên nén bao phim', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17332-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(11, '3bUxrKG8SSatyJJ', 'Hesota_VD-17333-12', 'Hesota', 'hesota', '.', 'Cao khô của Kim tiền thảo, Nhân trần, Hoàng cầm, Nghệ, Binh lang, Chỉ thực, Hậu phác, Bạch mao căn; Mộc hương, Đại hoàng', 'Viên nén bao phim', 'Hộp 1 lọ x 45 viên. Hộp 5 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17333-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', 'Khu công nghiệp Hòa Khánh, Quận Liên Chiểu, TP. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(12, 'PClzDpdaqtf9Foo', 'Meloxicam 15 mg_VD-17334-12', 'Meloxicam 15 mg', 'meloxicam 15 mg', '15 mg', 'Meloxicam', 'viên nén', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17334-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(13, 'Npb9AcosxS4aMYY', 'Nalexva_VD-17335-12', 'Nalexva', 'nalexva', '13,5 mg; 33 mg', 'Dikali glycyrrhizinat, Natri clorid', 'Thuốc nhỏ mắt', 'Hộp 1 Lọ x 15 ml', 'TCCS', '24 tháng', 'VD-17335-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(14, 'dEEbHSzwY3jnFJJ', 'Pantopil_VD-17336-12', 'Pantopil', 'pantopil', 'Pantoprazol 40 mg', 'Pantoprazol (dạng vi nang 8,5%)', 'Viên nang tan trong ruột', 'Hộp 1 vỉ, 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17336-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(15, 'xKShgotW20B40ZZ', 'Ranitidin 150mg_VD-17337-12', 'Ranitidin 150mg', 'ranitidin 150mg', 'Ranitidin 150 mg', 'Ranitidin HCL', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17337-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(16, 'r6N3f2DtxUOiyll', 'Risdontab 2_VD-17338-12', 'Risdontab 2', 'risdontab 2', '2 mg', 'Risperidon', 'Viên bao phim', 'Hộp 5 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17338-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(17, 'rNZemKVONa1v6jj', 'Vitamin B1B6B12_VD-17339-12', 'Vitamin B1B6B12', 'vitamin b1b6b12', '12,5 mg; 12,5 mg; 12,5 mcg', 'Thiamin mononitrat, Pyridoxin hydroclorid, Cyanocobalamin', 'Viên bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17339-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(18, '9lYajxmaiZL1hNN', 'Cetirizin 10 mg_VD-17340-12', 'Cetirizin 10 mg', 'cetirizin 10 mg', '10mg', 'Cetirizin HCl 10mg', 'Viên nén dài', 'Chai 100 viên, chai 500 viên, hộp 10 vỉ x 10 viên, hộp 20 vỉ x 10 viên, hộp 50 vỉ x 10 viên', 'DĐVN IV', '36 tháng', 'VD-17340-12', 'Công ty cổ phần Dược Đồng Nai.', 'Việt Nam', '221B, Phạm Văn Thuận, P. Tân Tiến, TP. Biên Hoà, Đồng Nai', 'Công ty cổ phần Dược Đồng Nai.', 'Việt Nam', '221B, Phạm Văn Thuận, P. Tân Tiến, TP. Biên Hoà, Đồng Nai', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(19, '8clwbI0TNCT8zSS', 'Carudxan_VD-17341-12', 'Carudxan', 'carudxan', '2mg', 'Doxazosin 2mg dưới dạng Doxazosin mesylate', 'Viên nén dài', 'Hộp 1 vỉ, hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17341-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(20, 'Rg4ILof8X9EPn88', 'Clophehadi_VD-17342-12', 'Clophehadi', 'clophehadi', '4mg', 'Clorpheniramin maleat dưới dạng vi nang', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên, hộp 1 lọ 100 viên, hộp 1 lọ 1000 viên', 'TCCS', '36 tháng', 'VD-17342-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(21, 'FxXtI5X4rqYLCVV', 'Haloperidol 1,5mg_VD-17343-12', 'Haloperidol 1,5mg', 'haloperidol 1,5mg', '1,5mg', 'Haloperidol', 'Viên nén', 'Hộp 2 vỉ, hộp 10 vỉ x 10 viên, hộp 1 lọ 100 viên', 'DĐVN IV', '36 tháng', 'VD-17343-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(22, 'bdguZ3lW8hboaa', 'HapyGra_VD-17344-12', 'HapyGra', 'hapygra', '50mg', 'Sildenafil', 'Viên nén bao phim', 'Hộp 1 vỉ x 2 viên', 'TCCS', '36 tháng', 'VD-17344-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(23, 'DTdSyEUcF9sWSXX', 'Kem bôi da Clotrimazol 1%_VD-17345-12', 'Kem bôi da Clotrimazol 1%', 'kem boi da clotrimazol 1%', '1g', 'Clotrimazol', 'Kem bôi da', 'Hộp 1 tuýp 5g, hộp 1 tuýp 10g', 'TCCS', '36 tháng', 'VD-17345-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(24, '0M5Bkgxya5aAfqq', 'Rmekol_VD-17346-12', 'Rmekol', 'rmekol', '.', 'Paracetamol, Dextromethorphan HBr, Clorpheniramin maleat', 'Viên nén dài bao phim', 'Hộp 25 vỉ x 4 viên', 'TCCS', '36 tháng', 'VD-17346-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(25, '4J79rnHdVigncJJ', 'Sirô Tussihadi_VD-17347-12', 'Sirô Tussihadi', 'siro tussihadi', '.', 'Clorpheniramin maleat, dextromethorphan, guaifenesin, natri citrat, amoni clorid', 'Siro thuốc', 'Hộp 1 lọ 30ml, hộp 1 lọ 60ml, hộp 1 lọ 100ml', 'TCCS', '36 tháng', 'VD-17347-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(26, 'mqqxSI3vWxYFmdd', 'Vitamin C_VD-17348-12', 'Vitamin C', 'vitamin c', '500mg', 'Acid ascorbic', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17348-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(27, 'Ngr0XmRPsfuyQNN', 'Anomin Daily_VD-17349-12', 'Anomin Daily', 'anomin daily', '.', 'Beta caroten, vitamin E, C, B1, B2, B6, PP', 'Viên nang mềm', 'Hộp 10 vỉ x 5 viên', 'TCCS', '24 tháng', 'VD-17349-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(28, '0V8dIv0Ur0z5XJJ', 'Cozz Expec_VD-17350-12', 'Cozz Expec', 'cozz expec', '30mg', 'Ambroxol HCl', 'Viên nén', 'Hộp 3 vỉ x 10 viên', 'TCCS', '24 tháng', 'VD-17350-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(29, 'KOqOHQwN5Nnsj66', 'Hagimox HT_VD-17351-12', 'Hagimox HT', 'hagimox ht', '500mg', 'Amoxicillin 500mg dưới dạng Amoxicillin trihydrat', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên, chai 200 viên, chai 500 viên', 'DĐVN IV', '24 tháng', 'VD-17351-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(30, 'ZZBNFVOhN9wLuu', 'Lanazol_VD-17352-12', 'Lanazol', 'lanazol', '30mg', 'Lansoprazol 30mg dưới dạng Lansoprazol pellet', 'Viên nang tan trong ruột', 'Hộp 3 vỉ x 10 viên', 'TCCS', '24 tháng', 'VD-17352-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(31, 'Z9PXgfkeZeq6qKK', 'Mebilax 15_VD-17353-12', 'Mebilax 15', 'mebilax 15', '15mg', 'Meloxicam', 'Viên nén', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17353-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(32, 'c7eSY2qhxmmNyii', 'Mebilax 7,5_VD-17354-12', 'Mebilax 7,5', 'mebilax 7,5', '7,5mg', 'Meloxicam', 'Viên nén', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17354-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(33, 'YJenhdbq1SyjpOO', 'Telfor_VD-17355-12', 'Telfor', 'telfor', '60mg', 'Fexofenadin hydroclorid', 'Viên nén bao phim', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17355-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(34, 'ue11chigoqCyRFF', 'Alecizan_VD-17356-12', 'Alecizan', 'alecizan', '325 mg; 200 mg', 'Paracetamol, Ibuprofen', 'viên nén', 'Hộp 5 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17356-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(35, 'YBubrv0HHManjmm', 'Cephalexin 250mg_VD-17357-12', 'Cephalexin 250mg', 'cephalexin 250mg', 'Cephalexin 250 mg', 'Cephalexin monohydrat', 'Thuốc cốm', 'Hộp 12 gói x 3g', 'TCCS', '36 tháng', 'VD-17357-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(36, 'jqttre3nM8opKll', 'Cicalic 20_VD-17358-12', 'Cicalic 20', 'cicalic 20', '20 mg', 'Tadalafil', 'Viên nén bao phim', 'Hộp 1 vỉ x 01 viên, 02 viên', 'TCCS', '36 tháng', 'VD-17358-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(37, 'SdcwJ0IvUIw1rpp', 'Clatexyl 250 mg_VD-17359-12', 'Clatexyl 250 mg', 'clatexyl 250 mg', 'Amoxicillin 250 mg', 'Amoxicillin trihydrat', 'Viên nén dài ngậm', 'Hộp 1 chai x 100 viên', 'TCCS', '36 tháng', 'VD-17359-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(38, 'WjWxPGIYdam0VII', 'Clatexyl 500 mg_VD-17360-12', 'Clatexyl 500 mg', 'clatexyl 500 mg', 'Amoxicillin 500 mg', 'Amoxicillin Trihydrat', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17360-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(39, 'iQIe6vXn0BhDTqq', 'Devencol_VD-17361-12', 'Devencol', 'devencol', '325 mg; 2 mg', 'Paracetamol, Clopheniramin maleat', 'viên nén', 'Hộp 5 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17361-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(40, 'Dq29rYjcMZVJuoo', 'Joint scap 500 mg_VD-17362-12', 'Joint scap 500 mg', 'joint scap 500 mg', '500 mg', 'Glucosamin sulfat kali clorid', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17362-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(41, 'qsxmEuYqoENBImm', 'Berberal_VD-17364-12', 'Berberal', 'berberal', '10mg/ viên', 'Berberin clorid', 'Viên bao đường', 'Hộp 20 chai x 120 viên', 'TCCS', '36 tháng', 'VD-17364-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(42, 'pTiWYfxNB920cJJ', 'Kali Clorid_VD-17365-12', 'Kali Clorid', 'kali clorid', '500mg/ viên', 'Kali Clorid', 'Viên nén', 'Hộp 10 vỉ x 10 viên; Hộp 1 chai 100 viên', 'TCCS', '36 tháng', 'VD-17365-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(43, '0c0UyGGVb6sMzOO', 'Nady- Trimedat_VD-17366-12', 'Nady- Trimedat', 'nady- trimedat', '100mg/ viên', 'Trimebutin maleat', 'Viên nén bao phim', 'Hộp 2 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17366-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(44, 'I5yGG40jleSpedd', 'Roxithromycin 50mg_VD-17368-12', 'Roxithromycin 50mg', 'roxithromycin 50mg', '50mg/ gói', 'Roxithromycin', 'Thuốc bột', 'Hộp 30 gói x 3g', 'TCCS', '36 tháng', 'VD-17368-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(45, 'dkZPoUtxpdwbUMM', 'Salbutamol 2mg_VD-17369-12', 'Salbutamol 2mg', 'salbutamol 2mg', 'Salbutamol 2mg/ viên', 'Salbutamol sulfat', 'Viên nén', 'Hộp 2 vỉ, 10 vỉ x 10 viên; Hộp 1 chai 100 viên', 'TCCS', '36 tháng', 'VD-17369-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(46, 'mqe9MDIEzsetJoo', 'Vitamin C 500mg_VD-17370-12', 'Vitamin C 500mg', 'vitamin c 500mg', '500mg/ viên', 'Vitamin C', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên; Hộp 1 chai 100 viên', 'TCCS', '24 tháng', 'VD-17370-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(47, '9bn1411R15pGNCC', 'Bromhexin 4_VD-17371-12', 'Bromhexin 4', 'bromhexin 4', '4mg', 'Bromhexin hydroclorid', 'viên nén', 'hộp 2 vỉ, 10 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17371-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(48, 'tOCPgsKsxEwcTzz', 'Bromhexin 8_VD-17372-12', 'Bromhexin 8', 'bromhexin 8', '8mg', 'Bromhexin hydroclorid', 'viên nén', 'hộp 2 vỉ, 10 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17372-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(49, 'SIYLbVW9w75M422', 'Clopheniramin  4 mg_VD-17373-12', 'Clopheniramin  4 mg', 'clopheniramin  4 mg', '4mg', 'Clorpheniramin maleat', 'viên nén dài', 'hộp 10 vỉ x 10 viên, hộp 1 chai 200 viên, chai 1000 viên', 'TCCS', '36 tháng', 'VD-17373-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(50, '50EV1P8y8jQE500', 'Methionin_VD-17374-12', 'Methionin', 'methionin', '250mg', 'Methionin', 'Viên nang cứng', 'hộp 1 chai 100 viên', 'TCCS', '36 tháng', 'VD-17374-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(51, '0GrCotKhqpn5vMM', 'Prebufen - F_VD-17375-12', 'Prebufen - F', 'prebufen - f', '400mg', 'Ibuprofen', 'Thuốc cốm', 'hộp 20 gói x 3 gam', 'TCCS', '36 tháng', 'VD-17375-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(52, 'USIkSFqTnToqa33', 'Zinenutri_VD-17376-12', 'Zinenutri', 'zinenutri', 'Kẽm 10mg', 'Kẽm gluconat', 'Thuốc cốm', 'hộp 20 gói x 1,5 gam', 'TCCS', '36 tháng', 'VD-17376-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(53, '89TWGHRn3uQaphh', 'Agilosart 50_VD-17377-12', 'Agilosart 50', 'agilosart 50', '50mg/ viên', 'Losartan Kali', 'Viên nén bao phim', 'Hộp 4 vỉ x 10 viên', 'TCCS', '24 tháng', 'VD-17377-12', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', 'Khóm Thạnh An, P. Mỹ Thới, TP. Long Xuyên, An Giang', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', '27 Nguyễn Thái Học, P. Mỹ Bình, TP. Long Xuyên, An Giang', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(54, 'cFanZ99pVON2YFF', 'Aginmezin_VD-17378-12', 'Aginmezin', 'aginmezin', '5mg/ viên', 'Alimemazin tartrat', 'Viên nén bao phim', 'Hộp 10 vỉ x 25 viên', 'TCCS', '24 tháng', 'VD-17378-12', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', 'Khóm Thạnh An, P. Mỹ Thới, TP. Long Xuyên, An Giang', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', '27 Nguyễn Thái Học, P. Mỹ Bình, TP. Long Xuyên, An Giang', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(55, 'NEl6Bf5fYplPCGG', 'Spas- Agi_VD-17379-12', 'Spas- Agi', 'spas- agi', '40mg/ viên', 'Alverin citrat', 'Viên nén', 'Hộp 3 vỉ, 10 vỉ x 10 viên; Chai 50 viên', 'TCCS', '36 tháng', 'VD-17379-12', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', 'Khóm Thạnh An, P. Mỹ Thới, TP. Long Xuyên, An Giang', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', '27 Nguyễn Thái Học, P. Mỹ Bình, TP. Long Xuyên, An Giang', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(56, 'HJAMFD96TdmLxXX', 'Amfarex 500_VD-17380-12', 'Amfarex 500', 'amfarex 500', '500 mg', 'Clarithromycin', 'Viên nén bao phim', 'Hộp 1 vỉ x 7 viên. Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17380-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(57, 'TUzP8ZN8eafFeSS', 'Telcardis 20_VD-17381-12', 'Telcardis 20', 'telcardis 20', '20 mg', 'Telmisartan', 'viên nén', 'Hộp 1 vỉ, 3 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17381-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(58, 'wfyQvS3131oiDKK', 'Telcardis 40_VD-17382-12', 'Telcardis 40', 'telcardis 40', '40 mg', 'Telmisartan', 'viên nén', 'Hộp 1 vỉ, 3 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17382-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', NULL, NULL, '2017-06-08 10:46:09', 1, NULL, '', '', '', NULL, NULL),
(59, 'yHojEUHtiYzDQgg', 'Telcardis 80_VD-17383-12', 'Telcardis 80', 'telcardis 80', '80 mg', 'Telmisartan', 'Bột pha tiêm', 'Hộp 1 vỉ, 3 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17383-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', '', NULL, '2017-06-08 10:46:09', 1, 1, 'Hộp', 'vỉ', '10', NULL, '2017-08-06 21:21:30'),
(60, 'n1hdtBetCVYr6RR', 'Abicin 250_VD-17384-12', 'Abicin 250', 'abicin 250', 'Amikacin 250mg', 'Amikacin sulfat', 'Thuốc tiêm bột đông khô', 'Hộp 1 lọ + 1 ống dung môi 2ml; Hộp 10 lọ + 10 ống dung môi 2ml', 'DĐTQ2005', '36 tháng', 'VD-17384-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', '', NULL, '2017-06-08 10:46:09', 1, 1, 'Hộp', 'vỉ', '20', NULL, '2017-08-06 21:22:44'),
(61, 'xOzgDw6h7IQw0MM', 'Ace kid 80_VD-17385-12', 'Ace kid 80', 'ace kid 80', '80mg', 'Paracetamol', 'thuốc bột sủi bọt', 'Hộp 12 gói x 1,5g', 'TCCS', '36 tháng', 'VD-17385-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(62, 'ObTkUVi8pcjzCvv', 'Atropin 1%_VD-17386-12', 'Atropin 1%', 'atropin 1%', '100mg', 'Atropin sulfat', 'Thuốc nhỏ mắt', 'Hộp 1 lọ x 10ml', 'BP 2007', '36 tháng', 'VD-17386-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(63, 'oE2qbFobfC1xF99', 'Bidivit AD_VD-17387-12', 'Bidivit AD', 'bidivit ad', '5000 IU; 400IU', 'Vitamin A palmitat; Vitamin D2', 'Viên nang mềm', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17387-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(64, 'mXXTsiqvT4KdkNN', 'Natri bicarbonat 500mg_VD-17388-12', 'Natri bicarbonat 500mg', 'natri bicarbonat 500mg', '500mg', 'Natri hydrocarbonat', 'Viên nén', 'Lọ 160 viên', 'TCCS', '36 tháng', 'VD-17388-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(65, 'RYIbys0fpk1cIaa', 'Neutrivit_VD-17389-12', 'Neutrivit', 'neutrivit', '15mg; 10mg; 20mcg', 'Vitamin B1; Vitamin B6, Vitamin B12', 'Viên nén bao đường', 'Hộp 50 vỉ x 30 viên', 'TCCS', '24 tháng', 'VD-17389-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(66, 'LNx3dg4HPvnuaMM', 'Nystatin 500.000 IU_VD-17390-12', 'Nystatin 500.000 IU', 'nystatin 500.000 iu', '500.000IU', 'Nystatin', 'Viên nén bao đường', 'Hộp 2 vỉ x 8 viên; hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17390-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(67, 'KbGWtKGXQi7ON44', 'Soluplex_VD-17391-12', 'Soluplex', 'soluplex', 'Vitamin A palmitat; Vitamin D2, B1, B2, C, B6, PP', 'Vitamin A palmitat; Vitamin D2, B1, B2, C , B6, PP', 'Dung dịch uống', 'Hộp 1 lọ x 15ml', 'TCCS', '24 tháng', 'VD-17391-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(68, 'ZXseCkKw4hCm6tt', 'Bostanex_VD-17392-12', 'Bostanex', 'bostanex', '5mg', 'Desloratadin', 'Viên nén bao phim', 'Hộp 1 vỉ x 10 viên; hộp 3 vỉ x 10 viên; hộp 5 vỉ x 10 viên; hộp 10 vỉ x 10 viên; hộp 1 chai 100 viên; hộp 1 chai 200 viên; hộp 1 chai 500 viên', 'TCCS', '36 tháng', 'VD-17392-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(69, 'X0VTp21Crd9t233', 'Dextroboston 15_VD-17393-12', 'Dextroboston 15', 'dextroboston 15', '15mg', 'Dextromethorphan HBr', 'Viên nén', 'Hộp 10 vỉ x 10 viên; hộp 1 chai 100 viên; hộp 1 chai 200 viên; hộp 1 chai 500 viên', 'TCCS', '36 tháng', 'VD-17393-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(70, 'AKHpSjqhdB0lvaa', 'Otibone_VD-17395-12', 'Otibone', 'otibone', '167mg; 500mg', 'Methyl sulfonyl methan; Glucosamin HCl', 'Viên nén bao phim', 'Hộp 3 vỉ x 10viên; Hộp 6 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17395-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(71, 'hYlWT7jtSKL7ZII', 'Otibone Plus_VD-17396-12', 'Otibone Plus', 'otibone plus', '400mg; 500mg; 167mg', 'Natri chondroitin sulfat; Glucosamin HCl; Methyl sulfonyl methan', 'Viên nén bao phim', 'Hộp 3 vỉ (AL/PVC), 6vỉ (AL/PVC) x 10 viên; Hộp 3 vỉ (AL/AL), 6 vỉ (AL/AL) x 10 viên', 'TCCS', '36 tháng', 'VD-17396-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(72, 'xfWylaPBi5PMoo', 'Cadiflex 250_VD-17397-12', 'Cadiflex 250', 'cadiflex 250', '397,79 mg', 'D-Glucosamin sulfat 2NaCl (tương đương 250 mg glucosamin)', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17397-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(73, 'ecp3zrMS4PyjGKK', 'Decirid 81 mg_VD-17398-12', 'Decirid 81 mg', 'decirid 81 mg', '81 mg', 'Acid acetyl salicylic', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên, chai 100 viên', 'TCCS', '36 tháng', 'VD-17398-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(74, 'ZyCGOllLzLVMCzz', 'Giadrox 500_VD-17399-12', 'Giadrox 500', 'giadrox 500', '500 mg', 'Cefadroxil (dưới dạng cefadroxil monohydrat)', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17399-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(75, 'KwPiSehn899055', 'Nccep_VD-17400-12', 'Nccep', 'nccep', '200 mg', 'Cefpodoxime (dưới dạng Cefpodoxime proxetil)', 'viên nén dài bao phim', 'Hộp 1 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17400-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(76, '8czUQYmySHSRCXX', 'Spiramycin 3.0_VD-17402-12', 'Spiramycin 3.0', 'spiramycin 3.0', '3.0 MIU', 'spiramycine', 'Viên nén bao phim', 'Hộp 2 vỉ x 5 viên', 'TCCS', '36 tháng', 'VD-17402-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(77, 'sRFr9Xtyf8961gg', 'Tendipoxim 100_VD-17403-12', 'Tendipoxim 100', 'tendipoxim 100', '100 mg', 'Cefpodoxime (dưới dạng Cefpodoxime proxetil)', 'Viên nén bao phim', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17403-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(78, 'PTbjXaPZI9bq3GG', 'Vitamin C_VD-17404-12', 'Vitamin C', 'vitamin c', '500 mg', 'Vitamin C (acid ascorbic)', 'Viên nén bao phim', 'Hộp 20 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17404-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(79, 'AhjhxRic9mDV2FF', 'Acenac 100_VD-17405-12', 'Acenac 100', 'acenac 100', '100 mg', 'Aceclofenac', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17405-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(80, '3S2KHmNYFzIpaTT', 'Farica 400_VD-17406-12', 'Farica 400', 'farica 400', '400 mg', 'Albendazol', 'viên nén dài bao phim', 'Hộp 1 vỉ x 1 viên', 'TCCS', '36 tháng', 'VD-17406-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(81, 'EsHo08yIOU6ZPOO', 'Fenocor 100_VD-17407-12', 'Fenocor 100', 'fenocor 100', '100 mg', 'Fenofibrat', 'Viên nang cứng (trắng-trắng)', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17407-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(82, 'vPlGHp9fw8c7Sff', 'Glipizid 5mg_VD-17408-12', 'Glipizid 5mg', 'glipizid 5mg', '5 mg', 'Glipizid', 'viên nén', 'Hộp 01 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17408-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(83, 'MVWvJr6R0W6Wsqq', 'Meloxicam 7,5mg_VD-17409-12', 'Meloxicam 7,5mg', 'meloxicam 7,5mg', '7,5 mg', 'Meloxicam 7,5 mg', 'Viên nén bao phim', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17409-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(84, 'zly5R842M5jLs00', 'Metoclopramid 10mg_VD-17410-12', 'Metoclopramid 10mg', 'metoclopramid 10mg', '10 mg', 'Metoclopramid hydroclorid', 'viên nén', 'Hộp 2 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17410-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(85, 'KBFFLtQPMWki555', 'Paracetamol 500 caplet_VD-17411-12', 'Paracetamol 500 caplet', 'paracetamol 500 caplet', '500 mg', 'Paracetamol', 'viên nén dài', 'Hộp 10 vỉ, 50 vỉ x 10 viên. Chai 500 viên', 'TCCS', '36 tháng', 'VD-17411-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(86, '7GP4Yn9J8TipeLL', 'Roxithromycin 150_VD-17412-12', 'Roxithromycin 150', 'roxithromycin 150', '150 mg', 'Roxithromycin', 'Viên nén bao phim', 'Hộp 01 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17412-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(87, 'pwvkDWUv8jkcBgg', 'Roxithromycin 50_VD-17413-12', 'Roxithromycin 50', 'roxithromycin 50', '50 mg', 'Roxithromycin', 'Thuốc bột uống', 'Hộp 30 gói x 3g', 'TCCS', '36 tháng', 'VD-17413-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(88, '0XYOsD49bSqcPOO', 'Vitamin C 1000 mg_VD-17414-12', 'Vitamin C 1000 mg', 'vitamin c 1000 mg', '1000 mg', 'Acid ascorbic', 'Bột pha tiêm', 'Hộp 1 tuýp 10 viên', 'TCCS', '24 tháng', 'VD-17414-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', '', NULL, '2017-06-08 10:46:10', 0, 1, 'Hộp', 'vỉ', '10', NULL, '2017-08-06 21:22:10'),
(89, 'ynbFtHyQltNecSS', 'Bamandol 1 g_VD-17415-12', 'Bamandol 1 g', 'bamandol 1 g', 'Cefotiam 1g', 'Cefotiam hydroclorid', 'Bột pha tiêm', 'hộp 1 lọ', 'JP 15', '36 tháng', 'VD-17415-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(90, 'm2ZWc8DoE9HzWvv', 'Cefepime 1 g_VD-17416-12', 'Cefepime 1 g', 'cefepime 1 g', 'Cefepime 1g', 'Cefepime hydroclorid', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17416-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(91, 'uuBCXa9cRHosqrr', 'Ceftezol 1g_VD-17417-12', 'Ceftezol 1g', 'ceftezol 1g', 'Ceftezol 1g', 'Ceftezol natri', 'Bột pha tiêm', 'hộp 1 lọ', 'TCCS', '36 tháng', 'VD-17417-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', '', NULL, '2017-06-08 10:46:10', 1, 1, 'Hộp', '10', '10', NULL, '2017-08-06 19:07:35'),
(92, 'xcjBNIv5n3QKXVV', 'Cefuroxim 250mg_VD-17418-12', 'Cefuroxim 250mg', 'cefuroxim 250mg', 'Cefuroxim 250mg', 'Cefuroxim axetil', 'Viên nén bao phim', 'Hộp 1 vỉ, 2 vỉ x 10 viên', 'USP 32', '36 tháng', 'VD-17418-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(93, '0EDmyakZ9TQ46ww', 'Dio-Imicil_VD-17419-12', 'Dio-Imicil', 'dio-imicil', 'Imipenem 500mg, Cilastatin 500mg', 'Imipenem monohydrat, Cilastatin natri và natri bicarbonat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17419-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(94, 'sGrC9ZD1ohC1LOO', 'Entinam_VD-17420-12', 'Entinam', 'entinam', 'Imipenam 500mg, Cilastatin 500mg', 'Imipenem monohydrat, Cilastatin natri và natri bicarbonat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17420-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(95, 'YFC6eRM9817EVVV', 'Erovan 2 g_VD-17421-12', 'Erovan 2 g', 'erovan 2 g', 'Ceftazidim 2g', 'Ceftazidim pentahydrat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17421-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(96, 'J4zzDUNdCfYGkKK', 'Farmiz 1 g_VD-17422-12', 'Farmiz 1 g', 'farmiz 1 g', 'Cefamandol 1g', 'Cefamandol nafat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17422-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(97, 'sKmgwrymtV8V8oo', 'Gilidam 1g_VD-17423-12', 'Gilidam 1g', 'gilidam 1g', 'Cefotiam 1g', 'Cefotiam hydroclorid', 'Bột pha tiêm', 'hộp 1 lọ', 'JP 15', '36 tháng', 'VD-17423-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(98, '82nlxPlkvOcgvUU', 'Tenebis 1g_VD-17424-12', 'Tenebis 1g', 'tenebis 1g', 'Cefoperazol 500mg, Sulbactam 500mg', 'Cefoperazone natri và Sulbactam natri', 'Bột pha tiêm', 'hộp 1 lọ', 'TCCS', '36 tháng', 'VD-17424-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(99, 'D4IpLL3108nDYhh', 'Tenebis 2g_VD-17425-12', 'Tenebis 2g', 'tenebis 2g', 'Cefoperazol 1g, Sulbactam 1g', 'Cefoperazone natri và Sulbactam natri', 'Bột pha tiêm', 'hộp 1 lọ', 'TCCS', '36 tháng', 'VD-17425-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(100, 'Q94EwRQdjCj2L88', 'Trizidim 1g_VD-17426-12', 'Trizidim 1g', 'trizidim 1g', 'Ceftazidim 1g', 'Ceftazidim pentahydrat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17426-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(101, 'uif1faCHo1RK6jj', 'Trizidim 2 g_VD-17427-12', 'Trizidim 2 g', 'trizidim 2 g', 'Ceftazidim 2g', 'Ceftazidim pentahydrat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17427-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL),
(102, 'Dl4qG1ytyqjvcII', 'Zasinat 1,5g_VD-17428-12', 'Zasinat 1,5g', 'zasinat 1,5g', 'Cefuroxim 1,5g', 'Cefuroxim natri', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17428-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', NULL, NULL, '2017-06-08 10:46:10', 1, NULL, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drug_image`
--

CREATE TABLE `drug_image` (
  `id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drug_image`
--

INSERT INTO `drug_image` (`id`, `drug_id`, `url`, `created_at`, `updated_at`) VALUES
(5, 113, '1501403857_blog1.jpg', '2017-07-30 01:37:37', '2017-07-30 01:37:37'),
(6, 113, '1501403857_img1.jpg', '2017-07-30 01:37:37', '2017-07-30 01:37:37'),
(7, 113, '1501403857_img4.jpg', '2017-07-30 01:37:37', '2017-07-30 01:37:37'),
(8, 114, '1501404131_img5.jpg', '2017-07-30 01:42:11', '2017-07-30 01:42:11'),
(13, 3, '1502071605_product.png', '2017-08-06 19:06:45', '2017-08-06 19:06:45'),
(14, 3, '1502071605_product.png', '2017-08-06 19:06:45', '2017-08-06 19:06:45'),
(15, 3, '1502071605_product.png', '2017-08-06 19:06:45', '2017-08-06 19:06:45'),
(16, 91, '1502071655_product.png', '2017-08-06 19:07:35', '2017-08-06 19:07:35'),
(17, 91, '1502071656_product.png', '2017-08-06 19:07:36', '2017-08-06 19:07:36'),
(18, 91, '1502071656_product.png', '2017-08-06 19:07:36', '2017-08-06 19:07:36'),
(19, 59, '1502079690_pr2.png', '2017-08-06 21:21:30', '2017-08-06 21:21:30'),
(20, 88, '1502079730_pr4.png', '2017-08-06 21:22:10', '2017-08-06 21:22:10'),
(21, 60, '1502079764_pr5.png', '2017-08-06 21:22:44', '2017-08-06 21:22:44'),
(22, 60, '1502079764_pr1.png', '2017-08-06 21:22:44', '2017-08-06 21:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `group_drugs`
--

CREATE TABLE `group_drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_drugs`
--

INSERT INTO `group_drugs` (`id`, `created_at`, `updated_at`, `code`, `short_name`, `full_name`, `note`, `status`) VALUES
(1, '2017-07-29 08:21:37', '2017-08-08 18:00:34', 'NT01', 'D.Phẩm', 'Dược phẩm', 'Nhóm thuốc dược phẩm', 1),
(3, '2017-07-29 08:39:16', '2017-07-29 08:39:16', 'NT02', 'TPCN', 'Thực phẩm chức năng', 'Nhóm thuốc thực phẩm chức năng', 1),
(4, '2017-07-29 08:39:53', '2017-08-01 02:45:13', 'NT04', 'M.Phẩm', 'Mỹ phẩm', 'Nhóm thuốc mỹ phẩm', 0),
(5, '2017-07-29 08:40:29', '2017-07-29 08:40:29', 'NT05', 'T.Bổ', 'Thuốc bổ', 'Nhóm thuốc bổ', 0),
(6, '2017-07-29 08:40:51', '2017-08-08 18:00:35', 'NT06', 'K.Sinh', 'Khánh sinh', 'Nhóm thuốc kháng sinh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_21_105844_create_roles_table', 1),
('2014_10_21_110325_create_foreign_keys', 1),
('2014_10_24_205441_create_contact_table', 1),
('2014_10_26_172107_create_posts_table', 1),
('2014_10_26_172631_create_tags_table', 1),
('2014_10_26_172904_create_post_tag_table', 1),
('2014_10_26_222018_create_comments_table', 1),
('2017_07_28_074306_create_group_drugs_table', 2),
('2017_07_30_100016_create_group_minds_table', 3),
('2017_07_31_033305_create_mind_drug_table', 4),
('2017_08_09_041040_create_transactions_table', 5),
('2017_08_09_041051_create_transaction_drug_table', 6),
('2017_08_09_041057_create_transaction_send_table', 6),
('2017_08_13_042051_create_user_logs_table', 7),
('2017_08_17_041140_create_config_discount_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `minds`
--

CREATE TABLE `minds` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount_cg1` decimal(20,2) NOT NULL,
  `discount_cg2` decimal(20,2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `minds`
--

INSERT INTO `minds` (`id`, `created_at`, `updated_at`, `code`, `name`, `discount_cg1`, `discount_cg2`, `start_time`, `end_time`, `note`, `status`) VALUES
(2, '2017-07-30 20:57:16', '2017-08-01 18:24:07', 'PH02', 'Phiên thứ 2', '500000.00', '1000000.00', '2017-08-10 10:52:37', '2017-08-26 10:56:37', 'Thông báo phiên 2', 1),
(3, '2017-07-31 18:55:56', '2017-08-01 18:36:31', 'PH03', 'Phiên sô  3', '80000.00', '200000.00', '2017-08-02 08:28:43', '2017-08-26 10:28:43', 'thong bao cua phien', 0),
(4, '2017-07-31 18:59:34', '2017-08-01 02:17:39', 'PH04', 'Phiên số 4 update', '100000.00', '500000.00', '2017-08-01 08:58:26', '2017-08-25 04:58:26', 'Phiên 1 update - thong bao', 1),
(6, '2017-07-31 21:42:14', '2017-08-01 18:20:53', 'PH05', 'Phiên số 6', '60000.00', '90000.00', '2017-08-08 11:41:53', '2017-08-03 11:41:53', '111', 0),
(7, '2017-08-01 18:30:51', '2017-08-16 20:24:47', 'PH07', 'Phiên số 7', '300000.00', '900000.00', '2017-08-07 08:30:27', '2017-07-31 08:30:27', '3333', 1),
(8, '2017-08-01 18:35:35', '2017-08-01 18:35:35', 'PH08', 'Phiên số 8', '100000.00', '500000.00', '2017-08-16 08:35:21', '2017-08-19 08:35:21', '44', 1),
(9, '2017-08-01 18:36:16', '2017-08-01 18:36:16', 'PH09', 'Phiên số 9', '200000.00', '400000.00', '2017-08-02 08:35:49', '2017-08-01 08:35:49', '42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mind_drug`
--

CREATE TABLE `mind_drug` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mind_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `drug_price` decimal(20,2) DEFAULT NULL,
  `drug_special_price` decimal(20,2) DEFAULT NULL,
  `max_discount_qty` int(11) DEFAULT NULL,
  `max_qty` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mind_drug`
--

INSERT INTO `mind_drug` (`id`, `created_at`, `updated_at`, `mind_id`, `drug_id`, `drug_price`, `drug_special_price`, `max_discount_qty`, `max_qty`, `note`, `status`) VALUES
(11, '2017-08-01 02:27:00', '2017-08-01 02:27:00', 2, 46, '700.00', '0.00', 0, 100, 'không khuyến mãi', 1),
(17, '2017-08-01 02:34:30', '2017-08-01 02:34:30', 6, 91, '1.00', '1.00', 1, 1, '12222', 1),
(20, '2017-08-01 18:13:36', '2017-08-01 18:13:36', 6, 88, '145.00', '10.00', 0, 0, 'bit2222', 1),
(22, '2017-08-01 18:14:10', '2017-08-01 18:14:10', 6, 102, '566.00', '344.00', 0, 0, '56', 1),
(23, '2017-08-01 18:14:10', '2017-08-01 18:14:10', 6, 20, '23.00', '0.00', 0, 0, 'ok', 1),
(24, '2017-08-01 18:24:07', '2017-08-01 18:24:07', 2, 39, '455.00', '0.00', 0, 0, 'ok', 1),
(29, '2017-08-01 18:35:42', '2017-08-01 18:35:42', 8, 92, '12.00', '0.00', 0, 0, '', 1),
(30, '2017-08-01 18:36:16', '2017-08-01 18:36:16', 9, 46, '3443.00', '0.00', 0, 0, '', 1),
(31, '2017-08-01 18:36:16', '2017-08-01 18:36:16', 9, 92, '125555.00', '23.00', 0, 0, '', 1),
(32, '2017-08-06 20:58:20', '2017-08-06 20:58:20', 4, 90, '300000.00', '290000.00', 10, 13, 'sản phẩm 01', 1),
(33, '2017-08-06 20:58:20', '2017-08-06 20:58:20', 4, 59, '500000.00', '0.00', 0, 500, 'sản phẩm 02', 1),
(34, '2017-08-06 20:58:20', '2017-08-06 20:58:20', 4, 88, '100000.00', '90000.00', 20, 300, '', 1),
(35, '2017-08-06 20:58:20', '2017-08-06 20:58:20', 4, 60, '89000.00', '0.00', 0, 1000, '', 1),
(36, '2017-08-06 20:58:20', '2017-08-06 20:58:20', 4, 91, '60000.00', '0.00', 0, 0, '', 1),
(37, '2017-08-06 20:58:20', '2017-08-06 20:58:20', 4, 33, '20000.00', '18000.00', 30, 3000, '', 1),
(38, '2017-08-08 18:03:01', '2017-08-08 18:03:01', 10, 57, '10.00', '0.00', 0, 0, '', 1),
(39, '2017-08-08 18:03:19', '2017-08-08 18:03:19', 10, 72, '100.00', '0.00', 0, 0, '', 1),
(40, '2017-08-16 10:50:04', '2017-08-16 10:50:04', 7, 91, '1000.00', '0.00', 0, 0, '', 1),
(41, '2017-08-16 10:50:42', '2017-08-16 10:50:42', 7, 19, '10000.00', '0.00', 0, 0, '', 1),
(42, '2017-08-16 10:51:02', '2017-08-16 10:51:02', 7, 23, '500000.00', '0.00', 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(11) UNSIGNED NOT NULL,
  `uid` varchar(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `estimatedCount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `estimatedAccepted` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `estimatedDenied` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `balanceTotal` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `license` varchar(200) NOT NULL,
  `phamercist` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `ownerPhone` varchar(100) NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `pushNotify` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `deletedAt` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacieType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `uid`, `code`, `name`, `username`, `address`, `district`, `phone`, `avatar`, `password`, `estimatedCount`, `estimatedAccepted`, `estimatedDenied`, `balance`, `balanceTotal`, `status`, `license`, `phamercist`, `owner`, `ownerPhone`, `lat`, `lng`, `email`, `province`, `pushNotify`, `created`, `updated`, `deleted`, `deletedAt`, `created_at`, `updated_at`, `pharmacieType`) VALUES
(1, 'N1xI468BZvTNSpB', 'PH00001', 'Nhà thuốc 1.', '', '32 Voi Phục, Ngọc Khánh, Ba Đình, Hà Nội, Vietnam', 'Cẩm Giàng', '841234567890', NULL, 'bcrypt:$2y$10$7SbKuVYLzgCTFo1EpF1oT.i6G3Bt68mjCDv5VBranKmhR/y63A1A2', 18, 8, 10, 125000, 125000, 1, '01234567890', 'Độ Dương', 'Độ Dương', '01234567890', '21.028911123993606', '105.80486297607422', 'doduong126@gmail.com', 'Hải Dương', 1, '2017-07-05 13:36:20', '2017-07-08 15:47:50', 0, NULL, NULL, '2017-08-03 20:09:26', 'Nhà thuốc lẻ'),
(2, 'LC4ZxHXBjnyCTa2', 'PH00002', 'Nhà Thuốc 2', '', '3-9 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam', 'Đống Đa', '841234567891', NULL, 'bcrypt:$2y$10$Q2cTzpVRihmoKKNDkITFNuU2btuYZatzhHGs9xvUjut7FGZRf64Ia', 3, 1, 2, 0, 0, 0, '01234567891', 'Độ Dương', 'Độ Dương', '01234567891', '', '', 'doduong126@gmail.com', 'Hà Nội', 1, '2017-07-05 13:38:36', '2017-07-06 19:35:58', 0, NULL, NULL, '2017-08-02 18:30:09', NULL),
(3, 'mD9mZiux9M7bR2S', 'PH00003', 'Cửa hàng thuốc Độ Dương', '', 'Ngõ 64 Đỗ Đức Dục, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', 'Nguyên Bình', '84966545016', NULL, 'bcrypt:$2y$10$lq0rW/HSj268LKS3oIuivu0uV/GLa0i55NaO1jz4JtlO4Td4kwn.K', 24, 8, 9, 2505000, 2720000, 1, '096654501', 'Độ Dương 2', 'Độ Dương', '0966545016', '21.007919694523345', '105.77919960021973', 'doduong126@gmail.com', 'Cao Bằng', 1, '2017-07-05 13:40:21', '2017-07-11 11:18:04', 0, NULL, NULL, '2017-08-03 20:09:15', 'Nhà thuốc lẻ'),
(4, '6utqYO38CHMuwuc', 'PH00004', 'NT Hồng Hoa', '', '1 ngõ 259 phố Vọng', 'Ba Đình', '84915669610', NULL, 'bcrypt:$2y$10$W0FrX9H/UYx2tlPICFkt8u5NjkcBORxbbZ9xiI3VmLoTuEwYE.5g6', 1, 0, 1, 0, 0, 1, 'HN001', 'Hồng Hoa', 'Hồng Hoa', '0915669610', '20.9948785', '105.84352260000003', 'hhoa2210@gmail.com', 'Hà Nội', 1, '2017-07-05 13:45:02', '2017-07-07 15:11:39', 0, NULL, NULL, NULL, NULL),
(5, 'x3d3NQhsdlqsaW4', 'PH00005', 'NT Hồng Hoa 2', '', '4 Liễu Giai, Cống Vị, Ba Đình, Hà Nội, Vietnam', 'Ba Đình', '841253847087', 'http://54.244.58.180:10001/uploads/images/2017/07/595f417c64ecc_d1f8d733a9c6478e38fe6b2d5bf166efcbe37df9.jpg', 'bcrypt:$2y$10$jZCmahvv0gEkalsorqCX4./2v3x4gmYh8jfKgO4RB1ozGcCcYFi0y', 4, 2, 0, 0, 0, 0, 'HN002', 'Hồng Hoa', 'Hồng Hoa', '0915669610', '21.0345393', '105.81409529999996', 'hongntb@gli.vn', 'Hà Nội', 1, '2017-07-05 14:12:40', '2017-07-08 10:48:15', 0, NULL, NULL, NULL, NULL),
(6, 'Qrjc4NuJlSJkDQM', 'PH00006', 'Nhà thuốc Khánh', '', 'Dương Đình Nghệ, Yên Hoà, Cầu Giấy, Hà Nội, Vietnam', 'Tây Hồ', '841234567893', NULL, 'bcrypt:$2y$10$5.6Yk5caypWrHVzONkEAl.cgtzPQmBjTdhT67/YYFmD.Sjw.DuMZq', 0, 0, 0, 0, 0, 1, '01234567893', 'Khánh PD', 'Khánh PD', '01234567893', '21.02138018769172', '105.78529357910156', 'doduong126@gmail.com', 'Hà Nội', 1, '2017-07-05 14:26:32', '2017-07-06 19:35:58', 0, NULL, NULL, '2017-08-02 18:29:59', NULL),
(7, 'aC9JQ07uamOFZha', 'PH00007', 'Nhà thuốc Quốc Khánh', '', '28 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam', 'Từ Liêm', '841234567894', NULL, 'bcrypt:$2y$10$HpKAwNUi8jfBT1kW1OsUqOjy31mXgq1AyA6UfnuVrNUe/2NbFXV9m', 6, 4, 2, 20020000, 20030000, 0, '01234567894', 'Quốc Khánh', 'Quốc Khánh', '01234567894', '21.030713685286866', '105.78520774841309', 'doduong126@gmail.com', 'Hà Nội', 1, '2017-07-05 14:38:32', '2017-07-06 19:35:58', 0, NULL, NULL, NULL, NULL),
(8, 'r8CxQdmkjYZWdjo', 'PH00008', 'Nhà Thuốc Huy Quang', '', '705 Đê la Thành, Thành Công, Ba Đình, Hà Nội, Vietnam', 'Từ Liêm', '841235841993', NULL, 'bcrypt:$2y$10$qWHJTbKaF.ySRxXBjKp15OHPkOTlTIEdHptD1LVkzy2qqOciEUn6e', 24, 12, 12, 670000, 675000, 0, '841235841993', 'Quang', 'Quang', '01235841993', '21.024304479419293', '105.8131456375122', 'doduong126@gmail.com', 'Hà Nội', 1, '2017-07-05 18:35:10', '2017-07-11 12:28:51', 0, NULL, NULL, '2017-08-03 19:22:37', 'Nhà thuốc lẻ'),
(9, 'LHrmuNuctPMsigJ', 'PH00009', 'Nhà thuốc Xuân Mạnh', '', 'Ngõ 20 - Huỳnh Thúc Kháng, Láng Hạ, Đống Đa, Hà Nội, Vietnam', 'Từ Liêm', '84978604566', NULL, 'bcrypt:$2y$10$B6cCKV3vqOCb0pyMx8VuTe97x9Du/xt0DvLbNMoArMSCPxymWiBNy', 0, 0, 0, 0, 0, 0, '0978604566', 'Xuân Mạnh', 'Xuân Mạnh', '0978604566', '21.02033864527858', '105.80924034118652', 'doduong126@gmail.com', 'Hà Nội', 1, '2017-07-05 18:36:38', '2017-07-06 19:35:59', 0, NULL, NULL, '2017-08-03 21:46:42', NULL),
(11, 'LHrmuzuctPMsigJ', 'PH00010', 'Illiana Tran', '', 'Hồ Tây, Tây Hồ, Hà Nội, Việt Nam', '', '841667208673', NULL, 'raw:quantm', 7, 3, 1, 0, 0, 1, 'Molestias voluptatum sit quis qui perferendis ipsa at ullam animi minus cumque tempora Nam', 'Qui delectus quaerat quos velit ex officia dolor in omnis sint perspiciatis at', 'Odio eiusmod non aut cum inventore quos doloribus', '01667208673', '21.053238', '105.82609430000002', 'xovodu@gmail.com', 'Hà Nội', 1, NULL, '2017-07-10 11:47:21', 0, NULL, NULL, NULL, NULL),
(12, 'NSURSH2MwZ9PurU', 'PH00012', 'ewewewe', '', '79 Hào Nam, Ô Chợ Dừa, Đống Đa, Hà Nội, Việt Nam', 'Đống Đa', '8412222233333', NULL, 'bcrypt:$2y$10$R5JSod0/HHVWIvDwuQfZpOa29d62O466TEFXr6kfVXyvHnLIaOxfC', 0, 0, 0, 0, 0, 1, 'sdsdd', 'ssdsd', 'sdsd sdsdsdsd', '01235684545', '21.0246563', '105.8250221', 'eweeewewe@gmail.com', 'Hà Nội', 1, '2017-07-05 22:12:35', '2017-07-06 19:35:59', 0, NULL, NULL, NULL, NULL),
(13, 'AJYYaI8NU5XUaj8', 'PH00013', 'Nhà Thuốc Tâm Đức', '', 'Đỗ Nhuận, phường Xuân Đỉnh, Từ Liêm, Hà Nội, Việt Nam', 'Từ Liêm', '84123456001', 'http://54.244.58.180:10001/uploads/images/2017/07/595db62e59f3b_b5703ac068802fd4c4ca6b8e87b4fc9f76c0c3ba.png', 'bcrypt:$2y$10$fMRGgRklhVlUg85TjnVmyuLpCuLy6porKGTGCCwzQdlV/YFrcmiMa', 0, 0, 0, 1000000, 1000000, 1, 'license', 'Giang', 'Nam', '0123456001', '21.06868257294006', '105.78555107116699', 'adb@gmail.com', 'Hà Nội', 1, '2017-07-06 11:01:53', '2017-07-06 19:35:59', 0, NULL, NULL, NULL, NULL),
(14, 'RnHvb8x2670qvN6', 'PH00014', 'Nhà thuốc TP HCM1', '', '353C Âu Cơ, phường 10, Tân Bình, Hồ Chí Minh, Vietnam', 'Tân Bình', '841234567895', NULL, 'bcrypt:$2y$10$ZY9y38bVNzNhgalXbXMF9.WUGZeBf4MUvtjDkMCJ042Crj26agnVW', 0, 0, 0, 0, 0, 1, '01234567895', 'HCM', 'HCM', '01234567895', '10.781709316395313', '106.64471626281738', 'doduong126@gmail.com', 'Hồ Chí Minh', 1, '2017-07-06 16:25:57', '2017-07-06 19:35:59', 0, NULL, NULL, NULL, NULL),
(15, '7cV8v3kWfSDhGuq', 'PH00015', 'Nhà Thuốc Tháng 7', '', 'K2, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', 'Đống Đa', '841234567896', NULL, 'bcrypt:$2y$10$wc0a9hC04mI3Gr3Cb9JS/usF5LSz8xiR6QcUl5OXm.siD7Jt9kNA.', 0, 0, 0, 0, 0, 1, '01234567896', 'Độ Dương', 'Độ Dương', '01234567896', '21.010163194408364', '105.76400756835938', 'doduong126@gmail.com', 'Hà Nội', 1, '2017-07-06 18:33:22', '2017-07-24 20:56:26', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `sort` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `type`, `sort`, `status`) VALUES
(1, 'Hà Nội', 'Thành Phố', 10, 1),
(2, 'Hà Giang', 'Tỉnh', 0, 0),
(4, 'Cao Bằng', 'Tỉnh', 0, 0),
(6, 'Bắc Kạn', 'Tỉnh', 0, 0),
(8, 'Tuyên Quang', 'Tỉnh', 0, 0),
(10, 'Lào Cai', 'Tỉnh', 0, 0),
(11, 'Điện Biên', 'Tỉnh', 0, 0),
(12, 'Lai Châu', 'Tỉnh', 0, 0),
(14, 'Sơn La', 'Tỉnh', 0, 0),
(15, 'Yên Bái', 'Tỉnh', 0, 0),
(17, 'Hòa Bình', 'Tỉnh', 0, 0),
(19, 'Thái Nguyên', 'Tỉnh', 0, 0),
(20, 'Lạng Sơn', 'Tỉnh', 0, 0),
(22, 'Quảng Ninh', 'Tỉnh', 0, 0),
(24, 'Bắc Giang', 'Tỉnh', 0, 0),
(25, 'Phú Thọ', 'Tỉnh', 0, 0),
(26, 'Vĩnh Phúc', 'Tỉnh', 0, 0),
(27, 'Bắc Ninh', 'Tỉnh', 0, 0),
(30, 'Hải Dương', 'Tỉnh', 0, 0),
(31, 'Hải Phòng', 'Thành Phố', 7, 0),
(33, 'Hưng Yên', 'Tỉnh', 0, 0),
(34, 'Thái Bình', 'Tỉnh', 0, 0),
(35, 'Hà Nam', 'Tỉnh', 0, 0),
(36, 'Nam Định', 'Tỉnh', 0, 0),
(37, 'Ninh Bình', 'Tỉnh', 0, 0),
(38, 'Thanh Hóa', 'Tỉnh', 0, 0),
(40, 'Nghệ An', 'Tỉnh', 0, 0),
(42, 'Hà Tĩnh', 'Tỉnh', 0, 0),
(44, 'Quảng Bình', 'Tỉnh', 0, 0),
(45, 'Quảng Trị', 'Tỉnh', 0, 0),
(46, 'Thừa Thiên Huế', 'Tỉnh', 0, 0),
(48, 'Đà Nẵng', 'Thành Phố', 8, 0),
(49, 'Quảng Nam', 'Tỉnh', 0, 0),
(51, 'Quảng Ngãi', 'Tỉnh', 0, 0),
(52, 'Bình Định', 'Tỉnh', 0, 0),
(54, 'Phú Yên', 'Tỉnh', 0, 0),
(56, 'Khánh Hòa', 'Tỉnh', 0, 0),
(58, 'Ninh Thuận', 'Tỉnh', 0, 0),
(60, 'Bình Thuận', 'Tỉnh', 0, 0),
(62, 'Kon Tum', 'Tỉnh', 0, 0),
(64, 'Gia Lai', 'Tỉnh', 0, 0),
(66, 'Đắk Lắk', 'Tỉnh', 0, 0),
(67, 'Đắk Nông', 'Tỉnh', 0, 0),
(68, 'Lâm Đồng', 'Tỉnh', 0, 0),
(70, 'Bình Phước', 'Tỉnh', 0, 0),
(72, 'Tây Ninh', 'Tỉnh', 0, 0),
(74, 'Bình Dương', 'Tỉnh', 0, 0),
(75, 'Đồng Nai', 'Tỉnh', 0, 0),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh', 0, 0),
(79, 'Hồ Chí Minh', 'Thành Phố', 9, 0),
(80, 'Long An', 'Tỉnh', 0, 0),
(82, 'Tiền Giang', 'Tỉnh', 0, 0),
(83, 'Bến Tre', 'Tỉnh', 0, 0),
(84, 'Trà Vinh', 'Tỉnh', 0, 0),
(86, 'Vĩnh Long', 'Tỉnh', 0, 0),
(87, 'Đồng Tháp', 'Tỉnh', 0, 0),
(89, 'An Giang', 'Tỉnh', 0, 0),
(91, 'Kiên Giang', 'Tỉnh', 0, 0),
(92, 'Cần Thơ', 'Thành Phố', 6, 0),
(93, 'Hậu Giang', 'Tỉnh', 0, 0),
(94, 'Sóc Trăng', 'Tỉnh', 0, 0),
(95, 'Bạc Liêu', 'Tỉnh', 0, 0),
(96, 'Cà Mau', 'Tỉnh', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2017-07-27 21:46:26', '2017-07-27 21:46:26'),
(2, 'Redactor', 'redac', '2017-07-27 21:46:26', '2017-07-27 21:46:26'),
(3, 'User', 'user', '2017-07-27 21:46:26', '2017-07-27 21:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mind_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` decimal(20,2) NOT NULL,
  `shipping_cost` decimal(20,2) NOT NULL,
  `cost_discount` decimal(20,2) NOT NULL,
  `before_total` decimal(20,2) NOT NULL,
  `before_pay` decimal(20,2) NOT NULL,
  `end_total` decimal(20,2) NOT NULL,
  `owner` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_cost` decimal(20,2) DEFAULT NULL,
  `countQty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `created_at`, `updated_at`, `mind_id`, `user_id`, `created_date`, `address`, `phone`, `shipping_method`, `note`, `status`, `sub_total`, `shipping_cost`, `cost_discount`, `before_total`, `before_pay`, `end_total`, `owner`, `buyer_cost`, `countQty`) VALUES
(6, '2017-08-12 02:55:49', '2017-08-12 02:55:49', 4, 2, '2017-08-12 09:55:49', '84966545017', '165 Thái Hà, Hanoi', 'Vận chuyển tới khách hàng', NULL, 'Đợi giao hàng', '3688000.00', '40000.00', '55000.00', '3688000.00', '3688000.00', '3693000.00', 'do duong 1', '20000.00', NULL),
(7, '2017-08-12 07:42:34', '2017-08-12 07:42:34', 4, 2, '2017-08-12 14:42:34', '84966545017', '165 Thái Hà, Hanoi', 'Vận chuyển tới khách hàng', NULL, 'Đợi giao hàng', '3745000.00', '40000.00', '55000.00', '3745000.00', '3745000.00', '3750000.00', 'do duong', '20000.00', NULL),
(8, '2017-08-12 09:04:01', '2017-08-13 02:24:28', 4, 2, '2017-08-12 16:04:01', '0914390567', '122 yen hoac', 'Vận chuyển tới khách hàng', NULL, 'Hủy', '2267000.00', '40000.00', '55000.00', '2267000.00', '2267000.00', '2272000.00', 'le toan', '20000.00', NULL),
(9, '2017-08-12 09:07:04', '2017-08-13 02:24:28', 4, 2, '2017-08-12 16:07:04', '0914390567', '165 Thái Hà, Hanoi', 'Vận chuyển tới khách hàng', NULL, 'Hủy', '1013000.00', '40000.00', '55000.00', '1013000.00', '1013000.00', '1018000.00', 'do duong', '20000.00', NULL),
(10, '2017-08-12 20:39:03', '2017-08-13 02:16:38', 4, 22, '2017-08-13 03:39:03', '0914390567', 'ha noi viet nam', 'Vận chuyển tới khách hàng', NULL, 'Hoàn thành', '1160000.00', '40000.00', '55000.00', '1160000.00', '1160000.00', '1165000.00', 'letoan', '20000.00', NULL),
(11, '2017-08-13 00:08:46', '2017-08-15 00:55:02', 4, 22, '2017-08-13 07:08:46', 'ha noi', '09232323', 'Vận chuyển tới khách hàng', 'note 2', 'Đang giao', '4777000.00', '40000.00', '55000.00', '4777000.00', '4777000.00', '4782000.00', 'letoan', '20000.00', 17),
(12, '2017-08-13 02:39:39', '2017-08-15 03:00:27', 4, 22, '2017-08-13 09:39:39', '122 yen hoa', '0914390567', 'Vận chuyển tới khách hàng', 'note', 'Đang giao', '5254000.00', '40000.00', '55000.00', '5254000.00', '5254000.00', '5259000.00', 'letoan', '20000.00', 22),
(13, '2017-08-13 18:43:23', '2017-08-14 21:23:52', 4, 22, '2017-08-14 01:43:23', '32323', '0914390567', 'Vận chuyển tới khách hàng', '322323', 'Đang giao', '1249000.00', '40000.00', '55000.00', '1249000.00', '1249000.00', '1254000.00', 'letoan', '20000.00', 5),
(14, '2017-08-13 18:45:21', '2017-08-14 21:21:13', 4, 22, '2017-08-14 01:45:21', 'ha noi - viet nam 45', '0914390567', 'Vận chuyển tới khách hàng', 'notes', 'Đợi chia', '1000000.00', '40000.00', '55000.00', '1000000.00', '1000000.00', '1005000.00', 'letoan', '20000.00', 2),
(15, '2017-08-16 20:15:01', '2017-08-16 20:15:01', 4, 22, '2017-08-17 03:15:01', 'ha tinh', '09143905678', 'Vận chuyển tới khách hàng', NULL, 'Đợi giao hàng', '3378000.00', '40000.00', '55000.00', '3378000.00', '3378000.00', '3383000.00', 'letoan', '20000.00', 13);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_drug`
--

CREATE TABLE `transaction_drug` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_drug`
--

INSERT INTO `transaction_drug` (`id`, `created_at`, `updated_at`, `transaction_id`, `drug_id`, `qty`, `price`, `type`) VALUES
(28, '2017-08-12 02:55:49', '2017-08-12 02:55:49', 6, 90, 9, '2610000.00', 'discount'),
(29, '2017-08-12 02:55:49', '2017-08-12 02:55:49', 6, 60, 2, '178000.00', 'root'),
(30, '2017-08-12 02:55:49', '2017-08-12 02:55:49', 6, 90, 3, '900000.00', 'root'),
(31, '2017-08-12 07:42:34', '2017-08-12 07:42:34', 7, 90, 10, '2900000.00', 'discount'),
(32, '2017-08-12 07:42:34', '2017-08-12 07:42:34', 7, 33, 2, '36000.00', 'discount'),
(33, '2017-08-12 07:42:34', '2017-08-12 07:42:34', 7, 90, 2, '600000.00', 'root'),
(34, '2017-08-12 07:42:34', '2017-08-12 07:42:34', 7, 60, 1, '89000.00', 'root'),
(35, '2017-08-12 07:42:34', '2017-08-12 07:42:34', 7, 91, 2, '120000.00', 'root'),
(36, '2017-08-12 09:04:01', '2017-08-12 09:04:01', 8, 90, 6, '1740000.00', 'discount'),
(37, '2017-08-12 09:04:01', '2017-08-12 09:04:01', 8, 33, 1, '18000.00', 'discount'),
(38, '2017-08-12 09:04:01', '2017-08-12 09:04:01', 8, 60, 1, '89000.00', 'root'),
(39, '2017-08-12 09:04:01', '2017-08-12 09:04:01', 8, 91, 2, '120000.00', 'root'),
(40, '2017-08-12 09:04:01', '2017-08-12 09:04:01', 8, 90, 1, '300000.00', 'root'),
(41, '2017-08-12 09:07:04', '2017-08-12 09:07:04', 9, 90, 1, '290000.00', 'discount'),
(42, '2017-08-12 09:07:04', '2017-08-12 09:07:04', 9, 33, 2, '36000.00', 'discount'),
(43, '2017-08-12 09:07:04', '2017-08-12 09:07:04', 9, 90, 1, '300000.00', 'root'),
(44, '2017-08-12 09:07:04', '2017-08-12 09:07:04', 9, 60, 3, '267000.00', 'root'),
(45, '2017-08-12 09:07:04', '2017-08-12 09:07:04', 9, 91, 2, '120000.00', 'root'),
(46, '2017-08-12 20:39:03', '2017-08-12 20:39:03', 10, 90, 4, '1160000.00', 'discount'),
(47, '2017-08-13 00:08:46', '2017-08-14 23:48:05', 11, 90, 9, '2610000.00', 'discount'),
(48, '2017-08-13 00:08:46', '2017-08-14 23:48:05', 11, 59, 2, '1000000.00', 'root'),
(49, '2017-08-13 00:08:46', '2017-08-14 23:48:05', 11, 90, 3, '900000.00', 'root'),
(50, '2017-08-13 00:08:46', '2017-08-14 23:48:05', 11, 60, 3, '267000.00', 'root'),
(51, '2017-08-13 02:39:39', '2017-08-15 02:59:56', 12, 90, 8, '2320000.00', 'discount'),
(53, '2017-08-13 02:39:39', '2017-08-15 02:59:56', 12, 90, 8, '2400000.00', 'root'),
(54, '2017-08-13 02:39:39', '2017-08-15 02:59:56', 12, 60, 6, '534000.00', 'root'),
(55, '2017-08-13 18:43:23', '2017-08-13 18:43:23', 13, 90, 4, '1160000.00', 'discount'),
(56, '2017-08-13 18:43:23', '2017-08-13 18:43:23', 13, 60, 1, '89000.00', 'root'),
(57, '2017-08-13 18:45:22', '2017-08-13 18:45:22', 14, 59, 2, '1000000.00', 'root'),
(58, '2017-08-16 20:15:01', '2017-08-16 20:15:01', 15, 90, 10, '2900000.00', 'discount'),
(59, '2017-08-16 20:15:01', '2017-08-16 20:15:01', 15, 90, 1, '300000.00', 'root'),
(60, '2017-08-16 20:15:01', '2017-08-16 20:15:01', 15, 60, 2, '178000.00', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_send`
--

CREATE TABLE `transaction_send` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` int(11) NOT NULL,
  `shipping_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_send` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty_box` int(11) NOT NULL,
  `date_send` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_send`
--

INSERT INTO `transaction_send` (`id`, `created_at`, `updated_at`, `transaction_id`, `shipping_method`, `code_send`, `qty_box`, `date_send`, `note`, `status`) VALUES
(3, '2017-08-15 00:55:02', '2017-08-15 02:59:09', 11, 'Nhà vận chuyển số 3', 'nd232323', 2, '2017-08-15 16:53:24', '3', NULL),
(4, '2017-08-15 03:00:27', '2017-08-15 03:00:27', 12, 'Nhà vận chuyển số 4', 'maso1', 10, '2017-08-15 17:00:01', 'ok giao', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `seen`, `valid`, `confirmed`, `confirmation_code`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Quản trị', 'admin@gmail.com', '$2y$10$bzffypDnx0UTNIRNzE8WTuEwnxhrWVMiSNJ/vLwznn3KPEXA0/t7m', 1, 1, 0, 1, NULL, '2017-07-27 21:46:26', '2017-08-04 18:51:33', 'sF1Ef7lBNdgC6HD3SvVQlyoA4m48uOi0hY7a4fDaP117MCBdzSmianvG0koN');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '2017-08-12 21:26:21', '2017-08-12 21:26:21', 22),
(2, '2017-08-13 22:07:30', '2017-08-12 22:07:30', 22),
(3, '2017-08-12 22:17:32', '2017-08-12 22:17:32', 22),
(4, '2017-08-12 22:35:03', '2017-08-12 22:35:03', 22),
(5, '2017-08-13 17:59:09', '2017-08-13 17:59:09', 22),
(6, '2017-08-13 18:25:45', '2017-08-13 18:25:45', 22),
(7, '2017-08-13 18:47:14', '2017-08-13 18:47:14', 22),
(8, '2017-08-15 08:13:06', '2017-08-15 08:13:06', 22),
(9, '2017-08-15 08:26:09', '2017-08-15 08:26:09', 22),
(10, '2017-08-15 09:16:36', '2017-08-15 09:16:36', 22),
(11, '2017-08-16 20:05:47', '2017-08-16 20:05:47', 22),
(12, '2017-08-16 20:17:51', '2017-08-16 20:17:51', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config_discount`
--
ALTER TABLE `config_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `facebookId` (`facebookId`),
  ADD UNIQUE KEY `googleId` (`googleId`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `inviteCode` (`inviteCode`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinceId` (`provinceId`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`,`status`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `code` (`code`);
ALTER TABLE `drugs` ADD FULLTEXT KEY `name` (`code`,`nameClean`);

--
-- Indexes for table `drug_image`
--
ALTER TABLE `drug_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_drugs`
--
ALTER TABLE `group_drugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_drugs_code_unique` (`code`);

--
-- Indexes for table `minds`
--
ALTER TABLE `minds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `minds_code_unique` (`code`);

--
-- Indexes for table `mind_drug`
--
ALTER TABLE `mind_drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort` (`sort`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_drug`
--
ALTER TABLE `transaction_drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_send`
--
ALTER TABLE `transaction_send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config_discount`
--
ALTER TABLE `config_discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `drug_image`
--
ALTER TABLE `drug_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `group_drugs`
--
ALTER TABLE `group_drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `minds`
--
ALTER TABLE `minds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mind_drug`
--
ALTER TABLE `mind_drug`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaction_drug`
--
ALTER TABLE `transaction_drug`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `transaction_send`
--
ALTER TABLE `transaction_send`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
