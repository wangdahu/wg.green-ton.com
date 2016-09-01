@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-6">
        <h1>所有菜单   <a href="javascript:;">+</a></h1>
        @foreach($menus as $menu)
        <ul>
            <li>
                <h2>{{$menu['name']}}   <a href="javascript:;">+</a></h2>
                @if(isset($menu['sub_button']))
                    @foreach($menu['sub_button']['list'] as $minMenu)
                    <ul>
                        <li>
                            <h2>{{$minMenu['name']}}</h2>
                        </li>
                    </ul>
                    @endforeach
                @endif
            </li>
        </ul>
        @endforeach
    </div>
    <div  class="col-lg-6">
        <div>
            <h2>子菜单名称</h2>
            <hr>
            <h4>子菜单名称：<input type="text" name="name" class="input-lg"></h4>
            <h4 class="vertical-middle-sm">子菜单内容：
                <label><input type="radio" name="type" class="input-lg"><span>发送消息</span></label>
                <label><input type="radio" name="type" class="input-lg"><span>跳转网页</span></label>
            </h4>
            <div>
                <h4>
                    <span>图文消息</span>
                    <span> | 文字</span>
                    <span> | 图片</span>
                    <span> | 语音</span>
                    <span> | 视频</span>
                </h4>
                <hr>
                <div>

                </div>
            </div>
            <h4>
                网页地址：<input type="text" name="name" class="input-lg">
            </h4>
            <button class="btn-group-lg">提交</button>
        </div>
    </div>
</div>
@stop