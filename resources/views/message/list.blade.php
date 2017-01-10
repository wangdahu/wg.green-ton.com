<div class="panel-body text-left" style="margin-top:-10px; padding-top:0px;">
@foreach($messages as $message)
    <div class="media">
        <div class="pull-left " >
            <img class="img-thumbnail" data-id={{$message->user->id}} width="50" height="50" src="{{$message->user->avatar ? $message->user->avatar : '/images/avatar/avatar.png'}}" />
        </div>
        <div class="media-body">
            <a href="{{url('user/'.$message->user->id)}}" >{{$message->user->name}}</a>
            <span>{{$message->send_at}}</span>
            <br />
            <span>{{$typeTxt[$message->type]}}: {{$message->content}}</span>
            @if($message->type == 1)
            <span class="" style="margin-top: -10px;">
                <button class="btn btn-success js-accept">接受</button>
                <button class="btn js-refusal">拒绝</button>
            </span>
            @else
            <button class="btn btn-link js-send" data-toggle="modal" data-target="#sendMessage" data-id="{{$message->user->id}}"><i class="fa fa-commenting-o"></i></button>
            @endif
        </div>
    </div>
@endforeach()
</div>
@include('message.talk')
<script type="text/javascript">
    $(function() {
        $('.js-accept').click(function() {
            var name = $(this).parent().find('.friend-name').html();
            $('.js-name').html(name);
            var to_id = $(this).data('id');
            $('#to_id').val(to_id);
        });
    });
</script>
@endsection