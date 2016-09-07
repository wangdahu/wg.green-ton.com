<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\News;
use App\User;

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

    public function index() {
        $user = User::findOrFail(Auth::user()->id);
        $news = News::latest()->where(['user_id' => Auth::user()->id])->get();
        //dd(compact('news', 'user'));
        return view('news.index',compact('news','user'));
    }

    public function create() {
        $user = User::findOrFail(Auth::user()->id);
        $news = News::latest()->where(['user_id' => Auth::user()->id])->get();
        //dd(compact('news', 'user'));
        return view('news.create',compact('news','user'));
    }

    public function show($id) {
        $user = User::findOrFail(Auth::user()->id);
        $news = News::findOrFail($id);
        // 回复列表
        $comments = $news->comments;
        // 赞列表
        $praises = $news->praises;
        return view('news.show', compact('news', 'user', 'praises', 'comments'));
    }

    public function store(Request $request) {
        $data = [
            'user_id' => Auth::user()->id,
        ];
        News::create(array_merge($data, $request->all()));
        return redirect('/news');
    }

}
