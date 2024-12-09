<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('user.home');
    }
    public function about(){
        $data['pageHeader']='About Our Mezban';
        $data['page']='About';
        return view('user.about',$data);
    }
    public function blog(){
        $data['pageHeader']='Cooking Blogs';
        $data['page']='Blog';
        return view('user.blog',$data);
    }
    public function recipes(){
        $data['pageHeader']='All Recipies';
        $data['page']='Menus';
        return view('user.recipes',$data);
    }
    public function authors(){
      
        return view('user.authors');
    }
    public function singleRecipe(){
      
        return view('user.recipes.show');
    }
    public function singleBlog(){
        $data['pageHeader']='Remo support center what forng semicon...';
        $data['page']='Blog';
        return view('user.blog.show',$data);
    }
}
