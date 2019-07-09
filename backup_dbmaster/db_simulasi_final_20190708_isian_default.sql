-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.20 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_aspek_pembangunan: ~4 rows (lebih kurang)
DELETE FROM `ref_aspek_pembangunan`;
/*!40000 ALTER TABLE `ref_aspek_pembangunan` DISABLE KEYS */;
INSERT INTO `ref_aspek_pembangunan` (`id_aspek`, `uraian_aspek_pembangunan`, `status_data`, `created_at`, `updated_at`) VALUES
	(1, 'Aspek Geografi dan Demografi', 0, '2019-03-09 05:37:26', '2019-03-09 05:37:51'),
	(2, 'Aspek Kesejahteraan Masyarakat', 0, '2019-03-09 05:37:40', '2019-03-09 05:37:40'),
	(3, 'Aspek Pelayanan Umum', 0, '2019-03-09 05:38:15', '2019-03-09 05:38:15'),
	(4, 'Aspek Daya Saing Daerah', 0, '2019-03-09 05:38:31', '2019-03-09 05:38:31');
/*!40000 ALTER TABLE `ref_aspek_pembangunan` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_bidang: ~39 rows (lebih kurang)
DELETE FROM `ref_bidang`;
/*!40000 ALTER TABLE `ref_bidang` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `ref_bidang` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_dokumen: ~21 rows (lebih kurang)
DELETE FROM `ref_dokumen`;
/*!40000 ALTER TABLE `ref_dokumen` DISABLE KEYS */;
INSERT INTO `ref_dokumen` (`id_dokumen`, `nm_dokumen`, `jenis_proses`, `urut_tampil`) VALUES
	(1, 'Rancangan Awal RPJMD', 1, 1),
	(2, 'Rancangan RPJMD', 1, 2),
	(3, 'Musrenbang RPJMD', 1, 3),
	(4, 'Rancangan Akhir RPJMD', 1, 4),
	(5, 'RPJMD Final', 1, 5),
	(6, 'RPJMD Final Revisi', 1, 6),
	(7, 'Rancangan Awal Renstra Perangkat Daerah', 2, 1),
	(8, 'Rancangan Akhir Renstra Perangkat Daerah', 2, 2),
	(9, 'Renstra SKPD Final', 2, 3),
	(10, 'Renstra SKPD Revisi', 2, 4),
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
	(21, 'Musrenbang RKPD Propinsi', 5, 4);
/*!40000 ALTER TABLE `ref_dokumen` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_fungsi: ~11 rows (lebih kurang)
DELETE FROM `ref_fungsi`;
/*!40000 ALTER TABLE `ref_fungsi` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `ref_fungsi` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_group: ~8 rows (lebih kurang)
DELETE FROM `ref_group`;
/*!40000 ALTER TABLE `ref_group` DISABLE KEYS */;
INSERT INTO `ref_group` (`id`, `name`, `id_roles`, `keterangan`) VALUES
	(1, 'super_admin', 0, 'Group user yang memiliki kewenangan super admin'),
	(2, 'Admin', 0, 'Administrator SKPD'),
/*!40000 ALTER TABLE `ref_group` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_jadwal: ~5 rows (lebih kurang)
DELETE FROM `ref_jadwal`;
/*!40000 ALTER TABLE `ref_jadwal` DISABLE KEYS */;
INSERT INTO `ref_jadwal` (`tahun`, `id_proses`, `id_langkah`, `jenis_proses`, `uraian_proses`, `tgl_mulai`, `tgl_akhir`, `status_proses`, `created_at`, `updated_at`) VALUES
	(2019, 16, 15, 0, NULL, '2018-01-15', '2018-01-26', 1, '2018-04-10 21:29:06', '2018-04-10 21:29:06'),
	(2020, 17, 15, 0, NULL, '2018-12-10', '2018-12-21', 2, '2019-02-01 05:41:08', '2019-02-01 05:42:31'),
	(2020, 18, 16, 0, NULL, '2018-12-26', '2019-01-18', 2, '2019-02-01 05:42:55', '2019-02-01 05:42:55'),
	(2020, 19, 19, 1, NULL, '2018-12-26', '2019-01-11', 2, '2019-02-01 05:43:27', '2019-02-01 05:43:27'),
	(2020, 20, 22, 0, NULL, '2019-01-14', '2019-02-15', 1, '2019-02-01 05:43:54', '2019-02-01 05:43:54');
/*!40000 ALTER TABLE `ref_jadwal` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_kolom_tabel_dasar: ~58 rows (lebih kurang)
DELETE FROM `ref_kolom_tabel_dasar`;
/*!40000 ALTER TABLE `ref_kolom_tabel_dasar` DISABLE KEYS */;
INSERT INTO `ref_kolom_tabel_dasar` (`id_kolom_tabel_dasar`, `id_tabel_dasar`, `nama_kolom`, `level`, `parent_id`) VALUES
	(0, 1, 'root', 0, 0),
	(1, 1, 'Pertanian', 1, 0),
	(2, 1, 'Pertambangan dan penggalian', 1, 0),
	(3, 1, 'Industri pengolahan', 1, 0),
	(4, 1, 'Listrik, gas dan air bersih', 1, 0),
	(5, 1, 'Konstruksi', 1, 0),
	(6, 1, 'Perdagangan, hotel dan restoran', 1, 0),
	(7, 1, 'Pengangkutan dan komunikasi', 1, 0),
	(8, 1, 'Keuangan, sewa dan jasa perusahaan', 1, 0),
	(9, 1, 'Jasa-jasa', 1, 0),
	(10, 2, 'root', 0, 0),
	(11, 2, 'Pertanian', 1, 0),
	(12, 2, 'Pertambangan dan penggalian', 1, 0),
	(13, 2, 'Industri pengolahan', 1, 0),
	(14, 2, 'Listrik, gas dan air bersih', 1, 0),
	(15, 2, 'Konstruksi', 1, 0),
	(16, 2, 'Perdagangan, hotel dan restoran', 1, 0),
	(17, 2, 'Pengangkutan dan komunikasi', 1, 0),
	(18, 2, 'Keuangan, sewa dan jasa perusahaan', 1, 0),
	(19, 2, 'Jasa-jasa', 1, 0),
	(20, 3, 'Jumlah penduduk usia diatas 15 tahun yangbisa membaca dan menulis', 1, 0),
	(21, 3, 'Jumlah penduduk usia 15 tahun keatas', 1, 0),
	(22, 3, 'Angka Melek Huruf', 1, 0),
	(23, 4, 'Rata-rata Lama Sekolah (tahun)', 1, 0),
	(24, 5, 'Jumlah grup kesenian per 10.000 penduduk', 1, 0),
	(25, 5, 'Jumlah gedung kesenian per 10.000 penduduk', 1, 0),
	(26, 5, 'Jumlah klub olahraga per 10.000 penduduk', 1, 0),
	(27, 5, 'Jumlah gedung olahraga per 10.000 penduduk', 1, 0),
	(28, 6, 'SD/MI', 0, 0),
	(29, 6, 'jumlah murid usia 7-12 thn', 1, 28),
	(30, 6, 'jumlah penduduk kelompok usia7-12 tahun', 1, 28),
	(31, 6, 'APS SD/MI', 1, 28),
	(32, 6, 'SMP', 0, 0),
	(33, 6, 'jumlah murid usia 13-15 thn', 1, 32),
	(34, 6, 'jumlah penduduk kelompok usia13-15 tahun', 1, 32),
	(35, 6, 'APS SMP/MTs', 1, 32),
	(36, 7, 'SD/MI', 0, 0),
	(37, 7, 'Jumlah gedung sekolah', 1, 36),
	(38, 7, 'jumlah penduduk kelompok usia7-12 tahun', 1, 36),
	(39, 7, 'Rasio', 1, 36),
	(40, 7, 'SMP', 0, 0),
	(41, 7, 'Jumlah gedung sekolah', 1, 40),
	(42, 7, 'jumlah penduduk kelompok usia13-15 tahun', 1, 40),
	(43, 7, 'Rasio', 1, 40),
	(44, 8, 'SD/MI', 0, 0),
	(45, 8, 'Jumlah Guru', 1, 44),
	(46, 8, 'Jumlah Murid', 1, 44),
	(47, 8, 'Rasio', 1, 44),
	(48, 8, 'SMP', 0, 0),
	(49, 8, 'Jumlah guru', 1, 48),
	(50, 8, 'Jumlah Murid', 1, 48),
	(51, 8, 'Rasio', 1, 48),
	(52, 9, 'PMDN', 1, 0),
	(53, 9, 'PMA', 1, 0),
	(54, 10, 'Persetujuan Jumlah Proyek', 1, 0),
	(55, 10, 'Realisasi Jumlah Proyek', 1, 0),
	(56, 10, 'Persetujuan Nilai Investasi', 1, 0),
	(57, 10, 'Realisasi Nilai Investasi', 1, 0);
/*!40000 ALTER TABLE `ref_kolom_tabel_dasar` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_langkah: ~24 rows (lebih kurang)
DELETE FROM `ref_langkah`;
/*!40000 ALTER TABLE `ref_langkah` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `ref_langkah` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_menu: ~169 rows (lebih kurang)
DELETE FROM `ref_menu`;
/*!40000 ALTER TABLE `ref_menu` DISABLE KEYS */;
INSERT INTO `ref_menu` (`id_menu`, `group_id`, `menu`, `akses`) VALUES
	(1, 1, 9, '11100'),
	(2, 2, 9, '11100'),
	(4, 2, 20, '11100'),
	(6, 2, 30, '11100'),
	(8, 2, 101, '11100'),
	(10, 2, 102, '11100'),
	(12, 2, 103, '11100'),
	(14, 2, 105, '11100'),
	(16, 2, 106, '11100'),
	(18, 2, 107, '11100'),
	(20, 2, 108, '11100'),
	(22, 2, 109, '11100'),
	(24, 1, 110, '11100'),
	(25, 2, 111, '11100'),
	(27, 2, 401, '11100'),
	(29, 2, 402, '11100'),
	(31, 2, 403, '11100'),
	(33, 2, 404, '11100'),
	(35, 2, 405, '11100'),
	(37, 2, 406, '11100'),
	(39, 2, 407, '11100'),
	(41, 2, 408, '11100'),
	(43, 2, 501, '11100'),
	(45, 2, 502, '11100'),
	(47, 2, 503, '11100'),
	(51, 2, 601, '11100'),
	(53, 2, 603, '11100'),
	(55, 2, 604, '11100'),
	(57, 2, 605, '11100'),
	(59, 2, 606, '11100'),
	(61, 2, 607, '11100'),
	(63, 2, 608, '11100'),
	(65, 2, 609, '11100'),
	(67, 2, 701, '11100'),
	(69, 2, 702, '11100'),
	(71, 2, 801, '11100'),
	(73, 2, 802, '11100'),
	(75, 2, 803, '11100'),
	(77, 2, 805, '11100'),
	(79, 2, 806, '11100'),
	(94, 2, 104, '11100'),
	(96, 2, 901, '11100'),
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
	(124, 2, 950, '11100');
/*!40000 ALTER TABLE `ref_menu` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_pembatalan: ~0 rows (lebih kurang)
DELETE FROM `ref_pembatalan`;
/*!40000 ALTER TABLE `ref_pembatalan` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_pembatalan` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_pengusul: ~18 rows (lebih kurang)
DELETE FROM `ref_pengusul`;
/*!40000 ALTER TABLE `ref_pengusul` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `ref_pengusul` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_revisi: ~0 rows (lebih kurang)
DELETE FROM `ref_revisi`;
/*!40000 ALTER TABLE `ref_revisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_revisi` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_setting: ~2 rows (lebih kurang)
DELETE FROM `ref_setting`;
/*!40000 ALTER TABLE `ref_setting` DISABLE KEYS */;
INSERT INTO `ref_setting` (`tahun_rencana`, `jenis_rw`, `jml_rw`, `pagu_rw`, `jenis_desa`, `jml_desa`, `pagu_desa`, `jenis_kecamatan`, `jml_kecamatan`, `pagu_kecamatan`, `deviasi_pagu`, `status_setting`) VALUES
	(2019, 0, 0, 0.00, 0, 0, 0.00, 0, 0, 0.00, 20.00, 0),
	(2020, 0, 0, 0.00, 0, 0, 0.00, 0, 0, 0.00, 5.00, 1);
/*!40000 ALTER TABLE `ref_setting` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_status_usul: ~0 rows (lebih kurang)
DELETE FROM `ref_status_usul`;
/*!40000 ALTER TABLE `ref_status_usul` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_status_usul` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_tabel_dasar: ~10 rows (lebih kurang)
DELETE FROM `ref_tabel_dasar`;
/*!40000 ALTER TABLE `ref_tabel_dasar` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `ref_tabel_dasar` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_urusan: ~4 rows (lebih kurang)
DELETE FROM `ref_urusan`;
/*!40000 ALTER TABLE `ref_urusan` DISABLE KEYS */;
INSERT INTO `ref_urusan` (`kd_urusan`, `nm_urusan`) VALUES
	(1, 'Urusan Wajib Pelayanan Dasar'),
	(2, 'Urusan Wajib Bukan Pelayanan Dasar'),
	(3, 'Urusan Pilihan'),
	(4, 'Urusan Pemerintahan Fungsi Penunjang');
/*!40000 ALTER TABLE `ref_urusan` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.ref_user_role: ~0 rows (lebih kurang)
DELETE FROM `ref_user_role`;
/*!40000 ALTER TABLE `ref_user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_user_role` ENABLE KEYS */;

-- Membuang data untuk tabel dbsimcan_simulasi.users: ~19 rows (lebih kurang)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `id_unit`, `password`, `remember_token`, `created_at`, `updated_at`, `status_user`) VALUES
	(1, 2, 'administrator', 'admin@bpkp.go.id', NULL, '$2y$10$jR4xkjKFcnS9RSwkKz0odef0Qu7wsqb4YYnx16ElnCC72eXcLvRYy', 'OFWtZyn6dpzn1QYDN0XG36Wlv3aXr5Q0rfSrpOtWBnSO0n9GvWaqlWqLZNbe', '2017-04-06 23:30:42', '2019-07-03 10:39:36', 1),
	(2, 1, 'superAdmin@simcan.dev', 'super@simcan.dev', NULL, '$2y$10$tZIfh.n2Fw9bO.0dMvA/nOr6oNA7gdmg8aU9gHylOS79z2RfCc10W', 'tKn8SJPiegiDywSqOw735HhMhIFjDK8uZVs8yEyk8GXtTaFXjSvjv75hv0sH', '2017-10-08 18:02:03', '2019-05-21 09:07:52', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
