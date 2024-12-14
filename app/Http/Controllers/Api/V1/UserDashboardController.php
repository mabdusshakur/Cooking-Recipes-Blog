<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;

class UserDashboardController extends Controller
{
    public function getFeaturedRecipes()
    {
        $featuredRecipes = Recipe::where('is_featured', true)
            ->with('recipeCategory', 'ingredients', 'nutritionalValues')
            ->paginate(10);

        return RecipeResource::collection($featuredRecipes);
    }
}
