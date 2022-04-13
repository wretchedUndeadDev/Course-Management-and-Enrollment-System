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
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `parent_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_num` int(11) NOT NULL,
  `room_num` smallint(6) DEFAULT NULL,
  `seat_num` smallint(6) DEFAULT NULL,
  `waitlist_num` smallint(6) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `class_type` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'n/a',
  `ta` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'n/a',
  `supervisor` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'n/a',
  PRIMARY KEY (`parent_course_id`,`class_num`),
  CONSTRAINT `class_ibfk_1` FOREIGN KEY (`parent_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES ('23521961',32776127,283,276,15,'10:40:05','03:41:14','A','','Erdman','Dach'),('23521961',84397119,436,88,19,'19:35:48','20:57:30','A','Larkin','Rowe','Johns'),('23521961',95788748,274,230,15,'23:10:39','17:54:04','T','','Kshlerin',''),('30079813',29343246,754,245,10,'20:23:14','19:58:44','L','Wiegand','',''),('30079813',64264755,935,193,9,'17:23:54','09:04:34','T','Rogahn','Schuster',''),('30079813',72137608,530,247,18,'22:40:48','09:40:26','L','Ward','Krajcik','Wunsch'),('30553563',12968084,461,296,9,'16:43:54','01:28:56','T','','',''),('30553563',80836920,987,188,2,'00:57:21','20:46:16','T','Beer','Stehr',''),('30553563',94737003,589,202,20,'05:05:51','23:34:43','T','Gaylord','',''),('40752009',15838514,926,119,5,'03:56:46','09:09:35','T','Moen','','Gutkowski'),('40752009',16360291,888,281,5,'19:42:57','00:13:29','L','Daugherty','Runolfsson',''),('40752009',39872714,257,64,4,'14:51:44','12:32:32','T','','McCullough','Kuphal'),('41831309',19099445,123,153,4,'00:10:06','17:57:42','L','','','Abbott'),('41831309',57341746,941,272,15,'16:47:36','13:29:10','T','','Pagac',''),('41831309',73541304,578,277,8,'16:16:56','06:34:36','T','Bartoletti','McGlynn','Schulist'),('45489920',35621838,725,178,4,'03:47:42','03:28:56','A','','','Padberg'),('45489920',36123070,382,127,20,'15:10:41','09:43:37','A','','','Torp'),('45489920',67358362,240,150,1,'14:53:55','17:50:25','T','Orn','',''),('60451721',16038394,202,215,20,'20:50:53','23:25:15','T','','Baumbach','Moen'),('60451721',21820684,766,210,7,'05:47:57','00:51:04','A','Kemmer','','Stanton'),('60451721',52357231,720,31,17,'23:56:56','17:12:25','T','Huel','Keebler','White'),('63014977',37560166,544,46,1,'02:59:59','07:48:47','A','','Feil',''),('63014977',67663860,920,230,13,'00:29:56','16:50:02','L','','',''),('63014977',78125453,731,129,13,'21:45:01','17:31:07','A','Pacocha','','Huels'),('89540784',33922924,469,65,0,'14:57:49','09:06:13','A','','',''),('89540784',51763407,115,78,4,'11:53:42','06:29:56','L','Wiegand','','Jast'),('89540784',57531269,494,276,2,'15:23:57','07:36:29','T','','Grant','McKenzie'),('91074499',46635596,650,147,2,'00:23:57','06:00:59','T','','Champlin',''),('91074499',64875982,999,45,12,'01:37:28','11:50:04','T','Ernser','',''),('91074499',81373411,614,156,7,'21:46:00','03:58:31','T','Rau','','');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 21:07:12
