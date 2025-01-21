<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'delivery_street_address',
        'delivery_postal_code',
        'delivery_city',
        'delivery_province',
        'delivery_date',
        'delivery_time',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'notes',
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'delivery_time' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFullDeliveryAddressAttribute()
    {
        return "{$this->delivery_street_address}, {$this->delivery_postal_code} {$this->delivery_city} ({$this->delivery_province})";
    }
} 