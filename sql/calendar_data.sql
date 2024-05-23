/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : temp_demo

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 23/05/2024 20:14:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for calendar_data
-- ----------------------------
DROP TABLE IF EXISTS `calendar_data`;
CREATE TABLE `calendar_data`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroomName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题',
  `startDate` datetime(0) NULL DEFAULT NULL COMMENT '开始时间',
  `endDate` datetime(0) NULL DEFAULT NULL COMMENT '结束时间',
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '状态(1,2,3,4,5)',
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '位置',
  `isDel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '是否删除( 0:否; 1:是)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '日历数据' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calendar_data
-- ----------------------------
INSERT INTO `calendar_data` VALUES (1, '数学教室', '2024-05-01 16:22:08', '2024-05-03 16:22:15', 'a01', '主楼M301', '0');
INSERT INTO `calendar_data` VALUES (2, '语文', '2024-05-04 16:22:30', '2024-05-06 16:22:43', 'a02', '主楼M101', '0');
INSERT INTO `calendar_data` VALUES (3, '英语', '2024-05-08 08:00:00', '2024-05-09 16:23:35', 'a03', '北楼203', '0');
INSERT INTO `calendar_data` VALUES (4, '化学6月', '2024-06-08 08:00:00', '2024-06-09 16:23:35', 'a03', '北楼203', '1');
INSERT INTO `calendar_data` VALUES (5, '物理6月', '2024-06-11 08:00:00', '2024-06-13 16:23:35', 'a03', '北楼203', '1');
INSERT INTO `calendar_data` VALUES (6, 'WEB_4月', '2024-04-11 08:00:00', '2024-04-13 16:23:35', 'a03', '西楼W403', '1');
INSERT INTO `calendar_data` VALUES (7, 'JAVA_4月', '2024-04-11 08:00:00', '2024-04-13 16:23:35', 'a03', '西楼W403', '1');

SET FOREIGN_KEY_CHECKS = 1;
