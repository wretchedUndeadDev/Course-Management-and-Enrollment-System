-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: mysql.hostinger.ro    Database: u574849695_22
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
-- Table structure for table `major_program`
--

DROP TABLE IF EXISTS `major_program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `major_program` (
  `parent_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_limit` tinyint(4) DEFAULT NULL,
  `num_of_opt_credits` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`parent_faculty`,`name`),
  CONSTRAINT `major_program_ibfk_1` FOREIGN KEY (`parent_faculty`) REFERENCES `faculty` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major_program`
--

LOCK TABLES `major_program` WRITE;
/*!40000 ALTER TABLE `major_program` DISABLE KEYS */;
INSERT INTO `major_program` VALUES ('consectetur','fugit','Maxime similique sit qui odio perspiciatis eos. Natus consequatur nisi quia repudiandae velit totam fuga. Error sit qui occaecati dignissimos maiores rem.',5,15),('minima','provident','Architecto hic vel recusandae sit cum. Quia et voluptatibus quaerat praesentium.',6,12),('nulla','nam','Voluptates eaque recusandae aliquam unde eum eaque saepe. Soluta suscipit velit vel inventore reprehenderit esse earum. Eum sit est qui et reiciendis animi eaque.',7,3),('omnis','vero','Doloribus rerum sint labore minus. Praesentium soluta porro ullam. Quia et est iste consectetur occaecati explicabo dolor est.',4,6),('quae','vitae','Nemo doloribus eos ut adipisci voluptates magnam placeat perspiciatis. Et ab atque at repellat recusandae soluta. Placeat qui atque ut iusto dolorem ex est.',4,12);
/*!40000 ALTER TABLE `major_program` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 20:54:05
