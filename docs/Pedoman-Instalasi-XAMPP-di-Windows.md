## Pedoman Instalasi dengan XAMPP di Windows

__PERHATIAN__ Instalasi XAMPP di Windows ditujukan untuk keperluan internal, __TIDAK__ disarankan untuk production.

#### instalasi XAMPP

1. Dapatkan XAMPP dari (https://www.apachefriends.org/download.html); 
2. Pilih paket untuk PHP 5.6
3. Jalankan installer. Pastikan Apache, MySQL, PHP, dan phpMyAdmin dipilih sebagai komponen yang akan diinstall.
4. Tentukan folder untuk instalasi XAMPP. Disarankan di C:\XAMPP (tanpa spasi).
5. Lanjutkan sampai selesai.
6. Jalankan XAMPP Control Panel.
7. Start Apache serta MySQL.

Untuk data instalasi tahap berikutnya:
1. Buka browser
2. Buka alamat localhost
3. Lihat di baris atas, pilih PhpInfo.
4. Lihat di baris 'PHP Extension Build'; catat versi vc-nya. (VC9 atau VC11) 

#### instalasi ioncube loader

1. Dapatkan ioncube loader dari (http://www.ioncube.com/loaders.php)
2. Pilih paket sesuai VC Build.
3. Ekstrak file ioncube tersebut ke folder PHP di c:\xampp\php\
4. Buka file php.ini
5. Tambahkan baris berikut <code>zend_extension = "C:\xampp\php\ioncube\ioncube_loader_win_5.6.dll"</code>
6. Restart Apache.
7. Buka lagi PhpInfo. Pastikan di baris zend engine telah tertulis 'with the ioncube PHP loader'

#### memasang database

1. Buka browser, di alamat localhost
2. Di baris atas ada pilihan phpMyAdmin
3. Klik tab 'Basis Data', buat nama database.
4. Klik nama database yang baru dibuat tersebut dari daftar di sebelah kiri
5. Klik tab 'impor' lalu pilih file database yang akan dipasang.
6. Klik 'Go' di bagian bawah.
Sebagai alternatif, pemasangan database dapat mengikuti [Pedoman Impor Database mySQL dengan HeidiSQL](Pedoman-Impor-Database-mySQL.md)


[index](index.md)
