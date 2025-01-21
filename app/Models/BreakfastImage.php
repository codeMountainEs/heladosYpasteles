<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakfastImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'breakfast_id',
        'image_path',
        'title',
        'description'
    ];

    public function breakfast()
    {
        return $this->belongsTo(Breakfast::class);
    }
} 