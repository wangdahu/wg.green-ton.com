<ul id="myTab" class="nav nav-tabs">
    <li class="{{ strpos(url()->current(), url('news')) !== false ? 'active' : ''}}">
        <a href="{{ url('news') }}"><h4>说说</h4></a>
    </li>
    <li class="{{ strpos(url()->current(), url('message')) !== false ? 'active' : ''}}">
        <a href="{{ url('message') }}"><h4>消息</h4></a>
    </li>
    <li class="{{ strpos(url()->current(), url('friend')) !== false ? 'active' : ''}}">
        <a href="{{ url('friend') }}"><h4>好友列表</h4></a>
    </li>
    <li class="{{ strpos(url()->current(), url('user')) !== false ? 'active' : ''}}">
        <a href="{{ url('user/'.$user->id.'/edit') }}"><h4>设置</h4></a>
    </li>
</ul>
<div style="margin: 15px;"></div>