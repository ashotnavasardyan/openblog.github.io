<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Comment;
use App\Article;
class CommentController extends Controller
{
    public function send(Request $request){

        $request = $request->except('_token');
        $user_id = Auth::user()->id;
        $request['user_id'] = $user_id;

        $validator = Validator::make($request, [
            'title'=>'required|max:25|min:5',
            'text' => 'required|max:255|min:5',
            'article_id'=>'required|integer',
            'user_id'=>'required|integer',
        ]);
        if($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $comment = new Comment($request);
        $article = Article::find($request['article_id']);
        $article->comments()->save($comment);
        $comments = Comment::where('article_id',$request['article_id'])->get();

//        return Response(,'user_name'=>Auth::user()->name,'image'=>Auth::user()->image,'comments'=>$comments]);
        return back()->with('status','Your comment was added');
    }
}
