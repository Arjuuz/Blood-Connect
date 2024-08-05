/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.8-log : Database - blood_bank_
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blood_bank_` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blood_bank_`;

/*Table structure for table `blood_request` */

DROP TABLE IF EXISTS `blood_request`;

CREATE TABLE `blood_request` (
  `b_rqst_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(50) DEFAULT NULL COMMENT 'user_id',
  `d_id` varchar(50) DEFAULT 'NOT_ASSIGNED' COMMENT 'donor_id',
  `blood` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `last_donate` varchar(50) DEFAULT NULL COMMENT 'last donated date',
  `type` varchar(50) DEFAULT NULL COMMENT 'user_type',
  PRIMARY KEY (`b_rqst_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `blood_request` */

/*Table structure for table `donor_reg` */

DROP TABLE IF EXISTS `donor_reg`;

CREATE TABLE `donor_reg` (
  `d_id` int(20) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(100) DEFAULT NULL,
  `d_age` varchar(100) DEFAULT NULL,
  `d_address` varchar(100) DEFAULT NULL,
  `d_blood` varchar(100) DEFAULT NULL,
  `d_phone` varchar(100) DEFAULT NULL,
  `d_email` varchar(100) DEFAULT NULL,
  `d_diseases` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'FREE',
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `donor_reg` */

insert  into `donor_reg`(`d_id`,`d_name`,`d_age`,`d_address`,`d_blood`,`d_phone`,`d_email`,`d_diseases`,`status`) values (3,'Prakashan','26','Pathanamthitta','O+','9909789879','prakashan@gmail.com','No Disease','FREE'),(4,'Abhijith','26','Ernakulam','A+','9098898790','abi@gmail.com','No Disease','FREE'),(5,'Issac','24','Varappuzha','A+','8978909876','issac@gmail.com','Nothing','FREE');

/*Table structure for table `hospital` */

DROP TABLE IF EXISTS `hospital`;

CREATE TABLE `hospital` (
  `h_id` int(20) NOT NULL AUTO_INCREMENT,
  `h_name` varchar(100) DEFAULT NULL,
  `h_address` varchar(100) DEFAULT NULL,
  `h_phone` varchar(100) DEFAULT NULL,
  `h_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hospital` */

insert  into `hospital`(`h_id`,`h_name`,`h_address`,`h_phone`,`h_email`) values (3,'Aster MIMS','Edappally','9809897876','mims@gmail.com'),(4,'Amritha','Ernakulam','9095676545','amth@gmail.com'),(5,'Raja Hospital','Kaloor','9898980990','raja@gmail.com');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `l_id` int(20) NOT NULL AUTO_INCREMENT,
  `reg_id` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`l_id`,`reg_id`,`email`,`password`,`type`,`status`) values (1,'0','admin@gmail.com','admin','ADMIN','1'),(6,'1','vishnu@gmail.com','123456','USER','1'),(7,'3','prakashan@gmail.com','123456','DONOR','1'),(8,'3','mims@gmail.com','12345','HOSPITAL','1'),(9,'4','abi@gmail.com','123456','DONOR','1'),(10,'4','amth@gmail.com','1234','HOSPITAL','1'),(11,'2','ajay@gmail.com','123456','USER','1'),(12,'3','archana@gmail.com','123456','USER','1'),(13,'5','issac@gmail.com','123456','DONOR','1'),(14,'5','raja@gmail.com','123456','HOSPITAL','1');

/*Table structure for table `user_blood_request` */

DROP TABLE IF EXISTS `user_blood_request`;

CREATE TABLE `user_blood_request` (
  `b_rqst_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(50) DEFAULT NULL COMMENT 'user_id',
  `d_id` varchar(50) DEFAULT 'NOT_ASSIGNED' COMMENT 'donor_id',
  `blood` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'PENDING',
  `last_donate` varchar(100) NOT NULL DEFAULT 'NOT UPDATED' COMMENT 'last donated date',
  PRIMARY KEY (`b_rqst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `user_blood_request` */

insert  into `user_blood_request`(`b_rqst_id`,`u_id`,`d_id`,`blood`,`status`,`last_donate`) values (33,'1','3','B-','DONATED','2021-11-20 02:42'),(34,'3','5','A+','DONATED','2021-11-20 09:50');

/*Table structure for table `user_reg` */

DROP TABLE IF EXISTS `user_reg`;

CREATE TABLE `user_reg` (
  `u_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) DEFAULT NULL,
  `u_age` varchar(100) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `u_blood` varchar(100) DEFAULT NULL,
  `u_phone` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_reg` */

insert  into `user_reg`(`u_id`,`u_name`,`u_age`,`u_address`,`u_blood`,`u_phone`,`u_email`) values (1,'Vishnu','25','Ernakulam','B+','9865325421','vishnu@gmail.com'),(2,'Ajay','24','Calicut','AB+','9878765434','ajay@gmail.com'),(3,'Archana','25','Kalamassery','B+','9089787656','archana@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
