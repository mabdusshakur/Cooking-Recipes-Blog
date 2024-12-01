<?php

namespace App\Models;

class Image extends BaseModel
{
    protected $fillable = ['url', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
