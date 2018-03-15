# pedoman instalasi

### Requirements Teknis
Untuk menjalankan aplikasi ini diperlukan:
- [web server](https://httpd.apache.org/download.cgi) yang terkoneksi ke internet; 
- [PHP 5.6](http://php.net/downloads.php) terinstall, 
- [MySQL 5.5](https://dev.mysql.com/downloads/mysql/) terinstall, dan 
- [ioncube Loader](http://ioncube.com/loader) telah terkonfigurasi.

1. Untuk edit file .env disarankan menggunakan [notepad++](https://notepad-plus-plus.org/download/).
2. Untuk upload database dapat menggunakan phpmyadmin atau [heidisql](https://www.heidisql.com/download.php).

## memasang aplikasi

1. Unduh keseluruhan aplikasi ini, ekstrak, dan letakkan di web server.
2. Hubungi Tim Aplikasi di perwakilan BPKP setempat untuk mendapatkan folder konfigurasi (folder config), database, dan username/password default.
3. Letakkan folder konfigurasi (config) ke folder protected/config (folder Anda akan menjadi protected/config)
4. Impor database yang Anda peroleh ke MySQL.
5. Temukan file .env di folder /protected dan sesuaikan isinya sebagai berikut:

	1. DB_HOST=localhost	// sesuaikan dengan host MySQL Anda. default adalah localhost.
	2. DB_PORT=3306 // sesuaikan dengan port MySQL Anda. default adalah 3306.
	3. DB_DATABASE=namadatabase // sesuaikan dengan nama database Simda Perencanaan Anda.
	4. DB_USERNAME=usernamemysql // sesuaikan dengan username MySQL Anda.
	5. DB_PASSWORD=passwordmysql // sesuaikan dengan password MySQL Anda.

6. Buka aplikasi melalui web browser, login dengan username/password Anda.

#### Problem Instalasi

Jika ada kesulitan ketika instalasi, pastikan beberapa hal berikut ini:
1. Versi PHP adalah 5.6. Aplikasi ini tidak berjalan di versi PHP yang lebih rendah. Cek melalui phpinfo() untuk memastikan versi php.
2. Ioncube loader telah terinstalasi. Cek melalui phpinfo() lihat di bagian zend engine untuk memastikan ioncube sudah terinstall.
3. Struktur folder /config telah benar. Cek bahwa dalam folder config __tidak__ hanya ada file readme; seharusnya ada beberapa file .php di dalam folder tersebut.
4. Isi file .env telah sesuai dengan konfigurasi server Anda.
