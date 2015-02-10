# RiDMi #

## Structure

- root
	- index.php (kosong)
	- model
		- admin.php
		- aduan.php
		- Yang tabel referensi perlu gitu modelnya?
	- view
		- header.php
		- footer.php (perlu gak sih)
		- pages
			- home.php
			- aduan.php
			- login.php
			- error.php
	- controller
		- db.php
		- db_config.php
		- daftar_aduan.php
			- Ubah status aduan
			- Notifikasi
		- input_aduan.php
		- auth.php
		- laporan.php
	- assets
		- images
		- css
		- js

## Routes

##### Homepage: `localhost/aduhay/`
- Form pengaduan

##### Daftar Aduan: `localhost/aduhay/aduan`

- Daftar aduan (ya iya lah ya)
- Untuk Admin:
	- Ubah status aduan (tanggapan)
	- Laporan

##### Login page: `localhost/aduhay/login`

- Buat login (ya iya lah ya)