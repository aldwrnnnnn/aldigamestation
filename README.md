<div align="center">

# 🎮 ALDI GAME STATION
### Platform Web Rental & Reservasi Konsol PlayStation (PS3, PS4, PS5)

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-Proprietary-red.svg?style=for-the-badge)](./LICENSE)
[![Author](https://img.shields.io/badge/Creator-Gede%20Aldi%20Irawan-blue?style=for-the-badge&logo=github)](https://github.com/aldwrnnnnn)

---

### 🛡️ WATERMARK & HAK CIPTA PROYEK
**Proyek ini secara eksklusif dirancang, dibangun, dan dimiliki oleh:**  
**Gede Aldi Irawan** ([@aldwrnnnnn](https://github.com/aldwrnnnnn))  
*Hak Cipta © 2026 Gede Aldi Irawan. Seluruh hak cipta dilindungi undang-undang (All Rights Reserved).*  
**DILARANG KERAS MENGGANDAKAN, MENJUAL KEMBALI, ATAU MENGKLAIM KARYA INI TANPA IZIN TERTULIS.**

---

</div>

## 📌 Tentang Proyek

**Aldi Game Station** adalah aplikasi berbasis web yang dirancang khusus untuk mempermudah operasional rental PlayStation (PS3, PS4, dan PS5). Platform ini memfasilitasi para gamer dan komunitas lokal dalam mengecek ketersediaan katalog game, melihat transparansi harga rental, melakukan reservasi online, hingga memantau status pesanan secara real-time.

Aplikasi ini mengatasi kendala antrean panjang dan ketidakpastian unit di rental game konvensional dengan menyediakan 2 skema pemesanan utama:
1. **Main di Tempat (Rental Studio)**: Bermain di studio ber-AC dengan sofa nyaman, layar lebar, dan kontroler orisinal prima (dihitung per jam).
2. **Sewa Bawa Pulang (Take Home)**: Membawa pulang konsol game lengkap beserta aksesoris untuk bermain di rumah (dihitung per hari).

---

## ✨ Fitur Utama

- **Katalog Game Interaktif & Real-time**:
  - Filter cepat berdasarkan konsol (Semua, PS5, PS4, PS3).
  - Fitur pencarian instan berdasarkan judul game maupun genre.
  - Penanda badge game populer / trending.
- **Kalkulator Estimasi Tarif Otomatis**:
  - Perhitungan biaya transparan langsung di halaman pemesanan berdasarkan tipe rental, platform konsol, dan durasi sewa.
- **Sistem Reservasi & Form Booking Instan**:
  - Formulir pemesanan cepat dengan validasi lengkap.
  - Pembuatan kode reservasi unik otomatis berformat `ALDI-YYYYMMDD-XXXX`.
- **Integrasi WhatsApp Otomatis**:
  - Tombol konfirmasi otomatis yang mengarahkan pelanggan langsung ke WhatsApp Admin dengan template pesan reservasi yang rapi dan terisi otomatis.
- **Pelacak Status Reservasi (Booking Tracker)**:
  - Pelanggan dapat memantau status booking (Pending, Confirmed, Completed, Cancelled) hanya dengan memasukkan kode booking atau nomor telepon.
- **Desain UI Responsif & Modern**:
  - Tampilan elegan, intuitif, dan nyaman digunakan baik di smartphone maupun desktop.
  - Memenuhi standar kontras warna dan aksesibilitas WCAG AA.

---

## 🛠️ Tech Stack & Arsitektur

- **Backend**: [Laravel 11](https://laravel.com) (PHP 8.2+)
- **Frontend**: Blade Templating, [Tailwind CSS](https://tailwindcss.com), Alpine.js / Vanilla JavaScript
- **Database**: SQLite / MySQL (Database migrations & seeders lengkap)
- **Asset Bundler**: [Vite](https://vitejs.dev)
- **Testing**: PHPUnit Feature & Unit Testing

---

## 🚀 Panduan Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal:

### 1. Prasyarat Sistem
- PHP >= 8.2 (ekstensi: pdo, mbstring, openssl, tokenizer, xml, ctype, json)
- Composer
- Node.js & NPM
- Git

### 2. Kloning Repositori
```bash
git clone https://github.com/aldwrnnnnn/aldigamestation.git
cd aldigamestation
```

### 3. Install Dependensi Backend & Frontend
```bash
# Install paket PHP via Composer
composer install

# Install paket JavaScript via NPM
npm install
```

### 4. Konfigurasi Environment (.env)
```bash
# Duplikat file contoh konfigurasi
cp .env.example .env

# Generate Application Key
php artisan key:generate
```

Sesuaikan konfigurasi nomor WhatsApp admin pada file `.env`:
```env
WHATSAPP_NUMBER=6281529434240
```

### 5. Migrasi & Seeder Database
```bash
# Menjalankan migrasi dan mengisi data katalog game bawaan
php artisan migrate --seed
```

### 6. Menjalankan Server Lokal
Jalankan server Laravel dan Vite asset compiler:
```bash
# Terminal 1: Laravel Development Server
php artisan serve

# Terminal 2: Vite Build Server
npm run dev
```

Buka peramban (browser) dan akses: `http://localhost:8000`

---

## 🔒 Lisensi & Pernyataan Orisinalitas (Copyright Notice)

Hak Cipta (c) 2026 **Gede Aldi Irawan (aldwrnnnnn)**. Seluruh hak cipta dilindungi undang-undang.

```text
================================================================================
                           PROPRIETARY NOTICE
================================================================================
Semua kode sumber, aset desain, struktur basis data, logika bisnis, dan materi
dokumentasi dalam repositori ini adalah milik intelektual dari Gede Aldi Irawan.

KETENTUAN PENGGUNAAN:
1. Dilarang keras melakukan plagiasi, menyalin, memodifikasi, mendistribusikan
   ulang, atau mempublikasikan ulang proyek ini dengan mengatasnamakan pihak lain.
2. Dilarang menggunakan sebagian atau seluruh isi repositori ini untuk tujuan
   komersial tanpa izin tertulis dari pemilik sah.
3. Proyek ini ditampilkan di GitHub hanya sebagai portofolio publik dan sarana
   evaluasi kode bagi pemilik akun.
================================================================================
```

Untuk detail legal selengkapnya, silakan baca file [LICENSE](./LICENSE).

---

## 👤 Profil Pemilik & Pengembang

- **Nama**: Gede Aldi Irawan
- **GitHub**: [@aldwrnnnnn](https://github.com/aldwrnnnnn)
- **Email**: gedealdiirawan5@gmail.com
- **Lokasi Proyek**: Bali, Indonesia

---

<div align="center">
  <sub>Dibangun dengan dedikasi dan cinta untuk komunitas game oleh <b>Gede Aldi Irawan</b>.</sub>
</div>
