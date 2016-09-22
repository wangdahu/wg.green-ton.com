<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Friend;
use Auth;

class FriendController extends Controller
{
    //
    public function index(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $friends = Friend::where(['my_id' => Auth::user()->id])->get();
        if($request->all()) {
            var_dump($request->all());
            $name = $request->all()['name'];
            if($name) {
                // 搜索用户列表
            }

        }
        return view('friend.index',compact('friends','user'));
    }

    public function search(Request $request) {
        var_dump($request->all());
    }

    public function show() {
echo 111;
    }
}
