<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show(){
    	/*$$$###$$$
    	$data = array('title1'=>'title1','title2'=>'title2','title3'=>'title3');
    	return view('template','$data');
    	*/

    	//return view('template',['title1'=>'title1','title2'=>'title2','title3'=>'title3']);
 		
 		/*
 		$view = view('template');

 		$view->with('title1','title1');
 		$view->with('title2','title2');  	
 		$view->with('title3','title3');

 		return $view;
    	*/

    	//return view('template')->withtitle1('HELLO WORLD');

    	//if(view()->exists('template')){
    		//view()->name('template',"myview");//mer view in tvecinq anun
    		//return view()->of('myview',$data);// anunov stacanq dostum
    		//return view()->of('myview')->withtitle1('Hello world');
    		//$path = config('view.paths');
    		//view()->file($path[0].'/template.php')->withtitle1('HELLO WORLD');
    		//return view('template',['title1'=>'title1','title2'=>'title2','title3'=>'title3']);

    		//$view = view('template',['title1'=>'title1','title2'=>'title2','title3'=>'title3'])->render();
    		

    		//getPath()  chanaparhna cuyc talis 
            $data = array(
                'title1'=>'title1',
                'title2'=>'title2',
                'title3'=>'title3',
                'title'=>'Other titles',
                'array' => ['mass1'=>'mass1',
                            'mass2'=>'mass2',
                            'mass3'=>'mass3',
                            'mass4'=>'mass4',   
                            ],
                'array2' => ['mass1','mass2','mass3','mass4',],
                'dat' => [],
            );
            if(view()->exists('default.index')){
                return  view('default.index',$data);
            }

    	}

    	//abort(404);






	
}
