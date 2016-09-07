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
                                <a class="btn" href="javascript:;" >
                                    <i class="fa fa-thumbs-up"></i>
                                </a>
                                <a class="btn" href="javascript:;">
                                    <i class="fa fa-commenting-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <div class="media-body">
                                <i class="fa fa-heart-o"></i>
                                @foreach ($praises as $praise)
                                    <img class="img-thumbnail" width="40" height="40" src="{{$praise->user->avatar}}" />
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
                                    <img class="media-object img-circle" width="60" height="60" src="{{$user->avatar}}" />
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="{{url('user/'.$user->id)}}" >{{$user->name}}</a>
                                        <span class="pull-right">{{ substr($news->published_at, 5, 11)}}
                                        <a class="btn" href="javascript:;">
                                            <i class="fa fa-commenting-o"></i>
                                        </a>
                                        <span>
                                    </h3>
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
        $('.fa-thumbs-up').click(function(){
            alert('chengg');
        });
    });
</script>
@endsection
