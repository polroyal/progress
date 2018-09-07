-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: leavesys
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Current Database: `leavesys`
--
DROP DATABASE IF EXISTS leavesys;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `leavesys` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `leavesys`;

--
-- Table structure for table `leave_request`
--

DROP TABLE IF EXISTS `leave_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_request` (
  `request_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_period` varchar(255) NOT NULL,
  `end_period` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Pending',
  `request_date` date NOT NULL,
  `approved_by` varchar(200) DEFAULT NULL,
  `representative_pj` int(11) NOT NULL,
  `Reason` text,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_request`
--

LOCK TABLES `leave_request` WRITE;
/*!40000 ALTER TABLE `leave_request` DISABLE KEYS */;
INSERT INTO `leave_request` VALUES (1,123,'Annual','2017-03-29','2017-03-31','morning','afternoon','Approved','2017-03-20','Muhindi Karua',0,'approved'),(2,123,'Maternity','2017-04-04','2017-04-04','Morning','Morning','Approved','2017-04-04','Muhindi Karua',0,'approved'),(3,123,'Romantic ','2017-04-04','2017-04-12','Morning','Morning','Approved','2017-04-04','Muhindi Karua',0,'approved'),(4,123,'Annual','2017-04-05','2017-04-05','Morning','Morning','Rejected','2017-04-05','Muhindi Karua',1234,'I hate this guy'),(5,123,'Absent on official duty','0000-00-00','0000-00-00','Morning','Afternoon','Pending','2017-04-05',NULL,900,NULL),(6,123,'Absent on official duty','2017-04-13','2017-05-09','Morning','Morning','Pending','2017-04-05',NULL,1234,NULL),(7,123,'Absent on official duty','2017-04-13','2017-05-09','Morning','Morning','Pending','2017-04-05',NULL,1234,NULL),(8,900,'Romantic ','2017-04-05','2017-05-05','Morning','Afternoon','Approved','2017-04-05','Muhindi Karua',1234,'approved'),(9,900,'Maternity','2017-05-01','2017-05-31','Morning','Afternoon','Rejected','2017-04-05','Muhindi Karua',1234,'Not possible');
/*!40000 ALTER TABLE `leave_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_types` (
  `leave_type` varchar(255) NOT NULL,
  PRIMARY KEY (`leave_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_types`
--

LOCK TABLES `leave_types` WRITE;
/*!40000 ALTER TABLE `leave_types` DISABLE KEYS */;
INSERT INTO `leave_types` VALUES ('Absent on official duty'),('Annual'),('Forced'),('Maternity'),('Romantic '),('Sick');
/*!40000 ALTER TABLE `leave_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `request_v`
--

DROP TABLE IF EXISTS `request_v`;
/*!50001 DROP VIEW IF EXISTS `request_v`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `request_v` AS SELECT 
 1 AS `request_id`,
 1 AS `user_id`,
 1 AS `leave_type`,
 1 AS `start_date`,
 1 AS `end_date`,
 1 AS `start_period`,
 1 AS `end_period`,
 1 AS `status`,
 1 AS `request_date`,
 1 AS `approved_by`,
 1 AS `fullname`,
 1 AS `email`,
 1 AS `user_group`,
 1 AS `representative_pj`,
 1 AS `representative_fullname`,
 1 AS `representative_email`,
 1 AS `reason`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `pj` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group` varchar(255) NOT NULL,
  PRIMARY KEY (`pj`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (123,'Muhindi Karua','karuamuhindi@gmail.com','pass','Admin'),(900,'Don Abner','donabner@gmail.com','pass','Staff'),(1234,'polycarp','pol@domain.com','italia','admin'),(12342,'James John','james@gmail.com','pass','Staff');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `leavesys`
--

USE `leavesys`;

--
-- Final view structure for view `request_v`
--

/*!50001 DROP VIEW IF EXISTS `request_v`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `request_v` AS select `r`.`request_id` AS `request_id`,`r`.`user_id` AS `user_id`,`r`.`leave_type` AS `leave_type`,`r`.`start_date` AS `start_date`,`r`.`end_date` AS `end_date`,`r`.`start_period` AS `start_period`,`r`.`end_period` AS `end_period`,`r`.`status` AS `status`,`r`.`request_date` AS `request_date`,`r`.`approved_by` AS `approved_by`,`u`.`fullname` AS `fullname`,`u`.`email` AS `email`,`u`.`user_group` AS `user_group`,`r`.`representative_pj` AS `representative_pj`,`ur`.`fullname` AS `representative_fullname`,`ur`.`email` AS `representative_email`,`r`.`Reason` AS `reason` from ((`leave_request` `r` left join `users` `u` on((`r`.`user_id` = `u`.`pj`))) left join `users` `ur` on((`r`.`representative_pj` = `ur`.`pj`))) */;
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

-- Dump completed on 2017-04-05 21:10:21
