<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pembayaran Telah Dikonfirmasi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 20px;">
  <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
    <tr>
      <td style="background-color: #28536B; padding: 20px 30px; text-align: center;">
        <h1 style="color: #ffffff; font-size: 24px; margin: 0;">🎟️ Pembayaran Dikonfirmasi</h1>
      </td>
    </tr>
    <tr>
      <td style="padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;">
        <p style="margin: 0 0 15px;">Halo <strong>{{ $transaction->name }}</strong>,</p>

        <p style="margin: 0 0 15px;">Terima kasih telah melakukan pembayaran untuk tiket Anda sebesar <strong>Rp {{ number_format($transaction->total,0,',','.') }}</strong>.</p>

        @if($ticket)
        <p style="margin: 0 0 15px;">Kode Tiket Anda: <strong style="font-size: 18px; color: #28536B;">{{ $ticket->ticket_code }}</strong></p>
        @endif

        <p style="margin: 0 0 15px;">Acara akan diselenggarakan pada tanggal <strong>21 Juni 2025</strong> di <strong>People & Place</strong>.</p>

        <p style="margin: 0 0 25px;">Untuk melihat status dan detail tiket Anda, silakan klik tombol di bawah ini:</p>

        <p style="text-align: center; margin: 30px 0;">
          <a href="{{ route('transactions.status', $transaction->slug) }}" target="_blank" style="background-color: #4CAF50; color: #ffffff; padding: 14px 30px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block; font-size: 16px;">Cek Status & Lihat Tiket</a>
        </p>

        <p style="margin: 0 0 15px;">Jika Anda memiliki pertanyaan, silakan hubungi tim kami.</p>

        <p style="margin: 0;">Terima kasih atas kepercayaan Anda dan sampai jumpa di acara! 🎉</p>
      </td>
    </tr>
    <tr>
      <td style="background-color: #f0f0f0; padding: 15px 30px; text-align: center; font-size: 13px; color: #777777;">
        &copy; {{ date('Y') }} Exmasi Event. All rights reserved.
      </td>
    </tr>
  </table>
</body>
</html>
