<?php

namespace App\Models;

class FeaturedRecipe extends BaseModel
{
    protected $fillable = ['recipe_id'];

    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }
}
