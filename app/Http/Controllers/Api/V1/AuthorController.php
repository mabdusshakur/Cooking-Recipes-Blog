<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Models\PopularAuthor;
use App\Services\AuthorService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ResponseHelper::sendSuccess('Author list', Author::with('user:id,name')->paginate(10), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function apply(Request $request)
    {
        try {
            $request = $request->validate(['user_id' => 'required|integer|exists:users,id']);

            $authorService = new AuthorService();
            $authorService->createAuthor(['user_id' => $request['user_id']]);

            return ResponseHelper::sendSuccess('Successfully applied for the Author position.', [], 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return ResponseHelper::sendSuccess('Author details', new AuthorResource($author), 200);
    }

    public function getCurrentAuthorProfile()
    {
        try {
            $user = Auth::guard('api')->user();
            if (!$user) {
                return ResponseHelper::sendError('User not authenticated!', [], 401);
            }
            $authorQuery = Author::where('user_id', $user->id);
            $author = $authorQuery->first();
            if ($author) {
                return ResponseHelper::sendSuccess('Author details', new AuthorResource($author), 200);
            } else {
                return ResponseHelper::sendError('Author not found!', [], 404);
            }
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mini_bio' => 'required|string',
                'main_bio' => 'required|string',
                'signature' => 'required|string',
                'profile_title' => 'required|string',
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'mini_header' => 'required|string',
                'main_header' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // get validated data
            $data = $validator->validated();

            $user = Auth::guard('api')->user();
            $author = Author::where('user_id', $user->id)->first();

            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '-' . $originalName;
                $path = $file->storeAs('uploads/author', $fileName, 'public');
                $data['main_image'] = url(Storage::url($path));
            }

            $author->update($data);

            return ResponseHelper::sendSuccess('Updated profile successfully', $data, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Approve the author application.
     */

    public function approveAuthor(Request $request)
    {
        try {
            $request = $request->validate(['author_id' => 'required|integer|exists:authors,id']);

            $author = Author::findOrFail($request['author_id']);
            if ($author && $author->user) {
                $author->is_active = true;
                $author->user->role = 'author';
                $author->user->save();
                $author->save();
            } else {
                return ResponseHelper::sendError('Author or user not found!', [], 404);
            }

            return ResponseHelper::sendSuccess('Author approved successfully.', [], 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }



    // Popular Authors
    public function popularAuthors()
    {
        try {
            $popularAuthors = PopularAuthor::getPopularAuthors();
            return ResponseHelper::sendSuccess('Popular author fetched successfully', $popularAuthors, 200);
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }
}
