<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'name',
        'nim',
        'method',
        'bank',
        'total',
        'status',
    ];
public function ticket()
{
    return $this->hasOne(Ticket::class);
}

}
