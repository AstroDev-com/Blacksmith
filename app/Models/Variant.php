<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'sku',
        'price',
        'quantity',
        'attributes',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'attributes' => 'json',
        'is_active' => 'boolean'
    ];

    // Removed product relationship
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
