<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class MaterialController extends Controller {
    public $material;

    public function __construct(Application $app) {
        $this->material = $app->material;
    }

    public function news() {
        $news = $this->material->lists('news');
        return view('admin.wechat.news', compact('news'));
    }

    public function images() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $size = 20;
        $images = $this->material->lists('image', ($page-1)*$size, $size);
        $total = $images->total_count;
        $images = $images['item'];
        $paginator = new LengthAwarePaginator($images, $total, $size, $page, ['path' => '/wechat/images']);
        return view('admin.wechat.images', compact('images', 'paginator'));
    }

    public function saveImages(Requests\UploadFileRequest $request) {
        $fileDir = public_path().'/images/';
        foreach ($request->image as $key => $images) {
            $fileName = $images->getClientOriginalName();
            $newFileName = md5(time().rand(0,10000)).'.'.$images->getClientOriginalExtension();
            $images->move($fileDir,$fileName);
            rename($fileDir.$fileName, $fileDir.$newFileName);
            $this->material->uploadImage($fileDir.$newFileName);
            @unlink($fileDir.$fileName);
        }
        return redirect('/wechat/images');

    }

    public function voices() {
        return $this->material->lists('voice');
    }

    public function videoes() {
        return $this->material->lists('video');
    }
}
