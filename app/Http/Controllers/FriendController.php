<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Friend;
use Validator;
use Auth;
use Redirect;

class FriendController extends Controller {
    public $userId;
    public function __construct() {
        $this->middleware('auth');
        $this->userId = Auth::user() ? Auth::user()->id : '';
    }

    //
    public function index(Request $request){
        $user = Auth::user();
        $friends = Friend::where(['my_id' => $this->userId])->get();
        return view('friend.index',compact('friends','user'));
    }

    public function search(Request $request) {
        $user = Auth::user();
        $friends = Friend::where(['my_id' => $this->userId,'status' => 1])->lists('friend_id')->toArray();
        if($request->all()) {
            $name = $request->all()['name'];
            if($name) {
                // 搜索用户列表
                $lists = User::where('name', 'like','%'.$name.'%')->paginate(20);
            }

        }
        return view('friend.search',compact('lists','user','name','friends'));
    }
}
