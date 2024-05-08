-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: asset_issuance_db
-- ------------------------------------------------------
-- Server version	8.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
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
  `mouse` enum('Yes','No') NOT NULL,
  `connector` enum('Yes','No') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_issuance`
--

LOCK TABLES `asset_issuance` WRITE;
/*!40000 ALTER TABLE `asset_issuance` DISABLE KEYS */;
INSERT INTO `asset_issuance` VALUES (11,'Himabindu WFH','','','2021-03-01','S11','','C07SW3TCG1HW','C07SW3TCG1HW','No','No','2024-05-08 10:46:27'),(17,'Eshwar D','','','2021-01-01','M-book','','FVFVX693HV22, 3CH83811B2','FVFVX693HV22, 3CH83811B2','No','No','2024-05-08 10:46:27'),(18,'Kamlesh','','','2021-02-04','Windows Laptop','','Dell Vostro 5402 ST: DG8PF63','Dell Vostro 5402 ST: DG8PF63','No','No','2024-05-08 10:46:27'),(19,'Raja Manohar','','','2021-03-30','Windows Laptop + Boat airdopes','','Dell Vostro 5402 ST: B7Q2Z93','Dell Vostro 5402 ST: B7Q2Z93','No','No','2024-05-08 10:46:27'),(23,'Akash Kulkarni','','','2021-07-23','Windows laptop','','Lenovo Thinkpad E15, SN: PF30H7ZF','Lenovo Thinkpad E15, SN: PF30H7ZF','No','No','2024-05-08 10:46:27'),(24,'Varsha R','','','2021-07-24','Macbook Air + connector','','C02DX0D6Q6M0','C02DX0D6Q6M0','No','No','2024-05-08 10:46:27'),(26,'Nishant Gupta','','','2021-09-10','Windows laptop','','Lenovo Thinkpad E14, SN: PG02JQZ9','Lenovo Thinkpad E14, SN: PG02JQZ9','No','No','2024-05-08 10:46:27'),(27,'Sujit P','','','2021-09-13','Windows laptop','','Lenovo Thinkpad E15, SN: PF31JVD5','Lenovo Thinkpad E15, SN: PF31JVD5','No','No','2024-05-08 10:46:27'),(28,'Saranya V','','','2021-09-15','Windows laptop','','Lenovo Thinkpad E14, SN: PG02JR13','Lenovo Thinkpad E14, SN: PG02JR13','No','No','2024-05-08 10:46:27'),(29,'Prashanth Rawoor','','','2021-10-06','Windows laptop','','Lenovo Thinkpad E14, SN: PG02JR5D','Lenovo Thinkpad E14, SN: PG02JR5D','No','No','2024-05-08 10:46:27'),(32,'Monika G','','','2021-11-18','Windows laptop','','Latitude 3420 Service Tag: 44XDJG3','Latitude 3420 Service Tag: 44XDJG3','No','No','2024-05-08 10:46:27'),(34,'Garvit','','','2021-12-24','Macbook air','','C02GV5AEQ6LR','C02GV5AEQ6LR','No','No','2024-05-08 10:46:27'),(35,'Pavan Rawoor','','','2022-01-02','Windows laptop + connector','','2.11107E+17','2.11107E+17','No','No','2024-05-08 10:46:27'),(36,'Soujanya','','','2022-01-28','Macbook Air','','C02FM1VCQ6LR','C02FM1VCQ6LR','No','No','2024-05-08 10:46:27'),(38,'Sanith','','','2022-03-17','Windows laptop','','Lenovo V15 G2, SN: PG02ZFBT','Lenovo V15 G2, SN: PG02ZFBT','No','No','2024-05-08 10:46:27'),(44,'Ankush','','','2022-08-16','Windows laptop + connector','','Lenovo Thinkpad E15, SN: PF31J2VZ','Lenovo Thinkpad E15, SN: PF31J2VZ','No','No','2024-05-08 10:46:27'),(45,'Sonu','','','2022-08-22','macbook Air + connector','','FVFJ4UNLQ6LR','FVFJ4UNLQ6LR','No','No','2024-05-08 10:46:27'),(46,'Ayush Ganvir','','','2022-08-29','s18 macmini + mini DP to HDMi cable','','C07SH2ZQG1HW','C07SH2ZQG1HW','No','No','2024-05-08 10:46:27'),(47,'Aaris Khan','','','2022-09-05','macbook Air + 2connectors','','FVFJ93851WG7','FVFJ93851WG7','No','No','2024-05-08 10:46:27'),(48,'Pragati Patil','','','2022-10-03','Windows laptop','','Realme book: 210925801001000870','Realme book: 210925801001000870','No','No','2024-05-08 10:46:27'),(49,'Vikram','','','2022-10-06','macbook Air','','FVFJG3G81WG7','FVFJG3G81WG7','No','No','2024-05-08 10:46:27'),(51,'Veera','','','2022-10-17','Windows laptop','','Lenovo V15 G2, SN: PG03830V','Lenovo V15 G2, SN: PG03830V','No','No','2024-05-08 10:46:27'),(55,'Ayush Ganvir','','','2022-11-08','macbook Air + connector','','C02JG030Q6LR','C02JG030Q6LR','No','No','2024-05-08 10:46:27'),(57,'Sarthak','','','2022-11-24','macbook Air + connector and nord earbuds','','C02JG033Q6LR','C02JG033Q6LR','No','No','2024-05-08 10:46:27'),(62,'Bhavna Raheja','','','2022-12-26','Windows laptop + nord earbuds','','Lenovo V15 G2, SN: PG03E5TC','Lenovo V15 G2, SN: PG03E5TC','No','No','2024-05-08 10:46:27'),(64,'Raj shukla','','','2023-01-09','Windows laptop','','Lenovo V15 G2, SN: PG03E5RD','Lenovo V15 G2, SN: PG03E5RD','No','No','2024-05-08 10:46:27'),(66,'Ramya Rao','','','2023-01-25','Windows laptop','','Latitude 3420 Service Tag: HQSDJG3','Latitude 3420 Service Tag: HQSDJG3','No','No','2024-05-08 10:46:27'),(67,'Gopi','','','2023-02-12','Macbook Air + connector + nord earbuds','','C02H53X8Q6LR','C02H53X8Q6LR','No','No','2024-05-08 10:46:27'),(74,'Himanshu','','','2023-04-27','Windows laptop','','Dell Vostro 5402 ST: 86Q2Z93','Dell Vostro 5402 ST: 86Q2Z93','No','No','2024-05-08 10:46:27'),(76,'Parikshit Singh','','','2023-05-29','Macbook Air + connector','','C02GC2QXQ6LR','C02GC2QXQ6LR','No','No','2024-05-08 10:46:27'),(77,'Ankush','','','2023-05-25','S37','','macmini','macmini','No','No','2024-05-08 10:46:27'),(78,'Adarsh Vikram Rai','','','2023-06-01','Windows','','Lenovo Thinkpad E15, SN: PF2X5QYH','Lenovo Thinkpad E15, SN: PF2X5QYH','No','No','2024-05-08 10:46:27'),(81,'Sanskar','','','2023-06-08','Windows laptop','','Lenovo v15 G2 PG03E6BZ i5+16GB+512GB','Lenovo v15 G2 PG03E6BZ i5+16GB+512GB','No','No','2024-05-08 10:46:27'),(82,'Asha B','','','2023-06-12','Windows laptop','','Realme S/n 210907801002000004','Realme S/n 210907801002000004','No','No','2024-05-08 10:46:27'),(87,'Ankush','','','2023-07-25','Windows laptop','','Lenovo Thinkpad E15, SN: PF3166CA','Lenovo Thinkpad E15, SN: PF3166CA','No','No','2024-05-08 10:46:27'),(89,'Chinna','','','2023-07-31','Macbook Air + connector','','FVFKT7BY1WFV + Applecare+ July 2026','FVFKT7BY1WFV + Applecare+ July 2026','No','No','2024-05-08 10:46:27'),(91,'Laxmi J','','','2023-07-31','Macbook Air + connector','','GDMW5QD73J + Applecare+ July 2026','GDMW5QD73J + Applecare+ July 2026','No','No','2024-05-08 10:46:27'),(92,'Vikrant Shakya','','','2023-08-21','Macbook Air + connector + mouse','','L9LNXTQVYX + Applecare+ Aug 06, 2026 M2+16GB+256GB','L9LNXTQVYX + Applecare+ Aug 06, 2026 M2+16GB+256GB','No','No','2024-05-08 10:46:27'),(94,'Mudit Mahajan','','','2023-09-27','Macbook Air + connector','','FYDYTC6WNF + Applecare+ July 2026 M2+16GB','FYDYTC6WNF + Applecare+ July 2026 M2+16GB','No','No','2024-05-08 10:46:27'),(96,'Sneha Visamsetty','','','2023-10-04','Macbook Air M1+16GB','','C02J90FPQ6LR','C02J90FPQ6LR','No','No','2024-05-08 10:46:27'),(97,'Kishore Chandrashekar','','','2023-10-05','Lenovo Thinkpad E15','','SN: PF32EJE5, i5+8GB+512GB','SN: PF32EJE5, i5+8GB+512GB','No','No','2024-05-08 10:46:27'),(98,'Sambath S','','','2023-10-20','Macbook Air + connector','','JY279JLKF1 + Applecare+ July 2026 M2+16GB','JY279JLKF1 + Applecare+ July 2026 M2+16GB','No','No','2024-05-08 10:46:27'),(100,'Abhishek kumar','','','2023-10-30','Macbook Air + connector','','C02JK5AYQ6LR','C02JK5AYQ6LR','No','No','2024-05-08 10:46:27'),(101,'Shravanti D','','','2023-11-02','Windows laptop','','Dell 3410- ST: DTX3B63','Dell 3410- ST: DTX3B63','No','No','2024-05-08 10:46:27'),(103,'Ravali P','','','2023-11-10','Windows laptop','','Lenovo Thinkpad E15, SN: PF31JAA8','Lenovo Thinkpad E15, SN: PF31JAA8','No','No','2024-05-08 10:46:27'),(104,'Abhishek Rana','','','2023-11-15','Windows laptop','','Latitude 3410 - ST: 7VYVN93','Latitude 3410 - ST: 7VYVN93','No','No','2024-05-08 10:46:27'),(105,'Raj Shukla','','','2023-11-24','Windows laptop','','Lenovo Thinkpad E15, SN: PF30Y6R9','Lenovo Thinkpad E15, SN: PF30Y6R9','No','No','2024-05-08 10:46:27'),(107,'Deval J','','','2023-12-18','Windows laptop','','Lenovo v15 G2 PG02XY3J','Lenovo v15 G2 PG02XY3J','No','No','2024-05-08 10:46:27'),(109,'Shashank Kumar','','','2024-01-03','Macbook Air','','FVFJ557FQ6LR','FVFJ557FQ6LR','No','No','2024-05-08 10:46:27'),(110,'Shruti Mathew','','','2024-01-15','Macbook Air + connector','','MWGDCC4PDX','MWGDCC4PDX','No','No','2024-05-08 10:46:27'),(111,'Vishnuvardhan','','','2024-01-15','Macbook Air + connector + mouse','','GVVXGGWRM6','GVVXGGWRM6','No','No','2024-05-08 10:46:27'),(112,'Saurav Kumar','','','2024-01-24','Windows + Mouse','','Lenovo V15 G2, SN: PG02ZEV2','Lenovo V15 G2, SN: PG02ZEV2','No','No','2024-05-08 11:14:02'),(113,'Shashank','','','2024-02-07','macbook Air + 2connectors','','FVFJ557FQ6LR','FVFJ557FQ6LR','No','No','2024-05-08 11:14:02'),(114,'Shubham Kale','','','2024-02-08','Windows laptop','','DELL Latitude 3420 SN: BSSNS93	','DELL Latitude 3420 SN: BSSNS93	','No','No','2024-05-08 11:14:02'),(115,'Sharathchandra D','','','2024-02-19','Macbook Air + connector + mouse','','C02H34BNQ6LR','C02H34BNQ6LR','No','No','2024-05-08 11:14:02'),(116,'Naveen Kumar','','','2024-02-23','Macbook Air + connector','','C02J90FPQ6LR','C02J90FPQ6LR','No','No','2024-05-08 11:14:02'),(117,'Vijay Singh Bisht','','','2024-04-01','Windows laptop','','','','No','No','2024-05-08 11:14:02'),(118,'Chairag Yadav','','','2024-04-15','Macbook Air + connector + mouse','','C02GF2XAQ6LR','C02GF2XAQ6LR','No','No','2024-05-08 11:14:02'),(119,'Udesh Kumar','','','2024-04-15','Macbook Air + connector','','C02JK09BQ6LR','C02JK09BQ6LR','No','No','2024-05-08 11:14:02'),(120,'Vijay Singh Bisht','','','2024-04-16','Macbook Air M1','','FVFJH5D71WG7','FVFJH5D71WG7','No','No','2024-05-08 11:14:02'),(121,'Haricharan M','','','2024-04-22','Windows laptop','','Dell Latitude 3410 - ST: DVYVN93','Dell Latitude 3410 - ST: DVYVN93','No','No','2024-05-08 11:14:02'),(122,'Pranali','Retrotax','--','2024-05-06','Laptop','s58','7852452','Chinna using this','No','No','2024-05-08 12:59:19');
/*!40000 ALTER TABLE `asset_issuance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_update`
--

DROP TABLE IF EXISTS `stock_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_update`
--

LOCK TABLES `stock_update` WRITE;
/*!40000 ALTER TABLE `stock_update` DISABLE KEYS */;
INSERT INTO `stock_update` VALUES (1,'Old macbook pro','Macbook Pro','FVFXX01NHV27','','-','','broken dispaly/ keyboard replaced to Eshwar'),(2,'Vikrams old macbook air','Macbook Air','','','Basic','','Basic first gen Macbook Air'),(3,'Mudit Mahajan','Macbook Pro','FVFYP04PJ9K8 keys popping out','intel + 16GB - 250GB','Standard','Verified and Reset','Keys popped out, (Shyams old laptop)'),(4,'Chinna/Shahrukh Macbook','Macbook Air','C02FT2XLQ6L4','M1+ 8GB + 256GB','Standard','','(battery/board issue) can be used with charger connected'),(5,'Megha Laddha','Windows laptop','Dell Inspiron 3593 - 8R42V43','i3+8GB+1TB','Basic','','Outdated configuration, can be used for basic desk jobs'),(6,'Amita old dell','Windows laptop','Inspiron 15 3567 - C8DDYD2','i3+8GB+1TB','Basic','','Outdated configuration, can be used for basic desk jobs'),(7,'Asha B','Windows laptop','Latitude 3490 - 8X74YQ2','i3+8GB+1TB','Basic','','Outdated configuration, can be used for basic desk jobs'),(8,'Vinay Belidhe','Windows laptop','Lenovo Thinkpad E15, SN: PF2ZSQS8','i5+16GB+256GB','Performance','Verified and Reset','H key popped-out'),(9,'Sourabh Sapkade','Windows laptop','Lenovo Thinkpad E15, SN: PF2ZT3YW','i5+16GB+256GB','Performance','Verified and Reset','G and H keys not working'),(10,'Dattatreya replaced','Windows laptop','Latitude 3400 ST: J1PBNT2','i7+16gb+256GB+8GB graphics','Power','Verified and Reset','100 % working'),(11,'Gopiraju','Windows laptop','Dell 3410- ST: 2F2L503','i7+8GB+512GB+1TB','Standard','Verified and Reset','100 % working'),(12,'Nena Singha','Windows laptop','Dell inspiron 3501 - 8DDMFD3','i5+8GB+1TB + 256gb ssd','Standard','Verified and Reset','SSD corrupted'),(13,'Shruti Gupta HR','Windows laptop','Realme S/n 211007801002001000','i5+8GB+512GB','Standard','Verified and Reset','100 % working'),(14,'Ankush Temporary','Windows laptop','Lenovo Thinkpad E15, SN: PF3166CA','i5+8GB+512GB','Standard','Verified and Reset','loong beep'),(15,'SREEJA HR','Windows laptop','Realme S/n 211109801002001819','i5+8GB+512GB','Standard','Pending reset','Eshwar using'),(16,'Rajesh','Windows Laptop','Dell 3410: ST: 37WN203','i7+16GB+512GB+1TB','Performance','Pending reset','100 % working'),(17,'Srinivas','Windows laptop','Lenovo Thinkbook 15, SN: LR0EPTG9 8GB+256GB+1TB','','Standard','Pending reset','100 % working'),(18,'Kishore','Windows laptop','Lenovo Thinkpad E15, SN: PF2T9VWM','','','POWER FAILURE',''),(19,'Anil','Macbook Pro','C02V8T54HV22','i5+8GB+128GB','','Shyam need this',''),(20,'Anirudh','Macbook Air','C02J535XQ6LR','','','Shyam need this',''),(21,'Shravanti D','Windows laptop','Realme S/n 211009801001000838','i5+8GB+512GB','Standard','FIND IT',''),(22,'Shubham Kale','Windows laptop','Lenovo Thinkbook 15, SN: LR0EPTF8','','','',''),(23,'Ravali','Windows laptop','Realmebook S/N: 210907801001001715','','','Hinges broken',''),(24,'Ajay vardhan','Macbook Air','C02H70HNQ6LT','','','',''),(25,'avni','Windows laptop','Lenovo SMP23XA5C','','','',''),(26,'Shirin','Windows laptop','Lenovo v15 G2 PG03E5SZ','','','',''),(27,'RAGHUVEER','Windows laptop','Realmebook 211008801002000755','','','',''),(28,'Swetha T','','Dell Latitude 3410 - ST: G6Q2Z93','','','','');
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

-- Dump completed on 2024-05-08 18:45:59
