--
-- MySQL database dump
-- Created by DBManage class, Power By yanue. 
-- http://yanue.net 
--
-- 主机: localhost
-- 生成日期: 2017 年  08 月 03 日 16:19
-- MySQL版本: 5.5.53
-- PHP 版本: 5.4.45

--
-- 数据库: `blog`
--

-- -------------------------------------------------------

--
-- 表的结构article
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `art_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `short_desc` varchar(128) NOT NULL COMMENT '简短描述',
  `content` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `thumb_img` varchar(255) NOT NULL,
  `source_img` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL COMMENT '是否删除,0:不展示;1:展示;默认1',
  `is_top` tinyint(1) NOT NULL COMMENT '是否置顶 0:否；1:是',
  `is_recommend` tinyint(1) NOT NULL COMMENT '是否推荐0:否；1:是',
  `read_num` int(11) NOT NULL COMMENT '阅读量',
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 article
--

INSERT INTO `article` VALUES('1','龙珠超','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('2','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('3','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('4','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('5','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('6','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('7','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('8','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('9','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('11','七龙珠','','一起寻找龙珠吧,实现自己的愿望','岛山明','','','0','0','0','0','0','0');
INSERT INTO `article` VALUES('13','父亲的背影','','看着父亲渐行渐远的背影,我沉默无语','朱自清','','','0','0','0','0','0','1501725453');
