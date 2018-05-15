<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Article;
class ShowCommentController extends Controller
{
    public function change(Request $request){
        dd($request);
//        $alias = $request->article_alias;
//        $article = Article::find($alias);
//        $comments = $article->comments;

        $request = $request->except('_token');
        $array = [];
        $k = 0;
        foreach ($request as $key=>$req){

            $array[$k]['id'] = $key;
            $array[$k]['show'] = $req;
            $k++;
        }
//        dd($array);
//        $article->comments($comments)->update($array);

        return json_encode($array);
    }
}
