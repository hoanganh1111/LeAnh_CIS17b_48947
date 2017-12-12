-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 209.129.8.7    Database: DnD_48947
-- ------------------------------------------------------
-- Server version	5.5.58-0ubuntu0.14.04.1

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
-- Table structure for table `admin_entity`
--

DROP TABLE IF EXISTS `admin_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_entity` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_entity`
--

LOCK TABLES `admin_entity` WRITE;
/*!40000 ALTER TABLE `admin_entity` DISABLE KEYS */;
INSERT INTO `admin_entity` VALUES (1,'Stanley','Yang','stanley316868@gmail.com','Yyang316868'),(2,'Anh','Le','anhhoangle1111@gmail.com','Anhle12345'),(3,'Brian','Ramirez','ramirezb777@gmail.com','Bramirez246');
/*!40000 ALTER TABLE `admin_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `char_entity`
--

DROP TABLE IF EXISTS `char_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `char_entity` (
  `char_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) DEFAULT NULL,
  `str` int(10) DEFAULT NULL,
  `con` int(10) DEFAULT NULL,
  `int` int(10) DEFAULT NULL,
  `dex` int(10) DEFAULT NULL,
  `hp` int(10) DEFAULT NULL,
  `mp` int(10) DEFAULT NULL,
  `defence` int(10) DEFAULT NULL,
  `attack` int(10) DEFAULT NULL,
  `mattack` int(10) DEFAULT NULL,
  `speed` int(10) DEFAULT NULL,
  `sight` int(10) DEFAULT NULL,
  `x_loc` int(10) DEFAULT NULL,
  `y_loc` int(10) DEFAULT NULL,
  `inventory` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`char_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `char_entity`
--

LOCK TABLES `char_entity` WRITE;
/*!40000 ALTER TABLE `char_entity` DISABLE KEYS */;
INSERT INTO `char_entity` VALUES (1,2,2,3,4,5,6,7,8,9,10,11,3,1,2,'stringfy'),(2,3,9,6,7,5,3,9,8,5,4,7,3,2,3,'teststringfy'),(3,4,8,7,54,3,3,2,7,9,0,8,3,3,1,'Bob_test'),(4,5,2,4,5,7,9,5,3,2,6,8,4,1,2,'Dan_test');
/*!40000 ALTER TABLE `char_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_enum`
--

DROP TABLE IF EXISTS `class_enum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_enum` (
  `class_id` int(10) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_enum`
--

LOCK TABLES `class_enum` WRITE;
/*!40000 ALTER TABLE `class_enum` DISABLE KEYS */;
INSERT INTO `class_enum` VALUES (1,'All'),(2,'Fighter'),(3,'Knight'),(4,'Mage'),(5,'Archer');
/*!40000 ALTER TABLE `class_enum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_entity`
--

DROP TABLE IF EXISTS `item_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_entity` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `class` int(10) DEFAULT NULL,
  `str` int(10) DEFAULT NULL,
  `con` int(10) DEFAULT NULL,
  `int` int(10) DEFAULT NULL,
  `dex` int(10) DEFAULT NULL,
  `hp` int(10) DEFAULT NULL,
  `mp` int(10) DEFAULT NULL,
  `defence` int(10) DEFAULT NULL,
  `attack` int(5) DEFAULT NULL,
  `mattack` int(10) DEFAULT NULL,
  `speed` int(10) DEFAULT NULL,
  `signt` int(10) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_entity`
--

LOCK TABLES `item_entity` WRITE;
/*!40000 ALTER TABLE `item_entity` DISABLE KEYS */;
INSERT INTO `item_entity` VALUES (1,1,2,3,4,5,6,7,8,9,0,11,12,'this is a test item that can be used by any class'),(2,2,1,2,3,4,5,6,7,8,9,0,1,'this is a test item specificly for fighter'),(3,3,1,9,7,5,8,9,5,3,6,8,9,'this is a test item specificly for knight'),(4,4,8,6,5,4,3,3,8,9,7,5,4,'this is a test tiem specificly for mage'),(5,5,9,76,5,4,6,8,9,47,5,5,3,'this is a test item specificly for archer');
/*!40000 ALTER TABLE `item_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_entity`
--

DROP TABLE IF EXISTS `room_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_entity` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `char_id_1` int(10) DEFAULT NULL,
  `char_id_2` int(10) DEFAULT NULL,
  `char_id_3` int(10) DEFAULT NULL,
  `char_id_4` int(10) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_entity`
--

LOCK TABLES `room_entity` WRITE;
/*!40000 ALTER TABLE `room_entity` DISABLE KEYS */;
INSERT INTO `room_entity` VALUES (1,1,2,3,4);
/*!40000 ALTER TABLE `room_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_char_xref`
--

DROP TABLE IF EXISTS `user_char_xref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_char_xref` (
  `xref_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `char_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`xref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_char_xref`
--

LOCK TABLES `user_char_xref` WRITE;
/*!40000 ALTER TABLE `user_char_xref` DISABLE KEYS */;
INSERT INTO `user_char_xref` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4);
/*!40000 ALTER TABLE `user_char_xref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_entity`
--

DROP TABLE IF EXISTS `user_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_entity` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_entity`
--

LOCK TABLES `user_entity` WRITE;
/*!40000 ALTER TABLE `user_entity` DISABLE KEYS */;
INSERT INTO `user_entity` VALUES (3,'Bob','Bobs','bob@rcc.edu','bob123','Bob12345'),(4,'Dan','Dang','dandang@yahoo.com','dandang123','password'),(5,'test1First','test1Last','test1@gmail.com','test1user','test1pass'),(6,'stanley','yang','stanley316868@gmail.com','yyang316868','Yyang316868d'),(7,'Anh','Le','Annnnnn@gmail.com','aleeeee','Anhlewer'),(8,'test4last','test4last','TEEESSS@gmail.com','test3','ttteeesss');
/*!40000 ALTER TABLE `user_entity` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-06  3:05:33
