<div class="panel-body text-left ">
@foreach($friends as $friend)
    <div class="media" style="width: 220px; float: left">
        <div class="pull-left " >
            <img class="img-thumbnail" data-id={{$friend->user->id}} width="40" height="40" src="{{$friend->user->avatar ? $friend->user->avatar : '/images/avatar/avatar.png'}}" />
        </div>
        <div class="media-body">
            <a href="{{url('user/'.$friend->user->id)}}" >{{$friend->user->name}}</a>
        </div>
    </div>
@endforeach()
</div>