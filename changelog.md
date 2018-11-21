# change log (catatan perubahan versi)

[Releases](https://github.com/simda-id/simcan/releases) | [Documentation](https://github.com/simda-id/simcan/wiki)

## versi v1.0.0-rc05

Release Candidate 05

DISARANKAN MELAKUKAN PROSES EDIT-SIMPAN PADA RINCIAN KOMPONEN ASB.

1. Penambahan mapping Sasaran OPD ke Sasaran Pemda
2. Penambahan indikator Tujuan dan indikator Sasaran di RPJMD maupun Renstra
3. Penambahan deskripsi Sasaran Program dan deskripsi Sasaran Kegiatan di Renstra
4. Penambahan deskripsi sumber data dan rumus perhitungan indikator kinerja
5. Perbaikan proses load data dan posting Program di Ranwal Renja
6. Perbaikan proses load data dan posting di Rancangan Awal Renja
7. Perbaikan kontrol pagu pada proses penyusunan renja
8. Perbaikan proses load data di Forum Perangkat Daerah
9. Penambahan report kelengkapan entry data ASB
10. Perbaikan kategori rincian komponen pada ASB menjadi fix dan variabel. DISARANKAN MELAKUKAN PROSES EDIT-SIMPAN.
11. Penambahan report matrix RPJMD khusus Belanja Langsung 
12. Penambahan report sinkronisasi RPJMD dengan Renstra
13. Penambahan report Draft RKA
14. Penambahan sub modul e-SAKIP (ALPHA)
15. Penambahan parameter struktur sub unit organisasi sampai dengan eselon IV (ALPHA)
16. Penambahan menu Penetapan Kinerja (ALPHA)
17. Penambahan menu peran group user pada User Manajemen (ALPHA)
18. Perbaikan pola otentikasi aktivasi aplikasi
19. Perbaikan pola updating database
20. Penyebaran berbagai bug di tempat yang tidak terduga

## versi v1.0.0-rc04

Release Candidate 04

1. Penambahan data umum
2. Penambahan timeline perencanaan
3. Penambahan edit urusan/bidang pelaksana di rpjmd
4. Perbaikan interface pokok pikiran
5. Perbaikan interface penyusunan rincian komponen ASB
6. Perbaikan interface pemilihan data SSH
7. Penambahan dan perbaikan beberapa laporan
8. Penambahan dan perbaikan beberapa interface
9. Perbaikan pola aktivasi ke server
10. Perbaikan beberapa bug dan penambahan bug lain

## versi v1.0.0-rc03

Release Candidate 03

1. Perbaikan view login
2. Perbaikan User Management.
3. Perbaikan proses Pokir.
4. Perbaikan proses Renja SKPD.
5. Perbaikan proses SSH.
6. Perbaikan proses copy data ASB.
7. Perbaikan proses Forum SKPD
8. Perbaikan proses Rancangan Akhir
9. Beberapa perbaikan bug.
10. Penambahan bug baru.

## versi v1.0.0-rc02-u

Release Candidate 02 - update

1. update beberapa view ppas disertakan kembali.

## versi v1.0.0-rc02

Release Candidate 02

1. Beberapa perbaikan User Interface.
2. Beberapa perbaikan bug.
3. Penambahan beberapa kontrol.
4. Penambahan beberapa report.
5. Perbaikan proses Renja SKPD.
6. Perbaikan proses Musrenbang Kecamatan.
7. Perbaikan logic SSH dan ASB.
8. User management.
9. Perbaikan proses Forum RKPD.

## versi 1.0.0-rc01-u

Release Candidate 01-update

1. Include /resources dan .env

## versi 1.0.0-rc01

Release Candidate 01

1. RPJMD dan Renstra diperoleh dari aplikasi SIMDA Perencanaan lima tahunan melalui tool SimTrans.
2. SSH dan ASB untuk pengisian proyeksi anggaran di Kegiatan.
3. RKPD Awal dan Renja Awal diperoleh dari data RPJMD dan Renstra untuk tahun berjalan.
4. Musrenbang dengan sistem tertutup berdasarkan aktivitas di Renja.
5. Forum SKPD mengkompilasi data dari Renja dan Musrenbang
6. Forum RKPD dan PPA mengambil data dari hasil Forum SKPD

## Known Issues

Beberapa kasus, terjadi kelambatan load data yang berjumlah puluhan ribu. Untuk sementara dapat diatasi dengan mematikan aplikasi yang berjalan di background, atau menambah RAM, dan mengoptimalkan konfigurasi PHP dan web server.
