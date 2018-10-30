/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.34-MariaDB : Database - qms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `qms`;

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `fid` varchar(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `email` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`),
  KEY `index` (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `faculty` */

insert  into `faculty`(`index`,`fid`,`name`,`role`,`email`,`passwd`,`active`) values 
(1,'fa0021','chaman','admin','chamansullia@gmail.com','test',1),
(2,'fa0022','test','user','test@test.com','test',1);

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `fid` varchar(7) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `qid` varchar(100) DEFAULT NULL,
  KEY `index` (`index`),
  KEY `qid` (`qid`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `qpaper` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log` */

/*Table structure for table `qpaper` */

DROP TABLE IF EXISTS `qpaper`;

CREATE TABLE `qpaper` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `qid` varchar(10) NOT NULL,
  `group` int(10) NOT NULL,
  `fid` varchar(7) NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `index` (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `qpaper` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
