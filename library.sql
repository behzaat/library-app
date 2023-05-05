/*
 Navicat Premium Data Transfer

 Source Server         : EasyCommerce
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : localhost:3306
 Source Schema         : library

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 09/09/2022 11:53:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `age` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of authors
-- ----------------------------

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `book_pages` int NULL DEFAULT 1,
  `book_count` int NULL DEFAULT NULL,
  `author_id` int NOT NULL,
  `book_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES (5, 'آموزش php', 200, 1, 1, '3267713108843309.jpg');
INSERT INTO `books` VALUES (7, 'aaaa', 3, 44, 2, '231-2318332_operating-systems-operating-system-icon.png');
INSERT INTO `books` VALUES (8, 'aaaa', 21, 2, 3, 'chat-bubbles-2891360-2409761@0.png');
INSERT INTO `books` VALUES (9, 'آموزش node.js', 500, 5, 3, '4620590133640787.jpg');

SET FOREIGN_KEY_CHECKS = 1;
