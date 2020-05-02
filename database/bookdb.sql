-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.6.24 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 bookdb 的数据库结构
CREATE DATABASE IF NOT EXISTS `bookdb` /*!40100 DEFAULT CHARACTER SET gb2312 */;
USE `bookdb`;

-- 导出  表 bookdb.booktable 结构
CREATE TABLE IF NOT EXISTS `booktable` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号，主键，自增',
  `bookname` varchar(100) NOT NULL COMMENT '书名',
  `bookauthor` varchar(100) NOT NULL COMMENT '作者',
  `booktype` tinyint(4) NOT NULL COMMENT '类型',
  `bookprice` float NOT NULL COMMENT '价格',
  PRIMARY KEY (`bookid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gb2312;

-- 正在导出表  bookdb.booktable 的数据：0 rows
/*!40000 ALTER TABLE `booktable` DISABLE KEYS */;
INSERT INTO `booktable` (`bookid`, `bookname`, `bookauthor`, `booktype`, `bookprice`) VALUES
	(1, 'PHP基础', '一帆', 1, 58.6),
	(2, 'PHP高级编程', '刘萍', 1, 45.8),
	(3, '本草纲目', '李时珍', 2, 125.6),
	(4, '新概念英语', '新东方', 3, 39.5),
	(5, 'PHP入门', 'sisi', 1, 35.6),
	(6, 'GRE英语', 'lala', 3, 55.3);
/*!40000 ALTER TABLE `booktable` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
CREATE TABLE  IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nick` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `remainingSum` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

/*!原始用户数据 */;
INSERT INTO `users`(`userid`, `username`, `email`, `password`, `nick`,`role`,`remainingSum`) VALUES
  (1,'admin','admin@163.com','1','admin','admin',100000.0),
  (2,'aa','aa@163.com','aa','阿大','user',9999.99);
