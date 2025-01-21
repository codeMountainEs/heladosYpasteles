<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakeryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'bakery_id',
        'image_path',
        'description'
    ];

    public function bakery()
    {
        return $this->belongsTo(Bakery::class);
    }
} 