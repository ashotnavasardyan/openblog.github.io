<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Settingsupdate;
use App\User;
class RoomUpdateSettingsController extends Controller
{
    public function index(Settingsupdate $request,$id){
        $req = $request->except('_token');
        if(isset($req['image'])){
            $image = $request->file('image');
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$imagename);
            $req['image'] = $imagename;
        }
        $user = User::find($id);
        $user->update($req);
        return redirect()->route('settingshome')->with('status','Settings was updated');
    }
}
