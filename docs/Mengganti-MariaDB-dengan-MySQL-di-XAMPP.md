# Mengganti MariaDB dengan MySQL di XAMPP

Mulai XAMPP versi 5.5.30 dan 5.6.14, database di XAMPP adalah MariaDB bukan MySQL. MariaDB adalah [fork](https://mariadb.com/kb/en/mariadb/mariadb-vs-mysql-compatibility/) dari MySQL. Anda dapat menggantinya dengan MySQL. Tutorial ini mengasumsikan Anda menggunakan Windows dengan user access control default. Use at your own risk.

## Matikan MariaDB di XAMPP 

* Backup database jika ada.
* Stop MariaDB dari XAMPP control panel. Klik Stop di baris MySQL. Tunggu sampai service berhenti.
* Rename folder: `\xampp\mysql` menjadi `\xampp\mariadb`

## Instalasi MySQL

* Download [MySQL Community Server](https://dev.mysql.com/downloads/mysql/), pilih [dalam bentuk zip](https://cdn.mysql.com//Downloads/MySQL-5.7/mysql-5.7.19-win32.zip).
* Buat folder baru: `\xampp\mysql`
* Ekstrak MySQL yang didownload ke folder `\xampp\mysql` tersebut.
* Buat folder baru: `\xampp\mysql\data` biarkan kosong.
* Buat file baru: `\xampp\mysql\bin\my.ini` lalu isikan ke dalam file tersebut berikut ini (ganti c:/xampp/ dengan folder yang sesuai di komputer Anda. Perhatikan penggunaan slash, bukan backslash):

```ini
[mysqld]
# set basedir to your installation path
basedir=c:/xampp/mysql
# set datadir to the location of your data directory
datadir=c:/xampp/mysql/data
# increase innodb_buffer_pool_size Default: 134217728 (128 MB)
innodb_buffer_pool_size = 1024M
# Default since version 5.7
sql-mode = "NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"
```

## Inisiasi Data MySQL

Proses copy MySQL belum mengisiasi database MySQL yang diperlukan. Untuk membuatnya harus dilakukan dari command line.

1. Cari cmd di search Windows.
2. Klik kanan pada cmd.exe lalu pilih Run As Administrator. Anda harus sebagai administrator untuk menjalankan perintah berikut ini.
3. Ketikkan perintah berikut ini (ganti c:\xampp\ dengan folder yang sesuai di komputer Anda):

```cmd
cd c:\xampp\mysql\bin
mysqld --initialize-insecure
```

4. Buka folder data, pastikan di dalamnya ada file `[computer name].err`
5. Anda memiliki akses ke localhost mySQL sebagai root tanpa password.

## Start MySQL

Klik Start pada baris MySQL di XAMPP Control Panel.

## Impor Data MySQL

Impor kembali database yang telah dibackup (jika ada)