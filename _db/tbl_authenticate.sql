
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
