-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: absencev2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emplois` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `salles_id` bigint(20) unsigned DEFAULT NULL,
  `formateurs_id` bigint(20) unsigned DEFAULT NULL,
  `groupe_id` bigint(20) unsigned DEFAULT NULL,
  `temporaire` date DEFAULT NULL,
  `jours_id` bigint(20) unsigned DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `types_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emplois_salles_id_foreign` (`salles_id`),
  KEY `emplois_formateurs_id_foreign` (`formateurs_id`),
  KEY `emplois_groupe_id_foreign` (`groupe_id`),
  KEY `emplois_types_id_foreign` (`types_id`),
  CONSTRAINT `emplois_formateurs_id_foreign` FOREIGN KEY (`formateurs_id`) REFERENCES `formateurs` (`id`),
  CONSTRAINT `emplois_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`),
  CONSTRAINT `emplois_salles_id_foreign` FOREIGN KEY (`salles_id`) REFERENCES `salles` (`id`),
  CONSTRAINT `emplois_types_id_foreign` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emplois`
--

LOCK TABLES `emplois` WRITE;
/*!40000 ALTER TABLE `emplois` DISABLE KEYS */;
INSERT INTO `emplois` VALUES (1,1,1,1,NULL,1,'08:30:00','13:30:00',2),(2,3,1,1,NULL,2,'11:00:00','14:30:00',1),(3,1,1,1,NULL,3,'09:00:00','13:00:00',1),(4,2,1,1,NULL,4,'13:30:00','17:30:00',2),(5,NULL,NULL,1,NULL,5,'08:30:00','08:30:00',1),(6,3,1,1,NULL,6,'13:30:00','18:30:00',2),(8,NULL,NULL,2,NULL,1,'08:30:00','08:30:00',1),(9,NULL,NULL,2,NULL,2,'08:30:00','08:30:00',1),(10,NULL,NULL,2,NULL,3,'08:30:00','08:30:00',1),(11,NULL,NULL,2,NULL,4,'08:30:00','08:30:00',1),(12,NULL,NULL,2,NULL,5,'08:30:00','08:30:00',1),(13,NULL,NULL,2,NULL,6,'08:30:00','08:30:00',1),(14,NULL,NULL,3,NULL,1,'08:30:00','08:30:00',1),(15,1,1,3,NULL,2,'08:30:00','14:30:00',1),(16,NULL,NULL,3,NULL,3,'08:30:00','08:30:00',1),(17,NULL,NULL,3,NULL,4,'08:30:00','08:30:00',1),(18,NULL,NULL,3,NULL,5,'08:30:00','08:30:00',1),(19,NULL,NULL,3,NULL,6,'08:30:00','08:30:00',1);
/*!40000 ALTER TABLE `emplois` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-23 23:30:08
