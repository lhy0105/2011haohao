-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: hh
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.3

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
-- Table structure for table `chess`
--

DROP TABLE IF EXISTS `chess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chess` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `title` varchar(22) DEFAULT '',
  `content` text,
  `cid` int(22) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chess`
--

LOCK TABLES `chess` WRITE;
/*!40000 ALTER TABLE `chess` DISABLE KEYS */;
INSERT INTO `chess` VALUES (1,'巧妙腾挪砲','砲二平五,炮8平5,馬二進三,馬8進7,車一進一,車9平8,車一平六,馬2進3,車六進七,炮2進2,車六平七,車8進4,車七退一,炮2平3',1),(2,'神兵天降','砲二平五,馬8進7,馬二進三,車9平8,車一平二,馬2進3,兵七進一,卒7進1,車二進六,馬7進6,馬八進七,象3進5,砲八平九,車1平2,車九平八,炮2進1,砲九進四,馬3進1,車八進六,車2進3,砲五進四,士4進5,砲五平八',1),(3,'迷途羔羊(一)','砲二平五,馬8進7,馬二進三,車9平8,車一平二,馬2進3,兵三進一,卒3進1,砲八平七,士4進5,馬三進四,炮8進3,馬四進三,炮8進1,兵七進一,馬3進4,兵七進一,馬4進5,仕六進五,象3進5,兵七進一,車1平4',1),(4,'迷途羔羊(二)','砲二平五,馬8進7,馬二進三,車9平8,車一平二,馬2進3,兵三進一,卒3進1,砲八平七,士4進5,馬三進四,炮8進3,馬四退三,炮8退1,車九進一,象3進5,車九平六,馬3進2,馬八進九,卒1進1,砲七退一,車1進3,車二進四,馬2進1,車六進三,卒1進1',1),(5,'墨手陈规(一)-弱点:平炮对車','砲二平五,馬8進7,馬二進三,車9平8,車一平二,卒7進1,車二進六,馬2進3,馬八進九,炮8平9,車二平三,炮9退1,砲八平七,士4進5,車九平八,車1平2,兵7進1,炮9平7,車三平四,象3進5,車八進六,炮2平1,車八平七,馬3退4,兵七進一',1),(6,'墨手陈规(二)-弱点:平炮对車','砲二平五,馬8進7,馬二進三,車9平8,車一平二,卒7進1,車二進六,馬2進3,馬八進九,炮8平9,車二平三,炮9退1,砲八平七,馬3退5,車九平八,炮9平7,砲五進四,象3進5,車三平四,馬7進5,車八進七,炮7進5,相三進五,馬5進7,車八退三',1),(7,'列炮破敛炮','砲二平五,炮2平5,馬二進三,馬8進9,車一平二,炮8平7,車二進八,馬2進3,兵七進一,車1平2,馬八進七,車2進6,車九平八,車2平3,砲八進七,馬3退2,車八進九,車3進1,砲五進四,士6進5,車二平五,將5平6,車八平七,車3平4,車五進一,將6進1,車五退二,士4進5,車七退一,炮7退1,砲五進二',2),(9,'右炮横车破缠角马象局','砲二平五,象3進5,馬二進三,馬2進4,車一進一,馬8進9,車一平四,車9平8,車四進七,馬4進6,砲五進四,士4進5,砲八平四,馬6進7\',\'砲四進七',2),(10,'右炮横车破象局','砲二平五,馬2進3,馬二進三,馬8進9,車一進一,象3進5,車一平六,士4進5,車六進五,車1平4,車六平七,炮2退2,馬八進七,炮2平3,車七進一,炮8平3,砲八進七,前炮進5,車九進二,前砲平7,砲五進四,炮7進1,    車九平六',2),(11,'右炮直车破右单提马士象局','砲二平五,馬2進3,馬二進三,馬8進9,車一平二,炮8平6,兵五進一,象3    進5,兵五進一,卒5進1,車二進五,士4進5,車二平五,車1平4,馬八進七,炮6進5,砲八平九,炮6平3,馬三進五,車4進6,車九平八,炮2平1,車八進七,炮1進4,馬五進六,馬3退4,砲九進四,炮1進3,砲九進三,象5退3,車五進三,將5進1,車八進一,將5退1,馬六進五,士6進5,車八平五,將5平6,車五進一,將6進1,車五平四',2),(12,'顺砲横車破直車弃马局','砲二平五,炮8平5,馬二進三,馬8進7,車一進一,車9平8,車一平六,車8進6,車六進七,馬2進1,車九進一,炮2進7,砲八進五',2),(13,'屏风馬破当头砲局-兵三進一(砲二進七)','馬二進三,炮8平5,馬八進七,馬8進7,兵三進一,車9平8,車一平二,車8進6,相七進五,卒3進1,仕六進五,炮2平3,車九平六,車8平7,砲二進七,馬7退8,車二進九,車7進1,車六進八,馬2進1,車二平三,車1平2,砲八進六,炮3退1,車六平四,士4進5,車四平五',2),(14,'屏风馬破当头砲局-兵三進一(砲二進六)','馬二進三,炮8平5,馬八進七,馬8進7,兵三進一,車9平8,車一平二,車8進6,相七進五,卒3進1,仕六進五,炮2平3,車九平六,車8平7,砲二進七,馬7退8,車二進九,車7進1,車六進八,馬2進1,車二平三,車1平2,砲八進六,炮3退1,車六平四,士4進5,車四平五',2),(15,'屏风馬破当头砲局-兵七進一','馬二進三,炮8平5,馬八進七,馬8進7,兵七進一,車9平8,車一平二,車\n8進6,相七進五,車8平7,馬七進六,馬2進1,砲二進七,馬7退8,車二進九,車7退2,仕六進五,車7平4,車九平六,炮2平4,馬三進四,車4退1,砲八進四,卒3進1,砲八平五,士4進5,砲五平一,卒7進1,馬四進五,車4進1,兵七進一,車4平5,砲一進三,將5平4,砲一平三,將4進1,車六平八,車1平2,車八進九,馬1退2,馬六進七,馬2進3,馬七退五',2),(16,'象棋年终总决赛32强战-郑惟桐先和许银川','兵七進一,卒7進1,砲二平三,炮8平5,馬八進七,馬2進1,相三進五,馬8進7,馬二進四,車9平8,車一平二,車8進9,馬四退二,象7進9,車九進一,炮2平3,車九平六,車1平2,車六進六,炮3退1,砲八進五,士6進5,車六平七,馬7進6,車七進一,車2進2,車七進一,車2平4,兵七進一,卒3進1,車七退四,馬6進4,車七退一,馬1進3,馬二進四,車4進1,馬七進六,馬3進4,砲三平二,馬4進6,車七平四,馬6進7,車四退二,卒5進1,車四平三,馬7進9,砲二進二,車4平6,馬四進六,將5平6,仕六進五,炮5進4,帥五平六,炮5平4,帥六平五,車6進5,砲二退四,車6平8,車三平四,將6平5,車四進一,炮4退5,砲二平三,馬9退7,車四退二,士5進6,馬六進七,炮4平6,仕五進四,卒5進1,帥五平六,卒5平6,馬七進五,士6退5,砲三平一,卒6進1,砲一進六,卒6進1,車四進一,車8退6,車四進一,車8平9,車四平三,車9進3',3),(18,'温岭国手赛决赛-许银川VS王天一','馬八進七,卒3進1,兵三進一,馬2進3,馬二進三,車1進1,車九進一,車1平7,砲八進四,馬3進2,馬三進四,象7進5,砲二平五,車7平4,車一進一,馬8進6,車九平六,車4平3,馬四進三,炮8平7,車一平四,車9進1,車四進五,士6進5,砲五平四,車3進2,砲四進六,車3平2,車六平二,車9退1,砲四平二,馬2進3,相三進五,車2進4,砲二退六,炮2平3,馬三退二,炮7平8,砲二進五,炮3平8,車二平七,卒9進1,馬七退五,馬3退4,車四平五,馬4進6,車五退二,車9平6,馬五進三,馬6進7,馬二退三,車6進7,車七平二,炮8平6,車二進八,炮6退2,馬三進二,車2退4,車五進一,車6平8,兵三進一,車8退1,車二退四,車8平9,仕六進五,車9平8,馬二進四,車8退2,兵三平二,卒9進1,車五平六,車2平5,兵五進一,車5進2,馬四進六,炮6進1,車六平四,車5退2',3),(19,'97胡荣华(红)对阵吕钦(黑)','相三進五,炮2平4,車九進一,馬2進3,車九平六,馬8進7,馬八進九,車1平2,兵九進一,車2進4,車六進三,車2平6,馬九進八,卒3進1,砲二退一,士6進5,砲二平七,象7進5,馬二進三,卒7進1,車一平二,車9平8,砲八平七,炮8進1,兵七進一,卒3進1,車六平七,馬3退1,仕四進五,卒1進1,馬八進七,炮8平3,車二進九,馬7退8,車七進二,卒1進1,車七進二,車6平1,車七平八,卒1進1,相五進七,將5平6,前砲進七,象5退3,砲七進八,將6進1,砲七平二,炮4平7,砲二平三,炮7進1,車八退四,炮7進3,砲三退六,卒7進1,砲三平四,卒7進1,砲四退三,卒7進1,相七退五,將6退1,車八平三,將6平5,車三退二,車1平5,車三進七,士5退6,仕五進四,士4進5,車三退六,馬1進3,砲四平一,馬3進4,砲一進六,士5退4,砲一進三,將5進1,兵五進一,車5進1,車三平九,車5進1,車九進五,將5進1,兵一進一,馬4進6,車九平三,車5平8,砲一平六,馬6進4,仕六進五,卒5進1,車三退四,將5退1,兵一進一,將5退1,砲六平七,車8退3,砲七退七,車8平6,兵一平二',3),(20,'2006年 程进超(红)对阵吕钦(黑)','砲二平五,馬8進7,馬二進三,車9平8,車一平二,卒7進1,車二進六,馬2進3,馬八進七,卒3進1,車九進一,炮2進1,車二退二,象3進5,車九平六,士4進5,兵七進一,炮8進2,兵一進一,車1平3,馬三進一,馬3進4,兵一進一,炮2平4,車六平八,卒9進1,砲八進七,炮4退3,砲八平六,卒9進1,砲六平四,士5退6,車二平一,卒3進1,兵三進一,炮8進3,兵三進一,象5進7,車八進四,車3平4,砲五平六,馬4進5,砲六平五,炮8平3,馬一進三,車8進6,馬三退五,車8平5,車八平三,車4進5,車一退一,象7進5,車一平五,象5進7,車五平七,將5平4,車七退一,車4進4,帥五進一,卒3平2,車七進七,將4進1,車七退一,將4退1,車七平四,士6進5,車四退二,馬7進8,車四平五,馬8進9,車五平四,卒2進1,車四退三,馬9進8,砲五平三,馬8進6,帥五平四,卒2進1,相七進五,將4平5,砲三退一,馬6退4,車四平八,卒2平3,帥四平五,馬4進2,相五退七,將5平6,車八平四,將6平5,車四平七,象7退5,相3進5,卒3平4,帥五平四,車4平7,砲三進三,車7退1,帥四退一,車7退1,車七平六,卒4平5,相七進五,車7平6,帥四平五,車6平5,帥五平四,車5平7,砲三平六,車7平6,帥四平五,車6平5,帥五平四,士5進6,砲六平三,象5進7,砲三退三,馬二退三',3),(21,'2007世界象棋大师赛 许银川VS洪智','砲二平五,炮8平5,車一進一,馬8進7,馬二進三,車9平8,車一平六,車8進4,馬八進七,馬2進3,車六進五,炮2進2,車六平七,車1進2,兵七進一,炮2退3,馬七進六,炮2平4,車九平八,車1平2,砲五平七,馬7退5,砲八進四,車8平4,車七進一,車2平3,砲七進五,炮4進4,砲七退一,卒7進1,砲八進一,炮4進1,車八進六,卒1進1,砲七退一,炮5平3,車八平五,炮3進3,砲七進一,車4退2,砲八退一,炮4平7,相三進五,炮3進2,馬三退五,炮3平2,車五退一,炮7平1,馬五進七,炮1平9,車五平三,炮9進3,車三退五,炮9退2,砲七平五,馬5進7,砲五退二,將5進1,相五進三,炮9平8,仕四進五,馬7進6,相三退一,馬6退4,車三進八,將五退一,砲五平三,炮8平7,車三平七,馬4進2,砲八平五',3),(22,'以逸待劳:刘殿中(红)对阵许银川(黑)','兵七進一,象3進5,馬八進七,卒7進1,砲二平五,馬八進七,馬2進3,車9平8,砲八平九,馬2進3,車九平八,車1平2,車一平二,炮8進1,車八進六,卒3進1,車八退二,卒3進1,車八平七,馬3進4,車二進四,炮2平3,車二平六,車2進4,馬七進八,車8進1,砲九平八,車2進1,車七平八,馬4進2,車六平八,車8平3,兵三進一,卒7進1,車八平三,炮3平2,車三平二,炮8退2,馬三進四,炮8平5,馬四進六,車3進3,車二平六,炮5平7,仕四進五,炮7進8,砲八進四,車3進5,馬六進五,象7進5,車六進三,馬7進6,車六平八,士6進5,車八平九,車3平2,車九退一,馬6進4,砲五平四,炮7退5,砲八平一,炮7平3,帥五平四,炮3進5,帥四進一,車2退5,車九退二,車2平7,砲四平八,馬4進3,車九平五,車7平6,仕五進四,馬3進4,帥四平五,馬4退3,帥五進一,車6平2',4),(23,'以逸待劳:胡荣华(红)对阵蒋全胜(黑)','相三進五,卒7進1,馬八進九,炮8平5,馬二進四,車9進1,車九進一,車9平6,車一平三,車6進4,兵三進一,卒7進1,車三進四,車6平7,相五進三,馬2進3,砲八平三,炮5平7,相三退五,象7進5,車九平八,車1平2,車八進三,馬8進6,砲二進六,炮2平1,車八平四,士6進5,車四進一,炮1退1,砲二平三,卒3進1,後砲平四,士5進6,砲三平九,馬3退1,車四進二,炮7進7,仕四進五,馬6進4,馬四進二,炮7退9,馬二進三,士4進5,車四進一,炮7進4,兵五進一,車2進3,砲四平二,馬1進3,砲二進七,馬3進2,帥五平四,士5進6,車四退一,馬2進1,砲二退二,車2平4,車四退一',4),(24,'运子起势:徐天红(红)对阵于幼华(黑)','砲二平五,馬8進7,馬二進三,車9平8,車一平二,馬2進3,馬八進九,卒7進1,砲八平六,車1平2,車九平八,炮2進4,車二進六，馬7進6',4),(25,'左右逢源','砲二平五,馬8進7,馬二進三,車9平8,兵三進一,炮8平9,馬八進七,馬2進3,兵七進一,車1進1,砲八平九,炮2進4,車九平八,炮2平3,仕六進五,車1平4,砲五平四,車8進6,相七進五,車8平7,車一進二,卒7進1,兵三進一,車7退2,車八進三,炮3平4,砲九退二,炮4進2',4);
/*!40000 ALTER TABLE `chess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chess_category`
--

DROP TABLE IF EXISTS `chess_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chess_category` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `pid` int(22) DEFAULT '0',
  `title` varchar(22) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chess_category`
--

LOCK TABLES `chess_category` WRITE;
/*!40000 ALTER TABLE `chess_category` DISABLE KEYS */;
INSERT INTO `chess_category` VALUES (1,0,'好玩招术'),(2,0,'橘中秘(得先)'),(3,0,'象棋比赛'),(4,0,'象棋名局赏析');
/*!40000 ALTER TABLE `chess_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hh_ip`
--

DROP TABLE IF EXISTS `hh_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_ip` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `ip` int(12) DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `times` int(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ip_index` (`ip`),
  KEY `create_date` (`create_date`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hh_ip`
--

LOCK TABLES `hh_ip` WRITE;
/*!40000 ALTER TABLE `hh_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `hh_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hh_user`
--

DROP TABLE IF EXISTS `hh_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hh_user` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` int(10) DEFAULT '0',
  `age` int(22) DEFAULT '0',
  `career` varchar(22) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name_password` (`name`,`password`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hh_user`
--

LOCK TABLES `hh_user` WRITE;
/*!40000 ALTER TABLE `hh_user` DISABLE KEYS */;
INSERT INTO `hh_user` VALUES (2,'test','4297f44b13955235245b2497399d7a93','2012-09-12 13:57:16',1270,0,''),(4,'zhoubc','4297f44b13955235245b2497399d7a93','0000-00-00 00:00:00',0,0,'');
/*!40000 ALTER TABLE `hh_user` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay`
--

LOCK TABLES `pay` WRITE;
/*!40000 ALTER TABLE `pay` DISABLE KEYS */;
INSERT INTO `pay` VALUES (41,450.00,'2012-09-03 11:24:06',21,'李艳梅，替公司缴纳网费450元，今通过中国银行网上银行交付。'),(50,11.50,'2012-09-02 16:00:00',7,'一捆葱2.0\n6个西红柿6.5\n1个菜花3.0\n'),(51,1.00,'2012-09-03 16:00:00',12,'普天早上吃饭:1个烧饼，1碗豆腐脑。'),(52,27.40,'2012-09-04 16:00:00',23,'结膜炎，眼药水两瓶。'),(53,2.50,'2012-09-04 16:00:00',12,'早餐，路摊吃饭。——粥!'),(55,3.00,'2012-09-05 16:00:00',21,'早餐没带钱包，欠芦苇经3.0元。'),(56,30.00,'2012-09-07 16:00:00',7,'买菜，一天的菜！'),(57,100.00,'2012-09-08 16:00:00',15,'充值卡充值，老婆和我的。'),(58,50.00,'2012-09-09 16:00:00',7,'买菜'),(59,100.00,'2012-09-10 16:00:00',12,'中关村大时代吃饭！');
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-21 15:38:43
