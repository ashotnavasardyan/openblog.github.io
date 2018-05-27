<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name','alias'];

    public function articles(){
        return $this->hasMany('app\Article','id','category_id');
    }

}
