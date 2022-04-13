-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 13, 2022 at 09:43 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpsc471_project_db_cmes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Fname` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lname` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Fname`, `Lname`, `bio`) VALUES
('45985804', 'Toni', 'Barton', 'Eum sequi perferendis repellat libero asperiores nesciunt. Perferendis reiciendis eius ea. Perspiciatis placeat eos et et officia dolorem.'),
('63713713', 'Kenneth', 'Corwin', 'Quos odio dignissimos doloribus ducimus consequatur consequatur. Quo eos ipsum ea. Praesentium eveniet perspiciatis provident fugit vel. Harum eos recusandae adipisci iste quia.'),
('86815604', 'Cheyenne', 'Bednar', 'Animi enim sunt voluptatum eos nihil maiores. Sint quisquam cumque molestiae quis. Qui rerum beatae assumenda optio. Ut suscipit hic consectetur consequatur eveniet dolores.'),
('95353254', 'Jake', 'Goodwin', 'Minus nulla saepe optio unde. Sed ut voluptate nostrum nisi. Eaque nobis ut aliquam occaecati consequatur. Id ea enim officia eos et.'),
('99971926', 'Hillard', 'Zemlak', 'Et eum ut et quis omnis quis. Quaerat eius ut saepe ut vel. Officia harum sit minus incidunt et quo.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_address`
--

DROP TABLE IF EXISTS `admin_address`;
CREATE TABLE IF NOT EXISTS `admin_address` (
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`,`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_address`
--

INSERT INTO `admin_address` (`admin_id`, `address`) VALUES
('45985804', '33805 Treutel Square\nEast Dora, WI 80260-1998'),
('45985804', '53531 West Trail Suite 991\nWest Soniaton, IA 36257'),
('45985804', '545 Nasir Glen Suite 815\nSouth Priceport, MT 00091-5499'),
('45985804', '993 Douglas Wall Apt. 943\nWest Vincenzaland, NJ 58771-2'),
('63713713', '287 Adrien Wall Apt. 160\nSauertown, KY 18342'),
('63713713', '71093 Omer Loaf\nNew Ofeliatown, MA 44590-0204'),
('63713713', '7548 Ophelia Route\nJaquelinmouth, HI 11738-7764'),
('63713713', '909 Gorczany Estate\nPort Ernestina, DC 64901'),
('86815604', '1035 Smith Common\nBernhardmouth, SD 03732'),
('86815604', '21361 DuBuque Canyon\nEast Rhiannon, NH 79406'),
('86815604', '711 Brayan Turnpike Apt. 061\nBeerton, MN 85254'),
('86815604', '91934 Solon Prairie\nWest Ashlynn, RI 23738-0491'),
('95353254', '0521 Koch Crossroad\nSouth Joliemouth, OR 13930'),
('95353254', '09207 Bruen Inlet Suite 093\nSchuppeland, MN 80602'),
('95353254', '40261 Jarrod Throughway\nLake Reinholdland, TX 35555-468'),
('95353254', '46716 Jefferey Lights\nLake Lenniemouth, VT 62261-5879'),
('99971926', '220 DuBuque Stream\nWest Demetriusview, MA 27393-8895'),
('99971926', '75878 Ebert Alley\nNew Camron, NM 51089'),
('99971926', '7876 Stoltenberg Brooks Suite 071\nLake Blair, NC 63377-'),
('99971926', '79877 Schamberger Ville Suite 103\nSouth Ransomberg, RI ');

-- --------------------------------------------------------

--
-- Table structure for table `admin_adds_class`
--

DROP TABLE IF EXISTS `admin_adds_class`;
CREATE TABLE IF NOT EXISTS `admin_adds_class` (
  `parent_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_num` int(11) NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`parent_course_id`,`class_num`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_adds_course`
--

DROP TABLE IF EXISTS `admin_adds_course`;
CREATE TABLE IF NOT EXISTS `admin_adds_course` (
  `course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`course_id`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_adds_course`
--

INSERT INTO `admin_adds_course` (`course_id`, `admin_id`, `timestamp`) VALUES
('23521961', '45985804', '2009-08-09 13:56:02'),
('30079813', '63713713', '2018-05-01 19:28:07'),
('30553563', '86815604', '1992-07-07 13:57:50'),
('40752009', '95353254', '2021-04-03 19:24:39'),
('41831309', '99971926', '1993-10-06 19:55:24'),
('45489920', '45985804', '1996-09-06 23:20:00'),
('60451721', '63713713', '1972-05-13 18:34:35'),
('63014977', '86815604', '1999-03-10 15:05:33'),
('89540784', '95353254', '1980-08-20 09:35:35'),
('91074499', '99971926', '2006-01-27 15:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_adds_student`
--

DROP TABLE IF EXISTS `admin_adds_student`;
CREATE TABLE IF NOT EXISTS `admin_adds_student` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_adds_student`
--

INSERT INTO `admin_adds_student` (`student_id`, `admin_id`, `timestamp`) VALUES
('14022287', '45985804', '1979-05-28 20:51:11'),
('18496080', '63713713', '1983-01-06 09:48:05'),
('19846756', '86815604', '1972-11-13 03:06:18'),
('30827190', '95353254', '1986-04-24 16:28:56'),
('37293133', '99971926', '1974-09-11 20:20:20'),
('56440516', '45985804', '2006-08-20 02:42:29'),
('68937537', '63713713', '1986-09-14 03:12:34'),
('85484864', '86815604', '2009-05-16 03:58:56'),
('88028526', '95353254', '1996-10-11 12:20:32'),
('98978347', '99971926', '1988-02-07 05:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_edits_class`
--

DROP TABLE IF EXISTS `admin_edits_class`;
CREATE TABLE IF NOT EXISTS `admin_edits_class` (
  `parent_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_num` int(11) NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`parent_course_id`,`class_num`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_edits_course`
--

DROP TABLE IF EXISTS `admin_edits_course`;
CREATE TABLE IF NOT EXISTS `admin_edits_course` (
  `course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`course_id`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_edits_course`
--

INSERT INTO `admin_edits_course` (`course_id`, `admin_id`, `timestamp`) VALUES
('23521961', '45985804', '1989-10-19 04:50:36'),
('30079813', '63713713', '1995-10-13 08:10:32'),
('30553563', '86815604', '1974-10-24 06:38:46'),
('40752009', '95353254', '2020-05-18 16:40:31'),
('41831309', '99971926', '1979-07-17 14:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_edits_course_review`
--

DROP TABLE IF EXISTS `admin_edits_course_review`;
CREATE TABLE IF NOT EXISTS `admin_edits_course_review` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `review_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`,`admin_id`,`course_id`,`review_id`),
  KEY `course_id` (`course_id`,`student_id`,`review_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_edits_student`
--

DROP TABLE IF EXISTS `admin_edits_student`;
CREATE TABLE IF NOT EXISTS `admin_edits_student` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_edits_student`
--

INSERT INTO `admin_edits_student` (`student_id`, `admin_id`, `timestamp`) VALUES
('14022287', '45985804', '2018-07-28 02:34:56'),
('18496080', '63713713', '2020-05-19 00:53:54'),
('19846756', '86815604', '2016-11-02 09:49:26'),
('30827190', '95353254', '1979-05-07 14:09:42'),
('37293133', '99971926', '2003-07-10 13:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_email`
--

DROP TABLE IF EXISTS `admin_email`;
CREATE TABLE IF NOT EXISTS `admin_email` (
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_email`
--

INSERT INTO `admin_email` (`admin_id`, `email`) VALUES
('45985804', 'bode.aisha@example.org'),
('45985804', 'flatley.phoebe@example.org'),
('45985804', 'king.casper@example.net'),
('45985804', 'sdietrich@example.com'),
('63713713', 'dayton.willms@example.net'),
('63713713', 'schmitt.bonnie@example.org'),
('63713713', 'tierra80@example.org'),
('63713713', 'ugraham@example.org'),
('86815604', 'austen.hansen@example.org'),
('86815604', 'cummings.demarcus@example.net'),
('86815604', 'robin15@example.com'),
('86815604', 'sadie.stokes@example.org'),
('95353254', 'kmacejkovic@example.org'),
('95353254', 'salma38@example.com'),
('95353254', 'uterry@example.net'),
('95353254', 'wiza.augusta@example.com'),
('99971926', 'amiya.stehr@example.com'),
('99971926', 'jaskolski.reba@example.org'),
('99971926', 'mhowell@example.org'),
('99971926', 'michaela.dach@example.net');

-- --------------------------------------------------------

--
-- Table structure for table `admin_phone`
--

DROP TABLE IF EXISTS `admin_phone`;
CREATE TABLE IF NOT EXISTS `admin_phone` (
  `admin_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  PRIMARY KEY (`admin_id`,`phone_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_phone`
--

INSERT INTO `admin_phone` (`admin_id`, `phone_num`) VALUES
('45985804', 1890904470),
('45985804', 2503151128),
('45985804', 5048287025),
('45985804', 7135602813),
('63713713', 1303482583),
('63713713', 3505278769),
('63713713', 8042929528),
('63713713', 9634467562),
('86815604', 5380362992),
('86815604', 7881793742),
('86815604', 9478518398),
('86815604', 9767066722),
('95353254', 2599153701),
('95353254', 2658141269),
('95353254', 6318561580),
('95353254', 8314496024),
('99971926', 1537210603),
('99971926', 4788461044),
('99971926', 6533140615),
('99971926', 7150004805);

-- --------------------------------------------------------

--
-- Table structure for table `admin_removes_class`
--

DROP TABLE IF EXISTS `admin_removes_class`;
CREATE TABLE IF NOT EXISTS `admin_removes_class` (
  `parent_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_num` int(11) NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`parent_course_id`,`class_num`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_removes_course`
--

DROP TABLE IF EXISTS `admin_removes_course`;
CREATE TABLE IF NOT EXISTS `admin_removes_course` (
  `course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`course_id`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_removes_course_review`
--

DROP TABLE IF EXISTS `admin_removes_course_review`;
CREATE TABLE IF NOT EXISTS `admin_removes_course_review` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `review_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`,`admin_id`,`course_id`,`review_id`),
  KEY `course_id` (`course_id`,`student_id`,`review_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_removes_student`
--

DROP TABLE IF EXISTS `admin_removes_student`;
CREATE TABLE IF NOT EXISTS `admin_removes_student` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`,`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `parent_course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_num` int(11) NOT NULL,
  `room_num` smallint(6) DEFAULT NULL,
  `seat_num` smallint(6) DEFAULT NULL,
  `waitlist_num` smallint(6) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `class_type` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'n/a',
  `ta` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'n/a',
  `supervisor` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'n/a',
  PRIMARY KEY (`parent_course_id`,`class_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`parent_course_id`, `class_num`, `room_num`, `seat_num`, `waitlist_num`, `start_time`, `end_time`, `class_type`, `instructor`, `ta`, `supervisor`) VALUES
('23521961', 32776127, 283, 276, 15, '10:40:05', '03:41:14', 'A', '', 'Erdman', 'Dach'),
('23521961', 84397119, 436, 88, 19, '19:35:48', '20:57:30', 'A', 'Larkin', 'Rowe', 'Johns'),
('23521961', 95788748, 274, 230, 15, '23:10:39', '17:54:04', 'T', '', 'Kshlerin', ''),
('30079813', 29343246, 754, 245, 10, '20:23:14', '19:58:44', 'L', 'Wiegand', '', ''),
('30079813', 64264755, 935, 193, 9, '17:23:54', '09:04:34', 'T', 'Rogahn', 'Schuster', ''),
('30079813', 72137608, 530, 247, 18, '22:40:48', '09:40:26', 'L', 'Ward', 'Krajcik', 'Wunsch'),
('30553563', 12968084, 461, 296, 9, '16:43:54', '01:28:56', 'T', '', '', ''),
('30553563', 80836920, 987, 188, 2, '00:57:21', '20:46:16', 'T', 'Beer', 'Stehr', ''),
('30553563', 94737003, 589, 202, 20, '05:05:51', '23:34:43', 'T', 'Gaylord', '', ''),
('40752009', 15838514, 926, 119, 5, '03:56:46', '09:09:35', 'T', 'Moen', '', 'Gutkowski'),
('40752009', 16360291, 888, 281, 5, '19:42:57', '00:13:29', 'L', 'Daugherty', 'Runolfsson', ''),
('40752009', 39872714, 257, 64, 4, '14:51:44', '12:32:32', 'T', '', 'McCullough', 'Kuphal'),
('41831309', 19099445, 123, 153, 4, '00:10:06', '17:57:42', 'L', '', '', 'Abbott'),
('41831309', 57341746, 941, 272, 15, '16:47:36', '13:29:10', 'T', '', 'Pagac', ''),
('41831309', 73541304, 578, 277, 8, '16:16:56', '06:34:36', 'T', 'Bartoletti', 'McGlynn', 'Schulist'),
('45489920', 35621838, 725, 178, 4, '03:47:42', '03:28:56', 'A', '', '', 'Padberg'),
('45489920', 36123070, 382, 127, 20, '15:10:41', '09:43:37', 'A', '', '', 'Torp'),
('45489920', 67358362, 240, 150, 1, '14:53:55', '17:50:25', 'T', 'Orn', '', ''),
('60451721', 16038394, 202, 215, 20, '20:50:53', '23:25:15', 'T', '', 'Baumbach', 'Moen'),
('60451721', 21820684, 766, 210, 7, '05:47:57', '00:51:04', 'A', 'Kemmer', '', 'Stanton'),
('60451721', 52357231, 720, 31, 17, '23:56:56', '17:12:25', 'T', 'Huel', 'Keebler', 'White'),
('63014977', 37560166, 544, 46, 1, '02:59:59', '07:48:47', 'A', '', 'Feil', ''),
('63014977', 67663860, 920, 230, 13, '00:29:56', '16:50:02', 'L', '', '', ''),
('63014977', 78125453, 731, 129, 13, '21:45:01', '17:31:07', 'A', 'Pacocha', '', 'Huels'),
('89540784', 33922924, 469, 65, 0, '14:57:49', '09:06:13', 'A', '', '', ''),
('89540784', 51763407, 115, 78, 4, '11:53:42', '06:29:56', 'L', 'Wiegand', '', 'Jast'),
('89540784', 57531269, 494, 276, 2, '15:23:57', '07:36:29', 'T', '', 'Grant', 'McKenzie'),
('91074499', 46635596, 650, 147, 2, '00:23:57', '06:00:59', 'T', '', 'Champlin', ''),
('91074499', 64875982, 999, 45, 12, '01:37:28', '11:50:04', 'T', 'Ernser', '', ''),
('91074499', 81373411, 614, 156, 7, '21:46:00', '03:58:31', 'T', 'Rau', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `class_days`
--

DROP TABLE IF EXISTS `class_days`;
CREATE TABLE IF NOT EXISTS `class_days` (
  `parent_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_num` int(11) NOT NULL,
  `day` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent_course_id`,`class_num`,`day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concentration`
--

DROP TABLE IF EXISTS `concentration`;
CREATE TABLE IF NOT EXISTS `concentration` (
  `major_faculty_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `major_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`major_faculty_name`,`major_name`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concentration_sample_desc_pool`
--

DROP TABLE IF EXISTS `concentration_sample_desc_pool`;
CREATE TABLE IF NOT EXISTS `concentration_sample_desc_pool` (
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `concentration_sample_desc_pool`
--

INSERT INTO `concentration_sample_desc_pool` (`description`) VALUES
('Reprehenderit quo iure recusandae non praesentium veniam quia consequatur. Dolorem et earum vel dolores qui voluptatem. Voluptas et nihil placeat et nisi corrupti. Est at ut qui voluptatibus sint.'),
('Quia reprehenderit sequi similique molestiae aliquam. Ea id est dignissimos eveniet dignissimos. Ullam id ea deleniti aut ipsa. Quam omnis quos ex veritatis qui.'),
('Dolor quisquam deserunt a eveniet. Exercitationem excepturi omnis fugit aliquid vitae fugiat recusandae et. Atque omnis debitis perspiciatis quisquam aut error. Aut accusamus vel odit quod aperiam voluptates quisquam fugit.'),
('Voluptatum voluptas rerum quidem totam. Dolor omnis quod quidem amet omnis. Quaerat possimus aut officiis ea et error.'),
('Quo a ex ab iste magnam repudiandae. Sed sint cum nam veritatis et. Officia incidunt nisi illum et eum vitae.'),
('Rerum mollitia nisi consequatur eaque voluptatem non quisquam. Nobis vitae ea id et excepturi cumque numquam. Et veritatis officiis id quos.'),
('Officiis eum autem reiciendis officiis beatae facere eum voluptas. Omnis vero quae et placeat et consectetur sequi. Autem iste aliquam corrupti voluptatem neque. Omnis nostrum vel rerum accusamus sit.'),
('Libero pariatur quo ut doloremque eum. At quo repudiandae non fugit.'),
('Aut inventore molestias in molestias esse unde omnis. Mollitia sequi totam dolorem eveniet asperiores maiores commodi. Autem perferendis sit maiores sed alias quod in.'),
('Distinctio exercitationem ab veritatis voluptas. Itaque amet voluptatem consequatur exercitationem. Itaque voluptatibus animi enim qui. Quos autem omnis amet.'),
('Quo quae doloribus cupiditate enim eum et. Quasi facilis atque aliquam libero. Eveniet eligendi vitae ratione similique. Vel voluptatem numquam autem sint.'),
('Architecto hic et dolor ea quia at ut. Nihil voluptatem amet eaque aut assumenda. Dolor voluptates architecto est molestiae. Eligendi sed quia commodi quis est.'),
('Est vitae provident sed sequi minus est. Ipsum vel qui consectetur et ut deleniti. Ipsa illum sint vero recusandae. Fugiat sunt est quis facere.'),
('Doloremque eos quo quia nihil rerum nam quis. Vitae numquam hic enim enim voluptatem atque eum. Ducimus consectetur repellat possimus et est.'),
('Dignissimos autem eos consequatur est. Fugit voluptas sed quae sint est perferendis. Itaque officiis accusantium sed autem voluptatibus. Fugit dolor aliquid quas molestiae omnis minima fugiat. Incidunt nihil tempora ipsa cumque totam eius.'),
('Aperiam est consequuntur rerum et id. Maxime nesciunt numquam itaque ratione iusto nulla doloribus. Quos facere minima quia quos quaerat rerum commodi. Et ex nobis ea ea sunt cum placeat.'),
('Officia reiciendis eum aut laboriosam. Delectus alias quibusdam corporis velit sit a.'),
('Deleniti quis odio rerum libero. Necessitatibus aut et sit deserunt et ut. Inventore vel consequuntur enim quidem culpa.'),
('Non similique qui harum sapiente odit quia et. Tempora enim distinctio officiis fugit ex ducimus. Non voluptate at deleniti deleniti nam enim perspiciatis. Quam soluta dignissimos nam modi et commodi rerum.'),
('Aut maxime sed est voluptas repellendus est. Voluptatibus quia vero laboriosam porro deserunt necessitatibus. Ut autem excepturi est esse atque id vero ex. Est odit doloribus quasi officia. Quia voluptate saepe tempora.'),
('Et enim ea quia consequuntur laborum ipsum. Quia tempore quae nemo perferendis deserunt quo. Omnis et non perferendis dolore ex nemo. Occaecati reiciendis officia nam perspiciatis consequatur vitae deserunt id.'),
('Est vel quod eaque laudantium earum. Ea aut rerum magnam molestiae. Rerum omnis asperiores consequuntur. Dignissimos consectetur repellat sit voluptatibus fuga est.'),
('Accusantium assumenda molestias est et eum omnis dolorem. Assumenda quia ad temporibus occaecati qui expedita. Laudantium qui vel ab voluptatum minima fugiat exercitationem commodi.'),
('Odio dolorem ut voluptas accusamus. Laboriosam quo nesciunt neque enim dolorem voluptas. Sed veniam officia voluptatem est eaque. Perspiciatis atque hic commodi fugiat laboriosam. Totam aut nam est neque velit ea.'),
('Asperiores distinctio cum est eum sed incidunt voluptatem vel. Enim est iste qui adipisci consequatur sapiente. Non nostrum quas non.'),
('Deleniti provident et eligendi odit rerum. Nam est tenetur aut necessitatibus velit. Cum ipsa fuga adipisci enim neque quasi. Aperiam debitis quam non odio nihil odio.'),
('Harum ad optio vero aliquid voluptatem. Culpa voluptas suscipit enim nihil. Optio sit aut a incidunt maxime.'),
('Pariatur maiores doloremque officia totam. Quod quaerat non sint reiciendis quo qui. Assumenda accusantium saepe exercitationem qui dignissimos voluptatem. Consectetur ex illo quia.'),
('Nostrum ut fugit qui nihil odit. Corporis sint reiciendis distinctio officiis tempora eligendi. Fugiat quasi sit id qui temporibus dolorem praesentium. Eos maiores ut iusto eos.'),
('Aliquid laudantium temporibus velit asperiores. Veniam libero porro laudantium voluptatum. Dolores excepturi veritatis dolore iure autem sit delectus autem. Qui fuga aut a veritatis error quo vel.'),
('Quas amet molestiae quasi hic unde. Fugit consequatur laboriosam libero. Ut neque sunt magni voluptas. Omnis fuga et a consectetur. Officia est aperiam laudantium enim molestias.'),
('Voluptas debitis et temporibus. Incidunt sapiente assumenda id qui tenetur. Velit nemo hic sed doloribus nihil aperiam consequatur.'),
('Iusto enim maiores corrupti. Enim cum sit sed impedit. Fugit possimus ad modi doloremque fuga natus est error.'),
('Alias tempora iste voluptates sunt dolorum quo error. Quaerat et nesciunt maiores debitis. Numquam iusto nisi architecto at ratione eos.'),
('Dolorum velit et quidem. Ex facilis quis voluptatem aperiam illo voluptatum. Nam ab nisi explicabo dolore consequuntur odit. Quia ea vitae impedit ratione qui est harum.'),
('Sunt earum quas occaecati sunt voluptate. Ex aut nostrum dicta facilis. Earum laborum asperiores ut molestiae aperiam laborum.'),
('Officia numquam eos ut ab. Et nostrum et voluptatem nulla.'),
('Ratione in quasi odit nobis aut. Excepturi laudantium illum sed nesciunt. Dolore sed earum illo et sed numquam cumque. Quisquam ex est perspiciatis. Porro quo occaecati sint et aut sint.'),
('Commodi modi aspernatur deserunt aut illum corrupti soluta. Libero earum porro facilis praesentium voluptatem voluptatibus. Beatae qui nemo et. Quo qui sequi est ut fugiat dolores.'),
('Eos qui velit fugit voluptatem tenetur. Cupiditate saepe odio inventore eius. Ipsam ut odio et eligendi libero. Atque aut tempora eaque aut omnis voluptas. Ut consectetur omnis impedit fuga iste perferendis nemo et.'),
('Quis omnis explicabo nulla repudiandae quo autem magni. Temporibus corporis soluta natus hic. Repudiandae et odio nulla soluta consequatur vitae.'),
('Provident culpa placeat enim deleniti. Et commodi laborum sit sed ut qui. Temporibus et voluptatem non eius inventore porro. Rerum blanditiis et eveniet quae et voluptatem.'),
('Officiis illum est commodi labore cum labore modi. Dolores laborum dolores vel. Non impedit qui soluta nam officiis.'),
('Et dolores vel minus dolorum. Voluptates et accusantium nam sint. Officia facere voluptas omnis placeat. Dolor dolores voluptas qui sint quasi eos.'),
('Error voluptatem vel quia eos. Aut soluta ut pariatur cum aut molestias. Adipisci consequatur qui enim tempora voluptatem nesciunt. Aut ullam quis nostrum ullam labore.'),
('Distinctio sint perferendis voluptatem provident dolorum. Maxime ratione iusto quaerat non voluptas. In eaque aliquid vero autem inventore vel deleniti.'),
('Harum maxime nisi maiores voluptas maxime. Quidem ex rerum ut tenetur minima facere ab. Fugiat dolorum enim id culpa voluptatibus dolorum repudiandae.'),
('Laudantium aut a quibusdam eos. Quia iste non delectus quo id et. Deleniti quia rerum quas dolores quis necessitatibus distinctio.'),
('Inventore molestiae ad porro corrupti consectetur. Tenetur pariatur reprehenderit nihil et. Cupiditate aliquid unde magni sapiente et illum. Aut eveniet deserunt officiis ab quisquam eos eius.'),
('Sed ut suscipit perferendis sed. Sed consequuntur consequatur beatae nobis suscipit enim. Dolorem et sit praesentium et voluptas. Quo consequuntur doloribus reiciendis blanditiis in vero molestias omnis. Enim et et et sint enim velit.'),
('Voluptatum sunt labore dicta eum. Quia ipsum molestiae eveniet laborum rem temporibus. Blanditiis est aliquid eos. Vero qui aut similique ratione maiores perferendis. Quis delectus quae minima explicabo.'),
('Eos repellendus velit harum dolorem. Qui ut sunt laudantium iure voluptatum. Impedit veniam earum quasi eveniet et voluptatem. In et possimus rerum et earum ex odit. Et veritatis in eveniet quos pariatur et eum.'),
('Et iure non non voluptas. Voluptas enim praesentium ex qui assumenda. Expedita eius deleniti atque molestiae quo dolores a.'),
('Dicta repellendus recusandae laborum placeat dolorem quae. Eum molestias dolorum eius et consequatur nulla.'),
('Odit suscipit dolore quaerat consequatur illum. Quo voluptatem iste error dolorem quasi. Quia qui dolorem commodi qui molestias error est.'),
('Quisquam quibusdam perferendis quia odio vero. Doloribus doloremque aut et voluptate. Fugit perferendis et sed fugiat sunt dolorem nihil.'),
('Cupiditate ex accusamus voluptate sed impedit ex magni. Ab non beatae modi laboriosam reiciendis sapiente voluptates architecto. Libero nisi illum soluta est labore quis.'),
('Reprehenderit quam voluptas et porro aut consequatur voluptas. Esse harum magni asperiores cumque rerum recusandae aspernatur. Dolor maxime et modi dignissimos repudiandae aut. Et illo ab natus magni dolorem.'),
('Quibusdam nostrum ex rerum ea aliquam non. Qui eligendi quisquam libero doloremque reiciendis. Officia dolor et et expedita necessitatibus et minima. Ratione veniam laboriosam nam nulla possimus.'),
('Est est ut ad temporibus. Quo ad enim et voluptate quis sequi non hic. Nobis perferendis rerum id eum at.'),
('Eaque nemo est beatae qui. Alias atque autem id vel magni earum. Ut quis omnis fugit. Dolor qui perferendis consequatur voluptatibus id adipisci.'),
('Dolores velit aut cumque illum eaque tempora. Harum debitis omnis voluptatem alias qui. Fuga repudiandae exercitationem vel tempora laboriosam.'),
('Recusandae velit sunt quisquam voluptatem. Officiis veniam et aut exercitationem repellat est laborum. Cumque nostrum est sed voluptatum sed.'),
('Aut quibusdam sed in veniam porro et accusantium. Dolore consequuntur voluptatum est maiores similique voluptatem. Pariatur enim perferendis sed quia illo corrupti et.'),
('Perferendis vitae tempore consequatur voluptatem. Doloribus consequatur sit facilis laborum praesentium. Consequatur excepturi dicta nemo consequuntur velit et.'),
('Cupiditate soluta molestiae ut debitis. Temporibus quo autem quo qui autem id quo. Ipsum eaque vel minima dolorum velit numquam. Sed velit impedit autem et.'),
('Ullam et eos magnam voluptas. Impedit corrupti nihil dicta quo adipisci omnis quia nemo. Rerum officiis nihil blanditiis iste vel saepe reprehenderit.'),
('Consequatur consequatur rerum voluptates assumenda voluptas animi dignissimos. Sit placeat eveniet impedit quas saepe qui sapiente. Blanditiis dolores modi optio inventore enim iusto ut. Veniam consequatur quas praesentium veritatis.'),
('Aut molestiae animi at occaecati. Veniam ut mollitia sint distinctio atque voluptatem.'),
('Quas aut non quaerat. Voluptatibus eligendi quasi quaerat sequi corrupti. Ad enim recusandae nobis ea.'),
('Assumenda ut sed esse perferendis. Sit eos ipsa sint veniam sit natus. Quia sed quo eius sed. Laboriosam doloremque id possimus vitae omnis consequatur.'),
('Illo voluptatem laudantium iure reiciendis et culpa harum. Accusantium voluptatem et reprehenderit.'),
('Porro rem velit eius magnam alias cupiditate. Dicta aperiam vel accusamus in dolor esse minus placeat. Quod aut deserunt nemo possimus totam.'),
('Inventore atque qui omnis. Quidem qui asperiores sit voluptas et occaecati. Soluta similique deleniti consequatur provident et qui unde laudantium.'),
('Ad sint consequatur quasi eos voluptatem laboriosam. Molestias nam quasi iste autem eius est. Et architecto qui inventore dolores. Quisquam aliquid eaque accusantium veniam est voluptas mollitia et.'),
('Voluptatem nam aut qui distinctio quo cumque. Accusantium sunt commodi non rerum nemo. Assumenda vel pariatur sed ea sit. Laudantium et alias dignissimos voluptatem est et. Aliquid qui qui et quos dolor officiis.'),
('Sunt enim quos cum labore porro ea. Facere laborum inventore nobis qui et fuga quaerat doloribus. Libero necessitatibus eum odio eaque quaerat unde.'),
('Culpa omnis delectus molestiae voluptatem accusamus. Quis aliquam fugit at a error eum officia. Est ad eum saepe deserunt itaque ea corrupti.'),
('Doloribus harum culpa officiis minus et itaque aut. Eveniet eos voluptates soluta facilis. Ut qui et voluptatem ut ut sunt debitis repellat.'),
('Natus error et harum vitae. Ut architecto corporis aut mollitia commodi molestias et impedit. Quia unde aut rerum eum nulla. Necessitatibus a aut voluptas nemo. Saepe consequuntur nam et.'),
('Ut ea et et. Saepe nemo iste harum molestias illum.'),
('Voluptatem adipisci maiores voluptatum rerum laudantium. Animi natus dignissimos corporis distinctio recusandae alias. Totam error sit aut dolor aut. Tempore tempore natus ipsa ipsum. Quidem et ab quasi fugit dolor et aut.'),
('Similique maxime iste id doloremque quaerat unde. A quisquam alias ratione et. Repudiandae aut enim necessitatibus laboriosam. Voluptatibus sint velit molestiae nam.'),
('Delectus adipisci velit mollitia tempore voluptatem ullam aut tempora. Illo est esse assumenda qui dolores adipisci. Molestias sit omnis eius autem vero.'),
('Error aperiam ut dolorem perspiciatis exercitationem qui. Dolorem ad quibusdam voluptatem eos qui eos voluptatem incidunt. Qui quae quibusdam ut sed hic et. Et corporis adipisci vero.'),
('Maiores aut placeat ipsam non. Velit ex eveniet architecto nihil libero et cumque. Deleniti quisquam eum debitis quia ex enim perspiciatis. Maxime impedit qui qui esse in veritatis dignissimos laborum. Vel expedita nihil eum qui ratione explicabo in reiciendis.'),
('Dolores vero quia explicabo non deserunt voluptatem. Dolorem doloribus et facere iure libero omnis. Quo est corporis nihil qui consequatur vitae culpa cum.'),
('Sunt velit voluptatem odio adipisci ut. Voluptatem assumenda voluptatem placeat eum distinctio soluta. Dolores quasi quo dolor ab sint ut. Id fugit laboriosam accusamus ea non esse possimus.'),
('Architecto voluptas sapiente quis harum et. Qui consequatur iusto corrupti porro. Sit voluptatum doloremque dolorem eveniet necessitatibus reiciendis voluptates rerum. Adipisci dicta ullam eum pariatur sunt.'),
('Non qui officia illo iusto molestiae libero. Cum eum aperiam similique quam. Molestiae officia vel debitis laborum repellendus fuga praesentium.'),
('Voluptates ut fugiat doloremque consequatur provident dolorum. Et architecto distinctio sapiente iste porro. Minus illo culpa aliquid vel non qui possimus.'),
('Consequatur itaque temporibus quo molestias pariatur. Quia expedita et eaque dolorum laboriosam sint non. Quibusdam molestiae optio deserunt architecto.'),
('Nihil laboriosam doloremque quia voluptas. Reprehenderit ipsa rem ea quis ut aliquid delectus. Dolor et id quasi. Est et molestiae ipsa veniam autem.'),
('Sed velit enim dolores in. Soluta officia reiciendis id sed suscipit. Tempore deserunt autem quasi officiis aut nobis possimus.'),
('Sed amet pariatur eos est. Debitis iusto commodi explicabo reprehenderit libero nostrum. Similique modi aut ut repellat aut. Ducimus porro laboriosam iste occaecati sint. Accusantium doloribus est doloribus aut.'),
('Nisi et et mollitia dolorem blanditiis optio. Quas laudantium consequatur ratione harum ut error eos.'),
('Eveniet consequatur nobis nulla pariatur fugit. Est mollitia quia sint itaque sed. Doloremque laborum ex sequi illo fuga aliquam. Sapiente natus consectetur molestias porro sed cum voluptate.'),
('Provident cumque maiores modi vel enim dolorem. Dolorem non voluptatem et ut aut voluptas nisi qui. Pariatur mollitia corporis est deleniti officiis. Quisquam earum perferendis aut impedit.'),
('Vel magni quo debitis est dolorem sed. Eos in voluptatem vel aliquid quod. Nulla eius voluptas aut quo.'),
('Voluptas blanditiis tenetur iusto rerum quibusdam. Eaque doloribus soluta accusamus voluptas labore id et cumque. Debitis neque deleniti saepe qui. Autem dolores unde alias velit eum nisi praesentium.');

-- --------------------------------------------------------

--
-- Table structure for table `concentration_sample_name_pool`
--

DROP TABLE IF EXISTS `concentration_sample_name_pool`;
CREATE TABLE IF NOT EXISTS `concentration_sample_name_pool` (
  `name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `concentration_sample_name_pool`
--

INSERT INTO `concentration_sample_name_pool` (`name`) VALUES
('nisi'),
('nulla'),
('exercitationem'),
('aut'),
('autem'),
('molestiae'),
('velit'),
('ipsa'),
('hic'),
('impedit'),
('magni'),
('qui'),
('consequatur'),
('necessitatibus'),
('molestias'),
('eos'),
('dolores'),
('et'),
('earum'),
('amet'),
('temporibus'),
('qui'),
('corrupti'),
('voluptas'),
('tenetur'),
('est'),
('sint'),
('et'),
('minima'),
('et'),
('nulla'),
('non'),
('ipsum'),
('fuga'),
('tempore'),
('et'),
('accusamus'),
('rem'),
('vero'),
('et'),
('aperiam'),
('rerum'),
('laboriosam'),
('eum'),
('ullam'),
('voluptatem'),
('asperiores'),
('et'),
('veniam'),
('a'),
('et'),
('distinctio'),
('et'),
('aut'),
('ut'),
('modi'),
('est'),
('possimus'),
('harum'),
('molestiae'),
('ullam'),
('illum'),
('maxime'),
('ratione'),
('distinctio'),
('necessitatibus'),
('dignissimos'),
('ut'),
('molestiae'),
('unde'),
('vel'),
('dolor'),
('quae'),
('labore'),
('nisi'),
('non'),
('recusandae'),
('a'),
('quis'),
('nobis'),
('iste'),
('voluptatem'),
('sit'),
('et'),
('aut'),
('eaque'),
('vero'),
('molestias'),
('numquam'),
('laboriosam'),
('corporis'),
('est'),
('suscipit'),
('dignissimos'),
('nostrum'),
('dolores'),
('et'),
('tempora'),
('sequi'),
('hic');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_level` int(11) DEFAULT NULL,
  `course_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `course_credit` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_level`, `course_description`, `course_credit`) VALUES
('23521961', 'voluptatem', 600, 'Porro esse aut nihil eos. Sint et consequatur accusantium at nam consequuntur et. Aspernatur ut nam necessitatibus dignissimos suscipit consectetur mollitia.', 9),
('30079813', 'reiciendis', 400, 'Minima minus sapiente rerum illo. Rerum exercitationem hic perferendis ad. Consequuntur aut tempore accusamus accusamus nam iusto.', 6),
('30553563', 'sed', 400, 'Fugiat reiciendis et sint vitae et ea sed autem. Eos voluptate fuga quis in. Est rerum aliquid porro nam. Neque molestiae ab sint est autem incidunt est maxime.', 6),
('40752009', 'nihil', 500, 'Qui ea suscipit doloribus optio et ea explicabo. Et magnam quos maiores rem incidunt. Labore eos non aliquam id sapiente inventore. Odit sed sapiente perspiciatis autem distinctio et.', 9),
('41831309', 'sint', 300, 'Excepturi nobis quaerat explicabo quibusdam sit. Cum sint rerum sit rerum. Fugiat odio dolores ipsum ratione numquam. Quaerat inventore quisquam magnam unde ullam odio a.', 9),
('45489920', 'et', 600, 'Modi dolorem est voluptatem saepe quas. Doloremque nulla at totam vero sapiente. Dolorem dignissimos voluptatem repellendus qui perspiciatis sunt pariatur accusantium. Vel provident est sint provident et nihil ad.', 3),
('60451721', 'nisi', 200, 'Consequatur cumque nesciunt et possimus et cupiditate. Iure voluptatem iste debitis.', 9),
('63014977', 'quo', 400, 'Aspernatur quibusdam ipsa laudantium voluptas quo quasi quis. Earum tempore impedit rerum voluptas. Cum odio molestiae dignissimos tenetur illo.', 9),
('89540784', 'facere', 600, 'Labore quasi voluptatem laboriosam ea quaerat ratione similique excepturi. Dolor ipsam molestias sint aut libero asperiores architecto.', 9),
('91074499', 'sit', 500, 'Tenetur in consequuntur cum esse veritatis. Officiis libero iusto in molestiae explicabo est ipsa et. Quos nostrum tempore aut pariatur quidem sed.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `course_antireq`
--

DROP TABLE IF EXISTS `course_antireq`;
CREATE TABLE IF NOT EXISTS `course_antireq` (
  `requiring_course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_antireq_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`requiring_course_id`,`course_antireq_id`),
  KEY `course_antireq_id` (`course_antireq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_antireq`
--

INSERT INTO `course_antireq` (`requiring_course_id`, `course_antireq_id`) VALUES
('23521961', '23521961'),
('30079813', '30079813'),
('30553563', '30553563'),
('40752009', '40752009'),
('41831309', '41831309'),
('45489920', '45489920'),
('60451721', '60451721'),
('63014977', '63014977'),
('89540784', '89540784'),
('91074499', '91074499');

-- --------------------------------------------------------

--
-- Table structure for table `course_prereq`
--

DROP TABLE IF EXISTS `course_prereq`;
CREATE TABLE IF NOT EXISTS `course_prereq` (
  `requiring_course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_prereq_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`requiring_course_id`,`course_prereq_id`),
  KEY `course_prereq_id` (`course_prereq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_prereq`
--

INSERT INTO `course_prereq` (`requiring_course_id`, `course_prereq_id`) VALUES
('23521961', '23521961'),
('30079813', '30079813'),
('30553563', '30553563'),
('40752009', '40752009'),
('41831309', '41831309'),
('45489920', '45489920'),
('60451721', '60451721'),
('63014977', '63014977'),
('89540784', '89540784'),
('91074499', '91074499');

-- --------------------------------------------------------

--
-- Table structure for table `course_required_by_concentration`
--

DROP TABLE IF EXISTS `course_required_by_concentration`;
CREATE TABLE IF NOT EXISTS `course_required_by_concentration` (
  `major_program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `major_program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `concentration_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `required_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`major_program_name`,`major_program_faculty`,`concentration_name`,`required_course_id`),
  KEY `major_program_faculty` (`major_program_faculty`,`major_program_name`,`concentration_name`),
  KEY `required_course_id` (`required_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_required_by_major_program`
--

DROP TABLE IF EXISTS `course_required_by_major_program`;
CREATE TABLE IF NOT EXISTS `course_required_by_major_program` (
  `major_program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `major_program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `required_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`major_program_name`,`major_program_faculty`,`required_course_id`),
  KEY `major_program_faculty` (`major_program_faculty`,`major_program_name`),
  KEY `required_course_id` (`required_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_required_by_minor_program`
--

DROP TABLE IF EXISTS `course_required_by_minor_program`;
CREATE TABLE IF NOT EXISTS `course_required_by_minor_program` (
  `minor_program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `minor_program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `required_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`minor_program_name`,`minor_program_faculty`,`required_course_id`),
  KEY `minor_program_faculty` (`minor_program_faculty`,`minor_program_name`),
  KEY `required_course_id` (`required_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_restricted_to_major_program`
--

DROP TABLE IF EXISTS `course_restricted_to_major_program`;
CREATE TABLE IF NOT EXISTS `course_restricted_to_major_program` (
  `major_program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `major_program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `restricted_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`major_program_name`,`major_program_faculty`,`restricted_course_id`),
  KEY `major_program_faculty` (`major_program_faculty`,`major_program_name`),
  KEY `restricted_course_id` (`restricted_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_review`
--

DROP TABLE IF EXISTS `course_review`;
CREATE TABLE IF NOT EXISTS `course_review` (
  `course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `review_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quality_rating` tinyint(4) DEFAULT NULL,
  `difficulty_rating` tinyint(4) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`course_id`,`student_id`,`review_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_review`
--

INSERT INTO `course_review` (`course_id`, `student_id`, `review_id`, `quality_rating`, `difficulty_rating`, `content`) VALUES
('23521961', '14022287', '35087063', 8, 9, 'Expedita dolores quis sunt dolor qui modi recusandae. Fugiat aut qui accusamus qui omnis. Sequi est corrupti doloribus aperiam illum. Illo qui ea ducimus eum.'),
('23521961', '14022287', '76975213', 1, 8, 'Et fugit voluptas nostrum iure et officiis numquam. Commodi distinctio veritatis nulla numquam ut sint. Similique ea itaque repellat possimus aut vel labore quia. Porro numquam est alias animi quis voluptatum.'),
('30079813', '18496080', '47838632', 1, 10, 'Expedita consequatur alias soluta tenetur quibusdam enim. Est eum aliquam similique ipsum. Vitae qui corrupti est quae. Autem quisquam suscipit iure.'),
('30079813', '18496080', '75992356', 5, 7, 'Natus ut porro placeat aliquid consequatur ducimus et. Et maiores totam ut voluptatem.'),
('30553563', '19846756', '22092675', 4, 9, 'Nihil soluta aperiam officia laborum illum. Minima omnis est occaecati dolorem in consequatur assumenda. Asperiores voluptatem omnis laudantium esse veritatis.'),
('30553563', '19846756', '62966110', 3, 10, 'Quod eos quia illum at. Sed laborum quia dolores dolore impedit in est eos. Vitae et accusantium totam architecto voluptatum hic ut. Aspernatur natus in laborum ut eum repellendus enim.'),
('40752009', '30827190', '54352272', 10, 6, 'Tempora et ut hic autem. Quasi vel ut optio tenetur eligendi quod. Ut architecto architecto quia repellat voluptatem nemo. Autem aut qui quisquam debitis dolores nulla vitae.'),
('40752009', '30827190', '63079493', 2, 2, 'Earum itaque sequi dolorum eius voluptatibus quam excepturi. Qui illum reiciendis vel rem at. Ut itaque nulla minus molestiae dolor. At et sed et autem voluptatem. Repellat qui facilis error est harum.'),
('41831309', '37293133', '52290581', 5, 1, 'Soluta ad sit aut quia culpa eum. Similique non aut laudantium et. Quos illum at deleniti et magnam eum unde consequuntur. Dolore fuga molestias in sed ea placeat occaecati.'),
('41831309', '37293133', '76138216', 8, 7, 'Deleniti totam et esse velit explicabo hic. Quos debitis voluptatum dignissimos officiis sed molestias quas. Quaerat aut et commodi officiis nemo est eos.'),
('45489920', '56440516', '97055545', 9, 8, 'Veritatis commodi non perspiciatis voluptas temporibus earum. Corporis laborum esse quibusdam voluptatem.'),
('60451721', '68937537', '87721638', 2, 1, 'Est ex dolorum facere saepe vero dicta. Et itaque illo nihil illo eaque occaecati. In non tempora aut rerum.'),
('63014977', '85484864', '77985120', 7, 10, 'Cumque tempore pariatur voluptatem et modi exercitationem. Debitis repellendus atque voluptas amet reiciendis. Soluta reiciendis minus saepe asperiores. Ut officiis repudiandae aliquam deleniti expedita voluptate qui. Eaque est corporis est enim repudiandae hic tempora.'),
('89540784', '88028526', '97424036', 2, 8, 'Dignissimos ut reiciendis nihil molestias veritatis rem. Rerum officiis cumque nobis quaerat doloremque cupiditate voluptatem. Perspiciatis dolores sit sed sapiente qui nostrum placeat.'),
('91074499', '98978347', '48752836', 7, 4, 'Illum facilis totam qui commodi nobis exercitationem voluptate. Quo voluptate rerum dignissimos animi consequatur. Quasi qui sequi est qui. Ullam cum harum omnis sunt similique sapiente quia.');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `information` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `information`) VALUES
('consectetur', 'Possimus quisquam qui reprehenderit officia eius labore. Molestiae aut omnis beatae et repellendus. Voluptate sunt autem eos ratione.'),
('minima', 'Ullam minima quidem est et fuga ut quibusdam sed. Unde dignissimos ipsam enim eveniet sequi. Magni voluptatum fuga nihil voluptas et alias. Illo vel delectus qui. Culpa quasi eaque modi placeat optio.'),
('nulla', 'Maiores voluptates voluptatem saepe cupiditate numquam officiis. Atque quia officiis consequatur. Recusandae voluptate sed sequi debitis. Dolores autem numquam optio.'),
('omnis', 'Rem fuga dolor voluptatem qui quisquam unde. Autem laudantium non sunt sunt vel aliquam molestiae. Laboriosam a exercitationem occaecati a. Nam atque eum magnam voluptate aliquid et nihil.'),
('quae', 'Quis est minus nihil nihil sequi. Porro deleniti perferendis laudantium praesentium. Sunt ducimus eum dolor ut et ea.');

-- --------------------------------------------------------

--
-- Table structure for table `major_program`
--

DROP TABLE IF EXISTS `major_program`;
CREATE TABLE IF NOT EXISTS `major_program` (
  `parent_faculty` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `time_limit` tinyint(4) DEFAULT NULL,
  `num_of_opt_credits` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`parent_faculty`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `major_program`
--

INSERT INTO `major_program` (`parent_faculty`, `name`, `description`, `time_limit`, `num_of_opt_credits`) VALUES
('consectetur', 'fugit', 'Maxime similique sit qui odio perspiciatis eos. Natus consequatur nisi quia repudiandae velit totam fuga. Error sit qui occaecati dignissimos maiores rem.', 5, 15),
('minima', 'provident', 'Architecto hic vel recusandae sit cum. Quia et voluptatibus quaerat praesentium.', 6, 12),
('nulla', 'nam', 'Voluptates eaque recusandae aliquam unde eum eaque saepe. Soluta suscipit velit vel inventore reprehenderit esse earum. Eum sit est qui et reiciendis animi eaque.', 7, 3),
('omnis', 'vero', 'Doloribus rerum sint labore minus. Praesentium soluta porro ullam. Quia et est iste consectetur occaecati explicabo dolor est.', 4, 6),
('quae', 'vitae', 'Nemo doloribus eos ut adipisci voluptates magnam placeat perspiciatis. Et ab atque at repellat recusandae soluta. Placeat qui atque ut iusto dolorem ex est.', 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `minor_program`
--

DROP TABLE IF EXISTS `minor_program`;
CREATE TABLE IF NOT EXISTS `minor_program` (
  `parent_faculty` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `time_limit` tinyint(4) DEFAULT NULL,
  `num_of_opt_credits` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`parent_faculty`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `minor_program`
--

INSERT INTO `minor_program` (`parent_faculty`, `name`, `description`, `time_limit`, `num_of_opt_credits`) VALUES
('consectetur', 'dolorum', 'Sunt aut suscipit nisi aut natus. Voluptas dolor repellat odio rerum sit aut eum. Qui nulla rerum hic deserunt qui. Alias eos repellendus quod quidem.', 6, 15),
('minima', 'aut', 'Natus voluptate quod eius sunt excepturi. Voluptatem temporibus dolorem qui eius voluptas. Harum illo accusamus suscipit reprehenderit corrupti ex.', 6, 6),
('nulla', 'eos', 'Vitae quo illo fugiat. Quia dolore sit doloremque consequatur expedita ex repudiandae. Veritatis ea commodi fuga dolore quisquam atque.', 4, 15),
('omnis', 'modi', 'Voluptas omnis id repellat tempore quibusdam ut accusamus. Cum non enim molestiae possimus. Mollitia officia quibusdam totam quis molestiae. Distinctio corrupti numquam ut.', 6, 9),
('quae', 'id', 'Corporis dignissimos est ex non odit. Id repellendus doloremque doloribus ea in id. Velit praesentium sed dolores consequatur.', 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `assigned_enrollment_date` date DEFAULT NULL,
  `Fname` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lname` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `primary_faculty_name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `primary_faculty_name` (`primary_faculty_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `assigned_enrollment_date`, `Fname`, `Lname`, `bio`, `primary_faculty_name`) VALUES
('14022287', '1996-07-06', 'Lukas', 'Upton', 'Totam asperiores architecto tenetur omnis accusantium. Ut eaque dolor aut voluptatem qui ipsam. Est sed vel est nihil vitae.', 'minima'),
('18496080', '2021-06-01', 'Vernie', 'Terry', 'Ut eius quae pariatur commodi. Molestiae qui sed dolore quis quibusdam et.', 'nulla'),
('19846756', '2004-11-28', 'Kaci', 'Heidenreich', 'Maiores rerum ab ut est ducimus. Voluptatem aliquam facilis et reprehenderit recusandae qui dolorem quia. Et non recusandae deserunt debitis. Voluptas numquam autem eius dolorem et.', 'nulla'),
('30827190', '1970-12-23', 'Alvina', 'Hilll', 'Sed aperiam asperiores harum aut iste. Et libero voluptatem quia cum culpa omnis.', 'consectetur'),
('37293133', '2020-01-06', 'Verlie', 'Quigley', 'Et soluta est quaerat dicta corrupti soluta. Asperiores quidem enim repellendus necessitatibus. Dolores vel repellendus asperiores assumenda illo vel. Quia eius dolores dolorem amet.', 'quae'),
('56440516', '2014-04-11', 'Carolyne', 'Dietrich', 'Blanditiis ut sit sequi rem est. Iste et harum voluptatem repudiandae molestias quis dolorum. Vitae et quibusdam sed voluptatum sed veritatis saepe repellat. Quasi ut totam quia beatae.', 'omnis'),
('68937537', '2020-06-13', 'Delfina', 'Krajcik', 'Numquam vel qui magni eligendi. Consectetur illo aut sit omnis aspernatur culpa placeat. Voluptate sed iusto voluptas quam labore omnis.', 'quae'),
('85484864', '2016-08-02', 'Arjun', 'Robel', 'Qui non eos et eos perspiciatis autem. Hic magnam voluptatem quibusdam in facilis officia et corrupti. Et qui magni asperiores aut nihil qui placeat. Dolores odio cupiditate consequuntur et officiis necessitatibus corporis labore. Sint velit officiis ad sed.', 'omnis'),
('88028526', '2017-06-12', 'Florian', 'Quigley', 'Est voluptas repellendus modi et nesciunt expedita. Provident quasi autem blanditiis ullam beatae. Quibusdam omnis dolorem doloribus et.', 'minima'),
('98978347', '1980-03-24', 'Arnold', 'Botsford', 'Doloribus fuga natus deserunt in occaecati. Quia et veniam atque sit quaerat qui quas quisquam. Aut tenetur consequatur ea eius quo voluptatem et tenetur.', 'consectetur');

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--

DROP TABLE IF EXISTS `student_address`;
CREATE TABLE IF NOT EXISTS `student_address` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_address`
--

INSERT INTO `student_address` (`student_id`, `address`) VALUES
('14022287', '442 Huels Ramp\nJonshire, PA 01442'),
('14022287', '514 Rasheed Rapid\nEast Emmettborough, WY 75018-5530'),
('18496080', '6943 Claud Flat Apt. 780\nSouth Erling, AR 88009'),
('18496080', '969 Feil Terrace Apt. 954\nSouth Nia, MI 92813'),
('19846756', '259 Abdiel Views\nGuillermotown, KS 02444'),
('19846756', '27963 Murray Rapids\nEast Ottilie, KS 61315-7269'),
('30827190', '8164 Rocio Meadow\nLindgrenborough, OR 04342'),
('30827190', '9895 Kelley Dale\nGoodwinland, TX 46396-7698'),
('37293133', '053 Hettinger Freeway Suite 219\nSouth Vicente, SC 84968'),
('37293133', '26882 Harold Road\nJadentown, LA 97349-2361'),
('56440516', '2282 Hyatt Forest\nNew Norwood, ME 65774-7138'),
('56440516', '7057 Kirlin Curve\nSouth Nathanael, IN 23366-9202'),
('68937537', '551 Lera Ways\nPort Olentown, MT 69991-9335'),
('68937537', '8737 White Crossing\nNorth Felipahaven, CT 26357'),
('85484864', '24914 Diego Islands Suite 959\nDoyleshire, WA 44913-5299'),
('85484864', '915 Frederick Pass Apt. 986\nPort Winonabury, SD 25562'),
('88028526', '350 Dewayne Stravenue Suite 094\nNorth Golden, TX 64464'),
('88028526', '983 Alaina Dam Suite 080\nLake Fredburgh, SC 17384-0868'),
('98978347', '814 Donavon Mission Suite 580\nNorth Susanbury, LA 82046'),
('98978347', '98424 Vidal Hills Apt. 460\nEast Fostermouth, SD 62222');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_class_enroll`
--

DROP TABLE IF EXISTS `student_course_class_enroll`;
CREATE TABLE IF NOT EXISTS `student_course_class_enroll` (
  `enrolling_student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `enrolled_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `enrolled_class_num` int(11) NOT NULL,
  PRIMARY KEY (`enrolling_student_id`,`enrolled_course_id`,`enrolled_class_num`),
  KEY `enrolled_course_id` (`enrolled_course_id`,`enrolled_class_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_course_class_request`
--

DROP TABLE IF EXISTS `student_course_class_request`;
CREATE TABLE IF NOT EXISTS `student_course_class_request` (
  `requesting_student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `requested_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `requested_class_num` int(11) NOT NULL,
  PRIMARY KEY (`requesting_student_id`,`requested_course_id`,`requested_class_num`),
  KEY `requested_course_id` (`requested_course_id`,`requested_class_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_course_class_waitlist`
--

DROP TABLE IF EXISTS `student_course_class_waitlist`;
CREATE TABLE IF NOT EXISTS `student_course_class_waitlist` (
  `waitlisting_student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `waitlisted_course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `waitlisted_class_num` int(11) NOT NULL,
  `waitlist_position` tinyint(4) NOT NULL,
  PRIMARY KEY (`waitlisting_student_id`,`waitlisted_course_id`,`waitlisted_class_num`),
  KEY `waitlisted_course_id` (`waitlisted_course_id`,`waitlisted_class_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_course_taken`
--

DROP TABLE IF EXISTS `student_course_taken`;
CREATE TABLE IF NOT EXISTS `student_course_taken` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `letter_grade` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_course_taken`
--

INSERT INTO `student_course_taken` (`student_id`, `course_id`, `letter_grade`) VALUES
('14022287', '23521961', 'C'),
('18496080', '30079813', 'F'),
('19846756', '30553563', 'B'),
('30827190', '40752009', 'C'),
('37293133', '41831309', 'B'),
('56440516', '45489920', 'B'),
('68937537', '60451721', 'C'),
('85484864', '63014977', 'C'),
('88028526', '89540784', 'D'),
('98978347', '91074499', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `student_email`
--

DROP TABLE IF EXISTS `student_email`;
CREATE TABLE IF NOT EXISTS `student_email` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_email`
--

INSERT INTO `student_email` (`student_id`, `email`) VALUES
('14022287', 'casper.abelardo@example.com'),
('14022287', 'corkery.lucile@example.com'),
('18496080', 'ikassulke@example.com'),
('18496080', 'little.khalid@example.org'),
('19846756', 'feil.bertha@example.net'),
('19846756', 'hschiller@example.net'),
('30827190', 'bechtelar.melvin@example.com'),
('30827190', 'vada56@example.net'),
('37293133', 'dariana24@example.org'),
('37293133', 'hillard.reinger@example.net'),
('56440516', 'sgrimes@example.net'),
('56440516', 'viva.prohaska@example.org'),
('68937537', 'queen20@example.org'),
('68937537', 'toy.emily@example.org'),
('85484864', 'marvin.ashlee@example.net'),
('85484864', 'meagan22@example.com'),
('88028526', 'berry.huels@example.org'),
('88028526', 'florencio.wolff@example.net'),
('98978347', 'iliana.weimann@example.com'),
('98978347', 'joana.ankunding@example.org');

-- --------------------------------------------------------

--
-- Table structure for table `student_focuses_concentration`
--

DROP TABLE IF EXISTS `student_focuses_concentration`;
CREATE TABLE IF NOT EXISTS `student_focuses_concentration` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `concentration_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`program_faculty`,`program_name`,`concentration_name`),
  KEY `program_faculty` (`program_faculty`,`program_name`,`concentration_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_phone`
--

DROP TABLE IF EXISTS `student_phone`;
CREATE TABLE IF NOT EXISTS `student_phone` (
  `student_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  PRIMARY KEY (`student_id`,`phone_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_phone`
--

INSERT INTO `student_phone` (`student_id`, `phone_num`) VALUES
('14022287', 5822231647),
('14022287', 9308180263),
('18496080', 3417103365),
('18496080', 7025948891),
('19846756', 2235245001),
('19846756', 4283602189),
('30827190', 5739192409),
('30827190', 8108719605),
('37293133', 3574820553),
('37293133', 7422438375),
('56440516', 7739032300),
('56440516', 8967561142),
('68937537', 5470173944),
('68937537', 7194255298),
('85484864', 8703402602),
('85484864', 9050741016),
('88028526', 1014859400),
('88028526', 2298185735),
('98978347', 2654771916),
('98978347', 5577519008);

-- --------------------------------------------------------

--
-- Table structure for table `student_takes_major_program`
--

DROP TABLE IF EXISTS `student_takes_major_program`;
CREATE TABLE IF NOT EXISTS `student_takes_major_program` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `major_program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `major_program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`major_program_faculty`,`major_program_name`),
  KEY `major_program_faculty` (`major_program_faculty`,`major_program_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_takes_minor_program`
--

DROP TABLE IF EXISTS `student_takes_minor_program`;
CREATE TABLE IF NOT EXISTS `student_takes_minor_program` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `minor_program_faculty` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `minor_program_name` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_id`,`minor_program_faculty`,`minor_program_name`),
  KEY `minor_program_faculty` (`minor_program_faculty`,`minor_program_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
CREATE TABLE IF NOT EXISTS `term` (
  `course_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `season` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`course_id`,`year`,`season`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`course_id`, `year`, `season`) VALUES
('23521961', 1993, 'W'),
('30079813', 1977, 'Sum'),
('30553563', 2013, 'F'),
('40752009', 1995, 'Sum'),
('41831309', 1970, 'Spr'),
('45489920', 1993, 'W'),
('60451721', 1986, 'F'),
('63014977', 1986, 'Sum'),
('89540784', 1984, 'W'),
('91074499', 2003, 'W');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_address`
--
ALTER TABLE `admin_address`
  ADD CONSTRAINT `admin_address_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_adds_class`
--
ALTER TABLE `admin_adds_class`
  ADD CONSTRAINT `admin_adds_class_ibfk_1` FOREIGN KEY (`parent_course_id`,`class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_adds_class_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_adds_course`
--
ALTER TABLE `admin_adds_course`
  ADD CONSTRAINT `admin_adds_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_adds_course_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_adds_student`
--
ALTER TABLE `admin_adds_student`
  ADD CONSTRAINT `admin_adds_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_adds_student_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_edits_class`
--
ALTER TABLE `admin_edits_class`
  ADD CONSTRAINT `admin_edits_class_ibfk_1` FOREIGN KEY (`parent_course_id`,`class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_edits_class_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_edits_course`
--
ALTER TABLE `admin_edits_course`
  ADD CONSTRAINT `admin_edits_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_edits_course_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_edits_course_review`
--
ALTER TABLE `admin_edits_course_review`
  ADD CONSTRAINT `admin_edits_course_review_ibfk_1` FOREIGN KEY (`course_id`,`student_id`,`review_id`) REFERENCES `course_review` (`course_id`, `student_id`, `review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_edits_course_review_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_edits_student`
--
ALTER TABLE `admin_edits_student`
  ADD CONSTRAINT `admin_edits_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_edits_student_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_email`
--
ALTER TABLE `admin_email`
  ADD CONSTRAINT `admin_email_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_phone`
--
ALTER TABLE `admin_phone`
  ADD CONSTRAINT `admin_phone_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_removes_class`
--
ALTER TABLE `admin_removes_class`
  ADD CONSTRAINT `admin_removes_class_ibfk_1` FOREIGN KEY (`parent_course_id`,`class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_removes_class_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_removes_course`
--
ALTER TABLE `admin_removes_course`
  ADD CONSTRAINT `admin_removes_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_removes_course_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_removes_course_review`
--
ALTER TABLE `admin_removes_course_review`
  ADD CONSTRAINT `admin_removes_course_review_ibfk_1` FOREIGN KEY (`course_id`,`student_id`,`review_id`) REFERENCES `course_review` (`course_id`, `student_id`, `review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_removes_course_review_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_removes_student`
--
ALTER TABLE `admin_removes_student`
  ADD CONSTRAINT `admin_removes_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_removes_student_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`parent_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_days`
--
ALTER TABLE `class_days`
  ADD CONSTRAINT `class_days_ibfk_1` FOREIGN KEY (`parent_course_id`,`class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `concentration`
--
ALTER TABLE `concentration`
  ADD CONSTRAINT `concentration_ibfk_1` FOREIGN KEY (`major_faculty_name`,`major_name`) REFERENCES `major_program` (`parent_faculty`, `name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_antireq`
--
ALTER TABLE `course_antireq`
  ADD CONSTRAINT `course_antireq_ibfk_1` FOREIGN KEY (`requiring_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_antireq_ibfk_2` FOREIGN KEY (`course_antireq_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_prereq`
--
ALTER TABLE `course_prereq`
  ADD CONSTRAINT `course_prereq_ibfk_1` FOREIGN KEY (`requiring_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_prereq_ibfk_2` FOREIGN KEY (`course_prereq_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_required_by_concentration`
--
ALTER TABLE `course_required_by_concentration`
  ADD CONSTRAINT `course_required_by_concentration_ibfk_1` FOREIGN KEY (`major_program_faculty`,`major_program_name`,`concentration_name`) REFERENCES `concentration` (`major_faculty_name`, `major_name`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_required_by_concentration_ibfk_2` FOREIGN KEY (`required_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_required_by_major_program`
--
ALTER TABLE `course_required_by_major_program`
  ADD CONSTRAINT `course_required_by_major_program_ibfk_1` FOREIGN KEY (`major_program_faculty`,`major_program_name`) REFERENCES `major_program` (`parent_faculty`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_required_by_major_program_ibfk_2` FOREIGN KEY (`required_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_required_by_minor_program`
--
ALTER TABLE `course_required_by_minor_program`
  ADD CONSTRAINT `course_required_by_minor_program_ibfk_1` FOREIGN KEY (`minor_program_faculty`,`minor_program_name`) REFERENCES `minor_program` (`parent_faculty`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_required_by_minor_program_ibfk_2` FOREIGN KEY (`required_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_restricted_to_major_program`
--
ALTER TABLE `course_restricted_to_major_program`
  ADD CONSTRAINT `course_restricted_to_major_program_ibfk_1` FOREIGN KEY (`major_program_faculty`,`major_program_name`) REFERENCES `major_program` (`parent_faculty`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_restricted_to_major_program_ibfk_2` FOREIGN KEY (`restricted_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_review`
--
ALTER TABLE `course_review`
  ADD CONSTRAINT `course_review_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_review_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `major_program`
--
ALTER TABLE `major_program`
  ADD CONSTRAINT `major_program_ibfk_1` FOREIGN KEY (`parent_faculty`) REFERENCES `faculty` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `minor_program`
--
ALTER TABLE `minor_program`
  ADD CONSTRAINT `minor_program_ibfk_1` FOREIGN KEY (`parent_faculty`) REFERENCES `faculty` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`primary_faculty_name`) REFERENCES `faculty` (`name`) ON DELETE SET NULL;

--
-- Constraints for table `student_address`
--
ALTER TABLE `student_address`
  ADD CONSTRAINT `student_address_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course_class_enroll`
--
ALTER TABLE `student_course_class_enroll`
  ADD CONSTRAINT `student_course_class_enroll_ibfk_1` FOREIGN KEY (`enrolling_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_class_enroll_ibfk_2` FOREIGN KEY (`enrolled_course_id`,`enrolled_class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course_class_request`
--
ALTER TABLE `student_course_class_request`
  ADD CONSTRAINT `student_course_class_request_ibfk_1` FOREIGN KEY (`requesting_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_class_request_ibfk_2` FOREIGN KEY (`requested_course_id`,`requested_class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course_class_waitlist`
--
ALTER TABLE `student_course_class_waitlist`
  ADD CONSTRAINT `student_course_class_waitlist_ibfk_1` FOREIGN KEY (`waitlisting_student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_class_waitlist_ibfk_2` FOREIGN KEY (`waitlisted_course_id`,`waitlisted_class_num`) REFERENCES `class` (`parent_course_id`, `class_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course_taken`
--
ALTER TABLE `student_course_taken`
  ADD CONSTRAINT `student_course_taken_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_taken_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_email`
--
ALTER TABLE `student_email`
  ADD CONSTRAINT `student_email_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_focuses_concentration`
--
ALTER TABLE `student_focuses_concentration`
  ADD CONSTRAINT `student_focuses_concentration_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_focuses_concentration_ibfk_2` FOREIGN KEY (`program_faculty`,`program_name`,`concentration_name`) REFERENCES `concentration` (`major_faculty_name`, `major_name`, `name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD CONSTRAINT `student_phone_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_takes_major_program`
--
ALTER TABLE `student_takes_major_program`
  ADD CONSTRAINT `student_takes_major_program_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_takes_major_program_ibfk_2` FOREIGN KEY (`major_program_faculty`,`major_program_name`) REFERENCES `major_program` (`parent_faculty`, `name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_takes_minor_program`
--
ALTER TABLE `student_takes_minor_program`
  ADD CONSTRAINT `student_takes_minor_program_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_takes_minor_program_ibfk_2` FOREIGN KEY (`minor_program_faculty`,`minor_program_name`) REFERENCES `minor_program` (`parent_faculty`, `name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
