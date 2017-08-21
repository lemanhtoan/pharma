/*
Navicat MySQL Data Transfer

Source Server         : Localhost MySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pharma

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-21 08:54:36
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'dataLogo', '1503127551_logo.png', '2017-06-06 10:11:33', '2017-08-19 14:25:51');
INSERT INTO `settings` VALUES ('3', 'dataQD', '<p>noi dung trang quy dinh</p>\r\n', '2017-06-06 14:35:56', '2017-08-19 14:21:15');
INSERT INTO `settings` VALUES ('4', 'dataHT', '<p>Noi dung trang ho tro</p>\r\n', '2017-06-06 14:56:01', '2017-08-19 14:21:38');
INSERT INTO `settings` VALUES ('5', 'dataKM', '20000', '2017-06-06 15:00:56', '2017-08-19 14:33:27');
INSERT INTO `settings` VALUES ('6', 'dataVC', '40000', '2017-06-06 15:10:57', '2017-08-19 14:20:22');
INSERT INTO `settings` VALUES ('10', 'dataHotline', '0914.390.567', '2017-06-09 09:42:11', '2017-08-19 14:20:07');
