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
-- Table structure for table `category_stuff`
--

DROP TABLE IF EXISTS `category_stuff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_stuff` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `enterprise_id` int(11) NOT NULL,
  `tab_cat` int(11) DEFAULT NULL,
  `name_cat` text DEFAULT NULL,
  `desc_cat` text DEFAULT NULL,
  `active_cat` tinyint(2) DEFAULT 1,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_stuff`
--

LOCK TABLES `category_stuff` WRITE;
/*!40000 ALTER TABLE `category_stuff` DISABLE KEYS */;
INSERT INTO `category_stuff` VALUES (1,1,1,'Burgers','Hamburgers',1),(2,1,2,'Jochos','Jochos',1),(3,1,3,'Drinks','Drinks',1),(4,1,4,'Sides','Sides',1),(5,7,0,'Burgers','Default',1),(6,7,0,'Burritos','',1),(7,7,0,'Bebidas','',1),(8,7,0,'Postres','',1),(9,7,0,'Botana','',1);
/*!40000 ALTER TABLE `category_stuff` ENABLE KEYS */;
UNLOCK TABLES;

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
  `name_stuff` text DEFAULT NULL,
  `desc_stuff` text DEFAULT NULL,
  `price_stuff` decimal(10,2) DEFAULT NULL,
  `photo_stuff` text DEFAULT NULL,
  `time_stuff` time DEFAULT NULL,
  `stock_stuff` tinyint(2) DEFAULT 1,
  `active_stuff` varchar(1) DEFAULT '0',
  PRIMARY KEY (`stuff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprise_stuff`
--

LOCK TABLES `enterprise_stuff` WRITE;
/*!40000 ALTER TABLE `enterprise_stuff` DISABLE KEYS */;
INSERT INTO `enterprise_stuff` VALUES (1,1,1,'Marvins','Patty Marvins, lettuce, tomatoes, onions, caramelized hibiscus and quechipo sauce',80.00,'01_marvins.jpg',NULL,1,'1'),(2,1,1,'Greenchy','Patty Marvins, spinach, onions, fried green tomatoes and queseño sauce',70.00,'02_greenchy.jpg',NULL,1,'1'),(3,1,1,'Chorica','Patty Marvins, lettuce, tomatoes, red onions and chorisoya',70.00,'03_chorica.jpg',NULL,1,'1'),(4,1,2,'Marvins Jocho','Seitan-tofu sausage and caremelized onions',70.00,'06_jocho.jpg',NULL,1,'1'),(5,1,1,'Chickita','Fried Seitan, lettuce, tomatoes,onions and quersi sauce',80.00,'04_chiquita.jpg',NULL,1,'1'),(6,1,1,'Sloppy Yaca','Jackfruit in BBQ marinade, lettuce, tomatoes and red onions',70.00,'05_sloppyyaca.jpg',NULL,1,'1'),(10,1,4,'Fried Potatoes','Fried Potatoes with salt.',35.00,'12_papas.jpg',NULL,1,'1'),(11,1,4,'Fried Sweet Potatoes','Fried Sweet Potatoes with salt.',40.00,'12_papas.jpg',NULL,1,'1'),(14,7,5,'Fritxs Burger','Deliciosa carne de lenteja y una rebanada de Kesuavegano®.',70.00,'FritxsBurger.jpg','00:15:00',1,'1'),(15,7,5,'Fritxs Burger Special','Deliciosa carne de lenteja y una rebanada de Kesuavegano® empanizado.',100.00,'FritxsBurgerSpecial.jpg','00:15:00',1,'1'),(16,7,5,'BBQ Chic-P','Deliciosa carne de garbanzo con champiñones, salsa BBQ y una rebanada de Kesuavegano®.',70.00,'BBQChicP.jpg','00:15:00',1,'1'),(17,7,5,'BBQ Chic-P Special','Deliciosa carne de garbanzo con champiñones, salsa BBQ y una rebanada de Kesuavegano® empanizado.',100.00,'BBQChicPSpecial.jpg','00:15:00',1,'1'),(18,7,5,'Kesuavurger','Deliciosa carne de lenteja, una rebanada de piña asada y una rebanada de Kesuavegano®.',70.00,'Kesuavurger.jpg','00:15:00',1,'1'),(19,7,5,'Hawaiianx Burger','Deliciosa carne de lenteja, una rebanada de piña asada y una rebanada de Kesuavegano®.',80.00,'HawaiianxBurger.jpg','00:15:00',1,'1'),(20,7,5,'Kidz Burger','Carne de lenteja y una rebanada de Kesuavegano®. Pan artesanal de la casa! ',50.00,'KidzBurger.jpg','00:15:00',1,'1');
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
  `notes_order` text DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `distance_kms` decimal(2,2) DEFAULT NULL,
  `geo_lat` text DEFAULT NULL,
  `geo_lng` text DEFAULT NULL,
  `geo_str` text DEFAULT NULL,
  `geo_ext` text DEFAULT NULL,
  `geo_int` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `time_prepare` time DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_enterprise`
--

LOCK TABLES `order_enterprise` WRITE;
/*!40000 ALTER TABLE `order_enterprise` DISABLE KEYS */;
INSERT INTO `order_enterprise` VALUES (38,1,30,29,180.00,500.00,150.00,30.00,320.00,'','2017-07-13 17:15:00',NULL,'20.65816810411593','-87.07413230331639','Misión del Castillo 419, Misión del Carmen, 77712 Playa del Carmen, Q.R., México','23','','AUTH','00:30:00'),(39,1,30,1,140.00,150.00,110.00,30.00,10.00,'','2017-07-17 19:28:00',NULL,'20.649269399999998','-87.09714170000001','Calle Canarios, Las Palmas 1, Playa del Carmen, Q.R., México','46','','AUTH','00:00:00'),(40,1,NULL,1,135.00,200.00,105.00,30.00,65.00,'','2017-07-17 19:40:00',NULL,'20.6492564','-87.09715369999998','Calle Canarios, Las Palmas 1, Playa del Carmen, Q.R., México','46','','NEW',NULL),(41,1,30,1,135.00,150.00,105.00,30.00,15.00,'','2017-07-17 19:42:00',NULL,'20.649277299999998','-87.09711349999998','Calle Canarios, Las Palmas 1, Playa del Carmen, Q.R., México','46','','CYCLER',NULL),(42,1,NULL,30,110.00,0.00,123.50,43.50,0.00,'','2017-08-24 01:03:00',NULL,'20.6319584','-87.09820179999997','Calle 9 Sur, Ejidal, 77712 Playa del Carmen, Q.R., Mexico','100','','NEW',NULL),(43,1,30,30,123.40,0.00,80.00,43.40,0.00,'','2017-08-24 01:20:00',NULL,'20.631889800000003','-87.09811250000001','115 Avenida Sur 2, Ejidal, 77712 Playa del Carmen, Q.R., Mexico','10','1850','CYCLER',NULL),(44,1,NULL,30,120.00,0.00,80.00,40.00,0.00,'','2017-08-29 21:59:00',NULL,'20.6318554','-87.09823169999999','Cannot determine address at this location.','15','10','NEW',NULL),(45,1,NULL,30,120.00,200.00,80.00,40.00,80.00,'','2017-08-29 22:09:00',NULL,'20.6318534','-87.09812920000002','115 Avenida Sur 2, Ejidal, 77712 Playa del Carmen, Q.R., Mexico','10','15','NEW',NULL),(46,1,NULL,30,130.00,150.00,80.00,50.00,20.00,'','2017-08-30 16:53:00',NULL,'20.613857212732775','-87.09432530929257','Paseo Xaman - Ha 2, Playacar, 77717 Playa del Carmen, Q.R., Mexico','10','15','NEW',NULL),(47,1,30,30,225.00,300.00,185.00,40.00,75.00,'Con la salsa canabica','2017-08-30 17:00:00',NULL,'20.670291559023912','-87.02579498291016','Prolongación 5ta Avenida, Playa del Carmen, Q.R., México','32','1','CYCLER',NULL),(48,1,NULL,37,210.00,250.00,160.00,50.00,40.00,'Mi favorita de todo el mundo :D','2017-09-12 12:07:00',0.99,'20.6153375904219','-87.0927911996842','Paseo Tulum 3, Playacar, 77717 Playa del Carmen, Q.R., Mexico','mza 19 lote 1 fracc','local 32b','NEW',NULL),(49,1,NULL,29,245.00,500.00,195.00,50.00,255.00,'Sin cebolla','2017-09-12 22:02:00',0.99,'20.630444756827607','-87.09968984127045','Calle 21 Sur Mz44 Lt10, Ejidal, 77712 Playa del Carmen, Q.R., México','','','NEW',NULL),(50,1,NULL,1,110.00,150.00,80.00,30.00,40.00,'','2019-08-25 14:34:00',0.49,'19.543750912524697','-96.91235017825699','Calle Gob. Antonio Nava 41, Miguel Hidalgo, 91140 Xalapa-Enríquez, Ver., México','','','NEW',NULL),(51,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 01:36:00',NULL,'','','','','','NEW',NULL),(52,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 01:54:00',NULL,NULL,NULL,NULL,NULL,NULL,'NEW',NULL),(53,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 03:09:00',NULL,'','','','','','NEW',NULL),(54,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 03:11:00',NULL,'','','','','','NEW',NULL),(55,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 03:14:00',NULL,'','','','','','NEW',NULL),(56,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 03:17:00',NULL,'','','','','','NEW',NULL),(57,1,NULL,1,NULL,NULL,NULL,NULL,NULL,'','2019-08-28 03:23:00',NULL,'','','','','','NEW',NULL),(58,1,NULL,1,100.00,0.00,70.00,30.00,0.00,'','2019-08-29 11:34:00',0.50,'19.5437863','-96.910191','Sin nombre No. 1179 LB, El Mirador, 91170 Xalapa-Enríquez, Ver., México','','','NEW',NULL),(59,1,NULL,1,100.00,0.00,70.00,30.00,0.00,'','2019-08-29 11:38:00',0.50,'19.5437863','-96.910191','Sin nombre No. 1179 LB, El Mirador, 91170 Xalapa-Enríquez, Ver., México','','','NEW',NULL),(60,1,NULL,1,NULL,0.00,NULL,NULL,0.00,'','2019-08-29 11:52:00',NULL,'','','','','','NEW',NULL),(61,1,NULL,1,NULL,0.00,NULL,NULL,0.00,'','2019-08-29 11:55:00',NULL,'','','','','','NEW',NULL),(62,1,NULL,1,NULL,0.00,NULL,NULL,0.00,'','2019-08-29 12:13:00',NULL,'','','','','','NEW',NULL),(63,1,30,1,110.00,0.00,80.00,30.00,0.00,'','2019-08-29 12:28:00',0.50,'19.5437863','-96.910191','Sin nombre No. 1179 LB, El Mirador, 91170 Xalapa-Enríquez, Ver., México','','','CYCLER',NULL);
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
  `geo_lat` text DEFAULT NULL,
  `geo_lng` text DEFAULT NULL,
  `geo_str` text DEFAULT NULL,
  `geo_ext` text DEFAULT NULL,
  `geo_int` text DEFAULT NULL,
  `total_viker` decimal(10,2) DEFAULT NULL,
  `special_delivery` text DEFAULT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_special`
--

LOCK TABLES `order_special` WRITE;
/*!40000 ALTER TABLE `order_special` DISABLE KEYS */;
INSERT INTO `order_special` VALUES (1,NULL,NULL,'20.631914899999998','-87.09820179999997','Calle 9 Sur, Ejidal, 77712 Playa del Carmen, Q.R., Mexico','15','10',NULL,'asef safk aspefk apsokef poaskf opaskf opsak fpoas ksopa','2017-09-12 04:02:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_stuff`
--

LOCK TABLES `order_stuff` WRITE;
/*!40000 ALTER TABLE `order_stuff` DISABLE KEYS */;
INSERT INTO `order_stuff` VALUES (9,NULL,2,4,70.00),(10,NULL,4,2,70.00),(11,NULL,2,4,70.00),(12,NULL,4,2,70.00),(17,NULL,2,4,70.00),(18,NULL,4,2,70.00),(19,NULL,2,4,70.00),(20,NULL,4,2,70.00),(21,NULL,2,4,70.00),(22,NULL,4,2,70.00),(23,NULL,2,4,70.00),(24,NULL,4,2,70.00),(25,NULL,2,4,70.00),(26,NULL,4,2,70.00),(99,38,1,1,80.00),(100,38,2,1,70.00),(101,39,2,1,70.00),(102,39,11,1,40.00),(103,40,6,1,70.00),(104,40,10,1,35.00),(105,41,6,1,70.00),(106,41,10,1,35.00),(107,42,1,1,80.00),(108,43,1,1,80.00),(109,44,1,1,80.00),(110,45,1,1,80.00),(111,46,1,1,80.00),(112,47,1,1,80.00),(113,47,4,1,70.00),(114,47,10,1,35.00),(115,48,5,2,80.00),(116,49,1,2,80.00),(117,49,10,1,35.00),(118,50,1,1,80.00),(119,51,1,1,80.00),(120,52,2,1,70.00),(121,53,1,1,80.00),(122,54,5,1,80.00),(123,55,1,1,80.00),(124,56,1,1,80.00),(125,57,1,1,80.00),(126,57,2,1,70.00),(127,NULL,2,1,70.00),(128,NULL,3,1,70.00),(129,NULL,2,1,70.00),(130,NULL,1,1,80.00),(131,NULL,2,1,70.00),(132,58,2,1,70.00),(133,59,2,1,70.00),(134,60,2,1,70.00),(135,61,2,1,70.00),(136,62,2,1,70.00),(137,63,1,1,80.00),(138,NULL,1,1,80.00),(139,NULL,1,1,80.00),(140,NULL,1,1,80.00),(141,NULL,1,1,80.00),(142,NULL,2,1,70.00),(143,NULL,6,1,70.00),(144,NULL,1,1,80.00),(145,NULL,2,1,70.00),(146,NULL,6,1,70.00),(147,NULL,1,1,80.00),(148,NULL,2,1,70.00),(149,NULL,6,1,70.00);
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
  `street` text DEFAULT NULL,
  `number_ext` text DEFAULT NULL,
  `number_int` text DEFAULT NULL,
  `zip_code` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `frontage_desc` text DEFAULT NULL,
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
  `name_enterprise` text DEFAULT NULL,
  `logo_enterprise` text DEFAULT NULL,
  `active_enterprise` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `geo_lat` text DEFAULT NULL,
  `geo_lng` text DEFAULT NULL,
  `geo_str` text DEFAULT NULL,
  `geo_ext` text DEFAULT NULL,
  `geo_int` text DEFAULT NULL,
  `hour_ini` time DEFAULT NULL,
  `hour_end` time DEFAULT NULL,
  PRIMARY KEY (`enterprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user_enterprise`
--

LOCK TABLES `system_user_enterprise` WRITE;
/*!40000 ALTER TABLE `system_user_enterprise` DISABLE KEYS */;
INSERT INTO `system_user_enterprise` VALUES (1,31,'Marvin\'s Burgers','profile.jpg','1','Veggie Burgers','20.63828079653415','-87.06402251310885','Playa del Carmen, México','','',NULL,NULL),(2,34,'Comet 50\'s Diner','profile.png','1','Veggie Food','20.650102796184292','-87.0611847359711',NULL,NULL,NULL,NULL,NULL),(7,49,'Fritxs',NULL,'1','Veggie','20.649236884729458','-87.09718534536898','Playa del Carmen, México','','46','13:00:00','23:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_user_favorite`
--

LOCK TABLES `system_user_favorite` WRITE;
/*!40000 ALTER TABLE `system_user_favorite` DISABLE KEYS */;
INSERT INTO `system_user_favorite` VALUES (1,5,30,1);
/*!40000 ALTER TABLE `system_user_favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_user_type`
--

DROP TABLE IF EXISTS `system_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_user_type` (
  `type_id` tinyint(2) NOT NULL DEFAULT 0,
  `type` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
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
  `type` tinyint(2) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `membership_id` int(11) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `lang` varchar(5) DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `password_clean` text DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `system_users_system_user_type_type_id_fk` (`type`),
  KEY `system_users_membership_type_id_fk` (`membership_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_users`
--

LOCK TABLES `system_users` WRITE;
/*!40000 ALTER TABLE `system_users` DISABLE KEYS */;
INSERT INTO `system_users` VALUES (1,'cyberio@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'Cyberio','Lpez',NULL,1,'VKR','EN',1,'2016-11-25 02:13:33',NULL,NULL),(29,'cyberia@virtual.net','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'Cyber','Dellic',NULL,NULL,'VKR','EN',1,'2017-03-29 01:14:38',NULL,NULL),(30,'cyber@punk.mx','7c4a8d09ca3762af61e59520943dc26494f8941b',3,'Cyber','Punk',NULL,NULL,'VKR','EN',1,'2017-03-29 01:33:06',NULL,NULL),(31,'marvins@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'Marvins','Burger',NULL,NULL,'VKR','EN',1,'2017-03-29 01:36:18',NULL,NULL),(32,'cyberia@virtual.nete','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'ca','lo',NULL,NULL,'VKR','EN',1,'2017-06-11 02:23:32',NULL,NULL),(33,'cybbberio@giamil.com','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'CARLOS','LOPEZ',NULL,NULL,'VKR','EN',1,'2017-06-11 02:50:38',NULL,NULL),(34,'comet@viker.mx','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'Comet','50\'s Diner',NULL,NULL,'VKR','EN',0,'2017-06-23 00:48:45',NULL,NULL),(37,'selenibia@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'Selene','Martinez',NULL,NULL,'VIKER','EN',0,'2017-09-12 16:44:56',NULL,NULL),(39,'cybberio@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'Cyberio','Lopez',NULL,NULL,'VIKER','EN',0,'2017-09-18 23:30:41',NULL,NULL),(40,'cyberio@live.com','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'Cyberio','Lopez',NULL,NULL,'VIKER','EN',0,'2017-09-19 01:44:18',NULL,NULL),(41,'cyberia.virtual@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'Cyberia','Virtual',NULL,NULL,'VIKER','EN',0,'2017-09-19 03:10:46',NULL,NULL),(42,'sidronio.aeiou@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b',2,'Sidronio','Teichmann',NULL,NULL,'VIKER','EN',0,'2017-10-03 18:36:12',NULL,NULL),(49,'fritxs.mx@gmail.com','8cb2237d0679ca88db6464eac60da96345513964',1,'Fritxs','Vegan Munchies',NULL,NULL,'VIKER','EN',0,'2019-08-26 18:02:00','12345','(551) 798-7304'),(50,'djimenezt@gmail.com','52b5adf2ebbb40eaea424e1bc73060860e1e95d9',2,'Daniel','Jimenez',NULL,NULL,'VIKER','EN',0,'2019-09-03 03:12:36','brain666','(684) 027-8743');
/*!40000 ALTER TABLE `system_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validations`
--

DROP TABLE IF EXISTS `validations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validations` (
  `user_id` int(11) NOT NULL DEFAULT 0,
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
INSERT INTO `validations` VALUES (1,1,0,'2016-05-25 10:49:12',1,'2017-06-17 16:40:29',NULL),(29,NULL,0,NULL,1,'2017-04-04 18:35:36',NULL),(30,NULL,0,NULL,1,'2017-03-28 20:33:15',NULL),(31,NULL,0,NULL,1,'2017-03-28 20:48:00',NULL),(32,NULL,0,NULL,0,NULL,NULL),(33,NULL,0,NULL,0,NULL,NULL),(34,NULL,0,NULL,1,'2017-06-22 04:20:00',NULL),(37,NULL,0,NULL,1,'2017-09-12 11:45:27',NULL),(38,NULL,0,NULL,0,NULL,NULL),(39,NULL,0,NULL,1,'2017-09-18 18:32:26',NULL),(40,NULL,0,NULL,0,NULL,NULL),(41,NULL,0,NULL,1,'2017-09-18 22:13:33',NULL),(42,NULL,0,NULL,1,'2017-10-03 13:36:38',NULL),(43,NULL,0,NULL,0,NULL,NULL),(49,NULL,0,NULL,1,'2019-08-27 08:58:41',NULL),(50,NULL,0,NULL,1,'2019-09-03 05:13:47',NULL);
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
/*!50013 DEFINER=`viker`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_system_users` AS select `system_users`.`user_id` AS `user_id`,`system_users`.`username` AS `username`,`system_users`.`password` AS `password`,`system_users`.`first_name` AS `first_name`,`system_users`.`last_name` AS `last_name`,`system_users`.`bio` AS `bio`,`system_users`.`membership_id` AS `membership_id`,`system_users`.`company` AS `company`,`system_users`.`lang` AS `lang`,`system_users`.`active` AS `active`,`system_users`.`date_created` AS `date_created`,`validations`.`val` AS `val`,`validations`.`val_on` AS `val_on`,`validations`.`signed_agree` AS `signed_agree`,`validations`.`signed_on` AS `signed_on`,`validations`.`is_supervisor` AS `is_supervisor`,`validations`.`unsubscribe` AS `unsubscribe`,`system_user_type`.`type` AS `type`,`system_user_type`.`type_id` AS `type_id`,`system_users`.`password_clean` AS `password_clean` from ((`system_users` left join `validations` on(`system_users`.`user_id` = `validations`.`user_id`)) left join `system_user_type` on(`system_users`.`type` = `system_user_type`.`type_id`)) */;
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

-- Dump completed on 2019-11-06 18:35:29
