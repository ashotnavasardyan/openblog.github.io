<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
	/*
	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}
	*/

	public function show(Request $request,$id = FALSE){
	echo "<pre>";
    print_r($request->all());//$requestum gtnvox bolor parametrery talisa
	echo "</pre>";
	//echo $request->input('login','Default');//ete chka name tpuma default
	
	/*if($request->has('login')){//ete ka name anunov input u inqy datark chi
		echo $request->input('login');
	}*/
	//$array = $request->only('login','comment');//menak sranqa tali

	//$array = $request->except('login','comment');//sax baci srancic	
    
	//echo $request->login;
    
    //echo $request->path();//veradarcnuma URI
    
	/*if($request->is('contact/*')){
		echo $request->path();
	}*/

	//echo $request->url();//kes hasce
    //echo $request->fullUrl();//lriv hascen

	//echo $request->method();//asuma zaprosi tesakna asum

	//if($request->isMethod('post')){//yete arvaca post zapros ashxatuma ify
		//$request->flash();//postov poxancvac bolor danninery pahcinq sesssionum

		$request->flashOnly('login','comment');//menak nshvac tvyalnerna pahum sessionum

		//$request->flashExcept('login','comment');//baci srancic sax pahuma 
		
		//echo $request->method();

		//$request->root();//domain

		//$request->exists();//nunyn has() na uxaki esi true a talis ete nuynisk  inputy datarka


		//return redirect()->route('contact')->withInput();//eli pahecinq sesssionum

	//}

	//$request->query('id');//getum id i arjeqna tali

	//$request->header();//yndhanur tvyalner

	//$request->server();//inch ases talisa

	//$request->flush();//sessionic jnjuma tvyalnery

	//$request->old();//sessioni meji tvyalnernaa tali
    	echo "<h1>".$id."</h1>";


    		if(view()->exists('default.contact')){
    			//$articles = DB::select('SELECT * FROM `articles` WHERE id = ?',[3]);

    			//$articles = DB::select('SELECT * FROM `articles` WHERE id = :id',['id'=>2]);

    			//$other_result = DB::connection()->getPdo()->lasInsertId(); opshi zaprosneri hamara
    			
    	      DB::insert("INSERT INTO `articles` (`name`,`text`) VALUES(? , ?)",['test number 1','TEXT']);	
    $result = DB::update('UPDATE `articles` SET `name` = :name WHERE `id` = :id',['id'=>13,'name'=>'TEST 4']);
    $delete_result = DB::delete('DELETE FROM `articles` WHERE `id` = ?',[4]);
    $articles = DB::select('SELECT * FROM `articles`');
    		  //DB::statment('DROP table `articles`');

    		//dump($other_result);
    		dump($result);
    		dump($delete_result);
    		dump($articles);



    			return view('default.contact',['title'=>'contact']);
    		}

		//return response()->download('robots.txt');
	
    	//return redirect('/');
    	///return new RedirectResponce('/');
    	//return new RedirectResponce::create('/');
    	//return back();
    	//return redirect()->action('Admin\AboutController@show');

    	//return response()->myRes('Hello world');
	}


}
