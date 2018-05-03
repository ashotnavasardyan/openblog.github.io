<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Menu;
use App\Category;
use App\About;
class AboutController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = FALSE;
        $content = About::all()[0]->only('content')['content'];
        $title = 'About';
        return view('about.about',compact('articles','menus','categories','title','content'));
    }
}
