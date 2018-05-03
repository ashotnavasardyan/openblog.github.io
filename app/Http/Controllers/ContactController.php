<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class ContactController extends Controller
{
    public function index(){
        $menus = Menu::all();
        $categories = Category::all();

        return view('contact.contact',compact('menus','categories'));
    }

    public function send(Request $request){
       $request = $request->except('_token');
       $validator = Validator::make($request,[
           'name'=>'required|string',
           'email'=>'required|email',
           'phone'=>'required|numeric',
           'city'=>'required|string',
           'message'=>'required|min:5|max:700'
       ]);

       if($validator->fails()){
           return Response(json_encode($validator->errors()));
       }
       Log::alert('sended');
       return Response(json_encode(['success'=>['your message was sended']]));
    }
}
