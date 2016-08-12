@extends('layouts.app')
@section('content')
<div class="container">
    <h1>@if(!Auth::guest()){{ Auth::user()->name }}：@endif All Articles</h1>
    <hr>
    @foreach($articles as $article)
        <h2><a href="{{url('articles', $article->id)}}">{{$article->title}}</a></h2>
        <article>
            <div class="body">
                {{$article->content}}
            </div>
        </article>
    @endforeach()
</div>
@stop