<?php

namespace App\Models;

class NutritionalValue extends BaseModel
{
    protected $fillable = ['name', 'amount', 'calorie_per_gram', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
