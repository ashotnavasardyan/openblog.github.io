<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['*'];

    public function category(){
        return $this->belongsTo('app\Category','category_id','id');
    }

    public function user(){
        return $this->belongsTo('app\User','user_id','id');
    }

    public function article(){
        return $this->belongsTo('app\Article','article_id','id');
    }
}
