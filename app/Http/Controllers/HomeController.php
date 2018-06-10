<?php

namespace App\Http\Controllers;

//use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use App\Article;
use App\Menu;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use Carbon\Carbon;
use App\User;
class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $articles = [];
        $user = Auth::user();
        if($user) {
            foreach ($user->categories as $category) {
                $articles = array_merge($articles, $category->articles->take(env('POSTS_COUNT'))->all());
            }
            if($articles == []){
                $no_category = "There is no any Post";
            }

        }
        else{
            $categories = Category::orderBy('followers')->get()->slice(-env('POST_LOGOUT_COUNT'));
            foreach ($categories as $category) {
                $articles = array_merge($articles, $category->articles->take(env('POSTS_COUNT'))->all());
            }
        }
        $title = 'Home';
        return view('home.home',compact('articles','menus','categories','title'));
    }

    public function show($alias){
        if(!Auth::check()){
            return redirect('login');
        }
        $menus = Menu::all();
        $categories = Category::all();
        $article = Article::where('alias',$alias)->first();
        $user = Auth::user();
        $comments = $article->comments->where('comment_show',1);
        $title = $article->title;
        return view('home.home-show',compact('user','article','menus','categories','title','comments','status'));
    }
}

