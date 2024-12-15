<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\RecipeController;
use App\Http\Controllers\Api\V1\BlogPostController;
use App\Http\Controllers\Api\V1\UserDashboardController;
use App\Http\Controllers\Api\V1\RecipeCategoryController;
use App\Http\Controllers\Api\V1\BlogPostCategoryController;

Route::group(['prefix' => 'v1'], function () {
   
    // Auth Routes
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
        Route::post('/resend-otp', [AuthController::class, 'resendOtp']);
        Route::post('/login', [AuthController::class, 'login']);
    });


    
    Route::group(['middleware' => 'api'], function () {
        // Auth Routes
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::get('/featured-recipes', [UserDashboardController::class, 'getFeaturedRecipes']);


        // <----- General Routes, can be accessible without authentication for no-auth & auth both users ----->

        // Blog Category Routes (Show All, Show One)
        Route::apiResource('/blog-category', BlogPostCategoryController::class)->only('index', 'show');

         // Recipe Category Routes (Show All, Show One)
        Route::apiResource('/recipe-category', RecipeCategoryController::class)->only('index', 'show');

        // Blog Post Routes (Show All, Show One)
        Route::apiResource('/blog-post', BlogPostController::class)->only('index', 'show');

        // Recipe Routes (Show All, Show One)
        Route::apiResource('/recipes', RecipeController::class)->only('index', 'show');
        //related recipe
        Route::get('/recipes/{recipeId}/related', [RecipeController::class, 'getRelatedRecipes']);
        //related blogs
        Route::get('/blog-post/{postId}/related', [BlogPostController::class, 'getRelatedBlogPosts']);

        // General Profile
        Route::get('/profile', [AuthController::class, 'profile']);

        // User Middleware
        Route::group(['prefix' => 'user', 'middleware' => 'CheckRole:user'], function () {
            // Apply for author
            Route::post('/apply', [AuthorController::class, 'apply']); // from user dashboard separate application button

            // User Profile
            Route::get('/profile', [AuthController::class, 'profile']);
        });


        // Author Middleware
        Route::group(['prefix' => 'author', 'middleware' => 'CheckRole:author'], function () {
            // Update Author Profile
            Route::put('/profile', [AuthorController::class, 'update']);

            // Author Profile
            Route::get('/profile', [AuthorController::class, 'getCurrentAuthorProfile']);

            // Blog Category Routes (Show One, Show All, Create, Update)
            Route::apiResource('/blog-category', BlogPostCategoryController::class, ['as' => 'author'])->only('index', 'show' , 'store', 'update');

            // Blog Post Routes (CRUD)
            Route::apiResource('/blog-post', BlogPostController::class, ['as' => 'author'])->only('index', 'show', 'store', 'update', 'destroy');

            // Recipe Category Routes (Show One, Show All, Create, Update)
            Route::apiResource('/recipe-category', RecipeCategoryController::class, ['as' => 'author'])->only('index', 'show' , 'store', 'update');

            // Recipe Routes (CRUD)
            Route::apiResource('/recipes', RecipeController::class, ['as' => 'author'])->only('index', 'show', 'store', 'update', 'destroy');
        });
       

        // Admin Middleware
        Route::group(['prefix' => 'admin', 'middleware' => 'CheckRole:admin'], function () {
            // Admin Profile
            Route::get('/profile', [AuthController::class, 'profile']);

            // Author (Show All, Create, Delete)Routes
            Route::apiResource('/author', AuthorController::class)->only('index', 'store', 'destroy');

            // Author (Approve) Route
            Route::patch('/author/approve', [AuthorController::class, 'approveAuthor']);

            // Blog Category (CRUD)
            Route::apiResource('/blog-category', BlogPostCategoryController::class, ['as' => 'admin']);

            // Blog Post Routes (CRUD)
            Route::apiResource('/blog-post', BlogPostController::class, ['as' => 'admin'])->only('index', 'show', 'store', 'update', 'destroy');

            // Recipe Category (CRUD)
            Route::apiResource('/recipe-category', RecipeCategoryController::class, ['as' => 'admin']);

            // Recipe Routes (CRUD)
            Route::apiResource('/recipes', RecipeController::class, ['as' => 'admin']);
        });
    });
});

