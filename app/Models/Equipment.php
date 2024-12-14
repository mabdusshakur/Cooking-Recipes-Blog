<?php

namespace App\Models;

class Equipment extends BaseModel
{
    protected $fillable = ['name', 'recipe_id'];
    protected $table = 'equipments';

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }


}
