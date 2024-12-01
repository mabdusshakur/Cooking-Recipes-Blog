<?php

namespace App\Models;

class BlogPost extends BaseModel
{
    protected $fillable = [
        'title',
        'content',
        'main_image',
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
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
