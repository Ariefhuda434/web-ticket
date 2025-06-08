<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/checkout', [TransactionController::class, 'store'])->name('transactions.store');

// Webhook callback dari payment gateway
Route::post('/payment/webhook', [TransactionController::class, 'webhook'])->name('transactions.webhook');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');


Route::get('/admin/pending-transactions', function (Request $request) {
    $key = $request->query('key'); // ambil key dari url ?key=...

    if ($key !== env('ADMIN_ACCESS_KEY')) {
        abort(403, 'Unauthorized');
    }

    $pendingTransactions = \App\Models\Transaction::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('transactions.pending', compact('pendingTransactions'));
})->name('transactions.pending');

Route::get('/transaction/status/{id}', [TransactionController::class, 'status'])->name('transactions.status');

Route::post('/transactions/{id}/upload-bukti', [TransactionController::class, 'uploadBukti'])->name('transactions.upload_bukti');

Route::get('/tickets/{ticket_code}', [TicketController::class, 'show'])->name('tickets.show');
