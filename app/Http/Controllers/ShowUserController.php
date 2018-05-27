<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\User;
use App\Article;
class ShowUserController extends Controller
{
    public function index($id){
        $menus = Menu::all();
        $user = User::find($id);
        $articles = $user->articles;
        $title = $user->name;

        return view('user.user',compact('menus','user','articles','title'));
    }
}
