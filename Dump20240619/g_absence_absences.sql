-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: g_absence
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
-- Table structure for table `absences`
--

DROP TABLE IF EXISTS `absences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seance_id` bigint(20) unsigned NOT NULL,
  `stagiaire_id` bigint(20) unsigned NOT NULL,
  `etat_absence_id` bigint(20) unsigned NOT NULL,
  `observation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `absences_seance_id_foreign` (`seance_id`),
  KEY `absences_stagiaire_id_foreign` (`stagiaire_id`),
  KEY `absences_etat_absence_id_foreign` (`etat_absence_id`),
  CONSTRAINT `absences_etat_absence_id_foreign` FOREIGN KEY (`etat_absence_id`) REFERENCES `etat_absences` (`id`),
  CONSTRAINT `absences_seance_id_foreign` FOREIGN KEY (`seance_id`) REFERENCES `seance` (`id`),
  CONSTRAINT `absences_stagiaire_id_foreign` FOREIGN KEY (`stagiaire_id`) REFERENCES `stagiaires` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absences`
--

LOCK TABLES `absences` WRITE;
/*!40000 ALTER TABLE `absences` DISABLE KEYS */;
INSERT INTO `absences` VALUES (3,3,23,2,''),(5,4,23,2,''),(6,4,24,2,''),(9,7,27,3,'MALADE'),(15,15,42,3,''),(17,15,45,2,''),(18,15,59,2,''),(19,16,22,2,''),(20,16,23,2,''),(21,17,22,3,''),(22,17,23,2,''),(24,18,25,3,''),(25,19,22,2,''),(26,19,24,2,''),(27,20,42,2,''),(28,20,43,2,''),(29,21,22,2,''),(30,21,25,2,'');
/*!40000 ALTER TABLE `absences` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-19 19:49:20
