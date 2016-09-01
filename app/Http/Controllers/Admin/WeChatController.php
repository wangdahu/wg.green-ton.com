<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class WeChatController extends Controller {
    public $menu;
    public function serve() {

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 overtrue！";
        });


        return $wechat->server->serve();
    }

}
