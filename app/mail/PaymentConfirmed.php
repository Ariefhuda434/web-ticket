<?php

// app/Mail/PaymentConfirmed.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

public $transaction;
public $ticket;

public function __construct($transaction, $ticket = null)
{
    $this->transaction = $transaction;
    $this->ticket = $ticket;
}

public function build()
{
    return $this->subject('Pembayaran Telah Dikonfirmasi dan Tiket Anda')
                ->view('emails.payment_confirmed');
}

}
