<div class="panel-body text-left ">
@foreach($friends as $friend)
    <div class="media">
        <div class="pull-left " >
            <img class="img-thumbnail" data-id={{$friend->user->id}} width="40" height="40" src="{{$friend->user->avatar ? $friend->user->avatar : '/images/avatar/avatar.png'}}" />
        </div>
        <div class="media-body">
            <a href="{{url('user/'.$friend->user->id)}}" class="friend-name" >{{$friend->user->name}}</a>
            <button class="btn btn-link js-send" data-toggle="modal" data-target="#sendMessage" data-id="{{$friend->user->id}}"><i class="fa fa-commenting-o"></i></button>
        </div>
    </div>
@endforeach()
</div>
@include('message.talk')
@endsection