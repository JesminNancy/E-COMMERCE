<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    Protected $table = 'order_items';
    Protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
    ];
}