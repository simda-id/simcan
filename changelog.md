# change log

[Releases](https://github.com/simda-id/simcan/releases)

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

## ToDo

1. Perbaikan Musrenbang
2. Perbaikan Forum RKPD dan PPA
3. Pembuatan Dashboard tiap tahap
4. Penambahan laporan-laporan


### Berkontribusi

Untuk laporan bug, permintaan fitur, dapat disampaikan melalui timaplikasi et yahoo titik com.
