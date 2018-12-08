/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: acbkjg
Date: 2018/12/7 ������ 18:07:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `fenbus`
-- ----------------------------
DROP TABLE IF EXISTS `fenbus`;
CREATE TABLE `fenbus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fenbu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `gangweis`
-- ----------------------------
DROP TABLE IF EXISTS `gangweis`;
CREATE TABLE `gangweis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gangwei` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `shenfens`
-- ----------------------------
DROP TABLE IF EXISTS `shenfens`;
CREATE TABLE `shenfens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shenfen` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `shengs`
-- ----------------------------
DROP TABLE IF EXISTS `shengs`;
CREATE TABLE `shengs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sheng` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `fenbus` VALUES ('1','一部'), ('2','二部'), ('3','三部');
INSERT INTO `gangweis` VALUES ('1','销售专员'), ('2','销售主管'), ('7','销售总监');
INSERT INTO `shenfens` VALUES ('1','普通'), ('2','中级'), ('3','高级');
INSERT INTO `shengs` VALUES ('1','广东省'), ('2','湖南省'), ('3','河南省');
INSERT INTO `users` VALUES ('1','redwe','12312','23213','1','3','2','2','1','2018-12-06 00:00:00'), ('2','admin','12312','23213','5','5','5','5','1','2018-12-07 00:00:00'), ('3','hongwei','12312','23213','6','6','6','6','1','2018-12-07 00:00:00'), ('4','hong','12312','23213','2','3','1','7','1','2018-12-07 00:00:00'), ('5','zhw','zhw','56789','3','2','2','1','1','2018-12-07 00:00:00'), ('6','weida','weiwei','123456','3','3','3','2','1','2018-12-07 00:00:00'), ('7','杨泽','yangze','123456','1','1','1','1','1','2018-12-07 05:19:51');
