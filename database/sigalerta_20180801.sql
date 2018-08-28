-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sigalerta
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `advertising`
--

DROP TABLE IF EXISTS `advertising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertising` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `ads_title` varchar(50) DEFAULT NULL,
  `ads_page` varchar(50) NOT NULL,
  `ads_type` varchar(50) NOT NULL,
  `ads_img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertising`
--

LOCK TABLES `advertising` WRITE;
/*!40000 ALTER TABLE `advertising` DISABLE KEYS */;
INSERT INTO `advertising` VALUES (2,'Slide de Teste','Notícias Locais','Horizontal','062de4861d013e795e888dd73cc26403.jpg');
/*!40000 ALTER TABLE `advertising` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classified`
--

DROP TABLE IF EXISTS `classified`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classified` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cla_name` varchar(200) DEFAULT NULL,
  `cla_phone` varchar(20) DEFAULT NULL,
  `cla_address` varchar(200) DEFAULT NULL,
  `cla_category` varchar(50) DEFAULT NULL,
  `cla_type_category` varchar(50) DEFAULT NULL,
  `cla_subcategory` varchar(50) DEFAULT NULL,
  `cla_description` longtext CHARACTER SET big5,
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

--
-- Table structure for table `classified_category`
--

DROP TABLE IF EXISTS `classified_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classified_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cla_cat_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classified_category`
--

LOCK TABLES `classified_category` WRITE;
/*!40000 ALTER TABLE `classified_category` DISABLE KEYS */;
INSERT INTO `classified_category` VALUES (1,'Automóveis'),(2,'Imóveis'),(3,'Diversos');
/*!40000 ALTER TABLE `classified_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forhome`
--

DROP TABLE IF EXISTS `forhome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forhome` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fh_name` varchar(200) NOT NULL,
  `fh_description` longtext,
  `fh_address` varchar(100) DEFAULT NULL,
  `fh_img` varchar(50) DEFAULT NULL,
  `fh_category` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forhome`
--

LOCK TABLES `forhome` WRITE;
/*!40000 ALTER TABLE `forhome` DISABLE KEYS */;
INSERT INTO `forhome` VALUES (1,'Teste','<p>Teste</p>','RUA PRESENDENTE VARGAS 203','1f5e1a582d3aff361ff76c5de8e1bb09.jpg','Jardinagem e Paisagismo');
/*!40000 ALTER TABLE `forhome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `new_title` varchar(200) NOT NULL,
  `new_category` varchar(100) DEFAULT NULL,
  `new_featured` char(3) NOT NULL,
  `new_description` longtext NOT NULL,
  `new_date_time` date NOT NULL,
  `new_img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Teste 2','Local','Nao','<p>Teste</p>','2018-06-28','062de4861d013e795e888dd73cc26403.jpg'),(2,'Teste 3','Política','Sim','<p>teste</p>','2018-06-28','3b317a6429affbf9afb03c131003a850.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nc_title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_category`
--

LOCK TABLES `news_category` WRITE;
/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;
INSERT INTO `news_category` VALUES (1,'Local'),(2,'Estados Unidos'),(3,'Mundo'),(4,'Política'),(5,'Clima'),(6,'Tecnologia'),(7,'Entretenimento'),(8,'Moda');
/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `serv_name` varchar(200) NOT NULL,
  `serv_description` longtext,
  `serv_address` varchar(100) DEFAULT NULL,
  `serv_img` varchar(50) DEFAULT NULL,
  `serv_category` varchar(200) NOT NULL,
  `serv_type_category` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (2,'Teste','<p>Teste</p>','REVERENDO ABDIAS FERREIRA NOBRE','062de4861d013e795e888dd73cc26403.jpg','guincho',NULL);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_category`
--

DROP TABLE IF EXISTS `service_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_category`
--

LOCK TABLES `service_category` WRITE;
/*!40000 ALTER TABLE `service_category` DISABLE KEYS */;
INSERT INTO `service_category` VALUES (1,'Advogado'),(2,'Guincho'),(3,'Restaurantes Brasileiros'),(4,'Agência de Seguros'),(5,'Dentistas'),(6,'Loja de Carros'),(7,'Envio de Dinheiro para o Brasil'),(8,'Academia e Afins');
/*!40000 ALTER TABLE `service_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_login` varchar(20) NOT NULL,
  `user_pass` varchar(8) NOT NULL,
  `user_level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrador',NULL,'root','YWRtaW4=',NULL),(2,'','','','',NULL),(3,'','','','',NULL);
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

-- Dump completed on 2018-08-01 10:30:33
