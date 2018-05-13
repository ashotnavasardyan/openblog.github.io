<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\RightBar;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(){
        $menus = Menu::all();
        $rightbar = RightBar::all();
        $user = Auth::user();
        $title = "My Room";
        return view('room.home.room_home',compact('menus','title','rightbar','user'));
    }
}
