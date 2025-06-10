<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - EXMASI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#B4CCCF',
                        secondary: '#28536B',
                        light: '#F9FAF7',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-poppins bg-light text-gray-800">

    <div class="container mx-auto px-4 py-8">

        <h1 class="text-4xl font-bold text-secondary mb-6">Admin Dashboard</h1>

        <!-- Section 1: Pending Transactions -->
        <div class="bg-white p-6 rounded-lg shadow mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-secondary">Pending Transactions</h2>

            @if($pendingTransactions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 border">
                        <thead class="text-xs text-white uppercase bg-primary">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">NIK</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">No HP</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Bukti</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingTransactions as $index => $trx)
                                <tr class="border-b hover:bg-primary/10 transition">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $trx->name }}</td>
                                    <td class="px-4 py-3">{{ $trx->nik }}</td>
                                    <td class="px-4 py-3">{{ $trx->email }}</td>
                                    <td class="px-4 py-3">{{ $trx->phone }}</td>
                                    <td class="px-4 py-3 text-yellow-600 font-semibold">Pending</td>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $trx->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3">
                                        @if($trx->bukti)
                                          <div  class="relative">
        <button onclick="document.getElementById('bukti').classList.remove('hidden')"  class="text-blue-600 hover:underline">Lihat Bukti</button>

        <!-- Modal -->
        <div  
        id="bukti"
             x-transition 
             class="fixed inset-0 flex items-center justify-center bg-black hidden bg-opacity-50 z-50">
            <div class="bg-white p-4 rounded-lg shadow-lg max-w-md w-full relative">
                <img src="{{ asset('storage/' . $trx->bukti) }}" alt="Bukti Pembayaran" class="w-full h-auto mb-4 rounded">

                <button onclick="document.getElementById('bukti').classList.add('hidden')" 
                        class="block w-full bg-secondary text-white py-2 rounded hover:bg-secondary/80 transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>
                                        @else
                                            <span class="text-gray-500">Belum ada</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('transactions.approve', $trx->slug) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-primary text-white px-3 py-1 rounded hover:bg-secondary transition">
                                                Approve
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-gray-600 py-6">Tidak ada transaksi pending.</p>
            @endif
        </div>

        <!-- Section 2: Paid Transactions -->
        <div class="bg-white p-6 rounded-lg shadow mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-secondary">Paid Transactions</h2>

            @if($paidTransactions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 border">
                        <thead class="text-xs text-white uppercase bg-primary">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">NIK</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">No HP</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paidTransactions as $index => $trx)
                                <tr class="border-b hover:bg-primary/10 transition">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $trx->name }}</td>
                                    <td class="px-4 py-3">{{ $trx->nik }}</td>
                                    <td class="px-4 py-3">{{ $trx->email }}</td>
                                    <td class="px-4 py-3">{{ $trx->phone }}</td>
                                    <td class="px-4 py-3 text-green-600 font-semibold">Paid</td>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $trx->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3">
                                        @if($trx->bukti_pembayaran)
                                            @if($trx->bukti_pembayaran)
    <div  class="relative">
        <button onclick="document.getElementById('bukti').classList.remove('hidden')"  class="text-blue-600 hover:underline">Lihat Bukti</button>

        <!-- Modal -->
        <div  
        id="bukti"
             x-transition 
             class="fixed inset-0 flex items-center justify-center bg-black hidden bg-opacity-50 z-50">
            <div class="bg-white p-4 rounded-lg shadow-lg max-w-md w-full relative">
                <img src="{{ asset('storage/' . $trx->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-full h-auto mb-4 rounded">

                <button onclick="document.getElementById('bukti').classList.add('hidden')" 
                        class="block w-full bg-secondary text-white py-2 rounded hover:bg-secondary/80 transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>
@else
    <span class="text-gray-500">Belum ada</span>
@endif
                                        @else
                                            <span class="text-gray-500">Belum ada</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-gray-600 py-6">Belum ada transaksi paid.</p>
            @endif
        </div>

    </div>

</body>

</html>
