/*
 Navicat Premium Data Transfer

 Source Server         : zzz_fei_localhost_new_mysql5.7
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : yi_zheng

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 18/06/2020 00:57:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for yz_book
-- ----------------------------
DROP TABLE IF EXISTS `yz_book`;
CREATE TABLE `yz_book`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `num_add` int(10) NULL DEFAULT 0,
  `create_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `update_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yz_book
-- ----------------------------
INSERT INTO `yz_book` VALUES (1, '我是admin，现在create book，图书编号001', 1.00, 'admin', 6, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (2, '我是admin，现在create book，图书编号002', 2.00, 'admin', 1, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (3, '我是admin，现在create book，图书编号003', 3.00, 'admin', 2, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (4, '我是test，现在create book，图书编号test-001', 1.00, 'test', 1, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (8, '我是随机admin3fbc', 111.00, 'admin_test', 1, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (9, '我是随机 admin_cc8b', 111.00, 'admin_test', 1, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (10, '我是随机 admin_c550', 33.00, 'admin_test_14', 1, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (11, '我是随机 admin_4719', 91.00, 'admin_test_98', 1, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (12, '我是随机 admin_13ba', 89.00, 'admin_test_64', NULL, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (13, '我是随机 admin_571c', 36.00, 'admin_test_28', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (14, '我是随机 admin_73e7', 45.00, 'admin_test_74', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (15, '我是随机 admin_3263', 58.00, 'admin_test_52', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (16, '我是随机 admin_011e', 74.00, 'admin_test_91', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (17, '我是随机 admin_73cc', 42.00, 'admin_test_30', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (18, '我是随机 admin_ecae', 72.00, 'admin_test_44', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (19, '我是随机 admin_6023', 83.00, 'admin_test_44', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (20, '我是随机 admin_22f4', 64.00, 'admin_test_69', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (21, '我是随机 admin_5394', 23.00, 'admin_test_54', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (22, '我是随机 admin_3d83', 66.00, 'admin_test_19', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (23, '我是随机 admin_65be', 94.00, 'admin_test_82', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (24, '我是随机 admin_5070', 35.00, 'admin_test_19', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (25, '我是随机 admin_a6ab', 43.00, 'admin_test_100', 0, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (26, '我是随机 admin_edf5', 34.00, 'admin_test_84', 4, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (27, '我是随机 admin_719a', 39.00, 'admin_test_87', 4, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (28, 'web图书198a', 10046.00, 'web作者16', 4, '2020-02-06 08:45:15', '2020-02-06 08:45:15');
INSERT INTO `yz_book` VALUES (29, 'web图书dbb6', 183.00, 'web作者48', 9, '2020-02-06 08:45:15', '2020-02-06 08:47:37');
INSERT INTO `yz_book` VALUES (30, 'web图书8298', 156.00, 'web作者40', 11, '2020-02-06 08:45:15', '2020-02-06 08:47:37');
INSERT INTO `yz_book` VALUES (31, 'web图书928f', 151.00, 'web作者25', 1, '2020-02-06 08:45:15', '2020-02-06 08:47:37');
INSERT INTO `yz_book` VALUES (32, 'web图书2030', 108.00, 'web作者31', 1, '2020-02-06 08:45:15', '2020-02-06 08:47:37');
INSERT INTO `yz_book` VALUES (33, 'web图书a135', 150.00, 'web作者76', 1, '2020-02-06 08:45:15', '2020-02-06 08:47:37');
INSERT INTO `yz_book` VALUES (34, 'web图书d256', 110.00, 'web作者94', 2, '2020-02-06 08:48:17', '2020-02-06 08:48:37');
INSERT INTO `yz_book` VALUES (35, 'web图书a6ef', 114.00, 'web作者26', 0, '2020-02-06 08:49:03', '2020-02-06 08:49:03');
INSERT INTO `yz_book` VALUES (36, 'web图书435f', 140.00, 'web作者59', 0, '2020-02-06 08:49:27', '2020-02-06 08:49:27');
INSERT INTO `yz_book` VALUES (37, 'web图书4f52', 161.00, 'web作者28', 3, '2020-06-14 13:40:27', '2020-06-14 13:42:26');

-- ----------------------------
-- Table structure for yz_user
-- ----------------------------
DROP TABLE IF EXISTS `yz_user`;
CREATE TABLE `yz_user`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yz_user
-- ----------------------------
INSERT INTO `yz_user` VALUES (1, 'test', '$2y$10$XiY7OhmFEulFnvWFoBQEyeqghFUuGKjuN/TLN2MM37S4nagVjVCWS', '2019-11-21 17:30:18', '2019-11-21 17:30:18', NULL);
INSERT INTO `yz_user` VALUES (2, 'fei', '$2y$10$9MYauVkc5XpeeqW8gR4MyeYQmnuT1CkG8qKGEtcs9nEAIGg8e7dIC', '2019-11-21 17:36:57', '2019-11-21 17:36:57', NULL);
INSERT INTO `yz_user` VALUES (3, '12345678912', '$2y$10$9MYauVkc5XpeeqW8gR4MyeYQmnuT1CkG8qKGEtcs9nEAIGg8e7dIC', '2020-01-29 09:46:41', '2020-05-27 08:55:19', NULL);
INSERT INTO `yz_user` VALUES (4, '13203496352', '$2y$10$9MYauVkc5XpeeqW8gR4MyeYQmnuT1CkG8qKGEtcs9nEAIGg8e7dIC', '2020-01-29 09:47:30', '2020-01-29 09:47:30', NULL);

SET FOREIGN_KEY_CHECKS = 1;
