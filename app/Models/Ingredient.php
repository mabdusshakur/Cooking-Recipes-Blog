<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
