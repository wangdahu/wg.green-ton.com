@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include('user.avatar')
                <div class="panel-body text-center">
                {!! Form::open(['url' => '/user/avatar', 'enctype' => "multipart/form-data"]) !!}
                    {!! Form::file('avatar', ['style' => 'display: none;','id' => 'avatar','accept'=>".jpg,.png,.gif"]) !!}
                    {!! Form::button('修改头像', ['class' => 'btn btn-primary click-file-button']); !!}
                    {!! Form::submit('提交头像', ['class' => 'btn btn-primary submit-avatar-file', 'style' => 'display:none;']); !!}
                {!! Form::close() !!}
                </div>
                <div class="panel-body text-left ">
                    @include('user.title')
                    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/user/'.$user->id]) !!}
                        @include('user.form')
                    {!! Form::close() !!}
                        @include('errors.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(function() {
        $('.click-file-button').click(function(){
            $('#avatar').click();
            $(this).hide();
            $('.submit-avatar-file').show();
        });
    });
</script>
@endsection