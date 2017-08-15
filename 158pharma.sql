/*
Navicat MySQL Data Transfer

Source Server         : Localhost MySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pharma

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-15 17:29:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'Dupont', 'dupont@la.fr', 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.', '0', '2017-07-28 04:46:27', '2017-07-28 04:46:27');
INSERT INTO `contacts` VALUES ('2', 'Durand', 'durand@la.fr', ' Lorem ipsum erat non elit ultrices placerat, netus metus feugiat non conubia fusce porttitor, sociosqu diam commodo metus in. Himenaeos vitae aptent consequat luctus purus eleifend enim, sollicitudin eleifend porta malesuada ac class conubia, condimentum mauris facilisis conubia quis scelerisque. Lacinia tempus nullam felis fusce ac potenti netus ornare semper molestie, iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet euismod.', '0', '2017-07-28 04:46:27', '2017-07-28 04:46:27');
INSERT INTO `contacts` VALUES ('3', 'Martin', 'martin@la.fr', 'Lorem ipsum tempor netus aenean ligula habitant vehicula tempor ultrices, placerat sociosqu ultrices consectetur ullamcorper tincidunt quisque tellus, ante nostra euismod nec suspendisse sem curabitur elit. Malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui. Lectus curabitur euismod ad, erat.', '1', '2017-07-28 04:46:27', '2017-07-28 04:46:27');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `verified` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pushNotify` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `province` varchar(200) DEFAULT NULL,
  `lat` varchar(20) DEFAULT '0',
  `lng` varchar(20) DEFAULT '0',
  `updated` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deletedAt` datetime DEFAULT NULL,
  `pharmacieId` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(110) DEFAULT NULL,
  `isRole` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `facebookId` (`facebookId`),
  UNIQUE KEY `googleId` (`googleId`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `inviteCode` (`inviteCode`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'ORyrZFFgQbjOjHG', 'KH00001', '9813096929', 'Quản trị', 'Toà nhà VTC, 23 Lạc Trung, Vĩnh Tuy, Hai Bà Trưng, Hà Nội, Vietnam', '841235841993', '$2y$10$bzffypDnx0UTNIRNzE8WTuEwnxhrWVMiSNJ/vLwznn3KPEXA0/t7m', 'admin@email.com', '11', '1', '0', '1', null, '1348313485253921', null, 'http://graph.facebook.com/1348313485253921/picture?type=square', '0', '1', 'Hà Nội', '20.976411', '105.785588', '2017-07-11 12:20:53', '2017-07-05 12:15:00', '0', null, null, null, '2017-08-13 03:35:31', 'WMzZorWNG1V6rKzGwEr5ioLtT3NJ64vjLMLjLwt9N3YuaddqjMt47KHCJ6sR', 'administrator');
INSERT INTO `customers` VALUES ('2', '39749uZTYX8iNPS', 'KH00002', '4682299361', 'do duong', '165 Thái Hà, Hanoi', '84966545017', '$2y$10$bzffypDnx0UTNIRNzE8WTuEwnxhrWVMiSNJ/vLwznn3KPEXA0/t7m', 'user@gmail.com', '39', '8', '0', '0', null, null, '111152556609702095375', null, '0', '1', 'Hà Nội', '21.007327', '105.781571', '2017-07-11 11:51:56', '2017-07-05 13:48:58', '0', null, null, null, '2017-08-07 02:30:17', 'RukXJsB3vW3ax8Ovdv2n74zqL2xRl6Q6LjBZKUQ7reBxmUDvnM5WfUQV0jr8', null);
INSERT INTO `customers` VALUES ('3', '6ihKK761hObKpWv', 'KH00003', '3873456070', 'Hồng Hoa', '4 Liễu Giai, Hanoi', '84915669610', 'bcrypt:$2y$10$tPjcKHmg0D.uvOui0Eq2UuRiuJ6ENyKunCXNOGZDRF4nMc854XUwG', null, '7', '0', '0', '1', null, null, null, null, '0', '1', 'Hà Nội', '21.034541865095754', '105.8140766993165', '2017-07-08 13:49:55', '2017-07-05 13:57:35', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('4', 'aTs6iGWJZ9OMDx8', 'KH00004', '4830883104', 'Mary Jane Asia', null, '841697449611', null, null, '2', '0', '0', '1', null, '1891556997749553', null, 'http://graph.facebook.com/1891556997749553/picture?type=square', '0', '1', 'Hà Nội', '21.031074', '105.785142', '2017-07-10 13:31:11', '2017-07-05 14:40:31', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('5', 'MEtsPzrJb0aUihk', 'KH00005', '4538486541', 'Đình Khánh Phùng', 'Ngõ 36 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', '841697449688', null, 'phungdinhkhanh@gmail.com', '1', '0', '0', '1', null, null, '100475992865974618420', null, '0', '1', 'Hà Nội', '21.0308269', '105.7850604', '2017-07-07 14:42:15', '2017-07-05 16:11:18', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('6', 'Yr3UgqrMVeGMHgB', 'KH00006', '8911122336', 'Độ Dương', '30 Đỗ Đức Dục, Mễ Trì, Từ Liêm, Hà Nội', '84966545019', null, null, '12', '0', '0', '1', null, '1425510644185197', null, 'http://graph.facebook.com/1425510644185197/picture?type=square', '0', '1', 'Hà Nội', '21.0084227', '105.7821477', '2017-07-07 09:36:21', '2017-07-05 16:32:56', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('7', 'pWdO4rySq39p7oq', 'KH00007', '4378846109', 'Đặng Xuân Mạnh', 'J thế thôi chứ không thể', '84978604566', null, null, '7', '1', '0', '0', null, '1418670781546735', null, 'http://graph.facebook.com/1418670781546735/picture?type=square', '0', '1', 'Hà Nội', '21.024539509365436', '105.81471506506205', '2017-07-10 11:46:36', '2017-07-05 18:49:05', '0', null, null, null, '2017-08-04 08:38:34', null, null);
INSERT INTO `customers` VALUES ('8', 'pWdO4rySq36p7oq', 'KH00008', '1', 'Quan Tran', null, '841667208673', 'raw:quantm', null, '7', '0', '0', '1', null, null, null, null, '0', '1', 'Hà Nội', '21.002489', '105.863947', '2017-07-09 20:18:36', '0000-00-00 00:00:00', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('9', '4taWuoWJSxOQCdu', 'KH00009', '8917606832', 'steven wozinak2', '28 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', '84123456701', null, 'stevenwozniak22016@gmail.com', '0', '0', '0', '1', null, null, '114458559066951536723', null, '0', '1', null, '0', '0', '2017-07-07 14:51:26', '2017-07-06 11:11:11', '1', '2017-07-07 14:51:26', null, null, null, null, null);
INSERT INTO `customers` VALUES ('10', 'iGw5WGJDhwwiIHF', 'KH00010', '9117282072', 'Vũ Quang Sao', 'Ngõ số 2, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', '841656121038', null, null, '0', '0', '0', '1', null, '976848635784089', null, 'http://graph.facebook.com/976848635784089/picture?type=square', '0', '1', null, '0', '0', '2017-07-08 17:07:28', '2017-07-06 19:22:56', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('11', '6azungabojJf4KO', 'KH00011', '3071543606', 'Độ Dương', 'Số 10 ĐCT08, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', '84966545016', 'bcrypt:$2y$10$oHoKBTyzHOr.z42XAdupvuy5FZriwu1Bek/iGX1CJEy1eqcqiThnm', null, '7', '1', '0', '1', null, null, null, null, '0', '1', 'Hà Nội', '21.007869', '105.781725', '2017-07-07 15:39:38', '2017-07-06 21:05:03', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('12', 'fcw2sxvYsKVZnjj', 'KH00012', '2460817190', 'Micle Tran', '30 Đỗ Đức Dục, Mễ Trì, Từ Liêm, Hà Nội', '841662029818', null, 'trantran@gmail.com', '0', '0', '0', '1', null, '1172367332909555', null, 'http://graph.facebook.com/1172367332909555/picture?type=square', '0', '1', null, '21.0084205', '105.7821706', '2017-07-07 08:53:11', '2017-07-07 08:49:15', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('13', 'ZUbraDHOs8we47I', 'KH00013', '9210682099', 'Phùng Đình Khánh', '68B Kẻ Vẽ, Đông Ngạc, Từ Liêm, Hà Nội', '841697449680', null, null, '2', '0', '0', '1', null, '1485799851482128', null, 'http://graph.facebook.com/1485799851482128/picture?type=square', '0', '1', 'Hà Nội', '21.087859', '105.783364', '2017-07-09 15:37:02', '2017-07-09 15:11:14', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('14', 'Tt1jnxOTdIs5vat', 'KH00014', '305188223', 'Phạm aaaaaaTùng', 'Yên Lộ, Dương Nội, Hà Đông, Hà Nội', '84123456789', null, null, '1', '0', '0', '1', null, '1373458ddd576107866', null, 'http://graph.facebook.com/1373458576107866/picture?type=square', '0', '1', 'Hà Nội', '20.9613209', '105.7452604', '2017-07-20 01:00:25', '2017-07-17 16:29:05', '1', '2017-07-20 01:00:25', null, null, null, null, null);
INSERT INTO `customers` VALUES ('15', 'apm0ii3HI3sj1S9', 'KH00015', '4882353068', 'Dương Nguyễn', null, '84989819327', null, null, '0', '0', '0', '1', null, '1890568564501359', null, 'http://graph.facebook.com/1890568564501359/picture?type=square', '0', '1', null, '0', '0', '2017-07-19 23:53:49', '2017-07-19 23:53:49', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('16', 'hXkhXajpECb6Pw1', 'KH00016', '4406436059', 'Manh Tung Pham', null, '84969545168', null, null, '1', '0', '0', '1', null, null, '114667617673906861686', null, '0', '1', 'Hà Nội', '20.961398', '105.743309', '2017-07-24 21:08:44', '2017-07-20 00:21:33', '1', '2017-07-24 21:08:44', null, null, null, null, null);
INSERT INTO `customers` VALUES ('17', 'r115mdSr2U0WIlR', 'KH00017', '309969206', 'Phạm Mạnh Tùng', 'Yên Lộ, Dương Nội, Hà Đông, Hà Nội', '841635672888', null, null, '0', '0', '0', '1', null, '1373458576107866', null, 'http://graph.facebook.com/1373458576107866/picture?type=square', '0', '1', null, '20.9613209', '105.7452604', '2017-07-24 21:11:13', '2017-07-20 01:02:06', '1', '2017-07-24 21:11:13', null, null, null, null, null);
INSERT INTO `customers` VALUES ('18', 'LYnxHCJ2avssFKf', 'KH00018', '9222374474', 'Tùng Phạm Mạnh', null, '841635678888', null, null, '0', '0', '0', '1', null, null, '104439021160393320862', null, '0', '1', null, '0', '0', '2017-07-20 01:57:29', '2017-07-20 01:57:29', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('19', 'Dw5NFYU0c2qS74e', 'KH00019', '2579750926', 'gandalf', 'Yên Lộ, Dương Nội, Hà Đông, Hà Nội', '84914776153', 'bcrypt:$2y$10$SC8IHwOJxnlRvpI2UgYAXueITQm.yMbJ8LmMsovQ4EnU3/BYY1qha', null, '0', '0', '0', '1', null, null, null, null, '0', '1', null, '20.9613209', '105.7452604', '2017-07-24 21:24:25', '2017-07-20 02:57:55', '1', '2017-07-24 21:24:25', null, null, null, null, null);
INSERT INTO `customers` VALUES ('20', 'LmHtwpxQNOjGu2R', 'KH00020', '9990948231', 'Phu Kha', '28 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', '841697449699', null, null, '0', '0', '0', '1', null, '1699921403648035', null, 'http://graph.facebook.com/1699921403648035/picture?type=square', '0', '1', null, '21.0307022', '105.7846583', '2017-07-20 10:49:14', '2017-07-20 10:49:08', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('21', 'BvFZ72xriibwxKx', 'KH00021', '8162800045', 'Phạm Mạnh Tùng', 'triều khúc, thanh xuân', '841635678889', null, null, '11', '0', '0', '1', null, '1368757686577955', null, 'http://graph.facebook.com/1368757686577955/picture?type=square', '0', '1', 'Hà Nội', '20.960186', '105.742720', '2017-07-24 20:37:30', '2017-07-20 13:02:05', '0', null, null, null, null, null, null);
INSERT INTO `customers` VALUES ('22', '598fc8de2d0fe', 'KH022', null, 'letoan', null, '0914390567', '$2y$10$g4h1Qmirq4ie8vTtVQIpOOeRImixsJLgF1b/PLjdkk6MDwgV/ddu2', '', '0', '0', '0', '1', null, null, null, null, '0', '1', null, '0', '0', null, '2017-08-13 03:34:54', '0', null, '2', '2017-08-13 03:34:54', '2017-08-14 01:49:59', 'uhHOJEE64AkkCmVW0D027qFxQ8Ge3Ga02FGuskVDaKTnc73SrADJqymCvBaX', null);

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `provinceId` int(5) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `provinceId` (`provinceId`),
  KEY `name` (`name`),
  KEY `name_2` (`name`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=974 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of districts
-- ----------------------------
INSERT INTO `districts` VALUES ('1', 'Ba Đình', 'Quận', '21 02 08N, 105 49 38E', '1', '1');
INSERT INTO `districts` VALUES ('2', 'Hoàn Kiếm', 'Quận', '21 01 53N, 105 51 09E', '1', '1');
INSERT INTO `districts` VALUES ('3', 'Tây Hồ', 'Quận', '21 04 10N, 105 49 07E', '1', '1');
INSERT INTO `districts` VALUES ('4', 'Long Biên', 'Quận', '21 02 21N, 105 53 07E', '1', '1');
INSERT INTO `districts` VALUES ('5', 'Cầu Giấy', 'Quận', '21 01 52N, 105 47 20E', '1', '1');
INSERT INTO `districts` VALUES ('6', 'Đống Đa', 'Quận', '21 00 56N, 105 49 06E', '1', '1');
INSERT INTO `districts` VALUES ('7', 'Hai Bà Trưng', 'Quận', '21 00 27N, 105 51 35E', '1', '1');
INSERT INTO `districts` VALUES ('8', 'Hoàng Mai', 'Quận', '20 58 33N, 105 51 22E', '1', '1');
INSERT INTO `districts` VALUES ('9', 'Thanh Xuân', 'Quận', '20 59 44N, 105 48 56E', '1', '1');
INSERT INTO `districts` VALUES ('16', 'Sóc Sơn', 'Huyện', '21 16 55N, 105 49 46E', '1', '1');
INSERT INTO `districts` VALUES ('17', 'Đông Anh', 'Huyện', '21 08 16N, 105 49 38E', '1', '1');
INSERT INTO `districts` VALUES ('18', 'Gia Lâm', 'Huyện', '21 01 28N, 105 56 54E', '1', '1');
INSERT INTO `districts` VALUES ('19', 'Từ Liêm', 'Huyện', '21 02 39N, 105 45 32E', '1', '1');
INSERT INTO `districts` VALUES ('20', 'Thanh Trì', 'Huyện', '20 56 32N, 105 50 55E', '1', '1');
INSERT INTO `districts` VALUES ('24', 'Hà Giang', 'Thị Xã', '22 46 23N, 105 02 39E', '2', '0');
INSERT INTO `districts` VALUES ('26', 'Đồng Văn', 'Huyện', '23 14 34N, 105 15 48E', '2', '0');
INSERT INTO `districts` VALUES ('27', 'Mèo Vạc', 'Huyện', '23 09 10N, 105 26 38E', '2', '0');
INSERT INTO `districts` VALUES ('28', 'Yên Minh', 'Huyện', '23 04 20N, 105 10 13E', '2', '0');
INSERT INTO `districts` VALUES ('29', 'Quản Bạ', 'Huyện', '23 04 03N, 104 58 05E', '2', '0');
INSERT INTO `districts` VALUES ('30', 'Vị Xuyên', 'Huyện', '22 45 50N, 104 56 26E', '2', '0');
INSERT INTO `districts` VALUES ('31', 'Bắc Mê', 'Huyện', '22 45 48N, 105 16 26E', '2', '0');
INSERT INTO `districts` VALUES ('32', 'Hoàng Su Phì', 'Huyện', '22 41 37N, 104 40 06E', '2', '0');
INSERT INTO `districts` VALUES ('33', 'Xín Mần', 'Huyện', '22 38 05N, 104 28 35E', '2', '0');
INSERT INTO `districts` VALUES ('34', 'Bắc Quang', 'Huyện', '22 23 42N, 104 55 06E', '2', '0');
INSERT INTO `districts` VALUES ('35', 'Quang Bình', 'Huyện', '22 23 07N, 104 37 11E', '2', '0');
INSERT INTO `districts` VALUES ('40', 'Cao Bằng', 'Thị Xã', '22 39 20N, 106 15 20E', '4', '0');
INSERT INTO `districts` VALUES ('42', 'Bảo Lâm', 'Huyện', '22 52 37N, 105 27 28E', '4', '0');
INSERT INTO `districts` VALUES ('43', 'Bảo Lạc', 'Huyện', '22 52 31N, 105 42 41E', '4', '0');
INSERT INTO `districts` VALUES ('44', 'Thông Nông', 'Huyện', '22 49 09N, 105 57 05E', '4', '0');
INSERT INTO `districts` VALUES ('45', 'Hà Quảng', 'Huyện', '22 53 42N, 106 06 32E', '4', '0');
INSERT INTO `districts` VALUES ('46', 'Trà Lĩnh', 'Huyện', '22 48 14N, 106 19 47E', '4', '0');
INSERT INTO `districts` VALUES ('47', 'Trùng Khánh', 'Huyện', '22 49 31N, 106 33 58E', '4', '0');
INSERT INTO `districts` VALUES ('48', 'Hạ Lang', 'Huyện', '22 42 37N, 106 41 42E', '4', '0');
INSERT INTO `districts` VALUES ('49', 'Quảng Uyên', 'Huyện', '22 40 15N, 106 27 42E', '4', '0');
INSERT INTO `districts` VALUES ('50', 'Phục Hoà', 'Huyện', '22 33 52N, 106 30 02E', '4', '0');
INSERT INTO `districts` VALUES ('51', 'Hoà An', 'Huyện', '22 41 20N, 106 02 05E', '4', '0');
INSERT INTO `districts` VALUES ('52', 'Nguyên Bình', 'Huyện', '22 38 52N, 105 57 02E', '4', '0');
INSERT INTO `districts` VALUES ('53', 'Thạch An', 'Huyện', '22 28 51N, 106 19 51E', '4', '0');
INSERT INTO `districts` VALUES ('58', 'Bắc Kạn', 'Thị Xã', '22 08 00N, 105 51 10E', '6', '0');
INSERT INTO `districts` VALUES ('60', 'Pác Nặm', 'Huyện', '22 35 46N, 105 40 25E', '6', '0');
INSERT INTO `districts` VALUES ('61', 'Ba Bể', 'Huyện', '22 23 54N, 105 43 30E', '6', '0');
INSERT INTO `districts` VALUES ('62', 'Ngân Sơn', 'Huyện', '22 25 50N, 106 01 00E', '6', '0');
INSERT INTO `districts` VALUES ('63', 'Bạch Thông', 'Huyện', '22 12 04N, 105 51 01E', '6', '0');
INSERT INTO `districts` VALUES ('64', 'Chợ Đồn', 'Huyện', '22 11 18N, 105 34 43E', '6', '0');
INSERT INTO `districts` VALUES ('65', 'Chợ Mới', 'Huyện', '21 57 56N, 105 51 29E', '6', '0');
INSERT INTO `districts` VALUES ('66', 'Na Rì', 'Huyện', '22 09 48N, 106 05 09E', '6', '0');
INSERT INTO `districts` VALUES ('70', 'Tuyên Quang', 'Thị Xã', '21 49 40N, 105 13 12E', '8', '0');
INSERT INTO `districts` VALUES ('72', 'Nà Hang', 'Huyện', '22 28 34N, 105 21 03E', '8', '0');
INSERT INTO `districts` VALUES ('73', 'Chiêm Hóa', 'Huyện', '22 12 49N, 105 14 32E', '8', '0');
INSERT INTO `districts` VALUES ('74', 'Hàm Yên', 'Huyện', '22 05 46N, 105 00 13E', '8', '0');
INSERT INTO `districts` VALUES ('75', 'Yên Sơn', 'Huyện', '21 51 53N, 105 18 14E', '8', '0');
INSERT INTO `districts` VALUES ('76', 'Sơn Dương', 'Huyện', '21 40 22N, 105 22 57E', '8', '0');
INSERT INTO `districts` VALUES ('80', 'Lào Cai', 'Thành Phố', '22 25 07N, 103 58 43E', '10', '0');
INSERT INTO `districts` VALUES ('82', 'Bát Xát', 'Huyện', '22 35 50N, 103 44 49E', '10', '0');
INSERT INTO `districts` VALUES ('83', 'Mường Khương', 'Huyện', '22 41 05N, 104 08 26E', '10', '0');
INSERT INTO `districts` VALUES ('84', 'Si Ma Cai', 'Huyện', '22 39 46N, 104 16 05E', '10', '0');
INSERT INTO `districts` VALUES ('85', 'Bắc Hà', 'Huyện', '22 30 08N, 104 18 54E', '10', '0');
INSERT INTO `districts` VALUES ('86', 'Bảo Thắng', 'Huyện', '22 22 47N, 104 10 00E', '10', '0');
INSERT INTO `districts` VALUES ('87', 'Bảo Yên', 'Huyện', '22 17 38N, 104 25 02E', '10', '0');
INSERT INTO `districts` VALUES ('88', 'Sa Pa', 'Huyện', '22 18 54N, 103 54 18E', '10', '0');
INSERT INTO `districts` VALUES ('89', 'Văn Bàn', 'Huyện', '22 03 48N, 104 10 59E', '10', '0');
INSERT INTO `districts` VALUES ('94', 'Điện Biên Phủ', 'Thành Phố', '21 24 52N, 103 02 31E', '11', '0');
INSERT INTO `districts` VALUES ('95', 'Mường Lay', 'Thị Xã', '22 01 47N, 103 07 10E', '11', '0');
INSERT INTO `districts` VALUES ('96', 'Mường Nhé', 'Huyện', '22 06 11N, 102 30 54E', '11', '0');
INSERT INTO `districts` VALUES ('97', 'Mường Chà', 'Huyện', '21 50 31N, 103 03 15E', '11', '0');
INSERT INTO `districts` VALUES ('98', 'Tủa Chùa', 'Huyện', '21 58 19N, 103 23 01E', '11', '0');
INSERT INTO `districts` VALUES ('99', 'Tuần Giáo', 'Huyện', '21 38 03N, 103 21 06E', '11', '0');
INSERT INTO `districts` VALUES ('100', 'Điện Biên', 'Huyện', '21 15 19N, 103 03 19E', '11', '0');
INSERT INTO `districts` VALUES ('101', 'Điện Biên Đông', 'Huyện', '21 14 07N, 103 15 19E', '11', '0');
INSERT INTO `districts` VALUES ('102', 'Mường Ảng', 'Huyện', '', '11', '0');
INSERT INTO `districts` VALUES ('104', 'Lai Châu', 'Thị Xã', '22 23 15N, 103 24 22E', '12', '0');
INSERT INTO `districts` VALUES ('106', 'Tam Đường', 'Huyện', '22 20 16N, 103 32 53E', '12', '0');
INSERT INTO `districts` VALUES ('107', 'Mường Tè', 'Huyện', '22 24 16N, 102 43 11E', '12', '0');
INSERT INTO `districts` VALUES ('108', 'Sìn Hồ', 'Huyện', '22 17 21N, 103 18 12E', '12', '0');
INSERT INTO `districts` VALUES ('109', 'Phong Thổ', 'Huyện', '22 38 24N, 103 22 38E', '12', '0');
INSERT INTO `districts` VALUES ('110', 'Than Uyên', 'Huyện', '21 59 35N, 103 45 30E', '12', '0');
INSERT INTO `districts` VALUES ('111', 'Tân Uyên', 'Huyện', '', '12', '0');
INSERT INTO `districts` VALUES ('116', 'Sơn La', 'Thành Phố', '21 20 39N, 103 54 52E', '14', '0');
INSERT INTO `districts` VALUES ('118', 'Quỳnh Nhai', 'Huyện', '21 46 34N, 103 39 02E', '14', '0');
INSERT INTO `districts` VALUES ('119', 'Thuận Châu', 'Huyện', '21 24 54N, 103 39 46E', '14', '0');
INSERT INTO `districts` VALUES ('120', 'Mường La', 'Huyện', '21 31 38N, 104 02 48E', '14', '0');
INSERT INTO `districts` VALUES ('121', 'Bắc Yên', 'Huyện', '21 13 23N, 104 22 09E', '14', '0');
INSERT INTO `districts` VALUES ('122', 'Phù Yên', 'Huyện', '21 13 33N, 104 41 51E', '14', '0');
INSERT INTO `districts` VALUES ('123', 'Mộc Châu', 'Huyện', '20 49 21N, 104 43 10E', '14', '0');
INSERT INTO `districts` VALUES ('124', 'Yên Châu', 'Huyện', '20 59 33N, 104 19 51E', '14', '0');
INSERT INTO `districts` VALUES ('125', 'Mai Sơn', 'Huyện', '21 10 08N, 103 59 36E', '14', '0');
INSERT INTO `districts` VALUES ('126', 'Sông Mã', 'Huyện', '21 06 04N, 103 43 56E', '14', '0');
INSERT INTO `districts` VALUES ('127', 'Sốp Cộp', 'Huyện', '20 52 46N, 103 30 38E', '14', '0');
INSERT INTO `districts` VALUES ('132', 'Yên Bái', 'Thành Phố', '21 44 28N, 104 53 42E', '15', '0');
INSERT INTO `districts` VALUES ('133', 'Nghĩa Lộ', 'Thị Xã', '21 35 58N, 104 29 22E', '15', '0');
INSERT INTO `districts` VALUES ('135', 'Lục Yên', 'Huyện', '22 06 44N, 104 43 12E', '15', '0');
INSERT INTO `districts` VALUES ('136', 'Văn Yên', 'Huyện', '21 55 55N, 104 33 51E', '15', '0');
INSERT INTO `districts` VALUES ('137', 'Mù Cang Chải', 'Huyện', '21 48 22N, 104 09 01E', '15', '0');
INSERT INTO `districts` VALUES ('138', 'Trấn Yên', 'Huyện', '21 42 20N, 104 48 56E', '15', '0');
INSERT INTO `districts` VALUES ('139', 'Trạm Tấu', 'Huyện', '21 30 40N, 104 28 03E', '15', '0');
INSERT INTO `districts` VALUES ('140', 'Văn Chấn', 'Huyện', '21 34 15N, 104 35 19E', '15', '0');
INSERT INTO `districts` VALUES ('141', 'Yên Bình', 'Huyện', '21 52 24N, 104 55 16E', '15', '0');
INSERT INTO `districts` VALUES ('148', 'Hòa Bình', 'Thành Phố', '20 50 36N, 105 19 20E', '17', '0');
INSERT INTO `districts` VALUES ('150', 'Đà Bắc', 'Huyện', '20 55 58N, 105 04 52E', '17', '0');
INSERT INTO `districts` VALUES ('151', 'Kỳ Sơn', 'Huyện', '20 54 06N, 105 23 18E', '17', '0');
INSERT INTO `districts` VALUES ('152', 'Lương Sơn', 'Huyện', '20 53 16N, 105 30 55E', '17', '0');
INSERT INTO `districts` VALUES ('153', 'Kim Bôi', 'Huyện', '20 40 34N, 105 32 15E', '17', '0');
INSERT INTO `districts` VALUES ('154', 'Cao Phong', 'Huyện', '20 41 23N, 105 17 48E', '17', '0');
INSERT INTO `districts` VALUES ('155', 'Tân Lạc', 'Huyện', '20 36 44N, 105 15 03E', '17', '0');
INSERT INTO `districts` VALUES ('156', 'Mai Châu', 'Huyện', '20 40 56N, 104 59 46E', '17', '0');
INSERT INTO `districts` VALUES ('157', 'Lạc Sơn', 'Huyện', '20 29 59N, 105 24 57E', '17', '0');
INSERT INTO `districts` VALUES ('158', 'Yên Thủy', 'Huyện', '20 25 42N, 105 37 59E', '17', '0');
INSERT INTO `districts` VALUES ('159', 'Lạc Thủy', 'Huyện', '20 29 12N, 105 44 06E', '17', '0');
INSERT INTO `districts` VALUES ('164', 'Thái Nguyên', 'Thành Phố', '21 33 20N, 105 48 26E', '19', '0');
INSERT INTO `districts` VALUES ('165', 'Sông Công', 'Thị Xã', '21 29 14N, 105 48 47E', '19', '0');
INSERT INTO `districts` VALUES ('167', 'Định Hóa', 'Huyện', '21 53 50N, 105 38 01E', '19', '0');
INSERT INTO `districts` VALUES ('168', 'Phú Lương', 'Huyện', '21 45 57N, 105 43 22E', '19', '0');
INSERT INTO `districts` VALUES ('169', 'Đồng Hỷ', 'Huyện', '21 41 10N, 105 55 43E', '19', '0');
INSERT INTO `districts` VALUES ('170', 'Võ Nhai', 'Huyện', '21 47 14N, 106 02 29E', '19', '0');
INSERT INTO `districts` VALUES ('171', 'Đại Từ', 'Huyện', '21 36 17N, 105 37 28E', '19', '0');
INSERT INTO `districts` VALUES ('172', 'Phổ Yên', 'Huyện', '21 27 08N, 105 45 19E', '19', '0');
INSERT INTO `districts` VALUES ('173', 'Phú Bình', 'Huyện', '21 29 36N, 105 57 42E', '19', '0');
INSERT INTO `districts` VALUES ('178', 'Lạng Sơn', 'Thành Phố', '21 51 19N, 106 44 50E', '20', '0');
INSERT INTO `districts` VALUES ('180', 'Tràng Định', 'Huyện', '22 18 09N, 106 26 32E', '20', '0');
INSERT INTO `districts` VALUES ('181', 'Bình Gia', 'Huyện', '22 03 56N, 106 19 01E', '20', '0');
INSERT INTO `districts` VALUES ('182', 'Văn Lãng', 'Huyện', '22 01 59N, 106 34 17E', '20', '0');
INSERT INTO `districts` VALUES ('183', 'Cao Lộc', 'Huyện', '21 53 05N, 106 50 34E', '20', '0');
INSERT INTO `districts` VALUES ('184', 'Văn Quan', 'Huyện', '21 51 04N, 106 33 04E', '20', '0');
INSERT INTO `districts` VALUES ('185', 'Bắc Sơn', 'Huyện', '21 48 57N, 106 15 28E', '20', '0');
INSERT INTO `districts` VALUES ('186', 'Hữu Lũng', 'Huyện', '21 34 33N, 106 20 33E', '20', '0');
INSERT INTO `districts` VALUES ('187', 'Chi Lăng', 'Huyện', '21 40 05N, 106 37 24E', '20', '0');
INSERT INTO `districts` VALUES ('188', 'Lộc Bình', 'Huyện', '21 40 41N, 106 58 12E', '20', '0');
INSERT INTO `districts` VALUES ('189', 'Đình Lập', 'Huyện', '21 32 07N, 107 07 25E', '20', '0');
INSERT INTO `districts` VALUES ('193', 'Hạ Long', 'Thành Phố', '20 52 24N, 107 05 23E', '22', '0');
INSERT INTO `districts` VALUES ('194', 'Móng Cái', 'Thành Phố', '21 26 31N, 107 55 09E', '22', '0');
INSERT INTO `districts` VALUES ('195', 'Cẩm Phả', 'Thị Xã', '21 03 42N, 107 17 22E', '22', '0');
INSERT INTO `districts` VALUES ('196', 'Uông Bí', 'Thị Xã', '21 04 33N, 106 45 07E', '22', '0');
INSERT INTO `districts` VALUES ('198', 'Bình Liêu', 'Huyện', '21 33 07N, 107 26 24E', '22', '0');
INSERT INTO `districts` VALUES ('199', 'Tiên Yên', 'Huyện', '21 22 24N, 107 22 50E', '22', '0');
INSERT INTO `districts` VALUES ('200', 'Đầm Hà', 'Huyện', '21 21 23N, 107 34 32E', '22', '0');
INSERT INTO `districts` VALUES ('201', 'Hải Hà', 'Huyện', '21 25 50N, 107 41 26E', '22', '0');
INSERT INTO `districts` VALUES ('202', 'Ba Chẽ', 'Huyện', '21 15 40N, 107 09 52E', '22', '0');
INSERT INTO `districts` VALUES ('203', 'Vân Đồn', 'Huyện', '20 56 17N, 107 28 02E', '22', '0');
INSERT INTO `districts` VALUES ('204', 'Hoành Bồ', 'Huyện', '21 06 30N, 107 02 43E', '22', '0');
INSERT INTO `districts` VALUES ('205', 'Đông Triều', 'Huyện', '21 07 10N, 106 34 36E', '22', '0');
INSERT INTO `districts` VALUES ('206', 'Yên Hưng', 'Huyện', '20 55 40N, 106 51 05E', '22', '0');
INSERT INTO `districts` VALUES ('207', 'Cô Tô', 'Huyện', '21 05 01N, 107 49 10E', '22', '0');
INSERT INTO `districts` VALUES ('213', 'Bắc Giang', 'Thành Phố', '21 17 36N, 106 11 18E', '24', '0');
INSERT INTO `districts` VALUES ('215', 'Yên Thế', 'Huyện', '21 31 29N, 106 09 27E', '24', '0');
INSERT INTO `districts` VALUES ('216', 'Tân Yên', 'Huyện', '21 23 23N, 106 05 55E', '24', '0');
INSERT INTO `districts` VALUES ('217', 'Lạng Giang', 'Huyện', '21 21 58N, 106 15 21E', '24', '0');
INSERT INTO `districts` VALUES ('218', 'Lục Nam', 'Huyện', '21 18 16N, 106 29 24E', '24', '0');
INSERT INTO `districts` VALUES ('219', 'Lục Ngạn', 'Huyện', '21 26 15N, 106 39 09E', '24', '0');
INSERT INTO `districts` VALUES ('220', 'Sơn Động', 'Huyện', '21 19 42N, 106 51 09E', '24', '0');
INSERT INTO `districts` VALUES ('221', 'Yên Dũng', 'Huyện', '21 12 22N, 106 14 12E', '24', '0');
INSERT INTO `districts` VALUES ('222', 'Việt Yên', 'Huyện', '21 16 16N, 106 04 59E', '24', '0');
INSERT INTO `districts` VALUES ('223', 'Hiệp Hòa', 'Huyện', '21 15 51N, 105 57 30E', '24', '0');
INSERT INTO `districts` VALUES ('227', 'Việt Trì', 'Thành Phố', '21 19 01N, 105 23 35E', '25', '0');
INSERT INTO `districts` VALUES ('228', 'Phú Thọ', 'Thị Xã', '21 24 54N, 105 13 46E', '25', '0');
INSERT INTO `districts` VALUES ('230', 'Đoan Hùng', 'Huyện', '21 36 56N, 105 08 42E', '25', '0');
INSERT INTO `districts` VALUES ('231', 'Hạ Hoà', 'Huyện', '21 35 13N, 105 00 22E', '25', '0');
INSERT INTO `districts` VALUES ('232', 'Thanh Ba', 'Huyện', '21 27 04N, 105 09 10E', '25', '0');
INSERT INTO `districts` VALUES ('233', 'Phù Ninh', 'Huyện', '21 26 59N, 105 18 13E', '25', '0');
INSERT INTO `districts` VALUES ('234', 'Yên Lập', 'Huyện', '21 22 21N, 105 01 25E', '25', '0');
INSERT INTO `districts` VALUES ('235', 'Cẩm Khê', 'Huyện', '21 23 04N, 105 05 25E', '25', '0');
INSERT INTO `districts` VALUES ('236', 'Tam Nông', 'Huyện', '21 18 24N, 105 14 59E', '25', '0');
INSERT INTO `districts` VALUES ('237', 'Lâm Thao', 'Huyện', '21 19 37N, 105 18 09E', '25', '0');
INSERT INTO `districts` VALUES ('238', 'Thanh Sơn', 'Huyện', '21 08 32N, 105 04 40E', '25', '0');
INSERT INTO `districts` VALUES ('239', 'Thanh Thuỷ', 'Huyện', '21 07 26N, 105 17 18E', '25', '0');
INSERT INTO `districts` VALUES ('240', 'Tân Sơn', 'Huyện', '', '25', '0');
INSERT INTO `districts` VALUES ('243', 'Vĩnh Yên', 'Thành Phố', '21 18 26N, 105 35 33E', '26', '0');
INSERT INTO `districts` VALUES ('244', 'Phúc Yên', 'Thị Xã', '21 18 55N, 105 43 54E', '26', '0');
INSERT INTO `districts` VALUES ('246', 'Lập Thạch', 'Huyện', '21 24 45N, 105 25 39E', '26', '0');
INSERT INTO `districts` VALUES ('247', 'Tam Dương', 'Huyện', '21 21 40N, 105 33 36E', '26', '0');
INSERT INTO `districts` VALUES ('248', 'Tam Đảo', 'Huyện', '21 27 34N, 105 35 09E', '26', '0');
INSERT INTO `districts` VALUES ('249', 'Bình Xuyên', 'Huyện', '21 19 48N, 105 39 43E', '26', '0');
INSERT INTO `districts` VALUES ('250', 'Mê Linh', 'Huyện', '21 10 53N, 105 42 05E', '1', '1');
INSERT INTO `districts` VALUES ('251', 'Yên Lạc', 'Huyện', '21 13 17N, 105 34 44E', '26', '0');
INSERT INTO `districts` VALUES ('252', 'Vĩnh Tường', 'Huyện', '21 14 58N, 105 29 37E', '26', '0');
INSERT INTO `districts` VALUES ('253', 'Sông Lô', 'Huyện', '', '26', '0');
INSERT INTO `districts` VALUES ('256', 'Bắc Ninh', 'Thành Phố', '21 10 48N, 106 03 58E', '27', '0');
INSERT INTO `districts` VALUES ('258', 'Yên Phong', 'Huyện', '21 12 40N, 105 59 36E', '27', '0');
INSERT INTO `districts` VALUES ('259', 'Quế Võ', 'Huyện', '21 08 44N, 106 11 06E', '27', '0');
INSERT INTO `districts` VALUES ('260', 'Tiên Du', 'Huyện', '21 07 37N, 106 02 19E', '27', '0');
INSERT INTO `districts` VALUES ('261', 'Từ Sơn', 'Thị Xã', '21 07 12N, 105 57 26E', '27', '0');
INSERT INTO `districts` VALUES ('262', 'Thuận Thành', 'Huyện', '21 02 24N, 106 04 10E', '27', '0');
INSERT INTO `districts` VALUES ('263', 'Gia Bình', 'Huyện', '21 03 55N, 106 12 53E', '27', '0');
INSERT INTO `districts` VALUES ('264', 'Lương Tài', 'Huyện', '21 01 33N, 106 13 28E', '27', '0');
INSERT INTO `districts` VALUES ('268', 'Hà Đông', 'Quận', '20 57 25N, 105 45 21E', '1', '1');
INSERT INTO `districts` VALUES ('269', 'Sơn Tây', 'Thị Xã', '21 05 51N, 105 28 27E', '1', '1');
INSERT INTO `districts` VALUES ('271', 'Ba Vì', 'Huyện', '21 09 40N, 105 22 43E', '1', '1');
INSERT INTO `districts` VALUES ('272', 'Phúc Thọ', 'Huyện', '21 06 32N, 105 34 52E', '1', '1');
INSERT INTO `districts` VALUES ('273', 'Đan Phượng', 'Huyện', '21 07 13N, 105 40 49E', '1', '1');
INSERT INTO `districts` VALUES ('274', 'Hoài Đức', 'Huyện', '21 01 25N, 105 42 03E', '1', '1');
INSERT INTO `districts` VALUES ('275', 'Quốc Oai', 'Huyện', '20 58 45N, 105 36 43E', '1', '1');
INSERT INTO `districts` VALUES ('276', 'Thạch Thất', 'Huyện', '21 02 17N, 105 33 05E', '1', '1');
INSERT INTO `districts` VALUES ('277', 'Chương Mỹ', 'Huyện', '20 52 46N, 105 39 01E', '1', '1');
INSERT INTO `districts` VALUES ('278', 'Thanh Oai', 'Huyện', '20 51 44N, 105 46 18E', '1', '1');
INSERT INTO `districts` VALUES ('279', 'Thường Tín', 'Huyện', '20 49 59N, 105 22 19E', '1', '1');
INSERT INTO `districts` VALUES ('280', 'Phú Xuyên', 'Huyện', '20 43 37N, 105 53 43E', '1', '1');
INSERT INTO `districts` VALUES ('281', 'Ứng Hòa', 'Huyện', '20 42 41N, 105 47 58E', '1', '1');
INSERT INTO `districts` VALUES ('282', 'Mỹ Đức', 'Huyện', '20 41 53N, 105 43 31E', '1', '1');
INSERT INTO `districts` VALUES ('288', 'Hải Dương', 'Thành Phố', '20 56 14N, 106 18 21E', '30', '0');
INSERT INTO `districts` VALUES ('290', 'Chí Linh', 'Huyện', '21 07 47N, 106 23 46E', '30', '0');
INSERT INTO `districts` VALUES ('291', 'Nam Sách', 'Huyện', '21 00 15N, 106 20 26E', '30', '0');
INSERT INTO `districts` VALUES ('292', 'Kinh Môn', 'Huyện', '21 00 04N, 106 30 23E', '30', '0');
INSERT INTO `districts` VALUES ('293', 'Kim Thành', 'Huyện', '20 55 40N, 106 30 33E', '30', '0');
INSERT INTO `districts` VALUES ('294', 'Thanh Hà', 'Huyện', '20 53 19N, 106 25 43E', '30', '0');
INSERT INTO `districts` VALUES ('295', 'Cẩm Giàng', 'Huyện', '20 57 05N, 106 12 29E', '30', '0');
INSERT INTO `districts` VALUES ('296', 'Bình Giang', 'Huyện', '20 52 36N, 106 11 24E', '30', '0');
INSERT INTO `districts` VALUES ('297', 'Gia Lộc', 'Huyện', '20 51 01N, 106 17 34E', '30', '0');
INSERT INTO `districts` VALUES ('298', 'Tứ Kỳ', 'Huyện', '20 49 05N, 106 24 05E', '30', '0');
INSERT INTO `districts` VALUES ('299', 'Ninh Giang', 'Huyện', '20 45 13N, 106 20 09E', '30', '0');
INSERT INTO `districts` VALUES ('300', 'Thanh Miện', 'Huyện', '20 46 02N, 106 12 26E', '30', '0');
INSERT INTO `districts` VALUES ('303', 'Hồng Bàng', 'Quận', '20 52 37N, 106 38 32E', '31', '0');
INSERT INTO `districts` VALUES ('304', 'Ngô Quyền', 'Quận', '20 51 13N, 106 41 57E', '31', '0');
INSERT INTO `districts` VALUES ('305', 'Lê Chân', 'Quận', '20 50 12N, 106 40 30E', '31', '0');
INSERT INTO `districts` VALUES ('306', 'Hải An', 'Quận', '20 49 38N, 106 45 57E', '31', '0');
INSERT INTO `districts` VALUES ('307', 'Kiến An', 'Quận', '20 48 26N, 106 38 03E', '31', '0');
INSERT INTO `districts` VALUES ('308', 'Đồ Sơn', 'Quận', '20 42 41N, 106 44 54E', '31', '0');
INSERT INTO `districts` VALUES ('309', 'Kinh Dương', 'Quận', '', '31', '0');
INSERT INTO `districts` VALUES ('311', 'Thuỷ Nguyên', 'Huyện', '20 56 36N, 106 39 38E', '31', '0');
INSERT INTO `districts` VALUES ('312', 'An Dương', 'Huyện', '20 53 06N, 106 35 36E', '31', '0');
INSERT INTO `districts` VALUES ('313', 'An Lão', 'Huyện', '20 47 54N, 106 33 19E', '31', '0');
INSERT INTO `districts` VALUES ('314', 'Kiến Thụy', 'Huyện', '20 45 13N, 106 41 47E', '31', '0');
INSERT INTO `districts` VALUES ('315', 'Tiên Lãng', 'Huyện', '20 42 23N, 106 36 03E', '31', '0');
INSERT INTO `districts` VALUES ('316', 'Vĩnh Bảo', 'Huyện', '20 40 56N, 106 29 57E', '31', '0');
INSERT INTO `districts` VALUES ('317', 'Cát Hải', 'Huyện', '20 47 09N, 106 58 07E', '31', '0');
INSERT INTO `districts` VALUES ('318', 'Bạch Long Vĩ', 'Huyện', '20 08 41N, 107 42 51E', '31', '0');
INSERT INTO `districts` VALUES ('323', 'Hưng Yên', 'Thành Phố', '20 39 38N, 106 03 08E', '33', '0');
INSERT INTO `districts` VALUES ('325', 'Văn Lâm', 'Huyện', '20 58 31N, 106 02 51E', '33', '0');
INSERT INTO `districts` VALUES ('326', 'Văn Giang', 'Huyện', '20 55 51N, 105 57 14E', '33', '0');
INSERT INTO `districts` VALUES ('327', 'Yên Mỹ', 'Huyện', '20 53 45N, 106 01 21E', '33', '0');
INSERT INTO `districts` VALUES ('328', 'Mỹ Hào', 'Huyện', '20 55 35N, 106 05 34E', '33', '0');
INSERT INTO `districts` VALUES ('329', 'Ân Thi', 'Huyện', '20 48 49N, 106 05 30E', '33', '0');
INSERT INTO `districts` VALUES ('330', 'Khoái Châu', 'Huyện', '20 49 53N, 105 58 28E', '33', '0');
INSERT INTO `districts` VALUES ('331', 'Kim Động', 'Huyện', '20 44 47N, 106 01 47E', '33', '0');
INSERT INTO `districts` VALUES ('332', 'Tiên Lữ', 'Huyện', '20 40 05N, 106 07 59E', '33', '0');
INSERT INTO `districts` VALUES ('333', 'Phù Cừ', 'Huyện', '20 42 51N, 106 11 30E', '33', '0');
INSERT INTO `districts` VALUES ('336', 'Thái Bình', 'Thành Phố', '20 26 45N, 106 19 56E', '34', '0');
INSERT INTO `districts` VALUES ('338', 'Quỳnh Phụ', 'Huyện', '20 38 57N, 106 21 16E', '34', '0');
INSERT INTO `districts` VALUES ('339', 'Hưng Hà', 'Huyện', '20 35 38N, 106 12 42E', '34', '0');
INSERT INTO `districts` VALUES ('340', 'Đông Hưng', 'Huyện', '20 32 50N, 106 20 15E', '34', '0');
INSERT INTO `districts` VALUES ('341', 'Thái Thụy', 'Huyện', '20 32 33N, 106 32 32E', '34', '0');
INSERT INTO `districts` VALUES ('342', 'Tiền Hải', 'Huyện', '20 21 05N, 106 32 45E', '34', '0');
INSERT INTO `districts` VALUES ('343', 'Kiến Xương', 'Huyện', '20 23 52N, 106 25 22E', '34', '0');
INSERT INTO `districts` VALUES ('344', 'Vũ Thư', 'Huyện', '20 25 29N, 106 16 43E', '34', '0');
INSERT INTO `districts` VALUES ('347', 'Phủ Lý', 'Thành Phố', '20 32 19N, 105 54 55E', '35', '0');
INSERT INTO `districts` VALUES ('349', 'Duy Tiên', 'Huyện', '20 37 33N, 105 58 01E', '35', '0');
INSERT INTO `districts` VALUES ('350', 'Kim Bảng', 'Huyện', '20 34 19N, 105 50 41E', '35', '0');
INSERT INTO `districts` VALUES ('351', 'Thanh Liêm', 'Huyện', '20 27 31N, 105 55 09E', '35', '0');
INSERT INTO `districts` VALUES ('352', 'Bình Lục', 'Huyện', '20 29 23N, 106 02 52E', '35', '0');
INSERT INTO `districts` VALUES ('353', 'Lý Nhân', 'Huyện', '20 32 55N, 106 04 48E', '35', '0');
INSERT INTO `districts` VALUES ('356', 'Nam Định', 'Thành Phố', '20 25 07N, 106 09 54E', '36', '0');
INSERT INTO `districts` VALUES ('358', 'Mỹ Lộc', 'Huyện', '20 27 21N, 106 07 56E', '36', '0');
INSERT INTO `districts` VALUES ('359', 'Vụ Bản', 'Huyện', '20 22 57N, 106 05 35E', '36', '0');
INSERT INTO `districts` VALUES ('360', 'Ý Yên', 'Huyện', '20 19 48N, 106 01 55E', '36', '0');
INSERT INTO `districts` VALUES ('361', 'Nghĩa Hưng', 'Huyện', '20 05 37N, 106 08 59E', '36', '0');
INSERT INTO `districts` VALUES ('362', 'Nam Trực', 'Huyện', '20 20 08N, 106 12 54E', '36', '0');
INSERT INTO `districts` VALUES ('363', 'Trực Ninh', 'Huyện', '20 14 42N, 106 12 45E', '36', '0');
INSERT INTO `districts` VALUES ('364', 'Xuân Trường', 'Huyện', '20 17 53N, 106 21 43E', '36', '0');
INSERT INTO `districts` VALUES ('365', 'Giao Thủy', 'Huyện', '20 14 45N, 106 28 39E', '36', '0');
INSERT INTO `districts` VALUES ('366', 'Hải Hậu', 'Huyện', '20 06 26N, 106 16 29E', '36', '0');
INSERT INTO `districts` VALUES ('369', 'Ninh Bình', 'Thành Phố', '20 14 45N, 105 58 24E', '37', '0');
INSERT INTO `districts` VALUES ('370', 'Tam Điệp', 'Thị Xã', '20 09 42N, 103 52 43E', '37', '0');
INSERT INTO `districts` VALUES ('372', 'Nho Quan', 'Huyện', '20 18 46N, 105 42 48E', '37', '0');
INSERT INTO `districts` VALUES ('373', 'Gia Viễn', 'Huyện', '20 19 50N, 105 52 20E', '37', '0');
INSERT INTO `districts` VALUES ('374', 'Hoa Lư', 'Huyện', '20 15 04N, 105 55 52E', '37', '0');
INSERT INTO `districts` VALUES ('375', 'Yên Khánh', 'Huyện', '20 11 26N, 106 04 33E', '37', '0');
INSERT INTO `districts` VALUES ('376', 'Kim Sơn', 'Huyện', '20 02 07N, 106 05 27E', '37', '0');
INSERT INTO `districts` VALUES ('377', 'Yên Mô', 'Huyện', '20 07 45N, 105 59 45E', '37', '0');
INSERT INTO `districts` VALUES ('380', 'Thanh Hóa', 'Thành Phố', '19 48 26N, 105 47 37E', '38', '0');
INSERT INTO `districts` VALUES ('381', 'Bỉm Sơn', 'Thị Xã', '20 05 21N, 105 51 48E', '38', '0');
INSERT INTO `districts` VALUES ('382', 'Sầm Sơn', 'Thị Xã', '19 45 11N, 105 54 03E', '38', '0');
INSERT INTO `districts` VALUES ('384', 'Mường Lát', 'Huyện', '20 30 42N, 104 37 27E', '38', '0');
INSERT INTO `districts` VALUES ('385', 'Quan Hóa', 'Huyện', '20 29 15N, 104 56 35E', '38', '0');
INSERT INTO `districts` VALUES ('386', 'Bá Thước', 'Huyện', '20 22 48N, 105 14 50E', '38', '0');
INSERT INTO `districts` VALUES ('387', 'Quan Sơn', 'Huyện', '20 15 17N, 104 51 58E', '38', '0');
INSERT INTO `districts` VALUES ('388', 'Lang Chánh', 'Huyện', '20 08 58N, 105 07 40E', '38', '0');
INSERT INTO `districts` VALUES ('389', 'Ngọc Lặc', 'Huyện', '20 04 08N, 105 22 39E', '38', '0');
INSERT INTO `districts` VALUES ('390', 'Cẩm Thủy', 'Huyện', '20 12 20N, 105 27 22E', '38', '0');
INSERT INTO `districts` VALUES ('391', 'Thạch Thành', 'Huyện', '21 12 41N, 105 36 38E', '38', '0');
INSERT INTO `districts` VALUES ('392', 'Hà Trung', 'Huyện', '20 03 20N, 105 51 20E', '38', '0');
INSERT INTO `districts` VALUES ('393', 'Vĩnh Lộc', 'Huyện', '20 02 29N, 105 39 28E', '38', '0');
INSERT INTO `districts` VALUES ('394', 'Yên Định', 'Huyện', '20 00 31N, 105 37 44E', '38', '0');
INSERT INTO `districts` VALUES ('395', 'Thọ Xuân', 'Huyện', '19 55 39N, 105 29 14E', '38', '0');
INSERT INTO `districts` VALUES ('396', 'Thường Xuân', 'Huyện', '19 54 55N, 105 10 46E', '38', '0');
INSERT INTO `districts` VALUES ('397', 'Triệu Sơn', 'Huyện', '19 48 11N, 105 34 03E', '38', '0');
INSERT INTO `districts` VALUES ('398', 'Thiệu Hoá', 'Huyện', '19 53 56N, 105 40 57E', '38', '0');
INSERT INTO `districts` VALUES ('399', 'Hoằng Hóa', 'Huyện', '19 51 59N, 105 51 34E', '38', '0');
INSERT INTO `districts` VALUES ('400', 'Hậu Lộc', 'Huyện', '19 56 02N, 105 53 19E', '38', '0');
INSERT INTO `districts` VALUES ('401', 'Nga Sơn', 'Huyện', '20 00 16N, 105 59 26E', '38', '0');
INSERT INTO `districts` VALUES ('402', 'Như Xuân', 'Huyện', '19 5 55N, 105 20 22E', '38', '0');
INSERT INTO `districts` VALUES ('403', 'Như Thanh', 'Huyện', '19 35 19N, 105 33 09E', '38', '0');
INSERT INTO `districts` VALUES ('404', 'Nông Cống', 'Huyện', '19 36 58N, 105 40 54E', '38', '0');
INSERT INTO `districts` VALUES ('405', 'Đông Sơn', 'Huyện', '19 47 44N, 105 42 19E', '38', '0');
INSERT INTO `districts` VALUES ('406', 'Quảng Xương', 'Huyện', '19 40 53N, 105 48 01E', '38', '0');
INSERT INTO `districts` VALUES ('407', 'Tĩnh Gia', 'Huyện', '19 27 13N, 105 43 38E', '38', '0');
INSERT INTO `districts` VALUES ('412', 'Vinh', 'Thành Phố', '18 41 06N, 105 42 05E', '40', '0');
INSERT INTO `districts` VALUES ('413', 'Cửa Lò', 'Thị Xã', '18 47 26N, 105 43 31E', '40', '0');
INSERT INTO `districts` VALUES ('414', 'Thái Hoà', 'Thị Xã', '', '40', '0');
INSERT INTO `districts` VALUES ('415', 'Quế Phong', 'Huyện', '19 42 25N, 104 54 21E', '40', '0');
INSERT INTO `districts` VALUES ('416', 'Quỳ Châu', 'Huyện', '19 32 16N, 105 03 18E', '40', '0');
INSERT INTO `districts` VALUES ('417', 'Kỳ Sơn', 'Huyện', '19 24 36N, 104 09 45E', '40', '0');
INSERT INTO `districts` VALUES ('418', 'Tương Dương', 'Huyện', '19 19 15N, 104 35 41E', '40', '0');
INSERT INTO `districts` VALUES ('419', 'Nghĩa Đàn', 'Huyện', '19 21 19N, 105 26 33E', '40', '0');
INSERT INTO `districts` VALUES ('420', 'Quỳ Hợp', 'Huyện', '19 19 24N, 105 09 12E', '40', '0');
INSERT INTO `districts` VALUES ('421', 'Quỳnh Lưu', 'Huyện', '19 14 01N, 105 37 00E', '40', '0');
INSERT INTO `districts` VALUES ('422', 'Con Cuông', 'Huyện', '19 03 50N, 107 47 15E', '40', '0');
INSERT INTO `districts` VALUES ('423', 'Tân Kỳ', 'Huyện', '19 06 11N, 105 14 14E', '40', '0');
INSERT INTO `districts` VALUES ('424', 'Anh Sơn', 'Huyện', '18 58 04N, 105 04 30E', '40', '0');
INSERT INTO `districts` VALUES ('425', 'Diễn Châu', 'Huyện', '19 01 20N, 105 34 13E', '40', '0');
INSERT INTO `districts` VALUES ('426', 'Yên Thành', 'Huyện', '19 01 25N, 105 26 17E', '40', '0');
INSERT INTO `districts` VALUES ('427', 'Đô Lương', 'Huyện', '18 55 00N, 105 21 03E', '40', '0');
INSERT INTO `districts` VALUES ('428', 'Thanh Chương', 'Huyện', '18 44 11N, 105 12 59E', '40', '0');
INSERT INTO `districts` VALUES ('429', 'Nghi Lộc', 'Huyện', '18 47 41N, 105 31 30E', '40', '0');
INSERT INTO `districts` VALUES ('430', 'Nam Đàn', 'Huyện', '18 40 28N, 105 30 32E', '40', '0');
INSERT INTO `districts` VALUES ('431', 'Hưng Nguyên', 'Huyện', '18 41 13N, 105 37 41E', '40', '0');
INSERT INTO `districts` VALUES ('436', 'Hà Tĩnh', 'Thành Phố', '18 21 20N, 105 54 00E', '42', '0');
INSERT INTO `districts` VALUES ('437', 'Hồng Lĩnh', 'Thị Xã', '18 32 05N, 105 42 40E', '42', '0');
INSERT INTO `districts` VALUES ('439', 'Hương Sơn', 'Huyện', '18 26 47N, 105 19 36E', '42', '0');
INSERT INTO `districts` VALUES ('440', 'Đức Thọ', 'Huyện', '18 29 23N, 105 36 39E', '42', '0');
INSERT INTO `districts` VALUES ('441', 'Vũ Quang', 'Huyện', '18 19 30N, 105 26 38E', '42', '0');
INSERT INTO `districts` VALUES ('442', 'Nghi Xuân', 'Huyện', '18 38 46N, 105 46 17E', '42', '0');
INSERT INTO `districts` VALUES ('443', 'Can Lộc', 'Huyện', '18 26 39N, 105 46 13E', '42', '0');
INSERT INTO `districts` VALUES ('444', 'Hương Khê', 'Huyện', '18 11 36N, 105 41 24E', '42', '0');
INSERT INTO `districts` VALUES ('445', 'Thạch Hà', 'Huyện', '18 19 29N, 105 52 43E', '42', '0');
INSERT INTO `districts` VALUES ('446', 'Cẩm Xuyên', 'Huyện', '18 11 32N, 106 00 04E', '42', '0');
INSERT INTO `districts` VALUES ('447', 'Kỳ Anh', 'Huyện', '18 05 15N, 106 15 49E', '42', '0');
INSERT INTO `districts` VALUES ('448', 'Lộc Hà', 'Huyện', '', '42', '0');
INSERT INTO `districts` VALUES ('450', 'Đồng Hới', 'Thành Phố', '17 26 53N, 106 35 15E', '44', '0');
INSERT INTO `districts` VALUES ('452', 'Minh Hóa', 'Huyện', '17 44 03N, 105 51 45E', '44', '0');
INSERT INTO `districts` VALUES ('453', 'Tuyên Hóa', 'Huyện', '17 54 04N, 105 58 17E', '44', '0');
INSERT INTO `districts` VALUES ('454', 'Quảng Trạch', 'Huyện', '17 50 04N, 106 22 24E', '44', '0');
INSERT INTO `districts` VALUES ('455', 'Bố Trạch', 'Huyện', '17 29 13N, 106 06 54E', '44', '0');
INSERT INTO `districts` VALUES ('456', 'Quảng Ninh', 'Huyện', '17 15 15N, 106 32 31E', '44', '0');
INSERT INTO `districts` VALUES ('457', 'Lệ Thủy', 'Huyện', '17 07 35N, 106 41 47E', '44', '0');
INSERT INTO `districts` VALUES ('461', 'Đông Hà', 'Thành Phố', '16 48 12N, 107 05 12E', '45', '0');
INSERT INTO `districts` VALUES ('462', 'Quảng Trị', 'Thị Xã', '16 44 37N, 107 11 20E', '45', '0');
INSERT INTO `districts` VALUES ('464', 'Vĩnh Linh', 'Huyện', '17 01 35N, 106 53 49E', '45', '0');
INSERT INTO `districts` VALUES ('465', 'Hướng Hóa', 'Huyện', '16 42 19N, 106 40 14E', '45', '0');
INSERT INTO `districts` VALUES ('466', 'Gio Linh', 'Huyện', '16 54 49N, 106 56 16E', '45', '0');
INSERT INTO `districts` VALUES ('467', 'Đa Krông', 'Huyện', '16 33 58N, 106 55 49E', '45', '0');
INSERT INTO `districts` VALUES ('468', 'Cam Lộ', 'Huyện', '16 47 09N, 106 57 52E', '45', '0');
INSERT INTO `districts` VALUES ('469', 'Triệu Phong', 'Huyện', '16 46 32N, 107 09 12E', '45', '0');
INSERT INTO `districts` VALUES ('470', 'Hải Lăng', 'Huyện', '16 41 07N, 107 13 34E', '45', '0');
INSERT INTO `districts` VALUES ('471', 'Cồn Cỏ', 'Huyện', '19 09 39N, 107 19 58E', '45', '0');
INSERT INTO `districts` VALUES ('474', 'Huế', 'Thành Phố', '16 27 16N, 107 34 29E', '46', '0');
INSERT INTO `districts` VALUES ('476', 'Phong Điền', 'Huyện', '16 32 42N, 106 16 37E', '46', '0');
INSERT INTO `districts` VALUES ('477', 'Quảng Điền', 'Huyện', '16 35 21N, 107 29 31E', '46', '0');
INSERT INTO `districts` VALUES ('478', 'Phú Vang', 'Huyện', '16 27 20N, 107 42 28E', '46', '0');
INSERT INTO `districts` VALUES ('479', 'Hương Thủy', 'Huyện', '16 19 27N, 107 37 26E', '46', '0');
INSERT INTO `districts` VALUES ('480', 'Hương Trà', 'Huyện', '16 25 49N, 107 28 37E', '46', '0');
INSERT INTO `districts` VALUES ('481', 'A Lưới', 'Huyện', '16 13 59N, 107 16 12E', '46', '0');
INSERT INTO `districts` VALUES ('482', 'Phú Lộc', 'Huyện', '16 17 16N, 107 55 25E', '46', '0');
INSERT INTO `districts` VALUES ('483', 'Nam Đông', 'Huyện', '16 07 11N, 107 41 25E', '46', '0');
INSERT INTO `districts` VALUES ('490', 'Liên Chiểu', 'Quận', '16 07 26N, 108 07 04E', '48', '0');
INSERT INTO `districts` VALUES ('491', 'Thanh Khê', 'Quận', '16 03 28N, 108 11 00E', '48', '0');
INSERT INTO `districts` VALUES ('492', 'Hải Châu', 'Quận', '16 03 38N, 108 11 46E', '48', '0');
INSERT INTO `districts` VALUES ('493', 'Sơn Trà', 'Quận', '16 06 13N, 108 16 26E', '48', '0');
INSERT INTO `districts` VALUES ('494', 'Ngũ Hành Sơn', 'Quận', '16 00 30N, 108 15 09E', '48', '0');
INSERT INTO `districts` VALUES ('495', 'Cẩm Lệ', 'Quận', '', '48', '0');
INSERT INTO `districts` VALUES ('497', 'Hoà Vang', 'Huyện', '16 03 59N, 108 01 57E', '48', '0');
INSERT INTO `districts` VALUES ('498', 'Hoàng Sa', 'Huyện', '16 21 36N, 111 57 01E', '48', '0');
INSERT INTO `districts` VALUES ('502', 'Tam Kỳ', 'Thành Phố', '15 34 37N, 108 29 52E', '49', '0');
INSERT INTO `districts` VALUES ('503', 'Hội An', 'Thành Phố', '15 53 20N, 108 20 42E', '49', '0');
INSERT INTO `districts` VALUES ('504', 'Tây Giang', 'Huyện', '15 53 46N, 107 25 52E', '49', '0');
INSERT INTO `districts` VALUES ('505', 'Đông Giang', 'Huyện', '15 54 44N, 107 47 06E', '49', '0');
INSERT INTO `districts` VALUES ('506', 'Đại Lộc', 'Huyện', '15 50 10N, 107 58 27E', '49', '0');
INSERT INTO `districts` VALUES ('507', 'Điện Bàn', 'Huyện', '15 54 15N, 108 13 38E', '49', '0');
INSERT INTO `districts` VALUES ('508', 'Duy Xuyên', 'Huyện', '15 47 58N, 108 13 27E', '49', '0');
INSERT INTO `districts` VALUES ('509', 'Quế Sơn', 'Huyện', '15 41 03N, 108 05 34E', '49', '0');
INSERT INTO `districts` VALUES ('510', 'Nam Giang', 'Huyện', '15 36 37N, 107 33 52E', '49', '0');
INSERT INTO `districts` VALUES ('511', 'Phước Sơn', 'Huyện', '15 23 17N, 107 50 22E', '49', '0');
INSERT INTO `districts` VALUES ('512', 'Hiệp Đức', 'Huyện', '15 31 09N, 108 05 56E', '49', '0');
INSERT INTO `districts` VALUES ('513', 'Thăng Bình', 'Huyện', '15 42 29N, 108 22 04E', '49', '0');
INSERT INTO `districts` VALUES ('514', 'Tiên Phước', 'Huyện', '15 29 30N, 108 15 28E', '49', '0');
INSERT INTO `districts` VALUES ('515', 'Bắc Trà My', 'Huyện', '15 08 00N, 108 05 32E', '49', '0');
INSERT INTO `districts` VALUES ('516', 'Nam Trà My', 'Huyện', '15 16 40N, 108 12 15E', '49', '0');
INSERT INTO `districts` VALUES ('517', 'Núi Thành', 'Huyện', '15 26 53N, 108 34 49E', '49', '0');
INSERT INTO `districts` VALUES ('518', 'Phú Ninh', 'Huyện', '15 30 43N, 108 24 43E', '49', '0');
INSERT INTO `districts` VALUES ('519', 'Nông Sơn', 'Huyện', '', '49', '0');
INSERT INTO `districts` VALUES ('522', 'Quảng Ngãi', 'Thành Phố', '15 07 17N, 108 48 24E', '51', '0');
INSERT INTO `districts` VALUES ('524', 'Bình Sơn', 'Huyện', '15 18 45N, 108 45 35E', '51', '0');
INSERT INTO `districts` VALUES ('525', 'Trà Bồng', 'Huyện', '15 13 30N, 108 29 57E', '51', '0');
INSERT INTO `districts` VALUES ('526', 'Tây Trà', 'Huyện', '15 11 13N, 108 22 23E', '51', '0');
INSERT INTO `districts` VALUES ('527', 'Sơn Tịnh', 'Huyện', '15 11 49N, 108 45 03E', '51', '0');
INSERT INTO `districts` VALUES ('528', 'Tư Nghĩa', 'Huyện', '15 05 25N, 108 45 23E', '51', '0');
INSERT INTO `districts` VALUES ('529', 'Sơn Hà', 'Huyện', '14 58 35N, 108 29 09E', '51', '0');
INSERT INTO `districts` VALUES ('530', 'Sơn Tây', 'Huyện', '14 58 11N, 108 21 22E', '51', '0');
INSERT INTO `districts` VALUES ('531', 'Minh Long', 'Huyện', '14 56 49N, 108 40 19E', '51', '0');
INSERT INTO `districts` VALUES ('532', 'Nghĩa Hành', 'Huyện', '14 58 06N, 108 46 05E', '51', '0');
INSERT INTO `districts` VALUES ('533', 'Mộ Đức', 'Huyện', '11 59 13N, 108 52 21E', '51', '0');
INSERT INTO `districts` VALUES ('534', 'Đức Phổ', 'Huyện', '14 44 59N, 108 56 58E', '51', '0');
INSERT INTO `districts` VALUES ('535', 'Ba Tơ', 'Huyện', '14 42 52N, 108 43 44E', '51', '0');
INSERT INTO `districts` VALUES ('536', 'Lý Sơn', 'Huyện', '15 22 50N, 109 06 56E', '51', '0');
INSERT INTO `districts` VALUES ('540', 'Qui Nhơn', 'Thành Phố', '13 47 15N, 109 12 48E', '52', '0');
INSERT INTO `districts` VALUES ('542', 'An Lão', 'Huyện', '14 32 10N, 108 47 52E', '52', '0');
INSERT INTO `districts` VALUES ('543', 'Hoài Nhơn', 'Huyện', '14 30 56N, 109 01 56E', '52', '0');
INSERT INTO `districts` VALUES ('544', 'Hoài Ân', 'Huyện', '14 20 51N, 108 54 04E', '52', '0');
INSERT INTO `districts` VALUES ('545', 'Phù Mỹ', 'Huyện', '14 14 41N, 109 05 43E', '52', '0');
INSERT INTO `districts` VALUES ('546', 'Vĩnh Thạnh', 'Huyện', '14 14 26N, 108 44 08E', '52', '0');
INSERT INTO `districts` VALUES ('547', 'Tây Sơn', 'Huyện', '13 56 47N, 108 53 06E', '52', '0');
INSERT INTO `districts` VALUES ('548', 'Phù Cát', 'Huyện', '14 03 48N, 109 03 57E', '52', '0');
INSERT INTO `districts` VALUES ('549', 'An Nhơn', 'Huyện', '13 51 28N, 109 04 02E', '52', '0');
INSERT INTO `districts` VALUES ('550', 'Tuy Phước', 'Huyện', '13 46 30N, 109 05 38E', '52', '0');
INSERT INTO `districts` VALUES ('551', 'Vân Canh', 'Huyện', '13 40 35N, 108 57 52E', '52', '0');
INSERT INTO `districts` VALUES ('555', 'Tuy Hòa', 'Thành Phố', '13 05 42N, 109 15 50E', '54', '0');
INSERT INTO `districts` VALUES ('557', 'Sông Cầu', 'Thị Xã', '13 31 40N, 109 12 39E', '54', '0');
INSERT INTO `districts` VALUES ('558', 'Đồng Xuân', 'Huyện', '13 24 59N, 108 56 46E', '54', '0');
INSERT INTO `districts` VALUES ('559', 'Tuy An', 'Huyện', '13 15 19N, 109 12 21E', '54', '0');
INSERT INTO `districts` VALUES ('560', 'Sơn Hòa', 'Huyện', '13 12 16N, 108 57 17E', '54', '0');
INSERT INTO `districts` VALUES ('561', 'Sông Hinh', 'Huyện', '12 54 19N, 108 53 38E', '54', '0');
INSERT INTO `districts` VALUES ('562', 'Tây Hoà', 'Huyện', '', '54', '0');
INSERT INTO `districts` VALUES ('563', 'Phú Hoà', 'Huyện', '13 04 07N, 109 11 24E', '54', '0');
INSERT INTO `districts` VALUES ('564', 'Đông Hoà', 'Huyện', '', '54', '0');
INSERT INTO `districts` VALUES ('568', 'Nha Trang', 'Thành Phố', '12 15 40N, 109 10 40E', '56', '0');
INSERT INTO `districts` VALUES ('569', 'Cam Ranh', 'Thị Xã', '11 59 05N, 108 08 17E', '56', '0');
INSERT INTO `districts` VALUES ('570', 'Cam Lâm', 'Huyện', '', '56', '0');
INSERT INTO `districts` VALUES ('571', 'Vạn Ninh', 'Huyện', '12 43 10N, 109 11 18E', '56', '0');
INSERT INTO `districts` VALUES ('572', 'Ninh Hòa', 'Huyện', '12 32 54N, 109 06 11E', '56', '0');
INSERT INTO `districts` VALUES ('573', 'Khánh Vĩnh', 'Huyện', '12 17 50N, 108 51 56E', '56', '0');
INSERT INTO `districts` VALUES ('574', 'Diên Khánh', 'Huyện', '12 13 19N, 109 02 16E', '56', '0');
INSERT INTO `districts` VALUES ('575', 'Khánh Sơn', 'Huyện', '12 02 17N, 108 53 47E', '56', '0');
INSERT INTO `districts` VALUES ('576', 'Trường Sa', 'Huyện', '9 07 27N, 114 15 00E', '56', '0');
INSERT INTO `districts` VALUES ('582', 'Phan Rang-Tháp Chàm', 'Thành Phố', '11 36 11N, 108 58 34E', '58', '0');
INSERT INTO `districts` VALUES ('584', 'Bác Ái', 'Huyện', '11 54 45N, 108 51 29E', '58', '0');
INSERT INTO `districts` VALUES ('585', 'Ninh Sơn', 'Huyện', '11 42 36N, 108 44 55E', '58', '0');
INSERT INTO `districts` VALUES ('586', 'Ninh Hải', 'Huyện', '11 42 46N, 109 05 41E', '58', '0');
INSERT INTO `districts` VALUES ('587', 'Ninh Phước', 'Huyện', '11 28 56N, 108 50 34E', '58', '0');
INSERT INTO `districts` VALUES ('588', 'Thuận Bắc', 'Huyện', '', '58', '0');
INSERT INTO `districts` VALUES ('589', 'Thuận Nam', 'Huyện', '', '58', '0');
INSERT INTO `districts` VALUES ('593', 'Phan Thiết', 'Thành Phố', '10 54 16N, 108 03 44E', '60', '0');
INSERT INTO `districts` VALUES ('594', 'La Gi', 'Thị Xã', '', '60', '0');
INSERT INTO `districts` VALUES ('595', 'Tuy Phong', 'Huyện', '11 20 26N, 108 41 15E', '60', '0');
INSERT INTO `districts` VALUES ('596', 'Bắc Bình', 'Huyện', '11 15 52N, 108 21 33E', '60', '0');
INSERT INTO `districts` VALUES ('597', 'Hàm Thuận Bắc', 'Huyện', '11 09 18N, 108 03 07E', '60', '0');
INSERT INTO `districts` VALUES ('598', 'Hàm Thuận Nam', 'Huyện', '10 56 20N, 107 54 38E', '60', '0');
INSERT INTO `districts` VALUES ('599', 'Tánh Linh', 'Huyện', '11 08 26N, 107 41 22E', '60', '0');
INSERT INTO `districts` VALUES ('600', 'Đức Linh', 'Huyện', '11 11 43N, 107 31 34E', '60', '0');
INSERT INTO `districts` VALUES ('601', 'Hàm Tân', 'Huyện', '10 44 41N, 107 41 33E', '60', '0');
INSERT INTO `districts` VALUES ('602', 'Phú Quí', 'Huyện', '10 33 13N, 108 57 46E', '60', '0');
INSERT INTO `districts` VALUES ('608', 'Kon Tum', 'Thành Phố', '14 20 32N, 107 58 04E', '62', '0');
INSERT INTO `districts` VALUES ('610', 'Đắk Glei', 'Huyện', '15 08 13N, 107 44 03E', '62', '0');
INSERT INTO `districts` VALUES ('611', 'Ngọc Hồi', 'Huyện', '14 44 23N, 107 38 49E', '62', '0');
INSERT INTO `districts` VALUES ('612', 'Đắk Tô', 'Huyện', '14 46 49N, 107 55 36E', '62', '0');
INSERT INTO `districts` VALUES ('613', 'Kon Plông', 'Huyện', '14 48 13N, 108 20 05E', '62', '0');
INSERT INTO `districts` VALUES ('614', 'Kon Rẫy', 'Huyện', '14 32 56N, 108 13 09E', '62', '0');
INSERT INTO `districts` VALUES ('615', 'Đắk Hà', 'Huyện', '14 36 50N, 107 59 55E', '62', '0');
INSERT INTO `districts` VALUES ('616', 'Sa Thầy', 'Huyện', '14 16 02N, 107 36 30E', '62', '0');
INSERT INTO `districts` VALUES ('617', 'Tu Mơ Rông', 'Huyện', '', '62', '0');
INSERT INTO `districts` VALUES ('622', 'Pleiku', 'Thành Phố', '13 57 42N, 107 58 03E', '64', '0');
INSERT INTO `districts` VALUES ('623', 'An Khê', 'Thị Xã', '14 01 24N, 108 41 29E', '64', '0');
INSERT INTO `districts` VALUES ('624', 'Ayun Pa', 'Thị Xã', '', '64', '0');
INSERT INTO `districts` VALUES ('625', 'Kbang', 'Huyện', '14 18 08N, 108 29 17E', '64', '0');
INSERT INTO `districts` VALUES ('626', 'Đăk Đoa', 'Huyện', '14 07 02N, 108 09 36E', '64', '0');
INSERT INTO `districts` VALUES ('627', 'Chư Păh', 'Huyện', '14 13 30N, 107 56 33E', '64', '0');
INSERT INTO `districts` VALUES ('628', 'Ia Grai', 'Huyện', '13 59 25N, 107 43 16E', '64', '0');
INSERT INTO `districts` VALUES ('629', 'Mang Yang', 'Huyện', '13 57 26N, 108 18 37E', '64', '0');
INSERT INTO `districts` VALUES ('630', 'Kông Chro', 'Huyện', '13 45 47N, 108 36 04E', '64', '0');
INSERT INTO `districts` VALUES ('631', 'Đức Cơ', 'Huyện', '13 46 16N, 107 38 26E', '64', '0');
INSERT INTO `districts` VALUES ('632', 'Chư Prông', 'Huyện', '13 35 39N, 107 47 36E', '64', '0');
INSERT INTO `districts` VALUES ('633', 'Chư Sê', 'Huyện', '13 37 04N, 108 06 56E', '64', '0');
INSERT INTO `districts` VALUES ('634', 'Đăk Pơ', 'Huyện', '13 55 47N, 108 36 16E', '64', '0');
INSERT INTO `districts` VALUES ('635', 'Ia Pa', 'Huyện', '13 31 37N, 108 30 34E', '64', '0');
INSERT INTO `districts` VALUES ('637', 'Krông Pa', 'Huyện', '13 14 13N, 108 39 12E', '64', '0');
INSERT INTO `districts` VALUES ('638', 'Phú Thiện', 'Huyện', '', '64', '0');
INSERT INTO `districts` VALUES ('639', 'Chư Pưh', 'Huyện', '', '64', '0');
INSERT INTO `districts` VALUES ('643', 'Buôn Ma Thuột', 'Thành Phố', '12 39 43N, 108 10 40E', '66', '0');
INSERT INTO `districts` VALUES ('644', 'Buôn Hồ', 'Thị Xã', '', '66', '0');
INSERT INTO `districts` VALUES ('645', 'Ea H\'leo', 'Huyện', '13 13 52N, 108 12 30E', '66', '0');
INSERT INTO `districts` VALUES ('646', 'Ea Súp', 'Huyện', '13 10 59N, 107 46 49E', '66', '0');
INSERT INTO `districts` VALUES ('647', 'Buôn Đôn', 'Huyện', '12 52 45N, 107 45 20E', '66', '0');
INSERT INTO `districts` VALUES ('648', 'Cư M\'gar', 'Huyện', '12 53 47N, 108 04 16E', '66', '0');
INSERT INTO `districts` VALUES ('649', 'Krông Búk', 'Huyện', '12 56 27N, 108 13 54E', '66', '0');
INSERT INTO `districts` VALUES ('650', 'Krông Năng', 'Huyện', '12 59 41N, 108 23 42E', '66', '0');
INSERT INTO `districts` VALUES ('651', 'Ea Kar', 'Huyện', '12 48 17N, 108 32 42E', '66', '0');
INSERT INTO `districts` VALUES ('652', 'M\'đrắk', 'Huyện', '12 42 14N, 108 47 09E', '66', '0');
INSERT INTO `districts` VALUES ('653', 'Krông Bông', 'Huyện', '12 27 08N, 108 27 01E', '66', '0');
INSERT INTO `districts` VALUES ('654', 'Krông Pắc', 'Huyện', '12 41 20N, 108 18 42E', '66', '0');
INSERT INTO `districts` VALUES ('655', 'Krông A Na', 'Huyện', '12 31 51N, 108 05 03E', '66', '0');
INSERT INTO `districts` VALUES ('656', 'Lắk', 'Huyện', '12 19 20N, 108 12 17E', '66', '0');
INSERT INTO `districts` VALUES ('657', 'Cư Kuin', 'Huyện', '', '66', '0');
INSERT INTO `districts` VALUES ('660', 'Gia Nghĩa', 'Thị Xã', '', '67', '0');
INSERT INTO `districts` VALUES ('661', 'Đắk Glong', 'Huyện', '12 01 53N, 107 50 37E', '67', '0');
INSERT INTO `districts` VALUES ('662', 'Cư Jút', 'Huyện', '12 40 56N, 107 44 44E', '67', '0');
INSERT INTO `districts` VALUES ('663', 'Đắk Mil', 'Huyện', '12 31 08N, 107 42 24E', '67', '0');
INSERT INTO `districts` VALUES ('664', 'Krông Nô', 'Huyện', '12 22 16N, 107 53 49E', '67', '0');
INSERT INTO `districts` VALUES ('665', 'Đắk Song', 'Huyện', '12 14 04N, 107 36 30E', '67', '0');
INSERT INTO `districts` VALUES ('666', 'Đắk R\'lấp', 'Huyện', '12 02 30N, 107 25 59E', '67', '0');
INSERT INTO `districts` VALUES ('667', 'Tuy Đức', 'Huyện', '', '67', '0');
INSERT INTO `districts` VALUES ('672', 'Đà Lạt', 'Thành Phố', '11 54 33N, 108 27 08E', '68', '0');
INSERT INTO `districts` VALUES ('673', 'Bảo Lộc', 'Thị Xã', '11 32 48N, 107 47 37E', '68', '0');
INSERT INTO `districts` VALUES ('674', 'Đam Rông', 'Huyện', '12 02 35N, 108 10 26E', '68', '0');
INSERT INTO `districts` VALUES ('675', 'Lạc Dương', 'Huyện', '12 08 30N, 108 27 48E', '68', '0');
INSERT INTO `districts` VALUES ('676', 'Lâm Hà', 'Huyện', '11 55 26N, 108 11 31E', '68', '0');
INSERT INTO `districts` VALUES ('677', 'Đơn Dương', 'Huyện', '11 48 26N, 108 32 48E', '68', '0');
INSERT INTO `districts` VALUES ('678', 'Đức Trọng', 'Huyện', '11 41 50N, 108 18 58E', '68', '0');
INSERT INTO `districts` VALUES ('679', 'Di Linh', 'Huyện', '11 31 10N, 108 05 23E', '68', '0');
INSERT INTO `districts` VALUES ('680', 'Bảo Lâm', 'Huyện', '11 38 31N, 107 43 25E', '68', '0');
INSERT INTO `districts` VALUES ('681', 'Đạ Huoai', 'Huyện', '11 27 11N, 107 38 08E', '68', '0');
INSERT INTO `districts` VALUES ('682', 'Đạ Tẻh', 'Huyện', '11 33 46N, 107 32 00E', '68', '0');
INSERT INTO `districts` VALUES ('683', 'Cát Tiên', 'Huyện', '11 39 38N, 107 23 27E', '68', '0');
INSERT INTO `districts` VALUES ('688', 'Phước Long', 'Thị Xã', '', '70', '0');
INSERT INTO `districts` VALUES ('689', 'Đồng Xoài', 'Thị Xã', '11 31 01N, 106 50 21E', '70', '0');
INSERT INTO `districts` VALUES ('690', 'Bình Long', 'Thị Xã', '', '70', '0');
INSERT INTO `districts` VALUES ('691', 'Bù Gia Mập', 'Huyện', '11 56 57N, 106 59 21E', '70', '0');
INSERT INTO `districts` VALUES ('692', 'Lộc Ninh', 'Huyện', '11 49 28N, 106 35 11E', '70', '0');
INSERT INTO `districts` VALUES ('693', 'Bù Đốp', 'Huyện', '11 59 08N, 106 49 54E', '70', '0');
INSERT INTO `districts` VALUES ('694', 'Hớn Quản', 'Huyện', '11 37 37N, 106 36 02E', '70', '0');
INSERT INTO `districts` VALUES ('695', 'Đồng Phù', 'Huyện', '11 28 45N, 106 57 07E', '70', '0');
INSERT INTO `districts` VALUES ('696', 'Bù Đăng', 'Huyện', '11 46 09N, 107 14 14E', '70', '0');
INSERT INTO `districts` VALUES ('697', 'Chơn Thành', 'Huyện', '11 28 45N, 106 39 26E', '70', '0');
INSERT INTO `districts` VALUES ('703', 'Tây Ninh', 'Thị Xã', '11 21 59N, 106 07 47E', '72', '0');
INSERT INTO `districts` VALUES ('705', 'Tân Biên', 'Huyện', '11 35 14N, 105 57 53E', '72', '0');
INSERT INTO `districts` VALUES ('706', 'Tân Châu', 'Huyện', '11 34 49N, 106 17 48E', '72', '0');
INSERT INTO `districts` VALUES ('707', 'Dương Minh Châu', 'Huyện', '11 22 04N, 106 16 58E', '72', '0');
INSERT INTO `districts` VALUES ('708', 'Châu Thành', 'Huyện', '11 19 02N, 106 00 15E', '72', '0');
INSERT INTO `districts` VALUES ('709', 'Hòa Thành', 'Huyện', '11 15 31N, 106 08 44E', '72', '0');
INSERT INTO `districts` VALUES ('710', 'Gò Dầu', 'Huyện', '11 09 39N, 106 14 42E', '72', '0');
INSERT INTO `districts` VALUES ('711', 'Bến Cầu', 'Huyện', '11 07 50N, 106 08 25E', '72', '0');
INSERT INTO `districts` VALUES ('712', 'Trảng Bàng', 'Huyện', '11 06 18N, 106 23 12E', '72', '0');
INSERT INTO `districts` VALUES ('718', 'Thủ Dầu Một', 'Thị Xã', '11 00 01N, 106 38 56E', '74', '0');
INSERT INTO `districts` VALUES ('720', 'Dầu Tiếng', 'Huyện', '11 19 07N, 106 26 59E', '74', '0');
INSERT INTO `districts` VALUES ('721', 'Bến Cát', 'Huyện', '11 12 42N, 106 36 28E', '74', '0');
INSERT INTO `districts` VALUES ('722', 'Phú Giáo', 'Huyện', '11 20 21N, 106 47 48E', '74', '0');
INSERT INTO `districts` VALUES ('723', 'Tân Uyên', 'Huyện', '11 06 31N, 106 49 02E', '74', '0');
INSERT INTO `districts` VALUES ('724', 'Dĩ An', 'Huyện', '10 55 03N, 106 47 09E', '74', '0');
INSERT INTO `districts` VALUES ('725', 'Thuận An', 'Huyện', '10 55 58N, 106 41 59E', '74', '0');
INSERT INTO `districts` VALUES ('731', 'Biên Hòa', 'Thành Phố', '10 56 31N, 106 50 50E', '75', '0');
INSERT INTO `districts` VALUES ('732', 'Long Khánh', 'Thị Xã', '10 56 24N, 107 14 29E', '75', '0');
INSERT INTO `districts` VALUES ('734', 'Tân Phú', 'Huyện', '11 22 51N, 107 21 35E', '75', '0');
INSERT INTO `districts` VALUES ('735', 'Vĩnh Cửu', 'Huyện', '11 14 31N, 107 00 06E', '75', '0');
INSERT INTO `districts` VALUES ('736', 'Định Quán', 'Huyện', '11 12 41N, 107 17 03E', '75', '0');
INSERT INTO `districts` VALUES ('737', 'Trảng Bom', 'Huyện', '10 58 39N, 107 00 52E', '75', '0');
INSERT INTO `districts` VALUES ('738', 'Thống Nhất', 'Huyện', '10 58 29N, 107 09 26E', '75', '0');
INSERT INTO `districts` VALUES ('739', 'Cẩm Mỹ', 'Huyện', '10 47 05N, 107 14 36E', '75', '0');
INSERT INTO `districts` VALUES ('740', 'Long Thành', 'Huyện', '10 47 38N, 106 59 42E', '75', '0');
INSERT INTO `districts` VALUES ('741', 'Xuân Lộc', 'Huyện', '10 55 39N, 107 24 21E', '75', '0');
INSERT INTO `districts` VALUES ('742', 'Nhơn Trạch', 'Huyện', '10 39 18N, 106 53 18E', '75', '0');
INSERT INTO `districts` VALUES ('747', 'Vũng Tầu', 'Thành Phố', '10 24 08N, 107 07 05E', '77', '0');
INSERT INTO `districts` VALUES ('748', 'Bà Rịa', 'Thị Xã', '10 30 33N, 107 10 47E', '77', '0');
INSERT INTO `districts` VALUES ('750', 'Châu Đức', 'Huyện', '10 39 23N, 107 15 08E', '77', '0');
INSERT INTO `districts` VALUES ('751', 'Xuyên Mộc', 'Huyện', '10 37 46N, 107 29 39E', '77', '0');
INSERT INTO `districts` VALUES ('752', 'Long Điền', 'Huyện', '10 26 47N, 107 12 53E', '77', '0');
INSERT INTO `districts` VALUES ('753', 'Đất Đỏ', 'Huyện', '10 28 40N, 107 18 27E', '77', '0');
INSERT INTO `districts` VALUES ('754', 'Tân Thành', 'Huyện', '10 34 50N, 107 05 06E', '77', '0');
INSERT INTO `districts` VALUES ('755', 'Côn Đảo', 'Huyện', '8 42 25N, 106 36 05E', '77', '0');
INSERT INTO `districts` VALUES ('760', 'Quận 1', 'Quận', '10 46 34N, 106 41 45E', '79', '0');
INSERT INTO `districts` VALUES ('761', 'Quận 12', 'Quận', '10 51 43N, 106 39 32E', '79', '0');
INSERT INTO `districts` VALUES ('762', 'Thủ Đức', 'Quận', '10 51 20N, 106 45 05E', '79', '0');
INSERT INTO `districts` VALUES ('763', 'Quận 9', 'Quận', '10 49 49N, 106 49 03E', '79', '0');
INSERT INTO `districts` VALUES ('764', 'Gò Vấp', 'Quận', '10 50 12N, 106 39 52E', '79', '0');
INSERT INTO `districts` VALUES ('765', 'Bình Thạnh', 'Quận', '10 48 46N, 106 42 57E', '79', '0');
INSERT INTO `districts` VALUES ('766', 'Tân Bình', 'Quận', '10 48 13N, 106 39 03E', '79', '0');
INSERT INTO `districts` VALUES ('767', 'Tân Phú', 'Quận', '10 47 32N, 106 37 31E', '79', '0');
INSERT INTO `districts` VALUES ('768', 'Phú Nhuận', 'Quận', '10 48 06N, 106 40 39E', '79', '0');
INSERT INTO `districts` VALUES ('769', 'Quận 2', 'Quận', '10 46 51N, 106 45 25E', '79', '0');
INSERT INTO `districts` VALUES ('770', 'Quận 3', 'Quận', '10 46 48N, 106 40 46E', '79', '0');
INSERT INTO `districts` VALUES ('771', 'Quận 10', 'Quận', '10 46 25N, 106 40 02E', '79', '0');
INSERT INTO `districts` VALUES ('772', 'Quận 11', 'Quận', '10 46 01N, 106 38 44E', '79', '0');
INSERT INTO `districts` VALUES ('773', 'Quận 4', 'Quận', '10 45 42N, 106 42 09E', '79', '0');
INSERT INTO `districts` VALUES ('774', 'Quận 5', 'Quận', '10 45 24N, 106 40 00E', '79', '0');
INSERT INTO `districts` VALUES ('775', 'Quận 6', 'Quận', '10 44 46N, 106 38 10E', '79', '0');
INSERT INTO `districts` VALUES ('776', 'Quận 8', 'Quận', '10 43 24N, 106 37 40E', '79', '0');
INSERT INTO `districts` VALUES ('777', 'Bình Tân', 'Quận', '10 46 16N, 106 35 26E', '79', '0');
INSERT INTO `districts` VALUES ('778', 'Quận 7', 'Quận', '10 44 19N, 106 43 35E', '79', '0');
INSERT INTO `districts` VALUES ('783', 'Củ Chi', 'Huyện', '11 02 17N, 106 30 20E', '79', '0');
INSERT INTO `districts` VALUES ('784', 'Hóc Môn', 'Huyện', '10 52 42N, 106 35 33E', '79', '0');
INSERT INTO `districts` VALUES ('785', 'Bình Chánh', 'Huyện', '10 45 01N, 106 30 45E', '79', '0');
INSERT INTO `districts` VALUES ('786', 'Nhà Bè', 'Huyện', '10 39 06N, 106 43 35E', '79', '0');
INSERT INTO `districts` VALUES ('787', 'Cần Giờ', 'Huyện', '10 30 43N, 106 52 50E', '79', '0');
INSERT INTO `districts` VALUES ('794', 'Tân An', 'Thành Phố', '10 31 36N, 106 24 06E', '80', '0');
INSERT INTO `districts` VALUES ('796', 'Tân Hưng', 'Huyện', '10 49 05N, 105 39 26E', '80', '0');
INSERT INTO `districts` VALUES ('797', 'Vĩnh Hưng', 'Huyện', '10 52 54N, 105 45 58E', '80', '0');
INSERT INTO `districts` VALUES ('798', 'Mộc Hóa', 'Huyện', '10 47 09N, 105 57 56E', '80', '0');
INSERT INTO `districts` VALUES ('799', 'Tân Thạnh', 'Huyện', '10 37 44N, 105 57 07E', '80', '0');
INSERT INTO `districts` VALUES ('800', 'Thạnh Hóa', 'Huyện', '10 41 37N, 106 11 08E', '80', '0');
INSERT INTO `districts` VALUES ('801', 'Đức Huệ', 'Huyện', '10 51 57N, 106 15 48E', '80', '0');
INSERT INTO `districts` VALUES ('802', 'Đức Hòa', 'Huyện', '10 53 04N, 106 23 58E', '80', '0');
INSERT INTO `districts` VALUES ('803', 'Bến Lức', 'Huyện', '10 41 40N, 106 26 28E', '80', '0');
INSERT INTO `districts` VALUES ('804', 'Thủ Thừa', 'Huyện', '10 39 41N, 106 20 12E', '80', '0');
INSERT INTO `districts` VALUES ('805', 'Tân Trụ', 'Huyện', '10 31 47N, 106 30 06E', '80', '0');
INSERT INTO `districts` VALUES ('806', 'Cần Đước', 'Huyện', '10 32 21N, 106 36 33E', '80', '0');
INSERT INTO `districts` VALUES ('807', 'Cần Giuộc', 'Huyện', '10 34 43N, 106 38 35E', '80', '0');
INSERT INTO `districts` VALUES ('808', 'Châu Thành', 'Huyện', '10 27 52N, 106 30 00E', '80', '0');
INSERT INTO `districts` VALUES ('815', 'Mỹ Tho', 'Thành Phố', '10 22 14N, 106 21 52E', '82', '0');
INSERT INTO `districts` VALUES ('816', 'Gò Công', 'Thị Xã', '10 21 55N, 106 40 24E', '82', '0');
INSERT INTO `districts` VALUES ('818', 'Tân Phước', 'Huyện', '10 30 36N, 106 13 02E', '82', '0');
INSERT INTO `districts` VALUES ('819', 'Cái Bè', 'Huyện', '10 24 21N, 105 56 01E', '82', '0');
INSERT INTO `districts` VALUES ('820', 'Cai Lậy', 'Huyện', '10 24 20N, 106 06 05E', '82', '0');
INSERT INTO `districts` VALUES ('821', 'Châu Thành', 'Huyện', '20 25 21N, 106 16 57E', '82', '0');
INSERT INTO `districts` VALUES ('822', 'Chợ Gạo', 'Huyện', '10 23 45N, 106 26 53E', '82', '0');
INSERT INTO `districts` VALUES ('823', 'Gò Công Tây', 'Huyện', '10 19 55N, 106 35 02E', '82', '0');
INSERT INTO `districts` VALUES ('824', 'Gò Công Đông', 'Huyện', '10 20 42N, 106 42 54E', '82', '0');
INSERT INTO `districts` VALUES ('825', 'Tân Phú Đông', 'Huyện', '', '82', '0');
INSERT INTO `districts` VALUES ('829', 'Bến Tre', 'Thành Phố', '10 14 17N, 106 22 26E', '83', '0');
INSERT INTO `districts` VALUES ('831', 'Châu Thành', 'Huyện', '10 17 24N, 106 17 45E', '83', '0');
INSERT INTO `districts` VALUES ('832', 'Chợ Lách', 'Huyện', '10 13 26N, 106 09 08E', '83', '0');
INSERT INTO `districts` VALUES ('833', 'Mỏ Cày Nam', 'Huyện', '10 06 56N, 106 19 40E', '83', '0');
INSERT INTO `districts` VALUES ('834', 'Giồng Trôm', 'Huyện', '10 08 46N, 106 28 12E', '83', '0');
INSERT INTO `districts` VALUES ('835', 'Bình Đại', 'Huyện', '10 09 56N, 106 37 46E', '83', '0');
INSERT INTO `districts` VALUES ('836', 'Ba Tri', 'Huyện', '10 04 08N, 106 35 10E', '83', '0');
INSERT INTO `districts` VALUES ('837', 'Thạnh Phú', 'Huyện', '9 55 53N, 106 32 45E', '83', '0');
INSERT INTO `districts` VALUES ('838', 'Mỏ Cày Bắc', 'Huyện', '', '83', '0');
INSERT INTO `districts` VALUES ('842', 'Trà Vinh', 'Thị Xã', '9 57 09N, 106 20 39E', '84', '0');
INSERT INTO `districts` VALUES ('844', 'Càng Long', 'Huyện', '9 58 18N, 106 12 52E', '84', '0');
INSERT INTO `districts` VALUES ('845', 'Cầu Kè', 'Huyện', '9 51 23N, 106 03 33E', '84', '0');
INSERT INTO `districts` VALUES ('846', 'Tiểu Cần', 'Huyện', '9 48 37N, 106 12 06E', '84', '0');
INSERT INTO `districts` VALUES ('847', 'Châu Thành', 'Huyện', '9 52 57N, 106 24 12E', '84', '0');
INSERT INTO `districts` VALUES ('848', 'Cầu Ngang', 'Huyện', '9 47 14N, 106 29 19E', '84', '0');
INSERT INTO `districts` VALUES ('849', 'Trà Cú', 'Huyện', '9 42 06N, 106 16 24E', '84', '0');
INSERT INTO `districts` VALUES ('850', 'Duyên Hải', 'Huyện', '9 39 58N, 106 26 23E', '84', '0');
INSERT INTO `districts` VALUES ('855', 'Vĩnh Long', 'Thành Phố', '10 15 09N, 105 56 08E', '86', '0');
INSERT INTO `districts` VALUES ('857', 'Long Hồ', 'Huyện', '10 13 58N, 105 55 47E', '86', '0');
INSERT INTO `districts` VALUES ('858', 'Mang Thít', 'Huyện', '10 10 58N, 106 05 13E', '86', '0');
INSERT INTO `districts` VALUES ('859', 'Vũng Liêm', 'Huyện', '10 03 32N, 106 10 35E', '86', '0');
INSERT INTO `districts` VALUES ('860', 'Tam Bình', 'Huyện', '10 03 58N, 105 58 03E', '86', '0');
INSERT INTO `districts` VALUES ('861', 'Bình Minh', 'Huyện', '10 05 45N, 105 47 21E', '86', '0');
INSERT INTO `districts` VALUES ('862', 'Trà Ôn', 'Huyện', '9 59 20N, 105 57 56E', '86', '0');
INSERT INTO `districts` VALUES ('863', 'Bình Tân', 'Huyện', '', '86', '0');
INSERT INTO `districts` VALUES ('866', 'Cao Lãnh', 'Thành Phố', '10 27 38N, 105 37 21E', '87', '0');
INSERT INTO `districts` VALUES ('867', 'Sa Đéc', 'Thị Xã', '10 19 22N, 105 44 31E', '87', '0');
INSERT INTO `districts` VALUES ('868', 'Hồng Ngự', 'Thị Xã', '', '87', '0');
INSERT INTO `districts` VALUES ('869', 'Tân Hồng', 'Huyện', '10 52 48N, 105 29 21E', '87', '0');
INSERT INTO `districts` VALUES ('870', 'Hồng Ngự', 'Huyện', '10 48 13N, 105 19 00E', '87', '0');
INSERT INTO `districts` VALUES ('871', 'Tam Nông', 'Huyện', '10 44 06N, 105 30 58E', '87', '0');
INSERT INTO `districts` VALUES ('872', 'Tháp Mười', 'Huyện', '10 33 36N, 105 47 13E', '87', '0');
INSERT INTO `districts` VALUES ('873', 'Cao Lãnh', 'Huyện', '10 29 03N, 105 41 40E', '87', '0');
INSERT INTO `districts` VALUES ('874', 'Thanh Bình', 'Huyện', '10 36 38N, 105 28 51E', '87', '0');
INSERT INTO `districts` VALUES ('875', 'Lấp Vò', 'Huyện', '10 21 27N, 105 36 06E', '87', '0');
INSERT INTO `districts` VALUES ('876', 'Lai Vung', 'Huyện', '10 14 43N, 105 38 40E', '87', '0');
INSERT INTO `districts` VALUES ('877', 'Châu Thành', 'Huyện', '10 13 27N, 105 48 38E', '87', '0');
INSERT INTO `districts` VALUES ('883', 'Long Xuyên', 'Thành Phố', '10 22 22N, 105 25 33E', '89', '0');
INSERT INTO `districts` VALUES ('884', 'Châu Đốc', 'Thị Xã', '10 41 20N, 105 05 15E', '89', '0');
INSERT INTO `districts` VALUES ('886', 'An Phú', 'Huyện', '10 50 12N, 105 05 33E', '89', '0');
INSERT INTO `districts` VALUES ('887', 'Tân Châu', 'Thị Xã', '10 49 11N, 105 11 18E', '89', '0');
INSERT INTO `districts` VALUES ('888', 'Phú Tân', 'Huyện', '10 40 26N, 105 14 40E', '89', '0');
INSERT INTO `districts` VALUES ('889', 'Châu Phú', 'Huyện', '10 34 12N, 105 12 13E', '89', '0');
INSERT INTO `districts` VALUES ('890', 'Tịnh Biên', 'Huyện', '10 33 30N, 105 00 17E', '89', '0');
INSERT INTO `districts` VALUES ('891', 'Tri Tôn', 'Huyện', '10 24 41N, 104 56 58E', '89', '0');
INSERT INTO `districts` VALUES ('892', 'Châu Thành', 'Huyện', '10 25 39N, 105 15 31E', '89', '0');
INSERT INTO `districts` VALUES ('893', 'Chợ Mới', 'Huyện', '10 27 23N, 105 26 57E', '89', '0');
INSERT INTO `districts` VALUES ('894', 'Thoại Sơn', 'Huyện', '10 16 45N, 105 15 59E', '89', '0');
INSERT INTO `districts` VALUES ('899', 'Rạch Giá', 'Thành Phố', '10 01 35N, 105 06 20E', '91', '0');
INSERT INTO `districts` VALUES ('900', 'Hà Tiên', 'Thị Xã', '10 22 54N, 104 30 10E', '91', '0');
INSERT INTO `districts` VALUES ('902', 'Kiên Lương', 'Huyện', '10 20 21N, 104 39 46E', '91', '0');
INSERT INTO `districts` VALUES ('903', 'Hòn Đất', 'Huyện', '10 14 20N, 104 55 57E', '91', '0');
INSERT INTO `districts` VALUES ('904', 'Tân Hiệp', 'Huyện', '10 05 18N, 105 14 04E', '91', '0');
INSERT INTO `districts` VALUES ('905', 'Châu Thành', 'Huyện', '9 57 37N, 105 10 16E', '91', '0');
INSERT INTO `districts` VALUES ('906', 'Giồng Giềng', 'Huyện', '9 56 05N, 105 22 06E', '91', '0');
INSERT INTO `districts` VALUES ('907', 'Gò Quao', 'Huyện', '9 43 17N, 105 17 06E', '91', '0');
INSERT INTO `districts` VALUES ('908', 'An Biên', 'Huyện', '9 48 37N, 105 03 18E', '91', '0');
INSERT INTO `districts` VALUES ('909', 'An Minh', 'Huyện', '9 40 24N, 104 59 05E', '91', '0');
INSERT INTO `districts` VALUES ('910', 'Vĩnh Thuận', 'Huyện', '9 33 25N, 105 11 30E', '91', '0');
INSERT INTO `districts` VALUES ('911', 'Phú Quốc', 'Huyện', '10 13 44N, 103 57 25E', '91', '0');
INSERT INTO `districts` VALUES ('912', 'Kiên Hải', 'Huyện', '9 48 31N, 104 37 48E', '91', '0');
INSERT INTO `districts` VALUES ('913', 'U Minh Thượng', 'Huyện', '', '91', '0');
INSERT INTO `districts` VALUES ('914', 'Giang Thành', 'Huyện', '', '91', '0');
INSERT INTO `districts` VALUES ('916', 'Ninh Kiều', 'Quận', '10 01 58N, 105 45 34E', '92', '0');
INSERT INTO `districts` VALUES ('917', 'Ô Môn', 'Quận', '10 07 28N, 105 37 51E', '92', '0');
INSERT INTO `districts` VALUES ('918', 'Bình Thuỷ', 'Quận', '10 03 42N, 105 43 17E', '92', '0');
INSERT INTO `districts` VALUES ('919', 'Cái Răng', 'Quận', '9 59 57N, 105 46 56E', '92', '0');
INSERT INTO `districts` VALUES ('923', 'Thốt Nốt', 'Quận', '10 14 23N, 105 32 02E', '92', '0');
INSERT INTO `districts` VALUES ('924', 'Vĩnh Thạnh', 'Huyện', '10 11 35N, 105 22 45E', '92', '0');
INSERT INTO `districts` VALUES ('925', 'Cờ Đỏ', 'Huyện', '10 02 48N, 105 29 46E', '92', '0');
INSERT INTO `districts` VALUES ('926', 'Phong Điền', 'Huyện', '9 59 57N, 105 39 35E', '92', '0');
INSERT INTO `districts` VALUES ('927', 'Thới Lai', 'Huyện', '', '92', '0');
INSERT INTO `districts` VALUES ('930', 'Vị Thanh', 'Thị Xã', '9 45 15N, 105 24 50E', '93', '0');
INSERT INTO `districts` VALUES ('931', 'Ngã Bảy', 'Thị Xã', '', '93', '0');
INSERT INTO `districts` VALUES ('932', 'Châu Thành A', 'Huyện', '9 55 50N, 105 38 31E', '93', '0');
INSERT INTO `districts` VALUES ('933', 'Châu Thành', 'Huyện', '9 55 22N, 105 48 37E', '93', '0');
INSERT INTO `districts` VALUES ('934', 'Phụng Hiệp', 'Huyện', '9 47 20N, 105 43 29E', '93', '0');
INSERT INTO `districts` VALUES ('935', 'Vị Thuỷ', 'Huyện', '9 48 05N, 105 32 13E', '93', '0');
INSERT INTO `districts` VALUES ('936', 'Long Mỹ', 'Huyện', '9 40 47N, 105 30 53E', '93', '0');
INSERT INTO `districts` VALUES ('941', 'Sóc Trăng', 'Thành Phố', '9 36 39N, 105 59 00E', '94', '0');
INSERT INTO `districts` VALUES ('942', 'Châu Thành', 'Huyện', '', '94', '0');
INSERT INTO `districts` VALUES ('943', 'Kế Sách', 'Huyện', '9 49 30N, 105 57 25E', '94', '0');
INSERT INTO `districts` VALUES ('944', 'Mỹ Tú', 'Huyện', '9 38 21N, 105 49 52E', '94', '0');
INSERT INTO `districts` VALUES ('945', 'Cù Lao Dung', 'Huyện', '9 37 36N, 106 12 13E', '94', '0');
INSERT INTO `districts` VALUES ('946', 'Long Phú', 'Huyện', '9 34 38N, 106 06 07E', '94', '0');
INSERT INTO `districts` VALUES ('947', 'Mỹ Xuyên', 'Huyện', '9 28 16N, 105 55 51E', '94', '0');
INSERT INTO `districts` VALUES ('948', 'Ngã Năm', 'Huyện', '9 31 38N, 105 37 22E', '94', '0');
INSERT INTO `districts` VALUES ('949', 'Thạnh Trị', 'Huyện', '9 28 05N, 105 43 02E', '94', '0');
INSERT INTO `districts` VALUES ('950', 'Vĩnh Châu', 'Huyện', '9 20 50N, 105 59 58E', '94', '0');
INSERT INTO `districts` VALUES ('951', 'Trần Đề', 'Huyện', '', '94', '0');
INSERT INTO `districts` VALUES ('954', 'Bạc Liêu', 'Thị Xã', '9 16 05N, 105 45 08E', '95', '0');
INSERT INTO `districts` VALUES ('956', 'Hồng Dân', 'Huyện', '9 30 37N, 105 24 25E', '95', '0');
INSERT INTO `districts` VALUES ('957', 'Phước Long', 'Huyện', '9 23 13N, 105 24 41E', '95', '0');
INSERT INTO `districts` VALUES ('958', 'Vĩnh Lợi', 'Huyện', '9 16 51N, 105 40 54E', '95', '0');
INSERT INTO `districts` VALUES ('959', 'Giá Rai', 'Huyện', '9 15 51N, 105 23 18E', '95', '0');
INSERT INTO `districts` VALUES ('960', 'Đông Hải', 'Huyện', '9 08 11N, 105 24 42E', '95', '0');
INSERT INTO `districts` VALUES ('961', 'Hoà Bình', 'Huyện', '', '95', '0');
INSERT INTO `districts` VALUES ('964', 'Cà Mau', 'Thành Phố', '9 10 33N, 105 11 11E', '96', '0');
INSERT INTO `districts` VALUES ('966', 'U Minh', 'Huyện', '9 22 30N, 104 57 00E', '96', '0');
INSERT INTO `districts` VALUES ('967', 'Thới Bình', 'Huyện', '9 22 50N, 105 07 35E', '96', '0');
INSERT INTO `districts` VALUES ('968', 'Trần Văn Thời', 'Huyện', '9 07 36N, 104 57 27E', '96', '0');
INSERT INTO `districts` VALUES ('969', 'Cái Nước', 'Huyện', '9 00 31N, 105 03 23E', '96', '0');
INSERT INTO `districts` VALUES ('970', 'Đầm Dơi', 'Huyện', '8 57 48N, 105 13 56E', '96', '0');
INSERT INTO `districts` VALUES ('971', 'Năm Căn', 'Huyện', '8 46 59N, 104 58 20E', '96', '0');
INSERT INTO `districts` VALUES ('972', 'Phú Tân', 'Huyện', '8 52 47N, 104 53 35E', '96', '0');
INSERT INTO `districts` VALUES ('973', 'Ngọc Hiển', 'Huyện', '8 40 47N, 104 57 58E', '96', '0');

-- ----------------------------
-- Table structure for drugs
-- ----------------------------
DROP TABLE IF EXISTS `drugs`;
CREATE TABLE `drugs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `group_drug_id` int(11) DEFAULT NULL,
  `donvibuon` varchar(255) NOT NULL,
  `donvile` varchar(255) NOT NULL,
  `hesoquydoi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`),
  KEY `code` (`code`),
  FULLTEXT KEY `name` (`code`,`nameClean`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of drugs
-- ----------------------------
INSERT INTO `drugs` VALUES ('3', 'jBIz8kCklqvnfpp', 'Thiên việt hương (Gia hạn lần 1)_NC48-H12-15', 'Thiên việt hương (Gia hạn lần 1)', 'thien viet huong (gia han lan 1)', 'Ace 500mg', 'Menthol, Thymol, Camphor, tinh dầu quế, tinh dầu bạc hà, tinh dầu long não, Methyl salicylat', 'Cao dán', 'hộp 5 gói x 4 lá (6cm x 8 cm)', 'TCCS', '24 tháng', 'NC48-H12-15', 'Bệnh viện y học cổ truyền Trung ương', 'Việt Nam', '29 Nguyễn Bỉnh Khiêm, Hà Nội', 'Bệnh viện y học cổ truyền Trung ương', 'Việt Nam', '29 Nguyễn Bỉnh Khiêm, Hà Nội', 'eee', null, '2017-06-08 10:46:09', '1', '3', 'Hộp', '10', '10', null, '2017-08-07 02:06:45');
INSERT INTO `drugs` VALUES ('4', 'Hxc3YChikxcFH11', 'Dolodon_VD-17326-12', 'Dolodon', 'dolodon', '500 mg', 'Paracetamol (cốm paracetamol 90%)', 'viên nén', 'Hộp 2 vỉ, 12 vỉ x 8 viên. Chai 100 viên, 500 viên nén', 'TCCS', '36 tháng', 'VD-17326-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, '2017-07-30 07:40:53');
INSERT INTO `drugs` VALUES ('5', 'erh64jt7HZalUWW', 'Lamivudin 100 ICA_VD-17327-12', 'Lamivudin 100 ICA', 'lamivudin 100 ica', '100 mg', 'Lamivudin', 'Viên nén bao phim', 'Hộp 1 chai x 28 viên', 'TCCS', '36 tháng', 'VD-17327-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', null, null, '2017-06-08 10:46:09', '0', null, '', '', '', null, '2017-07-30 07:39:33');
INSERT INTO `drugs` VALUES ('6', 'rPeKhu0p46qlPMM', 'Neumomicid_VD-17328-12', 'Neumomicid', 'neumomicid', '3,0 MIU', 'Spiramycin', 'viên nén dài bao phim', 'Hộp 2 vỉ x 5 viên', 'TCCS', '36 tháng', 'VD-17328-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('7', 'qYcTnVzFiO3Hagg', 'Victron_VD-17329-12', 'Victron', 'victron', '100 mg', 'Lamivudin', 'Viên nén bao phim', 'Hộp 2 vỉ x 14 viên', 'TCCS', '36 tháng', 'VD-17329-12', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', 'Công ty cổ phần công nghệ sinh học dược phẩm ICA', 'Việt Nam', 'Lô 10, Đường số 5, KCN Việt Nam - Singapore, Thuận An, tỉnh Bình Dương', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('8', 'YCRbDDeOXywgmrr', 'Citicolin_VD-17330-12', 'Citicolin', 'citicolin', 'Citicolin 500 mg/2 ml', 'Citicolin Natri', 'Dung dịch tiêm', 'Hộp 10 ống x 2 ml', 'TCCS', '24 tháng', 'VD-17330-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('9', 'Qzep2Yy4ruhHSss', 'Danatobra_VD-17331-12', 'Danatobra', 'danatobra', 'Tobramycin 0,3%', 'Tobramycin sulfat', 'Thuốc nhỏ mắt', 'Hộp 1 lọ 5 ml', 'TCCS', '24 tháng', 'VD-17331-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('10', 'fjEO4Hr7lGuHrii', 'Etocox 200_VD-17332-12', 'Etocox 200', 'etocox 200', '200mg', 'Etodolac', 'Viên nén bao phim', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17332-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('11', '3bUxrKG8SSatyJJ', 'Hesota_VD-17333-12', 'Hesota', 'hesota', '.', 'Cao khô của Kim tiền thảo, Nhân trần, Hoàng cầm, Nghệ, Binh lang, Chỉ thực, Hậu phác, Bạch mao căn; Mộc hương, Đại hoàng', 'Viên nén bao phim', 'Hộp 1 lọ x 45 viên. Hộp 5 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17333-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', 'Khu công nghiệp Hòa Khánh, Quận Liên Chiểu, TP. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('12', 'PClzDpdaqtf9Foo', 'Meloxicam 15 mg_VD-17334-12', 'Meloxicam 15 mg', 'meloxicam 15 mg', '15 mg', 'Meloxicam', 'viên nén', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17334-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('13', 'Npb9AcosxS4aMYY', 'Nalexva_VD-17335-12', 'Nalexva', 'nalexva', '13,5 mg; 33 mg', 'Dikali glycyrrhizinat, Natri clorid', 'Thuốc nhỏ mắt', 'Hộp 1 Lọ x 15 ml', 'TCCS', '24 tháng', 'VD-17335-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('14', 'dEEbHSzwY3jnFJJ', 'Pantopil_VD-17336-12', 'Pantopil', 'pantopil', 'Pantoprazol 40 mg', 'Pantoprazol (dạng vi nang 8,5%)', 'Viên nang tan trong ruột', 'Hộp 1 vỉ, 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17336-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('15', 'xKShgotW20B40ZZ', 'Ranitidin 150mg_VD-17337-12', 'Ranitidin 150mg', 'ranitidin 150mg', 'Ranitidin 150 mg', 'Ranitidin HCL', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17337-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('16', 'r6N3f2DtxUOiyll', 'Risdontab 2_VD-17338-12', 'Risdontab 2', 'risdontab 2', '2 mg', 'Risperidon', 'Viên bao phim', 'Hộp 5 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17338-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('17', 'rNZemKVONa1v6jj', 'Vitamin B1B6B12_VD-17339-12', 'Vitamin B1B6B12', 'vitamin b1b6b12', '12,5 mg; 12,5 mg; 12,5 mcg', 'Thiamin mononitrat, Pyridoxin hydroclorid, Cyanocobalamin', 'Viên bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17339-12', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, tp. Đà Nẵng', 'Công ty cổ phần dược Danapha', 'Việt Nam', '253 Dũng Sĩ Thanh Khê, TP. Đà Nẵng', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('18', '9lYajxmaiZL1hNN', 'Cetirizin 10 mg_VD-17340-12', 'Cetirizin 10 mg', 'cetirizin 10 mg', '10mg', 'Cetirizin HCl 10mg', 'Viên nén dài', 'Chai 100 viên, chai 500 viên, hộp 10 vỉ x 10 viên, hộp 20 vỉ x 10 viên, hộp 50 vỉ x 10 viên', 'DĐVN IV', '36 tháng', 'VD-17340-12', 'Công ty cổ phần Dược Đồng Nai.', 'Việt Nam', '221B, Phạm Văn Thuận, P. Tân Tiến, TP. Biên Hoà, Đồng Nai', 'Công ty cổ phần Dược Đồng Nai.', 'Việt Nam', '221B, Phạm Văn Thuận, P. Tân Tiến, TP. Biên Hoà, Đồng Nai', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('19', '8clwbI0TNCT8zSS', 'Carudxan_VD-17341-12', 'Carudxan', 'carudxan', '2mg', 'Doxazosin 2mg dưới dạng Doxazosin mesylate', 'Viên nén dài', 'Hộp 1 vỉ, hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17341-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('20', 'Rg4ILof8X9EPn88', 'Clophehadi_VD-17342-12', 'Clophehadi', 'clophehadi', '4mg', 'Clorpheniramin maleat dưới dạng vi nang', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên, hộp 1 lọ 100 viên, hộp 1 lọ 1000 viên', 'TCCS', '36 tháng', 'VD-17342-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('21', 'FxXtI5X4rqYLCVV', 'Haloperidol 1,5mg_VD-17343-12', 'Haloperidol 1,5mg', 'haloperidol 1,5mg', '1,5mg', 'Haloperidol', 'Viên nén', 'Hộp 2 vỉ, hộp 10 vỉ x 10 viên, hộp 1 lọ 100 viên', 'DĐVN IV', '36 tháng', 'VD-17343-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('22', 'bdguZ3lW8hboaa', 'HapyGra_VD-17344-12', 'HapyGra', 'hapygra', '50mg', 'Sildenafil', 'Viên nén bao phim', 'Hộp 1 vỉ x 2 viên', 'TCCS', '36 tháng', 'VD-17344-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('23', 'DTdSyEUcF9sWSXX', 'Kem bôi da Clotrimazol 1%_VD-17345-12', 'Kem bôi da Clotrimazol 1%', 'kem boi da clotrimazol 1%', '1g', 'Clotrimazol', 'Kem bôi da', 'Hộp 1 tuýp 5g, hộp 1 tuýp 10g', 'TCCS', '36 tháng', 'VD-17345-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('24', '0M5Bkgxya5aAfqq', 'Rmekol_VD-17346-12', 'Rmekol', 'rmekol', '.', 'Paracetamol, Dextromethorphan HBr, Clorpheniramin maleat', 'Viên nén dài bao phim', 'Hộp 25 vỉ x 4 viên', 'TCCS', '36 tháng', 'VD-17346-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('25', '4J79rnHdVigncJJ', 'Sirô Tussihadi_VD-17347-12', 'Sirô Tussihadi', 'siro tussihadi', '.', 'Clorpheniramin maleat, dextromethorphan, guaifenesin, natri citrat, amoni clorid', 'Siro thuốc', 'Hộp 1 lọ 30ml, hộp 1 lọ 60ml, hộp 1 lọ 100ml', 'TCCS', '36 tháng', 'VD-17347-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('26', 'mqqxSI3vWxYFmdd', 'Vitamin C_VD-17348-12', 'Vitamin C', 'vitamin c', '500mg', 'Acid ascorbic', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17348-12', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', 'Công ty cổ phần Dược Hà Tĩnh', 'Việt Nam', '167 Hà Huy Tập, tp. Hà Tĩnh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('27', 'Ngr0XmRPsfuyQNN', 'Anomin Daily_VD-17349-12', 'Anomin Daily', 'anomin daily', '.', 'Beta caroten, vitamin E, C, B1, B2, B6, PP', 'Viên nang mềm', 'Hộp 10 vỉ x 5 viên', 'TCCS', '24 tháng', 'VD-17349-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('28', '0V8dIv0Ur0z5XJJ', 'Cozz Expec_VD-17350-12', 'Cozz Expec', 'cozz expec', '30mg', 'Ambroxol HCl', 'Viên nén', 'Hộp 3 vỉ x 10 viên', 'TCCS', '24 tháng', 'VD-17350-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('29', 'KOqOHQwN5Nnsj66', 'Hagimox HT_VD-17351-12', 'Hagimox HT', 'hagimox ht', '500mg', 'Amoxicillin 500mg dưới dạng Amoxicillin trihydrat', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên, chai 200 viên, chai 500 viên', 'DĐVN IV', '24 tháng', 'VD-17351-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('30', 'ZZBNFVOhN9wLuu', 'Lanazol_VD-17352-12', 'Lanazol', 'lanazol', '30mg', 'Lansoprazol 30mg dưới dạng Lansoprazol pellet', 'Viên nang tan trong ruột', 'Hộp 3 vỉ x 10 viên', 'TCCS', '24 tháng', 'VD-17352-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('31', 'Z9PXgfkeZeq6qKK', 'Mebilax 15_VD-17353-12', 'Mebilax 15', 'mebilax 15', '15mg', 'Meloxicam', 'Viên nén', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17353-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('32', 'c7eSY2qhxmmNyii', 'Mebilax 7,5_VD-17354-12', 'Mebilax 7,5', 'mebilax 7,5', '7,5mg', 'Meloxicam', 'Viên nén', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17354-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('33', 'YJenhdbq1SyjpOO', 'Telfor_VD-17355-12', 'Telfor', 'telfor', '60mg', 'Fexofenadin hydroclorid', 'Viên nén bao phim', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17355-12', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', 'Công ty cổ phần dược Hậu Giang', 'Việt Nam', '288 Bis Nguyễn Văn Cừ, p. An Hoà, Q. Ninh Kiều, Cần Thơ', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('34', 'ue11chigoqCyRFF', 'Alecizan_VD-17356-12', 'Alecizan', 'alecizan', '325 mg; 200 mg', 'Paracetamol, Ibuprofen', 'viên nén', 'Hộp 5 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17356-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('35', 'YBubrv0HHManjmm', 'Cephalexin 250mg_VD-17357-12', 'Cephalexin 250mg', 'cephalexin 250mg', 'Cephalexin 250 mg', 'Cephalexin monohydrat', 'Thuốc cốm', 'Hộp 12 gói x 3g', 'TCCS', '36 tháng', 'VD-17357-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('36', 'jqttre3nM8opKll', 'Cicalic 20_VD-17358-12', 'Cicalic 20', 'cicalic 20', '20 mg', 'Tadalafil', 'Viên nén bao phim', 'Hộp 1 vỉ x 01 viên, 02 viên', 'TCCS', '36 tháng', 'VD-17358-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('37', 'SdcwJ0IvUIw1rpp', 'Clatexyl 250 mg_VD-17359-12', 'Clatexyl 250 mg', 'clatexyl 250 mg', 'Amoxicillin 250 mg', 'Amoxicillin trihydrat', 'Viên nén dài ngậm', 'Hộp 1 chai x 100 viên', 'TCCS', '36 tháng', 'VD-17359-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('38', 'WjWxPGIYdam0VII', 'Clatexyl 500 mg_VD-17360-12', 'Clatexyl 500 mg', 'clatexyl 500 mg', 'Amoxicillin 500 mg', 'Amoxicillin Trihydrat', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17360-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('39', 'iQIe6vXn0BhDTqq', 'Devencol_VD-17361-12', 'Devencol', 'devencol', '325 mg; 2 mg', 'Paracetamol, Clopheniramin maleat', 'viên nén', 'Hộp 5 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17361-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('40', 'Dq29rYjcMZVJuoo', 'Joint scap 500 mg_VD-17362-12', 'Joint scap 500 mg', 'joint scap 500 mg', '500 mg', 'Glucosamin sulfat kali clorid', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17362-12', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', 'Công ty cổ phần Dược Minh Hải', 'Việt Nam', '322 Lý Văn Lâm, Phường 1, Tp. Cà Mau, Tỉnh Cà Mau', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('41', 'qsxmEuYqoENBImm', 'Berberal_VD-17364-12', 'Berberal', 'berberal', '10mg/ viên', 'Berberin clorid', 'Viên bao đường', 'Hộp 20 chai x 120 viên', 'TCCS', '36 tháng', 'VD-17364-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('42', 'pTiWYfxNB920cJJ', 'Kali Clorid_VD-17365-12', 'Kali Clorid', 'kali clorid', '500mg/ viên', 'Kali Clorid', 'Viên nén', 'Hộp 10 vỉ x 10 viên; Hộp 1 chai 100 viên', 'TCCS', '36 tháng', 'VD-17365-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('43', '0c0UyGGVb6sMzOO', 'Nady- Trimedat_VD-17366-12', 'Nady- Trimedat', 'nady- trimedat', '100mg/ viên', 'Trimebutin maleat', 'Viên nén bao phim', 'Hộp 2 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17366-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('44', 'I5yGG40jleSpedd', 'Roxithromycin 50mg_VD-17368-12', 'Roxithromycin 50mg', 'roxithromycin 50mg', '50mg/ gói', 'Roxithromycin', 'Thuốc bột', 'Hộp 30 gói x 3g', 'TCCS', '36 tháng', 'VD-17368-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('45', 'dkZPoUtxpdwbUMM', 'Salbutamol 2mg_VD-17369-12', 'Salbutamol 2mg', 'salbutamol 2mg', 'Salbutamol 2mg/ viên', 'Salbutamol sulfat', 'Viên nén', 'Hộp 2 vỉ, 10 vỉ x 10 viên; Hộp 1 chai 100 viên', 'TCCS', '36 tháng', 'VD-17369-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('46', 'mqe9MDIEzsetJoo', 'Vitamin C 500mg_VD-17370-12', 'Vitamin C 500mg', 'vitamin c 500mg', '500mg/ viên', 'Vitamin C', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên; Hộp 1 chai 100 viên', 'TCCS', '24 tháng', 'VD-17370-12', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '930 C4, Đường C, Khu công nghiệp Cát Lái, Cụm 2, phường Thạnh Mỹ Lợi, Q.2, TP HCM.', 'Công ty cổ phần dược phẩm 2/9', 'Việt Nam', '299/22 Lý Thường Kiệt, P.15, Q.11, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('47', '9bn1411R15pGNCC', 'Bromhexin 4_VD-17371-12', 'Bromhexin 4', 'bromhexin 4', '4mg', 'Bromhexin hydroclorid', 'viên nén', 'hộp 2 vỉ, 10 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17371-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('48', 'tOCPgsKsxEwcTzz', 'Bromhexin 8_VD-17372-12', 'Bromhexin 8', 'bromhexin 8', '8mg', 'Bromhexin hydroclorid', 'viên nén', 'hộp 2 vỉ, 10 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17372-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('49', 'SIYLbVW9w75M422', 'Clopheniramin  4 mg_VD-17373-12', 'Clopheniramin  4 mg', 'clopheniramin  4 mg', '4mg', 'Clorpheniramin maleat', 'viên nén dài', 'hộp 10 vỉ x 10 viên, hộp 1 chai 200 viên, chai 1000 viên', 'TCCS', '36 tháng', 'VD-17373-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('50', '50EV1P8y8jQE500', 'Methionin_VD-17374-12', 'Methionin', 'methionin', '250mg', 'Methionin', 'Viên nang cứng', 'hộp 1 chai 100 viên', 'TCCS', '36 tháng', 'VD-17374-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('51', '0GrCotKhqpn5vMM', 'Prebufen - F_VD-17375-12', 'Prebufen - F', 'prebufen - f', '400mg', 'Ibuprofen', 'Thuốc cốm', 'hộp 20 gói x 3 gam', 'TCCS', '36 tháng', 'VD-17375-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('52', 'USIkSFqTnToqa33', 'Zinenutri_VD-17376-12', 'Zinenutri', 'zinenutri', 'Kẽm 10mg', 'Kẽm gluconat', 'Thuốc cốm', 'hộp 20 gói x 1,5 gam', 'TCCS', '36 tháng', 'VD-17376-12', 'Công ty cổ phần Dược phẩm 3/2', 'Việt Nam', 'Số 930 C2, Đường C, KCN Cát Lái, P. Thạnh Mỹ Lợi, Q2, TP. Hồ Chí Minh', 'Công ty cổ phần dược phẩm 3/2', 'Việt Nam', '10 Công Trường Quốc Tế, Quận 3, TP. Hồ Chí Minh', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('53', '89TWGHRn3uQaphh', 'Agilosart 50_VD-17377-12', 'Agilosart 50', 'agilosart 50', '50mg/ viên', 'Losartan Kali', 'Viên nén bao phim', 'Hộp 4 vỉ x 10 viên', 'TCCS', '24 tháng', 'VD-17377-12', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', 'Khóm Thạnh An, P. Mỹ Thới, TP. Long Xuyên, An Giang', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', '27 Nguyễn Thái Học, P. Mỹ Bình, TP. Long Xuyên, An Giang', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('54', 'cFanZ99pVON2YFF', 'Aginmezin_VD-17378-12', 'Aginmezin', 'aginmezin', '5mg/ viên', 'Alimemazin tartrat', 'Viên nén bao phim', 'Hộp 10 vỉ x 25 viên', 'TCCS', '24 tháng', 'VD-17378-12', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', 'Khóm Thạnh An, P. Mỹ Thới, TP. Long Xuyên, An Giang', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', '27 Nguyễn Thái Học, P. Mỹ Bình, TP. Long Xuyên, An Giang', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('55', 'NEl6Bf5fYplPCGG', 'Spas- Agi_VD-17379-12', 'Spas- Agi', 'spas- agi', '40mg/ viên', 'Alverin citrat', 'Viên nén', 'Hộp 3 vỉ, 10 vỉ x 10 viên; Chai 50 viên', 'TCCS', '36 tháng', 'VD-17379-12', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', 'Khóm Thạnh An, P. Mỹ Thới, TP. Long Xuyên, An Giang', 'Công ty cổ phần dược phẩm Agimexpharm', 'Việt Nam', '27 Nguyễn Thái Học, P. Mỹ Bình, TP. Long Xuyên, An Giang', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('56', 'HJAMFD96TdmLxXX', 'Amfarex 500_VD-17380-12', 'Amfarex 500', 'amfarex 500', '500 mg', 'Clarithromycin', 'Viên nén bao phim', 'Hộp 1 vỉ x 7 viên. Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17380-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('57', 'TUzP8ZN8eafFeSS', 'Telcardis 20_VD-17381-12', 'Telcardis 20', 'telcardis 20', '20 mg', 'Telmisartan', 'viên nén', 'Hộp 1 vỉ, 3 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17381-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('58', 'wfyQvS3131oiDKK', 'Telcardis 40_VD-17382-12', 'Telcardis 40', 'telcardis 40', '40 mg', 'Telmisartan', 'viên nén', 'Hộp 1 vỉ, 3 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17382-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', null, null, '2017-06-08 10:46:09', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('59', 'yHojEUHtiYzDQgg', 'Telcardis 80_VD-17383-12', 'Telcardis 80', 'telcardis 80', '80 mg', 'Telmisartan', 'Bột pha tiêm', 'Hộp 1 vỉ, 3 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17383-12', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', 'Công ty cổ phần dược phẩm Ampharco U.S.A', 'Việt Nam', 'KCN Nhơn Trạch 3, huyện Nhơn Trạch, tỉnh Đồng Nai', '', null, '2017-06-08 10:46:09', '1', '1', 'Hộp', 'vỉ', '10', null, '2017-08-07 04:21:30');
INSERT INTO `drugs` VALUES ('60', 'n1hdtBetCVYr6RR', 'Abicin 250_VD-17384-12', 'Abicin 250', 'abicin 250', 'Amikacin 250mg', 'Amikacin sulfat', 'Thuốc tiêm bột đông khô', 'Hộp 1 lọ + 1 ống dung môi 2ml; Hộp 10 lọ + 10 ống dung môi 2ml', 'DĐTQ2005', '36 tháng', 'VD-17384-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', '', null, '2017-06-08 10:46:09', '1', '1', 'Hộp', 'vỉ', '20', null, '2017-08-07 04:22:44');
INSERT INTO `drugs` VALUES ('61', 'xOzgDw6h7IQw0MM', 'Ace kid 80_VD-17385-12', 'Ace kid 80', 'ace kid 80', '80mg', 'Paracetamol', 'thuốc bột sủi bọt', 'Hộp 12 gói x 1,5g', 'TCCS', '36 tháng', 'VD-17385-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('62', 'ObTkUVi8pcjzCvv', 'Atropin 1%_VD-17386-12', 'Atropin 1%', 'atropin 1%', '100mg', 'Atropin sulfat', 'Thuốc nhỏ mắt', 'Hộp 1 lọ x 10ml', 'BP 2007', '36 tháng', 'VD-17386-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('63', 'oE2qbFobfC1xF99', 'Bidivit AD_VD-17387-12', 'Bidivit AD', 'bidivit ad', '5000 IU; 400IU', 'Vitamin A palmitat; Vitamin D2', 'Viên nang mềm', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17387-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('64', 'mXXTsiqvT4KdkNN', 'Natri bicarbonat 500mg_VD-17388-12', 'Natri bicarbonat 500mg', 'natri bicarbonat 500mg', '500mg', 'Natri hydrocarbonat', 'Viên nén', 'Lọ 160 viên', 'TCCS', '36 tháng', 'VD-17388-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('65', 'RYIbys0fpk1cIaa', 'Neutrivit_VD-17389-12', 'Neutrivit', 'neutrivit', '15mg; 10mg; 20mcg', 'Vitamin B1; Vitamin B6, Vitamin B12', 'Viên nén bao đường', 'Hộp 50 vỉ x 30 viên', 'TCCS', '24 tháng', 'VD-17389-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('66', 'LNx3dg4HPvnuaMM', 'Nystatin 500.000 IU_VD-17390-12', 'Nystatin 500.000 IU', 'nystatin 500.000 iu', '500.000IU', 'Nystatin', 'Viên nén bao đường', 'Hộp 2 vỉ x 8 viên; hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17390-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('67', 'KbGWtKGXQi7ON44', 'Soluplex_VD-17391-12', 'Soluplex', 'soluplex', 'Vitamin A palmitat; Vitamin D2, B1, B2, C, B6, PP', 'Vitamin A palmitat; Vitamin D2, B1, B2, C , B6, PP', 'Dung dịch uống', 'Hộp 1 lọ x 15ml', 'TCCS', '24 tháng', 'VD-17391-12', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', 'Công ty cổ phần dược phẩm Bidiphar 1', 'Việt Nam', '498 Nguyễn Thái Học, Tp. Qui Nhơn, Tỉnh Bình Định', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('68', 'ZXseCkKw4hCm6tt', 'Bostanex_VD-17392-12', 'Bostanex', 'bostanex', '5mg', 'Desloratadin', 'Viên nén bao phim', 'Hộp 1 vỉ x 10 viên; hộp 3 vỉ x 10 viên; hộp 5 vỉ x 10 viên; hộp 10 vỉ x 10 viên; hộp 1 chai 100 viên; hộp 1 chai 200 viên; hộp 1 chai 500 viên', 'TCCS', '36 tháng', 'VD-17392-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('69', 'X0VTp21Crd9t233', 'Dextroboston 15_VD-17393-12', 'Dextroboston 15', 'dextroboston 15', '15mg', 'Dextromethorphan HBr', 'Viên nén', 'Hộp 10 vỉ x 10 viên; hộp 1 chai 100 viên; hộp 1 chai 200 viên; hộp 1 chai 500 viên', 'TCCS', '36 tháng', 'VD-17393-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('70', 'AKHpSjqhdB0lvaa', 'Otibone_VD-17395-12', 'Otibone', 'otibone', '167mg; 500mg', 'Methyl sulfonyl methan; Glucosamin HCl', 'Viên nén bao phim', 'Hộp 3 vỉ x 10viên; Hộp 6 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17395-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('71', 'hYlWT7jtSKL7ZII', 'Otibone Plus_VD-17396-12', 'Otibone Plus', 'otibone plus', '400mg; 500mg; 167mg', 'Natri chondroitin sulfat; Glucosamin HCl; Methyl sulfonyl methan', 'Viên nén bao phim', 'Hộp 3 vỉ (AL/PVC), 6vỉ (AL/PVC) x 10 viên; Hộp 3 vỉ (AL/AL), 6 vỉ (AL/AL) x 10 viên', 'TCCS', '36 tháng', 'VD-17396-12', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', 'Công ty Cổ phần Dược phẩm Bos Ton Việt Nam', 'Việt Nam', 'Số 43, Đường số 8, KCN Việt Nam - Singapore, Thuận An, Bình Dương, Việt Nam', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('72', 'xfWylaPBi5PMoo', 'Cadiflex 250_VD-17397-12', 'Cadiflex 250', 'cadiflex 250', '397,79 mg', 'D-Glucosamin sulfat 2NaCl (tương đương 250 mg glucosamin)', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17397-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('73', 'ecp3zrMS4PyjGKK', 'Decirid 81 mg_VD-17398-12', 'Decirid 81 mg', 'decirid 81 mg', '81 mg', 'Acid acetyl salicylic', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên, chai 100 viên', 'TCCS', '36 tháng', 'VD-17398-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('74', 'ZyCGOllLzLVMCzz', 'Giadrox 500_VD-17399-12', 'Giadrox 500', 'giadrox 500', '500 mg', 'Cefadroxil (dưới dạng cefadroxil monohydrat)', 'Viên nang cứng', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17399-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('75', 'KwPiSehn899055', 'Nccep_VD-17400-12', 'Nccep', 'nccep', '200 mg', 'Cefpodoxime (dưới dạng Cefpodoxime proxetil)', 'viên nén dài bao phim', 'Hộp 1 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17400-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('76', '8czUQYmySHSRCXX', 'Spiramycin 3.0_VD-17402-12', 'Spiramycin 3.0', 'spiramycin 3.0', '3.0 MIU', 'spiramycine', 'Viên nén bao phim', 'Hộp 2 vỉ x 5 viên', 'TCCS', '36 tháng', 'VD-17402-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('77', 'sRFr9Xtyf8961gg', 'Tendipoxim 100_VD-17403-12', 'Tendipoxim 100', 'tendipoxim 100', '100 mg', 'Cefpodoxime (dưới dạng Cefpodoxime proxetil)', 'Viên nén bao phim', 'Hộp 2 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17403-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('78', 'PTbjXaPZI9bq3GG', 'Vitamin C_VD-17404-12', 'Vitamin C', 'vitamin c', '500 mg', 'Vitamin C (acid ascorbic)', 'Viên nén bao phim', 'Hộp 20 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17404-12', 'Công ty TNHH US pharma USA', 'Việt Nam', 'Lô B1-10, Đường D2, KCN Tây Bắc Củ Chi, Tp HCM', 'Công ty cổ phần Dược phẩm Cần Giờ', 'Việt Nam', '186-188 Lê Thánh Tôn, P. Bến Thành, Q1, Tp HCM', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('79', 'AhjhxRic9mDV2FF', 'Acenac 100_VD-17405-12', 'Acenac 100', 'acenac 100', '100 mg', 'Aceclofenac', 'Viên nén bao phim', 'Hộp 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17405-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('80', '3S2KHmNYFzIpaTT', 'Farica 400_VD-17406-12', 'Farica 400', 'farica 400', '400 mg', 'Albendazol', 'viên nén dài bao phim', 'Hộp 1 vỉ x 1 viên', 'TCCS', '36 tháng', 'VD-17406-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('81', 'EsHo08yIOU6ZPOO', 'Fenocor 100_VD-17407-12', 'Fenocor 100', 'fenocor 100', '100 mg', 'Fenofibrat', 'Viên nang cứng (trắng-trắng)', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17407-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('82', 'vPlGHp9fw8c7Sff', 'Glipizid 5mg_VD-17408-12', 'Glipizid 5mg', 'glipizid 5mg', '5 mg', 'Glipizid', 'viên nén', 'Hộp 01 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17408-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('83', 'MVWvJr6R0W6Wsqq', 'Meloxicam 7,5mg_VD-17409-12', 'Meloxicam 7,5mg', 'meloxicam 7,5mg', '7,5 mg', 'Meloxicam 7,5 mg', 'Viên nén bao phim', 'Hộp 3 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17409-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('84', 'zly5R842M5jLs00', 'Metoclopramid 10mg_VD-17410-12', 'Metoclopramid 10mg', 'metoclopramid 10mg', '10 mg', 'Metoclopramid hydroclorid', 'viên nén', 'Hộp 2 vỉ x 20 viên', 'TCCS', '36 tháng', 'VD-17410-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('85', 'KBFFLtQPMWki555', 'Paracetamol 500 caplet_VD-17411-12', 'Paracetamol 500 caplet', 'paracetamol 500 caplet', '500 mg', 'Paracetamol', 'viên nén dài', 'Hộp 10 vỉ, 50 vỉ x 10 viên. Chai 500 viên', 'TCCS', '36 tháng', 'VD-17411-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('86', '7GP4Yn9J8TipeLL', 'Roxithromycin 150_VD-17412-12', 'Roxithromycin 150', 'roxithromycin 150', '150 mg', 'Roxithromycin', 'Viên nén bao phim', 'Hộp 01 vỉ, 10 vỉ x 10 viên', 'TCCS', '36 tháng', 'VD-17412-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('87', 'pwvkDWUv8jkcBgg', 'Roxithromycin 50_VD-17413-12', 'Roxithromycin 50', 'roxithromycin 50', '50 mg', 'Roxithromycin', 'Thuốc bột uống', 'Hộp 30 gói x 3g', 'TCCS', '36 tháng', 'VD-17413-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('88', '0XYOsD49bSqcPOO', 'Vitamin C 1000 mg_VD-17414-12', 'Vitamin C 1000 mg', 'vitamin c 1000 mg', '1000 mg', 'Acid ascorbic', 'Bột pha tiêm', 'Hộp 1 tuýp 10 viên', 'TCCS', '24 tháng', 'VD-17414-12', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', 'Công ty cổ phần dược phẩm Cửu Long', 'Việt Nam', '150 đường 14 tháng 9, TP. Vĩnh Long, tỉnh Vĩnh Long', '', null, '2017-06-08 10:46:10', '0', '1', 'Hộp', 'vỉ', '10', null, '2017-08-07 04:22:10');
INSERT INTO `drugs` VALUES ('89', 'ynbFtHyQltNecSS', 'Bamandol 1 g_VD-17415-12', 'Bamandol 1 g', 'bamandol 1 g', 'Cefotiam 1g', 'Cefotiam hydroclorid', 'Bột pha tiêm', 'hộp 1 lọ', 'JP 15', '36 tháng', 'VD-17415-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('90', 'm2ZWc8DoE9HzWvv', 'Cefepime 1 g_VD-17416-12', 'Cefepime 1 g', 'cefepime 1 g', 'Cefepime 1g', 'Cefepime hydroclorid', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17416-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('91', 'uuBCXa9cRHosqrr', 'Ceftezol 1g_VD-17417-12', 'Ceftezol 1g', 'ceftezol 1g', 'Ceftezol 1g', 'Ceftezol natri', 'Bột pha tiêm', 'hộp 1 lọ', 'TCCS', '36 tháng', 'VD-17417-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', '', null, '2017-06-08 10:46:10', '1', '1', 'Hộp', '10', '10', null, '2017-08-07 02:07:35');
INSERT INTO `drugs` VALUES ('92', 'xcjBNIv5n3QKXVV', 'Cefuroxim 250mg_VD-17418-12', 'Cefuroxim 250mg', 'cefuroxim 250mg', 'Cefuroxim 250mg', 'Cefuroxim axetil', 'Viên nén bao phim', 'Hộp 1 vỉ, 2 vỉ x 10 viên', 'USP 32', '36 tháng', 'VD-17418-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('93', '0EDmyakZ9TQ46ww', 'Dio-Imicil_VD-17419-12', 'Dio-Imicil', 'dio-imicil', 'Imipenem 500mg, Cilastatin 500mg', 'Imipenem monohydrat, Cilastatin natri và natri bicarbonat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17419-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('94', 'sGrC9ZD1ohC1LOO', 'Entinam_VD-17420-12', 'Entinam', 'entinam', 'Imipenam 500mg, Cilastatin 500mg', 'Imipenem monohydrat, Cilastatin natri và natri bicarbonat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17420-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('95', 'YFC6eRM9817EVVV', 'Erovan 2 g_VD-17421-12', 'Erovan 2 g', 'erovan 2 g', 'Ceftazidim 2g', 'Ceftazidim pentahydrat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17421-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('96', 'J4zzDUNdCfYGkKK', 'Farmiz 1 g_VD-17422-12', 'Farmiz 1 g', 'farmiz 1 g', 'Cefamandol 1g', 'Cefamandol nafat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17422-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('97', 'sKmgwrymtV8V8oo', 'Gilidam 1g_VD-17423-12', 'Gilidam 1g', 'gilidam 1g', 'Cefotiam 1g', 'Cefotiam hydroclorid', 'Bột pha tiêm', 'hộp 1 lọ', 'JP 15', '36 tháng', 'VD-17423-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('98', '82nlxPlkvOcgvUU', 'Tenebis 1g_VD-17424-12', 'Tenebis 1g', 'tenebis 1g', 'Cefoperazol 500mg, Sulbactam 500mg', 'Cefoperazone natri và Sulbactam natri', 'Bột pha tiêm', 'hộp 1 lọ', 'TCCS', '36 tháng', 'VD-17424-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('99', 'D4IpLL3108nDYhh', 'Tenebis 2g_VD-17425-12', 'Tenebis 2g', 'tenebis 2g', 'Cefoperazol 1g, Sulbactam 1g', 'Cefoperazone natri và Sulbactam natri', 'Bột pha tiêm', 'hộp 1 lọ', 'TCCS', '36 tháng', 'VD-17425-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('100', 'Q94EwRQdjCj2L88', 'Trizidim 1g_VD-17426-12', 'Trizidim 1g', 'trizidim 1g', 'Ceftazidim 1g', 'Ceftazidim pentahydrat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17426-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('101', 'uif1faCHo1RK6jj', 'Trizidim 2 g_VD-17427-12', 'Trizidim 2 g', 'trizidim 2 g', 'Ceftazidim 2g', 'Ceftazidim pentahydrat', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17427-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);
INSERT INTO `drugs` VALUES ('102', 'Dl4qG1ytyqjvcII', 'Zasinat 1,5g_VD-17428-12', 'Zasinat 1,5g', 'zasinat 1,5g', 'Cefuroxim 1,5g', 'Cefuroxim natri', 'Bột pha tiêm', 'hộp 1 lọ', 'USP 30', '36 tháng', 'VD-17428-12', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', 'Công ty cổ phần Dược phẩm Euvipharm', 'Việt Nam', 'ấp Bình Tiền 2, xã Đức Hoà hạ, Đức Hoà, Long An', null, null, '2017-06-08 10:46:10', '1', null, '', '', '', null, null);

-- ----------------------------
-- Table structure for drug_image
-- ----------------------------
DROP TABLE IF EXISTS `drug_image`;
CREATE TABLE `drug_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of drug_image
-- ----------------------------
INSERT INTO `drug_image` VALUES ('5', '113', '1501403857_blog1.jpg', '2017-07-30 08:37:37', '2017-07-30 08:37:37');
INSERT INTO `drug_image` VALUES ('6', '113', '1501403857_img1.jpg', '2017-07-30 08:37:37', '2017-07-30 08:37:37');
INSERT INTO `drug_image` VALUES ('7', '113', '1501403857_img4.jpg', '2017-07-30 08:37:37', '2017-07-30 08:37:37');
INSERT INTO `drug_image` VALUES ('8', '114', '1501404131_img5.jpg', '2017-07-30 08:42:11', '2017-07-30 08:42:11');
INSERT INTO `drug_image` VALUES ('13', '3', '1502071605_product.png', '2017-08-07 02:06:45', '2017-08-07 02:06:45');
INSERT INTO `drug_image` VALUES ('14', '3', '1502071605_product.png', '2017-08-07 02:06:45', '2017-08-07 02:06:45');
INSERT INTO `drug_image` VALUES ('15', '3', '1502071605_product.png', '2017-08-07 02:06:45', '2017-08-07 02:06:45');
INSERT INTO `drug_image` VALUES ('16', '91', '1502071655_product.png', '2017-08-07 02:07:35', '2017-08-07 02:07:35');
INSERT INTO `drug_image` VALUES ('17', '91', '1502071656_product.png', '2017-08-07 02:07:36', '2017-08-07 02:07:36');
INSERT INTO `drug_image` VALUES ('18', '91', '1502071656_product.png', '2017-08-07 02:07:36', '2017-08-07 02:07:36');
INSERT INTO `drug_image` VALUES ('19', '59', '1502079690_pr2.png', '2017-08-07 04:21:30', '2017-08-07 04:21:30');
INSERT INTO `drug_image` VALUES ('20', '88', '1502079730_pr4.png', '2017-08-07 04:22:10', '2017-08-07 04:22:10');
INSERT INTO `drug_image` VALUES ('21', '60', '1502079764_pr5.png', '2017-08-07 04:22:44', '2017-08-07 04:22:44');
INSERT INTO `drug_image` VALUES ('22', '60', '1502079764_pr1.png', '2017-08-07 04:22:44', '2017-08-07 04:22:44');

-- ----------------------------
-- Table structure for group_drugs
-- ----------------------------
DROP TABLE IF EXISTS `group_drugs`;
CREATE TABLE `group_drugs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_drugs_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of group_drugs
-- ----------------------------
INSERT INTO `group_drugs` VALUES ('1', '2017-07-29 15:21:37', '2017-08-09 01:00:34', 'NT01', 'D.Phẩm', 'Dược phẩm', 'Nhóm thuốc dược phẩm', '1');
INSERT INTO `group_drugs` VALUES ('3', '2017-07-29 15:39:16', '2017-07-29 15:39:16', 'NT02', 'TPCN', 'Thực phẩm chức năng', 'Nhóm thuốc thực phẩm chức năng', '1');
INSERT INTO `group_drugs` VALUES ('4', '2017-07-29 15:39:53', '2017-08-01 09:45:13', 'NT04', 'M.Phẩm', 'Mỹ phẩm', 'Nhóm thuốc mỹ phẩm', '0');
INSERT INTO `group_drugs` VALUES ('5', '2017-07-29 15:40:29', '2017-07-29 15:40:29', 'NT05', 'T.Bổ', 'Thuốc bổ', 'Nhóm thuốc bổ', '0');
INSERT INTO `group_drugs` VALUES ('6', '2017-07-29 15:40:51', '2017-08-09 01:00:35', 'NT06', 'K.Sinh', 'Khánh sinh', 'Nhóm thuốc kháng sinh', '1');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_21_105844_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_21_110325_create_foreign_keys', '1');
INSERT INTO `migrations` VALUES ('2014_10_24_205441_create_contact_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_26_172107_create_posts_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_26_172631_create_tags_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_26_172904_create_post_tag_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_26_222018_create_comments_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_28_074306_create_group_drugs_table', '2');
INSERT INTO `migrations` VALUES ('2017_07_30_100016_create_group_minds_table', '3');
INSERT INTO `migrations` VALUES ('2017_07_31_033305_create_mind_drug_table', '4');
INSERT INTO `migrations` VALUES ('2017_08_09_041040_create_transactions_table', '5');
INSERT INTO `migrations` VALUES ('2017_08_09_041051_create_transaction_drug_table', '6');
INSERT INTO `migrations` VALUES ('2017_08_09_041057_create_transaction_send_table', '6');
INSERT INTO `migrations` VALUES ('2017_08_13_042051_create_user_logs_table', '7');

-- ----------------------------
-- Table structure for minds
-- ----------------------------
DROP TABLE IF EXISTS `minds`;
CREATE TABLE `minds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount_cg1` decimal(8,2) NOT NULL,
  `discount_cg2` decimal(8,2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `minds_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of minds
-- ----------------------------
INSERT INTO `minds` VALUES ('2', '2017-07-31 03:57:16', '2017-08-02 01:24:07', 'PH02', 'phiên thứ 2', '500.00', '1000.00', '2017-08-10 10:52:37', '2017-08-26 10:56:37', 'Thông báo phiên 2', '1');
INSERT INTO `minds` VALUES ('3', '2017-08-01 01:55:56', '2017-08-02 01:36:31', 'PH03', 'ten giao dich', '100.00', '200.00', '2017-08-02 08:28:43', '2017-08-26 10:28:43', 'thong bao cua phien', '0');
INSERT INTO `minds` VALUES ('4', '2017-08-01 01:59:34', '2017-08-01 09:17:39', 'PH04', 'Phiên 1 update', '100.00', '500.00', '2017-08-01 08:58:26', '2017-08-25 04:58:26', 'Phiên 1 update - thong bao', '1');
INSERT INTO `minds` VALUES ('6', '2017-08-01 04:42:14', '2017-08-02 01:20:53', 'PH05', '323232', '323232.00', '323232.00', '2017-08-08 11:41:53', '2017-08-03 11:41:53', '111', '0');
INSERT INTO `minds` VALUES ('7', '2017-08-02 01:30:51', '2017-08-02 01:35:04', 'PH07', '34', '43.00', '34.00', '2017-08-02 08:30:27', '2017-08-11 08:30:27', '3333', '1');
INSERT INTO `minds` VALUES ('8', '2017-08-02 01:35:35', '2017-08-02 01:35:35', 'PH08', '3433434', '11.00', '22.00', '2017-08-16 08:35:21', '2017-08-19 08:35:21', '44', '1');
INSERT INTO `minds` VALUES ('9', '2017-08-02 01:36:16', '2017-08-02 01:36:16', 'PH09', '45454', '55454.00', '434.00', '2017-08-02 08:35:49', '2017-08-01 08:35:49', '42', '1');

-- ----------------------------
-- Table structure for mind_drug
-- ----------------------------
DROP TABLE IF EXISTS `mind_drug`;
CREATE TABLE `mind_drug` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mind_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `drug_price` decimal(8,2) NOT NULL,
  `drug_special_price` decimal(8,2) DEFAULT NULL,
  `max_discount_qty` int(11) DEFAULT NULL,
  `max_qty` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mind_drug
-- ----------------------------
INSERT INTO `mind_drug` VALUES ('11', '2017-08-01 09:27:00', '2017-08-01 09:27:00', '2', '46', '700.00', '0.00', '0', '100', 'không khuyến mãi', '1');
INSERT INTO `mind_drug` VALUES ('17', '2017-08-01 09:34:30', '2017-08-01 09:34:30', '6', '91', '1.00', '1.00', '1', '1', '12222', '1');
INSERT INTO `mind_drug` VALUES ('20', '2017-08-02 01:13:36', '2017-08-02 01:13:36', '6', '88', '145.00', '10.00', '0', '0', 'bit2222', '1');
INSERT INTO `mind_drug` VALUES ('22', '2017-08-02 01:14:10', '2017-08-02 01:14:10', '6', '102', '566.00', '344.00', '0', '0', '56', '1');
INSERT INTO `mind_drug` VALUES ('23', '2017-08-02 01:14:10', '2017-08-02 01:14:10', '6', '20', '23.00', '0.00', '0', '0', 'ok', '1');
INSERT INTO `mind_drug` VALUES ('24', '2017-08-02 01:24:07', '2017-08-02 01:24:07', '2', '39', '455.00', '0.00', '0', '0', 'ok', '1');
INSERT INTO `mind_drug` VALUES ('28', '2017-08-02 01:35:04', '2017-08-02 01:35:04', '7', '92', '30.00', '0.00', '0', '0', '', '1');
INSERT INTO `mind_drug` VALUES ('29', '2017-08-02 01:35:42', '2017-08-02 01:35:42', '8', '92', '12.00', '0.00', '0', '0', '', '1');
INSERT INTO `mind_drug` VALUES ('30', '2017-08-02 01:36:16', '2017-08-02 01:36:16', '9', '46', '3443.00', '0.00', '0', '0', '', '1');
INSERT INTO `mind_drug` VALUES ('31', '2017-08-02 01:36:16', '2017-08-02 01:36:16', '9', '92', '125555.00', '23.00', '0', '0', '', '1');
INSERT INTO `mind_drug` VALUES ('32', '2017-08-07 03:58:20', '2017-08-07 03:58:20', '4', '90', '300000.00', '290000.00', '10', '13', 'sản phẩm 01', '1');
INSERT INTO `mind_drug` VALUES ('33', '2017-08-07 03:58:20', '2017-08-07 03:58:20', '4', '59', '500000.00', '0.00', '0', '500', 'sản phẩm 02', '1');
INSERT INTO `mind_drug` VALUES ('34', '2017-08-07 03:58:20', '2017-08-07 03:58:20', '4', '88', '100000.00', '90000.00', '20', '300', '', '1');
INSERT INTO `mind_drug` VALUES ('35', '2017-08-07 03:58:20', '2017-08-07 03:58:20', '4', '60', '89000.00', '0.00', '0', '1000', '', '1');
INSERT INTO `mind_drug` VALUES ('36', '2017-08-07 03:58:20', '2017-08-07 03:58:20', '4', '91', '60000.00', '0.00', '0', '0', '', '1');
INSERT INTO `mind_drug` VALUES ('37', '2017-08-07 03:58:20', '2017-08-07 03:58:20', '4', '33', '20000.00', '18000.00', '30', '3000', '', '1');
INSERT INTO `mind_drug` VALUES ('38', '2017-08-09 01:03:01', '2017-08-09 01:03:01', '10', '57', '10.00', '0.00', '0', '0', '', '1');
INSERT INTO `mind_drug` VALUES ('39', '2017-08-09 01:03:19', '2017-08-09 01:03:19', '10', '72', '100.00', '0.00', '0', '0', '', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pharmacies
-- ----------------------------
DROP TABLE IF EXISTS `pharmacies`;
CREATE TABLE `pharmacies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `estimatedCount` int(10) unsigned NOT NULL DEFAULT '0',
  `estimatedAccepted` int(10) unsigned NOT NULL DEFAULT '0',
  `estimatedDenied` int(10) unsigned NOT NULL DEFAULT '0',
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `balanceTotal` bigint(20) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `license` varchar(200) NOT NULL,
  `phamercist` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `ownerPhone` varchar(100) NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `province` varchar(200) DEFAULT NULL,
  `pushNotify` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deletedAt` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacieType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `code` (`code`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pharmacies
-- ----------------------------
INSERT INTO `pharmacies` VALUES ('1', 'N1xI468BZvTNSpB', 'PH00001', 'Nhà thuốc 1.', '', '32 Voi Phục, Ngọc Khánh, Ba Đình, Hà Nội, Vietnam', 'Cẩm Giàng', '841234567890', null, 'bcrypt:$2y$10$7SbKuVYLzgCTFo1EpF1oT.i6G3Bt68mjCDv5VBranKmhR/y63A1A2', '18', '8', '10', '125000', '125000', '1', '01234567890', 'Độ Dương', 'Độ Dương', '01234567890', '21.028911123993606', '105.80486297607422', 'doduong126@gmail.com', 'Hải Dương', '1', '2017-07-05 13:36:20', '2017-07-08 15:47:50', '0', null, null, '2017-08-04 03:09:26', 'Nhà thuốc lẻ');
INSERT INTO `pharmacies` VALUES ('2', 'LC4ZxHXBjnyCTa2', 'PH00002', 'Nhà Thuốc 2', '', '3-9 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam', 'Đống Đa', '841234567891', null, 'bcrypt:$2y$10$Q2cTzpVRihmoKKNDkITFNuU2btuYZatzhHGs9xvUjut7FGZRf64Ia', '3', '1', '2', '0', '0', '0', '01234567891', 'Độ Dương', 'Độ Dương', '01234567891', '', '', 'doduong126@gmail.com', 'Hà Nội', '1', '2017-07-05 13:38:36', '2017-07-06 19:35:58', '0', null, null, '2017-08-03 01:30:09', null);
INSERT INTO `pharmacies` VALUES ('3', 'mD9mZiux9M7bR2S', 'PH00003', 'Cửa hàng thuốc Độ Dương', '', 'Ngõ 64 Đỗ Đức Dục, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', 'Nguyên Bình', '84966545016', null, 'bcrypt:$2y$10$lq0rW/HSj268LKS3oIuivu0uV/GLa0i55NaO1jz4JtlO4Td4kwn.K', '24', '8', '9', '2505000', '2720000', '1', '096654501', 'Độ Dương 2', 'Độ Dương', '0966545016', '21.007919694523345', '105.77919960021973', 'doduong126@gmail.com', 'Cao Bằng', '1', '2017-07-05 13:40:21', '2017-07-11 11:18:04', '0', null, null, '2017-08-04 03:09:15', 'Nhà thuốc lẻ');
INSERT INTO `pharmacies` VALUES ('4', '6utqYO38CHMuwuc', 'PH00004', 'NT Hồng Hoa', '', '1 ngõ 259 phố Vọng', 'Ba Đình', '84915669610', null, 'bcrypt:$2y$10$W0FrX9H/UYx2tlPICFkt8u5NjkcBORxbbZ9xiI3VmLoTuEwYE.5g6', '1', '0', '1', '0', '0', '1', 'HN001', 'Hồng Hoa', 'Hồng Hoa', '0915669610', '20.9948785', '105.84352260000003', 'hhoa2210@gmail.com', 'Hà Nội', '1', '2017-07-05 13:45:02', '2017-07-07 15:11:39', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('5', 'x3d3NQhsdlqsaW4', 'PH00005', 'NT Hồng Hoa 2', '', '4 Liễu Giai, Cống Vị, Ba Đình, Hà Nội, Vietnam', 'Ba Đình', '841253847087', 'http://54.244.58.180:10001/uploads/images/2017/07/595f417c64ecc_d1f8d733a9c6478e38fe6b2d5bf166efcbe37df9.jpg', 'bcrypt:$2y$10$jZCmahvv0gEkalsorqCX4./2v3x4gmYh8jfKgO4RB1ozGcCcYFi0y', '4', '2', '0', '0', '0', '0', 'HN002', 'Hồng Hoa', 'Hồng Hoa', '0915669610', '21.0345393', '105.81409529999996', 'hongntb@gli.vn', 'Hà Nội', '1', '2017-07-05 14:12:40', '2017-07-08 10:48:15', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('6', 'Qrjc4NuJlSJkDQM', 'PH00006', 'Nhà thuốc Khánh', '', 'Dương Đình Nghệ, Yên Hoà, Cầu Giấy, Hà Nội, Vietnam', 'Tây Hồ', '841234567893', null, 'bcrypt:$2y$10$5.6Yk5caypWrHVzONkEAl.cgtzPQmBjTdhT67/YYFmD.Sjw.DuMZq', '0', '0', '0', '0', '0', '1', '01234567893', 'Khánh PD', 'Khánh PD', '01234567893', '21.02138018769172', '105.78529357910156', 'doduong126@gmail.com', 'Hà Nội', '1', '2017-07-05 14:26:32', '2017-07-06 19:35:58', '0', null, null, '2017-08-03 01:29:59', null);
INSERT INTO `pharmacies` VALUES ('7', 'aC9JQ07uamOFZha', 'PH00007', 'Nhà thuốc Quốc Khánh', '', '28 Duy Tân, Dịch Vọng Hậu, Cầu Giấy, Hà Nội, Vietnam', 'Từ Liêm', '841234567894', null, 'bcrypt:$2y$10$HpKAwNUi8jfBT1kW1OsUqOjy31mXgq1AyA6UfnuVrNUe/2NbFXV9m', '6', '4', '2', '20020000', '20030000', '0', '01234567894', 'Quốc Khánh', 'Quốc Khánh', '01234567894', '21.030713685286866', '105.78520774841309', 'doduong126@gmail.com', 'Hà Nội', '1', '2017-07-05 14:38:32', '2017-07-06 19:35:58', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('8', 'r8CxQdmkjYZWdjo', 'PH00008', 'Nhà Thuốc Huy Quang', '', '705 Đê la Thành, Thành Công, Ba Đình, Hà Nội, Vietnam', 'Từ Liêm', '841235841993', null, 'bcrypt:$2y$10$qWHJTbKaF.ySRxXBjKp15OHPkOTlTIEdHptD1LVkzy2qqOciEUn6e', '24', '12', '12', '670000', '675000', '0', '841235841993', 'Quang', 'Quang', '01235841993', '21.024304479419293', '105.8131456375122', 'doduong126@gmail.com', 'Hà Nội', '1', '2017-07-05 18:35:10', '2017-07-11 12:28:51', '0', null, null, '2017-08-04 02:22:37', 'Nhà thuốc lẻ');
INSERT INTO `pharmacies` VALUES ('9', 'LHrmuNuctPMsigJ', 'PH00009', 'Nhà thuốc Xuân Mạnh', '', 'Ngõ 20 - Huỳnh Thúc Kháng, Láng Hạ, Đống Đa, Hà Nội, Vietnam', 'Từ Liêm', '84978604566', null, 'bcrypt:$2y$10$B6cCKV3vqOCb0pyMx8VuTe97x9Du/xt0DvLbNMoArMSCPxymWiBNy', '0', '0', '0', '0', '0', '0', '0978604566', 'Xuân Mạnh', 'Xuân Mạnh', '0978604566', '21.02033864527858', '105.80924034118652', 'doduong126@gmail.com', 'Hà Nội', '1', '2017-07-05 18:36:38', '2017-07-06 19:35:59', '0', null, null, '2017-08-04 04:46:42', null);
INSERT INTO `pharmacies` VALUES ('11', 'LHrmuzuctPMsigJ', 'PH00010', 'Illiana Tran', '', 'Hồ Tây, Tây Hồ, Hà Nội, Việt Nam', '', '841667208673', null, 'raw:quantm', '7', '3', '1', '0', '0', '1', 'Molestias voluptatum sit quis qui perferendis ipsa at ullam animi minus cumque tempora Nam', 'Qui delectus quaerat quos velit ex officia dolor in omnis sint perspiciatis at', 'Odio eiusmod non aut cum inventore quos doloribus', '01667208673', '21.053238', '105.82609430000002', 'xovodu@gmail.com', 'Hà Nội', '1', null, '2017-07-10 11:47:21', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('12', 'NSURSH2MwZ9PurU', 'PH00012', 'ewewewe', '', '79 Hào Nam, Ô Chợ Dừa, Đống Đa, Hà Nội, Việt Nam', 'Đống Đa', '8412222233333', null, 'bcrypt:$2y$10$R5JSod0/HHVWIvDwuQfZpOa29d62O466TEFXr6kfVXyvHnLIaOxfC', '0', '0', '0', '0', '0', '1', 'sdsdd', 'ssdsd', 'sdsd sdsdsdsd', '01235684545', '21.0246563', '105.8250221', 'eweeewewe@gmail.com', 'Hà Nội', '1', '2017-07-05 22:12:35', '2017-07-06 19:35:59', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('13', 'AJYYaI8NU5XUaj8', 'PH00013', 'Nhà Thuốc Tâm Đức', '', 'Đỗ Nhuận, phường Xuân Đỉnh, Từ Liêm, Hà Nội, Việt Nam', 'Từ Liêm', '84123456001', 'http://54.244.58.180:10001/uploads/images/2017/07/595db62e59f3b_b5703ac068802fd4c4ca6b8e87b4fc9f76c0c3ba.png', 'bcrypt:$2y$10$fMRGgRklhVlUg85TjnVmyuLpCuLy6porKGTGCCwzQdlV/YFrcmiMa', '0', '0', '0', '1000000', '1000000', '1', 'license', 'Giang', 'Nam', '0123456001', '21.06868257294006', '105.78555107116699', 'adb@gmail.com', 'Hà Nội', '1', '2017-07-06 11:01:53', '2017-07-06 19:35:59', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('14', 'RnHvb8x2670qvN6', 'PH00014', 'Nhà thuốc TP HCM1', '', '353C Âu Cơ, phường 10, Tân Bình, Hồ Chí Minh, Vietnam', 'Tân Bình', '841234567895', null, 'bcrypt:$2y$10$ZY9y38bVNzNhgalXbXMF9.WUGZeBf4MUvtjDkMCJ042Crj26agnVW', '0', '0', '0', '0', '0', '1', '01234567895', 'HCM', 'HCM', '01234567895', '10.781709316395313', '106.64471626281738', 'doduong126@gmail.com', 'Hồ Chí Minh', '1', '2017-07-06 16:25:57', '2017-07-06 19:35:59', '0', null, null, null, null);
INSERT INTO `pharmacies` VALUES ('15', '7cV8v3kWfSDhGuq', 'PH00015', 'Nhà Thuốc Tháng 7', '', 'K2, Mễ Trì, Từ Liêm, Hà Nội, Vietnam', 'Đống Đa', '841234567896', null, 'bcrypt:$2y$10$wc0a9hC04mI3Gr3Cb9JS/usF5LSz8xiR6QcUl5OXm.siD7Jt9kNA.', '0', '0', '0', '0', '0', '1', '01234567896', 'Độ Dương', 'Độ Dương', '01234567896', '21.010163194408364', '105.76400756835938', 'doduong126@gmail.com', 'Hà Nội', '1', '2017-07-06 18:33:22', '2017-07-24 20:56:26', '0', null, null, null, null);

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `sort` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('1', 'Hà Nội', 'Thành Phố', '10', '1');
INSERT INTO `provinces` VALUES ('2', 'Hà Giang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('4', 'Cao Bằng', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('6', 'Bắc Kạn', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('8', 'Tuyên Quang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('10', 'Lào Cai', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('11', 'Điện Biên', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('12', 'Lai Châu', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('14', 'Sơn La', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('15', 'Yên Bái', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('17', 'Hòa Bình', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('19', 'Thái Nguyên', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('20', 'Lạng Sơn', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('22', 'Quảng Ninh', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('24', 'Bắc Giang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('25', 'Phú Thọ', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('26', 'Vĩnh Phúc', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('27', 'Bắc Ninh', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('30', 'Hải Dương', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('31', 'Hải Phòng', 'Thành Phố', '7', '0');
INSERT INTO `provinces` VALUES ('33', 'Hưng Yên', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('34', 'Thái Bình', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('35', 'Hà Nam', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('36', 'Nam Định', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('37', 'Ninh Bình', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('38', 'Thanh Hóa', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('40', 'Nghệ An', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('42', 'Hà Tĩnh', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('44', 'Quảng Bình', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('45', 'Quảng Trị', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('46', 'Thừa Thiên Huế', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('48', 'Đà Nẵng', 'Thành Phố', '8', '0');
INSERT INTO `provinces` VALUES ('49', 'Quảng Nam', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('51', 'Quảng Ngãi', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('52', 'Bình Định', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('54', 'Phú Yên', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('56', 'Khánh Hòa', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('58', 'Ninh Thuận', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('60', 'Bình Thuận', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('62', 'Kon Tum', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('64', 'Gia Lai', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('66', 'Đắk Lắk', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('67', 'Đắk Nông', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('68', 'Lâm Đồng', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('70', 'Bình Phước', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('72', 'Tây Ninh', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('74', 'Bình Dương', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('75', 'Đồng Nai', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('77', 'Bà Rịa - Vũng Tàu', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('79', 'Hồ Chí Minh', 'Thành Phố', '9', '0');
INSERT INTO `provinces` VALUES ('80', 'Long An', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('82', 'Tiền Giang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('83', 'Bến Tre', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('84', 'Trà Vinh', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('86', 'Vĩnh Long', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('87', 'Đồng Tháp', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('89', 'An Giang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('91', 'Kiên Giang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('92', 'Cần Thơ', 'Thành Phố', '6', '0');
INSERT INTO `provinces` VALUES ('93', 'Hậu Giang', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('94', 'Sóc Trăng', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('95', 'Bạc Liêu', 'Tỉnh', '0', '0');
INSERT INTO `provinces` VALUES ('96', 'Cà Mau', 'Tỉnh', '0', '0');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator', 'admin', '2017-07-28 04:46:26', '2017-07-28 04:46:26');
INSERT INTO `roles` VALUES ('2', 'Redactor', 'redac', '2017-07-28 04:46:26', '2017-07-28 04:46:26');
INSERT INTO `roles` VALUES ('3', 'User', 'user', '2017-07-28 04:46:26', '2017-07-28 04:46:26');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `countQty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES ('6', '2017-08-12 09:55:49', '2017-08-12 09:55:49', '4', '2', '2017-08-12 09:55:49', '84966545017', '165 Thái Hà, Hanoi', 'Vận chuyển tới khách hàng', null, 'Đợi giao hàng', '3688000.00', '40000.00', '55000.00', '3688000.00', '3688000.00', '3693000.00', 'do duong 1', '20000.00', null);
INSERT INTO `transactions` VALUES ('7', '2017-08-12 14:42:34', '2017-08-12 14:42:34', '4', '2', '2017-08-12 14:42:34', '84966545017', '165 Thái Hà, Hanoi', 'Vận chuyển tới khách hàng', null, 'Đợi giao hàng', '3745000.00', '40000.00', '55000.00', '3745000.00', '3745000.00', '3750000.00', 'do duong', '20000.00', null);
INSERT INTO `transactions` VALUES ('8', '2017-08-12 16:04:01', '2017-08-13 09:24:28', '4', '2', '2017-08-12 16:04:01', '0914390567', '122 yen hoac', 'Vận chuyển tới khách hàng', null, 'Hủy', '2267000.00', '40000.00', '55000.00', '2267000.00', '2267000.00', '2272000.00', 'le toan', '20000.00', null);
INSERT INTO `transactions` VALUES ('9', '2017-08-12 16:07:04', '2017-08-13 09:24:28', '4', '2', '2017-08-12 16:07:04', '0914390567', '165 Thái Hà, Hanoi', 'Vận chuyển tới khách hàng', null, 'Hủy', '1013000.00', '40000.00', '55000.00', '1013000.00', '1013000.00', '1018000.00', 'do duong', '20000.00', null);
INSERT INTO `transactions` VALUES ('10', '2017-08-13 03:39:03', '2017-08-13 09:16:38', '4', '22', '2017-08-13 03:39:03', '0914390567', 'ha noi viet nam', 'Vận chuyển tới khách hàng', null, 'Hoàn thành', '1160000.00', '40000.00', '55000.00', '1160000.00', '1160000.00', '1165000.00', 'letoan', '20000.00', null);
INSERT INTO `transactions` VALUES ('11', '2017-08-13 07:08:46', '2017-08-15 07:55:02', '4', '22', '2017-08-13 07:08:46', 'ha noi', '09232323', 'Vận chuyển tới khách hàng', 'note 2', 'Đang giao', '4777000.00', '40000.00', '55000.00', '4777000.00', '4777000.00', '4782000.00', 'letoan', '20000.00', '17');
INSERT INTO `transactions` VALUES ('12', '2017-08-13 09:39:39', '2017-08-15 10:00:27', '4', '22', '2017-08-13 09:39:39', '122 yen hoa', '0914390567', 'Vận chuyển tới khách hàng', 'note', 'Đang giao', '5254000.00', '40000.00', '55000.00', '5254000.00', '5254000.00', '5259000.00', 'letoan', '20000.00', '22');
INSERT INTO `transactions` VALUES ('13', '2017-08-14 01:43:23', '2017-08-15 04:23:52', '4', '22', '2017-08-14 01:43:23', '32323', '0914390567', 'Vận chuyển tới khách hàng', '322323', 'Đang giao', '1249000.00', '40000.00', '55000.00', '1249000.00', '1249000.00', '1254000.00', 'letoan', '20000.00', '5');
INSERT INTO `transactions` VALUES ('14', '2017-08-14 01:45:21', '2017-08-15 04:21:13', '4', '22', '2017-08-14 01:45:21', 'ha noi - viet nam 45', '0914390567', 'Vận chuyển tới khách hàng', 'notes', 'Đợi chia', '1000000.00', '40000.00', '55000.00', '1000000.00', '1000000.00', '1005000.00', 'letoan', '20000.00', '2');

-- ----------------------------
-- Table structure for transaction_drug
-- ----------------------------
DROP TABLE IF EXISTS `transaction_drug`;
CREATE TABLE `transaction_drug` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transaction_drug
-- ----------------------------
INSERT INTO `transaction_drug` VALUES ('28', '2017-08-12 09:55:49', '2017-08-12 09:55:49', '6', '90', '9', '2610000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('29', '2017-08-12 09:55:49', '2017-08-12 09:55:49', '6', '60', '2', '178000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('30', '2017-08-12 09:55:49', '2017-08-12 09:55:49', '6', '90', '3', '900000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('31', '2017-08-12 14:42:34', '2017-08-12 14:42:34', '7', '90', '10', '2900000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('32', '2017-08-12 14:42:34', '2017-08-12 14:42:34', '7', '33', '2', '36000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('33', '2017-08-12 14:42:34', '2017-08-12 14:42:34', '7', '90', '2', '600000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('34', '2017-08-12 14:42:34', '2017-08-12 14:42:34', '7', '60', '1', '89000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('35', '2017-08-12 14:42:34', '2017-08-12 14:42:34', '7', '91', '2', '120000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('36', '2017-08-12 16:04:01', '2017-08-12 16:04:01', '8', '90', '6', '1740000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('37', '2017-08-12 16:04:01', '2017-08-12 16:04:01', '8', '33', '1', '18000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('38', '2017-08-12 16:04:01', '2017-08-12 16:04:01', '8', '60', '1', '89000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('39', '2017-08-12 16:04:01', '2017-08-12 16:04:01', '8', '91', '2', '120000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('40', '2017-08-12 16:04:01', '2017-08-12 16:04:01', '8', '90', '1', '300000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('41', '2017-08-12 16:07:04', '2017-08-12 16:07:04', '9', '90', '1', '290000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('42', '2017-08-12 16:07:04', '2017-08-12 16:07:04', '9', '33', '2', '36000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('43', '2017-08-12 16:07:04', '2017-08-12 16:07:04', '9', '90', '1', '300000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('44', '2017-08-12 16:07:04', '2017-08-12 16:07:04', '9', '60', '3', '267000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('45', '2017-08-12 16:07:04', '2017-08-12 16:07:04', '9', '91', '2', '120000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('46', '2017-08-13 03:39:03', '2017-08-13 03:39:03', '10', '90', '4', '1160000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('47', '2017-08-13 07:08:46', '2017-08-15 06:48:05', '11', '90', '9', '2610000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('48', '2017-08-13 07:08:46', '2017-08-15 06:48:05', '11', '59', '2', '1000000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('49', '2017-08-13 07:08:46', '2017-08-15 06:48:05', '11', '90', '3', '900000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('50', '2017-08-13 07:08:46', '2017-08-15 06:48:05', '11', '60', '3', '267000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('51', '2017-08-13 09:39:39', '2017-08-15 09:59:56', '12', '90', '8', '2320000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('53', '2017-08-13 09:39:39', '2017-08-15 09:59:56', '12', '90', '8', '2400000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('54', '2017-08-13 09:39:39', '2017-08-15 09:59:56', '12', '60', '6', '534000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('55', '2017-08-14 01:43:23', '2017-08-14 01:43:23', '13', '90', '4', '1160000.00', 'discount');
INSERT INTO `transaction_drug` VALUES ('56', '2017-08-14 01:43:23', '2017-08-14 01:43:23', '13', '60', '1', '89000.00', 'root');
INSERT INTO `transaction_drug` VALUES ('57', '2017-08-14 01:45:22', '2017-08-14 01:45:22', '14', '59', '2', '1000000.00', 'root');

-- ----------------------------
-- Table structure for transaction_send
-- ----------------------------
DROP TABLE IF EXISTS `transaction_send`;
CREATE TABLE `transaction_send` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` int(11) NOT NULL,
  `shipping_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_send` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty_box` int(11) NOT NULL,
  `date_send` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transaction_send
-- ----------------------------
INSERT INTO `transaction_send` VALUES ('3', '2017-08-15 07:55:02', '2017-08-15 09:59:09', '11', 'Nhà vận chuyển số 3', 'nd232323', '2', '2017-08-15 16:53:24', '3', null);
INSERT INTO `transaction_send` VALUES ('4', '2017-08-15 10:00:27', '2017-08-15 10:00:27', '12', 'Nhà vận chuyển số 4', 'maso1', '10', '2017-08-15 17:00:01', 'ok giao', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Quản trị', 'admin@gmail.com', '$2y$10$bzffypDnx0UTNIRNzE8WTuEwnxhrWVMiSNJ/vLwznn3KPEXA0/t7m', '1', '1', '0', '1', null, '2017-07-28 04:46:26', '2017-08-05 01:51:33', 'sF1Ef7lBNdgC6HD3SvVQlyoA4m48uOi0hY7a4fDaP117MCBdzSmianvG0koN');

-- ----------------------------
-- Table structure for user_logs
-- ----------------------------
DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE `user_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_logs
-- ----------------------------
INSERT INTO `user_logs` VALUES ('1', '2017-08-13 04:26:21', '2017-08-13 04:26:21', '22');
INSERT INTO `user_logs` VALUES ('2', '2017-08-14 05:07:30', '2017-08-13 05:07:30', '22');
INSERT INTO `user_logs` VALUES ('3', '2017-08-13 05:17:32', '2017-08-13 05:17:32', '22');
INSERT INTO `user_logs` VALUES ('4', '2017-08-13 05:35:03', '2017-08-13 05:35:03', '22');
INSERT INTO `user_logs` VALUES ('5', '2017-08-14 00:59:09', '2017-08-14 00:59:09', '22');
INSERT INTO `user_logs` VALUES ('6', '2017-08-14 01:25:45', '2017-08-14 01:25:45', '22');
INSERT INTO `user_logs` VALUES ('7', '2017-08-14 01:47:14', '2017-08-14 01:47:14', '22');
