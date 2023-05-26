<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'worker_id',
        'status',
        'payment_method',
        'amount',
        'order_amount',
        'balance',
        'date',
    ];
}
