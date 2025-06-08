<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Ticket;
use Illuminate\Support\Str;
use App\Mail\PaymentConfirmed;


class TransactionController extends Controller
{
    // Tampilkan halaman form checkout
    public function create()
    {
        return view('transactions.create'); // buat view checkout form nanti
    }

    // Proses simpan transaksi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required',
            'nim' => 'required',
            'method' => 'required',
            'total' => 'required|integer',
            'bank' => 'nullable',
        ]);

        $transaction = Transaction::create([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'name' => $validated['name'],
            'nim' => $validated['nim'],
            'method' => $validated['method'],
            'bank' => $validated['bank'] ?? null,
            'total' => $validated['total'],
            'status' => 'pending',
        ]);

           return redirect()->route('transactions.status', $transaction->id)
        ->with('success', 'Transaksi berhasil dibuat. Silakan lakukan pembayaran.');
    }

    // Tampilkan daftar transaksi dengan pagination
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(10);
        return view('transactions.index', compact('transactions'));
    }
 
public function webhook(Request $request)
{
    $transactionId = $request->input('transaction_id');
    $status = $request->input('status'); 

    $transaction = Transaction::where('id', $transactionId)->first();
    if (!$transaction) {
        return response()->json(['message' => 'Transaction not found'], 404);
    }

    $oldStatus = $transaction->status;

    if (in_array($status, ['paid', 'settlement', 'success'])) {
        $transaction->status = 'paid';

        // Buat tiket hanya kalau belum ada tiket untuk transaksi ini
        if (!$transaction->ticket) {
            $ticket = Ticket::create([
                'transaction_id' => $transaction->id,
                'ticket_code' => strtoupper(Str::random(10)), // kode tiket unik 10 karakter
            ]);
        } else {
            $ticket = $transaction->ticket;
        }
    } elseif ($status === 'pending') {
        $transaction->status = 'pending';
    } elseif ($status === 'failed') {
        $transaction->status = 'failed';
    }

    $transaction->save();

    if ($oldStatus !== 'paid' && $transaction->status === 'paid') {
        Mail::to($transaction->email)->send(new PaymentConfirmed($transaction, $ticket ?? null));
    }

    return response()->json(['message' => 'Status updated']);
}


    public function status($id)
{
    $transaction = Transaction::findOrFail($id);
    return view('transactions.status', compact('transaction'));
}

public function uploadBukti(Request $request, $id)
{
    $transaction = Transaction::findOrFail($id);

    if ($transaction->bukti_pembayaran) {
        return redirect()->back()->with('error', 'Bukti pembayaran sudah diunggah.');
    }

    $request->validate([
        'bukti_pembayaran' => 'required|image|max:2048',
    ]);

    $file = $request->file('bukti_pembayaran');
    $path = $file->store('bukti_pembayaran', 'public');

    $transaction->bukti_pembayaran = $path;
    $transaction->save();

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
}


}
