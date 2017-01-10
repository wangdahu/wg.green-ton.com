@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$article->title}}
    @if(!Auth::guest()) <a href="{{url('articles/'.$article->id, 'edit')}}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> 修改</a></h1>
    @endif
    </h1>
    <hr >
    <article>
        <div class="body">
            {{$article->content}}
            <address class="text-right">
                <strong>
                作者: {{$article->author->name}}<br />
                发表时间: {{$article->published_at}}
                </strong>
            </address>
        </div>
    </article>
</div>
@stop