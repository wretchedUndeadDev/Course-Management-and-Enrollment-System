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
-- Table structure for table `minor_program`
--

DROP TABLE IF EXISTS `minor_program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `minor_program` (
  `parent_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_limit` tinyint(4) DEFAULT NULL,
  `num_of_opt_credits` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`parent_faculty`,`name`),
  CONSTRAINT `minor_program_ibfk_1` FOREIGN KEY (`parent_faculty`) REFERENCES `faculty` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minor_program`
--

LOCK TABLES `minor_program` WRITE;
/*!40000 ALTER TABLE `minor_program` DISABLE KEYS */;
INSERT INTO `minor_program` VALUES ('consectetur','dolorum','Sunt aut suscipit nisi aut natus. Voluptas dolor repellat odio rerum sit aut eum. Qui nulla rerum hic deserunt qui. Alias eos repellendus quod quidem.',6,15),('minima','aut','Natus voluptate quod eius sunt excepturi. Voluptatem temporibus dolorem qui eius voluptas. Harum illo accusamus suscipit reprehenderit corrupti ex.',6,6),('nulla','eos','Vitae quo illo fugiat. Quia dolore sit doloremque consequatur expedita ex repudiandae. Veritatis ea commodi fuga dolore quisquam atque.',4,15),('omnis','modi','Voluptas omnis id repellat tempore quibusdam ut accusamus. Cum non enim molestiae possimus. Mollitia officia quibusdam totam quis molestiae. Distinctio corrupti numquam ut.',6,9),('quae','id','Corporis dignissimos est ex non odit. Id repellendus doloremque doloribus ea in id. Velit praesentium sed dolores consequatur.',7,9);
/*!40000 ALTER TABLE `minor_program` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 20:55:07
