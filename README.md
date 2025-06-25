# PT.IndustriGolfInd

📌 _Laravel-based web application for Golf Car Rental Management System._

---

## 🇮🇩 Deskripsi Singkat (Bahasa Indonesia)

**PT.IndustriGolfInd** adalah aplikasi web berbasis Laravel untuk mempermudah proses penyewaan mobil golf. Proyek ini dibuat sebagai bagian dari tugas akhir dan dilengkapi dengan sistem reservasi, manajemen mobil, serta panel admin.

## 🇬🇧 Brief Description (English)

**PT.IndustriGolfInd** is a Laravel-based web application developed for managing golf car rental services. It features booking management, car listings, and an admin control panel for efficient operations.

---

## ✨ Fitur Utama / Key Features

| 🇮🇩 Bahasa Indonesia           | 🇬🇧 English                        |
|------------------------------|------------------------------------|
| ✅ Registrasi & Login         | ✅ User Registration & Login       |
| ✅ Booking Mobil Golf         | ✅ Golf Car Booking                |
| ✅ Upload Bukti Pembayaran    | ✅ Payment Proof Upload            |
| ✅ Panel Admin Lengkap        | ✅ Full-featured Admin Panel       |
| ✅ Notifikasi & Redirect      | ✅ Redirect + Notification System  |

## ⚙️ Instalasi / Installation

```bash
# 1. Clone repository
git clone https://github.com/Yorichi154/PT.IndustriGolfInd.git

# 2. Masuk folder project / Enter project folder
cd PT.IndustriGolfInd

# 3. Install dependency Laravel
composer install

# 4. Copy dan konfigurasi .env
cp .env.example .env
# Edit DB settings di file .env

# 5. Generate application key
php artisan key:generate

# 6. Migrasi database
php artisan migrate

# 7. (Opsional) Seed database
php artisan db:seed

# 8. Jalankan server lokal
php artisan serve
