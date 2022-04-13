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
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `assigned_enrollment_date` date DEFAULT NULL,
  `Fname` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lname` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `primary_faculty_name` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `primary_faculty_name` (`primary_faculty_name`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`primary_faculty_name`) REFERENCES `faculty` (`name`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('14022287','1996-07-06','Lukas','Upton','Totam asperiores architecto tenetur omnis accusantium. Ut eaque dolor aut voluptatem qui ipsam. Est sed vel est nihil vitae.','minima'),('18496080','2021-06-01','Vernie','Terry','Ut eius quae pariatur commodi. Molestiae qui sed dolore quis quibusdam et.','nulla'),('19846756','2004-11-28','Kaci','Heidenreich','Maiores rerum ab ut est ducimus. Voluptatem aliquam facilis et reprehenderit recusandae qui dolorem quia. Et non recusandae deserunt debitis. Voluptas numquam autem eius dolorem et.','nulla'),('30827190','1970-12-23','Alvina','Hilll','Sed aperiam asperiores harum aut iste. Et libero voluptatem quia cum culpa omnis.','consectetur'),('37293133','2020-01-06','Verlie','Quigley','Et soluta est quaerat dicta corrupti soluta. Asperiores quidem enim repellendus necessitatibus. Dolores vel repellendus asperiores assumenda illo vel. Quia eius dolores dolorem amet.','quae'),('56440516','2014-04-11','Carolyne','Dietrich','Blanditiis ut sit sequi rem est. Iste et harum voluptatem repudiandae molestias quis dolorum. Vitae et quibusdam sed voluptatum sed veritatis saepe repellat. Quasi ut totam quia beatae.','omnis'),('68937537','2020-06-13','Delfina','Krajcik','Numquam vel qui magni eligendi. Consectetur illo aut sit omnis aspernatur culpa placeat. Voluptate sed iusto voluptas quam labore omnis.','quae'),('85484864','2016-08-02','Arjun','Robel','Qui non eos et eos perspiciatis autem. Hic magnam voluptatem quibusdam in facilis officia et corrupti. Et qui magni asperiores aut nihil qui placeat. Dolores odio cupiditate consequuntur et officiis necessitatibus corporis labore. Sint velit officiis ad sed.','omnis'),('88028526','2017-06-12','Florian','Quigley','Est voluptas repellendus modi et nesciunt expedita. Provident quasi autem blanditiis ullam beatae. Quibusdam omnis dolorem doloribus et.','minima'),('98978347','1980-03-24','Arnold','Botsford','Doloribus fuga natus deserunt in occaecati. Quia et veniam atque sit quaerat qui quas quisquam. Aut tenetur consequatur ea eius quo voluptatem et tenetur.','consectetur');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 20:56:45
