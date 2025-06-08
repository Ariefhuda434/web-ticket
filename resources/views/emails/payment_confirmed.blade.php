<h1>Pembayaran Telah Dikonfirmasi</h1>

<p>Halo {{ $transaction->name }},</p>

<p>Kami telah menerima pembayaran Anda sebesar Rp {{ number_format($transaction->total,0,',','.') }}.</p>

@if($ticket)
<p>Kode Tiket Anda: <strong>{{ $ticket->ticket_code }}</strong></p>

<p>Untuk cek status pembayaran dan detail tiket Anda, silakan klik tautan berikut:</p>

<p><a href="{{ url('/tickets/' . $ticket->ticket_code) }}" target="_blank">Cek Status & Lihat Tiket</a></p>
@endif

<p>Terima kasih atas kepercayaan Anda.</p>
