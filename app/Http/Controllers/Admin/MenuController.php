<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class MenuController extends Controller {
    public $menu;

    public function __construct(Application $app) {
        $this->menu = $app->menu;
        $this->material = $app->material;
    }

    public function all() {
        $menuss = $this->menu->current();
        $menus = $menuss['selfmenu_info']['button'];
        var_dump($menus);

        $lists = $this->material->lists('image', 0, 10);

        dd($lists);

        $menuss = $this->menu->current();
        $menus = $menuss['selfmenu_info']['button'];
        return view('admin.wechat.menus', compact('menus'));
    }

    public function edit() {

    }

    public function menu() {
        $buttons = [
            [
                "type" => "click",
                "name" => "我抛压盘",
                "key"  => "V1001_TODAY_MUSIC"
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        $this->menu->add($buttons);
        return $this->menu->current();
    }
}
