## Technical Requirements

Kebutuhan teknis untuk menjalankan modul lima tahunan dengan modul tahunan berbeda.

### Modul Lima Tahunan

Untuk menjalankan modul lima tahunan diperlukan:
- Workstation berbasis Windows untuk menjalankan aplikasi.
- Mesin Server untuk menjalankan database engine bagi semua client. Aplikasi simda perencanaan menggunakan database terpusat.
- SQL Server sebagai database engine. Aplikasi didesain dengan basis MSSQL 2000; sehingga issue yang timbul terkait perbedaan versi engine MSSQL yang dijelaskan oleh Microsoft juga berlaku.

Konfigurasi SQL dan akses terhadap aplikasi menjadi tanggung jawab Pemda pengguna.

### Modul Tahunan

Untuk menjalankan modul tahunan diperlukan:
- Mesin server yang terkoneksi ke internet. Koneksi ini diperlukan untuk mengecek aktivasi aplikasi.
- Web server yang telah terinstall. Unit test Tim Aplikasi menggunakan [Apache](https://httpd.apache.org/download.cgi).
- PHP versi 5.6 yang telah terinstall. [Dapatkan PHP di sini](http://php.net/downloads.php).
- MySQL versi 5.5 yang telah terinstall. [Dapatkan MySQL di sini](http://dev.mysql.com/downloads/)
- ionCube Loader yang telah terkonfigurasi. [Dapatkan ionCube Loader di sini](https://www.ioncube.com/loaders.php)

Untuk mengakses aplikasi dapat menggunakan browser di masing-masing client. Konfigurasi akses oleh client terhadap server (melalui internet, LAN, VPN, WLAN) menjadi tanggung jawab Pemda pengguna. Pengamanan dan optimasi atas server (firewall, load balancing, dsb) menjadi tanggung jawab Pemda pengguna.

## _Perhatian_

Untuk fase produksi (menjalankan aplikasi untuk keseluruhan OPD) disarankan menggunakan konfigurasi server yang sebenarnya.

Fase produksi __TIDAK__ disarankan menggunakan MSSQL personal edition/express, __TIDAK__ disarankan menggunakan paket instalasi XAMPP/ WAMP/ LAMP dan sejenisnya. Paket-paket tersebut perlu dikonfigurasi lebih lanjut agar dapat optimal untuk melayani transaksi dalam intensitas tinggi.