-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: prototype_week9
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artical`
--

DROP TABLE IF EXISTS `artical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artical` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `artical_classification` varchar(225) NOT NULL,
  `artical_label` varchar(225) NOT NULL,
  `artical_title` varchar(225) NOT NULL,
  `artical_abstract` varchar(255) NOT NULL,
  `artical_cover` varchar(255) NOT NULL,
  `artical_pdf` varchar(255) NOT NULL,
  `artical_isanonymous` int(8) NOT NULL,
  `like_number` int(8) NOT NULL,
  `collection_number` int(8) NOT NULL,
  `writer_id` int(8) NOT NULL,
  `upload_time` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artical`
--

LOCK TABLES `artical` WRITE;
/*!40000 ALTER TABLE `artical` DISABLE KEYS */;
INSERT INTO `artical` VALUES (13,'1','1a4a5a','测试4.22','测试','1.jpg','test.pdf',1,0,0,0,'2022-04-22'),(14,'1','1a4a5a6a7a8a9a10a11a12a','综合2','综合综合','1.jpg','angluo-php-149814.pdf',1,0,0,0,'2022-04-22'),(16,'2','2a','123','','1.jpg','angluo-php-149814.pdf',1,1,0,0,'2022-04-22'),(17,'2','2a','123','','1.jpg','angluo-php-149814.pdf',1,0,0,0,'2022-04-22'),(18,'1','1a4a5a6a7a8a','123','123','1.jpg','logo设计 4.11.2.pdf',1,0,0,0,'2022-04-24');
/*!40000 ALTER TABLE `artical` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artical_classification`
--

DROP TABLE IF EXISTS `artical_classification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artical_classification` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `classification_name` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artical_classification`
--

LOCK TABLES `artical_classification` WRITE;
/*!40000 ALTER TABLE `artical_classification` DISABLE KEYS */;
INSERT INTO `artical_classification` VALUES (1,'生活'),(2,'项目交流'),(3,'升学经验');
/*!40000 ALTER TABLE `artical_classification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artical_label`
--

DROP TABLE IF EXISTS `artical_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artical_label` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(225) NOT NULL,
  `label_father_uid` varchar(225) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artical_label`
--

LOCK TABLES `artical_label` WRITE;
/*!40000 ALTER TABLE `artical_label` DISABLE KEYS */;
INSERT INTO `artical_label` VALUES (1,'游戏','1'),(2,'美学与设计心理学','2'),(3,'出国','3'),(4,'摄影','1'),(5,'购物','1'),(6,'玩耍','1'),(7,'外出','1'),(8,'返校','1'),(9,'食物','1'),(10,'唱歌','1'),(11,'跳舞','1'),(12,'RAP','1');
/*!40000 ALTER TABLE `artical_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `artical_id` int(8) NOT NULL,
  `content` varchar(255) NOT NULL,
  `comment_time` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,1,'写的不错，以后别写了','2022-04-17'),(2,1,'ahsdhasd','2022-04-17'),(3,1,'ahsdhasd','2022-04-17'),(4,6,'没看明白','2022-04-20'),(5,6,'123123','2022-04-20'),(6,6,'123123','2022-04-20'),(7,1,'换行3','2022-04-20'),(8,1,'换行3','2022-04-20');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-28 11:19:31
