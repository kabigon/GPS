-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema gps
--

CREATE DATABASE IF NOT EXISTS gps;
USE gps;

--
-- Definition of table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `car_id` varchar(45) NOT NULL,
  `brand` varchar(45) default NULL,
  `color` varchar(45) default NULL,
  `type` varchar(45) default NULL,
  `priority` float default NULL,
  `pic` varchar(45) default NULL,
  PRIMARY KEY  (`car_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` (`car_id`,`brand`,`color`,`type`,`priority`,`pic`) VALUES 
 ('999','JAZZ','White','BCAR',100,'20051217014913_jazz03.jpg'),
 ('76767','mairu','Blue','Truck',100,'german-truck-art1.jpg'),
 ('78786','TOYOTAs','White','VAN',100,'hyundaivan2.jpg'),
 ('12345','TOYOYA','RED','BCAR',100,'22c2b72dfcc47b66f0aca46c864ab800.jpg'),
 ('321','TOYOTA','White','truck',100,'Budget-Truck-Rental-coupon.jpg');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;


--
-- Definition of table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE `driver` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  `sex` varchar(45) default NULL,
  `age` varchar(45) default NULL,
  `PID` varchar(45) default NULL,
  `priority` varchar(45) default NULL,
  `pic` varchar(45) default NULL,
  PRIMARY KEY  USING BTREE (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` (`user_id`,`name`,`sex`,`age`,`PID`,`priority`,`pic`) VALUES 
 (2,'Pattie','female','21','221312','100','ttNSmk582055-02.jpg'),
 (4,'JEEB','female','21','129078767942','100','jeep.jpg'),
 (3,'à¹€à¸¡à¸§','male','22','1209700277034','100','bakeneko.jpg');
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;


--
-- Definition of table `loca`
--

DROP TABLE IF EXISTS `loca`;
CREATE TABLE `loca` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `location` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loca`
--

/*!40000 ALTER TABLE `loca` DISABLE KEYS */;
INSERT INTO `loca` (`id`,`location`) VALUES 
 (1,'sriraca 14'),
 (2,'Lardkrabung 15'),
 (3,'KaeKee3'),
 (4,'Central liberly'),
 (5,'Sriracha 15');
/*!40000 ALTER TABLE `loca` ENABLE KEYS */;


--
-- Definition of table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `longtitude` varchar(45) default NULL,
  `lattitude` varchar(45) default NULL,
  `time` varchar(45) default NULL,
  `speed` varchar(45) default NULL,
  `trip_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`,`longtitude`,`lattitude`,`time`,`speed`,`trip_id`) VALUES 
 (1,'100.78393936157227','13.73104746437077','16:15:25','5.5',17),
 (2,'100.78393936157227','13.73104746437077','16:15:25','5.5',20),
 (3,'100.77810287475586','13.728462741355374','16:17:46','5.5',20),
 (4,'100.5454326','13.315135','00:24:44','3',18);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;


--
-- Definition of table `trip`
--

DROP TABLE IF EXISTS `trip`;
CREATE TABLE `trip` (
  `trip_id` int(10) unsigned NOT NULL auto_increment,
  `trip_name` varchar(45) default NULL,
  `start_lat` varchar(45) default NULL,
  `start_long` varchar(45) character set utf8 collate utf8_bin default NULL,
  `end_lat` varchar(45) default NULL,
  `end_long` varchar(45) default NULL,
  `start_time` varchar(45) default NULL,
  `finish_time` varchar(45) default NULL,
  `Date` varchar(45) default NULL,
  `car_id` varchar(45) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `start_location` varchar(45) default NULL,
  `end_location` varchar(45) default NULL,
  PRIMARY KEY  (`trip_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trip`
--

/*!40000 ALTER TABLE `trip` DISABLE KEYS */;
INSERT INTO `trip` (`trip_id`,`trip_name`,`start_lat`,`start_long`,`end_lat`,`end_long`,`start_time`,`finish_time`,`Date`,`car_id`,`user_id`,`start_location`,`end_location`) VALUES 
 (18,'à¸à¸³à¹à¸žà¸‡à¹€à¸žà¸£à¸Š','13.733298651525315',0x3130302E3738353331323635323538373839,'6.905679148732803','99.78632926940918','01:15:40','','2012-02-07','321',2,'Lam Plathew, Lat Krabang, Bangkok 10520, Thai','Kamphaeng, La-ngu, Satun, Thailand'),
 (20,'à¸§à¸´à¸¨à¸§à¸° à¸¥à¸²à¸”à¸à¸£à¸°à¸šà¸±à¸‡','13.728629498538623',0x3130302E3737383138383730353434343334,'13.727712332563463','100.76986312866211','01:40:25','','2012-02-07','999',3,'à¸›à¹‰à¸²à¸¢à¸£à¸–à¸›à¸£à¸°à¸ˆà¸³à¸—à¸²à¸‡ à¸','Lat Krabang, Bangkok 10520, Thailand'),
 (15,'à¸¨à¸£à¸µà¸£à¸²à¸Šà¸²','13.730630575488783',0x3130302E3738333835333533303838333739,'13.173431218850164','100.9320616722107','21:28:58','','2012-02-06','999',4,'Lam Plathew, Lat Krabang, Bangkok 10520, Thai','Si Racha, Chon Buri 20110, Thailand'),
 (16,'à¸¥à¸³à¸›à¸²à¸‡','13.730797331130507',0x3130302E3738343032353139323236303734,'18.763475933039143','99.57286834716797','00:49:42','01:00:00','2012-02-07','76767',4,'Lam Plathew, Lat Krabang, Bangkok 10520, Thai','Wichet Nakhon, Chae Hom, Lampang 52120, Thail');
/*!40000 ALTER TABLE `trip` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `rank` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`username`,`password`,`email`,`rank`) VALUES 
 (1,'mail','1234','karamail_11@hotmail.com',''),
 (2,'mail1','12345','karamail_11@hotmail.com',''),
 (3,'mail12','1234','karamail_11@hotmail.com',''),
 (4,'mail1222','222','karamail_11@hotmail.com',''),
 (5,'mail12222','1234','karamail_11@hotmail.com','admin'),
 (6,'222','222','karamail_11@hotmail.com','admin'),
 (7,'2222','2222','karamail_11@hotmail.com','admin'),
 (8,'222222','2222','karamail_11@hotmail.com','admin'),
 (9,'22222222','22','karamail_11@hotmail.com','user'),
 (10,'bird','1234','karamail_11@hotmail.com','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
