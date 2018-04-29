<?php

namespace App\Http\Controllers;

//use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use App\Article;
use App\Menu;
use App\Category;
use App\Comment;
class HomeController extends Controller
{
    public function __construct(){
        $menus = Menu::all();
        $categories = Category::all();
    }

    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $articles = Article::all()->load('user');
        $title = 'Home';
        return view('home.home',compact('articles','menus','categories','title'));
    }

    public function show($alias){
        $menus = Menu::all();
        $categories = Category::all();
        $article = Article::where('alias',$alias)->first();
        $comments = $article->comments;
        $title = $article->title;
        return view('home.home-show',compact('article','menus','categories','title','comments','status'));
    }
}
