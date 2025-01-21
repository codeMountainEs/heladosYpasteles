<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'bakery_id',
        'product_type_id',
        'name',
        'description',
        'price',
        'image'
    ];

    public function bakery()
    {
        return $this->belongsTo(Bakery::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
} 