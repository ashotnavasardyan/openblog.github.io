<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name','alias'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function users(){
        return $this->belongsToMany('App\User','user_category','category_id','user_id');
    }

}
