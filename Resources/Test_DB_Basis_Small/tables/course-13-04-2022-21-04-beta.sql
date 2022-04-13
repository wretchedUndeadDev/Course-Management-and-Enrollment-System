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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_level` int(11) DEFAULT NULL,
  `course_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_credit` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('23521961','voluptatem',600,'Porro esse aut nihil eos. Sint et consequatur accusantium at nam consequuntur et. Aspernatur ut nam necessitatibus dignissimos suscipit consectetur mollitia.',9),('30079813','reiciendis',400,'Minima minus sapiente rerum illo. Rerum exercitationem hic perferendis ad. Consequuntur aut tempore accusamus accusamus nam iusto.',6),('30553563','sed',400,'Fugiat reiciendis et sint vitae et ea sed autem. Eos voluptate fuga quis in. Est rerum aliquid porro nam. Neque molestiae ab sint est autem incidunt est maxime.',6),('40752009','nihil',500,'Qui ea suscipit doloribus optio et ea explicabo. Et magnam quos maiores rem incidunt. Labore eos non aliquam id sapiente inventore. Odit sed sapiente perspiciatis autem distinctio et.',9),('41831309','sint',300,'Excepturi nobis quaerat explicabo quibusdam sit. Cum sint rerum sit rerum. Fugiat odio dolores ipsum ratione numquam. Quaerat inventore quisquam magnam unde ullam odio a.',9),('45489920','et',600,'Modi dolorem est voluptatem saepe quas. Doloremque nulla at totam vero sapiente. Dolorem dignissimos voluptatem repellendus qui perspiciatis sunt pariatur accusantium. Vel provident est sint provident et nihil ad.',3),('60451721','nisi',200,'Consequatur cumque nesciunt et possimus et cupiditate. Iure voluptatem iste debitis.',9),('63014977','quo',400,'Aspernatur quibusdam ipsa laudantium voluptas quo quasi quis. Earum tempore impedit rerum voluptas. Cum odio molestiae dignissimos tenetur illo.',9),('89540784','facere',600,'Labore quasi voluptatem laboriosam ea quaerat ratione similique excepturi. Dolor ipsam molestias sint aut libero asperiores architecto.',9),('91074499','sit',500,'Tenetur in consequuntur cum esse veritatis. Officiis libero iusto in molestiae explicabo est ipsa et. Quos nostrum tempore aut pariatur quidem sed.',9);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 21:04:48
