<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;


class UserController extends Controller
{
    public $id;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->id = Auth::user() ? Auth::user()->id : '';
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    //
    public function index() {
        $user = User::findOrFail($this->id);
        return view('user.index', compact('user'));
    }

    public function show($id) {
        if($id == Auth::user()->id) {
            return redirect('user');
        }
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($this->id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('user/'.$this->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::findOrFail($this->id);
        $user->update($request->all());
        return redirect('user/'.$this->id.'/edit');
    }

    public function avatar(Request $request) {
        $fileDir = public_path().'/images/avatar/';
        $avatar = $request->avatar;
        $fileName = $avatar->getClientOriginalName();
        $newFileName = md5(time().rand(0,10000)).'.'.$avatar->getClientOriginalExtension();
        $avatar->move($fileDir,$fileName);
        rename($fileDir.$fileName, $fileDir.$newFileName);
        @unlink($fileDir.$fileName);
        // $img = Image::make($fileDir.$newFileName)->resize(90, 90);
        // dd($img->response('jpg'));
        $user = User::findOrFail($this->id);
        $user->avatar = '/images/avatar/'.$newFileName;
        if($user->save()) {
            return redirect('user/'.$this->id.'/edit');
        }

    }
}
