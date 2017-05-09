/*
SQLyog Community v12.4.1 (64 bit)
MySQL - 5.7.16 : Database - xblog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xblog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `xblog`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT 'untitled article',
  `article` text COLLATE utf8_bin,
  `submitted` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`articleid`),
  KEY `author` (`author`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `members` (`memberid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `articles` */

insert  into `articles`(`articleid`,`author`,`title`,`article`,`submitted`,`lastupdate`) values 
(1,1,'untitled article','','2017-05-08 14:35:20',NULL),
(2,1,'untitled article','test game article 1é€™æ˜¯æ¸¬è©¦ç”¨æ–‡ç« ','2017-05-08 14:39:46',NULL),
(3,1,'untitled article','test game article 1這是測試用文章','2017-05-08 14:50:46',NULL),
(4,2,'untitled article','edrhdfghdfgjdf終於換帳號成功','2017-05-08 16:13:01',NULL),
(5,2,'untitled article','edrhdfghdfgjdf終於換帳號成功','2017-05-08 16:13:03',NULL),
(6,2,'untitled article','edrhdfghdfgjdf終於換帳號成功','2017-05-08 16:13:04',NULL),
(8,2,'untitled article','測試山','2017-05-09 09:55:37',NULL),
(10,2,'untitled article','mountain','2017-05-09 09:55:56',NULL),
(13,5,'untitled article','dfgjghjfgj','2017-05-09 11:19:07',NULL),
(14,5,'untitled article','dfgjghjfgj','2017-05-09 11:19:09',NULL),
(15,5,'untitled article','dfgjghjfgj','2017-05-09 11:19:11',NULL),
(16,5,'untitled article','asascascascascascacacas','2017-05-09 11:32:53',NULL);

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `memberid` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(120) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `alias` varchar(87) COLLATE utf8_bin NOT NULL DEFAULT 'new user',
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `registered` datetime DEFAULT NULL,
  `accesstoken` char(80) COLLATE utf8_bin DEFAULT NULL,
  `lastsignedin` datetime DEFAULT NULL,
  PRIMARY KEY (`memberid`),
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `accesstoken` (`accesstoken`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `members` */

insert  into `members`(`memberid`,`account`,`email`,`alias`,`password`,`registered`,`accesstoken`,`lastsignedin`) values 
(1,'HelloBaby','hello@helloworld.com','Babe','thisispassword','2017-05-08 12:11:41',NULL,NULL),
(2,'Hellby','lo@helloworld.com','Babd','thisispassword2','2017-05-08 12:11:41',NULL,NULL),
(3,'kkkkkkkkkkk','jjjjjjjjjj','new user','dtyttttttt',NULL,NULL,NULL),
(4,'jack','pas@pas@os','new user','thisispssword4','2017-05-08 16:45:24',NULL,NULL),
(5,'tester','rr@jjj.com','new user','12345password','2017-05-09 11:03:44',NULL,NULL);

/*Table structure for table `userdata` */

DROP TABLE IF EXISTS `userdata`;

CREATE TABLE `userdata` (
  `userid` int(9) DEFAULT NULL,
  `intro` text COLLATE utf8_bin,
  `dateofbirth` datetime DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  UNIQUE KEY `userid` (`userid`),
  CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`memberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `userdata` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
