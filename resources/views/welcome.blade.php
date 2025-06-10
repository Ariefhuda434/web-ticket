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

<x-footer></x-footer>


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
        deskripsi: "Tiket berdua yang bisa kamu beli bareng pasangan / temen kamu !",
        image: "{{ asset('/build/images/icons8-ticket-80.png') }}",
          
    },
    {
        id: 2,
        name: 'Couple',
        price: 45000,
        description: '2 Orang',
        deskripsi: "Tiket berdua yang bisa kamu beli bareng pasangan / temen kamu !",
        image: "{{ asset('build/images/icons8-ticket-80.png') }}",
          
    },
    {
        id: 3,
        name: 'Mates',
        price: 90000,
        description: '4 Orang',
           deskripsi: "4 tiket yang bisa dibeli bareng temen - temen deket kamu",
          image: "{{ asset('/build/images/icons8-ticket-80.png') }}",
          
    },
    {
        id: 4,
        name: 'Group',
        price: 135000,
        description: '6 Orang',
           deskripsi: "6 tiket yang cocok dibeli bareng teman - teman di circle kamu",
          image: "{{ asset('/build/images/icons8-ticket-80.png') }}",
          
    },
    {
        id: 5,
        name: 'Party',
        price: 175000,
        description: '8 Orang',
           deskripsi: "Tiket ramean yang isinya 8 tiket dan oke banget buat dibeli bareng teman-teman kamu!",
          image: "{{ asset('/build/images/icons8-ticket-80.png') }}",
          
    },
    {
        id: 6,
        name: 'Sapma Family',
        price: 325000,
        description: '15 Orang',
           deskripsi: "Tiket khusus kader SAPMA PP yang isisnya 15 tiket ! (per-komisariat)",
          image: "{{ asset('/build/images/icons8-ticket-80.png') }}",
          
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