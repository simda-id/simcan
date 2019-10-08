-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2019 at 11:08 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.6.31

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsimcan_simulasi_merah`
--

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_cascading_indikator_kegiatan_pd`
--

DROP TABLE IF EXISTS `kin_trx_cascading_indikator_kegiatan_pd`;
CREATE TABLE `kin_trx_cascading_indikator_kegiatan_pd` (
  `id_indikator_kegiatan_pd` int(11) NOT NULL,
  `id_hasil_kegiatan` int(11) NOT NULL DEFAULT '0',
  `id_renstra_kegiatan_indikator` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_cascading_indikator_program_pd`
--

DROP TABLE IF EXISTS `kin_trx_cascading_indikator_program_pd`;
CREATE TABLE `kin_trx_cascading_indikator_program_pd` (
  `id_indikator_program_pd` int(11) NOT NULL,
  `id_hasil_program` int(11) NOT NULL DEFAULT '0',
  `id_renstra_program_indikator` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_cascading_kegiatan_opd`
--

DROP TABLE IF EXISTS `kin_trx_cascading_kegiatan_opd`;
CREATE TABLE `kin_trx_cascading_kegiatan_opd` (
  `id_hasil_kegiatan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_hasil_program` int(11) NOT NULL DEFAULT '0',
  `id_renstra_kegiatan` int(11) NOT NULL DEFAULT '0',
  `uraian_hasil_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_cascading_program_opd`
--

DROP TABLE IF EXISTS `kin_trx_cascading_program_opd`;
CREATE TABLE `kin_trx_cascading_program_opd` (
  `id_hasil_program` int(11) NOT NULL,
  `tahun` int(11) NOT NULL DEFAULT '2019',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `id_renstra_sasaran` int(11) NOT NULL DEFAULT '0',
  `id_renstra_program` int(11) NOT NULL DEFAULT '0',
  `uraian_hasil_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_iku_opd_dok`
--

DROP TABLE IF EXISTS `kin_trx_iku_opd_dok`;
CREATE TABLE `kin_trx_iku_opd_dok` (
  `id_dokumen` int(11) NOT NULL,
  `no_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date NOT NULL,
  `uraian_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_renstra` int(11) NOT NULL DEFAULT '1',
  `id_perubahan` int(11) DEFAULT NULL,
  `status_dokumen` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_unit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_iku_opd_kegiatan`
--

DROP TABLE IF EXISTS `kin_trx_iku_opd_kegiatan`;
CREATE TABLE `kin_trx_iku_opd_kegiatan` (
  `id_iku_opd_kegiatan` int(11) NOT NULL,
  `id_iku_opd_program` int(11) NOT NULL,
  `id_indikator_kegiatan_renstra` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_esl4` int(11) NOT NULL DEFAULT '0',
  `id_kegiatan_renstra` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_iku_opd_program`
--

DROP TABLE IF EXISTS `kin_trx_iku_opd_program`;
CREATE TABLE `kin_trx_iku_opd_program` (
  `id_iku_opd_program` int(11) NOT NULL,
  `id_iku_opd_sasaran` int(11) NOT NULL,
  `id_indikator_program_renstra` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_program_renstra` int(11) NOT NULL DEFAULT '0',
  `id_esl3` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_iku_opd_sasaran`
--

DROP TABLE IF EXISTS `kin_trx_iku_opd_sasaran`;
CREATE TABLE `kin_trx_iku_opd_sasaran` (
  `id_iku_opd_sasaran` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `id_indikator_sasaran_renstra` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_sasaran_renstra` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_iku_pemda_dok`
--

DROP TABLE IF EXISTS `kin_trx_iku_pemda_dok`;
CREATE TABLE `kin_trx_iku_pemda_dok` (
  `id_dokumen` int(11) NOT NULL,
  `no_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date NOT NULL,
  `uraian_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rpjmd` int(11) NOT NULL DEFAULT '1',
  `id_perubahan` int(11) DEFAULT NULL,
  `status_dokumen` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_iku_pemda_rinci`
--

DROP TABLE IF EXISTS `kin_trx_iku_pemda_rinci`;
CREATE TABLE `kin_trx_iku_pemda_rinci` (
  `id_iku_pemda` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unit_penanggung_jawab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es3_dok`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es3_dok`;
CREATE TABLE `kin_trx_perkin_es3_dok` (
  `id_dokumen_perkin` int(11) NOT NULL,
  `id_sotk_es3` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT '2018-01-01',
  `id_pegawai` int(11) NOT NULL DEFAULT '0',
  `nama_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT '0',
  `uraian_pangkat_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_penandatangan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es3_kegiatan`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es3_kegiatan`;
CREATE TABLE `kin_trx_perkin_es3_kegiatan` (
  `id_perkin_kegiatan` int(11) NOT NULL,
  `id_perkin_program` int(11) DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_sotk_es4` int(11) NOT NULL DEFAULT '0',
  `status_data` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es3_program`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es3_program`;
CREATE TABLE `kin_trx_perkin_es3_program` (
  `id_perkin_program` int(11) NOT NULL,
  `id_dokumen_perkin` int(11) NOT NULL DEFAULT '0',
  `id_perkin_program_opd` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es3_program_indikator`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es3_program_indikator`;
CREATE TABLE `kin_trx_perkin_es3_program_indikator` (
  `id_perkin_indikator` int(11) NOT NULL,
  `id_perkin_program` int(11) DEFAULT NULL,
  `id_indikator_program_renstra` int(11) DEFAULT NULL,
  `target_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t2` decimal(20,2) NOT NULL,
  `target_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es4_dok`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es4_dok`;
CREATE TABLE `kin_trx_perkin_es4_dok` (
  `id_dokumen_perkin` int(11) NOT NULL,
  `id_sotk_es4` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT '2018-01-01',
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT '0',
  `uraian_pangkat_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_penandatangan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es4_kegiatan`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es4_kegiatan`;
CREATE TABLE `kin_trx_perkin_es4_kegiatan` (
  `id_perkin_kegiatan` int(11) NOT NULL,
  `id_dokumen_perkin` int(11) NOT NULL DEFAULT '0',
  `id_perkin_kegiatan_es3` int(11) DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t2` decimal(20,2) NOT NULL,
  `pagu_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_es4_kegiatan_indikator`
--

DROP TABLE IF EXISTS `kin_trx_perkin_es4_kegiatan_indikator`;
CREATE TABLE `kin_trx_perkin_es4_kegiatan_indikator` (
  `id_perkin_indikator` int(11) NOT NULL,
  `id_perkin_kegiatan` int(11) DEFAULT NULL,
  `id_indikator_kegiatan_renstra` int(11) DEFAULT NULL,
  `target_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t2` decimal(20,2) NOT NULL,
  `target_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_opd_dok`
--

DROP TABLE IF EXISTS `kin_trx_perkin_opd_dok`;
CREATE TABLE `kin_trx_perkin_opd_dok` (
  `id_dokumen_perkin` int(11) NOT NULL,
  `id_sotk_es2` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT '2018-01-01',
  `id_pegawai` int(11) NOT NULL DEFAULT '0',
  `nama_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT '0',
  `uraian_pangkat_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_penandatangan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_opd_program`
--

DROP TABLE IF EXISTS `kin_trx_perkin_opd_program`;
CREATE TABLE `kin_trx_perkin_opd_program` (
  `id_perkin_program` int(11) NOT NULL,
  `id_perkin_sasaran` int(11) NOT NULL,
  `id_hasil_program` int(11) NOT NULL DEFAULT '0',
  `id_program_renstra` int(11) NOT NULL,
  `id_sotk_es3` int(11) NOT NULL DEFAULT '0',
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_opd_program_indikator`
--

DROP TABLE IF EXISTS `kin_trx_perkin_opd_program_indikator`;
CREATE TABLE `kin_trx_perkin_opd_program_indikator` (
  `id_perkin_indikator` bigint(255) NOT NULL,
  `id_perkin_program` bigint(255) NOT NULL,
  `id_indikator_program_pd` bigint(255) NOT NULL,
  `id_renstra_program_indikator` bigint(255) NOT NULL,
  `jml_target` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_opd_program_pelaksana`
--

DROP TABLE IF EXISTS `kin_trx_perkin_opd_program_pelaksana`;
CREATE TABLE `kin_trx_perkin_opd_program_pelaksana` (
  `id_perkin_pelaksana` bigint(255) NOT NULL,
  `id_perkin_indikator` bigint(255) NOT NULL,
  `id_sotk_es3` bigint(255) NOT NULL,
  `jml_target` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_opd_sasaran`
--

DROP TABLE IF EXISTS `kin_trx_perkin_opd_sasaran`;
CREATE TABLE `kin_trx_perkin_opd_sasaran` (
  `id_perkin_sasaran` int(11) NOT NULL,
  `id_dokumen_perkin` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_perkin_opd_sasaran_indikator`
--

DROP TABLE IF EXISTS `kin_trx_perkin_opd_sasaran_indikator`;
CREATE TABLE `kin_trx_perkin_opd_sasaran_indikator` (
  `id_perkin_indikator` int(11) NOT NULL,
  `id_perkin_sasaran` int(11) DEFAULT NULL,
  `id_indikator_sasaran_renstra` int(11) DEFAULT NULL,
  `target_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t2` decimal(20,2) NOT NULL,
  `target_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es2_dok`
--

DROP TABLE IF EXISTS `kin_trx_real_es2_dok`;
CREATE TABLE `kin_trx_real_es2_dok` (
  `id_dokumen_real` int(11) NOT NULL,
  `id_dokumen_perkin` int(11) DEFAULT NULL,
  `id_sotk_es2` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `triwulan` int(11) NOT NULL DEFAULT '1',
  `no_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT '0',
  `uraian_pangkat_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_penandatangan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es2_program`
--

DROP TABLE IF EXISTS `kin_trx_real_es2_program`;
CREATE TABLE `kin_trx_real_es2_program` (
  `id_real_program` int(11) NOT NULL,
  `id_real_sasaran` int(11) NOT NULL DEFAULT '0',
  `id_real_program_es3` int(11) DEFAULT NULL,
  `id_perkin_program` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t2` decimal(20,2) NOT NULL,
  `pagu_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es2_sasaran`
--

DROP TABLE IF EXISTS `kin_trx_real_es2_sasaran`;
CREATE TABLE `kin_trx_real_es2_sasaran` (
  `id_real_sasaran` int(11) NOT NULL,
  `id_dokumen_real` int(11) DEFAULT NULL,
  `id_perkin_sasaran` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es2_sasaran_indikator`
--

DROP TABLE IF EXISTS `kin_trx_real_es2_sasaran_indikator`;
CREATE TABLE `kin_trx_real_es2_sasaran_indikator` (
  `id_real_indikator` int(11) NOT NULL,
  `id_real_sasaran` int(11) DEFAULT NULL,
  `id_perkin_indikator` int(11) DEFAULT NULL,
  `id_indikator_sasaran_renstra` int(11) DEFAULT NULL,
  `target_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t2` decimal(20,2) NOT NULL,
  `target_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_fisik` decimal(20,2) NOT NULL DEFAULT '0.00',
  `uraian_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es3_dok`
--

DROP TABLE IF EXISTS `kin_trx_real_es3_dok`;
CREATE TABLE `kin_trx_real_es3_dok` (
  `id_dokumen_real` int(11) NOT NULL,
  `id_dokumen_perkin` int(11) DEFAULT NULL,
  `id_sotk_es3` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `triwulan` int(11) NOT NULL DEFAULT '1',
  `no_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT '0',
  `uraian_pangkat_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_penandatangan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es3_kegiatan`
--

DROP TABLE IF EXISTS `kin_trx_real_es3_kegiatan`;
CREATE TABLE `kin_trx_real_es3_kegiatan` (
  `id_real_kegiatan` int(11) NOT NULL,
  `id_real_program` int(11) NOT NULL DEFAULT '0',
  `id_perkin_kegiatan` int(11) DEFAULT NULL,
  `id_real_kegiatan_es4` int(11) DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t2` decimal(20,2) NOT NULL,
  `pagu_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_real_kegiatan_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es3_program`
--

DROP TABLE IF EXISTS `kin_trx_real_es3_program`;
CREATE TABLE `kin_trx_real_es3_program` (
  `id_real_program` int(11) NOT NULL,
  `id_dokumen_real` int(11) NOT NULL DEFAULT '0',
  `id_perkin_program` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t2` decimal(20,2) NOT NULL,
  `pagu_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `uraian_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es3_program_indikator`
--

DROP TABLE IF EXISTS `kin_trx_real_es3_program_indikator`;
CREATE TABLE `kin_trx_real_es3_program_indikator` (
  `id_real_indikator` int(11) NOT NULL,
  `id_real_program` int(11) NOT NULL,
  `id_perkin_indikator` int(11) DEFAULT NULL,
  `id_indikator_program_renstra` int(11) DEFAULT NULL,
  `target_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t2` decimal(20,2) NOT NULL,
  `target_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_fisik` decimal(20,2) NOT NULL DEFAULT '0.00',
  `uraian_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reviu_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviu_real` decimal(20,2) NOT NULL DEFAULT '0.00',
  `reviu_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es4_dok`
--

DROP TABLE IF EXISTS `kin_trx_real_es4_dok`;
CREATE TABLE `kin_trx_real_es4_dok` (
  `id_dokumen_real` int(11) NOT NULL,
  `id_dokumen_perkin` int(11) DEFAULT NULL,
  `id_sotk_es4` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `triwulan` int(11) NOT NULL DEFAULT '1',
  `no_dokumen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat_penandatangan` int(11) NOT NULL DEFAULT '0',
  `uraian_pangkat_penandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_penandatangan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es4_kegiatan`
--

DROP TABLE IF EXISTS `kin_trx_real_es4_kegiatan`;
CREATE TABLE `kin_trx_real_es4_kegiatan` (
  `id_real_kegiatan` int(11) NOT NULL,
  `id_dokumen_real` int(11) NOT NULL DEFAULT '0',
  `id_perkin_kegiatan` int(11) DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `pagu_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t2` decimal(20,2) NOT NULL,
  `pagu_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(2) DEFAULT NULL,
  `uraian_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kin_trx_real_es4_kegiatan_indikator`
--

DROP TABLE IF EXISTS `kin_trx_real_es4_kegiatan_indikator`;
CREATE TABLE `kin_trx_real_es4_kegiatan_indikator` (
  `id_real_indikator` int(11) NOT NULL,
  `id_real_kegiatan` int(11) DEFAULT NULL,
  `id_perkin_indikator` int(11) DEFAULT NULL,
  `id_indikator_kegiatan_renstra` int(11) DEFAULT NULL,
  `target_tahun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t2` decimal(20,2) NOT NULL,
  `target_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t2` decimal(20,2) NOT NULL,
  `real_t3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_t4` decimal(20,2) NOT NULL DEFAULT '0.00',
  `real_fisik` decimal(20,2) NOT NULL,
  `uraian_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reviu_renaksi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviu_deviasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviu_real` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_api_manajemen`
--

DROP TABLE IF EXISTS `ref_api_manajemen`;
CREATE TABLE `ref_api_manajemen` (
  `id_setting` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `url_api` varchar(255) DEFAULT NULL,
  `key_barrier` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_aspek_pembangunan`
--

DROP TABLE IF EXISTS `ref_aspek_pembangunan`;
CREATE TABLE `ref_aspek_pembangunan` (
  `id_aspek` int(11) NOT NULL,
  `uraian_aspek_pembangunan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ref_aspek_pembangunan`
--

INSERT INTO `ref_aspek_pembangunan` (`id_aspek`, `uraian_aspek_pembangunan`, `status_data`, `created_at`, `updated_at`) VALUES
(1, 'Aspek Geografi dan Demografi', 0, '2019-03-09 05:37:26', '2019-03-09 05:37:51'),
(2, 'Aspek Kesejahteraan Masyarakat', 0, '2019-03-09 05:37:40', '2019-03-09 05:37:40'),
(3, 'Aspek Pelayanan Umum', 0, '2019-03-09 05:38:15', '2019-03-09 05:38:15'),
(4, 'Aspek Daya Saing Daerah', 0, '2019-03-09 05:38:31', '2019-03-09 05:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `ref_bidang`
--

DROP TABLE IF EXISTS `ref_bidang`;
CREATE TABLE `ref_bidang` (
  `id_bidang` int(11) NOT NULL,
  `kd_urusan` int(255) NOT NULL,
  `kd_bidang` int(255) NOT NULL,
  `nm_bidang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_fungsi` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_bidang`
--

INSERT INTO `ref_bidang` (`id_bidang`, `kd_urusan`, `kd_bidang`, `nm_bidang`, `kd_fungsi`) VALUES
(1, 1, 1, 'Pendidikan', 10),
(2, 1, 2, 'Kesehatan', 7),
(3, 1, 3, 'Pekerjaan Umum dan Penataan Ruang', 6),
(4, 1, 4, 'Perumahan Rakyat dan Kawasan Pemukiman', 6),
(5, 1, 5, 'Ketentraman dan Ketertiban Umum serta Perlindungan Masyarakat', 3),
(6, 1, 6, 'Sosial', 11),
(7, 2, 1, 'Tenaga Kerja', 4),
(8, 2, 2, 'Pemberdayaan Perempuan dan Perlindungan Anak', 11),
(9, 2, 3, 'Pangan', 1),
(10, 2, 4, 'Pertanahan', 5),
(11, 2, 5, 'Lingkungan Hidup', 5),
(12, 2, 6, 'Administrasi Kependudukan dan Capil', 11),
(13, 2, 7, 'Pemberdayaan Masyarakat Desa', 4),
(14, 2, 8, 'Pengendalian Penduduk dan Keluarga Berencana', 7),
(15, 2, 9, 'Perhubungan', 4),
(16, 2, 10, 'Komunikasi dan Informatika', 1),
(17, 2, 11, 'Koperasi, Usaha Kecil dan Menengah', 4),
(18, 2, 12, 'Penanaman Modal', 4),
(19, 2, 13, 'Kepemudaan dan Olah Raga', 10),
(20, 2, 14, 'Statistik', 1),
(21, 2, 15, 'Persandian', 1),
(22, 2, 16, 'Kebudayaan', 8),
(23, 2, 17, 'Perpustakaan', 10),
(24, 2, 18, 'Kearsipan', 1),
(25, 3, 1, 'Kelautan dan Perikanan', 4),
(26, 3, 2, 'Pariwisata', 8),
(27, 3, 3, 'Pertanian', 4),
(28, 3, 4, 'Kehutanan', 4),
(29, 3, 5, 'Energi dan Sumberdaya Mineral', 4),
(30, 3, 6, 'Perdagangan', 4),
(31, 3, 7, 'Perindustrian', 4),
(32, 3, 8, 'Transmigrasi', 4),
(33, 4, 1, 'Administrasi Pemerintahan', 1),
(34, 4, 2, 'Pengawasan', 1),
(35, 4, 3, 'Perencanaan', 1),
(36, 4, 4, 'Keuangan', 1),
(37, 4, 5, 'Kepegawaian', 1),
(38, 4, 6, 'Pendidikan dan Pelatihan', 1),
(39, 4, 7, 'Penelitian dan Pengembangan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_data_sub_unit`
--

DROP TABLE IF EXISTS `ref_data_sub_unit`;
CREATE TABLE `ref_data_sub_unit` (
  `tahun` int(11) NOT NULL,
  `id_rincian_unit` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `alamat_sub_unit` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_sub_unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jabatan_pimpinan_skpd` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pimpinan_skpd` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_pimpinan_skpd` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_desa`
--

DROP TABLE IF EXISTS `ref_desa`;
CREATE TABLE `ref_desa` (
  `id_kecamatan` int(11) NOT NULL,
  `kd_desa` int(11) NOT NULL COMMENT 'kode desa / kelurahan',
  `id_desa` int(11) NOT NULL,
  `status_desa` int(11) NOT NULL COMMENT '2 = Desa 1 = Kelurahan',
  `nama_desa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_dokumen`
--

DROP TABLE IF EXISTS `ref_dokumen`;
CREATE TABLE `ref_dokumen` (
  `id_dokumen` int(255) NOT NULL,
  `nm_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_proses` int(11) NOT NULL DEFAULT '0' COMMENT '0 = rkpd 1 = renja 2 = rpjmd 3 = renstra',
  `urut_tampil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_dokumen`
--

INSERT INTO `ref_dokumen` (`id_dokumen`, `nm_dokumen`, `jenis_proses`, `urut_tampil`) VALUES
(0, 'RPJMD Rancangan Revisi', 1, 7),
(1, 'Rancangan Awal RPJMD', 1, 1),
(2, 'Rancangan RPJMD', 1, 2),
(3, 'Musrenbang RPJMD', 1, 3),
(4, 'Rancangan Akhir RPJMD', 1, 4),
(5, 'RPJMD Final', 1, 5),
(6, 'RPJMD Final Revisi', 1, 7),
(7, 'Rancangan Awal Renstra Perangkat Daerah', 2, 2),
(8, 'Rancangan Akhir Renstra Perangkat Daerah', 2, 6),
(9, 'Renstra Perangkat Daerah Final', 2, 7),
(10, 'Renstra Perangkat Daerah Revisi', 2, 9),
(11, 'Rancangan Awal RKPD', 3, 1),
(12, 'Rancangan RKPD', 3, 2),
(13, 'Rancangan Akhir RKPD', 3, 3),
(14, 'RKPD Final', 3, 4),
(15, 'Rancangan Awal Renja Perangkat Daerah', 4, 1),
(16, 'Rancangan Renja Perangkat Daerah', 4, 2),
(17, 'Renja Perangkat Daerah Final', 4, 3),
(18, 'Musrenbang RKPD Desa/Kelurahan', 5, 1),
(19, 'Musrenbang RKPD Kecamatan', 5, 2),
(20, 'Musrenbang RKPD Kabupaten/Kota', 5, 3),
(21, 'Musrenbang RKPD Propinsi', 5, 4),
(23, 'Renstra Rancangan Revisi', 2, 8),
(24, 'Renstra Teknokratik', 2, 1),
(25, 'Penyesuaian Musrenbang RPJMD', 2, 5),
(26, 'Rancangan Renstra Perangkat Daerah', 2, 4),
(27, 'Forum Perangkat Daerah/Lintas PD', 2, 3),
(28, 'RPJMD Teknokratik', 1, 0),
(50, 'PPAS Murni', 7, 1),
(51, 'PPAS Perubahan', 7, 2),
(52, 'RAPBD Murni', 7, 3),
(53, 'APBD Murni', 7, 4),
(54, 'APBD Pergeseran 1', 7, 5),
(55, 'RAPBD Perubahan 1', 7, 6),
(56, 'APBD Perubahan 1', 7, 7),
(57, 'APBD Pergeseran 2', 7, 8),
(58, 'Parameter', 0, 1),
(59, 'SSH', 0, 2),
(60, 'ASB', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ref_fungsi`
--

DROP TABLE IF EXISTS `ref_fungsi`;
CREATE TABLE `ref_fungsi` (
  `kd_fungsi` int(11) NOT NULL,
  `nm_fungsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_fungsi`
--

INSERT INTO `ref_fungsi` (`kd_fungsi`, `nm_fungsi`) VALUES
(1, 'Pelayanan Umum'),
(2, 'Pertahanan'),
(3, 'Ketertiban dan Keamanan'),
(4, 'Ekonomi'),
(5, 'Lingkungan Hidup'),
(6, 'Perumahan dan Fasilitas Umum'),
(7, 'Kesehatan'),
(8, 'Pariwisata dan Budaya'),
(9, 'Agama'),
(10, 'Pendidikan'),
(11, 'Perlindungan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `ref_group`
--

DROP TABLE IF EXISTS `ref_group`;
CREATE TABLE `ref_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_roles` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_group`
--

INSERT INTO `ref_group` (`id`, `name`, `id_roles`, `keterangan`) VALUES
(1, 'super_admin', 0, 'Group user yang memiliki kewenangan super admin'),
(2, 'Admin', 0, 'Administrator SKPD');

-- --------------------------------------------------------

--
-- Table structure for table `ref_indikator`
--

DROP TABLE IF EXISTS `ref_indikator`;
CREATE TABLE `ref_indikator` (
  `id_indikator` int(11) NOT NULL,
  `type_indikator` int(11) NOT NULL DEFAULT '0' COMMENT '0 keluaran 1 hasil 2 dampak 3 masukan',
  `jenis_indikator` int(11) NOT NULL DEFAULT '0' COMMENT '1 positif 0 negatif',
  `sifat_indikator` int(11) NOT NULL DEFAULT '0' COMMENT '1 Incremental 2 Absolut  3 Komulatif',
  `nm_indikator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_iku` int(11) NOT NULL DEFAULT '0' COMMENT '0 non iku 1 iku pemda 2 iku skpd',
  `asal_indikator` int(11) DEFAULT '0' COMMENT '0 rpjmd 1 renstra 2 rkpd 3 renja',
  `metode_penghitungan` blob COMMENT 'file image ',
  `sumber_data_indikator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_satuan_output` int(255) DEFAULT NULL,
  `kualitas_indikator` int(255) NOT NULL DEFAULT '0' COMMENT '0 kualitas 1 kuantitas 2 persentase 3 rata-rata 4 rasio',
  `id_bidang` int(11) NOT NULL DEFAULT '0',
  `id_aspek` int(11) NOT NULL DEFAULT '0',
  `nama_file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_jadwal`
--

DROP TABLE IF EXISTS `ref_jadwal`;
CREATE TABLE `ref_jadwal` (
  `tahun` int(11) NOT NULL,
  `id_proses` int(11) NOT NULL,
  `id_langkah` int(11) NOT NULL,
  `jenis_proses` int(11) NOT NULL DEFAULT '0' COMMENT '0 = rkpd 1 = renja 2 = rpjmd 3 = renstra',
  `uraian_proses` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `status_proses` int(255) DEFAULT '0' COMMENT '0 = belum 1 = proses 2 = selesai 3 = kedaluwarsa 4 = batal',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenis_lokasi`
--

DROP TABLE IF EXISTS `ref_jenis_lokasi`;
CREATE TABLE `ref_jenis_lokasi` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_jenis_lokasi`
--

INSERT INTO `ref_jenis_lokasi` (`id_jenis`, `nm_jenis`) VALUES
(0, 'Kewilayahan'),
(1, 'Jalan Lokal Primer'),
(2, 'Jalan Kolektor Primer'),
(3, 'Jalan Sekunder'),
(4, 'Daerah Irigasi Teknis'),
(5, 'Daerah Irigasi Semi Teknis'),
(6, 'Daerah Irigasi Sederhana'),
(99, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kabupaten`
--

DROP TABLE IF EXISTS `ref_kabupaten`;
CREATE TABLE `ref_kabupaten` (
  `id_pemda` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `kd_kab` int(11) NOT NULL,
  `nama_kab_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kecamatan`
--

DROP TABLE IF EXISTS `ref_kecamatan`;
CREATE TABLE `ref_kecamatan` (
  `id_pemda` int(11) NOT NULL,
  `kd_kecamatan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kegiatan`
--

DROP TABLE IF EXISTS `ref_kegiatan`;
CREATE TABLE `ref_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `nm_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kolom_tabel_dasar`
--

DROP TABLE IF EXISTS `ref_kolom_tabel_dasar`;
CREATE TABLE `ref_kolom_tabel_dasar` (
  `id_kolom_tabel_dasar` int(11) NOT NULL,
  `id_tabel_dasar` int(11) DEFAULT NULL,
  `nama_kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_langkah`
--

DROP TABLE IF EXISTS `ref_langkah`;
CREATE TABLE `ref_langkah` (
  `id_langkah` int(255) NOT NULL,
  `jenis_dokumen` int(255) NOT NULL,
  `nm_langkah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_langkah`
--

INSERT INTO `ref_langkah` (`id_langkah`, `jenis_dokumen`, `nm_langkah`) VALUES
(1, 1, 'Penyusunan Rancangan Awal RPJMD'),
(2, 7, 'Penyusunan Rancangan Awal Renstra SKPD'),
(3, 1, 'Sinkronisasi Ranwal RPJMD dengan Ranwal Renstra SKPD'),
(4, 2, 'Finalisasi Rancangan RPJMD'),
(5, 3, 'Musrenbang RPJMD'),
(6, 4, 'Penyusunan Rancangan Akhir RPJMD'),
(7, 4, 'Konsultasi Rancangan RPJMD oleh Kementrian/Provinsi'),
(8, 4, 'Finalisasi Rancangan Akhir RPJMD'),
(9, 8, 'Sinkronisasi Rancangan Renstra SKPD dengan Rankhir RPJMD'),
(10, 5, 'Pembahasan RPJMD dengan DPRD'),
(11, 5, 'Finalisasi RPJMD'),
(12, 8, 'Penyusunan Rancangan Akhir Renstra SKPD'),
(13, 9, 'Finalisasi Renstra SKPD'),
(15, 11, 'Rancangan Awal RKPD'),
(16, 12, 'Rancangan RKPD'),
(17, 13, 'Rancangan Akhir RKPD'),
(18, 14, 'RKPD Final'),
(19, 15, 'Rancangan Awal Renja Perangkat Daerah'),
(20, 16, 'Rancangan Renja Perangkat Daerah'),
(21, 17, 'Renja Perangkat Daerah Final'),
(22, 18, 'Musrenbang RKPD Desa/Kelurahan'),
(23, 19, 'Musrenbang RKPD Kecamatan'),
(24, 20, 'Forum Perangkat Daerah'),
(25, 21, 'Musrenbang RKPD Kabupaten Kota');

-- --------------------------------------------------------

--
-- Table structure for table `ref_laporan`
--

DROP TABLE IF EXISTS `ref_laporan`;
CREATE TABLE `ref_laporan` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `id_modul` int(11) NOT NULL DEFAULT '0' COMMENT '0 : Parameter 1 : SSH 2 : ASB 3 : RPJMD 4 : Renstra 5 : RKPD 6 : Renja 7 : Forum 8 : Musrenbang 9 : Pokir 10 : PPAS 11 : RAPBD : 12 APBD ',
  `id_dokumen` int(11) NOT NULL DEFAULT '0',
  `jns_laporan` int(11) NOT NULL DEFAULT '0' COMMENT '0 : Utama 1 : Manajemen',
  `id_laporan` int(11) NOT NULL DEFAULT '1',
  `no_urut` int(11) NOT NULL DEFAULT '1',
  `uraian_laporan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_laporan` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_log_akses`
--

DROP TABLE IF EXISTS `ref_log_akses`;
CREATE TABLE `ref_log_akses` (
  `id_log` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fl1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fd1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fp2` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fu3` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `fr4` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_log_1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_log_2` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_lokasi`
--

DROP TABLE IF EXISTS `ref_lokasi`;
CREATE TABLE `ref_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `jenis_lokasi` int(11) NOT NULL COMMENT '0 = Kewilayahan\r\n1 = Ruas Jalan \r\n2 = Saluran Irigasi\r\n3 = Kawasan\r\n99 = Lokasi di Luar Daerah',
  `nama_lokasi` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `id_desa_awal` int(11) DEFAULT NULL,
  `id_desa_akhir` int(11) DEFAULT NULL,
  `koordinat_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinat_4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luasan_kawasan` decimal(20,2) DEFAULT '0.00',
  `satuan_luas` int(50) DEFAULT NULL,
  `panjang` decimal(20,2) DEFAULT '0.00',
  `satuan_panjang` int(50) DEFAULT NULL,
  `lebar` decimal(20,2) DEFAULT '0.00',
  `satuan_lebar` int(11) DEFAULT NULL,
  `keterangan_lokasi` longtext CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_lokasi`
--

INSERT INTO `ref_lokasi` (`id_lokasi`, `jenis_lokasi`, `nama_lokasi`, `id_desa`, `id_desa_awal`, `id_desa_akhir`, `koordinat_1`, `koordinat_2`, `koordinat_3`, `koordinat_4`, `luasan_kawasan`, `satuan_luas`, `panjang`, `satuan_panjang`, `lebar`, `satuan_lebar`, `keterangan_lokasi`) VALUES
(1, 99, 'Luar Daerah', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 99, 'Semua Wilayah Pemda', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 99, 'Kecamatan Ngaliyan', 9999, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(4, 99, 'Kecamatan Tugu', 9999, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(5, 0, 'Kelurahan Beringin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(6, 0, 'Kelurahan Ngaliyan', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(7, 0, 'Desa Tambakaji', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(8, 0, 'Desa Wonosari', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(9, 0, 'Kelurahan Jrakah', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(10, 0, 'Desa Tugurejo', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(11, 0, 'Desa Karanganyar', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(12, 0, 'Desa Mangkang', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hasil Import'),
(13, 1, 'Jalan Watuwila I', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', -1, '2.00', 9, '7.00', 14, 'Jalan Watuwilaya I di Kecamatan Ngalaiyan'),
(14, 1, 'Jalan Watuwila II', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', -1, '2.50', 9, '7.00', 14, 'Jalan Watuwila II di Kecamatan Ngaliyan'),
(15, 1, 'Jalan Watuwila III', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', -1, '2.00', 9, '8.00', 14, 'Jalan Watuwila III di Kecamatan Ngaliyan'),
(16, 2, 'Jalan Watuwila IV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', -1, '3.00', 9, '8.00', 14, 'Jalan Watuwila IV di Kecamatan Ngaliyan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_mapping_asb_renstra`
--

DROP TABLE IF EXISTS `ref_mapping_asb_renstra`;
CREATE TABLE `ref_mapping_asb_renstra` (
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_kegiatan_renstra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_menu`
--

DROP TABLE IF EXISTS `ref_menu`;
CREATE TABLE `ref_menu` (
  `id_menu` bigint(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `akses` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_menu`
--

INSERT INTO `ref_menu` (`id_menu`, `group_id`, `menu`, `akses`) VALUES
(1, 1, 9, '11100'),
(2, 2, 9, '11100'),
(3, 7, 9, '11100'),
(5, 7, 20, '11100'),
(7, 7, 30, '11100'),
(8, 2, 101, '11100'),
(9, 7, 101, '11100'),
(10, 2, 102, '11100'),
(11, 7, 102, '11100'),
(12, 2, 103, '11100'),
(13, 7, 103, '11100'),
(14, 2, 105, '11100'),
(15, 7, 105, '11100'),
(16, 2, 106, '11100'),
(17, 7, 106, '11100'),
(18, 2, 107, '11100'),
(19, 7, 107, '11100'),
(20, 2, 108, '11100'),
(21, 7, 108, '11100'),
(22, 2, 109, '11100'),
(23, 7, 109, '11100'),
(24, 1, 110, '11100'),
(25, 2, 111, '11100'),
(26, 7, 111, '11100'),
(27, 2, 401, '11100'),
(28, 7, 401, '11100'),
(29, 2, 402, '11100'),
(30, 7, 402, '11100'),
(31, 2, 403, '11100'),
(32, 7, 403, '11100'),
(33, 2, 404, '11100'),
(34, 7, 404, '11100'),
(35, 2, 405, '11100'),
(36, 7, 405, '11100'),
(37, 2, 406, '11100'),
(38, 7, 406, '11100'),
(39, 2, 407, '11100'),
(40, 7, 407, '11100'),
(41, 2, 408, '11100'),
(42, 7, 408, '11100'),
(43, 2, 501, '11100'),
(44, 7, 501, '11100'),
(45, 2, 502, '11100'),
(46, 7, 502, '11100'),
(47, 2, 503, '11100'),
(48, 7, 503, '11100'),
(50, 7, 504, '11100'),
(51, 2, 601, '11100'),
(52, 7, 601, '11100'),
(53, 2, 603, '11100'),
(54, 7, 603, '11100'),
(55, 2, 604, '11100'),
(56, 7, 604, '11100'),
(57, 2, 605, '11100'),
(58, 7, 605, '11100'),
(59, 2, 606, '11100'),
(60, 7, 606, '11100'),
(61, 2, 607, '11100'),
(62, 7, 607, '11100'),
(63, 2, 608, '11100'),
(64, 7, 608, '11100'),
(65, 2, 609, '11100'),
(66, 7, 609, '11100'),
(67, 2, 701, '11100'),
(68, 7, 701, '11100'),
(69, 2, 702, '11100'),
(70, 7, 702, '11100'),
(71, 2, 801, '11100'),
(72, 7, 801, '11100'),
(73, 2, 802, '11100'),
(74, 7, 802, '11100'),
(75, 2, 803, '11100'),
(76, 7, 803, '11100'),
(77, 2, 805, '11100'),
(78, 7, 805, '11100'),
(79, 2, 806, '11100'),
(80, 7, 806, '11100'),
(81, 3, 20, '11100'),
(82, 3, 30, '11100'),
(85, 3, 501, '11100'),
(86, 3, 502, '11100'),
(87, 3, 503, '11100'),
(88, 3, 606, '11100'),
(89, 3, 607, '11100'),
(94, 2, 104, '11100'),
(97, 11, 503, '11100'),
(98, 10, 604, '11100'),
(99, 10, 605, '11100'),
(100, 9, 603, '11100'),
(101, 8, 601, '11100'),
(103, 2, 409, '11100'),
(104, 2, 611, '11100'),
(105, 2, 610, '11100'),
(106, 2, 703, '11100'),
(107, 2, 704, '11100'),
(108, 2, 710, '11100'),
(109, 2, 711, '11100'),
(110, 2, 712, '11100'),
(111, 2, 713, '11100'),
(112, 2, 910, '11100'),
(113, 2, 911, '11100'),
(114, 2, 920, '11100'),
(115, 2, 921, '11100'),
(116, 2, 930, '11100'),
(117, 2, 931, '11100'),
(118, 2, 932, '11100'),
(119, 2, 933, '11100'),
(120, 2, 934, '11100'),
(121, 2, 940, '11100'),
(122, 2, 941, '11100'),
(123, 2, 942, '11100'),
(124, 2, 950, '11100'),
(125, 3, 101, '11100'),
(126, 3, 102, '11100'),
(127, 3, 103, '11100'),
(128, 3, 105, '11100'),
(129, 3, 106, '11100'),
(130, 3, 107, '11100'),
(131, 3, 108, '11100'),
(132, 3, 111, '11100'),
(133, 3, 104, '11100'),
(134, 3, 109, '11100'),
(135, 3, 801, '11100'),
(136, 3, 802, '11100'),
(137, 3, 803, '11100'),
(138, 3, 805, '11100'),
(139, 3, 806, '11100'),
(140, 3, 901, '11100'),
(141, 3, 401, '11100'),
(142, 3, 402, '11100'),
(143, 3, 403, '11100'),
(144, 3, 404, '11100'),
(145, 3, 405, '11100'),
(146, 3, 406, '11100'),
(147, 3, 407, '11100'),
(148, 3, 408, '11100'),
(149, 3, 610, '11100'),
(150, 3, 601, '11100'),
(151, 3, 603, '11100'),
(152, 3, 604, '11100'),
(153, 3, 605, '11100'),
(154, 3, 608, '11100'),
(155, 3, 609, '11100'),
(156, 3, 611, '11100'),
(157, 3, 409, '11100'),
(158, 3, 701, '11100'),
(159, 3, 702, '11100'),
(160, 3, 703, '11100'),
(161, 3, 704, '11100'),
(162, 3, 710, '11100'),
(163, 3, 711, '11100'),
(164, 3, 712, '11100'),
(165, 3, 713, '11100'),
(166, 3, 910, '11100'),
(167, 3, 911, '11100'),
(168, 3, 920, '11100'),
(169, 3, 921, '11100'),
(170, 3, 930, '11100'),
(171, 3, 931, '11100'),
(172, 3, 932, '11100'),
(173, 3, 933, '11100'),
(174, 3, 934, '11100'),
(175, 3, 940, '11100'),
(176, 3, 941, '11100'),
(177, 3, 942, '11100'),
(178, 3, 950, '11100'),
(179, 2, 804, NULL),
(180, 2, 807, NULL),
(181, 2, 890, NULL),
(182, 2, 891, NULL),
(183, 2, 892, NULL),
(184, 2, 893, NULL),
(185, 2, 201, NULL),
(186, 2, 202, NULL),
(187, 2, 301, NULL),
(188, 2, 302, NULL),
(189, 2, 440, NULL),
(190, 2, 441, NULL),
(191, 2, 442, NULL),
(192, 2, 443, NULL),
(193, 2, 505, NULL),
(194, 2, 542, NULL),
(195, 2, 640, NULL),
(196, 2, 641, NULL),
(197, 2, 642, NULL),
(198, 2, 699, NULL),
(199, 2, 504, NULL),
(200, 2, 643, NULL),
(201, 2, 740, NULL),
(202, 2, 742, NULL),
(203, 2, 935, NULL),
(204, 2, 943, NULL);

--
-- Triggers `ref_menu`
--
DROP TRIGGER IF EXISTS `trg_ref_menu_c`;
DELIMITER $$
CREATE TRIGGER `trg_ref_menu_c` BEFORE INSERT ON `ref_menu` FOR EACH ROW IF new.group_id = 0 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'You are not allowed to insert it!!';
END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_ref_menu_d`;
DELIMITER $$
CREATE TRIGGER `trg_ref_menu_d` BEFORE DELETE ON `ref_menu` FOR EACH ROW IF old.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_ref_menu_u`;
DELIMITER $$
CREATE TRIGGER `trg_ref_menu_u` BEFORE UPDATE ON `ref_menu` FOR EACH ROW IF old.group_id = 0 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to update it!!';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pangkat_golongan`
--

DROP TABLE IF EXISTS `ref_pangkat_golongan`;
CREATE TABLE `ref_pangkat_golongan` (
  `id_pangkat_pns` bigint(255) NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongan` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruang` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_pangkat_golongan`
--

INSERT INTO `ref_pangkat_golongan` (`id_pangkat_pns`, `pangkat`, `golongan`, `ruang`, `created_at`, `updated_at`) VALUES
(1, 'Juru Muda', 'I', 'a', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(2, 'Juru Muda Tingkat I', 'I', 'b', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(3, 'Juru', 'I', 'c', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(4, 'Juru Tingkat I', 'I', 'd', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(5, 'Pengatur Muda', 'II', 'a', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(6, 'Pengatur Muda Tingkat I', 'II', 'b', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(7, 'Pengatur', 'II', 'c', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(8, 'Pengatur Tingkat I', 'II', 'd', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(9, 'Penata Muda', 'III', 'a', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(10, 'Penata Muda Tingkat I', 'III', 'b', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(11, 'Penata', 'III', 'c', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(12, 'Penata Tingkat I', 'III', 'd', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(13, 'Pembina', 'IV', 'a', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(14, 'Pembina Tingkat I', 'IV', 'b', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(15, 'Pembina Utama Muda', 'IV', 'c', '2019-10-01 06:46:52', '2019-10-01 06:46:52'),
(16, 'Pembina Utama Madya', 'IV', 'd', '2019-10-01 06:46:52', '2019-10-01 06:46:59'),
(17, 'Pembina Utama', 'IV', 'e', '2019-10-01 06:46:52', '2019-10-01 06:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pegawai`
--

DROP TABLE IF EXISTS `ref_pegawai`;
CREATE TABLE `ref_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_pegawai` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pegawai` int(11) NOT NULL DEFAULT '0',
  `status_kepegawaian` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pegawai_pangkat`
--

DROP TABLE IF EXISTS `ref_pegawai_pangkat`;
CREATE TABLE `ref_pegawai_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `id_pegawai` int(255) NOT NULL DEFAULT '0',
  `pangkat_pegawai` int(11) DEFAULT NULL,
  `tmt_pangkat` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pegawai_unit`
--

DROP TABLE IF EXISTS `ref_pegawai_unit`;
CREATE TABLE `ref_pegawai_unit` (
  `id_unit_pegawai` int(11) NOT NULL,
  `id_pegawai` int(255) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `tingkat_eselon` int(11) NOT NULL,
  `id_sotk` int(11) NOT NULL,
  `nama_jabatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt_unit` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pembatalan`
--

DROP TABLE IF EXISTS `ref_pembatalan`;
CREATE TABLE `ref_pembatalan` (
  `id_batal` int(255) NOT NULL,
  `uraian_batal` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pemda`
--

DROP TABLE IF EXISTS `ref_pemda`;
CREATE TABLE `ref_pemda` (
  `kd_prov` int(11) NOT NULL,
  `kd_kab` int(11) NOT NULL,
  `id_pemda` int(11) NOT NULL,
  `prefix_pemda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_prov` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_kabkota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibu_kota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jabatan_kepala_daerah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kepala_daerah` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jabatan_sekretariat_daerah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_sekretariat_daerah` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_sekretariat_daerah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_perencanaan` int(11) DEFAULT NULL COMMENT 'id_sub_unit koordinator perencanaan',
  `nama_kepala_bappeda` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepala_bappeda` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_keuangan` int(11) DEFAULT NULL COMMENT 'id_sub_unit pengelola keuangan',
  `nama_kepala_bpkad` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepala_bpkad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_pemda` mediumblob,
  `alamat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_faksimili` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checksum` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `checksum2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_pengusul`
--

DROP TABLE IF EXISTS `ref_pengusul`;
CREATE TABLE `ref_pengusul` (
  `id_pengusul` int(255) NOT NULL,
  `nm_pengusul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_pengusul`
--

INSERT INTO `ref_pengusul` (`id_pengusul`, `nm_pengusul`, `keterangan`) VALUES
(1, 'Kepala Daerah', ''),
(2, 'Wakil Kepala Daerah', ''),
(3, 'Pimpinan DPRD Provinsi', ''),
(4, 'Anggota DPRD Provinsi', ''),
(5, 'Pimpinan DPRD Kabupaten/Kota', ''),
(6, 'Anggota DPRD Kabupaten/Kota', ''),
(7, 'Bapedda Provinsi', ''),
(8, 'SKPD Provinsi', ''),
(9, 'Bappeda Kabupaten/Kota', ''),
(10, 'SKPD Kabupaten/Kota', ''),
(11, 'Akademisi', ''),
(12, 'Lembaga Swadaya Masyarakat', ''),
(13, 'Organisasi Masyarakat', ''),
(14, 'Tokoh Masyarakat', ''),
(15, 'Keterwakilan Perempuan', 'Organisasi wanita'),
(16, 'Kelompok Masyarakat Rentan', ''),
(17, 'Kelompok Usaha/Investor', ''),
(18, 'Instansi Pemerintah Pusat', 'Kemeterian/Lembaga');

-- --------------------------------------------------------

--
-- Table structure for table `ref_program`
--

DROP TABLE IF EXISTS `ref_program`;
CREATE TABLE `ref_program` (
  `id_bidang` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `kd_program` int(11) NOT NULL,
  `uraian_program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_program`
--

INSERT INTO `ref_program` (`id_bidang`, `id_program`, `kd_program`, `uraian_program`) VALUES
(1, 1, 0, 'Non Program'),
(1, 2, 1, 'Program Pelayanan Administrasi Perkantoran'),
(1, 3, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(1, 4, 3, 'Program peningkatan disiplin aparatur'),
(1, 5, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(1, 6, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(1, 7, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(1, 8, 15, 'Program Pendidikan Anak Usia Dini'),
(1, 9, 16, 'Program Wajib Belajar Pendidikan Dasar Sembilan Tahun'),
(1, 10, 17, 'Program Pendidikan Menengah'),
(1, 11, 18, 'Program Pendidikan Non Formal'),
(1, 12, 19, 'Program Pendidikan Luar Biasa'),
(1, 13, 20, 'Program Peningkatan Mutu Pendidik dan Tenaga Kependidikan'),
(1, 14, 21, 'Program Pengembangan Budaya Baca dan Pembinaan Perpustakaan'),
(1, 15, 22, 'Program Manajemen Pelayanan Pendidikan'),
(2, 16, 0, 'Non Program'),
(2, 17, 1, 'Program Pelayanan Administrasi Perkantoran'),
(2, 18, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(2, 19, 3, 'Program peningkatan disiplin aparatur'),
(2, 20, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(2, 21, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(2, 22, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(2, 23, 15, 'Program Obat dan Perbekalan Kesehatan'),
(2, 24, 16, 'Program Upaya Kesehatan Masyarakat'),
(2, 25, 17, 'Program Pengawasan Obat dan Makanan'),
(2, 26, 18, 'Program Pengembangan Obat Asli Indonesia'),
(2, 27, 19, 'Program Promosi Kesehatan dan Pemberdayaan Masyarakat'),
(2, 28, 20, 'Program Perbaikan Gizi Masyarakat'),
(2, 29, 21, 'Program Pengembangan Lingkungan Sehat'),
(2, 30, 22, 'Program Pencegahan dan Penanggulangan Penyakit Menular'),
(2, 31, 23, 'Program Standarisasi Pelayanan Kesehatan'),
(2, 32, 24, 'Program pelayanan kesehatan penduduk miskin'),
(2, 33, 25, 'Program pengadaan, peningkatan dan perbaikan sarana dan prasarana puskesmas/ puskemas pembantu dan jaringannya'),
(2, 34, 26, 'Program pengadaan, peningkatan sarana dan prasarana rumah sakit/ rumah sakit jiwa/ rumah sakit paru-paru/ rumah sakit mata'),
(2, 35, 27, 'Program pemeliharaan sarana dan prasarana rumah sakit/ rumah sakit jiwa/ rumah sakit paru-paru/ rumah sakit mata'),
(2, 36, 28, 'Program kemitraan peningkatan pelayanan kesehatan'),
(2, 37, 29, 'Program peningkatan pelayanan kesehatan anak balita'),
(2, 38, 30, 'Program peningkatan pelayanan kesehatan lansia'),
(2, 39, 31, 'Program pengawasan dan pengendalian kesehatan makanan'),
(2, 40, 32, 'Program peningkatan keselamatan ibu melahirkan dan anak'),
(3, 41, 0, 'Non Program'),
(3, 42, 1, 'Program Pelayanan Administrasi Perkantoran'),
(3, 43, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(3, 44, 3, 'Program peningkatan disiplin aparatur'),
(3, 45, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(3, 46, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(3, 47, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(3, 48, 15, 'Program pembangunan jalan dan jembatan'),
(3, 49, 16, 'Program pembangunan saluran drainase/gorong-gorong'),
(3, 50, 17, 'Program pembangunan turap/talud/bronjong'),
(3, 51, 18, 'Program rehabilitasi/pemeliharaan jalan dan jembatan'),
(3, 52, 19, 'Program rehabilitasi/pemeliharaan talud/bronjong'),
(3, 53, 20, 'Program Inspeksi kondisi jalan dan jembatan'),
(3, 54, 21, 'Program tanggap darurat jalan dan jembatan'),
(3, 55, 22, 'Program pembangunan sistem informasi/data base jalan dan jembatan'),
(3, 56, 23, 'Program peningkatan sarana dan prasarana kebinamargaan'),
(3, 57, 24, 'Program Pengembangan dan Pengelolaan Jaringan Irigasi, Rawa dan Jaringan Pengairan lainnya'),
(3, 58, 25, 'Program Penyediaan dan Pengelolaan Air Baku'),
(3, 59, 26, 'Program Pengembangan, Pengelolaan, dan Konservasi Sungai, Danau dan Sumber Daya Air Lainnya'),
(3, 60, 27, 'Program Pengembangan Kinerja Pengelolaan Air Minum dan Air Limbah'),
(3, 61, 28, 'Program Pengendalian Banjir'),
(3, 62, 29, 'Program Pengembangan Wilayah Strategis dan Cepat Tumbuh'),
(3, 63, 30, 'Program pembangunan infrastruktur perdesaan'),
(3, 64, 31, 'Program Perencanaan Tata Ruang'),
(3, 65, 32, 'Program Pemanfaatan Ruang'),
(3, 66, 33, 'Program Pengendalian Pemanfaatan Ruang'),
(4, 67, 0, 'Non Program'),
(4, 68, 1, 'Program Pelayanan Administrasi Perkantoran'),
(4, 69, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(4, 70, 3, 'Program peningkatan disiplin aparatur'),
(4, 71, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(4, 72, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(4, 73, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(4, 74, 15, 'Program Pengembangan Perumahan'),
(4, 75, 16, 'Program Lingkungan Sehat Perumahan'),
(4, 76, 17, 'Program Pemberdayaan Komunitas Perumahan'),
(4, 77, 18, 'Program perbaikan perumahan akibat bencana alam/sosial'),
(4, 78, 19, 'Program peningkatan kesiagaan dan pencegahan bahaya kebakaran'),
(4, 79, 20, 'Program pengelolaan areal pemakaman'),
(5, 80, 0, 'Non Program'),
(5, 81, 1, 'Program Pelayanan Administrasi Perkantoran'),
(5, 82, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(5, 83, 3, 'Program peningkatan disiplin aparatur'),
(5, 84, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(5, 85, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(5, 86, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(5, 87, 15, 'Program peningkatan keamanan dan kenyamanan lingkungan'),
(5, 88, 16, 'Program pemeliharaan kantrantibmas dan pencegahan tindak kriminal'),
(5, 89, 17, 'Program pengembangan wawasan kebangsaan'),
(5, 90, 18, 'Program kemitraan pengembangan wawasan kebangsaan'),
(5, 91, 19, 'Program pemberdayaan masyarakat untuk menjaga ketertiban dan keamanan'),
(5, 92, 20, 'Program peningkatan pemberantasan penyakit masyarakat (pekat)'),
(5, 93, 21, 'Program pendidikan politik masyarakat'),
(5, 94, 22, 'Program pencegahan dini dan penanggulangan korban bencana alam'),
(6, 95, 0, 'Non Program'),
(6, 96, 1, 'Program Pelayanan Administrasi Perkantoran'),
(6, 97, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(6, 98, 3, 'Program peningkatan disiplin aparatur'),
(6, 99, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(6, 100, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(6, 101, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(6, 102, 15, 'Program Pemberdayaan Fakir Miskin, Komunitas Adat Terpencil (KAT) dan Penyandang Masalah Kesejahteraan Sosial (PMKS) Lainnya'),
(6, 103, 16, 'Program Pelayanan dan Rehabilitasi Kesejahteraan Sosial'),
(6, 104, 17, 'Program pembinaan anak terlantar'),
(6, 105, 18, 'Program pembinaan para penyandang cacat dan trauma'),
(6, 106, 19, 'Program pembinaan panti asuhan /panti jompo'),
(6, 107, 20, 'Program pembinaan eks penyandang penyakit sosial (eks narapidana, PSK, narkoba dan penyakit sosial lainnya)'),
(6, 108, 21, 'Program Pemberdayaan Kelembagaan Kesejahteraan Sosial'),
(7, 109, 0, 'Non Program'),
(7, 110, 1, 'Program Pelayanan Administrasi Perkantoran'),
(7, 111, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(7, 112, 3, 'Program peningkatan disiplin aparatur'),
(7, 113, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(7, 114, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(7, 115, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(7, 116, 15, 'Program Peningkatan Kualitas dan Produktivitas Tenaga Kerja'),
(7, 117, 16, 'Program Peningkatan Kesempatan Kerja'),
(7, 118, 17, 'Program Perlindungan dan Pengembangan Lembaga Ketenagakerjaan'),
(8, 119, 0, 'Non Program'),
(8, 120, 1, 'Program Pelayanan Administrasi Perkantoran'),
(8, 121, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(8, 122, 3, 'Program peningkatan disiplin aparatur'),
(8, 123, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(8, 124, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(8, 125, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(8, 126, 15, 'Program keserasian Kebijakan Peningkatan Kualitas Anak dan Perempuan'),
(8, 127, 16, 'Program Penguatan Kelembagaan Pengarusutamaan Gender dan Anak'),
(8, 128, 17, 'Program Peningkatan Kualitas Hidup dan Perlindungan Perempuan'),
(8, 129, 18, 'Program peningkatan peran serta dan kesetaraan jender dalam pembangunan'),
(8, 130, 19, 'Program penguatan kelembagaan pengarusutamaan gender dan anak'),
(9, 131, 0, 'Non Program'),
(9, 132, 1, 'Program Pelayanan Administrasi Perkantoran'),
(9, 133, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(9, 134, 3, 'Program peningkatan disiplin aparatur'),
(9, 135, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(9, 136, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(9, 137, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(9, 138, 15, 'Program Peningkatan Ketahan Pangan (pertanian/perkebunan)'),
(10, 139, 0, 'Non Program'),
(10, 140, 1, 'Program Pelayanan Administrasi Perkantoran'),
(10, 141, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(10, 142, 3, 'Program peningkatan disiplin aparatur'),
(10, 143, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(10, 144, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(10, 145, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(10, 146, 15, 'Program pembangunan sistem pendaftaran tanah'),
(10, 147, 16, 'Program penataan penguasaan, pemilikan, penggunaan dan pemanfaatan tanah'),
(10, 148, 17, 'Program penyelesaian konflik-konflik pertanahan'),
(10, 149, 18, 'Program pengembangan sistem informasi pertanahan'),
(11, 150, 0, 'Non Program'),
(11, 151, 1, 'Program Pelayanan Administrasi Perkantoran'),
(11, 152, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(11, 153, 3, 'Program peningkatan disiplin aparatur'),
(11, 154, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(11, 155, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(11, 156, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(11, 157, 15, 'Program Pengembangan Kinerja Pengelolaan Persampahan'),
(11, 158, 16, 'Program Pengendalian Pencemaran dan Perusakan Lingkungan Hidup'),
(11, 159, 17, 'Program Perlindungan dan Konservasi Sumber Daya Alam'),
(11, 160, 18, 'Program Rehabilitasi dan Pemulihan Cadangan Sumber Daya Alam'),
(11, 161, 19, 'Program Peningkatan Kualitas dan Akses Informasi Sumber Daya Alam dan Lingkungan Hidup'),
(11, 162, 20, 'Program peningkatan pengendalian polusi'),
(11, 163, 21, 'Program pengembangan ekowisata dan jasa lingkungan dikawsan-kawasan konservasi laut dan hutan'),
(11, 164, 22, 'Program pengendalian kebakaran hutan'),
(11, 165, 23, 'Program pengelolaan dan rehabilitasi ekosistem pesisir dan laut'),
(11, 166, 24, 'Program pengelolaan ruang terbuka hijau (RTH)'),
(12, 167, 0, 'Non Program'),
(12, 168, 1, 'Program Pelayanan Administrasi Perkantoran'),
(12, 169, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(12, 170, 3, 'Program peningkatan disiplin aparatur'),
(12, 171, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(12, 172, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(12, 173, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(12, 174, 15, 'Program Penataan Administrasi Kependudukan'),
(13, 175, 0, 'Non Program'),
(13, 176, 1, 'Program Pelayanan Administrasi Perkantoran'),
(13, 177, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(13, 178, 3, 'Program peningkatan disiplin aparatur'),
(13, 179, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(13, 180, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(13, 181, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(13, 182, 15, 'Program Peningkatan Keberdayaan Masyarakat Perdesaan'),
(13, 183, 16, 'Program pengembangan lembaga ekonomi pedesaan'),
(13, 184, 17, 'Program peningkatan partisipasi masyarakat dalam membangun desa'),
(13, 185, 18, 'Program peningkatan kapasitas aparatur pemerintah desa'),
(13, 186, 19, 'Program peningkatan peran perempuan di perdesaan'),
(14, 187, 0, 'Non Program'),
(14, 188, 1, 'Program Pelayanan Administrasi Perkantoran'),
(14, 189, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(14, 190, 3, 'Program peningkatan disiplin aparatur'),
(14, 191, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(14, 192, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(14, 193, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(14, 194, 15, 'Program Keluarga Berencana'),
(14, 195, 16, 'Program Kesehatan Reproduksi Remaja'),
(14, 196, 17, 'Program pelayanan kontrasepsi'),
(14, 197, 18, 'Program pembinaan peran serta masyarakat dalam pelayanan KB/KR yang mandiri'),
(14, 198, 19, 'Program promosi kesehatan ibu, bayi dan anak melalui kelompok kegiatan dimasyarakat'),
(14, 199, 20, 'Program pengembangan pusat pelayanan informasi dan konseling KRR'),
(14, 200, 21, 'Program peningkatan penanggulangan narkoba, PMS termasuk HIV/AIDS'),
(14, 201, 22, 'Program pengembangan bahan informasi tentang pengasuhan dan pembinaan tumbuh kembang anak'),
(14, 202, 23, 'Program penyiapan tenaga pedamping kelompok bina keluarga'),
(14, 203, 24, 'Program pengembangan model operasional BKB-Posyandu-PADU'),
(15, 204, 0, 'Non Program'),
(15, 205, 1, 'Program Pelayanan Administrasi Perkantoran'),
(15, 206, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(15, 207, 3, 'Program peningkatan disiplin aparatur'),
(15, 208, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(15, 209, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(15, 210, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(15, 211, 15, 'Program Pembangunan Prasarana dan Fasilitas Perhubungan'),
(15, 212, 16, 'Program Rehabilitasi dan Pemeliharaan Prasarana dan Fasilitas LLAJ'),
(15, 213, 17, 'Pogram peningkatan pelayanan angkutan'),
(15, 214, 18, 'Program pembangunan sarana dan prasarana perhubungan'),
(15, 215, 19, 'Program pengendalian dan pengamanan lalu lintas'),
(15, 216, 20, 'Program peningkatan kelaikan pengoperasian kendaraan bermotor'),
(16, 217, 0, 'Non Program'),
(16, 218, 1, 'Program Pelayanan Administrasi Perkantoran'),
(16, 219, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(16, 220, 3, 'Program peningkatan disiplin aparatur'),
(16, 221, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(16, 222, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(16, 223, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(16, 224, 15, 'Program Pengembangan Komunikasi, Informasi dan Media Massa'),
(16, 225, 16, 'Program pengkajian dan penelitian bidang informasi dan komunikasi'),
(16, 226, 17, 'Program fasilitasi Peningkatan SDM bidang komunikasi dan informasi'),
(16, 227, 18, 'Program kerjasama informasi dengan mas media'),
(17, 228, 0, 'Non Program'),
(17, 229, 1, 'Program Pelayanan Administrasi Perkantoran'),
(17, 230, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(17, 231, 3, 'Program peningkatan disiplin aparatur'),
(17, 232, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(17, 233, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(17, 234, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(17, 235, 15, 'Program penciptaan iklim usaha Usaha Kecil Menengah yang konduksif'),
(17, 236, 16, 'Program Pengembangan Kewirausahaan dan Keunggulan Kompetitif Usaha Kecil Menengah'),
(17, 237, 17, 'Program Pengembangan Sistem Pendukung Usaha Bagi Usaha Mikro Kecil Menengah'),
(17, 238, 18, 'Program Peningkatan Kualitas Kelembagaan Koperasi'),
(18, 239, 0, 'Non Program'),
(18, 240, 1, 'Program Pelayanan Administrasi Perkantoran'),
(18, 241, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(18, 242, 3, 'Program peningkatan disiplin aparatur'),
(18, 243, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(18, 244, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(18, 245, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(18, 246, 15, 'Program Peningkatan Promosi dan Kerjasama Investasi'),
(18, 247, 16, 'Program Peningkatan Iklim Investasi dan Realisasi Investasi'),
(18, 248, 17, 'Program penyiapan potensi sumberdaya, sarana, dan prasarana daerah'),
(19, 249, 0, 'Non Program'),
(19, 250, 1, 'Program Pelayanan Administrasi Perkantoran'),
(19, 251, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(19, 252, 3, 'Program peningkatan disiplin aparatur'),
(19, 253, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(19, 254, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(19, 255, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(19, 256, 15, 'Program Pengembangan dan Keserasian Kebijakan Pemuda'),
(19, 257, 16, 'Program peningkatan peran serta kepemudaan'),
(19, 258, 17, 'Program peningkatan upaya penumbuhan kewirausahaan dan kecakapan hidup pemuda'),
(19, 259, 18, 'Program upaya pencegahan penyalahgunaan narkoba'),
(19, 260, 19, 'Program Pengembangan Kebijakan dan Manajemen Olah Raga'),
(19, 261, 20, 'Program Pembinaan dan Pemasyarakatan Olah Raga'),
(19, 262, 21, 'Program Peningkatan Sarana dan Prasarana Olah Raga'),
(20, 263, 0, 'Non Program'),
(20, 264, 1, 'Program Pelayanan Administrasi Perkantoran'),
(20, 265, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(20, 266, 3, 'Program peningkatan disiplin aparatur'),
(20, 267, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(20, 268, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(20, 269, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(20, 270, 15, 'Program pengembangan data/informasi/statistik daerah'),
(21, 271, 0, 'Non Program'),
(21, 272, 1, 'Program Pelayanan Administrasi Perkantoran'),
(21, 273, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(21, 274, 3, 'Program peningkatan disiplin aparatur'),
(21, 275, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(21, 276, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(21, 277, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(22, 278, 0, 'Non Program'),
(22, 279, 1, 'Program Pelayanan Administrasi Perkantoran'),
(22, 280, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(22, 281, 3, 'Program peningkatan disiplin aparatur'),
(22, 282, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(22, 283, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(22, 284, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(22, 285, 15, 'Program Pengembangan Nilai Budaya'),
(22, 286, 16, 'Program Pengelolaan Kekayaan Budaya'),
(22, 287, 17, 'Program Pengelolaan Keragaman Budaya'),
(22, 288, 18, 'Program pengembangan kerjasama pengelolaan kekayaan budaya'),
(23, 289, 0, 'Non Program'),
(23, 290, 1, 'Program Pelayanan Administrasi Perkantoran'),
(23, 291, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(23, 292, 3, 'Program Peningkatan Disiplin Aparatur'),
(23, 293, 4, 'Program Fasilitasi Pindah/Purna Tugas PNS'),
(23, 294, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(23, 295, 6, 'Program Peningkatan Pengembangan Sistem Pelaporan Capaian Kinerja dan Keuangan'),
(23, 296, 15, 'Program Pengembangan Budaya Baca dan Pembinaan Perpustakaan'),
(24, 297, 0, 'Non Program'),
(24, 298, 1, 'Program Pelayanan Administrasi Perkantoran'),
(24, 299, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(24, 300, 3, 'Program peningkatan disiplin aparatur'),
(24, 301, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(24, 302, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(24, 303, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(24, 304, 15, 'Program perbaikan sistem administrasi kearsipan'),
(24, 305, 16, 'Program penyelamatan dan pelestarian dokumen/arsip daerah'),
(24, 306, 17, 'Program pemeliharaan rutin/berkala sarana dan prasarana kearsipan'),
(24, 307, 18, 'Program peningkatan kualitas pelayanan informasi'),
(25, 308, 0, 'Non Program'),
(25, 309, 1, 'Program Pelayanan Administrasi Perkantoran'),
(25, 310, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(25, 311, 3, 'Program peningkatan disiplin aparatur'),
(25, 312, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(25, 313, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(25, 314, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(25, 315, 15, 'Program pemberdayaan ekonomi masyarakat pesisir'),
(25, 316, 16, 'Program pemberdayaan masyarakat dalam pengawasan dan pengendalian sumberdaya kelautan'),
(25, 317, 17, 'Program peningkatan kesadaran dan penegakan hukum dalam pendayagunaan sumberdaya laut'),
(25, 318, 18, 'Program peningkatan mitigasi bencana alam laut dan prakiraan iklim laut'),
(25, 319, 19, 'Program peningkatan kegiatan budaya kelautan dan wawasan maritim kepada masyarakat'),
(25, 320, 20, 'Program pengembangan budidaya perikanan'),
(25, 321, 21, 'Program pengembangan perikanan tangkap'),
(25, 322, 22, 'Program pengembangan sistem penyuluhan perikanan'),
(25, 323, 23, 'Program Optimalisasi pengelolaan dan pemasaran produksi perikanan'),
(25, 324, 24, 'Program pengembangan kawasan budidaya laut, air payau dan air tawar'),
(26, 325, 0, 'Non Program'),
(26, 326, 1, 'Program Pelayanan Administrasi Perkantoran'),
(26, 327, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(26, 328, 3, 'Program peningkatan disiplin aparatur'),
(26, 329, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(26, 330, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(26, 331, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(26, 332, 15, 'Program pengembangan pemasaran pariwisata'),
(26, 333, 16, 'Program pengembangan destinasi pariwisata'),
(26, 334, 17, 'Program pengembangan Kemitraan'),
(27, 335, 0, 'Non Program'),
(27, 336, 1, 'Program Pelayanan Administrasi Perkantoran'),
(27, 337, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(27, 338, 3, 'Program peningkatan disiplin aparatur'),
(27, 339, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(27, 340, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(27, 341, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(27, 342, 15, 'Program Peningkatan Kesejahteraan Petani'),
(27, 343, 16, 'Program peningkatan pemasaran hasil produksi pertanian/perkebunan'),
(27, 344, 17, 'Program peningkatan penerapan teknologi pertanian/perkebunan'),
(27, 345, 18, 'Program peningkatan produksi pertanian/perkebunan'),
(27, 346, 19, 'Program pemberdayaan penyuluh pertanian/perkebunan lapangan'),
(27, 347, 20, 'Program pencegahan dan penanggulangan penyakit ternak'),
(27, 348, 21, 'Program peningkatan produksi hasil peternakan'),
(27, 349, 22, 'Program peningkatan pemasaran hasil produksi peternakan'),
(27, 350, 23, 'Program peningkatan produksi peternakan'),
(28, 351, 0, 'Non Program'),
(28, 352, 1, 'Program Pelayanan Administrasi Perkantoran'),
(28, 353, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(28, 354, 3, 'Program peningkatan disiplin aparatur'),
(28, 355, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(28, 356, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(28, 357, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(28, 358, 15, 'Program pemanfaatan potensi sumber daya hutan'),
(28, 359, 16, 'Program rehabilitasi hutan dan lahan'),
(28, 360, 17, 'Perlindungan dan konservasi sumber daya hutan'),
(28, 361, 18, 'Program pemanfaatan kawasan hutan industri'),
(28, 362, 19, 'Program pembinaan dan penerbitan industri hasil hutan'),
(28, 363, 20, 'Program perencanaan dan pengembangan hutan'),
(29, 364, 0, 'Non Program'),
(29, 365, 1, 'Program Pelayanan Administrasi Perkantoran'),
(29, 366, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(29, 367, 3, 'Program peningkatan disiplin aparatur'),
(29, 368, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(29, 369, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(29, 370, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(29, 371, 15, 'Program pembinaan dan pengawasan bidang pertambangan'),
(29, 372, 16, 'Program pengawasan dan penertiban kegiatan rakyat yang erpotensi merusak lingkungan'),
(29, 373, 17, 'Program pembinaan dan pengembangan bidang ketenagalistrikan'),
(30, 374, 0, 'Non Program'),
(30, 375, 1, 'Program Pelayanan Administrasi Perkantoran'),
(30, 376, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(30, 377, 3, 'Program peningkatan disiplin aparatur'),
(30, 378, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(30, 379, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(30, 380, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(30, 381, 15, 'Program perlindungan konsumen dan pengamanan perdagangan'),
(30, 382, 16, 'Program peningkatan kerjasama perdagangan internasional'),
(30, 383, 17, 'Program peningkatan dan pengembangan ekspor'),
(30, 384, 18, 'Program peningkatan efisiensi perdagangan dalam negeri'),
(30, 385, 19, 'Program pembinaan pedagang kakilima dan asongan'),
(31, 386, 0, 'Non Program'),
(31, 387, 1, 'Program Pelayanan Administrasi Perkantoran'),
(31, 388, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(31, 389, 3, 'Program peningkatan disiplin aparatur'),
(31, 390, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(31, 391, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(31, 392, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(31, 393, 15, 'Program peningkatan kapasitas iptek sistem produksi'),
(31, 394, 16, 'Program pengembangan industri kecil dan menengah'),
(31, 395, 17, 'Program peningkatan kemampuan teknologi industri'),
(31, 396, 18, 'Program penataan struktur industri'),
(31, 397, 19, 'Program pengembangan sentra-sentra industri potensial'),
(32, 398, 0, 'Non Program'),
(32, 399, 1, 'Program Pelayanan Administrasi Perkantoran'),
(32, 400, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(32, 401, 3, 'Program peningkatan disiplin aparatur'),
(32, 402, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(32, 403, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(32, 404, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(32, 405, 15, 'Program pengembangan wilayah transmigrasi'),
(32, 406, 16, 'Program Transmigrasi lokal'),
(32, 407, 17, 'Program transmigrasi regional'),
(33, 408, 0, 'Non Program'),
(33, 409, 1, 'Program Pelayanan Administrasi Perkantoran'),
(33, 410, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(33, 411, 3, 'Program peningkatan disiplin aparatur'),
(33, 412, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(33, 413, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(33, 414, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(33, 415, 15, 'Program Peningkatan Kapasitas Lembaga Perwakilan Rakyat Daerah'),
(33, 416, 16, 'Program Peningkatan Pelayanan Kedinasan Kepala Daerah/Wakil Kepala Daerah'),
(33, 417, 17, 'Program Optimalisasi Pemanfaatan Teknologi Informasi'),
(33, 418, 18, 'Program Mengintensifkan Penanganan Pengaduan Masyarakat'),
(33, 419, 19, 'Program Peningkatan Kerjasama Antar Pemerintah Daerah'),
(33, 420, 20, 'Program Penataan Peraturan Perundang-Undangan'),
(33, 421, 21, 'Program Penataan Daerah Otonomi Baru'),
(34, 422, 0, 'Non Program'),
(34, 423, 1, 'Program Pelayanan Administrasi Perkantoran'),
(34, 424, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(34, 425, 3, 'Program peningkatan disiplin aparatur'),
(34, 426, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(34, 427, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(34, 428, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(34, 429, 15, 'Program Peningkatan Sistem Pengawasan Internal dan Pengendalian Pelaksanaan Kebijakan KDH'),
(34, 430, 16, 'Program Peningkatan Profesionalisme Tenaga Pemeriksa dan Aparatur Pengawasan'),
(34, 431, 17, 'Program Penataan dan Penyempurnaan Kebijakan Sistem dan Prosedur Pengawasan'),
(35, 432, 0, 'Non Program'),
(35, 433, 1, 'Program Pelayanan Administrasi Perkantoran'),
(35, 434, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(35, 435, 3, 'Program peningkatan disiplin aparatur'),
(35, 436, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(35, 437, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(35, 438, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(35, 439, 15, 'Program pengembangan data/informasi'),
(35, 440, 16, 'Program Kerjasama Pembangunan'),
(35, 441, 17, 'Program Pengembangan Wilayah Perbatasan'),
(35, 442, 18, 'Program Perencanaan Pengembangan Wilayah Strategis dan Cepat Tumbuh'),
(35, 443, 19, 'Program perencanaan pengembangan kota-kota menengah dan besar'),
(35, 444, 20, 'Program peningkatan kapasitas kelembagaan perencanaan pembangunan daerah'),
(35, 445, 21, 'Program perencanaan pembangunan daerah'),
(35, 446, 22, 'Program perencanaan pembangunan ekonomi'),
(35, 447, 23, 'Program perencanaan sosial dan budaya'),
(35, 448, 24, 'Program perancanaan prasarana wilayah dan sumber daya alam'),
(35, 449, 25, 'Program perencanaan pembangunan daerah rawan bencana'),
(36, 450, 0, 'Non Program'),
(36, 451, 1, 'Program Pelayanan Administrasi Perkantoran'),
(36, 452, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(36, 453, 3, 'Program peningkatan disiplin aparatur'),
(36, 454, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(36, 455, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(36, 456, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(36, 457, 15, 'Program Peningkatan dan Pengembangan Pengelolaan Keuangan Daerah'),
(36, 458, 16, 'Program Pembinaan dan Fasilitasi Pengelolaan Keuangan Kabupaten/Kota'),
(36, 459, 17, 'Program Pembinaan dan Fasilitasi Pengelolaan Keuangan Desa'),
(37, 460, 0, 'Non Program'),
(37, 461, 1, 'Program Pelayanan Administrasi Perkantoran'),
(37, 462, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(37, 463, 3, 'Program peningkatan disiplin aparatur'),
(37, 464, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(37, 465, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(37, 466, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(37, 467, 15, 'Program pembinaan dan pengembangan aparatur'),
(38, 468, 0, 'Non Program'),
(38, 469, 1, 'Program Pelayanan Administrasi Perkantoran'),
(38, 470, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(38, 471, 3, 'Program peningkatan disiplin aparatur'),
(38, 472, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(38, 473, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(38, 474, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan'),
(38, 475, 15, 'Program Pendidikan Kedinasan'),
(38, 476, 16, 'Program peningkatan kapasitas sumberdaya aparatur'),
(39, 477, 0, 'Non Program'),
(39, 478, 1, 'Program Pelayanan Administrasi Perkantoran'),
(39, 479, 2, 'Program Peningkatan Sarana dan Prasarana Aparatur'),
(39, 480, 3, 'Program peningkatan disiplin aparatur'),
(39, 481, 4, 'Program fasilitasi pindah/purna tugas PNS'),
(39, 482, 5, 'Program Peningkatan Kapasitas Sumber Daya Aparatur'),
(39, 483, 6, 'Program peningkatan pengembangan sistem pelaporan capaian kinerja dan keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_rek_1`
--

DROP TABLE IF EXISTS `ref_rek_1`;
CREATE TABLE `ref_rek_1` (
  `kd_rek_1` int(11) NOT NULL,
  `nama_kd_rek_1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_rek_1`
--

INSERT INTO `ref_rek_1` (`kd_rek_1`, `nama_kd_rek_1`) VALUES
(1, 'ASET'),
(2, 'KEWAJIBAN'),
(3, 'EKUITAS DANA'),
(4, 'PENDAPATAN'),
(5, 'BELANJA'),
(6, 'PEMBIAYAAN DAERAH'),
(7, 'PERHITUNGAN FIHAK KETIGA (PFK)');

-- --------------------------------------------------------

--
-- Table structure for table `ref_rek_2`
--

DROP TABLE IF EXISTS `ref_rek_2`;
CREATE TABLE `ref_rek_2` (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `nama_kd_rek_2` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_rek_2`
--

INSERT INTO `ref_rek_2` (`kd_rek_1`, `kd_rek_2`, `nama_kd_rek_2`) VALUES
(1, 1, 'ASET LANCAR'),
(1, 2, 'INVESTASI JANGKA PANJANG'),
(1, 3, 'ASET TETAP'),
(1, 4, 'DANA CADANGAN'),
(1, 5, 'ASET LAINNYA'),
(2, 1, 'KEWAJIBAN JANGKA PENDEK'),
(2, 2, 'KEWAJIBAN JANGKA PANJANG'),
(3, 1, 'EKUITAS DANA LANCAR'),
(3, 2, 'EKUITAS DANA INVESTASI'),
(3, 3, 'EKUITAS DANA CADANGAN'),
(4, 1, 'PENDAPATAN ASLI DAERAH'),
(4, 2, 'DANA PERIMBANGAN'),
(4, 3, 'LAIN-LAIN PENDAPATAN DAERAH YANG SAH'),
(5, 1, 'BELANJA TIDAK LANGSUNG'),
(5, 2, 'BELANJA LANGSUNG'),
(6, 1, 'PENERIMAAN PEMBIAYAAN DAERAH'),
(6, 2, 'PENGELUARAN PEMBIAYAAN DAERAH'),
(6, 3, 'PEMBIAYAAN NETTO'),
(6, 4, 'SISA LEBIH/KURANG PEMBIAYAAN TAHUN BERKENAAN'),
(7, 1, 'PENERIMAAN PERHITUNGAN FIHAK KETIGA (PFK)'),
(7, 2, 'PENGELUARAN PERHITUNGAN FIHAK KETIGA (PFK)');

-- --------------------------------------------------------

--
-- Table structure for table `ref_rek_3`
--

DROP TABLE IF EXISTS `ref_rek_3`;
CREATE TABLE `ref_rek_3` (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `kd_rek_3` int(11) NOT NULL,
  `nama_kd_rek_3` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo_normal` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_rek_3`
--

INSERT INTO `ref_rek_3` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `nama_kd_rek_3`, `saldo_normal`) VALUES
(1, 1, 1, 'Kas', 'D'),
(1, 1, 2, 'Investasi Jangka Pendek', 'D'),
(1, 1, 3, 'Piutang', 'D'),
(1, 1, 4, 'Piutang Lain-lain', 'D'),
(1, 1, 5, 'Persediaan', 'D'),
(1, 1, 8, 'R/K SKPD', 'D'),
(1, 2, 1, 'Investasi Non Permanen', 'D'),
(1, 2, 2, 'Investasi Permanen', 'D'),
(1, 3, 1, 'Tanah', 'D'),
(1, 3, 2, 'Peralatan dan Mesin', 'D'),
(1, 3, 3, 'Gedung dan Bangunan', 'D'),
(1, 3, 4, 'Jalan, Jaringan dan Instalasi', 'D'),
(1, 3, 5, 'Aset Tetap Lainnya', 'D'),
(1, 3, 6, 'Konstruksi dalam Pengerjaan', 'D'),
(1, 3, 7, 'Akumulasi Penyusutan', 'D'),
(1, 4, 1, 'Dana Cadangan', 'D'),
(1, 5, 1, 'Tagihan Piutang Penjualan Angsuran', 'D'),
(1, 5, 2, 'Tagihan Tuntutan Ganti Kerugian Daerah', 'D'),
(1, 5, 3, 'Kemitraan dengan Pihak Ketiga', 'D'),
(1, 5, 4, 'Aset Tidak Berwujud', 'D'),
(1, 5, 5, 'Aset Lain-lain', 'D'),
(2, 1, 1, 'Utang Perhitungan Fihak Ketiga (PFK)', 'K'),
(2, 1, 2, 'Utang Bunga', 'K'),
(2, 1, 3, 'Utang Pajak', 'K'),
(2, 1, 4, 'Bagian Lancar Utang Jangka Panjang', 'K'),
(2, 1, 5, 'Pendapatan Diterima Dimuka', 'K'),
(2, 1, 6, 'Utang Jangka Pendek Lainnya', 'K'),
(2, 1, 8, 'R/K Pusat', 'K'),
(2, 2, 1, 'Utang Dalam Negeri', 'K'),
(2, 2, 2, 'Utang Luar Negeri', 'K'),
(3, 1, 1, 'Sisa Lebih Pembiayaan Anggaran (SILPA)', 'K'),
(3, 1, 2, 'Cadangan untuk Piutang', 'K'),
(3, 1, 3, 'Cadangan untuk Persediaan', 'K'),
(3, 1, 4, 'Dana yang harus disediakan untuk pembayaran Utang Jangka Pendek', 'K'),
(3, 1, 5, 'Pendapatan yang Ditangguhkan', 'D'),
(3, 2, 1, 'Diinvestasikan dalam Investasi Jangka Panjang', 'K'),
(3, 2, 2, 'Diinvestasikan dalam Aset Tetap', 'K'),
(3, 2, 3, 'Diinvestasikan dalam Aset Lainnya (Tidak termasuk Dana Cadangan)', 'K'),
(3, 2, 4, 'Dana yang harus disediakan untuk pembayaran hutang Jangka Panjang', 'K'),
(3, 3, 1, 'Diinvestasikan dalam Dana Cadangan', 'K'),
(4, 1, 1, 'Hasil Pajak Daerah', 'K'),
(4, 1, 2, 'Hasil Retribusi Daerah', 'K'),
(4, 1, 3, 'Hasil Pengelolaan Kekayaan Daerah Yang Dipisahkan', 'K'),
(4, 1, 4, 'Lain-lain Pendapatan Asli Daerah Yang Sah', 'K'),
(4, 2, 1, 'Dana Bagi Hasil Pajak/Bagi Hasil Bukan Pajak', 'K'),
(4, 2, 2, 'Dana Alokasi Umum', 'K'),
(4, 2, 3, 'Dana Alokasi Khusus', 'K'),
(4, 3, 1, 'Pendapatan Hibah', 'K'),
(4, 3, 2, 'Dana Darurat', 'K'),
(4, 3, 3, 'Dana Bagi Hasil Pajak dari Provinsi dan Pemerintah Daerah Lainnya', 'K'),
(4, 3, 4, 'Dana Penyesuaian dan Otonomi Khusus', 'K'),
(4, 3, 5, 'Bantuan Keuangan dari Provinsi atau Pemerintah Daerah Lainnya', 'K'),
(5, 1, 1, 'Belanja Pegawai', 'D'),
(5, 1, 2, 'Belanja Bunga', 'D'),
(5, 1, 3, 'Belanja Subsidi', 'D'),
(5, 1, 4, 'Belanja Hibah', 'D'),
(5, 1, 5, 'Belanja Bantuan Sosial', 'D'),
(5, 1, 6, 'Belanja Bagi Hasil Kepada Provinsi/Kabupaten/Kota DanPemerintahan Desa', 'D'),
(5, 1, 7, 'Belanja Bantuan Keuangan Kepada Provinsi/Kabupaten/Kota ,Pemerintahan Desa Dan Partai Politik', 'D'),
(5, 1, 8, 'Belanja Tidak Terduga', 'D'),
(5, 2, 1, 'Belanja Pegawai', 'D'),
(5, 2, 2, 'Belanja Barang Dan Jasa', 'D'),
(5, 2, 3, 'Belanja Modal', 'D'),
(6, 1, 1, 'Sisa Lebih Perhitungan Anggaran Tahun Anggaran Sebelumnya', 'K'),
(6, 1, 2, 'Pencairan Dana Cadangan', 'K'),
(6, 1, 3, 'Hasil Penjualan Kekayaan Daerah yang Dipisahkan', 'K'),
(6, 1, 4, 'Penerimaan Pinjaman Daerah', 'K'),
(6, 1, 5, 'Penerimaan Kembali Pemberian Pinjaman', 'K'),
(6, 1, 6, 'Penerimaan Piutang Daerah', 'K'),
(6, 1, 7, 'Penerimaan kembali investasi dana bergulir', 'K'),
(6, 2, 1, 'Pembentukan Dana Cadangan', 'D'),
(6, 2, 2, 'Penyertaan Modal /Investasi Pemerintah Daerah', 'D'),
(6, 2, 3, 'Pembayaran Pokok Utang', 'D'),
(6, 2, 4, 'Pemberian Pinjaman Daerah', 'D'),
(6, 3, 1, 'Pembiayaan Netto', 'D'),
(6, 4, 1, 'Sisa Lebih/Kurang Pembiayaan Tahun Berkenaan', 'K'),
(7, 1, 1, 'Penerimaan Perhitungan Fihak Ketiga (PFK)', 'K'),
(7, 2, 1, 'Pengeluaran Perhitungan Fihak Ketiga (PFK)', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `ref_rek_4`
--

DROP TABLE IF EXISTS `ref_rek_4`;
CREATE TABLE `ref_rek_4` (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `kd_rek_3` int(11) NOT NULL,
  `kd_rek_4` int(11) NOT NULL,
  `nama_kd_rek_4` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_rek_4`
--

INSERT INTO `ref_rek_4` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`, `nama_kd_rek_4`) VALUES
(1, 1, 1, 1, 'Kas di Kas Daerah'),
(1, 1, 1, 2, 'Kas di Bendahara Penerimaan'),
(1, 1, 1, 3, 'Kas di Bendahara Pengeluaran'),
(1, 1, 1, 4, 'Kas Di Badan Layanan Umum Daerah'),
(1, 1, 2, 1, 'Investasi dalam Saham'),
(1, 1, 2, 2, 'Investasi dalam Obligasi'),
(1, 1, 3, 1, 'Piutang Pajak'),
(1, 1, 3, 2, 'Piutang Retribusi'),
(1, 1, 3, 3, 'Piutang Dana Bagi Hasil'),
(1, 1, 3, 4, 'Piutang Dana Alokasi Umum'),
(1, 1, 3, 5, 'Piutang Dana Alokasi Khusus'),
(1, 1, 4, 1, 'Piutang Bagian Lancar Penjualan Angsuran'),
(1, 1, 4, 2, 'Piutang Ganti Rugi atas Kekayaan Daerah'),
(1, 1, 4, 3, 'Piutang Hasil Penjualan Barang Milik Daerah'),
(1, 1, 4, 4, 'Piutang Deviden'),
(1, 1, 4, 5, 'Piutang Bagi Hasil Laba Usaha Perusahaan Daerah'),
(1, 1, 4, 6, 'Piutang Fasilitas Sosial dan Fasilitas Umum'),
(1, 1, 4, 7, 'Piutang Lain-lain - Lainnya'),
(1, 1, 5, 1, 'Persediaan Alat Tulis kantor'),
(1, 1, 5, 2, 'Persediaan Alat Listrik'),
(1, 1, 5, 3, 'Persediaan Material/Bahan'),
(1, 1, 5, 4, 'Persediaan Benda Pos'),
(1, 1, 5, 5, 'Persediaan Bahan Bakar'),
(1, 1, 5, 6, 'Persediaan Bahan Makanan Pokok'),
(1, 1, 8, 1, 'R/K SKPD'),
(1, 2, 1, 1, 'Pinjaman Kepada Perusahaan Negara'),
(1, 2, 1, 2, 'Pinjaman Kepada Perusahaan Daerah'),
(1, 2, 1, 3, 'Pinjaman Kepada Perusahaan Daerah Lainnya'),
(1, 2, 1, 4, 'Investasi dalam Surat Utang Negara'),
(1, 2, 1, 5, 'Investasi Non Permanen Lainnya'),
(1, 2, 2, 1, 'Penyertaan Modal Pemerintah Daerah'),
(1, 2, 2, 2, 'Penyertaan Modal dalam Proyek Pembangunan'),
(1, 2, 2, 3, 'Penyertaan Modal Perusahaan Patungan'),
(1, 2, 2, 4, 'Invertasi Permanen Lainnya'),
(1, 3, 1, 1, 'Tanah Kantor'),
(1, 3, 1, 2, 'Tanah Sarana Kesehatan Rumah Sakit'),
(1, 3, 1, 3, 'Tanah Sarana Kesehatan Puskesmas'),
(1, 3, 1, 4, 'Tanah Sarana Kesehatan Poliklinik'),
(1, 3, 1, 5, 'Tanah Sarana Pendidikan Taman Kanak-kanak'),
(1, 3, 1, 6, 'Tanah Sarana Pendidikan Sekolah Dasar'),
(1, 3, 1, 7, 'Tanah Sarana Pendidikan Menengah Umum dan Kejuruan'),
(1, 3, 1, 8, 'Tanah Sarana Pendidikan Menengah Lanjutan dan Kejuruan'),
(1, 3, 1, 9, 'Tanah Sarana Pendidikan Luar Biasa/Khusus'),
(1, 3, 1, 10, 'Tanah Sarana Pendidikan Pelatihan dan Kursus'),
(1, 3, 1, 11, 'Tanah Sarana Sosial Panti Asuhan'),
(1, 3, 1, 12, 'Tanah Sarana Sosial Panti Jompo'),
(1, 3, 1, 13, 'Tanah Sarana Umum Terminal'),
(1, 3, 1, 14, 'Tanah Sarana Umum Dermaga'),
(1, 3, 1, 15, 'Tanah Sarana Umum Lapangan Terbang Perintis'),
(1, 3, 1, 16, 'Tanah Sarana Umum Rumah Potong Hewan'),
(1, 3, 1, 17, 'Tanah Sarana Umum Tempat Pelelangan Ikan'),
(1, 3, 1, 18, 'Tanah Sarana Umum Pasar'),
(1, 3, 1, 19, 'Tanah Sarana Umum Tempat Pembuangan Akhir Sampah'),
(1, 3, 1, 20, 'Tanah Sarana Umum Taman'),
(1, 3, 1, 21, 'Tanah Sarana Umum Pusat Hiburan Rakyat'),
(1, 3, 1, 22, 'Tanah Sarana Umum Ibadah'),
(1, 3, 1, 23, 'Tanah Sarana Stadion Olahraga'),
(1, 3, 1, 24, 'Tanah Perumahan'),
(1, 3, 1, 25, 'Tanah Petanian'),
(1, 3, 1, 26, 'Tanah Perkebunan'),
(1, 3, 1, 27, 'Tanah Perikanan'),
(1, 3, 1, 28, 'Tanah Peternakan'),
(1, 3, 1, 29, 'Tanah Perkampungan'),
(1, 3, 1, 30, 'Tanah Pergudangan/Tempat Penimbunan Material Bahan Baku'),
(1, 3, 2, 1, 'Alat-alat Besar'),
(1, 3, 2, 2, 'Alat-alat Angkutan Darat Bermotor'),
(1, 3, 2, 3, 'Alat-alat Angkutan Darat Tidak Bermotor'),
(1, 3, 2, 4, 'Alat-alat Angkutan Air Bermotor'),
(1, 3, 2, 5, 'Alat-alat Angkutan Air Tidak Bermotor'),
(1, 3, 2, 6, 'Alat-alat Angkutan Udara'),
(1, 3, 2, 7, 'Alat-alat Bengkel'),
(1, 3, 2, 8, 'Alat-alat Pengolahan Pertanian dan peternakan'),
(1, 3, 2, 9, 'Peralatan Kantor'),
(1, 3, 2, 10, 'Perlengkapan Kantor'),
(1, 3, 2, 11, 'Komputer'),
(1, 3, 2, 12, 'Meubelair'),
(1, 3, 2, 13, 'Peralatan Dapur'),
(1, 3, 2, 14, 'Penghias Ruangan Rumah Tangga'),
(1, 3, 2, 15, 'Alat-alat Studio'),
(1, 3, 2, 16, 'Alat-alat Komunikasi'),
(1, 3, 2, 17, 'Alat-alat Ukur'),
(1, 3, 2, 18, 'Alat-alat Kedokteran'),
(1, 3, 2, 19, 'Alat-alat Laboratorium'),
(1, 3, 2, 20, 'Alat-alat Persenjataan/Keamanan'),
(1, 3, 3, 1, 'Gedung Kantor'),
(1, 3, 3, 2, 'Gedung Rumah Jabatan'),
(1, 3, 3, 3, 'Gedung Rumah Dinas'),
(1, 3, 3, 4, 'Gedung Gudang'),
(1, 3, 3, 5, 'Bangunan Bersejarah'),
(1, 3, 3, 6, 'Bangunan Monumen'),
(1, 3, 3, 7, 'Tugu Peringatan'),
(1, 3, 4, 1, 'Jalan'),
(1, 3, 4, 2, 'Jembatan'),
(1, 3, 4, 3, 'Jaringan Air'),
(1, 3, 4, 4, 'Penerangan Jalan, Taman dan Hutan Kota'),
(1, 3, 4, 5, 'Instalasi Listrik dan Telepon'),
(1, 3, 5, 1, 'Buku dan Kepustakaan'),
(1, 3, 5, 2, 'Barang Bercorak Kesenian, Kebudayaan'),
(1, 3, 5, 3, 'Hewan, Ternak dan Tanaman'),
(1, 3, 6, 1, 'Konstruksi dalam Pengerjaan'),
(1, 3, 7, 1, 'Akumulasi Penyusutan Aset Tetap'),
(1, 4, 1, 1, 'Dana Cadangan'),
(1, 5, 1, 1, 'Tagihan Penjualan Angsuran/Cicilan Kendaraan Bermotor'),
(1, 5, 1, 2, 'Tagihan Penjualan Angsuran/Cicilan Rumah'),
(1, 5, 2, 1, 'Tagihan Tuntutan Ganti Kerugian Daerah'),
(1, 5, 3, 1, 'Bangun guna serah (Build, Operate and Transfer/BOT)'),
(1, 5, 3, 2, 'Bangun serah guna (Build, Transfer and Operate/BTO)'),
(1, 5, 3, 3, 'Kerjasama operasi (KSO)'),
(1, 5, 4, 1, 'Aset Tidak Berwujud'),
(1, 5, 5, 1, 'Aset Lain-lain'),
(2, 1, 1, 1, 'Utang Taspen'),
(2, 1, 1, 2, 'Utang Askes'),
(2, 1, 1, 3, 'Utang PPh Pusat'),
(2, 1, 1, 4, 'Utang PPN Pusat'),
(2, 1, 1, 5, 'Utang Taperum'),
(2, 1, 1, 6, 'Utang Lainnya'),
(2, 1, 1, 7, 'Utang IWP'),
(2, 1, 2, 1, 'Utang Bunga kepada Pemerintah Pusat'),
(2, 1, 2, 2, 'Utang Bunga kepada Daerah Otonom Lainnya'),
(2, 1, 2, 3, 'Utang Bunga kepada BUMN/BUMD'),
(2, 1, 2, 4, 'Utang Bunga kepada Bank/Lembaga Keuangan'),
(2, 1, 2, 5, 'Utang Bunga Dalam Negeri Lainnya'),
(2, 1, 2, 6, 'Utang Bunga Luar Negeri'),
(2, 1, 3, 1, 'Utang Pemotongan Pajak Penghasilan Pasal 21'),
(2, 1, 3, 2, 'Utang Pemotongan Pajak Penghasilan Pasal 22'),
(2, 1, 3, 3, 'Utang Pemungutan Pajak Pertambahan Nilai'),
(2, 1, 4, 1, 'Utang Bank'),
(2, 1, 4, 2, 'Utang Obligasi'),
(2, 1, 4, 3, 'Utang Pemerintah Pusat'),
(2, 1, 4, 4, 'Utang Pemerintah Provinsi'),
(2, 1, 4, 5, 'Utang Pemerintah Kabupaten/Kota'),
(2, 1, 5, 1, 'Setoran Kelebihan Pembayaran kepada Pihak III'),
(2, 1, 5, 2, 'Uang Muka Penjualan Produk Pemda dari Pihak III'),
(2, 1, 5, 3, 'Uang Muka Lelang Penjualan Aset Daerah'),
(2, 1, 6, 1, 'Utang Jangka Pendek Lainnya'),
(2, 1, 8, 1, 'R/K Pusat'),
(2, 2, 1, 1, 'Utang Dalam Negeri-Sektor Perbankan'),
(2, 2, 1, 2, 'Utang Dalam Negeri-Obligasi'),
(2, 2, 1, 3, 'Utang Pemerintah Pusat'),
(2, 2, 1, 4, 'Utang Pemerintah Provinsi'),
(2, 2, 1, 5, 'Utang Pemerintah Kabupaten/Kota'),
(2, 2, 2, 1, 'Utang Luar Negeri-Sektor Perbankan'),
(3, 1, 1, 1, 'Sisa Lebih Pembiayaan Anggaran (SILPA)'),
(3, 1, 2, 1, 'Cadangan untuk Piutang'),
(3, 1, 3, 1, 'Cadangan untuk Persediaan'),
(3, 1, 4, 1, 'Dana yang harus disediakan untuk pembayaran Utang Jangka Pendek'),
(3, 1, 5, 1, 'Pendapatan yang Ditangguhkan'),
(3, 2, 1, 1, 'Diinvestasikan dalam Investasi Jangka Panjang'),
(3, 2, 2, 1, 'Diinvestasikan dalam Aset Tetap'),
(3, 2, 3, 1, 'Diinvestasikan dalam Aset Lainnya (Tidak termasuk Dana Cadangan)'),
(3, 2, 4, 1, 'Dana yang harus disediakan untuk pembayaran Utang Jangka Panjang'),
(3, 3, 1, 1, 'Diinvestasikan dalam Dana Cadangan'),
(4, 1, 1, 1, 'Pajak Hotel'),
(4, 1, 1, 2, 'Pajak Restoran'),
(4, 1, 1, 3, 'Pajak Hiburan'),
(4, 1, 1, 4, 'Pajak Reklame'),
(4, 1, 1, 5, 'Pajak Penerangan Jalan'),
(4, 1, 1, 6, 'Pajak Mineral Bukan Logam dan Batuan'),
(4, 1, 1, 7, 'Pajak Parkir'),
(4, 1, 1, 8, 'Pajak Air Tanah'),
(4, 1, 1, 9, 'Pajak Sarang Burung Walet'),
(4, 1, 1, 10, 'Pajak Lingkungan 4)'),
(4, 1, 1, 11, 'Pajak Bumi dan Bangunan Perdesaan dan Perkotaan'),
(4, 1, 1, 12, 'Bea Perolehan Hak Atas Tanah dan Bangunan'),
(4, 1, 2, 1, 'Retribusi Jasa Umum'),
(4, 1, 2, 2, 'Retribusi Jasa Usaha'),
(4, 1, 2, 3, 'Retribusi Perizinan Tertentu'),
(4, 1, 3, 1, 'Bagian Laba atas Penyertaan Modal pada Perusahaan Milik Daerah/BUMD'),
(4, 1, 3, 2, 'Bagian Laba atas Penyertaan Modal pada Perusahaan Milik Negara/BUMN'),
(4, 1, 3, 3, 'Bagian Laba atas Penyertaan Modal pada Perusahaan Patungan/Milik Swasta'),
(4, 1, 4, 1, 'Hasil Penjualan Aset Daerah Yang Tidak Dipisahkan'),
(4, 1, 4, 2, 'Jasa Giro'),
(4, 1, 4, 3, 'Pendapatan Bunga Deposito'),
(4, 1, 4, 4, 'Tuntutan Ganti Kerugian Daerah'),
(4, 1, 4, 5, 'Komisi, Potongan dan Selisih Nilai Tukar Rupiah'),
(4, 1, 4, 6, 'Pendapatan Denda Atas Keterlambatan Pelaksanaan Pekerjaan'),
(4, 1, 4, 7, 'Pendapatan Denda Pajak'),
(4, 1, 4, 8, 'Pendapatan Denda Retribusi'),
(4, 1, 4, 9, 'Pendapatan Hasil Eksekusi Atas Jaminan'),
(4, 1, 4, 10, 'Pendapatan Dari Pengembalian'),
(4, 1, 4, 11, 'Fasilitas Sosial dan Fasilitas Umum'),
(4, 1, 4, 12, 'Pendapatan dari Penyelenggaraan Pendidikan dan Pelatihan'),
(4, 1, 4, 13, 'Pendapatan dari Angsuran/Cicilan Penjualan'),
(4, 1, 4, 14, 'Hasil dari Pemanfaatan Kekayaan Daerah'),
(4, 1, 4, 15, 'Pendapatan Zakat'),
(4, 1, 4, 16, 'Pendapatan BLUD'),
(4, 1, 4, 17, 'Hasil Pengelolaan Dana Bergulir'),
(4, 1, 4, 18, 'Pendapatan Dana JKN'),
(4, 1, 4, 19, 'Lain-lain PAD yang Sah Lainnya'),
(4, 2, 1, 1, 'Bagi Hasil Pajak'),
(4, 2, 1, 2, 'Bagi Hasil Bukan Pajak/Sumber Daya Alam'),
(4, 2, 2, 1, 'Dana Alokasi Umum'),
(4, 2, 3, 1, 'Dana Alokasi Khusus'),
(4, 3, 1, 1, 'Pendapatan Hibah Dari Pemerintah'),
(4, 3, 1, 2, 'Pendapatan Hibah Dari Pemerintah Daerah Lainnya'),
(4, 3, 1, 3, 'Pendapatan Hibah Dari Badan/Lembaga/Organisasi Swasta Dalam Negeri'),
(4, 3, 1, 4, 'Pendapatan Hibah Dari Kelompok Masyarakat/Perorangan'),
(4, 3, 1, 5, 'Pendapatan Hibah Dari Luar Negeri'),
(4, 3, 2, 1, 'Penanggulangan Korban/Kerusakan Akibat Bencana Alam'),
(4, 3, 3, 1, 'Dana Bagi Hasil Pajak dari Provinsi 2)'),
(4, 3, 3, 2, 'Dana Bagi Hasil Pajak dari Provinsi 3)'),
(4, 3, 3, 3, 'Dana Bagi Hasil Pajak dari Kabupaten 3)'),
(4, 3, 3, 4, 'Dana Bagi Hasil Pajak dari Kota 3)'),
(4, 3, 4, 1, 'Dana Penyesuaian'),
(4, 3, 4, 2, 'Dana Otonomi Khusus'),
(4, 3, 5, 1, 'Bantuan Keuangan Dari Provinsi'),
(4, 3, 5, 2, 'Bantuan Keuangan Dari Kabupaten'),
(4, 3, 5, 3, 'Bantuan Keuangan Dari Kota'),
(5, 1, 1, 1, 'Gaji dan Tunjangan'),
(5, 1, 1, 2, 'Tambahan Penghasilan PNS'),
(5, 1, 1, 3, 'Belanja Penerimaan lainnya Pimpinan dan anggota DPRD serta KDH/WKDH'),
(5, 1, 1, 4, 'Biaya Pemungutan Pajak'),
(5, 1, 1, 5, 'Insentif Pemungutan Pajak Daerah'),
(5, 1, 1, 6, 'Insentif Pemungutan Retribusi Daerah'),
(5, 1, 2, 1, 'Bunga Utang Pinjaman'),
(5, 1, 2, 2, 'Bunga Utang Obligasi'),
(5, 1, 3, 1, 'Belanja Subsidi kepada Perusahaan/Lembaga'),
(5, 1, 4, 1, 'Belanja Hibah kepada Pemerintah Pusat'),
(5, 1, 4, 2, 'Belanja Hibah kepada Pemerintah Daerah lainnya3)'),
(5, 1, 4, 3, 'Belanja Hibah kepada Pemerintahan Desa'),
(5, 1, 4, 4, 'Belanja Hibah kepada Perusahaan Daerah/ BUMD/ BUMN 4)'),
(5, 1, 4, 5, 'Belanja Hibah kepada Badan/Lembaga/Organisasi'),
(5, 1, 4, 6, 'Belanja Hibah kepada Kelompok/Anggota Masyarakat'),
(5, 1, 4, 7, 'Belanja Hibah Dana BOS 6)'),
(5, 1, 5, 1, 'Belanja Bantuan Sosial Kepada Organisasi Sosial Kemasyarakatan'),
(5, 1, 5, 2, 'Belanja Bantuan Sosial kepada Kelompok Masyarakat'),
(5, 1, 5, 3, 'Belanja Bantuan Sosial kepada Anggota Masyarakat'),
(5, 1, 6, 1, 'Belanja Bagi Hasil Pajak Daerah Kepada Provinsi'),
(5, 1, 6, 2, 'Belanja Bagi Hasil Pajak Daerah Kepada Kabupaten/Kota'),
(5, 1, 6, 3, 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Desa'),
(5, 1, 6, 4, 'Belanja Bagi Hasil Retribusi Daerah Kepada Kabupaten/Kota'),
(5, 1, 6, 5, 'Belanja Bagi Hasil Retribusi Daerah Kepada Pemerintahan Desa'),
(5, 1, 7, 1, 'Belanja Bantuan Keuangan kepada Provinsi'),
(5, 1, 7, 2, 'Belanja Bantuan Keuangan kepada kabupaten/Kota'),
(5, 1, 7, 3, 'Belanja Bantuan Keuangan kepada Desa'),
(5, 1, 7, 4, 'Belanja Bantuan Keuangan kepada Pemerintah Daerah/Pemerintahan Desalainnya'),
(5, 1, 7, 5, 'Belanja Bantuan kepada Partai Politik'),
(5, 1, 8, 1, 'Belanja Tidak Terduga'),
(5, 2, 1, 1, 'Honorarium PNS'),
(5, 2, 1, 2, 'Honorarium Non PNS'),
(5, 2, 1, 3, 'Uang Lembur'),
(5, 2, 1, 4, 'Honorarium Pengelolaan Dana BOS 6)'),
(5, 2, 1, 5, 'Uang untuk diberikan kepada pihak ketiga/masyarakat'),
(5, 2, 2, 1, 'Belanja Bahan Pakai Habis'),
(5, 2, 2, 2, 'Belanja Bahan/Material'),
(5, 2, 2, 3, 'Belanja Jasa Kantor'),
(5, 2, 2, 4, 'Belanja Premi Asuransi'),
(5, 2, 2, 5, 'Belanja Perawatan Kendaraan Bermotor'),
(5, 2, 2, 6, 'Belanja Cetak dan Penggandaan'),
(5, 2, 2, 7, 'Belanja Sewa Rumah/Gedung/Gudang/Parkir'),
(5, 2, 2, 8, 'Belanja Sewa Sarana Mobilitas'),
(5, 2, 2, 9, 'Belanja Sewa Alat Berat'),
(5, 2, 2, 10, 'Belanja Sewa Perlengkapan dan Peralatan Kantor'),
(5, 2, 2, 11, 'Belanja Makanan dan Minuman'),
(5, 2, 2, 12, 'Belanja Pakaian Dinas dan Atributnya'),
(5, 2, 2, 13, 'Belanja Pakaian Kerja'),
(5, 2, 2, 14, 'Belanja Pakaian khusus dan hari-hari tertentu'),
(5, 2, 2, 15, 'Belanja Perjalanan Dinas'),
(5, 2, 2, 16, 'Belanja Beasiswa Pendidikan PNS'),
(5, 2, 2, 17, 'Belanja kursus, pelatihan, sosialisasi dan bimbingan teknis PNS'),
(5, 2, 2, 18, 'Belanja Perjalanan Pindah Tugas'),
(5, 2, 2, 19, 'Belanja Pemulangan Pegawai'),
(5, 2, 2, 20, 'Belanja Pemeliharaan'),
(5, 2, 2, 21, 'Belanja Jasa Konsultansi'),
(5, 2, 2, 22, 'Belanja Barang Dana BOS'),
(5, 2, 2, 23, 'Belanja Barang Yang Akan Diserahkan Kepada Masyarakat/Pihak Ketiga'),
(5, 2, 2, 24, 'Belanja Barang Yang Akan Dijual Kepada Masyarakat/Pihak Ketiga'),
(5, 2, 3, 1, 'Belanja Modal Tanah - Pengadaan Tanah Perkampungan'),
(5, 2, 3, 2, 'Belanja Modal Tanah - Pengadaan Tanah Pertanian'),
(5, 2, 3, 3, 'Belanja Modal Tanah - Pengadaan Tanah Perkebunan'),
(5, 2, 3, 4, 'Belanja Modal Tanah - Pengadaan Kebun Campuran'),
(5, 2, 3, 5, 'Belanja Modal Tanah - Pengadaan Hutan'),
(5, 2, 3, 6, 'Belanja Modal Tanah - Pengadaan Kolam Ikan'),
(5, 2, 3, 7, 'Belanja Modal Tanah - Pengadaan Tanah Danau/Rawa'),
(5, 2, 3, 8, 'Belanja Modal Tanah - Pengadaan Tanah Tandus/Rusak'),
(5, 2, 3, 9, 'Belanja Modal Tanah - Pengadaan Tanah Alang-alang dan Padang Rumput'),
(5, 2, 3, 10, 'Belanja Modal Tanah - Pengadaan Tanah Pengguna Lain'),
(5, 2, 3, 11, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Gedung'),
(5, 2, 3, 12, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Pertambangan'),
(5, 2, 3, 13, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Bukan Gedung'),
(5, 2, 3, 14, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat-Alat Besar Darat'),
(5, 2, 3, 15, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat-Alat Besar Apung'),
(5, 2, 3, 16, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat-alat Bantu'),
(5, 2, 3, 17, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkutan Darat Bermotor'),
(5, 2, 3, 18, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkutan Darat Tak Bermotor'),
(5, 2, 3, 19, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Bermotor'),
(5, 2, 3, 20, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Tak Bermotor'),
(5, 2, 3, 21, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Bermotor Udara'),
(5, 2, 3, 22, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Bengkel Bermesin'),
(5, 2, 3, 23, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Bengkel Tak Bermesin'),
(5, 2, 3, 24, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur'),
(5, 2, 3, 25, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pengolahan'),
(5, 2, 3, 26, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pemeliharaan Tanaman/Alat Penyimpan'),
(5, 2, 3, 27, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kantor'),
(5, 2, 3, 28, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Rumah Tangga'),
(5, 2, 3, 29, 'Belanja Modal Peralatan dan Mesin - Pengadaan Komputer'),
(5, 2, 3, 30, 'Belanja Modal Peralatan dan Mesin - Pengadaan Meja Dan Kursi Kerja/Rapat Pejabat'),
(5, 2, 3, 31, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Studio'),
(5, 2, 3, 32, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi'),
(5, 2, 3, 33, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemancar'),
(5, 2, 3, 34, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran'),
(5, 2, 3, 35, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan'),
(5, 2, 3, 36, 'Belanja Modal Peralatan dan Mesin - Pengadaan Unit-Unit Laboratorium'),
(5, 2, 3, 37, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Peraga/Praktek Sekolah'),
(5, 2, 3, 38, 'Belanja Modal Peralatan dan Mesin - Pengadaan Unit Alat Laboratorium Kimia Nuklir'),
(5, 2, 3, 39, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Fisika Nuklir / Elektronika'),
(5, 2, 3, 40, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Proteksi Radiasi / Proteksi Lingkungan'),
(5, 2, 3, 41, 'Belanja Modal Peralatan dan Mesin - Pengadaan Radiation Aplication and Non Destructive Testing Lab'),
(5, 2, 3, 42, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Lingkungan Hidup'),
(5, 2, 3, 43, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Laboratorium Hidrodinamika'),
(5, 2, 3, 44, 'Belanja Modal Peralatan dan Mesin - Pengadaan Senjata Api'),
(5, 2, 3, 45, 'Belanja Modal Peralatan dan Mesin - Pengadaan Persenjataan Non Senjata Api'),
(5, 2, 3, 46, 'Belanja Modal Peralatan dan Mesin - Pengadaan Amunisi'),
(5, 2, 3, 47, 'Belanja Modal Peralatan dan Mesin -Pengadaan Senjata Sinar'),
(5, 2, 3, 48, 'Belanja Modal Peralatan dan Mesin -Pengadaan Alat Keamanan dan Perlindungan'),
(5, 2, 3, 49, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Kerja'),
(5, 2, 3, 50, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Tinggal'),
(5, 2, 3, 51, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Menara'),
(5, 2, 3, 52, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Bersejarah'),
(5, 2, 3, 53, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tugu Peringatan'),
(5, 2, 3, 54, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Candi'),
(5, 2, 3, 55, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Monumen/Bangunan Bersejarah lainnya'),
(5, 2, 3, 56, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tugu Titik Kontrol/Pasti'),
(5, 2, 3, 57, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rambu-Rambu'),
(5, 2, 3, 58, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rambu-Rambu Lalu Lintas Udara'),
(5, 2, 3, 59, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan'),
(5, 2, 3, 60, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan'),
(5, 2, 3, 61, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Irigasi'),
(5, 2, 3, 62, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Pasang Surut'),
(5, 2, 3, 63, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Rawa'),
(5, 2, 3, 64, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengaman Sungai dan Penanggulangan Be'),
(5, 2, 3, 65, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengembangan Sumber Air dan Air Tanah'),
(5, 2, 3, 66, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Bersih/Baku'),
(5, 2, 3, 67, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Kotor'),
(5, 2, 3, 68, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air'),
(5, 2, 3, 69, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Air Minum/Air Bersih'),
(5, 2, 3, 70, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Air Kotor'),
(5, 2, 3, 71, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengolahan Sampah'),
(5, 2, 3, 72, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengolahan Bahan Bangunan'),
(5, 2, 3, 73, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pembangkit Listrik'),
(5, 2, 3, 74, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Gardu Listrik'),
(5, 2, 3, 75, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pertahanan'),
(5, 2, 3, 76, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Gas'),
(5, 2, 3, 77, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengaman'),
(5, 2, 3, 78, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Air Minum'),
(5, 2, 3, 79, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Listrik'),
(5, 2, 3, 80, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Telepon'),
(5, 2, 3, 81, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Gas'),
(5, 2, 3, 82, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku'),
(5, 2, 3, 83, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Terbitan'),
(5, 2, 3, 84, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan'),
(5, 2, 3, 85, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan'),
(5, 2, 3, 86, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Alat Olah Raga Lainnya'),
(5, 2, 3, 87, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Hewan'),
(5, 2, 3, 88, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Tanaman'),
(5, 2, 3, 89, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Aset Tetap Renovasi'),
(6, 1, 1, 1, 'Pelampauan penerimaan PAD'),
(6, 1, 1, 2, 'Pelampauan penerimaan Dana Perimbangan'),
(6, 1, 1, 3, 'Pelampauan penerimaan Lain-lain Pendapatan Daerah Yang Sah'),
(6, 1, 1, 4, 'Sisa Penghematan Belanja atau akibat lainnya'),
(6, 1, 1, 5, 'Kewajiban kepada pihak ketiga sampai dengan akhir tahun belum terselesaikan'),
(6, 1, 1, 6, 'Kegiatan lanjutan'),
(6, 1, 2, 1, 'Pencairan Dana Cadangan'),
(6, 1, 3, 1, 'Hasil penjualan perusahaan milik daerah/BUMD'),
(6, 1, 3, 2, 'Hasil penjualan aset milik pemerintah daerah yang dikerjasamakan dengan pihakketiga'),
(6, 1, 4, 1, 'Penerimaan Pinjaman Daerah dari Pemerintah'),
(6, 1, 4, 2, 'Penerimaan Pinjaman Daerah dari pemerintah daerah lain'),
(6, 1, 4, 3, 'Penerimaan Pinjaman Daerah dari lembaga keuangan bank'),
(6, 1, 4, 4, 'Penerimaan Pinjaman Daerah dari lembaga keuangan bukan bank'),
(6, 1, 4, 5, 'Penerimaan hasil penerbitan Obligasi daerah'),
(6, 1, 5, 1, 'Penerimaan Kembali Penerimaan Pinjaman'),
(6, 1, 6, 1, 'Penerimaan piutang daerah dari pendapatan daerah'),
(6, 1, 6, 2, 'Penerimaan piutang daerah dari pemerintah'),
(6, 1, 6, 3, 'Penerimaan piutang daerah dari pemerintah daerah lain'),
(6, 1, 6, 4, 'Penerimaan piutang daerah dari lembaga keuangan bank'),
(6, 1, 6, 5, 'Penerimaan piutang daerah dari lembaga keuangan bukan bank'),
(6, 1, 7, 1, 'Penerimaan kembali investasi dana bergulir'),
(6, 2, 1, 1, 'Pembentukan Dana Cadangan'),
(6, 2, 2, 1, 'Badan usaha milik pemerintah (BUMN)'),
(6, 2, 2, 2, 'Badan usaha milik daerah (BUMD)'),
(6, 2, 2, 3, 'Badan usaha milik swasta'),
(6, 2, 2, 4, 'Dana bergulir'),
(6, 2, 3, 1, 'Pembayaran Pokok Utang yang Jatuh Tempo kepada Pemerintah'),
(6, 2, 3, 2, 'Pembayaran Pokok Utang yang Jatuh Tempo kepada pemerintah daerah lain'),
(6, 2, 3, 3, 'Pembayaran Pokok Utang yang Jatuh Tempo kepada lembaga keuangan bank'),
(6, 2, 3, 4, 'Pembayaran Pokok Utang yang Jatuh Tempo kepada lembaga keuangan bukanbank'),
(6, 2, 3, 5, 'Pembayaran Pokok Utang sebelum Jatuh Tempo kepada Pemerintah'),
(6, 2, 3, 6, 'Pembayaran Pokok Utang sebelum Jatuh Tempo kepada pemerintah daerah lain'),
(6, 2, 3, 7, 'Pembayaran Pokok Utang sebelum Jatuh Tempo kepada lembaga keuanganbank'),
(6, 2, 3, 8, 'Pembayaran Pokok Utang sebelum Jatuh Tempo kepada lembaga keuanganbukan bank'),
(6, 2, 3, 9, 'Pelunasan obligasi daerah pada saat jatuh tempo'),
(6, 2, 3, 10, 'Pembelian kembali obligasi daerah sebelum jatuh tempo'),
(6, 2, 4, 1, 'Pemberian Pinjaman Daerah kepada Pemerintah'),
(6, 2, 4, 2, 'Pemberian Pinjaman Daerah kepada pemerintah daerah lain'),
(6, 3, 1, 1, 'Sisa Lebih Pembiayaan Tahun Berkenaan'),
(6, 4, 1, 1, 'Sisa Lebih/Kurang Pembiayaan Tahun Berkenaan'),
(7, 1, 1, 1, 'Penerimaan PFK - IWP'),
(7, 1, 1, 2, 'Penerimaan PFK - Taspen'),
(7, 1, 1, 3, 'Penerimaan PFK - Askes'),
(7, 1, 1, 4, 'Penerimaan PFK - PPh Pusat'),
(7, 1, 1, 5, 'Penerimaan PFK - PPn Pusat'),
(7, 1, 1, 6, 'Penerimaan PFK - Taperum'),
(7, 1, 1, 7, 'Penerimaan PFK - Lainnya'),
(7, 2, 1, 1, 'Pengeluaran PFK - IWP'),
(7, 2, 1, 2, 'Pengeluaran PFK - Taspen'),
(7, 2, 1, 3, 'Pengeluaran PFK - Askes'),
(7, 2, 1, 4, 'Pengeluaran PFK - PPh Pusat'),
(7, 2, 1, 5, 'Pengeluaran PFK - PPn Pusat'),
(7, 2, 1, 6, 'Pengeluaran PFK - Taperum'),
(7, 2, 1, 7, 'Pengeluaran PFK - Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `ref_rek_5`
--

DROP TABLE IF EXISTS `ref_rek_5`;
CREATE TABLE `ref_rek_5` (
  `kd_rek_1` int(11) NOT NULL,
  `kd_rek_2` int(11) NOT NULL,
  `kd_rek_3` int(11) NOT NULL,
  `kd_rek_4` int(11) NOT NULL,
  `kd_rek_5` int(11) NOT NULL,
  `nama_kd_rek_5` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peraturan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rekening` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_rek_5`
--

INSERT INTO `ref_rek_5` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`, `kd_rek_5`, `nama_kd_rek_5`, `peraturan`, `id_rekening`) VALUES
(1, 1, 1, 1, 1, 'Kas di Kas Daerah', '', 1),
(1, 1, 1, 2, 1, 'Kas di Bendahara Penerimaan', '', 2),
(1, 1, 1, 3, 1, 'Kas di Bendahara Pengeluaran - Bank', '', 3),
(1, 1, 1, 3, 2, 'Kas di Bendahara Pengeluaran - Tunai', '', 4),
(1, 1, 2, 1, 1, 'Investasi dalam Saham …..', '', 5),
(1, 1, 2, 1, 2, 'Dst...................', '', 6),
(1, 1, 2, 2, 1, 'Investasi dalam Obligasi …..', '', 7),
(1, 1, 2, 2, 2, 'Dst...................', '', 8),
(1, 1, 3, 1, 1, 'Piutang Pajak …..', '', 9),
(1, 1, 3, 1, 2, 'Dst...................', '', 10),
(1, 1, 3, 2, 1, 'Piutang Retribusi …..', '', 11),
(1, 1, 3, 2, 2, 'Dst...................', '', 12),
(1, 1, 3, 3, 1, 'Piutang Dana Bagi Hasil Pajak', '', 13),
(1, 1, 3, 3, 2, 'Piutang Dana Bagi Hasil Bukan Pajak …..', '', 14),
(1, 1, 3, 3, 3, 'Dst...................', '', 15),
(1, 1, 3, 4, 1, 'Piutang Dana Alokasi Umum …..', '', 16),
(1, 1, 3, 5, 1, 'Piutang Dana Alokasi Khusus …..', '', 17),
(1, 1, 3, 5, 2, 'Dst...................', '', 18),
(1, 1, 4, 1, 1, 'Piutang Bagian Lancar Penjualan Angsuran Cicilan Kendaraan Bermotor', '', 19),
(1, 1, 4, 1, 2, 'Piutang Bagian Lancar Penjualan Angsuran Cicilan Rumah', '', 20),
(1, 1, 4, 1, 3, 'Dst...................', '', 21),
(1, 1, 4, 2, 1, 'Piutang Ganti Rugi Atas Kekayaan Daerah …..', '', 22),
(1, 1, 4, 2, 2, 'Dst...................', '', 23),
(1, 1, 4, 3, 1, 'Piutang Hasi! Penjualan Barang Milik Daerah …..', '', 24),
(1, 1, 4, 3, 2, 'Dst...................', '', 25),
(1, 1, 4, 4, 1, 'Piutang Dividen…..', '', 26),
(1, 1, 4, 4, 2, 'Dst...................', '', 27),
(1, 1, 4, 5, 1, 'Piutang Bali Hasif Laba Usaha Perusahaan Daerah …..', '', 28),
(1, 1, 4, 5, 2, 'Dst...................', '', 29),
(1, 1, 4, 6, 1, 'Piutang Fasilitas Sosial dan Fasilitas Umum …..', '', 30),
(1, 1, 4, 6, 2, 'Dst...................', '', 31),
(1, 1, 4, 7, 1, 'Panjar Kegiatan', '', 32),
(1, 1, 4, 7, 2, 'Uang Muka Operasional', '', 33),
(1, 1, 5, 1, 1, 'Persediaan Alat Tulis Kantor …..', '', 34),
(1, 1, 5, 1, 2, 'Dst...................', '', 35),
(1, 1, 5, 2, 1, 'Persediaan Alat Listrik …..', '', 36),
(1, 1, 5, 2, 2, 'Dst...................', '', 37),
(1, 1, 5, 3, 1, 'Persediaan Bahan Baku Bangunan', '', 38),
(1, 1, 5, 3, 2, 'Persediaan Suku Cadang Sarana Mobilitas', '', 39),
(1, 1, 5, 3, 3, 'Persediaan Bahan/Bibit Tanaman', '', 40),
(1, 1, 5, 3, 4, 'Persediaan Bibit Ternak', '', 41),
(1, 1, 5, 3, 5, 'Persediaan Obat-obatan', '', 42),
(1, 1, 5, 3, 6, 'Persediaan Bahan Kimia', '', 43),
(1, 1, 5, 3, 7, 'Dst...................', '', 44),
(1, 1, 5, 4, 1, 'Persediaan Perangko', '', 45),
(1, 1, 5, 4, 2, 'Persediaan Materai', '', 46),
(1, 1, 5, 4, 3, 'Persediaan Kertas Segel', '', 47),
(1, 1, 5, 4, 4, 'Dst...................', '', 48),
(1, 1, 5, 5, 1, 'Persediaan Bahan Bakar Minyak', '', 49),
(1, 1, 5, 5, 2, 'Dst...................', '', 50),
(1, 1, 5, 6, 1, 'Persediaan Bahan Makanan Pokok …..', '', 51),
(1, 1, 5, 6, 2, 'Dst...................', '', 52),
(1, 1, 8, 1, 1, 'R/K SKPD', '', 53),
(1, 2, 1, 1, 1, 'Pinjaman kepada Perusahaan Negara …..', '', 54),
(1, 2, 1, 1, 2, 'Dst...................', '', 55),
(1, 2, 1, 2, 1, 'Pinjaman kepada Perusahaan Daerah …..', '', 56),
(1, 2, 1, 2, 2, 'Dst................…', '', 57),
(1, 2, 1, 3, 1, 'Pinjaman kepada Pemerintah Daerah Lainnya …..', '', 58),
(1, 2, 1, 3, 2, 'Dst...................', '', 59),
(1, 2, 1, 4, 1, 'Investasi dalam Surat Utang Negara …..', '', 60),
(1, 2, 1, 4, 2, 'Dst...................', '', 61),
(1, 2, 1, 5, 1, 'Investasi Non Permanen Lainnya ….', '', 62),
(1, 2, 1, 5, 2, 'Dst...................', '', 63),
(1, 2, 2, 1, 1, 'Penyertaan Modal Pemerintah Daerah …..', '', 64),
(1, 2, 2, 1, 2, 'Dst...................', '', 65),
(1, 2, 2, 2, 1, 'Penyertaan Modal dalam Proyek Pembangunan …..', '', 66),
(1, 2, 2, 2, 2, 'Dst...................', '', 67),
(1, 2, 2, 3, 1, 'Penyertaan Modal Perusahaan Patungan…..', '', 68),
(1, 2, 2, 3, 2, 'Dst...................', '', 69),
(1, 2, 2, 4, 1, 'Investasi Permanen Lainnya', '', 70),
(1, 2, 2, 4, 2, 'Dst...................', '', 71),
(1, 3, 1, 1, 1, 'Tanah Kantor …..', '', 72),
(1, 3, 1, 1, 2, 'Dst...................', '', 73),
(1, 3, 1, 2, 1, 'Tanah Sarana Kesehatan Rumah Sakit …..', '', 74),
(1, 3, 1, 2, 2, 'Dst...................', '', 75),
(1, 3, 1, 3, 1, 'Tanah Sarana Kesehatan Puskesmas …..', '', 76),
(1, 3, 1, 3, 2, 'Dst...................', '', 77),
(1, 3, 1, 4, 1, 'Tanah Sarana Kesehatan Poliklinik …..', '', 78),
(1, 3, 1, 4, 2, 'Dst...................', '', 79),
(1, 3, 1, 5, 1, 'Tanah Sarana Pendidikan Taman Kanak-Kanak …..', '', 80),
(1, 3, 1, 5, 2, 'Dst...................', '', 81),
(1, 3, 1, 6, 1, 'Tanah Sarana Pendidikan Sekolah Dasar …..', '', 82),
(1, 3, 1, 6, 2, 'Dst...................', '', 83),
(1, 3, 1, 7, 1, 'Tanah Sarana Pendidikan Menengah Umum dan Kejuruan …..', '', 84),
(1, 3, 1, 7, 2, 'Dst...................', '', 85),
(1, 3, 1, 8, 1, 'Tanah Sarana Pendidikan Menengah Lanjutan dan Kejuruan …..', '', 86),
(1, 3, 1, 8, 2, 'Dst...................', '', 87),
(1, 3, 1, 9, 1, 'Tanah Sarana Pendidikan Luar Biasa', '', 88),
(1, 3, 1, 9, 2, 'Tanah Sarana Pendidikan Luar Khusus …..', '', 89),
(1, 3, 1, 9, 3, 'Dst...................', '', 90),
(1, 3, 1, 10, 1, 'Tanah Sarana Pendidikan Pelatihan', '', 91),
(1, 3, 1, 10, 2, 'Tanah Sarana Pendidikan Kursus …..', '', 92),
(1, 3, 1, 10, 3, 'Dst...................', '', 93),
(1, 3, 1, 11, 1, 'Tanah Sarana Sosial Panti Asuhan …..', '', 94),
(1, 3, 1, 11, 2, 'Dst...................', '', 95),
(1, 3, 1, 12, 1, 'Tanah Sarana Sosial Panti Jompo …..', '', 96),
(1, 3, 1, 12, 2, 'Dst...................', '', 97),
(1, 3, 1, 13, 1, 'Tanah Sarana Urnum Terminal …..', '', 98),
(1, 3, 1, 13, 2, 'Dst...................', '', 99),
(1, 3, 1, 14, 1, 'Tanah Sarana Umum Dermaga …..', '', 100),
(1, 3, 1, 14, 2, 'Dst...................', '', 101),
(1, 3, 1, 15, 1, 'Tanah Sarana Umum Lapangan Terbang Perintis', '', 102),
(1, 3, 1, 15, 2, 'Dst...................', '', 103),
(1, 3, 1, 16, 1, 'Tanah Sarana Umum Rumah Potong Hewan', '', 104),
(1, 3, 1, 16, 2, 'Dst...................', '', 105),
(1, 3, 1, 17, 1, 'Tanah Sarana Umum Tempat Pelelangan Ikan…..', '', 106),
(1, 3, 1, 17, 2, 'Dst...................', '', 107),
(1, 3, 1, 18, 1, 'Tanah Sarana Umum Pasar …..', '', 108),
(1, 3, 1, 18, 2, 'Dst...................', '', 109),
(1, 3, 1, 19, 1, 'Tanah Sarana Umum Tempat Pembuangan Akhir Sampah …..', '', 110),
(1, 3, 1, 19, 2, 'Dst...................', '', 111),
(1, 3, 1, 20, 1, 'Tanah Sarana Umum Taman …..', '', 112),
(1, 3, 1, 20, 2, 'Dst...................', '', 113),
(1, 3, 1, 21, 1, 'Tanah Sarana Umum Pusat Hiburan Rakyat …..', '', 114),
(1, 3, 1, 21, 2, 'Dst...................', '', 115),
(1, 3, 1, 22, 1, 'Tanah Sarana Umum Ibadah …..', '', 116),
(1, 3, 1, 22, 2, 'Dst...................', '', 117),
(1, 3, 1, 23, 1, 'Tanah Sarana Stadion Olahraga…..', '', 118),
(1, 3, 1, 23, 2, 'Dst...................', '', 119),
(1, 3, 1, 24, 1, 'Tanah Perumahan …..', '', 120),
(1, 3, 1, 24, 2, 'Dst...................', '', 121),
(1, 3, 1, 25, 1, 'Tanah Pertanian …..', '', 122),
(1, 3, 1, 25, 2, 'Dst...................', '', 123),
(1, 3, 1, 26, 1, 'Tanah Perkebunan …..', '', 124),
(1, 3, 1, 26, 2, 'Dst...................', '', 125),
(1, 3, 1, 27, 1, 'Tanah Perikanan …..', '', 126),
(1, 3, 1, 27, 2, 'Dst...................', '', 127),
(1, 3, 1, 28, 1, 'Tanah Petemakan …..', '', 128),
(1, 3, 1, 28, 2, 'Dst...................', '', 129),
(1, 3, 1, 29, 1, 'Tanah Perkampungan …..', '', 130),
(1, 3, 1, 29, 2, 'Dst...................', '', 131),
(1, 3, 1, 30, 1, 'Tanah Pergudangan/Tempat Penimbunan Material Bahan Baku …..', '', 132),
(1, 3, 1, 30, 2, 'Dst...................', '', 133),
(1, 3, 2, 1, 1, 'Traktor', '', 134),
(1, 3, 2, 1, 2, 'Buldozer', '', 135),
(1, 3, 2, 1, 3, 'Stoom Wals', '', 136),
(1, 3, 2, 1, 4, 'Eskavator', '', 137),
(1, 3, 2, 1, 5, 'Dump truk', '', 138),
(1, 3, 2, 1, 6, 'Crane', '', 139),
(1, 3, 2, 1, 7, 'Kendaraan penyapu jaian', '', 140),
(1, 3, 2, 1, 8, 'Mesin pengolah semen', '', 141),
(1, 3, 2, 1, 9, 'Mesin pengolah air bersih (reservoir osmosis)', '', 142),
(1, 3, 2, 1, 10, 'Dst...................', '', 143),
(1, 3, 2, 2, 1, 'Alat-alat angkutan darat bermotor sedan', '', 144),
(1, 3, 2, 2, 2, 'Alat-alat angkutan darat bermotor jeep', '', 145),
(1, 3, 2, 2, 3, 'Alat-alat angkutan darat bermotor station wagon', '', 146),
(1, 3, 2, 2, 4, 'Alat-alat angkutan darat bermotor bus', '', 147),
(1, 3, 2, 2, 5, 'Alat-alat angkutan darat bermotor micro bus', '', 148),
(1, 3, 2, 2, 6, 'Alat-alat angkutan darat bermotor truck', '', 149),
(1, 3, 2, 2, 7, 'Alat-alat angkutan darat bermotor tangki (air, minyak, tinja)', '', 150),
(1, 3, 2, 2, 8, 'Alat-alat angkutan darat bermotor boks', '', 151),
(1, 3, 2, 2, 9, 'Alat-alat angkutan dams bermotor pick up', '', 152),
(1, 3, 2, 2, 10, 'Alat-alat angkutan darat bermotor ambulans', '', 153),
(1, 3, 2, 2, 11, 'Alat-alat angkutan darat bermotor pemadam kebakaran', '', 154),
(1, 3, 2, 2, 12, 'Alat-alat angkutan darat bermotor sepeda motor', '', 155),
(1, 3, 2, 2, 13, 'Alat-alat angkutan darat bermotor lift/elevator', '', 156),
(1, 3, 2, 2, 14, 'Alat-alat angkutan darat bermotor tangga berjalan', '', 157),
(1, 3, 2, 2, 15, 'Dst...................', '', 158),
(1, 3, 2, 3, 1, 'Gerobak', '', 159),
(1, 3, 2, 3, 2, 'Pedati/delman/dokar/bendi/cidomo/andong', '', 160),
(1, 3, 2, 3, 3, 'Becak', '', 161),
(1, 3, 2, 3, 4, 'Sepeda', '', 162),
(1, 3, 2, 3, 5, 'Karavan', '', 163),
(1, 3, 2, 3, 6, 'Dst...................', '', 164),
(1, 3, 2, 4, 1, 'Kapal motor', '', 165),
(1, 3, 2, 4, 2, 'Kapal feri', '', 166),
(1, 3, 2, 4, 3, 'Speed boat', '', 167),
(1, 3, 2, 4, 4, 'Motor boat / Motor tempel', '', 168),
(1, 3, 2, 4, 5, 'Hydro foil', '', 169),
(1, 3, 2, 4, 6, 'Jet foil', '', 170),
(1, 3, 2, 4, 7, 'Kapal tug boat', '', 171),
(1, 3, 2, 4, 8, 'Kapal tanker', '', 172),
(1, 3, 2, 4, 9, 'Kapal kargo', '', 173),
(1, 3, 2, 4, 10, 'Dst...................', '', 174),
(1, 3, 2, 5, 1, 'Perahu Nelayan', '', 175),
(1, 3, 2, 5, 2, 'Perahu sampan', '', 176),
(1, 3, 2, 5, 3, 'Perahu Tongkang', '', 177),
(1, 3, 2, 5, 4, 'Perahu karet', '', 178),
(1, 3, 2, 5, 5, 'Perahu rakit', '', 179),
(1, 3, 2, 5, 6, 'Perahu sekoci', '', 180),
(1, 3, 2, 5, 7, 'Dst...................', '', 181),
(1, 3, 2, 6, 1, 'Pesawat kargo', '', 182),
(1, 3, 2, 6, 2, 'Pesawat penumpang', '', 183),
(1, 3, 2, 6, 3, 'Pesawat helikopter', '', 184),
(1, 3, 2, 6, 4, 'Pesawat pemadam kebakaran', '', 185),
(1, 3, 2, 6, 5, 'Pesawat capung', '', 186),
(1, 3, 2, 6, 6, 'Pesawat terbang ampibi', '', 187),
(1, 3, 2, 6, 7, 'Pesawat terbang layang', '', 188),
(1, 3, 2, 6, 8, 'Dst...................', '', 189),
(1, 3, 2, 7, 1, 'Mesin las', '', 190),
(1, 3, 2, 7, 2, 'Mesin bubut', '', 191),
(1, 3, 2, 7, 3, 'Mesin dongkrak', '', 192),
(1, 3, 2, 7, 4, 'Mesin kompresor', '', 193),
(1, 3, 2, 7, 5, 'Dst...................', '', 194),
(1, 3, 2, 8, 1, 'Penggiling hasil pertanian', '', 195),
(1, 3, 2, 8, 2, 'Alat pengering gabah', '', 196),
(1, 3, 2, 8, 3, 'Mesin bajak', '', 197),
(1, 3, 2, 8, 4, 'Alat penetas', '', 198),
(1, 3, 2, 8, 5, 'Dst...................', '', 199),
(1, 3, 2, 9, 1, 'Mesin tik', '', 200),
(1, 3, 2, 9, 2, 'Mesin hitung', '', 201),
(1, 3, 2, 9, 3, 'Mesin stensil', '', 202),
(1, 3, 2, 9, 4, 'Mesin fotocopy', '', 203),
(1, 3, 2, 9, 5, 'Mesin cetak', '', 204),
(1, 3, 2, 9, 6, 'Mesin jilid', '', 205),
(1, 3, 2, 9, 7, 'Mesin potong kertas', '', 206),
(1, 3, 2, 9, 8, 'Mesin penghancur kertas', '', 207),
(1, 3, 2, 9, 9, 'Papan tulis elektronik', '', 208),
(1, 3, 2, 9, 10, 'Papan visual elektronik', '', 209),
(1, 3, 2, 9, 11, 'Tabung pemadam kebakaran', '', 210),
(1, 3, 2, 9, 12, 'Dst...................', '', 211),
(1, 3, 2, 10, 1, 'Meja gambar', '', 212),
(1, 3, 2, 10, 2, 'Almari', '', 213),
(1, 3, 2, 10, 3, 'Brankas', '', 214),
(1, 3, 2, 10, 4, 'Filling kabinet', '', 215),
(1, 3, 2, 10, 5, 'White board', '', 216),
(1, 3, 2, 10, 6, 'Penunjuk waktu', '', 217),
(1, 3, 2, 10, 7, 'Dst...................', '', 218),
(1, 3, 2, 11, 1, 'Komputer mainframe/server', '', 219),
(1, 3, 2, 11, 2, 'Komputer/PC', '', 220),
(1, 3, 2, 11, 3, 'Komputer note book', '', 221),
(1, 3, 2, 11, 4, 'Printer', '', 222),
(1, 3, 2, 11, 5, 'Scaner', '', 223),
(1, 3, 2, 11, 6, 'Monitor/display', '', 224),
(1, 3, 2, 11, 7, 'CPU', '', 225),
(1, 3, 2, 11, 8, 'UPS/Stabilizer', '', 226),
(1, 3, 2, 11, 9, 'Kelengkapan komputer (flash disk, mouse, keyboard, hardisk, speaker)', '', 227),
(1, 3, 2, 11, 10, 'Peralatan jaringan komputer', '', 228),
(1, 3, 2, 11, 11, 'Dst...................', '', 229),
(1, 3, 2, 12, 1, 'Meja kerja', '', 230),
(1, 3, 2, 12, 2, 'Meja rapat', '', 231),
(1, 3, 2, 12, 3, 'Meja makan', '', 232),
(1, 3, 2, 12, 4, 'Kursi kerja', '', 233),
(1, 3, 2, 12, 5, 'Kursi rapat', '', 234),
(1, 3, 2, 12, 6, 'Kursi makan', '', 235),
(1, 3, 2, 12, 7, 'Tempat tidur', '', 236),
(1, 3, 2, 12, 8, 'Sofa', '', 237),
(1, 3, 2, 12, 9, 'Rak buku/tv/kembang', '', 238),
(1, 3, 2, 12, 10, 'Dst...................', '', 239),
(1, 3, 2, 13, 1, 'Tabung gas', '', 240),
(1, 3, 2, 13, 2, 'Kompor gas', '', 241),
(1, 3, 2, 13, 3, 'Lemari makan', '', 242),
(1, 3, 2, 13, 4, 'Dispenser', '', 243),
(1, 3, 2, 13, 5, 'Kulkas', '', 244),
(1, 3, 2, 13, 6, 'Rak piring', '', 245),
(1, 3, 2, 13, 7, 'Piring/gelas/mangkok/cangkir/sendok/garpu/pisau', '', 246),
(1, 3, 2, 13, 8, 'Dst...................', '', 247),
(1, 3, 2, 14, 1, 'Lampu hias', '', 248),
(1, 3, 2, 14, 2, 'Jam dinding/meja', '', 249),
(1, 3, 2, 14, 3, 'Dst...................', '', 250),
(1, 3, 2, 15, 1, 'Kamera', '', 251),
(1, 3, 2, 15, 2, 'Handycam', '', 252),
(1, 3, 2, 15, 3, 'Proyektor', '', 253),
(1, 3, 2, 15, 4, 'Dst...................', '', 254),
(1, 3, 2, 16, 1, 'Telepon', '', 255),
(1, 3, 2, 16, 2, 'Faximili', '', 256),
(1, 3, 2, 16, 3, 'Radio ssb', '', 257),
(1, 3, 2, 16, 4, 'Radio HF/FM (handy talkie)', '', 258),
(1, 3, 2, 16, 5, 'Radio VHF', '', 259),
(1, 3, 2, 16, 6, 'Radio UHF', '', 260),
(1, 3, 2, 16, 7, 'Alat sandi', '', 261),
(1, 3, 2, 16, 8, 'Dst...................', '', 262),
(1, 3, 2, 17, 1, 'Timbangan', '', 263),
(1, 3, 2, 17, 2, 'Teodolite', '', 264),
(1, 3, 2, 17, 3, 'Alat uji emisi', '', 265),
(1, 3, 2, 17, 4, 'Alat GPS', '', 266),
(1, 3, 2, 17, 5, 'Kompas/peralatan navigasi', '', 267),
(1, 3, 2, 17, 6, 'Bejana ukur', '', 268),
(1, 3, 2, 17, 7, 'Baromoter', '', 269),
(1, 3, 2, 17, 8, 'Seismograph', '', 270),
(1, 3, 2, 17, 9, 'Ultrasonograph', '', 271),
(1, 3, 2, 17, 10, 'Dst...................', '', 272),
(1, 3, 2, 18, 1, 'Alat-alat kedokteran umum', '', 273),
(1, 3, 2, 18, 2, 'Alat-alat kedokteran gigi', '', 274),
(1, 3, 2, 18, 3, 'Alat alat kedokteran tht', '', 275),
(1, 3, 2, 18, 4, 'Alat-alat kedokteran mata', '', 276),
(1, 3, 2, 18, 5, 'Alat-slat kedokteran bedah', '', 277),
(1, 3, 2, 18, 6, 'Alat-aiat kedokteran anak', '', 278),
(1, 3, 2, 18, 7, 'Alat-alat kedokteran kebidanan dan penyakit kandungan', '', 279),
(1, 3, 2, 18, 8, 'Alat-alat kedokteran kulit dan kelamin', '', 280),
(1, 3, 2, 18, 9, 'Alat-alat kedokteran kardiologi', '', 281),
(1, 3, 2, 18, 10, 'Alat-alat kedokteran neurologi', '', 282),
(1, 3, 2, 18, 11, 'Alat-alat kedokteran orthopedi', '', 283),
(1, 3, 2, 18, 12, 'Alat-alat kedokteran hewan', '', 284),
(1, 3, 2, 18, 13, 'Alat-alat farmasi', '', 285),
(1, 3, 2, 18, 14, 'Alat-alat penyakit dalam/internis', '', 286),
(1, 3, 2, 18, 15, 'Dst...................', '', 287),
(1, 3, 2, 19, 1, 'Alat-alat laboratorium biologi', '', 288),
(1, 3, 2, 19, 2, 'Alat-alat laboratorium fisika/geologi/geodesi', '', 289),
(1, 3, 2, 19, 3, 'Aiat-slat laboratorium kimia', '', 290),
(1, 3, 2, 19, 4, 'Alat-alat laboratorium pertanian', '', 291),
(1, 3, 2, 19, 5, 'Alat-alat laboratorium peternakan', '', 292),
(1, 3, 2, 19, 6, 'Alat-alat laboratorium perkebunan', '', 293),
(1, 3, 2, 19, 7, 'Alat-alat laboratorium perikanan', '', 294),
(1, 3, 2, 19, 8, 'Alat-alat laboratorium bahasa', '', 295),
(1, 3, 2, 19, 9, 'Alat-alat peraga / praktik sekolah', '', 296),
(1, 3, 2, 19, 10, 'Dst...................', '', 297),
(1, 3, 2, 20, 1, 'Senjata api', '', 298),
(1, 3, 2, 20, 2, 'Mobil water canon', '', 299),
(1, 3, 2, 20, 3, 'Borgol', '', 300),
(1, 3, 2, 20, 4, 'Sangkur/ bayonet', '', 301),
(1, 3, 2, 20, 5, 'Perisai / tameng', '', 302),
(1, 3, 2, 20, 6, 'Detektor logam', '', 303),
(1, 3, 2, 20, 7, 'Rompi anti peluru', '', 304),
(1, 3, 2, 20, 8, 'Pentungan', '', 305),
(1, 3, 2, 20, 9, 'Helm', '', 306),
(1, 3, 2, 20, 10, 'Alarm/sirene', '', 307),
(1, 3, 2, 20, 11, 'Sentolop/senter', '', 308),
(1, 3, 2, 20, 12, 'Dst...................', '', 309),
(1, 3, 3, 1, 1, 'Gedung kantor', '', 310),
(1, 3, 3, 1, 2, 'Dst...................', '', 311),
(1, 3, 3, 2, 1, 'Gedung rumah jabatan', '', 312),
(1, 3, 3, 2, 2, 'Dst...................', '', 313),
(1, 3, 3, 3, 1, 'Gedung rumah dinas', '', 314),
(1, 3, 3, 3, 2, 'Dst...................', '', 315),
(1, 3, 3, 4, 1, 'Gedung gudang', '', 316),
(1, 3, 3, 4, 2, 'Dst...................', '', 317),
(1, 3, 3, 5, 1, 'Bangunan bersejarah', '', 318),
(1, 3, 3, 5, 2, 'Dst...................', '', 319),
(1, 3, 3, 6, 1, 'Bangunan monumen', '', 320),
(1, 3, 3, 6, 2, 'Dst...................', '', 321),
(1, 3, 3, 7, 1, 'Tugu peringatan', '', 322),
(1, 3, 3, 7, 2, 'Dst...................', '', 323),
(1, 3, 4, 1, 1, 'Jalan', '', 324),
(1, 3, 4, 1, 2, 'Jalan fly over', '', 325),
(1, 3, 4, 1, 3, 'Jalan under pass', '', 326),
(1, 3, 4, 1, 4, 'Dst...................', '', 327),
(1, 3, 4, 2, 1, 'Jembatan gantung', '', 328),
(1, 3, 4, 2, 2, 'Jembatan ponton', '', 329),
(1, 3, 4, 2, 3, 'Jembatan penyebrangan orang', '', 330),
(1, 3, 4, 2, 4, 'Jembatan penyebrangan diatas air', '', 331),
(1, 3, 4, 2, 5, 'Dst...................', '', 332),
(1, 3, 4, 3, 1, 'Jaringan irigasi/waduk/bendungan', '', 333),
(1, 3, 4, 3, 2, 'Jaringan air bersih/air minum', '', 334),
(1, 3, 4, 3, 3, 'Reservoir', '', 335),
(1, 3, 4, 3, 4, 'Pintu air', '', 336),
(1, 3, 4, 3, 5, 'Dst...................', '', 337),
(1, 3, 4, 4, 1, 'Lampu hias jalan', '', 338),
(1, 3, 4, 4, 2, 'Lampu hias taman', '', 339),
(1, 3, 4, 4, 3, 'Lampu penerang hutan kota', '', 340),
(1, 3, 4, 4, 4, 'Dst...................', '', 341),
(1, 3, 4, 5, 1, 'Instalasi listrik', '', 342),
(1, 3, 4, 5, 2, 'Jaringan telepon', '', 343),
(1, 3, 4, 5, 3, 'Dst...................', '', 344),
(1, 3, 5, 1, 1, 'Buku matematika', '', 345),
(1, 3, 5, 1, 2, 'Buku fisika', '', 346),
(1, 3, 5, 1, 3, 'Buku kimia', '', 347),
(1, 3, 5, 1, 4, 'Buku biologi', '', 348),
(1, 3, 5, 1, 5, 'Buku biografi', '', 349),
(1, 3, 5, 1, 6, 'Buku geografi', '', 350),
(1, 3, 5, 1, 7, 'Buku astronomi', '', 351),
(1, 3, 5, 1, 8, 'Buku arkeologi', '', 352),
(1, 3, 5, 1, 9, 'Buku bahasa dan sastra', '', 353),
(1, 3, 5, 1, 10, 'Buku keagamaan', '', 354),
(1, 3, 5, 1, 11, 'Buku sejarah', '', 355),
(1, 3, 5, 1, 12, 'Buku seni dan budaya', '', 356),
(1, 3, 5, 1, 13, 'Buku ilmu pengetahuan umum', '', 357),
(1, 3, 5, 1, 14, 'Buku ilmu pengetahuan sosial', '', 358),
(1, 3, 5, 1, 15, 'Buku ilmu politik dan ketatanegaraan', '', 359),
(1, 3, 5, 1, 16, 'Buku ilmu pengetahuan dan teknologi', '', 360),
(1, 3, 5, 1, 17, 'Buku ensiklopedia', '', 361),
(1, 3, 5, 1, 18, 'Buku kamus bahasa', '', 362),
(1, 3, 5, 1, 19, 'Buku ekonomi dan keuangan', '', 363),
(1, 3, 5, 1, 20, 'Buku industri dan perdagangan', '', 364),
(1, 3, 5, 1, 21, 'Buku peraturan perundang-undangan', '', 365),
(1, 3, 5, 1, 22, 'Buku naskah', '', 366),
(1, 3, 5, 1, 23, 'Terbitan berkala (jumal Compact Disk)', '', 367),
(1, 3, 5, 1, 24, 'Mikrofilm', '', 368),
(1, 3, 5, 1, 25, 'Peta/atlas/globe', '', 369),
(1, 3, 5, 1, 26, 'Dst...................', '', 370),
(1, 3, 5, 2, 1, 'Lukisan/foto', '', 371),
(1, 3, 5, 2, 2, 'Patung', '', 372),
(1, 3, 5, 2, 3, 'Ukiran', '', 373),
(1, 3, 5, 2, 4, 'Pahatan', '', 374),
(1, 3, 5, 2, 5, 'Batu alam', '', 375),
(1, 3, 5, 2, 6, 'Maket/miniatur/diorama', '', 376),
(1, 3, 5, 2, 7, 'Dst...................', '', 377),
(1, 3, 5, 3, 1, 'Hewan kebun binatang', '', 378),
(1, 3, 5, 3, 2, 'Temak', '', 379),
(1, 3, 5, 3, 3, 'Tanaman', '', 380),
(1, 3, 5, 3, 4, 'Dst...................', '', 381),
(1, 3, 6, 1, 1, 'Konstruksi Dalam Pengerjaan …..', '', 382),
(1, 3, 6, 1, 2, 'Dst...................', '', 383),
(1, 3, 7, 1, 1, 'Akumulasi Penyusutan Aset Tetap …..', '', 384),
(1, 3, 7, 1, 2, 'Dst...................', '', 385),
(1, 4, 1, 1, 1, 'Dana Cadangan....', '', 386),
(1, 4, 1, 1, 2, 'Dst...................', '', 387),
(1, 5, 1, 1, 1, 'Tagihan Penjualan Angsuran Cicilan Kendaraan Bermotor …..', '', 388),
(1, 5, 1, 1, 2, 'Dst...................', '', 389),
(1, 5, 1, 2, 1, 'Tagihan Penjualan Angsuran Cicilan Rumah', '', 390),
(1, 5, 1, 2, 2, 'Dst...................', '', 391),
(1, 5, 2, 1, 1, 'Tagihan Tuntutan Ganti Kerugian Daerah', '', 392),
(1, 5, 2, 1, 2, 'Dst...................', '', 393),
(1, 5, 3, 1, 1, 'Bangun guna serah (Build, Operate and Transfer/BOT)', '', 394),
(1, 5, 3, 1, 2, 'Dst...................', '', 395),
(1, 5, 3, 2, 1, 'Bangun serah guna (Build, Transfer and Operate/BTO)', '', 396),
(1, 5, 3, 2, 2, 'Dst...................', '', 397),
(1, 5, 3, 3, 1, 'Kerjasama Operasi (KSO)', '', 398),
(1, 5, 3, 3, 2, 'Dst...................', '', 399),
(1, 5, 4, 1, 1, 'Aset Tidak Berwu\'ud', '', 400),
(1, 5, 4, 1, 2, 'Dst...................', '', 401),
(1, 5, 5, 1, 1, 'Aset Lain-lain', '', 402),
(1, 5, 5, 1, 2, 'Dst...................', '', 403),
(2, 1, 1, 1, 1, 'Utang Taspen', '', 404),
(2, 1, 1, 2, 1, 'Utang Askes', '', 405),
(2, 1, 1, 3, 1, 'Utang PPh 21', '', 406),
(2, 1, 1, 3, 2, 'Utang PPh 22', '', 407),
(2, 1, 1, 3, 3, 'Utang PPh 23', '', 408),
(2, 1, 1, 3, 4, 'Utang PPh 25', '', 409),
(2, 1, 1, 4, 1, 'Utang PPN Pusat', '', 410),
(2, 1, 1, 5, 1, 'Utang Taperum', '', 411),
(2, 1, 1, 6, 1, 'Utang Perhitungan Pihak Ketiga Lainnya', '', 412),
(2, 1, 1, 7, 1, 'Utang IWP', '', 413),
(2, 1, 2, 1, 1, 'Utang Bunga kepada Pemerintah Pusat', '', 414),
(2, 1, 2, 2, 1, 'Utang Bunga kepada Daerah Otonom Lainnya', '', 415),
(2, 1, 2, 2, 2, 'Dst.............', '', 416),
(2, 1, 2, 3, 1, 'Utang Bunga kepada BUMN', '', 417),
(2, 1, 2, 3, 2, 'Utang Bunga kepada BUMD', '', 418),
(2, 1, 2, 3, 3, 'Dst ......', '', 419),
(2, 1, 2, 4, 1, 'Utang Bunga kepada Bank ....', '', 420),
(2, 1, 2, 4, 2, 'Utang Bunga kepada Lembaga Keuangan', '', 421),
(2, 1, 2, 4, 3, 'Dst .....', '', 422),
(2, 1, 2, 5, 1, 'Utang Bunga Dalam Negeri Lainnya', '', 423),
(2, 1, 2, 5, 2, 'Dst.............', '', 424),
(2, 1, 2, 6, 1, 'Utang Bunga Luar Negeri', '', 425),
(2, 1, 2, 6, 2, 'Dst.............', '', 426),
(2, 1, 3, 1, 1, 'Utang Pemotongan Pajak Penghasilan Pasal 21', '', 427),
(2, 1, 3, 2, 1, 'Utang Pemotongan Pajak Penghasilan Pasal 22', '', 428),
(2, 1, 3, 3, 1, 'Utang Pemungutan Pajak Pertambahan Nilai', '', 429),
(2, 1, 4, 1, 1, 'Utang Bank', '', 430),
(2, 1, 4, 1, 2, 'Dst.............', '', 431),
(2, 1, 4, 2, 1, 'Utang Obligasi', '', 432),
(2, 1, 4, 2, 2, 'Dst.............', '', 433),
(2, 1, 4, 3, 1, 'Utang Pemerintah Pusat', '', 434),
(2, 1, 4, 4, 1, 'Utang Pemerintah Frovinsi', '', 435),
(2, 1, 4, 4, 2, 'Dst.............', '', 436),
(2, 1, 4, 5, 1, 'Utang Pemerintah Kabupaten …', '', 437),
(2, 1, 4, 5, 2, 'Utang Pemerintah Kota …', '', 438),
(2, 1, 4, 5, 3, 'Dst.............', '', 439),
(2, 1, 5, 1, 1, 'Setoran Kelebihan Pembayaran Kepada Pihak III', '', 440),
(2, 1, 5, 1, 2, 'Dst.............', '', 441),
(2, 1, 5, 2, 1, 'Uang Muka Penjualan Produk Pemda Dari Pihak III', '', 442),
(2, 1, 5, 2, 2, 'Dst.............', '', 443),
(2, 1, 5, 3, 1, 'Uang Muka Lelang Penjualan Aset Daerah', '', 444),
(2, 1, 5, 3, 2, 'Dst.............', '', 445),
(2, 1, 6, 1, 1, 'Utang Jangka Pendek Lainnya', '', 446),
(2, 1, 6, 1, 2, 'Dst.............', '', 447),
(2, 1, 8, 1, 1, 'R/K Pusat', '', 448),
(2, 2, 1, 1, 1, 'Utang Dalam Negeri Sektor Perbankan', '', 449),
(2, 2, 1, 1, 2, 'Dst.............', '', 450),
(2, 2, 1, 2, 1, 'Utang Daiam Negeri - Obligasi', '', 451),
(2, 2, 1, 2, 2, 'Dst.............', '', 452),
(2, 2, 1, 3, 1, 'Utang Pemerintah Pusat', '', 453),
(2, 2, 1, 4, 1, 'Utang Pemerintah Provinsi', '', 454),
(2, 2, 1, 4, 2, 'Dst.............', '', 455),
(2, 2, 1, 5, 1, 'Utang Pemerintah Kabupaten/Kota', '', 456),
(2, 2, 1, 5, 2, 'Dst', '', 457),
(2, 2, 2, 1, 1, 'Utang Luar Negeri - Sektor Perbankan', '', 458),
(2, 2, 2, 1, 2, 'Dst ......', '', 459),
(3, 1, 2, 1, 1, 'Cadangan Piutang', '', 460),
(3, 1, 3, 1, 1, 'Cadangan Persediaan', '', 461),
(3, 1, 4, 1, 1, 'Dana yang Harus Disediakan untuk Pembayaran Utang Jangka Pendek', '', 462),
(3, 1, 5, 1, 1, 'Pendapatan yang Ditangguhkan', '', 463),
(3, 2, 1, 1, 1, 'Diinvestasikan dalam Investasi Jangka Panjang', '', 464),
(3, 2, 2, 1, 1, 'Diinvestasikan dalam Aset Tetap', '', 465),
(3, 2, 3, 1, 1, 'Diinvestasikan dalam Aset Lainnya (tidak termasuk Dana Cadangan)', '', 466),
(3, 2, 4, 1, 1, 'Dana yang Harus disediakan Untuk Pembayaran Utang Jangka Panjang ….', '', 467),
(3, 3, 1, 1, 1, 'Diinvestasikan dalam Dana Cadangan', '', 468),
(4, 1, 1, 1, 1, 'Hotel Bintang Lima Berlian', '', 469),
(4, 1, 1, 1, 2, 'Hotel Bintang Lima', '', 470),
(4, 1, 1, 1, 3, 'Hotel Bintang Empat', '', 471),
(4, 1, 1, 1, 4, 'Hotel Bintang Tiga', '', 472),
(4, 1, 1, 1, 5, 'Hotel Bintang Dua', '', 473),
(4, 1, 1, 1, 6, 'Hotel Bintang Satu', '', 474),
(4, 1, 1, 1, 7, 'Hotel Melati Tiga', '', 475),
(4, 1, 1, 1, 8, 'Hotel Melati Dua', '', 476),
(4, 1, 1, 1, 9, 'Hotel Melati Satu', '', 477),
(4, 1, 1, 1, 10, 'Motel', '', 478),
(4, 1, 1, 1, 11, 'Cottage', '', 479),
(4, 1, 1, 1, 12, 'Losmen/Rumah Penginapan/Pesanggrahan/Rumah Kos', '', 480),
(4, 1, 1, 1, 13, 'Wisma Pariwisata', '', 481),
(4, 1, 1, 1, 14, 'Gubuk Pariwisata', '', 482),
(4, 1, 1, 2, 1, 'Restoran', '', 483),
(4, 1, 1, 2, 2, 'Rumah Makan', '', 484),
(4, 1, 1, 2, 3, 'Kafetaria', '', 485),
(4, 1, 1, 2, 4, 'Kantin', '', 486),
(4, 1, 1, 2, 5, 'Katering', '', 487),
(4, 1, 1, 2, 6, 'Warung', '', 488),
(4, 1, 1, 2, 7, 'Bar', '', 489),
(4, 1, 1, 2, 8, 'Jasa Boga', '', 490),
(4, 1, 1, 3, 1, 'Tontonan Film/Bioskop', '', 491),
(4, 1, 1, 3, 2, 'Pagelaran Kesenian/Musik/Tari/Busana', '', 492),
(4, 1, 1, 3, 3, 'Kontes Kecantikan', '', 493),
(4, 1, 1, 3, 4, 'Kontes Binaraga', '', 494),
(4, 1, 1, 3, 5, 'Pameran', '', 495),
(4, 1, 1, 3, 6, 'Diskotik', '', 496),
(4, 1, 1, 3, 7, 'Karaoke', '', 497),
(4, 1, 1, 3, 8, 'Klab Malam', '', 498),
(4, 1, 1, 3, 9, 'Sirkus/Akrobat/Sulap', '', 499),
(4, 1, 1, 3, 10, 'Permainan Bilyar', '', 500),
(4, 1, 1, 3, 11, 'Permainan Golf', '', 501),
(4, 1, 1, 3, 12, 'Permainan Bowling', '', 502),
(4, 1, 1, 3, 13, 'Pacuan Kuda', '', 503),
(4, 1, 1, 3, 14, 'Balap Kendaraan Bermotor', '', 504),
(4, 1, 1, 3, 15, 'Permainan Ketangkasan', '', 505),
(4, 1, 1, 3, 16, 'Panti Pijat/Refleksi', '', 506),
(4, 1, 1, 3, 17, 'Mandi Uap/Spa', '', 507),
(4, 1, 1, 3, 18, 'Pusat Kebugaran', '', 508),
(4, 1, 1, 3, 19, 'Pertandingan Olahraga', '', 509),
(4, 1, 1, 4, 1, 'Reklame Papan/Billboard/Videotron/Megatron', '', 510),
(4, 1, 1, 4, 2, 'Reklame Kain', '', 511),
(4, 1, 1, 4, 3, 'Reklame Melekat/Stiker', '', 512),
(4, 1, 1, 4, 4, 'Reklame Selebaran', '', 513),
(4, 1, 1, 4, 5, 'Reklame Berjalan', '', 514),
(4, 1, 1, 4, 6, 'Reklame Udara', '', 515),
(4, 1, 1, 4, 7, 'Reklame Apung', '', 516),
(4, 1, 1, 4, 8, 'Reklame Suara', '', 517),
(4, 1, 1, 4, 9, 'Reklame Film/Slide', '', 518),
(4, 1, 1, 4, 10, 'Reklame Peragaan', '', 519),
(4, 1, 1, 5, 1, 'Pajak Penerangan Jalan Dihasilkan Sendiri', '', 520),
(4, 1, 1, 5, 2, 'Pajak Penerangan Jalan Sumber Lain', '', 521),
(4, 1, 1, 6, 1, 'Asbes', '', 522),
(4, 1, 1, 6, 2, 'Batu Tulis', '', 523),
(4, 1, 1, 6, 3, 'Batu Setengah Permata', '', 524),
(4, 1, 1, 6, 4, 'Batu Kapur', '', 525),
(4, 1, 1, 6, 5, 'Batu Apung', '', 526),
(4, 1, 1, 6, 6, 'Batu Pecah', '', 527),
(4, 1, 1, 6, 7, 'Batu Belah', '', 528),
(4, 1, 1, 6, 8, 'Pasir', '', 529),
(4, 1, 1, 6, 9, 'Tanah Timbun/Urug', '', 530),
(4, 1, 1, 6, 10, 'Batu Kerikil', '', 531),
(4, 1, 1, 6, 11, 'Batu Permata', '', 532),
(4, 1, 1, 6, 12, 'Bentonit', '', 533),
(4, 1, 1, 6, 13, 'Dolomit', '', 534),
(4, 1, 1, 6, 14, 'Feldspar', '', 535),
(4, 1, 1, 6, 15, 'Garam Batu (Halite)', '', 536),
(4, 1, 1, 6, 16, 'Grafit', '', 537),
(4, 1, 1, 6, 17, 'Granit/Andesit', '', 538),
(4, 1, 1, 6, 18, 'Gips', '', 539),
(4, 1, 1, 6, 19, 'Kalsit', '', 540),
(4, 1, 1, 6, 20, 'Kaolin', '', 541),
(4, 1, 1, 6, 21, 'Leusit', '', 542),
(4, 1, 1, 6, 22, 'Magnesit', '', 543),
(4, 1, 1, 6, 23, 'Mika', '', 544),
(4, 1, 1, 6, 24, 'Marmer', '', 545),
(4, 1, 1, 6, 25, 'Nitrat', '', 546),
(4, 1, 1, 6, 26, 'Opsidien', '', 547),
(4, 1, 1, 6, 27, 'Oker', '', 548),
(4, 1, 1, 6, 28, 'Pasir Kuarsa', '', 549),
(4, 1, 1, 6, 29, 'Perlit', '', 550),
(4, 1, 1, 6, 30, 'Phospat', '', 551),
(4, 1, 1, 6, 31, 'Talk', '', 552),
(4, 1, 1, 6, 32, 'Tanah Serap (Fullers earth)', '', 553),
(4, 1, 1, 6, 33, 'Tanah Liat', '', 554),
(4, 1, 1, 6, 34, 'Tawas (Alum)', '', 555),
(4, 1, 1, 6, 35, 'Tras', '', 556),
(4, 1, 1, 6, 36, 'Yarosif', '', 557),
(4, 1, 1, 6, 37, 'Zeolit', '', 558),
(4, 1, 1, 6, 38, 'Basal', '', 559),
(4, 1, 1, 6, 39, 'Trakit', '', 560),
(4, 1, 1, 6, 40, 'Mineral Bukan Logam dan Batuan Lainnya', '', 561),
(4, 1, 1, 7, 1, 'Pajak Parkir', '', 562),
(4, 1, 1, 8, 1, 'Pajak Air Tanah', '', 563),
(4, 1, 1, 9, 1, 'Pajak Sarang Burung Walet', '', 564),
(4, 1, 1, 10, 1, 'Pajak Lingkungan 4)', '', 565),
(4, 1, 1, 11, 1, 'Pajak Bumi dan Bangunan Perdesaan dan Perkotaan', '', 566),
(4, 1, 1, 12, 1, 'Bea Perolehan Hak Atas Tanah dan Bangunan', '', 567),
(4, 1, 2, 1, 1, 'Retribusi Pelayanan Kesehatan', '', 568),
(4, 1, 2, 1, 2, 'Retribusi Pelayanan Persampahan/Kebersihan', '', 569),
(4, 1, 2, 1, 3, 'Retribusi Penggantian Biaya Kartu Tanda Penduduk dan Akta Catatan Sipil', '', 570),
(4, 1, 2, 1, 4, 'Retribusi Pelayanan Pemakaman dan Pengabuan Mayat', '', 571),
(4, 1, 2, 1, 5, 'Retribusi Pelayanan Parkir di Tepi Jalan Umum', '', 572),
(4, 1, 2, 1, 6, 'Retribusi Pelayanan Pasar', '', 573),
(4, 1, 2, 1, 7, 'Retribusi Pengujian Kendaraan Bermotor', '', 574),
(4, 1, 2, 1, 8, 'Retribusi Pemeriksaan Alat Pemadam Kebakaran', '', 575),
(4, 1, 2, 1, 9, 'Retribusi Penggantian Biaya Cetak Peta', '', 576),
(4, 1, 2, 1, 10, 'Retribusi Pelayanan Pendidikan', '', 577),
(4, 1, 2, 1, 11, 'Retribusi Penyediaan dan/atau Penyedotan Kakus', '', 578),
(4, 1, 2, 1, 12, 'Retribusi Pengelolaan Limbah Cair', '', 579),
(4, 1, 2, 1, 13, 'Retribusi Pengendalian Menara Telekomunikasi', '', 580),
(4, 1, 2, 1, 14, 'Retribusi Pelayanan Tera/Tera Ulang', '', 581),
(4, 1, 2, 2, 1, 'Retribusi Pemakaian Kekayaan Daerah', '', 582),
(4, 1, 2, 2, 2, 'Retribusi Pasar Grosir/Pertokoan', '', 583),
(4, 1, 2, 2, 3, 'Retribusi Tempat Pelelangan', '', 584),
(4, 1, 2, 2, 4, 'Retribusi Terminal', '', 585),
(4, 1, 2, 2, 5, 'Retribusi Tempat Khusus Parkir', '', 586),
(4, 1, 2, 2, 6, 'Retribusi Tempat Penginapan/Pesanggrahan/Villa', '', 587),
(4, 1, 2, 2, 7, 'Retribusi Penyediaan dan/atau Penyedotan Kakus', '', 588),
(4, 1, 2, 2, 8, 'Retribusi Rumah Potong Hewan', '', 589),
(4, 1, 2, 2, 9, 'Retribusi Pelayanan Kepelabuhan', '', 590),
(4, 1, 2, 2, 10, 'Retribusi Tempat Rekreasi dan Olahraga', '', 591),
(4, 1, 2, 2, 11, 'Retribusi Penyeberangan di Air', '', 592),
(4, 1, 2, 2, 12, 'Retribusi Pengelolaan Limbah Cair 4)', '', 593),
(4, 1, 2, 2, 13, 'Retribusi Penjualan Produksi Usaha Daerah', '', 594),
(4, 1, 2, 3, 1, 'Retribusi Izin Mendirikan Bangunan', '', 595),
(4, 1, 2, 3, 2, 'Retribusi Izin Tempat Penjualan Minuman Beralkohol', '', 596),
(4, 1, 2, 3, 3, 'Retribusi Izin Gangguan', '', 597),
(4, 1, 2, 3, 4, 'Retribusi Izin Trayek', '', 598),
(4, 1, 2, 3, 5, 'Retribusi Izin Usaha Perikanan', '', 599),
(4, 1, 3, 1, 1, 'Perusahaan Daerah', '', 600),
(4, 1, 3, 1, 2, 'BUMD ..............', '', 601),
(4, 1, 3, 2, 1, 'BUMN ..............', '', 602),
(4, 1, 3, 3, 1, 'Perusahaan Patungan', '', 603),
(4, 1, 4, 1, 1, 'Pelepasan Hak Atas Tanah', '', 604),
(4, 1, 4, 1, 2, 'Penjualan Peralatan/Perlengkapan Kantor Tidak Terpakai', '', 605),
(4, 1, 4, 1, 3, 'Penjualan Mesin/Alat-Alat Berat Tidak Terpakai', '', 606),
(4, 1, 4, 1, 4, 'Penjualan Rumah Jabatan/Rumah Dinas', '', 607),
(4, 1, 4, 1, 5, 'Penjualan Kendaraan Dinas Roda Dua', '', 608),
(4, 1, 4, 1, 6, 'Penjualan Kendaraan Dinas Roda Empat', '', 609),
(4, 1, 4, 1, 7, 'Penjualan Drum Bekas', '', 610),
(4, 1, 4, 1, 8, 'Penjualan Hasil Penebangan Pohon', '', 611),
(4, 1, 4, 1, 9, 'Penjualan Lampu Hias Bekas', '', 612),
(4, 1, 4, 1, 10, 'Penjualan Bahan-Bahan Bekas Bangunan', '', 613),
(4, 1, 4, 1, 11, 'Penjualan Perlengkapan Lalu Lintas', '', 614),
(4, 1, 4, 1, 12, 'Penjualan Obat-Obatan dan Hasil Farmasi', '', 615),
(4, 1, 4, 1, 13, 'Penjualan Hasil Pertanian', '', 616),
(4, 1, 4, 1, 14, 'Penjualan Hasil Kehutanan', '', 617),
(4, 1, 4, 1, 15, 'Penjualan Hasil Perkebunan', '', 618),
(4, 1, 4, 1, 16, 'Penjualan Hasil Peternakan', '', 619),
(4, 1, 4, 1, 17, 'Penjualan Hasil Perikanan', '', 620),
(4, 1, 4, 1, 18, 'Penjualan Hasil Sitaan', '', 621),
(4, 1, 4, 2, 1, 'Jasa Giro Kas Daerah', '', 622),
(4, 1, 4, 2, 2, 'Jasa Giro Pemegang Kas', '', 623),
(4, 1, 4, 2, 3, 'Jasa Giro Dana Cadangan', '', 624),
(4, 1, 4, 3, 1, 'Rekening Deposito Pada Bank ..............', '', 625),
(4, 1, 4, 4, 1, 'Kerugian Uang Daerah', '', 626),
(4, 1, 4, 4, 2, 'Kerugian Barang Daerah', '', 627),
(4, 1, 4, 5, 1, 'Penerimaan Komisi dari Penempatan Kas Daerah', '', 628),
(4, 1, 4, 5, 2, 'Penerimaan Potongan dari ..............', '', 629),
(4, 1, 4, 5, 3, 'Penerimaan Keuntungan Selisih Nilai Tukar Rupiah dari ..............', '', 630),
(4, 1, 4, 6, 1, 'Bidang Pendidikan', '', 631),
(4, 1, 4, 6, 2, 'Bidang Kesehatan', '', 632),
(4, 1, 4, 6, 3, 'Bidang Pekerjaan Umum dan Penataan Ruang', '', 633),
(4, 1, 4, 6, 4, 'Bidang Perumahan Rakyat dan Kawasan Pemukiman', '', 634),
(4, 1, 4, 6, 5, 'Bidang Ketentraman dan Ketertiban Umum serta Perlindungan Masyarakat', '', 635),
(4, 1, 4, 6, 6, 'Bidang Sosial', '', 636),
(4, 1, 4, 6, 7, 'Bidang Tenaga Kerja', '', 637),
(4, 1, 4, 6, 8, 'Bidang Pemberdayaan Perempuan dan Perlindungan Anak', '', 638),
(4, 1, 4, 6, 9, 'Bidang Pangan', '', 639),
(4, 1, 4, 6, 10, 'Bidang Pertanahan', '', 640),
(4, 1, 4, 6, 11, 'Bidang Lingkungan Hidup', '', 641),
(4, 1, 4, 6, 12, 'Bidang Administrasi Kependudukan dan Capil', '', 642),
(4, 1, 4, 6, 13, 'Bidang Pemberdayaan Masyarakat Desa', '', 643),
(4, 1, 4, 6, 14, 'Bidang Pengendalian Penduduk dan Keluarga Berencana', '', 644),
(4, 1, 4, 6, 15, 'Bidang Perhubungan', '', 645),
(4, 1, 4, 6, 16, 'Bidang Komunikasi dan Informatika', '', 646),
(4, 1, 4, 6, 17, 'Bidang Koperasi, Usaha Kecil dan Menengah', '', 647),
(4, 1, 4, 6, 18, 'Bidang Penanaman Modal', '', 648),
(4, 1, 4, 6, 19, 'Bidang Kepemudaan dan Olah Raga', '', 649),
(4, 1, 4, 6, 20, 'Bidang Statistik', '', 650),
(4, 1, 4, 6, 21, 'Bidang Persandian', '', 651),
(4, 1, 4, 6, 22, 'Bidang Kebudayaan', '', 652),
(4, 1, 4, 6, 23, 'Bidang Perpustakaan', '', 653),
(4, 1, 4, 6, 24, 'Bidang Kearsipan', '', 654),
(4, 1, 4, 6, 25, 'Bidang Kelautan dan Perikanan', '', 655),
(4, 1, 4, 6, 26, 'Bidang Pariwisata', '', 656),
(4, 1, 4, 6, 27, 'Bidang Pertanian', '', 657),
(4, 1, 4, 6, 28, 'Bidang Kehutanan', '', 658),
(4, 1, 4, 6, 29, 'Bidang Energi dan Sumberdaya Mineral', '', 659),
(4, 1, 4, 6, 30, 'Bidang Perdagangan', '', 660),
(4, 1, 4, 6, 31, 'Bidang Perindustrian', '', 661),
(4, 1, 4, 6, 32, 'Bidang Transmigrasi', '', 662),
(4, 1, 4, 6, 33, 'Urusan Penunjang', '', 663),
(4, 1, 4, 7, 1, 'Pendapatan Denda Pajak Hotel', '', 664),
(4, 1, 4, 7, 2, 'Pendapatan Denda Pajak Restoran', '', 665),
(4, 1, 4, 7, 3, 'Pendapatan Denda Pajak Hiburan', '', 666),
(4, 1, 4, 7, 4, 'Pendapatan Denda Pajak Reklame', '', 667),
(4, 1, 4, 7, 5, 'Pendapatan Denda Pajak Penerangan Jalan', '', 668),
(4, 1, 4, 7, 6, 'Pendapatan Denda Pajak Mineral Bukan Logam dan Batuan', '', 669),
(4, 1, 4, 7, 7, 'Pendapatan Denda Pajak Parkir', '', 670),
(4, 1, 4, 7, 8, 'Pendapatan Denda Pajak Air Tanah', '', 671),
(4, 1, 4, 7, 9, 'Pendapatan Denda Pajak Sarang Burung Walet', '', 672),
(4, 1, 4, 7, 10, 'Pendapatan Denda Pajak Lingkungan', '', 673),
(4, 1, 4, 7, 11, 'Pendapatan Denda Pajak Bumi dan Bangunan Perdesaan dan Perkotaan', '', 674),
(4, 1, 4, 7, 12, 'Pendapatan Denda Bea Perolehan Hak Atas Tanah dan Bangunan', '', 675),
(4, 1, 4, 8, 1, 'Pendapatan Denda Retribusi Jasa Umum', '', 676),
(4, 1, 4, 8, 2, 'Pendapatan Denda Retribusi Jasa Usaha', '', 677),
(4, 1, 4, 8, 3, 'Pendapatan Denda Retribusi Perizinan Tertentu', '', 678),
(4, 1, 4, 9, 1, 'Hasil Eksekusi Atas Jaminan atas Pelaksanaan Pekerjaan', '', 679),
(4, 1, 4, 9, 2, 'Hasil Eksekusi Atas Jaminan atas Pembongkaran Reklame', '', 680),
(4, 1, 4, 9, 3, 'Hasil Eksekusi Atas Jaminan atas KTP Musiman', '', 681),
(4, 1, 4, 10, 1, 'Pendapatan Dari Pengembalian Pajak Penghasilan Pasal 21', '', 682),
(4, 1, 4, 10, 2, 'Pendapatan Dari Pengembalian Kelebihan Pembayaran Asuransi Kesehatan', '', 683),
(4, 1, 4, 10, 3, 'Pendapatan Dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan', '', 684),
(4, 1, 4, 10, 4, 'Pendapatan Dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas', '', 685),
(4, 1, 4, 10, 5, 'Pendapatan Dari Pengembalian Uang Muka', '', 686),
(4, 1, 4, 10, 6, 'Pendapatan Dari Pengembalian dari Pihak Ketiga', '', 687),
(4, 1, 4, 11, 1, 'Fasilitas Sosial', '', 688),
(4, 1, 4, 11, 2, 'Fasilitas Umum', '', 689),
(4, 1, 4, 12, 1, 'Uang Pendaftaran/Ujian Masuk', '', 690),
(4, 1, 4, 12, 2, 'Uang Sekolah/Pendidikan dan Pelatihan', '', 691),
(4, 1, 4, 12, 3, 'Uang Ujian Kenaikan Tingkat/Kelas', '', 692),
(4, 1, 4, 13, 1, 'Angsuran/Cicilan Penjualan Rumah Dinas Daerah Golongan III', '', 693),
(4, 1, 4, 13, 2, 'Angsuran/Cicilan Penjualan Kendaraan Perorangan Dinas', '', 694),
(4, 1, 4, 13, 3, 'Angsuran/Cicilan Ganti Kerugian Barang Milik Daerah', '', 695),
(4, 1, 4, 14, 1, 'Hasil dari Pemanfaatan Kekayaan Daerah Sewa', '', 696),
(4, 1, 4, 14, 2, 'Hasil dari Pemanfaatan Kekayaan Daerah Kerjasama Pemanfaatan', '', 697),
(4, 1, 4, 14, 3, 'Hasil dari Pemanfaatan Kekayaan Daerah Bangun Guna Serah', '', 698),
(4, 1, 4, 14, 4, 'Hasil dari Pemanfaatan Kekayaan Daerah Bangun Serah Guna', '', 699),
(4, 1, 4, 15, 1, 'Pendapatan Zakat', '', 700),
(4, 1, 4, 16, 1, 'Pendapatan Jasa Layanan Umum BLUD', '', 701),
(4, 1, 4, 16, 2, 'Pendapatan Hibah BLUD', '', 702),
(4, 1, 4, 16, 3, 'Pendapatan Hasil Kerjasama BLUD', '', 703),
(4, 1, 4, 17, 1, 'Hasil Pengelolaan Dana Bergulir dari Kelompok Masyarakat', '', 704),
(4, 1, 4, 18, 1, 'Pendapatan Dana JKN', '', 705),
(4, 1, 4, 19, 1, 'Lain-lain PAD yang Sah Lainnya', '', 706),
(4, 2, 1, 1, 1, 'Bagi Hasil dari Pajak Bumi dan Bangunan sektor Pertambangan', '', 707),
(4, 2, 1, 1, 2, 'Bagi Hasil dari Pajak Bumi dan Bangunan sektor Perkebunan', '', 708),
(4, 2, 1, 1, 3, 'Bagi Hasil dari Pajak Bumi dan Bangunan sektor Perhutanan', '', 709),
(4, 2, 1, 1, 4, 'Bagi Hasil dari Pajak Penghasilan (PPh) Pasal 25 dan Pasal 29 Wajib Pajak Orang Pribadi Dalam Negeri dan PPh Pasal 21', '', 710),
(4, 2, 1, 1, 5, 'Bagi Hasil Cukai Hasil Tembakau', '', 711),
(4, 2, 1, 2, 1, 'Bagi Hasil dari Iuran Hak Pengusahaan Hutan', '', 712),
(4, 2, 1, 2, 2, 'Bagi Hasil dari Provisi Sumber Daya Hutan', '', 713),
(4, 2, 1, 2, 3, 'Bagi Hasil dari Dana Reboisasi', '', 714),
(4, 2, 1, 2, 4, 'Bagi Hasil dari Iuran Tetap (Land-Rent)', '', 715),
(4, 2, 1, 2, 5, 'Bagi Hasil dari Iuran Eksplorasi dan Iuran Eksploitasi (Royalti)', '', 716),
(4, 2, 1, 2, 6, 'Bagi Hasil dari Pungutan Pengusahaan Perikanan', '', 717),
(4, 2, 1, 2, 7, 'Bagi Hasil dari Pungutan Hasil Perikanan', '', 718),
(4, 2, 1, 2, 8, 'Bagi Hasil dari Pertambangan Minyak Bumi', '', 719),
(4, 2, 1, 2, 9, 'Bagi Hasil dari Pertambangan Gas Bumi', '', 720),
(4, 2, 1, 2, 10, 'Bagi Hasil dari Pertambangan Panas Bumi', '', 721),
(4, 2, 2, 1, 1, 'Dana Alokasi Umum', '', 722),
(4, 2, 3, 1, 1, 'DAK Bidang Infrastruktur Jalan', '', 723),
(4, 2, 3, 1, 2, 'DAK Bidang Infrastruktur Irigasi', '', 724),
(4, 2, 3, 1, 3, 'DAK Bidang Infrastruktur Air Minum', '', 725),
(4, 2, 3, 1, 4, 'DAK Bidang Infrastruktur Sanitasi', '', 726),
(4, 2, 3, 1, 5, 'DAK Bidang Keluarga Berencana', '', 727),
(4, 2, 3, 1, 6, 'DAK Bidang Keluarga', '', 728),
(4, 2, 3, 1, 7, 'DAK Bidang Kehutanan', '', 729),
(4, 2, 3, 1, 8, 'DAK Bidang Perumahan dan Kawasan Pemukiman', '', 730),
(4, 2, 3, 1, 9, 'DAK Bidang Kesehatan', '', 731),
(4, 2, 3, 1, 10, 'DAK Bidang Kelautan dan Perikanan', '', 732),
(4, 2, 3, 1, 11, 'DAK Bidang Prasarana Pemerintahan', '', 733),
(4, 2, 3, 1, 12, 'DAK Bidang Transportasi Perdesaan', '', 734),
(4, 2, 3, 1, 13, 'DAK Bidang Perdagangan', '', 735),
(4, 2, 3, 1, 14, 'DAK Bidang Lingkungan Hidup', '', 736),
(4, 2, 3, 1, 15, 'DAK Bidang Sarana dan Prasarana Daerah Tertinggal (SPDT)', '', 737),
(4, 2, 3, 1, 16, 'DAK Bidang Pertanian', '', 738),
(4, 2, 3, 1, 17, 'DAK Bidang Energi Pedesaan', '', 739),
(4, 2, 3, 1, 18, 'DAK Bidang Sarana dan Prasarana Kawasan Perbatasan', '', 740),
(4, 2, 3, 1, 19, 'DAK Bidang Pendidikan', '', 741),
(4, 2, 3, 1, 20, 'DAK Bidang Keselamatan Transportasi Darat', '', 742),
(4, 3, 1, 1, 1, 'Pemerintah', '', 743),
(4, 3, 1, 2, 1, 'Pemerintah Daerah ..............', '', 744),
(4, 3, 1, 3, 1, 'Badan/Lembaga/Organisasi Swasta ..............', '', 745),
(4, 3, 1, 4, 1, 'Kelompok Masyarakat/Perorangan', '', 746),
(4, 3, 1, 5, 1, 'Pendapatan Hibah Dari Bilateral', '', 747),
(4, 3, 1, 5, 2, 'Pendapatan Hibah Dari Multilateral', '', 748),
(4, 3, 1, 5, 3, 'Pendapatan Hibah Dari Donor Lainnya', '', 749),
(4, 3, 2, 1, 1, 'Korban/Kerusakan Akibat Bencana Alam ..............', '', 750),
(4, 3, 3, 1, 1, 'Bagi Hasil dari Pajak Kendaraan Bermotor', '', 751),
(4, 3, 3, 1, 2, 'Bagi Hasil dari Pajak Kendaraan Di atas Air 4)', '', 752),
(4, 3, 3, 1, 3, 'Bagi Hasil dari Bea Balik Nama Kendaraan Bermotor', '', 753),
(4, 3, 3, 1, 4, 'Bagi Hasil dari Pajak Bea Balik Nama Kendaraan Di atas Air 4)', '', 754),
(4, 3, 3, 1, 5, 'Bagi Hasil dari Pajak Bahan Bakar Kendaraan Bermotor', '', 755),
(4, 3, 3, 1, 6, 'Bagi Hasil dari Pajak Pengambilan dan Pemanfaatan Air Bawah Tanah 4)', '', 756),
(4, 3, 3, 1, 7, 'Bagi Hasil dari Pajak Air Permukaan', '', 757),
(4, 3, 3, 1, 8, 'Bagi Hasil dari Pajak Rokok', '', 758),
(4, 3, 3, 2, 1, 'Dana Bagi Hasil Pajak dari Provinsi ..............', '', 759),
(4, 3, 3, 3, 1, 'Dana Bagi Hasil Pajak dari Kabupaten ..............', '', 760),
(4, 3, 3, 4, 1, 'Dana Bagi Hasil Pajak dari Kota ..............', '', 761),
(4, 3, 4, 1, 1, 'Dana BOS', '', 762),
(4, 3, 4, 2, 1, 'Dana Otonomi Khusus', '', 763),
(4, 3, 5, 1, 1, 'Bantuan Keuangan Dari Provinsi ..............', '', 764),
(4, 3, 5, 2, 1, 'Bantuan Keuangan Dari Kabupaten ..............', '', 765),
(4, 3, 5, 3, 1, 'Bantuan Keuangan Dari Kota ..............', '', 766),
(5, 1, 1, 1, 1, 'Gaji Pokok PNS/Uang Representasi1)', '', 767),
(5, 1, 1, 1, 2, 'Tunjangan Keluarga', '', 768),
(5, 1, 1, 1, 3, 'Tunjangan Jabatan 1)', '', 769),
(5, 1, 1, 1, 4, 'Tunjangan Fungsional', '', 770),
(5, 1, 1, 1, 5, 'Tunjangan Fungsional Umum', '', 771),
(5, 1, 1, 1, 6, 'Tunjangan Beras 1)', '', 772),
(5, 1, 1, 1, 7, 'Tunjangan PPh/Tunjangan Khusus', '', 773),
(5, 1, 1, 1, 8, 'Pembulatan Gaji', '', 774),
(5, 1, 1, 1, 9, 'Iuran Asuransi Kesehatan', '', 775),
(5, 1, 1, 1, 10, 'Uang Paket 2)', '', 776),
(5, 1, 1, 1, 11, 'Tunjangan Badan Musyawarah 2)', '', 777),
(5, 1, 1, 1, 12, 'Tunjangan Komisi 2)', '', 778),
(5, 1, 1, 1, 13, 'Tunjangan Badan Anggaran 2)', '', 779),
(5, 1, 1, 1, 14, 'Tunjangan Badan Kehormatan 2)', '', 780),
(5, 1, 1, 1, 15, 'Tunjangan Alat Kelengkapan Lainnya 2)', '', 781),
(5, 1, 1, 1, 16, 'Tunjangan Perumahan 2)', '', 782),
(5, 1, 1, 1, 17, 'Uang Duka Wafat/Tewas 1)', '', 783),
(5, 1, 1, 1, 18, 'Uang Jasa Pengabdian 2)', '', 784),
(5, 1, 1, 1, 19, 'Belanja Penunjang Operasional Pimpinan DPRD', '', 785),
(5, 1, 1, 1, 20, 'Tunjangan Kesehatan DPRD', '', 786),
(5, 1, 1, 2, 1, 'Tambahan Penghasilan berdasarkan beban kerja', '', 787),
(5, 1, 1, 2, 2, 'Tambahan Penghasilan berdasarkan tempat bertugas', '', 788),
(5, 1, 1, 2, 3, 'Tambahan Penghasilan berdasarkan kondisi kerja', '', 789),
(5, 1, 1, 2, 4, 'Tambahan Penghasilan berdasarkan kelangkaan profesi', '', 790),
(5, 1, 1, 3, 1, 'Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD', '', 791),
(5, 1, 1, 3, 2, 'Belanja Penunjang Operasional KDH/WKDH', '', 792),
(5, 1, 1, 4, 1, 'Biaya Pemungutan PBB', '', 793),
(5, 1, 1, 5, 1, 'Insentif Pemungutan Pajak Daerah', '', 794),
(5, 1, 1, 6, 1, 'Insentif Pemungutan Retribusi Daerah', '', 795),
(5, 1, 2, 1, 1, 'Bunga Utang Pinjaman kepada Pemerintah', '', 796),
(5, 1, 2, 1, 2, 'Bunga Utang Pinjaman kepada Pemerintah Daerah lainnya', '', 797),
(5, 1, 2, 1, 3, 'Bunga Utang Pinjaman kepada Lembaga Keuangan Bank', '', 798),
(5, 1, 2, 1, 4, 'Bunga Utang Pinjaman kepada Lembaga Keuangan Bukan Bank', '', 799),
(5, 1, 2, 2, 1, 'Bunga Utang Obligasi ………', '', 800),
(5, 1, 3, 1, 1, 'Belanja Subsidi kepada Perusahaan ….', '', 801),
(5, 1, 3, 1, 2, 'Belanja Subsidi kepada Lembaga ….', '', 802),
(5, 1, 4, 1, 1, 'Hibah kepada Pemerintah Pusat', '', 803),
(5, 1, 4, 2, 1, 'Pemerintah Provinsi ……….', '', 804),
(5, 1, 4, 2, 2, 'Pemerintah Kabupaten/Kota ..........', '', 805),
(5, 1, 4, 3, 1, 'Pemerintahan Desa ….......', '', 806),
(5, 1, 4, 4, 1, 'Perusahaan Daerah/ BUMD/ BUMN …...........', '', 807),
(5, 1, 4, 5, 1, 'Belanja Hibah kepada Badan/Lembaga/Organisasi …...........', '', 808),
(5, 1, 4, 6, 1, 'Belanja Hibah kepada Kelompok/anggota masyarakat ……..', '', 809),
(5, 1, 4, 7, 1, 'Belanja Hibah Dana BOS ke SD Swasta', '', 810),
(5, 1, 4, 7, 2, 'Belanja Hibah Dana BOS ke SMP Swasta', '', 811),
(5, 1, 5, 1, 1, 'Belanja Bantuan Sosial kepada Organisasi Sosial Kemasyarakatan ....', '', 812),
(5, 1, 5, 2, 1, 'Belanja Bantuan Sosial kepada Kelompok Masyarakat .................', '', 813),
(5, 1, 5, 3, 1, 'Belanja Bantuan Sosial kepada ……………………', '', 814),
(5, 1, 6, 1, 1, 'Belanja Bagi Hasil Pajak Daerah Kepada Provinsi ...', '', 815),
(5, 1, 6, 2, 1, 'Belanja Bagi Hasil Pajak Daerah Kepada Kabupaten/Kota …', '', 816),
(5, 1, 6, 3, 1, 'Belanja Bagi Hasil Pajak Daerah Kepada Pemerintahan Desa …', '', 817),
(5, 1, 6, 4, 1, 'Belanja Bagi Hasil Retribusi Daerah Kepada Kabupaten/Kota ….', '', 818),
(5, 1, 6, 5, 1, 'Belanja Bagi Hasil Retribusi Daerah Kepada Pemerintahan Desa ….', '', 819),
(5, 1, 7, 1, 1, 'Belanja Bantuan Keuangan Kepada Provinsi …...', '', 820),
(5, 1, 7, 2, 1, 'Belanja Bantuan Keuangan kepada Kabupaten/Kota …...', '', 821),
(5, 1, 7, 3, 1, 'Belanja Bantuan Keuangan kepada Desa ……', '', 822),
(5, 1, 7, 4, 1, 'Belanja Bantuan Keuangan kepada Provinsi ...', '', 823),
(5, 1, 7, 4, 2, 'Belanja Bantuan Keuangan kepada Kabupaten/Kota …', '', 824),
(5, 1, 7, 4, 3, 'Belanja Bantuan Keuangan kepada Pemerintahan Desa ...', '', 825),
(5, 1, 7, 5, 1, 'Belanja Bantuan kepada Partai Politik ................', '', 826),
(5, 1, 8, 1, 1, 'Belanja Tidak Terduga', '', 827),
(5, 2, 1, 1, 1, 'Honorarium Panitia Pelaksana Kegiatan', '', 828),
(5, 2, 1, 1, 2, 'Honorarium Tim Pengadaan Barang dan Jasa', '', 829),
(5, 2, 1, 2, 1, 'Honorarium Tenaga Ahli/Instruktur/Narasumber', '', 830),
(5, 2, 1, 2, 2, 'Honorarium Pegawai Honorer/tidak tetap', '', 831),
(5, 2, 1, 3, 1, 'Uang Lembur PNS', '', 832),
(5, 2, 1, 3, 2, 'Uang Lembur Non PNS', '', 833),
(5, 2, 1, 4, 1, 'Honorarium Pengelolaan Dana BOS', '', 834),
(5, 2, 1, 5, 1, 'Uang untuk diberikan kepada pihak ketiga', '', 835),
(5, 2, 1, 5, 2, 'Uang untuk diberikan kepada masyarakat', '', 836),
(5, 2, 2, 1, 1, 'Belanja alat tulis kantor', '', 837),
(5, 2, 2, 1, 2, 'Belanja dokumen/administrasi tender', '', 838),
(5, 2, 2, 1, 3, 'Belanja alat listrik dan elektronik ( lampu pijar, battery kering)', '', 839),
(5, 2, 2, 1, 4, 'Belanja perangko, materai dan benda pos lainnya', '', 840),
(5, 2, 2, 1, 5, 'Belanja peralatan kebersihan dan bahan pembersih', '', 841),
(5, 2, 2, 1, 6, 'Belanja Bahan Bakar Minyak/Gas sarana mobilitas', '', 842),
(5, 2, 2, 1, 7, 'Belanja pengisian tabung pemadam kebakaran', '', 843),
(5, 2, 2, 1, 8, 'Belanja pengisian tabung gas', '', 844),
(5, 2, 2, 2, 1, 'Belanja bahan baku bangunan', '', 845),
(5, 2, 2, 2, 2, 'Belanja bahan/bibit tanaman', '', 846),
(5, 2, 2, 2, 3, 'Belanja bibit ternak', '', 847),
(5, 2, 2, 2, 4, 'Belanja bahan obat-obatan', '', 848),
(5, 2, 2, 2, 5, 'Belanja bahan kimia', '', 849),
(5, 2, 2, 2, 6, 'Belanja Persediaan Bahan Makanan Pokok', '', 850),
(5, 2, 2, 3, 1, 'Belanja telepon', '', 851),
(5, 2, 2, 3, 2, 'Belanja air', '', 852),
(5, 2, 2, 3, 3, 'Belanja listrik', '', 853),
(5, 2, 2, 3, 4, 'Belanja Jasa pengumuman lelang/ pemenang lelang', '', 854),
(5, 2, 2, 3, 5, 'Belanja surat kabar/majalah', '', 855),
(5, 2, 2, 3, 6, 'Belanja kawat/faksimili/internet', '', 856),
(5, 2, 2, 3, 7, 'Belanja paket/pengiriman', '', 857),
(5, 2, 2, 3, 8, 'Belanja Sertifikasi', '', 858),
(5, 2, 2, 3, 9, 'Belanja Jasa Transaksi Keuangan', '', 859),
(5, 2, 2, 3, 10, 'Belanja jasa administrasi pungutan Pajak Penerangan Jalan Umum', '', 860),
(5, 2, 2, 3, 11, 'Belanja jasa administrasi pungutan Pajak Bahan Bakar Kendaraan Bermotor', '', 861),
(5, 2, 2, 4, 1, 'Belanja Premi Asuransi Kesehatan 2)', '', 862),
(5, 2, 2, 4, 2, 'Belanja Premi Asuransi Barang Milik Daerah', '', 863),
(5, 2, 2, 5, 1, 'Belanja Jasa Service', '', 864),
(5, 2, 2, 5, 2, 'Belanja Penggantian Suku Cadang', '', 865),
(5, 2, 2, 5, 3, 'Belanja Bahan Bakar Minyak/Gas dan pelumas', '', 866),
(5, 2, 2, 5, 4, 'Belanja Jasa KIR', '', 867),
(5, 2, 2, 5, 5, 'Belanja Pajak Kendaraan Bermotor', '', 868),
(5, 2, 2, 5, 6, 'Belanja Bea Balik Nama Kendaraan Bermotor', '', 869),
(5, 2, 2, 6, 1, 'Belanja cetak', '', 870),
(5, 2, 2, 6, 2, 'Belanja Penggandaan', '', 871),
(5, 2, 2, 7, 1, 'Belanja sewa rumah jabatan/rumah dinas', '', 872),
(5, 2, 2, 7, 2, 'Belanja sewa gedung/ kantor/tempat', '', 873),
(5, 2, 2, 7, 3, 'Belanja sewa ruang rapat/pertemuan', '', 874),
(5, 2, 2, 7, 4, 'Belanja sewa tempat parkir/uang tambat/hanggar sarana mobilitas', '', 875),
(5, 2, 2, 8, 1, 'Belanja sewa Sarana Mobilitas Darat', '', 876),
(5, 2, 2, 8, 2, 'Belanja sewa Sarana Mobilitas Air', '', 877),
(5, 2, 2, 8, 3, 'Belanja sewa Sarana Mobilitas Udara', '', 878),
(5, 2, 2, 9, 1, 'Belanja sewa Eskavator', '', 879),
(5, 2, 2, 9, 2, 'Belanja sewa Buldoser', '', 880),
(5, 2, 2, 10, 1, 'Belanja sewa meja kursi', '', 881),
(5, 2, 2, 10, 2, 'Belanja sewa komputer dan printer', '', 882),
(5, 2, 2, 10, 3, 'Belanja sewa proyektor', '', 883),
(5, 2, 2, 10, 4, 'Belanja sewa generator', '', 884),
(5, 2, 2, 10, 5, 'Belanja sewa tenda', '', 885),
(5, 2, 2, 10, 6, 'Belanja sewa pakaian adat/tradisional', '', 886),
(5, 2, 2, 11, 1, 'Belanja makanan dan minuman harian pegawai', '', 887),
(5, 2, 2, 11, 2, 'Belanja makanan dan minuman rapat', '', 888),
(5, 2, 2, 11, 3, 'Belanja makanan dan minuman tamu', '', 889),
(5, 2, 2, 11, 4, 'Belanja makanan dan minuman pelatihan', '', 890),
(5, 2, 2, 12, 1, 'Belanja pakaian Dinas KDH dan WKDH', '', 891),
(5, 2, 2, 12, 2, 'Belanja Pakaian Sipil Harian (PSH)', '', 892),
(5, 2, 2, 12, 3, 'Belanja Pakaian Sipil Lengkap (PSL)', '', 893),
(5, 2, 2, 12, 4, 'Belanja Pakaian Dinas Harian (PDH)', '', 894),
(5, 2, 2, 12, 5, 'Belanja Pakaian Dinas Upacara (PDU)', '', 895),
(5, 2, 2, 13, 1, 'Belanja pakaian kerja lapangan', '', 896),
(5, 2, 2, 14, 1, 'Belanja pakaian KORPRI', '', 897),
(5, 2, 2, 14, 2, 'Belanja pakaian adat daerah', '', 898),
(5, 2, 2, 14, 3, 'Belanja pakaian batik tradisional', '', 899),
(5, 2, 2, 14, 4, 'Belanja pakaian olahraga', '', 900),
(5, 2, 2, 15, 1, 'Belanja perjalanan dinas dalam daerah', '', 901),
(5, 2, 2, 15, 2, 'Belanja perjalanan dinas luar daerah', '', 902),
(5, 2, 2, 15, 3, 'Belanja perjalanan dinas luar negeri', '', 903),
(5, 2, 2, 16, 1, 'Belanja beasiswa tugas belajar D3', '', 904),
(5, 2, 2, 16, 2, 'Belanja beasiswa tugas belajar S1', '', 905),
(5, 2, 2, 16, 3, 'Belanja beasiswa tugas belajar S2', '', 906),
(5, 2, 2, 16, 4, 'Belanja beasiswa tugas belajar S3', '', 907),
(5, 2, 2, 17, 1, 'Belanja kursus-kursus singkat/ pelatihan', '', 908);
INSERT INTO `ref_rek_5` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`, `kd_rek_5`, `nama_kd_rek_5`, `peraturan`, `id_rekening`) VALUES
(5, 2, 2, 17, 2, 'Belanja sosialisasi', '', 909),
(5, 2, 2, 17, 3, 'Belanja Bimbingan Teknis', '', 910),
(5, 2, 2, 18, 1, 'Belanja perjalanan pindah tugas dalam daerah', '', 911),
(5, 2, 2, 18, 2, 'Belanja perjalanan pindah tugas luar daerah', '', 912),
(5, 2, 2, 19, 1, 'Belanja pemulangan pegawai yang pensiun dalam daerah', '', 913),
(5, 2, 2, 19, 2, 'Belanja pemulangan pegawai yang pensiun luar daerah', '', 914),
(5, 2, 2, 19, 3, 'Belanja pemulangan pegawai yang tewas dalam melaksanakan tugas', '', 915),
(5, 2, 2, 20, 1, 'Belanja Pemeliharan Tanah', '', 916),
(5, 2, 2, 20, 2, 'Belanja Pemeliharan Peralatan dan Mesin', '', 917),
(5, 2, 2, 20, 3, 'Belanja Pemeliharan Gedung dan Bangunan', '', 918),
(5, 2, 2, 20, 4, 'Belanja Pemeliharan Jalan', '', 919),
(5, 2, 2, 20, 5, 'Belanja Pemeliharan Jembatan', '', 920),
(5, 2, 2, 20, 6, 'Belanja Pemeliharan Aset Tetap Lainnya', '', 921),
(5, 2, 2, 21, 1, 'Belanja Jasa Konsultansi Penelitian', '', 922),
(5, 2, 2, 21, 2, 'Belanja Jasa Konsultansi Perencanaan', '', 923),
(5, 2, 2, 21, 3, 'Belanja Jasa Konsultansi Pengawasan', '', 924),
(5, 2, 2, 22, 1, 'Belanja Barang Dana BOS', '', 925),
(5, 2, 2, 23, 1, 'Belanja Barang Yang Akan Diserahkan Kepada Masyarakat', '', 926),
(5, 2, 2, 23, 2, 'Belanja Barang Yang Akan Diserahkan Kepada Pihak Ketiga', '', 927),
(5, 2, 2, 24, 1, 'Belanja Barang Yang Akan Dijual Kepada Masyarakat', '', 928),
(5, 2, 2, 24, 2, 'Belanja Barang Yang Akan Dijual Kepada Pihak Ketiga', '', 929),
(5, 2, 3, 1, 1, 'Belanja Modal Tanah - Pengadaan Tanah Kampung', '', 930),
(5, 2, 3, 1, 2, 'Belanja Modal Tanah - Pengadaan Tanah Emplasmen', '', 931),
(5, 2, 3, 1, 3, 'Belanja Modal Tanah - Pengadaan Tanah Kuburan', '', 932),
(5, 2, 3, 2, 1, 'Belanja Modal Tanah - Pengadaan Tanah Sawah Satu Tahun Ditanami', '', 933),
(5, 2, 3, 2, 2, 'Belanja Modal Tanah - Pengadaan Tanah Tegalan', '', 934),
(5, 2, 3, 2, 3, 'Belanja Modal Tanah - Pengadaan Tanah Ladang', '', 935),
(5, 2, 3, 3, 1, 'Belanja Modal Tanah - Pengadaan Tanah Perkebunan', '', 936),
(5, 2, 3, 4, 1, 'Belanja Modal Tanah - Pengadaan Bidang Tanah Kebun Yang Tidak Ada Jaringan Pengairan', '', 937),
(5, 2, 3, 4, 2, 'Belanja Modal Tanah - Pengadaan Kebun Tumbuh Liar Bercampur Jenis Lain', '', 938),
(5, 2, 3, 5, 1, 'Belanja Modal Tanah - Pengadaan Hutan Lebat', '', 939),
(5, 2, 3, 5, 2, 'Belanja Modal Tanah - Pengadaan Hutan Belukar', '', 940),
(5, 2, 3, 5, 3, 'Belanja Modal Tanah - Pengadaan Hutan Tanaman Jenis', '', 941),
(5, 2, 3, 5, 4, 'Belanja Modal Tanah - Pengadaan Hutan Alam Sejenis/Hutan Rawa', '', 942),
(5, 2, 3, 5, 5, 'Belanja Modal Tanah - Pengadaan Hutan Untuk Penggunaan Khusus', '', 943),
(5, 2, 3, 6, 1, 'Belanja Modal Tanah - Pengadaan Kolam Ikan Tambak', '', 944),
(5, 2, 3, 6, 2, 'Belanja Modal Tanah - Pengadaan Kolam Ikan Air Tawar', '', 945),
(5, 2, 3, 7, 1, 'Belanja Modal Tanah - Pengadaan Tanah Rawa', '', 946),
(5, 2, 3, 7, 2, 'Belanja Modal Tanah - Pengadaan Tanah Danau', '', 947),
(5, 2, 3, 8, 1, 'Belanja Modal Tanah - Pengadaan Tanah Tandus', '', 948),
(5, 2, 3, 8, 2, 'Belanja Modal Tanah - Pengadaan Tanah Rusak', '', 949),
(5, 2, 3, 9, 1, 'Belanja Modal Tanah - Pengadaan Tanah Alang-alang', '', 950),
(5, 2, 3, 9, 2, 'Belanja Modal Tanah - Pengadaan Tanah Padang Rumput', '', 951),
(5, 2, 3, 10, 1, 'Belanja Modal Tanah - Pengadaan Tanah Penggalian', '', 952),
(5, 2, 3, 11, 1, 'Belanja Modal Tanah - Pengadaan Tanah Bangunan Perumahan/G. Tempat Tinggal', '', 953),
(5, 2, 3, 11, 2, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Gedung Perdagangan/Perusahaan', '', 954),
(5, 2, 3, 11, 3, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Industri', '', 955),
(5, 2, 3, 11, 4, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Tempat Kerja/Jasa', '', 956),
(5, 2, 3, 11, 5, 'Belanja Modal Tanah - Pengadaan Tanah Kosong', '', 957),
(5, 2, 3, 11, 6, 'Belanja Modal Tanah - Pengadaan Tanah Peternakan', '', 958),
(5, 2, 3, 11, 7, 'Belanja Modal Tanah - Pengadaan Tanah Bangunan Pengairan', '', 959),
(5, 2, 3, 11, 8, 'Belanja Modal Tanah - Pengadaan Tanah Bangunan Jalan dan Jembatan', '', 960),
(5, 2, 3, 11, 9, 'Belanja Modal Tanah - Pengadaan Tanah Lembiran/Bantaran/Lepe-lepe/Setren dst', '', 961),
(5, 2, 3, 12, 1, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Pertambangan', '', 962),
(5, 2, 3, 13, 1, 'Belanja Modal Tanah - Pengadaan Tanah Lapangan Olah Raga', '', 963),
(5, 2, 3, 13, 2, 'Belanja Modal Tanah - Pengadaan Tanah Lapangan Parkir', '', 964),
(5, 2, 3, 13, 3, 'Belanja Modal Tanah - Pengadaan Tanah Lapangan Penimbun Barang', '', 965),
(5, 2, 3, 13, 4, 'Belanja Modal Tanah - Pengadaan Tanah Lapangan Pemancar dan Studio Alam', '', 966),
(5, 2, 3, 13, 5, 'Belanja Modal Tanah - Pengadaan Tanah Lapangan Pengujian/Pengolahan', '', 967),
(5, 2, 3, 13, 6, 'Belanja Modal Tanah - Pengadaan Tanah Lapangan Terbang', '', 968),
(5, 2, 3, 13, 7, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Jalan', '', 969),
(5, 2, 3, 13, 8, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Air', '', 970),
(5, 2, 3, 13, 9, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Instalasi', '', 971),
(5, 2, 3, 13, 10, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Jaringan', '', 972),
(5, 2, 3, 13, 11, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Bersejarah', '', 973),
(5, 2, 3, 13, 12, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Gedung Olah Raga', '', 974),
(5, 2, 3, 13, 13, 'Belanja Modal Tanah - Pengadaan Tanah Untuk Bangunan Tempat Ibadah', '', 975),
(5, 2, 3, 14, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Tractor', '', 976),
(5, 2, 3, 14, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Grader', '', 977),
(5, 2, 3, 14, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Excavator', '', 978),
(5, 2, 3, 14, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pile Driver', '', 979),
(5, 2, 3, 14, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Hauler', '', 980),
(5, 2, 3, 14, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Asphal Equipment', '', 981),
(5, 2, 3, 14, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Compacting Equipment', '', 982),
(5, 2, 3, 14, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Aggregate & Concrete Equipment', '', 983),
(5, 2, 3, 14, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Loader', '', 984),
(5, 2, 3, 14, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pengangkat', '', 985),
(5, 2, 3, 14, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Mesin Proses', '', 986),
(5, 2, 3, 15, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Dredger', '', 987),
(5, 2, 3, 15, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Floating Excavator', '', 988),
(5, 2, 3, 15, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Amphibi Dredger', '', 989),
(5, 2, 3, 15, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kapal Tarik', '', 990),
(5, 2, 3, 15, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Mesin Proses Agung', '', 991),
(5, 2, 3, 16, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Penarik', '', 992),
(5, 2, 3, 16, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Feeder', '', 993),
(5, 2, 3, 16, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Compressor', '', 994),
(5, 2, 3, 16, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Electric Generating Set', '', 995),
(5, 2, 3, 16, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pompa', '', 996),
(5, 2, 3, 16, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Mesin Bor', '', 997),
(5, 2, 3, 16, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Unit Pemeliharaan Lapangan', '', 998),
(5, 2, 3, 16, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pengolahan Air Kotor', '', 999),
(5, 2, 3, 16, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pembangkit Uap Air Panas/Sistem Generator', '', 1000),
(5, 2, 3, 17, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Dinas Bermotor Perorangan', '', 1001),
(5, 2, 3, 17, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Bermotor Penumpang', '', 1002),
(5, 2, 3, 17, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Bermotor Angkutan Barang', '', 1003),
(5, 2, 3, 17, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Bermotor Khusus', '', 1004),
(5, 2, 3, 17, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Bermotor Beroda Dua', '', 1005),
(5, 2, 3, 17, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Bermotor Beroda Tiga', '', 1006),
(5, 2, 3, 18, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Bermotor Angkutan Barang', '', 1007),
(5, 2, 3, 18, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kendaraan Tak Bermotor Berpenumpang', '', 1008),
(5, 2, 3, 19, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Bermotor Barang', '', 1009),
(5, 2, 3, 19, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Bermotor Penumpang', '', 1010),
(5, 2, 3, 19, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Bermotor Khusus', '', 1011),
(5, 2, 3, 20, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Tak Bermotor Untuk Barang', '', 1012),
(5, 2, 3, 20, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Tak Bermotor Penumpang', '', 1013),
(5, 2, 3, 20, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Angkut Apung Tak Bermotor Khusus', '', 1014),
(5, 2, 3, 21, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kapal Terbang', '', 1015),
(5, 2, 3, 22, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Konstruksi Logam Terpasang pada Pondasi', '', 1016),
(5, 2, 3, 22, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Konstruksi Logam yang Berpindah', '', 1017),
(5, 2, 3, 22, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Listrik', '', 1018),
(5, 2, 3, 22, 4, 'Belanja Modal Peralatan dan Mesin - Perkakas Bengkel Service', '', 1019),
(5, 2, 3, 22, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Pengangkat Bermesin', '', 1020),
(5, 2, 3, 22, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Kayu', '', 1021),
(5, 2, 3, 22, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Khusus', '', 1022),
(5, 2, 3, 22, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Las', '', 1023),
(5, 2, 3, 22, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Pabrik Es', '', 1024),
(5, 2, 3, 23, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Konstruksi Logam', '', 1025),
(5, 2, 3, 23, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Listrik', '', 1026),
(5, 2, 3, 23, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Service', '', 1027),
(5, 2, 3, 23, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Pengangkat', '', 1028),
(5, 2, 3, 23, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Standar (Standart Tool)', '', 1029),
(5, 2, 3, 23, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Khusus (Special Tool)', '', 1030),
(5, 2, 3, 23, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Perkakas Bengkel Kerja', '', 1031),
(5, 2, 3, 23, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Tukang-tukang Besi', '', 1032),
(5, 2, 3, 23, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Tukang Kayu', '', 1033),
(5, 2, 3, 23, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Tukang Kulit', '', 1034),
(5, 2, 3, 23, 11, 'Belanja Modal Peralatan dan Mesin - PengadaanPeralatan Ukur, Gip & Feting', '', 1035),
(5, 2, 3, 24, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur Universal', '', 1036),
(5, 2, 3, 24, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur/Test Intelegensia', '', 1037),
(5, 2, 3, 24, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur/Test Alat Kepribadian', '', 1038),
(5, 2, 3, 24, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur /Test Klinis Lain', '', 1039),
(5, 2, 3, 24, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kalibrasi', '', 1040),
(5, 2, 3, 24, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Oscilloscope', '', 1041),
(5, 2, 3, 24, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Universal Tester', '', 1042),
(5, 2, 3, 24, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur/Pembanding', '', 1043),
(5, 2, 3, 24, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur Lainnya', '', 1044),
(5, 2, 3, 24, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Timbangan/Blora', '', 1045),
(5, 2, 3, 24, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Anak Timbangan/Biasa', '', 1046),
(5, 2, 3, 24, 12, 'Belanja Modal Peralatan dan Mesin - Pengadaan Takaran Kering', '', 1047),
(5, 2, 3, 24, 13, 'Belanja Modal Peralatan dan Mesin - Pengadaan Takaran Bahan Bangunan 2 HL', '', 1048),
(5, 2, 3, 24, 14, 'Belanja Modal Peralatan dan Mesin - Pengadaan Takaran Latex/Getah Susu', '', 1049),
(5, 2, 3, 24, 15, 'Belanja Modal Peralatan dan Mesin - Pengadaan Gelas Takar Berbagai Kapasitas', '', 1050),
(5, 2, 3, 25, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pengolahan Tanah dan Tanaman', '', 1051),
(5, 2, 3, 25, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Panen/Pengolahan', '', 1052),
(5, 2, 3, 25, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat-Alat Peternakan', '', 1053),
(5, 2, 3, 25, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Penyimpanan Hasil Percobaan Pertanian', '', 1054),
(5, 2, 3, 25, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Pertanian', '', 1055),
(5, 2, 3, 25, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Procesing', '', 1056),
(5, 2, 3, 25, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pasca Panen', '', 1057),
(5, 2, 3, 25, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pengolahan Produksi Perikanan', '', 1058),
(5, 2, 3, 26, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pemeliharaan Tanaman', '', 1059),
(5, 2, 3, 26, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Panen', '', 1060),
(5, 2, 3, 26, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Penyimpanan', '', 1061),
(5, 2, 3, 26, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium', '', 1062),
(5, 2, 3, 26, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Penangkap Ikan', '', 1063),
(5, 2, 3, 27, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Mesin Ketik', '', 1064),
(5, 2, 3, 27, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Mesin Hitung/Jumlah', '', 1065),
(5, 2, 3, 27, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Reproduksi (Pengganda)', '', 1066),
(5, 2, 3, 27, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Penyimpanan Perlengkapan Kantor', '', 1067),
(5, 2, 3, 27, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kantor Lainnya', '', 1068),
(5, 2, 3, 28, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Meubelair', '', 1069),
(5, 2, 3, 28, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pengukur Waktu', '', 1070),
(5, 2, 3, 28, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pembersih', '', 1071),
(5, 2, 3, 28, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pendingin', '', 1072),
(5, 2, 3, 28, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Dapur', '', 1073),
(5, 2, 3, 28, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Rumah Tangga Lainnya (Home Use)', '', 1074),
(5, 2, 3, 28, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Pemadam Kebakaran', '', 1075),
(5, 2, 3, 29, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Komputer Unit Jaringan', '', 1076),
(5, 2, 3, 29, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Personal Komputer', '', 1077),
(5, 2, 3, 29, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Komputer Mainframe', '', 1078),
(5, 2, 3, 29, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Mini Komputer', '', 1079),
(5, 2, 3, 29, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Personal Komputer', '', 1080),
(5, 2, 3, 29, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Jaringan', '', 1081),
(5, 2, 3, 30, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Meja Kerja Pejabat', '', 1082),
(5, 2, 3, 30, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Meja Rapat Pejabat', '', 1083),
(5, 2, 3, 30, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kursi Kerja Pejabat', '', 1084),
(5, 2, 3, 30, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kursi Rapat Pejabat', '', 1085),
(5, 2, 3, 30, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kursi Hadap Depan Meja Kerja Pejabat', '', 1086),
(5, 2, 3, 30, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Kursi Tamu di Ruangan Pejabat', '', 1087),
(5, 2, 3, 30, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Lemari dan Arsip Pejabat', '', 1088),
(5, 2, 3, 31, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Studio Visual', '', 1089),
(5, 2, 3, 31, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Studio Video dan Film', '', 1090),
(5, 2, 3, 31, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Studio Video dan Film A', '', 1091),
(5, 2, 3, 31, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Cetak', '', 1092),
(5, 2, 3, 31, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Computing', '', 1093),
(5, 2, 3, 31, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemetaan Ukur', '', 1094),
(5, 2, 3, 32, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi Telephone', '', 1095),
(5, 2, 3, 32, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi Radio SSB', '', 1096),
(5, 2, 3, 32, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi Radio HF/FM', '', 1097),
(5, 2, 3, 32, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi Radio VHF', '', 1098),
(5, 2, 3, 32, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi Radio UHF', '', 1099),
(5, 2, 3, 32, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Komunikasi Sosial', '', 1100),
(5, 2, 3, 32, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat-alat Sandi', '', 1101),
(5, 2, 3, 33, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemancar MF/MW', '', 1102),
(5, 2, 3, 33, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemancar HF/SW', '', 1103),
(5, 2, 3, 33, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemancar VHF/FM', '', 1104),
(5, 2, 3, 33, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemancar UHF', '', 1105),
(5, 2, 3, 33, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Pemancar SHF', '', 1106),
(5, 2, 3, 33, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Antena MF/MW', '', 1107),
(5, 2, 3, 33, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Antena HF/SW', '', 1108),
(5, 2, 3, 33, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Antena VHF/FM', '', 1109),
(5, 2, 3, 33, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Antena UHF', '', 1110),
(5, 2, 3, 33, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Antena SHF/Parabola', '', 1111),
(5, 2, 3, 33, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Translator VHF/VHF', '', 1112),
(5, 2, 3, 33, 12, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Translator UHF/UHF', '', 1113),
(5, 2, 3, 33, 13, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Translator VHF/UHF', '', 1114),
(5, 2, 3, 33, 14, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Translator UHF/VHF', '', 1115),
(5, 2, 3, 33, 15, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Microvawe FPU', '', 1116),
(5, 2, 3, 33, 16, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Microvawe Terestrial', '', 1117),
(5, 2, 3, 33, 17, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Microvawe TVRO', '', 1118),
(5, 2, 3, 33, 18, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Dummy Load', '', 1119),
(5, 2, 3, 33, 19, 'Belanja Modal Peralatan dan Mesin - Pengadaan Switcher Antena', '', 1120),
(5, 2, 3, 33, 20, 'Belanja Modal Peralatan dan Mesin - Pengadaan Switcher/Menara Antena', '', 1121),
(5, 2, 3, 33, 21, 'Belanja Modal Peralatan dan Mesin - Pengadaan Feeder', '', 1122),
(5, 2, 3, 33, 22, 'Belanja Modal Peralatan dan Mesin - Pengadaan Humitity Control', '', 1123),
(5, 2, 3, 33, 23, 'Belanja Modal Peralatan dan Mesin - Pengadaan Program Input Equipment', '', 1124),
(5, 2, 3, 33, 24, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Antena Penerima VHF', '', 1125),
(5, 2, 3, 34, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Umum', '', 1126),
(5, 2, 3, 34, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Gigi', '', 1127),
(5, 2, 3, 34, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Keluarga Berencana', '', 1128),
(5, 2, 3, 34, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Mata', '', 1129),
(5, 2, 3, 34, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran T.H.T', '', 1130),
(5, 2, 3, 34, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Rotgen', '', 1131),
(5, 2, 3, 34, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Farmasi', '', 1132),
(5, 2, 3, 34, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat-Alat Kedokteran Bedah', '', 1133),
(5, 2, 3, 34, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Kebidanan dan Penyakit Kandungan', '', 1134),
(5, 2, 3, 34, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Bagian penyakit Dalam', '', 1135),
(5, 2, 3, 34, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Mortuary', '', 1136),
(5, 2, 3, 34, 12, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Anak', '', 1137),
(5, 2, 3, 34, 13, 'Belanja Modal Peralatan dan Mesin - Pengadaan Poliklinik Set', '', 1138),
(5, 2, 3, 34, 14, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Penderita Cacat Tubuh', '', 1139),
(5, 2, 3, 34, 15, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Neurologi (syaraf)', '', 1140),
(5, 2, 3, 34, 16, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Jantung', '', 1141),
(5, 2, 3, 34, 17, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Nuklir', '', 1142),
(5, 2, 3, 34, 18, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Radiologi', '', 1143),
(5, 2, 3, 34, 19, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Kulit dan Kelamin', '', 1144),
(5, 2, 3, 34, 20, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Gawat Darurat', '', 1145),
(5, 2, 3, 34, 21, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Jiwa', '', 1146),
(5, 2, 3, 34, 22, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kedokteran Hewan', '', 1147),
(5, 2, 3, 35, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Perawatan', '', 1148),
(5, 2, 3, 35, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Rehabilitasi Medis', '', 1149),
(5, 2, 3, 35, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Matra Laut', '', 1150),
(5, 2, 3, 35, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Matra Udara', '', 1151),
(5, 2, 3, 35, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Kedokteran Kepolisian', '', 1152),
(5, 2, 3, 35, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Olahraga', '', 1153),
(5, 2, 3, 36, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Kimia Air', '', 1154),
(5, 2, 3, 36, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Microbiologi', '', 1155),
(5, 2, 3, 36, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Hidro Kimia', '', 1156),
(5, 2, 3, 36, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Model/Hidrolika', '', 1157),
(5, 2, 3, 36, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat laboratorium Buatan/Geologi', '', 1158),
(5, 2, 3, 36, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Bahan Bangunan Konstruksi', '', 1159),
(5, 2, 3, 36, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Aspal Cat & Kimia', '', 1160),
(5, 2, 3, 36, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat laboratorium Mekanik Tanah dan Batuan', '', 1161),
(5, 2, 3, 36, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Cocok Tanam', '', 1162),
(5, 2, 3, 36, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Logam, Mesin, Listrik', '', 1163),
(5, 2, 3, 36, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Logam, Mesin Listrik A', '', 1164),
(5, 2, 3, 36, 12, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Umum', '', 1165),
(5, 2, 3, 36, 13, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Umum A', '', 1166),
(5, 2, 3, 36, 14, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Kedokteran', '', 1167),
(5, 2, 3, 36, 15, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Microbiologi', '', 1168),
(5, 2, 3, 36, 16, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Kimia', '', 1169),
(5, 2, 3, 36, 17, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Microbiologi A', '', 1170),
(5, 2, 3, 36, 18, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Patologi', '', 1171),
(5, 2, 3, 36, 19, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Immunologi', '', 1172),
(5, 2, 3, 36, 20, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Hematologi', '', 1173),
(5, 2, 3, 36, 21, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Film', '', 1174),
(5, 2, 3, 36, 22, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Makanan', '', 1175),
(5, 2, 3, 36, 23, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Standarisasi, Kalibrasi dan Instrumentasi', '', 1176),
(5, 2, 3, 36, 24, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Farmasi', '', 1177),
(5, 2, 3, 36, 25, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Fisika', '', 1178),
(5, 2, 3, 36, 26, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Hidrodinamika', '', 1179),
(5, 2, 3, 36, 27, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Klimatologi', '', 1180),
(5, 2, 3, 36, 28, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Peleburan', '', 1181),
(5, 2, 3, 36, 29, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Pasir', '', 1182),
(5, 2, 3, 36, 30, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Pembuatan Cetakan', '', 1183),
(5, 2, 3, 36, 31, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Pembuatan Pola', '', 1184),
(5, 2, 3, 36, 32, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Metalography', '', 1185),
(5, 2, 3, 36, 33, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Pengelasan', '', 1186),
(5, 2, 3, 36, 34, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Uji Proses Pengelasan', '', 1187),
(5, 2, 3, 36, 35, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Pembuatan Logam', '', 1188),
(5, 2, 3, 36, 36, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Matrologie', '', 1189),
(5, 2, 3, 36, 37, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Pelapisan Logam', '', 1190),
(5, 2, 3, 36, 38, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Pengolahan Panas', '', 1191),
(5, 2, 3, 36, 39, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Teknologi Textil', '', 1192),
(5, 2, 3, 36, 40, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Uji Tekstel', '', 1193),
(5, 2, 3, 36, 41, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Teknologi Keramik', '', 1194),
(5, 2, 3, 36, 42, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Teknologi Kulit Karet', '', 1195),
(5, 2, 3, 36, 43, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Uji Kulit, Karet dan Plastik', '', 1196),
(5, 2, 3, 36, 44, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Uji Keramik', '', 1197),
(5, 2, 3, 36, 45, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Teknologi Selulosa', '', 1198),
(5, 2, 3, 36, 46, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Pertanian', '', 1199),
(5, 2, 3, 36, 47, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Pertanian A', '', 1200),
(5, 2, 3, 36, 48, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Pertanian B', '', 1201),
(5, 2, 3, 36, 49, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Elektronika dan Daya', '', 1202),
(5, 2, 3, 36, 50, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium energi Surya', '', 1203),
(5, 2, 3, 36, 51, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Konversi Batubara dan Biomas', '', 1204),
(5, 2, 3, 36, 52, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Oceanografi', '', 1205),
(5, 2, 3, 36, 53, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Lingkungan Perairan', '', 1206),
(5, 2, 3, 36, 54, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Biologi Peralatan', '', 1207),
(5, 2, 3, 36, 55, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Biologi', '', 1208),
(5, 2, 3, 36, 56, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Geofisika', '', 1209),
(5, 2, 3, 36, 57, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Tambang', '', 1210),
(5, 2, 3, 36, 58, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses/Teknik Kimia', '', 1211),
(5, 2, 3, 36, 59, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Proses Industri', '', 1212),
(5, 2, 3, 36, 60, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Kesehatan Kerja', '', 1213),
(5, 2, 3, 36, 61, 'Belanja Modal Peralatan dan Mesin - Pengadaan Laboratorium Kearsipan', '', 1214),
(5, 2, 3, 36, 62, 'Belanja Modal Peralatan dan Mesin - Pengadaan Laboratorium Hematologi & Urinalisis', '', 1215),
(5, 2, 3, 36, 63, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Lainnya', '', 1216),
(5, 2, 3, 36, 64, 'Belanja Modal Peralatan dan Mesin - Pengadaan Laboratorium Hematologi & Urinalisis A', '', 1217),
(5, 2, 3, 37, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : Bahasa Indonesia', '', 1218),
(5, 2, 3, 37, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : Matematika', '', 1219),
(5, 2, 3, 37, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : IPA Dasar', '', 1220),
(5, 2, 3, 37, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : IPA Lanjutan', '', 1221),
(5, 2, 3, 37, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : IPA Menengah', '', 1222),
(5, 2, 3, 37, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : IPA Atas', '', 1223),
(5, 2, 3, 37, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : IPS', '', 1224),
(5, 2, 3, 37, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : Agama Islam', '', 1225),
(5, 2, 3, 37, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : Ketrampilan', '', 1226),
(5, 2, 3, 37, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : Kesenian', '', 1227),
(5, 2, 3, 37, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : Olah Raga', '', 1228),
(5, 2, 3, 37, 12, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Studi : PMP', '', 1229),
(5, 2, 3, 37, 13, 'Belanja Modal Peralatan dan Mesin - Pengadaan Bidang Pendidikan/Ketrampilan Lain-lain', '', 1230),
(5, 2, 3, 38, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Analytical instrument', '', 1231),
(5, 2, 3, 38, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Instrument Probe/Sensor', '', 1232),
(5, 2, 3, 38, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan General Laboratory Tool', '', 1233),
(5, 2, 3, 38, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Instrument Probe/Sensor A', '', 1234),
(5, 2, 3, 38, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Glassware Plastic/Utensils', '', 1235),
(5, 2, 3, 38, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Laboratory Safety Equipment', '', 1236),
(5, 2, 3, 39, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Radiation Detector', '', 1237),
(5, 2, 3, 39, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Modular Counting and Scentific', '', 1238),
(5, 2, 3, 39, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Assembly/Accounting System', '', 1239),
(5, 2, 3, 39, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Recorder Display', '', 1240),
(5, 2, 3, 39, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan System/Power Supply', '', 1241),
(5, 2, 3, 39, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Measuring / Testing Device', '', 1242),
(5, 2, 3, 39, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Opto Electronics', '', 1243),
(5, 2, 3, 39, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Accelator', '', 1244),
(5, 2, 3, 39, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Reactor Expermental System', '', 1245),
(5, 2, 3, 40, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Ukur Fisika Kesehatan', '', 1246),
(5, 2, 3, 40, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Kesehatan Kerja', '', 1247),
(5, 2, 3, 40, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Proteksi Lingkungan', '', 1248),
(5, 2, 3, 40, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Meteorological Equipment', '', 1249),
(5, 2, 3, 40, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Sumber Radiasi', '', 1250),
(5, 2, 3, 41, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Radiation Application Equipment', '', 1251),
(5, 2, 3, 41, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Non Destructive Test (NDT) Device', '', 1252),
(5, 2, 3, 41, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Umum Kedoteran /Klinik Nuklir', '', 1253),
(5, 2, 3, 41, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Hidrologi', '', 1254),
(5, 2, 3, 42, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat laboratorium Kualitas Air dan tanah', '', 1255),
(5, 2, 3, 42, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Kualitas Udara', '', 1256),
(5, 2, 3, 42, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Kebisingan dan Getaran', '', 1257),
(5, 2, 3, 42, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Laboratorium Lingkungan', '', 1258),
(5, 2, 3, 42, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Laboratorium Penunjang', '', 1259),
(5, 2, 3, 43, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Laboratorium Hidrodinamika Towing Carriage', '', 1260),
(5, 2, 3, 43, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Laboratorium Hidrodinamika Wave Generator and Absorber', '', 1261),
(5, 2, 3, 43, 3, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan Laboratorium Hidrodinamika Data Accquistion and Analyzing System', '', 1262),
(5, 2, 3, 43, 4, 'Belanja Modal Peralatan dan Mesin - Pengadaan Cavitation Tunnel', '', 1263),
(5, 2, 3, 43, 5, 'Belanja Modal Peralatan dan Mesin - Pengadaan Overhead Cranes', '', 1264),
(5, 2, 3, 43, 6, 'Belanja Modal Peralatan dan Mesin - Pengadaan Peralatan umum', '', 1265),
(5, 2, 3, 43, 7, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan : Model Ship Workshop', '', 1266),
(5, 2, 3, 43, 8, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan : Propeller Model Workshop', '', 1267),
(5, 2, 3, 43, 9, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan : Mechanical Workshop', '', 1268),
(5, 2, 3, 43, 10, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan : Precision Mechanical Workshop', '', 1269),
(5, 2, 3, 43, 11, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan Painting Shop', '', 1270),
(5, 2, 3, 43, 12, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan : Ship Model Preparation Shop', '', 1271),
(5, 2, 3, 43, 13, 'Belanja Modal Peralatan dan Mesin - Pengadaan Pemesinan : Electrical Workshop', '', 1272),
(5, 2, 3, 43, 14, 'Belanja Modal Peralatan dan Mesin - Pengadaan MOB', '', 1273),
(5, 2, 3, 43, 15, 'Belanja Modal Peralatan dan Mesin - Pengadaan Photo and Film Equipment', '', 1274),
(5, 2, 3, 44, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Senjata Genggam', '', 1275),
(5, 2, 3, 44, 2, 'Belanja Modal Peralatan dan Mesin - Senjata Pinggang', '', 1276),
(5, 2, 3, 44, 3, 'Belanja Modal Peralatan dan Mesin - Senjata Bahu/Senjata Laras Panjang', '', 1277),
(5, 2, 3, 44, 4, 'Belanja Modal Peralatan dan Mesin - Senapan Mesin', '', 1278),
(5, 2, 3, 44, 5, 'Belanja Modal Peralatan dan Mesin - Mortir', '', 1279),
(5, 2, 3, 44, 6, 'Belanja Modal Peralatan dan Mesin - Anti Lapis Baja', '', 1280),
(5, 2, 3, 44, 7, 'Belanja Modal Peralatan dan Mesin -Artileri Medan (Armed)', '', 1281),
(5, 2, 3, 44, 8, 'Belanja Modal Peralatan dan Mesin -Artileri Pertahanan Udara (Arhanud)', '', 1282),
(5, 2, 3, 44, 9, 'Belanja Modal Peralatan dan Mesin -Peluru Kendali/Rudal', '', 1283),
(5, 2, 3, 44, 10, 'Belanja Modal Peralatan dan Mesin -Kavaleri', '', 1284),
(5, 2, 3, 44, 11, 'Belanja Modal Peralatan dan Mesin -Senjata Lain-lain', '', 1285),
(5, 2, 3, 45, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Alat Keamanan', '', 1286),
(5, 2, 3, 45, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Non Senjata Api', '', 1287),
(5, 2, 3, 46, 1, 'Belanja Modal Peralatan dan Mesin - Pengadaan Amunisi Umum', '', 1288),
(5, 2, 3, 46, 2, 'Belanja Modal Peralatan dan Mesin - Pengadaan Amunisi Darat', '', 1289),
(5, 2, 3, 47, 1, 'Belanja Modal Peralatan dan Mesin -Pengadaan Laser', '', 1290),
(5, 2, 3, 48, 1, 'Belanja Modal Peralatan dan Mesin -Pengadaan Alat Bantu Kemanan', '', 1291),
(5, 2, 3, 48, 2, 'Belanja Modal Peralatan dan Mesin -Pengadaan Alat Perlindungan', '', 1292),
(5, 2, 3, 49, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Kantor', '', 1293),
(5, 2, 3, 49, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gudang', '', 1294),
(5, 2, 3, 49, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gudang Untuk Bengkel', '', 1295),
(5, 2, 3, 49, 4, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Instalasi', '', 1296),
(5, 2, 3, 49, 5, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Laboratorium', '', 1297),
(5, 2, 3, 49, 6, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Kesehatan', '', 1298),
(5, 2, 3, 49, 7, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Oceanarium/Opservatorium', '', 1299),
(5, 2, 3, 49, 8, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Ibadah', '', 1300),
(5, 2, 3, 49, 9, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Pertemuan', '', 1301),
(5, 2, 3, 49, 10, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Pendidikan', '', 1302),
(5, 2, 3, 49, 11, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Olah Raga', '', 1303),
(5, 2, 3, 49, 12, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Pertokoan/Koperasi/Pasar', '', 1304),
(5, 2, 3, 49, 13, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Untuk Pos Jaga', '', 1305),
(5, 2, 3, 49, 14, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Garasi/Pool', '', 1306),
(5, 2, 3, 49, 15, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Pemotongan Hewan', '', 1307),
(5, 2, 3, 49, 16, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Pabrik', '', 1308),
(5, 2, 3, 49, 17, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Stasiun Bus', '', 1309),
(5, 2, 3, 49, 18, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Kandang Hewan/Ternak', '', 1310),
(5, 2, 3, 49, 19, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Perpustakaan', '', 1311),
(5, 2, 3, 49, 20, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Museum', '', 1312),
(5, 2, 3, 49, 21, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Terminal/Pelabuhan/Bandar', '', 1313),
(5, 2, 3, 49, 22, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Pengujian Kelaikan', '', 1314),
(5, 2, 3, 49, 23, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Lembaga Pemasyarakatan', '', 1315),
(5, 2, 3, 49, 24, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rumah Tahanan', '', 1316),
(5, 2, 3, 49, 25, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Kramatorium', '', 1317),
(5, 2, 3, 49, 26, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Pembakaran Bangkai Hewan', '', 1318),
(5, 2, 3, 49, 27, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Gedung Tempat Kerja Lainnya', '', 1319),
(5, 2, 3, 50, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rumah Negara Golongan I', '', 1320),
(5, 2, 3, 50, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rumah Negara Golongan II', '', 1321),
(5, 2, 3, 50, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rumah Negara Goloongan III', '', 1322),
(5, 2, 3, 50, 4, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Mess/Wisma/Bungalow/Tempat Peristirahatan', '', 1323),
(5, 2, 3, 50, 5, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Asrama', '', 1324),
(5, 2, 3, 50, 6, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Hotel', '', 1325),
(5, 2, 3, 50, 7, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Motel', '', 1326),
(5, 2, 3, 50, 8, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Flat/Rumah Susun', '', 1327),
(5, 2, 3, 51, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Menara Perambuan Penerang Pantai', '', 1328),
(5, 2, 3, 51, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Perambut Penerangan Pantai Tidak Bermenara', '', 1329),
(5, 2, 3, 51, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Menara Telekomunikasi', '', 1330),
(5, 2, 3, 52, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Istana Peringatan', '', 1331),
(5, 2, 3, 52, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rumah Adat', '', 1332),
(5, 2, 3, 52, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rumah Peningggalan Sejarah', '', 1333),
(5, 2, 3, 52, 4, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Makam Sejarah', '', 1334),
(5, 2, 3, 52, 5, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tempat Ibadah Bersejarah', '', 1335),
(5, 2, 3, 53, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tugu Kemerdekaan', '', 1336),
(5, 2, 3, 53, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tugu Pembangunan', '', 1337),
(5, 2, 3, 53, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tugu Peringatan Lainnya', '', 1338),
(5, 2, 3, 54, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Candi Hindhu', '', 1339),
(5, 2, 3, 54, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Candi Budha', '', 1340),
(5, 2, 3, 54, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Candi Lainnya', '', 1341),
(5, 2, 3, 55, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Bersejarah', '', 1342),
(5, 2, 3, 56, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Tugu/Tanda Batas', '', 1343),
(5, 2, 3, 57, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rambu Bersuar Lalu Lintas Darat', '', 1344),
(5, 2, 3, 57, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Bangunan Rambu Tidak Bersuar', '', 1345),
(5, 2, 3, 58, 1, 'Belanja Modal Gedung dan Bangunan - Pengadaan Runway/Threshold Light', '', 1346),
(5, 2, 3, 58, 2, 'Belanja Modal Gedung dan Bangunan - Pengadaan Visual Approach Slope Indicator (VASI)', '', 1347),
(5, 2, 3, 58, 3, 'Belanja Modal Gedung dan Bangunan - Pengadaan Approach Light', '', 1348),
(5, 2, 3, 58, 4, 'Belanja Modal Gedung dan Bangunan - Pengadaan Runway Identification Light(Rells)', '', 1349),
(5, 2, 3, 58, 5, 'Belanja Modal Gedung dan Bangunan - Pengadaan Signal', '', 1350),
(5, 2, 3, 58, 6, 'Belanja Modal Gedung dan Bangunan - Pengadaan Flood Light', '', 1351),
(5, 2, 3, 59, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Negara/Nasional', '', 1352),
(5, 2, 3, 59, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Propinsi', '', 1353),
(5, 2, 3, 59, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Kabupaten/Kota', '', 1354),
(5, 2, 3, 59, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Desa', '', 1355),
(5, 2, 3, 59, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Khusus', '', 1356),
(5, 2, 3, 59, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Tol', '', 1357),
(5, 2, 3, 59, 7, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jalan Kereta', '', 1358),
(5, 2, 3, 59, 8, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Landasan Pacu Pesawat Terbang', '', 1359),
(5, 2, 3, 60, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Negara/Nasional', '', 1360),
(5, 2, 3, 60, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Propinsi', '', 1361),
(5, 2, 3, 60, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Kabupaten/Kota', '', 1362),
(5, 2, 3, 60, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Desa', '', 1363),
(5, 2, 3, 60, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Khusus', '', 1364),
(5, 2, 3, 60, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Pada Jalan Tol', '', 1365),
(5, 2, 3, 60, 7, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Pada Jalan Kereta Api', '', 1366),
(5, 2, 3, 60, 8, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Pada Landasan Pacu Pesawat Terbang', '', 1367),
(5, 2, 3, 60, 9, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jembatan Penyeberangan', '', 1368),
(5, 2, 3, 61, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Waduk Irigasi', '', 1369),
(5, 2, 3, 61, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengambilan Irigasi', '', 1370),
(5, 2, 3, 61, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembawa Irigasi', '', 1371),
(5, 2, 3, 61, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Irigasi', '', 1372),
(5, 2, 3, 61, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengaman Irigasi', '', 1373),
(5, 2, 3, 61, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Irigasi', '', 1374),
(5, 2, 3, 61, 7, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan/Jaringan Irigasi', '', 1375),
(5, 2, 3, 62, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Waduk Pasang Surut', '', 1376),
(5, 2, 3, 62, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengambilan Pasang Surut', '', 1377),
(5, 2, 3, 62, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembawa Pasang Surut', '', 1378),
(5, 2, 3, 62, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Pasang Surut', '', 1379),
(5, 2, 3, 62, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengaman Pasang Surut', '', 1380),
(5, 2, 3, 62, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Pasang Surut', '', 1381),
(5, 2, 3, 62, 7, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Sawah Pasang Surut', '', 1382),
(5, 2, 3, 63, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Pengembang Rawa dan Poder', '', 1383),
(5, 2, 3, 63, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengembalian Pasang Rawa', '', 1384),
(5, 2, 3, 63, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembawa Pasang Rawa', '', 1385),
(5, 2, 3, 63, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Pasang Rawa', '', 1386),
(5, 2, 3, 63, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengamanan Pasang Surut', '', 1387),
(5, 2, 3, 63, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Pasang Rawa', '', 1388),
(5, 2, 3, 63, 7, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Sawah Pengembangan Rawa', '', 1389),
(5, 2, 3, 64, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Waduk Penanggulangan Sungai', '', 1390),
(5, 2, 3, 64, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengambilan Pengamanan Sungai', '', 1391),
(5, 2, 3, 64, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Pengaman', '', 1392),
(5, 2, 3, 64, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Pengaman Sungai', '', 1393),
(5, 2, 3, 64, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengaman Pengamanan Sungai', '', 1394),
(5, 2, 3, 64, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Pengamanan Sungai', '', 1395),
(5, 2, 3, 65, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Waduk Pengembangan Sumber Air', '', 1396),
(5, 2, 3, 65, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengambilan Pengembangan Sumber Air', '', 1397),
(5, 2, 3, 65, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembawa Pengembangan Sumber Air', '', 1398),
(5, 2, 3, 65, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Pengembangan Sumber Air', '', 1399),
(5, 2, 3, 65, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengamanan Pengembangan Sumber Air', '', 1400),
(5, 2, 3, 65, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Pengembangan Sumber Air', '', 1401),
(5, 2, 3, 66, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Waduk Air Bersih/Air Baku', '', 1402),
(5, 2, 3, 66, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengambilan Air Bersih/Baku', '', 1403),
(5, 2, 3, 66, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembawa Air Bersih', '', 1404),
(5, 2, 3, 66, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuang Air Bersih/Air Baku', '', 1405),
(5, 2, 3, 66, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Air Bersih/Air Baku', '', 1406),
(5, 2, 3, 67, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembawa Air Kotor', '', 1407);
INSERT INTO `ref_rek_5` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`, `kd_rek_5`, `nama_kd_rek_5`, `peraturan`, `id_rekening`) VALUES
(5, 2, 3, 67, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Waduk Air Kotor', '', 1408),
(5, 2, 3, 67, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pembuangan Air Kotor', '', 1409),
(5, 2, 3, 67, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pengaman Air Kotor', '', 1410),
(5, 2, 3, 67, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Pelengkap Air Kotor', '', 1411),
(5, 2, 3, 68, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Laut', '', 1412),
(5, 2, 3, 68, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Bangunan Air Tawar', '', 1413),
(5, 2, 3, 69, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Air Muka Tanah', '', 1414),
(5, 2, 3, 69, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Air Sumber /Mata Air', '', 1415),
(5, 2, 3, 69, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Air Tanah Dalam', '', 1416),
(5, 2, 3, 69, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Air Tanah Dangkal', '', 1417),
(5, 2, 3, 69, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Air Bersih/Air Baku Lainnya', '', 1418),
(5, 2, 3, 70, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Air Kotor', '', 1419),
(5, 2, 3, 70, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Air Buangan Industri', '', 1420),
(5, 2, 3, 70, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Air Buangan Pertanian', '', 1421),
(5, 2, 3, 71, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengolahan Sampah Organik', '', 1422),
(5, 2, 3, 71, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengolahan Sampah Non Organik', '', 1423),
(5, 2, 3, 72, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengolahan Bahan Bangunan', '', 1424),
(5, 2, 3, 73, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Air', '', 1425),
(5, 2, 3, 73, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Diesel', '', 1426),
(5, 2, 3, 73, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Liatrik Tenaga Mikro (Hidro)', '', 1427),
(5, 2, 3, 73, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Angin (PLTAN)', '', 1428),
(5, 2, 3, 73, 5, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Uap (PLTU)', '', 1429),
(5, 2, 3, 73, 6, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Nuklir (PLTN)', '', 1430),
(5, 2, 3, 73, 7, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Gas (PLTG)', '', 1431),
(5, 2, 3, 73, 8, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Panas Bumi (PLTP)', '', 1432),
(5, 2, 3, 73, 9, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Tenaga Surya (PLTS)', '', 1433),
(5, 2, 3, 73, 10, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Pembangkit Listrik Tenaga Biogas (PLTB)', '', 1434),
(5, 2, 3, 73, 11, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pembangkit Listrik Tenaga Samudera/Gelombang Samudera (PLTSm)', '', 1435),
(5, 2, 3, 74, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Gardu Listrik Induk', '', 1436),
(5, 2, 3, 74, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - PengadaanInstalasi Gardu Listrik Distribusi', '', 1437),
(5, 2, 3, 74, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pusat Pengatur Listrik', '', 1438),
(5, 2, 3, 75, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pertahanan Di Darat', '', 1439),
(5, 2, 3, 76, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Gardu Gas', '', 1440),
(5, 2, 3, 76, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Jaringan Pipa Gas', '', 1441),
(5, 2, 3, 77, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Instalasi Pengaman Penangkal Petir', '', 1442),
(5, 2, 3, 78, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Pembawa', '', 1443),
(5, 2, 3, 78, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Induk Distribusi', '', 1444),
(5, 2, 3, 78, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Cabang Distribusi', '', 1445),
(5, 2, 3, 78, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Air Minum Jaringan Sambungan Kerumah', '', 1446),
(5, 2, 3, 79, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Transmisi', '', 1447),
(5, 2, 3, 79, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Distribusi', '', 1448),
(5, 2, 3, 80, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Telepon Di atas Tanah', '', 1449),
(5, 2, 3, 80, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Telepon Di bawah Tanah', '', 1450),
(5, 2, 3, 80, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Telepon Didalam Air', '', 1451),
(5, 2, 3, 81, 1, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Pipa Gas Transmisi', '', 1452),
(5, 2, 3, 81, 2, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Pipa Distribusi', '', 1453),
(5, 2, 3, 81, 3, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan Pipa Dinas', '', 1454),
(5, 2, 3, 81, 4, 'Belanja Modal Jalan, Irigasi dan Jaringan - Pengadaan Jaringan BBM', '', 1455),
(5, 2, 3, 82, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Ilmu Pengetahuan Umum', '', 1456),
(5, 2, 3, 82, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Filsafat', '', 1457),
(5, 2, 3, 82, 3, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Keagamaan', '', 1458),
(5, 2, 3, 82, 4, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Ilmu Sosial', '', 1459),
(5, 2, 3, 82, 5, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Ilmu Bahasa', '', 1460),
(5, 2, 3, 82, 6, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Matematika & Pengetahuan alam', '', 1461),
(5, 2, 3, 82, 7, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Ilmu Pengetahuan Praktis', '', 1462),
(5, 2, 3, 82, 8, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Arsitektur, Kesenian, Olah raga', '', 1463),
(5, 2, 3, 82, 9, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Geografi, Biografi, Sejarah', '', 1464),
(5, 2, 3, 83, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Terbitan Berkala', '', 1465),
(5, 2, 3, 83, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Buku Laporan', '', 1466),
(5, 2, 3, 84, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Peta', '', 1467),
(5, 2, 3, 84, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Naskah (Manuskrip)', '', 1468),
(5, 2, 3, 84, 3, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Musik', '', 1469),
(5, 2, 3, 84, 4, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Karya Grafika (Graphic Material)', '', 1470),
(5, 2, 3, 84, 5, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Three Dimensional Artetacs and Realita', '', 1471),
(5, 2, 3, 84, 6, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Bentuk Micro (Microform)', '', 1472),
(5, 2, 3, 84, 7, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Rekaman Suara', '', 1473),
(5, 2, 3, 84, 8, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Berkas Komputer (Computer Files)', '', 1474),
(5, 2, 3, 84, 9, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Film Bergerak dan Rekaman Video', '', 1475),
(5, 2, 3, 84, 10, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang-Barang Perpustakaan Tarscalt', '', 1476),
(5, 2, 3, 85, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Pahatan', '', 1477),
(5, 2, 3, 85, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Lukisan', '', 1478),
(5, 2, 3, 85, 3, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Alat Kesenian', '', 1479),
(5, 2, 3, 85, 4, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Alat Olah Raga', '', 1480),
(5, 2, 3, 85, 5, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Tanda Penghargaan', '', 1481),
(5, 2, 3, 85, 6, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Maket dan Foto Dokumen', '', 1482),
(5, 2, 3, 85, 7, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Benda-benda Bersejarah', '', 1483),
(5, 2, 3, 85, 8, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Barang Bercorak Kebudayaan Barang Kerajinan', '', 1484),
(5, 2, 3, 86, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Alat Olah Raga Senam', '', 1485),
(5, 2, 3, 86, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Alat Olah Raga Air', '', 1486),
(5, 2, 3, 86, 3, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Alat Olah Raga Udara', '', 1487),
(5, 2, 3, 86, 4, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Alat Olah Raga Lainnya', '', 1488),
(5, 2, 3, 87, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Binatang Ternak', '', 1489),
(5, 2, 3, 87, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Binatang Unggas', '', 1490),
(5, 2, 3, 87, 3, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Binatang Melata', '', 1491),
(5, 2, 3, 87, 4, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Binatang Ikan', '', 1492),
(5, 2, 3, 87, 5, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Hewan Kebun Binatang', '', 1493),
(5, 2, 3, 87, 6, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Hewan Pengamanan', '', 1494),
(5, 2, 3, 88, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Tanaman Perkebunan', '', 1495),
(5, 2, 3, 88, 2, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Tanaman Holtikultura', '', 1496),
(5, 2, 3, 88, 3, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Tanaman Kehutanan', '', 1497),
(5, 2, 3, 88, 4, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Tanaman Hias', '', 1498),
(5, 2, 3, 88, 5, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Tanaman Obat dan Kosmetika', '', 1499),
(5, 2, 3, 89, 1, 'Belanja Modal Aset Tetap Lainnya - Pengadaan Aset Tetap Renovasi', '', 1500),
(6, 1, 1, 1, 1, 'Pajak Daerah', '', 1501),
(6, 1, 1, 1, 2, 'Retribusi Daerah', '', 1502),
(6, 1, 1, 1, 3, 'Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', '', 1503),
(6, 1, 1, 1, 4, 'Lain-Lain PAD yang sah', '', 1504),
(6, 1, 1, 2, 1, 'Bagi Hasil Pajak', '', 1505),
(6, 1, 1, 2, 2, 'Bagi Hasil Bukan Pajak/Sumber Daya Alam', '', 1506),
(6, 1, 1, 4, 1, 'Belanja Pegawai dari Belanja Tidak langsung', '', 1507),
(6, 1, 1, 4, 2, 'Belanja Pegawai dari Belanja langsung', '', 1508),
(6, 1, 1, 4, 3, 'Belanja Barang dan Jasa', '', 1509),
(6, 1, 1, 4, 4, 'Belanja Modal', '', 1510),
(6, 1, 1, 4, 5, 'Belanja Bunga', '', 1511),
(6, 1, 1, 4, 6, 'Belanja Subsidi', '', 1512),
(6, 1, 1, 4, 7, 'Belanja Hibah', '', 1513),
(6, 1, 1, 4, 8, 'Belanja Bantuan Sosial', '', 1514),
(6, 1, 1, 4, 9, 'Belanja Belanja Bagi Hasil', '', 1515),
(6, 1, 1, 4, 10, 'Belanja Bantuan Keuangan', '', 1516),
(6, 1, 1, 4, 11, 'Belanja Tidak Terduga', '', 1517),
(6, 1, 1, 5, 1, 'Uang jaminan ……', '', 1518),
(6, 1, 1, 5, 2, 'Potongan Taspen', '', 1519),
(6, 1, 1, 5, 3, 'Potongan Beras', '', 1520),
(6, 1, 1, 5, 4, 'Askes', '', 1521),
(6, 1, 1, 6, 1, 'Kegiatan lanjutan ......', '', 1522),
(6, 1, 2, 1, 1, 'Pencairan Dana Cadangan nomor ……', '', 1523),
(6, 1, 3, 1, 1, 'BUMD ....', '', 1524),
(6, 1, 4, 1, 1, 'Penerusan pinjaman…..', '', 1525),
(6, 1, 4, 2, 1, 'Pemerintah daerah ……', '', 1526),
(6, 1, 4, 3, 1, 'Bank …..', '', 1527),
(6, 1, 4, 4, 1, 'Lembaga keuangan bukan bank ……', '', 1528),
(6, 1, 4, 5, 1, 'Obligasi atas nama ….', '', 1529),
(6, 1, 4, 5, 2, 'Obligasi nomor ….', '', 1530),
(6, 1, 5, 1, 1, 'Penerimaan Kembali Penerimaan Pinjaman ….', '', 1531),
(6, 1, 6, 1, 1, 'Penerimaan piutang daerah dari pendapatan pajak daerah', '', 1532),
(6, 1, 6, 1, 2, 'Penerimaan piutang daerah dari pendapatan retribusi daerah', '', 1533),
(6, 1, 6, 1, 3, 'Penerimaan piutang daerah dari lain-lain pendapatan yang sah', '', 1534),
(6, 1, 6, 2, 1, 'Penerimaan piutang daerah dari pemerintah', '', 1535),
(6, 1, 6, 3, 1, 'Pemerintah daerah …………….', '', 1536),
(6, 1, 6, 4, 1, 'Bank ………………..', '', 1537),
(6, 1, 6, 5, 1, 'Lembaga keuangan bukan bank …………………….', '', 1538),
(6, 1, 7, 1, 1, 'Penerimaan kembali dana bergulir dari kelompok masyarakat', '', 1539),
(6, 2, 1, 1, 1, 'Pembentukan Dana Cadangan nomor ……', '', 1540),
(6, 2, 2, 1, 1, 'BUMN …….', '', 1541),
(6, 2, 2, 2, 1, 'BUMD ……….', '', 1542),
(6, 2, 2, 3, 1, 'Badan …………..', '', 1543),
(6, 2, 2, 4, 1, 'Dana bergulir kepada kelompok masyarakat', '', 1544),
(6, 2, 3, 1, 1, 'Penerusan pinjaman…..', '', 1545),
(6, 2, 3, 2, 1, 'Pemerintah daerah ……', '', 1546),
(6, 2, 3, 3, 1, 'Bank …..', '', 1547),
(6, 2, 3, 4, 1, 'Lembaga keuangan bukan bank ……', '', 1548),
(6, 2, 3, 5, 1, 'Penerusan pinjaman…..', '', 1549),
(6, 2, 3, 6, 1, 'Pemerintah daerah ……', '', 1550),
(6, 2, 3, 7, 1, 'Bank …..', '', 1551),
(6, 2, 3, 8, 1, 'Lembaga keuangan bukan bank ……', '', 1552),
(6, 2, 3, 9, 1, 'Obligasi atas nama …………', '', 1553),
(6, 2, 3, 9, 2, 'Obligasi nomor …………', '', 1554),
(6, 2, 3, 10, 1, 'Obligasi atas nama …………', '', 1555),
(6, 2, 3, 10, 2, 'Obligasi nomor …………', '', 1556),
(6, 2, 4, 1, 1, 'Pemerintah', '', 1557),
(6, 2, 4, 2, 1, 'Pemerintah daerah ……', '', 1558),
(6, 3, 1, 1, 1, 'Sisa Lebih Pembiayaan Anggaran Tahun Berkenaan', '', 1559),
(6, 4, 1, 1, 1, 'Sisa Lebih/Kurang Pembiayaan Tahun Berkenaan', '', 1560),
(7, 1, 1, 1, 1, 'Penerimaan PFK - IWP', '', 1561),
(7, 1, 1, 2, 1, 'Penerimaan PFK - Taspen', '', 1562),
(7, 1, 1, 3, 1, 'Penerimaan PFK - Askes', '', 1563),
(7, 1, 1, 4, 1, 'Penerimaan PFK - PPh Ps. 21', '', 1564),
(7, 1, 1, 4, 2, 'Penerimaan PFK - PPh Ps. 22', '', 1565),
(7, 1, 1, 4, 3, 'Penerimaan PFK - PPh Ps. 23', '', 1566),
(7, 1, 1, 4, 4, 'Penerimaan PFK - PPh Ps. 25', '', 1567),
(7, 1, 1, 5, 1, 'Penerimaan PFK - PPn Pusat', '', 1568),
(7, 1, 1, 6, 1, 'Penerimaan PFK - Taperum', '', 1569),
(7, 1, 1, 7, 1, 'Penerimaan PFK - Lainnya', '', 1570),
(7, 2, 1, 1, 1, 'Pengeluaran PFK - IWP', '', 1571),
(7, 2, 1, 2, 1, 'Pengeluaran PFK - Taspen', '', 1572),
(7, 2, 1, 3, 1, 'Pengeluaran PFK- Askes', '', 1573),
(7, 2, 1, 4, 1, 'Pengeluaran PFK - PPh Ps. 21', '', 1574),
(7, 2, 1, 4, 2, 'Pengeluaran PFK - PPh Ps. 22', '', 1575),
(7, 2, 1, 4, 3, 'Pengeluaran PFK - PPh Ps. 23', '', 1576),
(7, 2, 1, 4, 4, 'Pengeluaran PFK - PPh Ps. 25', '', 1577),
(7, 2, 1, 5, 1, 'Pengeluaran PFK - PPn Pusat', '', 1578),
(7, 2, 1, 6, 1, 'Pengeluaran PFK - Taperum', '', 1579),
(7, 2, 1, 7, 1, 'Pengeluaran PFK - Lainnya', '', 1580);

-- --------------------------------------------------------

--
-- Table structure for table `ref_revisi`
--

DROP TABLE IF EXISTS `ref_revisi`;
CREATE TABLE `ref_revisi` (
  `id_revisi` int(255) NOT NULL,
  `uraian_revisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_satuan`
--

DROP TABLE IF EXISTS `ref_satuan`;
CREATE TABLE `ref_satuan` (
  `id_satuan` int(11) NOT NULL,
  `uraian_satuan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan_satuan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope_pemakaian` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_setting`
--

DROP TABLE IF EXISTS `ref_setting`;
CREATE TABLE `ref_setting` (
  `tahun_rencana` int(11) NOT NULL COMMENT 'tahun_perencanaan',
  `jenis_rw` int(11) NOT NULL DEFAULT '0' COMMENT 'jenis_pembatasan_rw, 0 tidak dibatasi, 1 jml_usulan, 2 jml_pagu',
  `jml_rw` int(11) NOT NULL DEFAULT '0' COMMENT 'batas usulan rw, 0 tidak dibatasi',
  `pagu_rw` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jenis_desa` int(11) NOT NULL DEFAULT '0' COMMENT 'jenis_pembatasan_rw, 0 tidak dibatasi, 1 jml_usulan, 2 jml_pagu',
  `jml_desa` int(11) NOT NULL DEFAULT '0' COMMENT 'batas usulan rw, 0 tidak dibatasi',
  `pagu_desa` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jenis_kecamatan` int(11) NOT NULL DEFAULT '0' COMMENT 'jenis_pembatasan_rw, 0 tidak dibatasi, 1 jml_usulan, 2 jml_pagu',
  `jml_kecamatan` int(11) NOT NULL DEFAULT '0' COMMENT 'batas usulan rw, 0 tidak dibatasi',
  `pagu_kecamatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `deviasi_pagu` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_setting` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_setting`
--

INSERT INTO `ref_setting` (`tahun_rencana`, `jenis_rw`, `jml_rw`, `pagu_rw`, `jenis_desa`, `jml_desa`, `pagu_desa`, `jenis_kecamatan`, `jml_kecamatan`, `pagu_kecamatan`, `deviasi_pagu`, `status_setting`) VALUES
(2019, 0, 0, '0.00', 0, 0, '0.00', 0, 0, '0.00', '20.00', 0),
(2020, 0, 0, '0.00', 0, 0, '0.00', 0, 0, '0.00', '5.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_sotk_level_1`
--

DROP TABLE IF EXISTS `ref_sotk_level_1`;
CREATE TABLE `ref_sotk_level_1` (
  `id_sotk_es2` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_eselon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat_eselon` int(11) NOT NULL COMMENT '1/2/3',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_sotk_level_2`
--

DROP TABLE IF EXISTS `ref_sotk_level_2`;
CREATE TABLE `ref_sotk_level_2` (
  `id_sotk_es3` int(11) NOT NULL,
  `id_sotk_es2` int(11) NOT NULL,
  `nama_eselon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat_eselon` int(11) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_sotk_level_3`
--

DROP TABLE IF EXISTS `ref_sotk_level_3`;
CREATE TABLE `ref_sotk_level_3` (
  `id_sotk_es4` int(11) NOT NULL,
  `id_sotk_es3` int(11) NOT NULL,
  `nama_eselon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat_eselon` int(11) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_golongan`
--

DROP TABLE IF EXISTS `ref_ssh_golongan`;
CREATE TABLE `ref_ssh_golongan` (
  `id_golongan_ssh` int(11) NOT NULL,
  `jenis_ssh` int(11) NOT NULL DEFAULT '0' COMMENT '0 = BL 1=BTL 2=Pendapatan 3=Pembiayaan ',
  `no_urut` int(11) NOT NULL,
  `uraian_golongan_ssh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_kelompok`
--

DROP TABLE IF EXISTS `ref_ssh_kelompok`;
CREATE TABLE `ref_ssh_kelompok` (
  `id_kelompok_ssh` int(11) NOT NULL,
  `id_golongan_ssh` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `uraian_kelompok_ssh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_perkada`
--

DROP TABLE IF EXISTS `ref_ssh_perkada`;
CREATE TABLE `ref_ssh_perkada` (
  `id_perkada` int(11) NOT NULL,
  `nomor_perkada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_perkada` date NOT NULL,
  `tahun_berlaku` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `id_perkada_induk` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif',
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_perkada_tarif`
--

DROP TABLE IF EXISTS `ref_ssh_perkada_tarif`;
CREATE TABLE `ref_ssh_perkada_tarif` (
  `id_tarif_perkada` bigint(11) NOT NULL,
  `id_tarif_old` bigint(11) NOT NULL DEFAULT '0',
  `no_urut` bigint(11) NOT NULL,
  `id_tarif_ssh` bigint(11) NOT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `id_zona_perkada` int(11) NOT NULL,
  `jml_rupiah` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_perkada_zona`
--

DROP TABLE IF EXISTS `ref_ssh_perkada_zona`;
CREATE TABLE `ref_ssh_perkada_zona` (
  `id_zona_perkada` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_perkada` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `id_zona` int(11) NOT NULL,
  `nama_zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_rekening`
--

DROP TABLE IF EXISTS `ref_ssh_rekening`;
CREATE TABLE `ref_ssh_rekening` (
  `id_rekening_ssh` bigint(11) NOT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `uraian_tarif_ssh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_sub_kelompok`
--

DROP TABLE IF EXISTS `ref_ssh_sub_kelompok`;
CREATE TABLE `ref_ssh_sub_kelompok` (
  `id_sub_kelompok_ssh` int(11) NOT NULL,
  `id_kelompok_ssh` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `uraian_sub_kelompok_ssh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_tarif`
--

DROP TABLE IF EXISTS `ref_ssh_tarif`;
CREATE TABLE `ref_ssh_tarif` (
  `id_tarif_ssh` bigint(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sub_kelompok_ssh` int(11) NOT NULL,
  `uraian_tarif_ssh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_tarif_ssh` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = aktif, 1 = non aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_zona`
--

DROP TABLE IF EXISTS `ref_ssh_zona`;
CREATE TABLE `ref_ssh_zona` (
  `id_zona` int(11) NOT NULL,
  `keterangan_zona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskripsi_zona` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_ssh_zona`
--

INSERT INTO `ref_ssh_zona` (`id_zona`, `keterangan_zona`, `diskripsi_zona`) VALUES
(1, 'Semua Wilayah', 'Semua wilayah tanpa ada perbedaan lokasi, kecuali ditetapkan lain di tarif Zona Terluar'),
(2, 'Zona Terluar', 'Tarif SSH untuk zona terluar meliputi radius 50km dari pusat kota');

-- --------------------------------------------------------

--
-- Table structure for table `ref_ssh_zona_lokasi`
--

DROP TABLE IF EXISTS `ref_ssh_zona_lokasi`;
CREATE TABLE `ref_ssh_zona_lokasi` (
  `id_zona_lokasi` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `diskripsi_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_status_usul`
--

DROP TABLE IF EXISTS `ref_status_usul`;
CREATE TABLE `ref_status_usul` (
  `id_status_usul` int(11) NOT NULL,
  `uraian_status_usul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_sub_unit`
--

DROP TABLE IF EXISTS `ref_sub_unit`;
CREATE TABLE `ref_sub_unit` (
  `id_sub_unit` int(255) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `kd_sub` int(255) NOT NULL,
  `nm_sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_sumber_dana`
--

DROP TABLE IF EXISTS `ref_sumber_dana`;
CREATE TABLE `ref_sumber_dana` (
  `id_sumber_dana` int(11) NOT NULL,
  `uraian_sumber_dana` longtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_sumber_dana`
--

INSERT INTO `ref_sumber_dana` (`id_sumber_dana`, `uraian_sumber_dana`) VALUES
(1, 'Pendapatan Asli Daerah'),
(2, 'Dana Alokasi Umum'),
(3, 'Dana Alokasi Khusus'),
(4, 'Lain-Lain Pendapatan Yang Sah'),
(5, 'Dana Insentif Daerah'),
(6, 'BK Provinsi');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tabel_dasar`
--

DROP TABLE IF EXISTS `ref_tabel_dasar`;
CREATE TABLE `ref_tabel_dasar` (
  `id_tabel_dasar` int(11) NOT NULL,
  `nama_tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ref_tabel_dasar`
--

INSERT INTO `ref_tabel_dasar` (`id_tabel_dasar`, `nama_tabel`) VALUES
(1, 'Nilai dan Kontribusi Sektor dalam PDRB'),
(2, 'Nilai dan Kontribusi Sektor dalam PDRB HB'),
(3, 'Angka Melek Huruf'),
(4, 'Rata-Rata Lama Sekolah Tahun'),
(5, 'Perkembangan Seni, Budaya dan Olahraga'),
(6, 'Angka Partisipasi Sekolah'),
(7, 'Ketersediaan Sekolah dan Penduduk Usia Sekolah'),
(8, 'Jumlah Guru dan Murid Jenjang Pendidikan Dasar'),
(9, 'Jumlah Investor PMDN/PMA'),
(10, 'Jumlah Investasi PMDN/PMA');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tahun`
--

DROP TABLE IF EXISTS `ref_tahun`;
CREATE TABLE `ref_tahun` (
  `id_tahun` int(11) NOT NULL,
  `id_pemda` int(11) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `tahun_0` int(255) NOT NULL,
  `tahun_1` int(255) NOT NULL,
  `tahun_2` int(255) NOT NULL,
  `tahun_3` int(255) NOT NULL,
  `tahun_4` int(255) NOT NULL,
  `tahun_5` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_unit`
--

DROP TABLE IF EXISTS `ref_unit`;
CREATE TABLE `ref_unit` (
  `id_unit` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `kd_unit` int(255) NOT NULL,
  `nm_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ref_urusan`
--

DROP TABLE IF EXISTS `ref_urusan`;
CREATE TABLE `ref_urusan` (
  `kd_urusan` int(255) NOT NULL,
  `nm_urusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ref_urusan`
--

INSERT INTO `ref_urusan` (`kd_urusan`, `nm_urusan`) VALUES
(1, 'Urusan Wajib Pelayanan Dasar'),
(2, 'Urusan Wajib Bukan Pelayanan Dasar'),
(3, 'Urusan Pilihan'),
(4, 'Urusan Pemerintahan Fungsi Penunjang');

-- --------------------------------------------------------

--
-- Table structure for table `ref_user_role`
--

DROP TABLE IF EXISTS `ref_user_role`;
CREATE TABLE `ref_user_role` (
  `id` int(11) NOT NULL,
  `uraian_peran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tambah` int(11) NOT NULL DEFAULT '0',
  `edit` int(11) NOT NULL DEFAULT '0',
  `hapus` int(11) NOT NULL DEFAULT '0',
  `lihat` int(11) NOT NULL DEFAULT '0',
  `reviu` int(11) NOT NULL DEFAULT '0',
  `posting` int(11) NOT NULL DEFAULT '0',
  `status_role` int(11) NOT NULL DEFAULT '0' COMMENT '0 aktif 1 non aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `temp_table_info`
--

DROP TABLE IF EXISTS `temp_table_info`;
CREATE TABLE `temp_table_info` (
  `TBL_INDEX` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TABLE_SCHEMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TABLE_NAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `COLUMN_NAME` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `COLUMN_TYPE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IS_NULLABLE` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `COLUMN_KEY` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `COLUMN_DEFAULT` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `EXTRA` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `INDEX_NAME` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `SEQ_IN_INDEX` int(11) DEFAULT NULL,
  `NON_UNIQUE` int(11) DEFAULT NULL,
  `FLAG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_aktivitas_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_aktivitas_pd`;
CREATE TABLE `trx_anggaran_aktivitas_pd` (
  `id_aktivitas_pd` bigint(11) NOT NULL,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_rkpd_final` int(11) DEFAULT '0',
  `tahun_anggaran` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `id_aktivitas_asb` int(11) DEFAULT '0',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_rkpd_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_aktivitas_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_rkpd_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_satuan_publik` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_anggaran` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_keu` int(11) NOT NULL DEFAULT '0' COMMENT '0 = detail 1 = grouping',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = rkpd 1 tambahan baru',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checksum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_belanja_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_belanja_pd`;
CREATE TABLE `trx_anggaran_belanja_pd` (
  `id_belanja_pd` bigint(20) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_rkpd_final` int(11) NOT NULL DEFAULT '0',
  `tahun_anggaran` int(11) NOT NULL DEFAULT '0',
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `id_zona_ssh` int(11) NOT NULL DEFAULT '0',
  `sumber_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL DEFAULT '0',
  `id_item_ssh` bigint(20) NOT NULL DEFAULT '0',
  `id_rekening_ssh` int(11) NOT NULL DEFAULT '0',
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `koefisien` decimal(20,2) NOT NULL DEFAULT '1.00',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `koefisien_rkpd` decimal(20,2) NOT NULL DEFAULT '1.00',
  `harga_satuan_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checksum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_jumlah` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_dokumen`
--

DROP TABLE IF EXISTS `trx_anggaran_dokumen`;
CREATE TABLE `trx_anggaran_dokumen` (
  `id_dokumen_keu` int(11) NOT NULL,
  `jns_dokumen_keu` int(11) NOT NULL DEFAULT '0' COMMENT '0 ppas 1 apbd',
  `kd_dokumen_keu` int(11) NOT NULL DEFAULT '0' COMMENT '0 murni 1 pergeseran_1 2 perubahan 3 pergeseran_2',
  `id_perubahan` int(11) NOT NULL DEFAULT '0' COMMENT '0 awal',
  `id_dokumen_ref` int(11) NOT NULL DEFAULT '0',
  `tahun_anggaran` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `nomor_keu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_keu` date NOT NULL,
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_ppkd` int(11) DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sinkronisasi` int(11) NOT NULL DEFAULT '0',
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_indikator`
--

DROP TABLE IF EXISTS `trx_anggaran_indikator`;
CREATE TABLE `trx_anggaran_indikator` (
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_anggaran_pemda` int(11) NOT NULL,
  `id_indikator_rkpd_final` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_keuangan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_output` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 data rpjmd 1 data baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_kegiatan_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_kegiatan_pd`;
CREATE TABLE `trx_anggaran_kegiatan_pd` (
  `id_kegiatan_pd` bigint(20) NOT NULL,
  `id_program_pd` bigint(20) NOT NULL,
  `id_kegiatan_pd_rkpd_final` int(11) DEFAULT NULL,
  `id_unit` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `tahun_anggaran` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) DEFAULT '0',
  `id_rkpd_renstra` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `id_kegiatan_renstra` int(11) DEFAULT '0',
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_kegiatan_renstra` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checksum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_keg_indikator_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_keg_indikator_pd`;
CREATE TABLE `trx_anggaran_keg_indikator_pd` (
  `id_indikator_kegiatan` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_indikator_rkpd_final` int(11) DEFAULT NULL,
  `tahun_anggaran` int(11) NOT NULL,
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_output` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_lokasi_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_lokasi_pd`;
CREATE TABLE `trx_anggaran_lokasi_pd` (
  `id_lokasi_pd` bigint(20) NOT NULL,
  `id_lokasi_rkpd_final` int(11) NOT NULL DEFAULT '0' COMMENT '0',
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `tahun_anggaran` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `jenis_lokasi` int(11) NOT NULL DEFAULT '0',
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_teknis` int(11) DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `rt` int(11) DEFAULT '0',
  `rw` int(11) DEFAULT '0',
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rkpd 1 anggaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_pelaksana`
--

DROP TABLE IF EXISTS `trx_anggaran_pelaksana`;
CREATE TABLE `trx_anggaran_pelaksana` (
  `id_pelaksana_anggaran` int(11) NOT NULL,
  `id_anggaran_pemda` int(11) NOT NULL,
  `tahun_anggaran` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urusan_anggaran` int(11) NOT NULL,
  `id_pelaksana_rkpd_final` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rkpd_final` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_anggaran` decimal(20,2) NOT NULL DEFAULT '0.00',
  `hak_akses` int(11) NOT NULL DEFAULT '0' COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_pelaksana_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_pelaksana_pd`;
CREATE TABLE `trx_anggaran_pelaksana_pd` (
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd_final` int(11) DEFAULT NULL,
  `tahun_anggaran` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) DEFAULT '0',
  `id_lokasi` int(11) DEFAULT '0' COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final',
  `hak_akses` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_program`
--

DROP TABLE IF EXISTS `trx_anggaran_program`;
CREATE TABLE `trx_anggaran_program` (
  `id_anggaran_pemda` int(11) NOT NULL,
  `id_dokumen_keu` int(11) NOT NULL DEFAULT '0',
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_rkpd_final` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL 3 Pembiayaan',
  `tahun_anggaran` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) DEFAULT NULL,
  `thn_id_rpjmd` int(11) DEFAULT NULL,
  `id_visi_rpjmd` int(11) DEFAULT NULL,
  `id_misi_rpjmd` int(11) DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) DEFAULT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_keuangan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RKPD 1 = Baru',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_program_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_program_pd`;
CREATE TABLE `trx_anggaran_program_pd` (
  `id_program_pd` bigint(11) NOT NULL,
  `id_pelaksana_anggaran` int(11) NOT NULL,
  `kd_dokumen_keu` int(11) NOT NULL DEFAULT '0' COMMENT '0 murni 1 pergeseran_1 2 perubahan 3 pergeseran_2',
  `jns_dokumen_keu` int(11) NOT NULL DEFAULT '0' COMMENT '0 ppas 1 apbd',
  `id_perubahan` int(11) NOT NULL DEFAULT '0' COMMENT '0 awal',
  `id_dokumen_keu` int(11) NOT NULL DEFAULT '0',
  `tahun_anggaran` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL 3 Penerimaan',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_program_pd_rkpd_final` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT '0',
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_rkpd_final` decimal(20,2) DEFAULT '0.00',
  `pagu_anggaran` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RKPD 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checksum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_prog_indikator_pd`
--

DROP TABLE IF EXISTS `trx_anggaran_prog_indikator_pd`;
CREATE TABLE `trx_anggaran_prog_indikator_pd` (
  `id_indikator_program` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_program_pd` bigint(11) NOT NULL,
  `id_indikator_rkpd_final` int(11) NOT NULL DEFAULT '0',
  `tahun_anggaran` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_output` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_tapd`
--

DROP TABLE IF EXISTS `trx_anggaran_tapd`;
CREATE TABLE `trx_anggaran_tapd` (
  `id_tapd` bigint(255) NOT NULL,
  `id_dokumen_keu` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_unit_pegawai` int(11) NOT NULL,
  `peran_tim` varchar(255) NOT NULL,
  `status_tim` int(255) NOT NULL DEFAULT '0',
  `tmt_tim` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_tapd_unit`
--

DROP TABLE IF EXISTS `trx_anggaran_tapd_unit`;
CREATE TABLE `trx_anggaran_tapd_unit` (
  `id_unit_tapd` bigint(255) NOT NULL,
  `id_tapd` bigint(255) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `status_unit` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_unit_kpa`
--

DROP TABLE IF EXISTS `trx_anggaran_unit_kpa`;
CREATE TABLE `trx_anggaran_unit_kpa` (
  `id_kpa` bigint(255) NOT NULL,
  `id_pa` bigint(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_unit_pegawai` int(11) NOT NULL,
  `id_program` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_unit_pa`
--

DROP TABLE IF EXISTS `trx_anggaran_unit_pa`;
CREATE TABLE `trx_anggaran_unit_pa` (
  `id_pa` bigint(255) NOT NULL,
  `id_dokumen_keu` int(11) NOT NULL,
  `no_dokumen` varchar(255) DEFAULT NULL,
  `tgl_dokumen` date DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_unit_pegawai` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_anggaran_urusan`
--

DROP TABLE IF EXISTS `trx_anggaran_urusan`;
CREATE TABLE `trx_anggaran_urusan` (
  `id_urusan_anggaran` int(11) NOT NULL,
  `id_anggaran_pemda` int(11) NOT NULL,
  `tahun_anggaran` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rkpd 1 baru',
  `id_urusan_rkpd_final` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_aktivitas`
--

DROP TABLE IF EXISTS `trx_asb_aktivitas`;
CREATE TABLE `trx_asb_aktivitas` (
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_asb_sub_sub_kelompok` int(11) NOT NULL,
  `nm_aktivitas_asb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan_aktivitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskripsi_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) DEFAULT '0.00',
  `id_satuan_1` int(11) DEFAULT NULL COMMENT 'cost driver',
  `sat_derivatif_1` int(11) DEFAULT NULL,
  `volume_2` decimal(20,2) DEFAULT '0.00',
  `id_satuan_2` int(11) DEFAULT NULL COMMENT 'cost driver',
  `sat_derivatif_2` int(11) DEFAULT NULL,
  `range_max` decimal(20,2) NOT NULL DEFAULT '0.00',
  `kapasitas_max` decimal(20,2) NOT NULL DEFAULT '0.00',
  `range_max1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `kapasitas_max1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `temp_id` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_kelompok`
--

DROP TABLE IF EXISTS `trx_asb_kelompok`;
CREATE TABLE `trx_asb_kelompok` (
  `id_asb_kelompok` int(11) NOT NULL,
  `id_asb_perkada` int(11) NOT NULL,
  `uraian_kelompok_asb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_id` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_komponen`
--

DROP TABLE IF EXISTS `trx_asb_komponen`;
CREATE TABLE `trx_asb_komponen` (
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_komponen_asb` bigint(20) NOT NULL,
  `nm_komponen_asb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rekening` int(11) NOT NULL,
  `temp_id` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_komponen_rinci`
--

DROP TABLE IF EXISTS `trx_asb_komponen_rinci`;
CREATE TABLE `trx_asb_komponen_rinci` (
  `id_komponen_asb_rinci` bigint(20) NOT NULL,
  `id_komponen_asb` bigint(20) NOT NULL,
  `jenis_biaya` int(11) NOT NULL DEFAULT '1' COMMENT '1 fix 2 dependent variabel 3 independen variable',
  `id_tarif_ssh` bigint(11) NOT NULL,
  `koefisien1` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `id_satuan1` int(11) DEFAULT NULL,
  `sat_derivatif1` int(11) DEFAULT NULL,
  `koefisien2` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `id_satuan2` int(11) DEFAULT NULL,
  `sat_derivatif2` int(11) DEFAULT NULL,
  `koefisien3` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `id_satuan3` int(11) DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hub_driver` int(11) DEFAULT '0' COMMENT '1 driver1 2 driver2 3 driver12 0 N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_perhitungan`
--

DROP TABLE IF EXISTS `trx_asb_perhitungan`;
CREATE TABLE `trx_asb_perhitungan` (
  `tahun_perhitungan` int(11) NOT NULL,
  `id_perhitungan` bigint(20) NOT NULL,
  `id_perkada` int(11) NOT NULL,
  `flag_aktif` int(11) NOT NULL DEFAULT '0' COMMENT '0 aktif 1 non aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_perhitungan_rinci`
--

DROP TABLE IF EXISTS `trx_asb_perhitungan_rinci`;
CREATE TABLE `trx_asb_perhitungan_rinci` (
  `id_perhitungan_rinci` bigint(20) NOT NULL,
  `id_perhitungan` bigint(20) NOT NULL,
  `id_asb_kelompok` bigint(20) NOT NULL,
  `id_asb_sub_kelompok` bigint(20) NOT NULL,
  `id_asb_sub_sub_kelompok` bigint(20) NOT NULL,
  `id_aktivitas_asb` bigint(20) NOT NULL,
  `id_komponen_asb` bigint(20) NOT NULL,
  `id_komponen_asb_rinci` bigint(20) NOT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_pagu` decimal(20,2) DEFAULT '0.00',
  `kfix` decimal(20,4) DEFAULT '0.0000',
  `kmax` decimal(20,4) DEFAULT '0.0000',
  `kdv1` decimal(20,4) DEFAULT '0.0000',
  `kr1` decimal(20,4) DEFAULT '0.0000',
  `kdv2` decimal(20,4) DEFAULT '0.0000',
  `kr2` decimal(20,4) DEFAULT '0.0000',
  `kiv1` decimal(20,4) DEFAULT '0.0000',
  `kiv2` decimal(20,4) DEFAULT '0.0000',
  `kiv3` decimal(20,4) DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_perkada`
--

DROP TABLE IF EXISTS `trx_asb_perkada`;
CREATE TABLE `trx_asb_perkada` (
  `id_asb_perkada` int(11) NOT NULL,
  `nomor_perkada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_perkada` date NOT NULL,
  `tahun_berlaku` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_sub_kelompok`
--

DROP TABLE IF EXISTS `trx_asb_sub_kelompok`;
CREATE TABLE `trx_asb_sub_kelompok` (
  `id_asb_sub_kelompok` int(11) NOT NULL,
  `id_asb_kelompok` int(11) NOT NULL,
  `uraian_sub_kelompok_asb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_id` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_asb_sub_sub_kelompok`
--

DROP TABLE IF EXISTS `trx_asb_sub_sub_kelompok`;
CREATE TABLE `trx_asb_sub_sub_kelompok` (
  `id_asb_sub_sub_kelompok` int(11) NOT NULL,
  `id_asb_sub_kelompok` int(11) NOT NULL,
  `uraian_sub_sub_kelompok_asb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_id` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd`
--

DROP TABLE IF EXISTS `trx_forum_skpd`;
CREATE TABLE `trx_forum_skpd` (
  `id_forum_skpd` bigint(20) NOT NULL,
  `id_forum_program` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) DEFAULT '0',
  `id_rkpd_renstra` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `id_kegiatan_renstra` int(11) DEFAULT '0',
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_kegiatan_renstra` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_aktivitas`
--

DROP TABLE IF EXISTS `trx_forum_skpd_aktivitas`;
CREATE TABLE `trx_forum_skpd_aktivitas` (
  `id_aktivitas_forum` bigint(11) NOT NULL,
  `id_forum_skpd` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT '0',
  `id_aktivitas_renja` int(11) DEFAULT '0',
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_aktivitas_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_aktivitas_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_belanja`
--

DROP TABLE IF EXISTS `trx_forum_skpd_belanja`;
CREATE TABLE `trx_forum_skpd_belanja` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_forum` bigint(20) NOT NULL,
  `id_lokasi_forum` bigint(20) NOT NULL,
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT '0',
  `sumber_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '1',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT '1',
  `harga_satuan_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_dokumen`
--

DROP TABLE IF EXISTS `trx_forum_skpd_dokumen`;
CREATE TABLE `trx_forum_skpd_dokumen` (
  `id_dokumen_ranwal` int(11) NOT NULL,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_kebijakan`
--

DROP TABLE IF EXISTS `trx_forum_skpd_kebijakan`;
CREATE TABLE `trx_forum_skpd_kebijakan` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renja` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_kegiatan_indikator`
--

DROP TABLE IF EXISTS `trx_forum_skpd_kegiatan_indikator`;
CREATE TABLE `trx_forum_skpd_kegiatan_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_lokasi`
--

DROP TABLE IF EXISTS `trx_forum_skpd_lokasi`;
CREATE TABLE `trx_forum_skpd_lokasi` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_forum` bigint(20) NOT NULL,
  `id_lokasi_forum` bigint(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) DEFAULT '0',
  `id_lokasi_teknis` int(11) DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `rt` int(11) DEFAULT '0',
  `rw` int(11) DEFAULT '0',
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_pelaksana`
--

DROP TABLE IF EXISTS `trx_forum_skpd_pelaksana`;
CREATE TABLE `trx_forum_skpd_pelaksana` (
  `id_pelaksana_forum` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_forum` bigint(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) DEFAULT '0',
  `id_lokasi` int(11) DEFAULT '0' COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_program`
--

DROP TABLE IF EXISTS `trx_forum_skpd_program`;
CREATE TABLE `trx_forum_skpd_program` (
  `id_forum_program` bigint(11) NOT NULL,
  `id_forum_rkpdprog` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_renja_program` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_forum` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_program_indikator`
--

DROP TABLE IF EXISTS `trx_forum_skpd_program_indikator`;
CREATE TABLE `trx_forum_skpd_program_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_program_ranwal`
--

DROP TABLE IF EXISTS `trx_forum_skpd_program_ranwal`;
CREATE TABLE `trx_forum_skpd_program_ranwal` (
  `id_forum_rkpdprog` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL',
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL DEFAULT '0',
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_ranwal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_forum_skpd_usulan`
--

DROP TABLE IF EXISTS `trx_forum_skpd_usulan`;
CREATE TABLE `trx_forum_skpd_usulan` (
  `id_sumber_usulan` bigint(20) NOT NULL,
  `sumber_usulan` int(11) DEFAULT '0' COMMENT '0 renja 1 musrendes 2 musrencam 3 pokir 4 forum_skpd',
  `id_lokasi_forum` bigint(20) NOT NULL,
  `id_ref_usulan` int(11) DEFAULT NULL,
  `volume_1_usulan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2_usulan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 tanpa 1 dengan 2 digabung 3 ditolak',
  `uraian_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_group_menu`
--

DROP TABLE IF EXISTS `trx_group_menu`;
CREATE TABLE `trx_group_menu` (
  `menu` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Triggers `trx_group_menu`
--
DROP TRIGGER IF EXISTS `trg_agroup_menu`;
DELIMITER $$
CREATE TRIGGER `trg_agroup_menu` BEFORE INSERT ON `trx_group_menu` FOR EACH ROW IF new.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'You are not allowed to insert it!!';
END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_egroup_menu`;
DELIMITER $$
CREATE TRIGGER `trg_egroup_menu` BEFORE UPDATE ON `trx_group_menu` FOR EACH ROW IF old.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to update it!!';
END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trg_group_menu`;
DELIMITER $$
CREATE TRIGGER `trg_group_menu` BEFORE DELETE ON `trx_group_menu` FOR EACH ROW IF old.group_id = 1 THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trx_isian_data_dasar`
--

DROP TABLE IF EXISTS `trx_isian_data_dasar`;
CREATE TABLE `trx_isian_data_dasar` (
  `id_isian_tabel_dasar` int(11) NOT NULL,
  `id_kolom_tabel_dasar` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `nmin1` decimal(20,2) DEFAULT '0.00',
  `nmin2` decimal(20,2) DEFAULT '0.00',
  `nmin3` decimal(20,2) DEFAULT '0.00',
  `nmin4` decimal(20,2) DEFAULT '0.00',
  `nmin5` decimal(20,2) DEFAULT '0.00',
  `tahun` int(4) DEFAULT NULL,
  `nmin1_persen` decimal(20,2) DEFAULT '0.00',
  `nmin2_persen` decimal(20,2) DEFAULT '0.00',
  `nmin3_persen` decimal(20,2) DEFAULT '0.00',
  `nmin4_persen` decimal(20,2) DEFAULT '0.00',
  `nmin5_persen` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_log_api`
--

DROP TABLE IF EXISTS `trx_log_api`;
CREATE TABLE `trx_log_api` (
  `id_log` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `tgl_kirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_kirim` int(11) NOT NULL,
  `log_kirim` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_log_events`
--

DROP TABLE IF EXISTS `trx_log_events`;
CREATE TABLE `trx_log_events` (
  `id` int(11) NOT NULL,
  `code_events` int(11) NOT NULL DEFAULT '0',
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrencam`
--

DROP TABLE IF EXISTS `trx_musrencam`;
CREATE TABLE `trx_musrencam` (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrencam` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_asb_aktivitas` int(11) NOT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_kondisi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_output_aktivitas` decimal(20,2) DEFAULT '0.00',
  `id_satuan` int(11) DEFAULT NULL,
  `id_satuan_desa` int(11) DEFAULT NULL,
  `volume` decimal(20,2) DEFAULT '0.00',
  `volume_desa` decimal(20,2) DEFAULT '0.00',
  `harga_satuan` decimal(20,2) DEFAULT '0.00',
  `harga_satuan_desa` decimal(20,2) DEFAULT '0.00',
  `jml_pagu` decimal(20,2) DEFAULT '0.00',
  `jml_pagu_desa` decimal(20,2) DEFAULT '0.00',
  `id_usulan_desa` bigint(255) DEFAULT NULL,
  `pagu_aktivitas` decimal(20,2) DEFAULT '0.00',
  `sumber_usulan` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Ranwal/Renja 1 = Desa 2 = Musrencam',
  `status_usulan` int(11) NOT NULL COMMENT '0 = Proses Usulan 1 = Kirim_Forum',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0= Diterima\r\n1= Diterima dengan perubahan\r\n2= Digabungkan dengan usulan lain\r\n3= Ditolak',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrencam_lokasi`
--

DROP TABLE IF EXISTS `trx_musrencam_lokasi`;
CREATE TABLE `trx_musrencam_lokasi` (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrencam` int(11) NOT NULL,
  `id_lokasi_musrencam` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL COMMENT 'difilter hanya id lokasi yang jenis lokasinya kewilayahan',
  `id_desa` int(11) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `uraian_kondisi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_musrendes` int(11) DEFAULT NULL,
  `id_lokasi_musrendes` int(255) DEFAULT NULL,
  `sumber_data` int(11) DEFAULT NULL COMMENT '0 = desa 1 = kecamatan',
  `volume_desa` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrendes`
--

DROP TABLE IF EXISTS `trx_musrendes`;
CREATE TABLE `trx_musrendes` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrendes` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_asb_aktivitas` int(11) NOT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_kondisi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_output_aktivitas` decimal(20,2) DEFAULT '0.00',
  `id_satuan` int(11) DEFAULT NULL,
  `id_satuan_rw` int(11) DEFAULT NULL,
  `volume` decimal(20,2) DEFAULT '0.00',
  `volume_rw` decimal(20,2) DEFAULT '0.00',
  `harga_satuan` decimal(20,2) DEFAULT '0.00',
  `harga_satuan_rw` decimal(20,2) DEFAULT '0.00',
  `jml_pagu` decimal(20,2) DEFAULT '0.00',
  `jml_pagu_rw` decimal(20,2) DEFAULT '0.00',
  `id_usulan_rw` bigint(255) DEFAULT NULL,
  `pagu_aktivitas` decimal(20,2) DEFAULT '0.00',
  `sumber_usulan` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Ranwal/Renja 1 = RW 2 = Musrendes',
  `status_usulan` int(11) NOT NULL COMMENT '0 = Proses Usulan 1 = Kirim_Musrencam',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0= Diterima\r\n1= Diterima dengan perubahan\r\n2= Digabungkan dengan usulan lain\r\n3= Ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrendes_lokasi`
--

DROP TABLE IF EXISTS `trx_musrendes_lokasi`;
CREATE TABLE `trx_musrendes_lokasi` (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrendes` int(11) NOT NULL,
  `id_lokasi_musrendes` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL COMMENT 'difilter hanya id lokasi yang jenis lokasinya kewilayahan',
  `id_desa` int(11) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `uraian_kondisi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) DEFAULT NULL COMMENT '0 = RW 1 = Desa',
  `volume_rw` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_desa` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrendes_rw`
--

DROP TABLE IF EXISTS `trx_musrendes_rw`;
CREATE TABLE `trx_musrendes_rw` (
  `tahun_musren` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrendes_rw` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_asb_aktivitas` int(11) NOT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_kondisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_satuan` int(11) NOT NULL DEFAULT '0',
  `volume` decimal(20,2) NOT NULL DEFAULT '0.00',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_pagu` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_usulan` int(11) NOT NULL COMMENT '0 = Proses Usulan 1 = Kirim_Musrencam',
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrendes_rw_lokasi`
--

DROP TABLE IF EXISTS `trx_musrendes_rw_lokasi`;
CREATE TABLE `trx_musrendes_rw_lokasi` (
  `no_urut` int(11) NOT NULL,
  `id_musrendes_rw` int(11) NOT NULL,
  `id_musrendes_lokasi` int(11) NOT NULL,
  `file_foto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_kondisi` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_usulan` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Proses Usulan 1 = Kirim_Musrencam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab`
--

DROP TABLE IF EXISTS `trx_musrenkab`;
CREATE TABLE `trx_musrenkab` (
  `id_musrenkab` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_rkpd_rancangan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) DEFAULT NULL,
  `thn_id_rpjmd` int(11) DEFAULT NULL,
  `id_visi_rpjmd` int(11) DEFAULT NULL,
  `id_misi_rpjmd` int(11) DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) DEFAULT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_ranwal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_aktivitas_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_aktivitas_pd`;
CREATE TABLE `trx_musrenkab_aktivitas_pd` (
  `id_aktivitas_pd` bigint(11) NOT NULL,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT '0',
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT '0',
  `id_aktivitas_renja` int(11) DEFAULT '0',
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_aktivitas_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_aktivitas_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_belanja_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_belanja_pd`;
CREATE TABLE `trx_musrenkab_belanja_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT '0',
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT '0',
  `sumber_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '1',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT '1',
  `harga_satuan_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_dokumen`
--

DROP TABLE IF EXISTS `trx_musrenkab_dokumen`;
CREATE TABLE `trx_musrenkab_dokumen` (
  `id_dokumen_rkpd` int(11) NOT NULL,
  `nomor_rkpd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_perencana` int(11) DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_indikator`
--

DROP TABLE IF EXISTS `trx_musrenkab_indikator`;
CREATE TABLE `trx_musrenkab_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 data rpjmd 1 data baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_kebijakan`
--

DROP TABLE IF EXISTS `trx_musrenkab_kebijakan`;
CREATE TABLE `trx_musrenkab_kebijakan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_kebijakan_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_kebijakan_pd`;
CREATE TABLE `trx_musrenkab_kebijakan_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_kegiatan_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_kegiatan_pd`;
CREATE TABLE `trx_musrenkab_kegiatan_pd` (
  `id_kegiatan_pd` bigint(20) NOT NULL,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) DEFAULT NULL,
  `id_renja` int(11) DEFAULT '0',
  `id_rkpd_renstra` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `id_kegiatan_renstra` int(11) DEFAULT '0',
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_kegiatan_renstra` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_keg_indikator_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_keg_indikator_pd`;
CREATE TABLE `trx_musrenkab_keg_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_lokasi_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_lokasi_pd`;
CREATE TABLE `trx_musrenkab_lokasi_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT '0' COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) DEFAULT '0',
  `id_lokasi_teknis` int(11) DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `rt` int(11) DEFAULT '0',
  `rw` int(11) DEFAULT '0',
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_pelaksana`
--

DROP TABLE IF EXISTS `trx_musrenkab_pelaksana`;
CREATE TABLE `trx_musrenkab_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `hak_akses` int(11) NOT NULL DEFAULT '0' COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_pelaksana_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_pelaksana_pd`;
CREATE TABLE `trx_musrenkab_pelaksana_pd` (
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) DEFAULT '0',
  `id_lokasi` int(11) DEFAULT '0' COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_program_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_program_pd`;
CREATE TABLE `trx_musrenkab_program_pd` (
  `id_program_pd` bigint(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) DEFAULT NULL,
  `id_renja_program` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_forum` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_prog_indikator_pd`
--

DROP TABLE IF EXISTS `trx_musrenkab_prog_indikator_pd`;
CREATE TABLE `trx_musrenkab_prog_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_musrenkab_urusan`
--

DROP TABLE IF EXISTS `trx_musrenkab_urusan`;
CREATE TABLE `trx_musrenkab_urusan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_musrenkab` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pokir`
--

DROP TABLE IF EXISTS `trx_pokir`;
CREATE TABLE `trx_pokir` (
  `id_tahun` int(11) NOT NULL,
  `id_pokir` int(11) NOT NULL,
  `tanggal_pengusul` date NOT NULL,
  `asal_pengusul` int(11) NOT NULL DEFAULT '0' COMMENT '0 Fraksi\r\n1 Pempinan\r\n2 Badan Musyawarah\r\n3 Komisi\r\n4 Badan Legislasi Daerah\r\n5 Badan Anggaran\r\n6 Badan Kehormatan\r\n9 Badan Lainnya',
  `jabatan_pengusul` int(11) NOT NULL DEFAULT '4' COMMENT '0 ketua 1 wakil ketua 2 sekretaris 3 bendahara 4 anggota',
  `nama_pengusul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_anggota` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daerah_pemilihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_pokir` int(11) DEFAULT '0' COMMENT '1 surat 2 email 3 telepon 4 lisan 9 lainnya',
  `bukti_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entried_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pokir_lokasi`
--

DROP TABLE IF EXISTS `trx_pokir_lokasi`;
CREATE TABLE `trx_pokir_lokasi` (
  `id_pokir_usulan` int(11) NOT NULL,
  `id_pokir_lokasi` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `diskripsi_lokasi` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pokir_tl`
--

DROP TABLE IF EXISTS `trx_pokir_tl`;
CREATE TABLE `trx_pokir_tl` (
  `id_pokir_tl` int(11) NOT NULL,
  `id_pokir` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `id_pokir_lokasi` int(11) NOT NULL,
  `unit_tl` int(11) DEFAULT NULL,
  `status_tl` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Belum TL, 1 = Disposisi Ke Unit, 2 = Dipending, 3 = Perlu Dibahas kembali  4 = tidak diakomodir',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pokir_tl_unit`
--

DROP TABLE IF EXISTS `trx_pokir_tl_unit`;
CREATE TABLE `trx_pokir_tl_unit` (
  `id_pokir_unit` int(11) NOT NULL,
  `unit_tl` int(11) DEFAULT NULL,
  `id_pokir_tl` int(11) NOT NULL,
  `id_pokir` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `id_pokir_lokasi` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL DEFAULT '0',
  `id_lokasi_renja` int(11) NOT NULL DEFAULT '0',
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT '0',
  `id_lokasi_forum` int(11) NOT NULL DEFAULT '0',
  `volume_tl` decimal(20,2) DEFAULT '0.00',
  `pagu_tl` decimal(20,2) DEFAULT '0.00',
  `status_tl` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Belum TL, 1 = Diakomodir Renja, 2 = Diakomodir Forum, 3 = Tidak diakomodir',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_pokir_usulan`
--

DROP TABLE IF EXISTS `trx_pokir_usulan`;
CREATE TABLE `trx_pokir_usulan` (
  `id_pokir` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '1',
  `id_judul_usulan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diskripsi_usulan` blob,
  `id_unit` int(11) DEFAULT NULL,
  `volume` decimal(20,2) DEFAULT '0.00',
  `id_satuan` int(11) DEFAULT NULL,
  `jml_anggaran` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entried_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_prioritas_nasional`
--

DROP TABLE IF EXISTS `trx_prioritas_nasional`;
CREATE TABLE `trx_prioritas_nasional` (
  `tahun` int(11) NOT NULL,
  `id_prioritas` int(11) NOT NULL,
  `nama_prioritas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_prioritas_pemda`
--

DROP TABLE IF EXISTS `trx_prioritas_pemda`;
CREATE TABLE `trx_prioritas_pemda` (
  `id_tema_rkpd` int(11) NOT NULL,
  `id_prioritas` int(11) NOT NULL,
  `nama_prioritas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_prioritas_pemda_tema`
--

DROP TABLE IF EXISTS `trx_prioritas_pemda_tema`;
CREATE TABLE `trx_prioritas_pemda_tema` (
  `tahun` int(11) NOT NULL,
  `id_tema_rkpd` int(11) NOT NULL,
  `uraian_tema` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_prioritas_provinsi`
--

DROP TABLE IF EXISTS `trx_prioritas_provinsi`;
CREATE TABLE `trx_prioritas_provinsi` (
  `tahun` int(11) NOT NULL,
  `id_prioritas` int(11) NOT NULL,
  `nama_prioritas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_program_nasional`
--

DROP TABLE IF EXISTS `trx_program_nasional`;
CREATE TABLE `trx_program_nasional` (
  `id_prioritas` int(11) NOT NULL,
  `id_prognas` int(11) NOT NULL,
  `uraian_program_nasional` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_program_nasional_detail`
--

DROP TABLE IF EXISTS `trx_program_nasional_detail`;
CREATE TABLE `trx_program_nasional_detail` (
  `id_prognas_unit` int(11) NOT NULL,
  `id_prognas_item` bigint(11) NOT NULL,
  `id_kegiatan_pd` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_program_nasional_unit`
--

DROP TABLE IF EXISTS `trx_program_nasional_unit`;
CREATE TABLE `trx_program_nasional_unit` (
  `id_prognas` int(11) NOT NULL,
  `id_prognas_unit` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_program_provinsi`
--

DROP TABLE IF EXISTS `trx_program_provinsi`;
CREATE TABLE `trx_program_provinsi` (
  `id_prioritas` int(11) NOT NULL,
  `id_progprov` int(11) NOT NULL,
  `uraian_program_provinsi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_program_provinsi_detail`
--

DROP TABLE IF EXISTS `trx_program_provinsi_detail`;
CREATE TABLE `trx_program_provinsi_detail` (
  `id_progprov_unit` int(11) NOT NULL,
  `id_progprov_item` bigint(11) NOT NULL,
  `id_kegiatan_pd` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_program_provinsi_unit`
--

DROP TABLE IF EXISTS `trx_program_provinsi_unit`;
CREATE TABLE `trx_program_provinsi_unit` (
  `id_progprov` int(11) NOT NULL,
  `id_progprov_unit` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_aktivitas`
--

DROP TABLE IF EXISTS `trx_renja_aktivitas`;
CREATE TABLE `trx_renja_aktivitas` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT NULL,
  `id_satuan_publik` int(11) DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_output_aktivitas` decimal(20,2) DEFAULT '0.00',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rata2` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(255) DEFAULT NULL,
  `id_satuan_2` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_belanja`
--

DROP TABLE IF EXISTS `trx_renja_belanja`;
CREATE TABLE `trx_renja_belanja` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NOT NULL,
  `id_zona_ssh` int(11) NOT NULL DEFAULT '0',
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '1 ssh 0 asb',
  `id_aktivitas_asb` bigint(20) DEFAULT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_dokumen`
--

DROP TABLE IF EXISTS `trx_renja_dokumen`;
CREATE TABLE `trx_renja_dokumen` (
  `id_dokumen_ranwal` int(11) NOT NULL,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif',
  `jns_dokumen` int(255) NOT NULL,
  `id_dokumen_ref` int(255) NOT NULL DEFAULT '0',
  `id_perubahan` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_kebijakan`
--

DROP TABLE IF EXISTS `trx_renja_kebijakan`;
CREATE TABLE `trx_renja_kebijakan` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renja` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_kegiatan`
--

DROP TABLE IF EXISTS `trx_renja_kegiatan`;
CREATE TABLE `trx_renja_kegiatan` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL COMMENT 'juga menunjukkan prioritas',
  `id_renja` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_rkpd_renstra` int(11) DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) DEFAULT NULL,
  `id_misi_renstra` int(11) DEFAULT NULL,
  `id_tujuan_renstra` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_kegiatan` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_selanjutnya` decimal(20,2) DEFAULT '0.00',
  `status_pelaksanaan_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 = tepat 1 = dimajukan 2 = ditunda 3 dibatalkan 4 baru',
  `pagu_musrenbang` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja skpd 1 =  tambahan baru',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 Final',
  `status_rancangan` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum selesai 1 siap kirim ke forum',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_kegiatan_indikator`
--

DROP TABLE IF EXISTS `trx_renja_kegiatan_indikator`;
CREATE TABLE `trx_renja_kegiatan_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_indikator_kegiatan_renja` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renja` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `angka_tahun` decimal(20,2) DEFAULT '0.00',
  `angka_renstra` decimal(20,2) DEFAULT '0.00',
  `id_satuan_output` int(255) DEFAULT NULL,
  `status_data` int(11) DEFAULT '0' COMMENT '0 draft 1 final',
  `sumber_data` int(11) DEFAULT '0' COMMENT '0 renstra 1 tambahan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_lokasi`
--

DROP TABLE IF EXISTS `trx_renja_lokasi`;
CREATE TABLE `trx_renja_lokasi` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NOT NULL,
  `jenis_lokasi` int(11) NOT NULL COMMENT '0 kewilayah 1 teknis',
  `id_lokasi` int(11) NOT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_pelaksana`
--

DROP TABLE IF EXISTS `trx_renja_pelaksana`;
CREATE TABLE `trx_renja_pelaksana` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) DEFAULT '0',
  `ket_usul` int(11) DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `id_lokasi` int(11) NOT NULL DEFAULT '0' COMMENT 'Lokasi Penyelenggaraan Kegiatan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_program`
--

DROP TABLE IF EXISTS `trx_renja_program`;
CREATE TABLE `trx_renja_program` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_renja_ranwal` int(11) NOT NULL DEFAULT '0',
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) DEFAULT NULL,
  `id_misi_renstra` int(11) DEFAULT NULL,
  `id_tujuan_renstra` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_ranwal` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `status_program_rkpd` int(11) DEFAULT NULL COMMENT 'status pelaksanaan unit di rkpd',
  `sumber_data_rkpd` int(11) DEFAULT NULL COMMENT 'sumber usulan pelaksana unit di rkpd',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_program_indikator`
--

DROP TABLE IF EXISTS `trx_renja_program_indikator`;
CREATE TABLE `trx_renja_program_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program_renja` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renja` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_program_rkpd`
--

DROP TABLE IF EXISTS `trx_renja_program_rkpd`;
CREATE TABLE `trx_renja_program_rkpd` (
  `tahun_renja` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_renja_ranwal` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `jml_data` int(11) NOT NULL DEFAULT '0',
  `jml_baru` int(11) NOT NULL DEFAULT '0',
  `jml_lama` int(11) NOT NULL DEFAULT '0',
  `jml_tepat` int(11) NOT NULL DEFAULT '0',
  `jml_maju` int(11) NOT NULL DEFAULT '0',
  `jml_tunda` int(11) NOT NULL DEFAULT '0',
  `jml_batal` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan`
--

DROP TABLE IF EXISTS `trx_renja_rancangan`;
CREATE TABLE `trx_renja_rancangan` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL COMMENT 'juga menunjukkan prioritas',
  `id_renja` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_rkpd_renstra` int(11) DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) DEFAULT NULL,
  `id_misi_renstra` int(11) DEFAULT NULL,
  `id_tujuan_renstra` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_kegiatan` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_selanjutnya` decimal(20,2) DEFAULT '0.00',
  `status_pelaksanaan_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 = tepat 1 = dimajukan 2 = ditunda 3 dibatalkan 4 baru',
  `pagu_musrenbang` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja skpd 1 =  tambahan baru',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 Final',
  `status_rancangan` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum selesai 1 siap kirim ke forum',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_aktivitas`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_aktivitas`;
CREATE TABLE `trx_renja_rancangan_aktivitas` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT NULL,
  `id_satuan_publik` int(11) DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_output_aktivitas` decimal(20,2) DEFAULT '0.00',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rata2` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(255) DEFAULT NULL,
  `id_satuan_2` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_belanja`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_belanja`;
CREATE TABLE `trx_renja_rancangan_belanja` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NOT NULL,
  `id_zona_ssh` int(11) NOT NULL DEFAULT '0',
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '1 ssh 0 asb',
  `id_aktivitas_asb` bigint(20) DEFAULT NULL,
  `id_tarif_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_dokumen`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_dokumen`;
CREATE TABLE `trx_renja_rancangan_dokumen` (
  `id_dokumen_ranwal` int(11) NOT NULL,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_indikator`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_indikator`;
CREATE TABLE `trx_renja_rancangan_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_indikator_kegiatan_renja` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renja` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `angka_tahun` decimal(20,2) DEFAULT '0.00',
  `angka_renstra` decimal(20,2) DEFAULT '0.00',
  `id_satuan_output` int(255) DEFAULT NULL,
  `status_data` int(11) DEFAULT '0' COMMENT '0 draft 1 final',
  `sumber_data` int(11) DEFAULT '0' COMMENT '0 renstra 1 tambahan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_kebijakan`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_kebijakan`;
CREATE TABLE `trx_renja_rancangan_kebijakan` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renja` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_lokasi`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_lokasi`;
CREATE TABLE `trx_renja_rancangan_lokasi` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_lokasi_renja` int(11) NOT NULL,
  `jenis_lokasi` int(11) NOT NULL COMMENT '0 kewilayah 1 teknis',
  `id_lokasi` int(11) NOT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_pelaksana`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_pelaksana`;
CREATE TABLE `trx_renja_rancangan_pelaksana` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) DEFAULT '0',
  `ket_usul` int(11) DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `id_lokasi` int(11) NOT NULL DEFAULT '0' COMMENT 'Lokasi Penyelenggaraan Kegiatan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_program`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_program`;
CREATE TABLE `trx_renja_rancangan_program` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_renja_ranwal` int(11) NOT NULL DEFAULT '0',
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) DEFAULT NULL,
  `id_misi_renstra` int(11) DEFAULT NULL,
  `id_tujuan_renstra` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_ranwal` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `status_program_rkpd` int(11) DEFAULT NULL COMMENT 'status pelaksanaan unit di rkpd',
  `sumber_data_rkpd` int(11) DEFAULT NULL COMMENT 'sumber usulan pelaksana unit di rkpd',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_program_indikator`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_program_indikator`;
CREATE TABLE `trx_renja_rancangan_program_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program_renja` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renja` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_output` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_program_ranwal`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_program_ranwal`;
CREATE TABLE `trx_renja_rancangan_program_ranwal` (
  `tahun_renja` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_renja_ranwal` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `jml_data` int(11) NOT NULL DEFAULT '0',
  `jml_baru` int(11) NOT NULL DEFAULT '0',
  `jml_lama` int(11) NOT NULL DEFAULT '0',
  `jml_tepat` int(11) NOT NULL DEFAULT '0',
  `jml_maju` int(11) NOT NULL DEFAULT '0',
  `jml_tunda` int(11) NOT NULL DEFAULT '0',
  `jml_batal` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_rancangan_ref_pokir`
--

DROP TABLE IF EXISTS `trx_renja_rancangan_ref_pokir`;
CREATE TABLE `trx_renja_rancangan_ref_pokir` (
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_pokir_usulan` int(11) NOT NULL,
  `id_ref_pokir_renja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_aktivitas`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_aktivitas`;
CREATE TABLE `trx_renja_ranwal_aktivitas` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT NULL,
  `id_satuan_publik` int(11) DEFAULT NULL,
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolak_ukur_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_output_aktivitas` decimal(20,2) DEFAULT '0.00',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rata2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(255) DEFAULT NULL,
  `id_satuan_2` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_dokumen`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_dokumen`;
CREATE TABLE `trx_renja_ranwal_dokumen` (
  `id_dokumen_ranwal` int(11) NOT NULL,
  `id_unit_renja` int(255) NOT NULL,
  `nomor_ranwal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_kegiatan`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_kegiatan`;
CREATE TABLE `trx_renja_ranwal_kegiatan` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL COMMENT 'juga menunjukkan prioritas',
  `id_renja` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_rkpd_renstra` int(11) DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) DEFAULT NULL,
  `id_misi_renstra` int(11) DEFAULT NULL,
  `id_tujuan_renstra` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kegiatan_renstra` int(11) DEFAULT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_kegiatan` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_selanjutnya` decimal(20,2) DEFAULT '0.00',
  `status_pelaksanaan_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 = tepat 1 = dimajukan 2 = ditunda 3 dibatalkan 4 baru',
  `pagu_musrenbang` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja skpd 1 =  tambahan baru',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 Final',
  `status_rancangan` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum selesai 1 siap kirim ke forum',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_kegiatan_indikator`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_kegiatan_indikator`;
CREATE TABLE `trx_renja_ranwal_kegiatan_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_indikator_kegiatan_renja` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renja` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `angka_tahun` decimal(20,2) DEFAULT '0.00',
  `angka_renstra` decimal(20,2) DEFAULT '0.00',
  `id_satuan_output` int(255) DEFAULT NULL,
  `status_data` int(11) DEFAULT '0' COMMENT '0 draft 1 final',
  `sumber_data` int(11) DEFAULT '0' COMMENT '0 renstra 1 tambahan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_pelaksana`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_pelaksana`;
CREATE TABLE `trx_renja_ranwal_pelaksana` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `id_aktivitas_renja` int(11) NOT NULL DEFAULT '0',
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) DEFAULT '0',
  `ket_usul` int(11) DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `id_lokasi` int(11) NOT NULL DEFAULT '0' COMMENT 'Lokasi Penyelenggaraan Kegiatan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_program`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_program`;
CREATE TABLE `trx_renja_ranwal_program` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_renja_ranwal` int(11) NOT NULL DEFAULT '0',
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `id_bidang` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) DEFAULT NULL,
  `id_misi_renstra` int(11) DEFAULT NULL,
  `id_tujuan_renstra` int(11) DEFAULT NULL,
  `id_sasaran_renstra` int(11) DEFAULT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_ranwal` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `status_program_rkpd` int(11) DEFAULT NULL COMMENT 'status pelaksanaan unit di rkpd',
  `sumber_data_rkpd` int(11) DEFAULT NULL COMMENT 'sumber usulan pelaksana unit di rkpd',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dokumen` int(255) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_program_indikator`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_program_indikator`;
CREATE TABLE `trx_renja_ranwal_program_indikator` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renja_program` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program_renja` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_renja` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_output` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renja_ranwal_program_rkpd`
--

DROP TABLE IF EXISTS `trx_renja_ranwal_program_rkpd`;
CREATE TABLE `trx_renja_ranwal_program_rkpd` (
  `tahun_renja` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_renja_ranwal` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `jml_data` int(11) NOT NULL DEFAULT '0',
  `jml_baru` int(11) NOT NULL DEFAULT '0',
  `jml_lama` int(11) NOT NULL DEFAULT '0',
  `jml_tepat` int(11) NOT NULL DEFAULT '0',
  `jml_maju` int(11) NOT NULL DEFAULT '0',
  `jml_tunda` int(11) NOT NULL DEFAULT '0',
  `jml_batal` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_dokumen`
--

DROP TABLE IF EXISTS `trx_renstra_dokumen`;
CREATE TABLE `trx_renstra_dokumen` (
  `id_rpjmd` int(11) NOT NULL,
  `id_renstra` int(11) NOT NULL,
  `id_renstra_old` int(11) NOT NULL,
  `id_renstra_ref` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nomor_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_renstra` date DEFAULT NULL,
  `uraian_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jns_dokumen` int(11) NOT NULL DEFAULT '9',
  `id_revisi` int(11) NOT NULL DEFAULT '0',
  `id_status_dokumen` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_kebijakan`
--

DROP TABLE IF EXISTS `trx_renstra_kebijakan`;
CREATE TABLE `trx_renstra_kebijakan` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_renstra` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_kebijakan_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_kegiatan`
--

DROP TABLE IF EXISTS `trx_renstra_kegiatan`;
CREATE TABLE `trx_renstra_kegiatan` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `id_kegiatan_renstra` int(11) NOT NULL,
  `id_kegiatan_ref` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_sasaran_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun1` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun2` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun3` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun4` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun5` decimal(20,2) DEFAULT '0.00',
  `total_pagu` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_kegiatan_indikator`
--

DROP TABLE IF EXISTS `trx_renstra_kegiatan_indikator`;
CREATE TABLE `trx_renstra_kegiatan_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_renstra` int(11) NOT NULL,
  `id_indikator_kegiatan_renstra` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_kegiatan_pelaksana`
--

DROP TABLE IF EXISTS `trx_renstra_kegiatan_pelaksana`;
CREATE TABLE `trx_renstra_kegiatan_pelaksana` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_renstra_pelaksana` int(11) NOT NULL,
  `id_kegiatan_renstra` int(255) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_misi`
--

DROP TABLE IF EXISTS `trx_renstra_misi`;
CREATE TABLE `trx_renstra_misi` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_visi_renstra` int(11) NOT NULL,
  `id_misi_renstra` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_misi_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_program`
--

DROP TABLE IF EXISTS `trx_renstra_program`;
CREATE TABLE `trx_renstra_program` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_program_ref` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_program_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_sasaran_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun1` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun2` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun3` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun4` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun5` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_program_indikator`
--

DROP TABLE IF EXISTS `trx_renstra_program_indikator`;
CREATE TABLE `trx_renstra_program_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `id_indikator_sasaran_renstra` int(11) NOT NULL DEFAULT '0',
  `id_indikator_program_renstra` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `id_aspek_pembangunan` int(11) NOT NULL DEFAULT '0',
  `uraian_indikator_program_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_sasaran`
--

DROP TABLE IF EXISTS `trx_renstra_sasaran`;
CREATE TABLE `trx_renstra_sasaran` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL DEFAULT '0',
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_sasaran_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_sasaran_indikator`
--

DROP TABLE IF EXISTS `trx_renstra_sasaran_indikator`;
CREATE TABLE `trx_renstra_sasaran_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL DEFAULT '0',
  `id_indikator_sasaran_renstra` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_strategi`
--

DROP TABLE IF EXISTS `trx_renstra_strategi`;
CREATE TABLE `trx_renstra_strategi` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_strategi_renstra` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `uraian_strategi_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_tujuan`
--

DROP TABLE IF EXISTS `trx_renstra_tujuan`;
CREATE TABLE `trx_renstra_tujuan` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_misi_renstra` int(11) NOT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_tujuan_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_tujuan_indikator`
--

DROP TABLE IF EXISTS `trx_renstra_tujuan_indikator`;
CREATE TABLE `trx_renstra_tujuan_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `id_indikator_tujuan_renstra` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_sasaran_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_renstra_visi`
--

DROP TABLE IF EXISTS `trx_renstra_visi`;
CREATE TABLE `trx_renstra_visi` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_renstra` int(11) NOT NULL DEFAULT '1',
  `id_visi_renstra` int(11) NOT NULL COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_unit` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `thn_awal_renstra` int(11) NOT NULL,
  `thn_akhir_renstra` int(11) NOT NULL,
  `uraian_visi_renstra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status_dokumen` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final`
--

DROP TABLE IF EXISTS `trx_rkpd_final`;
CREATE TABLE `trx_rkpd_final` (
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_forum_rkpdprog` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) DEFAULT NULL,
  `thn_id_rpjmd` int(11) DEFAULT NULL,
  `id_visi_rpjmd` int(11) DEFAULT NULL,
  `id_misi_rpjmd` int(11) DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) DEFAULT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_ranwal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_aktivitas_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_aktivitas_pd`;
CREATE TABLE `trx_rkpd_final_aktivitas_pd` (
  `id_aktivitas_pd` bigint(11) NOT NULL,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT '0',
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT '0',
  `id_aktivitas_renja` int(11) DEFAULT '0',
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_aktivitas_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_aktivitas_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_belanja_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_belanja_pd`;
CREATE TABLE `trx_rkpd_final_belanja_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT '0',
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT '0',
  `sumber_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '1',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT '1',
  `harga_satuan_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_dokumen`
--

DROP TABLE IF EXISTS `trx_rkpd_final_dokumen`;
CREATE TABLE `trx_rkpd_final_dokumen` (
  `id_dokumen_rkpd` int(11) NOT NULL,
  `nomor_rkpd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_perencana` int(11) DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_indikator`
--

DROP TABLE IF EXISTS `trx_rkpd_final_indikator`;
CREATE TABLE `trx_rkpd_final_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 data rpjmd 1 data baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_kebijakan`
--

DROP TABLE IF EXISTS `trx_rkpd_final_kebijakan`;
CREATE TABLE `trx_rkpd_final_kebijakan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_kebijakan_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_kebijakan_pd`;
CREATE TABLE `trx_rkpd_final_kebijakan_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_kegiatan_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_kegiatan_pd`;
CREATE TABLE `trx_rkpd_final_kegiatan_pd` (
  `id_kegiatan_pd` bigint(20) NOT NULL,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) DEFAULT NULL,
  `id_renja` int(11) DEFAULT '0',
  `id_rkpd_renstra` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `id_kegiatan_renstra` int(11) DEFAULT '0',
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_kegiatan_renstra` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_keg_indikator_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_keg_indikator_pd`;
CREATE TABLE `trx_rkpd_final_keg_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_lokasi_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_lokasi_pd`;
CREATE TABLE `trx_rkpd_final_lokasi_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT '0' COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) DEFAULT '0',
  `id_lokasi_teknis` int(11) DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `rt` int(11) DEFAULT '0',
  `rw` int(11) DEFAULT '0',
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_pelaksana`
--

DROP TABLE IF EXISTS `trx_rkpd_final_pelaksana`;
CREATE TABLE `trx_rkpd_final_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `hak_akses` int(11) NOT NULL DEFAULT '0' COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_pelaksana_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_pelaksana_pd`;
CREATE TABLE `trx_rkpd_final_pelaksana_pd` (
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) DEFAULT '0',
  `id_lokasi` int(11) DEFAULT '0' COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_program_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_program_pd`;
CREATE TABLE `trx_rkpd_final_program_pd` (
  `id_program_pd` bigint(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_forum_program` int(11) DEFAULT NULL,
  `id_renja_program` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_forum` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) NOT NULL DEFAULT '0',
  `checksum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_prog_indikator_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_final_prog_indikator_pd`;
CREATE TABLE `trx_rkpd_final_prog_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_final_urusan`
--

DROP TABLE IF EXISTS `trx_rkpd_final_urusan`;
CREATE TABLE `trx_rkpd_final_urusan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_identifikasi_masalah`
--

DROP TABLE IF EXISTS `trx_rkpd_identifikasi_masalah`;
CREATE TABLE `trx_rkpd_identifikasi_masalah` (
  `id_masalah` bigint(255) NOT NULL,
  `tahun_perencanaan` int(11) DEFAULT NULL,
  `id_indikator` bigint(255) NOT NULL,
  `interpretasi` int(11) NOT NULL COMMENT '0 = belum tercapai, 1= sesuai, 2= melampaui',
  `angka_target` decimal(20,2) DEFAULT NULL,
  `angka_capaian` decimal(20,2) DEFAULT NULL,
  `uraian_target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_capaian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_masalah` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_keberhasilan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan`;
CREATE TABLE `trx_rkpd_rancangan` (
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_forum_rkpdprog` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) DEFAULT NULL,
  `thn_id_rpjmd` int(11) DEFAULT NULL,
  `id_visi_rpjmd` int(11) DEFAULT NULL,
  `id_misi_rpjmd` int(11) DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) DEFAULT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_ranwal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_aktivitas_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_aktivitas_pd`;
CREATE TABLE `trx_rkpd_rancangan_aktivitas_pd` (
  `id_aktivitas_pd` bigint(11) NOT NULL,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT '0',
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT '0',
  `id_aktivitas_renja` int(11) DEFAULT '0',
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_aktivitas_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_aktivitas_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_belanja_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_belanja_pd`;
CREATE TABLE `trx_rkpd_rancangan_belanja_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT '0',
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT '0',
  `sumber_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '1',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT '1',
  `harga_satuan_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_dokumen`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_dokumen`;
CREATE TABLE `trx_rkpd_rancangan_dokumen` (
  `id_dokumen_rkpd` int(11) NOT NULL,
  `nomor_rkpd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_perencana` int(11) DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_indikator`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_indikator`;
CREATE TABLE `trx_rkpd_rancangan_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 data rpjmd 1 data baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_kebijakan`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_kebijakan`;
CREATE TABLE `trx_rkpd_rancangan_kebijakan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_kebijakan_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_kebijakan_pd`;
CREATE TABLE `trx_rkpd_rancangan_kebijakan_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_kegiatan_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_kegiatan_pd`;
CREATE TABLE `trx_rkpd_rancangan_kegiatan_pd` (
  `id_kegiatan_pd` bigint(20) NOT NULL,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) DEFAULT NULL,
  `id_renja` int(11) DEFAULT '0',
  `id_rkpd_renstra` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `id_kegiatan_renstra` int(11) DEFAULT '0',
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_kegiatan_renstra` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_keg_indikator_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_keg_indikator_pd`;
CREATE TABLE `trx_rkpd_rancangan_keg_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_lokasi_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_lokasi_pd`;
CREATE TABLE `trx_rkpd_rancangan_lokasi_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT '0' COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) DEFAULT '0',
  `id_lokasi_teknis` int(11) DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `rt` int(11) DEFAULT '0',
  `rw` int(11) DEFAULT '0',
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_pelaksana`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_pelaksana`;
CREATE TABLE `trx_rkpd_rancangan_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `hak_akses` int(11) NOT NULL DEFAULT '0' COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_pelaksana_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_pelaksana_pd`;
CREATE TABLE `trx_rkpd_rancangan_pelaksana_pd` (
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) DEFAULT '0',
  `id_lokasi` int(11) DEFAULT '0' COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_program_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_program_pd`;
CREATE TABLE `trx_rkpd_rancangan_program_pd` (
  `id_program_pd` bigint(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_forum_program` int(11) DEFAULT NULL,
  `id_renja_program` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_forum` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_prog_indikator_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_prog_indikator_pd`;
CREATE TABLE `trx_rkpd_rancangan_prog_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rancangan_urusan`
--

DROP TABLE IF EXISTS `trx_rkpd_rancangan_urusan`;
CREATE TABLE `trx_rkpd_rancangan_urusan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir`;
CREATE TABLE `trx_rkpd_ranhir` (
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL COMMENT '0 baru',
  `id_forum_rkpdprog` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru',
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) DEFAULT NULL,
  `thn_id_rpjmd` int(11) DEFAULT NULL,
  `id_visi_rpjmd` int(11) DEFAULT NULL,
  `id_misi_rpjmd` int(11) DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) DEFAULT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_ranwal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_aktivitas_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_aktivitas_pd`;
CREATE TABLE `trx_rkpd_ranhir_aktivitas_pd` (
  `id_aktivitas_pd` bigint(11) NOT NULL,
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `id_aktivitas_forum` int(11) NOT NULL DEFAULT '0',
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `sumber_aktivitas` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari ASB 1 Bukan ASB',
  `id_aktivitas_asb` int(11) DEFAULT '0',
  `id_aktivitas_renja` int(11) DEFAULT '0',
  `uraian_aktivitas_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `volume_aktivitas_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_forum_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_program_nasional` int(11) DEFAULT NULL,
  `id_program_provinsi` int(11) DEFAULT NULL,
  `jenis_kegiatan` int(11) NOT NULL DEFAULT '0' COMMENT '0 baru 1 lanjutan',
  `sumber_dana` int(11) NOT NULL DEFAULT '0',
  `pagu_aktivitas_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_aktivitas_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_musren` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 final',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_musren` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 = musrenbang',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renja 1 tambahan baru',
  `id_satuan_publik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_belanja_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_belanja_pd`;
CREATE TABLE `trx_rkpd_ranhir_belanja_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_belanja_pd` bigint(20) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_belanja_forum` int(11) NOT NULL DEFAULT '0',
  `id_zona_ssh` int(11) NOT NULL,
  `id_belanja_renja` int(11) NOT NULL DEFAULT '0',
  `sumber_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 asb 1 ssh',
  `id_aktivitas_asb` int(11) NOT NULL,
  `id_item_ssh` bigint(20) NOT NULL,
  `id_rekening_ssh` int(11) NOT NULL,
  `uraian_belanja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL,
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2` int(11) NOT NULL DEFAULT '1',
  `harga_satuan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1_forum` int(11) NOT NULL,
  `volume_2_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_2_forum` int(11) NOT NULL DEFAULT '1',
  `harga_satuan_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `jml_belanja_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status_data` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_dokumen`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_dokumen`;
CREATE TABLE `trx_rkpd_ranhir_dokumen` (
  `id_dokumen_rkpd` int(11) NOT NULL,
  `nomor_rkpd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_rkpd` date NOT NULL,
  `tahun_rkpd` int(11) NOT NULL COMMENT 'tahun perencanaan',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_perencana` int(11) DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_indikator`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_indikator`;
CREATE TABLE `trx_rkpd_ranhir_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 data rpjmd 1 data baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_kebijakan`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_kebijakan`;
CREATE TABLE `trx_rkpd_ranhir_kebijakan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_kebijakan_rancangan` int(11) NOT NULL,
  `id_kebijakan_rkpd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_kebijakan_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_kebijakan_pd`;
CREATE TABLE `trx_rkpd_ranhir_kebijakan_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `id_kebijakan_pd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_kegiatan_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_kegiatan_pd`;
CREATE TABLE `trx_rkpd_ranhir_kegiatan_pd` (
  `id_kegiatan_pd` bigint(20) NOT NULL,
  `id_program_pd` bigint(20) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_forum_skpd` int(11) DEFAULT NULL,
  `id_renja` int(11) DEFAULT '0',
  `id_rkpd_renstra` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `id_kegiatan_renstra` int(11) DEFAULT '0',
  `id_kegiatan_ref` int(11) NOT NULL,
  `uraian_kegiatan_forum` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_kegiatan_renstra` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_renja` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_plus1_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_forum` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = non musrenbang 1 =  musrenbang',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal dilaksanakan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 dari renja 1 baru tambahan',
  `kelompok_sasaran` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_keg_indikator_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_keg_indikator_pd`;
CREATE TABLE `trx_rkpd_ranhir_keg_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_kegiatan` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_kegiatan` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_lokasi_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_lokasi_pd`;
CREATE TABLE `trx_rkpd_ranhir_lokasi_pd` (
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_aktivitas_pd` bigint(20) NOT NULL,
  `id_lokasi_forum` int(11) NOT NULL DEFAULT '0' COMMENT '0',
  `id_lokasi_pd` bigint(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_lokasi_renja` int(11) DEFAULT '0',
  `id_lokasi_teknis` int(11) DEFAULT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `volume_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `volume_usulan_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_1` int(11) NOT NULL DEFAULT '0',
  `id_satuan_2` int(11) NOT NULL DEFAULT '0',
  `id_desa` int(11) DEFAULT '0',
  `id_kecamatan` int(11) DEFAULT '0',
  `rt` int(11) DEFAULT '0',
  `rw` int(11) DEFAULT '0',
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan 2 musrenbang 3 pokir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_pelaksana`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_pelaksana`;
CREATE TABLE `trx_rkpd_ranhir_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_pelaksana_rkpd` int(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `hak_akses` int(11) NOT NULL DEFAULT '0' COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_pelaksana_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_pelaksana_pd`;
CREATE TABLE `trx_rkpd_ranhir_pelaksana_pd` (
  `id_pelaksana_pd` bigint(20) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_kegiatan_pd` bigint(11) NOT NULL,
  `id_pelaksana_forum` int(11) DEFAULT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `id_pelaksana_renja` int(11) DEFAULT '0',
  `id_lokasi` int(11) DEFAULT '0' COMMENT 'lokasi penyelenggaraan',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 renja 1 tambahan',
  `ket_pelaksana` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 batal 2 baru',
  `status_data` int(11) NOT NULL COMMENT '0 draft 1 final'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_program_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_program_pd`;
CREATE TABLE `trx_rkpd_ranhir_program_pd` (
  `id_program_pd` bigint(11) NOT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `tahun_forum` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pdt 2 BTL',
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_forum_program` int(11) DEFAULT NULL,
  `id_renja_program` int(11) DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT '0',
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_ref` int(11) NOT NULL,
  `pagu_tahun_renstra` decimal(20,2) DEFAULT '0.00',
  `pagu_forum` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0',
  `ket_usulan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `id_dokumen` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_prog_indikator_pd`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_prog_indikator_pd`;
CREATE TABLE `trx_rkpd_ranhir_prog_indikator_pd` (
  `tahun_renja` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_pd` bigint(11) NOT NULL,
  `id_program_forum` int(11) NOT NULL DEFAULT '0',
  `id_program_renstra` int(11) DEFAULT NULL,
  `id_indikator_program` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) DEFAULT '0',
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_renstra` decimal(20,2) DEFAULT '0.00',
  `target_renja` decimal(20,2) DEFAULT '0.00',
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_ouput` int(255) DEFAULT NULL,
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 posting',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 Renstra 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranhir_urusan`
--

DROP TABLE IF EXISTS `trx_rkpd_ranhir_urusan`;
CREATE TABLE `trx_rkpd_ranhir_urusan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_rkpd_rancangan` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranwal`
--

DROP TABLE IF EXISTS `trx_rkpd_ranwal`;
CREATE TABLE `trx_rkpd_ranwal` (
  `id_rkpd_ranwal` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `jenis_belanja` int(11) NOT NULL DEFAULT '0' COMMENT '0 BL 1 Pendapatan 2 BTL',
  `id_rkpd_rpjmd` int(11) DEFAULT NULL,
  `thn_id_rpjmd` int(11) DEFAULT NULL,
  `id_visi_rpjmd` int(11) DEFAULT NULL,
  `id_misi_rpjmd` int(11) DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) DEFAULT NULL,
  `id_program_rpjmd` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_ranwal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_program` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelaksanaan` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd\\r\\n9 = dibatalkan pelaksanaanya\\r\\n8 = ditunda dilaksanakan\\r\\n',
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Draft 1 = Posting Renja 2 = Posting Musren',
  `ket_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = RPJMD 1 = Baru 2 = Luncuran tahun sebelumnya',
  `id_dokumen` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranwal_dokumen`
--

DROP TABLE IF EXISTS `trx_rkpd_ranwal_dokumen`;
CREATE TABLE `trx_rkpd_ranwal_dokumen` (
  `id_dokumen_ranwal` int(11) NOT NULL,
  `nomor_ranwal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ranwal` date NOT NULL,
  `tahun_ranwal` int(11) NOT NULL COMMENT 'tahun berlakuknya perkada',
  `uraian_perkada` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_perencana` int(11) DEFAULT NULL,
  `jabatan_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 draft 1 aktif 2 tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranwal_indikator`
--

DROP TABLE IF EXISTS `trx_rkpd_ranwal_indikator`;
CREATE TABLE `trx_rkpd_ranwal_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_indikator_program_rkpd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rkpd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `target_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `target_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `indikator_input` text CHARACTER SET latin1,
  `target_input` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan_input` int(255) DEFAULT NULL,
  `indikator_output` text CHARACTER SET latin1,
  `id_satuan_output` int(255) DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 data rpjmd 1 data baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranwal_kebijakan`
--

DROP TABLE IF EXISTS `trx_rkpd_ranwal_kebijakan`;
CREATE TABLE `trx_rkpd_ranwal_kebijakan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_kebijakan_ranwal` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranwal_pelaksana`
--

DROP TABLE IF EXISTS `trx_rkpd_ranwal_pelaksana`;
CREATE TABLE `trx_rkpd_ranwal_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_rpjmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_rkpd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `hak_akses` int(11) NOT NULL DEFAULT '0' COMMENT '0 tidak dapat menambah data 1 dapat menambah data',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru',
  `status_pelaksanaan` int(11) NOT NULL DEFAULT '0' COMMENT '0 dilaksanakan 1 dibatalkan',
  `ket_pelaksanaan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 belum direviu 1 sudah direviu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_ranwal_urusan`
--

DROP TABLE IF EXISTS `trx_rkpd_ranwal_urusan`;
CREATE TABLE `trx_rkpd_ranwal_urusan` (
  `tahun_rkpd` int(11) NOT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_rkpd_ranwal` int(11) NOT NULL,
  `id_urusan_rkpd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 rpjmd 1 baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_renstra`
--

DROP TABLE IF EXISTS `trx_rkpd_renstra`;
CREATE TABLE `trx_rkpd_renstra` (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_renstra` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `pagu_tahun_rpjmd` decimal(20,2) DEFAULT '0.00',
  `id_unit` int(11) NOT NULL,
  `id_visi_renstra` int(11) NOT NULL,
  `uraian_visi_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_misi_renstra` int(11) NOT NULL,
  `uraian_misi_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tujuan_renstra` int(11) NOT NULL,
  `uraian_tujuan_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sasaran_renstra` int(11) NOT NULL,
  `uraian_sasaran_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_renstra` int(11) NOT NULL,
  `uraian_program_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_program` decimal(20,2) DEFAULT '0.00',
  `id_kegiatan_renstra` int(11) NOT NULL,
  `uraian_kegiatan_renstra` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun_kegiatan` decimal(20,2) DEFAULT '0.00',
  `sumber_data` int(11) NOT NULL DEFAULT '0' COMMENT '0 = renstra 1 = insidentil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_renstra_indikator`
--

DROP TABLE IF EXISTS `trx_rkpd_renstra_indikator`;
CREATE TABLE `trx_rkpd_renstra_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_renstra` int(11) NOT NULL,
  `id_indikator_renstra` int(11) NOT NULL,
  `kd_indikator` int(11) DEFAULT NULL,
  `uraian_indikator_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolokukur_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_output` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_renstra_pelaksana`
--

DROP TABLE IF EXISTS `trx_rkpd_renstra_pelaksana`;
CREATE TABLE `trx_rkpd_renstra_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_renstra` int(11) NOT NULL,
  `id_pelaksana_renstra` int(11) NOT NULL,
  `id_sub_unit` int(11) NOT NULL,
  `pagu_tahun` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rpjmd_kebijakan`
--

DROP TABLE IF EXISTS `trx_rkpd_rpjmd_kebijakan`;
CREATE TABLE `trx_rkpd_rpjmd_kebijakan` (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_kebijakan_rpjmd` int(11) NOT NULL,
  `uraian_kebijakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rpjmd_program_indikator`
--

DROP TABLE IF EXISTS `trx_rkpd_rpjmd_program_indikator`;
CREATE TABLE `trx_rkpd_rpjmd_program_indikator` (
  `tahun_rkpd` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_indikator_program_rpjmd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `uraian_indikator_program_rpjmd` text CHARACTER SET latin1,
  `tolok_ukur_indikator` text CHARACTER SET latin1,
  `angka_tahun` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rpjmd_program_pelaksana`
--

DROP TABLE IF EXISTS `trx_rkpd_rpjmd_program_pelaksana`;
CREATE TABLE `trx_rkpd_rpjmd_program_pelaksana` (
  `tahun_rkpd` int(11) NOT NULL,
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `pagu_tahun` decimal(20,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rkpd_rpjmd_ranwal`
--

DROP TABLE IF EXISTS `trx_rkpd_rpjmd_ranwal`;
CREATE TABLE `trx_rkpd_rpjmd_ranwal` (
  `id_rkpd_rpjmd` int(11) NOT NULL,
  `tahun_rkpd` int(11) NOT NULL,
  `thn_id_rpjmd` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL,
  `uraian_visi_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_misi_rpjmd` int(11) NOT NULL,
  `uraian_misi_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `uraian_tujuan_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `uraian_sasaran_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_program_rpjmd` decimal(20,2) DEFAULT '0.00',
  `status_data` int(11) NOT NULL COMMENT '0 = data tepat waktu sesuai renstra/rpjmd\\r\\n1 = data pergeseran waktu renstra/rpjmd\\r\\n2 = data baru yang belum ada di renstra/rpjmd'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_analisa_ikk`
--

DROP TABLE IF EXISTS `trx_rpjmd_analisa_ikk`;
CREATE TABLE `trx_rpjmd_analisa_ikk` (
  `id_capaian_rpjmd` int(11) NOT NULL,
  `id_pemda` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `capaian_min1` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `capaian_min2` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `capaian_min3` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `capaian_min4` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `capaian_min5` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `capaian_standard` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `interpretasi` int(11) NOT NULL DEFAULT '0' COMMENT '0 = belum tercapai, 1= sesuai, 2= melampaui',
  `keterangan_capaian` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_dokumen`
--

DROP TABLE IF EXISTS `trx_rpjmd_dokumen`;
CREATE TABLE `trx_rpjmd_dokumen` (
  `id_rpjmd` int(11) NOT NULL COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_pemda` int(11) NOT NULL DEFAULT '1',
  `id_rpjmd_old` int(11) NOT NULL DEFAULT '1',
  `id_rpjmd_ref` int(11) NOT NULL DEFAULT '-1',
  `thn_dasar` int(11) NOT NULL,
  `tahun_1` int(11) NOT NULL,
  `tahun_2` int(11) NOT NULL,
  `tahun_3` int(11) NOT NULL,
  `tahun_4` int(11) NOT NULL,
  `tahun_5` int(11) NOT NULL,
  `no_perda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_perda` date DEFAULT NULL,
  `keterangan_dokumen` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jns_dokumen` int(11) NOT NULL DEFAULT '5',
  `id_revisi` int(11) NOT NULL DEFAULT '0',
  `id_status_dokumen` int(11) NOT NULL DEFAULT '1' COMMENT '0 = draft , 1 = aktif  2 = direvisi',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_identifikasi_masalah`
--

DROP TABLE IF EXISTS `trx_rpjmd_identifikasi_masalah`;
CREATE TABLE `trx_rpjmd_identifikasi_masalah` (
  `id_masalah` bigint(255) NOT NULL,
  `id_pemda` int(11) DEFAULT NULL,
  `id_indikator` bigint(255) NOT NULL,
  `interpretasi` int(11) NOT NULL COMMENT '0 = belum tercapai, 1= sesuai, 2= melampaui',
  `angka_target` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `angka_capaian` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `uraian_masalah` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_keberhasilan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_kebijakan`
--

DROP TABLE IF EXISTS `trx_rpjmd_kebijakan`;
CREATE TABLE `trx_rpjmd_kebijakan` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_sasaran_old` int(11) NOT NULL DEFAULT '0',
  `id_kebijakan_rpjmd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_kebijakan_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL,
  `uraian_kebijakan_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kebijakan` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_misi`
--

DROP TABLE IF EXISTS `trx_rpjmd_misi`;
CREATE TABLE `trx_rpjmd_misi` (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL,
  `id_visi_old` int(11) NOT NULL DEFAULT '0',
  `id_misi_rpjmd` int(11) NOT NULL,
  `id_misi_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL,
  `uraian_misi_rpjmd` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_prioritas`
--

DROP TABLE IF EXISTS `trx_rpjmd_prioritas`;
CREATE TABLE `trx_rpjmd_prioritas` (
  `id_masalah` int(11) NOT NULL,
  `id_pemda` int(11) NOT NULL DEFAULT '1',
  `uraian_masalah` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faktor_keberhasilan` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkatan_masalah` int(11) NOT NULL DEFAULT '4' COMMENT '1=Internasional, 2=Nasional, 3=Provinsi, 4=Kab/Kota',
  `skor_prioritas` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `urutan_prioritas` int(11) NOT NULL DEFAULT '1',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_program`
--

DROP TABLE IF EXISTS `trx_rpjmd_program`;
CREATE TABLE `trx_rpjmd_program` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_sasaran_old` int(11) NOT NULL DEFAULT '0',
  `id_program_rpjmd` int(11) NOT NULL,
  `id_program_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) DEFAULT NULL,
  `uraian_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagu_tahun1` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun2` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun3` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun4` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun5` decimal(20,2) DEFAULT '0.00',
  `total_pagu` decimal(20,2) DEFAULT '0.00',
  `status_program` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_program_indikator`
--

DROP TABLE IF EXISTS `trx_rpjmd_program_indikator`;
CREATE TABLE `trx_rpjmd_program_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_program_rpjmd` int(11) NOT NULL,
  `id_program_old` int(11) NOT NULL DEFAULT '0',
  `id_indikator_program_rpjmd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rpjmd_old` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_indikator_old` int(11) NOT NULL,
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL DEFAULT '0',
  `id_indikator_sasaran_old` int(11) NOT NULL DEFAULT '0',
  `uraian_indikator_program_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_indikator` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_program_pelaksana`
--

DROP TABLE IF EXISTS `trx_rpjmd_program_pelaksana`;
CREATE TABLE `trx_rpjmd_program_pelaksana` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL,
  `id_urbid_old` int(11) NOT NULL DEFAULT '0',
  `id_pelaksana_rpjmd` int(11) NOT NULL,
  `id_pelaksana_old` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) NOT NULL,
  `id_unit_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `pagu_tahun1` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun2` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun3` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun4` decimal(20,2) DEFAULT '0.00',
  `pagu_tahun5` decimal(20,2) DEFAULT '0.00',
  `status_pelaksana` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_program_urusan`
--

DROP TABLE IF EXISTS `trx_rpjmd_program_urusan`;
CREATE TABLE `trx_rpjmd_program_urusan` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_urbid_rpjmd` int(11) NOT NULL,
  `id_urbid_old` int(11) NOT NULL DEFAULT '0',
  `id_program_rpjmd` int(11) NOT NULL,
  `id_program_old` int(11) NOT NULL DEFAULT '0',
  `id_bidang` int(11) NOT NULL,
  `id_bidang_old` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_sasaran`
--

DROP TABLE IF EXISTS `trx_rpjmd_sasaran`;
CREATE TABLE `trx_rpjmd_sasaran` (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_tujuan_old` int(11) NOT NULL DEFAULT '0',
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_sasaran_old` int(11) NOT NULL,
  `id_perubahan` int(11) NOT NULL,
  `uraian_sasaran_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_sasaran` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_sasaran_indikator`
--

DROP TABLE IF EXISTS `trx_rpjmd_sasaran_indikator`;
CREATE TABLE `trx_rpjmd_sasaran_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_sasaran_old` int(11) NOT NULL DEFAULT '0',
  `id_indikator_sasaran_rpjmd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rpjmd_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `kd_indikator_old` int(11) NOT NULL DEFAULT '0',
  `uraian_indikator_sasaran_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_indikator` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_strategi`
--

DROP TABLE IF EXISTS `trx_rpjmd_strategi`;
CREATE TABLE `trx_rpjmd_strategi` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_sasaran_rpjmd` int(11) NOT NULL,
  `id_sasaran_old` int(11) NOT NULL DEFAULT '0',
  `id_strategi_rpjmd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_strategi_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL,
  `uraian_strategi_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_strategi` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_tujuan`
--

DROP TABLE IF EXISTS `trx_rpjmd_tujuan`;
CREATE TABLE `trx_rpjmd_tujuan` (
  `thn_id_rpjmd` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_misi_rpjmd` int(11) NOT NULL,
  `id_misi_old` int(11) NOT NULL DEFAULT '0',
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_tujuan_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL,
  `uraian_tujuan_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_tujuan` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_tujuan_indikator`
--

DROP TABLE IF EXISTS `trx_rpjmd_tujuan_indikator`;
CREATE TABLE `trx_rpjmd_tujuan_indikator` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_tujuan_rpjmd` int(11) NOT NULL,
  `id_tujuan_old` int(11) NOT NULL DEFAULT '0',
  `id_indikator_tujuan_rpjmd` int(11) NOT NULL COMMENT 'nomor urut indikator sasaran',
  `id_indikator_rpjmd_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL,
  `kd_indikator` int(11) NOT NULL,
  `kd_indikator_old` int(11) NOT NULL DEFAULT '0',
  `uraian_indikator_sasaran_rpjmd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tolok_ukur_indikator` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angka_awal_periode` decimal(20,2) DEFAULT '0.00',
  `angka_tahun1` decimal(20,2) DEFAULT '0.00',
  `angka_tahun2` decimal(20,2) DEFAULT '0.00',
  `angka_tahun3` decimal(20,2) DEFAULT '0.00',
  `angka_tahun4` decimal(20,2) DEFAULT '0.00',
  `angka_tahun5` decimal(20,2) DEFAULT '0.00',
  `angka_akhir_periode` decimal(20,2) DEFAULT '0.00',
  `status_indikator` int(11) NOT NULL DEFAULT '0',
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_rpjmd_visi`
--

DROP TABLE IF EXISTS `trx_rpjmd_visi`;
CREATE TABLE `trx_rpjmd_visi` (
  `thn_id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `id_visi_rpjmd` int(11) NOT NULL COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama',
  `id_visi_old` int(11) NOT NULL DEFAULT '0',
  `id_perubahan` int(11) NOT NULL DEFAULT '0',
  `uraian_visi_rpjmd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_data` int(11) NOT NULL DEFAULT '0',
  `sumber_data` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `trx_usulan_kab`
--

DROP TABLE IF EXISTS `trx_usulan_kab`;
CREATE TABLE `trx_usulan_kab` (
  `id_usulan_kab` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '0',
  `sumber_usulan` int(11) NOT NULL DEFAULT '0',
  `judul_usulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian_usulan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` decimal(20,2) NOT NULL DEFAULT '0.00',
  `id_satuan` int(11) DEFAULT NULL,
  `pagu` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_by` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_usulan_kab_lokasi`
--

DROP TABLE IF EXISTS `trx_usulan_kab_lokasi`;
CREATE TABLE `trx_usulan_kab_lokasi` (
  `id_usulan_kab` int(11) NOT NULL,
  `id_usulan_kab_lokasi` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL DEFAULT '1',
  `id_lokasi` int(11) NOT NULL,
  `volume` decimal(20,2) DEFAULT '0.00',
  `id_satuan` int(11) DEFAULT NULL,
  `uraian_lokasi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trx_usulan_rw`
--

DROP TABLE IF EXISTS `trx_usulan_rw`;
CREATE TABLE `trx_usulan_rw` (
  `id_usulan_rw` bigint(20) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `id_renja` bigint(20) NOT NULL,
  `id_asb_aktivitas` bigint(20) NOT NULL,
  `uraian_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_aktivitas` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pagu_aktivitas` decimal(20,2) NOT NULL DEFAULT '0.00',
  `keterangan_aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_usulan` int(11) NOT NULL COMMENT '0 = draft 1 = musrendes 2 = setuju musrendes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL COMMENT 'Diisi dengan kode unit asal operator',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` int(11) NOT NULL DEFAULT '1' COMMENT '0 non aktif 1 aktif',
  `status_waktu` int(11) NOT NULL DEFAULT '0' COMMENT '0 unlimited 1 limited',
  `tgl_mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_akhir` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `id_unit`, `password`, `remember_token`, `status_user`, `status_waktu`, `tgl_mulai`, `tgl_akhir`, `created_at`, `updated_at`) VALUES
(1, 2, 'administrator', 'admin@bpkp.go.id', NULL, '$2y$10$jR4xkjKFcnS9RSwkKz0odef0Qu7wsqb4YYnx16ElnCC72eXcLvRYy', 'tN3kZXlybTOvM1Gg3aUC9AgfX5tw5kSoIJKDvUW0rnEytn3vr64KvyVn98zF', 1, 0, '0000-00-00 00:00:00', '2019-10-01 11:04:44', '2017-04-06 23:30:42', '2019-10-07 08:55:09'),
(2, 1, 'superAdmin@simcan.dev', 'super@simcan.dev', NULL, '$2y$10$tZIfh.n2Fw9bO.0dMvA/nOr6oNA7gdmg8aU9gHylOS79z2RfCc10W', 'kW6NbEcIIcCmWo7VLM0ui13Nv8NoyAilB5yLypQ7xHeED4IDCKPBGCqfHJSC', 1, 0, '0000-00-00 00:00:00', '2019-10-01 11:04:44', '2017-10-08 18:02:03', '2019-09-25 08:43:04');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `trg_user`;
DELIMITER $$
CREATE TRIGGER `trg_user` BEFORE DELETE ON `users` FOR EACH ROW IF old.email = 'super@simcan.dev' THEN 
    SIGNAL SQLSTATE '45000' 
     SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_app`
--

DROP TABLE IF EXISTS `user_app`;
CREATE TABLE `user_app` (
  `id_app_user` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL,
  `app_id` int(11) NOT NULL COMMENT '0',
  `status_app` int(11) NOT NULL COMMENT '1',
  `status_waktu` int(11) NOT NULL DEFAULT '0',
  `tgl_mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_akhir` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `user_desa`
--

DROP TABLE IF EXISTS `user_desa`;
CREATE TABLE `user_desa` (
  `id_user_wil` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `kd_kecamatan` int(11) NOT NULL COMMENT 'prov',
  `kd_desa` int(11) NOT NULL COMMENT 'kab/kota',
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_wil` int(11) NOT NULL DEFAULT '0',
  `status_waktu` int(11) NOT NULL DEFAULT '0',
  `tgl_mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_akhir` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user_level_sakip`
--

DROP TABLE IF EXISTS `user_level_sakip`;
CREATE TABLE `user_level_sakip` (
  `id_user_level` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `id_sotk_level_1` int(11) NOT NULL,
  `id_sotk_level_2` int(11) DEFAULT NULL,
  `id_sotk_level_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_unit`
--

DROP TABLE IF EXISTS `user_sub_unit`;
CREATE TABLE `user_sub_unit` (
  `id_user_unit` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `kd_unit` int(11) NOT NULL,
  `kd_sub` int(11) DEFAULT NULL,
  `status_unit` int(11) NOT NULL DEFAULT '0',
  `status_waktu` int(11) NOT NULL DEFAULT '0',
  `tgl_mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_akhir` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kin_trx_cascading_indikator_kegiatan_pd`
--
ALTER TABLE `kin_trx_cascading_indikator_kegiatan_pd`
  ADD PRIMARY KEY (`id_indikator_kegiatan_pd`) USING BTREE,
  ADD KEY `FK_kin_trx_cascading_indikator_program_pd_1` (`id_hasil_kegiatan`) USING BTREE;

--
-- Indexes for table `kin_trx_cascading_indikator_program_pd`
--
ALTER TABLE `kin_trx_cascading_indikator_program_pd`
  ADD PRIMARY KEY (`id_indikator_program_pd`) USING BTREE,
  ADD UNIQUE KEY `FK_kin_trx_cascading_indikator_program_pd_1` (`id_hasil_program`) USING BTREE;

--
-- Indexes for table `kin_trx_cascading_kegiatan_opd`
--
ALTER TABLE `kin_trx_cascading_kegiatan_opd`
  ADD PRIMARY KEY (`id_hasil_kegiatan`) USING BTREE,
  ADD KEY `FK_kin_trx_cascading_kegiatan_opd_kin_trx_cascading_program_opd` (`id_hasil_program`) USING BTREE;

--
-- Indexes for table `kin_trx_cascading_program_opd`
--
ALTER TABLE `kin_trx_cascading_program_opd`
  ADD PRIMARY KEY (`id_hasil_program`) USING BTREE,
  ADD UNIQUE KEY `tahun` (`tahun`,`id_unit`,`id_renstra_sasaran`,`id_renstra_program`);

--
-- Indexes for table `kin_trx_iku_opd_dok`
--
ALTER TABLE `kin_trx_iku_opd_dok`
  ADD PRIMARY KEY (`id_dokumen`) USING BTREE;

--
-- Indexes for table `kin_trx_iku_opd_kegiatan`
--
ALTER TABLE `kin_trx_iku_opd_kegiatan`
  ADD PRIMARY KEY (`id_iku_opd_kegiatan`) USING BTREE,
  ADD KEY `id_dokumen` (`id_iku_opd_program`) USING BTREE;

--
-- Indexes for table `kin_trx_iku_opd_program`
--
ALTER TABLE `kin_trx_iku_opd_program`
  ADD PRIMARY KEY (`id_iku_opd_program`) USING BTREE,
  ADD KEY `id_dokumen` (`id_iku_opd_sasaran`) USING BTREE;

--
-- Indexes for table `kin_trx_iku_opd_sasaran`
--
ALTER TABLE `kin_trx_iku_opd_sasaran`
  ADD PRIMARY KEY (`id_iku_opd_sasaran`) USING BTREE,
  ADD KEY `id_dokumen` (`id_dokumen`) USING BTREE;

--
-- Indexes for table `kin_trx_iku_pemda_dok`
--
ALTER TABLE `kin_trx_iku_pemda_dok`
  ADD PRIMARY KEY (`id_dokumen`) USING BTREE;

--
-- Indexes for table `kin_trx_iku_pemda_rinci`
--
ALTER TABLE `kin_trx_iku_pemda_rinci`
  ADD PRIMARY KEY (`id_iku_pemda`) USING BTREE,
  ADD KEY `id_dokumen` (`id_dokumen`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es3_dok`
--
ALTER TABLE `kin_trx_perkin_es3_dok`
  ADD PRIMARY KEY (`id_dokumen_perkin`) USING BTREE,
  ADD KEY `id_unit` (`id_sotk_es3`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es3_kegiatan`
--
ALTER TABLE `kin_trx_perkin_es3_kegiatan`
  ADD PRIMARY KEY (`id_perkin_kegiatan`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_program`) USING BTREE,
  ADD KEY `id_program` (`id_kegiatan_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es3_program`
--
ALTER TABLE `kin_trx_perkin_es3_program`
  ADD PRIMARY KEY (`id_perkin_program`) USING BTREE,
  ADD KEY `id_program` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_perkin`) USING BTREE,
  ADD KEY `id_perkin_program_opd` (`id_perkin_program_opd`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es3_program_indikator`
--
ALTER TABLE `kin_trx_perkin_es3_program_indikator`
  ADD PRIMARY KEY (`id_perkin_indikator`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_program`) USING BTREE,
  ADD KEY `id_program` (`id_indikator_program_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es4_dok`
--
ALTER TABLE `kin_trx_perkin_es4_dok`
  ADD PRIMARY KEY (`id_dokumen_perkin`) USING BTREE,
  ADD KEY `id_unit` (`id_sotk_es4`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es4_kegiatan`
--
ALTER TABLE `kin_trx_perkin_es4_kegiatan`
  ADD PRIMARY KEY (`id_perkin_kegiatan`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_kegiatan_es3`) USING BTREE,
  ADD KEY `id_program` (`id_kegiatan_renstra`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_perkin`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_es4_kegiatan_indikator`
--
ALTER TABLE `kin_trx_perkin_es4_kegiatan_indikator`
  ADD PRIMARY KEY (`id_perkin_indikator`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_kegiatan`) USING BTREE,
  ADD KEY `id_program` (`id_indikator_kegiatan_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_opd_dok`
--
ALTER TABLE `kin_trx_perkin_opd_dok`
  ADD PRIMARY KEY (`id_dokumen_perkin`) USING BTREE,
  ADD KEY `id_unit` (`id_sotk_es2`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_opd_program`
--
ALTER TABLE `kin_trx_perkin_opd_program`
  ADD PRIMARY KEY (`id_perkin_program`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_sasaran`) USING BTREE,
  ADD KEY `id_program` (`id_program_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_opd_program_indikator`
--
ALTER TABLE `kin_trx_perkin_opd_program_indikator`
  ADD PRIMARY KEY (`id_perkin_indikator`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_opd_program_pelaksana`
--
ALTER TABLE `kin_trx_perkin_opd_program_pelaksana`
  ADD PRIMARY KEY (`id_perkin_pelaksana`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_opd_sasaran`
--
ALTER TABLE `kin_trx_perkin_opd_sasaran`
  ADD PRIMARY KEY (`id_perkin_sasaran`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_dokumen_perkin`) USING BTREE,
  ADD KEY `id_program` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_perkin_opd_sasaran_indikator`
--
ALTER TABLE `kin_trx_perkin_opd_sasaran_indikator`
  ADD PRIMARY KEY (`id_perkin_indikator`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_sasaran`) USING BTREE,
  ADD KEY `id_program` (`id_indikator_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es2_dok`
--
ALTER TABLE `kin_trx_real_es2_dok`
  ADD PRIMARY KEY (`id_dokumen_real`) USING BTREE,
  ADD KEY `id_unit` (`id_sotk_es2`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_perkin`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es2_program`
--
ALTER TABLE `kin_trx_real_es2_program`
  ADD PRIMARY KEY (`id_real_program`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_program`) USING BTREE,
  ADD KEY `id_program` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_real_sasaran`) USING BTREE,
  ADD KEY `id_real_program_es3` (`id_real_program_es3`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es2_sasaran`
--
ALTER TABLE `kin_trx_real_es2_sasaran`
  ADD PRIMARY KEY (`id_real_sasaran`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_dokumen_real`) USING BTREE,
  ADD KEY `id_program` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es2_sasaran_indikator`
--
ALTER TABLE `kin_trx_real_es2_sasaran_indikator`
  ADD PRIMARY KEY (`id_real_indikator`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_real_sasaran`) USING BTREE,
  ADD KEY `id_program` (`id_indikator_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es3_dok`
--
ALTER TABLE `kin_trx_real_es3_dok`
  ADD PRIMARY KEY (`id_dokumen_real`) USING BTREE,
  ADD KEY `id_unit` (`id_sotk_es3`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_perkin`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es3_kegiatan`
--
ALTER TABLE `kin_trx_real_es3_kegiatan`
  ADD PRIMARY KEY (`id_real_kegiatan`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_kegiatan`) USING BTREE,
  ADD KEY `id_program` (`id_kegiatan_renstra`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_real_program`) USING BTREE,
  ADD KEY `id_real_kegiatan_es4` (`id_real_kegiatan_es4`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es3_program`
--
ALTER TABLE `kin_trx_real_es3_program`
  ADD PRIMARY KEY (`id_real_program`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_program`) USING BTREE,
  ADD KEY `id_program` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_real`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es3_program_indikator`
--
ALTER TABLE `kin_trx_real_es3_program_indikator`
  ADD PRIMARY KEY (`id_real_indikator`) USING BTREE,
  ADD KEY `id_program` (`id_indikator_program_renstra`) USING BTREE,
  ADD KEY `id_real_program` (`id_real_program`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es4_dok`
--
ALTER TABLE `kin_trx_real_es4_dok`
  ADD PRIMARY KEY (`id_dokumen_real`) USING BTREE,
  ADD KEY `id_unit` (`id_sotk_es4`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_perkin`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es4_kegiatan`
--
ALTER TABLE `kin_trx_real_es4_kegiatan`
  ADD PRIMARY KEY (`id_real_kegiatan`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_perkin_kegiatan`) USING BTREE,
  ADD KEY `id_program` (`id_kegiatan_renstra`) USING BTREE,
  ADD KEY `id_dokumen_perkin` (`id_dokumen_real`) USING BTREE;

--
-- Indexes for table `kin_trx_real_es4_kegiatan_indikator`
--
ALTER TABLE `kin_trx_real_es4_kegiatan_indikator`
  ADD PRIMARY KEY (`id_real_indikator`) USING BTREE,
  ADD KEY `id_sasaran_kinerja_skpd` (`id_real_kegiatan`) USING BTREE,
  ADD KEY `id_program` (`id_indikator_kegiatan_renstra`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ref_api_manajemen`
--
ALTER TABLE `ref_api_manajemen`
  ADD PRIMARY KEY (`id_setting`),
  ADD UNIQUE KEY `id_app` (`id_app`);

--
-- Indexes for table `ref_aspek_pembangunan`
--
ALTER TABLE `ref_aspek_pembangunan`
  ADD PRIMARY KEY (`id_aspek`) USING BTREE;

--
-- Indexes for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  ADD PRIMARY KEY (`id_bidang`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_bidang` (`kd_urusan`,`kd_bidang`) USING BTREE,
  ADD KEY `fk_ref_fungsi` (`kd_fungsi`) USING BTREE;

--
-- Indexes for table `ref_data_sub_unit`
--
ALTER TABLE `ref_data_sub_unit`
  ADD PRIMARY KEY (`id_rincian_unit`) USING BTREE,
  ADD UNIQUE KEY `tahun` (`tahun`,`id_sub_unit`) USING BTREE,
  ADD KEY `id_sub_unit` (`id_sub_unit`) USING BTREE;

--
-- Indexes for table `ref_desa`
--
ALTER TABLE `ref_desa`
  ADD PRIMARY KEY (`id_desa`) USING BTREE,
  ADD UNIQUE KEY `id_kecamatan` (`id_kecamatan`,`kd_desa`) USING BTREE;

--
-- Indexes for table `ref_dokumen`
--
ALTER TABLE `ref_dokumen`
  ADD PRIMARY KEY (`id_dokumen`) USING BTREE;

--
-- Indexes for table `ref_fungsi`
--
ALTER TABLE `ref_fungsi`
  ADD PRIMARY KEY (`kd_fungsi`) USING BTREE;

--
-- Indexes for table `ref_group`
--
ALTER TABLE `ref_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ref_indikator`
--
ALTER TABLE `ref_indikator`
  ADD PRIMARY KEY (`id_indikator`) USING BTREE;
ALTER TABLE `ref_indikator` ADD FULLTEXT KEY `nm_indikator` (`nm_indikator`);

--
-- Indexes for table `ref_jadwal`
--
ALTER TABLE `ref_jadwal`
  ADD PRIMARY KEY (`id_proses`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_jadwal` (`tahun`,`id_langkah`,`jenis_proses`) USING BTREE;

--
-- Indexes for table `ref_jenis_lokasi`
--
ALTER TABLE `ref_jenis_lokasi`
  ADD PRIMARY KEY (`id_jenis`) USING BTREE,
  ADD UNIQUE KEY `id_jenis` (`id_jenis`) USING BTREE;

--
-- Indexes for table `ref_kabupaten`
--
ALTER TABLE `ref_kabupaten`
  ADD PRIMARY KEY (`id_kab`) USING BTREE,
  ADD UNIQUE KEY `id_pemda` (`id_pemda`,`id_prov`,`id_kab`) USING BTREE;

--
-- Indexes for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE,
  ADD UNIQUE KEY `id_kecamatan` (`id_pemda`,`kd_kecamatan`) USING BTREE;

--
-- Indexes for table `ref_kegiatan`
--
ALTER TABLE `ref_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_kegiatan` (`id_program`,`kd_kegiatan`) USING BTREE;

--
-- Indexes for table `ref_kolom_tabel_dasar`
--
ALTER TABLE `ref_kolom_tabel_dasar`
  ADD PRIMARY KEY (`id_kolom_tabel_dasar`) USING BTREE,
  ADD KEY `parent_id` (`parent_id`) USING BTREE,
  ADD KEY `id_tabel_dasar` (`id_tabel_dasar`) USING BTREE;

--
-- Indexes for table `ref_langkah`
--
ALTER TABLE `ref_langkah`
  ADD PRIMARY KEY (`id_langkah`,`jenis_dokumen`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_step` (`id_langkah`) USING BTREE;

--
-- Indexes for table `ref_laporan`
--
ALTER TABLE `ref_laporan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_modul` (`id_modul`,`id_dokumen`,`jns_laporan`,`id_laporan`);

--
-- Indexes for table `ref_log_akses`
--
ALTER TABLE `ref_log_akses`
  ADD PRIMARY KEY (`id_log`) USING BTREE;

--
-- Indexes for table `ref_lokasi`
--
ALTER TABLE `ref_lokasi`
  ADD PRIMARY KEY (`id_lokasi`) USING BTREE,
  ADD UNIQUE KEY `jenis_lokasi` (`jenis_lokasi`,`nama_lokasi`,`id_desa`) USING BTREE;

--
-- Indexes for table `ref_mapping_asb_renstra`
--
ALTER TABLE `ref_mapping_asb_renstra`
  ADD KEY `idx_ref_mapping_asb_renstra` (`id_aktivitas_asb`,`id_kegiatan_renstra`) USING BTREE,
  ADD KEY `fk_ref_mapping_asb_renstra1` (`id_kegiatan_renstra`) USING BTREE;

--
-- Indexes for table `ref_menu`
--
ALTER TABLE `ref_menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE,
  ADD UNIQUE KEY `menu` (`menu`,`group_id`) USING BTREE,
  ADD KEY `akses` (`akses`) USING BTREE;

--
-- Indexes for table `ref_pangkat_golongan`
--
ALTER TABLE `ref_pangkat_golongan`
  ADD PRIMARY KEY (`id_pangkat_pns`),
  ADD UNIQUE KEY `pangkat` (`pangkat`,`golongan`);

--
-- Indexes for table `ref_pegawai`
--
ALTER TABLE `ref_pegawai`
  ADD PRIMARY KEY (`id_pegawai`) USING BTREE,
  ADD UNIQUE KEY `nip_pegawai` (`nip_pegawai`) USING BTREE;

--
-- Indexes for table `ref_pegawai_pangkat`
--
ALTER TABLE `ref_pegawai_pangkat`
  ADD PRIMARY KEY (`id_pangkat`) USING BTREE,
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`,`pangkat_pegawai`) USING BTREE;

--
-- Indexes for table `ref_pegawai_unit`
--
ALTER TABLE `ref_pegawai_unit`
  ADD PRIMARY KEY (`id_unit_pegawai`) USING BTREE,
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`,`id_unit`,`tingkat_eselon`,`id_sotk`) USING BTREE,
  ADD KEY `id_unit` (`id_unit`) USING BTREE;

--
-- Indexes for table `ref_pembatalan`
--
ALTER TABLE `ref_pembatalan`
  ADD PRIMARY KEY (`id_batal`) USING BTREE;

--
-- Indexes for table `ref_pemda`
--
ALTER TABLE `ref_pemda`
  ADD PRIMARY KEY (`id_pemda`) USING BTREE,
  ADD UNIQUE KEY `kd_prov` (`kd_prov`,`kd_kab`) USING BTREE,
  ADD UNIQUE KEY `id_pemda` (`id_pemda`) USING BTREE,
  ADD UNIQUE KEY `checksum` (`checksum`);

--
-- Indexes for table `ref_pengusul`
--
ALTER TABLE `ref_pengusul`
  ADD PRIMARY KEY (`id_pengusul`) USING BTREE;

--
-- Indexes for table `ref_program`
--
ALTER TABLE `ref_program`
  ADD PRIMARY KEY (`id_program`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_program` (`id_bidang`,`kd_program`) USING BTREE;

--
-- Indexes for table `ref_rek_1`
--
ALTER TABLE `ref_rek_1`
  ADD PRIMARY KEY (`kd_rek_1`) USING BTREE;

--
-- Indexes for table `ref_rek_2`
--
ALTER TABLE `ref_rek_2`
  ADD PRIMARY KEY (`kd_rek_1`,`kd_rek_2`) USING BTREE,
  ADD UNIQUE KEY `kd_rek_1` (`kd_rek_1`,`kd_rek_2`) USING BTREE;

--
-- Indexes for table `ref_rek_3`
--
ALTER TABLE `ref_rek_3`
  ADD PRIMARY KEY (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`) USING BTREE,
  ADD KEY `kd_rek_1` (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`) USING BTREE;

--
-- Indexes for table `ref_rek_4`
--
ALTER TABLE `ref_rek_4`
  ADD PRIMARY KEY (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`,`kd_rek_4`) USING BTREE,
  ADD UNIQUE KEY `kd_rek_1` (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`,`kd_rek_4`) USING BTREE;

--
-- Indexes for table `ref_rek_5`
--
ALTER TABLE `ref_rek_5`
  ADD PRIMARY KEY (`id_rekening`) USING BTREE,
  ADD UNIQUE KEY `kd_rek_1` (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`,`kd_rek_4`,`kd_rek_5`) USING BTREE,
  ADD KEY `id_rekening` (`id_rekening`) USING BTREE;

--
-- Indexes for table `ref_revisi`
--
ALTER TABLE `ref_revisi`
  ADD PRIMARY KEY (`id_revisi`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_revisi` (`id_revisi`) USING BTREE;

--
-- Indexes for table `ref_satuan`
--
ALTER TABLE `ref_satuan`
  ADD PRIMARY KEY (`id_satuan`) USING BTREE;

--
-- Indexes for table `ref_setting`
--
ALTER TABLE `ref_setting`
  ADD PRIMARY KEY (`tahun_rencana`) USING BTREE;

--
-- Indexes for table `ref_sotk_level_1`
--
ALTER TABLE `ref_sotk_level_1`
  ADD PRIMARY KEY (`id_sotk_es2`) USING BTREE,
  ADD KEY `id_unit` (`id_unit`) USING BTREE;

--
-- Indexes for table `ref_sotk_level_2`
--
ALTER TABLE `ref_sotk_level_2`
  ADD PRIMARY KEY (`id_sotk_es3`) USING BTREE,
  ADD KEY `id_sotk_es2` (`id_sotk_es2`) USING BTREE;

--
-- Indexes for table `ref_sotk_level_3`
--
ALTER TABLE `ref_sotk_level_3`
  ADD PRIMARY KEY (`id_sotk_es4`) USING BTREE,
  ADD KEY `id_sotk_es2` (`id_sotk_es3`) USING BTREE;

--
-- Indexes for table `ref_ssh_golongan`
--
ALTER TABLE `ref_ssh_golongan`
  ADD PRIMARY KEY (`id_golongan_ssh`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_ssh_golongan` (`id_golongan_ssh`) USING BTREE;

--
-- Indexes for table `ref_ssh_kelompok`
--
ALTER TABLE `ref_ssh_kelompok`
  ADD PRIMARY KEY (`id_kelompok_ssh`) USING BTREE,
  ADD KEY `fk_ssh_kelompok` (`id_golongan_ssh`) USING BTREE;

--
-- Indexes for table `ref_ssh_perkada`
--
ALTER TABLE `ref_ssh_perkada`
  ADD PRIMARY KEY (`id_perkada`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_ssh_perkada_2` (`id_perkada`,`id_perkada_induk`,`id_perubahan`) USING BTREE,
  ADD KEY `idx_ref_ssh_perkada_1` (`id_perkada`,`created_at`,`updated_at`) USING BTREE;

--
-- Indexes for table `ref_ssh_perkada_tarif`
--
ALTER TABLE `ref_ssh_perkada_tarif`
  ADD PRIMARY KEY (`id_tarif_perkada`) USING BTREE,
  ADD UNIQUE KEY `ref_ssh_perkada_tarif_unik` (`id_tarif_ssh`,`id_zona_perkada`) USING BTREE,
  ADD KEY `fk_ref_tarif_jumlah_1` (`id_zona_perkada`) USING BTREE,
  ADD KEY `idx_ref_ssh_tarif_jumlah` (`id_tarif_ssh`,`id_zona_perkada`) USING BTREE;

--
-- Indexes for table `ref_ssh_perkada_zona`
--
ALTER TABLE `ref_ssh_perkada_zona`
  ADD PRIMARY KEY (`id_zona_perkada`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_ssh_tarif_jumlah` (`id_perkada`,`id_zona`,`id_perubahan`) USING BTREE,
  ADD KEY `fk_ref_tarif_jumlah_1` (`id_zona_perkada`,`no_urut`,`id_perkada`,`id_zona`) USING BTREE,
  ADD KEY `ref_ssh_perkada_zona_fk` (`id_zona`) USING BTREE;

--
-- Indexes for table `ref_ssh_rekening`
--
ALTER TABLE `ref_ssh_rekening`
  ADD PRIMARY KEY (`id_rekening_ssh`) USING BTREE,
  ADD UNIQUE KEY `fk_ref_ssh_rekening` (`id_tarif_ssh`,`id_rekening`) USING BTREE;

--
-- Indexes for table `ref_ssh_sub_kelompok`
--
ALTER TABLE `ref_ssh_sub_kelompok`
  ADD PRIMARY KEY (`id_sub_kelompok_ssh`) USING BTREE,
  ADD KEY `fk_ref_ssh_sub_kelompok` (`id_kelompok_ssh`) USING BTREE;

--
-- Indexes for table `ref_ssh_tarif`
--
ALTER TABLE `ref_ssh_tarif`
  ADD PRIMARY KEY (`id_tarif_ssh`) USING BTREE,
  ADD UNIQUE KEY `id_ref_ssh_tarif_1` (`id_tarif_ssh`,`no_urut`,`id_sub_kelompok_ssh`) USING BTREE,
  ADD KEY `id_ref_ssh_tarif` (`id_sub_kelompok_ssh`) USING BTREE;
ALTER TABLE `ref_ssh_tarif` ADD FULLTEXT KEY `uraian_tarif_ssh` (`uraian_tarif_ssh`);

--
-- Indexes for table `ref_ssh_zona`
--
ALTER TABLE `ref_ssh_zona`
  ADD PRIMARY KEY (`id_zona`) USING BTREE;

--
-- Indexes for table `ref_ssh_zona_lokasi`
--
ALTER TABLE `ref_ssh_zona_lokasi`
  ADD PRIMARY KEY (`id_zona_lokasi`) USING BTREE,
  ADD KEY `fk_zona_lokasi` (`id_zona`) USING BTREE;

--
-- Indexes for table `ref_status_usul`
--
ALTER TABLE `ref_status_usul`
  ADD PRIMARY KEY (`id_status_usul`) USING BTREE;

--
-- Indexes for table `ref_sub_unit`
--
ALTER TABLE `ref_sub_unit`
  ADD PRIMARY KEY (`id_sub_unit`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_sub_unit` (`id_unit`,`kd_sub`) USING BTREE;

--
-- Indexes for table `ref_sumber_dana`
--
ALTER TABLE `ref_sumber_dana`
  ADD PRIMARY KEY (`id_sumber_dana`) USING BTREE;

--
-- Indexes for table `ref_tabel_dasar`
--
ALTER TABLE `ref_tabel_dasar`
  ADD PRIMARY KEY (`id_tabel_dasar`) USING BTREE;

--
-- Indexes for table `ref_tahun`
--
ALTER TABLE `ref_tahun`
  ADD PRIMARY KEY (`id_tahun`) USING BTREE;

--
-- Indexes for table `ref_unit`
--
ALTER TABLE `ref_unit`
  ADD PRIMARY KEY (`id_unit`) USING BTREE,
  ADD UNIQUE KEY `idx_ref_unit` (`id_bidang`,`kd_unit`) USING BTREE;

--
-- Indexes for table `ref_urusan`
--
ALTER TABLE `ref_urusan`
  ADD PRIMARY KEY (`kd_urusan`) USING BTREE;

--
-- Indexes for table `ref_user_role`
--
ALTER TABLE `ref_user_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `temp_table_info`
--
ALTER TABLE `temp_table_info`
  ADD KEY `TBL_INDEX` (`TBL_INDEX`,`TABLE_NAME`,`COLUMN_NAME`,`IS_NULLABLE`,`COLUMN_KEY`,`INDEX_NAME`,`FLAG`) USING BTREE;

--
-- Indexes for table `trx_anggaran_aktivitas_pd`
--
ALTER TABLE `trx_anggaran_aktivitas_pd`
  ADD PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  ADD UNIQUE KEY `id_pelaksana_pd` (`id_pelaksana_pd`,`id_aktivitas_rkpd_final`,`tahun_anggaran`,`sumber_aktivitas`,`sumber_dana`,`id_perubahan`,`id_aktivitas_asb`,`sumber_data`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` (`id_pelaksana_pd`) USING BTREE;

--
-- Indexes for table `trx_anggaran_belanja_pd`
--
ALTER TABLE `trx_anggaran_belanja_pd`
  ADD PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_skpd_belanja` (`tahun_anggaran`,`no_urut`,`id_belanja_pd`,`id_aktivitas_pd`) USING BTREE,
  ADD KEY `fk_trx_forum_skpd_belanja` (`id_aktivitas_pd`) USING BTREE;

--
-- Indexes for table `trx_anggaran_dokumen`
--
ALTER TABLE `trx_anggaran_dokumen`
  ADD PRIMARY KEY (`id_dokumen_keu`) USING BTREE,
  ADD UNIQUE KEY `tahun_ranwal` (`jns_dokumen_keu`,`kd_dokumen_keu`,`id_perubahan`,`tahun_anggaran`) USING BTREE;

--
-- Indexes for table `trx_anggaran_indikator`
--
ALTER TABLE `trx_anggaran_indikator`
  ADD PRIMARY KEY (`id_indikator_program_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_indikator` (`tahun_rkpd`,`id_anggaran_pemda`,`kd_indikator`,`no_urut`,`id_indikator_rkpd_final`) USING BTREE,
  ADD KEY `id_anggaran_pemda` (`id_anggaran_pemda`) USING BTREE;

--
-- Indexes for table `trx_anggaran_kegiatan_pd`
--
ALTER TABLE `trx_anggaran_kegiatan_pd`
  ADD PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_id_kegiatan_ref` (`id_unit`,`id_kegiatan_ref`,`id_program_pd`,`tahun_anggaran`,`id_kegiatan_pd_rkpd_final`,`id_perubahan`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_trx_forum_skpd_program` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_anggaran_keg_indikator_pd`
--
ALTER TABLE `trx_anggaran_keg_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_anggaran`,`id_indikator_rkpd_final`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_kegiatan_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_indikator_rkpd_final`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_kegiatan_pd`) USING BTREE;

--
-- Indexes for table `trx_anggaran_lokasi_pd`
--
ALTER TABLE `trx_anggaran_lokasi_pd`
  ADD PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_lokasi` (`id_aktivitas_pd`,`tahun_anggaran`,`no_urut`,`id_lokasi_pd`,`jenis_lokasi`) USING BTREE;

--
-- Indexes for table `trx_anggaran_pelaksana`
--
ALTER TABLE `trx_anggaran_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_anggaran`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_anggaran`,`id_anggaran_pemda`,`id_unit`,`id_urusan_anggaran`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_anggaran_pemda`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_urusan_anggaran`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_2` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_anggaran_pelaksana_pd`
--
ALTER TABLE `trx_anggaran_pelaksana_pd`
  ADD PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_pelaksana` (`id_kegiatan_pd`,`tahun_anggaran`,`no_urut`,`id_pelaksana_pd`,`id_sub_unit`) USING BTREE;

--
-- Indexes for table `trx_anggaran_program`
--
ALTER TABLE `trx_anggaran_program`
  ADD PRIMARY KEY (`id_anggaran_pemda`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal` (`tahun_anggaran`,`thn_id_rpjmd`,`id_visi_rpjmd`,`id_misi_rpjmd`,`id_tujuan_rpjmd`,`id_sasaran_rpjmd`,`id_program_rpjmd`,`no_urut`,`id_rkpd_final`,`id_rkpd_ranwal`,`id_dokumen_keu`) USING BTREE,
  ADD KEY `id_dokumen_keu` (`id_dokumen_keu`) USING BTREE;

--
-- Indexes for table `trx_anggaran_program_pd`
--
ALTER TABLE `trx_anggaran_program_pd`
  ADD PRIMARY KEY (`id_program_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_program_id_program_ref` (`id_unit`,`tahun_anggaran`,`kd_dokumen_keu`,`jns_dokumen_keu`,`id_perubahan`,`id_pelaksana_anggaran`,`id_program_ref`,`id_program_pd_rkpd_final`,`id_dokumen_keu`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` (`id_pelaksana_anggaran`) USING BTREE;

--
-- Indexes for table `trx_anggaran_prog_indikator_pd`
--
ALTER TABLE `trx_anggaran_prog_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_anggaran`,`id_indikator_rkpd_final`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_program_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_anggaran_tapd`
--
ALTER TABLE `trx_anggaran_tapd`
  ADD PRIMARY KEY (`id_tapd`),
  ADD UNIQUE KEY `id_dokumen_keu` (`id_dokumen_keu`,`id_pegawai`,`id_unit_pegawai`,`status_tim`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `trx_anggaran_tapd_unit`
--
ALTER TABLE `trx_anggaran_tapd_unit`
  ADD PRIMARY KEY (`id_unit_tapd`),
  ADD UNIQUE KEY `id_tapd` (`id_tapd`,`id_unit`,`status_unit`);

--
-- Indexes for table `trx_anggaran_unit_kpa`
--
ALTER TABLE `trx_anggaran_unit_kpa`
  ADD PRIMARY KEY (`id_kpa`) USING BTREE,
  ADD UNIQUE KEY `id_pa` (`id_pa`,`id_program`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `trx_anggaran_unit_pa`
--
ALTER TABLE `trx_anggaran_unit_pa`
  ADD PRIMARY KEY (`id_pa`),
  ADD UNIQUE KEY `id_dokumen_keu` (`id_dokumen_keu`,`id_unit`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `trx_anggaran_urusan`
--
ALTER TABLE `trx_anggaran_urusan`
  ADD PRIMARY KEY (`id_urusan_anggaran`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_anggaran`,`id_anggaran_pemda`,`id_bidang`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_anggaran_pemda`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_bidang`) USING BTREE;

--
-- Indexes for table `trx_asb_aktivitas`
--
ALTER TABLE `trx_asb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas_asb`) USING BTREE,
  ADD KEY `fk_trx_aktivitas_asb` (`id_asb_sub_sub_kelompok`) USING BTREE;

--
-- Indexes for table `trx_asb_kelompok`
--
ALTER TABLE `trx_asb_kelompok`
  ADD PRIMARY KEY (`id_asb_kelompok`) USING BTREE,
  ADD KEY `FK_trx_asb_cluster_trx_asb_perkada` (`id_asb_perkada`) USING BTREE;

--
-- Indexes for table `trx_asb_komponen`
--
ALTER TABLE `trx_asb_komponen`
  ADD PRIMARY KEY (`id_komponen_asb`) USING BTREE,
  ADD KEY `FK_trx_asb_komponen_trx_asb_aktivitas` (`id_aktivitas_asb`) USING BTREE;

--
-- Indexes for table `trx_asb_komponen_rinci`
--
ALTER TABLE `trx_asb_komponen_rinci`
  ADD PRIMARY KEY (`id_komponen_asb_rinci`) USING BTREE,
  ADD KEY `fk_ref_komponen_asb_rinc` (`id_tarif_ssh`) USING BTREE,
  ADD KEY `idx_ref_komponen_asb_rinci` (`id_komponen_asb`) USING BTREE,
  ADD KEY `FK_trx_asb_komponen_rinci_ref_satuan` (`id_satuan1`) USING BTREE,
  ADD KEY `FK_trx_asb_komponen_rinci_ref_satuan_2` (`id_satuan2`) USING BTREE,
  ADD KEY `FK_trx_asb_komponen_rinci_ref_satuan_3` (`id_satuan3`) USING BTREE;
ALTER TABLE `trx_asb_komponen_rinci` ADD FULLTEXT KEY `ket_group` (`ket_group`);

--
-- Indexes for table `trx_asb_perhitungan`
--
ALTER TABLE `trx_asb_perhitungan`
  ADD PRIMARY KEY (`id_perhitungan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_perhitungan_asb` (`tahun_perhitungan`,`id_perkada`,`flag_aktif`) USING BTREE;

--
-- Indexes for table `trx_asb_perhitungan_rinci`
--
ALTER TABLE `trx_asb_perhitungan_rinci`
  ADD PRIMARY KEY (`id_perhitungan_rinci`) USING BTREE,
  ADD UNIQUE KEY `id_trx_perhitungan_aktivitas` (`id_perhitungan`,`id_asb_kelompok`,`id_asb_sub_kelompok`,`id_aktivitas_asb`,`id_komponen_asb`,`id_komponen_asb_rinci`,`id_zona`) USING BTREE;

--
-- Indexes for table `trx_asb_perkada`
--
ALTER TABLE `trx_asb_perkada`
  ADD PRIMARY KEY (`id_asb_perkada`) USING BTREE;

--
-- Indexes for table `trx_asb_sub_kelompok`
--
ALTER TABLE `trx_asb_sub_kelompok`
  ADD PRIMARY KEY (`id_asb_sub_kelompok`) USING BTREE,
  ADD KEY `FK_trx_asb_cluster_trx_asb_perkada` (`id_asb_kelompok`) USING BTREE;

--
-- Indexes for table `trx_asb_sub_sub_kelompok`
--
ALTER TABLE `trx_asb_sub_sub_kelompok`
  ADD PRIMARY KEY (`id_asb_sub_sub_kelompok`) USING BTREE,
  ADD KEY `FK_trx_asb_cluster_trx_asb_perkada` (`id_asb_sub_kelompok`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd`
--
ALTER TABLE `trx_forum_skpd`
  ADD PRIMARY KEY (`id_forum_skpd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_id_kegiatan_ref` (`id_unit`,`id_kegiatan_ref`,`id_forum_program`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_trx_forum_skpd_program` (`id_forum_program`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_aktivitas`
--
ALTER TABLE `trx_forum_skpd_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas_forum`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` (`id_forum_skpd`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_belanja`
--
ALTER TABLE `trx_forum_skpd_belanja`
  ADD PRIMARY KEY (`id_belanja_forum`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_skpd_belanja` (`tahun_forum`,`no_urut`,`id_belanja_forum`,`id_lokasi_forum`) USING BTREE,
  ADD KEY `fk_trx_forum_skpd_belanja` (`id_lokasi_forum`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_dokumen`
--
ALTER TABLE `trx_forum_skpd_dokumen`
  ADD PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  ADD UNIQUE KEY `id_unit_renja` (`id_unit_renja`,`tahun_ranwal`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_kebijakan`
--
ALTER TABLE `trx_forum_skpd_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_renja`,`id_unit`,`no_urut`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_kegiatan_indikator`
--
ALTER TABLE `trx_forum_skpd_kegiatan_indikator`
  ADD PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_forum_skpd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_forum_skpd`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_lokasi`
--
ALTER TABLE `trx_forum_skpd_lokasi`
  ADD PRIMARY KEY (`id_lokasi_forum`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_lokasi` (`id_pelaksana_forum`,`tahun_forum`,`no_urut`,`id_lokasi_forum`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_pelaksana`
--
ALTER TABLE `trx_forum_skpd_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_forum`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_pelaksana` (`id_aktivitas_forum`,`tahun_forum`,`no_urut`,`id_pelaksana_forum`,`id_sub_unit`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_program`
--
ALTER TABLE `trx_forum_skpd_program`
  ADD PRIMARY KEY (`id_forum_program`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_program_id_program_ref` (`id_unit`,`id_renja_program`,`id_program_ref`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` (`id_forum_rkpdprog`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_program_indikator`
--
ALTER TABLE `trx_forum_skpd_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_forum_program`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_forum_program`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_program_ranwal`
--
ALTER TABLE `trx_forum_skpd_program_ranwal`
  ADD PRIMARY KEY (`id_forum_rkpdprog`) USING BTREE,
  ADD UNIQUE KEY `id_rkpd_ranwal_id_bidang_id_unit` (`id_rkpd_ranwal`,`id_bidang`,`id_unit`) USING BTREE;

--
-- Indexes for table `trx_forum_skpd_usulan`
--
ALTER TABLE `trx_forum_skpd_usulan`
  ADD PRIMARY KEY (`id_sumber_usulan`) USING BTREE,
  ADD KEY `id_trx_forum_skpd_usulan` (`id_ref_usulan`,`id_sumber_usulan`,`id_lokasi_forum`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_usulan_trx_forum_skpd_lokasi` (`id_lokasi_forum`) USING BTREE;

--
-- Indexes for table `trx_group_menu`
--
ALTER TABLE `trx_group_menu`
  ADD UNIQUE KEY `menu` (`menu`,`group_id`) USING BTREE;

--
-- Indexes for table `trx_isian_data_dasar`
--
ALTER TABLE `trx_isian_data_dasar`
  ADD PRIMARY KEY (`id_isian_tabel_dasar`) USING BTREE,
  ADD KEY `id_kolom_tabel_dasar` (`id_kolom_tabel_dasar`) USING BTREE,
  ADD KEY `id_kecamatan` (`id_kecamatan`) USING BTREE;

--
-- Indexes for table `trx_log_api`
--
ALTER TABLE `trx_log_api`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `trx_log_events`
--
ALTER TABLE `trx_log_events`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `trx_musrencam`
--
ALTER TABLE `trx_musrencam`
  ADD PRIMARY KEY (`id_musrencam`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_musrendes` (`id_renja`,`tahun_musren`,`no_urut`,`id_musrencam`,`id_kecamatan`,`id_usulan_desa`) USING BTREE;

--
-- Indexes for table `trx_musrencam_lokasi`
--
ALTER TABLE `trx_musrencam_lokasi`
  ADD PRIMARY KEY (`id_lokasi_musrencam`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_musrendes_lokasi` (`id_musrencam`,`tahun_musren`,`no_urut`,`id_lokasi_musrencam`,`id_desa`,`rt`,`rw`) USING BTREE;

--
-- Indexes for table `trx_musrendes`
--
ALTER TABLE `trx_musrendes`
  ADD PRIMARY KEY (`id_musrendes`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_musrendes` (`id_renja`,`tahun_renja`,`no_urut`,`id_musrendes`,`id_desa`,`id_usulan_rw`) USING BTREE;

--
-- Indexes for table `trx_musrendes_lokasi`
--
ALTER TABLE `trx_musrendes_lokasi`
  ADD PRIMARY KEY (`id_lokasi_musrendes`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_musrendes_lokasi` (`id_musrendes`,`tahun_musren`,`no_urut`,`id_lokasi_musrendes`,`id_desa`,`rt`,`rw`) USING BTREE;

--
-- Indexes for table `trx_musrendes_rw`
--
ALTER TABLE `trx_musrendes_rw`
  ADD PRIMARY KEY (`id_musrendes_rw`) USING BTREE,
  ADD UNIQUE KEY `tahun_musren` (`tahun_musren`,`no_urut`,`id_renja`,`id_desa`,`id_kegiatan`,`id_asb_aktivitas`,`rt`,`rw`) USING BTREE,
  ADD KEY `id_renja` (`id_renja`) USING BTREE;

--
-- Indexes for table `trx_musrendes_rw_lokasi`
--
ALTER TABLE `trx_musrendes_rw_lokasi`
  ADD PRIMARY KEY (`id_musrendes_lokasi`) USING BTREE;

--
-- Indexes for table `trx_musrenkab`
--
ALTER TABLE `trx_musrenkab`
  ADD PRIMARY KEY (`id_musrenkab`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal` (`id_program_rpjmd`,`id_visi_rpjmd`,`id_sasaran_rpjmd`,`thn_id_rpjmd`,`id_rkpd_rancangan`,`id_tujuan_rpjmd`,`tahun_rkpd`,`no_urut`,`id_misi_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_aktivitas_pd`
--
ALTER TABLE `trx_musrenkab_aktivitas_pd`
  ADD PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` (`id_pelaksana_pd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_belanja_pd`
--
ALTER TABLE `trx_musrenkab_belanja_pd`
  ADD PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_skpd_belanja` (`tahun_forum`,`no_urut`,`id_belanja_pd`,`id_aktivitas_pd`) USING BTREE,
  ADD KEY `fk_trx_forum_skpd_belanja` (`id_aktivitas_pd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_dokumen`
--
ALTER TABLE `trx_musrenkab_dokumen`
  ADD PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE,
  ADD UNIQUE KEY `tahun_ranwal` (`tahun_rkpd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_indikator`
--
ALTER TABLE `trx_musrenkab_indikator`
  ADD PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_indikator` (`tahun_rkpd`,`id_musrenkab`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_indikator` (`id_musrenkab`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_kebijakan`
--
ALTER TABLE `trx_musrenkab_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal_kebijakan` (`tahun_rkpd`,`id_musrenkab`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_kebijakan` (`id_musrenkab`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_kebijakan_pd`
--
ALTER TABLE `trx_musrenkab_kebijakan_pd`
  ADD PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_renja`,`id_unit`,`no_urut`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_kegiatan_pd`
--
ALTER TABLE `trx_musrenkab_kegiatan_pd`
  ADD PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_id_kegiatan_ref` (`id_unit`,`id_kegiatan_ref`,`id_program_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_trx_forum_skpd_program` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_keg_indikator_pd`
--
ALTER TABLE `trx_musrenkab_keg_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_kegiatan_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_kegiatan_pd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_lokasi_pd`
--
ALTER TABLE `trx_musrenkab_lokasi_pd`
  ADD PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_lokasi` (`id_aktivitas_pd`,`tahun_forum`,`no_urut`,`id_lokasi_pd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_pelaksana`
--
ALTER TABLE `trx_musrenkab_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_musrenkab`,`id_unit`,`id_urusan_rkpd`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_musrenkab`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_urusan_rkpd`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_2` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_pelaksana_pd`
--
ALTER TABLE `trx_musrenkab_pelaksana_pd`
  ADD PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_pelaksana` (`id_kegiatan_pd`,`tahun_forum`,`no_urut`,`id_pelaksana_pd`,`id_sub_unit`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_program_pd`
--
ALTER TABLE `trx_musrenkab_program_pd`
  ADD PRIMARY KEY (`id_program_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` (`id_pelaksana_rkpd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_prog_indikator_pd`
--
ALTER TABLE `trx_musrenkab_prog_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_program_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_musrenkab_urusan`
--
ALTER TABLE `trx_musrenkab_urusan`
  ADD PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_musrenkab`,`id_bidang`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_musrenkab`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_bidang`) USING BTREE;

--
-- Indexes for table `trx_pokir`
--
ALTER TABLE `trx_pokir`
  ADD PRIMARY KEY (`id_pokir`) USING BTREE,
  ADD UNIQUE KEY `id_tahun` (`id_tahun`,`tanggal_pengusul`,`asal_pengusul`,`jabatan_pengusul`,`nomor_anggota`) USING BTREE;

--
-- Indexes for table `trx_pokir_lokasi`
--
ALTER TABLE `trx_pokir_lokasi`
  ADD PRIMARY KEY (`id_pokir_lokasi`) USING BTREE,
  ADD UNIQUE KEY `id_pokir_usulan` (`id_pokir_usulan`,`id_kecamatan`,`id_desa`,`rw`,`rt`) USING BTREE;

--
-- Indexes for table `trx_pokir_tl`
--
ALTER TABLE `trx_pokir_tl`
  ADD PRIMARY KEY (`id_pokir_tl`) USING BTREE,
  ADD UNIQUE KEY `id_pokir_usulan` (`id_pokir`,`id_pokir_usulan`,`id_pokir_lokasi`) USING BTREE,
  ADD KEY `trx_pokir_tl_ibfk_1` (`id_pokir_usulan`) USING BTREE;

--
-- Indexes for table `trx_pokir_tl_unit`
--
ALTER TABLE `trx_pokir_tl_unit`
  ADD PRIMARY KEY (`id_pokir_unit`) USING BTREE,
  ADD UNIQUE KEY `id_pokir_usulan` (`id_pokir`,`id_pokir_usulan`,`id_pokir_lokasi`) USING BTREE,
  ADD KEY `trx_pokir_tl_ibfk_1` (`id_pokir_usulan`) USING BTREE,
  ADD KEY `trx_pokir_tl_unit_ibfk_1` (`id_pokir_tl`) USING BTREE;

--
-- Indexes for table `trx_pokir_usulan`
--
ALTER TABLE `trx_pokir_usulan`
  ADD PRIMARY KEY (`id_pokir_usulan`) USING BTREE,
  ADD UNIQUE KEY `id_pokir` (`id_pokir`,`no_urut`) USING BTREE,
  ADD KEY `id_unit` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_prioritas_nasional`
--
ALTER TABLE `trx_prioritas_nasional`
  ADD PRIMARY KEY (`id_prioritas`) USING BTREE;

--
-- Indexes for table `trx_prioritas_pemda`
--
ALTER TABLE `trx_prioritas_pemda`
  ADD PRIMARY KEY (`id_prioritas`) USING BTREE,
  ADD KEY `id_tema_rkpd` (`id_tema_rkpd`);

--
-- Indexes for table `trx_prioritas_pemda_tema`
--
ALTER TABLE `trx_prioritas_pemda_tema`
  ADD PRIMARY KEY (`id_tema_rkpd`) USING BTREE;

--
-- Indexes for table `trx_prioritas_provinsi`
--
ALTER TABLE `trx_prioritas_provinsi`
  ADD PRIMARY KEY (`id_prioritas`) USING BTREE;

--
-- Indexes for table `trx_program_nasional`
--
ALTER TABLE `trx_program_nasional`
  ADD PRIMARY KEY (`id_prognas`) USING BTREE,
  ADD KEY `id_prioritas` (`id_prioritas`) USING BTREE;

--
-- Indexes for table `trx_program_nasional_detail`
--
ALTER TABLE `trx_program_nasional_detail`
  ADD PRIMARY KEY (`id_prognas_item`) USING BTREE,
  ADD UNIQUE KEY `id_prognas_unit` (`id_prognas_unit`,`id_kegiatan_pd`);

--
-- Indexes for table `trx_program_nasional_unit`
--
ALTER TABLE `trx_program_nasional_unit`
  ADD PRIMARY KEY (`id_prognas_unit`) USING BTREE,
  ADD UNIQUE KEY `id_prognas` (`id_prognas`,`id_unit`);

--
-- Indexes for table `trx_program_provinsi`
--
ALTER TABLE `trx_program_provinsi`
  ADD PRIMARY KEY (`id_progprov`) USING BTREE,
  ADD KEY `id_prioritas` (`id_prioritas`) USING BTREE;

--
-- Indexes for table `trx_program_provinsi_detail`
--
ALTER TABLE `trx_program_provinsi_detail`
  ADD PRIMARY KEY (`id_progprov_item`) USING BTREE,
  ADD UNIQUE KEY `id_progprov_unit` (`id_progprov_unit`,`id_kegiatan_pd`);

--
-- Indexes for table `trx_program_provinsi_unit`
--
ALTER TABLE `trx_program_provinsi_unit`
  ADD PRIMARY KEY (`id_progprov_unit`) USING BTREE,
  ADD UNIQUE KEY `id_progprov` (`id_progprov`,`id_unit`);

--
-- Indexes for table `trx_renja_aktivitas`
--
ALTER TABLE `trx_renja_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja_pelaksana` (`id_renja`,`tahun_renja`,`no_urut`,`id_aktivitas_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_belanja`
--
ALTER TABLE `trx_renja_belanja`
  ADD PRIMARY KEY (`id_belanja_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_belanja` (`id_lokasi_renja`,`tahun_renja`,`no_urut`,`id_belanja_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_dokumen`
--
ALTER TABLE `trx_renja_dokumen`
  ADD PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  ADD UNIQUE KEY `id_unit_renja` (`id_unit_renja`,`tahun_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renja_kebijakan`
--
ALTER TABLE `trx_renja_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_kebijakan` (`tahun_renja`,`id_unit`,`no_urut`,`id_sasaran_renstra`,`id_kebijakan_renja`,`id_renja`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_kebijakan` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `trx_renja_kegiatan`
--
ALTER TABLE `trx_renja_kegiatan`
  ADD PRIMARY KEY (`id_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja` (`id_rkpd_renstra`,`tahun_renja`,`no_urut`,`id_renja`) USING BTREE,
  ADD KEY `idx_trx_rancangan_renja_1` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `id_program_renstra` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_sasaran_renstra` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `FK_trx_renja_rancangan_trx_renja_rancangan_program` (`id_renja_program`) USING BTREE;

--
-- Indexes for table `trx_renja_kegiatan_indikator`
--
ALTER TABLE `trx_renja_kegiatan_indikator`
  ADD PRIMARY KEY (`id_indikator_kegiatan_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_renja`) USING BTREE,
  ADD KEY `FK_trx_renja_rancangan_indikator_trx_renja_rancangan` (`id_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_lokasi`
--
ALTER TABLE `trx_renja_lokasi`
  ADD PRIMARY KEY (`id_lokasi_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_rancangan_renja_lokasi` (`id_pelaksana_renja`,`tahun_renja`,`no_urut`,`id_lokasi_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_pelaksana`
--
ALTER TABLE `trx_renja_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja_pelaksana` (`id_renja`,`tahun_renja`,`no_urut`,`id_pelaksana_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_program`
--
ALTER TABLE `trx_renja_program`
  ADD PRIMARY KEY (`id_renja_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja` (`tahun_renja`,`no_urut`,`id_rkpd_ranwal`,`id_program_rpjmd`,`id_unit`,`id_bidang`,`id_renja_ranwal`) USING BTREE,
  ADD KEY `idx_trx_rancangan_renja_1` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `id_program_renstra` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_sasaran_renstra` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_ibfk_2` (`id_renja_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renja_program_indikator`
--
ALTER TABLE `trx_renja_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_renja_program`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_renja_program`) USING BTREE;

--
-- Indexes for table `trx_renja_program_rkpd`
--
ALTER TABLE `trx_renja_program_rkpd`
  ADD PRIMARY KEY (`id_renja_ranwal`) USING BTREE,
  ADD UNIQUE KEY `tahun_renja_id_rkpd_ranwal_id_unit` (`tahun_renja`,`id_rkpd_ranwal`,`id_unit`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan`
--
ALTER TABLE `trx_renja_rancangan`
  ADD PRIMARY KEY (`id_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja` (`id_rkpd_renstra`,`tahun_renja`,`no_urut`,`id_renja`) USING BTREE,
  ADD KEY `idx_trx_rancangan_renja_1` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `id_program_renstra` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_sasaran_renstra` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `FK_trx_renja_rancangan_trx_renja_rancangan_program` (`id_renja_program`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_aktivitas`
--
ALTER TABLE `trx_renja_rancangan_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja_pelaksana` (`id_renja`,`tahun_renja`,`no_urut`,`id_aktivitas_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_belanja`
--
ALTER TABLE `trx_renja_rancangan_belanja`
  ADD PRIMARY KEY (`id_belanja_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_belanja` (`id_lokasi_renja`,`tahun_renja`,`no_urut`,`id_belanja_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_dokumen`
--
ALTER TABLE `trx_renja_rancangan_dokumen`
  ADD PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  ADD UNIQUE KEY `id_unit_renja` (`id_unit_renja`,`tahun_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_indikator`
--
ALTER TABLE `trx_renja_rancangan_indikator`
  ADD PRIMARY KEY (`id_indikator_kegiatan_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_renja`) USING BTREE,
  ADD KEY `FK_trx_renja_rancangan_indikator_trx_renja_rancangan` (`id_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_kebijakan`
--
ALTER TABLE `trx_renja_rancangan_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_kebijakan` (`tahun_renja`,`id_unit`,`no_urut`,`id_sasaran_renstra`,`id_kebijakan_renja`,`id_renja`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_kebijakan` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_lokasi`
--
ALTER TABLE `trx_renja_rancangan_lokasi`
  ADD PRIMARY KEY (`id_lokasi_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_rancangan_renja_lokasi` (`id_pelaksana_renja`,`tahun_renja`,`no_urut`,`id_lokasi_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_pelaksana`
--
ALTER TABLE `trx_renja_rancangan_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja_pelaksana` (`id_renja`,`tahun_renja`,`no_urut`,`id_pelaksana_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_program`
--
ALTER TABLE `trx_renja_rancangan_program`
  ADD PRIMARY KEY (`id_renja_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja` (`tahun_renja`,`no_urut`,`id_rkpd_ranwal`,`id_program_rpjmd`,`id_unit`,`id_bidang`,`id_renja_ranwal`) USING BTREE,
  ADD KEY `idx_trx_rancangan_renja_1` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `id_program_renstra` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_sasaran_renstra` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_ibfk_2` (`id_renja_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_program_indikator`
--
ALTER TABLE `trx_renja_rancangan_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_renja_program`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_renja_program`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_program_ranwal`
--
ALTER TABLE `trx_renja_rancangan_program_ranwal`
  ADD PRIMARY KEY (`id_renja_ranwal`) USING BTREE,
  ADD UNIQUE KEY `tahun_renja_id_rkpd_ranwal_id_unit` (`tahun_renja`,`id_rkpd_ranwal`,`id_unit`) USING BTREE;

--
-- Indexes for table `trx_renja_rancangan_ref_pokir`
--
ALTER TABLE `trx_renja_rancangan_ref_pokir`
  ADD PRIMARY KEY (`id_ref_pokir_renja`) USING BTREE,
  ADD UNIQUE KEY `id_aktivitas_renja` (`id_aktivitas_renja`,`id_pokir_usulan`) USING BTREE,
  ADD KEY `id_pokir_usulan` (`id_pokir_usulan`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_aktivitas`
--
ALTER TABLE `trx_renja_ranwal_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja_pelaksana` (`id_renja`,`tahun_renja`,`no_urut`,`id_aktivitas_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_dokumen`
--
ALTER TABLE `trx_renja_ranwal_dokumen`
  ADD PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  ADD UNIQUE KEY `id_unit_renja` (`id_unit_renja`,`tahun_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_kegiatan`
--
ALTER TABLE `trx_renja_ranwal_kegiatan`
  ADD PRIMARY KEY (`id_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja` (`id_rkpd_renstra`,`tahun_renja`,`no_urut`,`id_renja`) USING BTREE,
  ADD KEY `idx_trx_rancangan_renja_1` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `id_program_renstra` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_sasaran_renstra` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `FK_trx_renja_rancangan_trx_renja_rancangan_program` (`id_renja_program`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_kegiatan_indikator`
--
ALTER TABLE `trx_renja_ranwal_kegiatan_indikator`
  ADD PRIMARY KEY (`id_indikator_kegiatan_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_renja`) USING BTREE,
  ADD KEY `FK_trx_renja_rancangan_indikator_trx_renja_rancangan` (`id_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_pelaksana`
--
ALTER TABLE `trx_renja_ranwal_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja_pelaksana` (`id_renja`,`tahun_renja`,`no_urut`,`id_pelaksana_renja`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_program`
--
ALTER TABLE `trx_renja_ranwal_program`
  ADD PRIMARY KEY (`id_renja_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rancangan_renja` (`tahun_renja`,`no_urut`,`id_rkpd_ranwal`,`id_program_rpjmd`,`id_unit`,`id_bidang`,`id_renja_ranwal`) USING BTREE,
  ADD KEY `idx_trx_rancangan_renja_1` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `id_program_renstra` (`id_program_renstra`) USING BTREE,
  ADD KEY `id_sasaran_renstra` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_ibfk_2` (`id_renja_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_program_indikator`
--
ALTER TABLE `trx_renja_ranwal_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program_renja`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_renja_program`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_ranwal_program_indikator_ibfk_1` (`id_renja_program`) USING BTREE;

--
-- Indexes for table `trx_renja_ranwal_program_rkpd`
--
ALTER TABLE `trx_renja_ranwal_program_rkpd`
  ADD PRIMARY KEY (`id_renja_ranwal`) USING BTREE,
  ADD UNIQUE KEY `tahun_renja_id_rkpd_ranwal_id_unit` (`tahun_renja`,`id_rkpd_ranwal`,`id_unit`) USING BTREE,
  ADD KEY `id_rkpd_ranwal` (`id_rkpd_ranwal`) USING BTREE;

--
-- Indexes for table `trx_renstra_dokumen`
--
ALTER TABLE `trx_renstra_dokumen`
  ADD PRIMARY KEY (`id_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_dokumen` (`id_rpjmd`,`id_unit`) USING BTREE,
  ADD KEY `fk_trx_renstra_dokumen_1` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_renstra_kebijakan`
--
ALTER TABLE `trx_renstra_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_kebijakan` (`thn_id`,`id_sasaran_renstra`,`id_kebijakan_renstra`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_kebijakan` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_kegiatan`
--
ALTER TABLE `trx_renstra_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_kegiatan` (`thn_id`,`id_program_renstra`,`id_kegiatan_renstra`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_kegiatan` (`id_program_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_kegiatan_indikator`
--
ALTER TABLE `trx_renstra_kegiatan_indikator`
  ADD PRIMARY KEY (`id_indikator_kegiatan_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_kegiatan_indikator` (`thn_id`,`id_kegiatan_renstra`,`id_perubahan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_kegiatan_indikator` (`id_kegiatan_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_kegiatan_pelaksana`
--
ALTER TABLE `trx_renstra_kegiatan_pelaksana`
  ADD PRIMARY KEY (`id_kegiatan_renstra_pelaksana`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_kegiatan_pelaksana` (`thn_id`,`id_kegiatan_renstra`,`id_perubahan`,`id_sub_unit`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_kegiatan_pelaksana` (`id_kegiatan_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_misi`
--
ALTER TABLE `trx_renstra_misi`
  ADD PRIMARY KEY (`id_misi_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_misi` (`id_visi_renstra`,`thn_id`,`no_urut`,`id_misi_renstra`,`id_perubahan`) USING BTREE;

--
-- Indexes for table `trx_renstra_program`
--
ALTER TABLE `trx_renstra_program`
  ADD PRIMARY KEY (`id_program_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_renstra_program` (`thn_id`,`id_sasaran_renstra`,`id_program_renstra`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_program` (`id_sasaran_renstra`) USING BTREE,
  ADD KEY `fk_trx_renstra_program_1` (`id_program_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_renstra_program_indikator`
--
ALTER TABLE `trx_renstra_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_program_indikator` (`thn_id`,`id_program_renstra`,`id_indikator_program_renstra`,`id_perubahan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_program_indikator` (`id_program_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_sasaran`
--
ALTER TABLE `trx_renstra_sasaran`
  ADD PRIMARY KEY (`id_sasaran_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_sasaran` (`thn_id`,`id_tujuan_renstra`,`id_sasaran_renstra`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_sasaran` (`id_tujuan_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_sasaran_indikator`
--
ALTER TABLE `trx_renstra_sasaran_indikator`
  ADD PRIMARY KEY (`id_indikator_sasaran_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_sasaran_indikator` (`thn_id`,`id_sasaran_renstra`,`id_indikator_sasaran_renstra`,`id_perubahan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_sasaran_indikator` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_strategi`
--
ALTER TABLE `trx_renstra_strategi`
  ADD PRIMARY KEY (`id_strategi_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_kebijakan` (`thn_id`,`id_sasaran_renstra`,`id_perubahan`,`id_strategi_renstra`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_strategi` (`id_sasaran_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_tujuan`
--
ALTER TABLE `trx_renstra_tujuan`
  ADD PRIMARY KEY (`id_tujuan_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renstra_tujuan` (`thn_id`,`id_misi_renstra`,`id_tujuan_renstra`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_tujuan` (`id_misi_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_tujuan_indikator`
--
ALTER TABLE `trx_renstra_tujuan_indikator`
  ADD PRIMARY KEY (`id_indikator_tujuan_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_sasaran_indikator` (`thn_id`,`id_tujuan_renstra`,`id_indikator_tujuan_renstra`,`id_perubahan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_renstra_sasaran_indikator` (`id_tujuan_renstra`) USING BTREE;

--
-- Indexes for table `trx_renstra_visi`
--
ALTER TABLE `trx_renstra_visi`
  ADD PRIMARY KEY (`id_visi_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_ta_visi_rpjmd` (`thn_id`,`id_visi_renstra`,`thn_awal_renstra`,`thn_akhir_renstra`,`id_perubahan`,`id_unit`,`no_urut`) USING BTREE,
  ADD KEY `FK_trx_renstra_visi_ref_unit` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final`
--
ALTER TABLE `trx_rkpd_final`
  ADD PRIMARY KEY (`id_rkpd_rancangan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal` (`thn_id_rpjmd`,`id_misi_rpjmd`,`id_sasaran_rpjmd`,`no_urut`,`tahun_rkpd`,`id_visi_rpjmd`,`id_tujuan_rpjmd`,`id_program_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_final_aktivitas_pd`
  ADD PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` (`id_pelaksana_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_belanja_pd`
--
ALTER TABLE `trx_rkpd_final_belanja_pd`
  ADD PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_skpd_belanja` (`tahun_forum`,`no_urut`,`id_belanja_pd`,`id_aktivitas_pd`) USING BTREE,
  ADD KEY `fk_trx_forum_skpd_belanja` (`id_aktivitas_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_dokumen`
--
ALTER TABLE `trx_rkpd_final_dokumen`
  ADD PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_indikator`
--
ALTER TABLE `trx_rkpd_final_indikator`
  ADD PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_indikator` (`tahun_rkpd`,`id_rkpd_rancangan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_indikator` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_kebijakan`
--
ALTER TABLE `trx_rkpd_final_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal_kebijakan` (`tahun_rkpd`,`id_rkpd_rancangan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_kebijakan` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_kebijakan_pd`
--
ALTER TABLE `trx_rkpd_final_kebijakan_pd`
  ADD PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_renja`,`id_unit`,`no_urut`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_final_kegiatan_pd`
  ADD PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_id_kegiatan_ref` (`id_unit`,`id_kegiatan_ref`,`id_program_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_trx_forum_skpd_program` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_final_keg_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_kegiatan_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_kegiatan_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_lokasi_pd`
--
ALTER TABLE `trx_rkpd_final_lokasi_pd`
  ADD PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_lokasi` (`id_aktivitas_pd`,`tahun_forum`,`no_urut`,`id_lokasi_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_pelaksana`
--
ALTER TABLE `trx_rkpd_final_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rancangan`,`id_unit`,`id_urusan_rkpd`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_rancangan`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_urusan_rkpd`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_2` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_final_pelaksana_pd`
  ADD PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_pelaksana` (`id_kegiatan_pd`,`tahun_forum`,`no_urut`,`id_pelaksana_pd`,`id_sub_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_program_pd`
--
ALTER TABLE `trx_rkpd_final_program_pd`
  ADD PRIMARY KEY (`id_program_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_program_id_program_ref` (`id_unit`,`id_renja_program`,`id_program_ref`,`id_forum_program`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_final_prog_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_program_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_final_urusan`
--
ALTER TABLE `trx_rkpd_final_urusan`
  ADD PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rancangan`,`id_bidang`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_rancangan`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_bidang`) USING BTREE;

--
-- Indexes for table `trx_rkpd_identifikasi_masalah`
--
ALTER TABLE `trx_rkpd_identifikasi_masalah`
  ADD PRIMARY KEY (`id_masalah`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan`
--
ALTER TABLE `trx_rkpd_rancangan`
  ADD PRIMARY KEY (`id_rkpd_rancangan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal` (`tahun_rkpd`,`thn_id_rpjmd`,`id_visi_rpjmd`,`id_misi_rpjmd`,`id_tujuan_rpjmd`,`id_sasaran_rpjmd`,`id_program_rpjmd`,`no_urut`,`id_forum_rkpdprog`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_rancangan_aktivitas_pd`
  ADD PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` (`id_pelaksana_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_belanja_pd`
--
ALTER TABLE `trx_rkpd_rancangan_belanja_pd`
  ADD PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_skpd_belanja` (`tahun_forum`,`no_urut`,`id_belanja_pd`,`id_aktivitas_pd`) USING BTREE,
  ADD KEY `fk_trx_forum_skpd_belanja` (`id_aktivitas_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_dokumen`
--
ALTER TABLE `trx_rkpd_rancangan_dokumen`
  ADD PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE,
  ADD UNIQUE KEY `tahun_ranwal` (`tahun_rkpd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_indikator`
--
ALTER TABLE `trx_rkpd_rancangan_indikator`
  ADD PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_indikator` (`tahun_rkpd`,`id_rkpd_rancangan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_indikator` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_kebijakan`
--
ALTER TABLE `trx_rkpd_rancangan_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal_kebijakan` (`tahun_rkpd`,`id_rkpd_rancangan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_kebijakan` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_kebijakan_pd`
--
ALTER TABLE `trx_rkpd_rancangan_kebijakan_pd`
  ADD PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_renja`,`id_unit`,`no_urut`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_rancangan_kegiatan_pd`
  ADD PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_id_kegiatan_ref` (`id_unit`,`id_kegiatan_ref`,`id_program_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_trx_forum_skpd_program` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_rancangan_keg_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_kegiatan_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_kegiatan_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_lokasi_pd`
--
ALTER TABLE `trx_rkpd_rancangan_lokasi_pd`
  ADD PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_lokasi` (`id_aktivitas_pd`,`tahun_forum`,`no_urut`,`id_lokasi_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_pelaksana`
--
ALTER TABLE `trx_rkpd_rancangan_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rancangan`,`id_unit`,`id_urusan_rkpd`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_rancangan`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_urusan_rkpd`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_2` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_rancangan_pelaksana_pd`
  ADD PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_pelaksana` (`id_kegiatan_pd`,`tahun_forum`,`no_urut`,`id_pelaksana_pd`,`id_sub_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_program_pd`
--
ALTER TABLE `trx_rkpd_rancangan_program_pd`
  ADD PRIMARY KEY (`id_program_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_program_id_program_ref` (`id_forum_program`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_rancangan_prog_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_program_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rancangan_urusan`
--
ALTER TABLE `trx_rkpd_rancangan_urusan`
  ADD PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rancangan`,`id_bidang`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_rancangan`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_bidang`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir`
--
ALTER TABLE `trx_rkpd_ranhir`
  ADD PRIMARY KEY (`id_rkpd_rancangan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal` (`tahun_rkpd`,`thn_id_rpjmd`,`id_visi_rpjmd`,`id_misi_rpjmd`,`id_tujuan_rpjmd`,`id_sasaran_rpjmd`,`id_program_rpjmd`,`no_urut`,`id_forum_rkpdprog`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_ranhir_aktivitas_pd`
  ADD PRIMARY KEY (`id_aktivitas_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` (`id_pelaksana_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_belanja_pd`
--
ALTER TABLE `trx_rkpd_ranhir_belanja_pd`
  ADD PRIMARY KEY (`id_belanja_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_skpd_belanja` (`tahun_forum`,`no_urut`,`id_belanja_pd`,`id_aktivitas_pd`) USING BTREE,
  ADD KEY `fk_trx_forum_skpd_belanja` (`id_aktivitas_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_dokumen`
--
ALTER TABLE `trx_rkpd_ranhir_dokumen`
  ADD PRIMARY KEY (`id_dokumen_rkpd`) USING BTREE,
  ADD UNIQUE KEY `tahun_ranwal` (`tahun_rkpd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_indikator`
--
ALTER TABLE `trx_rkpd_ranhir_indikator`
  ADD PRIMARY KEY (`id_indikator_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_indikator` (`tahun_rkpd`,`id_rkpd_rancangan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_indikator` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_kebijakan`
--
ALTER TABLE `trx_rkpd_ranhir_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal_kebijakan` (`tahun_rkpd`,`id_rkpd_rancangan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_kebijakan` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_kebijakan_pd`
--
ALTER TABLE `trx_rkpd_ranhir_kebijakan_pd`
  ADD PRIMARY KEY (`id_kebijakan_pd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_renja`,`id_unit`,`no_urut`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_ranhir_kegiatan_pd`
  ADD PRIMARY KEY (`id_kegiatan_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_id_kegiatan_ref` (`id_unit`,`id_kegiatan_ref`,`id_program_pd`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_trx_forum_skpd_program` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_ranhir_keg_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_kegiatan`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_kegiatan_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_kegiatan_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_lokasi_pd`
--
ALTER TABLE `trx_rkpd_ranhir_lokasi_pd`
  ADD PRIMARY KEY (`id_lokasi_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_lokasi` (`id_aktivitas_pd`,`tahun_forum`,`no_urut`,`id_lokasi_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_pelaksana`
--
ALTER TABLE `trx_rkpd_ranhir_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rancangan`,`id_unit`,`id_urusan_rkpd`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_rancangan`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_urusan_rkpd`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_2` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_ranhir_pelaksana_pd`
  ADD PRIMARY KEY (`id_pelaksana_pd`) USING BTREE,
  ADD UNIQUE KEY `id_trx_forum_pelaksana` (`id_kegiatan_pd`,`tahun_forum`,`no_urut`,`id_pelaksana_pd`,`id_sub_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_program_pd`
--
ALTER TABLE `trx_rkpd_ranhir_program_pd`
  ADD PRIMARY KEY (`id_program_pd`) USING BTREE,
  ADD UNIQUE KEY `id_unit_id_renja_program_id_program_ref` (`id_unit`,`id_renja_program`,`id_program_ref`,`id_forum_program`) USING BTREE,
  ADD KEY `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` (`id_rkpd_rancangan`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_ranhir_prog_indikator_pd`
  ADD PRIMARY KEY (`id_indikator_program`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_renja_rancangan_indikator` (`tahun_renja`,`id_program_renstra`,`kd_indikator`,`no_urut`,`id_perubahan`,`id_program_pd`) USING BTREE,
  ADD KEY `fk_trx_renja_rancangan_indikator` (`id_program_renstra`) USING BTREE,
  ADD KEY `trx_renja_rancangan_program_indikator_ibfk_1` (`id_program_pd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranhir_urusan`
--
ALTER TABLE `trx_rkpd_ranhir_urusan`
  ADD PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rancangan`,`id_bidang`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_rancangan`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_bidang`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranwal`
--
ALTER TABLE `trx_rkpd_ranwal`
  ADD PRIMARY KEY (`id_rkpd_ranwal`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal` (`tahun_rkpd`,`thn_id_rpjmd`,`id_visi_rpjmd`,`id_misi_rpjmd`,`id_tujuan_rpjmd`,`id_sasaran_rpjmd`,`id_program_rpjmd`,`no_urut`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranwal_dokumen`
--
ALTER TABLE `trx_rkpd_ranwal_dokumen`
  ADD PRIMARY KEY (`id_dokumen_ranwal`) USING BTREE,
  ADD UNIQUE KEY `tahun_ranwal` (`tahun_ranwal`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranwal_indikator`
--
ALTER TABLE `trx_rkpd_ranwal_indikator`
  ADD PRIMARY KEY (`id_indikator_program_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_indikator` (`tahun_rkpd`,`id_rkpd_ranwal`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_indikator` (`id_rkpd_ranwal`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranwal_kebijakan`
--
ALTER TABLE `trx_rkpd_ranwal_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_ranwal`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_ranwal_kebijakan` (`tahun_rkpd`,`id_rkpd_ranwal`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_kebijakan` (`id_rkpd_ranwal`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranwal_pelaksana`
--
ALTER TABLE `trx_rkpd_ranwal_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_ranwal`,`id_unit`,`id_urusan_rkpd`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_urusan_rkpd`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_2` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_ranwal_urusan`
--
ALTER TABLE `trx_rkpd_ranwal_urusan`
  ADD PRIMARY KEY (`id_urusan_rkpd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_ranwal`,`id_bidang`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana` (`id_rkpd_ranwal`) USING BTREE,
  ADD KEY `fk_trx_rkpd_ranwal_pelaksana_1` (`id_bidang`) USING BTREE;

--
-- Indexes for table `trx_rkpd_renstra`
--
ALTER TABLE `trx_rkpd_renstra`
  ADD PRIMARY KEY (`id_rkpd_renstra`) USING BTREE,
  ADD KEY `idx_trx_rkpd_renstra` (`id_rkpd_rpjmd`,`tahun_rkpd`,`id_rkpd_renstra`,`id_program_rpjmd`,`id_unit`) USING BTREE;

--
-- Indexes for table `trx_rkpd_renstra_indikator`
--
ALTER TABLE `trx_rkpd_renstra_indikator`
  ADD PRIMARY KEY (`id_indikator_renstra`) USING BTREE,
  ADD KEY `fk_trx_rkpd_renstra_pelaksana` (`id_rkpd_renstra`) USING BTREE,
  ADD KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_renstra`,`kd_indikator`) USING BTREE;

--
-- Indexes for table `trx_rkpd_renstra_pelaksana`
--
ALTER TABLE `trx_rkpd_renstra_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_renstra`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_renstra`,`id_sub_unit`) USING BTREE,
  ADD KEY `fk_trx_rkpd_renstra_pelaksana` (`id_rkpd_renstra`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rpjmd_kebijakan`
--
ALTER TABLE `trx_rkpd_rpjmd_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rpjmd`) USING BTREE,
  ADD KEY `fk_trx_rkpd_rpjmd_kebijakan` (`id_rkpd_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rpjmd_program_indikator`
--
ALTER TABLE `trx_rkpd_rpjmd_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program_rpjmd`) USING BTREE,
  ADD KEY `fk_rkpd_rpjmd_indikator` (`id_rkpd_rpjmd`) USING BTREE,
  ADD KEY `idx_trx_rkpd_rpjmd_program_indikator` (`tahun_rkpd`,`id_rkpd_rpjmd`,`kd_indikator`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rpjmd_program_pelaksana`
--
ALTER TABLE `trx_rkpd_rpjmd_program_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rkpd_rpjmd_program_pelaksana` (`tahun_rkpd`,`id_rkpd_rpjmd`,`id_urbid_rpjmd`,`id_unit`) USING BTREE,
  ADD KEY `fk_rkpd_rpjmd_pelaksana` (`id_rkpd_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rkpd_rpjmd_ranwal`
--
ALTER TABLE `trx_rkpd_rpjmd_ranwal`
  ADD PRIMARY KEY (`id_rkpd_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`,`tahun_rkpd`,`thn_id_rpjmd`,`id_visi_rpjmd`,`id_misi_rpjmd`,`id_tujuan_rpjmd`,`id_sasaran_rpjmd`,`id_program_rpjmd`) USING BTREE,
  ADD KEY `FK_trx_rkpd_rpjmd_ranwal_trx_rpjmd_visi` (`id_visi_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_analisa_ikk`
--
ALTER TABLE `trx_rpjmd_analisa_ikk`
  ADD PRIMARY KEY (`id_capaian_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_dokumen`
--
ALTER TABLE `trx_rpjmd_dokumen`
  ADD PRIMARY KEY (`id_rpjmd`) USING BTREE,
  ADD KEY `id_rpjmd_old` (`id_rpjmd_old`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_identifikasi_masalah`
--
ALTER TABLE `trx_rpjmd_identifikasi_masalah`
  ADD PRIMARY KEY (`id_masalah`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_kebijakan`
--
ALTER TABLE `trx_rpjmd_kebijakan`
  ADD PRIMARY KEY (`id_kebijakan_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_kebijakan` (`thn_id`,`id_sasaran_rpjmd`,`id_kebijakan_rpjmd`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_kebijakan` (`id_sasaran_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_misi`
--
ALTER TABLE `trx_rpjmd_misi`
  ADD PRIMARY KEY (`id_misi_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_ta_misi_rpjmd` (`thn_id_rpjmd`,`id_visi_rpjmd`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_misi` (`id_visi_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_prioritas`
--
ALTER TABLE `trx_rpjmd_prioritas`
  ADD PRIMARY KEY (`id_masalah`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_program`
--
ALTER TABLE `trx_rpjmd_program`
  ADD PRIMARY KEY (`id_program_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_program` (`thn_id`,`id_sasaran_rpjmd`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_program` (`id_sasaran_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_program_indikator`
--
ALTER TABLE `trx_rpjmd_program_indikator`
  ADD PRIMARY KEY (`id_indikator_program_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_program_indikator` (`thn_id`,`id_program_rpjmd`,`id_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_program_indikator` (`id_program_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_program_pelaksana`
--
ALTER TABLE `trx_rpjmd_program_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_program_pelaksana` (`thn_id`,`id_urbid_rpjmd`,`id_unit`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_program_pelaksana` (`id_urbid_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_program_urusan`
--
ALTER TABLE `trx_rpjmd_program_urusan`
  ADD PRIMARY KEY (`id_urbid_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_program_pelaksana` (`thn_id`,`id_program_rpjmd`,`id_bidang`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_program_urusan` (`id_program_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_sasaran`
--
ALTER TABLE `trx_rpjmd_sasaran`
  ADD PRIMARY KEY (`id_sasaran_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_sasaran` (`thn_id_rpjmd`,`id_tujuan_rpjmd`,`id_sasaran_rpjmd`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_sasaran` (`id_tujuan_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_sasaran_indikator`
--
ALTER TABLE `trx_rpjmd_sasaran_indikator`
  ADD PRIMARY KEY (`id_indikator_sasaran_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_sasaran_indikator` (`thn_id`,`id_sasaran_rpjmd`,`id_indikator_sasaran_rpjmd`,`id_perubahan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_sasaran_indikator` (`id_sasaran_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_strategi`
--
ALTER TABLE `trx_rpjmd_strategi`
  ADD PRIMARY KEY (`id_strategi_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_strategi` (`thn_id`,`id_sasaran_rpjmd`,`id_strategi_rpjmd`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_strategi` (`id_sasaran_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_tujuan`
--
ALTER TABLE `trx_rpjmd_tujuan`
  ADD PRIMARY KEY (`id_tujuan_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_tujuan` (`thn_id_rpjmd`,`id_misi_rpjmd`,`id_perubahan`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_tujuan` (`id_misi_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_tujuan_indikator`
--
ALTER TABLE `trx_rpjmd_tujuan_indikator`
  ADD PRIMARY KEY (`id_indikator_tujuan_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_tujuan_indikator` (`thn_id`,`id_tujuan_rpjmd`,`id_indikator_tujuan_rpjmd`,`id_perubahan`,`kd_indikator`,`no_urut`) USING BTREE,
  ADD KEY `fk_trx_rpjmd_tujuan_indikator` (`id_tujuan_rpjmd`) USING BTREE;

--
-- Indexes for table `trx_rpjmd_visi`
--
ALTER TABLE `trx_rpjmd_visi`
  ADD PRIMARY KEY (`id_visi_rpjmd`) USING BTREE,
  ADD UNIQUE KEY `idx_trx_rpjmd_visi` (`id_rpjmd`,`no_urut`,`thn_id`,`id_visi_rpjmd`,`id_perubahan`) USING BTREE;

--
-- Indexes for table `trx_usulan_kab`
--
ALTER TABLE `trx_usulan_kab`
  ADD PRIMARY KEY (`id_usulan_kab`) USING BTREE,
  ADD UNIQUE KEY `id_tahun` (`id_tahun`,`id_kab`,`id_unit`,`no_urut`) USING BTREE,
  ADD KEY `id_kab` (`id_kab`) USING BTREE,
  ADD KEY `id_unit` (`id_unit`) USING BTREE;

--
-- Indexes for table `trx_usulan_kab_lokasi`
--
ALTER TABLE `trx_usulan_kab_lokasi`
  ADD PRIMARY KEY (`id_usulan_kab_lokasi`) USING BTREE,
  ADD UNIQUE KEY `id_usulan_kab` (`id_usulan_kab`,`no_urut`,`id_lokasi`) USING BTREE,
  ADD KEY `id_lokasi` (`id_lokasi`) USING BTREE;

--
-- Indexes for table `trx_usulan_rw`
--
ALTER TABLE `trx_usulan_rw`
  ADD PRIMARY KEY (`id_usulan_rw`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `group_id` (`group_id`) USING BTREE;

--
-- Indexes for table `user_app`
--
ALTER TABLE `user_app`
  ADD PRIMARY KEY (`id_app_user`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`,`group_id`,`app_id`) USING BTREE,
  ADD KEY `group_id` (`group_id`) USING BTREE;

--
-- Indexes for table `user_desa`
--
ALTER TABLE `user_desa`
  ADD PRIMARY KEY (`id_user_wil`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`,`kd_kecamatan`,`kd_desa`) USING BTREE;

--
-- Indexes for table `user_level_sakip`
--
ALTER TABLE `user_level_sakip`
  ADD PRIMARY KEY (`id_user_level`) USING BTREE,
  ADD UNIQUE KEY `kd_unit` (`user_id`,`id_sotk_level_1`,`id_sotk_level_2`,`id_sotk_level_3`) USING BTREE;

--
-- Indexes for table `user_sub_unit`
--
ALTER TABLE `user_sub_unit`
  ADD PRIMARY KEY (`id_user_unit`) USING BTREE,
  ADD UNIQUE KEY `kd_unit` (`user_id`,`kd_unit`,`kd_sub`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kin_trx_cascading_indikator_kegiatan_pd`
--
ALTER TABLE `kin_trx_cascading_indikator_kegiatan_pd`
  MODIFY `id_indikator_kegiatan_pd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_cascading_indikator_program_pd`
--
ALTER TABLE `kin_trx_cascading_indikator_program_pd`
  MODIFY `id_indikator_program_pd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_cascading_kegiatan_opd`
--
ALTER TABLE `kin_trx_cascading_kegiatan_opd`
  MODIFY `id_hasil_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_cascading_program_opd`
--
ALTER TABLE `kin_trx_cascading_program_opd`
  MODIFY `id_hasil_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_iku_opd_dok`
--
ALTER TABLE `kin_trx_iku_opd_dok`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_iku_opd_kegiatan`
--
ALTER TABLE `kin_trx_iku_opd_kegiatan`
  MODIFY `id_iku_opd_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_iku_opd_program`
--
ALTER TABLE `kin_trx_iku_opd_program`
  MODIFY `id_iku_opd_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_iku_opd_sasaran`
--
ALTER TABLE `kin_trx_iku_opd_sasaran`
  MODIFY `id_iku_opd_sasaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_iku_pemda_dok`
--
ALTER TABLE `kin_trx_iku_pemda_dok`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_iku_pemda_rinci`
--
ALTER TABLE `kin_trx_iku_pemda_rinci`
  MODIFY `id_iku_pemda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es3_dok`
--
ALTER TABLE `kin_trx_perkin_es3_dok`
  MODIFY `id_dokumen_perkin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es3_kegiatan`
--
ALTER TABLE `kin_trx_perkin_es3_kegiatan`
  MODIFY `id_perkin_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es3_program`
--
ALTER TABLE `kin_trx_perkin_es3_program`
  MODIFY `id_perkin_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es3_program_indikator`
--
ALTER TABLE `kin_trx_perkin_es3_program_indikator`
  MODIFY `id_perkin_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es4_dok`
--
ALTER TABLE `kin_trx_perkin_es4_dok`
  MODIFY `id_dokumen_perkin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es4_kegiatan`
--
ALTER TABLE `kin_trx_perkin_es4_kegiatan`
  MODIFY `id_perkin_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_es4_kegiatan_indikator`
--
ALTER TABLE `kin_trx_perkin_es4_kegiatan_indikator`
  MODIFY `id_perkin_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_opd_dok`
--
ALTER TABLE `kin_trx_perkin_opd_dok`
  MODIFY `id_dokumen_perkin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_opd_program`
--
ALTER TABLE `kin_trx_perkin_opd_program`
  MODIFY `id_perkin_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_opd_program_indikator`
--
ALTER TABLE `kin_trx_perkin_opd_program_indikator`
  MODIFY `id_perkin_indikator` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_opd_program_pelaksana`
--
ALTER TABLE `kin_trx_perkin_opd_program_pelaksana`
  MODIFY `id_perkin_pelaksana` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_opd_sasaran`
--
ALTER TABLE `kin_trx_perkin_opd_sasaran`
  MODIFY `id_perkin_sasaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_perkin_opd_sasaran_indikator`
--
ALTER TABLE `kin_trx_perkin_opd_sasaran_indikator`
  MODIFY `id_perkin_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es2_dok`
--
ALTER TABLE `kin_trx_real_es2_dok`
  MODIFY `id_dokumen_real` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es2_program`
--
ALTER TABLE `kin_trx_real_es2_program`
  MODIFY `id_real_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es2_sasaran`
--
ALTER TABLE `kin_trx_real_es2_sasaran`
  MODIFY `id_real_sasaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es2_sasaran_indikator`
--
ALTER TABLE `kin_trx_real_es2_sasaran_indikator`
  MODIFY `id_real_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es3_dok`
--
ALTER TABLE `kin_trx_real_es3_dok`
  MODIFY `id_dokumen_real` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es3_kegiatan`
--
ALTER TABLE `kin_trx_real_es3_kegiatan`
  MODIFY `id_real_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es3_program`
--
ALTER TABLE `kin_trx_real_es3_program`
  MODIFY `id_real_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es3_program_indikator`
--
ALTER TABLE `kin_trx_real_es3_program_indikator`
  MODIFY `id_real_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es4_dok`
--
ALTER TABLE `kin_trx_real_es4_dok`
  MODIFY `id_dokumen_real` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es4_kegiatan`
--
ALTER TABLE `kin_trx_real_es4_kegiatan`
  MODIFY `id_real_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kin_trx_real_es4_kegiatan_indikator`
--
ALTER TABLE `kin_trx_real_es4_kegiatan_indikator`
  MODIFY `id_real_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_api_manajemen`
--
ALTER TABLE `ref_api_manajemen`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_aspek_pembangunan`
--
ALTER TABLE `ref_aspek_pembangunan`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ref_data_sub_unit`
--
ALTER TABLE `ref_data_sub_unit`
  MODIFY `id_rincian_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_desa`
--
ALTER TABLE `ref_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_group`
--
ALTER TABLE `ref_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ref_indikator`
--
ALTER TABLE `ref_indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_jadwal`
--
ALTER TABLE `ref_jadwal`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_kabupaten`
--
ALTER TABLE `ref_kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_kegiatan`
--
ALTER TABLE `ref_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_laporan`
--
ALTER TABLE `ref_laporan`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_lokasi`
--
ALTER TABLE `ref_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ref_menu`
--
ALTER TABLE `ref_menu`
  MODIFY `id_menu` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `ref_pangkat_golongan`
--
ALTER TABLE `ref_pangkat_golongan`
  MODIFY `id_pangkat_pns` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ref_pegawai`
--
ALTER TABLE `ref_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_pegawai_pangkat`
--
ALTER TABLE `ref_pegawai_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_pegawai_unit`
--
ALTER TABLE `ref_pegawai_unit`
  MODIFY `id_unit_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_pembatalan`
--
ALTER TABLE `ref_pembatalan`
  MODIFY `id_batal` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_pemda`
--
ALTER TABLE `ref_pemda`
  MODIFY `id_pemda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_program`
--
ALTER TABLE `ref_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- AUTO_INCREMENT for table `ref_rek_5`
--
ALTER TABLE `ref_rek_5`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1581;

--
-- AUTO_INCREMENT for table `ref_satuan`
--
ALTER TABLE `ref_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_sotk_level_1`
--
ALTER TABLE `ref_sotk_level_1`
  MODIFY `id_sotk_es2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_sotk_level_2`
--
ALTER TABLE `ref_sotk_level_2`
  MODIFY `id_sotk_es3` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_sotk_level_3`
--
ALTER TABLE `ref_sotk_level_3`
  MODIFY `id_sotk_es4` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_golongan`
--
ALTER TABLE `ref_ssh_golongan`
  MODIFY `id_golongan_ssh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_kelompok`
--
ALTER TABLE `ref_ssh_kelompok`
  MODIFY `id_kelompok_ssh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_perkada`
--
ALTER TABLE `ref_ssh_perkada`
  MODIFY `id_perkada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_perkada_tarif`
--
ALTER TABLE `ref_ssh_perkada_tarif`
  MODIFY `id_tarif_perkada` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_perkada_zona`
--
ALTER TABLE `ref_ssh_perkada_zona`
  MODIFY `id_zona_perkada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_rekening`
--
ALTER TABLE `ref_ssh_rekening`
  MODIFY `id_rekening_ssh` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_sub_kelompok`
--
ALTER TABLE `ref_ssh_sub_kelompok`
  MODIFY `id_sub_kelompok_ssh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_tarif`
--
ALTER TABLE `ref_ssh_tarif`
  MODIFY `id_tarif_ssh` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_ssh_zona`
--
ALTER TABLE `ref_ssh_zona`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_ssh_zona_lokasi`
--
ALTER TABLE `ref_ssh_zona_lokasi`
  MODIFY `id_zona_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_sub_unit`
--
ALTER TABLE `ref_sub_unit`
  MODIFY `id_sub_unit` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_tahun`
--
ALTER TABLE `ref_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_unit`
--
ALTER TABLE `ref_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_user_role`
--
ALTER TABLE `ref_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_aktivitas_pd`
--
ALTER TABLE `trx_anggaran_aktivitas_pd`
  MODIFY `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_belanja_pd`
--
ALTER TABLE `trx_anggaran_belanja_pd`
  MODIFY `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_dokumen`
--
ALTER TABLE `trx_anggaran_dokumen`
  MODIFY `id_dokumen_keu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_indikator`
--
ALTER TABLE `trx_anggaran_indikator`
  MODIFY `id_indikator_program_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_anggaran_kegiatan_pd`
--
ALTER TABLE `trx_anggaran_kegiatan_pd`
  MODIFY `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_keg_indikator_pd`
--
ALTER TABLE `trx_anggaran_keg_indikator_pd`
  MODIFY `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_anggaran_lokasi_pd`
--
ALTER TABLE `trx_anggaran_lokasi_pd`
  MODIFY `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_pelaksana`
--
ALTER TABLE `trx_anggaran_pelaksana`
  MODIFY `id_pelaksana_anggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_pelaksana_pd`
--
ALTER TABLE `trx_anggaran_pelaksana_pd`
  MODIFY `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_program`
--
ALTER TABLE `trx_anggaran_program`
  MODIFY `id_anggaran_pemda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_program_pd`
--
ALTER TABLE `trx_anggaran_program_pd`
  MODIFY `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_prog_indikator_pd`
--
ALTER TABLE `trx_anggaran_prog_indikator_pd`
  MODIFY `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_anggaran_tapd`
--
ALTER TABLE `trx_anggaran_tapd`
  MODIFY `id_tapd` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_tapd_unit`
--
ALTER TABLE `trx_anggaran_tapd_unit`
  MODIFY `id_unit_tapd` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_unit_kpa`
--
ALTER TABLE `trx_anggaran_unit_kpa`
  MODIFY `id_kpa` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_unit_pa`
--
ALTER TABLE `trx_anggaran_unit_pa`
  MODIFY `id_pa` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_anggaran_urusan`
--
ALTER TABLE `trx_anggaran_urusan`
  MODIFY `id_urusan_anggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_aktivitas`
--
ALTER TABLE `trx_asb_aktivitas`
  MODIFY `id_aktivitas_asb` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_kelompok`
--
ALTER TABLE `trx_asb_kelompok`
  MODIFY `id_asb_kelompok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_komponen`
--
ALTER TABLE `trx_asb_komponen`
  MODIFY `id_komponen_asb` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_komponen_rinci`
--
ALTER TABLE `trx_asb_komponen_rinci`
  MODIFY `id_komponen_asb_rinci` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_perhitungan`
--
ALTER TABLE `trx_asb_perhitungan`
  MODIFY `id_perhitungan` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_perhitungan_rinci`
--
ALTER TABLE `trx_asb_perhitungan_rinci`
  MODIFY `id_perhitungan_rinci` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_perkada`
--
ALTER TABLE `trx_asb_perkada`
  MODIFY `id_asb_perkada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_sub_kelompok`
--
ALTER TABLE `trx_asb_sub_kelompok`
  MODIFY `id_asb_sub_kelompok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_asb_sub_sub_kelompok`
--
ALTER TABLE `trx_asb_sub_sub_kelompok`
  MODIFY `id_asb_sub_sub_kelompok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd`
--
ALTER TABLE `trx_forum_skpd`
  MODIFY `id_forum_skpd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_aktivitas`
--
ALTER TABLE `trx_forum_skpd_aktivitas`
  MODIFY `id_aktivitas_forum` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_belanja`
--
ALTER TABLE `trx_forum_skpd_belanja`
  MODIFY `id_belanja_forum` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_dokumen`
--
ALTER TABLE `trx_forum_skpd_dokumen`
  MODIFY `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_kebijakan`
--
ALTER TABLE `trx_forum_skpd_kebijakan`
  MODIFY `id_kebijakan_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_kegiatan_indikator`
--
ALTER TABLE `trx_forum_skpd_kegiatan_indikator`
  MODIFY `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_forum_skpd_lokasi`
--
ALTER TABLE `trx_forum_skpd_lokasi`
  MODIFY `id_lokasi_forum` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_pelaksana`
--
ALTER TABLE `trx_forum_skpd_pelaksana`
  MODIFY `id_pelaksana_forum` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_program`
--
ALTER TABLE `trx_forum_skpd_program`
  MODIFY `id_forum_program` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_program_indikator`
--
ALTER TABLE `trx_forum_skpd_program_indikator`
  MODIFY `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_forum_skpd_program_ranwal`
--
ALTER TABLE `trx_forum_skpd_program_ranwal`
  MODIFY `id_forum_rkpdprog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_forum_skpd_usulan`
--
ALTER TABLE `trx_forum_skpd_usulan`
  MODIFY `id_sumber_usulan` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_isian_data_dasar`
--
ALTER TABLE `trx_isian_data_dasar`
  MODIFY `id_isian_tabel_dasar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_log_api`
--
ALTER TABLE `trx_log_api`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_log_events`
--
ALTER TABLE `trx_log_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrencam`
--
ALTER TABLE `trx_musrencam`
  MODIFY `id_musrencam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrencam_lokasi`
--
ALTER TABLE `trx_musrencam_lokasi`
  MODIFY `id_lokasi_musrencam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrendes`
--
ALTER TABLE `trx_musrendes`
  MODIFY `id_musrendes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrendes_lokasi`
--
ALTER TABLE `trx_musrendes_lokasi`
  MODIFY `id_lokasi_musrendes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrendes_rw`
--
ALTER TABLE `trx_musrendes_rw`
  MODIFY `id_musrendes_rw` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrendes_rw_lokasi`
--
ALTER TABLE `trx_musrendes_rw_lokasi`
  MODIFY `id_musrendes_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab`
--
ALTER TABLE `trx_musrenkab`
  MODIFY `id_musrenkab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_aktivitas_pd`
--
ALTER TABLE `trx_musrenkab_aktivitas_pd`
  MODIFY `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_belanja_pd`
--
ALTER TABLE `trx_musrenkab_belanja_pd`
  MODIFY `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_dokumen`
--
ALTER TABLE `trx_musrenkab_dokumen`
  MODIFY `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_indikator`
--
ALTER TABLE `trx_musrenkab_indikator`
  MODIFY `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_musrenkab_kebijakan`
--
ALTER TABLE `trx_musrenkab_kebijakan`
  MODIFY `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_kebijakan_pd`
--
ALTER TABLE `trx_musrenkab_kebijakan_pd`
  MODIFY `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_kegiatan_pd`
--
ALTER TABLE `trx_musrenkab_kegiatan_pd`
  MODIFY `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_keg_indikator_pd`
--
ALTER TABLE `trx_musrenkab_keg_indikator_pd`
  MODIFY `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_musrenkab_lokasi_pd`
--
ALTER TABLE `trx_musrenkab_lokasi_pd`
  MODIFY `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_pelaksana`
--
ALTER TABLE `trx_musrenkab_pelaksana`
  MODIFY `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_pelaksana_pd`
--
ALTER TABLE `trx_musrenkab_pelaksana_pd`
  MODIFY `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_program_pd`
--
ALTER TABLE `trx_musrenkab_program_pd`
  MODIFY `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_musrenkab_prog_indikator_pd`
--
ALTER TABLE `trx_musrenkab_prog_indikator_pd`
  MODIFY `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_musrenkab_urusan`
--
ALTER TABLE `trx_musrenkab_urusan`
  MODIFY `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_pokir`
--
ALTER TABLE `trx_pokir`
  MODIFY `id_pokir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_pokir_lokasi`
--
ALTER TABLE `trx_pokir_lokasi`
  MODIFY `id_pokir_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_pokir_tl`
--
ALTER TABLE `trx_pokir_tl`
  MODIFY `id_pokir_tl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_pokir_tl_unit`
--
ALTER TABLE `trx_pokir_tl_unit`
  MODIFY `id_pokir_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_pokir_usulan`
--
ALTER TABLE `trx_pokir_usulan`
  MODIFY `id_pokir_usulan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_prioritas_nasional`
--
ALTER TABLE `trx_prioritas_nasional`
  MODIFY `id_prioritas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_prioritas_pemda`
--
ALTER TABLE `trx_prioritas_pemda`
  MODIFY `id_prioritas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_prioritas_pemda_tema`
--
ALTER TABLE `trx_prioritas_pemda_tema`
  MODIFY `id_tema_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_prioritas_provinsi`
--
ALTER TABLE `trx_prioritas_provinsi`
  MODIFY `id_prioritas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_aktivitas`
--
ALTER TABLE `trx_renja_aktivitas`
  MODIFY `id_aktivitas_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_belanja`
--
ALTER TABLE `trx_renja_belanja`
  MODIFY `id_belanja_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_dokumen`
--
ALTER TABLE `trx_renja_dokumen`
  MODIFY `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_kebijakan`
--
ALTER TABLE `trx_renja_kebijakan`
  MODIFY `id_kebijakan_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_kegiatan`
--
ALTER TABLE `trx_renja_kegiatan`
  MODIFY `id_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_kegiatan_indikator`
--
ALTER TABLE `trx_renja_kegiatan_indikator`
  MODIFY `id_indikator_kegiatan_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renja_lokasi`
--
ALTER TABLE `trx_renja_lokasi`
  MODIFY `id_lokasi_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_pelaksana`
--
ALTER TABLE `trx_renja_pelaksana`
  MODIFY `id_pelaksana_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_program`
--
ALTER TABLE `trx_renja_program`
  MODIFY `id_renja_program` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_program_indikator`
--
ALTER TABLE `trx_renja_program_indikator`
  MODIFY `id_indikator_program_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renja_program_rkpd`
--
ALTER TABLE `trx_renja_program_rkpd`
  MODIFY `id_renja_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan`
--
ALTER TABLE `trx_renja_rancangan`
  MODIFY `id_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_aktivitas`
--
ALTER TABLE `trx_renja_rancangan_aktivitas`
  MODIFY `id_aktivitas_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_belanja`
--
ALTER TABLE `trx_renja_rancangan_belanja`
  MODIFY `id_belanja_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_dokumen`
--
ALTER TABLE `trx_renja_rancangan_dokumen`
  MODIFY `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_indikator`
--
ALTER TABLE `trx_renja_rancangan_indikator`
  MODIFY `id_indikator_kegiatan_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_kebijakan`
--
ALTER TABLE `trx_renja_rancangan_kebijakan`
  MODIFY `id_kebijakan_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_lokasi`
--
ALTER TABLE `trx_renja_rancangan_lokasi`
  MODIFY `id_lokasi_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_pelaksana`
--
ALTER TABLE `trx_renja_rancangan_pelaksana`
  MODIFY `id_pelaksana_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_program`
--
ALTER TABLE `trx_renja_rancangan_program`
  MODIFY `id_renja_program` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_program_indikator`
--
ALTER TABLE `trx_renja_rancangan_program_indikator`
  MODIFY `id_indikator_program_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renja_rancangan_program_ranwal`
--
ALTER TABLE `trx_renja_rancangan_program_ranwal`
  MODIFY `id_renja_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_aktivitas`
--
ALTER TABLE `trx_renja_ranwal_aktivitas`
  MODIFY `id_aktivitas_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_dokumen`
--
ALTER TABLE `trx_renja_ranwal_dokumen`
  MODIFY `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_kegiatan`
--
ALTER TABLE `trx_renja_ranwal_kegiatan`
  MODIFY `id_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_kegiatan_indikator`
--
ALTER TABLE `trx_renja_ranwal_kegiatan_indikator`
  MODIFY `id_indikator_kegiatan_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_pelaksana`
--
ALTER TABLE `trx_renja_ranwal_pelaksana`
  MODIFY `id_pelaksana_renja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_program`
--
ALTER TABLE `trx_renja_ranwal_program`
  MODIFY `id_renja_program` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_program_indikator`
--
ALTER TABLE `trx_renja_ranwal_program_indikator`
  MODIFY `id_indikator_program_renja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renja_ranwal_program_rkpd`
--
ALTER TABLE `trx_renja_ranwal_program_rkpd`
  MODIFY `id_renja_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_dokumen`
--
ALTER TABLE `trx_renstra_dokumen`
  MODIFY `id_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_kebijakan`
--
ALTER TABLE `trx_renstra_kebijakan`
  MODIFY `id_kebijakan_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renstra_kegiatan`
--
ALTER TABLE `trx_renstra_kegiatan`
  MODIFY `id_kegiatan_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_kegiatan_indikator`
--
ALTER TABLE `trx_renstra_kegiatan_indikator`
  MODIFY `id_indikator_kegiatan_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renstra_kegiatan_pelaksana`
--
ALTER TABLE `trx_renstra_kegiatan_pelaksana`
  MODIFY `id_kegiatan_renstra_pelaksana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_misi`
--
ALTER TABLE `trx_renstra_misi`
  MODIFY `id_misi_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_program`
--
ALTER TABLE `trx_renstra_program`
  MODIFY `id_program_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_program_indikator`
--
ALTER TABLE `trx_renstra_program_indikator`
  MODIFY `id_indikator_program_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renstra_sasaran`
--
ALTER TABLE `trx_renstra_sasaran`
  MODIFY `id_sasaran_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_sasaran_indikator`
--
ALTER TABLE `trx_renstra_sasaran_indikator`
  MODIFY `id_indikator_sasaran_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renstra_strategi`
--
ALTER TABLE `trx_renstra_strategi`
  MODIFY `id_strategi_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renstra_tujuan`
--
ALTER TABLE `trx_renstra_tujuan`
  MODIFY `id_tujuan_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_renstra_tujuan_indikator`
--
ALTER TABLE `trx_renstra_tujuan_indikator`
  MODIFY `id_indikator_tujuan_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_renstra_visi`
--
ALTER TABLE `trx_renstra_visi`
  MODIFY `id_visi_renstra` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama';

--
-- AUTO_INCREMENT for table `trx_rkpd_final`
--
ALTER TABLE `trx_rkpd_final`
  MODIFY `id_rkpd_rancangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_final_aktivitas_pd`
  MODIFY `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_belanja_pd`
--
ALTER TABLE `trx_rkpd_final_belanja_pd`
  MODIFY `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_dokumen`
--
ALTER TABLE `trx_rkpd_final_dokumen`
  MODIFY `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_indikator`
--
ALTER TABLE `trx_rkpd_final_indikator`
  MODIFY `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_final_kebijakan`
--
ALTER TABLE `trx_rkpd_final_kebijakan`
  MODIFY `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_kebijakan_pd`
--
ALTER TABLE `trx_rkpd_final_kebijakan_pd`
  MODIFY `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_final_kegiatan_pd`
  MODIFY `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_final_keg_indikator_pd`
  MODIFY `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_final_lokasi_pd`
--
ALTER TABLE `trx_rkpd_final_lokasi_pd`
  MODIFY `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_pelaksana`
--
ALTER TABLE `trx_rkpd_final_pelaksana`
  MODIFY `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_final_pelaksana_pd`
  MODIFY `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_program_pd`
--
ALTER TABLE `trx_rkpd_final_program_pd`
  MODIFY `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_final_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_final_prog_indikator_pd`
  MODIFY `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_final_urusan`
--
ALTER TABLE `trx_rkpd_final_urusan`
  MODIFY `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_identifikasi_masalah`
--
ALTER TABLE `trx_rkpd_identifikasi_masalah`
  MODIFY `id_masalah` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan`
--
ALTER TABLE `trx_rkpd_rancangan`
  MODIFY `id_rkpd_rancangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_rancangan_aktivitas_pd`
  MODIFY `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_belanja_pd`
--
ALTER TABLE `trx_rkpd_rancangan_belanja_pd`
  MODIFY `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_dokumen`
--
ALTER TABLE `trx_rkpd_rancangan_dokumen`
  MODIFY `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_indikator`
--
ALTER TABLE `trx_rkpd_rancangan_indikator`
  MODIFY `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_kebijakan`
--
ALTER TABLE `trx_rkpd_rancangan_kebijakan`
  MODIFY `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_kebijakan_pd`
--
ALTER TABLE `trx_rkpd_rancangan_kebijakan_pd`
  MODIFY `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_rancangan_kegiatan_pd`
  MODIFY `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_rancangan_keg_indikator_pd`
  MODIFY `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_lokasi_pd`
--
ALTER TABLE `trx_rkpd_rancangan_lokasi_pd`
  MODIFY `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_pelaksana`
--
ALTER TABLE `trx_rkpd_rancangan_pelaksana`
  MODIFY `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_rancangan_pelaksana_pd`
  MODIFY `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_program_pd`
--
ALTER TABLE `trx_rkpd_rancangan_program_pd`
  MODIFY `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_rancangan_prog_indikator_pd`
  MODIFY `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_rancangan_urusan`
--
ALTER TABLE `trx_rkpd_rancangan_urusan`
  MODIFY `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir`
--
ALTER TABLE `trx_rkpd_ranhir`
  MODIFY `id_rkpd_rancangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_ranhir_aktivitas_pd`
  MODIFY `id_aktivitas_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_belanja_pd`
--
ALTER TABLE `trx_rkpd_ranhir_belanja_pd`
  MODIFY `id_belanja_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_dokumen`
--
ALTER TABLE `trx_rkpd_ranhir_dokumen`
  MODIFY `id_dokumen_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_indikator`
--
ALTER TABLE `trx_rkpd_ranhir_indikator`
  MODIFY `id_indikator_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_kebijakan`
--
ALTER TABLE `trx_rkpd_ranhir_kebijakan`
  MODIFY `id_kebijakan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_kebijakan_pd`
--
ALTER TABLE `trx_rkpd_ranhir_kebijakan_pd`
  MODIFY `id_kebijakan_pd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_ranhir_kegiatan_pd`
  MODIFY `id_kegiatan_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_ranhir_keg_indikator_pd`
  MODIFY `id_indikator_kegiatan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_lokasi_pd`
--
ALTER TABLE `trx_rkpd_ranhir_lokasi_pd`
  MODIFY `id_lokasi_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_pelaksana`
--
ALTER TABLE `trx_rkpd_ranhir_pelaksana`
  MODIFY `id_pelaksana_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_ranhir_pelaksana_pd`
  MODIFY `id_pelaksana_pd` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_program_pd`
--
ALTER TABLE `trx_rkpd_ranhir_program_pd`
  MODIFY `id_program_pd` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_ranhir_prog_indikator_pd`
  MODIFY `id_indikator_program` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_ranhir_urusan`
--
ALTER TABLE `trx_rkpd_ranhir_urusan`
  MODIFY `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranwal`
--
ALTER TABLE `trx_rkpd_ranwal`
  MODIFY `id_rkpd_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranwal_dokumen`
--
ALTER TABLE `trx_rkpd_ranwal_dokumen`
  MODIFY `id_dokumen_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranwal_indikator`
--
ALTER TABLE `trx_rkpd_ranwal_indikator`
  MODIFY `id_indikator_program_rkpd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_ranwal_kebijakan`
--
ALTER TABLE `trx_rkpd_ranwal_kebijakan`
  MODIFY `id_kebijakan_ranwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranwal_pelaksana`
--
ALTER TABLE `trx_rkpd_ranwal_pelaksana`
  MODIFY `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_ranwal_urusan`
--
ALTER TABLE `trx_rkpd_ranwal_urusan`
  MODIFY `id_urusan_rkpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_renstra`
--
ALTER TABLE `trx_rkpd_renstra`
  MODIFY `id_rkpd_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_renstra_indikator`
--
ALTER TABLE `trx_rkpd_renstra_indikator`
  MODIFY `id_indikator_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_renstra_pelaksana`
--
ALTER TABLE `trx_rkpd_renstra_pelaksana`
  MODIFY `id_pelaksana_renstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rpjmd_kebijakan`
--
ALTER TABLE `trx_rkpd_rpjmd_kebijakan`
  MODIFY `id_kebijakan_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rpjmd_program_indikator`
--
ALTER TABLE `trx_rkpd_rpjmd_program_indikator`
  MODIFY `id_indikator_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rkpd_rpjmd_program_pelaksana`
--
ALTER TABLE `trx_rkpd_rpjmd_program_pelaksana`
  MODIFY `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rkpd_rpjmd_ranwal`
--
ALTER TABLE `trx_rkpd_rpjmd_ranwal`
  MODIFY `id_rkpd_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_analisa_ikk`
--
ALTER TABLE `trx_rpjmd_analisa_ikk`
  MODIFY `id_capaian_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_dokumen`
--
ALTER TABLE `trx_rpjmd_dokumen`
  MODIFY `id_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama';

--
-- AUTO_INCREMENT for table `trx_rpjmd_identifikasi_masalah`
--
ALTER TABLE `trx_rpjmd_identifikasi_masalah`
  MODIFY `id_masalah` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_kebijakan`
--
ALTER TABLE `trx_rpjmd_kebijakan`
  MODIFY `id_kebijakan_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rpjmd_misi`
--
ALTER TABLE `trx_rpjmd_misi`
  MODIFY `id_misi_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_prioritas`
--
ALTER TABLE `trx_rpjmd_prioritas`
  MODIFY `id_masalah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_program`
--
ALTER TABLE `trx_rpjmd_program`
  MODIFY `id_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_program_indikator`
--
ALTER TABLE `trx_rpjmd_program_indikator`
  MODIFY `id_indikator_program_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rpjmd_program_pelaksana`
--
ALTER TABLE `trx_rpjmd_program_pelaksana`
  MODIFY `id_pelaksana_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_program_urusan`
--
ALTER TABLE `trx_rpjmd_program_urusan`
  MODIFY `id_urbid_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_sasaran`
--
ALTER TABLE `trx_rpjmd_sasaran`
  MODIFY `id_sasaran_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_sasaran_indikator`
--
ALTER TABLE `trx_rpjmd_sasaran_indikator`
  MODIFY `id_indikator_sasaran_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rpjmd_strategi`
--
ALTER TABLE `trx_rpjmd_strategi`
  MODIFY `id_strategi_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rpjmd_tujuan`
--
ALTER TABLE `trx_rpjmd_tujuan`
  MODIFY `id_tujuan_rpjmd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_rpjmd_tujuan_indikator`
--
ALTER TABLE `trx_rpjmd_tujuan_indikator`
  MODIFY `id_indikator_tujuan_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'nomor urut indikator sasaran';

--
-- AUTO_INCREMENT for table `trx_rpjmd_visi`
--
ALTER TABLE `trx_rpjmd_visi`
  MODIFY `id_visi_rpjmd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'berisi id khusus untuk setiap visi pada periode yang sama';

--
-- AUTO_INCREMENT for table `trx_usulan_kab`
--
ALTER TABLE `trx_usulan_kab`
  MODIFY `id_usulan_kab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_usulan_rw`
--
ALTER TABLE `trx_usulan_rw`
  MODIFY `id_usulan_rw` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id_app_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_desa`
--
ALTER TABLE `user_desa`
  MODIFY `id_user_wil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_level_sakip`
--
ALTER TABLE `user_level_sakip`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sub_unit`
--
ALTER TABLE `user_sub_unit`
  MODIFY `id_user_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kin_trx_cascading_indikator_kegiatan_pd`
--
ALTER TABLE `kin_trx_cascading_indikator_kegiatan_pd`
  ADD CONSTRAINT `FK_kin_trx_cascading_indikator_kegiatan_pd_kin_1` FOREIGN KEY (`id_hasil_kegiatan`) REFERENCES `kin_trx_cascading_kegiatan_opd` (`id_hasil_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_cascading_indikator_program_pd`
--
ALTER TABLE `kin_trx_cascading_indikator_program_pd`
  ADD CONSTRAINT `FK_kin_trx_cascading_indikator_program_pd_1` FOREIGN KEY (`id_hasil_program`) REFERENCES `kin_trx_cascading_program_opd` (`id_hasil_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_cascading_kegiatan_opd`
--
ALTER TABLE `kin_trx_cascading_kegiatan_opd`
  ADD CONSTRAINT `FK_kin_trx_cascading_kegiatan_opd_kin_trx_cascading_program_opd` FOREIGN KEY (`id_hasil_program`) REFERENCES `kin_trx_cascading_program_opd` (`id_hasil_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_iku_opd_kegiatan`
--
ALTER TABLE `kin_trx_iku_opd_kegiatan`
  ADD CONSTRAINT `kin_trx_iku_opd_kegiatan_ibfk_1` FOREIGN KEY (`id_iku_opd_program`) REFERENCES `kin_trx_iku_opd_program` (`id_iku_opd_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_iku_opd_program`
--
ALTER TABLE `kin_trx_iku_opd_program`
  ADD CONSTRAINT `kin_trx_iku_opd_program_ibfk_1` FOREIGN KEY (`id_iku_opd_sasaran`) REFERENCES `kin_trx_iku_opd_sasaran` (`id_iku_opd_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_iku_opd_sasaran`
--
ALTER TABLE `kin_trx_iku_opd_sasaran`
  ADD CONSTRAINT `kin_trx_iku_opd_sasaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `kin_trx_iku_opd_dok` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_iku_pemda_rinci`
--
ALTER TABLE `kin_trx_iku_pemda_rinci`
  ADD CONSTRAINT `kin_trx_iku_pemda_rinci_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `kin_trx_iku_pemda_dok` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_es3_kegiatan`
--
ALTER TABLE `kin_trx_perkin_es3_kegiatan`
  ADD CONSTRAINT `kin_trx_perkin_es3_kegiatan_ibfk_1` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_es3_program` (`id_perkin_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_es3_program`
--
ALTER TABLE `kin_trx_perkin_es3_program`
  ADD CONSTRAINT `kin_trx_perkin_es3_program_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es3_dok` (`id_dokumen_perkin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kin_trx_perkin_es3_program_ibfk_2` FOREIGN KEY (`id_perkin_program_opd`) REFERENCES `kin_trx_perkin_opd_program` (`id_perkin_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_es3_program_indikator`
--
ALTER TABLE `kin_trx_perkin_es3_program_indikator`
  ADD CONSTRAINT `kin_trx_perkin_es3_program_indikator_ibfk_1` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_es3_program` (`id_perkin_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_es4_kegiatan`
--
ALTER TABLE `kin_trx_perkin_es4_kegiatan`
  ADD CONSTRAINT `kin_trx_perkin_es4_kegiatan_ibfk_1` FOREIGN KEY (`id_perkin_kegiatan_es3`) REFERENCES `kin_trx_perkin_es3_kegiatan` (`id_perkin_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kin_trx_perkin_es4_kegiatan_ibfk_2` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es4_dok` (`id_dokumen_perkin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_es4_kegiatan_indikator`
--
ALTER TABLE `kin_trx_perkin_es4_kegiatan_indikator`
  ADD CONSTRAINT `kin_trx_perkin_es4_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_perkin_kegiatan`) REFERENCES `kin_trx_perkin_es4_kegiatan` (`id_perkin_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_opd_program`
--
ALTER TABLE `kin_trx_perkin_opd_program`
  ADD CONSTRAINT `kin_trx_perkin_opd_program_ibfk_1` FOREIGN KEY (`id_perkin_sasaran`) REFERENCES `kin_trx_perkin_opd_sasaran` (`id_perkin_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_opd_sasaran`
--
ALTER TABLE `kin_trx_perkin_opd_sasaran`
  ADD CONSTRAINT `kin_trx_perkin_opd_sasaran_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_opd_dok` (`id_dokumen_perkin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_perkin_opd_sasaran_indikator`
--
ALTER TABLE `kin_trx_perkin_opd_sasaran_indikator`
  ADD CONSTRAINT `kin_trx_perkin_opd_sasaran_indikator_ibfk_1` FOREIGN KEY (`id_perkin_sasaran`) REFERENCES `kin_trx_perkin_opd_sasaran` (`id_perkin_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_real_es2_dok`
--
ALTER TABLE `kin_trx_real_es2_dok`
  ADD CONSTRAINT `kin_trx_real_es2_dok_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_opd_dok` (`id_dokumen_perkin`),
  ADD CONSTRAINT `kin_trx_real_es2_dok_ibfk_2` FOREIGN KEY (`id_sotk_es2`) REFERENCES `ref_sotk_level_1` (`id_sotk_es2`);

--
-- Constraints for table `kin_trx_real_es2_program`
--
ALTER TABLE `kin_trx_real_es2_program`
  ADD CONSTRAINT `kin_trx_real_es2_program_ibfk_1` FOREIGN KEY (`id_real_sasaran`) REFERENCES `kin_trx_real_es2_sasaran` (`id_real_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kin_trx_real_es2_program_ibfk_2` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_opd_program` (`id_perkin_program`),
  ADD CONSTRAINT `kin_trx_real_es2_program_ibfk_3` FOREIGN KEY (`id_real_program_es3`) REFERENCES `kin_trx_real_es3_program` (`id_real_program`);

--
-- Constraints for table `kin_trx_real_es2_sasaran`
--
ALTER TABLE `kin_trx_real_es2_sasaran`
  ADD CONSTRAINT `kin_trx_real_es2_sasaran_ibfk_1` FOREIGN KEY (`id_dokumen_real`) REFERENCES `kin_trx_real_es2_dok` (`id_dokumen_real`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_real_es2_sasaran_indikator`
--
ALTER TABLE `kin_trx_real_es2_sasaran_indikator`
  ADD CONSTRAINT `kin_trx_real_es2_sasaran_indikator_ibfk_1` FOREIGN KEY (`id_real_sasaran`) REFERENCES `kin_trx_real_es2_sasaran` (`id_real_sasaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_real_es3_dok`
--
ALTER TABLE `kin_trx_real_es3_dok`
  ADD CONSTRAINT `kin_trx_real_es3_dok_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es3_dok` (`id_dokumen_perkin`),
  ADD CONSTRAINT `kin_trx_real_es3_dok_ibfk_2` FOREIGN KEY (`id_sotk_es3`) REFERENCES `ref_sotk_level_2` (`id_sotk_es3`);

--
-- Constraints for table `kin_trx_real_es3_kegiatan`
--
ALTER TABLE `kin_trx_real_es3_kegiatan`
  ADD CONSTRAINT `kin_trx_real_es3_kegiatan_ibfk_1` FOREIGN KEY (`id_real_program`) REFERENCES `kin_trx_real_es3_program` (`id_real_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kin_trx_real_es3_kegiatan_ibfk_2` FOREIGN KEY (`id_real_kegiatan_es4`) REFERENCES `kin_trx_real_es4_kegiatan` (`id_real_kegiatan`);

--
-- Constraints for table `kin_trx_real_es3_program`
--
ALTER TABLE `kin_trx_real_es3_program`
  ADD CONSTRAINT `kin_trx_real_es3_program_ibfk_1` FOREIGN KEY (`id_dokumen_real`) REFERENCES `kin_trx_real_es3_dok` (`id_dokumen_real`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kin_trx_real_es3_program_ibfk_2` FOREIGN KEY (`id_perkin_program`) REFERENCES `kin_trx_perkin_es3_program` (`id_perkin_program`);

--
-- Constraints for table `kin_trx_real_es3_program_indikator`
--
ALTER TABLE `kin_trx_real_es3_program_indikator`
  ADD CONSTRAINT `kin_trx_real_es3_program_indikator_ibfk_1` FOREIGN KEY (`id_real_program`) REFERENCES `kin_trx_real_es3_program` (`id_real_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kin_trx_real_es4_dok`
--
ALTER TABLE `kin_trx_real_es4_dok`
  ADD CONSTRAINT `kin_trx_real_es4_dok_ibfk_1` FOREIGN KEY (`id_dokumen_perkin`) REFERENCES `kin_trx_perkin_es4_dok` (`id_dokumen_perkin`),
  ADD CONSTRAINT `kin_trx_real_es4_dok_ibfk_2` FOREIGN KEY (`id_sotk_es4`) REFERENCES `ref_sotk_level_3` (`id_sotk_es4`);

--
-- Constraints for table `kin_trx_real_es4_kegiatan`
--
ALTER TABLE `kin_trx_real_es4_kegiatan`
  ADD CONSTRAINT `kin_trx_real_es4_kegiatan_ibfk_1` FOREIGN KEY (`id_dokumen_real`) REFERENCES `kin_trx_real_es4_dok` (`id_dokumen_real`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kin_trx_real_es4_kegiatan_ibfk_2` FOREIGN KEY (`id_perkin_kegiatan`) REFERENCES `kin_trx_perkin_es4_kegiatan` (`id_perkin_kegiatan`);

--
-- Constraints for table `kin_trx_real_es4_kegiatan_indikator`
--
ALTER TABLE `kin_trx_real_es4_kegiatan_indikator`
  ADD CONSTRAINT `kin_trx_real_es4_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_real_kegiatan`) REFERENCES `kin_trx_real_es4_kegiatan` (`id_real_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_bidang`
--
ALTER TABLE `ref_bidang`
  ADD CONSTRAINT `fk_ref_bidang` FOREIGN KEY (`kd_urusan`) REFERENCES `ref_urusan` (`kd_urusan`),
  ADD CONSTRAINT `fk_ref_fungsi` FOREIGN KEY (`kd_fungsi`) REFERENCES `ref_fungsi` (`kd_fungsi`);

--
-- Constraints for table `ref_data_sub_unit`
--
ALTER TABLE `ref_data_sub_unit`
  ADD CONSTRAINT `fk_data_sub_unit` FOREIGN KEY (`id_sub_unit`) REFERENCES `ref_sub_unit` (`id_sub_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_desa`
--
ALTER TABLE `ref_desa`
  ADD CONSTRAINT `ref_desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `ref_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD CONSTRAINT `fk_ref_kecamatan` FOREIGN KEY (`id_pemda`) REFERENCES `ref_kabupaten` (`id_kab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_kegiatan`
--
ALTER TABLE `ref_kegiatan`
  ADD CONSTRAINT `fk_ref_kegiatan` FOREIGN KEY (`id_program`) REFERENCES `ref_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_kolom_tabel_dasar`
--
ALTER TABLE `ref_kolom_tabel_dasar`
  ADD CONSTRAINT `ref_kolom_tabel_dasar_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `ref_kolom_tabel_dasar` (`id_kolom_tabel_dasar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_kolom_tabel_dasar_ibfk_2` FOREIGN KEY (`id_tabel_dasar`) REFERENCES `ref_tabel_dasar` (`id_tabel_dasar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_mapping_asb_renstra`
--
ALTER TABLE `ref_mapping_asb_renstra`
  ADD CONSTRAINT `fk_ref_mapping_asb_renstra` FOREIGN KEY (`id_aktivitas_asb`) REFERENCES `trx_asb_aktivitas` (`id_aktivitas_asb`),
  ADD CONSTRAINT `fk_ref_mapping_asb_renstra1` FOREIGN KEY (`id_kegiatan_renstra`) REFERENCES `trx_renstra_kegiatan` (`id_kegiatan_renstra`);

--
-- Constraints for table `ref_pegawai_pangkat`
--
ALTER TABLE `ref_pegawai_pangkat`
  ADD CONSTRAINT `ref_pegawai_pangkat_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `ref_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_pegawai_unit`
--
ALTER TABLE `ref_pegawai_unit`
  ADD CONSTRAINT `ref_pegawai_unit_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `ref_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_pegawai_unit_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_program`
--
ALTER TABLE `ref_program`
  ADD CONSTRAINT `fk_ref_program` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`);

--
-- Constraints for table `ref_rek_2`
--
ALTER TABLE `ref_rek_2`
  ADD CONSTRAINT `fk_ref_rek_2` FOREIGN KEY (`kd_rek_1`) REFERENCES `ref_rek_1` (`kd_rek_1`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ref_rek_3`
--
ALTER TABLE `ref_rek_3`
  ADD CONSTRAINT `fk_ref_rek_3` FOREIGN KEY (`kd_rek_1`,`kd_rek_2`) REFERENCES `ref_rek_2` (`kd_rek_1`, `kd_rek_2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ref_rek_4`
--
ALTER TABLE `ref_rek_4`
  ADD CONSTRAINT `fk_ref_rek_4` FOREIGN KEY (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`) REFERENCES `ref_rek_3` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ref_rek_5`
--
ALTER TABLE `ref_rek_5`
  ADD CONSTRAINT `ref_rek_5_ibfk_1` FOREIGN KEY (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`,`kd_rek_4`) REFERENCES `ref_rek_4` (`kd_rek_1`, `kd_rek_2`, `kd_rek_3`, `kd_rek_4`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_sotk_level_1`
--
ALTER TABLE `ref_sotk_level_1`
  ADD CONSTRAINT `ref_sotk_level_1_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_sotk_level_2`
--
ALTER TABLE `ref_sotk_level_2`
  ADD CONSTRAINT `ref_sotk_level_2_ibfk_1` FOREIGN KEY (`id_sotk_es2`) REFERENCES `ref_sotk_level_1` (`id_sotk_es2`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_sotk_level_3`
--
ALTER TABLE `ref_sotk_level_3`
  ADD CONSTRAINT `ref_sotk_level_3_ibfk_1` FOREIGN KEY (`id_sotk_es3`) REFERENCES `ref_sotk_level_2` (`id_sotk_es3`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_kelompok`
--
ALTER TABLE `ref_ssh_kelompok`
  ADD CONSTRAINT `fk_ssh_kelompok` FOREIGN KEY (`id_golongan_ssh`) REFERENCES `ref_ssh_golongan` (`id_golongan_ssh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_perkada_tarif`
--
ALTER TABLE `ref_ssh_perkada_tarif`
  ADD CONSTRAINT `fk_ref_tarif_jumlah` FOREIGN KEY (`id_tarif_ssh`) REFERENCES `ref_ssh_tarif` (`id_tarif_ssh`),
  ADD CONSTRAINT `fk_ref_tarif_jumlah_1` FOREIGN KEY (`id_zona_perkada`) REFERENCES `ref_ssh_perkada_zona` (`id_zona_perkada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_perkada_zona`
--
ALTER TABLE `ref_ssh_perkada_zona`
  ADD CONSTRAINT `FK_ref_ssh_perkada_zona_ref_ssh_zona` FOREIGN KEY (`id_zona`) REFERENCES `ref_ssh_zona` (`id_zona`),
  ADD CONSTRAINT `FK_ref_ssh_perkada_zona_ref_ssh_zona_1` FOREIGN KEY (`id_perkada`) REFERENCES `ref_ssh_perkada` (`id_perkada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_rekening`
--
ALTER TABLE `ref_ssh_rekening`
  ADD CONSTRAINT `fk_ref_ssh_rekening` FOREIGN KEY (`id_tarif_ssh`) REFERENCES `ref_ssh_tarif` (`id_tarif_ssh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_sub_kelompok`
--
ALTER TABLE `ref_ssh_sub_kelompok`
  ADD CONSTRAINT `fk_ref_ssh_sub_kelompok` FOREIGN KEY (`id_kelompok_ssh`) REFERENCES `ref_ssh_kelompok` (`id_kelompok_ssh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_tarif`
--
ALTER TABLE `ref_ssh_tarif`
  ADD CONSTRAINT `fk_ref_ssh_tarif` FOREIGN KEY (`id_sub_kelompok_ssh`) REFERENCES `ref_ssh_sub_kelompok` (`id_sub_kelompok_ssh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_ssh_zona_lokasi`
--
ALTER TABLE `ref_ssh_zona_lokasi`
  ADD CONSTRAINT `fk_zona_lokasi` FOREIGN KEY (`id_zona`) REFERENCES `ref_ssh_zona` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_sub_unit`
--
ALTER TABLE `ref_sub_unit`
  ADD CONSTRAINT `fk_ref_sub_unit` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`);

--
-- Constraints for table `ref_unit`
--
ALTER TABLE `ref_unit`
  ADD CONSTRAINT `fk_ref_unit` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`);

--
-- Constraints for table `trx_anggaran_aktivitas_pd`
--
ALTER TABLE `trx_anggaran_aktivitas_pd`
  ADD CONSTRAINT `FK_trx_anggaran_aktivitas_pd_trx_anggaran_pelaksana_pd` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_anggaran_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_belanja_pd`
--
ALTER TABLE `trx_anggaran_belanja_pd`
  ADD CONSTRAINT `FK_trx_anggaran_belanja_pd_trx_anggaran_aktivitas_pd` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_anggaran_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_indikator`
--
ALTER TABLE `trx_anggaran_indikator`
  ADD CONSTRAINT `FK_trx_anggaran_indikator_trx_anggaran_program` FOREIGN KEY (`id_anggaran_pemda`) REFERENCES `trx_anggaran_program` (`id_anggaran_pemda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_kegiatan_pd`
--
ALTER TABLE `trx_anggaran_kegiatan_pd`
  ADD CONSTRAINT `FK_trx_anggaran_kegiatan_pd_trx_anggaran_program_pd` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_anggaran_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_keg_indikator_pd`
--
ALTER TABLE `trx_anggaran_keg_indikator_pd`
  ADD CONSTRAINT `FK_trx_anggaran_keg_indikator_pd_trx_anggaran_kegiatan_pd` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_anggaran_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_lokasi_pd`
--
ALTER TABLE `trx_anggaran_lokasi_pd`
  ADD CONSTRAINT `FK_trx_anggaran_lokasi_pd_trx_anggaran_aktivitas_pd` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_anggaran_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_pelaksana`
--
ALTER TABLE `trx_anggaran_pelaksana`
  ADD CONSTRAINT `FK_trx_anggaran_pelaksana_trx_anggaran_program` FOREIGN KEY (`id_anggaran_pemda`) REFERENCES `trx_anggaran_program` (`id_anggaran_pemda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_pelaksana_pd`
--
ALTER TABLE `trx_anggaran_pelaksana_pd`
  ADD CONSTRAINT `FK_trx_anggaran_pelaksana_pd_trx_anggaran_kegiatan_pd` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_anggaran_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_program`
--
ALTER TABLE `trx_anggaran_program`
  ADD CONSTRAINT `FK_trx_anggaran_program_trx_anggaran_dokumen` FOREIGN KEY (`id_dokumen_keu`) REFERENCES `trx_anggaran_dokumen` (`id_dokumen_keu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_program_pd`
--
ALTER TABLE `trx_anggaran_program_pd`
  ADD CONSTRAINT `FK_trx_anggaran_program_pd_trx_anggaran_pelaksana` FOREIGN KEY (`id_pelaksana_anggaran`) REFERENCES `trx_anggaran_pelaksana` (`id_pelaksana_anggaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_prog_indikator_pd`
--
ALTER TABLE `trx_anggaran_prog_indikator_pd`
  ADD CONSTRAINT `FK_trx_anggaran_prog_indikator_pd_trx_anggaran_program_pd` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_anggaran_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_tapd`
--
ALTER TABLE `trx_anggaran_tapd`
  ADD CONSTRAINT `trx_anggaran_tapd_ibfk_1` FOREIGN KEY (`id_dokumen_keu`) REFERENCES `trx_anggaran_dokumen` (`id_dokumen_keu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_anggaran_tapd_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `ref_pegawai` (`id_pegawai`);

--
-- Constraints for table `trx_anggaran_tapd_unit`
--
ALTER TABLE `trx_anggaran_tapd_unit`
  ADD CONSTRAINT `trx_anggaran_tapd_unit_ibfk_1` FOREIGN KEY (`id_tapd`) REFERENCES `trx_anggaran_tapd` (`id_tapd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_anggaran_unit_kpa`
--
ALTER TABLE `trx_anggaran_unit_kpa`
  ADD CONSTRAINT `trx_anggaran_unit_kpa_ibfk_1` FOREIGN KEY (`id_pa`) REFERENCES `trx_anggaran_unit_pa` (`id_pa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_anggaran_unit_kpa_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `ref_pegawai` (`id_pegawai`);

--
-- Constraints for table `trx_anggaran_unit_pa`
--
ALTER TABLE `trx_anggaran_unit_pa`
  ADD CONSTRAINT `trx_anggaran_unit_pa_ibfk_1` FOREIGN KEY (`id_dokumen_keu`) REFERENCES `trx_anggaran_dokumen` (`id_dokumen_keu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_anggaran_unit_pa_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `ref_pegawai` (`id_pegawai`);

--
-- Constraints for table `trx_anggaran_urusan`
--
ALTER TABLE `trx_anggaran_urusan`
  ADD CONSTRAINT `FK_trx_anggaran_urusan_trx_anggaran_program` FOREIGN KEY (`id_anggaran_pemda`) REFERENCES `trx_anggaran_program` (`id_anggaran_pemda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_aktivitas`
--
ALTER TABLE `trx_asb_aktivitas`
  ADD CONSTRAINT `FK_trx_asb_aktivitas_trx_asb_sub_sub_kelompok` FOREIGN KEY (`id_asb_sub_sub_kelompok`) REFERENCES `trx_asb_sub_sub_kelompok` (`id_asb_sub_sub_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_kelompok`
--
ALTER TABLE `trx_asb_kelompok`
  ADD CONSTRAINT `FK_trx_asb_cluster_trx_asb_perkada` FOREIGN KEY (`id_asb_perkada`) REFERENCES `trx_asb_perkada` (`id_asb_perkada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_komponen`
--
ALTER TABLE `trx_asb_komponen`
  ADD CONSTRAINT `FK_trx_asb_komponen_trx_asb_aktivitas` FOREIGN KEY (`id_aktivitas_asb`) REFERENCES `trx_asb_aktivitas` (`id_aktivitas_asb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_komponen_rinci`
--
ALTER TABLE `trx_asb_komponen_rinci`
  ADD CONSTRAINT `FK_trx_asb_komponen_rinci_ref_ssh_tarif` FOREIGN KEY (`id_tarif_ssh`) REFERENCES `ref_ssh_tarif` (`id_tarif_ssh`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_trx_asb_komponen_rinci_trx_asb_komponen` FOREIGN KEY (`id_komponen_asb`) REFERENCES `trx_asb_komponen` (`id_komponen_asb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_perhitungan_rinci`
--
ALTER TABLE `trx_asb_perhitungan_rinci`
  ADD CONSTRAINT `trx_asb_perhitungan_rinci_ibfk_1` FOREIGN KEY (`id_perhitungan`) REFERENCES `trx_asb_perhitungan` (`id_perhitungan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_sub_kelompok`
--
ALTER TABLE `trx_asb_sub_kelompok`
  ADD CONSTRAINT `trx_asb_sub_kelompok_ibfk_1` FOREIGN KEY (`id_asb_kelompok`) REFERENCES `trx_asb_kelompok` (`id_asb_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_asb_sub_sub_kelompok`
--
ALTER TABLE `trx_asb_sub_sub_kelompok`
  ADD CONSTRAINT `FK_trx_asb_sub_sub_kelompok_trx_asb_sub_kelompok` FOREIGN KEY (`id_asb_sub_kelompok`) REFERENCES `trx_asb_sub_kelompok` (`id_asb_sub_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd`
--
ALTER TABLE `trx_forum_skpd`
  ADD CONSTRAINT `FK_trx_forum_skpd_trx_forum_skpd_program` FOREIGN KEY (`id_forum_program`) REFERENCES `trx_forum_skpd_program` (`id_forum_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_aktivitas`
--
ALTER TABLE `trx_forum_skpd_aktivitas`
  ADD CONSTRAINT `FK_trx_forum_skpd_aktivitas_trx_forum_skpd` FOREIGN KEY (`id_forum_skpd`) REFERENCES `trx_forum_skpd_pelaksana` (`id_pelaksana_forum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_belanja`
--
ALTER TABLE `trx_forum_skpd_belanja`
  ADD CONSTRAINT `trx_forum_skpd_belanja_ibfk_1` FOREIGN KEY (`id_lokasi_forum`) REFERENCES `trx_forum_skpd_aktivitas` (`id_aktivitas_forum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_kegiatan_indikator`
--
ALTER TABLE `trx_forum_skpd_kegiatan_indikator`
  ADD CONSTRAINT `trx_forum_skpd_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_forum_skpd`) REFERENCES `trx_forum_skpd` (`id_forum_skpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_lokasi`
--
ALTER TABLE `trx_forum_skpd_lokasi`
  ADD CONSTRAINT `trx_forum_skpd_lokasi_ibfk_1` FOREIGN KEY (`id_pelaksana_forum`) REFERENCES `trx_forum_skpd_aktivitas` (`id_aktivitas_forum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_pelaksana`
--
ALTER TABLE `trx_forum_skpd_pelaksana`
  ADD CONSTRAINT `trx_forum_skpd_pelaksana_ibfk_1` FOREIGN KEY (`id_aktivitas_forum`) REFERENCES `trx_forum_skpd` (`id_forum_skpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_program`
--
ALTER TABLE `trx_forum_skpd_program`
  ADD CONSTRAINT `FK_trx_forum_skpd_program_trx_forum_skpd_program_ranwal` FOREIGN KEY (`id_forum_rkpdprog`) REFERENCES `trx_forum_skpd_program_ranwal` (`id_forum_rkpdprog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_program_indikator`
--
ALTER TABLE `trx_forum_skpd_program_indikator`
  ADD CONSTRAINT `trx_forum_skpd_program_indikator_ibfk_1` FOREIGN KEY (`id_forum_program`) REFERENCES `trx_forum_skpd_program` (`id_forum_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_forum_skpd_usulan`
--
ALTER TABLE `trx_forum_skpd_usulan`
  ADD CONSTRAINT `FK_trx_forum_skpd_usulan_trx_forum_skpd_lokasi` FOREIGN KEY (`id_lokasi_forum`) REFERENCES `trx_forum_skpd_lokasi` (`id_lokasi_forum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_isian_data_dasar`
--
ALTER TABLE `trx_isian_data_dasar`
  ADD CONSTRAINT `trx_isian_data_dasar_ibfk_1` FOREIGN KEY (`id_kolom_tabel_dasar`) REFERENCES `ref_kolom_tabel_dasar` (`id_kolom_tabel_dasar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_isian_data_dasar_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `ref_kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrencam`
--
ALTER TABLE `trx_musrencam`
  ADD CONSTRAINT `trx_musrencam_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrencam_lokasi`
--
ALTER TABLE `trx_musrencam_lokasi`
  ADD CONSTRAINT `trx_musrencam_lokasi_ibfk_1` FOREIGN KEY (`id_musrencam`) REFERENCES `trx_musrencam` (`id_musrencam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrendes`
--
ALTER TABLE `trx_musrendes`
  ADD CONSTRAINT `fk_trx_musrendes` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrendes_lokasi`
--
ALTER TABLE `trx_musrendes_lokasi`
  ADD CONSTRAINT `fk_trx_musrendes_lokasi` FOREIGN KEY (`id_musrendes`) REFERENCES `trx_musrendes` (`id_musrendes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrendes_rw`
--
ALTER TABLE `trx_musrendes_rw`
  ADD CONSTRAINT `trx_musrendes_rw_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_aktivitas_pd`
--
ALTER TABLE `trx_musrenkab_aktivitas_pd`
  ADD CONSTRAINT `trx_musrenkab_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_musrenkab_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_belanja_pd`
--
ALTER TABLE `trx_musrenkab_belanja_pd`
  ADD CONSTRAINT `trx_musrenkab_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_musrenkab_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_indikator`
--
ALTER TABLE `trx_musrenkab_indikator`
  ADD CONSTRAINT `trx_musrenkab_indikator_ibfk_1` FOREIGN KEY (`id_musrenkab`) REFERENCES `trx_musrenkab` (`id_musrenkab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_kegiatan_pd`
--
ALTER TABLE `trx_musrenkab_kegiatan_pd`
  ADD CONSTRAINT `trx_musrenkab_kegiatan_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_musrenkab_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_keg_indikator_pd`
--
ALTER TABLE `trx_musrenkab_keg_indikator_pd`
  ADD CONSTRAINT `trx_musrenkab_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_musrenkab_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_lokasi_pd`
--
ALTER TABLE `trx_musrenkab_lokasi_pd`
  ADD CONSTRAINT `trx_musrenkab_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_musrenkab_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_pelaksana`
--
ALTER TABLE `trx_musrenkab_pelaksana`
  ADD CONSTRAINT `trx_musrenkab_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_musrenkab_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_musrenkab_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_pelaksana_pd`
--
ALTER TABLE `trx_musrenkab_pelaksana_pd`
  ADD CONSTRAINT `trx_musrenkab_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_musrenkab_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_program_pd`
--
ALTER TABLE `trx_musrenkab_program_pd`
  ADD CONSTRAINT `trx_musrenkab_program_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_rkpd`) REFERENCES `trx_musrenkab_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_prog_indikator_pd`
--
ALTER TABLE `trx_musrenkab_prog_indikator_pd`
  ADD CONSTRAINT `trx_musrenkab_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_musrenkab_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_musrenkab_urusan`
--
ALTER TABLE `trx_musrenkab_urusan`
  ADD CONSTRAINT `trx_musrenkab_urusan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_musrenkab_urusan_ibfk_2` FOREIGN KEY (`id_musrenkab`) REFERENCES `trx_musrenkab` (`id_musrenkab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_pokir_lokasi`
--
ALTER TABLE `trx_pokir_lokasi`
  ADD CONSTRAINT `trx_pokir_lokasi_ibfk_1` FOREIGN KEY (`id_pokir_usulan`) REFERENCES `trx_pokir_usulan` (`id_pokir_usulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_pokir_tl`
--
ALTER TABLE `trx_pokir_tl`
  ADD CONSTRAINT `trx_pokir_tl_ibfk_1` FOREIGN KEY (`id_pokir_usulan`) REFERENCES `trx_pokir_usulan` (`id_pokir_usulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_pokir_tl_unit`
--
ALTER TABLE `trx_pokir_tl_unit`
  ADD CONSTRAINT `trx_pokir_tl_unit_ibfk_1` FOREIGN KEY (`id_pokir_tl`) REFERENCES `trx_pokir_tl` (`id_pokir_tl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_pokir_usulan`
--
ALTER TABLE `trx_pokir_usulan`
  ADD CONSTRAINT `trx_pokir_usulan_ibfk_1` FOREIGN KEY (`id_pokir`) REFERENCES `trx_pokir` (`id_pokir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_pokir_usulan_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trx_prioritas_pemda`
--
ALTER TABLE `trx_prioritas_pemda`
  ADD CONSTRAINT `trx_prioritas_pemda_ibfk_1` FOREIGN KEY (`id_tema_rkpd`) REFERENCES `trx_prioritas_pemda_tema` (`id_tema_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_program_nasional`
--
ALTER TABLE `trx_program_nasional`
  ADD CONSTRAINT `trx_program_nasional_ibfk_1` FOREIGN KEY (`id_prioritas`) REFERENCES `trx_prioritas_nasional` (`id_prioritas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_program_nasional_detail`
--
ALTER TABLE `trx_program_nasional_detail`
  ADD CONSTRAINT `trx_program_nasional_detail_ibfk_1` FOREIGN KEY (`id_prognas_unit`) REFERENCES `trx_program_nasional_unit` (`id_prognas_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_program_nasional_unit`
--
ALTER TABLE `trx_program_nasional_unit`
  ADD CONSTRAINT `trx_program_nasional_unit_ibfk_1` FOREIGN KEY (`id_prognas`) REFERENCES `trx_program_nasional` (`id_prognas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_program_provinsi`
--
ALTER TABLE `trx_program_provinsi`
  ADD CONSTRAINT `trx_program_provinsi_ibfk_1` FOREIGN KEY (`id_prioritas`) REFERENCES `trx_prioritas_provinsi` (`id_prioritas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_program_provinsi_detail`
--
ALTER TABLE `trx_program_provinsi_detail`
  ADD CONSTRAINT `trx_program_provinsi_detail_ibfk_1` FOREIGN KEY (`id_progprov_unit`) REFERENCES `trx_program_provinsi_unit` (`id_progprov_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_program_provinsi_unit`
--
ALTER TABLE `trx_program_provinsi_unit`
  ADD CONSTRAINT `trx_program_provinsi_unit_ibfk_1` FOREIGN KEY (`id_progprov`) REFERENCES `trx_program_provinsi` (`id_progprov`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_aktivitas`
--
ALTER TABLE `trx_renja_aktivitas`
  ADD CONSTRAINT `trx_renja_aktivitas_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_pelaksana` (`id_pelaksana_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_belanja`
--
ALTER TABLE `trx_renja_belanja`
  ADD CONSTRAINT `trx_renja_belanja_ibfk_1` FOREIGN KEY (`id_lokasi_renja`) REFERENCES `trx_renja_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_kebijakan`
--
ALTER TABLE `trx_renja_kebijakan`
  ADD CONSTRAINT `trx_renja_kebijakan_ibfk_1` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renja_rancangan` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_kegiatan`
--
ALTER TABLE `trx_renja_kegiatan`
  ADD CONSTRAINT `trx_renja_kegiatan_ibfk_2` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_renja_kegiatan_ibfk_3` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_renja_kegiatan_ibfk_4` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_kegiatan_indikator`
--
ALTER TABLE `trx_renja_kegiatan_indikator`
  ADD CONSTRAINT `trx_renja_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_lokasi`
--
ALTER TABLE `trx_renja_lokasi`
  ADD CONSTRAINT `trx_renja_lokasi_ibfk_1` FOREIGN KEY (`id_pelaksana_renja`) REFERENCES `trx_renja_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_pelaksana`
--
ALTER TABLE `trx_renja_pelaksana`
  ADD CONSTRAINT `trx_renja_pelaksana_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_program_indikator`
--
ALTER TABLE `trx_renja_program_indikator`
  ADD CONSTRAINT `trx_renja_program_indikator_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan`
--
ALTER TABLE `trx_renja_rancangan`
  ADD CONSTRAINT `FK_trx_renja_rancangan_trx_renja_rancangan_program` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_rancangan_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trx_rancangan_renja_1` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_aktivitas`
--
ALTER TABLE `trx_renja_rancangan_aktivitas`
  ADD CONSTRAINT `trx_renja_rancangan_aktivitas_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_rancangan_pelaksana` (`id_pelaksana_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_belanja`
--
ALTER TABLE `trx_renja_rancangan_belanja`
  ADD CONSTRAINT `FK_trx_renja_rancangan_belanja_trx_renja_rancangan_lokasi` FOREIGN KEY (`id_lokasi_renja`) REFERENCES `trx_renja_rancangan_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_indikator`
--
ALTER TABLE `trx_renja_rancangan_indikator`
  ADD CONSTRAINT `FK_trx_renja_rancangan_indikator_trx_renja_rancangan` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_rancangan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_kebijakan`
--
ALTER TABLE `trx_renja_rancangan_kebijakan`
  ADD CONSTRAINT `fk_trx_renja_rancangan_kebijakan` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renja_rancangan` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_lokasi`
--
ALTER TABLE `trx_renja_rancangan_lokasi`
  ADD CONSTRAINT `fk_rancangan_renja_lokasi` FOREIGN KEY (`id_pelaksana_renja`) REFERENCES `trx_renja_rancangan_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_pelaksana`
--
ALTER TABLE `trx_renja_rancangan_pelaksana`
  ADD CONSTRAINT `fk_trx_rancangan_renja_pelaksana` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_rancangan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_program_indikator`
--
ALTER TABLE `trx_renja_rancangan_program_indikator`
  ADD CONSTRAINT `trx_renja_rancangan_program_indikator_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_rancangan_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_rancangan_ref_pokir`
--
ALTER TABLE `trx_renja_rancangan_ref_pokir`
  ADD CONSTRAINT `trx_renja_rancangan_ref_pokir_ibfk_1` FOREIGN KEY (`id_aktivitas_renja`) REFERENCES `trx_renja_rancangan_aktivitas` (`id_aktivitas_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_ranwal_aktivitas`
--
ALTER TABLE `trx_renja_ranwal_aktivitas`
  ADD CONSTRAINT `trx_renja_ranwal_aktivitas_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_pelaksana` (`id_pelaksana_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_ranwal_kegiatan`
--
ALTER TABLE `trx_renja_ranwal_kegiatan`
  ADD CONSTRAINT `trx_renja_ranwal_kegiatan_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_ranwal_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_ranwal_kegiatan_indikator`
--
ALTER TABLE `trx_renja_ranwal_kegiatan_indikator`
  ADD CONSTRAINT `trx_renja_ranwal_kegiatan_indikator_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_ranwal_pelaksana`
--
ALTER TABLE `trx_renja_ranwal_pelaksana`
  ADD CONSTRAINT `trx_renja_ranwal_pelaksana_ibfk_1` FOREIGN KEY (`id_renja`) REFERENCES `trx_renja_ranwal_kegiatan` (`id_renja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_ranwal_program`
--
ALTER TABLE `trx_renja_ranwal_program`
  ADD CONSTRAINT `trx_renja_ranwal_program_ibfk_1` FOREIGN KEY (`id_renja_ranwal`) REFERENCES `trx_renja_ranwal_program_rkpd` (`id_renja_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renja_ranwal_program_indikator`
--
ALTER TABLE `trx_renja_ranwal_program_indikator`
  ADD CONSTRAINT `trx_renja_ranwal_program_indikator_ibfk_1` FOREIGN KEY (`id_renja_program`) REFERENCES `trx_renja_ranwal_program` (`id_renja_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_dokumen`
--
ALTER TABLE `trx_renstra_dokumen`
  ADD CONSTRAINT `fk_trx_renstra_dokumen` FOREIGN KEY (`id_rpjmd`) REFERENCES `trx_rpjmd_dokumen` (`id_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trx_renstra_dokumen_1` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_kebijakan`
--
ALTER TABLE `trx_renstra_kebijakan`
  ADD CONSTRAINT `fk_trx_renstra_kebijakan` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_kegiatan`
--
ALTER TABLE `trx_renstra_kegiatan`
  ADD CONSTRAINT `fk_trx_renstra_kegiatan` FOREIGN KEY (`id_program_renstra`) REFERENCES `trx_renstra_program` (`id_program_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_kegiatan_indikator`
--
ALTER TABLE `trx_renstra_kegiatan_indikator`
  ADD CONSTRAINT `fk_trx_renstra_kegiatan_indikator` FOREIGN KEY (`id_kegiatan_renstra`) REFERENCES `trx_renstra_kegiatan` (`id_kegiatan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_kegiatan_pelaksana`
--
ALTER TABLE `trx_renstra_kegiatan_pelaksana`
  ADD CONSTRAINT `fk_trx_renstra_kegiatan_pelaksana` FOREIGN KEY (`id_kegiatan_renstra`) REFERENCES `trx_renstra_kegiatan` (`id_kegiatan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_misi`
--
ALTER TABLE `trx_renstra_misi`
  ADD CONSTRAINT `fk_trx_renstra_misi` FOREIGN KEY (`id_visi_renstra`) REFERENCES `trx_renstra_visi` (`id_visi_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_program`
--
ALTER TABLE `trx_renstra_program`
  ADD CONSTRAINT `fk_trx_renstra_program` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trx_renstra_program_1` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_program_indikator`
--
ALTER TABLE `trx_renstra_program_indikator`
  ADD CONSTRAINT `fk_trx_renstra_program_indikator` FOREIGN KEY (`id_program_renstra`) REFERENCES `trx_renstra_program` (`id_program_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_sasaran`
--
ALTER TABLE `trx_renstra_sasaran`
  ADD CONSTRAINT `fk_trx_renstra_sasaran` FOREIGN KEY (`id_tujuan_renstra`) REFERENCES `trx_renstra_tujuan` (`id_tujuan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_sasaran_indikator`
--
ALTER TABLE `trx_renstra_sasaran_indikator`
  ADD CONSTRAINT `fk_trx_renstra_sasaran_indikator` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_strategi`
--
ALTER TABLE `trx_renstra_strategi`
  ADD CONSTRAINT `fk_trx_renstra_strategi` FOREIGN KEY (`id_sasaran_renstra`) REFERENCES `trx_renstra_sasaran` (`id_sasaran_renstra`);

--
-- Constraints for table `trx_renstra_tujuan`
--
ALTER TABLE `trx_renstra_tujuan`
  ADD CONSTRAINT `fk_trx_renstra_tujuan` FOREIGN KEY (`id_misi_renstra`) REFERENCES `trx_renstra_misi` (`id_misi_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_tujuan_indikator`
--
ALTER TABLE `trx_renstra_tujuan_indikator`
  ADD CONSTRAINT `trx_renstra_tujuan_indikator_ibfk_1` FOREIGN KEY (`id_tujuan_renstra`) REFERENCES `trx_renstra_tujuan` (`id_tujuan_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_renstra_visi`
--
ALTER TABLE `trx_renstra_visi`
  ADD CONSTRAINT `FK_trx_renstra_visi_ref_unit` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_final_aktivitas_pd`
  ADD CONSTRAINT `trx_rkpd_final_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_rkpd_final_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_belanja_pd`
--
ALTER TABLE `trx_rkpd_final_belanja_pd`
  ADD CONSTRAINT `trx_rkpd_final_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_final_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_indikator`
--
ALTER TABLE `trx_rkpd_final_indikator`
  ADD CONSTRAINT `trx_rkpd_final_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_final` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_final_kegiatan_pd`
  ADD CONSTRAINT `trx_rkpd_final_kegiatan_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_final_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_final_keg_indikator_pd`
  ADD CONSTRAINT `trx_rkpd_final_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_final_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_lokasi_pd`
--
ALTER TABLE `trx_rkpd_final_lokasi_pd`
  ADD CONSTRAINT `trx_rkpd_final_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_final_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_pelaksana`
--
ALTER TABLE `trx_rkpd_final_pelaksana`
  ADD CONSTRAINT `trx_rkpd_final_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_final_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_final_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_final_pelaksana_pd`
  ADD CONSTRAINT `trx_rkpd_final_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_final_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_program_pd`
--
ALTER TABLE `trx_rkpd_final_program_pd`
  ADD CONSTRAINT `trx_rkpd_final_program_pd_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_final_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_final_prog_indikator_pd`
  ADD CONSTRAINT `trx_rkpd_final_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_final_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_final_urusan`
--
ALTER TABLE `trx_rkpd_final_urusan`
  ADD CONSTRAINT `trx_rkpd_final_urusan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_final_urusan_ibfk_2` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_final` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_rancangan_aktivitas_pd`
  ADD CONSTRAINT `trx_rkpd_rancangan_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_rkpd_rancangan_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_belanja_pd`
--
ALTER TABLE `trx_rkpd_rancangan_belanja_pd`
  ADD CONSTRAINT `trx_rkpd_rancangan_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_indikator`
--
ALTER TABLE `trx_rkpd_rancangan_indikator`
  ADD CONSTRAINT `trx_rkpd_rancangan_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_rancangan_kegiatan_pd`
  ADD CONSTRAINT `FK_trx_rkpd_rancangan_kegiatan_pd_trx_rkpd_rancangan_program_pd` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_rancangan_keg_indikator_pd`
  ADD CONSTRAINT `trx_rkpd_rancangan_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_lokasi_pd`
--
ALTER TABLE `trx_rkpd_rancangan_lokasi_pd`
  ADD CONSTRAINT `trx_rkpd_rancangan_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_rancangan_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_pelaksana`
--
ALTER TABLE `trx_rkpd_rancangan_pelaksana`
  ADD CONSTRAINT `trx_rkpd_rancangan_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_rancangan_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_rancangan_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_rancangan_pelaksana_pd`
  ADD CONSTRAINT `trx_rkpd_rancangan_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_rancangan_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_program_pd`
--
ALTER TABLE `trx_rkpd_rancangan_program_pd`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_rancangan_prog_indikator_pd`
  ADD CONSTRAINT `trx_rkpd_rancangan_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_rancangan_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rancangan_urusan`
--
ALTER TABLE `trx_rkpd_rancangan_urusan`
  ADD CONSTRAINT `trx_rkpd_rancangan_urusan_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_rancangan_urusan_ibfk_3` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_rancangan` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_aktivitas_pd`
--
ALTER TABLE `trx_rkpd_ranhir_aktivitas_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_aktivitas_pd_ibfk_1` FOREIGN KEY (`id_pelaksana_pd`) REFERENCES `trx_rkpd_ranhir_pelaksana_pd` (`id_pelaksana_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_belanja_pd`
--
ALTER TABLE `trx_rkpd_ranhir_belanja_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_belanja_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_ranhir_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_indikator`
--
ALTER TABLE `trx_rkpd_ranhir_indikator`
  ADD CONSTRAINT `trx_rkpd_ranhir_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_ranhir` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_kegiatan_pd`
--
ALTER TABLE `trx_rkpd_ranhir_kegiatan_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_kegiatan_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_ranhir_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_keg_indikator_pd`
--
ALTER TABLE `trx_rkpd_ranhir_keg_indikator_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_keg_indikator_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_ranhir_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_lokasi_pd`
--
ALTER TABLE `trx_rkpd_ranhir_lokasi_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_lokasi_pd_ibfk_1` FOREIGN KEY (`id_aktivitas_pd`) REFERENCES `trx_rkpd_ranhir_aktivitas_pd` (`id_aktivitas_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_pelaksana`
--
ALTER TABLE `trx_rkpd_ranhir_pelaksana`
  ADD CONSTRAINT `trx_rkpd_ranhir_pelaksana_ibfk_1` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_ranhir_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_ranhir_pelaksana_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_pelaksana_pd`
--
ALTER TABLE `trx_rkpd_ranhir_pelaksana_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_pelaksana_pd_ibfk_1` FOREIGN KEY (`id_kegiatan_pd`) REFERENCES `trx_rkpd_ranhir_kegiatan_pd` (`id_kegiatan_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_program_pd`
--
ALTER TABLE `trx_rkpd_ranhir_program_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_program_pd_ibfk_1` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_ranhir_pelaksana` (`id_pelaksana_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_prog_indikator_pd`
--
ALTER TABLE `trx_rkpd_ranhir_prog_indikator_pd`
  ADD CONSTRAINT `trx_rkpd_ranhir_prog_indikator_pd_ibfk_1` FOREIGN KEY (`id_program_pd`) REFERENCES `trx_rkpd_ranhir_program_pd` (`id_program_pd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranhir_urusan`
--
ALTER TABLE `trx_rkpd_ranhir_urusan`
  ADD CONSTRAINT `trx_rkpd_ranhir_urusan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_ranhir_urusan_ibfk_2` FOREIGN KEY (`id_rkpd_rancangan`) REFERENCES `trx_rkpd_ranhir` (`id_rkpd_rancangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranwal_indikator`
--
ALTER TABLE `trx_rkpd_ranwal_indikator`
  ADD CONSTRAINT `fk_trx_rkpd_ranwal_indikator` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranwal_kebijakan`
--
ALTER TABLE `trx_rkpd_ranwal_kebijakan`
  ADD CONSTRAINT `fk_trx_rkpd_ranwal_kebijakan` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranwal_pelaksana`
--
ALTER TABLE `trx_rkpd_ranwal_pelaksana`
  ADD CONSTRAINT `FK_trx_rkpd_ranwal_pelaksana_trx_rkpd_ranwal_urusan` FOREIGN KEY (`id_urusan_rkpd`) REFERENCES `trx_rkpd_ranwal_urusan` (`id_urusan_rkpd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trx_rkpd_ranwal_pelaksana_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_ranwal_urusan`
--
ALTER TABLE `trx_rkpd_ranwal_urusan`
  ADD CONSTRAINT `trx_rkpd_ranwal_urusan_ibfk_1` FOREIGN KEY (`id_rkpd_ranwal`) REFERENCES `trx_rkpd_ranwal` (`id_rkpd_ranwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_rkpd_ranwal_urusan_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `ref_bidang` (`id_bidang`) ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_renstra`
--
ALTER TABLE `trx_rkpd_renstra`
  ADD CONSTRAINT `fk_trx_rkpd_renstra` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_renstra_indikator`
--
ALTER TABLE `trx_rkpd_renstra_indikator`
  ADD CONSTRAINT `trx_rkpd_renstra_indikator_ibfk_1` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_renstra_pelaksana`
--
ALTER TABLE `trx_rkpd_renstra_pelaksana`
  ADD CONSTRAINT `fk_trx_rkpd_renstra_pelaksana` FOREIGN KEY (`id_rkpd_renstra`) REFERENCES `trx_rkpd_renstra` (`id_rkpd_renstra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rpjmd_kebijakan`
--
ALTER TABLE `trx_rkpd_rpjmd_kebijakan`
  ADD CONSTRAINT `fk_trx_rkpd_rpjmd_kebijakan` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rpjmd_program_indikator`
--
ALTER TABLE `trx_rkpd_rpjmd_program_indikator`
  ADD CONSTRAINT `fk_rkpd_rpjmd_indikator` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rpjmd_program_pelaksana`
--
ALTER TABLE `trx_rkpd_rpjmd_program_pelaksana`
  ADD CONSTRAINT `fk_rkpd_rpjmd_pelaksana` FOREIGN KEY (`id_rkpd_rpjmd`) REFERENCES `trx_rkpd_rpjmd_ranwal` (`id_rkpd_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rkpd_rpjmd_ranwal`
--
ALTER TABLE `trx_rkpd_rpjmd_ranwal`
  ADD CONSTRAINT `FK_trx_rkpd_rpjmd_ranwal_trx_rpjmd_visi` FOREIGN KEY (`id_visi_rpjmd`) REFERENCES `trx_rpjmd_visi` (`id_visi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_kebijakan`
--
ALTER TABLE `trx_rpjmd_kebijakan`
  ADD CONSTRAINT `fk_trx_rpjmd_kebijakan` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_misi`
--
ALTER TABLE `trx_rpjmd_misi`
  ADD CONSTRAINT `fk_trx_rpjmd_misi` FOREIGN KEY (`id_visi_rpjmd`) REFERENCES `trx_rpjmd_visi` (`id_visi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_program`
--
ALTER TABLE `trx_rpjmd_program`
  ADD CONSTRAINT `fk_trx_rpjmd_program` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_program_indikator`
--
ALTER TABLE `trx_rpjmd_program_indikator`
  ADD CONSTRAINT `fk_trx_rpjmd_program_indikator` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_program_pelaksana`
--
ALTER TABLE `trx_rpjmd_program_pelaksana`
  ADD CONSTRAINT `fk_trx_rpjmd_program_pelaksana` FOREIGN KEY (`id_urbid_rpjmd`) REFERENCES `trx_rpjmd_program_urusan` (`id_urbid_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_program_urusan`
--
ALTER TABLE `trx_rpjmd_program_urusan`
  ADD CONSTRAINT `fk_trx_rpjmd_program_urusan` FOREIGN KEY (`id_program_rpjmd`) REFERENCES `trx_rpjmd_program` (`id_program_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_sasaran`
--
ALTER TABLE `trx_rpjmd_sasaran`
  ADD CONSTRAINT `FK_trx_rpjmd_sasaran_trx_rpjmd_tujuan` FOREIGN KEY (`id_tujuan_rpjmd`) REFERENCES `trx_rpjmd_tujuan` (`id_tujuan_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_sasaran_indikator`
--
ALTER TABLE `trx_rpjmd_sasaran_indikator`
  ADD CONSTRAINT `fk_trx_rpjmd_sasaran_indikator` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_strategi`
--
ALTER TABLE `trx_rpjmd_strategi`
  ADD CONSTRAINT `fk_trx_rpjmd_strategi` FOREIGN KEY (`id_sasaran_rpjmd`) REFERENCES `trx_rpjmd_sasaran` (`id_sasaran_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_tujuan`
--
ALTER TABLE `trx_rpjmd_tujuan`
  ADD CONSTRAINT `fk_trx_rpjmd_tujuan` FOREIGN KEY (`id_misi_rpjmd`) REFERENCES `trx_rpjmd_misi` (`id_misi_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_tujuan_indikator`
--
ALTER TABLE `trx_rpjmd_tujuan_indikator`
  ADD CONSTRAINT `trx_rpjmd_tujuan_indikator_ibfk_1` FOREIGN KEY (`id_tujuan_rpjmd`) REFERENCES `trx_rpjmd_tujuan` (`id_tujuan_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_rpjmd_visi`
--
ALTER TABLE `trx_rpjmd_visi`
  ADD CONSTRAINT `fk_trx_rpjmd_visi` FOREIGN KEY (`id_rpjmd`) REFERENCES `trx_rpjmd_dokumen` (`id_rpjmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_usulan_kab`
--
ALTER TABLE `trx_usulan_kab`
  ADD CONSTRAINT `trx_usulan_kab_ibfk_1` FOREIGN KEY (`id_kab`) REFERENCES `ref_kabupaten` (`id_kab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_usulan_kab_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `ref_unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_usulan_kab_lokasi`
--
ALTER TABLE `trx_usulan_kab_lokasi`
  ADD CONSTRAINT `trx_usulan_kab_lokasi_ibfk_1` FOREIGN KEY (`id_usulan_kab`) REFERENCES `trx_usulan_kab` (`id_usulan_kab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_usulan_kab_lokasi_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `ref_lokasi` (`id_lokasi`) ON UPDATE CASCADE;

--
-- Constraints for table `user_app`
--
ALTER TABLE `user_app`
  ADD CONSTRAINT `user_app_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_app_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `ref_group` (`id`);

--
-- Constraints for table `user_desa`
--
ALTER TABLE `user_desa`
  ADD CONSTRAINT `user_desa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_level_sakip`
--
ALTER TABLE `user_level_sakip`
  ADD CONSTRAINT `user_level_sakip_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_unit`
--
ALTER TABLE `user_sub_unit`
  ADD CONSTRAINT `user_sub_unit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
