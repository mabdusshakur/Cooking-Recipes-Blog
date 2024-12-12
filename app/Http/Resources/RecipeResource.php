<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'title' => $this->title,
            'prepare_time' => $this->prepare_time,
            'difficulty' => $this->difficulty,
            'serving' => $this->serving,
            'profile_title' => $this->profile_title,
            'main_image' => $this->main_image,
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name,
            ],
            'category' => [
                'id' => $this->recipeCategory->id,
                'name' => $this->recipeCategory->name,
            ],
            'ingredients' => IngredientResource::collection($this->whenLoaded('ingredients')),
            'equipments' => EquipmentResource::collection($this->whenLoaded('equipments')),
            'NutritionalValues' => NutritionalValueResource::collection($this->whenLoaded('nutritionalValues')),
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
