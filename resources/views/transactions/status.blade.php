<!DOCTYPE html>
<html lang="id" x-data="statusPage()" x-cloak>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Status Pembayaran - {{ $transaction->name }}</title>

  <!-- Tailwind CSS -->
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
            marker: ['"Permanent Marker"', 'cursive'],
          },
          boxShadow: {
            'soft-lg': '0 10px 15px -3px rgba(40, 83, 107, 0.3), 0 4px 6px -2px rgba(40, 83, 107, 0.15)',
          },
        },
      },
    }
  </script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet" />

  <!-- Alpine.js -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- FontAwesome -->
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
  </style>
</head>

<body class="bg-baseBg min-h-screen flex items-center justify-center p-6 font-poppins">

  <div class="bg-white/95 backdrop-blur-md border border-pistachio rounded-3xl shadow-soft-lg max-w-lg w-full p-10 text-indigoCustom" x-init="init()">
      <img 
  src="{{ asset('build/images/icons8-back-to-50.png') }}"
  @click="goHome()"
  class="absolute top-4 left-4 h-10 w-10 scale=105 transition-all ease-in-out duration-300 cursor-pointer z-10"
  alt="Back"
/>

    <h1 class="text-4xl font-extrabold mb-8 text-center tracking-wide font-marker drop-shadow-md text-indigoCustom">
      Status Pembayaran
    </h1>

    <div class="space-y-6">
      <!-- Nama -->
      <div>
        <p class="text-xs font-semibold uppercase text-matcha">Nama</p>
        <p class="text-2xl font-semibold text-darkText">{{ $transaction->name }}</p>
      </div>

      <!-- Email -->
      <div>
        <p class="text-xs font-semibold uppercase text-matcha">Email</p>
        <p class="text-lg text-indigoCustom font-medium">{{ $transaction->email }}</p>
      </div>

      <!-- Total Pembayaran -->
      <div>
        <p class="text-xs font-semibold uppercase text-matcha">Total Pembayaran</p>
        <p class="text-2xl font-extrabold text-indigoCustom">Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
      </div>

      <!-- Status -->
      <div>
        <p class="text-xs font-semibold uppercase text-matcha mb-2 flex items-center space-x-2">
          <span>Status Pembayaran</span>
          <button
            @mouseenter="showTooltip = true"
            @mouseleave="showTooltip = false"
            class="relative group text-pistachio hover:text-matcha transition"
            aria-label="Informasi status pembayaran"
          >
            <i class="fa-solid fa-circle-info"></i>
            <div
              x-show="showTooltip"
              x-transition
              class="absolute -top-10 left-1/2 -translate-x-1/2 w-64 bg-indigoCustom text-pistachio text-xs rounded-md p-3 pointer-events-none z-50 shadow-md"
            >
              Status <span class="font-semibold">'pending'</span> berarti pembayaran belum kami terima, silakan lakukan transfer & upload bukti pembayaran.<br />
              Status <span class="font-semibold">'paid'</span> berarti pembayaran sudah kami terima.
            </div>
          </button>
        </p>

        <div x-show="loading" class="flex justify-center mb-5" aria-live="polite" aria-busy="true">
          <svg class="animate-spin h-10 w-10 text-matcha" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
          </svg>
        </div>

        <template x-if="!loading">
          <div class="flex items-center space-x-3 text-2xl font-bold">
            <template x-if="'{{ $transaction->status }}' === 'paid'">
              <i class="fa-solid fa-circle-check text-matcha text-4xl"></i>
            </template>
            <template x-if="'{{ $transaction->status }}' === 'pending'">
              <i class="fa-solid fa-hourglass-half text-peach text-4xl"></i>
            </template>
            <template x-if="'{{ $transaction->status }}' !== 'paid' && '{{ $transaction->status }}' !== 'pending'">
              <i class="fa-solid fa-circle-exclamation text-orchid text-4xl"></i>
            </template>
            <span x-text="statusText" :class="statusClass"></span>
          </div>
        </template>
      </div>
    </div>

    <!-- Upload Bukti Pembayaran (jika pending) -->
    @if ($transaction->status === 'pending' && in_array($transaction->method, ['dana', 'ewallet', 'bank']))
      <div class="mt-10 border-t border-pistachio pt-6">
        <h3 class="text-xl font-semibold mb-5 text-indigoCustom flex items-center space-x-3">
          <i class="fa-solid fa-upload"></i>
          <span>Upload Bukti Pembayaran</span>
        </h3>

        @if ($transaction->bukti)
          <p class="mb-4 text-matcha font-semibold flex items-center space-x-2">
            <i class="fa-solid fa-check-circle"></i>
            <span>Bukti pembayaran sudah diunggah:</span>
          </p>
          <img src="{{ asset('storage/' . $transaction->bukti) }}" alt="Bukti Pembayaran" class="rounded-lg shadow-md mb-6 w-full max-h-80 object-contain" />
        @else
          <form action="{{ route('transactions.uploadBukti', $transaction->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <input
              type="file"
              name="bukti"
              accept="image/*"
              required
              class="w-full px-5 py-3 border border-pistachio rounded-xl focus:ring-2 focus:ring-matcha focus:outline-none transition"
            />

            <button
              type="submit"
              class="w-full py-3 rounded-xl bg-indigoCustom text-white font-bold hover:bg-matcha transition"
            >
              Upload Bukti Pembayaran
            </button>
          </form>
        @endif

        <p class="mt-4 text-sm text-indigoCustom/70">
          Setelah upload, admin akan memverifikasi bukti pembayaran Anda. Mohon tunggu maksimal 1x24 jam.
        </p>
      </div>
    @endif

    <!-- Tombol kembali -->
 
  </div>

  <script>
    function statusPage() {
      return {
        loading: true,
        showTooltip: false,
        statusText: '',
        statusClass: '',

        init() {
          setTimeout(() => {
            this.loading = false;
            const status = '{{ $transaction->status }}';

            if (status === 'paid') {
              this.statusText = 'Sudah Dibayar ✅';
              this.statusClass = 'text-matcha';
            } else if (status === 'pending') {
              this.statusText = 'Menunggu Pembayaran';
              this.statusClass = 'text-peach';
            } else {
              this.statusText = `Status: ${status}`;
              this.statusClass = 'text-orchid';
            }
          }, 1500);
        },

        goHome() {
          window.location.href = '{{ url('/') }}';
        },
      }
    }
  </script>

</body>

</html>
