# Algoora News

**Algoora News** adalah portal berita terpercaya yang menyajikan informasi terkini dan mendalam di berbagai bidang, termasuk cryptocurrency, bisnis, teknologi, dan lainnya. Kami memahami bahwa di era digital, kebutuhan akan informasi cepat, akurat, dan relevan menjadi prioritas untuk mengikuti perkembangan dunia yang dinamis.

---

## Demo Website

Demo website dapat diakses melalui tautan berikut:  
🔗 **[https://news.sipdik.online](https://news.sipdik.online)**

### Akses Login Admin

| **Email**       | **Password** |
| --------------- | ------------ |
| admin@gmail.com | 12345678     |

---

## Fitur Utama

-   **Manajemen Artikel**: Tambah, edit, hapus, dan kelola artikel dengan mudah.
-   **Manajemen Pengguna**: Kelola data pengguna termasuk peran dan izin akses.
-   **Manajemen Kategori**: Atur kategori berita untuk memudahkan navigasi pembaca.
-   **Profil Pengguna**: Update informasi pribadi dan kelola preferensi akun.
-   **Autentikasi Sosial**: Login cepat dengan Google OAuth.
-   **Notifikasi Email**: Kirim pemberitahuan melalui Mailtrap untuk autentikasi.

---

## Teknologi dan Integrasi

-   **Laravel x Livewire**: Framework PHP untuk pengembangan backend dan frontend interaktif.
-   **Flowbite**: Komponen UI berbasis Tailwind CSS untuk desain responsif.
-   **Google OAuth**: Autentikasi sosial untuk kenyamanan login pengguna.
-   **Mailtrap**: Notifikasi email dalam proses autentikasi.

---

## Persyaratan Sistem

Pastikan sistem Anda memenuhi persyaratan berikut sebelum instalasi:

-   **PHP**: Versi 8.0 atau lebih tinggi
-   **MySQL**: Untuk database
-   **Composer**: Pengelola dependensi PHP
-   **Node.js dan NPM**: Untuk pengelolaan dependensi frontend

---

## Cara Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal proyek di lingkungan lokal Anda.

### 1. Clone Repository

```bash
git clone https://github.com/razorzero0/news
```

### 2. Masuk ke Direktori

```bash
cd news
```

### 3. Instal Dependensi

```bash
composer install
```

### 4. Buat File Environment

```bash
cp .env.example .env
```

### 5. Konfigurasi Environment

```bash
Sesuaikan pengaturan database (nama database, username, password, dll) di file .env
```

### 6. Generate App Key

```bash
php artisan key:generate
```

### 7. Jalankan Migrasi Database dan Seeder

pastikan table **news** sudah ada di databse mysql anda, misal dengan (phpmyadmin)

```bash
php artisan migrate:fresh --seed
```

### 8. Menjalankan Server

```bash
php artisan serve
```

### 9. Menjalankan Mode Development (Optional)

```bash
npm run dev
```

### 10. Akses Aplikasi di browser

```bash
http://localhost:8000
```
