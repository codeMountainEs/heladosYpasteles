<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Breakfast extends Model
{
    use HasFactory;

    protected $fillable = [
        'breakfast_type_id',
        'name',
        'description',
        'base_price',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'base_price' => 'decimal:2',
    ];

    public function breakfastType(): BelongsTo
    {
        return $this->belongsTo(BreakfastType::class);
    }
public function breakfastIngredients(): HasMany
{
    return $this->hasMany(BreakfastIngredient::class);
}

public function ingredients() : BelongsToMany
{
    return $this->belongsToMany(Ingredient::class)
        ->withPivot(['quantity', 'unit']);
}

    public function images(): HasMany
    {
        return $this->hasMany(BreakfastImage::class);
    }

    public function allergens()
    {
        return $this->belongsToMany(Allergen::class, 'breakfast_ingredient')
            ->through('ingredients');
    }
} 