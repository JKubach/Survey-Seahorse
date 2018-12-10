-- MySQL dump 10.13  Distrib 5.6.42, for FreeBSD11.2 (amd64)
--
-- Host: localhost    Database: seahorse
-- ------------------------------------------------------
-- Server version	5.6.42

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
-- Table structure for table `answer_numeric`
--

DROP TABLE IF EXISTS `answer_numeric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_numeric` (
  `answer_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL,
  `survey_id` smallint(5) unsigned NOT NULL,
  `question_number` tinyint(3) unsigned NOT NULL,
  `answer` tinyint(4) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_numeric`
--

LOCK TABLES `answer_numeric` WRITE;
/*!40000 ALTER TABLE `answer_numeric` DISABLE KEYS */;
INSERT INTO `answer_numeric` VALUES (1,5,1,1,7),(2,5,1,2,4),(3,5,1,3,10),(4,6,2,1,3),(5,6,2,2,8),(6,6,2,3,6),(7,5,3,1,5),(8,5,3,2,5),(9,5,3,3,5),(10,5,3,4,5),(11,5,3,5,5),(12,6,4,1,5),(13,6,4,2,9),(14,6,4,3,1),(15,6,4,4,10),(16,6,4,5,3),(17,7,1,1,10),(18,7,1,2,3),(19,7,1,3,8),(20,8,4,1,4),(21,8,4,2,10),(22,8,4,3,5),(23,8,4,4,8),(24,8,4,5,2),(25,6,1,1,10),(26,6,1,2,7),(27,6,1,3,6);
/*!40000 ALTER TABLE `answer_numeric` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `question_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `survey_id` smallint(5) unsigned NOT NULL,
  `question_number` tinyint(3) unsigned NOT NULL,
  `question_content` varchar(100) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,1,1,'How good is Wawa coffee?'),(2,1,2,'How good are Wawa hoagies?'),(3,1,3,'Overall, how highly do you rate Wawa?'),(4,2,1,'How much you like making surveys?'),(5,2,2,'How would you rate this website?'),(6,2,3,'How much do you like taking surveys?'),(7,4,1,'a'),(8,4,2,''),(9,4,3,''),(10,4,4,''),(11,4,5,'');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `survey_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL,
  `access_code` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `type` bit(2) NOT NULL,
  `number_questions` tinyint(3) unsigned NOT NULL,
  `creation_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `one_shot` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (1,5,'rotten swordfish','Wawa Survey','admin','See how much you like wawa','\0',3,'2018-12-10','2018-12-11','\0'),(2,5,'ruthless seahorse','Survey Survey','admin','See how much you like surveys','\0',3,'2018-12-10','2018-12-10','\0'),(3,6,'glamorous eel','A new survey','dliotta96','Are surveys fun?','\0',5,'2018-12-10','1970-01-01',''),(4,6,'plucky narwhal','New Survey','dliotta96','a new one','\0',5,'2018-12-10','1970-01-01','\0');
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  `blocked` bit(2) NOT NULL DEFAULT b'0',
  `registration_date` datetime NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'kubachj9@students.rowan.edu','jkubach','password','','\0','2018-12-07 20:00:00','\0'),(5,'johnkubach@gmail.com','admin','$2y$10$thb4I3XONTHYuSKSieqbI.ebNUmghcO8eJFYSoUd8KpDCdi/96xWy','\0','\0','2018-12-08 22:02:50','\0'),(6,'dliotta96@gmail.com','dliotta96','$2y$10$bHGT2rsyqlxoFHnWXbRoo.qkKXJdgliJA.3r0.Q.PG08s6S4W7XKC','\0','\0','2018-12-10 03:33:23','\0'),(7,'thejackdonahue@gmail.com','jdonahue','$2y$10$xZouIBD8/aYQ.TiQIwoh8.qNV3EhwfMU2GBmHto7TNrtwI0TCwmIW','\0','\0','2018-12-10 17:43:35','\0'),(8,'andreww107@gmail.com','Weatherbae','$2y$10$6l6hPaJZPseZgcXr/2SbKeera4wKwrkTjmQs7p4ePZntKXa4V935W','\0','\0','2018-12-10 17:53:10','\0');
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

-- Dump completed on 2018-12-10 20:32:54
