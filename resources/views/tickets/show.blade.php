<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Detail Tiket {{ $ticket->ticket_code }}</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet" />
</head>
<body class="bg-baseBg p-8 font-poppins min-h-screen">

<div class="max-w-lg mx-auto bg-white rounded-xl shadow-soft-lg p-8">
    <h1 class="text-2xl font-bold mb-4 text-indigoCustom">Detail Tiket Pembayaran</h1>

    <p><strong>Kode Tiket:</strong> {{ $ticket->ticket_code }}</p>
    <p><strong>Nama:</strong> {{ $ticket->transaction->name }}</p>
    <p><strong>Email:</strong> {{ $ticket->transaction->email }}</p>
    <p><strong>Total Pembayaran:</strong> Rp {{ number_format($ticket->transaction->total, 0, ',', '.') }}</p>
    <p><strong>Status Pembayaran:</strong> <span class="{{ $ticket->transaction->status === 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
        {{ ucfirst($ticket->transaction->status) }}
    </span></p>

    @if ($ticket->transaction->status === 'paid')
    <p class="mt-4 text-green-700 font-semibold">Pembayaran Anda sudah dikonfirmasi. Terima kasih!</p>
    @else
    <p class="mt-4 text-yellow-700 font-semibold">Pembayaran Anda sedang menunggu verifikasi.</p>
    @endif

    <a href="{{ url('/') }}" class="inline-block mt-6 px-4 py-2 bg-indigoCustom text-white rounded-lg hover:bg-indigo-700">Kembali ke Beranda</a>
</div>

</body>
</html>
