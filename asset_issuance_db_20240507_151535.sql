-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: asset_issuance_db
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `asset_issuance`
--

DROP TABLE IF EXISTS `asset_issuance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_issuance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `issuance_date` date NOT NULL,
  `asset_type` varchar(50) NOT NULL,
  `device_model` varchar(100) DEFAULT NULL,
  `service_tag` varchar(100) DEFAULT NULL,
  `serial_number` varchar(100) NOT NULL,
  `laptop_bag` enum('Yes','No') NOT NULL,
  `mouse` enum('Yes','No') NOT NULL,
  `connector` enum('Yes','No') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_issuance`
--

LOCK TABLES `asset_issuance` WRITE;
/*!40000 ALTER TABLE `asset_issuance` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_issuance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_stock`
--

DROP TABLE IF EXISTS `asset_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asset_stock` (
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Serial_number` varchar(255) DEFAULT NULL,
  `Configuration` varchar(255) DEFAULT NULL,
  `Performance` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_stock`
--

LOCK TABLES `asset_stock` WRITE;
/*!40000 ALTER TABLE `asset_stock` DISABLE KEYS */;
INSERT INTO `asset_stock` VALUES ('Name','Type','Serial number','Configuration','Performance','Status','Comments'),('Laptop','HP','123456','Core i5','8GB RAM','Active','Good condition'),('Desktop','Dell','789012','Core i7','16GB RAM','Inactive','Needs maintenance'),('Printer','Epson','345678','N/A','N/A','Active','Working fine'),('Name','Type','Serial number','Configuration','Performance','Status','Comments'),('Laptop','HP','123456','Core i5','8GB RAM','Active','Good condition'),('Desktop','Dell','789012','Core i7','16GB RAM','Inactive','Needs maintenance'),('Printer','Epson','345678','N/A','N/A','Active','Working fine'),('Name','Type','Serial number','Configuration','Performance','Status','Comments'),('Laptop','HP','123456','Core i5','8GB RAM','Active','Good condition'),('Desktop','Dell','789012','Core i7','16GB RAM','Inactive','Needs maintenance'),('Printer','Epson','345678','N/A','N/A','Active','Working fine'),('Temp','Mobile','78965413.0','16+512','Performance','Good',''),('Name','Type','Serial number','Configuration','Performance','Status','Comments'),('Laptop','HP','123456','Core i5','8GB RAM','Active','Good condition'),('Desktop','Dell','789012','Core i7','16GB RAM','Inactive','Needs maintenance'),('Printer','Epson','345678','N/A','N/A','Active','Working fine');
/*!40000 ALTER TABLE `asset_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_update`
--

DROP TABLE IF EXISTS `stock_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_update` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Serial_number` varchar(255) DEFAULT NULL,
  `Configuration` varchar(255) DEFAULT NULL,
  `Performance` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_update`
--

LOCK TABLES `stock_update` WRITE;
/*!40000 ALTER TABLE `stock_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_update` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-07 15:15:35
