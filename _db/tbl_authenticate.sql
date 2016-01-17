/*
Navicat MySQL Data Transfer

Source Server         : XAMPP
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : db_yii2-vol2

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2016-01-17 17:32:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_authenticate`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_authenticate`;
CREATE TABLE `tbl_authenticate` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` char(128) NOT NULL,
  `app_secret` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_authenticate
-- ----------------------------
