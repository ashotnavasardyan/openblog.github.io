<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class RoomCommentShow extends Controller
{
    public function show(Request $request){
        $request = $request->except('_token');
        $comment= Comment::where('id',$request['id']);
        if(isset($request['comment_show'])){
            $comment->update(['comment_show'=>1]);
        }
        else{
            $comment->update(['comment_show'=>0]);
        }
        return $request;
    }
}
