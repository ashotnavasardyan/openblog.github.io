<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Menu;
use App\Category;
class AboutController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $articles = Article::all()->load('user');
        $title = 'Home';
        return view('home.home',compact('articles','menus','categories','title'));
    }
}
