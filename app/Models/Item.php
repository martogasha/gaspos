<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'stock_id',
        'amount',
        'full_quantity',
        'empty_quantity',
    ];
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
