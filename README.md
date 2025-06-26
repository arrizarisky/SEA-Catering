# SEA Catering Web Application

Website layanan makanan sehat dengan sistem pemesanan online dan pengiriman cepat.

---

## 🚀 Fitur Utama

- Pilihan paket makanan sehat: Diet, Protein, dan Royal Plan
- Pengiriman fleksibel: pilih waktu makan pagi / siang / malam
- Sistem testimoni pelanggan
- UI modern dengan Tailwind CSS
- Responsif & ringan

---

## 📦 Cara Setup dan Jalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/username/sea-catering.git
cd sea-catering
```

### 2. Install Dependency

```bash
composer install
npm install
```

### 3. Salin File Environment

```bash
cp .env.example .env
```

### 4. Generate Key

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan koneksi database kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sea_catering
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrasi dan Seed Database

```bash
php artisan migrate --seed
```

### 7. Jalankan Server

```bash
php artisan serve
```

### 8. Jalankan Build Frontend (Vite)

```bash
npm run dev
```

---

## 🌱 Variabel Environment

Berikut beberapa variabel `.env` penting:

```env
APP_NAME="SEA Catering"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sea_catering
DB_USERNAME=root
DB_PASSWORD=

# Mail
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@seacatering.com
MAIL_FROM_NAME="${APP_NAME}"

# VITE
VITE_APP_NAME="SEA Catering"
```

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
