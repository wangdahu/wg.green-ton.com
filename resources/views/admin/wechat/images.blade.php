@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(['url' => '/wechat/images/save', 'enctype' => "multipart/form-data"]) !!}
        {!! Form::file('image[]',['multiple'=>'multiple']) !!}
        {!! Form::submit('提 交', ['class' => 'btn btn-primary', 'style' => 'margin: 10px;']); !!}
    {!! Form::close() !!}
    @include('errors.list')

    <h1>图片显示</h1>
    <p class="row">
    {!! $paginator->render() !!}
    </p>
    @foreach($images as $image)
    <div class="col-lg-3">
        <label>{{ $image['media_id'] }}</label>
        <img src="{{ $image['url']}}"/>
    </div>
    @endforeach
    <p class="row">
    {!! $paginator->render() !!}
    </p>
</div>
@stop
@section('js')
<script type="text/javascript">
$(function() {
    $(".file-button").click(function() {
        $(".file-multiple").click();
    });
});
</script>
@stop