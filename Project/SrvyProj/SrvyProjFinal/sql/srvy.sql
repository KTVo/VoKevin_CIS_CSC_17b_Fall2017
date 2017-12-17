-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: srvy
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (2,'Kevin','Vo','admin@yahoo.com','$2y$10$xKCKYsq795MeCdtId5KD3eSckvZ7N00GBd.KLl4U0hRpEqqAQ5wxy','c9892a989183de32e976c6f04e700201',0);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer_entity`
--

DROP TABLE IF EXISTS `answer_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_entity` (
  `id_answer` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text,
  `choice` int(11) DEFAULT NULL,
  `id_question` int(11) NOT NULL,
  `id_survey` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_answer`,`id_question`,`id_survey`,`id_user`),
  KEY `fk_answer_entity_question_entity1_idx` (`id_question`,`id_survey`,`id_user`),
  CONSTRAINT `fk_answer_entity_question_entity1` FOREIGN KEY (`id_question`, `id_survey`, `id_user`) REFERENCES `question_entity` (`id_question`, `id_survey`, `id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_entity`
--

LOCK TABLES `answer_entity` WRITE;
/*!40000 ALTER TABLE `answer_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_entity`
--

DROP TABLE IF EXISTS `question_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_entity` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `id_survey` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_question`,`id_survey`,`id_user`),
  KEY `fk_question_entity_survey_entity1_idx` (`id_survey`,`id_user`),
  CONSTRAINT `fk_question_entity_survey_entity1` FOREIGN KEY (`id_survey`, `id_user`) REFERENCES `survey_entity` (`id_survey`, `id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_entity`
--

LOCK TABLES `question_entity` WRITE;
/*!40000 ALTER TABLE `question_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result_entity`
--

DROP TABLE IF EXISTS `result_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result_entity` (
  `id_choice` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) DEFAULT NULL,
  `answer` text,
  `id_survey` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_choice`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result_entity`
--

LOCK TABLES `result_entity` WRITE;
/*!40000 ALTER TABLE `result_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `result_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_entity`
--

DROP TABLE IF EXISTS `survey_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_entity` (
  `id_survey` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_survey`,`id_user`),
  KEY `fk_survey_entity_user_entity_idx` (`id_user`),
  CONSTRAINT `fk_survey_entity_user_entity` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_entity`
--

LOCK TABLES `survey_entity` WRITE;
/*!40000 ALTER TABLE `survey_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'Kevin','Vo','user1@yahoo.com','$2y$10$KvxjT2L7dD9y98LJeo67FOMhYTjVgoc/bqUH2uIUkFVCSGIMf8Zge','96b9bff013acedfb1d140579e2fbeb63',0),(10,'Jason','Vo','user2@yahoo.com','$2y$10$rsFDfiZwO4uShjR4dMgUweoy5usMxsoeJ76LOq0TnVb1Xwa/AcmFy','c16a5320fa475530d9583c34fd356ef5',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-16 22:11:15
