<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class admin_controller extends Controller
{
    public function show(){
    	return view('/');
    }
}
