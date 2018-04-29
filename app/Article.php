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
		return $this->belongsTo(User::class);
	}

	public function comments(){
	    return $this->hasMany(Comment::class);
    }

    public function category(){
	    return $this->belongsTo(Category::class);
    }
}
