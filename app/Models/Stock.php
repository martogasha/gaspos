<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_amount',
        'product_full_quantity',
        'product_empty_quantity',
        'product_quantity',
        'product_date',
        'product_image',
    ];
}
