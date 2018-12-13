/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: acbkjg
Date: 2018/12/13 ������ 17:40:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `author`
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `menu` varchar(20) DEFAULT NULL,
  `urls` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `authors`
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `url_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

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
--  Table structure for `guests`
-- ----------------------------
DROP TABLE IF EXISTS `guests`;
CREATE TABLE `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

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
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `exam` tinyint(4) DEFAULT NULL,
  `sugges` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

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
  `uid` int(11) DEFAULT NULL,
  `zytype` varchar(10) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=282 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `shenfens`
-- ----------------------------
DROP TABLE IF EXISTS `shenfens`;
CREATE TABLE `shenfens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shenfen` varchar(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
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
  `times` varchar(20) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `author` VALUES ('94','1','2','资源管理','/admin/ziyuan/kecheng','1'), ('95','1','7','课程','/admin/ziyuan/kecheng','1'), ('96','1','8','学历','/admin/ziyuan/xueli','1'), ('97','1','9','证书','/admin/ziyuan/zhengshu','1'), ('123','2','12','通话记录','/admin/users/jilu','1'), ('122','2','3','用户管理','/admin/users/jilu','1'), ('106','3','1','项目管理','/admin/xiangmu/kecheng','1'), ('107','3','4','课程','/admin/xiangmu/kecheng','1'), ('108','3','5','学历','/admin/xiangmu/xueli','1'), ('109','3','6','证书','/admin/xiangmu/zhengshu','1'), ('110','3','2','资源管理','/admin/ziyuan/kecheng','1'), ('111','3','7','课程','/admin/ziyuan/kecheng','1'), ('112','3','8','学历','/admin/ziyuan/xueli','1'), ('113','3','9','证书','/admin/ziyuan/zhengshu','1'), ('114','3','3','用户管理','/admin/users/add','1'), ('115','3','10','新建用户','/admin/users/add','1'), ('116','3','11','用户列表','/admin/users/lists','1'), ('117','3','12','通话记录','/admin/users/jilu','1'), ('118','3','13','订单审批','/admin/users/shenpi','1');
INSERT INTO `fenbus` VALUES ('1','一部'), ('2','二部'), ('3','三部');
INSERT INTO `gangweis` VALUES ('1','销售专员'), ('2','销售主管'), ('7','销售总监');
INSERT INTO `menus` VALUES ('1','项目管理','admin','xiangmu','kecheng','menu/0','file-text-o','0','1'), ('2','资源管理','admin','ziyuan','kecheng','menu/1','file-text-o','0','1'), ('3','用户管理','admin','users','jilu','menu/2/nav/2','file-text-o','0','1'), ('4','课程','admin','xiangmu','kecheng','nav2/0','file-text-o','1','1'), ('5','学历','admin','xiangmu','xueli','nav2/1','file-text-o','1','1'), ('6','证书','admin','xiangmu','zhengshu','nav2/2','file-text-o','1','1'), ('7','课程','admin','ziyuan','kecheng','nav3/0','file-text-o','2','1'), ('8','学历','admin','ziyuan','xueli','nav3/1','file-text-o','2','1'), ('9','证书','admin','ziyuan','zhengshu','nav3/2','file-text-o','2','1'), ('10','新建用户','admin','users','add','nav/0','file-text-o','3','1'), ('11','用户列表','admin','users','lists','nav/1','file-text-o','3','1'), ('12','通话记录','admin','users','jilu','nav/2','file-text-o','3','1'), ('13','订单审批','admin','users','shenpi','nav/3','file-text-o','3','1');
INSERT INTO `orders` VALUES ('1','281','5','1','1','对方电话号码不存在','2018-12-13 11:10:13');
INSERT INTO `projects` VALUES ('1','湖南中级工程师','kecheng','project','1'), ('2','电器类','kecheng','ptype','1'), ('3','研究生班','kecheng','school','1'), ('4','公路水运检测师','kecheng','project','1'), ('5','一级建造师','kecheng','project','1'), ('6','二级建造师','kecheng','project','1'), ('7','消防工程师','kecheng','project','1'), ('8','安全工程师','kecheng','project','1'), ('9','造价工程师','kecheng','project','1'), ('10','监理工程师','kecheng','project','1'), ('11','商务学院班','kecheng','school','1'), ('12','专业商务班','kecheng','school','1'), ('13','电器工程师','kecheng','project','1'), ('14','建筑类','kecheng','ptype','1'), ('15','工程类','kecheng','ptype','1'), ('16','研究生','xueli','project','0'), ('17','中专','xueli','project','1'), ('18','大专','xueli','project','1'), ('19','本科','xueli','project','1'), ('20','土木工程','xueli','ptype','1'), ('21','北京建筑学院','xueli','school','1'), ('22','电器工程师','zhengshu','project','1'), ('23','公路水运检测师','zhengshu','project','1'), ('24','电器类','zhengshu','ptype','1'), ('25','武汉大学','zhengshu','school','1'), ('26','清华大学','zhengshu','school','0'), ('27','安全类','zhengshu','ptype','0'), ('28','一级建造师','zhengshu','project','0');
INSERT INTO `resource` VALUES ('274','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-13 05:17:26'), ('275','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-13 05:17:26'), ('276','造价工程师','广东省','佛山市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-13 05:17:26'), ('277','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-13 05:17:26'), ('278','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12'), ('279','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12'), ('280','造价工程师','广东省','佛山市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-13 05:19:12'), ('281','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12');
INSERT INTO `roles` VALUES ('1','超级管理员','1'), ('2','普通','1'), ('3','中级','1'), ('4','高级','1');
INSERT INTO `shenfens` VALUES ('1','普通用户','1'), ('2','中级用户','1'), ('3','高级用户','1');
INSERT INTO `shengs` VALUES ('1','广东省'), ('2','湖南省'), ('3','河南省');
INSERT INTO `users` VALUES ('1','瑞德威','redwe','123456','1','3','2','2','1','2018-12-06 00:00:00'), ('2','admin','admin','123456','1','1','5','5','1','2018-12-07 00:00:00'), ('3','强哥','qiangge','123456','2','2','6','6','1','2018-12-07 00:00:00'), ('4','hong','12312','23213','3','3','1','7','1','2018-12-07 00:00:00'), ('5','豆豆','doudou','123456','3','2','2','1','1','2018-12-07 00:00:00'), ('6','weida','weiwei','123456','2','3','3','2','1','2018-12-07 00:00:00'), ('7','杨泽','yangze','123456','1','1','1','1','1','2018-12-07 05:19:51'), ('8','abck','123456','123456','1','3','2','7','1','2018-12-11 02:28:49');
