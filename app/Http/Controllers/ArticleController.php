<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Comment;
use App\Category;
class ArticleController extends Controller
{
    public function index(){

        $user = User::where('id',1)->get();
       dump($user->comments());
        $comm = Comment::where('id',1)->get();
       // dump($comm);
        $art = Article::where('id',2)->get();
       //dump($art);
        $cat = Category::where('id',1)->get();
       // dump($cat);
        return view('index')->with('content','content');
    }

}
