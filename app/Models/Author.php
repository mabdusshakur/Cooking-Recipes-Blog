<?php

namespace App\Models;

class Author extends BaseModel
{
    protected $fillable = [
        'user_id', 
        'mini_bio', 
        'main_bio', 
        'signature', 
        'profile_title', 
        'main_image', 
        'main_header', 
        'mini_header', 
        'is_active', 
        'is_deleted'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
