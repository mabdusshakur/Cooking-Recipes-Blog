<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Author;
use App\Models\Recipe;
use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\RecipeResource;

class UserDashboardController extends Controller
{
    public function getFeaturedRecipes()
    {
        $featuredRecipes = Recipe::where('is_featured', true)
            ->with('recipeCategory', 'ingredients', 'nutritionalValues')
            ->paginate(10);

        return RecipeResource::collection($featuredRecipes);
    }
  

    public function getAllAuthor()
    {
        try {
            $allAuthors = Author::with(['user', 'recipes', 'blogPosts'])->get();
            return ResponseHelper::sendSuccess(
                'All authors fetched successfully',
                AuthorResource::collection($allAuthors),
                200
            );
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }
    
    

}
