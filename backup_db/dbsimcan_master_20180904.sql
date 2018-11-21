/*
 Navicat Premium Data Transfer

 Source Server         : mySql_Local
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost:3306
 Source Schema         : dbsimcan_master

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : 65001

 Date: 05/09/2018 10:17:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kin_trx_iku_opd_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_iku_opd_dok`;
CREATE TABLE `kin_trx_iku_opd_dok`  (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NOT NULL,
  `uraian_dokumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_renstra` int(11) NOT NULL DEFAULT 1,
  `id_perubahan` int(11) NULL DEFAULT NULL,
  `status_dokumen` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_iku_opd_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_iku_opd_kegiatan`;
CREATE TABLE `kin_trx_iku_opd_kegiatan`  (
  `id_iku_opd_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_iku_opd_program` int(11) NOT NULL,
  `id_indikator_kegiatan_renstra` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_iku_opd_kegiatan`) USING BTREE,
  INDEX `id_dokumen`(`id_iku_opd_program`) USING BTREE,
  CONSTRAINT `kin_trx_iku_opd_kegiatan_ibfk_1` FOREIGN KEY (`id_iku_opd_program`) REFERENCES `kin_trx_iku_opd_program` (`id_iku_opd_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_iku_opd_program
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_iku_opd_program`;
CREATE TABLE `kin_trx_iku_opd_program`  (
  `id_iku_opd_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_iku_opd_sasaran` int(11) NOT NULL,
  `id_indikator_program_renstra` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_iku_opd_program`) USING BTREE,
  INDEX `id_dokumen`(`id_iku_opd_sasaran`) USING BTREE,
  CONSTRAINT `kin_trx_iku_opd_program_ibfk_1` FOREIGN KEY (`id_iku_opd_sasaran`) REFERENCES `kin_trx_iku_opd_sasaran` (`id_iku_opd_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_iku_opd_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_iku_opd_sasaran`;
CREATE TABLE `kin_trx_iku_opd_sasaran`  (
  `id_iku_opd_sasaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen` int(11) NOT NULL,
  `id_indikator_sasaran_renstra` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_iku_opd_sasaran`) USING BTREE,
  INDEX `id_dokumen`(`id_dokumen`) USING BTREE,
  CONSTRAINT `kin_trx_iku_opd_sasaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `kin_trx_iku_opd_dok` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_iku_pemda_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_iku_pemda_dok`;
CREATE TABLE `kin_trx_iku_pemda_dok`  (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `no_dokumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NOT NULL,
  `uraian_dokumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_rpjmd` int(11) NOT NULL DEFAULT 1,
  `id_perubahan` int(11) NULL DEFAULT NULL,
  `status_dokumen` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_iku_pemda_rinci
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_iku_pemda_rinci`;
CREATE TABLE `kin_trx_iku_pemda_rinci`  (
  `id_iku_pemda` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_iku_pemda`) USING BTREE,
  INDEX `id_dokumen`(`id_dokumen`) USING BTREE,
  CONSTRAINT `kin_trx_iku_pemda_rinci_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `kin_trx_iku_pemda_dok` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es3_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es3_dok`;
CREATE TABLE `kin_trx_perkin_es3_dok`  (
  `id_dokumen_perkin` int(11) NOT NULL AUTO_INCREMENT,
  `id_sotk_es3` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `no_dokumen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NULL DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT '2018-01-01',
  `id_pegawai` int(11) NOT NULL DEFAULT 0,
  `nama_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT 0,
  `uraian_pangkat_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nip_penandatangan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen_perkin`) USING BTREE,
  INDEX `id_unit`(`id_sotk_es3`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es3_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es3_kegiatan`;
CREATE TABLE `kin_trx_perkin_es3_kegiatan`  (
  `id_perkin_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkin_program` int(11) NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_sotk_es4` int(11) NOT NULL DEFAULT 0,
  `status_data` int(2) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_kegiatan`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_program`) USING BTREE,
  INDEX `id_program`(`id_kegiatan_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_es3_kegiatan_ibfk_1` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_es3_program` (`id_perkin_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es3_program
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es3_program`;
CREATE TABLE `kin_trx_perkin_es3_program`  (
  `id_perkin_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_perkin` int(11) NOT NULL DEFAULT 0,
  `id_perkin_program_opd` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_program`) USING BTREE,
  INDEX `id_program`(`id_program_renstra`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_perkin`) USING BTREE,
  INDEX `id_perkin_program_opd`(`id_perkin_program_opd`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_es3_program_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es3_dok` (`id_dokumen_perkin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kin_trx_perkin_es3_program_ibfk_2` FOREIGN KEY (`id_perkin_program_opd`) REFERENCES `kin_trx_perkin_opd_program` (`id_perkin_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es3_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es3_program_indikator`;
CREATE TABLE `kin_trx_perkin_es3_program_indikator`  (
  `id_perkin_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkin_program` int(11) NULL DEFAULT NULL,
  `id_indikator_program_renstra` int(11) NULL DEFAULT NULL,
  `target_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t2` decimal(20, 2) NOT NULL,
  `target_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_indikator`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_program`) USING BTREE,
  INDEX `id_program`(`id_indikator_program_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_es3_program_indikator_ibfk_1` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_es3_program` (`id_perkin_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es4_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es4_dok`;
CREATE TABLE `kin_trx_perkin_es4_dok`  (
  `id_dokumen_perkin` int(11) NOT NULL AUTO_INCREMENT,
  `id_sotk_es4` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `no_dokumen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NULL DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT '2018-01-01',
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `nama_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT 0,
  `uraian_pangkat_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nip_penandatangan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen_perkin`) USING BTREE,
  INDEX `id_unit`(`id_sotk_es4`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es4_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es4_kegiatan`;
CREATE TABLE `kin_trx_perkin_es4_kegiatan`  (
  `id_perkin_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_perkin` int(11) NOT NULL DEFAULT 0,
  `id_perkin_kegiatan_es3` int(11) NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t2` decimal(20, 2) NOT NULL,
  `pagu_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_kegiatan`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_kegiatan_es3`) USING BTREE,
  INDEX `id_program`(`id_kegiatan_renstra`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_perkin`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_es4_kegiatan_ibfk_1` FOREIGN KEY (`id_perkin_kegiatan_es3`) REFERENCES `kin_trx_perkin_es3_kegiatan` (`id_perkin_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kin_trx_perkin_es4_kegiatan_ibfk_2` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es4_dok` (`id_dokumen_perkin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_es4_kegiatan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_es4_kegiatan_indikator`;
CREATE TABLE `kin_trx_perkin_es4_kegiatan_indikator`  (
  `id_perkin_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkin_kegiatan` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `target_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t2` decimal(20, 2) NOT NULL,
  `target_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_indikator`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_kegiatan`) USING BTREE,
  INDEX `id_program`(`id_indikator_kegiatan_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_es4_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_perkin_kegiatan`) REFERENCES `kin_trx_perkin_es4_kegiatan` (`id_perkin_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_opd_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_opd_dok`;
CREATE TABLE `kin_trx_perkin_opd_dok`  (
  `id_dokumen_perkin` int(11) NOT NULL AUTO_INCREMENT,
  `id_sotk_es2` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `no_dokumen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NULL DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT '2018-01-01',
  `id_pegawai` int(11) NOT NULL DEFAULT 0,
  `nama_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT 0,
  `uraian_pangkat_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `nip_penandatangan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen_perkin`) USING BTREE,
  INDEX `id_unit`(`id_sotk_es2`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_opd_program
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_opd_program`;
CREATE TABLE `kin_trx_perkin_opd_program`  (
  `id_perkin_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkin_sasaran` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `id_sotk_es3` int(11) NOT NULL DEFAULT 0,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_program`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_sasaran`) USING BTREE,
  INDEX `id_program`(`id_program_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_opd_program_ibfk_1` FOREIGN KEY (`id_perkin_sasaran`) REFERENCES `kin_trx_perkin_opd_sasaran` (`id_perkin_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 157 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_opd_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_opd_sasaran`;
CREATE TABLE `kin_trx_perkin_opd_sasaran`  (
  `id_perkin_sasaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_perkin` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_sasaran`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_dokumen_perkin`) USING BTREE,
  INDEX `id_program`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_opd_sasaran_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_opd_dok` (`id_dokumen_perkin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_perkin_opd_sasaran_indikator
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_perkin_opd_sasaran_indikator`;
CREATE TABLE `kin_trx_perkin_opd_sasaran_indikator`  (
  `id_perkin_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `id_perkin_sasaran` int(11) NULL DEFAULT NULL,
  `id_indikator_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `target_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t2` decimal(20, 2) NOT NULL,
  `target_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkin_indikator`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_sasaran`) USING BTREE,
  INDEX `id_program`(`id_indikator_sasaran_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_perkin_opd_sasaran_indikator_ibfk_1` FOREIGN KEY (`id_perkin_sasaran`) REFERENCES `kin_trx_perkin_opd_sasaran` (`id_perkin_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es2_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es2_dok`;
CREATE TABLE `kin_trx_real_es2_dok`  (
  `id_dokumen_real` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_perkin` int(11) NULL DEFAULT NULL,
  `id_sotk_es2` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `triwulan` int(11) NOT NULL DEFAULT 1,
  `no_dokumen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `nama_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT 0,
  `uraian_pangkat_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nip_penandatangan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen_real`) USING BTREE,
  INDEX `id_unit`(`id_sotk_es2`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_perkin`) USING BTREE,
  CONSTRAINT `kin_trx_real_es2_dok_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_opd_dok` (`id_dokumen_perkin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kin_trx_real_es2_dok_ibfk_2` FOREIGN KEY (`id_sotk_es2`) REFERENCES `ref_sotk_level_1` (`id_sotk_es2`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es2_program
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es2_program`;
CREATE TABLE `kin_trx_real_es2_program`  (
  `id_real_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_real_sasaran` int(11) NOT NULL DEFAULT 0,
  `id_real_program_es3` int(11) NULL DEFAULT NULL,
  `id_perkin_program` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t2` decimal(20, 2) NOT NULL,
  `pagu_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_program`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_program`) USING BTREE,
  INDEX `id_program`(`id_program_renstra`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_real_sasaran`) USING BTREE,
  INDEX `id_real_program_es3`(`id_real_program_es3`) USING BTREE,
  CONSTRAINT `kin_trx_real_es2_program_ibfk_1` FOREIGN KEY (`id_real_sasaran`) REFERENCES `kin_trx_real_es2_sasaran` (`id_real_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kin_trx_real_es2_program_ibfk_2` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_opd_program` (`id_perkin_program`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kin_trx_real_es2_program_ibfk_3` FOREIGN KEY (`id_real_program_es3`) REFERENCES `kin_trx_real_es3_program` (`id_real_program`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es2_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es2_sasaran`;
CREATE TABLE `kin_trx_real_es2_sasaran`  (
  `id_real_sasaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_real` int(11) NULL DEFAULT NULL,
  `id_perkin_sasaran` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_sasaran`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_dokumen_real`) USING BTREE,
  INDEX `id_program`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_real_es2_sasaran_ibfk_1` FOREIGN KEY (`id_dokumen_real`) REFERENCES `kin_trx_real_es2_dok` (`id_dokumen_real`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es2_sasaran_indikator
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es2_sasaran_indikator`;
CREATE TABLE `kin_trx_real_es2_sasaran_indikator`  (
  `id_real_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `id_real_sasaran` int(11) NULL DEFAULT NULL,
  `id_perkin_indikator` int(11) NULL DEFAULT NULL,
  `id_indikator_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `target_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t2` decimal(20, 2) NOT NULL,
  `target_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `uraian_deviasi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uraian_renaksi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_indikator`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_real_sasaran`) USING BTREE,
  INDEX `id_program`(`id_indikator_sasaran_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_real_es2_sasaran_indikator_ibfk_1` FOREIGN KEY (`id_real_sasaran`) REFERENCES `kin_trx_real_es2_sasaran` (`id_real_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es3_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es3_dok`;
CREATE TABLE `kin_trx_real_es3_dok`  (
  `id_dokumen_real` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_perkin` int(11) NULL DEFAULT NULL,
  `id_sotk_es3` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `triwulan` int(11) NOT NULL DEFAULT 1,
  `no_dokumen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `nama_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT 0,
  `uraian_pangkat_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nip_penandatangan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen_real`) USING BTREE,
  INDEX `id_unit`(`id_sotk_es3`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_perkin`) USING BTREE,
  CONSTRAINT `kin_trx_real_es3_dok_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es3_dok` (`id_dokumen_perkin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kin_trx_real_es3_dok_ibfk_2` FOREIGN KEY (`id_sotk_es3`) REFERENCES `ref_sotk_level_2` (`id_sotk_es3`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es3_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es3_kegiatan`;
CREATE TABLE `kin_trx_real_es3_kegiatan`  (
  `id_real_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_real_program` int(11) NOT NULL DEFAULT 0,
  `id_perkin_kegiatan` int(11) NULL DEFAULT NULL,
  `id_real_kegiatan_es4` int(11) NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t2` decimal(20, 2) NOT NULL,
  `pagu_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `id_real_kegiatan_4` int(11) NOT NULL,
  PRIMARY KEY (`id_real_kegiatan`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_kegiatan`) USING BTREE,
  INDEX `id_program`(`id_kegiatan_renstra`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_real_program`) USING BTREE,
  INDEX `id_real_kegiatan_es4`(`id_real_kegiatan_es4`) USING BTREE,
  CONSTRAINT `kin_trx_real_es3_kegiatan_ibfk_1` FOREIGN KEY (`id_real_program`) REFERENCES `kin_trx_real_es3_program` (`id_real_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kin_trx_real_es3_kegiatan_ibfk_2` FOREIGN KEY (`id_real_kegiatan_es4`) REFERENCES `kin_trx_real_es4_kegiatan` (`id_real_kegiatan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es3_program
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es3_program`;
CREATE TABLE `kin_trx_real_es3_program`  (
  `id_real_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_real` int(11) NOT NULL DEFAULT 0,
  `id_perkin_program` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t2` decimal(20, 2) NOT NULL,
  `pagu_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `uraian_deviasi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uraian_renaksi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_program`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_program`) USING BTREE,
  INDEX `id_program`(`id_program_renstra`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_real`) USING BTREE,
  CONSTRAINT `kin_trx_real_es3_program_ibfk_1` FOREIGN KEY (`id_dokumen_real`) REFERENCES `kin_trx_real_es3_dok` (`id_dokumen_real`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kin_trx_real_es3_program_ibfk_2` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_es3_program` (`id_perkin_program`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es3_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es3_program_indikator`;
CREATE TABLE `kin_trx_real_es3_program_indikator`  (
  `id_real_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `id_real_program` int(11) NOT NULL,
  `id_perkin_indikator` int(11) NULL DEFAULT NULL,
  `id_indikator_program_renstra` int(11) NULL DEFAULT NULL,
  `target_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t2` decimal(20, 2) NOT NULL,
  `target_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `uraian_deviasi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uraian_renaksi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_indikator`) USING BTREE,
  INDEX `id_program`(`id_indikator_program_renstra`) USING BTREE,
  INDEX `id_real_program`(`id_real_program`) USING BTREE,
  CONSTRAINT `kin_trx_real_es3_program_indikator_ibfk_1` FOREIGN KEY (`id_real_program`) REFERENCES `kin_trx_real_es3_program` (`id_real_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es4_dok
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es4_dok`;
CREATE TABLE `kin_trx_real_es4_dok`  (
  `id_dokumen_real` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_perkin` int(11) NULL DEFAULT NULL,
  `id_sotk_es4` int(11) NOT NULL,
  `tahun` int(11) NULL DEFAULT NULL,
  `triwulan` int(11) NOT NULL DEFAULT 1,
  `no_dokumen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_dokumen` date NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `nama_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT 0,
  `uraian_pangkat_penandatangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nip_penandatangan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_dokumen_real`) USING BTREE,
  INDEX `id_unit`(`id_sotk_es4`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_perkin`) USING BTREE,
  CONSTRAINT `kin_trx_real_es4_dok_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es4_dok` (`id_dokumen_perkin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kin_trx_real_es4_dok_ibfk_2` FOREIGN KEY (`id_sotk_es4`) REFERENCES `ref_sotk_level_3` (`id_sotk_es4`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es4_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es4_kegiatan`;
CREATE TABLE `kin_trx_real_es4_kegiatan`  (
  `id_real_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen_real` int(11) NOT NULL DEFAULT 0,
  `id_perkin_kegiatan` int(11) NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `pagu_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t2` decimal(20, 2) NOT NULL,
  `pagu_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(2) NULL DEFAULT NULL,
  `uraian_deviasi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uraian_renaksi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_kegiatan`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_perkin_kegiatan`) USING BTREE,
  INDEX `id_program`(`id_kegiatan_renstra`) USING BTREE,
  INDEX `id_dokumen_perkin`(`id_dokumen_real`) USING BTREE,
  CONSTRAINT `kin_trx_real_es4_kegiatan_ibfk_1` FOREIGN KEY (`id_dokumen_real`) REFERENCES `kin_trx_real_es4_dok` (`id_dokumen_real`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kin_trx_real_es4_kegiatan_ibfk_2` FOREIGN KEY (`id_perkin_kegiatan`) REFERENCES `kin_trx_perkin_es4_kegiatan` (`id_perkin_kegiatan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kin_trx_real_es4_kegiatan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `kin_trx_real_es4_kegiatan_indikator`;
CREATE TABLE `kin_trx_real_es4_kegiatan_indikator`  (
  `id_real_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `id_real_kegiatan` int(11) NULL DEFAULT NULL,
  `id_perkin_indikator` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `target_tahun` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t2` decimal(20, 2) NOT NULL,
  `target_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t2` decimal(20, 2) NOT NULL,
  `real_t3` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `real_t4` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `uraian_deviasi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uraian_renaksi` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_data` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_real_indikator`) USING BTREE,
  INDEX `id_sasaran_kinerja_skpd`(`id_real_kegiatan`) USING BTREE,
  INDEX `id_program`(`id_indikator_kegiatan_renstra`) USING BTREE,
  CONSTRAINT `kin_trx_real_es4_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_real_kegiatan`) REFERENCES `kin_trx_real_es4_kegiatan` (`id_real_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_bidang
-- ----------------------------
DROP TABLE IF EXISTS `ref_bidang`;
CREATE TABLE `ref_bidang`  (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `kd_urusan` int(255) NOT NULL,
  `kd_bidang` int(255) NOT NULL,
  `nm_bidang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_fungsi` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_bidang`) USING BTREE,
  UNIQUE INDEX `idx_ref_bidang`(`kd_urusan`, `kd_bidang`) USING BTREE,
  INDEX `fk_ref_fungsi`(`kd_fungsi`) USING BTREE,
  CONSTRAINT `fk_ref_bidang` FOREIGN KEY (`kd_urusan`) REFERENCES `ref_urusan` (`kd_urusan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_ref_fungsi` FOREIGN KEY (`kd_fungsi`) REFERENCES `ref_fungsi` (`kd_fungsi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_data_sub_unit
-- ----------------------------
DROP TABLE IF EXISTS `ref_data_sub_unit`;
CREATE TABLE `ref_data_sub_unit`  (
  `tahun` int(11) NOT NULL,
  `id_rincian_unit` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub_unit` int(11) NOT NULL,
  `alamat_sub_unit` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota_sub_unit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_jabatan_pimpinan_skpd` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pimpinan_skpd` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip_pimpinan_skpd` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_rincian_unit`) USING BTREE,
  UNIQUE INDEX `tahun`(`tahun`, `id_sub_unit`) USING BTREE,
  INDEX `id_sub_unit`(`id_sub_unit`) USING BTREE,
  CONSTRAINT `fk_data_sub_unit` FOREIGN KEY (`id_sub_unit`) REFERENCES `ref_sub_unit` (`id_sub_unit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_desa
-- ----------------------------
DROP TABLE IF EXISTS `ref_desa`;
CREATE TABLE `ref_desa`  (
  `id_kecamatan` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL COMMENT 'kode desa / kelurahan',
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `status_desa` int(11) NOT NULL COMMENT '2 = Desa 1 = Kelurahan',
  `nama_desa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_zona` int(11) NOT NULL,
  PRIMARY KEY (`id_desa`) USING BTREE,
  UNIQUE INDEX `id_kecamatan`(`id_kecamatan`, `kd_desa`) USING BTREE,
  CONSTRAINT `ref_desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `ref_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `ref_dokumen`;
CREATE TABLE `ref_dokumen`  (
  `id_dokumen` int(255) NOT NULL,
  `nm_dokumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_proses` int(11) NOT NULL DEFAULT 0 COMMENT '0 = rkpd 1 = renja 2 = rpjmd 3 = renstra',
  PRIMARY KEY (`id_dokumen`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_fungsi
-- ----------------------------
DROP TABLE IF EXISTS `ref_fungsi`;
CREATE TABLE `ref_fungsi`  (
  `kd_fungsi` int(11) NOT NULL,
  `nm_fungsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_fungsi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_group
-- ----------------------------
DROP TABLE IF EXISTS `ref_group`;
CREATE TABLE `ref_group`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_roles` int(11) NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_indikator
-- ----------------------------
DROP TABLE IF EXISTS `ref_indikator`;
CREATE TABLE `ref_indikator`  (
  `id_indikator` int(11) NOT NULL AUTO_INCREMENT,
  `type_indikator` int(11) NOT NULL DEFAULT 0 COMMENT '0 keluaran 1 hasil 2 dampak 3 masukan',
  `jenis_indikator` int(11) NOT NULL DEFAULT 0 COMMENT '1 positif 0 negatif',
  `sifat_indikator` int(11) NOT NULL DEFAULT 0 COMMENT '1 Incremental 2 Absolut  3 Komulatif',
  `nm_indikator` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT 0 COMMENT '0 non iku 1 iku pemda 2 iku skpd',
  `asal_indikator` int(11) NULL DEFAULT 0 COMMENT '0 rpjmd 1 renstra 2 rkpd 3 renja',
  `metode_penghitungan` blob NULL COMMENT 'file image ',
  `sumber_data_indikator` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `kualitas_indikator` int(255) NOT NULL DEFAULT 0 COMMENT '0 kualitas 1 kuantitas 2 persentase 3 rata-rata 4 rasio',
  PRIMARY KEY (`id_indikator`) USING BTREE,
  FULLTEXT INDEX `nm_indikator`(`nm_indikator`)
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `ref_jadwal`;
CREATE TABLE `ref_jadwal`  (
  `tahun` int(11) NOT NULL,
  `id_proses` int(11) NOT NULL AUTO_INCREMENT,
  `id_langkah` int(11) NOT NULL,
  `jenis_proses` int(11) NOT NULL DEFAULT 0 COMMENT '0 = rkpd 1 = renja 2 = rpjmd 3 = renstra',
  `uraian_proses` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_mulai` date NULL DEFAULT NULL,
  `tgl_akhir` date NULL DEFAULT NULL,
  `status_proses` int(255) NULL DEFAULT 0 COMMENT '0 = belum 1 = proses 2 = selesai 3 = kedaluwarsa 4 = batal',
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_proses`) USING BTREE,
  UNIQUE INDEX `idx_ref_jadwal`(`tahun`, `id_langkah`, `jenis_proses`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_jenis_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `ref_jenis_lokasi`;
CREATE TABLE `ref_jenis_lokasi`  (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE,
  UNIQUE INDEX `id_jenis`(`id_jenis`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_kabupaten
-- ----------------------------
DROP TABLE IF EXISTS `ref_kabupaten`;
CREATE TABLE `ref_kabupaten`  (
  `id_pemda` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL AUTO_INCREMENT,
  `kd_kab` int(11) NOT NULL,
  `nama_kab_kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kab`) USING BTREE,
  UNIQUE INDEX `id_pemda`(`id_pemda`, `id_prov`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `ref_kecamatan`;
CREATE TABLE `ref_kecamatan`  (
  `id_pemda` int(11) NOT NULL,
  `kd_kecamatan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kecamatan`) USING BTREE,
  INDEX `id_kecamatan`(`id_pemda`) USING BTREE,
  CONSTRAINT `fk_ref_kecamatan` FOREIGN KEY (`id_pemda`) REFERENCES `ref_kabupaten` (`id_kab`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `ref_kegiatan`;
CREATE TABLE `ref_kegiatan`  (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `nm_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kegiatan`) USING BTREE,
  UNIQUE INDEX `idx_ref_kegiatan`(`id_program`, `kd_kegiatan`) USING BTREE,
  CONSTRAINT `fk_ref_kegiatan` FOREIGN KEY (`id_program`) REFERENCES `ref_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3982 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_kolom_tabel_dasar
-- ----------------------------
DROP TABLE IF EXISTS `ref_kolom_tabel_dasar`;
CREATE TABLE `ref_kolom_tabel_dasar`  (
  `id_kolom_tabel_dasar` int(11) NOT NULL,
  `id_tabel_dasar` int(11) NULL DEFAULT NULL,
  `nama_kolom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int(2) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id_kolom_tabel_dasar`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `id_tabel_dasar`(`id_tabel_dasar`) USING BTREE,
  CONSTRAINT `ref_kolom_tabel_dasar_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `ref_kolom_tabel_dasar` (`id_kolom_tabel_dasar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ref_kolom_tabel_dasar_ibfk_2` FOREIGN KEY (`id_tabel_dasar`) REFERENCES `ref_tabel_dasar` (`id_tabel_dasar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_langkah
-- ----------------------------
DROP TABLE IF EXISTS `ref_langkah`;
CREATE TABLE `ref_langkah`  (
  `id_langkah` int(255) NOT NULL,
  `jenis_dokumen` int(255) NOT NULL,
  `nm_langkah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_langkah`, `jenis_dokumen`) USING BTREE,
  UNIQUE INDEX `idx_ref_step`(`id_langkah`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_log_akses
-- ----------------------------
DROP TABLE IF EXISTS `ref_log_akses`;
CREATE TABLE `ref_log_akses`  (
  `id_log` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fl1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fd1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fp2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fu3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fr4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `ref_lokasi`;
CREATE TABLE `ref_lokasi`  (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_lokasi` int(11) NOT NULL COMMENT '0 = Kewilayahan\r\n1 = Ruas Jalan \r\n2 = Saluran Irigasi\r\n3 = Kawasan\r\n99 = Lokasi di Luar Daerah',
  `nama_lokasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_desa` int(11) NULL DEFAULT NULL,
  `id_desa_awal` int(11) NULL DEFAULT NULL,
  `id_desa_akhir` int(11) NULL DEFAULT NULL,
  `koordinat_1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `koordinat_2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `koordinat_3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `koordinat_4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `luasan_kawasan` decimal(20, 2) NULL DEFAULT 0.00,
  `satuan_luas` int(50) NULL DEFAULT NULL,
  `panjang` decimal(20, 2) NULL DEFAULT 0.00,
  `satuan_panjang` int(50) NULL DEFAULT NULL,
  `lebar` decimal(20, 2) NULL DEFAULT 0.00,
  `satuan_lebar` int(11) NULL DEFAULT NULL,
  `keterangan_lokasi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_lokasi`) USING BTREE,
  UNIQUE INDEX `jenis_lokasi`(`jenis_lokasi`, `nama_lokasi`, `id_desa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_mapping_asb_renstra
-- ----------------------------
DROP TABLE IF EXISTS `ref_mapping_asb_renstra`;
CREATE TABLE `ref_mapping_asb_renstra`  (
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_kegiatan_renstra` int(11) NOT NULL,
  INDEX `idx_ref_mapping_asb_renstra`(`id_aktivitas_asb`, `id_kegiatan_renstra`) USING BTREE,
  INDEX `fk_ref_mapping_asb_renstra1`(`id_kegiatan_renstra`) USING BTREE,
  CONSTRAINT `fk_ref_mapping_asb_renstra` FOREIGN KEY (`id_aktivitas_asb`) REFERENCES `trx_asb_aktivitas` (`id_aktivitas_asb`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_ref_mapping_asb_renstra1` FOREIGN KEY (`id_kegiatan_renstra`) REFERENCES `trx_renstra_kegiatan` (`id_kegiatan_renstra`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_menu
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu`;
CREATE TABLE `ref_menu`  (
  `id_menu` bigint(255) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `akses` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '11100' COMMENT '0 denied, 1 granted, CRUD-Posting',
  PRIMARY KEY (`id_menu`) USING BTREE,
  UNIQUE INDEX `menu`(`menu`, `group_id`) USING BTREE,
  INDEX `akses`(`akses`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `ref_pegawai`;
CREATE TABLE `ref_pegawai`  (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip_pegawai` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '199909091999091009',
  `status_pegawai` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE,
  UNIQUE INDEX `nip_pegawai`(`nip_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_pegawai_pangkat
-- ----------------------------
DROP TABLE IF EXISTS `ref_pegawai_pangkat`;
CREATE TABLE `ref_pegawai_pangkat`  (
  `id_pangkat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(255) NOT NULL DEFAULT 0,
  `pangkat_pegawai` int(11) NULL DEFAULT NULL,
  `tmt_pangkat` date NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_pangkat`) USING BTREE,
  UNIQUE INDEX `id_pegawai`(`id_pegawai`, `pangkat_pegawai`) USING BTREE,
  CONSTRAINT `ref_pegawai_pangkat_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `ref_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_pemda
-- ----------------------------
DROP TABLE IF EXISTS `ref_pemda`;
CREATE TABLE `ref_pemda`  (
  `kd_prov` int(11) NOT NULL,
  `kd_kab` int(11) NOT NULL,
  `id_pemda` int(11) NOT NULL,
  `prefix_pemda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nm_prov` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nm_kabkota` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ibu_kota` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_jabatan_kepala_daerah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'BUPATI/WALIKOTA/GUBERNUR',
  `nama_kepala_daerah` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_jabatan_sekretariat_daerah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sekretariat_daerah` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_sekretariat_daerah` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `unit_perencanaan` int(11) NULL DEFAULT NULL COMMENT 'id_sub_unit koordinator perencanaan',
  `nama_kepala_bappeda` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_kepala_bappeda` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `unit_keuangan` int(11) NULL DEFAULT NULL COMMENT 'id_sub_unit pengelola keuangan',
  `nama_kepala_bpkad` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_kepala_bpkad` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo_pemda` mediumblob NULL,
  `alamat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'alamat sekretariat daerah',
  `no_telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '000-0000 0000' COMMENT 'nomor telepon',
  `no_faksimili` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '000-0000 0000' COMMENT 'nomor faksimili',
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'email@pemdasimulasi.go.id',
  PRIMARY KEY (`id_pemda`) USING BTREE,
  UNIQUE INDEX `kd_prov`(`kd_prov`, `kd_kab`) USING BTREE,
  INDEX `id_pemda`(`id_pemda`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_pengusul
-- ----------------------------
DROP TABLE IF EXISTS `ref_pengusul`;
CREATE TABLE `ref_pengusul`  (
  `id_pengusul` int(255) NOT NULL,
  `nm_pengusul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengusul`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_prioritas_nasional
-- ----------------------------
DROP TABLE IF EXISTS `ref_prioritas_nasional`;
CREATE TABLE `ref_prioritas_nasional`  (
  `tahun` int(11) NOT NULL,
  `id_prioritas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prioritas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_prioritas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_prioritas_provinsi
-- ----------------------------
DROP TABLE IF EXISTS `ref_prioritas_provinsi`;
CREATE TABLE `ref_prioritas_provinsi`  (
  `tahun` int(11) NOT NULL,
  `id_prioritas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prioritas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_prioritas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_program
-- ----------------------------
DROP TABLE IF EXISTS `ref_program`;
CREATE TABLE `ref_program`  (
  `id_bidang` int(11) NOT NULL,
  `id_program` int(11) NOT NULL AUTO_INCREMENT,
  `kd_program` int(11) NOT NULL,
  `uraian_program` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_program`) USING BTREE,
  UNIQUE INDEX `idx_ref_program`(`id_bidang`, `kd_program`) USING BTREE,
  CONSTRAINT `fk_ref_program` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 484 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_program_nasional
-- ----------------------------
DROP TABLE IF EXISTS `ref_program_nasional`;
CREATE TABLE `ref_program_nasional`  (
  `id_prioritas` int(11) NOT NULL,
  `id_program_nasional` int(11) NOT NULL,
  `uraian_program_nasional` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_program_nasional`) USING BTREE,
  INDEX `id_prioritas`(`id_prioritas`) USING BTREE,
  CONSTRAINT `ref_program_nasional_ibfk_1` FOREIGN KEY (`id_prioritas`) REFERENCES `ref_prioritas_nasional` (`id_prioritas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_program_provinsi
-- ----------------------------
DROP TABLE IF EXISTS `ref_program_provinsi`;
CREATE TABLE `ref_program_provinsi`  (
  `id_prioritas` int(11) NOT NULL,
  `id_program_provinsi` int(11) NOT NULL,
  `uraian_program_provinsi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_program_provinsi`) USING BTREE,
  INDEX `id_prioritas`(`id_prioritas`) USING BTREE,
  CONSTRAINT `ref_program_provinsi_ibfk_1` FOREIGN KEY (`id_prioritas`) REFERENCES `ref_prioritas_provinsi` (`id_prioritas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_rek_1
-- ----------------------------
DROP TABLE IF EXISTS `ref_rek_1`;
CREATE TABLE `ref_rek_1`  (
  `kd_rek_1` int(11) NOT NULL,
  `nama_kd_rek_1` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_rek_1`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_rek_2
-- ----------------------------
DROP TABLE IF EXISTS `ref_rek_2`;
CREATE TABLE `ref_rek_2`  (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `nama_kd_rek_2` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_rek_1`, `kd_rek_2`) USING BTREE,
  UNIQUE INDEX `kd_rek_1`(`kd_rek_1`, `kd_rek_2`) USING BTREE,
  CONSTRAINT `fk_ref_rek_2` FOREIGN KEY (`kd_rek_1`) REFERENCES `ref_rek_1` (`kd_rek_1`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_rek_3
-- ----------------------------
DROP TABLE IF EXISTS `ref_rek_3`;
CREATE TABLE `ref_rek_3`  (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `kd_rek_3` int(11) NOT NULL,
  `nama_kd_rek_3` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `saldo_normal` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`) USING BTREE,
  INDEX `kd_rek_1`(`kd_rek_1`, `kd_rek_2`, `kd_rek_3`) USING BTREE,
  CONSTRAINT `fk_ref_rek_3` FOREIGN KEY (`kd_rek_1`, `kd_rek_2`) REFERENCES `ref_rek_2` (`kd_rek_1`, `kd_rek_2`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_rek_4
-- ----------------------------
DROP TABLE IF EXISTS `ref_rek_4`;
CREATE TABLE `ref_rek_4`  (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `kd_rek_3` int(11) NOT NULL,
  `kd_rek_4` int(11) NOT NULL,
  `nama_kd_rek_4` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`) USING BTREE,
  UNIQUE INDEX `kd_rek_1`(`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`) USING BTREE,
  CONSTRAINT `fk_ref_rek_4` FOREIGN KEY (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`) REFERENCES `ref_rek_3` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_rek_5
-- ----------------------------
DROP TABLE IF EXISTS `ref_rek_5`;
CREATE TABLE `ref_rek_5`  (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `kd_rek_3` int(11) NOT NULL,
  `kd_rek_4` int(11) NOT NULL,
  `kd_rek_5` int(11) NOT NULL,
  `nama_kd_rek_5` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `peraturan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_rekening`) USING BTREE,
  UNIQUE INDEX `kd_rek_1`(`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`, `kd_rek_5`) USING BTREE,
  INDEX `id_rekening`(`id_rekening`) USING BTREE,
  CONSTRAINT `ref_rek_5_ibfk_1` FOREIGN KEY (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`) REFERENCES `ref_rek_4` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1581 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_revisi
-- ----------------------------
DROP TABLE IF EXISTS `ref_revisi`;
CREATE TABLE `ref_revisi`  (
  `id_revisi` int(255) NOT NULL,
  `uraian_revisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_revisi`) USING BTREE,
  UNIQUE INDEX `idx_ref_revisi`(`id_revisi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_satuan
-- ----------------------------
DROP TABLE IF EXISTS `ref_satuan`;
CREATE TABLE `ref_satuan`  (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_satuan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `singkatan_satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scope_pemakaian` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT ' 0 rpjmd\r\n              1 renstra\r\n             2 rkpd\r\n              3 renja\r\n              4 ssh\r\n              5 Pemicu Biaya ASB\r\n              6 Turunan Pemicu Biaya ASB\r\n              7 Rincian ASB\r\n              8 program\r\n              9 kegiatan',
  PRIMARY KEY (`id_satuan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_setting
-- ----------------------------
DROP TABLE IF EXISTS `ref_setting`;
CREATE TABLE `ref_setting`  (
  `tahun_rencana` int(11) NOT NULL COMMENT 'tahun_perencanaan',
  `jenis_rw` int(11) NOT NULL DEFAULT 0 COMMENT 'jenis_pembatasan_rw, 0 tidak dibatasi, 1 jml_usulan, 2 jml_pagu',
  `jml_rw` int(11) NOT NULL DEFAULT 0 COMMENT 'batas usulan rw, 0 tidak dibatasi',
  `pagu_rw` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jenis_desa` int(11) NOT NULL DEFAULT 0 COMMENT 'jenis_pembatasan_rw, 0 tidak dibatasi, 1 jml_usulan, 2 jml_pagu',
  `jml_desa` int(11) NOT NULL DEFAULT 0 COMMENT 'batas usulan rw, 0 tidak dibatasi',
  `pagu_desa` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jenis_kecamatan` int(11) NOT NULL DEFAULT 0 COMMENT 'jenis_pembatasan_rw, 0 tidak dibatasi, 1 jml_usulan, 2 jml_pagu',
  `jml_kecamatan` int(11) NOT NULL DEFAULT 0 COMMENT 'batas usulan rw, 0 tidak dibatasi',
  `pagu_kecamatan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `deviasi_pagu` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_setting` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`tahun_rencana`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_sotk_level_1
-- ----------------------------
DROP TABLE IF EXISTS `ref_sotk_level_1`;
CREATE TABLE `ref_sotk_level_1`  (
  `id_sotk_es2` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `nama_eselon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'nama_jabatan_eselon',
  `tingkat_eselon` int(11) NOT NULL COMMENT '1/2/3',
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sotk_es2`) USING BTREE,
  INDEX `id_unit`(`id_unit`) USING BTREE,
  CONSTRAINT `ref_sotk_level_1_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_sotk_level_2
-- ----------------------------
DROP TABLE IF EXISTS `ref_sotk_level_2`;
CREATE TABLE `ref_sotk_level_2`  (
  `id_sotk_es3` int(11) NOT NULL AUTO_INCREMENT,
  `id_sotk_es2` int(11) NOT NULL,
  `nama_eselon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tingkat_eselon` int(11) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sotk_es3`) USING BTREE,
  INDEX `id_sotk_es2`(`id_sotk_es2`) USING BTREE,
  CONSTRAINT `ref_sotk_level_2_ibfk_1` FOREIGN KEY (`id_sotk_es2`) REFERENCES `ref_sotk_level_1` (`id_sotk_es2`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_sotk_level_3
-- ----------------------------
DROP TABLE IF EXISTS `ref_sotk_level_3`;
CREATE TABLE `ref_sotk_level_3`  (
  `id_sotk_es4` int(11) NOT NULL AUTO_INCREMENT,
  `id_sotk_es3` int(11) NOT NULL,
  `nama_eselon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tingkat_eselon` int(11) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sotk_es4`) USING BTREE,
  INDEX `id_sotk_es2`(`id_sotk_es3`) USING BTREE,
  CONSTRAINT `ref_sotk_level_3_ibfk_1` FOREIGN KEY (`id_sotk_es3`) REFERENCES `ref_sotk_level_2` (`id_sotk_es3`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_ssh_golongan
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_golongan`;
CREATE TABLE `ref_ssh_golongan`  (
  `id_golongan_ssh` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_ssh` int(11) NOT NULL DEFAULT 0 COMMENT '0 = BL 1=BTL 2=Pendapatan 3=Pembiayaan ',
  `no_urut` int(11) NOT NULL,
  `uraian_golongan_ssh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_golongan_ssh`) USING BTREE,
  UNIQUE INDEX `idx_ref_ssh_golongan`(`id_golongan_ssh`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_kelompok`;
CREATE TABLE `ref_ssh_kelompok`  (
  `id_kelompok_ssh` int(11) NOT NULL AUTO_INCREMENT,
  `id_golongan_ssh` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `uraian_kelompok_ssh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kelompok_ssh`) USING BTREE,
  INDEX `fk_ssh_kelompok`(`id_golongan_ssh`) USING BTREE,
  CONSTRAINT `fk_ssh_kelompok` FOREIGN KEY (`id_golongan_ssh`) REFERENCES `ref_ssh_golongan` (`id_golongan_ssh`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_perkada
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_perkada`;
CREATE TABLE `ref_ssh_perkada`  (
  `id_perkada` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_perkada` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_perkada` date NOT NULL,
  `tahun_berlaku` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `id_perkada_induk` int(11) NOT NULL DEFAULT 0,
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_perkada`) USING BTREE,
  UNIQUE INDEX `idx_ref_ssh_perkada_2`(`id_perkada`, `id_perkada_induk`, `id_perubahan`) USING BTREE,
  INDEX `idx_ref_ssh_perkada_1`(`id_perkada`, `created_at`, `updated_at`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_perkada_tarif
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_perkada_tarif`;
CREATE TABLE `ref_ssh_perkada_tarif`  (
  `id_tarif_perkada` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_tarif_old` bigint(11) NOT NULL DEFAULT 0,
  `no_urut` bigint(11) NOT NULL,
  `id_tarif_ssh` bigint(11) NOT NULL,
  `id_rekening` int(11) NULL DEFAULT NULL,
  `id_zona_perkada` int(11) NOT NULL,
  `jml_rupiah` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_tarif_perkada`) USING BTREE,
  UNIQUE INDEX `ref_ssh_perkada_tarif_unik`(`id_tarif_ssh`, `id_zona_perkada`) USING BTREE,
  INDEX `fk_ref_tarif_jumlah_1`(`id_zona_perkada`) USING BTREE,
  INDEX `idx_ref_ssh_tarif_jumlah`(`id_tarif_ssh`, `id_zona_perkada`) USING BTREE,
  CONSTRAINT `fk_ref_tarif_jumlah` FOREIGN KEY (`id_tarif_ssh`) REFERENCES `ref_ssh_tarif` (`id_tarif_ssh`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_ref_tarif_jumlah_1` FOREIGN KEY (`id_zona_perkada`) REFERENCES `ref_ssh_perkada_zona` (`id_zona_perkada`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1073 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_perkada_zona
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_perkada_zona`;
CREATE TABLE `ref_ssh_perkada_zona`  (
  `id_zona_perkada` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `id_perkada` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `id_zona` int(11) NOT NULL,
  `nama_zona` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_zona_perkada`) USING BTREE,
  UNIQUE INDEX `idx_ref_ssh_tarif_jumlah`(`id_perkada`, `id_zona`, `id_perubahan`) USING BTREE,
  INDEX `fk_ref_tarif_jumlah_1`(`id_zona_perkada`, `no_urut`, `id_perkada`, `id_zona`) USING BTREE,
  INDEX `ref_ssh_perkada_zona_fk`(`id_zona`) USING BTREE,
  CONSTRAINT `FK_ref_ssh_perkada_zona_ref_ssh_zona` FOREIGN KEY (`id_zona`) REFERENCES `ref_ssh_zona` (`id_zona`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_ref_ssh_perkada_zona_ref_ssh_zona_1` FOREIGN KEY (`id_perkada`) REFERENCES `ref_ssh_perkada` (`id_perkada`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_rekening
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_rekening`;
CREATE TABLE `ref_ssh_rekening`  (
  `id_rekening_ssh` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `uraian_tarif_ssh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_rekening_ssh`) USING BTREE,
  UNIQUE INDEX `fk_ref_ssh_rekening`(`id_tarif_ssh`, `id_rekening`) USING BTREE,
  CONSTRAINT `fk_ref_ssh_rekening` FOREIGN KEY (`id_tarif_ssh`) REFERENCES `ref_ssh_tarif` (`id_tarif_ssh`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_sub_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_sub_kelompok`;
CREATE TABLE `ref_ssh_sub_kelompok`  (
  `id_sub_kelompok_ssh` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelompok_ssh` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `uraian_sub_kelompok_ssh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_sub_kelompok_ssh`) USING BTREE,
  INDEX `fk_ref_ssh_sub_kelompok`(`id_kelompok_ssh`) USING BTREE,
  CONSTRAINT `fk_ref_ssh_sub_kelompok` FOREIGN KEY (`id_kelompok_ssh`) REFERENCES `ref_ssh_kelompok` (`id_kelompok_ssh`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_tarif
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_tarif`;
CREATE TABLE `ref_ssh_tarif`  (
  `id_tarif_ssh` bigint(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `id_sub_kelompok_ssh` int(11) NOT NULL,
  `uraian_tarif_ssh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan_tarif_ssh` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_satuan` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tarif_ssh`) USING BTREE,
  UNIQUE INDEX `id_ref_ssh_tarif_1`(`id_tarif_ssh`, `no_urut`, `id_sub_kelompok_ssh`) USING BTREE,
  INDEX `id_ref_ssh_tarif`(`id_sub_kelompok_ssh`) USING BTREE,
  FULLTEXT INDEX `uraian_tarif_ssh`(`uraian_tarif_ssh`),
  CONSTRAINT `fk_ref_ssh_tarif` FOREIGN KEY (`id_sub_kelompok_ssh`) REFERENCES `ref_ssh_sub_kelompok` (`id_sub_kelompok_ssh`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 154 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_zona
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_zona`;
CREATE TABLE `ref_ssh_zona`  (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan_zona` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `diskripsi_zona` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_ssh_zona_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `ref_ssh_zona_lokasi`;
CREATE TABLE `ref_ssh_zona_lokasi`  (
  `id_zona_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_zona` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_desa` int(11) NULL DEFAULT NULL,
  `diskripsi_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_zona_lokasi`) USING BTREE,
  INDEX `fk_zona_lokasi`(`id_zona`) USING BTREE,
  CONSTRAINT `fk_zona_lokasi` FOREIGN KEY (`id_zona`) REFERENCES `ref_ssh_zona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_status_usul
-- ----------------------------
DROP TABLE IF EXISTS `ref_status_usul`;
CREATE TABLE `ref_status_usul`  (
  `id_status_usul` int(11) NOT NULL,
  `uraian_status_usul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_status_usul`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_sub_unit
-- ----------------------------
DROP TABLE IF EXISTS `ref_sub_unit`;
CREATE TABLE `ref_sub_unit`  (
  `id_sub_unit` int(255) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `kd_sub` int(255) NOT NULL,
  `nm_sub` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sub_unit`) USING BTREE,
  UNIQUE INDEX `idx_ref_sub_unit`(`id_unit`, `kd_sub`) USING BTREE,
  CONSTRAINT `fk_ref_sub_unit` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_sumber_dana
-- ----------------------------
DROP TABLE IF EXISTS `ref_sumber_dana`;
CREATE TABLE `ref_sumber_dana`  (
  `id_sumber_dana` int(11) NOT NULL,
  `uraian_sumber_dana` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_sumber_dana`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_tabel_dasar
-- ----------------------------
DROP TABLE IF EXISTS `ref_tabel_dasar`;
CREATE TABLE `ref_tabel_dasar`  (
  `id_tabel_dasar` int(11) NOT NULL,
  `nama_tabel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tabel_dasar`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_tahun
-- ----------------------------
DROP TABLE IF EXISTS `ref_tahun`;
CREATE TABLE `ref_tahun`  (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemda` int(11) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `tahun_0` int(255) NOT NULL,
  `tahun_1` int(255) NOT NULL,
  `tahun_2` int(255) NOT NULL,
  `tahun_3` int(255) NOT NULL,
  `tahun_4` int(255) NOT NULL,
  `tahun_5` int(255) NOT NULL,
  PRIMARY KEY (`id_tahun`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_unit
-- ----------------------------
DROP TABLE IF EXISTS `ref_unit`;
CREATE TABLE `ref_unit`  (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `kd_unit` int(255) NOT NULL,
  `nm_unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_unit`) USING BTREE,
  UNIQUE INDEX `idx_ref_unit`(`id_bidang`, `kd_unit`) USING BTREE,
  CONSTRAINT `fk_ref_unit` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_urusan
-- ----------------------------
DROP TABLE IF EXISTS `ref_urusan`;
CREATE TABLE `ref_urusan`  (
  `kd_urusan` int(255) NOT NULL,
  `nm_urusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kd_urusan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ref_user_role
-- ----------------------------
DROP TABLE IF EXISTS `ref_user_role`;
CREATE TABLE `ref_user_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_peran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tambah` int(11) NOT NULL DEFAULT 0,
  `edit` int(11) NOT NULL DEFAULT 0,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `lihat` int(11) NOT NULL DEFAULT 0,
  `reviu` int(11) NOT NULL DEFAULT 0,
  `posting` int(11) NOT NULL DEFAULT 0,
  `status_role` int(11) NOT NULL DEFAULT 0 COMMENT '0 aktif 1 non aktif',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trx_asb_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_aktivitas`;
CREATE TABLE `trx_asb_aktivitas`  (
  `id_aktivitas_asb` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_asb_sub_sub_kelompok` int(11) NOT NULL,
  `nm_aktivitas_asb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_aktivitas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'tidak ditampilkan',
  `diskripsi_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NULL DEFAULT NULL COMMENT 'cost driver',
  `sat_derivatif_1` int(11) NULL DEFAULT NULL,
  `volume_2` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NULL DEFAULT NULL COMMENT 'cost driver',
  `sat_derivatif_2` int(11) NULL DEFAULT NULL,
  `range_max` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `kapasitas_max` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `range_max1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `kapasitas_max1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `temp_id` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_aktivitas_asb`) USING BTREE,
  INDEX `fk_trx_aktivitas_asb`(`id_asb_sub_sub_kelompok`) USING BTREE,
  CONSTRAINT `FK_trx_asb_aktivitas_trx_asb_sub_sub_kelompok` FOREIGN KEY (`id_asb_sub_sub_kelompok`) REFERENCES `trx_asb_sub_sub_kelompok` (`id_asb_sub_sub_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_kelompok`;
CREATE TABLE `trx_asb_kelompok`  (
  `id_asb_kelompok` int(11) NOT NULL AUTO_INCREMENT,
  `id_asb_perkada` int(11) NOT NULL,
  `uraian_kelompok_asb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `temp_id` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_asb_kelompok`) USING BTREE,
  INDEX `FK_trx_asb_cluster_trx_asb_perkada`(`id_asb_perkada`) USING BTREE,
  CONSTRAINT `FK_trx_asb_cluster_trx_asb_perkada` FOREIGN KEY (`id_asb_perkada`) REFERENCES `trx_asb_perkada` (`id_asb_perkada`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_komponen
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_komponen`;
CREATE TABLE `trx_asb_komponen`  (
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_komponen_asb` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_komponen_asb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `temp_id` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_komponen_asb`) USING BTREE,
  INDEX `FK_trx_asb_komponen_trx_asb_aktivitas`(`id_aktivitas_asb`) USING BTREE,
  CONSTRAINT `FK_trx_asb_komponen_trx_asb_aktivitas` FOREIGN KEY (`id_aktivitas_asb`) REFERENCES `trx_asb_aktivitas` (`id_aktivitas_asb`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_komponen_rinci
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_komponen_rinci`;
CREATE TABLE `trx_asb_komponen_rinci`  (
  `id_komponen_asb_rinci` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_komponen_asb` bigint(20) NOT NULL,
  `jenis_biaya` int(11) NOT NULL DEFAULT 1 COMMENT '1 fix 2 dependent variabel 3 independen variable',
  `id_tarif_ssh` bigint(11) NOT NULL,
  `koefisien1` decimal(20, 4) NOT NULL DEFAULT 0.0000,
  `id_satuan1` int(11) NULL DEFAULT NULL,
  `sat_derivatif1` int(11) NULL DEFAULT NULL,
  `koefisien2` decimal(20, 4) NOT NULL DEFAULT 0.0000,
  `id_satuan2` int(11) NULL DEFAULT NULL,
  `sat_derivatif2` int(11) NULL DEFAULT NULL,
  `koefisien3` decimal(20, 4) NOT NULL DEFAULT 0.0000,
  `id_satuan3` int(11) NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket_group` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'untuk menyimpan data grouping di rincian yang sifatnya opsional',
  `hub_driver` int(11) NULL DEFAULT 0 COMMENT '1 driver1 2 driver2 3 driver12 0 N/A',
  PRIMARY KEY (`id_komponen_asb_rinci`) USING BTREE,
  INDEX `fk_ref_komponen_asb_rinc`(`id_tarif_ssh`) USING BTREE,
  INDEX `idx_ref_komponen_asb_rinci`(`id_komponen_asb`) USING BTREE,
  INDEX `FK_trx_asb_komponen_rinci_ref_satuan`(`id_satuan1`) USING BTREE,
  INDEX `FK_trx_asb_komponen_rinci_ref_satuan_2`(`id_satuan2`) USING BTREE,
  INDEX `FK_trx_asb_komponen_rinci_ref_satuan_3`(`id_satuan3`) USING BTREE,
  FULLTEXT INDEX `ket_group`(`ket_group`),
  CONSTRAINT `FK_trx_asb_komponen_rinci_ref_ssh_tarif` FOREIGN KEY (`id_tarif_ssh`) REFERENCES `ref_ssh_tarif` (`id_tarif_ssh`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_trx_asb_komponen_rinci_trx_asb_komponen` FOREIGN KEY (`id_komponen_asb`) REFERENCES `trx_asb_komponen` (`id_komponen_asb`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 227 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_perhitungan
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_perhitungan`;
CREATE TABLE `trx_asb_perhitungan`  (
  `tahun_perhitungan` int(11) NOT NULL,
  `id_perhitungan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_perkada` int(11) NOT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT 0 COMMENT '0 aktif 1 non aktif',
  PRIMARY KEY (`id_perhitungan`) USING BTREE,
  UNIQUE INDEX `idx_trx_perhitungan_asb`(`tahun_perhitungan`, `id_perkada`, `flag_aktif`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_perhitungan_rinci
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_perhitungan_rinci`;
CREATE TABLE `trx_asb_perhitungan_rinci`  (
  `id_perhitungan_rinci` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_perhitungan` bigint(20) NOT NULL,
  `id_asb_kelompok` bigint(20) NOT NULL,
  `id_asb_sub_kelompok` bigint(20) NOT NULL,
  `id_asb_sub_sub_kelompok` bigint(20) NOT NULL,
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_komponen_asb` bigint(20) NOT NULL,
  `id_komponen_asb_rinci` bigint(20) NOT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_pagu` decimal(20, 2) NULL DEFAULT 0.00,
  `kfix` decimal(20, 4) NULL DEFAULT 0.0000,
  `kmax` decimal(20, 4) NULL DEFAULT 0.0000,
  `kdv1` decimal(20, 4) NULL DEFAULT 0.0000,
  `kr1` decimal(20, 4) NULL DEFAULT 0.0000,
  `kdv2` decimal(20, 4) NULL DEFAULT 0.0000,
  `kr2` decimal(20, 4) NULL DEFAULT 0.0000,
  `kiv1` decimal(20, 4) NULL DEFAULT 0.0000,
  `kiv2` decimal(20, 4) NULL DEFAULT 0.0000,
  `kiv3` decimal(20, 4) NULL DEFAULT 0.0000,
  PRIMARY KEY (`id_perhitungan_rinci`) USING BTREE,
  UNIQUE INDEX `id_trx_perhitungan_aktivitas`(`id_perhitungan`, `id_asb_kelompok`, `id_asb_sub_kelompok`, `id_aktivitas_asb`, `id_komponen_asb`, `id_komponen_asb_rinci`, `id_zona`) USING BTREE,
  CONSTRAINT `trx_asb_perhitungan_rinci_ibfk_1` FOREIGN KEY (`id_perhitungan`) REFERENCES `trx_asb_perhitungan` (`id_perhitungan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 227 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_perkada
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_perkada`;
CREATE TABLE `trx_asb_perkada`  (
  `id_asb_perkada` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_perkada` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_perkada` date NOT NULL,
  `tahun_berlaku` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_asb_perkada`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_sub_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_sub_kelompok`;
CREATE TABLE `trx_asb_sub_kelompok`  (
  `id_asb_sub_kelompok` int(11) NOT NULL AUTO_INCREMENT,
  `id_asb_kelompok` int(11) NOT NULL,
  `uraian_sub_kelompok_asb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `temp_id` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_asb_sub_kelompok`) USING BTREE,
  INDEX `FK_trx_asb_cluster_trx_asb_perkada`(`id_asb_kelompok`) USING BTREE,
  CONSTRAINT `trx_asb_sub_kelompok_ibfk_1` FOREIGN KEY (`id_asb_kelompok`) REFERENCES `trx_asb_kelompok` (`id_asb_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_asb_sub_sub_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `trx_asb_sub_sub_kelompok`;
CREATE TABLE `trx_asb_sub_sub_kelompok`  (
  `id_asb_sub_sub_kelompok` int(11) NOT NULL AUTO_INCREMENT,
  `id_asb_sub_kelompok` int(11) NOT NULL,
  `uraian_sub_sub_kelompok_asb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `temp_id` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_asb_sub_sub_kelompok`) USING BTREE,
  INDEX `FK_trx_asb_cluster_trx_asb_perkada`(`id_asb_sub_kelompok`) USING BTREE,
  CONSTRAINT `FK_trx_asb_sub_sub_kelompok_trx_asb_sub_kelompok` FOREIGN KEY (`id_asb_sub_kelompok`) REFERENCES `trx_asb_sub_kelompok` (`id_asb_sub_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd`;
CREATE TABLE `trx_forum_skpd`  (
  `id_forum_skpd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_forum_program` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NULL DEFAULT 0,
  `id_rkpd_renstra` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_kegiatan_renstra` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_forum_skpd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_id_kegiatan_ref`(`id_unit`, `id_kegiatan_ref`, `id_forum_program`) USING BTREE,
  INDEX `FK_trx_forum_skpd_trx_forum_skpd_program`(`id_forum_program`) USING BTREE,
  CONSTRAINT `FK_trx_forum_skpd_trx_forum_skpd_program` FOREIGN KEY (`id_forum_program`) REFERENCES `trx_forum_skpd_program` (`id_forum_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_aktivitas`;
CREATE TABLE `trx_forum_skpd_aktivitas`  (
  `id_aktivitas_forum` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_forum_skpd` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT 0,
  `id_aktivitas_renja` int(11) NULL DEFAULT 0,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_aktivitas_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_aktivitas_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_aktivitas_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_forum`) USING BTREE,
  INDEX `FK_trx_forum_skpd_aktivitas_trx_forum_skpd`(`id_forum_skpd`) USING BTREE,
  CONSTRAINT `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` FOREIGN KEY (`id_forum_skpd`) REFERENCES `trx_forum_skpd_pelaksana` (`id_pelaksana_forum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_belanja
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_belanja`;
CREATE TABLE `trx_forum_skpd_belanja`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_forum` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi_forum` bigint(20) NOT NULL,
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT 0,
  `sumber_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT 1,
  `harga_satuan_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL,
  PRIMARY KEY (`id_belanja_forum`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_skpd_belanja`(`tahun_forum`, `no_urut`, `id_belanja_forum`, `id_lokasi_forum`) USING BTREE,
  INDEX `fk_trx_forum_skpd_belanja`(`id_lokasi_forum`) USING BTREE,
  CONSTRAINT `trx_forum_skpd_belanja_ibfk_1` FOREIGN KEY (`id_lokasi_forum`) REFERENCES `trx_forum_skpd_aktivitas` (`id_aktivitas_forum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_dokumen`;
CREATE TABLE `trx_forum_skpd_dokumen`  (
  `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  UNIQUE INDEX `id_unit_renja`(`id_unit_renja`, `tahun_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_kebijakan`;
CREATE TABLE `trx_forum_skpd_kebijakan`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renja` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_renja`, `id_unit`, `uraian_kebijakan`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_kegiatan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_kegiatan_indikator`;
CREATE TABLE `trx_forum_skpd_kegiatan_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_forum_skpd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_forum_skpd`) USING BTREE,
  CONSTRAINT `trx_forum_skpd_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_forum_skpd`) REFERENCES `trx_forum_skpd` (`id_forum_skpd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_lokasi`;
CREATE TABLE `trx_forum_skpd_lokasi`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_forum` bigint(20) NOT NULL,
  `id_lokasi_forum` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NULL DEFAULT 0,
  `id_lokasi_teknis` int(11) NULL DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_desa` int(11) NULL DEFAULT 0,
  `id_kecamatan` int(11) NULL DEFAULT 0,
  `rt` int(11) NULL DEFAULT 0,
  `rw` int(11) NULL DEFAULT 0,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir',
  PRIMARY KEY (`id_lokasi_forum`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_lokasi`(`id_pelaksana_forum`, `tahun_forum`, `no_urut`, `id_lokasi_forum`) USING BTREE,
  CONSTRAINT `trx_forum_skpd_lokasi_ibfk_1` FOREIGN KEY (`id_pelaksana_forum`) REFERENCES `trx_forum_skpd_aktivitas` (`id_aktivitas_forum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_pelaksana`;
CREATE TABLE `trx_forum_skpd_pelaksana`  (
  `id_pelaksana_forum` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_forum` bigint(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NULL DEFAULT 0,
  `id_lokasi` int(11) NULL DEFAULT 0 COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final',
  PRIMARY KEY (`id_pelaksana_forum`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_pelaksana`(`id_aktivitas_forum`, `tahun_forum`, `no_urut`, `id_pelaksana_forum`, `id_sub_unit`) USING BTREE,
  CONSTRAINT `trx_forum_skpd_pelaksana_ibfk_1` FOREIGN KEY (`id_aktivitas_forum`) REFERENCES `trx_forum_skpd` (`id_forum_skpd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_program`;
CREATE TABLE `trx_forum_skpd_program`  (
  `id_forum_program` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_forum_rkpdprog` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_renja_program` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_forum_program`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_program_id_program_ref`(`id_unit`, `id_renja_program`, `id_program_ref`) USING BTREE,
  INDEX `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal`(`id_forum_rkpdprog`) USING BTREE,
  CONSTRAINT `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` FOREIGN KEY (`id_forum_rkpdprog`) REFERENCES `trx_forum_skpd_program_ranwal` (`id_forum_rkpdprog`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_program_indikator`;
CREATE TABLE `trx_forum_skpd_program_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_forum_program`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_forum_program`) USING BTREE,
  CONSTRAINT `trx_forum_skpd_program_indikator_ibfk_1` FOREIGN KEY (`id_forum_program`) REFERENCES `trx_forum_skpd_program` (`id_forum_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_program_ranwal
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_program_ranwal`;
CREATE TABLE `trx_forum_skpd_program_ranwal`  (
  `id_forum_rkpdprog` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pdt 2 BTL',
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL DEFAULT 0,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_ranwal` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  PRIMARY KEY (`id_forum_rkpdprog`) USING BTREE,
  UNIQUE INDEX `id_rkpd_ranwal_id_bidang_id_unit`(`id_rkpd_ranwal`, `id_bidang`, `id_unit`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_forum_skpd_usulan
-- ----------------------------
DROP TABLE IF EXISTS `trx_forum_skpd_usulan`;
CREATE TABLE `trx_forum_skpd_usulan`  (
  `id_sumber_usulan` bigint(20) NOT NULL AUTO_INCREMENT,
  `sumber_usulan` int(11) NULL DEFAULT 0 COMMENT '0 renja 1 musrendes 2 musrencam 3 pokir 4 forum_skpd',
  `id_lokasi_forum` bigint(20) NOT NULL,
  `id_ref_usulan` int(11) NULL DEFAULT NULL,
  `volume_1_usulan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2_usulan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 tanpa 1 dengan 2 digabung 3 ditolak',
  `uraian_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sumber_usulan`) USING BTREE,
  INDEX `id_trx_forum_skpd_usulan`(`id_ref_usulan`, `id_sumber_usulan`, `id_lokasi_forum`) USING BTREE,
  INDEX `FK_trx_forum_skpd_usulan_trx_forum_skpd_lokasi`(`id_lokasi_forum`) USING BTREE,
  CONSTRAINT `FK_trx_forum_skpd_usulan_trx_forum_skpd_lokasi` FOREIGN KEY (`id_lokasi_forum`) REFERENCES `trx_forum_skpd_lokasi` (`id_lokasi_forum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_group_menu
-- ----------------------------
DROP TABLE IF EXISTS `trx_group_menu`;
CREATE TABLE `trx_group_menu`  (
  `menu` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  UNIQUE INDEX `menu`(`menu`, `group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_isian_data_dasar
-- ----------------------------
DROP TABLE IF EXISTS `trx_isian_data_dasar`;
CREATE TABLE `trx_isian_data_dasar`  (
  `id_isian_tabel_dasar` int(11) NOT NULL AUTO_INCREMENT,
  `id_kolom_tabel_dasar` int(11) NULL DEFAULT NULL,
  `id_kecamatan` int(11) NULL DEFAULT NULL,
  `nmin1` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin2` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin3` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin4` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin5` decimal(20, 2) NULL DEFAULT 0.00,
  `tahun` int(4) NULL DEFAULT NULL,
  `nmin1_persen` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin2_persen` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin3_persen` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin4_persen` decimal(20, 2) NULL DEFAULT 0.00,
  `nmin5_persen` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_isian_tabel_dasar`) USING BTREE,
  INDEX `id_kolom_tabel_dasar`(`id_kolom_tabel_dasar`) USING BTREE,
  INDEX `id_kecamatan`(`id_kecamatan`) USING BTREE,
  CONSTRAINT `trx_isian_data_dasar_ibfk_1` FOREIGN KEY (`id_kolom_tabel_dasar`) REFERENCES `ref_kolom_tabel_dasar` (`id_kolom_tabel_dasar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_isian_data_dasar_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `ref_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trx_log_events
-- ----------------------------
DROP TABLE IF EXISTS `trx_log_events`;
CREATE TABLE `trx_log_events`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_events` int(11) NOT NULL DEFAULT 0,
  `discription` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operate` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trx_musrencam
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrencam`;
CREATE TABLE `trx_musrencam`  (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrencam` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_asb_aktivitas` int(11) NOT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_kondisi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `target_output_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan` int(11) NULL DEFAULT NULL,
  `id_satuan_desa` int(11) NULL DEFAULT NULL,
  `volume` decimal(20, 2) NULL DEFAULT 0.00,
  `volume_desa` decimal(20, 2) NULL DEFAULT 0.00,
  `harga_satuan` decimal(20, 2) NULL DEFAULT 0.00,
  `harga_satuan_desa` decimal(20, 2) NULL DEFAULT 0.00,
  `jml_pagu` decimal(20, 2) NULL DEFAULT 0.00,
  `jml_pagu_desa` decimal(20, 2) NULL DEFAULT 0.00,
  `id_usulan_desa` bigint(255) NULL DEFAULT NULL,
  `pagu_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_usulan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ranwal/Renja 1 = Desa 2 = Musrencam',
  `status_usulan` int(11) NOT NULL COMMENT '0 = Proses Usulan 1 = Kirim_Forum',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0= Diterima\r\n1= Diterima dengan perubahan\r\n2= Digabungkan dengan usulan lain\r\n3= Ditolak',
  PRIMARY KEY (`id_musrencam`) USING BTREE,
  UNIQUE INDEX `idx_trx_musrendes`(`id_renja`, `tahun_musren`, `no_urut`, `id_musrencam`, `id_kecamatan`, `id_usulan_desa`) USING BTREE,
  CONSTRAINT `trx_musrencam_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrencam_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrencam_lokasi`;
CREATE TABLE `trx_musrencam_lokasi`  (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrencam` int(11) NOT NULL,
  `id_lokasi_musrencam` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL COMMENT 'difilter hanya id lokasi yang jenis lokasinya kewilayahan',
  `id_desa` int(11) NULL DEFAULT NULL,
  `rt` int(11) NULL DEFAULT NULL,
  `rw` int(11) NULL DEFAULT NULL,
  `uraian_kondisi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_foto` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_musrendes` int(11) NULL DEFAULT NULL,
  `id_lokasi_musrendes` int(255) NULL DEFAULT NULL,
  `sumber_data` int(11) NULL DEFAULT NULL COMMENT '0 = desa 1 = kecamatan',
  `volume_desa` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume` decimal(20, 2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_lokasi_musrencam`) USING BTREE,
  UNIQUE INDEX `idx_trx_musrendes_lokasi`(`id_musrencam`, `tahun_musren`, `no_urut`, `id_lokasi_musrencam`, `id_desa`, `rt`, `rw`) USING BTREE,
  CONSTRAINT `trx_musrencam_lokasi_ibfk_1` FOREIGN KEY (`id_musrencam`) REFERENCES `trx_musrencam` (`id_musrencam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrendes
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrendes`;
CREATE TABLE `trx_musrendes`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrendes` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_asb_aktivitas` int(11) NOT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_kondisi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `target_output_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan` int(11) NULL DEFAULT NULL,
  `id_satuan_rw` int(11) NULL DEFAULT NULL,
  `volume` decimal(20, 2) NULL DEFAULT 0.00,
  `volume_rw` decimal(20, 2) NULL DEFAULT 0.00,
  `harga_satuan` decimal(20, 2) NULL DEFAULT 0.00,
  `harga_satuan_rw` decimal(20, 2) NULL DEFAULT 0.00,
  `jml_pagu` decimal(20, 2) NULL DEFAULT 0.00,
  `jml_pagu_rw` decimal(20, 2) NULL DEFAULT 0.00,
  `id_usulan_rw` bigint(255) NULL DEFAULT NULL,
  `pagu_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_usulan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Ranwal/Renja 1 = RW 2 = Musrendes',
  `status_usulan` int(11) NOT NULL COMMENT '0 = Proses Usulan 1 = Kirim_Musrencam',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0= Diterima\r\n1= Diterima dengan perubahan\r\n2= Digabungkan dengan usulan lain\r\n3= Ditolak',
  PRIMARY KEY (`id_musrendes`) USING BTREE,
  UNIQUE INDEX `idx_trx_musrendes`(`id_renja`, `tahun_renja`, `no_urut`, `id_musrendes`, `id_desa`, `id_usulan_rw`) USING BTREE,
  CONSTRAINT `fk_trx_musrendes` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrendes_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrendes_lokasi`;
CREATE TABLE `trx_musrendes_lokasi`  (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrendes` int(11) NOT NULL,
  `id_lokasi_musrendes` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL COMMENT 'difilter hanya id lokasi yang jenis lokasinya kewilayahan',
  `id_desa` int(11) NULL DEFAULT NULL,
  `rt` int(11) NULL DEFAULT NULL,
  `rw` int(11) NULL DEFAULT NULL,
  `uraian_kondisi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_foto` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NULL DEFAULT NULL COMMENT '0 = RW 1 = Desa',
  `volume_rw` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_desa` decimal(20, 2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_lokasi_musrendes`) USING BTREE,
  UNIQUE INDEX `idx_trx_musrendes_lokasi`(`id_musrendes`, `tahun_musren`, `no_urut`, `id_lokasi_musrendes`, `id_desa`, `rt`, `rw`) USING BTREE,
  CONSTRAINT `fk_trx_musrendes_lokasi` FOREIGN KEY (`id_musrendes`) REFERENCES `trx_musrendes` (`id_musrendes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrendes_rw
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrendes_rw`;
CREATE TABLE `trx_musrendes_rw`  (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrendes_rw` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_asb_aktivitas` int(11) NOT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_kondisi` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_satuan` int(11) NOT NULL DEFAULT 0,
  `volume` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_pagu` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_usulan` int(11) NOT NULL COMMENT '0 = Proses Usulan 1 = Kirim_Musrencam',
  `rt` int(11) NULL DEFAULT NULL,
  `rw` int(11) NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_musrendes_rw`) USING BTREE,
  UNIQUE INDEX `tahun_musren`(`tahun_musren`, `no_urut`, `id_renja`, `id_desa`, `id_kegiatan`, `id_asb_aktivitas`, `rt`, `rw`) USING BTREE,
  INDEX `id_renja`(`id_renja`) USING BTREE,
  CONSTRAINT `trx_musrendes_rw_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrendes_rw_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrendes_rw_lokasi`;
CREATE TABLE `trx_musrendes_rw_lokasi`  (
  `no_urut` int(11) NOT NULL,
  `id_musrendes_rw` int(11) NOT NULL,
  `id_musrendes_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `file_foto` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_kondisi` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `lang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0.00',
  `status_usulan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Proses Usulan 1 = Kirim_Musrencam',
  PRIMARY KEY (`id_musrendes_lokasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab`;
CREATE TABLE `trx_musrenkab`  (
  `id_musrenkab` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_rkpd_rancangan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) NULL DEFAULT NULL,
  `thn_id_rpjmd` int(11) NULL DEFAULT NULL,
  `id_visi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_misi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NULL DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NULL DEFAULT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_ranwal` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Keterangan / alasan status usulan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_musrenkab`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal`(`tahun_rkpd`, `thn_id_rpjmd`, `id_visi_rpjmd`, `id_misi_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_program_rpjmd`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_aktivitas_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_aktivitas_pd`;
CREATE TABLE `trx_musrenkab_aktivitas_pd`  (
  `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT 0,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT 0,
  `id_aktivitas_renja` int(11) NULL DEFAULT 0,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_aktivitas_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_aktivitas_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_aktivitas_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_aktivitas_trx_forum_skpd`(`id_pelaksana_pd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_musrenkab_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_belanja_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_belanja_pd`;
CREATE TABLE `trx_musrenkab_belanja_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT 0,
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT 0,
  `sumber_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT 1,
  `harga_satuan_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL,
  PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_skpd_belanja`(`tahun_forum`, `no_urut`, `id_belanja_pd`, `id_aktivitas_pd`) USING BTREE,
  INDEX `fk_trx_forum_skpd_belanja`(`id_aktivitas_pd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_musrenkab_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_dokumen`;
CREATE TABLE `trx_musrenkab_dokumen`  (
  `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_rkpd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_unit_perencana` int(11) NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE,
  UNIQUE INDEX `tahun_ranwal`(`tahun_rkpd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_indikator`;
CREATE TABLE `trx_musrenkab_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 data rpjmd 1 data baru',
  PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_indikator`(`tahun_rkpd`, `id_musrenkab`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_indikator`(`id_musrenkab`) USING BTREE,
  CONSTRAINT `trx_musrenkab_indikator_ibfk_1` FOREIGN KEY (`id_musrenkab`) REFERENCES `trx_musrenkab` (`id_musrenkab`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_kebijakan`;
CREATE TABLE `trx_musrenkab_kebijakan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal_kebijakan`(`tahun_rkpd`, `id_musrenkab`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_kebijakan`(`id_musrenkab`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_kebijakan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_kebijakan_pd`;
CREATE TABLE `trx_musrenkab_kebijakan_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_renja`, `id_unit`, `uraian_kebijakan`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_keg_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_keg_indikator_pd`;
CREATE TABLE `trx_musrenkab_keg_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_kegiatan_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_kegiatan_pd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_musrenkab_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_kegiatan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_kegiatan_pd`;
CREATE TABLE `trx_musrenkab_kegiatan_pd`  (
  `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) NULL DEFAULT NULL,
  `id_renja` int(11) NULL DEFAULT 0,
  `id_rkpd_renstra` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_kegiatan_renstra` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_id_kegiatan_ref`(`id_unit`, `id_kegiatan_ref`, `id_program_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_trx_forum_skpd_program`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_kegiatan_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_musrenkab_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_lokasi_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_lokasi_pd`;
CREATE TABLE `trx_musrenkab_lokasi_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT 0 COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NULL DEFAULT 0,
  `id_lokasi_teknis` int(11) NULL DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_desa` int(11) NULL DEFAULT 0,
  `id_kecamatan` int(11) NULL DEFAULT 0,
  `rt` int(11) NULL DEFAULT 0,
  `rw` int(11) NULL DEFAULT 0,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir',
  PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_lokasi`(`id_aktivitas_pd`, `tahun_forum`, `no_urut`, `id_lokasi_pd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_musrenkab_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_pelaksana`;
CREATE TABLE `trx_musrenkab_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_musrenkab` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `hak_akses` int(11) NOT NULL DEFAULT 0 COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'menjelaskan status pelaksanaan',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_musrenkab`, `id_unit`, `id_urusan_rkpd`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_musrenkab`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_urusan_rkpd`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_2`(`id_unit`) USING BTREE,
  CONSTRAINT `trx_musrenkab_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_musrenkab_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_musrenkab_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_pelaksana_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_pelaksana_pd`;
CREATE TABLE `trx_musrenkab_pelaksana_pd`  (
  `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) NULL DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NULL DEFAULT 0,
  `id_lokasi` int(11) NULL DEFAULT 0 COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final',
  PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_pelaksana`(`id_kegiatan_pd`, `tahun_forum`, `no_urut`, `id_pelaksana_pd`, `id_sub_unit`) USING BTREE,
  CONSTRAINT `trx_musrenkab_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_musrenkab_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_prog_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_prog_indikator_pd`;
CREATE TABLE `trx_musrenkab_prog_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_program_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_musrenkab_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_program_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_program_pd`;
CREATE TABLE `trx_musrenkab_program_pd`  (
  `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_pelaksana_rkpd` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NULL DEFAULT NULL,
  `id_renja_program` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_program_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_program_id_program_ref`(`id_unit`, `id_pelaksana_rkpd`, `id_program_ref`) USING BTREE,
  INDEX `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal`(`id_pelaksana_rkpd`) USING BTREE,
  CONSTRAINT `trx_musrenkab_program_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_rkpd`) REFERENCES `trx_musrenkab_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_musrenkab_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_musrenkab_urusan`;
CREATE TABLE `trx_musrenkab_urusan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_musrenkab`, `id_bidang`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_musrenkab`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_bidang`) USING BTREE,
  CONSTRAINT `trx_musrenkab_urusan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `trx_musrenkab_urusan_ibfk_2` FOREIGN KEY (`id_musrenkab`) REFERENCES `trx_musrenkab` (`id_musrenkab`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_pokir
-- ----------------------------
DROP TABLE IF EXISTS `trx_pokir`;
CREATE TABLE `trx_pokir`  (
  `id_tahun` int(11) NOT NULL,
  `id_pokir` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pengusul` date NOT NULL,
  `asal_pengusul` int(11) NOT NULL DEFAULT 0 COMMENT '0 Fraksi\r\n1 Pempinan\r\n2 Badan Musyawarah\r\n3 Komisi\r\n4 Badan Legislasi Daerah\r\n5 Badan Anggaran\r\n6 Badan Kehormatan\r\n9 Badan Lainnya',
  `jabatan_pengusul` int(11) NOT NULL DEFAULT 4 COMMENT '0 ketua 1 wakil ketua 2 sekretaris 3 bendahara 4 anggota',
  `nama_pengusul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_anggota` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `daerah_pemilihan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `media_pokir` int(11) NULL DEFAULT 0 COMMENT '1 surat 2 email 3 telepon 4 lisan 9 lainnya',
  `bukti_dokumen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `entried_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pokir`) USING BTREE,
  UNIQUE INDEX `id_tahun`(`id_tahun`, `tanggal_pengusul`, `asal_pengusul`, `jabatan_pengusul`, `nomor_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_pokir_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_pokir_lokasi`;
CREATE TABLE `trx_pokir_lokasi`  (
  `id_pokir_usulan` int(11) NOT NULL,
  `id_pokir_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(11) NOT NULL,
  `id_desa` int(11) NULL DEFAULT NULL,
  `rw` int(11) NULL DEFAULT NULL,
  `rt` int(11) NULL DEFAULT NULL,
  `diskripsi_lokasi` blob NULL,
  PRIMARY KEY (`id_pokir_lokasi`) USING BTREE,
  UNIQUE INDEX `id_pokir_usulan`(`id_pokir_usulan`, `id_kecamatan`, `id_desa`, `rw`, `rt`) USING BTREE,
  CONSTRAINT `trx_pokir_lokasi_ibfk_1` FOREIGN KEY (`id_pokir_usulan`) REFERENCES `trx_pokir_usulan` (`id_pokir_usulan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_pokir_tl
-- ----------------------------
DROP TABLE IF EXISTS `trx_pokir_tl`;
CREATE TABLE `trx_pokir_tl`  (
  `id_pokir_tl` int(11) NOT NULL AUTO_INCREMENT,
  `id_pokir` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `id_pokir_lokasi` int(11) NOT NULL,
  `unit_tl` int(11) NULL DEFAULT NULL,
  `status_tl` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum TL, 1 = Disposisi Ke Unit, 2 = Dipending, 3 = Perlu Dibahas kembali  4 = tidak diakomodir',
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pokir_tl`) USING BTREE,
  UNIQUE INDEX `id_pokir_usulan`(`id_pokir`, `id_pokir_usulan`, `id_pokir_lokasi`) USING BTREE,
  INDEX `trx_pokir_tl_ibfk_1`(`id_pokir_usulan`) USING BTREE,
  CONSTRAINT `trx_pokir_tl_ibfk_1` FOREIGN KEY (`id_pokir_usulan`) REFERENCES `trx_pokir_usulan` (`id_pokir_usulan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_pokir_tl_unit
-- ----------------------------
DROP TABLE IF EXISTS `trx_pokir_tl_unit`;
CREATE TABLE `trx_pokir_tl_unit`  (
  `id_pokir_unit` int(11) NOT NULL AUTO_INCREMENT,
  `unit_tl` int(11) NULL DEFAULT NULL,
  `id_pokir_tl` int(11) NOT NULL,
  `id_pokir` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `id_pokir_lokasi` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL DEFAULT 0,
  `id_lokasi_renja` int(11) NOT NULL DEFAULT 0,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT 0,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT 0,
  `volume_tl` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tl` decimal(20, 2) NULL DEFAULT 0.00,
  `status_tl` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum TL, 1 = Diakomodir Renja, 2 = Diakomodir Forum, 3 = Tidak diakomodir',
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pokir_unit`) USING BTREE,
  UNIQUE INDEX `id_pokir_usulan`(`id_pokir`, `id_pokir_usulan`, `id_pokir_lokasi`) USING BTREE,
  INDEX `trx_pokir_tl_ibfk_1`(`id_pokir_usulan`) USING BTREE,
  INDEX `trx_pokir_tl_unit_ibfk_1`(`id_pokir_tl`) USING BTREE,
  CONSTRAINT `trx_pokir_tl_unit_ibfk_1` FOREIGN KEY (`id_pokir_tl`) REFERENCES `trx_pokir_tl` (`id_pokir_tl`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_pokir_usulan
-- ----------------------------
DROP TABLE IF EXISTS `trx_pokir_usulan`;
CREATE TABLE `trx_pokir_usulan`  (
  `id_pokir` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL DEFAULT 1,
  `id_judul_usulan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diskripsi_usulan` blob NULL,
  `id_unit` int(11) NULL DEFAULT NULL,
  `volume` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan` int(11) NULL DEFAULT NULL,
  `jml_anggaran` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `entried_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pokir_usulan`) USING BTREE,
  UNIQUE INDEX `id_pokir`(`id_pokir`, `no_urut`) USING BTREE,
  INDEX `id_unit`(`id_unit`) USING BTREE,
  CONSTRAINT `trx_pokir_usulan_ibfk_1` FOREIGN KEY (`id_pokir`) REFERENCES `trx_pokir` (`id_pokir`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_pokir_usulan_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_aktivitas`;
CREATE TABLE `trx_renja_aktivitas`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT NULL,
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `target_output_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rata2` decimal(20, 2) NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(255) NULL DEFAULT NULL,
  `id_satuan_2` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja_pelaksana`(`id_renja`, `tahun_renja`, `no_urut`, `id_aktivitas_renja`) USING BTREE,
  CONSTRAINT `trx_renja_aktivitas_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_pelaksana` (`id_pelaksana_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_belanja
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_belanja`;
CREATE TABLE `trx_renja_belanja`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi_renja` int(11) NOT NULL,
  `id_zona_ssh` int(11) NOT NULL DEFAULT 0,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '1 ssh 0 asb',
  `id_aktivitas_asb` bigint(20) NULL DEFAULT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_belanja_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_belanja`(`id_lokasi_renja`, `tahun_renja`, `no_urut`, `id_belanja_renja`) USING BTREE,
  CONSTRAINT `trx_renja_belanja_ibfk_1` FOREIGN KEY (`id_lokasi_renja`) REFERENCES `trx_renja_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_dokumen`;
CREATE TABLE `trx_renja_dokumen`  (
  `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  UNIQUE INDEX `id_unit_renja`(`id_unit_renja`, `tahun_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_kebijakan`;
CREATE TABLE `trx_renja_kebijakan`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renja` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kebijakan_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_kebijakan`(`tahun_renja`, `id_unit`, `no_urut`, `id_sasaran_renstra`, `id_kebijakan_renja`, `id_renja`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_kebijakan`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `trx_renja_kebijakan_ibfk_1` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renja_rancangan` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_kegiatan`;
CREATE TABLE `trx_renja_kegiatan`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL COMMENT 'juga menunjukkan prioritas',
  `id_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja_program` bigint(11) NOT NULL,
  `id_rkpd_renstra` int(11) NULL DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_kegiatan` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_selanjutnya` decimal(20, 2) NULL DEFAULT 0.00,
  `status_pelaksanaan_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = tepat 1 = dimajukan 2 = ditunda 3 dibatalkan 4 baru',
  `pagu_musrenbang` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja skpd 1 =  tambahan baru',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 Final',
  `status_rancangan` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum selesai 1 siap kirim ke forum',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja`(`id_rkpd_renstra`, `tahun_renja`, `no_urut`, `id_renja`) USING BTREE,
  INDEX `idx_trx_rancangan_renja_1`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `id_program_renstra`(`id_program_renstra`) USING BTREE,
  INDEX `id_sasaran_renstra`(`id_sasaran_renstra`) USING BTREE,
  INDEX `FK_trx_renja_rancangan_trx_renja_rancangan_program`(`id_renja_program`) USING BTREE,
  CONSTRAINT `trx_renja_kegiatan_ibfk_2` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_renja_kegiatan_ibfk_3` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_renja_kegiatan_ibfk_4` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_kegiatan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_kegiatan_indikator`;
CREATE TABLE `trx_renja_kegiatan_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_indikator_kegiatan_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `angka_tahun` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `sumber_data` int(11) NULL DEFAULT 0 COMMENT '0 renstra 1 tambahan',
  PRIMARY KEY (`id_indikator_kegiatan_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_renja`) USING BTREE,
  INDEX `FK_trx_renja_rancangan_indikator_trx_renja_rancangan`(`id_renja`) USING BTREE,
  CONSTRAINT `trx_renja_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_lokasi`;
CREATE TABLE `trx_renja_lokasi`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_lokasi` int(11) NOT NULL COMMENT '0 kewilayah 1 teknis',
  `id_lokasi` int(11) NOT NULL,
  `id_kecamatan` int(11) NULL DEFAULT NULL,
  `id_desa` int(11) NULL DEFAULT NULL,
  `rt` int(11) NULL DEFAULT NULL,
  `rw` int(11) NULL DEFAULT NULL,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_lokasi_renja`) USING BTREE,
  UNIQUE INDEX `idx_rancangan_renja_lokasi`(`id_pelaksana_renja`, `tahun_renja`, `no_urut`, `id_lokasi_renja`) USING BTREE,
  CONSTRAINT `trx_renja_lokasi_ibfk_1` FOREIGN KEY (`id_pelaksana_renja`) REFERENCES `trx_renja_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_pelaksana`;
CREATE TABLE `trx_renja_pelaksana`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NULL DEFAULT 0,
  `ket_usul` int(11) NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `id_lokasi` int(11) NOT NULL DEFAULT 0 COMMENT 'Lokasi Penyelenggaraan Kegiatan',
  PRIMARY KEY (`id_pelaksana_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja_pelaksana`(`id_renja`, `tahun_renja`, `no_urut`, `id_pelaksana_renja`) USING BTREE,
  CONSTRAINT `trx_renja_pelaksana_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_program`;
CREATE TABLE `trx_renja_program`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_renja_ranwal` int(11) NOT NULL DEFAULT 0,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_ranwal` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `status_program_rkpd` int(11) NULL DEFAULT NULL COMMENT 'status pelaksanaan unit di rkpd',
  `sumber_data_rkpd` int(11) NULL DEFAULT NULL COMMENT 'sumber usulan pelaksana unit di rkpd',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_renja_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja`(`tahun_renja`, `no_urut`, `id_rkpd_ranwal`, `id_program_rpjmd`, `id_unit`, `id_bidang`, `id_renja_ranwal`) USING BTREE,
  INDEX `idx_trx_rancangan_renja_1`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `id_program_renstra`(`id_program_renstra`) USING BTREE,
  INDEX `id_sasaran_renstra`(`id_sasaran_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_ibfk_2`(`id_renja_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_program_indikator`;
CREATE TABLE `trx_renja_program_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_renja_program`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_renja_program`) USING BTREE,
  CONSTRAINT `trx_renja_program_indikator_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_program_rkpd
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_program_rkpd`;
CREATE TABLE `trx_renja_program_rkpd`  (
  `tahun_renja` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_renja_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `jml_data` int(11) NOT NULL DEFAULT 0,
  `jml_baru` int(11) NOT NULL DEFAULT 0,
  `jml_lama` int(11) NOT NULL DEFAULT 0,
  `jml_tepat` int(11) NOT NULL DEFAULT 0,
  `jml_maju` int(11) NOT NULL DEFAULT 0,
  `jml_tunda` int(11) NOT NULL DEFAULT 0,
  `jml_batal` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_renja_ranwal`) USING BTREE,
  UNIQUE INDEX `tahun_renja_id_rkpd_ranwal_id_unit`(`tahun_renja`, `id_rkpd_ranwal`, `id_unit`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan`;
CREATE TABLE `trx_renja_rancangan`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL COMMENT 'juga menunjukkan prioritas',
  `id_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja_program` bigint(11) NOT NULL,
  `id_rkpd_renstra` int(11) NULL DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_kegiatan` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_selanjutnya` decimal(20, 2) NULL DEFAULT 0.00,
  `status_pelaksanaan_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = tepat 1 = dimajukan 2 = ditunda 3 dibatalkan 4 baru',
  `pagu_musrenbang` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja skpd 1 =  tambahan baru',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 Final',
  `status_rancangan` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum selesai 1 siap kirim ke forum',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja`(`id_rkpd_renstra`, `tahun_renja`, `no_urut`, `id_renja`) USING BTREE,
  INDEX `idx_trx_rancangan_renja_1`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `id_program_renstra`(`id_program_renstra`) USING BTREE,
  INDEX `id_sasaran_renstra`(`id_sasaran_renstra`) USING BTREE,
  INDEX `FK_trx_renja_rancangan_trx_renja_rancangan_program`(`id_renja_program`) USING BTREE,
  CONSTRAINT `FK_trx_renja_rancangan_trx_renja_rancangan_program` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_rancangan_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trx_rancangan_renja` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trx_rancangan_renja_1` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_aktivitas`;
CREATE TABLE `trx_renja_rancangan_aktivitas`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT NULL,
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `target_output_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rata2` decimal(20, 2) NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(255) NULL DEFAULT NULL,
  `id_satuan_2` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja_pelaksana`(`id_renja`, `tahun_renja`, `no_urut`, `id_aktivitas_renja`) USING BTREE,
  CONSTRAINT `trx_renja_rancangan_aktivitas_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_rancangan_pelaksana` (`id_pelaksana_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_belanja
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_belanja`;
CREATE TABLE `trx_renja_rancangan_belanja`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi_renja` int(11) NOT NULL,
  `id_zona_ssh` int(11) NOT NULL DEFAULT 0,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '1 ssh 0 asb',
  `id_aktivitas_asb` bigint(20) NULL DEFAULT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_belanja_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_belanja`(`id_lokasi_renja`, `tahun_renja`, `no_urut`, `id_belanja_renja`) USING BTREE,
  CONSTRAINT `FK_trx_renja_rancangan_belanja_trx_renja_rancangan_lokasi` FOREIGN KEY (`id_lokasi_renja`) REFERENCES `trx_renja_rancangan_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_dokumen`;
CREATE TABLE `trx_renja_rancangan_dokumen`  (
  `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  UNIQUE INDEX `id_unit_renja`(`id_unit_renja`, `tahun_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_indikator`;
CREATE TABLE `trx_renja_rancangan_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_indikator_kegiatan_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `angka_tahun` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `sumber_data` int(11) NULL DEFAULT 0 COMMENT '0 renstra 1 tambahan',
  PRIMARY KEY (`id_indikator_kegiatan_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_renja`) USING BTREE,
  INDEX `FK_trx_renja_rancangan_indikator_trx_renja_rancangan`(`id_renja`) USING BTREE,
  CONSTRAINT `FK_trx_renja_rancangan_indikator_trx_renja_rancangan` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_rancangan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_kebijakan`;
CREATE TABLE `trx_renja_rancangan_kebijakan`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renja` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kebijakan_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_kebijakan`(`tahun_renja`, `id_unit`, `no_urut`, `id_sasaran_renstra`, `id_kebijakan_renja`, `id_renja`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_kebijakan`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renja_rancangan_kebijakan` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renja_rancangan` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_lokasi`;
CREATE TABLE `trx_renja_rancangan_lokasi`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_lokasi` int(11) NOT NULL COMMENT '0 kewilayah 1 teknis',
  `id_lokasi` int(11) NOT NULL,
  `id_kecamatan` int(11) NULL DEFAULT NULL,
  `id_desa` int(11) NULL DEFAULT NULL,
  `rt` int(11) NULL DEFAULT NULL,
  `rw` int(11) NULL DEFAULT NULL,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_lokasi_renja`) USING BTREE,
  UNIQUE INDEX `idx_rancangan_renja_lokasi`(`id_pelaksana_renja`, `tahun_renja`, `no_urut`, `id_lokasi_renja`) USING BTREE,
  CONSTRAINT `fk_rancangan_renja_lokasi` FOREIGN KEY (`id_pelaksana_renja`) REFERENCES `trx_renja_rancangan_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_pelaksana`;
CREATE TABLE `trx_renja_rancangan_pelaksana`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NULL DEFAULT 0,
  `ket_usul` int(11) NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `id_lokasi` int(11) NOT NULL DEFAULT 0 COMMENT 'Lokasi Penyelenggaraan Kegiatan',
  PRIMARY KEY (`id_pelaksana_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja_pelaksana`(`id_renja`, `tahun_renja`, `no_urut`, `id_pelaksana_renja`) USING BTREE,
  CONSTRAINT `fk_trx_rancangan_renja_pelaksana` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_rancangan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_program`;
CREATE TABLE `trx_renja_rancangan_program`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_renja_ranwal` int(11) NOT NULL DEFAULT 0,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_ranwal` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `status_program_rkpd` int(11) NULL DEFAULT NULL COMMENT 'status pelaksanaan unit di rkpd',
  `sumber_data_rkpd` int(11) NULL DEFAULT NULL COMMENT 'sumber usulan pelaksana unit di rkpd',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_renja_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja`(`tahun_renja`, `no_urut`, `id_rkpd_ranwal`, `id_program_rpjmd`, `id_unit`, `id_bidang`, `id_renja_ranwal`) USING BTREE,
  INDEX `idx_trx_rancangan_renja_1`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `id_program_renstra`(`id_program_renstra`) USING BTREE,
  INDEX `id_sasaran_renstra`(`id_sasaran_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_ibfk_2`(`id_renja_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_program_indikator`;
CREATE TABLE `trx_renja_rancangan_program_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_renja_program`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_renja_program`) USING BTREE,
  CONSTRAINT `trx_renja_rancangan_program_indikator_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_rancangan_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_program_ranwal
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_program_ranwal`;
CREATE TABLE `trx_renja_rancangan_program_ranwal`  (
  `tahun_renja` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_renja_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `jml_data` int(11) NOT NULL DEFAULT 0,
  `jml_baru` int(11) NOT NULL DEFAULT 0,
  `jml_lama` int(11) NOT NULL DEFAULT 0,
  `jml_tepat` int(11) NOT NULL DEFAULT 0,
  `jml_maju` int(11) NOT NULL DEFAULT 0,
  `jml_tunda` int(11) NOT NULL DEFAULT 0,
  `jml_batal` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_renja_ranwal`) USING BTREE,
  UNIQUE INDEX `tahun_renja_id_rkpd_ranwal_id_unit`(`tahun_renja`, `id_rkpd_ranwal`, `id_unit`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_rancangan_ref_pokir
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_rancangan_ref_pokir`;
CREATE TABLE `trx_renja_rancangan_ref_pokir`  (
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `id_ref_pokir_renja` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_pokir_renja`) USING BTREE,
  UNIQUE INDEX `id_aktivitas_renja`(`id_aktivitas_renja`, `id_pokir_usulan`) USING BTREE,
  INDEX `id_pokir_usulan`(`id_pokir_usulan`) USING BTREE,
  CONSTRAINT `trx_renja_rancangan_ref_pokir_ibfk_1` FOREIGN KEY (`id_aktivitas_renja`) REFERENCES `trx_renja_rancangan_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_aktivitas`;
CREATE TABLE `trx_renja_ranwal_aktivitas`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT NULL,
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `target_output_aktivitas` decimal(20, 2) NULL DEFAULT 0.00,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rata2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(255) NULL DEFAULT NULL,
  `id_satuan_2` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja_pelaksana`(`id_renja`, `tahun_renja`, `no_urut`, `id_aktivitas_renja`) USING BTREE,
  CONSTRAINT `trx_renja_ranwal_aktivitas_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_pelaksana` (`id_pelaksana_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_dokumen`;
CREATE TABLE `trx_renja_ranwal_dokumen`  (
  `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  UNIQUE INDEX `id_unit_renja`(`id_unit_renja`, `tahun_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_kegiatan`;
CREATE TABLE `trx_renja_ranwal_kegiatan`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL COMMENT 'juga menunjukkan prioritas',
  `id_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja_program` bigint(11) NOT NULL,
  `id_rkpd_renstra` int(11) NULL DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kegiatan_renstra` int(11) NULL DEFAULT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_kegiatan` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_selanjutnya` decimal(20, 2) NULL DEFAULT 0.00,
  `status_pelaksanaan_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = tepat 1 = dimajukan 2 = ditunda 3 dibatalkan 4 baru',
  `pagu_musrenbang` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja skpd 1 =  tambahan baru',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 Final',
  `status_rancangan` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum selesai 1 siap kirim ke forum',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja`(`id_rkpd_renstra`, `tahun_renja`, `no_urut`, `id_renja`) USING BTREE,
  INDEX `idx_trx_rancangan_renja_1`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `id_program_renstra`(`id_program_renstra`) USING BTREE,
  INDEX `id_sasaran_renstra`(`id_sasaran_renstra`) USING BTREE,
  INDEX `FK_trx_renja_rancangan_trx_renja_rancangan_program`(`id_renja_program`) USING BTREE,
  CONSTRAINT `trx_renja_ranwal_kegiatan_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_ranwal_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_kegiatan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_kegiatan_indikator`;
CREATE TABLE `trx_renja_ranwal_kegiatan_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_indikator_kegiatan_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `angka_tahun` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `sumber_data` int(11) NULL DEFAULT 0 COMMENT '0 renstra 1 tambahan',
  PRIMARY KEY (`id_indikator_kegiatan_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_renja`) USING BTREE,
  INDEX `FK_trx_renja_rancangan_indikator_trx_renja_rancangan`(`id_renja`) USING BTREE,
  CONSTRAINT `trx_renja_ranwal_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_pelaksana`;
CREATE TABLE `trx_renja_ranwal_pelaksana`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL AUTO_INCREMENT,
  `id_renja` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL DEFAULT 0,
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NULL DEFAULT 0,
  `ket_usul` int(11) NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `id_lokasi` int(11) NOT NULL DEFAULT 0 COMMENT 'Lokasi Penyelenggaraan Kegiatan',
  PRIMARY KEY (`id_pelaksana_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja_pelaksana`(`id_renja`, `tahun_renja`, `no_urut`, `id_pelaksana_renja`) USING BTREE,
  CONSTRAINT `trx_renja_ranwal_pelaksana_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_program`;
CREATE TABLE `trx_renja_ranwal_program`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_renja_ranwal` int(11) NOT NULL DEFAULT 0,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NULL DEFAULT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_ranwal` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `status_program_rkpd` int(11) NULL DEFAULT NULL COMMENT 'status pelaksanaan unit di rkpd',
  `sumber_data_rkpd` int(11) NULL DEFAULT NULL COMMENT 'sumber usulan pelaksana unit di rkpd',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  PRIMARY KEY (`id_renja_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_rancangan_renja`(`tahun_renja`, `no_urut`, `id_rkpd_ranwal`, `id_program_rpjmd`, `id_unit`, `id_bidang`, `id_renja_ranwal`) USING BTREE,
  INDEX `idx_trx_rancangan_renja_1`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `id_program_renstra`(`id_program_renstra`) USING BTREE,
  INDEX `id_sasaran_renstra`(`id_sasaran_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_ibfk_2`(`id_renja_ranwal`) USING BTREE,
  CONSTRAINT `trx_renja_ranwal_program_ibfk_1` FOREIGN KEY (`id_renja_ranwal`) REFERENCES `trx_renja_ranwal_program_rkpd` (`id_renja_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_program_indikator`;
CREATE TABLE `trx_renja_ranwal_program_indikator`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renja` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program_renja`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_renja_program`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_ranwal_program_indikator_ibfk_1`(`id_renja_program`) USING BTREE,
  CONSTRAINT `trx_renja_ranwal_program_indikator_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_ranwal_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renja_ranwal_program_rkpd
-- ----------------------------
DROP TABLE IF EXISTS `trx_renja_ranwal_program_rkpd`;
CREATE TABLE `trx_renja_ranwal_program_rkpd`  (
  `tahun_renja` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_renja_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `jml_data` int(11) NOT NULL DEFAULT 0,
  `jml_baru` int(11) NOT NULL DEFAULT 0,
  `jml_lama` int(11) NOT NULL DEFAULT 0,
  `jml_tepat` int(11) NOT NULL DEFAULT 0,
  `jml_maju` int(11) NOT NULL DEFAULT 0,
  `jml_tunda` int(11) NOT NULL DEFAULT 0,
  `jml_batal` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_renja_ranwal`) USING BTREE,
  UNIQUE INDEX `tahun_renja_id_rkpd_ranwal_id_unit`(`tahun_renja`, `id_rkpd_ranwal`, `id_unit`) USING BTREE,
  INDEX `id_rkpd_ranwal`(`id_rkpd_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_dokumen`;
CREATE TABLE `trx_renstra_dokumen`  (
  `id_rpjmd` int(11) NOT NULL,
  `id_renstra` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nomor_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_renstra` date NULL DEFAULT NULL,
  `uraian_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nm_pimpinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_pimpinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan_pimpinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_dokumen`(`id_rpjmd`, `id_unit`) USING BTREE,
  INDEX `fk_trx_renstra_dokumen_1`(`id_unit`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_dokumen` FOREIGN KEY (`id_rpjmd`) REFERENCES `trx_rpjmd_dokumen` (`id_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trx_renstra_dokumen_1` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_kebijakan`;
CREATE TABLE `trx_renstra_kebijakan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_kebijakan_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_kebijakan_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_kebijakan`(`thn_id`, `id_sasaran_renstra`, `id_kebijakan_renstra`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_kebijakan`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_kebijakan` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_kegiatan`;
CREATE TABLE `trx_renstra_kegiatan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `id_kegiatan_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan_ref` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_sasaran_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `total_pagu` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_kegiatan_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_kegiatan`(`thn_id`, `id_program_renstra`, `id_kegiatan_renstra`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_kegiatan`(`id_program_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_kegiatan` FOREIGN KEY (`id_program_renstra`) REFERENCES `trx_renstra_program` (`id_program_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_kegiatan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_kegiatan_indikator`;
CREATE TABLE `trx_renstra_kegiatan_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_renstra` int(11) NOT NULL,
  `id_indikator_kegiatan_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_kegiatan_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_kegiatan_indikator`(`thn_id`, `id_kegiatan_renstra`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_kegiatan_indikator`(`id_kegiatan_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_kegiatan_indikator` FOREIGN KEY (`id_kegiatan_renstra`) REFERENCES `trx_renstra_kegiatan` (`id_kegiatan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_kegiatan_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_kegiatan_pelaksana`;
CREATE TABLE `trx_renstra_kegiatan_pelaksana`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_renstra_pelaksana` int(11) NOT NULL,
  `id_kegiatan_renstra` int(255) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_kegiatan_renstra_pelaksana`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_kegiatan_pelaksana`(`thn_id`, `id_kegiatan_renstra`, `id_perubahan`, `id_sub_unit`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_kegiatan_pelaksana`(`id_kegiatan_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_kegiatan_pelaksana` FOREIGN KEY (`id_kegiatan_renstra`) REFERENCES `trx_renstra_kegiatan` (`id_kegiatan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_misi
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_misi`;
CREATE TABLE `trx_renstra_misi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_visi_renstra` int(11) NOT NULL,
  `id_misi_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_misi_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_misi_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_misi`(`id_visi_renstra`, `thn_id`, `no_urut`, `id_misi_renstra`, `id_perubahan`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_misi` FOREIGN KEY (`id_visi_renstra`) REFERENCES `trx_renstra_visi` (`id_visi_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_program`;
CREATE TABLE `trx_renstra_program`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_program_ref` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_program_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_sasaran_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_program_renstra`) USING BTREE,
  UNIQUE INDEX `idx_renstra_program`(`thn_id`, `id_sasaran_renstra`, `id_program_renstra`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_program`(`id_sasaran_renstra`) USING BTREE,
  INDEX `fk_trx_renstra_program_1`(`id_program_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_program` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trx_renstra_program_1` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_program` (`id_program_rpjmd`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_program_indikator`;
CREATE TABLE `trx_renstra_program_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `id_indikator_sasaran_renstra` int(11) NOT NULL DEFAULT 0,
  `id_indikator_program_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_program_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_program_indikator`(`thn_id`, `id_program_renstra`, `id_indikator_program_renstra`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_program_indikator`(`id_program_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_program_indikator` FOREIGN KEY (`id_program_renstra`) REFERENCES `trx_renstra_program` (`id_program_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_sasaran`;
CREATE TABLE `trx_renstra_sasaran`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL DEFAULT 0,
  `id_sasaran_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_sasaran_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sasaran_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_sasaran`(`thn_id`, `id_tujuan_renstra`, `id_sasaran_renstra`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_sasaran`(`id_tujuan_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_sasaran` FOREIGN KEY (`id_tujuan_renstra`) REFERENCES `trx_renstra_tujuan` (`id_tujuan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_sasaran_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_sasaran_indikator`;
CREATE TABLE `trx_renstra_sasaran_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL DEFAULT 0,
  `id_indikator_sasaran_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_sasaran_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_sasaran_indikator`(`thn_id`, `id_sasaran_renstra`, `id_indikator_sasaran_renstra`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_sasaran_indikator`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_sasaran_indikator` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_strategi
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_strategi`;
CREATE TABLE `trx_renstra_strategi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_strategi_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_strategi_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_strategi_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_kebijakan`(`thn_id`, `id_sasaran_renstra`, `id_perubahan`, `id_strategi_renstra`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_strategi`(`id_sasaran_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_strategi` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_tujuan
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_tujuan`;
CREATE TABLE `trx_renstra_tujuan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_misi_renstra` int(11) NOT NULL,
  `id_tujuan_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_tujuan_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_tujuan_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_renstra_tujuan`(`thn_id`, `id_misi_renstra`, `id_tujuan_renstra`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_tujuan`(`id_misi_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_renstra_tujuan` FOREIGN KEY (`id_misi_renstra`) REFERENCES `trx_renstra_misi` (`id_misi_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_tujuan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_tujuan_indikator`;
CREATE TABLE `trx_renstra_tujuan_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `id_indikator_tujuan_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_tujuan_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_sasaran_indikator`(`thn_id`, `id_tujuan_renstra`, `id_indikator_tujuan_renstra`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_renstra_sasaran_indikator`(`id_tujuan_renstra`) USING BTREE,
  CONSTRAINT `trx_renstra_tujuan_indikator_ibfk_1` FOREIGN KEY (`id_tujuan_renstra`) REFERENCES `trx_renstra_tujuan` (`id_tujuan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_renstra_visi
-- ----------------------------
DROP TABLE IF EXISTS `trx_renstra_visi`;
CREATE TABLE `trx_renstra_visi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renstra` int(11) NOT NULL DEFAULT 1,
  `id_visi_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_unit` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `thn_awal_renstra` int(11) NOT NULL,
  `thn_akhir_renstra` int(11) NOT NULL,
  `uraian_visi_renstra` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_status_dokumen` int(11) NOT NULL DEFAULT 0,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_visi_renstra`) USING BTREE,
  UNIQUE INDEX `idx_ta_visi_rpjmd`(`thn_id`, `id_visi_renstra`, `thn_awal_renstra`, `thn_akhir_renstra`, `id_perubahan`, `id_unit`, `no_urut`) USING BTREE,
  INDEX `FK_trx_renstra_visi_ref_unit`(`id_unit`) USING BTREE,
  CONSTRAINT `FK_trx_renstra_visi_ref_unit` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final`;
CREATE TABLE `trx_rkpd_final`  (
  `id_rkpd_rancangan` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_forum_rkpdprog` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) NULL DEFAULT NULL,
  `thn_id_rpjmd` int(11) NULL DEFAULT NULL,
  `id_visi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_misi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NULL DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NULL DEFAULT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_ranwal` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Keterangan / alasan status usulan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_rkpd_rancangan`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal`(`tahun_rkpd`, `thn_id_rpjmd`, `id_visi_rpjmd`, `id_misi_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_program_rpjmd`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_aktivitas_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_aktivitas_pd`;
CREATE TABLE `trx_rkpd_final_aktivitas_pd`  (
  `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT 0,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT 0,
  `id_aktivitas_renja` int(11) NULL DEFAULT 0,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_aktivitas_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_aktivitas_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_aktivitas_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_aktivitas_trx_forum_skpd`(`id_pelaksana_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_rkpd_rancangan_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_belanja_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_belanja_pd`;
CREATE TABLE `trx_rkpd_final_belanja_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT 0,
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT 0,
  `sumber_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT 1,
  `harga_satuan_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL,
  PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_skpd_belanja`(`tahun_forum`, `no_urut`, `id_belanja_pd`, `id_aktivitas_pd`) USING BTREE,
  INDEX `fk_trx_forum_skpd_belanja`(`id_aktivitas_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_dokumen`;
CREATE TABLE `trx_rkpd_final_dokumen`  (
  `id_dokumen_rkpd` int(11) NOT NULL,
  `nomor_rkpd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_unit_perencana` int(11) NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_log` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_perubahan` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trx_rkpd_final_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_indikator`;
CREATE TABLE `trx_rkpd_final_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 data rpjmd 1 data baru',
  PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_indikator`(`tahun_rkpd`, `id_rkpd_rancangan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_indikator`(`id_rkpd_rancangan`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_kebijakan`;
CREATE TABLE `trx_rkpd_final_kebijakan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal_kebijakan`(`tahun_rkpd`, `id_rkpd_rancangan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_kebijakan`(`id_rkpd_rancangan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_kebijakan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_kebijakan_pd`;
CREATE TABLE `trx_rkpd_final_kebijakan_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_renja`, `id_unit`, `uraian_kebijakan`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_keg_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_keg_indikator_pd`;
CREATE TABLE `trx_rkpd_final_keg_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_kegiatan_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_kegiatan_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_kegiatan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_kegiatan_pd`;
CREATE TABLE `trx_rkpd_final_kegiatan_pd`  (
  `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) NULL DEFAULT NULL,
  `id_renja` int(11) NULL DEFAULT 0,
  `id_rkpd_renstra` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_kegiatan_renstra` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_id_kegiatan_ref`(`id_unit`, `id_kegiatan_ref`, `id_program_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_trx_forum_skpd_program`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_kegiatan_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_lokasi_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_lokasi_pd`;
CREATE TABLE `trx_rkpd_final_lokasi_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT 0 COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NULL DEFAULT 0,
  `id_lokasi_teknis` int(11) NULL DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_desa` int(11) NULL DEFAULT 0,
  `id_kecamatan` int(11) NULL DEFAULT 0,
  `rt` int(11) NULL DEFAULT 0,
  `rw` int(11) NULL DEFAULT 0,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir',
  PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_lokasi`(`id_aktivitas_pd`, `tahun_forum`, `no_urut`, `id_lokasi_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_pelaksana`;
CREATE TABLE `trx_rkpd_final_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `hak_akses` int(11) NOT NULL DEFAULT 0 COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'menjelaskan status pelaksanaan',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rancangan`, `id_unit`, `id_urusan_rkpd`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_rancangan`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_urusan_rkpd`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_2`(`id_unit`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_rancangan_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_final_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_pelaksana_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_pelaksana_pd`;
CREATE TABLE `trx_rkpd_final_pelaksana_pd`  (
  `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) NULL DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NULL DEFAULT 0,
  `id_lokasi` int(11) NULL DEFAULT 0 COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final',
  PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_pelaksana`(`id_kegiatan_pd`, `tahun_forum`, `no_urut`, `id_pelaksana_pd`, `id_sub_unit`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_prog_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_prog_indikator_pd`;
CREATE TABLE `trx_rkpd_final_prog_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_program_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_program_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_program_pd`;
CREATE TABLE `trx_rkpd_final_program_pd`  (
  `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_forum_program` int(11) NULL DEFAULT NULL,
  `id_renja_program` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_program_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_program_id_program_ref`(`id_unit`, `id_renja_program`, `id_program_ref`) USING BTREE,
  INDEX `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal`(`id_rkpd_rancangan`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_program_pd_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_final_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_final_urusan`;
CREATE TABLE `trx_rkpd_final_urusan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rancangan`, `id_bidang`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_rancangan`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_bidang`) USING BTREE,
  CONSTRAINT `trx_rkpd_final_urusan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_final_urusan_ibfk_2` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan`;
CREATE TABLE `trx_rkpd_rancangan`  (
  `id_rkpd_rancangan` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_forum_rkpdprog` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) NULL DEFAULT NULL,
  `thn_id_rpjmd` int(11) NULL DEFAULT NULL,
  `id_visi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_misi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NULL DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NULL DEFAULT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_ranwal` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Keterangan / alasan status usulan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_rkpd_rancangan`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal`(`tahun_rkpd`, `thn_id_rpjmd`, `id_visi_rpjmd`, `id_misi_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_program_rpjmd`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_aktivitas_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_aktivitas_pd`;
CREATE TABLE `trx_rkpd_rancangan_aktivitas_pd`  (
  `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT 0,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT 0,
  `id_aktivitas_renja` int(11) NULL DEFAULT 0,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_aktivitas_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_aktivitas_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_aktivitas_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_aktivitas_trx_forum_skpd`(`id_pelaksana_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_rkpd_rancangan_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_belanja_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_belanja_pd`;
CREATE TABLE `trx_rkpd_rancangan_belanja_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT 0,
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT 0,
  `sumber_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT 1,
  `harga_satuan_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL,
  PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_skpd_belanja`(`tahun_forum`, `no_urut`, `id_belanja_pd`, `id_aktivitas_pd`) USING BTREE,
  INDEX `fk_trx_forum_skpd_belanja`(`id_aktivitas_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 541 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_dokumen`;
CREATE TABLE `trx_rkpd_rancangan_dokumen`  (
  `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_rkpd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_unit_perencana` int(11) NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE,
  UNIQUE INDEX `tahun_ranwal`(`tahun_rkpd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_indikator`;
CREATE TABLE `trx_rkpd_rancangan_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 data rpjmd 1 data baru',
  PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_indikator`(`tahun_rkpd`, `id_rkpd_rancangan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_indikator`(`id_rkpd_rancangan`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_kebijakan`;
CREATE TABLE `trx_rkpd_rancangan_kebijakan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal_kebijakan`(`tahun_rkpd`, `id_rkpd_rancangan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_kebijakan`(`id_rkpd_rancangan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_kebijakan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_kebijakan_pd`;
CREATE TABLE `trx_rkpd_rancangan_kebijakan_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_renja`, `id_unit`, `uraian_kebijakan`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_keg_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_keg_indikator_pd`;
CREATE TABLE `trx_rkpd_rancangan_keg_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_kegiatan_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_kegiatan_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_kegiatan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_kegiatan_pd`;
CREATE TABLE `trx_rkpd_rancangan_kegiatan_pd`  (
  `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) NULL DEFAULT NULL,
  `id_renja` int(11) NULL DEFAULT 0,
  `id_rkpd_renstra` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_kegiatan_renstra` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_id_kegiatan_ref`(`id_unit`, `id_kegiatan_ref`, `id_program_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_trx_forum_skpd_program`(`id_program_pd`) USING BTREE,
  CONSTRAINT `FK_trx_rkpd_rancangan_kegiatan_pd_trx_rkpd_rancangan_program_pd` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_lokasi_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_lokasi_pd`;
CREATE TABLE `trx_rkpd_rancangan_lokasi_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT 0 COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NULL DEFAULT 0,
  `id_lokasi_teknis` int(11) NULL DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_desa` int(11) NULL DEFAULT 0,
  `id_kecamatan` int(11) NULL DEFAULT 0,
  `rt` int(11) NULL DEFAULT 0,
  `rw` int(11) NULL DEFAULT 0,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir',
  PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_lokasi`(`id_aktivitas_pd`, `tahun_forum`, `no_urut`, `id_lokasi_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_pelaksana`;
CREATE TABLE `trx_rkpd_rancangan_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `hak_akses` int(11) NOT NULL DEFAULT 0 COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'menjelaskan status pelaksanaan',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rancangan`, `id_unit`, `id_urusan_rkpd`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_rancangan`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_urusan_rkpd`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_2`(`id_unit`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_rancangan_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_rancangan_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_pelaksana_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_pelaksana_pd`;
CREATE TABLE `trx_rkpd_rancangan_pelaksana_pd`  (
  `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) NULL DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NULL DEFAULT 0,
  `id_lokasi` int(11) NULL DEFAULT 0 COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final',
  PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_pelaksana`(`id_kegiatan_pd`, `tahun_forum`, `no_urut`, `id_pelaksana_pd`, `id_sub_unit`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_prog_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_prog_indikator_pd`;
CREATE TABLE `trx_rkpd_rancangan_prog_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_program_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_program_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_program_pd`;
CREATE TABLE `trx_rkpd_rancangan_program_pd`  (
  `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_forum_program` int(11) NULL DEFAULT NULL,
  `id_renja_program` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_program_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_program_id_program_ref`(`id_unit`, `id_renja_program`, `id_program_ref`) USING BTREE,
  INDEX `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal`(`id_rkpd_rancangan`) USING BTREE,
  CONSTRAINT `test` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rancangan_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rancangan_urusan`;
CREATE TABLE `trx_rkpd_rancangan_urusan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rancangan`, `id_bidang`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_rancangan`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_bidang`) USING BTREE,
  CONSTRAINT `trx_rkpd_rancangan_urusan_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_rancangan_urusan_ibfk_3` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir`;
CREATE TABLE `trx_rkpd_ranhir`  (
  `id_rkpd_rancangan` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_forum_rkpdprog` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) NULL DEFAULT NULL,
  `thn_id_rpjmd` int(11) NULL DEFAULT NULL,
  `id_visi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_misi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NULL DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NULL DEFAULT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_ranwal` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Keterangan / alasan status usulan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_rkpd_rancangan`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal`(`tahun_rkpd`, `thn_id_rpjmd`, `id_visi_rpjmd`, `id_misi_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_program_rpjmd`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_aktivitas_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_aktivitas_pd`;
CREATE TABLE `trx_rkpd_ranhir_aktivitas_pd`  (
  `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT 0,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) NULL DEFAULT 0,
  `id_aktivitas_renja` int(11) NULL DEFAULT 0,
  `uraian_aktivitas_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_aktivitas_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `volume_aktivitas_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_forum_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_program_nasional` int(11) NULL DEFAULT NULL,
  `id_program_provinsi` int(11) NULL DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT 0 COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT 0,
  `pagu_aktivitas_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_aktivitas_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_musren` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_musren` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_aktivitas_trx_forum_skpd`(`id_pelaksana_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_rkpd_rancangan_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_belanja_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_belanja_pd`;
CREATE TABLE `trx_rkpd_ranhir_belanja_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT 0,
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT 0,
  `sumber_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT 1,
  `harga_satuan_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `jml_belanja_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL,
  PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_skpd_belanja`(`tahun_forum`, `no_urut`, `id_belanja_pd`, `id_aktivitas_pd`) USING BTREE,
  INDEX `fk_trx_forum_skpd_belanja`(`id_aktivitas_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_dokumen`;
CREATE TABLE `trx_rkpd_ranhir_dokumen`  (
  `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_rkpd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_unit_perencana` int(11) NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE,
  UNIQUE INDEX `tahun_ranwal`(`tahun_rkpd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_indikator`;
CREATE TABLE `trx_rkpd_ranhir_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 data rpjmd 1 data baru',
  PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_indikator`(`tahun_rkpd`, `id_rkpd_rancangan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_indikator`(`id_rkpd_rancangan`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_kebijakan`;
CREATE TABLE `trx_rkpd_ranhir_kebijakan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal_kebijakan`(`tahun_rkpd`, `id_rkpd_rancangan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_kebijakan`(`id_rkpd_rancangan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_kebijakan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_kebijakan_pd`;
CREATE TABLE `trx_rkpd_ranhir_kebijakan_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_renja`, `id_unit`, `uraian_kebijakan`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_keg_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_keg_indikator_pd`;
CREATE TABLE `trx_rkpd_ranhir_keg_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_kegiatan_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_kegiatan_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_kegiatan_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_kegiatan_pd`;
CREATE TABLE `trx_rkpd_ranhir_kegiatan_pd`  (
  `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) NULL DEFAULT NULL,
  `id_renja` int(11) NULL DEFAULT 0,
  `id_rkpd_renstra` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_renstra` int(11) NULL DEFAULT 0,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_kegiatan_renstra` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_renja` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_plus1_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_status` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_id_kegiatan_ref`(`id_unit`, `id_kegiatan_ref`, `id_program_pd`) USING BTREE,
  INDEX `FK_trx_forum_skpd_trx_forum_skpd_program`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_kegiatan_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_lokasi_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_lokasi_pd`;
CREATE TABLE `trx_rkpd_ranhir_lokasi_pd`  (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT 0 COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NULL DEFAULT 0,
  `id_lokasi_teknis` int(11) NULL DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_1` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `volume_usulan_2` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_1` int(11) NOT NULL DEFAULT 0,
  `id_satuan_2` int(11) NOT NULL DEFAULT 0,
  `id_desa` int(11) NULL DEFAULT 0,
  `id_kecamatan` int(11) NULL DEFAULT 0,
  `rt` int(11) NULL DEFAULT 0,
  `rw` int(11) NULL DEFAULT 0,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lang` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir',
  PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_lokasi`(`id_aktivitas_pd`, `tahun_forum`, `no_urut`, `id_lokasi_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_pelaksana`;
CREATE TABLE `trx_rkpd_ranhir_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `hak_akses` int(11) NOT NULL DEFAULT 0 COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'menjelaskan status pelaksanaan',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rancangan`, `id_unit`, `id_urusan_rkpd`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_rancangan`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_urusan_rkpd`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_2`(`id_unit`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_rancangan_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_ranhir_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_pelaksana_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_pelaksana_pd`;
CREATE TABLE `trx_rkpd_ranhir_pelaksana_pd`  (
  `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) NULL DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NULL DEFAULT 0,
  `id_lokasi` int(11) NULL DEFAULT 0 COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final',
  PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  UNIQUE INDEX `id_trx_forum_pelaksana`(`id_kegiatan_pd`, `tahun_forum`, `no_urut`, `id_pelaksana_pd`, `id_sub_unit`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_prog_indikator_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_prog_indikator_pd`;
CREATE TABLE `trx_rkpd_ranhir_prog_indikator_pd`  (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NULL DEFAULT 0,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `target_renja` decimal(20, 2) NULL DEFAULT 0.00,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_ouput` int(255) NULL DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 Renstra 1 baru',
  PRIMARY KEY (`id_indikator_program`) USING BTREE,
  UNIQUE INDEX `idx_trx_renja_rancangan_indikator`(`tahun_renja`, `id_program_renstra`, `kd_indikator`, `no_urut`, `id_perubahan`, `id_program_pd`) USING BTREE,
  INDEX `fk_trx_renja_rancangan_indikator`(`id_program_renstra`) USING BTREE,
  INDEX `trx_renja_rancangan_program_indikator_ibfk_1`(`id_program_pd`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_program_pd
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_program_pd`;
CREATE TABLE `trx_rkpd_ranhir_program_pd`  (
  `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_forum_program` int(11) NULL DEFAULT NULL,
  `id_renja_program` int(11) NULL DEFAULT 0,
  `id_program_renstra` int(11) NULL DEFAULT 0,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_forum` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0,
  `ket_usulan` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_program_pd`) USING BTREE,
  UNIQUE INDEX `id_unit_id_renja_program_id_program_ref`(`id_unit`, `id_renja_program`, `id_program_ref`) USING BTREE,
  INDEX `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal`(`id_rkpd_rancangan`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_program_pd_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranhir_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranhir_urusan`;
CREATE TABLE `trx_rkpd_ranhir_urusan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rancangan`, `id_bidang`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_rancangan`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_bidang`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranhir_urusan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_ranhir_urusan_ibfk_2` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranwal
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranwal`;
CREATE TABLE `trx_rkpd_ranwal`  (
  `id_rkpd_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT 0 COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) NULL DEFAULT NULL,
  `thn_id_rpjmd` int(11) NULL DEFAULT NULL,
  `id_visi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_misi_rpjmd` int(11) NULL DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NULL DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NULL DEFAULT NULL,
  `id_program_rpjmd` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_ranwal` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_program` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Keterangan / alasan status usulan',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_rkpd_ranwal`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal`(`tahun_rkpd`, `thn_id_rpjmd`, `id_visi_rpjmd`, `id_misi_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_program_rpjmd`, `no_urut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranwal_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranwal_dokumen`;
CREATE TABLE `trx_rkpd_ranwal_dokumen`  (
  `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_ranwal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_unit_perencana` int(11) NULL DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip_tandatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0 COMMENT '0 draft 1 aktif 2 tidak aktif',
  PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  UNIQUE INDEX `tahun_ranwal`(`tahun_ranwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranwal_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranwal_indikator`;
CREATE TABLE `trx_rkpd_ranwal_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `target_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `indikator_input` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `target_input` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan_input` int(255) NULL DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_satuan_output` int(255) NULL DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 data rpjmd 1 data baru',
  PRIMARY KEY (`id_indikator_program_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_indikator`(`tahun_rkpd`, `id_rkpd_ranwal`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_indikator`(`id_rkpd_ranwal`) USING BTREE,
  CONSTRAINT `fk_trx_rkpd_ranwal_indikator` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 66 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranwal_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranwal_kebijakan`;
CREATE TABLE `trx_rkpd_ranwal_kebijakan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_kebijakan_ranwal` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_ranwal`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_ranwal_kebijakan`(`tahun_rkpd`, `id_rkpd_ranwal`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_kebijakan`(`id_rkpd_ranwal`) USING BTREE,
  CONSTRAINT `fk_trx_rkpd_ranwal_kebijakan` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranwal_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranwal_pelaksana`;
CREATE TABLE `trx_rkpd_ranwal_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_rkpd` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `hak_akses` int(11) NOT NULL DEFAULT 0 COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'menjelaskan status pelaksanaan',
  `status_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 belum direviu 1 sudah direviu',
  PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_ranwal`, `id_unit`, `id_urusan_rkpd`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_urusan_rkpd`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_2`(`id_unit`) USING BTREE,
  CONSTRAINT `FK_trx_rkpd_ranwal_pelaksana_trx_rkpd_ranwal_urusan` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_ranwal_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trx_rkpd_ranwal_pelaksana_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 141 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_ranwal_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_ranwal_urusan`;
CREATE TABLE `trx_rkpd_ranwal_urusan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NULL DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 rpjmd 1 baru',
  PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_ranwal`, `id_bidang`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana`(`id_rkpd_ranwal`) USING BTREE,
  INDEX `fk_trx_rkpd_ranwal_pelaksana_1`(`id_bidang`) USING BTREE,
  CONSTRAINT `trx_rkpd_ranwal_urusan_ibfk_1` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_rkpd_ranwal_urusan_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_renstra
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_renstra`;
CREATE TABLE `trx_rkpd_renstra`  (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `pagu_tahun_rpjmd` decimal(20, 2) NULL DEFAULT 0.00,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NOT NULL,
  `uraian_visi_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_misi_renstra` int(11) NOT NULL,
  `uraian_misi_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `uraian_tujuan_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `uraian_sasaran_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `uraian_program_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_program` decimal(20, 2) NULL DEFAULT 0.00,
  `id_kegiatan_renstra` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0 COMMENT '0 = renstra 1 = insidentil',
  PRIMARY KEY (`id_rkpd_renstra`) USING BTREE,
  INDEX `idx_trx_rkpd_renstra`(`id_rkpd_rpjmd`, `tahun_rkpd`, `id_rkpd_renstra`, `id_program_rpjmd`, `id_unit`) USING BTREE,
  CONSTRAINT `fk_trx_rkpd_renstra` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 196 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_renstra_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_renstra_indikator`;
CREATE TABLE `trx_rkpd_renstra_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_renstra` int(11) NOT NULL,
  `id_indikator_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `kd_indikator` int(11) NULL DEFAULT NULL,
  `uraian_indikator_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `tolokukur_kegiatan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `target_output` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_indikator_renstra`) USING BTREE,
  INDEX `fk_trx_rkpd_renstra_pelaksana`(`id_rkpd_renstra`) USING BTREE,
  INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_renstra`, `kd_indikator`) USING BTREE,
  CONSTRAINT `trx_rkpd_renstra_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 196 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_renstra_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_renstra_pelaksana`;
CREATE TABLE `trx_rkpd_renstra_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_renstra` int(11) NOT NULL,
  `id_pelaksana_renstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub_unit` int(11) NOT NULL,
  `pagu_tahun` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_pelaksana_renstra`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_renstra`, `id_sub_unit`) USING BTREE,
  INDEX `fk_trx_rkpd_renstra_pelaksana`(`id_rkpd_renstra`) USING BTREE,
  CONSTRAINT `fk_trx_rkpd_renstra_pelaksana` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 196 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rpjmd_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rpjmd_kebijakan`;
CREATE TABLE `trx_rkpd_rpjmd_kebijakan`  (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_kebijakan_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kebijakan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kebijakan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rpjmd`, `uraian_kebijakan`) USING BTREE,
  INDEX `fk_trx_rkpd_rpjmd_kebijakan`(`id_rkpd_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rkpd_rpjmd_kebijakan` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rpjmd_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rpjmd_program_indikator`;
CREATE TABLE `trx_rkpd_rpjmd_program_indikator`  (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_indikator_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rpjmd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tolok_ukur_indikator` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `angka_tahun` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_indikator_program_rpjmd`) USING BTREE,
  INDEX `fk_rkpd_rpjmd_indikator`(`id_rkpd_rpjmd`) USING BTREE,
  INDEX `idx_trx_rkpd_rpjmd_program_indikator`(`tahun_rkpd`, `id_rkpd_rpjmd`, `kd_indikator`) USING BTREE,
  CONSTRAINT `fk_rkpd_rpjmd_indikator` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rpjmd_program_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rpjmd_program_pelaksana`;
CREATE TABLE `trx_rkpd_rpjmd_program_pelaksana`  (
  `tahun_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_tahun` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rkpd_rpjmd_program_pelaksana`(`tahun_rkpd`, `id_rkpd_rpjmd`, `id_urbid_rpjmd`, `id_unit`) USING BTREE,
  INDEX `fk_rkpd_rpjmd_pelaksana`(`id_rkpd_rpjmd`) USING BTREE,
  CONSTRAINT `fk_rkpd_rpjmd_pelaksana` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rkpd_rpjmd_ranwal
-- ----------------------------
DROP TABLE IF EXISTS `trx_rkpd_rpjmd_ranwal`;
CREATE TABLE `trx_rkpd_rpjmd_ranwal`  (
  `id_rkpd_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_rkpd` int(11) NOT NULL,
  `thn_id_rpjmd` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL,
  `uraian_visi_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_misi_rpjmd` int(11) NOT NULL,
  `uraian_misi_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `uraian_tujuan_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `uraian_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_program_rpjmd` decimal(20, 2) NULL DEFAULT 0.00,
  `status_data` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd',
  PRIMARY KEY (`id_rkpd_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_rkpd_rpjmd_ranwal`(`id_rkpd_rpjmd`, `tahun_rkpd`, `thn_id_rpjmd`, `id_visi_rpjmd`, `id_misi_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_program_rpjmd`) USING BTREE,
  INDEX `FK_trx_rkpd_rpjmd_ranwal_trx_rpjmd_visi`(`id_visi_rpjmd`) USING BTREE,
  CONSTRAINT `FK_trx_rkpd_rpjmd_ranwal_trx_rpjmd_visi` FOREIGN KEY (`id_visi_rpjmd`) REFERENCES `trx_rpjmd_visi` (`id_visi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_dokumen`;
CREATE TABLE `trx_rpjmd_dokumen`  (
  `id_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_rpjmd_old` int(11) NOT NULL DEFAULT 1,
  `thn_dasar` int(11) NOT NULL,
  `tahun_1` int(11) NOT NULL,
  `tahun_2` int(11) NOT NULL,
  `tahun_3` int(11) NOT NULL,
  `tahun_4` int(11) NOT NULL,
  `tahun_5` int(11) NOT NULL,
  `no_perda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_perda` date NULL DEFAULT NULL,
  `id_revisi` int(11) NULL DEFAULT NULL,
  `id_status_dokumen` int(11) NOT NULL DEFAULT 1 COMMENT '0 = draft , 1 = aktif  2 = direvisi',
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_rpjmd`) USING BTREE,
  INDEX `id_rpjmd_old`(`id_rpjmd_old`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_kebijakan`;
CREATE TABLE `trx_rpjmd_kebijakan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_kebijakan_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_kebijakan_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_kebijakan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_kebijakan`(`thn_id`, `id_sasaran_rpjmd`, `id_kebijakan_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_kebijakan`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_kebijakan` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_misi
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_misi`;
CREATE TABLE `trx_rpjmd_misi`  (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL,
  `id_misi_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_misi_rpjmd` varchar(550) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_misi_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_ta_misi_rpjmd`(`thn_id_rpjmd`, `id_visi_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_misi`(`id_visi_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_misi` FOREIGN KEY (`id_visi_rpjmd`) REFERENCES `trx_rpjmd_visi` (`id_visi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_program`;
CREATE TABLE `trx_rpjmd_program`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `total_pagu` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_program_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program`(`thn_id`, `id_sasaran_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_program` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_program_indikator`;
CREATE TABLE `trx_rpjmd_program_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_indikator_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL DEFAULT 0,
  `uraian_indikator_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_program_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program_indikator`(`thn_id`, `id_program_rpjmd`, `id_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program_indikator`(`id_program_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_program_indikator` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_program_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_program_pelaksana`;
CREATE TABLE `trx_rpjmd_program_pelaksana`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `pagu_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program_pelaksana`(`thn_id`, `id_urbid_rpjmd`, `id_unit`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program_pelaksana`(`id_urbid_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_program_pelaksana` FOREIGN KEY (`id_urbid_rpjmd`) REFERENCES `trx_rpjmd_program_urusan` (`id_urbid_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_program_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_program_urusan`;
CREATE TABLE `trx_rpjmd_program_urusan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_urbid_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program_pelaksana`(`thn_id`, `id_program_rpjmd`, `id_bidang`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program_urusan`(`id_program_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_program_urusan` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_dokumen`;
CREATE TABLE `trx_rpjmd_ranwal_dokumen`  (
  `id_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `periode_awal` int(11) NOT NULL,
  `periode_akhir` int(11) NOT NULL,
  `no_perda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan_dokumen` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_perda` date NULL DEFAULT NULL,
  `id_revisi` int(11) NOT NULL DEFAULT 1 COMMENT '0 = tekno, 1 = induk, 2= revisi1, 3=revisi2, 4=revisi4',
  `id_status_dokumen` int(11) NOT NULL DEFAULT 1 COMMENT '0 = draft , 1 = aktif  2 = direvisi',
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_rpjmd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_kebijakan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_kebijakan`;
CREATE TABLE `trx_rpjmd_ranwal_kebijakan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_strategi_rpjmd` int(11) NOT NULL,
  `id_kebijakan_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_kebijakan_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_kebijakan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_kebijakan`(`thn_id`, `id_strategi_rpjmd`, `id_kebijakan_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_kebijakan`(`id_strategi_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_kebijakan_ibfk_1` FOREIGN KEY (`id_strategi_rpjmd`) REFERENCES `trx_rpjmd_ranwal_strategi` (`id_strategi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_misi
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_misi`;
CREATE TABLE `trx_rpjmd_ranwal_misi`  (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL,
  `id_misi_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_misi_rpjmd` varchar(550) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_misi_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_ta_misi_rpjmd`(`thn_id_rpjmd`, `id_visi_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_misi`(`id_visi_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_misi_ibfk_1` FOREIGN KEY (`id_visi_rpjmd`) REFERENCES `trx_rpjmd_ranwal_visi` (`id_visi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_program
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_program`;
CREATE TABLE `trx_rpjmd_ranwal_program`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NULL DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pagu_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `total_pagu` decimal(20, 2) NULL DEFAULT 0.00,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_program_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program`(`thn_id`, `id_sasaran_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_program_ibfk_1` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_ranwal_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_program_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_program_indikator`;
CREATE TABLE `trx_rpjmd_ranwal_program_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_indikator_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL DEFAULT 0,
  `uraian_indikator_program_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_program_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program_indikator`(`thn_id`, `id_program_rpjmd`, `id_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program_indikator`(`id_program_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_program_indikator_ibfk_1` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_ranwal_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_program_pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_program_pelaksana`;
CREATE TABLE `trx_rpjmd_ranwal_program_pelaksana`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `pagu_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `pagu_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program_pelaksana`(`thn_id`, `id_urbid_rpjmd`, `id_unit`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program_pelaksana`(`id_urbid_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_program_pelaksana_ibfk_1` FOREIGN KEY (`id_urbid_rpjmd`) REFERENCES `trx_rpjmd_ranwal_program_urusan` (`id_urbid_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_program_urusan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_program_urusan`;
CREATE TABLE `trx_rpjmd_ranwal_program_urusan`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_urbid_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_program_pelaksana`(`thn_id`, `id_program_rpjmd`, `id_bidang`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_program_urusan`(`id_program_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_program_urusan_ibfk_1` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_ranwal_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_sasaran`;
CREATE TABLE `trx_rpjmd_ranwal_sasaran`  (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sasaran_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_sasaran`(`thn_id_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_sasaran`(`id_tujuan_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_sasaran_ibfk_1` FOREIGN KEY (`id_tujuan_rpjmd`) REFERENCES `trx_rpjmd_ranwal_tujuan` (`id_tujuan_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_sasaran_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_sasaran_indikator`;
CREATE TABLE `trx_rpjmd_ranwal_sasaran_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_indikator_sasaran_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_sasaran_indikator`(`thn_id`, `id_sasaran_rpjmd`, `id_indikator_sasaran_rpjmd`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_sasaran_indikator`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_sasaran_indikator_ibfk_1` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_ranwal_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_strategi
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_strategi`;
CREATE TABLE `trx_rpjmd_ranwal_strategi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_strategi_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_strategi_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_strategi_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_strategi`(`thn_id`, `id_sasaran_rpjmd`, `id_strategi_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_strategi`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_strategi_ibfk_1` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_ranwal_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_tujuan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_tujuan`;
CREATE TABLE `trx_rpjmd_ranwal_tujuan`  (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_misi_rpjmd` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_tujuan_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_tujuan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_tujuan`(`thn_id_rpjmd`, `id_misi_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_tujuan`(`id_misi_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_tujuan_ibfk_1` FOREIGN KEY (`id_misi_rpjmd`) REFERENCES `trx_rpjmd_ranwal_misi` (`id_misi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_tujuan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_tujuan_indikator`;
CREATE TABLE `trx_rpjmd_ranwal_tujuan_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_indikator_tujuan_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  PRIMARY KEY (`id_indikator_tujuan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_tujuan_indikator`(`thn_id`, `id_tujuan_rpjmd`, `id_indikator_tujuan_rpjmd`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_tujuan_indikator`(`id_tujuan_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_tujuan_indikator_ibfk_1` FOREIGN KEY (`id_tujuan_rpjmd`) REFERENCES `trx_rpjmd_ranwal_tujuan` (`id_tujuan_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_ranwal_visi
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_ranwal_visi`;
CREATE TABLE `trx_rpjmd_ranwal_visi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `uraian_visi_rpjmd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_visi_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_visi`(`id_rpjmd`, `no_urut`, `thn_id`, `id_visi_rpjmd`, `id_perubahan`) USING BTREE,
  CONSTRAINT `trx_rpjmd_ranwal_visi_ibfk_1` FOREIGN KEY (`id_rpjmd`) REFERENCES `trx_rpjmd_ranwal_dokumen` (`id_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_sasaran`;
CREATE TABLE `trx_rpjmd_sasaran`  (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sasaran_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_sasaran`(`thn_id_rpjmd`, `id_tujuan_rpjmd`, `id_sasaran_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_sasaran`(`id_tujuan_rpjmd`) USING BTREE,
  CONSTRAINT `FK_trx_rpjmd_sasaran_trx_rpjmd_tujuan` FOREIGN KEY (`id_tujuan_rpjmd`) REFERENCES `trx_rpjmd_tujuan` (`id_tujuan_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_sasaran_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_sasaran_indikator`;
CREATE TABLE `trx_rpjmd_sasaran_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_sasaran_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_sasaran_indikator`(`thn_id`, `id_sasaran_rpjmd`, `id_indikator_sasaran_rpjmd`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_sasaran_indikator`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_sasaran_indikator` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_strategi
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_strategi`;
CREATE TABLE `trx_rpjmd_strategi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_strategi_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_strategi_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_strategi_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_strategi`(`thn_id`, `id_sasaran_rpjmd`, `id_strategi_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_strategi`(`id_sasaran_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_strategi` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_tujuan
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_tujuan`;
CREATE TABLE `trx_rpjmd_tujuan`  (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_misi_rpjmd` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL AUTO_INCREMENT,
  `id_perubahan` int(11) NOT NULL,
  `uraian_tujuan_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_tujuan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_tujuan`(`thn_id_rpjmd`, `id_misi_rpjmd`, `id_perubahan`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_tujuan`(`id_misi_rpjmd`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_tujuan` FOREIGN KEY (`id_misi_rpjmd`) REFERENCES `trx_rpjmd_misi` (`id_misi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_tujuan_indikator
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_tujuan_indikator`;
CREATE TABLE `trx_rpjmd_tujuan_indikator`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_indikator_tujuan_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_rpjmd` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `angka_awal_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun1` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun2` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun3` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun4` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_tahun5` decimal(20, 2) NULL DEFAULT 0.00,
  `angka_akhir_periode` decimal(20, 2) NULL DEFAULT 0.00,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_indikator_tujuan_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_tujuan_indikator`(`thn_id`, `id_tujuan_rpjmd`, `id_indikator_tujuan_rpjmd`, `id_perubahan`, `kd_indikator`, `no_urut`) USING BTREE,
  INDEX `fk_trx_rpjmd_tujuan_indikator`(`id_tujuan_rpjmd`) USING BTREE,
  CONSTRAINT `trx_rpjmd_tujuan_indikator_ibfk_1` FOREIGN KEY (`id_tujuan_rpjmd`) REFERENCES `trx_rpjmd_tujuan` (`id_tujuan_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_rpjmd_visi
-- ----------------------------
DROP TABLE IF EXISTS `trx_rpjmd_visi`;
CREATE TABLE `trx_rpjmd_visi`  (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_perubahan` int(11) NOT NULL DEFAULT 0,
  `uraian_visi_rpjmd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_visi_rpjmd`) USING BTREE,
  UNIQUE INDEX `idx_trx_rpjmd_visi`(`id_rpjmd`, `no_urut`, `thn_id`, `id_visi_rpjmd`, `id_perubahan`) USING BTREE,
  CONSTRAINT `fk_trx_rpjmd_visi` FOREIGN KEY (`id_rpjmd`) REFERENCES `trx_rpjmd_dokumen` (`id_rpjmd_old`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for trx_usulan_kab
-- ----------------------------
DROP TABLE IF EXISTS `trx_usulan_kab`;
CREATE TABLE `trx_usulan_kab`  (
  `id_usulan_kab` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT 0,
  `sumber_usulan` int(11) NOT NULL DEFAULT 0,
  `judul_usulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `uraian_usulan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `volume` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `id_satuan` int(11) NULL DEFAULT NULL,
  `pagu` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `created_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `entry_by` int(255) NOT NULL,
  PRIMARY KEY (`id_usulan_kab`) USING BTREE,
  UNIQUE INDEX `id_tahun`(`id_tahun`, `id_kab`, `id_unit`, `no_urut`) USING BTREE,
  INDEX `id_kab`(`id_kab`) USING BTREE,
  INDEX `id_unit`(`id_unit`) USING BTREE,
  CONSTRAINT `trx_usulan_kab_ibfk_1` FOREIGN KEY (`id_kab`) REFERENCES `ref_kabupaten` (`id_kab`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_usulan_kab_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trx_usulan_kab_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `trx_usulan_kab_lokasi`;
CREATE TABLE `trx_usulan_kab_lokasi`  (
  `id_usulan_kab` int(11) NOT NULL,
  `id_usulan_kab_lokasi` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT 1,
  `id_lokasi` int(11) NOT NULL,
  `volume` decimal(20, 2) NULL DEFAULT 0.00,
  `id_satuan` int(11) NULL DEFAULT NULL,
  `uraian_lokasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usulan_kab_lokasi`) USING BTREE,
  UNIQUE INDEX `id_usulan_kab`(`id_usulan_kab`, `no_urut`, `id_lokasi`) USING BTREE,
  INDEX `id_lokasi`(`id_lokasi`) USING BTREE,
  CONSTRAINT `trx_usulan_kab_lokasi_ibfk_1` FOREIGN KEY (`id_usulan_kab`) REFERENCES `trx_usulan_kab` (`id_usulan_kab`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trx_usulan_kab_lokasi_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `ref_lokasi` (`id_lokasi`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trx_usulan_rw
-- ----------------------------
DROP TABLE IF EXISTS `trx_usulan_rw`;
CREATE TABLE `trx_usulan_rw`  (
  `id_usulan_rw` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `id_renja` bigint(20) NOT NULL,
  `id_asb_aktivitas` bigint(20) NOT NULL,
  `uraian_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `volume_aktivitas` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `pagu_aktivitas` decimal(20, 2) NOT NULL DEFAULT 0.00,
  `keterangan_aktivitas` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_usulan` int(11) NOT NULL COMMENT '0 = draft 1 = musrendes 2 = setuju musrendes',
  PRIMARY KEY (`id_usulan_rw`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_desa
-- ----------------------------
DROP TABLE IF EXISTS `user_desa`;
CREATE TABLE `user_desa`  (
  `id_user_wil` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kd_kecamatan` int(11) NOT NULL COMMENT 'prov',
  `kd_desa` int(11) NOT NULL COMMENT 'kab/kota',
  `rw` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_wil`) USING BTREE,
  UNIQUE INDEX `user_id`(`user_id`, `kd_kecamatan`, `kd_desa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_sub_unit
-- ----------------------------
DROP TABLE IF EXISTS `user_sub_unit`;
CREATE TABLE `user_sub_unit`  (
  `id_user_unit` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kd_unit` int(11) NOT NULL,
  `kd_sub` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_unit`) USING BTREE,
  UNIQUE INDEX `kd_unit`(`kd_unit`, `user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit` int(11) NULL DEFAULT NULL COMMENT 'Diisi dengan kode unit asal operator',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status_user` int(11) NOT NULL DEFAULT 1 COMMENT '0 non aktif 1 aktif',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Function structure for GantiEnter
-- ----------------------------
DROP FUNCTION IF EXISTS `GantiEnter`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GantiEnter`(`uraian` VARCHAR(1000)) RETURNS varchar(1000) CHARSET latin1
    COMMENT 'Mengganti Character Enter'
BEGIN 
  DECLARE xUraian VARCHAR(1000); 
  SET xUraian = REPLACE(uraian, '\n', ' ') ; 
  RETURN (xUraian); 
END
;;
delimiter ;

-- ----------------------------
-- Function structure for PaguASB
-- ----------------------------
DROP FUNCTION IF EXISTS `PaguASB`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `PaguASB`(jns_biaya INT,hub_driver INT,vol1 DECIMAL(15,4),vol2 DECIMAL(15,4),r1 DECIMAL(15,4),r2 DECIMAL(15,4),m1 DECIMAL(15,4) ,m2 DECIMAL(15,4), k1 DECIMAL(15,4),k2 DECIMAL(15,4),k3 DECIMAL(15,4),harga DECIMAL(15,4)) RETURNS decimal(15,4)
    DETERMINISTIC
BEGIN
		DECLARE hargax DECIMAL(15,4);
		DECLARE kmax DECIMAL(15,4);
		DECLARE rx1 DECIMAL(15,4);
		DECLARE rx2 DECIMAL(15,4);
		DECLARE koef DECIMAL(15,4);
		
		SET koef = (k1*k2*k3);
		
		IF m1 = 1 THEN
			IF m2 = 1 THEN
				SET kmax = 1;
			ELSE
				IF m1 <= m2 THEN
							SET kmax = CEILING(vol1/m1);
						ELSE
							SET kmax = CEILING(vol2/m2);
						END IF;
			END IF;
		ELSE
			IF m1 <= m2 THEN
				SET kmax = CEILING(vol2/m2);
			ELSE
				SET kmax = CEILING(vol1/m1);
			END IF;
		END IF;

    IF r1 <= 1 THEN 
			SET rx1= CEILING(vol1/vol1); 
		ELSE 
			SET rx1= CEILING(vol1/r1); 
		END IF;
		
		IF r2 <= 1 THEN 
			SET rx2= CEILING(vol2/vol2); 
		ELSE 
			SET rx2= CEILING(vol2/r2); 
		END IF;

		IF jns_biaya =1 THEN 
			SET hargax = (koef*kmax*harga);
		ELSE 			
			IF hub_driver=1 THEN 
				SET hargax = (vol1*koef*harga); 
			END IF;
			
			IF hub_driver=2 THEN 
				SET hargax = (vol2*koef*harga); 
			END IF;
			
			IF hub_driver=3 THEN 
				SET hargax = (vol1*vol2*koef*harga); 
			END IF;
			
			IF hub_driver=4 THEN 
				SET hargax = (koef*rx1*harga); 
			END IF;
			
			IF hub_driver=5 THEN 
				SET hargax = (koef*rx2*harga); 
			END IF;
			
			IF hub_driver=6 THEN 
				SET hargax = (koef*rx1*rx2*harga); 
			END IF;
			
			IF hub_driver=7 THEN 
				SET hargax = (vol2*koef*rx1*harga); 
			END IF;
			
			IF hub_driver=8 THEN 
				SET hargax = (vol1*koef*rx2*harga); 
			END IF;
			
		END IF;
 
 RETURN (hargax);
END
;;
delimiter ;

-- ----------------------------
-- Function structure for PaguASBDistribusi
-- ----------------------------
DROP FUNCTION IF EXISTS `PaguASBDistribusi`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `PaguASBDistribusi`(jns_biaya INT,hub_driver INT,vol1 DECIMAL(15,4),vol2 DECIMAL(15,4),r1 DECIMAL(15,4),r2 DECIMAL(15,4),m1 DECIMAL(15,4) ,m2 DECIMAL(15,4), k1 DECIMAL(15,4),k2 DECIMAL(15,4),k3 DECIMAL(15,4),harga DECIMAL(15,4),persen DECIMAL(15,4)) RETURNS decimal(15,4)
    DETERMINISTIC
BEGIN
		DECLARE hargax DECIMAL(15,4);
		DECLARE kmax DECIMAL(15,4);
		DECLARE rx1 DECIMAL(15,4);
		DECLARE rx2 DECIMAL(15,4);
		DECLARE koef DECIMAL(15,4);
		DECLARE koef_dis DECIMAL(15,4);
		
		SET koef = (k1*k2*k3);
		
		IF persen <= 0 OR persen > 100 THEN 
			SET koef_dis = 1;
		ELSE
			SET koef_dis = persen/100;
		END IF;
		
		IF m1 = 1 THEN
			IF m2 = 1 THEN
				SET kmax = 1;
			ELSE
				IF m1 <= m2 THEN
							SET kmax = CEILING(vol1/m1);
						ELSE
							SET kmax = CEILING(vol2/m2);
						END IF;
			END IF;
		ELSE
			IF m1 <= m2 THEN
				SET kmax = CEILING(vol1/m1);
			ELSE
				SET kmax = CEILING(vol2/m2);
			END IF;
		END IF;

    IF r1 <= 1 THEN 
			SET rx1= CEILING(vol1/vol1); 
		ELSE 
			SET rx1= CEILING(vol1/r1); 
		END IF;
		
		IF r2 <= 1 THEN 
			SET rx2= CEILING(vol2/vol2); 
		ELSE 
			SET rx2= CEILING(vol2/r2); 
		END IF;

		IF jns_biaya =1 THEN 
			SET hargax = (koef*kmax*harga*koef_dis); 
		END IF;
		
		IF jns_biaya =2 AND hub_driver=1 THEN 
			SET hargax = (vol1*koef*rx1*harga); 
		END IF;
		
		IF jns_biaya =2 AND hub_driver=2 THEN 
			SET hargax = (vol2*koef*rx2*harga); 
		END IF;
		
		IF jns_biaya =3 AND hub_driver=1 THEN 
			SET hargax = (vol1*koef*harga); 
		END IF;
		
		IF jns_biaya =3 AND hub_driver=2 THEN 
			SET hargax = (vol2*koef*harga); 
		END IF;
		
		IF jns_biaya =3 AND hub_driver=3 THEN 
			SET hargax = (vol1*vol2*koef*harga); 
		END IF;
 
 RETURN (hargax);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for setAutoIncrement
-- ----------------------------
DROP PROCEDURE IF EXISTS `setAutoIncrement`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `setAutoIncrement`()
BEGIN
DECLARE done int default false;
    DECLARE table_name CHAR(255);
DECLARE cur1 cursor for SELECT t.table_name FROM INFORMATION_SCHEMA.TABLES t 
        WHERE t.table_schema = "dbsimcan_master";

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    open cur1;

    myloop: loop
        fetch cur1 into table_name;
        if done then
            leave myloop;
        end if;
        set @sql = CONCAT('ALTER TABLE ',table_name, ' AUTO_INCREMENT = 1');
        prepare stmt from @sql;
        execute stmt;
        drop prepare stmt;
    end loop;

    close cur1;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_group
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_egroup`;
delimiter ;;
CREATE TRIGGER `trg_egroup` BEFORE UPDATE ON `ref_group` FOR EACH ROW IF old.id = 1 OR old.name ='super_admin' THEN 
    SIGNAL SQLSTATE '45000' 
    SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to update it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_group
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_group`;
delimiter ;;
CREATE TRIGGER `trg_group` BEFORE DELETE ON `ref_group` FOR EACH ROW IF old.id = 1 OR old.name ='super_admin' THEN 
    SIGNAL SQLSTATE '45000' 
    SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_ref_menu_c`;
delimiter ;;
CREATE TRIGGER `trg_ref_menu_c` BEFORE INSERT ON `ref_menu` FOR EACH ROW IF new.group_id = 0 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'You are not allowed to insert it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_ref_menu_u`;
delimiter ;;
CREATE TRIGGER `trg_ref_menu_u` BEFORE UPDATE ON `ref_menu` FOR EACH ROW IF old.group_id = 0 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to update it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table ref_menu
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_ref_menu_d`;
delimiter ;;
CREATE TRIGGER `trg_ref_menu_d` BEFORE DELETE ON `ref_menu` FOR EACH ROW IF old.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table trx_group_menu
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_agroup_menu`;
delimiter ;;
CREATE TRIGGER `trg_agroup_menu` BEFORE INSERT ON `trx_group_menu` FOR EACH ROW IF new.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'You are not allowed to insert it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table trx_group_menu
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_egroup_menu`;
delimiter ;;
CREATE TRIGGER `trg_egroup_menu` BEFORE UPDATE ON `trx_group_menu` FOR EACH ROW IF old.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to update it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table trx_group_menu
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_group_menu`;
delimiter ;;
CREATE TRIGGER `trg_group_menu` BEFORE DELETE ON `trx_group_menu` FOR EACH ROW IF old.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table users
-- ----------------------------
DROP TRIGGER IF EXISTS `trg_user`;
delimiter ;;
CREATE TRIGGER `trg_user` BEFORE DELETE ON `users` FOR EACH ROW IF old.email = 'super@simcan.dev' THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
