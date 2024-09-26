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
-- Table structure for table `seance`
--

DROP TABLE IF EXISTS `seance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seance` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `datedebut` datetime NOT NULL,
  `datefin` datetime NOT NULL,
  `etat_id` bigint(20) unsigned NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `formateur_id` bigint(20) unsigned NOT NULL,
  `module_id` bigint(20) unsigned NOT NULL,
  `salle_id` bigint(20) unsigned NOT NULL,
  `groupe_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seance_etat_id_foreign` (`etat_id`),
  KEY `seance_type_id_foreign` (`type_id`),
  KEY `seance_formateur_id_foreign` (`formateur_id`),
  KEY `seance_module_id_foreign` (`module_id`),
  KEY `seance_salle_id_foreign` (`salle_id`),
  KEY `seance_groupe_id_foreign` (`groupe_id`),
  CONSTRAINT `seance_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`),
  CONSTRAINT `seance_formateur_id_foreign` FOREIGN KEY (`formateur_id`) REFERENCES `utilisateurs` (`id`),
  CONSTRAINT `seance_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`),
  CONSTRAINT `seance_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
  CONSTRAINT `seance_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`),
  CONSTRAINT `seance_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seance`
--

LOCK TABLES `seance` WRITE;
/*!40000 ALTER TABLE `seance` DISABLE KEYS */;
INSERT INTO `seance` VALUES (1,'2024-05-25 08:30:00','2024-05-25 13:30:00',1,1,1,1,1,1),(2,'2024-05-10 08:30:00','2024-05-10 14:00:00',1,1,1,1,1,1),(3,'2024-05-25 08:30:00','2024-05-25 13:30:00',1,1,1,1,1,1),(4,'2024-02-05 08:30:00','2024-02-05 13:30:00',1,1,1,1,1,1),(5,'2024-05-20 08:30:00','2024-05-20 13:30:00',1,1,1,1,1,1),(6,'2024-04-25 08:30:00','2024-04-25 13:30:00',1,1,1,1,1,1),(7,'2024-05-25 08:30:00','2024-05-25 13:30:00',1,1,1,1,1,1),(8,'2024-05-01 08:30:00','2024-05-01 14:00:00',1,1,1,1,1,1),(9,'2024-05-25 13:30:00','2024-05-25 18:30:00',1,2,1,2,2,2),(10,'2024-05-28 08:30:00','2024-05-28 13:30:00',1,1,1,2,1,2),(11,'2024-05-29 08:30:00','2024-05-29 13:30:00',1,1,1,1,1,1),(15,'2024-06-01 13:30:00','2024-06-01 18:30:00',1,1,1,1,1,3),(16,'2023-06-07 08:30:00','2023-06-07 13:30:00',1,2,1,1,2,1),(17,'2024-06-08 08:30:00','2024-06-08 13:30:00',1,1,1,1,1,1),(18,'2024-06-12 08:30:00','2024-06-12 13:30:00',1,1,1,1,3,1),(19,'2024-05-12 10:30:00','2024-05-12 14:30:00',1,2,1,3,2,1),(20,'2024-06-11 08:30:00','2024-06-11 13:30:00',1,2,1,3,2,3),(21,'2024-06-10 08:30:00','2024-06-10 13:30:00',1,1,1,1,1,1),(22,'2024-06-12 08:30:00','2024-06-12 13:30:00',1,1,1,1,1,2);
/*!40000 ALTER TABLE `seance` ENABLE KEYS */;
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
