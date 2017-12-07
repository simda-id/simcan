## Pedoman Setting Koneksi Database SIMDA Perencanaan (Modul Tahunan)

1. Unduh keseluruhan aplikasi ini. Gunakan [rilis terakhir](https://github.com/simda-id/simcan/releases)
2. Hubungi perwakilan BPKP setempat untuk mendapatkan:
   - folder konfigurasi, 
   - database pemerintah daerah, 
   - username/password default.

Langkah setting koneksi aplikasi SIMDA Perencanaan ke database:

1. Ekstrak dan letakkan aplikasi SIMDA Perencanaan di web server.
2. Copy isi folder konfigurasi (config) ke folder protected (folder Anda akan menjadi protected/config)
3. Impor database yang Anda peroleh ke MySQL.
4. Temukan file .env dan ubah parameter sebagai berikut:
   - DB_CONNECTION=mysql // Tidak Perlu Dirubah
   - DB_HOST=localhost	// sesuaikan dengan host MySQL Anda. default adalah localhost.
   - DB_PORT=3306 // sesuaikan dengan port MySQL Anda. default adalah 3306.
   - DB_DATABASE=namadatabase // sesuaikan dengan nama database Simda Perencanaan Anda.
   - DB_USERNAME=usernamemysql // sesuaikan dengan username MySQL Anda.
   - DB_PASSWORD=passwordmysql // sesuaikan dengan password MySQL Anda. 

[index](index.md)