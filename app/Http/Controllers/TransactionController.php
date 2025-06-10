<?php
namespace App\Http\Controllers;

use App\Mail\Order;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    // Proses simpan transaksi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required',
            'nik' => 'required',
            'method' => 'required|in:bank,dana,ewallet',
            'total' => 'required|integer',
            'bank' => 'required_if:method,bank|in:Mandiri,BSI',
        ]);

        $slug = Str::slug($validated['name']) . '-' . Str::random(6);

        $transaction = Transaction::create([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'name' => $validated['name'],
            'nik' => $validated['nik'],
            'method' => $validated['method'],
            'bank' => $validated['bank'] ?? null,
            'total' => $validated['total'],
            'status' => 'pending',
            'slug' => $slug,
        ]);

        Mail::to($transaction->email)->queue(new PaymentConfirmed($transaction));

        return redirect()->route('transactions.status', $transaction->slug)
            ->with('success', 'Transaksi berhasil dibuat. Silakan lakukan pembayaran.');
    }



public function index(Request $request)
{
    $key = $request->query('key');

    if ($key !== env('ADMIN_ACCESS_KEY')) {
        abort(403, 'Unauthorized');
    }

    $pendingTransactions = Transaction::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->get();

    $paidTransactions = Transaction::where('status', 'paid')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin-dashboard', compact('pendingTransactions', 'paidTransactions', 'key'));
}


// Admin lihat pending + paid
public function pending(Request $request)
{
    $key = $request->query('key');
    if ($key !== env('ADMIN_ACCESS_KEY')) {
        abort(403, 'Unauthorized');
    }

    $transactions = Transaction::orderBy('created_at', 'desc')->paginate(10);

return view('transactions.pending', compact('transactions', 'key'));
}

public function approve($slug)
{
    $transaction = Transaction::where('slug', $slug)->firstOrFail();

    if ($transaction->status !== 'pending') {
        return back()->with('error', 'Transaksi sudah diproses.');
    }

    $transaction->status = 'paid';
    $transaction->save();
    
        Mail::to($transaction->email)->queue(new Order($transaction));

    return back()->with('success', 'Transaksi berhasil diapprove.');
}

    // Terima webhook untuk update status transaksi
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

            if (!$transaction->ticket) {
                $ticket = Ticket::create([
                    'transaction_id' => $transaction->id,
                    'ticket_code' => strtoupper(Str::random(10)),
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
            Mail::to($transaction->email)->send(new Order($transaction, $ticket));
        }

        return response()->json(['message' => 'Status updated']);
    }

    // Tampilkan status transaksi berdasarkan slug
    public function status($slug)
    {
        $transaction = Transaction::where('slug', $slug)->firstOrFail();

        return view('transactions.status', compact('transaction'));
    }

    // Upload bukti pembayaran berdasarkan slug transaksi
   public function uploadBukti(Request $request, $slug)
{
    $request->validate([
        'bukti' => 'required|mimes:jpeg,jpg,png,pdf',
    ]);

    $transaction = Transaction::where('slug', $slug)->firstOrFail();

    if ($request->hasFile('bukti')) {
        $file = $request->file('bukti');
        $originalExtension = $file->getClientOriginalExtension();
        $filename = time() . '_bukti.' . $originalExtension;
        $path = $file->storeAs('bukti', $filename, 'public');

        $transaction->bukti_pembayaran = $path;
        $transaction->save();

        // Kembali ke halaman status transaksi
        return redirect()->route('transactions.status', $transaction->slug)
            ->with('success', 'Bukti pembayaran berhasil diupload!');
    }

    return redirect()->route('transactions.status', $transaction->slug)
        ->with('error', 'Gagal upload bukti pembayaran!');
}

}
