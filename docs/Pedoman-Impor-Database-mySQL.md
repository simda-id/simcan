## Pedoman Impor dan Backup Database MySQL dengan HeidiSQL

Pedoman ini menggunakan tool [HeidiSQL](https://www.heidisql.com/download.php) yang bersifat free dan open source. HeidiSQL dapat dijalankan di Windows, atau menggunakan wine untuk menjalankannya di Linux/MacOS.
Database yang akan diimpor dalam format .sql dan hasil ekspor juga dalam format .sql

#### Buat koneksi ke database server

1. Buat session baru.
2. Pilih network type: MySQL (TCP/IP).
3. Masukkan hostname/ alamat IP server.
4. Masukkan username server MySQL.
5. Masukkan password server MySQL.
6. Pilih port. Default adalah 3306.
7. Klik Open.
8. Di layar akan muncul daftar database yang dapat diakses.

#### Impor Data MySQL

1. Jika belum ada database kosong, buat database baru.
- klik kanan nama session.
- pilih create new ... Database.
- beri nama database.
2. Klik dobel pada nama database kosong untuk mengaktifkannya.
3. Klik pada nama database kosong, lalu pilih menu File ... Run SQL file.
4. Pilih nama file sql yang akan diimpor.
5. Klik Open.
6. Tunggu sampai proses selesai.

#### Backup data MySQL

1. Klik kanan pada nama database yang akan di backup.
2. Pilih Export Database as SQL.
3. Pada opsi Table(s), beri tickmark pada Drop dan Create.
4. Pada opsi Data, pilih Replace Existing Data.
5. Tentukan tempat dan nama backup database dengan klik tombol di samping kanan Filename.
6. Klik Export.
7. Tunggu sampai proses selesai.

#### Menghapus database MySQL

1. Klik kanan pada database yang akan dihapus.
2. Pilih Drop.
3. Konfirmasikan pada kotak dialog yang muncul.
4. Tunggu sampai proses selesai


[index](index.md)