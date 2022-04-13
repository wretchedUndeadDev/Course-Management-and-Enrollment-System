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
-- Table structure for table `course_review`
--

DROP TABLE IF EXISTS `course_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_review` (
  `course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `review_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `quality_rating` tinyint(4) DEFAULT NULL,
  `difficulty_rating` tinyint(4) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`course_id`,`student_id`,`review_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `course_review_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  CONSTRAINT `course_review_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_review`
--

LOCK TABLES `course_review` WRITE;
/*!40000 ALTER TABLE `course_review` DISABLE KEYS */;
INSERT INTO `course_review` VALUES ('23521961','14022287','35087063',8,9,'Expedita dolores quis sunt dolor qui modi recusandae. Fugiat aut qui accusamus qui omnis. Sequi est corrupti doloribus aperiam illum. Illo qui ea ducimus eum.'),('23521961','14022287','76975213',1,8,'Et fugit voluptas nostrum iure et officiis numquam. Commodi distinctio veritatis nulla numquam ut sint. Similique ea itaque repellat possimus aut vel labore quia. Porro numquam est alias animi quis voluptatum.'),('30079813','18496080','47838632',1,10,'Expedita consequatur alias soluta tenetur quibusdam enim. Est eum aliquam similique ipsum. Vitae qui corrupti est quae. Autem quisquam suscipit iure.'),('30079813','18496080','75992356',5,7,'Natus ut porro placeat aliquid consequatur ducimus et. Et maiores totam ut voluptatem.'),('30553563','19846756','22092675',4,9,'Nihil soluta aperiam officia laborum illum. Minima omnis est occaecati dolorem in consequatur assumenda. Asperiores voluptatem omnis laudantium esse veritatis.'),('30553563','19846756','62966110',3,10,'Quod eos quia illum at. Sed laborum quia dolores dolore impedit in est eos. Vitae et accusantium totam architecto voluptatum hic ut. Aspernatur natus in laborum ut eum repellendus enim.'),('40752009','30827190','54352272',10,6,'Tempora et ut hic autem. Quasi vel ut optio tenetur eligendi quod. Ut architecto architecto quia repellat voluptatem nemo. Autem aut qui quisquam debitis dolores nulla vitae.'),('40752009','30827190','63079493',2,2,'Earum itaque sequi dolorum eius voluptatibus quam excepturi. Qui illum reiciendis vel rem at. Ut itaque nulla minus molestiae dolor. At et sed et autem voluptatem. Repellat qui facilis error est harum.'),('41831309','37293133','52290581',5,1,'Soluta ad sit aut quia culpa eum. Similique non aut laudantium et. Quos illum at deleniti et magnam eum unde consequuntur. Dolore fuga molestias in sed ea placeat occaecati.'),('41831309','37293133','76138216',8,7,'Deleniti totam et esse velit explicabo hic. Quos debitis voluptatum dignissimos officiis sed molestias quas. Quaerat aut et commodi officiis nemo est eos.'),('45489920','56440516','97055545',9,8,'Veritatis commodi non perspiciatis voluptas temporibus earum. Corporis laborum esse quibusdam voluptatem.'),('60451721','68937537','87721638',2,1,'Est ex dolorum facere saepe vero dicta. Et itaque illo nihil illo eaque occaecati. In non tempora aut rerum.'),('63014977','85484864','77985120',7,10,'Cumque tempore pariatur voluptatem et modi exercitationem. Debitis repellendus atque voluptas amet reiciendis. Soluta reiciendis minus saepe asperiores. Ut officiis repudiandae aliquam deleniti expedita voluptate qui. Eaque est corporis est enim repudiandae hic tempora.'),('89540784','88028526','97424036',2,8,'Dignissimos ut reiciendis nihil molestias veritatis rem. Rerum officiis cumque nobis quaerat doloremque cupiditate voluptatem. Perspiciatis dolores sit sed sapiente qui nostrum placeat.'),('91074499','98978347','48752836',7,4,'Illum facilis totam qui commodi nobis exercitationem voluptate. Quo voluptate rerum dignissimos animi consequatur. Quasi qui sequi est qui. Ullam cum harum omnis sunt similique sapiente quia.');
/*!40000 ALTER TABLE `course_review` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 21:17:21
