<?php

namespace App\Models;

class Recipe extends BaseModel
{
    protected $fillable = [
        'title',
        'prepare_time',
        'difficulty',
        'serving',
        'profile_title',
        'main_image',
        'long_description',
        'short_description',
        'author_id',
        'category_id',
        'is_active',
        'is_deleted'
    ];

    // Relationships
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function recipeCategory()
    {
        return $this->belongsTo(RecipeCategory::class,'category_id');
        return $this->belongsTo(RecipeCategory::class, 'category_id');
    }


    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function nutritionalValues()
    {
        return $this->hasMany(NutritionalValue::class);
    }
}
