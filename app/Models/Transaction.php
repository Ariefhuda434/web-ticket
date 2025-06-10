<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'name',
        'nik',
        'method',
        'bank',
        'total',
        'status',
        'slug',
        'bukti_pembayaran',
    ];

    protected $casts = [
        'total' => 'integer',
    ];

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
