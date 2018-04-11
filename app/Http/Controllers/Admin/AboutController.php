<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function show(){
    	if(view()->exists('default.about')){

    		$view = view('default.about',['title'=>'About title']);
    		
    		return (new Response($view))->header('Content-Type','newType')->header('sosi','dzyan-yang');
    		//responsy y et helpera vory kanchely jamanak stexcum Response i objecty u nuynna inch vor grenq new Response()
    		//return response($view)->header('sosi','dzyan-yang');
    		//return view('default.about',['title'=>'About title']);
    	}
    }
}
 
