<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'customer_name',
        'item',
        'quantity',
        'rate',
        'total_amount',
    ];

    protected $casts = [
        'date' => 'date',
        'quantity' => 'integer',
        'rate' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];
}
