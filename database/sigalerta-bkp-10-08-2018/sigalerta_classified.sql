-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: sigalerta
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `classified`
--

DROP TABLE IF EXISTS `classified`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `classified` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cla_name` varchar(200) DEFAULT NULL,
  `cla_phone` varchar(20) DEFAULT NULL,
  `cla_address` varchar(200) DEFAULT NULL,
  `cla_category` varchar(50) DEFAULT NULL,
  `cla_type_category` varchar(50) DEFAULT NULL,
  `cla_subcategory` varchar(50) DEFAULT NULL,
  `cla_description` longtext CHARACTER SET big5 COLLATE big5_chinese_ci,
  `cla_img` varchar(50) DEFAULT NULL,
  `cla_value` decimal(10,2) DEFAULT NULL,
  `cla_date_publish` date DEFAULT NULL,
  `cla_date_change` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classified`
--

LOCK TABLES `classified` WRITE;
/*!40000 ALTER TABLE `classified` DISABLE KEYS */;
INSERT INTO `classified` VALUES (1,'LUIZ FERNANDO DE JESUS COSTA','24998164753','REVERENDO ABDIAS FERREIRA NOBRE','Imóveis',NULL,'Venda','<p>Teste</p>','062de4861d013e795e888dd73cc26403.jpg',45.00,'2018-07-24','2018-07-24'),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'062de4861d013e795e888dd73cc26403.jpg',NULL,'2018-07-25',NULL);
/*!40000 ALTER TABLE `classified` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-10 17:45:19
