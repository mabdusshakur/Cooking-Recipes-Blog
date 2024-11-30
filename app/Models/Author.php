<?php

namespace App\Models;

use App\Models\Recipe;
use App\Models\BlogPosts;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
