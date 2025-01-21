<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'breakfast_id',
        'quantity',
        'unit_price',
        'discount_percentage',
        'discounted_unit_price',
        'subtotal',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'discounted_unit_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            // Calcular descuento basado en cantidad
            $item->discount_percentage = self::calculateDiscountPercentage($item->quantity);
            $item->discounted_unit_price = $item->unit_price * (1 - ($item->discount_percentage / 100));
            $item->subtotal = $item->quantity * $item->discounted_unit_price;
        });
    }

    public static function calculateDiscountPercentage(int $quantity): float
    {
        return match(true) {
            $quantity >= 10 => 15.0,  // 15% descuento para 10 o más
            $quantity >= 5 => 10.0,   // 10% descuento para 5-9
            $quantity >= 3 => 5.0,    // 5% descuento para 3-4
            default => 0.0,           // Sin descuento para 1-2
        };
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function breakfast()
    {
        return $this->belongsTo(Breakfast::class);
    }
} 