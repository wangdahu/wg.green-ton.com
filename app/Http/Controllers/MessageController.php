<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use Validator;
use Auth;

class MessageController extends Controller {
    public $userId;
    public function __construct() {
        $this->middleware('auth');
        $this->userId = Auth::user() ? Auth::user()->id : '';
    }

    public function index() {
        $user = Auth::user();
        $messages = Message::where(['to_id' => $this->userId])->orderBy('id', 'desc')->get();
        $typeTxt = array('','好友请求','普通消息');
        $statusTxt = array('','','已同意','已拒绝');
        return view('message.index',compact('messages', 'user', 'typeTxt', 'statusTxt'));
    }

    public function show() {
        echo 1;
    }

    public function send(Request $request) {
        Message::create($request->all());
        return back();
    }
}