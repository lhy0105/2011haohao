-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: hh
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `date_begin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` text,
  `readed` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `begin_end` (`date_begin`,`date_end`),
  KEY `date_begin` (`date_begin`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (3,'C语言书籍','2012-09-03 16:00:00','2012-10-30 16:00:00','坚持就是胜利！','Y'),(4,'Unix高级编程','2012-09-03 16:00:00','2012-09-29 16:00:00','需要努力啊！','Y'),(5,'UNIX系统入门','2012-09-04 16:00:00','2012-09-20 16:00:00','','Y'),(6,'怎样使用UNIX系统','2012-09-04 16:00:00','2012-09-29 16:00:00','','Y'),(7,'使用Ｃ语言','2012-09-04 16:00:00','2012-09-29 16:00:00','','Y'),(8,'IBM PC C语言简明教程','2012-09-04 16:00:00','2012-09-29 16:00:00','','Y'),(9,'C语言大全','2012-09-04 16:00:00','2012-10-30 16:00:00','','Y'),(10,'高性能Mysql','2012-09-20 16:00:00','2012-09-29 16:00:00','','Y'),(11,'重构-改善既有的代码设计','2012-10-06 16:00:00','2012-12-30 16:00:00','','Y'),(12,'C语言程序设计','2012-09-04 16:00:00','2012-10-13 16:00:00','','Y'),(13,'深入理解计算机系统','2012-10-31 16:00:00','2013-02-08 16:00:00','','Y');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `log_date` (`log_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay`
--

DROP TABLE IF EXISTS `pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `ammount` float(100,2) DEFAULT '0.00',
  `pay_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sid` int(22) NOT NULL DEFAULT '1',
  `note` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `amount` (`ammount`),
  KEY `pay_date` (`pay_date`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay`
--

LOCK TABLES `pay` WRITE;
/*!40000 ALTER TABLE `pay` DISABLE KEYS */;
INSERT INTO `pay` VALUES (41,450.00,'2012-09-03 11:24:06',21,'李艳梅，替公司缴纳网费450元，今通过中国银行网上银行交付。'),(50,11.50,'2012-09-02 16:00:00',7,'一捆葱2.0\n6个西红柿6.5\n1个菜花3.0\n'),(51,1.00,'2012-09-03 16:00:00',12,'普天早上吃饭:1个烧饼，1碗豆腐脑。'),(52,27.40,'2012-09-04 16:00:00',23,'结膜炎，眼药水两瓶。'),(53,2.50,'2012-09-04 16:00:00',12,'早餐，路摊吃饭。——粥!'),(55,3.00,'2012-09-05 16:00:00',21,'早餐没带钱包，欠芦苇经3.0元。');
/*!40000 ALTER TABLE `pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_type`
--

DROP TABLE IF EXISTS `pay_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_type` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `pid` int(22) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name_pid` (`name`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_type`
--

LOCK TABLES `pay_type` WRITE;
/*!40000 ALTER TABLE `pay_type` DISABLE KEYS */;
INSERT INTO `pay_type` VALUES (1,'支出',0),(2,'房租',1),(3,'水费',1),(4,'电费',1),(5,'宽带费',1),(6,'超市',1),(7,'买菜',1),(8,'零食',1),(9,'书籍',1),(10,'网购',1),(11,'回家',1),(12,'外面吃饭',1),(13,'衣服',1),(14,'零花钱',1),(15,'交通费',1),(16,'收入',0),(17,'投资',0),(18,'债务',0),(19,'工资',16),(20,'投资现金',17),(21,'欠款',18),(22,'借款',18),(23,'买药',1),(24,'礼金',16);
/*!40000 ALTER TABLE `pay_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` char(20) DEFAULT '',
  `age` int(22) DEFAULT '0',
  `career` varchar(22) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name_password` (`name`,`password`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'test','4297f44b13955235245b2497399d7a93','2012-09-06 06:07:12','127.0.0.1',0,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-09-06 14:41:06
