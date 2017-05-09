/*
SQLyog Community v12.4.1 (64 bit)

*********************************************************************
*/


/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT 'untitled article',
  `article` text COLLATE utf8_bin,
  `submitted` datetime ,
  `lastupdate` datetime ,
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
  `registered` datetime ,
  `accesstoken` char(80) COLLATE utf8_bin DEFAULT NULL,
  `lastsignedin` datetime ,
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
  `userid` int(9) ,
  `intro` text COLLATE utf8_bin,
  `dateofbirth` datetime ,
  `phone` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  UNIQUE KEY `userid` (`userid`),
  CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `members` (`memberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `userdata` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
