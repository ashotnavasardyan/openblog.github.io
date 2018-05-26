<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\RightBar;
use Illuminate\Support\Facades\Auth;
class RoomSettingsController extends Controller
{
    public function index(){
        $menus = Menu::all();
        $rightbar = RightBar::all();
        $user = Auth::user();
        $title = 'Settings';
        return view('room.settings.settings',compact('menus','rightbar','user','title'));
    }
}
