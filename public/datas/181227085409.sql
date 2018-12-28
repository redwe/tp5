/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: acbkjg
Date: 2018/12/27 ������ 08:54:09
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
--  Table structure for `labels`
-- ----------------------------
DROP TABLE IF EXISTS `labels`;
CREATE TABLE `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `labels` varchar(600) DEFAULT NULL,
  `marks` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `levels`
-- ----------------------------
DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `level` char(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `marks` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=gbk;

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=gbk;

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
  `label` varchar(600) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `zytype` varchar(10) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=342 DEFAULT CHARSET=gbk;

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
  `picurl` varchar(100) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `author` VALUES ('94','1','2','资源管理','/admin/ziyuan/kecheng','1'), ('95','1','7','课程','/admin/ziyuan/kecheng','1'), ('96','1','8','学历','/admin/ziyuan/xueli','1'), ('97','1','9','证书','/admin/ziyuan/zhengshu','1'), ('123','2','12','通话记录','/admin/users/jilu','1'), ('122','2','3','用户管理','/admin/users/jilu','1'), ('106','3','1','项目管理','/admin/xiangmu/kecheng','1'), ('107','3','4','课程','/admin/xiangmu/kecheng','1'), ('108','3','5','学历','/admin/xiangmu/xueli','1'), ('109','3','6','证书','/admin/xiangmu/zhengshu','1'), ('110','3','2','资源管理','/admin/ziyuan/kecheng','1'), ('111','3','7','课程','/admin/ziyuan/kecheng','1'), ('112','3','8','学历','/admin/ziyuan/xueli','1'), ('113','3','9','证书','/admin/ziyuan/zhengshu','1'), ('114','3','3','用户管理','/admin/users/add','1'), ('115','3','10','新建用户','/admin/users/add','1'), ('116','3','11','用户列表','/admin/users/lists','1'), ('117','3','12','通话记录','/admin/users/jilu','1'), ('118','3','13','订单审批','/admin/users/shenpi','1');
INSERT INTO `fenbus` VALUES ('1','一部'), ('2','二部'), ('3','三部');
INSERT INTO `gangweis` VALUES ('1','销售专员'), ('2','销售主管'), ('7','销售总监');
INSERT INTO `labels` VALUES ('1','336','1','{\"area\":\"广东省\",\"people\":\"1人\",\"edu\":\"中专\",\"train\":\"有\",\"age\":\"30-35岁\",\"sex\":\"男\",\"capa\":\"中层\",\"pros\":\"消防\",\"will\":\"C(以后再说)\",\"call\":\"未接听\"}','测试一下能不能保存！','1','2018-12-25 00:00:00'), ('2','336','1','{\"area\":\"广东省\",\"people\":\"2-5人\",\"edu\":\"中专\",\"train\":\"有\",\"age\":\"25岁以下\",\"sex\":\"女\",\"capa\":\"中层\",\"pros\":\"消防\",\"will\":\"B(考虑中)\",\"call\":\"通话良好\"}','你好啊！','1','2018-12-25 04:30:06'), ('3','334','1','{\"area\":\"广东省\",\"people\":\"5-10人\",\"edu\":\"本科\",\"train\":\"\",\"age\":\"30-35岁\",\"sex\":\"女\",\"capa\":\"中层\",\"pros\":\"公路水运\",\"will\":\"C(以后再说)\",\"call\":\"未接听\"}','这是一个测试内容！','1','2018-12-25 04:31:25'), ('5','334','1','{\"area\":\"\",\"people\":\"\",\"edu\":\"\",\"train\":\"\",\"age\":\"\",\"sex\":\"\",\"capa\":\"\",\"pros\":\"\",\"will\":\"\",\"call\":\"\"}','请在此处输入内容','1','2018-12-25 04:36:59'), ('6','336','1','{\"area\":\"广东省\",\"people\":\"2-5人\",\"edu\":\"中专\",\"train\":\"无\",\"age\":\"25-30岁\",\"sex\":\"女\",\"capa\":\"企业主\",\"pros\":\"二建\",\"will\":\"B(考虑中)\",\"call\":\"空号\"}','测试一下','1','2018-12-25 04:41:47'), ('7','336','1','{\"area\":\"广东省\",\"people\":\"2-5人\",\"edu\":\"中专\",\"train\":\"有\",\"age\":\"25-30岁\",\"sex\":\"男\",\"capa\":\"中层\",\"pros\":\"二建\",\"will\":\"B(考虑中)\",\"call\":\"通话良好\"}','此客户联系不上！','1','2018-12-25 04:43:52');
INSERT INTO `levels` VALUES ('1','A','1','1','要报班'), ('2','B','1','1','考虑中'), ('3','C','1','1','以后再说'), ('4','D','1','1',NULL), ('5','E','1','2',NULL), ('6','F','1','2',NULL), ('7','G','1','2',NULL), ('8','S','1','2',NULL), ('10','H','1','3',NULL), ('11','K','1','3',NULL), ('12','很有意向','1','3',NULL), ('13','测试一下','0','1',NULL), ('14','可以啦','0','1',NULL), ('15','马上成交','0','1',NULL), ('16','意向明确','1','7',NULL), ('17','很有意向','1','7',NULL), ('18','希望不大','1','7',NULL);
INSERT INTO `menus` VALUES ('1','项目管理','admin','xiangmu','kecheng','menu/0','file-text-o','0','1'), ('2','资源管理','admin','ziyuan','kecheng','menu/1','file-text-o','0','1'), ('3','用户管理','admin','users','jilu','menu/2/nav/2','file-text-o','0','1'), ('4','课程','admin','xiangmu','kecheng','nav2/0','file-text-o','1','1'), ('5','学历','admin','xiangmu','xueli','nav2/1','file-text-o','1','1'), ('6','证书','admin','xiangmu','zhengshu','nav2/2','file-text-o','1','1'), ('7','课程','admin','ziyuan','kecheng','nav3/0','file-text-o','2','1'), ('8','学历','admin','ziyuan','xueli','nav3/1','file-text-o','2','1'), ('9','证书','admin','ziyuan','zhengshu','nav3/2','file-text-o','2','1'), ('10','新建用户','admin','users','add','nav/0','file-text-o','3','1'), ('11','用户列表','admin','users','lists','nav/1','file-text-o','3','1'), ('12','通话记录','admin','users','jilu','nav/2','file-text-o','3','1'), ('13','订单审批','admin','users','shenpi','nav/3','file-text-o','3','1');
INSERT INTO `orders` VALUES ('1','281','7','1','-1','对方电话号码不存在','2018-12-13 11:10:13');
INSERT INTO `projects` VALUES ('1','湖南中级工程师','kecheng','project','1'), ('2','电器类','kecheng','ptype','1'), ('3','研究生班','kecheng','school','1'), ('4','公路水运检测师','kecheng','project','1'), ('5','一级建造师','kecheng','project','1'), ('6','二级建造师','kecheng','project','1'), ('7','消防工程师','kecheng','project','1'), ('8','安全工程师','kecheng','project','1'), ('9','造价工程师','kecheng','project','1'), ('10','监理工程师','kecheng','project','1'), ('11','商务学院班','kecheng','school','1'), ('12','专业商务班','kecheng','school','1'), ('13','电器工程师','kecheng','project','1'), ('14','建筑类','kecheng','ptype','1'), ('15','工程类','kecheng','ptype','1'), ('16','研究生','xueli','project','0'), ('17','中专','xueli','project','1'), ('18','大专','xueli','project','1'), ('19','本科','xueli','project','0'), ('20','土木工程','xueli','ptype','1'), ('21','北京建筑学院','xueli','school','1'), ('22','电器工程师','zhengshu','project','1'), ('23','公路水运检测师','zhengshu','project','1'), ('24','电器类','zhengshu','ptype','1'), ('25','武汉大学','zhengshu','school','1'), ('26','清华大学','zhengshu','school','0'), ('27','安全类','zhengshu','ptype','0'), ('28','一级建造师','zhengshu','project','0'), ('32','三级建造师','kecheng','project','0'), ('33','安防类','kecheng','ptype','0'), ('34','博士生班','kecheng','school','0'), ('35','本科','xueli','project','1'), ('36','建筑工程','xueli','ptype','1'), ('37','河南大学','xueli','school','0'), ('38','消防工程师','zhengshu','project','1'), ('39','环保类','zhengshu','ptype','0'), ('40','复旦大学','zhengshu','school','0');
INSERT INTO `resource` VALUES ('287','安全工程师','河南省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'G',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:19'), ('294','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:08:07'), ('289','二级建造师','河南省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'F',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:19'), ('290','一级建造师','河南省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'B',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:30'), ('291','安全工程师','河南省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:30'), ('292','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:30'), ('293','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:30'), ('295','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:08:07'), ('296','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:08:07'), ('297','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:08:07'), ('298','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:19:35'), ('299','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:19:35'), ('300','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:19:35'), ('301','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:19:35'), ('302','网络工程师','广东省','深圳市','赵红伟','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:20:38'), ('303','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:20:38'), ('304','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:20:38'), ('274','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:17:26'), ('275','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:17:26'), ('276','造价工程师','广东省','佛山市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:17:26'), ('277','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:17:26'), ('278','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12'), ('279','安全工程师','河南省','郑州市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12'), ('280','造价工程师','广东省','佛山市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12'), ('281','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-13 05:19:12'), ('282','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-14 09:33:31'), ('283','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-14 09:33:31'), ('284','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-14 09:33:31'), ('285','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-14 09:33:31'), ('286','一级建造师','广东省','深圳市','邓子明','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-22 10:11:18'), ('305','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:20:38'), ('306','网络工程师','广东省','深圳市','赵红伟','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:29:40'), ('307','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:29:40'), ('308','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:29:40'), ('309','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:29:40'), ('310','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:34:42'), ('311','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:34:42'), ('312','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:34:42'), ('313','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:34:42'), ('314','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:41:11'), ('315','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:41:11'), ('316','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:41:11'), ('317','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:41:11'), ('318','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:47:17'), ('319','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:47:17'), ('320','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:47:17'), ('321','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:47:17'), ('322','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:52:57'), ('323','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:52:57'), ('324','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:52:57'), ('325','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:52:57'), ('326','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:54:54'), ('327','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:54:54'), ('328','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 09:54:54'), ('329','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 09:54:54'), ('330','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 10:08:14'), ('331','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 10:08:14'), ('332','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 10:08:14'), ('333','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 10:08:14'), ('334','网络工程师','河南省','郑州市','赵红伟','13937174487','郑州市建委',NULL,NULL,NULL,'B',NULL,'暂无','空号','1','1','kecheng','2018-12-24 10:11:58'), ('335','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 10:11:58'), ('336','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'C',NULL,'暂无','空号','0','1','kecheng','2018-12-24 10:11:58'), ('337','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 10:11:58'), ('338','网络工程师','河南省','郑州市','赵红伟','13936987456','郑州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 10:12:37'), ('339','安全工程师','广东省','东莞市','张大千','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 10:12:37'), ('340','造价工程师','河南省','郑州市','李善长','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','1','kecheng','2018-12-24 10:12:37'), ('341','二级建造师','广东省','中山市','诸葛亮','13936987456','广州市建委',NULL,NULL,NULL,'A',NULL,'暂无','空号','1','0','kecheng','2018-12-24 10:12:37');
INSERT INTO `roles` VALUES ('1','超级管理员','1'), ('2','普通','1'), ('3','中级','1'), ('4','高级','1');
INSERT INTO `shenfens` VALUES ('1','普通用户','1'), ('2','中级用户','1'), ('3','高级用户','1');
INSERT INTO `shengs` VALUES ('1','广东省'), ('2','湖南省'), ('3','河南省');
INSERT INTO `users` VALUES ('1','瑞德威','redwe','123456','3','3','2','2','1','/uploads/20181225/c65bc0bbe644dfbf85ad03b34c5eef9b.jpg','2018-12-06 00:00:00'), ('2','admin','admin','123456','1','1','5','5','1',NULL,'2018-12-07 00:00:00'), ('3','强哥','qiangge','123456','2','2','6','6','1',NULL,'2018-12-07 00:00:00'), ('4','hong','12312','123456','3','3','1','7','0',NULL,'2018-12-07 00:00:00'), ('5','豆豆','doudou','123456','1','2','2','2','1',NULL,'2018-12-07 00:00:00'), ('6','weida','weiwei','123456','2','3','3','2','1',NULL,'2018-12-07 00:00:00'), ('7','杨泽','yangze','123456','1','1','1','1','1',NULL,'2018-12-07 05:19:51'), ('8','abck','123456','123456','1','3','2','7','1',NULL,'2018-12-11 02:28:49');
