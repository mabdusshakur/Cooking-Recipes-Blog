<?php

namespace App\Models;

class Ingredient extends BaseModel
{
    protected $fillable = ['name', 'quantity', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
