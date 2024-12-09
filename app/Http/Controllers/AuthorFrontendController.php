<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorFrontendController extends Controller
{
    public function index()
    {
        return view('authors.dashboard');
    }



    // Blog
    public function blogIndex()
    {
        return view('authors.blog.index');
    }

    public function blogCreate()
    {
        return view('authors.blog.create');
    }

    public function blogEdit()
    {
        return view('authors.blog.edit');
    }

    public function blogCategoryIndex()
    {
        return view('authors.blog.category.index');
    }

    public function blogCategoryCreate()
    {
        return view('authors.blog.category.create');
    }


    // Recipe
    public function recipeIndex()
    {
        return view('authors.recipe.index');
    }

    public function recipeCreate()
    {
        return view('authors.recipe.create');
    }

    public function recipeEdit()
    {
        return view('authors.recipe.edit');
    }

    public function recipeCategoryIndex()
    {
        return view('authors.recipe.category.index');
    }

    public function recipeCategoryCreate()
    {
        return view('authors.recipe.category.create');
    }
}
