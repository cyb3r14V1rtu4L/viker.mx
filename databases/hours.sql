-- MySQL dump 10.17  Distrib 10.3.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: viker_stuff
-- ------------------------------------------------------
-- Server version	10.3.15-MariaDB-1

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
-- Table structure for table `enterprise_opening_hour`
--

DROP TABLE IF EXISTS `enterprise_opening_hour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprise_opening_hour` (
  `hour_id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sun_hour_open` time DEFAULT NULL,
  `sun_hour_close` time DEFAULT NULL,
  `mon_hour_open` time DEFAULT NULL,
  `mon_hour_close` time DEFAULT NULL,
  `tue_hour_open` time DEFAULT NULL,
  `tue_hour_close` time DEFAULT NULL,
  `wed_hour_open` time DEFAULT NULL,
  `wed_hour_close` time DEFAULT NULL,
  `thu_hour_open` time DEFAULT NULL,
  `thu_hour_close` time DEFAULT NULL,
  `fri_hour_open` time DEFAULT NULL,
  `fri_hour_close` time DEFAULT NULL,
  `sat_hour_open` time DEFAULT NULL,
  `sat_hour_close` time DEFAULT NULL,
  `sun_day_open` tinyint(1) DEFAULT 1,
  `mon_day_open` tinyint(1) DEFAULT 1,
  `tue_day_open` tinyint(1) DEFAULT 1,
  `wed_day_open` tinyint(1) DEFAULT 1,
  `thu_day_open` tinyint(1) DEFAULT 1,
  `fri_day_open` tinyint(1) DEFAULT 1,
  `sat_day_open` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`hour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprise_opening_hour`
--

LOCK TABLES `enterprise_opening_hour` WRITE;
/*!40000 ALTER TABLE `enterprise_opening_hour` DISABLE KEYS */;
INSERT INTO `enterprise_opening_hour` VALUES (1,1,31,'09:00:00','22:00:00','06:00:00','22:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00',1,1,1,1,1,1,1),(2,2,34,'00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00','00:00:00',1,1,1,1,1,1,1),(3,7,49,'13:00:00','23:00:00','06:30:00','18:30:00','00:00:00','00:00:00','01:00:00','23:00:00','00:00:00','00:00:00','13:00:00','23:00:00','13:00:00','23:00:00',1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `enterprise_opening_hour` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-08 19:44:57
