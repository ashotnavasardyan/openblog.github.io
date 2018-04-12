<?php
/**
 * Created by PhpStorm.
 * User: Ashot
 * Date: 11.04.2018
 * Time: 22:42
 */

namespace App\Repositories;

use App\Menu;

class MenuRepository extends Repository
{
    public function __construct(Menu $menu){
        $this->model = $menu;
    }
}