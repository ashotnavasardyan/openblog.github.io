<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;
use App\Article;
use Illuminate\Support\Facades\DB;
class PostCategoryController extends Controller
{
    public function index($alias){
        $menus = Menu::all();
        $cat_id = Category::where('alias',$alias)->first()->id;
        $articles = Article::where('category_id',$cat_id)->get();
        $categories = Category::all();

        return view('home.home',compact('menus','articles','categories'));
    }
}
