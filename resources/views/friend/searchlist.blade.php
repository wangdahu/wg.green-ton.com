<div class="panel-body text-left ">
@foreach($lists as $list)
    <div class="media">
        <div class="pull-left " >
            <img class="img-thumbnail" data-id={{$list->id}} width="40" height="40" src="{{$list->avatar ? $list->avatar : '/images/avatar/avatar.png'}}" />
        </div>
        <div class="media-body">
            <a href="{{url('user/'.$list->id)}}" >{{$list->name}}</a>
            @if(!in_array($list->id, $friends))
            <button class="btn btn-success js-add" data-id={{$list->id}}  data-toggle="modal" data-target="#addFriend"><i class="fa fa-user-plus"></i> 添加</button>
            @endif
        </div>
    </div>
@endforeach()
{!! $lists->appends(['name' => $name])->links() !!}
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="addFriend" tabindex="-1" role="dialog" aria-labelledby="addFriendLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        {!! Form::open(['url' => '/message/send', 'method' => 'POST']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addFriendLabel">添加好友</h4>
            </div>
            <div class="modal-body">
                <input name="to_id" type="hidden" value="" id="to_id" />
                <input name="from_id" type="hidden" value="{{$user->id}}" id="from_id" />
                <input name="type" type="hidden" value="1"/>
                <textarea class="form-control" name="content" rows="3" placeholder="请简单介绍自己..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">发送</button>
            </div>
        {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
@section('js')
<script type="text/javascript">
    $(function() {
        $('.js-add').click(function() {
            var id = $(this).data('id');
            $('#to_id').val(id);
        });
    });
</script>
@endsection