/*
Navicat MySQL Data Transfer

Source Server         : Localhost MySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pharma

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-19 12:14:09
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'dataLogo', '1499850131_LOGO99999 copy.png', '2017-06-06 10:11:33', '2017-07-12 16:02:11');
INSERT INTO `settings` VALUES ('3', 'dataQD', 'Hotline tư vấn bán hàng: 08.6868.9999\r\nHotline kỹ thuật: 016.9999.6666\r\nEmail: sumowatch.vn@gmail.com\r\nFanpage: https://www.facebook.com/Sumowatch.vn/', '2017-06-06 14:35:56', '2017-07-12 16:30:33');
INSERT INTO `settings` VALUES ('4', 'dataHT', 'Chào mừng đến với hệ thống đồng hồ Sumowatch!', '2017-06-06 14:56:01', '2017-07-13 15:35:43');
INSERT INTO `settings` VALUES ('5', 'dataKM', 'Công Ty CP 999999999 Việt Nam/ Địa chỉ: P12A02, Tháp 1, Toà nhà Times Tower, Lê Văn Lương, Hà Nội', '2017-06-06 15:00:56', '2017-07-27 11:21:27');
INSERT INTO `settings` VALUES ('6', 'dataVC', '100', '2017-06-06 15:10:57', '2017-08-19 12:11:55');
INSERT INTO `settings` VALUES ('10', 'dataHotline', '0868689999', '2017-06-09 09:42:11', '2017-07-13 21:27:59');
