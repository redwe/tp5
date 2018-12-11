/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: acbkjg
Date: 2018/12/11 ���ڶ� 11:17:47
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
--  Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(20) DEFAULT NULL,
  `m_model` varchar(20) DEFAULT NULL,
  `m_ctrl` varchar(20) DEFAULT NULL,
  `m_method` varchar(20) DEFAULT NULL,
  `m_param` varchar(20) DEFAULT NULL,
  `m_icon` varchar(20) DEFAULT NULL,
  `levels` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(20) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `ptype` varchar(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `resource`
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `guest` varchar(20) DEFAULT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `profes` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `intent` varchar(10) DEFAULT NULL,
  `sound` varchar(100) DEFAULT NULL,
  `marks` varchar(100) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `zytype` varchar(10) DEFAULT NULL,
  `exam` tinyint(4) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=gbk;

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
--  Table structure for `sounds`
-- ----------------------------
DROP TABLE IF EXISTS `sounds`;
CREATE TABLE `sounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` varchar(20) DEFAULT NULL,
  `guest` varchar(20) DEFAULT NULL,
  `sound` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `times` int(11) DEFAULT NULL,
  `saler` varchar(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

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
INSERT INTO `menus` VALUES ('1','项目管理','admin','xiangmu','kecheng','menu/0','file-text-o','0','1'), ('2','资源管理','admin','ziyuan','kecheng','menu/1','file-text-o','0','1'), ('3','用户管理','admin','users','add','menu/2','file-text-o','0','1'), ('4','课程','admin','xiangmu','kecheng','nav2/0','file-text-o','1','1'), ('5','学历','admin','xiangmu','xueli','nav2/1','file-text-o','1','1'), ('6','证书','admin','xiangmu','zhengshu','nav2/2','file-text-o','1','1'), ('7','课程','admin','ziyuan','kecheng','nav3/0','file-text-o','2','1'), ('8','学历','admin','ziyuan','xueli','nav3/1','file-text-o','2','1'), ('9','证书','admin','ziyuan','zhengshu','nav3/2','file-text-o','2','1'), ('10','新建用户','admin','users','add','nav/0','file-text-o','3','1'), ('11','用户列表','admin','users','lists','nav/1','file-text-o','3','1'), ('12','通话记录','admin','users','jilu','nav/2','file-text-o','3','1'), ('13','订单审批','admin','users','shenpi','nav/3','file-text-o','3','1');
INSERT INTO `projects` VALUES ('1','湖南中级工程师','kecheng','project','1'), ('2','电器类','kecheng','ptype','1'), ('3','研究生班','kecheng','school','1'), ('4','公路水运检测师','kecheng','project','1'), ('5','一级建造师','kecheng','project','1'), ('6','二级建造师','kecheng','project','1'), ('7','消防工程师','kecheng','project','1'), ('8','安全工程师','kecheng','project','1'), ('9','造价工程师','kecheng','project','1'), ('10','监理工程师','kecheng','project','1'), ('11','商务学院班','kecheng','school','1'), ('12','专业商务班','kecheng','school','1'), ('13','电器工程师','kecheng','project','1'), ('14','建筑类','kecheng','ptype','1'), ('15','工程类','kecheng','ptype','1'), ('16','研究生','xueli','project','0'), ('17','中专','xueli','project','1'), ('18','大专','xueli','project','1'), ('19','本科','xueli','project','1'), ('20','土木工程','xueli','ptype','1'), ('21','北京建筑学院','xueli','school','1'), ('22','电器工程师','zhengshu','project','1'), ('23','公路水运检测师','zhengshu','project','1'), ('24','电器类','zhengshu','ptype','1'), ('25','武汉大学','zhengshu','school','1'), ('26','清华大学','zhengshu','school','0'), ('27','安全类','zhengshu','ptype','0'), ('28','一级建造师','zhengshu','project','0');
INSERT INTO `resource` VALUES ('230','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','kecheng','0','2018-12-10 03:10:25'), ('232','消防工程师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','kecheng','0','2018-12-10 03:10:25'), ('245','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','xueli','0','2018-12-10 06:14:36'), ('235','安全工程师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','kecheng','0','2018-12-10 03:16:44'), ('243','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','xueli','0','2018-12-10 06:14:36'), ('244','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','xueli','0','2018-12-10 06:14:36'), ('242','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','xueli','0','2018-12-10 06:14:36'), ('249','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','zhengshu','0','2018-12-10 06:19:46'), ('248','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','zhengshu','0','2018-12-10 06:19:46'), ('247','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','zhengshu','0','2018-12-10 06:19:46'), ('246','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','0','zhengshu','0','2018-12-10 06:19:46'), ('250','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 08:59:55'), ('251','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 08:59:55'), ('252','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 08:59:55'), ('253','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 08:59:55'), ('254','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:02:57'), ('255','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:02:57'), ('256','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:02:57'), ('257','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:02:57'), ('258','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:03:40'), ('259','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:03:40'), ('260','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:03:40'), ('261','一级建造师','广州省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','kecheng','0','2018-12-11 09:03:40');
INSERT INTO `shenfens` VALUES ('1','普通'), ('2','中级'), ('3','高级');
INSERT INTO `shengs` VALUES ('1','广东省'), ('2','湖南省'), ('3','河南省');
INSERT INTO `users` VALUES ('1','redwe','12312','23213','1','3','2','2','1','2018-12-06 00:00:00'), ('2','admin','12312','23213','5','5','5','5','1','2018-12-07 00:00:00'), ('3','hongwei','12312','23213','6','6','6','6','1','2018-12-07 00:00:00'), ('4','hong','12312','23213','2','3','1','7','1','2018-12-07 00:00:00'), ('5','zhw','zhw','56789','3','2','2','1','1','2018-12-07 00:00:00'), ('6','weida','weiwei','123456','3','3','3','2','1','2018-12-07 00:00:00'), ('7','杨泽','yangze','123456789','1','1','1','1','1','2018-12-07 05:19:51');
