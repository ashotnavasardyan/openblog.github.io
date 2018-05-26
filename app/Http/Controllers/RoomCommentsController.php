<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Comment;
use App\RightBar;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
class RoomCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $user = Auth::user();
        $comments = $user->comments;
        $rightbar = RightBar::all();
        $title = "My comments";
        return view('room.comments.room_comments',compact('menus','comments','rightbar','title','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        $menus = Menu::all();
        $user = Auth::user();
        $rightbar = RightBar::all();
        $title = "Edit comment";
        return view('room.comments.edit_comment',compact('comment','menus','rightbar','title','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $request = $request->except('_token','_method');
        $comment = Comment::find($id);
        $comment->update($request);
        return redirect()->route('comments.index')->with('status','Comment was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return Response(['status'=>'Comment was deleted!']);
    }
}
