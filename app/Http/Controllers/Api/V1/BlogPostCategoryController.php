<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth('api')->user()->role == 'admin') {
            $blogPostCategories = BlogCategory::all();
        } else {
            $blogPostCategories = BlogCategory::active()->get();
        }
        return ResponseHelper::sendSuccess('Blog post category list fetched', BlogPostCategoryResource::collection($blogPostCategories), 200);
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

            $user = auth('api')->user();
            $isAdmin = $user->role == 'admin';

            BlogCategory::create([
                'name' => $request->name,
                'is_active' => $isAdmin ? $request->is_active : false,
            ]);

            return ResponseHelper::sendSuccess('Blog category created', null, 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to create blog category', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        return ResponseHelper::sendSuccess('Blog post category fetched', new BlogPostCategoryResource($blogCategory), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'nullable|string|max:255',
                'is_active' => 'nullable|boolean',
            ]);

            $user = auth('api')->user();
            $isAdmin = $user->role == 'admin';

            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->update([
                'name' => $request->name ?? $blogCategory->name,
                'is_active' => $isAdmin ? $request->is_active : false,
            ]);

            return ResponseHelper::sendSuccess('Blog category updated', null, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to update blog category', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        try {
            $blogCategory->delete();
            return ResponseHelper::sendSuccess('Blog category deleted', null, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to delete blog category', $th->getMessage(), 500);
        }
    }
}
