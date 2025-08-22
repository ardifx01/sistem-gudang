# sistem-gudang
Sistem manajemen gudang sederhana menggunakan CodeIgniter 4
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
1. download composer dari official webnya
2. setelah terinstall, buka cmd dan tulis di bash "composer create-project codeigniter4/appstarter namafolderanda"
3. buka bash anda dan ketik "cd namafolderanda"
4. tes localhost dengan "php spark serve" dan akan muncul "localhost/8080"
5. ketik "code." agar bisa langsung membuka folder "namafolderanda"
6. dan sekarang bisa anda coba deh code anda
