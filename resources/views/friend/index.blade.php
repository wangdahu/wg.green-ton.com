@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include('user.avatar')
                <div class="panel-body text-left ">
                    @include('user.title')
                    {!! Form::open(['url' => '/friend/search', 'method' => 'GET']) !!}
                    {!! Form::text('name',null,['class' => 'form-control', 'style' => 'width:auto; display: inline']);!!}
                    {!! Form::submit('搜索好友', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                        @include('errors.list')
                </div>
				@include('friend.list')
            </div>
        </div>
    </div>
</div>
@endsection
