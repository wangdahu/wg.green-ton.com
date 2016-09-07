
<ul id="myTab" class="nav nav-tabs">
    <li class="{{ strpos(url()->current(), url('news')) !== false ? 'active' : ''}}">
        <a href="{{ url('news') }}"><h4>说说</h4></a>
    </li>
    <li class="{{ strpos(url()->current(), url('messages')) !== false ? 'active' : ''}}">
        <a href="{{ url('messages') }}"><h4>消息</h4></a>
    </li>
    <li class="{{ strpos(url()->current(), url('friends')) !== false ? 'active' : ''}}">
        <a href="{{ url('friends') }}"><h4>好友列表</h4></a>
    </li>
    <li class="{{ strpos(url()->current(), url('user')) !== false ? 'active' : ''}}">
        <a href="{{ url('user/'.$user->id.'/edit') }}"><h4>设置</h4></a>
    </li>
    <!-- <li class="dropdown">
        <a href="#" id="myTabDrop1" class="dropdown-toggle"
         data-toggle="dropdown">Java
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
            <li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
            <li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
        </ul>
    </li> -->
</ul>
<div style="margin: 15px;"></div>