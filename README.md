# 🎟️ Web Ticket SAPMA PP UMSU

**Web Ticket SAPMA PP UMSU** adalah aplikasi berbasis web untuk penjualan dan manajemen tiket acara organisasi **SAPMA PP UMSU**.
Sistem ini dibangun menggunakan **Laravel** dan **Tailwind CSS** dengan dashboard admin modern untuk mengelola event, transaksi, dan data pengguna secara efisien.

Aplikasi ini dirancang untuk mempermudah proses pemesanan tiket acara secara online, mulai dari publikasi event hingga validasi pembayaran dan pengelolaan peserta.

---

# 🚀 Fitur Utama

## 👥 User / Pengunjung

### 🎫 Pemesanan Tiket Online

* Melihat daftar event yang tersedia
* Detail event lengkap:

  * Tanggal acara
  * Lokasi
  * Harga tiket
  * Kuota peserta
* Pemesanan tiket secara online
* Input data peserta

---

### 💳 Upload Bukti Pembayaran

* Upload bukti transfer pembayaran
* Validasi format file upload
* Monitoring status pembayaran secara realtime

---

### 📄 Riwayat Pemesanan

Pengguna dapat melihat daftar tiket yang pernah dibeli dengan status:

* ⏳ Menunggu Pembayaran
* 🔍 Menunggu Verifikasi
* ✅ Berhasil
* ❌ Ditolak

---

### 📱 Responsive Design

* Tampilan mobile-friendly
* UI modern menggunakan Tailwind CSS
* Ringan dan mudah digunakan

---

# 🛠️ Dashboard Admin

## 📊 Dashboard Statistik

* Total penjualan tiket
* Jumlah peserta
* Statistik transaksi
* Event terlaris

---

## 🎟️ Manajemen Event

* CRUD Event
* Pengaturan kuota tiket
* Pengaturan harga tiket
* Upload banner event

---

## ✅ Verifikasi Pembayaran

* Validasi bukti transfer pengguna
* Approve / Reject pembayaran
* Update status transaksi otomatis

---

## 👤 Manajemen Pengguna

* Kelola akun user
* Hak akses admin & user

---

## 📦 Manajemen Transaksi

* Monitoring seluruh transaksi tiket
* Detail data pembeli
* Riwayat pembayaran

---

# 🛠️ Teknologi yang Digunakan

| Teknologi      | Keterangan     |
| -------------- | -------------- |
| Framework      | Laravel        |
| Frontend       | Tailwind CSS   |
| Backend        | PHP 8+         |
| Database       | MySQL          |
| Authentication | Laravel Auth   |
| UI Template    | Blade Template |
| Server         | Apache / Nginx |

---

# 📂 Struktur Database Utama

## `users`

Menyimpan data pengguna dan admin.

## `events`

Menyimpan data event:

* Nama event
* Lokasi
* Tanggal
* Harga tiket
* Kuota peserta

## `tickets`

Data pemesanan tiket pengguna.

## `payments`

Data pembayaran dan bukti transfer.

## `transactions`

Riwayat transaksi pengguna.

---

# ⚙️ Instalasi Project

## 1️⃣ Clone Repository

```bash
git clone https://github.com/Ariefhuda434/web-ticket.git
cd web-ticket
```

---

## 2️⃣ Install Dependency

```bash
composer install
npm install
```

---

## 3️⃣ Konfigurasi Environment

Copy file `.env`

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## 4️⃣ Setup Database

Buat database baru lalu konfigurasi file `.env`

```env
DB_DATABASE=web_ticket
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate
```

---

## 5️⃣ Jalankan Project

```bash
php artisan serve
npm run dev
```

Akses aplikasi melalui browser:

```txt
http://127.0.0.1:8000
```

# 👨‍💻 Developer

Developed by:

## Arief Huda

---

# 📜 License

Project ini dibuat untuk kebutuhan pembelajaran dan pengembangan sistem penjualan tiket digital organisasi SAPMA PP UMSU.
