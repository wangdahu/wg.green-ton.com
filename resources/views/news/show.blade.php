@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include('user.avatar')
                <div class="panel-body text-left ">
                    @include('user.title')
                    <div class="media">
                        <div class="pull-left">
                            <img class="media-object img-circle" width="60" height="60" src="{{$user->avatar}}" />
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><a href="{{url('user/'.$user->id)}}" >{{$user->name}}</a></h3>
                            {{$news->content}}
                            <div class="media-heading">{{ substr($news->published_at, 5, 11)}}
                                <a class="btn" href="javascript:;"
                                 data-id="{{$news->id}}">
                                    <i class="fa fa-close"></i>
                                </a>
                                <a class="btn praise-up" href="javascript:;" >
                                    <i class="fa fa-thumbs-up" data-news_id="{{$news->id}}" data-user_id = "{{$user->id}}" data-flag = "{{$praiseFlag ? $praiseFlag->id : 0}}"> {{$praiseFlag ? '取消赞' : '赞'}}</i>
                                </a>
                                <a class="btn" href="javascript:;">
                                    <i class="fa fa-commenting-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <div class="media-body praise-avatar">
                                <i class="fa fa-heart-o"></i>
                                @foreach ($praises as $praise)
                                    <img class="img-thumbnail" data-id={{$praise->id}} width="40" height="40" src="{{$praise->user->avatar}}" />
                                @endforeach()
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-commenting-o"></i>
                            @foreach ($comments as $comment)
                            <div class="media-body">
                                <div class="pull-left" >
                                    <img class="media-object img-circle" width="50" height="50" src="{{$user->avatar}}" />
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{url('user/'.$user->id)}}" >{{$user->name}}</a>
                                        <span class="pull-right">{{ substr($news->published_at, 5, 11)}}
                                        <a class="btn" href="javascript:;">
                                            <i class="fa fa-commenting-o"></i>
                                        </a>
                                        <span>
                                    </h4>
                                    {{$news->content}}
                                </div>
                            </div>
                            <hr>
                            @endforeach()
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(function() {
        $('.praise-up').click(function(){
            var praise = $(this).find('.fa-thumbs-up');
                user_id = praise.data('user_id'),
                news_id = praise.data('news_id'),
                flag = praise.data('flag'),
            $.ajax({
                url:'praise',
                type: 'POST',
                data: {_token: '{{csrf_token()}}', user_id: user_id, news_id: news_id, flag:flag},
                success: function(ok){
                    var data = $.parseJSON(ok);
                    if(flag) {
                        praise.html(' 赞').data('flag', 0);
                        $('.praise-avatar').find('img[data-id='+data.id+']').remove();
                    }else {
                        praise.html(' 取消赞').data('flag', data.id);
                        $('.praise-avatar').append('<img class="img-thumbnail" data-id='+data.id+' width="40" height="40" src="{{$user->avatar}}" />');
                    }
                }
            });
        });
    });
</script>
@endsection
