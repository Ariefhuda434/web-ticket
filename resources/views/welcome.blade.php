<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>exmasi.event - SAPMA PP UMSU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  
  <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    matcha: '#8FB78F',
                    pistachio: '#CBE6C7',
                    azure: '#B4CCCF',
                    indigoCustom: '#28536B',
                    orchid: '#F3A5BC',
                    peach: '#FFC49B',
                    accent: '#28536B',
                    baseBg: '#F9FAF7',
                    darkText: '#1E293B',
                    secondary: '#CBE6C7',
                },
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                    marker: ['"Permanent Marker"', 'cursive'], // tambahkan ini
                },
                boxShadow: {
                    'soft-lg': '0 10px 15px -3px rgba(40, 83, 107, 0.3), 0 4px 6px -2px rgba(40, 83, 107, 0.15)',
                },
                transitionTimingFunction: {
                    'smooth': 'cubic-bezier(0.4, 0, 0.2, 1)',
                }
            },
        },
    }
</script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        html {
            scroll-behavior: smooth;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .transition-smooth {
            transition-property: transform, background-color, box-shadow;
            transition-duration: 300ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body x-data="cartApp()" class="font-poppins bg-baseBg text-darkText">

    <x-navbar></x-navbar>
    <!-- Hero Section -->
    <x-home></x-home>

    <!-- Info Event Section -->
    <x-info></x-info>

    <!-- Features Section -->
    <x-features></x-features>

    <!-- Tickets Section -->
    <x-ticket></x-ticket>


    <!-- Checkout Form Section -->
    <x-checkout></x-checkout>


<div class="-mt-[rem] bg-pistachio/60  ">
    
   
<div class="flex text-center flex-col">
  <p class="lg:text-7xl md:text-6xl  text-5xl font-black font-marker text-orchid -mb-[0.7rem]"> <span class="z-50 text-7xl lg:text-8xl md:text-7xl ">E</span>xmasi Event</p>
  <div class="bg-orchid w-screen h-5">
  </div>
</div>
<footer style="background-image: url('{{ asset('build/images/Line.svg') }}')" class="bg-indigoCustom z-20 text-white px-6 py-10 w-full bg-cover">
  <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

    <!-- Brand -->
    <div class="space-y-4">
      <div class="flex items-center space-x-3">
        <img src="{{ asset('build/images/Logo_UMSU_(cropped).png') }}" alt="Logo Umsu" class="h-12 object-contain">
        <p class="font-bold text-xl">UMSU</p>
      </div>
      <div class="flex items-center space-x-3">
        <img src="{{ asset('build/images/sampalogo-removebg-preview.png') }}" alt="SAPMA Logo" class="h-12 object-contain">
        <p class="font-bold text-xl">SAPMA PP UMSU</p>
      </div>
      <div class="flex items-center space-x-3">
        <img src="{{ asset('build/images/exmasi-removebg-preview.png') }}" alt="EXMASI Logo" class="h-12 object-contain">
        <p class="font-bold text-xl">EXMASI EVENT</p>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="text-sm space-y-4">
      <ul class="space-y-1">
        <li>Sekretariat SAPMA PP UMSU</li>
        <li>Jl. Gunung Mas No. 14, Medan</li>
        <li>Medan, Sumatera Utara</li>
      </ul>
      <ul class="space-y-1">
        <li>Email : <a href="mailto:sapmappumsu@gmail.com" class="underline">exmasievent@gmail.com</a></li>
        <li>Mobile: 0851-2100-9356</li>
      </ul>
      <div class="flex items-center space-x-3 mt-4">
       
       <a href="https://www.youtube.com/@SapmappUmsu">
         <img src="{{ asset('build/images/icons8-youtube-96.png') }}" alt="YouTube" class="h-8 w-8 object-contain">
        </a> 
      <a href="https://www.instagram.com/exmasi.event/"><img src="{{ asset('build/images/icons8-instagram-96.png') }}" alt="Instagram" class="h-8 w-8 object-contain"></a>
        <img src="{{ asset('build/images/icons8-email-96.png') }}" alt="Email" class="h-8 w-8 object-contain">
        <img src="{{ asset('build/images/icons8-name-96.png ') }}" alt="Contact" class="h-8 w-8 object-contain">
      </div>
    </div>

    <!-- About / Layanan -->
    <div class="text-sm space-y-6">

      <div>
        <p class="font-semibold text-lg mb-2">Tentang Kami</p>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Profil SAPMA PP UMSU</a></li>
          <li><a href="#" class="hover:underline">EXMASI Event</a></li>
          <li><a href="#" class="hover:underline">Galeri Kegiatan</a></li>
        </ul>
      </div>

      <div>
        <p class="font-semibold text-lg mb-2">Layanan</p>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Pendaftaran Event</a></li>
          <li><a href="#" class="hover:underline">Kemitraan</a></li>
          <li><a href="#" class="hover:underline">Berita & Update</a></li>
          <li><a href="#" class="hover:underline">Edukasi & Workshop</a></li>
        </ul>
      </div>
      
    </div>

    <!-- Navigation -->
    <div class="text-sm space-y-6">
      <div>
        <p class="font-semibold text-lg mb-2">Navigasi Cepat</p>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Home</a></li>
          <li><a href="#" class="hover:underline">Info Acara</a></li>
          <li><a href="#" class="hover:underline">Keunggulan</a></li>
          <li><a href="#" class="hover:underline">Tiket</a></li>
          <li><a href="#" class="hover:underline">Pembelian</a></li>
        </ul>
      </div>
      <div>
        <p class="font-semibold text-lg mb-2">Legal & Kebijakan</p>
        <ul class="space-y-1">
          <li><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
          <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
        </ul>
      </div>
    </div>

  </div>

  <div class="border-t border-white mt-10 pt-4 w-3/4 mx-auto text-center text-sm">
    © 2025 SAPMA PP UMSU - EXMASI EVENT | All Rights Reserved.
  </div>
</footer>
</div>

    <script>
    

        function cartApp() {
            return {
                mobileMenuOpen: false,
                cart: [],
                tickets: [
    {
        id: 1,
        name: 'Single',
        price: 25000,
        description: '1 Orang',
    },
    {
        id: 2,
        name: 'Couple',
        price: 45000,
        description: '2 Orang',
    },
    {
        id: 3,
        name: 'Mates',
        price: 90000,
        description: '4 Orang',
    },
    {
        id: 4,
        name: 'Group',
        price: 135000,
        description: '6 Orang',
    },
    {
        id: 5,
        name: 'Party',
        price: 175000,
        description: '8 Orang',
    },
    {
        id: 6,
        name: 'Sapma Family',
        price: 325000,
        description: '15 Orang',
    },
],

addToCart(ticket) {
    const found = this.cart.find(item => item.id === ticket.id);
    if (found) {
        found.qty = (found.qty || 1) + 1;
    } else {
        this.cart.push({ ...ticket, qty: 1 });
    }
    this.open = true; // Buka popup keranjang setiap kali tambah tiket
    },

                removeFromCart(index) {
                    this.cart.splice(index, 1);
                },
                cartCount() {
                    return this.cart.length;
                },
                cartTotal() {
                    return this.cart.reduce((total, item) => total + item.price, 0);
                },
                formatCurrency(amount) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                    }).format(amount);
                },
                toggleCart() {
                    const purchaseSection = document.getElementById('purchase');
                    if (purchaseSection) {
                        purchaseSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                },
                checkout() {
                    if (this.cart.length === 0) {
                        alert('Keranjang kosong, silakan pilih tiket terlebih dahulu.');
                        return;
                    }
                    alert(`Terima kasih sudah membeli tiket! Total pembayaran: ${this.formatCurrency(this.cartTotal())}`);
                    this.cart = [];
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },
            };
        }
    </script>

</body>

</html>