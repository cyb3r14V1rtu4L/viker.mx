-- MySQL dump 10.15  Distrib 10.0.32-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: viker_stuff
-- ------------------------------------------------------
-- Server version	10.0.32-MariaDB-0+deb8u1

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
-- Table structure for table `category_stuff`
--

DROP TABLE IF EXISTS `category_stuff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_stuff` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_id` int(11) NOT NULL,
  `tab_cat` int(11) DEFAULT NULL,
  `name_cat` text,
  `desc_cat` text,
  `active_cat` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_stuff`
--

LOCK TABLES `category_stuff` WRITE;
/*!40000 ALTER TABLE `category_stuff` DISABLE KEYS */;
INSERT INTO `category_stuff` VALUES (1,1,1,'Burgers','Hamburgers',1),(2,1,2,'Jochos','Jochos',1),(3,1,3,'Drinks','Drinks',1),(4,1,4,'Sides','Sides',1),(5,2,1,'Burgers','Default',1),(6,2,0,'','',1),(7,2,0,'','',1);
/*!40000 ALTER TABLE `category_stuff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprise_stuff`
--

DROP TABLE IF EXISTS `enterprise_stuff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprise_stuff` (
  `stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_stuff` text,
  `desc_stuff` text,
  `price_stuff` decimal(10,2) DEFAULT NULL,
  `photo_stuff` text,
  `time_stuff` time DEFAULT NULL,
  `stock_stuff` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`stuff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprise_stuff`
--

LOCK TABLES `enterprise_stuff` WRITE;
/*!40000 ALTER TABLE `enterprise_stuff` DISABLE KEYS */;
INSERT INTO `enterprise_stuff` VALUES (1,1,1,'Marvins','Patty Marvins, lettuce, tomatoes, onions, caramelized hibiscus and quechipo sauce',80.00,'01_marvins.jpg','30:00:00',1),(2,1,1,'Greenchy','Patty Marvins, spinach, onions, fried green tomatoes and queseño sauce',70.00,'02_greenchy.jpg','30:00:00',1),(3,1,1,'Chorica','Patty Marvins, lettuce, tomatoes, red onions and chorisoya',70.00,'03_chorica.jpg','30:00:00',1),(4,1,2,'Marvins Jocho','Seitan-tofu sausage and caremelized onions',70.00,'06_jocho.jpg','30:00:00',1),(5,1,1,'Chickita','Fried Seitan, lettuce, tomatoes,onions and quersi sauce',80.00,'04_chiquita.jpg','30:00:00',1),(6,1,1,'Sloppy Yaca','Jackfruit in BBQ marinade, lettuce, tomatoes and red onions',70.00,'05_sloppyyaca.jpg','30:00:00',1),(10,1,4,'Fried Potatoes','Fried Potatoes with salt.',35.00,'12_papas.jpg','30:00:00',1),(11,1,4,'Fried Sweet Potatoes','Fried Sweet Potatoes with salt.',40.00,'12_papas.jpg','30:00:00',1);
/*!40000 ALTER TABLE `enterprise_stuff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_enterprise`
--

DROP TABLE IF EXISTS `order_enterprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_enterprise` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_id` int(11) DEFAULT NULL,
  `cycler_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_order` decimal(10,2) DEFAULT NULL,
  `total_pay` decimal(10,2) DEFAULT NULL,
  `total_pay_real` decimal(10,2) DEFAULT NULL,
  `total_vikers` decimal(10,2) DEFAULT NULL,
  `total_change` decimal(10,2) DEFAULT NULL,
  `notes_order` text,
  `date_order` datetime DEFAULT NULL,
  `distance_kms` decimal(2,2) DEFAULT NULL,
  `geo_lat` text,
  `geo_lng` text,
  `geo_str` text,
  `geo_ext` text,
  `geo_int` text,
  `status` text,
  `time_prepare` time DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_enterprise`
--

LOCK TABLES `order_enterprise` WRITE;
/*!40000 ALTER TABLE `order_enterprise` DISABLE KEYS */;
INSERT INTO `order_enterprise` VALUES (50,1,30,54,230.00,500.00,190.00,40.00,270.00,'Con THC porfavor','2018-02-15 22:06:00',0.99,'20.6492651','-87.09711829999998','Calle Canarios, Las Palmas 1, Playa del Carmen, Q.R., México','','','DELIVERED','14:10:00'),(51,1,30,1,75.00,100.00,35.00,40.00,25.00,'','2018-02-27 16:59:00',0.99,'20.6492425','-87.09716609999998','Calle Canarios, Las Palmas 1, Playa del Carmen, Q.R., México','420','360','DELIVERED','00:00:00');
/*!40000 ALTER TABLE `order_enterprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_special`
--

DROP TABLE IF EXISTS `order_special`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_special` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `viker_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `geo_lat` text,
  `geo_lng` text,
  `geo_str` text,
  `geo_ext` text,
  `geo_int` text,
  `total_viker` decimal(10,2) DEFAULT NULL,
  `special_delivery` text,
  `special_delivery_where` text,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_special`
--

LOCK TABLES `order_special` WRITE;
/*!40000 ALTER TABLE `order_special` DISABLE KEYS */;
INSERT INTO `order_special` VALUES (3,NULL,53,'20.6647391','-87.07930269999997','Av los Olivos, Quintana Roo, Mexico','Fase 2, lote 4, Cerrada Uva, Casa 29','29',50.00,'COMIDA','Los Olivos, Fase 2, Lote 4, Cerrada UVA, cASA 29','2018-03-02 21:54:45','NEW');
/*!40000 ALTER TABLE `order_special` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_stuff`
--

DROP TABLE IF EXISTS `order_stuff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_stuff` (
  `order_stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `stuff_id` int(11) DEFAULT NULL,
  `how_many_stuff` int(11) DEFAULT NULL,
  `price_stuff` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_stuff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_stuff`
--

LOCK TABLES `order_stuff` WRITE;
/*!40000 ALTER TABLE `order_stuff` DISABLE KEYS */;
INSERT INTO `order_stuff` VALUES (9,NULL,2,4,70.00),(10,NULL,4,2,70.00),(11,NULL,2,4,70.00),(12,NULL,4,2,70.00),(17,NULL,2,4,70.00),(18,NULL,4,2,70.00),(19,NULL,2,4,70.00),(20,NULL,4,2,70.00),(21,NULL,2,4,70.00),(22,NULL,4,2,70.00),(23,NULL,2,4,70.00),(24,NULL,4,2,70.00),(25,NULL,2,4,70.00),(26,NULL,4,2,70.00),(99,38,1,1,80.00),(100,38,2,1,70.00),(101,39,2,1,70.00),(102,39,11,1,40.00),(103,40,6,1,70.00),(104,40,10,1,35.00),(105,41,6,1,70.00),(106,41,10,1,35.00),(107,42,1,1,80.00),(108,43,1,1,80.00),(109,44,1,1,80.00),(110,45,1,1,80.00),(111,46,1,1,80.00),(112,47,1,1,80.00),(113,47,4,1,70.00),(114,47,10,1,35.00),(115,48,5,2,80.00),(116,49,1,2,80.00),(117,49,10,1,35.00),(118,50,5,1,80.00),(119,50,4,1,70.00),(120,50,11,1,40.00),(121,51,10,1,35.00);
/*!40000 ALTER TABLE `order_stuff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user_address`
--

DROP TABLE IF EXISTS `system_user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `street` text,
  `number_ext` text,
  `number_int` text,
  `zip_code` text,
  `city` text,
  `frontage_desc` text,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user_address`
--

LOCK TABLES `system_user_address` WRITE;
/*!40000 ALTER TABLE `system_user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user_enterprise`
--

DROP TABLE IF EXISTS `system_user_enterprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user_enterprise` (
  `enterprise_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name_enterprise` text,
  `logo_enterprise` text,
  `active_enterprise` text,
  `category` text,
  `geo_lat` text,
  `geo_lng` text,
  `geo_str` text,
  `geo_ext` text,
  `geo_int` text,
  `hour_ini` time DEFAULT NULL,
  `hour_end` time DEFAULT NULL,
  PRIMARY KEY (`enterprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user_enterprise`
--

LOCK TABLES `system_user_enterprise` WRITE;
/*!40000 ALTER TABLE `system_user_enterprise` DISABLE KEYS */;
INSERT INTO `system_user_enterprise` VALUES (1,31,'Marvin\'s Burgers','profile.jpg','1','Veggie Burgers','20.638295856990894','-87.06401714869082','Calle Quinta Avenida, Luis Donaldo Colosio, 77728 Playa del Carmen, Q.R., México','420','500',NULL,NULL),(2,34,'Comet 50\'s Diner','profile.png','1','Veggie Food','20.650102796184292','-87.0611847359711','Calle 9 Sur, Ejidal, 77712 Playa del Carmen, Q.R., México',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `system_user_enterprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user_favorite`
--

DROP TABLE IF EXISTS `system_user_favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user_favorite` (
  `favorite_id` int(11) NOT NULL AUTO_INCREMENT,
  `stuff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `enterprise_id` int(11) NOT NULL,
  PRIMARY KEY (`favorite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user_favorite`
--

LOCK TABLES `system_user_favorite` WRITE;
/*!40000 ALTER TABLE `system_user_favorite` DISABLE KEYS */;
INSERT INTO `system_user_favorite` VALUES (1,1,1,1),(2,5,54,1);
/*!40000 ALTER TABLE `system_user_favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user_type`
--

DROP TABLE IF EXISTS `system_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user_type` (
  `type_id` tinyint(2) NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user_type`
--

LOCK TABLES `system_user_type` WRITE;
/*!40000 ALTER TABLE `system_user_type` DISABLE KEYS */;
INSERT INTO `system_user_type` VALUES (1,'enterprise',NULL),(2,'customer',NULL),(3,'cycler',NULL),(4,'customer',NULL),(5,'traveler',NULL),(6,'content',NULL);
/*!40000 ALTER TABLE `system_user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_clean` varchar(255) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` text,
  `bio` text,
  `membership_id` int(11) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `lang` varchar(5) DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `system_users_system_user_type_type_id_fk` (`type`),
  KEY `system_users_membership_type_id_fk` (`membership_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_users`
--

LOCK TABLES `system_users` WRITE;
/*!40000 ALTER TABLE `system_users` DISABLE KEYS */;
INSERT INTO `system_users` VALUES (1,'cyberio@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'Cyberio','Lpez','(999)-999-9999',NULL,1,'VKR','EN',1,'2016-11-25 02:13:33'),(29,'cyberia@virtual.net','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',1,'Cyber','Dellic','(999)-999-9999',NULL,NULL,'VKR','EN',1,'2017-03-29 01:14:38'),(30,'cyber@punk.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Cyber','Punk','(999)-999-9999',NULL,NULL,'VKR','EN',1,'2017-03-29 01:33:06'),(31,'marvins@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',1,'Macario','Chu','(999)-999-9999',NULL,NULL,'VKR','EN',1,'2017-03-29 01:36:18'),(32,'cyberia@virtual.nete','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'ca','lo','(999)-999-9999',NULL,NULL,'VKR','EN',1,'2017-06-11 02:23:32'),(33,'cybbberio@giamil.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'CARLOS','LOPEZ','(999)-999-9999',NULL,NULL,'VKR','EN',1,'2017-06-11 02:50:38'),(34,'comet@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',1,'Comet','50\'s Diner','(999)-999-9999',NULL,NULL,'VKR','EN',0,'2017-06-23 00:48:45'),(37,'selenibia@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'Selene','Martinez','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-09-12 16:44:56'),(38,'canarios 46','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'Daniel','yañez','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-09-18 20:31:35'),(39,'cybbberio@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Cyberio','Lopez','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-09-18 23:30:41'),(40,'cyberio@live.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'Cyberio','Lopez','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-09-19 01:44:18'),(41,'cyberia.virtual@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'Cyberia','Virtual','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-09-19 03:10:46'),(42,'sidronio.aeiou@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',2,'Sidronio','Teichmann','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-03 18:36:12'),(43,'jon@bo.vi','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Jon','Bovi','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 03:58:43'),(44,'coconut@alav.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'cyberio','lopez','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 04:05:42'),(45,'zentucyber@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Cyber','Zentura','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 05:01:54'),(46,'wood.zen@om.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Zen','Wood','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 05:05:46'),(48,'macario@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Macario','Chu','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 19:55:04'),(49,'macario@mac.dev','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Macario','Dahs','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 19:55:55'),(50,'macario@hufmann.lsd','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Macario','Lisergic','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-11 20:01:53'),(51,'cybberio@gmail.com','14ffb9e044b226ecd52ec3651fc9b6086b712180','fooood',3,'Cycler','Clicerio','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-12 04:45:22'),(52,'ojorrojo.rec@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','123456',3,'Ojor','rojo','(999)-999-9999',NULL,NULL,'VIKER','EN',0,'2017-10-12 16:28:02'),(53,'kishonbrwn@yahoo.com','18f299e203c190c4251cb6798868e42464911d43','papstry101',2,'Kishon','Brown','(998) 164-5502',NULL,NULL,'VIKER','EN',0,'2018-02-10 12:47:07'),(54,'kanaibisibia@gmail.com','5fdee8dba005231fabd7f6266637a4666a91d388','Melpomene132',2,'Selene','Martinez','(552) 563-6251',NULL,NULL,'VIKER','EN',0,'2018-02-16 02:49:06');
/*!40000 ALTER TABLE `system_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validations`
--

DROP TABLE IF EXISTS `validations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validations` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `is_supervisor` tinyint(2) DEFAULT NULL,
  `signed_agree` tinyint(2) DEFAULT NULL,
  `signed_on` datetime DEFAULT NULL,
  `val` tinyint(2) DEFAULT NULL,
  `val_on` datetime DEFAULT NULL,
  `unsubscribe` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validations`
--

LOCK TABLES `validations` WRITE;
/*!40000 ALTER TABLE `validations` DISABLE KEYS */;
INSERT INTO `validations` VALUES (1,1,0,'2016-05-25 10:49:12',1,'2017-06-17 16:40:29',NULL),(29,NULL,0,NULL,1,'2017-04-04 18:35:36',NULL),(30,NULL,0,NULL,1,'2017-03-28 20:33:15',NULL),(31,NULL,0,NULL,1,'2017-03-28 20:48:00',NULL),(32,NULL,0,NULL,0,NULL,NULL),(33,NULL,0,NULL,0,NULL,NULL),(34,NULL,0,NULL,1,'2017-06-22 04:20:00',NULL),(37,NULL,0,NULL,1,'2017-09-12 11:45:27',NULL),(38,NULL,0,NULL,0,NULL,NULL),(39,NULL,0,NULL,0,'2017-09-18 18:32:26',NULL),(40,NULL,0,NULL,0,NULL,NULL),(41,NULL,0,NULL,1,'2017-09-18 22:13:33',NULL),(42,NULL,0,NULL,1,'2017-10-03 13:36:38',NULL),(43,NULL,0,NULL,0,NULL,NULL),(44,NULL,0,NULL,1,'2017-10-10 23:06:20',NULL),(45,NULL,0,NULL,0,NULL,NULL),(46,NULL,0,NULL,0,NULL,NULL),(48,NULL,0,NULL,0,NULL,NULL),(49,NULL,0,NULL,0,NULL,NULL),(50,NULL,0,NULL,0,NULL,NULL),(51,NULL,0,NULL,1,'2017-10-12 00:45:48',NULL),(52,NULL,0,NULL,1,'2017-10-12 11:31:46',NULL),(53,NULL,0,NULL,1,'2018-02-10 06:48:04',NULL),(54,NULL,0,NULL,1,'2018-02-15 20:49:46',NULL);
/*!40000 ALTER TABLE `validations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_system_users`
--

DROP TABLE IF EXISTS `vw_system_users`;
/*!50001 DROP VIEW IF EXISTS `vw_system_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_system_users` (
  `user_id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `password` tinyint NOT NULL,
  `first_name` tinyint NOT NULL,
  `last_name` tinyint NOT NULL,
  `bio` tinyint NOT NULL,
  `membership_id` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `lang` tinyint NOT NULL,
  `active` tinyint NOT NULL,
  `date_created` tinyint NOT NULL,
  `val` tinyint NOT NULL,
  `val_on` tinyint NOT NULL,
  `signed_agree` tinyint NOT NULL,
  `signed_on` tinyint NOT NULL,
  `is_supervisor` tinyint NOT NULL,
  `unsubscribe` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `type_id` tinyint NOT NULL,
  `password_clean` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_system_users`
--

/*!50001 DROP TABLE IF EXISTS `vw_system_users`*/;
/*!50001 DROP VIEW IF EXISTS `vw_system_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_system_users` AS select `system_users`.`user_id` AS `user_id`,`system_users`.`username` AS `username`,`system_users`.`password` AS `password`,`system_users`.`first_name` AS `first_name`,`system_users`.`last_name` AS `last_name`,`system_users`.`bio` AS `bio`,`system_users`.`membership_id` AS `membership_id`,`system_users`.`company` AS `company`,`system_users`.`lang` AS `lang`,`system_users`.`active` AS `active`,`system_users`.`date_created` AS `date_created`,`validations`.`val` AS `val`,`validations`.`val_on` AS `val_on`,`validations`.`signed_agree` AS `signed_agree`,`validations`.`signed_on` AS `signed_on`,`validations`.`is_supervisor` AS `is_supervisor`,`validations`.`unsubscribe` AS `unsubscribe`,`system_user_type`.`type` AS `type`,`system_user_type`.`type_id` AS `type_id`,`system_users`.`password_clean` AS `password_clean` from ((`system_users` left join `validations` on((`system_users`.`user_id` = `validations`.`user_id`))) left join `system_user_type` on((`system_users`.`type` = `system_user_type`.`type_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-18 12:01:49
