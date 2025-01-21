<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

   /* public function allergens()
    {
        return $this->belongsToMany(Allergen::class);
    }

    public function breakfasts()
    {
        return $this->belongsToMany(Breakfast::class);
        
    }*/
} 