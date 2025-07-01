# SEA Catering Web Application

Tugas Untuk Memenuhi Syarat Pendaftaran Software Engineering Academy COMPFEST17

---

## 🖥️ Langkah Instalasi di Komputer Lokal

Ikuti langkah-langkah berikut untuk menjalankan website ini di komputer kamu:

### 1. **Clone Repository**

Clone source code dari GitHub ke komputer kamu:

```bash
git clone https://github.com/arrizarisky/sea-catering.git
cd sea-catering
```

### 2. **Install Dependency Backend & Frontend**

Install dependency PHP dan Node.js:

```bash
composer install
npm install
```

### 3. **Salin File Environment**

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```
> Jika di Windows, bisa juga dengan:
> ```
> copy .env.example .env
> ```

### 4. **Generate Application Key**

Jalankan perintah berikut untuk membuat APP_KEY:

```bash
php artisan key:generate
```

### 5. **Konfigurasi Database**

Edit file `.env` dan sesuaikan bagian database dengan pengaturan MySQL lokal kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sea_catering
DB_USERNAME=root
DB_PASSWORD=
```

### 6. **Migrasi & Seed Database**

Jalankan migrasi dan seeder untuk membuat tabel dan data awal:

```bash
php artisan migrate --seed
```

### 7. **Jalankan Server Laravel**

Mulai server Laravel:

```bash
php artisan serve
```
Akses website di [http://localhost:8000](http://localhost:8000)

### 8. **Jalankan Build Frontend (Vite)**

Di terminal baru, jalankan:

```bash
npm run dev
```
Agar perubahan pada file frontend langsung terlihat.

---

## ℹ️ Catatan

- Pastikan sudah menginstall **PHP**, **Composer**, **Node.js**, **npm**, dan **MySQL** di komputer kamu.
- Jika ada error permission di Windows, jalankan terminal sebagai administrator.
- Untuk login admin/pelanggan, gunakan akun yang sudah di-seed atau Login admin : `admin@sea-catering.com` / `password`

---

## ✅ Tools yang Digunakan

- Laravel 8.3
- Laravel Breeze
- Tailwind CSS
- Vite
- MySQL

---

## 🤝 Kontributor

- Muhammad Arriza Risky - Developer

---