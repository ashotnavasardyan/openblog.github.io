<?php

namespace App\Http\Controllers;

    use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Menu;
class SiteController extends Controller
{
    protected $a_rep;
    protected $m_rep;
    protected $vars;
    protected $template;

    protected $bar = FALSE;

    public function __construct(MenuRepository $m_rep){
        $this->m_rep = $m_rep;
        //$menu = $this->getMenu();
        $menu = $this->m_rep->get();
        dd($menu);
        $navigation = view('menu')->with($menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);
    }

    public function getMenu(){
        $menu = $this->m_rep->get();
        dd($menu);
        $mBuilder = Menu::make('myMenu',function($m) use ($menu){
            foreach ($menu as $item){
                $m->add($item->title,$item->path);
            }
        });

        return $mBuilder;
    }

    public function renderOutput(){
        return view($this->template)->with($this->vars);
    }

}
