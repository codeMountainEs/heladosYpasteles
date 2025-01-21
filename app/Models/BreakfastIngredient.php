<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BreakfastIngredient extends Pivot
{
    protected $table = 'breakfast_ingredient';

    protected $fillable = [
        'breakfast_id',
        'ingredient_id',
        'quantity',
        'unit'
    ];

    public function breakfast()
    {
        return $this->belongsTo(Breakfast::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
} 