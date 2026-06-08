# Laporan Penjelasan Solusi Web App Jayusman

## Latar Belakang Masalah
Bapak Jayusman, seorang pengusaha minimarket dengan 5 cabang di berbagai kota, mengalami kendala dalam pengawasan operasional tokonya. Beliau harus mendatangi setiap cabang secara langsung untuk mengecek transaksi dan stok barang. Kurangnya pengawasan yang efisien ini memicu adanya pegawai yang tidak jujur, sehingga terjadi manipulasi transaksi dan stok barang. Dibutuhkan sebuah solusi tersentralisasi agar pemantauan dapat dilakukan dari jarak jauh serta mencegah manipulasi oleh pegawai.

## Solusi yang Ditawarkan
Kami memberikan solusi untuk membuat aplikasi web dikarenakan aplikasi berbasis web dapat diakses dari mana saja dan kapan saja melalui satu domain terpusat tanpa mengharuskan instalasi di setiap komputer cabang. Bapak Jayusman tidak perlu lagi repot mendatangi kelima cabang di kota yang berbeda. Kami menggunakan **Laravel** sebagai framework backend dan **MySQL** sebagai sistem basis data. Pilihan teknologi ini sangat ideal untuk mengakomodir relasi data yang kompleks (seperti data antar 5 cabang), skalabilitas tinggi, perlindungan keamanan terhadap manipulasi data, serta pemrosesan transaksi yang cepat dan andal.

## Penjelasan Fitur dan Cara Kerja dalam Solusi (Folder `JayusmanKel9/`)

Berdasarkan arsitektur pada direktori `JayusmanKel9`, berikut adalah rincian fitur dan cara kerjanya untuk memecahkan masalah:

### 1. Manajemen Hak Akses Berlapis (Role & Permission)
Untuk mengatasi masalah manipulasi data oleh pegawai yang tidak jujur, sistem menerapkan pembatasan hak akses berjenjang secara ketat. Hal ini terlihat pada file migrasi database dan `DatabaseSeeder.php` yang menggunakan *Spatie Permission* untuk membagi peran (*role*):
- **Owner (Pak Jayusman)**: Diberikan hak akses tertinggi (Super Admin) untuk melihat, mengawasi stok, dan mengecek seluruh transaksi dari semua cabang secara transparan.
- **Manajer Toko**: Dialokasikan pada cabang tertentu. Hanya dapat melihat laporan dan mengelola cabang di bawah yurisdiksinya. Bertanggung jawab atas pencetakan laporan bulanan.
- **Supervisor**: Mengawasi jalannya proses transaksi di toko dengan hak akses untuk validasi.
- **Kasir**: Diberi akses terbatas hanya pada modul *Point of Sales* (transaksi penjualan). Kasir tidak memiliki hak untuk mengubah atau menghapus data stok barang secara bebas.
- **Pegawai Gudang**: Mengelola alur administrasi `Stok Masuk` dan `Stok Keluar` tanpa bisa mengutak-atik nominal uang transaksi.

### 2. Modul Manajemen Cabang Sentralisasi
Melalui `CabangController.php`, sistem menampung seluruh entitas 5 cabang dalam satu database (tabel `cabang`). Setiap aktivitas pengguna (*users*), ketersediaan stok (*stok_barang*), maupun proses pembayaran (*transaksi*) diikat erat dengan relasi `id_cabang`. Hal ini memampukan Pak Jayusman melihat data secara spesifik untuk tiap cabang hanya dari satu dashboard domain.

### 3. Modul Pengawasan Stok Barang Berlapis
Salah satu kerentanan terbesar adalah manipulasi stok barang. Solusi yang dibangun menggunakan pendekatan 3 lapis untuk meminimalisasi kecurangan, yang dijalankan melalui beberapa Controller:
- **`StokMasukController`**: Mencatat setiap ada barang datang, siapa yang mencatat, jumlah, dan ke cabang mana.
- **`StokKeluarController`**: Mencatat setiap pengeluaran barang dari gudang.
- **`StokBarangController`**: Melakukan kalkulasi total berdasarkan stok masuk, stok keluar, dan hasil transaksi penjualan. Pegawai tidak bisa sekadar mengganti angka pada jumlah akhir stok tanpa melewati proses "Stok Masuk/Keluar", sehingga jejak audit barang dapat dilacak.

### 4. Modul Transaksi & Pembayaran Real-time
Melalui `TransaksiController.php` dan tabel `transaksi`, sistem merekam secara *real-time* setiap penjualan yang dilakukan oleh Kasir. Tabel ini mencatat `id_cabang`, `id_kasir`, `tanggal_transaksi`, `total_harga`, serta metode pembayaran. Data ini langsung ter-sinkronisasi dan dapat dipantau oleh Pak Jayusman pada detik yang sama di mana transaksi itu terjadi. 

### 5. Modul Audit Trail (Log Aktivitas)
Sistem memiliki tabel khusus bernama `log_aktivitas`. Tabel ini berfungsi layaknya CCTV digital; setiap kali seorang pegawai menambah, mengubah, atau menghapus data (baik transaksi maupun stok), sistem secara otomatis mencatat aktivitas tersebut lengkap dengan ID pegawai dan waktu (timestamp) kejadiannya. Fitur ini dirancang khusus untuk memastikan pertanggungjawaban serta mencegah dan mengidentifikasi kecurangan.

### 6. Fitur Rekapitulasi & Laporan (Reports)
Menjawab kebutuhan spesifik Manajer Toko untuk melakukan pencetakan, solusi ini menyediakan modul *Reports* (seperti terlihat pada antarmuka `reports/index.blade.php`). Fitur ini memungkinkan Manajer Toko untuk:
- Melakukan filter data transaksi, stok barang, dan penjualan berdasarkan rentang tanggal tertentu (periode harian, mingguan, bulanan).
- Menyediakan tombol fitur **Export PDF** dan **Export Excel** untuk mempermudah proses pencetakan dan pengarsipan bukti fisik secara akurat.

## Kesimpulan
Aplikasi berbasis web Laravel yang dibuat telah sangat sesuai untuk memecahkan masalah Pak Jayusman:
1. **Pengecekan Kapan Pun & Dari Mana Saja**: Dengan arsitektur web satu domain, Pak Jayusman dapat mengecek data 5 cabang secara instan tanpa perlu datang ke lokasi fisik.
2. **Pengamanan dari Manipulasi**: Implementasi hak akses khusus, audit trail (*log aktivitas*), dan sistem stok yang saling memvalidasi efektif membatasi ruang gerak pegawai yang berniat curang.
3. **Pencetakan oleh Manajer Toko**: Modul Reports mengizinkan Manajer memfilter laporan berdasar tanggal untuk diunduh (PDF/Excel) dan dicetak dengan mudah.
