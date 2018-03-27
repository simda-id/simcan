## Tips Optimasi XAMPP di Windows

_Perhatian_ Instalasi XAMPP telah membundling paket PHP dan MySQL, namun **TIDAK** diperuntukkan bagi production environment. Berikut ini berapa optimasi yang dapat dilakukan terkait PHP dan MySQL yang diinstall melalui XAMPP agar dapat menangani data yang lebih besar. Use at your own risk.

### enable .htaccess di Windows

1. Buka httpd.conf
2. Hapus tanda <code>#</code> di depan <code>LoadModule rewrite_module modules/mod_rewrite.so</code>
3. Simpan file
4. Restart Apache

### memperbesar batas waktu timeout

1. Buka php.ini
2. Cari baris <code>max_execution_time=</code>
3. Isikan nilai yang diperlukan. Nilai default adalah 300 detik.
4. Restart Apache

### memperbesar batas ukuran file di mysql

1. Buka my.ini
2. Cari baris <code>max_allowed_packet=</code>
3. Isikan nilai yang lebih besar dari ukuran backup database yang akan direstore, dalam satuan Megabyte. Contoh akan ditulis <code>max_allowed_packet=20M</code>
4. Restart mysql.

### memperbesar batas ukuran file di php

1. Buka php.ini
2. Cari baris <code>upload_max_filesize=</code> dan <code>post_max_size=</code>
4. Isikan nilai yang sesuai, dalam satuan Megabyte. Contoh akan ditulis <code>upload_max_filesize=25M</code> dan <code>post_max_size=20M</code>
5. Restart Apache

### memperbesar alokasi memori untuk php

1. Buka php.ini
2. Cari baris <code>memory_limit=</code>
3. Isikan nilai yang sesuai dalam satuan bytes. Contoh akan ditulis <code>memory_limit=1024M</code>
4. Restart Apache

[index](index.md)