@extends('layouts.app')
@section('content')
<div class="container">
<h1>编写新文章</h1>
{!! Form::open(['url' => '/articles']) !!}
    @include('articles.form')
{!! Form::close() !!}
    @include('errors.list')
</div>
@stop