<?php

namespace App\Models;

use App\Models\Author;
use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function recipeCategory()
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }

    public function nutritionalValue()
    {
        return $this->hasOne(NutritionalValue::class);
    }
}
