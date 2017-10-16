# simda perencanaan
Kode sumber aplikasi SIMDA Perencanaan yang dikembangkan oleh Tim Aplikasi.
Dalam aplikasi ini telah termasuk modul RKPD, Renja, Musrenbang, SSH, dan ASB.

### Requirements Teknis
Untuk menjalankan aplikasi ini diperlukan web server yang terkoneksi ke internet; dengan PHP 5.6, MySQL 5.5, dan ioncube Loader terinstall.

### Instalasi

1. Unduh keseluruhan aplikasi ini, ekstrak, dan letakkan di web server.
2. Hubungi Tim Aplikasi di perwakilan BPKP setempat untuk mendapatkan folder konfigurasi, database, dan username/password default.
3. Rename folder config-namapemda yang Anda peroleh menjadi folder config (hapus -namapemda)
4. Letakkan folder konfigurasi (config) ke folder protected (folder Anda akan menjadi protected/config)
5. Impor database yang Anda peroleh ke MySQL.
6. Temukan file .env dan ubah parameter sebagai berikut:

	1. DB_CONNECTION=mysql // Tidak Perlu Dirubah
	2. DB_HOST=localhost	// sesuaikan dengan host MySQL Anda. default adalah localhost.
	3. DB_PORT=3306 // sesuaikan dengan port MySQL Anda. default adalah 3306.
	4. DB_DATABASE=namadatabase // sesuaikan dengan nama database Simda Perencanaan Anda.
	5. DB_USERNAME=usernamemysql // sesuaikan dengan username MySQL Anda.
	6. DB_PASSWORD=passwordmysql // sesuaikan dengan password MySQL Anda.

Arahkan browser Anda ke folder aplikasi SIMDA Perencanaan, lalu login dengan username/password default Anda.

#### Problem Instalasi

Jika ada kesulitan ketika instalasi, pastikan beberapa hal berikut ini:
1. Versi PHP adalah 5.6. Aplikasi ini tidak berjalan di versi PHP lain, dan tidak dirancang untuk PHP 7. Cek melalui phpinfo untuk memastikan.
2. Ioncube loader telah terinstalasi. Cek melalui phpinfo untuk memastikan.
3. Struktur folder /config telah benar dan isi file .env telah sesuai.

### Dokumentasi

[Dokumentasi sederhana tersedia di sini](https://github.com/simda-id/simcan/wiki)


#### Lisensi
Aplikasi SIMDA Perencanaan dapat dipergunakan tanpa biaya, dengan tetap menyebutkan hak cipta pada [BPKP](http://www.simda-online.com).

Anda tidak diperkenankan mengubah aplikasi ini tanpa persetujuan tertulis terlebih dahulu. Perubahan dan atau penambahan fitur yang Anda lakukan harus dirilis secara terbuka untuk dipergunakan oleh siapapun secara gratis.

#### Berkontribusi
Untuk bug, permintaan fitur, dapat disampaikan melalui timaplikasi et yahoo titik com.
