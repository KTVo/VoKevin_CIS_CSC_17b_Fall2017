-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
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
INSERT INTO `answer_entity` VALUES (9,'yellow',0,5,1,1),(10,'red',0,5,1,1),(11,'blue',0,5,1,1),(12,'white',0,5,1,1),(13,'yellow',0,6,1,1),(14,'blue',0,6,1,1),(15,'white ',0,6,1,1),(16,'red',0,6,1,1),(41,'a',0,17,11,2),(42,'a',0,17,11,2),(43,'a',0,17,11,2),(44,'a',0,17,11,2),(45,'b',0,18,11,2),(46,'b',0,18,11,2),(47,'b',0,18,11,2),(48,'b',0,18,11,2),(49,'C ',0,19,12,4),(50,'JAVA',0,19,12,4),(51,'PYTHON',0,19,12,4),(52,'PHP',0,19,12,4),(53,'C ',0,20,12,4),(54,'JAVA',0,20,12,4),(55,'MATLAB',0,20,12,4),(56,'PHP',0,20,12,4),(57,'Chinese Food',0,21,13,5),(58,'American Food',0,21,13,5),(59,'Japanese Food',0,21,13,5),(60,'French Food',0,21,13,5),(61,'grape',0,22,13,5),(62,'orange',0,22,13,5),(63,'banana',0,22,13,5),(64,'watermelon',0,22,13,5),(96,'a',0,33,21,3),(97,'a',0,33,21,3),(98,'a',0,33,21,3),(99,'a',0,33,21,3),(100,'lalal',0,34,21,3),(101,'la',0,34,21,3),(102,'las',0,34,21,3),(103,'jun',0,35,23,3),(104,'jun',0,35,23,3),(105,'un',0,35,23,3),(106,'jun',0,35,23,3),(107,'j',0,36,24,8),(108,'j',0,36,24,8),(109,'j',0,36,24,8),(110,'j',0,36,24,8),(111,'j',0,36,24,8),(112,'j',0,36,24,8),(113,'j',0,36,24,8),(114,'j',0,36,24,8),(115,'j',0,36,24,8),(116,'j',0,36,24,8),(117,'i',0,38,24,8),(118,'i',0,38,24,8),(119,'i',0,38,24,8),(120,'i',0,38,24,8),(121,'i',0,38,24,8),(122,'2',0,39,24,8),(123,'2',0,39,24,8),(124,'2',0,39,24,8),(125,'2',0,39,24,8),(126,'2',0,39,24,8),(127,'4',0,40,24,8),(128,'4',0,40,24,8),(129,'4',0,40,24,8),(130,'4',0,40,24,8),(131,'4',0,40,24,8),(132,'1',0,41,26,8),(133,'1',0,41,26,8),(134,'1',0,41,26,8),(135,'1',0,41,26,8),(136,'1',0,41,26,8),(156,'q',0,46,28,8),(157,'q',0,46,28,8),(158,'q',0,46,28,8),(159,'q',0,46,28,8),(160,'q',0,46,28,8),(161,'e',0,47,28,8),(162,'e',0,47,28,8),(163,'e',0,47,28,8),(164,'e',0,47,28,8),(165,'e',0,47,28,8),(170,'s',0,49,30,8),(171,'s',0,49,30,8),(172,'s',0,49,30,8),(173,'s',0,49,30,8),(182,'a',0,52,34,8),(183,'a',0,52,34,8),(184,'a',0,52,34,8),(185,'a',0,52,34,8),(186,'a',0,52,34,8),(187,'c',0,53,34,8),(188,'c',0,53,34,8),(189,'c',0,53,34,8),(190,'c',0,53,34,8),(191,'c',0,53,34,8),(192,'a',0,52,34,8),(193,'a',0,52,34,8),(194,'a',0,52,34,8),(195,'a',0,52,34,8),(196,'a',0,52,34,8),(197,'c',0,53,34,8),(198,'c',0,53,34,8),(199,'c',0,53,34,8),(200,'c',0,53,34,8),(201,'c',0,53,34,8);
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
INSERT INTO `question_entity` VALUES (5,'favorite color',1,1),(6,'dislike color',1,1),(7,'favorite color',1,1),(8,'dislike color',1,1),(9,'favorite color',1,1),(10,'dislike color',1,1),(17,'aaaaa',11,2),(18,'bbb',11,2),(19,'favorite programming language',12,4),(20,'first learnt programming language',12,4),(21,'favorite food',13,5),(22,'favorite fruit',13,5),(33,'bb',21,3),(34,'city',21,3),(35,'jun',23,3),(36,'j',24,8),(37,'j',24,8),(38,'i',24,8),(39,'2',24,8),(40,'4',24,8),(41,'1',26,8),(42,'2',26,8),(43,'4',26,8),(46,'q',28,8),(47,'e',28,8),(48,'q',29,8),(49,'s',30,8),(50,'q',31,8),(51,'q',31,8),(52,'a',34,8),(53,'c',34,8),(54,'a',34,8),(55,'c',34,8);
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
INSERT INTO `result_entity` VALUES (1,12,'JAVA',12),(2,12,'JAVA',12),(3,19,'PHP',12),(4,20,'C ',12),(5,19,'JAVA',12),(6,20,'JAVA',12),(7,19,'JAVA',12),(8,20,'JAVA',12),(9,19,'JAVA',12),(10,20,'C ',12),(11,19,'JAVA',12),(12,20,'JAVA',12),(13,19,'JAVA',12),(14,20,'JAVA',12),(15,21,'Chinese Food',13),(16,22,'grape',13),(17,21,'American Food',13),(18,22,'banana',13),(19,21,'Chinese Food',13),(20,22,'grape',13),(21,21,'Japanese Food',13),(22,22,'watermelon',13),(23,17,'a',11),(24,18,'b',11),(25,17,'a',11),(26,18,'b',11),(27,17,'a',11),(28,18,'b',11),(29,25,'c',15),(30,25,'b',15),(31,29,'a',17),(32,30,'red',17),(33,29,'d',17),(34,30,'yellow',17),(35,29,'c',17),(36,30,'red',17),(37,35,'jun',23),(38,35,'un',23),(39,46,'q',28),(40,47,'e',28),(41,46,'q',28),(42,47,'e',28),(43,46,'q',28),(44,47,'e',28);
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
  CONSTRAINT `fk_survey_entity_user_entity` FOREIGN KEY (`id_user`) REFERENCES `user_entity` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_entity`
--

LOCK TABLES `survey_entity` WRITE;
/*!40000 ALTER TABLE `survey_entity` DISABLE KEYS */;
INSERT INTO `survey_entity` VALUES (1,'color',1),(4,'color',1),(5,'color',1),(6,'color',1),(7,'color',1),(11,'food',2),(12,'CS',4),(13,'favorite items',5),(14,'food',7),(21,'test123',3),(22,'test123',3),(23,'jun',3),(24,'test',8),(25,'test',8),(26,'new_title',8),(28,'new_title3',8),(29,'new_title4',8),(30,'new_title7',8),(31,'new_title8',8),(32,'new_title8',8),(33,'new_title8',8),(34,'new_title10',8),(35,'new_title10',8);
/*!40000 ALTER TABLE `survey_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_entity`
--

DROP TABLE IF EXISTS `user_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_entity` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_entity`
--

LOCK TABLES `user_entity` WRITE;
/*!40000 ALTER TABLE `user_entity` DISABLE KEYS */;
INSERT INTO `user_entity` VALUES (1,'test17','test17@example.com','Test17abc'),(2,'test18','test18@example.com','Test18abc'),(3,'STAT','STAT@EXAMPLE.COM','stat17ABC'),(4,'Test19','test19@example.com','Test19abc'),(5,'surveytest','surveytest@example.com','surveyTest17'),(6,'user22','user22@example.com','User22abc'),(7,'mario','mario@example.com','Mario12345'),(8,'free','f@example.com','FREE12345abc');
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

-- Dump completed on 2017-12-07  0:09:28
