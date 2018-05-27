<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;
use App\Article;
use App\RightBar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
class RoomSubscribesController extends Controller
{
    public function index(){
        $menus = Menu::all();
        $rightbar = RightBar::all();
        $user= Auth::user();
        $subscribes = $user->categories;
        $title = "My subscribes";
        return view('room.subscribes.subscribes',compact('user','menus','rightbar','subscribes','title'));
    }

    public function unsubscribe($alias){
        $category = Category::where('alias', $alias)->first();
        $user = Auth::user();
        $user->categories()->detach($category->id);

        return Response(['status'=>'Category was unsubscribed!']);
    }
}
