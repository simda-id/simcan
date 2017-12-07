## Pedoman Setting Koneksi Database SIMDA Perencanaan (Modul Tahunan)

1. Unduh keseluruhan aplikasi ini, ekstrak, dan letakkan di web server.
2. Hubungi Tim Aplikasi di perwakilan BPKP setempat untuk mendapatkan folder konfigurasi, database, dan username/password default.
3. Rename folder config-namapemda yang Anda peroleh menjadi folder config (hapus -namapemda)
4. Letakkan folder konfigurasi (config) ke folder protected (folder Anda akan menjadi protected/config)
5. Impor database yang Anda peroleh ke MySQL.
6. Temukan file .env dan ubah parameter sebagai berikut:

* DB_CONNECTION=mysql // Tidak Perlu Dirubah
* DB_HOST=localhost	// sesuaikan dengan host MySQL Anda. default adalah localhost.
* DB_PORT=3306 // sesuaikan dengan port MySQL Anda. default adalah 3306.
* DB_DATABASE=namadatabase // sesuaikan dengan nama database Simda Perencanaan Anda.
* DB_USERNAME=usernamemysql // sesuaikan dengan username MySQL Anda.
* DB_PASSWORD=passwordmysql // sesuaikan dengan password MySQL Anda. 

[index](index.md)