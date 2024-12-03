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
                : RecipeCategory::active()->with('recipes')->get();

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
            $user = auth('api')->user();

            $request->validate([
                'name' => 'required|string|max:255',
                'is_active' => 'nullable|boolean',
            ]);

            $recipeCategory = RecipeCategory::create([
                'name' => $request->name,
                'is_active' => $user->role === 'admin' ? $request->is_active : false,
            ]);

            return ResponseHelper::sendSuccess('Recipe category created successfully.', new RecipeCategoryResource($recipeCategory), 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to create recipe category.', $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipeCategory $recipeCategory)
    {
        try {
            $user = auth('api')->user();

            $request->validate([
                'name' => 'nullable|string|max:255',
                'is_active' => 'nullable|boolean',
            ]);

            $recipeCategory->update([
                'name' => $request->name ?? $recipeCategory->name,
                'is_active' => $user->role == 'admin' ? $request->is_active ?: $recipeCategory->is_active : false,
            ]);

            return ResponseHelper::sendSuccess('Recipe category updated successfully.', new RecipeCategoryResource($recipeCategory), 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to update recipe category.', $th->getMessage(), 500);
        }
    }
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
