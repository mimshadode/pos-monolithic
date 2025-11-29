# Dokumentasi Struktur Proyek POS

## Struktur Direktori & Organisasi Kode
Aplikasi POS ini disusun secara monolitik dalam satu repository backend. Struktur utama menempatkan model di `app/Models`, controller di `app/Http/Controllers`, serta resource pendukung (config, migration, seeder, view, route) di folder Laravel standar sehingga alur pengembangan tetap terpusat dan konsisten.

## Daftar Model & Controller
| No. | Nama (Model / Controller) | Tipe / Lokasi File | Fungsi / Modul | Keterangan |
| --- | --- | --- | --- | --- |
| 1 | Produk | Model — `app/Models/Produk.php` | Data master produk | Menyimpan data produk yang tersedia untuk dijual |
| 2 | Kategori | Model — `app/Models/Kategori.php` | Kategori produk | Menyimpan klasifikasi produk |
| 3 | Pengguna / User | Model — `app/Models/Pengguna.php`; `app/Models/User.php` | Data pengguna & autentikasi | Menyimpan data user (kasir/admin) |
| 4 | Role / PenggunaRole | Model — `app/Models/Role.php`; `app/Models/PenggunaRole.php` | Hak akses (opsional) | Relasi pengguna ↔ role |
| 5 | Transaksi | Model — `app/Models/Transaksi.php` | Header transaksi penjualan | Menyimpan data transaksi (tanggal, total, metode bayar, status) |
| 6 | ItemPemesanan | Model — `app/Models/ItemPemesanan.php` | Detail item transaksi | Menyimpan daftar item per transaksi: produk, kuantitas, subtotal |
| 7 | Pembayaran / MetodePembayaran | Model — `app/Models/Pembayaran.php`; `app/Models/MetodePembayaran.php` | Data pembayaran transaksi | Catatan metode & jumlah pembayaran |
| 8 | Nota | Model — `app/Models/Nota.php` | Bukti transaksi / invoice | Informasi nota / cetak nota |
| 9 | Laporan & LaporanDetail | Model — `app/Models/Laporan.php`; `app/Models/LaporanDetail.php` | Rekap penjualan / laporan | Menyimpan ringkasan penjualan per periode |
| 10 | AuthController | Controller — `app/Http/Controllers/AuthController.php` | Autentikasi & otorisasi | Login, logout, validasi user |
| 11 | ProdukController | Controller — `app/Http/Controllers/ProdukController.php` | CRUD produk & kategori | Manajemen katalog produk |
| 12 | TransaksiController / PemesananController | Controller — `app/Http/Controllers/TransaksiController.php`; `app/Http/Controllers/PemesananController.php` | Proses transaksi | Order, hitung total, simpan transaksi & detail, update stok |
| 13 | PembayaranController / NotaController | Controller — `app/Http/Controllers/PembayaranController.php`; `app/Http/Controllers/NotaController.php` | Proses pembayaran & nota | Menyelesaikan pembayaran dan menghasilkan nota |
| 14 | LaporanController | Controller — `app/Http/Controllers/LaporanController.php` | Generate & fetch laporan | Membuat laporan penjualan berdasarkan periode |
| 15 | (Optional) DashboardController / PosController | Controller — `app/Http/Controllers/DashboardController.php`; `app/Http/Controllers/PosController.php` | Dashboard/UI POS utama | Menyediakan ringkasan & integrasi antar modul |

## Penjelasan Struktur & Alur Modular
Alur permintaan dimulai dari UI (web/mobile) menuju definisi route, lalu diteruskan ke controller yang mengorkestrasi logika bisnis, memanggil model untuk interaksi database, dan mengembalikan response ke pengguna. Pendekatan modular pada layer controller dan model menjaga pemisahan tanggung jawab, sementara arsitektur monolitik memudahkan koordinasi deployment, transaksi antar modul, dan pemeliharaan kode di satu basis repositori.

## Pedoman Konvensi Penamaan & Lingkungan Eksekusi
*(Placeholder untuk mendokumentasikan konvensi penamaan, struktur folder, konfigurasi aplikasi, serta langkah penyiapan environment pengembangan & produksi.)*
