<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;
use App\Menu;
use App\RightBar;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Article;
use Illuminate\Support\Collection;
use App\Http\Requests\StorePostRequest;
class RoomPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $rightbar = RightBar::all();
        $user = Auth::user();
        $articles = $user->articles;
        $title = "My Posts";
        return view('room.posts.room_posts',compact('menus','title','rightbar','articles','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $category = Category::all();
        $rightbar = RightBar::all();
        $user = Auth::user();
        $title = "My Posts";
        return view('room.posts.create_post',compact('category','menus','title','rightbar','articles','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $req = $request->except('_token');

        $image = $request->file('images');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$imagename);

        $req['images'] = $imagename;
        $article = new Article($req);
        $user = Auth::user();
        $user->articles()->save($article);

        return redirect()->route('posts.index')->with('status','Post was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        $menus = Menu::all();
        $user = Auth::user();
        $article = Article::where('alias',$alias)->first();
        $rightbar = RightBar::all();
        $comments = $article->comments;
        $title = $article->title;
        return view('room.posts.show_post',compact('rightbar','article','menus','comments','title','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
        $article = Article::where('alias',$alias)->first();
        $user = Auth::user();
        $menus = Menu::all();
        $category = Category::all();
        $rightbar = RightBar::all();
        $title = "Edit Post";
        return view('room.posts.edit_post',compact('user','article','category','menus','title','rightbar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $alias)
    {
        $req = $request->except('_token','user_id');

        if(!is_null($request->file('images'))){
            unlink(public_path() .  '/images/' .$req['image_def']);
            $image = $request->file('images');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$imagename);
            $req['images'] = $imagename;
        }

        $article = Article::find($req['id']);
        $article->update($req);
        return redirect()->route('posts.index')->with('status','Post was updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->comments()->delete();
        $article->delete();
        return Response(['status'=>'Post was deleted!']);
    }
}
