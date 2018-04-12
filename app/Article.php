<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    protected $table = 'articles';
	protected $primaryKey = 'id';
	public $incrementing = TRUE;
	public $timestamps = TRUE;

	public function user(){
		return $this->belongsTo('App\User','id','article_id');
	}

	public function comments(){
	    return $this->hasMany('App\Comment','comment_id','id');
    }

    public function category(){
	    return $this->belongsTo('App\Category','category_id','id');
    }
}
