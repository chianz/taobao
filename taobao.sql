/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : taobao

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-01-12 10:18:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for taobao_ad
-- ----------------------------
DROP TABLE IF EXISTS `taobao_ad`;
CREATE TABLE `taobao_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_ad
-- ----------------------------
INSERT INTO `taobao_ad` VALUES ('1', '首页幻灯片', '首页幻灯片', '1');

-- ----------------------------
-- Table structure for taobao_adbody
-- ----------------------------
DROP TABLE IF EXISTS `taobao_adbody`;
CREATE TABLE `taobao_adbody` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `is_show` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `ad_id` int(11) NOT NULL,
  `ftitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_adbody
-- ----------------------------
INSERT INTO `taobao_adbody` VALUES ('1', '案发', '1231', '阿斯蒂芬', '/Public/upload/2016/01/20160111101154573.jpg', '1', '1', '1', '123');

-- ----------------------------
-- Table structure for taobao_admin
-- ----------------------------
DROP TABLE IF EXISTS `taobao_admin`;
CREATE TABLE `taobao_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userpwd` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_admin
-- ----------------------------
INSERT INTO `taobao_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null);

-- ----------------------------
-- Table structure for taobao_article
-- ----------------------------
DROP TABLE IF EXISTS `taobao_article`;
CREATE TABLE `taobao_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `col_id` int(11) DEFAULT NULL,
  `body` text,
  `img` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_show` int(11) DEFAULT '1',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_article
-- ----------------------------

-- ----------------------------
-- Table structure for taobao_articlecolumn
-- ----------------------------
DROP TABLE IF EXISTS `taobao_articlecolumn`;
CREATE TABLE `taobao_articlecolumn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '1',
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_articlecolumn
-- ----------------------------

-- ----------------------------
-- Table structure for taobao_menu
-- ----------------------------
DROP TABLE IF EXISTS `taobao_menu`;
CREATE TABLE `taobao_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `parm` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_show` int(255) DEFAULT '1',
  `sid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_menu
-- ----------------------------
INSERT INTO `taobao_menu` VALUES ('1', '系统设置', null, null, null, null, '1', '0');
INSERT INTO `taobao_menu` VALUES ('2', '菜单管理', 'Menu', 'index', '', '1', '1', '1');
INSERT INTO `taobao_menu` VALUES ('3', '网站设置', 'Webset', 'one', '&id=1', '3', '1', '1');
INSERT INTO `taobao_menu` VALUES ('4', '商品分类', 'Shopcolumn', 'index', '', '2', '1', '1');
INSERT INTO `taobao_menu` VALUES ('5', '商品管理', 'Shop', 'index', '', '4', '1', '1');
INSERT INTO `taobao_menu` VALUES ('6', '广告管理', 'Ad', 'index', '', '0', '1', '1');
INSERT INTO `taobao_menu` VALUES ('7', '文章管理', 'Article', 'index', '', '0', '1', '1');
INSERT INTO `taobao_menu` VALUES ('8', '文章分类', 'Articlecolumn', 'index', '', '0', '1', '1');

-- ----------------------------
-- Table structure for taobao_shop
-- ----------------------------
DROP TABLE IF EXISTS `taobao_shop`;
CREATE TABLE `taobao_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `turl` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_shop
-- ----------------------------

-- ----------------------------
-- Table structure for taobao_shopcolumn
-- ----------------------------
DROP TABLE IF EXISTS `taobao_shopcolumn`;
CREATE TABLE `taobao_shopcolumn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `sid` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_shopcolumn
-- ----------------------------
INSERT INTO `taobao_shopcolumn` VALUES ('1', '男装', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('2', '女装', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('3', '鞋帽', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('4', '箱包', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('5', '母婴', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('6', '家居', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('7', '日用', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('8', '内衣', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('9', '配饰', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('10', '数码', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('11', '家电', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('12', '食品', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('13', '餐洁', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('14', '护肤', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('15', '文体', null, '0', '1');
INSERT INTO `taobao_shopcolumn` VALUES ('16', '上衣', '', '1', '1');

-- ----------------------------
-- Table structure for taobao_webset
-- ----------------------------
DROP TABLE IF EXISTS `taobao_webset`;
CREATE TABLE `taobao_webset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taobao_webset
-- ----------------------------
INSERT INTO `taobao_webset` VALUES ('1', '2', '2', '2');
