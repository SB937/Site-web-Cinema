-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: miniprojet
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artiste` (
  `idArtiste` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  `data5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artiste`
--

LOCK TABLES `artiste` WRITE;
/*!40000 ALTER TABLE `artiste` DISABLE KEYS */;
INSERT INTO `artiste` VALUES (1,'scott','ridley','1943-01-26',NULL),(2,'Hitchcock','Alfred','1899-02-27',NULL),(3,'Kurosawa','Akira','1910-03-28',NULL),(4,'Woo','John','1946-04-29',NULL),(5,'Tarantino','Quentin','1963-05-30',NULL),(6,'Cameron','James','1954-06-30',NULL),(7,'Tarkovski','Andrei','1932-11-23',NULL),(13,'Henry','Thomas','1971-09-09',NULL),(14,'james','stewart','1908-05-20',NULL),(15,'timera','youssouf','1999-06-11',NULL),(16,'toto','titi','1999-07-01',NULL);
/*!40000 ALTER TABLE `artiste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `film` (
  `idFilm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) DEFAULT NULL,
  `annee` varchar(4) DEFAULT NULL,
  `resume` varchar(2000) DEFAULT NULL,
  `Artiste_idRealisateur` int(10) unsigned NOT NULL,
  `Genre_idGenre` int(10) unsigned NOT NULL,
  `Image` text NOT NULL,
  PRIMARY KEY (`idFilm`),
  KEY `fk_Film_Artiste_idx` (`Artiste_idRealisateur`),
  KEY `fk_Film_Genre1_idx` (`Genre_idGenre`),
  CONSTRAINT `fk_Film_Artiste` FOREIGN KEY (`Artiste_idRealisateur`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Film_Genre1` FOREIGN KEY (`Genre_idGenre`) REFERENCES `genre` (`idGenre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film`
--

LOCK TABLES `film` WRITE;
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` VALUES (1,'Venom','2021','Possédé par un symbiote qui agit de manière autonome, le journaliste Eddie Brock devient le protecteur létal Venom.',1,1,'https://fr.web.img2.acsta.net/pictures/21/09/01/11/19/0900123.jpg'),(2,'Fast and Furious','2021','Si Dom Toretto mène une vie tranquille, loin du bitume, auprès de Letty et de leur fils, le petit Brian, ils savent bien tous les deux que derrière les horizons les plus radieux se cachent toujours les dangers les plus sournois.',2,1,'https://fr.web.img5.acsta.net/pictures/21/05/18/10/40/2487837.jpg'),(3,'Candyman','2021','D’aussi loin qu’ils s’en souviennent, les habitants de Cabrini Green, une des cités les plus insalubres en plein cœur de Chicago, ont toujours été terrorisés par une effroyable histoire de fantôme, passant de bouche à oreille, où il est que...',2,3,'https://fr.web.img2.acsta.net/pictures/21/09/02/09/41/0159612.jpg'),(4,'Escape game 2','2021','Escape Game 2 - Le Monde est un piège est la suite du thriller psychologique à succès qui a terrifié les spectateurs à travers le monde. Dans cet opus, six personnes se retrouvent involontairement enfermés dans une nouvelle succession d\'escape games.',3,1,'https://fr.web.img4.acsta.net/pictures/21/08/02/12/58/0884782.jpg'),(5,'Spider man','2021','Pour la première fois dans son histoire cinématographique, Spider-Man, le héros sympa du quartier est démasqué et ne peut désormais plus séparer sa vie normale de ses lourdes responsabilités de super-héros',2,6,'https://fr.web.img3.acsta.net/pictures/17/05/24/15/35/100661.jpg'),(6,'007','2021','Dans MOURIR PEUT ATTENDRE, Bond a quitté les services secrets et coule des jours heureux en Jamaïque. Mais sa tranquillité est de courte durée car son vieil ami Felix Leiter de la CIA débarque pour solliciter son aide.',3,1,'https://fr.web.img4.acsta.net/pictures/21/09/09/11/06/5284084.jpg'),(7,'Resident Eveil','2021','Autrefois le siège en plein essor du géant pharmaceutique Umbrella Corporation, Raccoon City est aujourd\'hui une ville à l\'agonie. L\'exode de la société a laissé la ville en friche',1,3,'https://fr.web.img3.acsta.net/pictures/21/10/19/17/59/4466537.jpg'),(8,'Clifford','2021','Emily Elizabeth, une jeune collégienne, reçoit en cadeau de la part d’un magicien un adorable petit chien rouge. Quelle n’est pas sa surprise quand elle se réveille le lendemain dans son petit appartement de New York face au même chien devenu',3,10,'https://fr.web.img6.acsta.net/pictures/21/11/16/16/23/5469519.jpg'),(9,'Bac Nord','2021',' Les quartiers Nord de Marseille détiennent un triste record : la zone au taux de criminalité le plus élevé de France. Poussée par sa hiérarchie, la BAC Nord, brigade de terrain, cherche sans cesse à améliorer ses résultats',2,1,'https://fr.web.img3.acsta.net/pictures/21/06/07/13/11/2832970.jpg'),(10,'SOS Fantome','2021','Une mère célibataire et ses deux enfants s\'installent dans une petite ville et découvrent peu à peu leur relation avec les chasseurs de fantômes et l\'héritage légué par leur grand-père.',2,3,'https://fr.web.img5.acsta.net/pictures/16/06/17/10/13/235607.jpg');
/*!40000 ALTER TABLE `film` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genre` (
  `idGenre` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'action'),(2,'comique'),(3,'horreur'),(4,'comedie'),(5,'dramatique'),(6,'fiction'),(7,'peplum'),(8,'thriller'),(9,'guerre'),(10,'ss'),(11,''),(12,'');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internaute`
--

DROP TABLE IF EXISTS `internaute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `internaute` (
  `idInternaute` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(1) DEFAULT NULL,
  PRIMARY KEY (`idInternaute`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internaute`
--

LOCK TABLES `internaute` WRITE;
/*!40000 ALTER TABLE `internaute` DISABLE KEYS */;
INSERT INTO `internaute` VALUES (1,'tobji','','',0),(2,'madani','','',0),(3,'Silly','silly@gmail.com','silly',0),(5,'kais','kais@kais.com','kais',0),(6,'bilal','bilal@gmail.com','bilal',0),(7,'admin','admin@gmail.com','1234',1);
/*!40000 ALTER TABLE `internaute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jouer` (
  `Artiste_idArtiste` int(10) unsigned NOT NULL,
  `Film_idFilm` int(10) unsigned NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Artiste_idArtiste`,`Film_idFilm`),
  KEY `fk_Jouer_idFilm_idx` (`Film_idFilm`),
  KEY `fk_Jouer_idArtiste_idx` (`Artiste_idArtiste`),
  CONSTRAINT `fk_Jouer_idArtiste` FOREIGN KEY (`Artiste_idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jouer_idFilm` FOREIGN KEY (`Film_idFilm`) REFERENCES `film` (`idFilm`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jouer`
--

LOCK TABLES `jouer` WRITE;
/*!40000 ALTER TABLE `jouer` DISABLE KEYS */;
INSERT INTO `jouer` VALUES (13,1,'eliott'),(14,2,'Scottie');
/*!40000 ALTER TABLE `jouer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noter`
--

DROP TABLE IF EXISTS `noter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noter` (
  `Internaute_idInternaute` int(10) unsigned NOT NULL,
  `Film_idFilm` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Internaute_idInternaute`,`Film_idFilm`),
  KEY `fk_Noter_idFilm_idx` (`Film_idFilm`),
  KEY `fk_Noter_idInternaute_idx` (`Internaute_idInternaute`),
  CONSTRAINT `fk_Noter_idFilm` FOREIGN KEY (`Film_idFilm`) REFERENCES `film` (`idFilm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Noter_idInternaute` FOREIGN KEY (`Internaute_idInternaute`) REFERENCES `internaute` (`idInternaute`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noter`
--

LOCK TABLES `noter` WRITE;
/*!40000 ALTER TABLE `noter` DISABLE KEYS */;
INSERT INTO `noter` VALUES (2,1),(3,1),(3,3),(3,4),(3,5),(3,6),(6,6),(6,9);
/*!40000 ALTER TABLE `noter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-17  0:17:24
