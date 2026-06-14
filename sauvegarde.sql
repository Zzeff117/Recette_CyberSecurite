-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: appdb
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_logs`
--

LOCK TABLES `audit_logs` WRITE;
/*!40000 ALTER TABLE `audit_logs` DISABLE KEYS */;
INSERT INTO `audit_logs` VALUES (1,'admin@test.local','Test audit','2026-06-06 11:08:07'),(2,'test@test.com','LOGIN_FAILED','2026-06-07 00:42:54'),(3,'test@test.com','LOGIN_FAILED','2026-06-07 00:43:05'),(4,'test@test.com','LOGIN_FAILED','2026-06-07 00:43:12'),(5,'test@test.com','LOGIN_FAILED','2026-06-07 00:43:17'),(6,'test@test.com','LOGIN_FAILED','2026-06-07 00:43:23'),(7,'test@test.com','LOGIN_SUCCESS','2026-06-07 01:01:28'),(8,'test@test.com','LOGIN_SUCCESS','2026-06-07 07:23:23'),(9,'demo','LOGOUT','2026-06-07 13:15:17'),(10,'test@test.com','LOGIN_SUCCESS','2026-06-07 13:15:36'),(11,'test@test.com','RECIPE_CREATED','2026-06-07 20:33:06'),(12,'test@test.com','RECIPE_UPDATED','2026-06-07 20:34:00'),(13,'test@test.com','INCIDENT_VIEWED','2026-06-07 20:53:32'),(14,'test@test.com','INCIDENT_VIEWED','2026-06-07 20:58:10'),(15,'test@test.com','VULNERABILITY_VIEWED','2026-06-07 20:58:20'),(16,'test@test.com','INCIDENT_VIEWED','2026-06-07 20:58:22'),(17,'test@test.com','LOGOUT','2026-06-07 20:58:40'),(18,'test@test.com','LOGIN_SUCCESS','2026-06-08 01:17:45'),(19,'test@test.com','INCIDENT_VIEWED','2026-06-08 01:34:19'),(20,'test@test.com','LOGOUT','2026-06-08 01:34:30'),(21,'test@test.com','LOGIN_SUCCESS','2026-06-08 01:35:00'),(22,'test@test.com','INCIDENT_VIEWED','2026-06-08 01:35:54'),(23,'test@test.com','VULNERABILITY_VIEWED','2026-06-08 01:36:24'),(24,'test@test.com','INCIDENT_VIEWED','2026-06-08 01:36:54'),(25,'test@test.com','LOGOUT','2026-06-08 01:37:05'),(26,'test@test.com','LOGIN_SUCCESS','2026-06-08 01:37:19'),(27,'test@test.com','LOGOUT','2026-06-08 01:42:39'),(28,'user@test.local','LOGIN_SUCCESS','2026-06-08 01:48:02'),(29,'user@test.local','LOGOUT','2026-06-08 01:57:54'),(30,'test@test.com','LOGIN_SUCCESS','2026-06-08 01:58:04'),(31,'test@test.com','INCIDENT_VIEWED','2026-06-08 01:58:19'),(32,'test@test.com','VULNERABILITY_VIEWED','2026-06-08 01:58:24'),(33,'test@test.com','VULNERABILITY_VIEWED','2026-06-08 01:58:39'),(34,'test@test.com','RECIPE_UPDATED','2026-06-08 01:59:48'),(35,'test@test.com','RECIPE_CREATED','2026-06-08 02:00:18'),(36,'test@test.com','INCIDENT_VIEWED','2026-06-08 02:00:39'),(37,'test@test.com','VULNERABILITY_VIEWED','2026-06-08 02:00:47'),(38,'test@test.com','LOGOUT','2026-06-08 02:01:05'),(39,'user@test.local','LOGIN_SUCCESS','2026-06-08 02:02:41'),(40,'test1@test.com','LOGIN_SUCCESS','2026-06-08 10:41:29'),(41,'test1@test.com','LOGOUT','2026-06-08 10:53:11'),(42,'test@test.com','LOGIN_SUCCESS','2026-06-08 10:58:56'),(43,'test@test.com','RECIPE_UPDATED','2026-06-08 10:59:17'),(44,'test@test.com','RECIPE_UPDATED','2026-06-08 11:00:49'),(45,'test@test.com','LOGIN_SUCCESS','2026-06-08 20:46:24'),(46,'test@test.com','LOGOUT','2026-06-08 21:16:24'),(47,'user@test.local','LOGIN_SUCCESS','2026-06-08 21:16:35'),(48,'user@test.local','RECIPE_CREATED','2026-06-08 21:17:02'),(49,'user@test.local','LOGOUT','2026-06-08 21:18:55'),(50,'user@test.local','LOGIN_SUCCESS','2026-06-08 21:23:26'),(51,'user@test.local','LOGIN_SUCCESS','2026-06-09 09:50:25'),(52,'test1@test.com','LOGIN_SUCCESS','2026-06-10 13:53:00'),(53,'test1@test.com','RECIPE_UPDATED','2026-06-10 14:31:08'),(54,'test1@test.com','RECIPE_UPDATED','2026-06-10 14:31:20'),(55,'test1@test.com','RECIPE_UPDATED','2026-06-10 14:31:40'),(56,'test1@test.com','RECIPE_UPDATED','2026-06-10 14:31:59'),(57,'test1@test.com','RECIPE_UPDATED','2026-06-10 14:32:13'),(58,'test1@test.com','RECIPE_UPDATED','2026-06-10 14:32:23'),(59,'test1@test.com','RECIPE_CREATED','2026-06-10 14:33:14'),(60,'test1@test.com','RECIPE_CREATED','2026-06-10 14:33:56'),(61,'test1@test.com','LOGOUT','2026-06-11 22:02:39'),(62,'test@test.com','LOGIN_SUCCESS','2026-06-11 22:02:52'),(63,'test@test.com','LOGOUT','2026-06-12 13:59:27'),(64,'test@test.com','LOGIN_SUCCESS','2026-06-12 13:59:40'),(65,'test@test.com','LOGOUT','2026-06-12 14:02:16'),(66,'test@test.com','LOGIN_SUCCESS','2026-06-12 14:02:24'),(67,'test@test.com','LOGOUT','2026-06-12 14:02:35'),(68,'test1@test.com','LOGIN_SUCCESS','2026-06-12 14:02:43'),(69,'test1@test.com','LOGOUT','2026-06-12 14:02:49'),(70,'test@test.com','LOGIN_SUCCESS','2026-06-12 14:02:55'),(71,'test@test.com','VULNERABILITY_VIEWED','2026-06-12 14:03:15'),(72,'test@test.com','INCIDENT_VIEWED','2026-06-12 14:03:21'),(73,'test@test.com','RECIPE_CREATED','2026-06-12 14:04:25'),(74,'test@test.com','RECIPE_DELETED','2026-06-12 14:05:06'),(75,'test@test.com','RECIPE_UPDATED','2026-06-13 01:11:03'),(76,'test@test.com','RECIPE_UPDATED','2026-06-13 01:11:14'),(77,'test@test.com','RECIPE_UPDATED','2026-06-13 01:11:51'),(78,'test@test.com','RECIPE_UPDATED','2026-06-13 01:12:06'),(79,'test@test.com','RECIPE_UPDATED','2026-06-13 01:12:16'),(80,'test@test.com','INCIDENT_VIEWED','2026-06-13 16:06:46'),(81,'test@test.com','VULNERABILITY_VIEWED','2026-06-13 16:06:47'),(82,'test@test.com','RECIPE_UPDATED','2026-06-13 16:30:35'),(83,'test@test.com','INCIDENT_VIEWED','2026-06-13 16:30:50'),(84,'test@test.com','VULNERABILITY_VIEWED','2026-06-13 16:30:51');
/*!40000 ALTER TABLE `audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `severity` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidents`
--

LOCK TABLES `incidents` WRITE;
/*!40000 ALTER TABLE `incidents` DISABLE KEYS */;
INSERT INTO `incidents` VALUES (1,'Brute Force Attack','High','Open','2026-06-05 23:01:52'),(2,'Phishing Email','Medium','Investigating','2026-06-05 23:01:52'),(3,'Malware Infection','Critical','Open','2026-06-05 23:01:52');
/*!40000 ALTER TABLE `incidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `preparation` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `country` varchar(100) DEFAULT NULL,
  `chef_name` varchar(255) DEFAULT NULL,
  `difficulty` varchar(50) DEFAULT NULL,
  `prep_time` int DEFAULT NULL,
  `cook_time` int DEFAULT NULL,
  `servings` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (2,'PIZZA','PIZZA FROMAGE','FROMAGE','FOUR','2597a6390e32e1fad45bd3566a048465.png','2026-06-04 23:05:43',NULL,NULL,NULL,NULL,NULL,NULL),(3,'PIZZA ITALIA','MARGARITA','SAUCE TOMATE','FOUR','6c55a523e9b49e86043d1b199f79dff7.jpg','2026-06-05 01:05:59',NULL,NULL,NULL,NULL,NULL,NULL),(5,'TESTIMAGE','COULEUR','STYLO','FEUILLE','1780623768.png','2026-06-05 01:42:48',NULL,NULL,NULL,NULL,NULL,NULL),(6,'Test sécurité','Test image','test\r\n','test','6d915c231387f3fe2c0bc02d3ab1236c.jpeg','2026-06-05 01:51:20',NULL,NULL,NULL,NULL,NULL,NULL),(9,'PAPI','MAMO','MAMI','MAMAN','29227d7852d1c008ea4c062992723b08.jpeg','2026-06-07 07:05:27',NULL,NULL,NULL,NULL,NULL,NULL),(10,'PPOOPOO','MAMO','MAMI','MAMAN','f6a3947c8841e10aa822f8d4069e3692.jpeg','2026-06-07 07:06:19',NULL,NULL,NULL,NULL,NULL,NULL),(11,'Test AUDIT','TEST','TEST','TEST','f03855c17af786dfe64c9577275c8087.jpeg','2026-06-07 20:33:06',NULL,NULL,NULL,NULL,NULL,NULL),(12,'POPPPPO','fghj','fghj','fghj','4d7416b74d1b90e8f2d0f1431063f0ab.jpeg','2026-06-08 02:00:18',NULL,NULL,NULL,NULL,NULL,NULL),(13,'ZED','ZEE','ZZDD','ZZDF','5dd55f9c8c0917fd864e7c177c157989.jpeg','2026-06-08 21:17:02',NULL,NULL,NULL,NULL,NULL,NULL),(14,'PATE SAUCE TOMATE','ITALIEN','PATE TOMATE FROMAGE MOTZZARELLA','1 djkd','1457c837abdd0da274008c561a801aaf.jpeg','2026-06-10 14:33:14',NULL,NULL,NULL,NULL,NULL,NULL),(15,'BAYSSAR','MAROC','BAYSSAR','BAYSSAR','561e4dc99dc2958d6e997888b0eddd30.jpeg','2026-06-10 14:33:56',NULL,NULL,NULL,NULL,NULL,NULL),(17,'Couscous Royal','Plat traditionnel maghrbin','semoule, agneau, poulet, merguez, legumes','Cuire la semoule, preparer le bouillon puis assembler.','6076034677d2097600b2b311c2a5fc0b.jpeg','2026-06-13 00:41:29','Maroc','Mehdi','Moyen',30,90,6),(18,'Lasagnes','Plat italien','pates, viande, tomate','Monter puis cuire','9578c3ed05cf8a4d3ede2f698f1319b1.jpeg','2026-06-13 00:42:19','Italie',NULL,'Moyen',30,45,6),(19,'Tajine Poulet Citron','Tajine marocain','poulet, citron confit, olives','Cuire doucement dans le tajine','9f763f79e695ebdbc5e0c34b15675809.jpeg','2026-06-13 00:42:19','Maroc',NULL,'Facile',20,60,4),(20,'Paella','Plat espagnol','riz, fruits de mer','Cuire le riz avec le bouillon','197fce582d8b8adb1d70be796ff4ab7a.jpeg','2026-06-13 00:42:19','Espagne',NULL,'Moyen',25,50,6),(22,'Poulet Yassa','Spcialit sngalaise au citron','poulet, oignons, citron, moutarde','Faire mariner puis cuire lentement.',NULL,'2026-06-13 16:25:15','','Chef Afrique','Facile',25,50,4),(23,'Lasagnes','Plat italien','...','...',NULL,'2026-06-14 09:53:03','Italie',NULL,'Moyen',30,45,6),(24,'Paella','Plat espagnol','...','...',NULL,'2026-06-14 09:53:03','Espagne',NULL,'Moyen',25,50,6),(25,'Couscous Royal','Plat marocain','...','...',NULL,'2026-06-14 09:53:03','Maroc',NULL,'Moyen',30,90,6),(26,'Burger Americain','Burger maison avec boeuf et cheddar','steak hache, cheddar, pain burger, salade','Cuire le steak puis assembler le burger',NULL,'2026-06-14 09:56:53','USA','Chef John','Facile',15,10,2),(27,'Pad Thai','Nouilles thailandaises sautees','nouilles de riz, crevettes, oeufs','Faire revenir puis melanger les ingredients',NULL,'2026-06-14 09:56:53','Thailande','Chef Bangkok','Moyen',20,15,4),(28,'Moussaka','Gratin traditionnel grec','aubergines, viande hachee, bechamel','Monter les couches puis cuire au four',NULL,'2026-06-14 09:56:53','Grece','Chef Athena','Moyen',30,45,6);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security_events`
--

DROP TABLE IF EXISTS `security_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `security_events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `severity` varchar(50) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security_events`
--

LOCK TABLES `security_events` WRITE;
/*!40000 ALTER TABLE `security_events` DISABLE KEYS */;
INSERT INTO `security_events` VALUES (1,'Brute Force Detected','High','WAF','2026-06-06 11:48:31'),(2,'Malware Download','Critical','EDR','2026-06-06 11:48:31'),(3,'XSS Attempt','Medium','Web Application','2026-06-06 11:48:31');
/*!40000 ALTER TABLE `security_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'test@test.com','$2y$10$HlLRstOpvm0.JZaZbEVCK.lpOVFJ3yRKkBi7WO8DGZ67zNTsbjkRq','admin','2026-06-05 00:34:34'),(4,'user@test.local','$2y$10$HlLRstOpvm0.JZaZbEVCK.lpOVFJ3yRKkBi7WO8DGZ67zNTsbjkRq','user','2026-06-08 01:47:13'),(5,'test1@test.com','$2y$10$iyUGOrS997G.jWrBk6tImeaFrF.ymI6wNRAWG/buWk725NGNRE4Sq','user','2026-06-08 10:41:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vulnerabilities`
--

DROP TABLE IF EXISTS `vulnerabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vulnerabilities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `severity` varchar(50) DEFAULT NULL,
  `description` text,
  `cvss` float DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vulnerabilities`
--

LOCK TABLES `vulnerabilities` WRITE;
/*!40000 ALTER TABLE `vulnerabilities` DISABLE KEYS */;
INSERT INTO `vulnerabilities` VALUES (1,'SQL Injection','Critical','Injection SQL dtecte',9.8,'Open','2026-06-05 22:11:29'),(2,'XSS Reflected','Medium','Cross Site Scripting',6.4,'Open','2026-06-05 22:11:29'),(3,'Weak Password Policy','Low','Politique de mot de passe faible',3.1,'Mitigated','2026-06-05 22:11:29');
/*!40000 ALTER TABLE `vulnerabilities` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-14  9:58:42
