<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>exmasi.event - SAPMA PP UMSU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
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

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-indigoCustom">Daftar Transaksi</h1>

    @if($transactions->count() > 0)
        <table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-indigoCustom text-white text-left">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">NIM</th>
                    <th class="px-4 py-3">No. HP</th>
                    <th class="px-4 py-3">Metode Pembayaran</th>
                    <th class="px-4 py-3">Bank / Dompet</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $trx)
                    <tr class="border-b border-gray-300 hover:bg-indigoCustom/10 transition">
                        <td class="px-4 py-3">{{ $trx->id }}</td>
                        <td class="px-4 py-3">{{ $trx->name }}</td>
                        <td class="px-4 py-3">{{ $trx->email }}</td>
                        <td class="px-4 py-3">{{ $trx->nim }}</td>
                        <td class="px-4 py-3">{{ $trx->phone }}</td>
                        <td class="px-4 py-3 capitalize">{{ $trx->method }}</td>
                        <td class="px-4 py-3">{{ $trx->bank ?? '-' }}</td>
                        <td class="px-4 py-3 font-semibold text-indigoCustom">
                            {{ number_format($trx->total, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3">
                            @if($trx->status === 'pending')
                                <span class="text-yellow-600 font-semibold">Pending</span>
                            @elseif($trx->status === 'paid')
                                <span class="text-green-600 font-semibold">Paid</span>
                            @else
                                <span class="text-gray-600">{{ ucfirst($trx->status) }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $trx->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $transactions->links() }}
        </div>

    @else
        <p class="text-gray-600 text-center">Belum ada transaksi.</p>
    @endif
</div>
</body>

</html>


