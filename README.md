🎟️ Web Ticket SAPMA PP UMSU

Web Ticket SAPMA PP UMSU adalah aplikasi berbasis web untuk penjualan dan manajemen tiket acara organisasi SAPMA PP UMSU. Sistem ini dibangun menggunakan Laravel dan Tailwind CSS dengan fitur dashboard admin untuk mengelola event, transaksi, dan data pengguna secara modern dan responsif.

Aplikasi ini dirancang untuk mempermudah proses pemesanan tiket acara secara online, mulai dari publikasi event hingga validasi pembayaran dan pengelolaan peserta.

🚀 Fitur Utama
👥 User / Pengunjung
🎫 Pemesanan Tiket Online
Melihat daftar event yang tersedia.
Detail event lengkap (tanggal, lokasi, harga tiket, kuota).
Pemesanan tiket secara online.
Input data peserta.
💳 Upload Bukti Pembayaran
Pengguna dapat mengunggah bukti transfer pembayaran.
Validasi format file upload.
Status pembayaran dapat dipantau.
📄 Riwayat Pemesanan
Melihat daftar tiket yang pernah dibeli.
Status tiket:
Menunggu Pembayaran
Menunggu Verifikasi
Berhasil
Ditolak
📱 Responsive Design
Tampilan mobile-friendly menggunakan Tailwind CSS.
UI modern dan ringan.
🛠️ Dashboard Admin
📊 Dashboard Statistik
Total penjualan tiket.
Jumlah peserta.
Statistik transaksi.
Event terlaris.
🎟️ Manajemen Event
CRUD event.
Pengaturan kuota tiket.
Pengaturan harga tiket.
Upload banner event.
✅ Verifikasi Pembayaran
Validasi bukti transfer pengguna.
Approve / reject pembayaran.
Update status transaksi otomatis.
👤 Manajemen Pengguna
Kelola akun user.
Hak akses admin dan user.
📦 Manajemen Transaksi
Monitoring seluruh transaksi tiket.
Detail data pembeli.
Riwayat pembayaran.
🛠️ Teknologi yang Digunakan
Framework: Laravel
Frontend: Tailwind CSS
Backend: PHP 8+
Database: MySQL
Authentication: Laravel Auth
UI: Blade Template
Server: Apache / Nginx
📂 Struktur Database Utama
Tabel Utama
users

Menyimpan data pengguna dan admin.

events

Data event:

nama event
lokasi
tanggal
harga tiket
kuota
tickets

Data pemesanan tiket pengguna.

payments

Data pembayaran dan bukti transfer.

transactions

Riwayat transaksi pengguna.

⚙️ Instalasi Project
1. Clone Repository
git clone https://github.com/Ariefhuda434/web-ticket.git
cd web-ticket
2. Install Dependency
composer install
npm install
3. Konfigurasi Environment

Copy file .env

cp .env.example .env

Generate key Laravel:

php artisan key:generate
4. Setup Database

Buat database baru lalu konfigurasi .env

DB_DATABASE=web_ticket
DB_USERNAME=root
DB_PASSWORD=

Jalankan migration:

php artisan migrate
5. Jalankan Project
php artisan serve
npm run dev

Akses aplikasi di:

http://127.0.0.1:8000

Developed by:

Arief Huda

📜 License

Project ini dibuat untuk kebutuhan pembelajaran dan pengembangan sistem penjualan tiket digital organisasi SAPMA PP UMSU.
