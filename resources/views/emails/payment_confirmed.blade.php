<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pesanan Telah Diterima</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafc; margin: 0; padding: 20px;">
  <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); overflow: hidden;">
    <!-- Header -->
    <tr>
      <td style="background-color: #28536B; padding: 24px; text-align: center;">
        <h1 style="color: #ffffff; font-size: 22px; margin: 0;">Pesananmu Telah Diterima!</h1>
      </td>
    </tr>

    <!-- Body -->
    <tr>
      <td style="padding: 30px; color: #333333; font-size: 16px; line-height: 1.6;">
        <p style="margin: 0 0 15px;">Halo <strong>{{ $transaction->name }}</strong>,</p>

        <p style="margin: 0 0 15px;">
          Terima kasih telah melakukan pemesanan tiket di platform kami. 🙏
        </p>

        <p style="margin: 0 0 15px;">
          Saat ini pesanan Anda sudah kami terima dan sedang <strong>menunggu proses verifikasi oleh admin</strong>.
        </p>

        <p style="margin: 0 0 15px;">
          Mohon tunggu, Anda akan menerima email berikutnya jika pesanan Anda sudah berhasil diverifikasi.
        </p>

       

        <!-- CTA -->
        <p style="text-align: center; margin: 30px 0;">
        <p style="text-align: center; margin: 30px 0;">
  <a href="{{ route('transactions.status', $transaction->slug) }}" target="_blank" style="background-color: #4CAF50; color: #ffffff; padding: 14px 26px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block;">
    Lihat Status Pesanan
  </a>
</p>


        </p>

        <p style="margin: 0 0 15px;">
          Jika ada pertanyaan, silakan hubungi tim kami. Kami siap membantu Anda.
        </p>

        <p style="margin: 0;">Salam hangat, <br> Tim Exmasi</p>
      </td>
    </tr>

    <!-- Footer -->
    <tr>
      <td style="background-color: #f0f0f0; padding: 15px; text-align: center; font-size: 12px; color: #777777;">
        &copy; {{ date('Y') }} Exmasi Event. All rights reserved.
      </td>
    </tr>
  </table>
</body>
</html>
