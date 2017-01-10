@extends('layouts.app')
@section('content')
<div class="container">
    <h1>@if(!Auth::guest()){{ Auth::user()->name }}：@endif All Articles
        @if(!Auth::guest())
            <a href="{{url('articles/create')}}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> 添加新闻</a>
        @endif
    </h1>
    <hr>
    @foreach($articles as $article)
        <h2><a href="{{url('articles', $article->id)}}">{{$article->title}}</a></h2>
        <article>
            <div class="body" style="text-indent:25px;">
                {{$article->content}}
            </div>
        </article>
    @endforeach()
</div>
@stop