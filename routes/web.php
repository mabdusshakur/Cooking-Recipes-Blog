<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthorFrontendController;

Route::get('/',[FrontendController::class,'index']);
Route::get('/about',[FrontendController::class,'about']);
Route::get('/blog',[FrontendController::class,'blog']);
Route::get('/recipes',[FrontendController::class,'recipes']);

Route::prefix('/author')->group(function () {
    Route::get('/',[AuthorFrontendController::class,'index'])->name('front.author.dashboard');

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