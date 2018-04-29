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
        if(!Auth::check()){
            abort(404);
        }
        $validator = Validator::make($request, [
            'title'=>'required|max:25',
            'text' => 'required|max:255',
            'article_id'=>'required|integer',
            'user_id'=>'required|integer',
        ]);
        if($validator->fails()){

            //return back()->with(['errors'=>$validator->errors()]);
            $data = json_encode(['errors'=>$validator->errors()]);
            return Response($data);
        }
        $comment = new Comment($request);
        $article = Article::find($request['article_id']);
        $article->comments()->save($comment);

        return Response(['status'=>['Your comment was added']]);

    }
}
