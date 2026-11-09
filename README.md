# aldigamestation

Platform web layanan rental PlayStation 3, PlayStation 4, dan PlayStation 5 modern yang dirancang untuk mempermudah gamer dan komunitas dalam melihat katalog game, menghitung estimasi biaya sewa, hingga melakukan reservasi unit baik untuk main di studio maupun sewa bawa pulang (take home).

---

## 🎮 Tentang Proyek

**aldigamestation** dibangun untuk mendigitalkan proses operasional rental konsol game. Pengunjung dapat mengecek ketersediaan game secara real-time, memilih tipe rental yang diinginkan, dan langsung menerima kode booking unik yang terintegrasi dengan WhatsApp kasir/admin untuk konfirmasi instan.

### Fitur Utama

- **Katalog Game Interaktif**:
  - Filter game berdasarkan kategori konsol (PS3, PS4, PS5).
  - Pencarian game cepat berdasarkan judul atau genre.
  - Informasi detail kapasitas pemain, genre, dan status ketersediaan unit.

- **Kalkulator Tarif Otomatis**:
  - Perhitungan estimasi biaya sewa yang transparan secara real-time.
  - Mendukung dua opsi layanan: **Main di Studio** (dihitung per jam) dan **Rental Bawa Pulang** (dihitung per hari).

- **Sistem Reservasi & Kode Booking**:
  - Formulir pemesanan online yang mudah dan cepat.
  - Dilengkapi sistem proteksi throttle untuk mencegah spam booking.
  - Pembuatan kode booking unik otomatis setelah formulir dikirim.

- **Integrasi WhatsApp Kasir**:
  - Tombol otomatis untuk mengirimkan rincian reservasi langsung ke nomor WhatsApp pengelola atau kasir rental tanpa perlu mengetik ulang data pemesanan.

- **Pelacak Status Booking**:
  - Fitur pencarian status pemesanan (menunggu konfirmasi, aktif, selesai) cukup dengan memasukkan kode booking.

- **Desain Responsif & Aksesibel**:
  - Antarmuka ramah pengguna (UI/UX clean) yang nyaman diakses melalui perangkat smartphone, tablet, maupun komputer desktop.

---

## 🛠️ Teknologi yang Digunakan

- **Backend Framework**: [Laravel 11](https://laravel.com) (PHP 8.2+)
- **Frontend & Styling**: Blade Templates, [Tailwind CSS](https://tailwindcss.com), [Vite](https://vitejs.dev)
- **Database**: SQLite (default lokal) / MySQL
- **Testing**: PHPUnit

---

## 🚀 Panduan Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

### 1. Prasyarat
Pastikan sistem Anda telah terpasang:
- PHP >= 8.2 (disarankan PHP 8.3)
- Composer
- Node.js & npm
- Git

### 2. Clone Repository
```bash
git clone https://github.com/aldwrnnnnn/aldigamestation.git
cd aldigamestation
```

### 3. Install Dependensi PHP & JavaScript
```bash
# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install
```

### 4. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`, lalu buat application key:
```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database dan nomor WhatsApp pada file `.env` jika diperlukan:
```env
DB_CONNECTION=sqlite
# atau sesuaikan dengan database MySQL lokal Anda
```

### 5. Migrasi dan Seeder Database
Jalankan migrasi tabel beserta data awal (katalog game dan data rental):
```bash
php artisan migrate --seed
```

### 6. Kompilasi Aset & Jalankan Server
Jalankan Vite untuk build aset frontend:
```bash
npm run dev
```

Di terminal terpisah, jalankan server pengembangan Laravel:
```bash
php artisan serve
```

Buka peramban (browser) dan akses alamat:
```
http://localhost:8000
```

---

## 📁 Struktur Penting Proyek

- `app/Http/Controllers/HomeController.php`: Menangani halaman utama, filter katalog game, serta endpoint API game.
- `app/Http/Controllers/BookingController.php`: Menangani pemrosesan booking baru, kalkulasi harga, format WhatsApp URL, dan pelacakan status booking.
- `app/Models/Game.php`: Model data game dan platform PlayStation.
- `app/Models/Booking.php`: Model data reservasi dan status pemesanan.
- `resources/views/home.blade.php`: Tampilan antarmuka utama pengguna.
- `database/seeders/`: Data awal katalog game populer dan contoh booking.

---

## 🧪 Menjalankan Pengujian (Testing)

Untuk memastikan seluruh logika aplikasi berjalan dengan baik:
```bash
php artisan test
```

---

## 📄 Hak Cipta & Lisensi

Hak Cipta (c) 2024-2026 **Gede Aldi Irawan** ([@aldwrnnnnn](https://github.com/aldwrnnnnn)). Seluruh hak cipta dilindungi undang-undang (All Rights Reserved).

Proyek **aldigamestation** ini merupakan karya orisinal milik **Gede Aldi Irawan**. Segala bentuk penggunaan, penggandaan, modifikasi, maupun distribusi kode sumber untuk keperluan komersial tanpa izin tertulis dari pemilik hak cipta dilarang keras.

Jika Anda memiliki pertanyaan atau memerlukan informasi lebih lanjut mengenai proyek ini, silakan hubungi:
- **Pengembang**: Gede Aldi Irawan
- **GitHub**: [@aldwrnnnnn](https://github.com/aldwrnnnnn)
- **Email**: gedealdiirawan5@gmail.com
