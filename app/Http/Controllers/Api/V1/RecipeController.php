<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth('api')->user();
    
        if ($user && $user->role == 'admin') {
            $recipes = Recipe::paginate(10);
        } else {
            $recipes = Recipe::active()->paginate(10);
        }
    
        return RecipeResource::collection($recipes->load(['recipeCategory', 'ingredients', 'nutritionalValues']));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        try {
            $data = $request->validated();

            if (auth('api')->user()->role != 'admin') {
                $data['is_active'] = false;
            }

            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '-' . $originalName;
                $path = $file->storeAs('uploads/recipe', $fileName, 'public');
                $data['main_image'] = url(Storage::url($path));
            }

            $recipe = Recipe::create($data);


            // dd($data['equipments']);
            $recipe->equipments()->createMany($data['equipments']);
            $recipe->ingredients()->createMany($data['ingredients']);
            $recipe->nutritionalValues()->createMany($data['NutritionalValues']);

            return ResponseHelper::sendSuccess('Recipe was submitted for approval successfully', null, 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to create recipe', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return ResponseHelper::sendSuccess('Recipe fetched', new RecipeResource($recipe->load(['recipeCategory', 'ingredients','equipments', 'nutritionalValues','author'])), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        try {
            $data = $request->validated();
    
            if (auth('api')->user()->role != 'admin') {
                $data['is_active'] = false;
            }
    
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '-' . $originalName;
                $path = $file->storeAs('uploads/recipe', $fileName, 'public');
                $data['main_image'] = url(Storage::url($path));
            }
    
            $recipe->update($data);
    
            if (isset($data['ingredients'])) {
                $recipe->ingredients()->delete();
                foreach ($data['ingredients'] as $ingredient) {
                    $recipe->ingredients()->create($ingredient);
                }
            }
    
            if (isset($data['equipments'])) {
                $recipe->equipments()->delete();
                foreach ($data['equipments'] as $equipment) {
                    $recipe->equipments()->create($equipment);
                }
            }
    
            if (isset($data['nutritionalValues'])) {
                $recipe->nutritionalValues()->delete();
                foreach ($data['nutritionalValues'] as $nutritionalValue) {
                    $recipe->nutritionalValues()->create($nutritionalValue);
                }
            }
    
            return ResponseHelper::sendSuccess('Recipe was submitted for approval successfully', null, 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to update recipe', $th->getMessage(), 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        try {
            $recipe->update(['is_deleted' => true]);
            return ResponseHelper::sendSuccess('Recipe deleted', null, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to delete recipe', $th->getMessage(), 500);
        }
    }


    public function getRelatedRecipes($recipeId)
    {
        $recipe = Recipe::findOrFail($recipeId);
        $relatedRecipes = Recipe::where('category_id', $recipe->category_id)
            ->where('id', '!=', $recipeId)  
            ->take(4)  
            ->get();

        return response()->json([
            'success' => true,
            'data' => $relatedRecipes
        ]);
    }
}


