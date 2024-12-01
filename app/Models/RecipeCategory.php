<?php

namespace App\Models;

class RecipeCategory extends BaseModel
{
    protected $fillable = ['name', 'total_recipe', 'is_active', 'is_deleted'];

    // Relationships
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
