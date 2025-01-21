<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakfast extends Model
{
    use HasFactory;

    protected $fillable = [
        'breakfast_type_id',
        'name',
        'description',
        'price',
        'image'
    ];

    public function breakfastType()
    {
        return $this->belongsTo(BreakfastType::class);
    }
} 