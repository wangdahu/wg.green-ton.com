<!-- 模态框（Modal） -->
<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="sendMessageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        {!! Form::open(['url' => '/message/send', 'method' => 'POST']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="sendMessageLabel">给<strong class="js-name"></strong>发送消息</h4>
            </div>
            <div class="modal-body">
                <input name="to_id" type="hidden" value="" id="to_id" />
                <input name="from_id" type="hidden" value="{{$user->id}}" id="from_id" />
                <input name="type" type="hidden" value="2" id="type" />
                <textarea class="form-control" name="content" rows="3" placeholder="您想说对他说点什么?..."></textarea>
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
        $('.js-send').click(function() {
            var name = $(this).parent().find('.friend-name').html();
            $('.js-name').html(name);
            var to_id = $(this).data('id');
            $('#to_id').val(to_id);
        });
    });
</script>