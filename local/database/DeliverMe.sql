/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.17-0ubuntu0.16.04.1 : Database - DeliverMe
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`DeliverMe` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `DeliverMe`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`created_at`,`updated_at`) values (1,'General Maintenance','2017-04-17 08:20:00','2017-04-17 08:20:00'),(2,'Babies & Children','2017-04-17 08:20:00','2017-04-17 08:20:00'),(3,'Banking & Finance','2017-04-17 08:20:00','2017-04-17 08:20:00'),(4,'Books/ Movies','2017-04-17 08:20:00','2017-04-17 08:20:00'),(5,'Cakes and Baking','2017-04-17 08:20:00','2017-04-17 08:20:00'),(6,'Cars/ Mechanics','2017-04-17 08:20:00','2017-04-17 08:20:00'),(7,'Cleaners/ Maids','2017-04-17 08:20:00','2017-04-17 08:20:00'),(8,'Consultans','2017-04-17 08:20:00','2017-04-17 08:20:00'),(9,'Doctors/ Medical','2017-04-17 08:20:00','2017-04-17 08:20:00'),(10,'Drivers/ Taxi','2017-04-17 08:20:00','2017-04-17 08:20:00'),(11,'Events and Party Planning','2017-04-17 08:20:00','2017-04-17 08:20:00'),(12,'Furniture and Appliances','2017-04-17 08:20:00','2017-04-17 08:20:00'),(13,'Gardening & Lanscaping','2017-04-17 08:20:00','2017-04-17 08:20:00'),(14,'Handymen','2017-04-17 08:20:00','2017-04-17 08:20:00'),(15,'IT Support, Computers, Mobiles Electronis','2017-04-17 08:20:00','2017-04-17 08:20:00'),(16,'Laundry/ Drycleaning','2017-04-17 08:20:00','2017-04-17 08:20:00'),(17,'Movers/ Recycling','2017-04-17 08:20:00','2017-04-17 08:20:00'),(18,'Pets','2017-04-17 08:20:00','2017-04-17 08:20:00'),(19,'Pharmacy/ Health','2017-04-17 08:20:00','2017-04-17 08:20:00'),(20,'Safety & Security','2017-04-17 08:20:00','2017-04-17 08:20:00'),(21,'Salon/ Spa/ Beauty','2017-04-17 08:20:00','2017-04-17 08:20:00'),(22,'Services','2017-04-17 08:20:00','2017-04-17 08:20:00'),(23,'Sport & Fitness','2017-04-17 08:20:00','2017-04-17 08:20:00'),(24,'Supermarkets/ Catering','2017-04-17 08:20:00','2017-04-17 08:20:00'),(25,'Tylors/ Clothing & Accessories','2017-04-17 08:20:00','2017-04-17 08:20:00'),(26,'Tutors','2017-04-17 08:20:00','2017-04-17 08:20:00');

/*Table structure for table `favorite` */

DROP TABLE IF EXISTS `favorite`;

CREATE TABLE `favorite` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `listing_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk_favorite_idx` (`user_id`),
  KEY `listing_id_fk_favorite_idx` (`listing_id`),
  CONSTRAINT `listing_id_fk_favorite` FOREIGN KEY (`listing_id`) REFERENCES `listing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id_fk_favorite` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `favorite` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` mediumtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk_feedback_idx` (`user_id`),
  CONSTRAINT `user_id_fk_feedback` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `listing` */

DROP TABLE IF EXISTS `listing`;

CREATE TABLE `listing` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  `hash_tags` varchar(255) DEFAULT NULL,
  `recommend_for` bigint(20) DEFAULT NULL,
  `other_categories` varchar(45) DEFAULT NULL,
  `about_description` varchar(500) DEFAULT NULL,
  `card_accepted` int(11) DEFAULT '0',
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact_description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `longitude` float DEFAULT '0',
  `latitude` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `location_id_fk_idx` (`location_id`),
  KEY `category_id_fk_listing_idx` (`category_id`),
  KEY `user_id_fk_listing_idx` (`user_id`),
  CONSTRAINT `category_id_fk_listing` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `location_id_fk` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id_fk_listing` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `listing` */

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(105) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `location` */

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `listing_id` bigint(20) unsigned NOT NULL,
  `is_false` int(11) DEFAULT '0',
  `is_dupplicate` int(11) DEFAULT '0',
  `is_other` int(11) DEFAULT '0',
  `other_description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk_report_idx` (`user_id`),
  KEY `listing_id_fk_report_idx` (`listing_id`),
  CONSTRAINT `listing_id_fk_report` FOREIGN KEY (`listing_id`) REFERENCES `listing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id_fk_report` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `report` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rating` float DEFAULT '0',
  `content` mediumtext NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `listing_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `UserID_FK_Review_idx` (`user_id`),
  KEY `Listing_ID_Review_idx` (`listing_id`),
  CONSTRAINT `Listing_ID_Review` FOREIGN KEY (`listing_id`) REFERENCES `listing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `UserID_FK_Review` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `review` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token_firebase` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT '0',
  `is_active` int(11) DEFAULT '0',
  `is_suspend` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
