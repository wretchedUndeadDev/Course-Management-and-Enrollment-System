-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: mysql.hostinger.ro    Database: u574849695_25
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-cll-lve

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
-- Table structure for table `concentration_sample_name_pool`
--

DROP TABLE IF EXISTS `concentration_sample_name_pool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concentration_sample_name_pool` (
  `name` char(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concentration_sample_name_pool`
--

LOCK TABLES `concentration_sample_name_pool` WRITE;
/*!40000 ALTER TABLE `concentration_sample_name_pool` DISABLE KEYS */;
INSERT INTO `concentration_sample_name_pool` VALUES ('nisi'),('nulla'),('exercitationem'),('aut'),('autem'),('molestiae'),('velit'),('ipsa'),('hic'),('impedit'),('magni'),('qui'),('consequatur'),('necessitatibus'),('molestias'),('eos'),('dolores'),('et'),('earum'),('amet'),('temporibus'),('qui'),('corrupti'),('voluptas'),('tenetur'),('est'),('sint'),('et'),('minima'),('et'),('nulla'),('non'),('ipsum'),('fuga'),('tempore'),('et'),('accusamus'),('rem'),('vero'),('et'),('aperiam'),('rerum'),('laboriosam'),('eum'),('ullam'),('voluptatem'),('asperiores'),('et'),('veniam'),('a'),('et'),('distinctio'),('et'),('aut'),('ut'),('modi'),('est'),('possimus'),('harum'),('molestiae'),('ullam'),('illum'),('maxime'),('ratione'),('distinctio'),('necessitatibus'),('dignissimos'),('ut'),('molestiae'),('unde'),('vel'),('dolor'),('quae'),('labore'),('nisi'),('non'),('recusandae'),('a'),('quis'),('nobis'),('iste'),('voluptatem'),('sit'),('et'),('aut'),('eaque'),('vero'),('molestias'),('numquam'),('laboriosam'),('corporis'),('est'),('suscipit'),('dignissimos'),('nostrum'),('dolores'),('et'),('tempora'),('sequi'),('hic');
/*!40000 ALTER TABLE `concentration_sample_name_pool` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 21:40:18
