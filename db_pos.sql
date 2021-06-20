/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_pos

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-20 19:59:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for karyawans
-- ----------------------------
DROP TABLE IF EXISTS `karyawans`;
CREATE TABLE `karyawans` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of karyawans
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2021-06-20-022447', 'App\\Database\\Migrations\\Karyawans', 'default', 'App', '1624157408', '1');
INSERT INTO `migrations` VALUES ('2', '2021-06-20-023520', 'App\\Database\\Migrations\\Penghunis', 'default', 'App', '1624157409', '1');
INSERT INTO `migrations` VALUES ('3', '2021-06-20-023758', 'App\\Database\\Migrations\\Pakets', 'default', 'App', '1624157409', '1');

-- ----------------------------
-- Table structure for pakets
-- ----------------------------
DROP TABLE IF EXISTS `pakets`;
CREATE TABLE `pakets` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_datang` date DEFAULT NULL,
  `penghunis_id` int(6) unsigned NOT NULL,
  `karyawans_id` int(6) unsigned NOT NULL,
  `isi_paket` text DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pakets_penghunis_id_foreign` (`penghunis_id`),
  KEY `pakets_karyawans_id_foreign` (`karyawans_id`),
  CONSTRAINT `pakets_karyawans_id_foreign` FOREIGN KEY (`karyawans_id`) REFERENCES `karyawans` (`id`),
  CONSTRAINT `pakets_penghunis_id_foreign` FOREIGN KEY (`penghunis_id`) REFERENCES `penghunis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pakets
-- ----------------------------

-- ----------------------------
-- Table structure for penghunis
-- ----------------------------
DROP TABLE IF EXISTS `penghunis`;
CREATE TABLE `penghunis` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `unit` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penghunis
-- ----------------------------
