# Pedoman Update

## Update Aplikasi

1. Download [rilis terbaru](https://github.com/simda-id/simcan/releases) aplikasi.
2. Overwrite isi folder di server.
3. Pastikan folder protected/config __TIDAK__ di-overwrite isinya.

## Update Database

1. Download file untuk update database di folder protected/database/*.simcan
2. Login sebagai admin.
3. Temukan menu update.
4. Pilih file updater database. Pastikan memilih sesuai urutannya.
5. Jalankan proses update.

## Known issues

1. Updater database __HANYA__ bisa dijalankan untuk mysql server 5.6.xx sesuai system requirements.
2. Aplikasi __TIDAK__ berada dalam maintenance mode selama proses update. Silakan pilih waktu update ketika user tidak mengakses aplikasi.
