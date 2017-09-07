/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.5
Source Server Version : 50172
Source Host           : 192.168.1.5:3306
Source Database       : tongji

Target Server Type    : MYSQL
Target Server Version : 50172
File Encoding         : 65001

Date: 2017-08-23 14:45:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for liucun
-- ----------------------------
DROP TABLE IF EXISTS `liucun`;
CREATE TABLE `liucun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `liucun_1` int(11) NOT NULL DEFAULT '0' COMMENT '一日留存',
  `liucun_3` int(11) NOT NULL DEFAULT '0' COMMENT '3日留存',
  `liucun_7` int(11) NOT NULL DEFAULT '0' COMMENT '七日留存',
  `channel` int(11) NOT NULL COMMENT '渠道',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是总量，2是各个渠道的量',
  `ltime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of liucun
-- ----------------------------
INSERT INTO `liucun` VALUES ('1', '19059', '0', '0', '0', '1', '2017-08-20');
INSERT INTO `liucun` VALUES ('3', '2', '0', '0', '0', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('4', '0', '0', '0', '1005', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('5', '0', '0', '0', '1002', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('6', '0', '0', '0', '1001', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('7', '0', '0', '0', '1003', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('8', '4', '0', '0', '1024', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('9', '0', '0', '0', '3001', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('10', '4352', '0', '0', '3003', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('11', '8728', '0', '0', '3004', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('12', '0', '0', '0', '1970128', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('13', '0', '0', '0', '1970129', '2', '2017-08-20');
INSERT INTO `liucun` VALUES ('14', '21342', '0', '0', '0', '1', '2017-08-21');
INSERT INTO `liucun` VALUES ('15', '12', '0', '0', '0', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('16', '0', '0', '0', '1005', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('17', '0', '0', '0', '1002', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('18', '0', '0', '0', '1001', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('19', '0', '0', '0', '1003', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('20', '1', '0', '0', '1024', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('21', '0', '0', '0', '3001', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('22', '4700', '0', '0', '3003', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('23', '10235', '0', '0', '3004', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('24', '0', '0', '0', '1970128', '2', '2017-08-21');
INSERT INTO `liucun` VALUES ('25', '0', '0', '0', '1970129', '2', '2017-08-21');
SET FOREIGN_KEY_CHECKS=1;
