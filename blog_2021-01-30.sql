# ************************************************************
# Sequel Ace SQL dump
# Version 3013
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.17-MariaDB)
# Database: blog
# Generation Time: 2021-01-30 18:07:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `comment_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `from_id`, `comment`, `comment_user_id`, `created_at`, `updated_at`, `from_user_id`)
VALUES
	(41,'mapletree','Hey Hannah! What\'s cooking?',14,'2021-01-30 18:51:41','2021-01-30 18:51:41',NULL),
	(42,'mapletree','Leila!! I miss you! When can we go to the beach again?',16,'2021-01-30 18:52:51','2021-01-30 18:52:51',NULL),
	(43,'mrmeeseeks','Yo Robby! Let\'s have a beer tonight!',12,'2021-01-30 18:54:06','2021-01-30 18:54:06',NULL),
	(44,'mrmeeseeks','Steve-i-yo! Are you free tonight? Me and Rob are going out, you should come!',20,'2021-01-30 18:56:03','2021-01-30 18:56:03',NULL),
	(45,'drcosmos','My girl Lisa, me and the boys are going out, do you wanna come?',13,'2021-01-30 18:58:21','2021-01-30 18:58:21',NULL),
	(46,'duckattack','Nice pics Angela! ',19,'2021-01-30 18:59:39','2021-01-30 18:59:39',NULL);

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `textarea` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `posted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `textarea`, `image`, `user_id`, `created_at`, `updated_at`, `posted_by`)
VALUES
	(75,'Vacay view','Woho! Finally arrived at this beautiful spot.','60159b1fa2c190.17553759.jpg',20,'2021-01-30 18:45:03','2021-01-30 18:45:03','drcosmos'),
	(76,'Weekend flowers','Happy Friday everyone! Iäll enjoy some days off with fresh flowers and coffee on the balcony.','60159bad8265a8.92102003.jpg',19,'2021-01-30 18:47:25','2021-01-30 18:47:25','saltakatten'),
	(77,'Cuties','From the day at the beach.','60159bee084e09.71970120.jpg',19,'2021-01-30 18:48:30','2021-01-30 18:48:30','saltakatten'),
	(78,'Nature reflections','Breathe and breathe out. ','60159c8c391f00.83869500.jpg',13,'2021-01-30 18:51:08','2021-01-30 18:51:08','mapletree');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reply
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reply`;

CREATE TABLE `reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `reply` varchar(255) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `posted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL,
  `f_name` varchar(30) DEFAULT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `profile_image`, `f_name`, `l_name`)
VALUES
	(12,'big_boo','big_boo@mail.com','$2y$10$JDy/cyGtWWfFAa7kzWHs1eIZIMf7H07meH9OHrqbtgSCyOBM/5FYC','2021-01-30 18:24:57','2021-01-30 18:31:19','601597e7a1d827.72942009.jpg','Robert','Johnsson'),
	(13,'mapletree','mapletree@mail.com','$2y$10$mZv8khR1FX5YKv9wCe4LpeStEmF/PDzR3QN5QhC3NQTqJgV5giRui','2021-01-30 18:25:49','2021-01-30 18:31:58','6015980e3ee362.31727130.jpg','Lisa','Yang'),
	(14,'pastalover','pastalover@mail.com','$2y$10$UX3ZFKSW600Ap1isWV0OmeKzlpNis79M9RDHsLEbrgV/nnmRigE0C','2021-01-30 18:26:24','2021-01-30 18:33:04','60159850a3d443.30231813.jpg','Hannah','Smith'),
	(15,'duckattack','duckattack@mail.com','$2y$10$DEqW3FD1ufqFtumrSjkMKOwTSy0UiZHJkhl5rTW6DlPyoAH/Nt756','2021-01-30 18:26:51','2021-01-30 18:33:49','6015987d9d7211.92729750.jpg','Jayson','Wu'),
	(16,'milkyway','milkyway@mail.com','$2y$10$vu9bd3gfXFmxrBFKjYXjzeBus0cJKjEfbNqHJlNtGwRoLY/VU1I5i','2021-01-30 18:27:28','2021-01-30 18:39:54','601599ea25cf30.38412073.jpg','Leila','Karlsson'),
	(17,'bonbon','bonbon@mail.com','$2y$10$NoJsnkg6xuZ5VJiU43Z0SuKykapC0QTkvmsbKSrnYxfclce2GpgpG','2021-01-30 18:28:01','2021-01-30 18:40:34','60159a12947c80.76684318.jpg','Stella','McBeal'),
	(18,'mrmeeseeks','mrmesseks@mail.com','$2y$10$SpBzvuj6A10k3m43YF0ih.uHvNulhGcSNeAbgtQ2zGyLY.EXwXCaa','2021-01-30 18:28:37','2021-01-30 18:41:57','60159a65dc7696.43538950.jpg','Martin','Harrysson'),
	(19,'saltakatten','saltakatten@mail.com','$2y$10$yp0SHRk4dk26V2rMDLYPiuB6SjpObDHlU6M8WzRSrD61I3r7QUjMm','2021-01-30 18:29:10','2021-01-30 18:42:40','60159a90889682.91220404.jpg','Angela','Lee'),
	(20,'drcosmos','drcosmos@mail.com','$2y$10$En5/qPVyxBcJKOK4clu3RuCN64637mTImhwAcmDAc5i2XLL.qBPpK','2021-01-30 18:29:40','2021-01-30 18:43:44','60159ad04f5877.47796372.jpg','Steve','Nicholson');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
