<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;
use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class PostCategoryController extends Controller
{
    public function index($alias)
    {
        $menus = Menu::all();
        $category = Category::where('alias', $alias)->first();
        $articles = Article::where('category_id', $category->id)->get();
        $categories = Category::all();
        $user = Auth::user();
        $aliases = [];
        foreach ($user->categories as $cat) {
            $aliases[] = $cat->alias;
        }
        $subscribed = in_array($category->alias, $aliases);
        return view('home.home', compact('menus', 'articles', 'categories', 'category', 'subscribed'));
    }

    public function subscribe(Request $request, $alias)
    {
        if ($request->subscribed) {
            $category = Category::where('alias', $alias)->first();
            $user = Auth::user();
            $user->categories()->detach($category->id);
        } else {
            $category = Category::where('alias', $alias)->first();
            $user = Auth::user();
            $user->categories()->attach($category->id);
        }
        return back();
    }

}
