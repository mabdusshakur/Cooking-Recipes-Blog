<?php

namespace App\Models;

class BlogCategory extends BaseModel
{
    protected $fillable = ['name', 'total_blog', 'is_active', 'is_deleted'];

    // Relationships
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
