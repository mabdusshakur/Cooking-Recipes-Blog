<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFrontendController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function authorIndex()
    {
        return view('admin.author.index');
    }


    // Blog
    public function blogIndex()
    {
        return view('admin.blog.index');
    }


    public function blogCategoryIndex()
    {
        return view('admin.blog.category.index');
    }

    public function blogCategoryCreate()
    {
        return view('admin.blog.category.create');
    }


    // Recipe
    public function recipeIndex()
    {
        return view('admin.recipe.index');
    }

 


    public function recipeCategoryIndex()
    {
        return view('admin.recipe.category.index');
    }

    public function recipeCategoryCreate()
    {
        return view('admin.recipe.category.create');
    }
}
