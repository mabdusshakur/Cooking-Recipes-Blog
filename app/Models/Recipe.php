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


    // On Boot functionalities
    protected static function boot()
    {
        parent::boot();

        static::created(function ($recipe) {
            $recipe->recipeCategory->increment('total_recipes', 1);
        });

        static::deleted(function ($recipe) {
            $recipe->recipeCategory->decrement('total_recipes', 1);
        });
    }

    // Relationships
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

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function nutritionalValues()
    {
        return $this->hasMany(NutritionalValue::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
