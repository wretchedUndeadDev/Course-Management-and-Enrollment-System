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
-- Table structure for table `student_address`
--

DROP TABLE IF EXISTS `student_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_address` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`address`),
  CONSTRAINT `student_address_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_address`
--

LOCK TABLES `student_address` WRITE;
/*!40000 ALTER TABLE `student_address` DISABLE KEYS */;
INSERT INTO `student_address` VALUES ('14022287','442 Huels Ramp\nJonshire, PA 01442'),('14022287','514 Rasheed Rapid\nEast Emmettborough, WY 75018-5530'),('18496080','6943 Claud Flat Apt. 780\nSouth Erling, AR 88009'),('18496080','969 Feil Terrace Apt. 954\nSouth Nia, MI 92813'),('19846756','259 Abdiel Views\nGuillermotown, KS 02444'),('19846756','27963 Murray Rapids\nEast Ottilie, KS 61315-7269'),('30827190','8164 Rocio Meadow\nLindgrenborough, OR 04342'),('30827190','9895 Kelley Dale\nGoodwinland, TX 46396-7698'),('37293133','053 Hettinger Freeway Suite 219\nSouth Vicente, SC 84968'),('37293133','26882 Harold Road\nJadentown, LA 97349-2361'),('56440516','2282 Hyatt Forest\nNew Norwood, ME 65774-7138'),('56440516','7057 Kirlin Curve\nSouth Nathanael, IN 23366-9202'),('68937537','551 Lera Ways\nPort Olentown, MT 69991-9335'),('68937537','8737 White Crossing\nNorth Felipahaven, CT 26357'),('85484864','24914 Diego Islands Suite 959\nDoyleshire, WA 44913-5299'),('85484864','915 Frederick Pass Apt. 986\nPort Winonabury, SD 25562'),('88028526','350 Dewayne Stravenue Suite 094\nNorth Golden, TX 64464'),('88028526','983 Alaina Dam Suite 080\nLake Fredburgh, SC 17384-0868'),('98978347','814 Donavon Mission Suite 580\nNorth Susanbury, LA 82046'),('98978347','98424 Vidal Hills Apt. 460\nEast Fostermouth, SD 62222');
/*!40000 ALTER TABLE `student_address` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 20:57:31
