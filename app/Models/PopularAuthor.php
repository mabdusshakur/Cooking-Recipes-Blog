<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularAuthor extends Model
{
    protected $fillable = ['visits', 'author_id'];

    public static function incrementVisits($authorId)
    {
        $popularAuthor = self::firstOrCreate(['author_id' => $authorId]);
        $popularAuthor->increment('visits');
    }



    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public static function getPopularAuthors($limit = 3)
    {
        return self::with(['author', 'author.user', 'author.recipes', 'author.blogPosts'])->orderBy('visits', 'desc')->take(3)->get()->map(function ($popularAuthor) {
            return [
                'author' => [
                    'name' => $popularAuthor->author->name,
                    'user' => [
                        'name' => $popularAuthor->author->user->name,
                        'email' => $popularAuthor->author->user->email,
                    ],
                    'main_image' => $popularAuthor->author->main_image,
                    'recipes_count' => $popularAuthor->author->recipes->count(),
                    'blog_posts_count' => $popularAuthor->author->blogPosts->count(),
                ],
                'visits' => $popularAuthor->visits,
            ];
        });
    }
}
