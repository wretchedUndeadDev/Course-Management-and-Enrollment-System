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
-- Table structure for table `admin_address`
--

DROP TABLE IF EXISTS `admin_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_address` (
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`,`address`),
  CONSTRAINT `admin_address_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_address`
--

LOCK TABLES `admin_address` WRITE;
/*!40000 ALTER TABLE `admin_address` DISABLE KEYS */;
INSERT INTO `admin_address` VALUES ('45985804','33805 Treutel Square\nEast Dora, WI 80260-1998'),('45985804','53531 West Trail Suite 991\nWest Soniaton, IA 36257'),('45985804','545 Nasir Glen Suite 815\nSouth Priceport, MT 00091-5499'),('45985804','993 Douglas Wall Apt. 943\nWest Vincenzaland, NJ 58771-2'),('63713713','287 Adrien Wall Apt. 160\nSauertown, KY 18342'),('63713713','71093 Omer Loaf\nNew Ofeliatown, MA 44590-0204'),('63713713','7548 Ophelia Route\nJaquelinmouth, HI 11738-7764'),('63713713','909 Gorczany Estate\nPort Ernestina, DC 64901'),('86815604','1035 Smith Common\nBernhardmouth, SD 03732'),('86815604','21361 DuBuque Canyon\nEast Rhiannon, NH 79406'),('86815604','711 Brayan Turnpike Apt. 061\nBeerton, MN 85254'),('86815604','91934 Solon Prairie\nWest Ashlynn, RI 23738-0491'),('95353254','0521 Koch Crossroad\nSouth Joliemouth, OR 13930'),('95353254','09207 Bruen Inlet Suite 093\nSchuppeland, MN 80602'),('95353254','40261 Jarrod Throughway\nLake Reinholdland, TX 35555-468'),('95353254','46716 Jefferey Lights\nLake Lenniemouth, VT 62261-5879'),('99971926','220 DuBuque Stream\nWest Demetriusview, MA 27393-8895'),('99971926','75878 Ebert Alley\nNew Camron, NM 51089'),('99971926','7876 Stoltenberg Brooks Suite 071\nLake Blair, NC 63377-'),('99971926','79877 Schamberger Ville Suite 103\nSouth Ransomberg, RI ');
/*!40000 ALTER TABLE `admin_address` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 21:00:10
