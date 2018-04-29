<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerLogin extends Controller
{
    public function login(){
        $menus = Menu::all();
        $categories = Category::all();
        $articles = Article::all()->load('user');
        $title = 'Login';
        return view('auth.login',compact('articles','menus','categories','title'));
    }
}
