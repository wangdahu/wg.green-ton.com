<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Validator;
use App\News;
use App\User;
use App\Praise;
use DB;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|max:255',
        ]);
    }

    public function index() {
        $user = User::findOrFail(Auth::user()->id);
        $news = News::latest()->where(['user_id' => Auth::user()->id])->get();
        return view('news.index',compact('news','user'));
    }

    public function create() {
        $user = User::findOrFail(Auth::user()->id);
        $news = News::latest()->where(['user_id' => Auth::user()->id])->get();
        return view('news.create',compact('news','user'));
    }

    public function show($id) {
        $news = News::findOrFail($id);
        $user_id = $news->user_id;
        $user = User::findOrFail($user_id);
        $authId = Auth::user()->id;
        $flag = false;
        if($user_id == $authId) {
            $authUser = $user;
            $flag = true;
        }else {
            $authUser = User::findOrFail($authId);
        }
        // 回复列表
        $comments = $news->comments;
        // 赞列表
        $praises = $news->praises;
        // 是否赞
        $praiseFlag = Praise::where(['user_id'=>Auth::user()->id,'news_id'=>$id])->first();
        return view('news.show', compact('news', 'user', 'praises', 'comments', 'praiseFlag','authUser', 'flag'));
    }

    public function store(Request $request) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $data = [
            'user_id' => Auth::user()->id,
        ];
        News::create(array_merge($data, $request->all()));
        return redirect('/news');
    }

    public function praise(Request $request) {
        $data = $request->all();
        $id = $data['flag'];
        unset($data['_token']);
        unset($data['flag']);
        if($id) {
            $praise = Praise::where($data);
            $praise->delete();
        }else {
            $id = Praise::create($data)->id;
        }
        return json_encode(array('flag'=>'ok', 'id' => $id));
    }

}
