SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `90_ref_keu_bidang_mapping`;
CREATE TABLE IF NOT EXISTS `90_ref_keu_bidang_mapping` (
  `kd_urusan` int(255) NOT NULL,
  `kd_bidang` int(255) NOT NULL,
  `kd_urusan90` int(255) NOT NULL,
  `kd_bidang90` int(255) NOT NULL,
  PRIMARY KEY (`kd_urusan`,`kd_bidang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `90_ref_keu_kegiatan_mapping`;
CREATE TABLE IF NOT EXISTS `90_ref_keu_kegiatan_mapping` (
  `kd_urusan` int(255) NOT NULL,
  `kd_bidang` int(255) NOT NULL,
  `kd_prog` int(255) NOT NULL,
  `kd_keg` int(255) NOT NULL,
  `kd_urusan90` int(255) NOT NULL,
  `kd_bidang90` int(255) NOT NULL,
  `kd_program90` int(255) NOT NULL,
  `kd_kegiatan90` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_sub_kegiatan` int(255) NOT NULL,
  `ket_kegiatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`kd_urusan`,`kd_bidang`,`kd_prog`,`kd_keg`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `90_ref_keu_rekening_mapping`;
CREATE TABLE IF NOT EXISTS `90_ref_keu_rekening_mapping` (
  `kd_rek_1` int(255) NOT NULL,
  `kd_rek_2` int(255) NOT NULL,
  `kd_rek_3` int(255) NOT NULL,
  `kd_rek_4` int(255) NOT NULL,
  `kd_rek_5` int(255) NOT NULL,
  `kd_rek90_1` int(255) NOT NULL,
  `kd_rek90_2` int(255) NOT NULL,
  `kd_rek90_3` int(255) NOT NULL,
  `kd_rek90_4` int(255) NOT NULL,
  `kd_rek90_5` int(255) NOT NULL,
  `kd_rek90_6` int(255) NOT NULL,
  `nm_rek_5` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`kd_rek_1`,`kd_rek_2`,`kd_rek_3`,`kd_rek_4`,`kd_rek_5`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `90_trx_log_api_keu`;
CREATE TABLE IF NOT EXISTS `90_trx_log_api_keu` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  `id_dok_keu` int(11) NOT NULL,
  `kd_dokumen` int(11) NOT NULL DEFAULT '0',
  `id_unit` int(11) DEFAULT NULL,
  `id_sub_unit` int(11) DEFAULT NULL,
  `tgl_kirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_kirim` int(11) NOT NULL,
  `step_kirim` int(11) NOT NULL DEFAULT '0',
  `log_kirim` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- UPDATE ta_tapd
ALTER TABLE `90_trx_anggaran_unit_pa` DROP FOREIGN KEY `90_trx_anggaran_unit_pa_ibfk_1`;
ALTER TABLE `90_trx_anggaran_unit_pa` ADD CONSTRAINT `90_trx_anggaran_unit_pa_ibfk_1` FOREIGN KEY (`id_dokumen_keu`) REFERENCES `90_trx_anggaran_dokumen` (`id_dokumen_keu`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `90_trx_anggaran_unit_kpa` DROP FOREIGN KEY `90_trx_anggaran_unit_kpa_ibfk_1`;
ALTER TABLE `90_trx_anggaran_unit_kpa` ADD CONSTRAINT `90_trx_anggaran_unit_kpa_ibfk_1` FOREIGN KEY (`id_pa`) REFERENCES `90_trx_anggaran_unit_pa`
(`id_pa`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `90_trx_anggaran_tapd` DROP FOREIGN KEY `90_trx_anggaran_tapd_ibfk_1`;
ALTER TABLE `90_trx_anggaran_tapd` ADD CONSTRAINT `90_trx_anggaran_tapd_ibfk_1` FOREIGN KEY (`id_dokumen_keu`) REFERENCES `90_trx_anggaran_dokumen`
(`id_dokumen_keu`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `90_trx_anggaran_tapd_unit` DROP FOREIGN KEY `90_trx_anggaran_tapd_unit_ibfk_1`;
ALTER TABLE `90_trx_anggaran_tapd_unit` ADD CONSTRAINT `90_trx_anggaran_tapd_unit_ibfk_1` FOREIGN KEY (`id_tapd`) REFERENCES `90_trx_anggaran_tapd`
(`id_tapd`) ON DELETE CASCADE ON UPDATE CASCADE;
-- Update nomenklatur
UPDATE 90_ref_rek_6 SET id_rek_5 = 1101, kd_rek_6 = 3, nama_kd_rek_6 = 'Belanja Modal Bangunan Pembuang Air  Kotor', id_hkm = 90, status_data = 0, created_by = 1, update_by = 1, created_at = '2020-02-18 12:56:54', updated_at = '2020-12-10 13:48:23' WHERE id_rek_6 = 7231;
UPDATE dbsimcan_simulasi_merah.90_ref_rek_6 SET id_rek_5 = 1101, kd_rek_6 = 4, nama_kd_rek_6 = 'Belanja Modal Bangunan Pengaman Air Kotor', id_hkm = 90, status_data = 0, created_by = 1, update_by = 1, created_at = '2020-02-18 12:56:54', updated_at = '2020-12-10 13:48:18' WHERE id_rek_6 = 7232;
UPDATE 90_ref_rek_6 SET id_rek_5 = 1094, kd_rek_6 = 3, nama_kd_rek_6 = 'Belanja Modal Jembatan pada Jalan Kabupaten', id_hkm = 90, status_data = 0, created_by = 1, update_by = 1, created_at = '2020-02-18 12:56:54', updated_at = '2020-12-10 13:51:11' WHERE id_rek_6 = 7173;
-- BLUD BOS
INSERT INTO 90_ref_rek_3(id_rek_3, id_rek_2, kd_rek_3, nama_kd_rek_3, saldo_normal, id_hkm, status_data, created_by, update_by, updated_at, created_at) VALUES (107, 13, 6, 'Belanja Modal Aset Lainnya', '', 50, 0, 1, 1, '2020-02-09 05:13:30', '2020-02-09 05:13:30') ON DUPLICATE KEY UPDATE id_rek_3=107;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (518, 53, 88, 'Belanja Pegawai BOS', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=518;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (519, 54, 88, 'Belanja Barang dan Jasa BOS', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=519;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (520, 60, 88, 'Belanja Modal Peralatan dan Mesin BOS', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=520;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (521, 63, 88, 'Belanja Modal Aset Tetap Lainnya BOS', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=521;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (522, 53, 99, 'Belanja Pegawai BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=522;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (523, 54, 99, 'Belanja Barang dan Jasa BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=523;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (524, 59, 99, 'Belanja Modal Tanah BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24')ON DUPLICATE KEY UPDATE id_rek_4=524;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (525, 60, 99, 'Belanja Modal Peralatan dan Mesin  BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=525;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (526, 61, 99, 'Belanja Modal Gedung dan Bangunan  BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=526;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (527, 62, 99, 'Belanja Modal Jalan, Jaringan dan Irigasi BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=527;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (528, 63, 99, 'Belanja Modal Aset Tetap Lainnya BLUD', 50, 0, 1, 1, '2020-12-17 16:20:24', '2020-12-17 16:20:24') ON DUPLICATE KEY UPDATE id_rek_4=528;
INSERT INTO 90_ref_rek_4(id_rek_4, id_rek_3, kd_rek_4, nama_kd_rek_4, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (529, 107, 99, 'Belanja Modal Aset Lainnya BLUD', 50, 0, 1, 1, '2020-12-17 16:26:10', '2020-12-17 16:26:10') ON DUPLICATE KEY UPDATE id_rek_4=529;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2043, 518, 88, 'Belanja Pegawai BOS', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2043;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2044, 519, 88, 'Belanja Barang dan Jasa BOS', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2044;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2045, 520, 88, 'Belanja Modal Peralatan dan Mesin BOS', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2045;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2046, 521, 88, 'Belanja Modal Aset Tetap Lainnya BOS', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2046;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2047, 522, 99, 'Belanja Pegawai BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2047;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2048, 523, 99, 'Belanja Barang dan Jasa BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2048;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2049, 524, 99, 'Belanja Modal Tanah BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2049;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2050, 525, 99, 'Belanja Modal Peralatan dan Mesin  BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2050;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2051, 526, 99, 'Belanja Modal Gedung dan Bangunan  BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2051;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2052, 527, 99, 'Belanja Modal Jalan, Jaringan dan Irigasi BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2052;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2053, 528, 99, 'Belanja Modal Aset Tetap Lainnya BLUD', 50, 0, 1, 1, '2020-12-17 16:21:13', '2020-12-17 16:21:13') ON DUPLICATE KEY UPDATE id_rek_5=2053;
INSERT INTO 90_ref_rek_5(id_rek_5, id_rek_4, kd_rek_5, nama_kd_rek_5, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (2054, 529, 99, 'Belanja Modal Aset Lainnya BLUD', 50, 0, 1, 1, '2020-12-17 16:26:48', '2020-12-17 16:26:48') ON DUPLICATE KEY UPDATE id_rek_5=2054;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14213, 2043, 8888, 'Belanja Pegawai BOS', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14213;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14214, 2044, 8888, 'Belanja Barang dan Jasa BOS', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14214;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14215, 2045, 8888, 'Belanja Modal Peralatan dan Mesin BOS', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14215;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14216, 2046, 8888, 'Belanja Modal Aset Tetap Lainnya BOS', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14216;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14217, 2047, 9999, 'Belanja Pegawai BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14217;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14218, 2048, 9999, 'Belanja Barang dan Jasa BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14218;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14219, 2049, 9999, 'Belanja Modal Tanah BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14219;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14220, 2050, 9999, 'Belanja Modal Peralatan dan Mesin  BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14220;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14221, 2051, 9999, 'Belanja Modal Gedung dan Bangunan  BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14221;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14222, 2052, 9999, 'Belanja Modal Jalan, Jaringan dan Irigasi BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14222;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14223, 2053, 9999, 'Belanja Modal Aset Tetap Lainnya BLUD', 50, 0, 1, 1, '2020-12-17 16:22:39', '2020-12-17 16:22:39') ON DUPLICATE KEY UPDATE id_rek_6=14223;
INSERT INTO 90_ref_rek_6(id_rek_6, id_rek_5, kd_rek_6, nama_kd_rek_6, id_hkm, status_data, created_by, update_by, created_at, updated_at) VALUES (14224, 2054, 9999, 'Belanja Modal Aset Lainnya BLUD', 50, 0, 1, 1, '2020-12-17 16:27:44', '2020-12-17 16:27:44') ON DUPLICATE KEY UPDATE id_rek_6=14224;
SET FOREIGN_KEY_CHECKS = 1;