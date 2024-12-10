<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminFrontendController;
use App\Http\Controllers\AuthorFrontendController;

Route::get('/',[FrontendController::class,'index']);
Route::get('/about',[FrontendController::class,'about']);
Route::get('/blog',[FrontendController::class,'blog']);
Route::get('/recipes',[FrontendController::class,'recipes']);
Route::get('/authors',[FrontendController::class,'authors']);
Route::get('/single-recipe',[FrontendController::class,'singleRecipe']);
Route::get('/single-blog',[FrontendController::class,'singleBlog']);
Route::get('/sign-in',[FrontendController::class,'signIn'])->name('front.auth.sign-in');
Route::get('/sign-up',[FrontendController::class,'signUp'])->name('front.auth.sign-up');
Route::get('/verify-otp',[FrontendController::class,'verifyOtp'])->name('front.auth.verify-otp');
Route::get('/user/dashboard',[FrontendController::class,'dashboard'])->name('front.user.dashboard');
Route::get('/user/profile',[FrontendController::class,'profile'])->name('front.user.profile');

Route::prefix('/author')->group(function () {
    Route::get('/',[AuthorFrontendController::class,'index'])->name('front.author.dashboard');
    Route::get('/profile',[AuthorFrontendController::class,'profile'])->name('front.author.profile');

    Route::prefix('/blog')->group(function () {
        Route::get('/', [AuthorFrontendController::class,'blogIndex'])->name('front.author.blog.index');
        Route::get('/create', [AuthorFrontendController::class,'blogCreate'])->name('front.author.blog.create');
        Route::get('/edit/{id?}', [AuthorFrontendController::class,'blogEdit'])->name('front.author.blog.edit');

        Route::prefix('/category')->group(function () {
            Route::get('/', [AuthorFrontendController::class,'blogCategoryIndex'])->name('front.author.blog.category.index');
            Route::get('/create', [AuthorFrontendController::class,'blogCategoryCreate'])->name('front.author.blog.category.create');
        });
    });


    Route::prefix('/recipe')->group(function () {
        Route::get('/', [AuthorFrontendController::class,'recipeIndex'])->name('front.author.recipe.index');
        Route::get('/create', [AuthorFrontendController::class,'recipeCreate'])->name('front.author.recipe.create');
        Route::get('/edit/{id?}', [AuthorFrontendController::class,'recipeEdit'])->name('front.author.recipe.edit');

        Route::prefix('/category')->group(function () {
            Route::get('/', [AuthorFrontendController::class,'recipeCategoryIndex'])->name('front.author.recipe.category.index');
            Route::get('/create', [AuthorFrontendController::class,'recipeCategoryCreate'])->name('front.author.recipe.category.create');
        });
    });
});

//Admin Routes
Route::prefix('/admin')->group(function () {
    Route::get('/',[AdminFrontendController::class,'index'])->name('front.admin.dashboard');

    Route::prefix('/blog')->group(function () {

        Route::get('/', [AdminFrontendController::class,'blogIndex'])->name('front.admin.blog.index');

        Route::prefix('/category')->group(function () {
            Route::get('/', [AdminFrontendController::class,'blogCategoryIndex'])->name('front.admin.blog.category.index');
            Route::get('/create', [AdminFrontendController::class,'blogCategoryCreate'])->name('front.admin.blog.category.create');
        });
    });


    Route::prefix('/recipe')->group(function () {
        Route::get('/', [AdminFrontendController::class,'recipeIndex'])->name('front.admin.recipe.index');

        Route::prefix('/category')->group(function () {
            Route::get('/', [AdminFrontendController::class,'recipeCategoryIndex'])->name('front.admin.recipe.category.index');
            Route::get('/create', [AdminFrontendController::class,'recipeCategoryCreate'])->name('front.admin.recipe.category.create');
        });
    });
});