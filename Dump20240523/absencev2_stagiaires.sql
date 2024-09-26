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
-- Table structure for table `stagiaires`
--

DROP TABLE IF EXISTS `stagiaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stagiaires` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  `dateinscription` date NOT NULL,
  `groupe_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stagiaires_groupe_id_foreign` (`groupe_id`),
  CONSTRAINT `stagiaires_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stagiaires`
--

LOCK TABLES `stagiaires` WRITE;
/*!40000 ALTER TABLE `stagiaires` DISABLE KEYS */;
INSERT INTO `stagiaires` VALUES (1,'Carmel','Pollich','28083 Rohan Ridge Apt. 967\nEast Dock, VA 19351','Wolffton','Morocco','(360) 947-1937','raphael.ondricka@ondricka.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(2,'Juvenal','Schimmel','466 Lisa Crossing\nRomagueraburgh, NJ 42148-4736','Gleasonhaven','Morocco','847-252-2107','pstamm@walter.org','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(3,'Alessia','Ernser','901 Sonny Views Suite 393\nLake Aryanna, TX 24110-0620','Lake Velvaberg','Morocco','(862) 223-9407','kunze.jolie@hotmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(4,'Stella','Terry','37029 Brennan Flat\nYostshire, WY 84617-3246','Hirtheville','Morocco','828.486.6391','breitenberg.antone@yahoo.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(5,'Eldon','Bogan','616 Paucek Prairie\nWest Xanderport, MN 40726','Port Katheryn','Morocco','+1-628-525-0493','brandi.hettinger@hermann.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(6,'Tillman','Carter','847 Yasmine Gateway\nWest Ara, AK 36453','South Gonzalo','Morocco','732.961.1507','roberts.daphne@gmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(7,'Rocio','Beier','9281 Annabell Mountain Suite 386\nNorth Braedenton, SC 56305-0515','New Sarahhaven','Morocco','+1 (832) 555-3629','graham.courtney@yahoo.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(8,'Genevieve','Hartmann','4350 Price Falls\nWest Oswald, ME 47543-0378','New Amya','Morocco','+1-667-668-7637','eswaniawski@williamson.org','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(9,'Bernhard','Schulist','3863 Beahan Vista\nDinomouth, DE 44682','North Erica','Morocco','(214) 722-1824','joanie.mclaughlin@smith.info','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(10,'Etha','McKenzie','41563 Breitenberg Green Suite 557\nHaleighside, WV 43070','South Toneyville','Morocco','1-276-668-4202','vandervort.kobe@heaney.biz','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(11,'Marquis','Abbott','74950 Stacy Port Apt. 012\nSouth Harmony, UT 57730','Schowaltertown','Morocco','641.956.9391','major32@hotmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(12,'Candelario','Ernser','1732 Kohler Parkways\nEast Mohamed, IN 42744','Heavenhaven','Morocco','760-703-4371','hgrimes@yahoo.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(13,'Linnea','Okuneva','84734 Juliet Lake Suite 264\nLorenzburgh, CT 86725','Lake Destanyland','Morocco','+17696946796','kwuckert@gmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(14,'Sarina','Grimes','66758 Gene Viaduct\nEast Aureliachester, NY 93469-1171','Dawnland','Morocco','(404) 531-4135','alice16@gleichner.org','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(15,'Nikki','Nolan','5693 Monroe Manor\nKesslermouth, TN 66491','North Danikatown','Morocco','+1-440-841-4980','ratke.johathan@gmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(16,'Roma','Schmitt','4767 Camille Wells Apt. 103\nWunschstad, MT 40277-0835','West Tillman','Morocco','1-725-891-2598','thalia53@gutkowski.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(17,'Ana','Abernathy','7283 Bechtelar Square Suite 170\nGutmannborough, MS 40758-1316','Faustoberg','Morocco','+1.240.657.5763','ohara.haleigh@hotmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(18,'Vinnie','Considine','10649 Alvena Isle Apt. 792\nBechtelarstad, KS 69693','Kaitlinberg','Morocco','832.563.7057','nathanael00@hotmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(19,'Reyes','Rippin','9228 Cecile Unions\nPort Hilmaside, MA 76563-0528','Stokesview','Morocco','(854) 520-6575','rturner@hotmail.com','default_stagaire_profile.png','2002-10-10','2022-07-10',1),(20,'Pat','Ritchie','2597 Goodwin Crossing\nNorth Orlandoville, DC 70530','Glovertown','Morocco','(984) 622-5904','ernie.fay@bradtke.info','default_stagaire_profile.png','2002-10-10','2022-07-10',1);
/*!40000 ALTER TABLE `stagiaires` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-23 23:30:09
