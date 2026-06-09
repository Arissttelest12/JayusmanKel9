# 📌 Mid Semester Project  
### PWL - Kelompok 9  
**Kelas:** IF D 2023  

---

## 👥 Anggota Kelompok

- **Dzikri Muhammad Akbar** (5520123120)  
  GitHub: Arissttelest12, Dzikri07  

- **Nova Dwi Aprilia** (5520123138)  

- **Moh Rizcky Ardhiansyah** (5520123129)  

---

## 🎨 Teknologi yang Digunakan

| Package              | Versi           |
| -------------------- | --------------- |
| PHP                  | ^8.2            |
| Laravel              | ^12.0           |
| Spatie Permission    | ^7.4            |
| Laravel Breeze       | ^2.4            |
| Maatwebsite Excel    | ^3.1            |
| DomPDF               | ^3.1            |
| Tailwind CSS         | ^4.3.0          |
| Alpine.js            | ^3.4.2          |
| Vite                 | ^7.0.7          |
| Node.js              | Disarankan v18+ |

---

## ⚙️ Panduan Menjalankan Project (Lengkap)

### Prasyarat

Pastikan sudah terinstall di komputer kamu:

- **PHP >= 8.2** (beserta extension: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`)
- **Composer** (https://getcomposer.org)
- **Node.js >= 18** & **npm** (https://nodejs.org)
- **MySQL** (bisa pakai Laragon, XAMPP, atau install langsung)
- **Git** (https://git-scm.com)

---

### 🚀 Langkah 1 — Clone Repository

```bash
git clone https://github.com/Arissttelest12/JayusmanKel9.git
cd JayusmanKel9
```

---

### 📦 Langkah 2 — Install Dependency PHP (Composer)

```bash
composer install
```

> Ini akan menginstall semua package PHP yang dibutuhkan (Laravel, Spatie Permission, DomPDF, Excel, dll).

---

### 📦 Langkah 3 — Install Dependency Node.js (NPM)

```bash
npm install
```

> Ini akan menginstall Tailwind CSS, Alpine.js, Vite, dan package frontend lainnya.

---

### 🔧 Langkah 4 — Setup File Environment (.env)

```bash
cp .env.example .env
```

> Di Windows (CMD), gunakan:
> ```cmd
> copy .env.example .env
> ```

Lalu buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jayusman_kel9
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ **Penting:** Buat database `jayusman_kel9` (atau nama lain sesuai keinginan) di MySQL terlebih dahulu sebelum lanjut ke langkah berikutnya. Bisa melalui phpMyAdmin, HeidiSQL, atau command line:
> ```sql
> CREATE DATABASE jayusman_kel9;
> ```

---

### 🔑 Langkah 5 — Generate Application Key

```bash
php artisan key:generate
```

---

### 🗄️ Langkah 6 — Jalankan Migrasi Database

```bash
php artisan migrate:fresh
```

> Perintah `migrate:fresh` akan **drop semua tabel** lalu menjalankan ulang seluruh migration dari awal. Ini termasuk tabel `permission_tables` dari Spatie, jadi **tidak perlu** jalanin command terpisah untuk setup permission — semua tabel sudah otomatis dibuat.

---

### 🌱 Langkah 7 — Jalankan Database Seeder

```bash
php artisan db:seed
```

> Seeder ini akan membuat:
> - **5 Role:** `owner`, `manajer`, `supervisor`, `kasir`, `gudang`
> - **4 User default:**
>
> | Nama          | Email              | Password   | Role    |
> | ------------- | ------------------ | ---------- | ------- |
> | Pak Jayusman  | owner@gmail.com    | `password` | owner   |
> | Manajer Toko  | manajer@gmail.com  | `password` | manajer |
> | Kasir         | kasir@gmail.com    | `password` | kasir   |
> | Admin         | admin@gmail.com    | `password` | owner   |
>
> - Data dummy: Cabang, Kategori, Barang, Stok, Transaksi, dll.

**Atau jalankan migrate + seed sekaligus:**

```bash
php artisan migrate:fresh --seed
```

---

### 🔐 Langkah 8 — Setup Auth Permission (Spatie)

`RoleAndPermissionSeeder` **tidak** dipanggil otomatis oleh `DatabaseSeeder`. Jadi untuk assign permission ke setiap role, jalankan:

```bash
php artisan db:seed --class=RoleAndPermissionSeeder
```

> Ini akan membuat 10 permission dan meng-assign-nya ke role yang sesuai:
>
> | Role       | Permissions                                      |
> | ---------- | ------------------------------------------------ |
> | owner      | **Semua permission** (full access)                |
> | manajer    | `manage_users`, `view_reports`, `view_transactions` |
> | supervisor | `view_transactions`                               |
> | kasir      | `create_transactions`                             |
> | gudang     | `manage_stocks`, `manage_stock_in_out`            |

---

### 🎨 Langkah 9 — Build / Jalankan Frontend (Vite)

**Untuk development** (auto-reload saat edit file):

```bash
npm run dev
```

**Untuk production build:**

```bash
npm run build
```

---

### 🖥️ Langkah 10 — Jalankan Server Laravel

Buka terminal baru (biarkan `npm run dev` tetap jalan), lalu:

```bash
php artisan serve
```

Akses aplikasi di browser: **http://localhost:8000**

---

### ⚡ Shortcut: Jalankan Semua Sekaligus (Dev Mode)

Project ini sudah punya Composer script untuk jalankan server + queue + vite sekaligus:

```bash
composer dev
```

> Ini akan menjalankan secara paralel:
> - `php artisan serve` (server)
> - `php artisan queue:listen` (queue worker)
> - `php artisan pail` (log viewer)
> - `npm run dev` (Vite)

---

## 📋 Ringkasan Command (Copy-Paste Ready)

```bash
# 1. Clone repo
git clone https://github.com/Arissttelest12/JayusmanKel9.git
cd JayusmanKel9

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
# Edit .env → sesuaikan DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 4. Generate key
php artisan key:generate

# 5. Migrate + Seed database
php artisan migrate:fresh --seed

# 6. Setup permissions
php artisan db:seed --class=RoleAndPermissionSeeder

# 7. Jalankan aplikasi
npm run dev          # terminal 1
php artisan serve    # terminal 2 (atau pakai: composer dev)
```

---

## 🔄 Reset Database (Kalau Ada Masalah)

Kalau database bermasalah atau mau reset dari awal:

```bash
php artisan migrate:fresh --seed
php artisan db:seed --class=RoleAndPermissionSeeder
```

---

## 🛠️ Troubleshooting

| Masalah | Solusi |
| ------- | ------ |
| `SQLSTATE[HY000] [1049] Unknown database` | Buat database-nya dulu di MySQL |
| `No application encryption key` | Jalankan `php artisan key:generate` |
| Halaman blank / style tidak muncul | Pastikan `npm run dev` sedang jalan |
| `Permission denied` atau error Spatie | Jalankan `php artisan db:seed --class=RoleAndPermissionSeeder` |
| `composer install` error | Pastikan PHP >= 8.2 dan extension yang dibutuhkan sudah aktif |
| Port 8000 sudah dipakai | Gunakan `php artisan serve --port=8080` |
