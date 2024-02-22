## Pemasangan Admin Transisi

Untuk memasang aplikasi ini pada komputer lokal anda, silahkan ikuti petunjuk di bawah ini:

	- jalankan perintah ini pada cmd: composer install
	- berikutnya jalankan perintah: npm install
	- Ketiga jalankan perintah ini pada cmd: cp .env.example .env 
	- Keempat masukkan perintah: php artisan key:generate
	- Buat database, disini saya membuat database bernama: admin_transisi
	- Masukkan admin_transisi pada .env: DB_DATABASE
	- jalankan perintah: php artisan migrate:fresh --seed
	- Bukan terminal/cmd pada jendela baru, masukkan perintah: npm run dev (Berguna untuk menjalankan Vite)
	- Buka jendela baru lagi jalankan: php artisan serve (Berguna untuk menjalankan Laravel)


## CATATAN

disini saya menggunakan OS windows, jadi untuk export pdf (Laravel Snappy) nya harus download:

https://wkhtmltopdf.org/downloads.html

Untuk data excel yang akan diimport saya masukan pada root folder