<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function index() {
        $user = User::findOrFail(Auth::user()->id);
        $news = News::latest()->where(['user_id' => Auth::user()->id])->get();
        //dd(compact('news', 'user'));
        return view('news.index',compact('news','user'));
    }

    public function show($id) {
        $news = News::latest()->all();
        return view('news.show', compact('news'));
    }

    public function store(Request $request) {
        // $date = [
        //     'user_id' => Auth::user()->id,
        // ];
        // Article::create(array_merge(['user_id' => Auth::user()->id], $request->all()));
        // return redirect('/news');
    }
}
