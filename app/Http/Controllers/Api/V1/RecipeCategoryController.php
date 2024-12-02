<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeCategoryResource;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;

class RecipeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = auth('api')->user();
            $recipeCategories = $user->role == 'admin'
                ? RecipeCategory::with('recipes')->get()
                : RecipeCategory::with('recipes')->where('is_active', true)->get();

            return ResponseHelper::sendSuccess(
                'Recipe categories fetched successfully.',
                RecipeCategoryResource::collection($recipeCategories),
                200
            );
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to fetch recipe categories.', $th->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'is_active' => 'nullable|boolean',
            ]);

            $recipeCategory = RecipeCategory::create([
                'name' => $request->name,
                'is_active' => $request->is_active ?? false,
                'is_deleted' => false,
                'total_recipe' => 0, // Initialize to 0 when creating a new category
            ]);

            return ResponseHelper::sendSuccess('Recipe category created successfully.', new RecipeCategoryResource($recipeCategory), 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to create recipe category.', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RecipeCategory $recipeCategory)
    {
        try {
            return ResponseHelper::sendSuccess(
                'Recipe category fetched successfully.',
                new RecipeCategoryResource($recipeCategory->load('recipes')),
                200
            );
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to fetch recipe category.', $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipeCategory $recipeCategory)
    {
        try {
            $request->validate([
                'name' => 'nullable|string|max:255',
                'is_active' => 'nullable|boolean',
            ]);

            $recipeCategory->update([
                'name' => $request->name ?? $recipeCategory->name,
                'is_active' => $request->is_active ?? $recipeCategory->is_active,
            ]);

            return ResponseHelper::sendSuccess('Recipe category updated successfully.', new RecipeCategoryResource($recipeCategory), 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to update recipe category.', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipeCategory $recipeCategory)
    {
        try {
            $recipeCategory->update(['is_deleted' => true]);
            return ResponseHelper::sendSuccess('Recipe category deleted successfully.', null, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to delete recipe category.', $th->getMessage(), 500);
        }
    }
}
