/*
SQLyog Ultimate v11.26 (32 bit)
MySQL - 10.1.13-MariaDB : Database - ts
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ts` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ts`;

/*Table structure for table `ts_admin` */

DROP TABLE IF EXISTS `ts_admin`;

CREATE TABLE `ts_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `MUID` int(11) DEFAULT NULL COMMENT '员工id号',
  `username` varchar(14) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL COMMENT '用户名',
  `password` varchar(132) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL COMMENT '密码',
  `logintime` datetime DEFAULT NULL COMMENT '登录日期',
  `name` varchar(22) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL COMMENT '姓名',
  `dept` varchar(40) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL COMMENT '部门',
  `qq` int(14) DEFAULT NULL COMMENT 'qq',
  `phone` int(14) DEFAULT NULL COMMENT '手机',
  `Auth` int(11) DEFAULT NULL COMMENT '权限',
  `status` int(1) DEFAULT '1' COMMENT '1为正常，0，异常',
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ts_admin` */

insert  into `ts_admin`(`id`,`MUID`,`username`,`password`,`logintime`,`name`,`dept`,`qq`,`phone`,`Auth`,`status`) values (1,NULL,'admin','21232f297a57a5a743894a0e4a801fc3','2016-09-28 04:47:03','李松林',NULL,649713977,2147483647,0,1);

/*Table structure for table `ts_auth` */

DROP TABLE IF EXISTS `ts_auth`;

CREATE TABLE `ts_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ts_auth` */

/*Table structure for table `ts_bill` */

DROP TABLE IF EXISTS `ts_bill`;

CREATE TABLE `ts_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '进账id',
  `dep_id` int(11) DEFAULT NULL COMMENT '部门id',
  `clerk` varchar(24) CHARACTER SET utf8 DEFAULT NULL COMMENT '业务员姓名',
  `date` datetime DEFAULT NULL COMMENT '合作日期',
  `clientele_name` varchar(24) CHARACTER SET utf8 DEFAULT NULL COMMENT '客户姓名',
  `clientele_phone` int(14) DEFAULT NULL,
  `qq` int(10) DEFAULT NULL COMMENT '客户qq',
  `clientele_wx` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT '客户微信',
  `clt_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '合作资金',
  `all_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '全仓资金',
  `in_departments` varchar(14) CHARACTER SET utf8 DEFAULT NULL COMMENT '录入部门',
  `info` text CHARACTER SET utf8 COMMENT '备注',
  `is_del` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除1，删除0正常',
  `flag` int(1) NOT NULL DEFAULT '1' COMMENT '是否买进，1是 0 否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ts_bill` */

insert  into `ts_bill`(`id`,`dep_id`,`clerk`,`date`,`clientele_name`,`clientele_phone`,`qq`,`clientele_wx`,`clt_price`,`all_price`,`in_departments`,`info`,`is_del`,`flag`) values (1,1,'小王','2016-09-24 09:03:51','小张',2147483647,649713977,NULL,'0.00','20.00','测试','测试系统',0,1),(4,1,'王五','2016-09-15 23:14:52','张小二',2147483647,6497123,'wx_lisonglin','15.00','0.00','测试','<p>这个是配置</p>',0,1),(5,1,'111',NULL,NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(6,1,'22222',NULL,'32132131',NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(7,1,'dsadsa',NULL,NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(8,1,'432423',NULL,NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(9,1,'321321',NULL,NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(10,1,NULL,NULL,'大大',NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(11,1,NULL,NULL,'大大大滴滴答答',NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(12,1,'接口连接了空间链接',NULL,NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(13,1,'就考虑进来看看 ',NULL,NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,1),(14,1,NULL,'2016-09-13 08:48:00',NULL,NULL,NULL,NULL,'0.00','0.00','测试',NULL,0,0);

/*Table structure for table `ts_departments` */

DROP TABLE IF EXISTS `ts_departments`;

CREATE TABLE `ts_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `de_name` varchar(34) CHARACTER SET utf8 DEFAULT NULL COMMENT '部门名称',
  `power` int(10) DEFAULT NULL,
  `info` text CHARACTER SET utf8 COMMENT '部门描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ts_departments` */

insert  into `ts_departments`(`id`,`de_name`,`power`,`info`) values (1,'测试',0,'系统测试');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
