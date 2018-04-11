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
	protected $fillable = ['name','text',email];//toxum enq avelacnel
	protected $guarded = ['*'];//chenq toxum avelacnel
	protected $dates = ['deleted_at'];
	protected $casts = [
		'name' => 'text'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function comments(){
	    return $this->hasMany('App\Comment');
    }

    public function category(){
	    return $this->belongsTo('App\Category');
    }
	/////////////////////////READING////////////////////////////
	public function getNameAttribute($value){
		return 'hello '.$value.' hello';
	}
	//////////////////Changing/////////////////////////////////
	public function setNameAttribute($value){
		return $this->attributes['name'] = ' | '.$value.' | ';
	}
}
