<ul class="list-inline ">
    <li><a href="{{ url('news') }}"><h4>说说</h4></a></li>
    <li><a href="{{ url('messages') }}"><h4>消息</h4></a></li>
    <li><a href="{{ url('friends') }}"><h4>好友列表</h4></a></li>
    <li><a href="{{ url('user/'.$user->id.'/edit') }}"><h4>设置</h4></a></li>
</ul>
<hr  style="margin-top: 5px;">