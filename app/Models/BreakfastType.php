<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BreakfastType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function breakfasts(): HasMany
    {
        return $this->hasMany(Breakfast::class);
    }
} 