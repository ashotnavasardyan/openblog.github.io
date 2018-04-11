<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use App\Country;
use App\Role;
use Validator;

class Core extends Controller
{
    //sarqecinq console ov php artisan make:controller Admin\Core
    protected static $articles;

	public function __construct(){
		//$this->middleware('mymiddle');
	}
	//list
    public static function addArticles($array){
        return self::$articles[]=$array;
    }
    
    public function getArticles(contactrequest $request){
        //$articles = DB::table('articles')->get();//sax tably talisa 
        //$articles = DB::table('articles')->first();//menak arajin toxy
        //$articles = DB::table('articles')->value('name');//name ov syunyaki arajiny
        /*////////////////CHI ASHXATUM///////////
        DB::table('articles')->chunk(2,function($articles){
            foreach ($articles as $article) {
                Core::addArticles($article);
            }
       });

        dump(self::$articles);
        */

        //$articles = DB::table('articles')->pluck('name');//sax name syunyaky
        //$articles = DB::table('articles')->count('name');//name um tvyalneri qanak
        //$articles = DB::table('articles')->max('id');//stex amenabarcr idna talis
        
        //$articles = DB::table('articles')->select('name','id','text')->get();
        //$articles = DB::table('articles')->distinct()->select('name','id','text')->get();
        //yntrecinq bolor toxeri name id text vortex tvyalnery chen krknvum
        
        //$query = DB::table('articles')->select('name');
        //$articles = $query->addSelect('text')->get();

        $query = DB::table('articles');
        /*
        $articles = $query->select('name','text','id')
                                                    ->where('id','>',5)
                                                    ->where('id','<=',9)
                                                    ->where('id','<=',9)
                                                    ->where('name','like','test%','or')
                                                    ->where('name','='text') 
                                                    ->get();
        */
        /*
        $articles = $query->select('name','text','id')
                                                    ->where([
                                                                ['id','>',5]
                                                                ['id','<=',9]
                                                                ['id','<=',9]
                                                                ['name','like','test%']
                                                            ]) 
                                                    ->get();
        */
        /*
        $articles = $query->select('name','text','id')
                                                    ->where('id','>',5)
                                                    ->where('name','like','test%','or')
                                                    ->orWhere('id','<',10)
                                                      ->get();
        */

            //$articles = $query->whereBetween('id',[1,5])->get();
            //$articles = $query->whereNotBetween('id',[1,5])->get();

            //$articles = $query->whereIn('id',[1,2,3,4,5])->get();
            //$articles = $query->whereNotIn('id',[1,2,3,4,5])->get();
        
            //$articles = $query->groupBy('name')->get();

            //$articles = $query->take(4)->skip(2)->get();
            //vercnuma 4 hat 2 hati vrov trnuma

            /////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////

            /*
            $query->insert([
                                            ['name'=>'test100','text'=>'lav e'],
                                            ['name'=>'test200','test'=>':('],
                                       ]);
            */

            //$articles = DB::table('articles')->get();
            
            //$result = DB::table('articles')->insertGetId(['name'=>'get','text'=>'id']);
            //dump($result);

            // id == 22
            //$articles = DB::table('articles')->where('id',22)->update(['name'=>'name_updated','text'=>'text_updated']);
            
            //$result = DB::table('articles')->where('id',6)->delete();
            
            /*//////////
            $users = DB::table('users')
                ->join('contacts', 'users.id', '=', 'contacts.user_id')
                ->join('orders', 'users.id', '=', 'orders.user_id')
                ->select('users.*', 'contacts.phone', 'orders.price')
                ->get();

            $first = DB::table('users')
                ->whereNull('first_name');

            $users = DB::table('users')
                ->whereNull('last_name')
                ->union($first)
                ->get();
            */
            //increment();

            /////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////

            //$articles = Article::where('id','>',3)->orderBy('name')->take(2)->get();

            //foreach ($articles as $article) {
                //echo $article->name."<br>";
            //}

            //$article = Article::find(2);//2 idov i modelna talis
            //echo $article->text;

            //$article = Article::findOrFail();
            //$articles = DB::table('articles')->get();
            //dump($result);
            
            /*
            $article = new Article;
            $article->name = 'New Article';
            $article->text = 'New text for article';
            $article->save();
            */

            /*
            $article = Article::find(5);

            $article->text = 'Updated text';
            $article->name = 'Updated name';
            $article->save();
            */

            /*
            Article::create([
            'name' => 'Sample Blog post',
            'text' => 'hello world',
            'img' => 'image1.jpg',
            ]);
            */

            /* //yete chka arajin arjeqy krknox tvyal senc sarquma
            $article = Article::firstOrCreate([
                'name' => 'Hello World test 2',
                'text' => 'first or create test 2',
            ]);
            */

            /* //yete arajin arjeqic chka inqy veradarcnuma bayc chi tanum baza yete ka exaci modelna tali
            $article = Article::firstOrNew([
                'name' => 'Hello World',
                'text' => 'first or new test 2', 
            ]);
            
            $article->save();//het tvac modely pahecinq bazayum
            */
            
            /* //gtanq u jnjecinq 5 id ov modeli tvyalnery
            $article = Article::find(5);
            $article->delete();
            
            $article->forceDelete();
            //Kamel
            
            Article::destroy(6);
            Article::destroy([1,2,3]);


            Article::where('id','<',8)->destroy();

            $article = Article:withTrashed()->get();
            */
            /*
            $articles = Article::all();

            foreach ($articles as $article) {
                if ($article->trashed()) {
                    echo $article->id.' Deleted';
                }
                else{
                    echo $article->id.'Not Deleted';
                }
            }
            */
            //$articles = Article::all();

            //dump($article);

            //One to one
            /*
            $user = country::find(1)->user;
            $country = User::find(1)->country;
            dump($country);
            dump($user);
            */
            //One to many
            /*
            $user = User::find(1)->articles()->where('id',3)->get();
            $article = Article::find(3)->user->name;
            dump($article);
            dump($user);
            */

            //dump(User::find(1)->roles);
            //dump(Role::find(1)->users);

            ////////////////////////////////////
            //jadni zapros
            //$articles = Article::with('user')->get();
            ////////////////////////////////////

            ////////////////////////////////////
            //$articles = Article::all();
            //$articles->load('user');
            ////////////////////////////////////


            //$users = User::with('roles','articles')->get();  
            /////////////////////////////////////////////////////////
            /*$users = User::has('articles','>=',3)->get();//3 kam avel article unecox useri modelna tali

            foreach($users as $user) {
                    dump($user->articles);
            }*/
            /////////////////////////////////////////////////////////

            ////////////SAVE//////////////////////////////////
            /*
            $user = User::find(1);

            $article = new Article([
                    'name' => 'NEW Article',
                    'text' => 'Some text for article'
                ]
            );

            $role = new Role(['name'=>'guest']);

            $user->roles()->save($role);
            $user->articles()->save($article);

            $articles = Article::all();

            dump($articles);
            */
            //////////////////////////////////////////////////////
            
            ///////////////CREATE//////////////////////////////
            /*$user = User::find(1);

            $user->articles()->create([
                    'name' => 'NEW Article for create',
                    'text' => 'Some text for article for create'
                ]);

            $articles = Article::all();

            dump($articles);*/
            //////////////////////////////////////////////////////

            ////////////SAVE MANY//////////////////////////////////
            /*$user = User::find(1);

            $article = new Article([
                    'name' => 'NEW Article',
                    'text' => 'Some text for article'
                ]
            );

            $article2 = new Article([
                    'name' => 'NEW Article for savemany',
                    'text' => 'Some text for article for savemany'
                ]
            );

            $article3 = new Article([
                    'name' => 'NEW Article for savemany for savemany',
                    'text' => 'Some text for article for savemany'
                ]
            );

            $user->articles()->saveMany([$article,$article2,$article3]);

            $articles = Article::all();

            dump($articles);*/
            ////////////SAVE MANY//////////////////////////////////

            ////////////////UPDATE/////////////////////////////////
            /*
            $user = User::find(1);
            $user->articles()->where('id',24)->update(['name'=>'change with update']);
            //articlesnery heta tali mer yntrac useri articlnery
            //save y avelacnuma dranc mej ira argumenty
            */
            ////////////////UPDATE/////////////////////////////////

            /////////////////ONE TO ONE CHANGING//////////////////////////
            /*$country = Country::find(2);
            $user = User::find(2);

            $country->user()->associate($user);
            $country->save();*/ 
            /////////////////ONE TO ONE CHANGING//////////////////////////

            ///////////////////ONE TO MANY CHANGING///////////////////////

            /*$articles = Article::all();
            $user = User::find(2);

            foreach ($articels as $article) {
                $article->user()->associate($user);
                $article->save();
            }*/

            ///////////////////ONE TO MANY CHANGING///////////////////////
    
            ///////////////////////MANY TO MANY CHANGING//////////////////
            /*
            $user = User::find(4);
            $role_id = Role::find(4)->id;
            $user->roles()->attach($role_id);//adding
            $user->roles()->detach($role_id);//deleting
            */
            ///////////////////////MANY TO MANY CHANGING//////////////////

            //$article->toJson();
            //(string)$article;
            //$article->toArray();
            /*
            if ($request->isMethod('post')) { 
                    $rules = [
                        'login' => 'required',
                        'mail' => 'email',
                        'number' => 'required'
                    ];

                   
                    $this->validate($request,$rules);

                    dump($request->all());
            }*/

            /*if ($request->isMethod('post')) {
                $messages = [];
                
                $validator = Validator::make($request->all(),['name'=>'required'],$messages);
                
                if($validator->fails()){
                    return redirect()->route('contact')->withErrors($validator)->withInput();
                    dump($errors);
                }
            }

            dump($errors);*/
            
            return view('default.contact',['title'=>'contact']);
    }

    public function show(){
        return view('default.contact',['title'=>'contact']);
    }

    //one
    public function getArticle($id){
    	echo 'Answer - '.$id;
    }



}
