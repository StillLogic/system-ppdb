# 🕌 Sistem PPDB Pondok Pesantren

Sistem Penerimaan Peserta Didik Baru (PPDB) untuk Pondok Pesantren berbasis web menggunakan Laravel 11.

## 📋 Deskripsi

Aplikasi ini adalah sistem manajemen PPDB yang memudahkan proses pendaftaran santri baru secara online. Sistem ini memiliki 2 role utama: **Admin** dan **Pendaftar**, dengan fitur lengkap untuk mengelola data pendaftaran dari awal hingga verifikasi.

## ✨ Fitur Utama

### 🔐 Authentication

- Registrasi akun pendaftar
- Login dengan role-based access (Admin & Pendaftar)
- Logout dengan session management

### 👤 Fitur Pendaftar

- Dashboard dengan ringkasan status pendaftaran
- Form pendaftaran santri baru (lengkap dengan data pribadi, orang tua, dan alamat)
- Edit data pendaftaran (hanya jika status masih pending)
- View status pendaftaran (Pending/Diterima/Ditolak)
- Nomor pendaftaran otomatis

### 👨‍💼 Fitur Admin

- Dashboard dengan statistik (Total, Pending, Diterima, Ditolak)
- CRUD Data Pendaftar
    - Lihat semua data pendaftaran
    - Tambah pendaftar baru (otomatis create akun dengan password random)
    - Detail pendaftar
    - Update status pendaftaran
    - Hapus data pendaftar
- Filter & Search pendaftar
- Manajemen Akun
    - Lihat semua user (Admin & Pendaftar)
    - Tambah akun admin baru
    - Hapus akun user
- Modal konfirmasi untuk aksi hapus
- Modal kredensial untuk akun baru (dengan tombol copy password)

### 🎨 UI/UX Features

- Toast notification (auto-hide 3 detik) di kanan atas
- Modal konfirmasi untuk delete actions
- Modal kredensial untuk informasi akun baru
- Toggle show/hide password di semua form
- Responsive design dengan Tailwind CSS
- Islamic theme dengan warna biru, hijau emerald, dan gold

## 🛠 Teknologi yang Digunakan

- **Framework**: Laravel 11.x
- **PHP**: 8.4.17
- **Database**: MySQL
- **Authentication**: Laravel Built-in Auth
- **Authorization**: Spatie Laravel Permission v6.24
- **Frontend**: Tailwind CSS (CDN), Blade Template
- **Icons**: SVG (Heroicons)

## 📁 Struktur Project

```
system-ppdb/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Auth/
│   │       │   ├── LoginController.php        # Handle login
│   │       │   └── RegisterController.php     # Handle registrasi
│   │       ├── Admin/
│   │       │   ├── PendaftaranAdminController.php  # CRUD pendaftar by admin
│   │       │   └── AkunController.php         # Manajemen akun admin
│   │       ├── PendaftaranController.php      # CRUD pendaftaran by pendaftar
│   │       └── Controller.php                 # Base controller
│   ├── Models/
│   │   ├── User.php                          # Model user dengan Spatie Permission
│   │   └── Pendaftaran.php                   # Model data pendaftaran
│   └── Providers/
│       └── AppServiceProvider.php
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2024_01_15_000000_create_permission_tables.php
│   │   └── 2024_01_15_000001_create_pendaftaran_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php                # Seed akun admin
│       └── RoleSeeder.php                    # Seed roles (admin, pendaftar)
│
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php               # Halaman login
│       │   └── register.blade.php            # Halaman registrasi
│       ├── admin/
│       │   ├── dashboard.blade.php           # Dashboard admin
│       │   ├── akun.blade.php                # Manajemen akun
│       │   ├── akun/
│       │   │   └── create-admin.blade.php    # Form tambah admin
│       │   ├── pendaftar/
│       │   │   ├── index.blade.php           # List pendaftar
│       │   │   ├── show.blade.php            # Detail pendaftar
│       │   │   └── create.blade.php          # Form tambah pendaftar
│       │   └── partials/
│       │       └── sidebar.blade.php         # Sidebar admin
│       ├── pendaftar/
│       │   ├── dashboard.blade.php           # Dashboard pendaftar
│       │   ├── form-pendaftaran.blade.php    # Form pendaftaran baru
│       │   └── edit-pendaftaran.blade.php    # Form edit pendaftaran
│       ├── components/
│       │   ├── toast.blade.php               # Toast notification
│       │   ├── confirm-modal.blade.php       # Modal konfirmasi delete
│       │   └── credentials-modal.blade.php   # Modal kredensial akun baru
│       ├── layouts/
│       │   └── head.blade.php                # Shared head (title, icon, tailwind)
│       └── landing.blade.php                 # Landing page
│
├── routes/
│   └── web.php                               # Semua routing aplikasi
│
├── .env                                      # Environment configuration
├── composer.json                             # PHP dependencies
└── README.md                                 # Dokumentasi ini
```

## 🚀 Cara Instalasi

### Prasyarat

- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Git

### Langkah Instalasi

1. **Clone Repository**

    ```bash
    git clone <repository-url>
    cd system-ppdb
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

3. **Setup Environment**

    ```bash
    cp .env.example .env
    ```

    Edit file `.env` dan sesuaikan konfigurasi database:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ppdb_pesantren
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Buat Database**

    ```bash
    mysql -u root -p
    CREATE DATABASE ppdb_pesantren;
    exit;
    ```

6. **Jalankan Migration & Seeder**

    ```bash
    php artisan migrate --seed
    ```

    Seeder akan membuat:
    - Role: `admin` dan `pendaftar`
    - Akun Admin default:
        - Email: `admin@pesantren.ac.id`
        - Password: `password`

7. **Jalankan Development Server**

    ```bash
    php artisan serve
    ```

    Aplikasi akan berjalan di: `http://localhost:8000`

## 👥 Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

**Admin:**

- Email: `admin@pesantren.ac.id`
- Password: `password`

## 📖 Cara Penggunaan

### Untuk Pendaftar

1. **Registrasi Akun**
    - Klik "Daftar Sekarang" di halaman login
    - Isi form registrasi (Nama, Email, Password)
    - Otomatis login setelah registrasi berhasil

2. **Isi Form Pendaftaran**
    - Login ke sistem
    - Klik "Isi Formulir Pendaftaran" di dashboard
    - Lengkapi semua data yang diperlukan:
        - Data Pribadi
        - Data Orang Tua
        - Alamat Lengkap
    - Submit formulir

3. **Cek Status Pendaftaran**
    - Status akan muncul di dashboard
    - Kemungkinan status: Pending, Diterima, Ditolak

4. **Edit Pendaftaran**
    - Hanya bisa edit jika status masih "Pending"
    - Klik "Edit Data" di dashboard
    - Update data yang diperlukan

### Untuk Admin

1. **Login**
    - Gunakan akun admin default atau akun admin yang sudah dibuat

2. **Dashboard**
    - Lihat statistik pendaftaran
    - Lihat 5 pendaftar terbaru

3. **Kelola Data Pendaftar**
    - **Lihat Semua**: Menu "Data Pendaftar"
    - **Filter**: Berdasarkan status (Pending/Diterima/Ditolak)
    - **Search**: Cari berdasarkan nama atau nomor pendaftaran
    - **Detail**: Klik nama pendaftar untuk lihat detail lengkap
    - **Update Status**: Ubah status menjadi Diterima/Ditolak
    - **Hapus**: Hapus data pendaftar (dengan konfirmasi modal)

4. **Tambah Pendaftar Baru (oleh Admin)**
    - Klik "Tambah Pendaftar" di halaman Data Pendaftar
    - Isi semua form yang diperlukan
    - Sistem otomatis:
        - Generate password random (8 karakter)
        - Create akun user
        - Assign role "pendaftar"
        - Tampilkan kredensial di modal (bisa dicopy)
    - **Penting**: Catat kredensial untuk diberikan ke pendaftar

5. **Manajemen Akun**
    - Lihat semua user (Admin & Pendaftar)
    - **Tambah Admin**: Buat akun admin baru dengan password manual
    - **Hapus Akun**: Hapus user (tidak bisa hapus akun sendiri)

## 🗄 Database Schema

### Tabel: users

- id
- name
- email
- password
- created_at, updated_at

### Tabel: pendaftaran

- id
- user_id (FK ke users)
- nomor_pendaftaran (auto-generated)
- nama_lengkap
- jenis_kelamin
- tempat_lahir
- tanggal_lahir
- no_telepon
- asal_sekolah
- nama_ayah
- nama_ibu
- pekerjaan_ayah
- pekerjaan_ibu
- no_telepon_ortu
- alamat_lengkap
- rt_rw
- kelurahan
- kecamatan
- kota
- provinsi
- kode_pos
- status (pending/diterima/ditolak)
- created_at, updated_at

### Tabel Spatie Permission

- roles
- permissions
- model_has_roles
- model_has_permissions
- role_has_permissions

## 🎯 Fitur Keamanan

- ✅ Password hashing dengan bcrypt
- ✅ CSRF Protection
- ✅ Role-based Access Control
- ✅ Middleware authentication
- ✅ SQL Injection prevention (Eloquent ORM)
- ✅ XSS Protection (Blade auto-escaping)

## 🔄 Update & Maintenance

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Fresh Install (Reset Database)

```bash
php artisan migrate:fresh --seed
```

## 📝 Notes

- Nomor pendaftaran otomatis di-generate dengan format: `PPDB-YYYYMM-XXXX` (contoh: `PPDB-202601-0001`)
- Password yang di-generate admin untuk pendaftar adalah random string 8 karakter
- Pendaftar hanya bisa edit data jika status masih "Pending"
- Admin tidak bisa menghapus akun sendiri
- Toast notification otomatis hilang setelah 3 detik
- Modal kredensial hanya muncul sekali setelah create akun