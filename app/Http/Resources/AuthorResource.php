<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'mini_bio' => $this->mini_bio,
            'main_bio' => $this->main_bio,
            'mini_header' => $this->mini_header,
            'main_header' => $this->main_header,
            'signature' => $this->signature,
            'profile_title' => $this->profile_title,
            'main_image' => $this->main_image,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'recipes' => RecipeResource::collection($this->recipes),
            'blogs' => BlogPostResource::collection($this->blogPosts),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
