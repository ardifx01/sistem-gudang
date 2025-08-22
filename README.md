# Sistem Gudang

## Struktur Proyek
- `app/Controllers` : berisi controller untuk barang, kategori, pembelian, barang masuk/keluar, home
- `app/Models` : berisi model untuk tabel database
- `app/Views` : berisi tampilan (views) untuk halaman CRUD dan laporan
- `public/` : berisi file index.php dan asset
- `writable/` : direktori untuk log, cache, dan upload file
- `Routes.php` : mendefinisikan semua route aplikasi
- `Database/` : konfigurasi koneksi database

## Fitur
1. Manajemen Kategori dan Barang
2. Transaksi Pembelian
3. Barang Masuk & Barang Keluar
4. Stok otomatis bertambah/berkurang sesuai transaksi
5. Laporan barang masuk, barang keluar, dan stok terkini
6. Filter laporan berdasarkan rentang tanggal

## Instalasi & Setup
1.  Pertama, persiapkan tools yang dibutuhkan yaitu : VScode, XAMPP, Composer, CodeIgniter 4y
2. Download XAMPP Dengan Versi v3.30 (Versi Dibawah itu kemungkinan error )
3. Download Composer di Official Web `https://getcomposer.org/download/`
4. Jalan Bash dengan Klik `Win + r` dan di dalam kotak ketik `CMD` kemudian run
5. buat folder anda di file `XAMPP/htdocs` dengan bash` composer create-project codeigniter4/appstarter namafolder` contoh path = `C:\xampp\htdocs`
6. masuk ke folder project, for example `C:\xampp\htdocs\cd namafolder`
7. Start XAMPP Apache dan MySQL
8. Start serve dengan `php spark serve` di bash untuk test koneksi
9. Setelah masuk ketik `code .` untuk dibuka di VScode
10. Anda masuk ke VScode folder `namafolder` dan sudah bisa edit sesuai Kreatifitas Anda
