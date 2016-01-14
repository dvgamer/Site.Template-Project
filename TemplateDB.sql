-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.35-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema template_db
--

CREATE DATABASE IF NOT EXISTS template_db;
USE template_db;

--
-- Definition of table `tmp_module_menu`
--

DROP TABLE IF EXISTS `tmp_module_menu`;
CREATE TABLE `tmp_module_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `orderlist` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tmp_module_menu`
--

/*!40000 ALTER TABLE `tmp_module_menu` DISABLE KEYS */;
INSERT INTO `tmp_module_menu` (`menu_id`,`section_id`,`orderlist`,`menu`,`ref`) VALUES 
 (1,1,1,'ตั้งค่า',''),
 (2,1,2,'โมดูล',''),
 (3,1,3,'จัดการเนื้อหา',''),
 (4,1,4,'ออกจากระบบ','index.php?option=logout');
/*!40000 ALTER TABLE `tmp_module_menu` ENABLE KEYS */;


--
-- Definition of table `tmp_module_menu_section`
--

DROP TABLE IF EXISTS `tmp_module_menu_section`;
CREATE TABLE `tmp_module_menu_section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tmp_module_menu_section`
--

/*!40000 ALTER TABLE `tmp_module_menu_section` DISABLE KEYS */;
INSERT INTO `tmp_module_menu_section` (`section_id`,`section`,`section_name`) VALUES 
 (1,'admin_nav','เมนูผู้ดูแลระบบ'),
 (2,'admin_mainmenu','เมนูหลัก');
/*!40000 ALTER TABLE `tmp_module_menu_section` ENABLE KEYS */;


--
-- Definition of table `tmp_user`
--

DROP TABLE IF EXISTS `tmp_user`;
CREATE TABLE `tmp_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `amphur` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `ipaddress` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=tis620;

--
-- Dumping data for table `tmp_user`
--

/*!40000 ALTER TABLE `tmp_user` DISABLE KEYS */;
INSERT INTO `tmp_user` (`user_id`,`type_id`,`username`,`password`,`email`,`firstname`,`lastname`,`address`,`amphur`,`province`,`telephone`,`created`,`modified`,`ipaddress`) VALUES 
 (1,4,'admin','dvg7po8ai','webmaster@site.template',NULL,NULL,NULL,NULL,NULL,NULL,'2010-03-25 13:05:57','2010-03-25 13:05:57','127.0.0.1'),
 (2,1,'dvgamer','dvg7po8ai','devil_draked@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'2010-03-25 20:19:55','2010-03-25 20:19:55','');
/*!40000 ALTER TABLE `tmp_user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
