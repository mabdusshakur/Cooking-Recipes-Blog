<?php

namespace App\Models;

class Equipment extends BaseModel
{
    protected $fillable = ['name', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
