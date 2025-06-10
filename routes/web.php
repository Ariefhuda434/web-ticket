<?php

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/checkout', [TransactionController::class, 'store'])->name('transactions.store');

// Webhook callback dari payment gateway
Route::post('/payment/webhook', [TransactionController::class, 'webhook'])->name('transactions.webhook');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/status/{slug}', [TransactionController::class, 'status'])->name('transactions.status');
Route::post('/transactions/status/{slug}', [TransactionController::class, 'uploadBukti'])->name('transactions.uploadBukti');

Route::get('/admin/pending-transactions', [TransactionController::class, 'pending'])->name('transactions.pending');
Route::post('/webhook', [TransactionController::class, 'webhook'])->name('transactions.webhook');


// Route Approve
Route::post('/admin/transactions/{slug}/approve', [TransactionController::class, 'approve'])->name('transactions.approve');
Route::get('/tickets/{ticket_code}', [TicketController::class, 'show'])->name('tickets.show');

Route::get('/admin-dashboard', [TransactionController::class, 'index'])->name('admin.dashboard');
Route::post('/transactions/{transaction}/approve', [TransactionController::class, 'approve'])->name('transactions.approve');
