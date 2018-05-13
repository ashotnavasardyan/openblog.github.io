<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostCommentDelete extends Controller
{
    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return json_encode(['status'=>'Comment was deleted']);
    }
}
