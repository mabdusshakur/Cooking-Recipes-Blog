<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
