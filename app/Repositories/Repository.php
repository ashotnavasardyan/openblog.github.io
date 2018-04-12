<?php
/**
 * Created by PhpStorm.
 * User: Ashot
 * Date: 11.04.2018
 * Time: 22:59
 */

namespace App\Repositories;


use App\Http\Controllers\Controller;

class Repository extends Controller
{
    protected $model;

    public function get(){
        return $this->model->select('*');
    }
}