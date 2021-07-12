-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table web_charity.list_access_control
CREATE TABLE IF NOT EXISTS `list_access_control` (
  `admin_tier_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_level` int(11) NOT NULL,
  `access_divisionId` int(11) NOT NULL,
  `access_levelName` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_tier_id`),
  KEY `FK__list_division` (`access_divisionId`),
  CONSTRAINT `FK__list_division` FOREIGN KEY (`access_divisionId`) REFERENCES `list_division` (`division_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_access_control: ~0 rows (approximately)
DELETE FROM `list_access_control`;
/*!40000 ALTER TABLE `list_access_control` DISABLE KEYS */;
INSERT INTO `list_access_control` (`admin_tier_id`, `access_level`, `access_divisionId`, `access_levelName`) VALUES
	(1, 100, 1, 'Super Admin');
/*!40000 ALTER TABLE `list_access_control` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_achievement
CREATE TABLE IF NOT EXISTS `list_achievement` (
  `achievement_id` int(11) NOT NULL AUTO_INCREMENT,
  `achievement_name` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`achievement_id`),
  KEY `student_id` (`student_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_charity.list_achievement: ~8 rows (approximately)
DELETE FROM `list_achievement`;
/*!40000 ALTER TABLE `list_achievement` DISABLE KEYS */;
INSERT INTO `list_achievement` (`achievement_id`, `achievement_name`, `student_id`, `level_id`, `description`) VALUES
	(15, 'Juara 1 Matematika', 1, 3, 'Memperoleh nilai 98 dengan pujian'),
	(16, 'Juara 2 Debat Bahasa Inggris', 1, 4, 'Merupakan siswa teraktif di kompetisi'),
	(17, 'Siswa Teladan Jakarta Selatan', 2, 4, 'Perlombaan mencari siswa terbaik se-kabupaten'),
	(18, 'Juara 1 Membaca Puisi', 2, 4, 'Memenangkan kompetisi dengan judul puisi "Pahit Hidup Segitiga Emas Jakarta"'),
	(19, 'Juara 1 Matematika', 3, 5, 'Perlombaan Menghitung Matematika tingkat provinsi Bangka Belitung'),
	(20, 'Juara 1 Fisika Umum', 4, 5, 'Juara tingkat provinsi mengalahkan 300 peserta lainnya'),
	(21, 'Juara 1 Ilmu Komputer', 5, 3, 'Diadakan di kecamatan Maihaoltra\r\ndalam rangka peringatan Kemerdekaan Republik Indonesia'),
	(22, 'Medali Emas Olimpiade Kimia', 6, 6, 'Medali emas pertama yang didapatkan setelah bersaing dengan lebih dari 12000 peserta lainnya');
/*!40000 ALTER TABLE `list_achievement` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_action
CREATE TABLE IF NOT EXISTS `list_action` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_action: ~4 rows (approximately)
DELETE FROM `list_action`;
/*!40000 ALTER TABLE `list_action` DISABLE KEYS */;
INSERT INTO `list_action` (`action_id`, `action`) VALUES
	(1, 'Login'),
	(2, 'Logout'),
	(3, 'Add Admin'),
	(4, 'Edit Admin');
/*!40000 ALTER TABLE `list_action` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_activity
CREATE TABLE IF NOT EXISTS `list_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `action_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `platform` text DEFAULT NULL,
  `browser` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `meta_data` mediumtext DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `FK_list_activity_list_action` (`action_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `FK_list_activity_list_action` FOREIGN KEY (`action_id`) REFERENCES `list_action` (`action_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_activity: ~8 rows (approximately)
DELETE FROM `list_activity`;
/*!40000 ALTER TABLE `list_activity` DISABLE KEYS */;
INSERT INTO `list_activity` (`activity_id`, `action_id`, `admin_id`, `platform`, `browser`, `ip_address`, `time`, `description`, `meta_data`) VALUES
	(1, 1, 1, 'Windows 10', 'Chrome', '::1', '2021-07-02 22:18:28', 'Sanjaya telah melakukan Login kedalam sistem', NULL),
	(2, 3, 1, 'Windows 10', 'Chrome', '::1', '2021-07-02 22:43:54', 'Sanjaya telah melakukan Add Admin kedalam sistem', '2'),
	(3, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-02 23:20:23', 'admin telah melakukan Login kedalam sistem', NULL),
	(4, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-03 01:20:54', 'admin telah melakukan Login kedalam sistem', NULL),
	(5, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-03 17:48:28', 'admin telah melakukan Login kedalam sistem', NULL),
	(6, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-03 18:04:33', 'admin telah melakukan Login kedalam sistem', NULL),
	(7, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-03 18:30:31', 'admin telah melakukan Login kedalam sistem', NULL),
	(8, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-03 19:10:46', 'admin telah melakukan Login kedalam sistem', NULL),
	(9, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-03 23:14:54', 'admin telah melakukan Login kedalam sistem', NULL),
	(10, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-04 00:17:19', 'admin telah melakukan Login kedalam sistem', NULL),
	(11, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-05 19:59:57', 'admin telah melakukan Login kedalam sistem', NULL),
	(12, 1, 2, 'Windows 10', 'Chrome', '::1', '2021-07-05 22:14:59', 'admin telah melakukan Login kedalam sistem', NULL);
/*!40000 ALTER TABLE `list_activity` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_admin
CREATE TABLE IF NOT EXISTS `list_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(125) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  `admin_lastLogin` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `admin_statusId` int(11) NOT NULL,
  `admin_tierId` int(11) NOT NULL,
  `admin_photo` text DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `FK_list_admin_list_admin_status` (`admin_statusId`),
  KEY `FK_list_admin_list_access_control` (`admin_tierId`),
  CONSTRAINT `FK_list_admin_list_access_control` FOREIGN KEY (`admin_tierId`) REFERENCES `list_access_control` (`admin_tier_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_list_admin_list_admin_status` FOREIGN KEY (`admin_statusId`) REFERENCES `list_admin_status` (`admin_status_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_admin: ~0 rows (approximately)
DELETE FROM `list_admin`;
/*!40000 ALTER TABLE `list_admin` DISABLE KEYS */;
INSERT INTO `list_admin` (`admin_id`, `admin_name`, `admin_password`, `admin_email`, `admin_phone`, `admin_lastLogin`, `created_date`, `updated_date`, `admin_statusId`, `admin_tierId`, `admin_photo`) VALUES
	(1, 'Sanjaya', '$2y$10$QEo45sr7r.Cus/cepy9WgOIuCbRwMYkdvcATGoP9xsN2EHXYUA2EK', 'rickysanjaya411@gmail.com', '08', NULL, NULL, NULL, 1, 1, NULL),
	(2, 'admin', '$2y$10$hWWGSkvPwphqVtV3SdceauUEtAocnCWwrOW7iVwiymDWUsR7MQPze', 'admin@test.com', '082233338251', NULL, '2021-07-02 22:43:54', NULL, 1, 1, '');
/*!40000 ALTER TABLE `list_admin` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_admin_status
CREATE TABLE IF NOT EXISTS `list_admin_status` (
  `admin_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_status` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_admin_status: ~3 rows (approximately)
DELETE FROM `list_admin_status`;
/*!40000 ALTER TABLE `list_admin_status` DISABLE KEYS */;
INSERT INTO `list_admin_status` (`admin_status_id`, `admin_status`) VALUES
	(1, 'Aktif'),
	(2, 'Tidak Aktif'),
	(3, 'Banned');
/*!40000 ALTER TABLE `list_admin_status` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_category
CREATE TABLE IF NOT EXISTS `list_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_charity.list_category: ~3 rows (approximately)
DELETE FROM `list_category`;
/*!40000 ALTER TABLE `list_category` DISABLE KEYS */;
INSERT INTO `list_category` (`category_id`, `category_name`, `is_active`) VALUES
	(1, '6-9 Tahun', 1),
	(2, '10-13 Tahun', 1),
	(3, '14-17 Tahun', 1);
/*!40000 ALTER TABLE `list_category` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_config
CREATE TABLE IF NOT EXISTS `list_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_charity.list_config: ~0 rows (approximately)
DELETE FROM `list_config`;
/*!40000 ALTER TABLE `list_config` DISABLE KEYS */;
INSERT INTO `list_config` (`config_id`, `about`, `address`, `contact`) VALUES
	(1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias sed consectetur quam perferendis odit accusamus expedita ea et quos rerum dolores recusandae porro facere ipsum voluptatibus laudantium officiis, provident aspernatur. From DB', 'Jl. Kuningan Persada No.Kav. 4, RT.1/RW.6, Guntur, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12951', '(+62) 812-2002-3321');
/*!40000 ALTER TABLE `list_config` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_division
CREATE TABLE IF NOT EXISTS `list_division` (
  `division_id` int(11) NOT NULL AUTO_INCREMENT,
  `division_name` varchar(50) NOT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_division: ~0 rows (approximately)
DELETE FROM `list_division`;
/*!40000 ALTER TABLE `list_division` DISABLE KEYS */;
INSERT INTO `list_division` (`division_id`, `division_name`) VALUES
	(1, 'System Administrator');
/*!40000 ALTER TABLE `list_division` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_level
CREATE TABLE IF NOT EXISTS `list_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_charity.list_level: ~6 rows (approximately)
DELETE FROM `list_level`;
/*!40000 ALTER TABLE `list_level` DISABLE KEYS */;
INSERT INTO `list_level` (`level_id`, `level_name`) VALUES
	(1, 'SEKOLAH'),
	(2, 'KELURAHAN'),
	(3, 'KECAMATAN'),
	(4, 'KABUPATEN'),
	(5, 'PROVINSI'),
	(6, 'NASIONAL'),
	(7, 'INTERNASIONAL');
/*!40000 ALTER TABLE `list_level` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_session_token
CREATE TABLE IF NOT EXISTS `list_session_token` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_token` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active_time` datetime NOT NULL,
  `expire_time` datetime NOT NULL,
  `is_login` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`session_id`),
  KEY `FK__list_admin` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table web_charity.list_session_token: ~9 rows (approximately)
DELETE FROM `list_session_token`;
/*!40000 ALTER TABLE `list_session_token` DISABLE KEYS */;
INSERT INTO `list_session_token` (`session_id`, `session_token`, `admin_id`, `active_time`, `expire_time`, `is_login`) VALUES
	(9, 'm0PduN9W3reIiAgKxhSi7z6HvY', 1, '2021-07-02 22:54:55', '2021-07-02 23:09:55', 1),
	(10, '4WOTD1a0NpQ9DdhFRAwmzvI6zZ', 2, '2021-07-03 01:19:06', '2021-07-03 01:34:06', 0),
	(11, 'GrSzSCW57xNgPQmNApWRN0mHA3', 2, '2021-07-03 02:12:32', '2021-07-03 02:27:32', 1),
	(12, 'Wb1TGjhiv36fme8CntTD9oAtxR', 2, '2021-07-03 17:48:36', '2021-07-03 18:03:36', 1),
	(13, 'OwIYFW5kBLvr7wqdeneXWZTFFC', 2, '2021-07-03 18:05:43', '2021-07-03 18:20:43', 1),
	(14, 'Wu95gwMKYPTZcUcBEBNIz6TaDl', 2, '2021-07-03 18:54:25', '2021-07-03 19:09:25', 1),
	(15, 'sYMOy216fQvM0Nmq7YNJSoXVTj', 2, '2021-07-03 19:50:52', '2021-07-03 20:05:52', 1),
	(16, 'ClUlFXrSHhhlbJoaAuXwP9hFtp', 2, '2021-07-03 23:17:47', '2021-07-03 23:32:47', 1),
	(17, 'eFkZkPgYmEub54jaAv3sYapQAs', 2, '2021-07-04 00:57:22', '2021-07-04 01:12:22', 1),
	(18, 'q3IiYwIWIlx44bcwJ9JA1LKs5F', 2, '2021-07-05 21:17:35', '2021-07-05 21:32:35', 1),
	(19, 'O88OZAvEJYk0HBxD5UWO406DzS', 2, '2021-07-05 22:29:14', '2021-07-05 22:44:14', 1);
/*!40000 ALTER TABLE `list_session_token` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_student
CREATE TABLE IF NOT EXISTS `list_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) NOT NULL,
  `student_dob` datetime NOT NULL,
  `student_trustee` varchar(50) NOT NULL,
  `student_address` varchar(50) NOT NULL,
  `file_path` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `student_school` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `student_age` int(11) NOT NULL,
  `student_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `category_id` (`category_id`),
  KEY `student_status_id` (`student_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_charity.list_student: ~6 rows (approximately)
DELETE FROM `list_student`;
/*!40000 ALTER TABLE `list_student` DISABLE KEYS */;
INSERT INTO `list_student` (`student_id`, `student_name`, `student_dob`, `student_trustee`, `student_address`, `file_path`, `category_id`, `student_school`, `note`, `student_age`, `student_status_id`) VALUES
	(1, 'Yunus Hasan', '2009-09-06 00:00:00', 'Hasan', 'Jalan Kalideres No. 14, Jakarta Pusat', 'http://localhost/web_charity/uploads/STUDENT_1_1625491749.jpg', 2, 'SMP Pelita Jaya Jakarta', 'Anak dari bapak hasan, tiga bersaudara. Merupakan anak yang cerdas dan aktif di lingkungan sekolah', 11, 1),
	(2, 'Melati Kumar', '2006-08-18 00:00:00', 'Kumar', 'Jalan Pecandraan Bawah No.30A, Senayan, Jakarta Pu', 'http://localhost/web_charity/uploads/STUDENT_2_1625492585.jpg', 3, 'SMA Pelita Harapan', 'Anak pendiam namun berprestasi, kesulitan ekonomi keluarganya tidak menghentikan mawar untuk terus belajar dan berusaha menggapai cita', 14, 1),
	(3, 'Arif Hidayat', '2013-05-05 00:00:00', 'Sumardi', 'Gg. Fajar No. 738, Bandar Lampung 21008, Lampung', 'http://localhost/web_charity/uploads/STUDENT_3_1625493180.jpg', 1, 'SD 01 Melayu Timur', 'Anak periang yang memiliki IQ diatas rata-rata anak seusianya, memiliki hobi belajar dan menjadi ketua di lingkungan belajar disekitar rumahnya', 8, 1),
	(4, 'Hasta Mahendra', '2005-07-26 00:00:00', 'Apon Kore', 'Kpg. Astana Anyar No. 289, Manado 64745,', 'http://localhost/web_charity/uploads/STUDENT_4_1625493570.jpg', 3, 'SMAN 1 Manado', 'Anak Pasangan Apon Kore dan Joria ini merupakan siswa berprestasi di bidang akademik dan non-akademik, memiliki cita-cita menjadi seorang peneliti yang hebat', 15, 1),
	(5, 'Pardi Saragih', '2010-12-16 00:00:00', 'Saragih', 'Psr. Baung No. 573, Tanjung Pinang 94583, Gorontal', 'http://localhost/web_charity/uploads/STUDENT_5_1625493889.jpg', 2, 'SD Sentosa Matakosta', 'Ditengah himpitan ekonomi keluarga, Saragih kecil tidak pernah putus asa untuk terus menggapai cita-citanya', 10, 1),
	(6, 'Reza Wibowo', '2004-11-24 00:00:00', 'Wibowo Abdil', 'Psr. Bakau Griya Utama No. 151, Pangkal Pinang 110', 'http://localhost/web_charity/uploads/STUDENT_6_1625494094.jpg', 3, 'SMA Putra Jaya', 'Peraih medali emas olimpiade kimia ini merupakan 3 bersaudara dari pasangan Wibowo dan Aini. Sejak kecil sudah menghapal dan memahami unsur-unsur kimia', 16, 1);
/*!40000 ALTER TABLE `list_student` ENABLE KEYS */;

-- Dumping structure for table web_charity.list_student_status
CREATE TABLE IF NOT EXISTS `list_student_status` (
  `student_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_status` varchar(50) NOT NULL,
  PRIMARY KEY (`student_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_charity.list_student_status: ~2 rows (approximately)
DELETE FROM `list_student_status`;
/*!40000 ALTER TABLE `list_student_status` DISABLE KEYS */;
INSERT INTO `list_student_status` (`student_status_id`, `student_status`) VALUES
	(1, 'Active'),
	(2, 'Discontinue');
/*!40000 ALTER TABLE `list_student_status` ENABLE KEYS */;

-- Added date 12 Juli 2021
ALTER TABLE `list_student`
	ADD COLUMN `student_gender` VARCHAR(50) NOT NULL AFTER `student_name`,
	ADD COLUMN `student_education` VARCHAR(50) NOT NULL AFTER `student_gender`,
	ADD COLUMN `student_class` VARCHAR(50) NOT NULL AFTER `student_education`,
	ADD COLUMN `father_profesion` VARCHAR(150) NOT NULL DEFAULT '' AFTER `file_path`,
	ADD COLUMN `mother_profesion` VARCHAR(150) NOT NULL DEFAULT '' AFTER `father_profesion`,
	DROP COLUMN `student_dob`,
	DROP COLUMN `student_trustee`,
	DROP COLUMN `student_school`;

ALTER TABLE `list_student`
	CHANGE COLUMN `note` `student_note` TEXT NOT NULL COLLATE 'utf8mb4_general_ci' AFTER `category_id`;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
