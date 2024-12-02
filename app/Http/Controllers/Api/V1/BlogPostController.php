<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Storage;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth('api')->user()->role == 'admin') {
            $blogPost = BlogPost::all();
        } else {
            $blogPost = BlogPost::active()->get();
        }
        return ResponseHelper::sendSuccess('Blog post fetched', BlogPostResource::collection($blogPost), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'main_image' => 'required|image|mimes:png,jpg,jpeg',
                'author_id' => 'required|exists:authors,id',
                'category_id' => 'required|exists:blog_categories,id',
            ]);

            $data = $request->all();
            if(auth('api')->user()->role != 'admin') {
                $data['is_active'] = false;
            }

            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '-' . $originalName;
                $path = $file->storeAs('uploads/blog', $fileName, 'public');
                $data['main_image'] = url(Storage::url($path));
            }

            BlogPost::create($data);

            return ResponseHelper::sendSuccess('Blog was submitted for approval successfully', null, 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to create blog', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return ResponseHelper::sendSuccess('Blog post fetched', new BlogPostResource($blogPost), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        try {
            $request->validate([
                'title' => 'nullable|string',
                'content' => 'nullable|string',
                'main_image' => 'nullable|image|mimes:png,jpg,jpeg',
                'author_id' => 'nullable|exists:authors,id',
                'category_id' => 'nullable|exists:blog_categories,id',
            ]);

            $data = $request->all();
            if (auth('api')->user()->role != 'admin') {
                $data['is_active'] = false;
            }

            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '-' . $originalName;
                $path = $file->storeAs('uploads/blog', $fileName, 'public');
                $data['main_image'] = url(Storage::url($path));
            }

            $blogPost->update($data);

            return ResponseHelper::sendSuccess('Blog was submited for approval successfully', null, 201);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to update blog', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        try {
            $blogPost->update(['is_deleted' => true]);
            return ResponseHelper::sendSuccess('Blog deleted', null, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Failed to delete blog', $th->getMessage(), 500);
        }
    }
}
