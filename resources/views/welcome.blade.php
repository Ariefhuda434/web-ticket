<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>exmasi.event - SAPMA PP UMSU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        nunito: ['Nunito', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        darkBg: '#0f0f0f',
                        lightText: '#f8f8f8',
                        accent: '#e63946',
                        accentDark: '#d62839',
                        accentDarker: '#a50000',
                    },
                },
            },
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body x-data="cartApp()" class="font-poppins bg-darkBg text-lightText">

    <!-- Navigation -->
    <nav id="navbar" class="bg-black/80 backdrop-blur-md fixed w-full z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <span class="font-black text-2xl text-accent uppercase tracking-tight">exmasi</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-300 hover:text-accent transition">Beranda</a>
                    <a href="#event-info" class="text-gray-300 hover:text-accent transition">Info Acara</a>
                    <a href="#features" class="text-gray-300 hover:text-accent transition">Keunggulan</a>
                    <a href="#tickets" class="text-gray-300 hover:text-accent transition">Tiket</a>
                    <a href="#purchase" class="text-gray-300 hover:text-accent transition">Pembelian</a>
                    <div class="relative cursor-pointer" @click="toggleCart()">
                        <i class="fa-solid fa-cart-shopping text-accent text-xl"></i>
                        <span x-text="cartCount()" 
                            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-2" 
                            x-show="cartCount() > 0" x-transition></span>
                    </div>
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-accent focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden bg-black/90 backdrop-blur rounded-b-lg py-4 space-y-4">
                <a href="#home" class="block px-4 text-gray-300 hover:text-accent transition" @click="mobileMenuOpen = false">Beranda</a>
                <a href="#event-info" class="block px-4 text-gray-300 hover:text-accent transition" @click="mobileMenuOpen = false">Info Acara</a>
                <a href="#features" class="block px-4 text-gray-300 hover:text-accent transition" @click="mobileMenuOpen = false">Keunggulan</a>
                <a href="#tickets" class="block px-4 text-gray-300 hover:text-accent transition" @click="mobileMenuOpen = false">Tiket</a>
                <a href="#purchase" class="block px-4 text-gray-300 hover:text-accent transition" @click="mobileMenuOpen = false">Pembelian</a>
            </div>
        </div>
    </nav>
<section
  x-data="{ show: false }"
  x-init="setTimeout(() => show = true, 300)"
  class="relative bg-cover bg-center bg-no-repeat bg-fixed min-h-screen flex flex-col justify-center items-center text-white px-6"
  style="background-image: url('{{ asset('build/images/bghitam.jpg') }}');"
>
  <!-- Overlay gelap transparan -->
  <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-0"></div>

  <!-- Konten -->
  <div
    x-show="show"
    x-transition:enter="transition ease-out duration-1000"
    x-transition:enter-start="opacity-0 translate-y-10"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="relative z-10 text-center max-w-4xl px-4"
  >
    <h1
      class="text-5xl md:text-7xl font-extrabold drop-shadow-2xl leading-tight mb-4 animate-float"
      style="font-family: 'Poppins', sans-serif;"
    >
      Festival Seni Budaya 2025
    </h1>
    <p class="mt-4 text-lg md:text-2xl drop-shadow-md tracking-wide font-light max-w-2xl mx-auto">
      Rasakan keindahan kreativitas dan ekspresi dalam satu panggung yang memukau dan tak terlupakan.
    </p>

    <!-- Tombol Beli Tiket -->
    <a href="#tickets" 
       class="mt-10 px-8 py-3 bg-transparent border-2 border-white rounded-md inline-block text-white font-semibold tracking-wide
         hover:bg-white hover:text-gray-900 transition-colors duration-300 ease-in-out"
    >
      🎟️ Beli Tiket Sekarang
    </a>
  </div>

  <!-- Animasi float -->
  <style>
    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
    }
    .animate-float {
      animation: float 4s ease-in-out infinite;
    }
  </style>
</section>

  <!-- Overlay gelap transparan -->
  <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>

  <div
    x-show="show"
    x-transition:enter="transition ease-out duration-1000"
    x-transition:enter-start="opacity-0 translate-y-10"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="relative z-10 text-center max-w-4xl px-4"
  >
    <h1
      class="text-5xl md:text-7xl font-extrabold drop-shadow-2xl leading-tight mb-4 animate-float"
      style="font-family: 'Poppins', sans-serif;"
    >
      Festival Seni Budaya 2025
    </h1>
    <p class="mt-4 text-lg md:text-2xl drop-shadow-md tracking-wide font-light max-w-2xl mx-auto">
      Rasakan keindahan kreativitas dan ekspresi dalam satu panggung yang memukau dan tak terlupakan.
    </p>
    
    
</div>

<style>
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
  </style>
</section>


    <!-- Info Event Section -->
    <div class="w-full bg-black">

  <section id="event-info" class=" bg-white bg-opacity-80 backdrop-blur-md w-4/5 mx-auto rounded-2xl shadow-lg text-center text-gray-800">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    
    <!-- Kolom Teks -->
    <div class="space-y-6 text-left">
      <h2 class="text-4xl font-extrabold text-accent tracking-wide">ART & EXHIBITION</h2>
      <p class="text-lg text-gray-600">Dipersembahkan oleh <span class="text-accent font-semibold">SAPMA PP UMSU</span></p>
      <p class="text-lg text-gray-600 flex items-center gap-2">🗓️ <span class="font-bold text-gray-800">21 Juni 2025</span></p>
      <blockquote class="italic text-xl text-accent mt-8 border-l-4 border-accent pl-6">
        “Seni dan Ekspresi Mahasiswa Menembus Batas, Menggema di Setiap Aksi" 🎨🎭🎤🎼
      </blockquote>
    </div>

    <!-- Kolom Foto -->
    <div class="overflow-hidden">
      <img src="{{ asset('build/images/kucing.jpeg') }}" alt="Art Exhibition" class="w-full h-auto object-cover" />
    </div>
    
  </div>
</section>
    </div>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-black/90 backdrop-blur">
        <div class="max-w-6xl mx-auto px-4 text-center space-y-12">
            <h2 class="text-4xl font-bold mb-8 text-accent">Mengapa Memilih Kami?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-white/5 p-6 rounded-xl border border-white/10 hover:scale-105 transition duration-300 flex flex-col items-center space-y-4">
                    <i class="fa-solid fa-star text-5xl text-accent"></i>
                    <h3 class="text-xl font-semibold">Event Berkualitas</h3>
                    <p class="text-gray-400">Nikmati acara premium dengan pengalaman tak terlupakan.</p>
                </div>
                <div
                    class="bg-white/5 p-6 rounded-xl border border-white/10 hover:scale-105 transition duration-300 flex flex-col items-center space-y-4">
                    <i class="fa-solid fa-shield-halved text-5xl text-accent"></i>
                    <h3 class="text-xl font-semibold">Pembayaran Aman</h3>
                    <p class="text-gray-400">Transaksi terenkripsi dan terpercaya untuk kenyamanan Anda.</p>
                </div>
                <div
                    class="bg-white/5 p-6 rounded-xl border border-white/10 hover:scale-105 transition duration-300 flex flex-col items-center space-y-4">
                    <i class="fa-solid fa-headset text-5xl text-accent"></i>
                    <h3 class="text-xl font-semibold">Layanan 24/7</h3>
                    <p class="text-gray-400">Dukungan ramah siap membantu kapan saja Anda butuhkan.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Tickets Section -->
    <section id="tickets" class="py-20 bg-darkBg">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-12 text-accent">Tiket Tersedia</h2>
            <div class="space-y-8 max-w-4xl mx-auto">
                <!-- Ticket Bioskop Style -->
                <template x-for="(ticket, index) in tickets" :key="index">
                    <div
                        class="bg-white/10 border border-white/20 rounded-xl flex items-center justify-between px-8 py-6 cursor-pointer hover:shadow-xl hover:scale-[1.03] transition duration-300"
                        @click="addToCart(ticket)">
                        <div class="flex items-center space-x-6">
                            <i class="fa-solid fa-ticket text-5xl text-accent"></i>
                            <div class="text-left">
                                <h3 class="text-2xl font-semibold" x-text="ticket.name"></h3>
                                <p class="text-gray-400 mt-1" x-text="ticket.description"></p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-accent" x-text="ticket.priceText"></p>
                            <button
                                class="mt-2 bg-gradient-to-r from-accent to-accentDark hover:from-accentDark hover:to-accentDarker text-white font-semibold px-6 py-2 rounded-lg shadow transition"
                                @click.stop="addToCart(ticket)">Tambah ke Keranjang</button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Purchase Section -->
    <section id="purchase" class="py-20 bg-gradient-to-b from-black via-darkBg to-black">
        <div class="max-w-4xl mx-auto px-4" x-show="cartCount() > 0" x-transition>
            <div
                class="glass rounded-xl p-8 md:p-12 shadow-xl border border-white/10 bg-white/5 backdrop-blur text-lightText">
                <h2 class="text-3xl font-bold mb-6 text-center">Formulir Pembelian Tiket</h2>
                <form @submit.prevent="submitForm" class="space-y-6">
                    <div>
                        <label for="name" class="block text-gray-300 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" id="name" x-model="form.name" required
                            class="w-full px-4 py-3 rounded-lg bg-black/30 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-accent"
                            placeholder="Masukkan nama lengkap Anda" />
                    </div>
                    <div>
                        <label for="email" class="block text-gray-300 font-medium mb-2">Email</label>
                        <input type="email" id="email" x-model="form.email" required
                            class="w-full px-4 py-3 rounded-lg bg-black/30 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-accent"
                            placeholder="contoh@domain.com" />
                    </div>
                    <div>
                        <label for="tickets" class="block text-gray-300 font-medium mb-2">Tiket yang Dipilih</label>
                        <ul class="list-disc list-inside text-gray-300" x-text="cartSummary()"></ul>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-accent to-accentDark hover:from-accentDark hover:to-accentDarker text-white font-semibold py-3 rounded-lg shadow-lg transition hover:-translate-y-1 hover:scale-105 duration-300">
                        Konfirmasi Pembelian
                    </button>
                </form>
            </div>
        </div>
        <div x-show="cartCount() === 0" class="text-center text-gray-500 text-lg italic py-12">
            Keranjang kosong. Pilih tiket di atas untuk memulai pembelian.
        </div>
    </section>

    <!-- Cart Sidebar Modal -->
    <div x-show="showCart" x-transition.opacity class="fixed inset-0 bg-black/70 backdrop-blur z-50 flex justify-end">
        <div @click.away="showCart = false" class="bg-black/90 w-80 md:w-96 p-6 overflow-auto max-h-screen shadow-xl border border-white/20">
            <h2 class="text-2xl font-bold mb-6 text-accent flex justify-between items-center">
                Keranjang
                <button @click="clearCart()" class="text-red-600 hover:text-red-800 text-lg" title="Kosongkan Keranjang"><i
                        class="fa-solid fa-trash"></i></button>
            </h2>
            <template x-if="cartCount() === 0">
                <p class="text-gray-400 italic">Keranjang masih kosong.</p>
            </template>
            <template x-for="(item, i) in cart" :key="i">
                <div class="flex justify-between items-center border-b border-white/20 py-3">
                    <div>
                        <h3 class="font-semibold text-lg" x-text="item.name"></h3>
                        <p class="text-gray-400">Harga: <span x-text="formatPrice(item.price)"></span></p>
                    </div>
                    <button @click="removeFromCart(i)" class="text-red-500 hover:text-red-700 text-xl" title="Hapus tiket"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
            </template>
            <div class="mt-6 border-t border-white/20 pt-4 flex justify-between items-center text-xl font-bold">
                <span>Total:</span>
                <span x-text="formatPrice(cartTotal())"></span>
            </div>
            <button @click="showCart = false" class="mt-8 w-full bg-accent hover:bg-accentDark text-white py-3 rounded-lg font-semibold transition">Tutup</button>
        </div>
    </div>
    <!-- Footer -->
<footer class="bg-black/80 backdrop-blur-md text-gray-400 text-center py-6 mt-20">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
        <p class="text-sm">&copy; 2025 exmasi.event - SAPMA PP UMSU. All rights reserved.</p>
        <div class="space-x-6 mt-4 md:mt-0">
            <a href="#" class="hover:text-accent transition" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-accent transition" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-accent transition" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-accent transition" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</footer>


    <script>
        function cartApp() {
            return {
                mobileMenuOpen: false,
                showCart: false,
                tickets: [
                    {
                        name: "Tiket Reguler",
                        description: "Akses penuh ke semua pameran seni dan workshop.",
                        price: 35000,
                        get priceText() { return `Rp${this.price.toLocaleString('id-ID')}`; }
                    },
                    {
                        name: "Tiket VIP",
                        description: "Termasuk akses lounge VIP, merchandise eksklusif, dan bonus workshop.",
                        price: 75000,
                        get priceText() { return `Rp${this.price.toLocaleString('id-ID')}`; }
                    },
                    {
                        name: "Tiket Pelajar",
                        description: "Harga khusus untuk pelajar dengan kartu pelajar valid.",
                        price: 20000,
                        get priceText() { return `Rp${this.price.toLocaleString('id-ID')}`; }
                    }
                ],
                cart: [],
                form: {
                    name: '',
                    email: ''
                },
                addToCart(ticket) {
                    this.cart.push({...ticket});
                    this.showCart = true;
                },
                removeFromCart(index) {
                    this.cart.splice(index, 1);
                },
                clearCart() {
                    this.cart = [];
                },
                cartCount() {
                    return this.cart.length;
                },
                cartTotal() {
                    return this.cart.reduce((sum, t) => sum + t.price, 0);
                },
                formatPrice(num) {
                    return 'Rp' + num.toLocaleString('id-ID');
                },
                cartSummary() {
                    if(this.cart.length === 0) return "Belum ada tiket yang dipilih.";
                    let counts = {};
                    this.cart.forEach(t => counts[t.name] = (counts[t.name] || 0) + 1);
                    return Object.entries(counts).map(([name, qty]) => `${qty} x ${name}`).join(', ');
                },
                toggleCart() {
                    this.showCart = !this.showCart;
                },
                submitForm() {
                    if (!this.form.name || !this.form.email) {
                        alert("Mohon isi nama dan email terlebih dahulu.");
                        return;
                    }
                    alert(`Terima kasih ${this.form.name}! Pembelian tiket sudah kami terima.\nEmail konfirmasi akan dikirim ke ${this.form.email}.\nTotal yang dibayarkan: ${this.formatPrice(this.cartTotal())}`);
                    this.cart = [];
                    this.form.name = '';
                    this.form.email = '';
                    this.showCart = false;
                }
            }
        }
    </script>

</body>

</html>
