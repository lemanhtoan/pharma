/*
Navicat MySQL Data Transfer

Source Server         : Localhost MySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : 5pharma_clear

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-15 08:45:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_discount
-- ----------------------------
DROP TABLE IF EXISTS `config_discount`;
CREATE TABLE `config_discount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` decimal(20,2) NOT NULL,
  `to` decimal(20,2) NOT NULL,
  `value` decimal(20,2) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of config_discount
-- ----------------------------
INSERT INTO `config_discount` VALUES ('9', '2017-08-28 23:09:18', '2017-09-05 22:04:41', '1', 'Khuyến mại %', '2000000.00', '6000000.00', '2.00', 'Phần trăm');
INSERT INTO `config_discount` VALUES ('10', '2017-08-28 23:09:48', '2017-09-05 22:45:49', '2', 'Khuyến mại %', '6000000.10', '1000000000.00', '3.00', 'Phần trăm');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'ORyrZFFgQbjOjHG', 'KH00001', '9813096929', 'Quản trị', 'Toà nhà VTC, 23 Lạc Trung, Vĩnh Tuy, Hai Bà Trưng, Hà Nội, Vietnam', '841235841993', '$2y$10$1gubFGkeE2/HodiGTA8AXuT5jCyomFk8IRwZ/yPohI7mZRfaxkilS', 'admin@email.com', '11', '1', '0', '1', null, '1348313485253921', null, 'http://graph.facebook.com/1348313485253921/picture?type=square', '0', '1', 'Hà Nội', '20.976411', '105.785588', '2017-07-11 12:20:53', '2017-07-05 12:15:00', '0', null, null, null, '2017-09-13 16:01:26', 'ez3owaCAvMWdMWjAQOpysV19l3mqrHk6ewL34EMstdOrpUEOwzztyOTwVL5e', 'administrator');

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` int(5) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `provinceId` int(5) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `provinceId` (`provinceId`),
  KEY `name` (`name`),
  KEY `name_2` (`name`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of drugs
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of drug_image
-- ----------------------------

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of group_drugs
-- ----------------------------

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
INSERT INTO `migrations` VALUES ('2017_08_17_041140_create_config_discount_table', '8');

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
  `discount_cg1` decimal(20,2) NOT NULL,
  `discount_cg2` decimal(20,2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of minds
-- ----------------------------

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
  `drug_price` decimal(20,2) DEFAULT NULL,
  `drug_special_price` decimal(20,2) DEFAULT NULL,
  `max_discount_qty` int(11) DEFAULT NULL,
  `max_qty` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mind_drug
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pharmacies
-- ----------------------------

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `sort` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0'
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
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator', 'admin', '2017-07-28 04:46:26', '2017-07-28 04:46:26');
INSERT INTO `roles` VALUES ('2', 'Redactor', 'redac', '2017-07-28 04:46:26', '2017-07-28 04:46:26');
INSERT INTO `roles` VALUES ('3', 'User', 'user', '2017-07-28 04:46:26', '2017-07-28 04:46:26');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'dataLogo', '1503127551_logo.png', '2017-06-06 17:11:33', '2017-08-19 21:25:51');
INSERT INTO `settings` VALUES ('3', 'dataQD', '<p>Nội dung b&agrave;i viết quy định</p>\r\n', '2017-06-06 21:35:56', '2017-08-24 22:43:26');
INSERT INTO `settings` VALUES ('4', 'dataHT', '<p>Nội dung b&agrave;i viết hỗ trợ</p>\r\n', '2017-06-06 21:56:01', '2017-08-24 22:43:49');
INSERT INTO `settings` VALUES ('5', 'dataKM', '0', '2017-06-06 22:00:56', '2017-08-23 22:27:51');
INSERT INTO `settings` VALUES ('6', 'dataVC', '30000', '2017-06-06 22:10:57', '2017-09-12 09:44:21');
INSERT INTO `settings` VALUES ('10', 'dataHotline', '024.3237.3659', '2017-06-09 16:42:11', '2017-08-28 20:31:47');
INSERT INTO `settings` VALUES ('11', 'dataKMVC', '30000', '2017-08-23 07:00:00', '2017-09-12 09:44:15');
INSERT INTO `settings` VALUES ('12', 'dataDiscount', '0', '2017-08-23 07:00:00', '2017-08-28 22:17:31');

-- ----------------------------
-- Table structure for shipping_owner
-- ----------------------------
DROP TABLE IF EXISTS `shipping_owner`;
CREATE TABLE `shipping_owner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shipping_owner
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transactions
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transaction_drug
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transaction_send
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_logs
-- ----------------------------
